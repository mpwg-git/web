<?

class xredaktor_wizard_do_magic_grid
{

	public static function getBackendLang()
	{
		return "DE";
	}

	public static function getValidFields($a)
	{

	}

	public static function getNotSetReturn()
	{
		return "[X]";
	}

	public static function getRecordById($wz_id,$r_id) {

		if ($wz_id == 0) return false;

		$wz_id 	= intval($wz_id);
		$r_id 	= intval($r_id);

		$title	= self::getTitleItSql($wz_id);

		$table 	= xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$sql 	= "select *,$title from $table where wz_id = $r_id and wz_del = 'N'";

		return dbx::query($sql);

	}


	public static function getQuerySqlByFieldType($as,$q)
	{
		$sql	 	= "";
		$as_type 	= $as['as_type'];
		$as_name	= $as['as_name'];

		$field 		= self::getMultiLangFieldName($as);
		$table  	= self::getTableName(intval($as['as_a_id']));

		if (dbx::attributePresent($table,$field)) {
			$_qPart = array();
			foreach ($q as $_q)
			{
				$_q = trim($_q);
				if ($_q=="") continue;
				$_qPart[] = " (`$table`.`".$field."` LIKE '%$_q%') ";
			}

			$sql = " (".implode(" OR ",$_qPart)." )";
			return $sql;

		}

		return false;
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


	public static function manageMysqlFunction_titleIt($a_id)
	{

		$funcName 	= self::getMysqlFuncNameOfTitleIt($a_id);
		$table		= xredaktor_wizards::genWizardTableNameBy_a_id($a_id);

		$sql		= self::getTitleItFieldCombi($a_id);

		//$sql_drop 	= "DROP FUNCTION IF EXISTS $funcName;	";



		$sql_create = " CREATE FUNCTION `$funcName`(id INT) RETURNS text CHARSET latin1
BEGIN
DECLARE titleIt TEXT;
SELECT ($sql) as titleItX INTO titleIt FROM wizard_auto_442 WHERE wz_id = id;
RETURN titleIt;
END
";

		$sql_alter = "DROP FUNCTION IF EXISTS $funcName; CREATE FUNCTION `$funcName`(id INT) RETURNS text CHARSET latin1
BEGIN
DECLARE titleIt TEXT;
SELECT ($sql) as titleItX INTO titleIt FROM wizard_auto_442 WHERE wz_id = id and wz_del='N';
RETURN titleIt;
END
";

		if (self::isFunctionPresent($funcName)) {
			dbx2::mQuery($sql_alter);
		} else {
			dbx2::query($sql_create);
		}



		//dbx2::query($sql_drop);
	}



	public static function getMysqlFuncNameOfTitleIt($a_id)
	{
		return "xr_getWzTitleIt_".intval($a_id);
	}


	public static function checkExtendedWizardFunctions($a_id)
	{

		$funcName = self::getMysqlFuncNameOfTitleIt($a_id);
		//echo (self::isFunctionPresent($funcName) === false) ? 'NO' : 'YES';
		self::manageMysqlFunction_titleIt($a_id);

		// 1 check if titleit func gibt
		// sicherheitshalber droppen und nue anlegen
		// forschleife von titleit machen
		// createn
		// eine komplette prepared sql function platzieren



		die();
	}

	public static function getSqlByFieldType($as,$fixFieldName=true)
	{
		$sql	 	= "";
		$as_type 	= $as['as_type'];
		$as_name	= $as['as_name'];

		$field = self::getMultiLangFieldName($as);

		switch ($as_type)
		{
			case 'WIZARD':

				$as_config = intval($as['as_config']);
				if ($as_config == 0) return false; // wrong config

				$titleIt 	= self::getTitleItSql($as_config);
				$table  	= self::getTableName(intval($as['as_a_id']));
				$ftable  	= self::getTableName($as_config);
				$notSet		= self::getNotSetReturn();


				$sql = "IFNULL((SELECT $titleIt from $ftable where $ftable.wz_id = $table.$field),'$notSet') ";

				if ($fixFieldName)
				{
					$sql .= " as $field ";
				}

				return $sql;

				break;

			case 'WIZARDLIST':


				$as_config 	= intval($as['as_config']); // 1301
				if ($as_config == 0) return false; // wrong config


				$f_a		= xredaktor_atoms::getARecordBy_as_id($as_config);
				$f_a_id		= intval($f_a['a_id']);


				self::checkExtendedWizardFunctions($f_a_id);

				die("___".$f_a_id);


				$f_as		= xredaktor_atoms_settings::getById($as_config);
				$titleIt_f 	= self::getTitleItFieldCombi($f_a_id);
				$table_f	= self::getTableName($f_a_id);
				$f_attrib	= 'wz_'.$f_as['as_name'];
				$table 		= self::getTableName(intval($as['as_a_id']));

				$sql = " ( select $titleIt_f from $table_f where $table_f.wz_del='N' and ($table_f.$f_attrib = $table.wz_id) LIMIT 1 ) ";
				$sql = " ( select GROUP_CONCAT(GROUPMYPLEASE SEPARATOR ',') from ( select $titleIt_f as GROUPMYPLEASE from $table_f where $table_f.wz_del='N' and ($table_f.$f_attrib = $table.wz_id)) as superdupa2 )  ";
				$sql = " ( select GROUP_CONCAT(GROUPMYPLEASE SEPARATOR ',') from ( select $titleIt_f as GROUPMYPLEASE from $table_f where $table_f.wz_del='N' ) as superdupa2 )  ";
				$sql = " GROUP_CONCAT( ($titleIt_f) SEPARATOR ',') ";

				if ($fixFieldName)
				{
					$sql .= " as $field ";
				}


				return $field;

				break;

			case 'SIMPLE_W2W': // NOOOOO MULTILANG SUPPORT

			$field		= "wz_".$as_name."";

			$a_id 		= $as['as_a_id'];
			$as_config 	= intval($as['as_config']);
			if ($as_config == 0) return false; // wrong config

			$titleIt 	= self::getTitleItSql($as_config);
			$table_f	= self::getTableName($as_config);
			$table  	= self::getTableName(intval($as['as_a_id']));

			if ($a_id < $as_config)
			{
				$w2w_table 	= "wizard_auto_SIMPLE_W2W_".$a_id."_".$as_config;
				$sql		= "(select $titleIt from $table_f,$w2w_table where $w2w_table.wz_id_low = $table.wz_id and $table_f.wz_id = $w2w_table.wz_id_high LIMIT 1) ";
			} else
			{
				$w2w_table 	= "wizard_auto_SIMPLE_W2W_".$as_config."_".$a_id;
				$sql		= "(select $titleIt from $table_f,$w2w_table where $w2w_table.wz_id_high = $table.wz_id and $table_f.wz_id = $w2w_table.wz_id_low LIMIT 1) ";
			}

			if ($fixFieldName)
			{
				$sql .= " as $field ";
			}

			return $sql;
			break;

			case 'COMBO':
			case 'TEXT':
			case 'TEXTAREA':
			case 'DATE':
			case 'TIME':
			case 'TIMESTAMP':
				$sql = $field;
				return $sql;
				break;
			default:
				return false;
				break;
		}

		return $sql;
	}



	public static function getGridFields($a_id)
	{
		$a_id 		= intval($a_id);
		$as_fields 	= dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del='N' and as_useAsHeader = 'Y' and (as_gui = 'NORMAL' || as_gui = 'READONLY') ORDER BY as_useAsHeaderSort ASC");
		if ($as_fields === false) $as_fields = array();
		return $as_fields;
	}


	public static function getExportFields($a_id)
	{
		$a_id 		= intval($a_id);
		$as_fields 	= dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del='N' and as_use4Export = 'Y' and (as_gui = 'NORMAL' || as_gui = 'READONLY') ORDER BY as_use4ExportSort ASC");
		if ($as_fields === false) $as_fields = array();
		return $as_fields;
	}


	public static function getTitleItFields($a_id)
	{

		$a_id 				= intval($a_id);
		$settings 			= xredaktor_wizards::getWizardSettings($a_id);


		$es_titleSettings 	= trim($settings['es_titleSettings']);

		if ($es_titleSettings == "") return false;

		$relations 			= explode("\n",$es_titleSettings);
		$name 				= "";

		$fields				= array();

		foreach ($relations as $line)
		{
			if (is_numeric($line))
			{
				switch ($line)
				{
					case -1:
						$fields[] = $record['wz_id'];
						break;
					default:

						$as_id 	= intval($line);
						$ass 	= xredaktor_atoms_settings::getById($as_id);

						if ($ass !== false)
						{
							$fields[] = 'wz_'.$ass['as_name'];
						}

						break;
				}
			}
		}

		return $fields;
	}

	public static function getBE_USER_LANG()
	{
		return "EN";
	}

	public static function getMultiLangFieldName($as)
	{
		if ($as['as_type_multilang'] == 'Y')
		{
			return '_'.self::getBE_USER_LANG().'_wz_'.$as['as_name'];
		}


		return 'wz_'.$as['as_name'];
	}

	public static function getTitleItFieldCombi($a_id)
	{

		$a_id 				= intval($a_id);
		$settings 			= xredaktor_wizards::getWizardSettings($a_id);
		$table				= self::getTableName($a_id);


		$es_titleSettings 	= trim($settings['es_titleSettings']);
		$final				= array();

		if ($es_titleSettings != "")
		{
			$relations 			= explode("\n",$es_titleSettings);
			$name 				= "";
			$part 				= "";


			foreach ($relations as $line)
			{
				if (is_numeric($line))
				{
					switch ($line)
					{
						case -1:
							$final[] = $table.".".$record['wz_id'];
							break;
						default:

							$as_id 	= intval($line);
							$ass 	= xredaktor_atoms_settings::getById($as_id);

							if ($ass !== false)
							{
								$final[] = $table.'.'.self::getMultiLangFieldName($ass);
							}

							break;
					}
				} else
				{
					$final[] = "'".$line."'";
				}
			}
		}

		if (count($final) == 0) $final = array("'['",$table.".wz_id","']'");

		$sql = " TRIM(CONCAT(".implode(" , ' ' , ",$final).")) ";
		return $sql;
	}

	public static function getTitleItSql($a_id)
	{
		return self::getTitleItFieldCombi($a_id)." as titleIt ";
	}

	public static function getRequestQuery($a_id)
	{

	}

	public static function getRequestSorter($a_id)
	{

	}

	public static function getRequestFilter($a_id)
	{

	}

	public static function getTableName($a_id)
	{
		return xredaktor_wizards::genWizardTableNameBy_a_id($a_id);
	}


	public static function getCleanFilters($a_id,$filters)
	{
		if (!is_array($filters)) return false;
		$final = array();

		$table 	= self::getTableName($a_id);
		$assoz	= array();
		$fields = self::getGridFields($a_id);
		foreach ($fields as $as) {
			$assoz[self::getMultiLangFieldName($as)] = $as;
		}

		foreach ($filters as $f)
		{
			$field = $f['field'];
			if ($field == "titleIt") 	$final[] = $f;
			if (isset($assoz[$field])) 	$final[] = $f;
		}

		if (count($final)==0) return false;
		return $final;
	}

	public static function getFilterSql($a_id,$filters)
	{

		$sql 	= "";
		$table 	= self::getTableName($a_id);

		$assoz	= array();
		$fields = self::getGridFields($a_id);

		foreach ($fields as $as) {
			$assoz[self::getMultiLangFieldName($as)] = $as;
		}

		if ($filters)
		{
			$filters = self::getCleanFilters($a_id,$filters);
			//print_r($filters);

			if ($filters !== false) {


				$where = ' 0 = 0 ';
				$qs = '';
				$qsAll = array();


				for ($i=0;$i<count($filters);$i++)
				{
					$filter = $filters[$i];

					$field 		= $filter['field'];
					$value 		= trim($filter['value']);
					$compare 	= isset($filter['comparison']) ? $filter['comparison'] : null;
					$filterType = $filter['type'];

					if ($field == 'titleIt')
					{
						$field = self::getTitleItFieldCombi($a_id);
					} else
					{
						if (!isset($assoz[$field])) continue;
						$as 	= $assoz[$field];
						$field 	= self::getSqlByFieldType($as,false);
					}

					$qs 	= array();
					$field 	= "$field";

					switch($filterType){
						case 'string' : $qs[] =  " ".$field." LIKE '%".$value."%'"; Break;
						case 'list' :
							if (is_array($value)) {
								$fi = $value;
								for ($q=0;$q<count($fi);$q++){
									$fi[$q] = "'".$fi[$q]."'";
								}
								$value = implode(',',$fi);
								$qs[] = " ".$field." IN (".$value.")";
							}else{
								$qs[] = " ".$field." = '".$value."'";
							}
							Break;
						case 'boolean' : $qs[] = " ".$field." = ".($value); Break;
						case 'numeric' :
							switch ($compare) {
								case 'eq' : $qs[] = " ".$field." = ".$value; Break;
								case 'lt' : $qs[] = " ".$field." < ".$value; Break;
								case 'gt' : $qs[] = " ".$field." > ".$value; Break;
							}
							Break;
						case 'date' :
							switch ($compare) {
								case 'eq' : $qs[] = " ".$field." = '".date('Y-m-d',strtotime($value))."'"; Break;
								case 'lt' : $qs[] = " ".$field." < '".date('Y-m-d',strtotime($value))."'"; Break;
								case 'gt' : $qs[] = " ".$field." > '".date('Y-m-d',strtotime($value))."'"; Break;
							}
							Break;
						default: die('INVALID');
					}

					$qsAll[] = implode(" AND ",$qs);

				}

				if (count($qsAll)>0) {
					$sql = ' AND ('.implode(" AND ",$qsAll).' ) ';

				} else
				{
					$sql = '';
				}
			}
		}




		//die(">>>>>>>>>>>>>>>>>".$sql);

		return $sql;
	}

	public static function getFinalSqlStatement($a_id,$fields=array(),$start=0,$limit=100,$query=false,$filters=false,$asFilters=false,$sorter=false,$defaultNumericQueryAddons=false,$the3musts=false)
	{
		// CHECK INPUTS
		if (!is_array($fields)) $fields = array();

		$start = intval($start);
		$limit = intval($limit);


		// DO THE WORK
		$table	= self::getTableName($a_id);

		////
		$sql 	= "";
		$sqlCnt = "";
		$sql	.= "select ";
		$sqlCnt	.= "select count($table.wz_id) as cntx ";

		// FIELDS

		$tmp 	= array();

		$tmp[] 	= "wz_id";
		$tmp[] 	= "wz_sort";
		$tmp[] 	= "wz_online";
		$tmp[] 	= "wz_tm_id";
		$tmp[] 	= "(select tm_name from timemachine where tm_id = wz_tm_id) as wz_tm_name";

		if (($tmpx = self::getTitleItSql($a_id)) !== false)
		{
			$tmp[] = $tmpx;
		}

		foreach ($fields as $f)
		{
			$tmpx = self::getSqlByFieldType($f);
			if ($tmpx === false) continue;
			$tmp[] = $tmpx;
		}

		$sql .= implode(",",$tmp);

		// FROM

		//$sql.= " from $table where wz_id=9 ";
		$sql	.= " from $table where wz_del = 'N' ";
		$sqlCnt	.= " from $table where wz_del = 'N' ";

		// WHERE
		if (($query !== false) && (trim($query)!=''))
		{

			$q 		= dbx::escape($query);
			$q  	= explode(" ",$q);
			$tmp 	= array();

			// REGULAR FIELDS
			foreach ($fields as $f)
			{
				$tmpx = self::getQuerySqlByFieldType($f,$q);
				if ($tmpx === false) continue;
				$tmp[] = $tmpx;
			}


			// TITLE IT FIELDS
			$extrFields 	= self::getTitleItFields($a_id);
			if (!in_array('wz_id',$extrFields)) {
				$extrFields[] 	= "wz_id";
			}

			foreach ($extrFields as $fieldx)
			{
				if (dbx::attributePresent($table,$fieldx)) {
					$_qPart = array();
					foreach ($q as $_q)
					{
						$_q = trim($_q);
						if ($_q=="") continue;
						$_qPart[] = " (`$table`.`".$fieldx."` LIKE '%$_q%') ";
					}
					$tmp[] = " (".implode(" OR ",$_qPart)." )";
				}
			}

			if (count($tmp)>0)
			{
				$sql 	.= " AND ( ".implode(" OR ",$tmp)." ) ";
				$sqlCnt .= " AND ( ".implode(" OR ",$tmp)." ) ";
			}
		}

		// FILTERS
		$filterSql 	= self::getFilterSql($a_id,$filters);
		$sql 		.= $filterSql;
		$sqlCnt 	.= $filterSql;

		// AS-FILTERS
		if (count($asFilters)>0)
		{
			$tmp = array();

			foreach ($asFilters as $as_id => $value)
			{
				$as = xredaktor_atoms_settings::getById($as_id);
				if ($as === false) continue;

				if ($as['as_a_id'] != $a_id) continue;


				if ($as['as_type'] == "SIMPLE_W2W")
				{
					$sqlIn = xredaktor_gui::getGenericDataSetsLoaderSql($as_id,$value);
					$tmp[] = " (wz_id IN ($sqlIn)) ";

				}
			}

			if (count($tmp)>0)
			{
				$sql 	.= " AND ( ".implode(" AND ",$tmp)." ) ";
				$sqlCnt .= " AND ( ".implode(" AND ",$tmp)." ) ";
			}

		}


		/**************************************************************************************************************************************/
		/**************************************************************************************************************************************/
		/**************************************************************************************************************************************/
		/**************************************************************************************************************************************/
		/**************************************************************************************************************************************/


		if ($defaultNumericQueryAddons !== false) {


			$_query = json_decode($defaultNumericQueryAddons,true);


			$append = array();

			foreach ($_query as $_asID => $_pack) {
				if ($_asID == 'titleIt')
				{

					$fieldX 	= self::getTitleItFieldCombi($a_id);
					$_0_pack 	= explode(" ",$_pack);
					$twu 		= array();

					foreach ($_0_pack as $_1_pack)
					{
						$_1_pack = trim($_1_pack);
						$twu[] = " ( $fieldX LIKE '%$_1_pack%' ) ";
					}

					if (count($twu)>0)
					{
						$append[] = "(".implode(' AND ',$twu).") ";
					}

				} else
				{
					$_asID = intval($_asID);
					if ($_asID == 0) continue;
					$as = xredaktor_atoms_settings::getById($_asID);
					if ($as === false) continue;
					//$as_name = 'wz_'.$as['as_name'];

					if ($as['as_type'] == "SIMPLE_W2W")
					{
						if (!is_array($_pack)) $_pack = array($_pack);
						foreach ($_pack as $__pack)
						{
							if (!is_numeric($__pack)) continue;
							$sqlIn = xredaktor_gui::getGenericDataSetsLoaderSql($as['as_id'],$__pack);
							$append[] = " (wz_id IN ($sqlIn)) ";
						}
					} else
					{
						if ($as['as_type_multilang'] == 'N')
						{

							$_0_pack 	= explode(" ",$_pack);
							$twu 		= array();

							$fieldX = self::getSqlByFieldType($as,false);

							foreach ($_0_pack as $_1_pack)
							{
								$_1_pack = trim($_1_pack);
								$twu[] = " $fieldX LIKE '%$_1_pack%' ";
							}

							$append[] = "(".implode(' AND ',$twu).") ";
						}
					}
				}

			}

			if (count($append)>0)
			{
				$sql 	.= ' AND '.implode(" AND ",$append);
				$sqlCnt .= ' AND '.implode(" AND ",$append);
			}
		}

		if ($the3musts !== false) {

			$_query = json_decode($the3musts,true);
			$append = array();

			foreach ($_query as $_asID) {

				$as = xredaktor_atoms_settings::getById($_asID);
				if ($as === false) continue;

				//$as_name = 'wz_'.$as['as_name'];
				if ($as['as_type'] == "SIMPLE_W2W")
				{
					$sqlIn = xredaktor_gui::getGenericDataSetsLoaderSql($as['as_id'],$table.'.wz_id',true);
					$append[] = " (wz_id IN ($sqlIn)) ";
				}
			}

			if ((count($append)>0)) {
				$sql 	.= " AND ".implode(" AND ",$append);
				$sqlCnt .= " AND ".implode(" AND ",$append);
			}


		}

		/**************************************************************************************************************************************/
		/**************************************************************************************************************************************/
		/**************************************************************************************************************************************/
		/**************************************************************************************************************************************/
		/**************************************************************************************************************************************/


		// SORT
		if ($sorter !== false)
		{
			$sql.= " ORDER BY ";
			$tmp = array();

			foreach ($sorter as $s)
			{
				$field = $s['property'];

				if (!in_array($field,array('wz_id','titleIt','wz_online','wz_tm_id')))
				{
					if (!dbx::attributePresent($table,$field)) continue;
				}

				$tmp[] = $field." ".$s['direction'];
			}

			$sql.= implode(",",$tmp);
		} else {

			if (dbx::attributePresent($table,'wz_sort')) 
			{
				$sql .= " order by wz_sort ASC";
			}

		}

		// LIMITER
		$sql.= " LIMIT $start,$limit";

		return array('sql'=>$sql,'cntx'=>$sqlCnt);
	}




	public static function load($a_id, $export=false)
	{

		$table	= self::getTableName($a_id);
		if (!dbx::tablePresent($table)) {
			frontcontrollerx::json_failure("Wizard ist nicht richtig konfiguriert.");
		}

		$filters 	= json_decode($_REQUEST['filter'],true);
		$sorter 	= json_decode($_REQUEST['sort'],true);
		if (count($sorter)==0) $sorter = false;

		$limit 		= intval($_REQUEST['limit']);
		$start 		= intval($_REQUEST['start']);

		if ($export === false)
		{
			if ($limit > 100) frontcontrollerx::json_failure("LIMIT_TOO_BIG ".$limit);
		} else
		{
			$limit = 100000000;
		}

		// AS - FILTERS
		$asFilters = array();
		if (is_numeric($_REQUEST['wzListScope'])&&is_numeric($_REQUEST['wzListScopeID']))
		{
			$scope_r_id		= intval($_REQUEST['wzListScopeID']);
			$scope_as_id	= intval($_REQUEST['wzListScope']);
			$asFilters[$scope_as_id] = $scope_r_id;
		}


		if ($export === false)
		{
			$fields = self::getGridFields($a_id);
		} else
		{
			$fields = self::getExportFields($a_id);
		}



		$defaultNumericQueryAddons 	= false;
		$the3musts 					= false;

		if (isset($_REQUEST['defaultNumericQueryAddons'])) {
			$defaultNumericQueryAddons = $_REQUEST['defaultNumericQueryAddons'];
		}

		if (isset($_REQUEST['the3musts'])) {
			$the3musts = $_REQUEST['the3musts'];
		}

		$sqlObj	= self::getFinalSqlStatement($a_id,$fields,$start,$limit,$_REQUEST['_query'],$filters,$asFilters,$sorter,$defaultNumericQueryAddons,$the3musts);




		$sql 		= $sqlObj['sql'];
		$sql_cntx 	= $sqlObj['cntx'];

		if ($export === false)
		{

			$nodes 		= dbx::queryAll($sql);
			$totalCount = intval(dbx::queryAttribute($sql_cntx,"cntx"));
			frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));

		} else
		{

			$nodes 	= dbx::queryAll($sql,false);
			$csv 	= array();

			foreach ($nodes as $line =>$n)
			{

				if ($line == 0)
				{
					$tmp = array();
					foreach ($n as $k => $v)
					{
						$tmp[] = self::saveCsvString($k);
					}
					$csv[] = implode(";",$tmp);
				}


				$tmp = array();
				foreach ($n as $k => $v)
				{
					$tmp[] = self::saveCsvString($v);
				}
				$csv[] = implode(";",$tmp);

			}

			$csv 		= implode("\n",$csv);

			$fileName	= trim(basename($_REQUEST['filename']));
			if ($fileName == "") $fileName = "BTDB_EXPORT";

			$fileName 	.= ".csv";

			header('Content-Encoding: UTF-8');
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream;charset=UTF-8');
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Content-Length: ' . strlen($csv)+1);
			ob_clean();
			flush();

			echo "\xEF\xBB\xBF";

			die($csv);
		}
	}

	private static function saveCsvString($s)
	{
		$s = str_replace('"','""',$s);
		return '"'.$s.'"';
	}

}