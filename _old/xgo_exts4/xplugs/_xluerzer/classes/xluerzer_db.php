<?

class xluerzer_db
{


	public static function handleDefaultExtGrid($extFunctionsConfig,$function)
	{

		$extFunctionsConfig = xredaktor_roles::updatePermissionSetup($extFunctionsConfig,$function);

		switch ($function)
		{
			case 'load':
				frontcontrollerx::processExtGrid_load($extFunctionsConfig,	'xluerzer_db::getAll');
				die();
			case 'update':
				frontcontrollerx::processExtGrid_update($extFunctionsConfig,'xluerzer_db::updateById');
				die();
			case 'insert':
				frontcontrollerx::processExtGrid_insert($extFunctionsConfig,'xluerzer_db::insertBlank');
				die();
			case 'move':
				frontcontrollerx::processExtGrid_move($extFunctionsConfig,	'xluerzer_db::reorderSortGrid');
				die();
			case 'remove':
				frontcontrollerx::processExtGrid_remove($extFunctionsConfig, 'xluerzer_db::remove');
				die();
			default: break;
		}
	}


	public static function insertBlank($extFunctionsConfig)
	{

		$db = trim($extFunctionsConfig['db']);
		if ($db != "")
		{
			dbx2::select_database($db);
		}


		switch ($extFunctionsConfig['scope']) {
			case 'e_submissioncredits':

				// ohne auto increment
				$sql_data 	= "SELECT MAX(".$extFunctionsConfig['pid'].") as max FROM ".$extFunctionsConfig['table'];
				$data 		= dbx2::query($sql_data);
				$max 		= intval($data['max']);
				$max++;

				$sql_data 	= "INSERT INTO `".$extFunctionsConfig['table']."` (`".$extFunctionsConfig['pid']."`) VALUES (".$max.")";
				$data 		= dbx2::query($sql_data);

				frontcontrollerx::json_success(array('record'=> $max));
				break;

			default:
				// ohne auto increment
				$sql_data 	= "SELECT MAX(".$extFunctionsConfig['pid'].") as max FROM ".$extFunctionsConfig['table'];
				$data 		= dbx2::query($sql_data);
				$max 		= intval($data['max']);
				$max++;

				$sql_data 	= "INSERT INTO `".$extFunctionsConfig['table']."` (`".$extFunctionsConfig['pid']."`) VALUES (".$max.")";
				$data 		= dbx2::query($sql_data);

				frontcontrollerx::json_success(array('record'=> $max));

		}


	}


	public static function remove($extFunctionsConfig)
	{

		$db = trim($extFunctionsConfig['db']);
		if ($db != "")
		{
			dbx2::select_database($db);
		}

		$params = $_POST['ids'];

		$sql_data 	= "DELETE FROM `".$extFunctionsConfig['table']."` WHERE ".$extFunctionsConfig['pid']." IN (".dbx2::escape($params).")";
		// die ("debug: ".$sql_data);
		$data 		= dbx2::query($sql_data);

		frontcontrollerx::json_success(array('record'=> $data));
	}


