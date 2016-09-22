<?

class dbxAI
{

	const version = "8.0";
	
	const DB_HOST 					= "luerzersarchive.org";
	const DB_PORT 					= 3306;
	const DB_NAME 					= "d01d39d8";
	const DB_USER 					= "d01d39d8";
	const DB_PWD 					= "#2015LzExt";

	static $connected 		= false;
	static $link 			= false;
	static $lastq 			= false;
	static $lastInsertId	= false;

	public static function attributePresent($tableName,$attrName)
	{
		$sql 	= "SHOW COLUMNS FROM  `$tableName` LIKE  '$attrName'";
		$rs 	= self::query($sql,false);
		if ($rs===false) return false;
		return 	($rs['Field'] == $attrName);
	}

	public static function tablePresent($tableName)
	{
		$sql 	= "SHOW TABLES LIKE '$tableName'";
		$rs 	= self::query($sql,false);
		if ($rs===false) return false;
		return true;
	}

	public static function renameTable($oldName,$newName)
	{
		if (!self::tablePresent($oldName))	return false;
		if (self::tablePresent($newName)) 	return false;
		$sql = "RENAME TABLE  `$oldName` TO  `$newName`;";
		self::query($sql);
	}

	public static function getLastError()
	{
		return array(
		'errno' => mysqli_errno(self::$link),
		'error' => mysqli_error(self::$link)
		);
	}

	public static function handleError($info,$historyBack=1)
	{
		$errno = mysqli_errno(self::$link);
		$error = mysqli_error(self::$link);

		$txt = "<b>".self::$lastq."</b><br><br>$error";

		reportx::error('dbx','SQL-FAILED('.$info.')',$errno,$txt,true,$historyBack);
		return false;
	}

	private static function connect($db_host,$db_port,$db_user,$db_password,$db_name)
	{
		self::$link = mysqli_connect($db_host, $db_user, $db_password,$db_name,$db_port) or die("Error " . mysqli_error(self::$link ));

		if (mysqli_connect_errno(self::$link)) {
			self::handleError('mysqli_connect');
			return false;
		}

		self::select_database($db_name);
		@mysqli_set_charset("utf8");
	}

	public static function reconnect($different_db_host,$different_db_port,$different_db_user,$different_db_password,$different_db_name) {
		return self::connect($different_db_host,$different_db_port,$different_db_user,$different_db_password,$different_db_name);
	}

	private static function init()
	{
		if (self::$link !== false) return true;
		return self::connect(self::DB_HOST ,self::DB_PORT ,self::DB_USER ,self::DB_PWD ,self::DB_NAME);
	}

	public static function select_database($db_name="")
	{
		self::init();
		if ($db_name == "") $dbname = self::DB_NAME;

		if(!@mysqli_select_db(self::$link,$db_name)) {
			self::handleError('mysqli_select_db');
			return false;
		}

		return true;
	}

	public static function mQuery($query) {

		self::init();

		if (mysqli_multi_query(self::$link, $query)) {
			return true;
		}
		
		return false;
	}

	public static function query($query,$dieOnError=true)
	{
		self::init();
		self::$lastq = $query;

		$rs = @mysqli_query(self::$link,$query);

		if ($rs === false) {
			if ($dieOnError) {
				self::handleError('mysqli_query');
			}
			return false;
		}

		if(preg_match ("~^update~i", $query))
		{
			return @mysqli_affected_rows(self::$link);
		}

		if(preg_match ("~^delete~i", $query))
		{
			return @mysqli_affected_rows(self::$link);
		}

		if(preg_match ("~^insert~i", $query))
		{
			self::$lastInsertId = mysqli_insert_id(self::$link);
			return @mysqli_affected_rows(self::$link);
		}

		if(preg_match ("~^show~i", $query)){
			return @mysqli_fetch_assoc($rs);
		}

		if(preg_match ("~^select~i", $query)){
			return @mysqli_fetch_assoc($rs);
		}

		return false;
	}

	public static function queryAttribute($query,$attribute)
	{
		$data = self::query($query);
		if (!isset($data[$attribute])) return false;
		return $data[$attribute];
	}

