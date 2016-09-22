<?

class xredaktor_defaults
{

	public static function getWorkBenchSettings()
	{
		$initSite	= false;
		$fe_cfg 	= array();
		$sitesCfg 	= array();

		$sites = dbx::queryAll("select * from sites where s_online = 'Y' and s_del='N' order by s_sort asc");
		if (!is_array($sites)) $sites = array();


		$limit_sites = xredaktor_core::getUserSettings_LIMIT_Sites();

		foreach ($sites as $site)
		{
			$s_id = $site['s_id'];
			if (is_array($limit_sites))
			{
				if (!in_array($s_id,$limit_sites)) continue;
			}

			if ($initSite === false) $initSite = $s_id;

			$sitesCfg[$s_id] = $site;
			$fe_languages = dbx::queryAll("select * from sites_fe_languages, fe_language  where sfl_online = 'Y' and fel_id = sfl_fl_id and sfl_s_id = $s_id and fel_del='N'");
			if (!is_array($fe_languages)) $fe_languages = array();
			$fe_cfg[$s_id] = $fe_languages;
		}

		$user = xredaktor_core::getUserSettings();

		if ($user['wz_id'] != 1) // admin
		{
			$initSite = intval($user['wz_xme_siteid']);
			//if ($initSite == 0) die('INVALID :: wz_xme_siteid!!');
		}

		$initSite 		= 0;
		if (count($sites)>0)
		{
			$initSite = intval($sites[0]['s_id']);
		}

		$roles_tags 	= dbx::queryAll("select * from roles_tags where rt_del = 'N'");

		
		$ac_id 	= intval(dbx::queryAttribute("SELECT ac_id FROM  `assets_compressed` WHERE  `ac_extension` =  'css' ORDER BY  `assets_compressed`.`ac_id` DESC ","ac_id"));
		$css 	= "/assets/compressed/packed-$ac_id.min.css";
		
		return array(
		'css'			=> $css,
		'roles_user'	=> xredaktor_users::getUserSettings($user['wz_id']),
		'roles_tags'	=> $roles_tags,
		'init_site'		=> $initSite,
		'limit_sites'	=> $limit_sites,
		'langs_fe_all'	=> dbx::queryAll("select * from fe_language where fel_del = 'N' and fel_online='Y'"),
		'langs_be'		=> dbx::queryAll("select * from be_language where bel_del = 'N' and bel_online='Y'"),
		'langs_fe'		=> $fe_cfg,
		'sites'			=> $sitesCfg,
		'user'			=> $user,
		'user_states'	=> xredaktor_state_xrprovider::getAllByUserId($user['wz_id']),
		'faces'			=> xredaktor_core::getFaces()
		);
	}

	public static function handleDefaultExtTree($extFunctionsConfig,$function)
	{

		$extFunctionsConfig = xredaktor_roles::updatePermissionSetup($extFunctionsConfig,$function);

		switch ($function)
		{
			case 'load':
				frontcontrollerx::processExtTree_load($extFunctionsConfig,	'xredaktor_defaults::getAllByFather');
				die();
			case 'update':
				frontcontrollerx::processExtTree_update($extFunctionsConfig,'xredaktor_defaults::updateById');
				die();
			case 'insert':
				frontcontrollerx::processExtTree_insert($extFunctionsConfig,'xredaktor_defaults::insertByFatherId');
				die();
			case 'move':
				frontcontrollerx::processExtTree_move($extFunctionsConfig,	'xredaktor_defaults::reorderSort');
				die();
			case 'remove':
				frontcontrollerx::processExtTree_remove($extFunctionsConfig, 'xredaktor_defaults::remove');
				die();
			default: break;
		}
	}

	public static function handleDefaultExtGrid($extFunctionsConfig,$function)
	{

		$extFunctionsConfig = xredaktor_roles::updatePermissionSetup($extFunctionsConfig,$function);

		switch ($function)
		{
			case 'load':
				frontcontrollerx::processExtGrid_load($extFunctionsConfig,	'xredaktor_defaults::getAll');
				die();
			case 'update':
				frontcontrollerx::processExtGrid_update($extFunctionsConfig,'xredaktor_defaults::updateById');
				die();
			case 'insert':
				frontcontrollerx::processExtGrid_insert($extFunctionsConfig,'xredaktor_defaults::insertBlank');
				die();
			case 'move':
				frontcontrollerx::processExtGrid_move($extFunctionsConfig,	'xredaktor_defaults::reorderSortGrid');
				die();
			case 'remove':
				frontcontrollerx::processExtGrid_remove($extFunctionsConfig, 'xredaktor_defaults::remove');
				die();
			default: break;
		}
	}


