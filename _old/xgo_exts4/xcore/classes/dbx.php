<?

class dbx
{

	const version = "7.0";

	static $connected 		= false;
	static $link 			= false;
	static $lastq 			= false;
	static $lastInsertId	= false;

	public static function attributePresent($tableName,$attrName)
	{
		$sql 	= "SHOW COLUMNS FROM  `$tableName` LIKE  '$attrName'";
		$rs 	= dbx::query($sql,false);
		if ($rs===false) return false;
		return 	($rs['Field'] == $attrName);
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
		'errno' => mysql_errno(self::$link),
		'error' => mysql_error(self::$link)
		);
	}

	public static function handleError($info,$historyBack=1)
	{
		$errno = mysql_errno(self::$link);
		$error = mysql_error(self::$link);

		$txt = "<b>".self::$lastq."</b><br><br>$error";

		reportx::error('dbx','SQL-FAILED',$errno,$txt,true,$historyBack);
		return false;
	}

	private static function connect($db_host,$db_port,$db_user,$db_password,$db_name)
	{
		self::$link = @mysql_connect($db_host.":".$db_port, $db_user, $db_password);
		if (!self::$link) {
			self::handleError('mysql_connect');
			return false;
		}
		self::select_database($db_name);
		@mysql_query("SET NAMES utf8");
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

		if(!@mysql_select_db($db_name,self::$link)) {
			self::handleError('mysql_select_db');
			return false;
		}

		return true;
	}

	public static function query($query,$dieOnError=true)
	{
		self::init();
		self::$lastq = $query;

		self::showQuery($query);
		
		$rs = @mysql_query($query);

		if ($rs === false) {
			if ($dieOnError) {
				self::handleError('mysql_query');
			}
			return false;
		}

		if(preg_match ("~^update~i", $query))
		{
			return @mysql_affected_rows(self::$link);
		}

		if(preg_match ("~^delete~i", $query))
		{
			return @mysql_affected_rows(self::$link);
		}

		if(preg_match ("~^insert~i", $query))
		{
			self::$lastInsertId = mysql_insert_id(self::$link);
			return @mysql_affected_rows(self::$link);
		}

		if(preg_match ("~^show~i", $query)){
			return @mysql_fetch_assoc($rs);
		}

		if(preg_match ("~^select~i", $query)){
			return @mysql_fetch_assoc($rs);
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

			$rs = @mysql_query($query);

			if ($rs === false) {
				if ($dieOnError)
				{
					self::handleError('mysql_query');
				} else
				{
					if (libx::isDeveloper())
					{
						$errno = mysql_errno(self::$link);
						$error = mysql_error(self::$link);
						echo "<pre>SQL-ERROR: $errno - $error</pre>";
					}
				}
				return false;
			}

			$nr = @mysql_num_rows($rs);

			if ($nr == 0)
			{
				return false;
			}

			$master_record = array();

			for($i=0;$i<$nr;$i++)
			{
				if (!@mysql_data_seek ($rs, $i)) self::handleError('mysql_data_seek');

				if(!$row = @mysql_fetch_assoc ($rs) )
				{
					self::_handleError('mysql_fetch_assoc');
				}

				$master_record[] = $row;
			}

			return $master_record;
		} else
		{
			$rs = @mysql_query($query);

			if ($rs === false) {
				self::handleError('mysql_query');
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
				$da .= "'".mysql_real_escape_string($value,self::$link)."', ";
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
			$sql .= "`".$name."` = '".mysql_real_escape_string($data,self::$link)."' AND ";
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
			$sql .= "`".$column."` = '".mysql_real_escape_string($value,self::$link)."', ";
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
							$sql .= "`".$or_key."` = '".mysql_real_escape_string($or_value[$or],self::$link)."' OR ";
						}
						else
						{
							$sql .= "`".$or_key."` = '".mysql_real_escape_string($or_value,self::$link)."' OR ";
						}
					}
					$sql = substr($sql, 0, -3);
					$sql .= ") AND ";
				}
				else
				{
					$sql .= "`".$name."` = '".mysql_real_escape_string($data,self::$link)."' AND ";
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
		return mysql_real_escape_string($field,self::$link);
	}

	public static function _listFields($table){
		$sql = "SHOW COLUMNS FROM ".$table;
		return self::queryAll($sql);
	}


	public static function exportTableStructure($dir,$table)
	{
		$file_alter 	= $dir.'/'.$table.'.alter.json';
		$file_create	= $dir.'/'.$table.'.create.sql';

		/* FOR ALTERING BEGIN */
		$inspect  	= array();
		$data 		= dbx::queryAll("SHOW FULL COLUMNS FROM ".$table);
		if (!is_array($data)) $data = array();

		foreach ($data as $field)
		{
			$fieldName = $field['Field'];
			$inspect['FIELD_CFG'][$fieldName] = $field;
		}

		hdx::fwrite($file_alter,json_encode($inspect));
		/* FOR ALTERING END */

		/* FOR CREATING BEGIN */
		$out 		= array();
		$mysql_u	= Ixcore::DB_USER;
		$mysql_p	= Ixcore::DB_PWD;
		$mysql_db	= Ixcore::DB_NAME;
		$cmd = "mysqldump -u \"$mysql_u\" -p\"$mysql_p\" \"$mysql_db\" \"$table\" > '$file_create' 2>&1";
		exec($cmd,$out);

		$data 		= file($file_create);
		$copy 		= false;
		$cleanSql 	= array();
		foreach ($data as $line)
		{
			if (strpos(strtoupper($line),'CREATE TABLE') !== false) $copy = true;
			if ($copy === false)
			{
				continue;
			}
			if (strpos($line,';') !== false) {
				$cleanSql[] = $line;
				break;
			}
			if ($copy) $cleanSql[] = $line;
		}
		hdx::fwrite($file_create,implode("",$cleanSql));
		/* FOR CREATING END*/
	}

	public static function importTableStructure($dir,$table)
	{
		$debug = true;

		$file_alter 	= $dir.'/'.$table.'.alter.json';
		$file_create	= $dir.'/'.$table.'.create.sql';

		if (!self::tablePresent($table))
		{
			$sql = str_replace("\n","",hdx::fread($file_create));
			dbx::query($sql);
			return true;
		}

		$structure = json_decode(hdx::fread($file_alter),true);

		foreach ($structure['FIELD_CFG'] as $field)
		{

			if ($debug)
			{
				echo "<pre>";
				print_r($field);
				echo "</pre>";
			}

			$fieldName 	= $field['Field'];
			$_Type 		= $field['Type'];
			$_Default 	= $field['Default'];
			$_Comment 	= $field['Comment'];
			$_Null 		= $field['Null'];
			$_Key		= $field['Key'];

			if ($_Key == 'PRI') continue; /// PRI KEYS ARE NOT CHECKED !!!

			if ($_Null == 'NO') $_Null = " NOT NULL ";

			$mode = " CHANGE `$fieldName` ";
			if (!self::attributePresent($table,$fieldName))
			{
				$mode = " ADD ";
			}

			$sql = "ALTER TABLE `$table` $mode `$fieldName` $_Type  $_Null COMMENT '$_Comment'";
			if ($debug)
			{
				echo "$sql<br>";
			}
			dbx::query($sql);
		}
	}

	public static function exportTableDoubleTableDataFlexibaleInsert($dir,$cfg)
	{

		$mainTable 			= $cfg['table_main']['name'];
		$mainTablePid 		= $cfg['table_main']['pid'];

		$childrenTable 		= $cfg['table_childern']['name'];
		$childrenTablePid 	= $cfg['table_childern']['pid'];
		$childrenTableFilter= $cfg['table_childern']['filter'];

		$cross_child_field = "";
		$cross_main_field  = "";

		foreach ($cfg['table_childern']['patching'] as $k => $v)
		{
			$cross_child_field 	= $k;
			$cross_main_field 	= $v;
		}

		$data2store = array();
		$data2store['cfg'] = $cfg;
		$data2store['table_main_data'] = dbx::queryAll("select * from $mainTable where ".implode(" AND ",$cfg['table_main']['selectors']));
		$data2store['table_main_childern'] = array();

		foreach ($data2store['table_main_data'] as $mr)
		{
			$pid = $mr[$mainTablePid];
			$data2store['table_main_childern'][$pid] = dbx::queryAll("select * from $childrenTable where $cross_child_field = ".$mr[$cross_main_field]." AND ".implode(' AND ',$childrenTableFilter));
		}

		$file_create	= $dir.'/'.$mainTable.'.data.json';
		hdx::fwrite($file_create,json_encode($data2store));
	}

	public static function importTableDoubleTableDataFlexibaleInsert($dir,$mainTable)
	{
		return;
		$debug = true;
		$file_create	= $dir.'/'.$mainTable.'.data.json';
		$data2store 	= json_decode(hdx::fread($file_create),true);

		$cfg = $data2store['cfg'];

		$mainTable 			= $cfg['table_main']['name'];
		$mainTablePid 		= $cfg['table_main']['pid'];
		$mainTableFid 		= $cfg['table_main']['fid'];
		$mainTableMatch 	= $cfg['table_main']['math_field'];

		$childrenTable 		= $cfg['table_childern']['name'];
		$childrenTablePid 	= $cfg['table_childern']['pid'];
		$childrenTableFid 	= $cfg['table_childern']['fid'];
		$childrenTableMatch	= $cfg['table_childern']['math_field'];
		$childrenTableFilter= $cfg['table_childern']['filter'];
		$childrenTableFilter= $cfg['table_childern']['filter'];




		$cross_child_field = "";
		$cross_main_field  = "";

		foreach ($cfg['table_childern']['patching'] as $k => $v)
		{
			$cross_child_field 	= $k;
			$cross_main_field 	= $v;
		}


		$oldNewIds_main 	= array();
		$oldNewIds_child 	= array();

		foreach ($data2store['table_main_data'] as $mainData)
		{
			$oldDB_primaryID_main = $mainData[$mainTablePid];

			$mainDataClean = $mainData;
			unset($mainDataClean[$mainTablePid]);


			$mainTableMatchValue = $mainData[$mainTableMatch];
			$mainRecordPresent = dbx::query("select * from $mainTable where $mainTableMatch = $mainTableMatchValue");

			if ($mainRecordPresent === false)
			{
				if ($debug)
				{
					echo "MR - MISSING [$mainTableMatchValue]\n";
				}
				$currentDB_primaryID_main = dbx::insert($mainTable,$mainDataClean);
			} else
			{
				if ($debug)
				{
					echo "MR - PRESENT [$mainTableMatchValue]\n";
				}
				$currentDB_primaryID_main = $mainRecordPresent[$mainTablePid];
				dbx::update($mainTable,$mainDataClean,array($mainTablePid=>$currentDB_primaryID_main));
			}


			$oldNewIds_main[$oldDB_primaryID_main] = $currentDB_primaryID_main;

			$mainRecordPresent = dbx::query("select * from $mainTable where $mainTableMatch = $mainTableMatchValue");


			/** CHILDREN **/
			foreach ($data2store['table_main_childern'][$oldDB_primaryID_main] as $child)
			{
				$oldDB_primaryID = $child[$childrenTablePid];
				$childrenTableMatchValue = trim($child[$childrenTableMatch]);
				$childDataClean = $child;
				unset($childDataClean[$childrenTablePid]);

				if ($childrenTableMatchValue == "")
				{
					if ($debug)
					{
						echo "CR - INVALID MATH_VALUE\n";
						print_r($child);
					}
					continue;
				}

				$sql = "select * from $childrenTable where $childrenTableMatch = '$childrenTableMatchValue' and $cross_child_field =  $currentDB_primaryID_main";
				$childRecordPresent = dbx::query($sql);


				if ($childRecordPresent === false)
				{
					if ($debug)
					{
						echo "CR - MISSING [$childrenTableMatchValue]\n";
					}
					$currentDB_primaryID = dbx::insert($childrenTable,$childDataClean);
				} else
				{
					if ($debug)
					{
						echo "CR - PRESENT [$childrenTableMatchValue]\n";
					}
					$currentDB_primaryID = $childRecordPresent[$childrenTablePid];
					$childDataClean[$cross_child_field] = $mainRecordPresent[$cross_main_field];
					dbx::update($childrenTable,$childDataClean,array($childrenTablePid=>$currentDB_primaryID));
				}

				$oldNewIds_child[$oldDB_primaryID] = $oldDB_primaryID;
			}
		}

		/* FIX PARENTS */

		foreach ($data2store['table_main_data'] as $mainData)
		{
			$oldDB_primaryID 		= $mainData[$mainTablePid];
			$currentDB_primaryID 	= $oldNewIds_main[$oldDB_primaryID];
			$oldFather 				= $mainData[$mainTableFid];
			$newFather 				= 0;

			if (isset($oldNewIds_main[$oldFather]))
			{
				$newFather = $oldNewIds_main[$oldFather];
			}

			dbx::update($mainTable,array($mainTableFid=>$newFather),array($mainTablePid=>$currentDB_primaryID));

			/** CHILDREN **/
			foreach ($data2store['table_main_childern'][$oldDB_primaryID] as $child)
			{
				$oldDB_primaryID 		= $child[$childrenTablePid];
				$currentDB_primaryID 	= $oldNewIds_child[$oldDB_primaryID];
				$oldFather 				= $child[$childrenTableFid];
				$newFather 				= 0;

				if (isset($oldNewIds_child[$oldFather]))
				{
					$newFather = $oldNewIds_child[$oldFather];
				}

				dbx::update($childrenTable,array($childrenTableFid=>$newFather),array($childrenTablePid=>$currentDB_primaryID));
			}
		}
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
	* pointer, then performs mysql_fetch_assoc on the resource from it's
	* new location.
	*
	* @return array
	*/

	public function current()
	{
		mysql_data_seek($this->MysqlObject, $this->position);
		return mysql_fetch_assoc($this->MysqlObject);
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
		return is_array(mysql_fetch_assoc($this->MysqlObject));
	}

	/**
	* Returns the number of rows in the query, used for the count() function
	* @return int
	*/

	public function count()
	{
		return mysql_num_rows($this->MysqlObject);
	}

	public function fetch()
	{
		return mysql_fetch_assoc($this->MysqlObject);
	}
}

