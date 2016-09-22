<?

class dbx
{

	const version = "10";

	static $connected 		= false;
	static $link 			= false;
	static $lastq 			= false;
	static $lastInsertId	= false;

	public static function transaction_start()
	{
		self::init();
		mysqli_autocommit(self::$link,false);
	}

	public static function transaction_commit()
	{
		self::init();
		return mysqli_commit(self::$link);
	}

	public static function insertOnDuplicateKey($tablename,$pid,$data)
	{

		$sql_insert = self::insert($tablename,$data,true);
		$sql_insert .= " ON DUPLICATE KEY UPDATE";
		$update = array();


		foreach ($data as $k => $v)
		{
			if ($k == $pid) continue;
			if (self::_isSpecial($v))
			{
				$update[] = " `$k` = '$v' ";
			} else
			{
				$v = self::escape($v);
				$update[] = " `$k` = '$v' ";
			}
		}

		$sql_insert.=implode(",",$update);

		return dbx::query($sql_insert);
	}

	public static function upsert($table,$pid,$where_array,$insert=false,$update=false)
	{
		$where = array();

		foreach ($where_array as $k => $v)
		{
			$where[] = " ($k = '$v') ";
		}

		$where = implode(" AND ",$where);
		$sql = "select $pid from $table where $where LIMIT 1";

		$present = dbx::query($sql);

		if ($present === false)
		{
			$db = $insert;
			if ($db === false)
			{
				$db = $update;
			}

			if ($db === false)
			{
				$db = array();
			}

			foreach ($where_array as $k => $v)
			{
				$db[$k] = $v;
			}

			dbx::insert($table,$db);
			return dbx::getLastInsertId();
		}

		$id = intval($present[$pid]);
		if ($id == 0) return false;

		if ($update === false)
		{
			return $id;
		}

		if (!self::attributePresent($table,$pid)) return false;
		dbx::update($table,$update,array($pid=>$id));

		return $id;
	}

	public static function isFunctionPresent($funcName)
	{
		$sql = "select routine_definition
from information_schema.routines
where routine_schema = '".Ixcore::DB_NAME."'
and ROUTINE_TYPE = 'FUNCTION'
and routine_name = '$funcName';";
		return dbx::query($sql);
	}


	public static function getAllAttributes($tableName,$attrNameLikeQuery=false)
	{
		if ($attrName === false)
		{
			$sql = "SHOW COLUMNS FROM `$tableName`";
		} else {
			$sql = "SHOW COLUMNS FROM `$tableName` LIKE  '$attrNameLikeQuery'";
		}
		return dbx::queryAll($sql);
	}


	public static function attributePresent($tableName,$attrName)
	{
		$sql 	= "SHOW COLUMNS FROM  `$tableName` LIKE  '$attrName'";
		$rs 	= dbx::query($sql,false);
		if ($rs===false) return false;

		return 	(strtolower($rs['Field']) == strtolower($attrName));
	}

	public static function tablePresent($tableName)
	{
		$sql 	= "SHOW TABLES LIKE '$tableName'";
		$rs 	= dbx::query($sql,false);
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

		reportx::error('dbx','SQL-FAILED',$errno,$txt,true,$historyBack);
		return false;
	}

	private static function connect($db_host,$db_port,$db_user,$db_password,$db_name)
	{
		self::$link = @mysqli_connect($db_host, $db_user, $db_password,$db_name,$db_port);
		if (!self::$link) {
			self::handleError('mysqli_connect');
			return false;
		}
		self::select_database($db_name);
		@mysqli_set_charset(self::$link,"utf8");
	}

	public static function reconnect($different_db_host,$different_db_port,$different_db_user,$different_db_password,$different_db_name) {
		return self::connect($different_db_host,$different_db_port,$different_db_user,$different_db_password,$different_db_name);
	}

	private static function init()
	{
		if (self::$link !== false) return true;
		return self::connect(Ixcore::DB_HOST ,Ixcore::DB_PORT ,Ixcore::DB_USER ,Ixcore::DB_PWD ,Ixcore::DB_NAME);
	}