	public static function configAddJoins($extFunctionsConfig,$fid,$remoteTable,$remoteTableField,$remoteField=false,$remoteFieldAs=false)
	{
		if ($remoteField	===false) $remoteField		= $remoteTableField;
		if ($remoteFieldAs	===false) $remoteFieldAs	= $remoteField;

		$_select 		= "";
		$_selectWhere 	= array();
		$_selectTables 	= array();

		$masterTable 		= $extFunctionsConfig['table'];
		$_selectTables[] 	= $remoteTable;
		$_select[]			= " `$remoteTable`.`$remoteField` as `$remoteFieldAs` ";
		$_selectWhere[]		= " `$remoteTable`.`$remoteTableField` = `$masterTable`.`$fid`";

		if (!isset($extFunctionsConfig['_select']))
		{
			$extFunctionsConfig['_select'] 			= " `$masterTable`.* , ".implode(' , ',$_select);
			$extFunctionsConfig['_selectTables']	= $_selectTables;
			$extFunctionsConfig['_selectWhere'] 	= $_selectWhere;
		} else // MultipleAddJoins
		{
			$extFunctionsConfig['_select'] 			.= " , `$masterTable`.* , ".implode(' , ',$_select)." ";
			array_push($extFunctionsConfig['_selectTables'],	$_selectTables);
			array_push($extFunctionsConfig['_selectWhere'],		$_selectWhere);
		}
		return $extFunctionsConfig;
	}

	private static function _getTable($config)
	{
		return $config['table'];
	}

	private static function _getPId($config)
	{
		return $config['pid'];
	}

	private static function _getFId($config)
	{
		return $config['fid'];
	}
	private static function _getName($config)
	{
		return $config['name'];
	}

	private static function _getSort($config)
	{
		return $config['sort'];
	}

	private static function _getDel($config)
	{
		return $config['del'];
	}

	private static function _getSortCnt($config)
	{
		return $config['sort_cnt'];
	}

	public  static function getTitleSqlByWzId($wizardID)
	{

		$settings 			= xredaktor_wizards::getWizardSettings(intval($wizardID));
		$es_titleSettings 	= explode("\n",$settings['es_titleSettings']);

		$SQL = array();

		foreach ($es_titleSettings as $as_id)
		{
			$as_id = intval($as_id);
			if ($as_id == 0) continue;

			$as = xredaktor_atoms_settings::getById($as_id);
			if ($as['as_type_multilang'] == 'N')
			{
				$as_name = 'wz_'.$as['as_name'];
				$SQL[] = $as_name;
				$SQL[] = "' '";
			}
		}

		if (count($SQL) == 0) return false;
		array_pop($SQL);

		$SQL = "CONCAT (".implode(' , ',$SQL).") as titleIt ";
		return $SQL;
	}

	private static function getTitleSql($extFunctionsConfig)
	{
		$wizardID = intval($extFunctionsConfig['wizardID']);
		return self::getTitleSqlByWzId($wizardID);
	}

	private static function getQuerySql($extFunctionsConfig)
	{

		$settings 			= xredaktor_wizards::getWizardSettings(intval($extFunctionsConfig['wizardID']));
		$es_titleSettings 	= explode("\n",$settings['es_titleSettings']);

		$SQL = array();

		foreach ($es_titleSettings as $as_id)
		{
			$as_id = intval($as_id);
			if ($as_id == 0) continue;

			$as = xredaktor_atoms_settings::getById($as_id);
			if ($as['as_type_multilang'] == 'N')
			{
				$as_name = 'wz_'.$as['as_name'];
				$SQL[] = $as_name;
			}
		}

		if (count($SQL) == 0) return false;
		return $SQL;
	}