	public static function getAll($extFunctionsConfig)
	{

		$db = trim($extFunctionsConfig['db']);
		if ($db != "")
		{
			dbx2::select_database($db);
		}

		$fields = $extFunctionsConfig['fields'];

		if (isset($extFunctionsConfig['preHooks']['load']))
		{
			frontcontrollerx::safeCallUserFunction($extFunctionsConfig['preHooks']['load']);
		}

		$pageingModus = ($_REQUEST['doPaging'] == 1);

		$var_del 	= xredaktor_defaults::_getDel($extFunctionsConfig);

		/*************************************************************************************************************
		*** INJECTORS BEGIN
		****/

		$preSQL		= "";
		$extraSQL 	= "";
		if (isset($extFunctionsConfig['preSelect']))
		{
			$preSQL = $extFunctionsConfig['preSelect'];
		}

		if (isset($extFunctionsConfig['extraLoad']))
		{
			$extraSQL = " 1=1 AND ".$extFunctionsConfig['extraLoad']." ";
		} else
		{
			$extraSQL = " 1=1 ";
		}

		$sorter_dir 	= " ASC ";
		$sorter 		= xredaktor_defaults::_getSort($extFunctionsConfig);
		$masterTable 	= xredaktor_defaults::_getTable($extFunctionsConfig);


		if (is_array($masterTable))
		{

			$selector  		= array();
			$tables 		= array();

			foreach ($masterTable as $i => $t)
			{
				$selector[] = " $t.* ";
				$tables[] 	= " $t ";
			}

			$selector 	= implode(",",$selector);
			$tables 	= implode(",",$tables);

		} else
		{
			$selector  		= " $masterTable.* ";
			$tables 		= " $masterTable ";
		}

		$selector = array();

		foreach ($fields as $f)
		{
			$selector[] = $f;
		}

		$selector = implode(",",$selector);


		if ($_REQUEST['sort'] != "")
		{
			$_sort = json_decode($_REQUEST['sort'],true);

			$sorter 	= dbx2::escape($_sort[0]['property']);
			$sorter_dir = dbx2::escape($_sort[0]['direction']);

			if (is_array($masterTable)) {

				foreach ($masterTable as $t)
				{
					if (dbx2::attributePresent($t,$sorter)) {
						$sorter = "$t.$sorter";
						break;
					}
				}
			}
		} else
		{
			$sorter = $extFunctionsConfig['pid'];
		}

		$_qSpecial = "";

		if ($_REQUEST['filter'] != "")
		{
			$filters 	= json_decode($_REQUEST['filter'],true);

			$where = ' 0 = 0 ';
			$qs = '';
			$qsAll = array();



			// loop through filters sent by client
			if (is_array($filters)) {
				for ($i=0;$i<count($filters);$i++){
					$filter = $filters[$i];

					$field 		= $filter['field'];
					$value 		= $filter['value'];
					$compare 	= isset($filter['comparison']) ? $filter['comparison'] : null;
					$filterType = $filter['type'];


					if (($extFunctionsConfig['titleIt'] == 1) && ($field == 'titleIt'))
					{
						$fields = xredaktor_defaults::getQuerySql($extFunctionsConfig);
					} else
					{
						if (!dbx2::attributePresent($masterTable,$field)) continue;
						$fields = array($field);
					}

					foreach ($fields as $field)
					{
						$qs = array();

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
				}

				if (count($qsAll)>0) {

					$_qSpecial = ' AND ('.implode(" AND ",$qsAll).' ) ';

				} else
				{

					$_qSpecial = '';

				}
			}
		}


		if ($_REQUEST['defaultNumericQueryAddons'] != "")
		{
			$_query = json_decode($_REQUEST['defaultNumericQueryAddons'],true);

			$extFunctionsConfig['extraLoad'] = "";
			$append = array();

			foreach ($_query as $_asID => $_pack) {
				if ($_asID == 'titleIt')
				{

					$fields 	= xredaktor_defaults::getQuerySql($extFunctionsConfig);
					$_0_pack 	= explode(" ",$_pack);
					$twu 		= array();

					foreach ($_0_pack as $_1_pack)
					{
						$_1_pack = trim($_1_pack);
						$ors = array();
						foreach ($fields as $as_name)
						{
							$ors[] = "$as_name LIKE '%$_1_pack%' ";
						}
						$twu[] = " ( ".implode(" OR ",$ors)." ) ";
					}

					$append[] = "(".implode(' AND ',$twu).") ";

				} else
				{
					$_asID = intval($_asID);
					if ($_asID == 0) continue;
					$as = xredaktor_atoms_settings::getById($_asID);
					if ($as === false) continue;
					$as_name = 'wz_'.$as['as_name'];


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

							foreach ($_0_pack as $_1_pack)
							{
								$_1_pack = trim($_1_pack);
								$twu[] = " $as_name LIKE '%$_1_pack%' ";
							}

							$append[] = "(".implode(' AND ',$twu).") ";
						}
					}
				}

			}

			$_qSpecial .= ' AND '.implode(" AND ",$append);
		}

		if (trim($var_del) != "")
		{
			$delSQL = " AND $var_del = 'N' ";
		}

		if (isset($extFunctionsConfig['disableDelFlag']))
		{
			if ($extFunctionsConfig['disableDelFlag']===true)
			{
				$delSQL = " ";
			}
		}