	public static function queryAll($query,$getAsMemoryBlock=true,$dieOnError=true)
	{
		self::init();
		self::$lastq = $query;

		if ($getAsMemoryBlock)
		{

			$rs = @mysqli_query(self::$link,$query);

			if ($rs === false) {
				if ($dieOnError)
				{
					self::handleError('mysqli_query');
				} else
				{
					if (libx::isDeveloper())
					{
						$errno = mysqli_errno(self::$link);
						$error = mysqli_error(self::$link);
						echo "<pre>SQL-ERROR: $errno - $error</pre>";
					}
				}
				return false;
			}

			$nr = @mysqli_num_rows($rs);

			if ($nr == 0)
			{
				return false;
			}

			$master_record = array();

			for($i=0;$i<$nr;$i++)
			{
				if (!@mysqli_data_seek ($rs, $i)) self::handleError('mysqli_data_seek');

				if(!$row = @mysqli_fetch_assoc ($rs) )
				{
					self::_handleError('mysqli_fetch_assoc');
				}

				$master_record[] = $row;
			}

			return $master_record;
		} else
		{
			$rs = @mysqli_query($query);

			if ($rs === false) {
				self::handleError('mysqli_query');
				return false;
			}

			return new IterableMysql($rs);
		}
	}


	private static function _isSpecial($value)
	{
		if ($value == "") 		return false;
		if (is_numeric($value)) return false; # faster

		$value = trim(str_replace(" ","",$value));

		$pos = (strpos(strtoupper($value),'CURRENT_TIMESTAMP'));
		if ($pos !== false)
		{
			if ($pos == 0) return true;
		}

		$pos = (strpos(strtoupper($value),'CURRENT_DATE'));

		if ($pos !== false)
		{
			if ($pos == 0) return true;
		}

		return ("NOW()" == strtoupper($value));
	}

	public static function insert($table,$data,$justReturnSql=false)
	{
		self::init();
		$sql = "INSERT INTO ".$table."  ";

		if (count($data) == 0) self::handleError('INSERT INTO FIELDS EMPTY');

		$da 	= " (";
		$cols 	= " (";

		foreach($data as $column => $value){

			$cols .= "`".$column."`, ";
			if (self::_isSpecial($value))
			{
				$da .= "$value, ";
			}
			else
			{
				$da .= "'".mysqli_real_escape_string(self::$link,$value)."', ";
			}
		}

		$da 	= substr($da, 0, -2).") ";
		$cols 	= substr($cols, 0, -2).") ";
		$sql 	.= $cols." VALUES ".$da;

		if ($justReturnSql)
		{
			return $sql;
		}

		return self::query($sql);
	}

	public static function delete($table,$Wheres,$justReturnSql=false)
	{
		self::init();
		$sql = "DELETE FROM `$table` WHERE ";

		foreach($Wheres as $name => $data){
			$sql .= "`".$name."` = '".mysqli_real_escape_string(self::$link,$data)."' AND ";
		}

		$sql = substr($sql, 0, -4);

		if ($justReturnSql)
		{
			return $sql;
		}

		return self::query($sql);
	}

	public static function update($table,$data,$where,$justReturnSql=false,$dieIfError=true)
	{
		self::init();

		$sql = "UPDATE ".$table." SET ";

		foreach($data as $column => $value){
			if (self::_isSpecial($value))
			$sql .= "`".$column."` = $value, ";
			else
			$sql .= "`".$column."` = '".mysqli_real_escape_string(self::$link,$value)."', ";
		}

		$sql = substr($sql,0,-2);
		if (count($where)>0)
		{
			$sql .= " WHERE ";
			foreach($where as $name => $data){

				if (is_array($data))
				{
					$sql .= " (";
					foreach ($data as $or_key => $or_value) {

						if (is_array($or_value))
						{
							for ($or = 0;$or<count($or_value);$or++)
							$sql .= "`".$or_key."` = '".mysqli_real_escape_string(self::$link,$or_value[$or] )."' OR ";
						}
						else
						{
							$sql .= "`".$or_key."` = '".mysqli_real_escape_string(self::$link,$or_value )."' OR ";
						}
					}
					$sql = substr($sql, 0, -3);
					$sql .= ") AND ";
				}
				else
				{
					$sql .= "`".$name."` = '".mysqli_real_escape_string(self::$link,$data)."' AND ";
				}
			}
			$sql = substr($sql, 0, -4);
		}

		if ($justReturnSql)
		{
			return $sql;
		}

		return self::query($sql,$dieIfError);
	}

	public static function getLastInsertId()
	{
		return self::$lastInsertId;
	}

	/* EXTRAS */

	public static function escape($field)
	{
		self::init();
		return mysqli_real_escape_string(self::$link,$field);
	}

	public static function _listFields($table){
		$sql = "SHOW COLUMNS FROM ".$table;
		return self::queryAll($sql);
	}

}