	public static function getAll($extFunctionsConfig)
	{

		if (isset($extFunctionsConfig['preHooks']['load']))
		{
			frontcontrollerx::safeCallUserFunction($extFunctionsConfig['preHooks']['load']);
		}

		$pageingModus = ($_REQUEST['doPaging'] == 1);

		$var_del 	= self::_getDel($extFunctionsConfig);

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
		$sorter 		= self::_getSort($extFunctionsConfig);
		$masterTable 	= self::_getTable($extFunctionsConfig);
		$selector  		= " `$masterTable`.* ";
		$tables 		= " $masterTable ";
		
		if (!is_array($extFunctionsConfig['specialSorts'])) $extFunctionsConfig['specialSorts'] = array();

		if (!isset($_REQUEST['sort'])) $_REQUEST['sort'] = "";
		if (($_REQUEST['sort'] == "") && ($_REQUEST['initSort'] != ""))
		{
			$_REQUEST['sort'] = $_REQUEST['initSort'];
		}


		if ($_REQUEST['sort'] != "")
		{
			$_sort = json_decode($_REQUEST['sort'],true);

			$sorter 	= dbx::escape($_sort[0]['property']);
			$sorter_dir = dbx::escape($_sort[0]['direction']);

			$sorterTable = "`$masterTable`.";

			if (($extFunctionsConfig['titleIt'] == 1) && ($sorter = 'titleIt'))
			{
				$sorterTable = "";
			} else
			{

				if (in_array($sorter,$extFunctionsConfig['specialSorts']))
				{
					$sorterTable = "";
				// wurde oben schon gesetzt	
				} else 
				{
				
					if (!dbx::attributePresent($masterTable,$sorter)) {
						$sorter 		= self::_getSort($extFunctionsConfig);
						$sorter_dir 	= " ASC ";
					}

				}

				foreach ($_sort as $i => $s)
				{
					if ($i == 0) continue;

					$xsorter 	 = dbx::escape($s['property']);
					$xsorter_dir = dbx::escape($s['direction']);
					
					
					if ((dbx::attributePresent($masterTable,$xsorter)) || (in_array($xsorter,$extFunctionsConfig['specialSorts'])))
					{

						if ($sorter_dir != "")
						{
							$sorter .= " ".$sorter_dir;
							$sorter_dir = "";
						}

						$sorter .= " , ".$xsorter." $xsorter_dir ";
					}


				}



			}
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
						$fields = self::getQuerySql($extFunctionsConfig);
					} else
					{
						if (!dbx::attributePresent($masterTable,$field)) continue;
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

					$fields 	= self::getQuerySql($extFunctionsConfig);
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
								$twu[] = " $masterTable.$as_name LIKE '%$_1_pack%' ";
							}

							$append[] = "(".implode(' AND ',$twu).") ";
						}
					}
				}

			}

			$_qSpecial .= ' AND '.implode(" AND ",$append);
		}

		$delSQL 		= " AND `$masterTable`.$var_del = 'N' ";

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

				$q 		= dbx::escape($_REQUEST['_query']);
				$_q 	= array();
				foreach ($fields as $f)
				{
					$_q[] = " (`$masterTable`.`$f` LIKE '%$q%') ";
				}

				if (dbx::attributePresent($masterTable,'wz_id'))
				{
					$_q[] = " (`$masterTable`.`wz_id` LIKE '%$q%') ";
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
				$pid 	= self::_getPId($extFunctionsConfig);
				if ($limit == 0) 	$limit = 100;
				if (($limit > 500) && (!isset($_REQUEST['exportToCsv2']))) 	frontcontrollerx::json_failure('JSON_STORE LIMIT TOO BIG!');
				$totalCount 	= dbx::queryAttribute("select count(`$masterTable`.`$pid`) as maxx from $masterTable $multiJoins where $extraSQL $delSQL $_q $_qSpecial",'maxx');
			}

			$nodes = dbx::queryAll("select $selector $preSQL from $masterTable $multiJoins where $extraSQL $delSQL $_q order by ".$sorterTable."$sorter $sorter_dir $LIMITER");
			if (!is_array($nodes)) $nodes = array();

			if ($totalCount === false) $totalCount = count($nodes);
			frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));

		} else
		{
			if (!$pageingModus)
			{

				if ($_REQUEST['_query']=="")
				{
					$nodes = dbx::queryAll("select $selector $preSQL from $tables where  $extraSQL $delSQL $_qSpecial order by ".$sorterTable."$sorter $sorter_dir");
				} else
				{
					$q 		= dbx::escape($_REQUEST['_query']);
					$name 	= self::_getName($extFunctionsConfig);


					if (dbx::attributePresent($tables,'wz_id')) {
						$where = "($name LIKE '%$q%' OR wz_id = '$q')";
					} else {
						$where = "($name LIKE '%$q%')";
					}

					$nodes 	= dbx::queryAll("select $selector $preSQL from $tables where $where AND $extraSQL $delSQL $_qSpecial order by ".$sorterTable."$sorter $sorter_dir");
				}
				if (!is_array($nodes)) $nodes = array();
				return $nodes;
			}


			$limit 	= intval($_REQUEST['limit']);
			$offset = intval($_REQUEST['offset']);
			$start 	= intval($_REQUEST['start']);
			$pid 	= self::_getPId($extFunctionsConfig);


			if ($extFunctionsConfig['titleIt'] == 1)
			{




				/*

				$settings 			= xredaktor_wizards::getWizardSettings(intval($extFunctionsConfig['wizardID']));
				$es_titleSettings 	= intval(trim($settings['es_titleSettings']));
				if ($es_titleSettings > 0)
				{
				$as = xredaktor_atoms_settings::getById($es_titleSettings);
				if ($as['as_type_multilang'] == 'N')
				{
				$as_name = 'wz_'.$as['as_name'];
				$selector = "$as_name as titleIt, ".$selector;

				}

				}

				*/

				$extraSel = self::getTitleSqlByWzId(intval($extFunctionsConfig['wizardID']));
				if (trim($extraSel) != "")
				{
					$selector = "$extraSel , ".$selector;
				}

			}


			if ($limit == 0) 	$limit = 100;
			if (($limit > 500) && (!isset($_REQUEST['exportToCsv2']))) 	frontcontrollerx::json_failure('JSON_STORE LIMIT TOO BIG!');

			if ($_REQUEST['_query']=="")
			{
				$sql_selector 	= " $extraSQL $delSQL $_qSpecial ";

				$totalCount 	= dbx::queryAttribute("select count(`$masterTable`.`$pid`) as maxx from $tables where $sql_selector",'maxx');
				$nodes 			= dbx::queryAll("select $selector $preSQL from $tables where $sql_selector order by ".$sorterTable."$sorter $sorter_dir LIMIT $start, $limit");
			} else
			{

				$q 	= dbx::escape($_REQUEST['_query']);
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
							if (!dbx::attributePresent($masterTable,$f)) continue;
							$_qPart[] = " (`$masterTable`.`$f` LIKE '%$pq%') ";
						}
						if (dbx::attributePresent($masterTable,'wz_id')) {
							$_qPart[] 	= " (`$masterTable`.`wz_id` LIKE '%$pq%') ";
						}
						$_q[] 		= " (".implode(" OR ",$_qPart)." )";
					}

					$_q = " AND ( ".implode(" AND ",$_q)." ) ";

				}


				#$name 			= self::_getName($extFunctionsConfig);
				#$sql_selector 	= " ((`$masterTable`.`$name` LIKE '%$q%')OR(`$masterTable`.`$pid` LIKE '%$q%')) AND $extraSQL $delSQL ";

				$sql_selector 	= " $extraSQL $delSQL $_q $_qSpecial ";
				$totalCount 	= dbx::queryAttribute("select count(`$masterTable`.`$pid`) as maxx from $tables where $sql_selector",'maxx');
				$nodes 			= dbx::queryAll("select $selector $preSQL from $tables where $sql_selector order by ".$sorterTable."$sorter $sorter_dir LIMIT $start, $limit");
			}
		}

		/*if (intval($extFunctionsConfig['titleIt']) == 1)
		{
		foreach ($nodes as $i=>$n)
		{
		$title 	= xredaktor_wizards::getWizardRecordDataTitleByConfig(intval($extFunctionsConfig['wizardID']),$n['wz_id']);
		$nodes[$i]['titleIt'] = $title;
		}
		}*/

		if (isset($extFunctionsConfig['postHooks']['load']))
		{
			list($nodes,$totalCount) = frontcontrollerx::safeCallUserFunction($extFunctionsConfig['postHooks']['load'],$nodes,$totalCount);
		}


		if (isset($_REQUEST['exportToCsv2']) && $_REQUEST['exportToCsv2'] == "1")
		{
			self::export2Csv($nodes);
		}

		frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
	}

	private static function saveCsvString($s)
	{
		$s = str_replace('"','""',$s);
		return '"'.$s.'"';
	}

	public static function export2Csv($nodes)
	{

		$csv = array();

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

	public static function getAllOld($extFunctionsConfig)
	{
		$pageingModus = ($_REQUEST['doPaging'] == 1);

		$var_del 	= self::_getDel($extFunctionsConfig);

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

		$masterTable 	= self::_getTable($extFunctionsConfig);
		$selector  		= " `$masterTable`.* ";
		$tables 		= " $masterTable ";
		if (isset($extFunctionsConfig['_select'])&&isset($extFunctionsConfig['_selectTables'])&&$extFunctionsConfig['_selectWhere'])
		{

			$selector 	= $extFunctionsConfig['_select'];
			$tables 	= " $masterTable, ".$extFunctionsConfig['_selectTables'];
			$extraSQL 	.= $extFunctionsConfig['_selectWhere'];

		}

		/*************************************************************************************************************
		*** INJECTORS END
		****/

		if (!$pageingModus)
		{
			if ($_REQUEST['_query']=="")
			{
				$nodes = dbx::queryAll("select $selector $preSQL from $tables where  $extraSQL AND `$masterTable`.$var_del = 'N' order by `$masterTable`.".self::_getSort($extFunctionsConfig)." ASC");
			} else
			{
				$q 		= dbx::escape($_REQUEST['_query']);
				$name 	= self::_getName($extFunctionsConfig);
				$nodes 	= dbx::queryAll("select $selector $preSQL from $tables where ($name LIKE '%$q%') AND $extraSQL AND `$masterTable`.$var_del = 'N' order by `$masterTable`.".self::_getSort($extFunctionsConfig)." ASC");
			}
			if (!is_array($nodes)) $nodes = array();
			return $nodes;
		}

		$limit 	= intval($_REQUEST['limit']);
		$offset = intval($_REQUEST['offset']);
		$start 	= intval($_REQUEST['start']);
		$pid 	= self::_getPId($extFunctionsConfig);

		if ($limit == 0) 	$limit = 100;
		if ($limit > 500) 	frontcontrollerx::json_failure('JSON_STORE LIMIT TOO BIG!');

		if ($_REQUEST['_query']=="")
		{
			$sql_selector 	= " $extraSQL AND `$masterTable`.`$var_del` = 'N' ";
			$totalCount 	= dbx::queryAttribute("select count(`$masterTable`.`$pid`) as maxx from $tables where $sql_selector",'maxx');
			$nodes 			= dbx::queryAll("select $selector $preSQL from $tables where $sql_selector order by `$masterTable`.".self::_getSort($extFunctionsConfig)." ASC LIMIT $start, $limit");
		} else
		{
			$q 				= dbx::escape($_REQUEST['_query']);
			$name 			= self::_getName($extFunctionsConfig);
			$sql_selector 	= " (`$masterTable`.`$name` LIKE '%$q%') AND $extraSQL AND `$masterTable`.`$var_del` = 'N' ";
			$totalCount 	= dbx::queryAttribute("select count(`$masterTable`.`$pid`) as maxx from $tables where $sql_selector",'maxx');
			$nodes 			= dbx::queryAll("select $selector $preSQL from $tables where $sql_selector order by `$masterTable`.".self::_getSort($extFunctionsConfig)." ASC LIMIT $start, $limit");
		}

		frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
	}


	public static function getById2($extFunctionsConfig,$id)
	{
		$var_del 	= self::_getDel($extFunctionsConfig);
		/*************************************************************************************************************
		*** INJECTORS BEGIN
		****/

		$preSQL		= "";
		$extraSQL 	= "";
		if (isset($extFunctionsConfig['preSelect']))
		{
			$preSQL = $extFunctionsConfig['preSelect'];
		}

		$masterTable 	= self::_getTable($extFunctionsConfig);

		if (isset($extFunctionsConfig['extraLoad']))
		{
			$extraSQL = " `$masterTable`.`wz_id`=$id AND ".$extFunctionsConfig['extraLoad']." ";
		} else
		{
			$extraSQL = " `$masterTable`.`wz_id`=$id ";
		}


		$sorter 		= self::_getSort($extFunctionsConfig);
		$masterTable 	= self::_getTable($extFunctionsConfig);
		$selector  		= " `$masterTable`.* ";
		$tables 		= " $masterTable ";


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


			$_q 		= "";
			$LIMITER 	= "";
			$totalCount = false;
			$nodes = dbx::queryAll("select $selector $preSQL from $masterTable $multiJoins where $extraSQL AND `$masterTable`.$var_del = 'N' $_q order by `$masterTable`.$sorter ASC $LIMITER");
			if (!is_array($nodes)) $nodes = array();

			if ($totalCount === false) $totalCount = count($nodes);
			frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));

		}
		return self::getById($extFunctionsConfig,$id,true);
	}

	public static function getRootLine($extFunctionsConfig,$id)
	{

		$table 		= self::_getTable($extFunctionsConfig);
		$var_id 	= self::_getPId($extFunctionsConfig);
		$var_fid 	= self::_getFId($extFunctionsConfig);
		$var_fid 	= self::_getFId($extFunctionsConfig);
		$delParam 	= self::_getDel($extFunctionsConfig);

		$fatherID 	= dbx::queryAttribute("select $var_fid from $table where $var_id = $id and $delParam = 'N' ",$var_fid);
		if (($fatherID === false)|| (!is_numeric($fatherID)) || ($fatherID == 0)) return array(0);


		$ret = array($fatherID);
		$ret = array_merge($ret,self::getRootLine($extFunctionsConfig,$fatherID));

		return $ret;
	}



	public static function getAllByFather($extFunctionsConfig,$fatherId)
	{




		$sorter_dir 	= " ASC ";
		$sorter 		= self::_getSort($extFunctionsConfig);
		$masterTable 	= self::_getTable($extFunctionsConfig);


		if ($_REQUEST['sort'] != "")
		{
			$_sort = json_decode($_REQUEST['sort'],true);

			$sorter 	= dbx::escape($_sort[0]['property']);
			$sorter_dir = dbx::escape($_sort[0]['direction']);

			$sorterTable = "`$masterTable`.";

			if (($extFunctionsConfig['titleIt'] == 1) && ($sorter = 'titleIt'))
			{
				$sorterTable = "";
			} else
			{
				if (!dbx::attributePresent($masterTable,$sorter)) {
					$sorter 		= self::_getSort($extFunctionsConfig);
					$sorter_dir 	= " ASC ";
				}
			}
		}






		$preSQL		= "";

		if (isset($extFunctionsConfig['preSelect']))
		{
			$preSQL = $extFunctionsConfig['preSelect'];
		}






		$doSearch = ($_REQUEST['_query']!="");
		$extraSQL = "";
		if (isset($extFunctionsConfig['extraLoad']))
		{
			$extraSQL = " AND ".$extFunctionsConfig['extraLoad']." ";
		}

		$extraDel = " AND ".self::_getDel($extFunctionsConfig)." = 'N' ";

		if (!$doSearch)
		{
			$nodes = dbx::queryAll("select * $preSQL from ".self::_getTable($extFunctionsConfig)." where (".self::_getFId($extFunctionsConfig)." = $fatherId) $extraDel $extraSQL order by $sorter $sorter_dir");
		} else
		{
			$q 		= dbx::escape($_REQUEST['_query']);
			$name 	= self::_getName($extFunctionsConfig);
			$id 	= self::_getPId($extFunctionsConfig);
			$nodes = dbx::queryAll("select * $preSQL  from ".self::_getTable($extFunctionsConfig)." where (($name LIKE '%$q%') or ($id LIKE '%$q%')) $extraDel $extraSQL order by $sorter $sorter_dir");
		}

		if (!is_array($nodes)) $nodes = array();


		if ($_REQUEST['loadPaths']=='1') {

			$loadPaths = array();

			foreach ($nodes as $i => $p)
			{
				$id = $p[self::_getPId($extFunctionsConfig)];

				$rootline 		= array_reverse(self::getRootLine($extFunctionsConfig,$id));
				$rootline[]		= $id;
				$loadPaths[] 	= $rootline;
			}

			frontcontrollerx::json_success(array('loadPaths'=>$loadPaths));

		}


		foreach ($nodes as $i => $p)
		{
			$id = $p[self::_getPId($extFunctionsConfig)];

			if (!$doSearch)
			{
				if (isset($extFunctionsConfig['isDirCheck']))
				{
					$nodes[$i]['_is_dir'] = frontcontrollerx::safeCallUserFunction($extFunctionsConfig['isDirCheck'],$p);
				} else
				{
					$nodes[$i]['_is_dir'] = dbx::query("select * from ".self::_getTable($extFunctionsConfig)." where ".self::_getFId($extFunctionsConfig)." = $id LIMIT 1") !== false;
				}
			} else
			{
				$nodes[$i]['_is_dir'] = false;
			}
		}

		return $nodes;
	}

	public static function normalizeData($extFunctionsConfig,$data) {
		$norm = frontcontrollerx::parseInput($extFunctionsConfig['normalize'],$data);
		return $norm;
	}

	public static function getById($extFunctionsConfig,$id,$checkFathers=false) {
		$p_id = frontcontrollerx::isInt($id);
		$page = dbx::query("select * from ".self::_getTable($extFunctionsConfig)." where ".self::_getPId($extFunctionsConfig)." = $id");

		if ($checkFathers) {
			if (isset($extFunctionsConfig['isDirCheck']))
			{
				$page['_is_dir'] = frontcontrollerx::safeCallUserFunction($extFunctionsConfig['isDirCheck'],$page);
			} else
			{
				$page['_is_dir'] = dbx::query("select * from ".self::_getTable($extFunctionsConfig)." where ".self::_getFId($extFunctionsConfig)." = $id LIMIT 1") !== false;
			}
		}

		return $page;
	}

	public static function updateById($extFunctionsConfig, $id, $data, $saveMode=false) {
		if (isset($extFunctionsConfig['postHooks']['update']))
		{
			$oldDataRecord = self::getById($extFunctionsConfig,$id,false);
		}

		$data = self::normalizeData($extFunctionsConfig,$data);

		if (count($data)==0) frontcontrollerx::json_failure('BE-ERROR: INPUT-FILTER BLOCKS UPDATE');

		if (isset($extFunctionsConfig['preHooks']['update']))
		{
			if (!frontcontrollerx::safeCallUserFunction($extFunctionsConfig['preHooks']['update'],$id,$data))
			{
				return false;
			}
		}

		if (isset($extFunctionsConfig['preHooksMod']['update']))
		{
			if (!($data=frontcontrollerx::safeCallUserFunction($extFunctionsConfig['preHooksMod']['update'],$id,$data)))
			{
				return false;
			}
		}

		$table 		= self::_getTable($extFunctionsConfig);
		$table_del 	= self::_getDel($extFunctionsConfig);
		$table_pid	= self::_getPId($extFunctionsConfig);

		if ($saveMode)
		{
			$dataSafe = array();
			foreach ($data as $attrName => $value)
			{
				if (dbx::attributePresent($table,$attrName)) $dataSafe[$attrName] = $value;
			}
			$data = $dataSafe;
		}


		if (dbx::update($table,$data,array($table_pid=>$id),false,false)===false)
		{
			$error 		= dbx::getLastError();
			$errorNo 	= $error['errno'];

			switch ($errorNo)
			{
				case 1062:

					$errorNow = true;
					if (count($data)==1)
					{
						foreach ($data as $k=>$v) {}
						$k = dbx::escape($k);
						$v = dbx::escape($v);
						$deletedRecordBlocksIt 		= dbx::query("select * from $table where $k = '$v' and $table_del = 'Y'");
						if ($deletedRecordBlocksIt !== false)
						{
							$deletedRecordBlocksItId 	= $deletedRecordBlocksIt[$table_pid];
							dbx::query("update $table set $k = CONCAT($table_pid,'-VIA-SOFT-DEL-',$k) where $table_pid = $deletedRecordBlocksItId LIMIT 1");
							dbx::update($table,$data,array($table_pid=>$id));
							$errorNow = false;
						}
					}
					if ($errorNow)
					{
						frontcontrollerx::json_failure('Dises Feld weist ein Duplikat auf. Aktualisierung fehlgeschlagen.');
					}
					break;
				default:
					dbx::handleError('',3);
			}
		}

		if (isset($extFunctionsConfig['postHooks']['update']))
		{
			$newDataRecord = self::getById($extFunctionsConfig,$id,false);
			frontcontrollerx::safeCallUserFunction($extFunctionsConfig['postHooks']['update'],$id,$newDataRecord,$oldDataRecord,$extFunctionsConfig);
		}
		
		if (isset($extFunctionsConfig['postModFunc']))
		{
			
			frontcontrollerx::safeCallUserFunction($extFunctionsConfig['postModFunc'],$id,$extFunctionsConfig);
		}
		
		

		xredaktor_wizards::checkForPostHooksViaCfg($extFunctionsConfig);

		if (isset($extFunctionsConfig['xtype']))
		{
			if ($extFunctionsConfig['xtype']=='grid')
			{
				return self::getById2($extFunctionsConfig,$id);
			}
		}

		return self::getById($extFunctionsConfig,$id,true);
	}

	public static function insertBlank($extFunctionsConfig)
	{

		if (self::_getSortCnt($extFunctionsConfig) != "")
		{
			$sort_cnt = frontcontrollerx::isInt($_REQUEST[self::_getSortCnt($extFunctionsConfig)],'SortCnt:'.self::_getSortCnt($extFunctionsConfig));
			$sort = intval(dbx::queryAttribute("select max(".self::_getSort($extFunctionsConfig).")+1 as sorty from ".self::_getTable($extFunctionsConfig)." where ".self::_getSortCnt($extFunctionsConfig)." = $sort_cnt","sorty"));
		} else
		{
			$sort = intval(dbx::queryAttribute("select max(".self::_getSort($extFunctionsConfig).")+1 as sorty from ".self::_getTable($extFunctionsConfig)." where 1 ","sorty"));
		}

		if (self::_getSort($extFunctionsConfig) == self::_getName($extFunctionsConfig))
		{
			$data = array();
		} else
		{
			$data = array(self::_getSort($extFunctionsConfig) => $sort);
		}

		if (is_array($extFunctionsConfig['extraInsert'])) {
			foreach ($extFunctionsConfig['extraInsert'] as $k => $v)
			{
				$data[$k] = $v;
			}
		}

		if (is_array($extFunctionsConfig['extraInsertFlyInt'])) {
			foreach ($extFunctionsConfig['extraInsertFlyInt'] as $k)
			{
				$v = frontcontrollerx::isInt($_REQUEST[$k],'extraInsertFlyInt:'.$k);
				$data[$k] = $v;
			}
		}

		if (isset($extFunctionsConfig['preHooksMod']['insert']))
		{
			if (!($data=frontcontrollerx::safeCallUserFunction($extFunctionsConfig['preHooksMod']['insert'],$data)))
			{
				return false;
			}
		}

		dbx::insert(self::_getTable($extFunctionsConfig),$data);
		$id = dbx::getLastInsertId();

		xredaktor_log::add(self::_getTable($extFunctionsConfig),intval($extFunctionsConfig['log_insert']['wz_id']),$id,'INSERT',"Datensatz $id angelegt");


		if (isset($extFunctionsConfig['postHooks']['insert']))
		{
			frontcontrollerx::safeCallUserFunction($extFunctionsConfig['postHooks']['insert'],$id,$extFunctionsConfig);
		}

		return self::getById($extFunctionsConfig,$id,true);
	}

	public static function insertByFatherId($extFunctionsConfig,$fid,$name)
	{
		$sqlExtra = "";

		if (isset($extFunctionsConfig['extraMove']) && $extFunctionsConfig['extraMove'] != "")
		{
			$sqlExtra = ' and '.$extFunctionsConfig['extraMove'];
		}

		$sort = intval(dbx::queryAttribute("select max(".self::_getSort($extFunctionsConfig).") as sorty from ".self::_getTable($extFunctionsConfig)." where ".self::_getFId($extFunctionsConfig)." = $fid $sqlExtra","sorty"));
		$sort++;

		if (self::_getSort($extFunctionsConfig) == self::_getName($extFunctionsConfig))
		{
			$data = array(
			self::_getFId($extFunctionsConfig)	=> $fid,
			self::_getName($extFunctionsConfig)	=> $name,
			);
		} else
		{
			$data = array(
			self::_getFId($extFunctionsConfig)	=> $fid,
			self::_getName($extFunctionsConfig)	=> $name,
			self::_getSort($extFunctionsConfig)	=> $sort
			);
		}

		if (is_array($extFunctionsConfig['extraInsert'])) {
			foreach ($extFunctionsConfig['extraInsert'] as $k => $v)
			{
				$data[$k] = $v;
			}
		}

		if (isset($extFunctionsConfig['preHooks']['insert']))
		{
			if (!frontcontrollerx::safeCallUserFunction($extFunctionsConfig['preHooks']['insert'],$data))
			{
				return false;
			}
		}

		dbx::insert(self::_getTable($extFunctionsConfig),$data);
		$id = dbx::getLastInsertId();

		xredaktor_log::add(self::_getTable($extFunctionsConfig),0,$id,'INSERT',"Datensatz $id wurde angelegt");

		if (isset($extFunctionsConfig['postHooks']['insert']))
		{
			frontcontrollerx::safeCallUserFunction($extFunctionsConfig['postHooks']['insert'],$id,$extFunctionsConfig);
		}

		return self::getById($extFunctionsConfig,$id,true);
	}

	public static function reorderSort($extFunctionsConfig,$id,$ofid,$nfid,$sort)
	{

		$var_sort 	= self::_getSort($extFunctionsConfig);
		$var_fid 	= self::_getFId($extFunctionsConfig);
		$var_id 	= self::_getPId($extFunctionsConfig);
		$var_table	= self::_getTable($extFunctionsConfig);

		$sqlExtra 	= "";

		if (isset($extFunctionsConfig['extraMove']) && $extFunctionsConfig['extraMove'] != "")
		{
			$sqlExtra = ' and '.$extFunctionsConfig['extraMove'];
		}

		dbx::query("update $var_table set $var_sort = $var_sort+1 where $var_sort >= $sort and $var_fid = $nfid $sqlExtra");
		dbx::query("update $var_table set $var_sort = $sort, $var_fid = $nfid where $var_id = $id $sqlExtra");


		// fix broken db
		$records 	= dbx::queryAll("select $var_id,$var_sort from $var_table where $var_fid = $nfid $sqlExtra order by $var_sort");
		$total		= count($records);

		foreach ($records as $i => $record)
		{
			$_id = $record[$var_id];
			dbx::update($var_table,array($var_sort=>$i),array($var_id=>$_id));
		}


		if (isset($extFunctionsConfig['postHooks']['move']))
		{
			$current 		= self::getById($extFunctionsConfig,$id,	false);
			$newDataRecord 	= self::getById($extFunctionsConfig,$nfid,	false);
			$oldDataRecord 	= self::getById($extFunctionsConfig,$ofid,	false);

			frontcontrollerx::safeCallUserFunction($extFunctionsConfig['postHooks']['move'],$id,$current, $newDataRecord,$oldDataRecord);
		}


	}

	public static function reorderSortGrid($extFunctionsConfig,$recs,$dropPosition,$dropRec,$recs2)
	{

		$var_sort 	= self::_getSort($extFunctionsConfig);
		$var_fid 	= self::_getFId($extFunctionsConfig);
		$var_id 	= self::_getPId($extFunctionsConfig);
		$var_table	= self::_getTable($extFunctionsConfig);

		$recs2 = explode(',',$recs2);

		foreach ($recs2 as $newSort=>$rID)
		{
			if (!is_numeric($rID)) continue;
			$finalIds[] = $rID;
			dbx::query("update $var_table set $var_sort = $newSort where $var_id = $rID");
		}

		return $finalIds;

		if (!in_array($dropPosition,array('after','before'))) return false;
		$dropRec = self::getById($extFunctionsConfig,$dropRec);
		if ($dropRec === false) return false;



		$var_sort 	= self::_getSort($extFunctionsConfig);
		$var_fid 	= self::_getFId($extFunctionsConfig);
		$var_id 	= self::_getPId($extFunctionsConfig);
		$var_table	= self::_getTable($extFunctionsConfig);


		$recs = explode(',',$recs);

		$dropRecID 	= $dropRec[$var_id];
		$sortVal 	= $dropRec[$var_sort];
		$amountOfRecs = count($recs);


		switch ($dropPosition)
		{
			case 'after':
				dbx::query("update $var_table set $var_sort = $var_sort+$amountOfRecs where $var_id > $dropRecID");
				$sortVal++;
				break;
			case 'before':
				dbx::query("update $var_table set $var_sort = $var_sort+$amountOfRecs where $var_id >= $dropRecID");
				$sortVal++;
				break;
			default: return false;
		}


		$finalIds = array();

		foreach ($recs as $i=>$rID)
		{
			if (!is_numeric($rID)) continue;
			$finalIds[] = $rID;
			$newSort = $sortVal+$i;
			dbx::query("update $var_table set $var_sort = $newSort where $var_id = $rID");
		}

		return $finalIds;
	}

	public static function remove($extFunctionsConfig,$ids)
	{
		if (!is_array($ids)) $ids = array();

		$var_sort 	= self::_getSort($extFunctionsConfig);
		$var_fid 	= self::_getFId($extFunctionsConfig);
		$var_id 	= self::_getPId($extFunctionsConfig);
		$var_table	= self::_getTable($extFunctionsConfig);
		$var_del 	= self::_getDel($extFunctionsConfig);

		$idsC = array();

		foreach ($ids as $id)
		{
			if (!is_numeric($id)) continue;
			$idsC[] = $id;
			dbx::query("update $var_table set $var_del = 'Y' where $var_id = $id");

			xredaktor_log::add($var_table,intval($extFunctionsConfig['log_insert']['wz_id']),$id,'DELETE',"Datensatz $id gelöscht");

			if (isset($extFunctionsConfig['postHooks']['remove']))
			{
				frontcontrollerx::safeCallUserFunction($extFunctionsConfig['postHooks']['remove'],$id,$extFunctionsConfig);
			}
			
			if (isset($extFunctionsConfig['postModFunc']))
			{
				frontcontrollerx::safeCallUserFunction($extFunctionsConfig['postModFunc'],$id,$extFunctionsConfig);
			}
		}

		xredaktor_wizards::checkForPostHooksViaCfg($extFunctionsConfig);

		return $idsC;
	}



}