		if (isset($extFunctionsConfig['_select'])&&isset($extFunctionsConfig['_selectTables'])&&$extFunctionsConfig['_selectWhere'])
		{
			$selector 		= $extFunctionsConfig['_select'];
			$tables 		= $extFunctionsConfig['_selectTables'];
			$_selectWhere 	= $extFunctionsConfig['_selectWhere'];


			$multiJoins = "";

			foreach ($tables as $i => $crap)
			{
				$mj_table = $tables[$i];
				$mj_where = $_selectWhere[$i];
				$multiJoins .= " LEFT JOIN ($mj_table) ON ($mj_where) ";
			}


			$_q = "";
			if ($_REQUEST['_query']!="")
			{
				$fields = $extFunctionsConfig['fields'];
				if (isset($extFunctionsConfig['search']))
				{
					$fields = $extFunctionsConfig['search'];
				}

				$q 		= dbx2::escape($_REQUEST['_query']);
				$_q 	= array();

				foreach ($fields as $f)
				{
					$_q[] = " ($f LIKE '%$q%') ";
				}

				$_q = " AND ( ".implode(" OR ",$_q)." ) ";
			}

			$LIMITER 	= "";
			$totalCount = false;
			if ($pageingModus)
			{
				$limit 	= intval($_REQUEST['limit']);
				$offset = intval($_REQUEST['offset']);
				$start 	= intval($_REQUEST['start']);
				$pid 	= xredaktor_defaults::_getPId($extFunctionsConfig);
				if ($limit == 0) 	$limit = 100;
				if (($limit > 500) && (!isset($_REQUEST['exportToCsv2']))) 	frontcontrollerx::json_failure('JSON_STORE LIMIT TOO BIG!');
				$totalCount 	= dbx2::queryAttribute("select count($pid) as maxx from $masterTable $multiJoins where $extraSQL $delSQL $_q $_qSpecial",'maxx');
			}

			$nodes = dbx2::queryAll("select $selector $preSQL from $masterTable $multiJoins where $extraSQL $delSQL $_q order by ".$sorterTable."$sorter $sorter_dir $LIMITER");
			if (!is_array($nodes)) $nodes = array();

			if ($totalCount === false) $totalCount = count($nodes);
			frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));

		} else
		{
			if (!$pageingModus)
			{

				if ($_REQUEST['_query']=="")
				{
					$nodes = dbx2::queryAll("select $selector $preSQL from $tables where  $extraSQL $delSQL $_qSpecial order by ".$sorterTable."$sorter $sorter_dir");
				} else
				{
					$q 		= dbx2::escape($_REQUEST['_query']);
					$name 	= xredaktor_defaults::_getName($extFunctionsConfig);


					if (dbx2::attributePresent($tables,'wz_id')) {
						$where = "($name LIKE '%$q%' OR wz_id = '$q')";
					} else {
						$where = "($name LIKE '%$q%')";
					}

					$nodes 	= dbx2::queryAll("select $selector $preSQL from $tables where $where AND $extraSQL $delSQL $_qSpecial order by ".$sorterTable."$sorter $sorter_dir");
				}
				if (!is_array($nodes)) $nodes = array();
				return $nodes;
			}


			$limit 	= intval($_REQUEST['limit']);
			$offset = intval($_REQUEST['offset']);
			$start 	= intval($_REQUEST['start']);
			$pid 	= xredaktor_defaults::_getPId($extFunctionsConfig);


			if ($limit == 0) 	$limit = 100;
			if (($limit > 500) && (!isset($_REQUEST['exportToCsv2']))) 	frontcontrollerx::json_failure('JSON_STORE LIMIT TOO BIG!');

			if ($_REQUEST['_query']=="")
			{
				$sql_selector 	= " $extraSQL $delSQL $_qSpecial ";

				$totalCount 	= dbx2::queryAttribute("select count($pid) as maxx from $tables where $sql_selector",'maxx');
				$nodes 			= dbx2::queryAll("select $selector $preSQL from $tables where $sql_selector order by ".$sorterTable."$sorter $sorter_dir LIMIT $start, $limit");
			} else
			{

				$q 	= dbx2::escape($_REQUEST['_query']);
				$_q = "";

				if ($_REQUEST['_query']!="")
				{
					$fields = $extFunctionsConfig['fields'];
					if (isset($extFunctionsConfig['search']))
					{
						$fields = $extFunctionsConfig['search'];
					}

					$_q 	= array();
					$q 		= explode(" ",$q);

					foreach ($q as $pq)
					{
						if (trim($pq)=="") continue;
						$_qPart = array();
						foreach ($fields as $f)
						{
							//if (!dbx2::attributePresent($masterTable,$f)) continue;
							$_qPart[] = " ($f LIKE '%$pq%') ";
						}
						$_q[] 		= " (".implode(" OR ",$_qPart)." )";
					}

					$_q = " AND ( ".implode(" AND ",$_q)." ) ";

				}

				$sql_selector 	= " $extraSQL $delSQL $_q $_qSpecial ";
				$totalCount 	= dbx2::queryAttribute("select count($pid) as maxx from $tables where $sql_selector",'maxx');
				$nodes 			= dbx2::queryAll("select $selector $preSQL from $tables where $sql_selector order by ".$sorterTable."$sorter $sorter_dir LIMIT $start, $limit");
			}
		}

		if (isset($extFunctionsConfig['postHooks']['load']))
		{
			list($nodes,$totalCount) = frontcontrollerx::safeCallUserFunction($extFunctionsConfig['postHooks']['load'],$nodes,$totalCount);
		}


		if (isset($_REQUEST['exportToCsv2']) && $_REQUEST['exportToCsv2'] == "1")
		{
			xredaktor_defaults::export2Csv($nodes);
		}

		frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
	}

	public static function uniqueDataGridWrapper($cfg)
	{
		$sql_data 	= $cfg['sql_data'];
		$sql_cnt 	= $cfg['sql_cnt'];




		####################################
		####################################
		####################################
		####################################
		####################################
		####################################
		####################################

		if (isset($_REQUEST['filter'])) {


			$filters = json_decode($_REQUEST['filter'],true);

			$where 	= ' 0 = 0 ';
			$qs 	= '';
			$qsAll 	= array();


			for ($i=0;$i<count($filters);$i++)
			{
				$filter = $filters[$i];

				$field 		= $filter['field'];
				$value 		= trim($filter['value']);
				$compare 	= isset($filter['comparison']) ? $filter['comparison'] : null;
				$filterType = $filter['type'];

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
				$sql = ' ('.implode(" AND ",$qsAll).' ) AND ';

			} else
			{
				$sql = '';
			}

			$sql_data = str_replace("[GRID_FILTERS]",$sql,$sql_data);
			$sql_cnt = str_replace("[GRID_FILTERS]",$sql,$sql_cnt);

		} else {
			$sql_data = str_replace("[GRID_FILTERS]","",$sql_data);
			$sql_cnt = str_replace("[GRID_FILTERS]","",$sql_cnt);
		}




		#################################
		#################################
		#################################
		#################################
		#################################
		#################################

		if (isset($_REQUEST['downloadFiles']))
		{
			xluerzer_zip_and_download::handleDownloadFilesViaDefaultDBFetchner($cfg);
		}

		#################################
		#################################
		#################################
		#################################
		#################################
		#################################

		if (isset($_REQUEST['exportToCsv']))
		{
			$fileName = "export.csv";
			if (isset($_REQUEST['csvName']))
			{
				$fileName = basename($_REQUEST['csvName']).".csv";
			}


			header('Content-Encoding: UTF-8');
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream;charset=UTF-8');
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			ob_clean();
			flush();

			echo "\xEF\xBB\xBF";

			$nodes 	= dbx::queryAll($sql_data,false);

			foreach ($nodes as $line =>$n)
			{

				if ($line == 0)
				{
					$tmp = array();
					foreach ($n as $k => $v)
					{
						$tmp[] = self::saveCsvString($k);
					}
					echo implode(";",$tmp)."\n";
				}


				$tmp = array();
				foreach ($n as $k => $v)
				{
					$tmp[] = self::saveCsvString($v);
				}
				echo implode(";",$tmp)."\n";

			}
			die();
		}



		####################################
		####################################
		####################################
		####################################
		####################################
		####################################
		####################################

		if (isset($_REQUEST['sort']))
		{
			$sorter = json_decode($_REQUEST['sort'],true);
			$sql = " ORDER BY ";
			$tmp = array();

			foreach ($sorter as $s)
			{
				$field = $s['property'];
				$tmp[] = $field." ".$s['direction'];
			}

			$sql.= implode(",",$tmp);

			$pos = strripos($sql_data,'ORDER BY');

			if ($pos !== false)
			{
				$sql_data = substr($sql_data,0,$pos);
			}

			$sql_data .= " ".$sql;

		}


		if ($_REQUEST['doPaging'] == '0')
		{

		} else
		{
			$limit 	= intval($_REQUEST['limit']);
			$offset = intval($_REQUEST['offset']);
			$start 	= intval($_REQUEST['start']);
			if (($limit == 0) || ($limit > 1000)) $limit = 1000;
			$sql_data .= " LIMIT $start, $limit";
		}

		$nodes 		= dbx::queryAll($sql_data);
		$totalCount = dbx::queryAttribute($sql_cnt,'sql_cnt');

		$sql_data_clean = str_replace(array("\t","\n"),array(" "," "),$sql_data);


		frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true,'sql'=>$sql_data_clean));
	}

	private static function saveCsvString($s)
	{
		$s = str_replace('"','""',$s);
		return '"'.$s.'"';
	}

}