	public static function select_database($db_name="")
	{
		self::init();
		if ($db_name == "") $dbname = Ixcore::DB_NAME;

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

	public static function query($query,$dieOnError=true,$returnAffectedAfterInsert=false)
	{
		self::init();
		self::$lastq = $query;

		if (!$query || trim($query) == '')
		{
			return false;
		}

		self::showQuery($query);

		$rs = @mysqli_query(self::$link, $query);

		if ($rs === false) {
			if ($dieOnError) {
				self::handleError('mysqli_query');
			}
			return false;
		}

		if(preg_match ("~^update~i", $query))
		{
			return intval(@mysqli_affected_rows(self::$link));
		}

		if(preg_match ("~^delete~i", $query))
		{
			return intval(@mysqli_affected_rows(self::$link));
		}

		if(preg_match ("~^insert~i", $query))
		{
			self::$lastInsertId = mysqli_insert_id(self::$link);
			if ($returnAffectedAfterInsert)
			{
				return intval(@mysqli_affected_rows(self::$link));
			}
			else {
				return self::$lastInsertId;
			}
		}

		if(preg_match ("~^show~i", $query)) {
			if ($rs->num_rows == 0) return false;
			return @mysqli_fetch_assoc($rs);
		}

		if(preg_match ("~^select~i", $query)) {
			if ($rs->num_rows == 0) return false;
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

	public static function showQuery($q)
	{
		if (isset($_REQUEST['SQL_SHOW']))
		{
			if (!libx::isDeveloper()) return false;
			$callers=debug_backtrace();
			$fn = $callers[2]['class'].'::'.$callers[2]['function'];
			echo "SQL: $q ($fn)      <br>\n";
		}
	}

	public static function queryAll($query,$getAsMemoryBlock=true,$dieOnError=true)
	{
		self::init();
		self::$lastq = $query;

		self::showQuery($query);

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
			$rs = @mysqli_query(self::$link, $query);

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

			if (trim($column) == '') continue;
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

		foreach($Wheres as $name => $data) {
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

		if (count($data)==0) return false;

		if (!$where || empty($where))
		{
			self::handleError('ERROR: WHERE NOT SET IN UPDATE');
		}

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
							$sql .= "`".$or_key."` = '".mysqli_real_escape_string(self::$link,$or_value[$or])."' OR ";
						}
						else
						{
							$sql .= "`".$or_key."` = '".mysqli_real_escape_string(self::$link,$or_value)."' OR ";
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


	public static function getWhereByArray($where)
	{
		$sql = "";

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
							$sql .= "`".$or_key."` = '".mysqli_real_escape_string(self::$link,$or_value[$or])."' OR ";
						}
						else
						{
							$sql .= "`".$or_key."` = '".mysqli_real_escape_string(self::$link,$or_value)."' OR ";
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

		return $sql;
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


class IterableMysql implements Iterator, Countable
{
	private $position; // holds the position of the pointer for the mysql resource
	private $MysqlObject; // the mysql query resource

	/**
	* Constructor sets the MysqlObject to be $MysqlResource, and
	* sets the position to be 0.
	*
	* @param Resource $MysqlResource
	*/

	public function __construct($MysqlResource)
	{
		$this->MysqlObject = $MysqlResource;
		$this->position = 0;
	}

	/**
	* Resets position to be 0
	*/

	public function rewind()
	{
		$this->position = 0;
	}

	/**
	* Sets the pointer in the Mysql Resource to be the value of
	* pointer, then performs mysqli_fetch_assoc on the resource from it's
	* new location.
	*
	* @return array
	*/

	public function current()
	{
		mysqli_data_seek($this->MysqlObject, $this->position);
		return mysqli_fetch_assoc($this->MysqlObject);
	}

	/**
	* Returns the position in the Resource
	* @return int
	*/

	public function key()
	{
		return $this->position;
	}

	/**
	* Increments the position.
	* @return
	*/

	public function next()
	{
		++$this->position;
	}

	/**
	* Checks to see if the next iteration is valid (have we reached the end)
	* if it is return true, else return false and stop the loop.
	* @return boolean
	*/

	public function valid()
	{
		return is_array(mysqli_fetch_assoc($this->MysqlObject));
	}

	/**
	* Returns the number of rows in the query, used for the count() function
	* @return int
	*/

	public function count()
	{
		return mysqli_num_rows($this->MysqlObject);
	}

	public function fetch()
	{
		return mysqli_fetch_assoc($this->MysqlObject);
	}
}

