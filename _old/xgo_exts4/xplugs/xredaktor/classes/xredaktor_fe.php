<?

class xredaktor_fe
{

	public static function wGetRecordById($wz_id,$r_id) {
		$table = xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$all = dbx::query("select * from $table where wz_del = 'N' and wz_id = $r_id order by wz_sort");
		return $all;
	}

	public static function parseSaveInput($w_id,$params,$overwrite=false)
	{
		$ass 			= xredaktor_wizards::getASS($w_id);
		$fields 		= array();
		$data2inject 	= array();
		$notfound 		= array();

		foreach ($ass as $as)
		{
			$as_name 			= $as['as_name'];
			$as_type 			= $as['as_type'];
			$as_config 			= $as['as_config'];
			$as_type_multilang 	= $as['as_type_multilang'];

			if ($as_type_multilang == 'N')
			{
				switch ($as_type) {
					case 'COMMENT':
					case 'CONTAINER':
						break;
					case 'CHECKBOX':
						$checkboxCfg = json_decode($as_config,true);
						foreach ($checkboxCfg['l'] as $d) // MULTILANG NOCH CHECKEN
						{
							//list($k,$v,$crap) = $d;
							$k = $d['v'];
							if(isset($params[$as_name.'_'.$k]))
							{
								$data2inject['wz_'.$as_name.'_'.$k] = $params[$as_name.'_'.$k];
							} else
							{
								$notfound[] = $as_name.'_'.$k;
							}
						}
						break;
					default:
						if (isset($params[$as_name]))
						{
							$data2inject['wz_'.$as_name] = $params[$as_name];
						} else
						{
							$notfound[] = $as_name;
						}
				}
			} else
			{
				$langs = xredaktor_pages::getLangFailOverOrder();
				foreach ($langs as $xyz)
				{
					if (trim($xyz)=="") continue;
					$preFIX = "_".strtoupper($xyz).'_';

					switch ($as_type) {
						case 'COMMENT':
						case 'CONTAINER':
							break;
						case 'CHECKBOX':
							$checkboxCfg = json_decode($as_config,true);
							foreach ($checkboxCfg['l'] as $d) // MULTILANG NOCH CHECKEN
							{
								//list($k,$v,$crap) = $d;
								$k = $d['v'];
								if(isset($params[$as_name.'_'.$k]))
								{
									$data2inject[$preFIX.'wz_'.$as_name.'_'.$k] = $params[$as_name.'_'.$k];
								} else
								{
									$notfound[] = $as_name.'_'.$k;
								}
							}
							break;
						default:
							if (isset($params[$as_name]))
							{
								$data2inject[$preFIX.'wz_'.$as_name] = $params[$as_name];
							} else
							{
								$notfound[] = $as_name;
							}
					}


				}
			}
		}


		/************ PARSE DATE **************/

		if (isset($cfg['parse_date']))
		{
			$fields2parseInto = explode(',',$cfg['parse_date']);
			foreach ($fields2parseInto as $fpx)
			{
				if (in_array($fpx,$fields2parse))
				{
					if (isset($data2inject[$fpx])) continue;
					$val = $data2inject['wz_'.$fpx];
					if (strpos($val,'.')!==false) // DEUTSCH
					{
						list($_d,$_m,$_y) = explode(".",$val);
					} else // ENGLISCH
					{
						list($_y,$_m,$_d) = explode("/",$val);
					}

					$data2inject['wz_'.$fpx] = $_y."-".$_m."-".$_d;
				}
			}
		}

		$defaults = explode(";",$cfg['defaults']);
		if (!is_array($defaults)) $defaults = array();

		foreach ($defaults as $d)
		{
			list($k,$v) = explode("=",$d,2);
			if ($k != "")
			{
				$data2inject[$k]=$v;
			}
		}

		$data2inject['wz_created'] = 'NOW()';

		if (is_array($overwrite))
		{
			foreach ($overwrite as $k => $v)
			{
				$data2inject[$k] = $v;
			}
		}

		/*
		print_r($params);
		print_r($notfound);
		print_r($data2inject);
		die();
		*/

		return $data2inject;
	}


	public  static function wUpdateSaveParse($w_id,$r_id,$params,$overwrite=false)
	{
		$data2inject = self::parseSaveInput($w_id,$params,$overwrite);
		$tableName = xredaktor_wizards::genWizardTableNameBy_a_id($w_id);
		dbx::update($tableName,$data2inject,array('wz_id'=>$r_id));
		return dbx::getLastInsertId();
	}

	public  static function wInsertSaveParse($w_id,$params,$overwrite=false)
	{
		$data2inject = self::parseSaveInput($w_id,$params,$overwrite);
		$tableName = xredaktor_wizards::genWizardTableNameBy_a_id($w_id);
		dbx::insert($tableName,$data2inject);
		return dbx::getLastInsertId();
	}


	/***********************************************************************************************************************************/
	/***********************************************************************************************************************************/
	/***********************  SESSION_STORAGE ******************************************************************************************/
	/***********************************************************************************************************************************/
	/***********************************************************************************************************************************/

	static $PREFIX = "FE_SESSION_STORE_";

	public static function &sessionStorage_init($name)
	{
		@session_start();
		if (!isset($_SESSION[self::$PREFIX.$name])) $_SESSION[self::$PREFIX.$name] = array();
		return $_SESSION[self::$PREFIX.$name];
	}
	public static function &sessionStorage_add($name,$id,$val=1)
	{
		$array = &self::sessionStorage_init($name);
		$array[$id] = $val;
		return $_SESSION[self::$PREFIX.$name][$id];
	}
	public static function sessionStorage_del($name,$id)
	{
		$array = &self::sessionStorage_init($name);
		unset($array[$id]);
	}
	public static function sessionStorage_delAll($name)
	{
		$array = &self::sessionStorage_init($name);
		$array = array();
	}
	public static function sessionStorage_isIn($name,$id)
	{
		$array = &self::sessionStorage_init($name);
		return isset($array[$id]);
	}
	public static function &sessionStorage_getByID($name,$id,&$ret)
	{
		$array = &self::sessionStorage_init($name);
		if (!isset($array[$id])) return false;
		$ret = $array[$id];
		return $array[$id];
	}
	public static function &sessionStorage_getAll($name,$id,&$ret)
	{
		$array = &self::sessionStorage_init($name);
		$ret = $array;
		return $array;
	}

	/***********************************************************************************************************************************/
	/***********************************************************************************************************************************/
	/***********************************************************************************************************************************/
	/***********************************************************************************************************************************/
	/***********************************************************************************************************************************/

	private static function sqlBuildWheres($selectors = false)
	{
		$where = array();
		if ($selectors !== false)
		{
			foreach ($selectors as $k => $v) {

				$k = dbx::escape($k);

				if (is_array($v))
				{
					$tmp = array();
					foreach ($v as $v2)
					{
						$v2 = dbx::escape($v2);
						$tmp[] = " $k = '$v2' ";
					}
					$where[] = " ( ".implode(" OR ",$tmp)." ) ";

				} else
				{
					$v = dbx::escape($v);
					$where[] = " $k = '$v' ";
				}
			}
		}
		if (count($where)>0) array_unshift($where,'');
		return $where;
	}

	private static function sqlBuilderSelect($table,$selectors=array(),$respectSoftDels=true)
	{
		$where = self::sqlBuildWheres($selectors);
		if ($respectSoftDels) $where[] = " wz_del='N' ";
		$sql = "select * from $table where 1 ".implode(' AND ',$where)." order by wz_sort";
		return $sql;
	}

	private static function sqlBuilderSelectCount($table,$selectors=array(),$respectSoftDels=true,$returnFieldName='cntx')
	{
		$where = self::sqlBuildWheres($selectors);
		if ($respectSoftDels) $where[] = " wz_del='N' ";
		$sql = "select count(wz_id) as $returnFieldName from $table where 1 ".implode(' AND ',$where)." ";
		return $sql;
	}

	public static function wQueryCount($wz_id,$selectors=false,$respectSoftDels=true)
	{
		$table = xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$sql = self::sqlBuilderSelectCount($table,$selectors,$respectSoftDels);
		$cntx = dbx::queryAttribute($sql,"cntx");
		if (!is_numeric($cntx)) $cntx = 0;
		return $cntx;
	}

	public static function wQueryCountViaVID($wz_vid_id,$selectors=false,$respectSoftDels=true)
	{
		$table = xredaktor_wizards::genWizardTableNameByVID($wz_vid_id);
		$sql = self::sqlBuilderSelectCount($table,$selectors,$respectSoftDels);
		$cntx = dbx::queryAttribute($sql,"cntx");
		if (!is_numeric($cntx)) $cntx = 0;
		return $cntx;
	}

	public static function wQuery($wz_id,$selectors=false,$respectSoftDels=true)
	{
		return self::wQueryAll($wz_id,$selectors,true,$respectSoftDels);
	}

	public static function wQueryViaVID($wz_vid_id,$selectors=false,$respectSoftDels=true)
	{
		return self::wQueryAllViaVID($wz_vid_id,$selectors,true,$respectSoftDels);
	}

	public static function wQueryAll($wz_id,$selectors=false,$justOneRow=false,$respectSoftDels=true)
	{
		$table = xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$sql = self::sqlBuilderSelect($table,$selectors,$respectSoftDels);
		if ($justOneRow === false) return dbx::queryAll($sql);
		return dbx::query($sql);
	}

	public static function wQueryAllViaVID($wz_vid_id,$selectors=false,$justOneRow=false,$respectSoftDels=true)
	{
		$table = xredaktor_wizards::genWizardTableNameByVID($wz_vid_id);
		$sql = self::sqlBuilderSelect($table,$selectors,$respectSoftDels);
		
		if ($justOneRow === false) return dbx::queryAll($sql);
		return dbx::query($sql);
	}

	public static function wN2N_($n2n_cfg_as_id,$wzListScopeID)
	{
		$n2n_cfg_as_id = frontcontrollerx::isInt($n2n_cfg_as_id,'wN2N_1');
		$wzListScopeID = frontcontrollerx::isInt($wzListScopeID,'wN2N_2');

		if ($n2n_cfg_as_id === false) frontcontrollerx::json_failure('n2n_cfg_as_id not int');

		$as 		= xredaktor_atoms_settings::getById($n2n_cfg_as_id);
		$as_config 	= json_decode($as['as_config'],true);

		$wa_attr = $as_config['wa_attr'];
		$wb_attr = $as_config['wb_attr'];

		if (!is_numeric($wa_attr) || !is_numeric($wb_attr))
		{
			frontcontrollerx::json_failure('NO CONFIG');
		}

		$wa_settings = xredaktor_atoms_settings::getById($wa_attr);
		$wb_settings = xredaktor_atoms_settings::getById($wb_attr);

		$wa_fieldName = 'wz_'.$wa_settings['as_name'];
		$wb_fieldName = 'wz_'.$wb_settings['as_name'];


		$wa_a_id	 = $wa_settings['as_a_id'];
		$wb_a_id	 = $wb_settings['as_a_id'];

		if ($wa_a_id != $wb_a_id) {
			frontcontrollerx::json_failure('CONFIG FAILED!');
		}

		$wa_wizardRecordsID	 = $wa_settings['as_config'];
		$wb_wizardRecordsID	 = $wb_settings['as_config'];

		$check_table 	= xredaktor_wizards::genWizardTableNameBy_a_id($wa_a_id);
		$table 			= xredaktor_wizards::genWizardTableNameBy_a_id($wb_wizardRecordsID);

		$data 			= dbx::queryAll("select $table.*,!ISNULL($check_table.$wa_fieldName) as wz_n2n_check from $table left join $check_table ON $check_table.$wb_fieldName=$table.wz_id and $check_table.$wa_fieldName = $wzListScopeID where $table.wz_del = 'N' order by $table.wz_sort ASC");

		return $data;
	}


	/***********************************************************************************************************************************/
	/***********************************************************************************************************************************/
	/***********************************************************************************************************************************/

	public static function wGetAssozById($wz_id)
	{
		$all = self::wGetAll($wz_id);
		if ($all === false) $all = array();
		$ret = array();
		foreach ($all as $r)
		{
			$ret[$r['wz_id']] = $r;
		}
		return $ret;
	}

	public static function wGetAssozByIdAndRecord($wz_id,$r_id,$field=false,$returnUnknownR_ID=false)
	{
		$assoz 	= self::wGetAssozById($wz_id);
		if (!isset($assoz[$r_id])) return $returnUnknownR_ID;

		$rec = $assoz[$r_id];
		if ($field === false) return $rec;
		return $rec[$field];
	}

	public static function wGetAll($wz_id) {
		$table = xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$all = dbx::queryAll("select * from $table where wz_del = 'N' order by wz_sort");
		return $all;
	}

	public static function wGetAllViaVID($wz_vid_id) {
		$table = xredaktor_wizards::genWizardTableNameByVID($wz_vid_id);
		$all = dbx::queryAll("select * from $table where wz_del = 'N' and wz_online = 'Y' order by wz_sort");
		return $all;
	}

	public static  function wUpdate($wz_id,$r_id,$data)
	{
		dbx::update(xredaktor_wizards::genWizardTableNameBy_a_id($wz_id),$data,array('wz_id'=>$r_id));
	}

	public static  function wUpdateField($as_id,$r_id,$data)
	{
		$as = dbx::query("select * from atoms_settings where as_id = $as_id");
		if ($as['as_type_multilang']=='Y') return false;
		$wz 		= $as['as_a_id'];
		$as_name 	= $as['as_name'];
		dbx::update(xredaktor_wizards::genWizardTableNameBy_a_id($wz),array('wz_'.$as_name=>$data),array('wz_id'=>$r_id));
	}

	public  static function wInsert($wz_id,$data=false)
	{
		$wz_id = intval($wz_id);
		if (!is_array($data)) $data=array();
		$data['wz_lastChanged']	= 'NOW()';
		$data['wz_created']		= 'NOW()';
		dbx::insert(xredaktor_wizards::genWizardTableNameBy_a_id($wz_id),$data);
		return dbx::getLastInsertId();
	}

	public static  function wDelete($wz_id, $r_id)
	{
		dbx::delete(xredaktor_wizards::genWizardTableNameBy_a_id($wz_id),array('wz_id'=>$r_id));
	}

	public  static function getAttribNameViaAS_ID($as_id)
	{
		return xredaktor_wizards::genAttributeName($as_id);
	}

	public  static function fetchRecordById($wz,$wz_id)
	{
		$wz_id 	= intval($wz_id);
		$table 	= xredaktor_wizards::genWizardTableNameBy_a_id($wz);
		$sql 	= "select * from $table where wz_id = $wz_id";
		return dbx::query($sql);
	}

	public  static function fetchRecordByAttribute($as_id,$value,$multiple=false,$exaktSearch=true,$joins=false,$mapFields=false)
	{
		if (!is_numeric($as_id)) return false;
		$value = dbx::escape($value);

		$as 		= dbx::query("select * from atoms_settings where as_id = $as_id");
		if ($as['as_type_multilang']=='Y') return false;

		$wz 		= $as['as_a_id'];
		$as_name 	= $as['as_name'];

		if ($exaktSearch)
		{
			if ($joins === false)
			{
				$sql = "select * from ".xredaktor_wizards::genWizardTableNameBy_a_id($wz)." where `wz_$as_name` = '$value' ";
			} else
			{
				$EXTRA 		= array();
				$tables 	= array();
				$tables[] 	= $tableBase = xredaktor_wizards::genWizardTableNameBy_a_id($wz);

				foreach ($joins as $fieldName => $_wz)
				{
					$table 		= xredaktor_wizards::genWizardTableNameBy_a_id($_wz);
					$tables[] 	= $table;
					$EXTRA[]	= " `$tableBase`.`$fieldName` = `$table`.`wz_id` ";
				}

				$sql = "select * from ".implode(",",$tables)." where `wz_$as_name` = '$value' and ".implode(' AND ',$EXTRA);
			}
		} else
		{
			if ($joins  === false)
			{
				$sql = "select * from ".xredaktor_wizards::genWizardTableNameBy_a_id($wz)." where `wz_$as_name` LIKE '%$value%' ";
			}

			// $JOINS NOCH CODEN
		}

		if ($multiple)
		{
			$data = dbx::queryAll($sql);
			if ($mapFields)
			{
				$data = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti($wz,$data);
			}
		} else
		{
			$data = dbx::query($sql);
			if ($mapFields)
			{
				$data = xredaktor_wizards::mapLanguageFieldsToNormFields($wz,$data);
			}
		}

		return $data;
	}


	public  static function fetchFullWizardDataBySettings2($wz_1,$wz_1_fkey,$id)
	{
		if (!is_numeric($id)) 			return false;
		if (!is_numeric($wz_1)) 		return false;
		if (!is_numeric($wz_1_fkey)) 	return false;
		$as = dbx::query("select * from atoms_settings where as_id = $wz_1_fkey");
		if ($as === false) return false;
		$wz_2 		= $as['as_config'];
		$wz_1_fkey 	= 'wz_'.$as['as_name'];

		if (!is_numeric($wz_2))
		{
			return false;
		}

		$assign_wz1 = dbx::query("select wz$wz_1.* from wizard_auto_$wz_1 as wz$wz_1,wizard_auto_$wz_2 as wz$wz_2 where wz22.wz_id = $id and wz22.$wz_1_fkey = wz$wz_2.wz_id");
		$assign_wz2 = dbx::query("select wz$wz_2.* from wizard_auto_$wz_1 as wz$wz_1,wizard_auto_$wz_2 as wz$wz_2 where wz22.wz_id = $id and wz22.$wz_1_fkey = wz$wz_2.wz_id");

		$assign_wz1 = xredaktor_wizards::mapLanguageFieldsToNormFields($wz_1,$assign_wz1);
		$assign_wz2 = xredaktor_wizards::mapLanguageFieldsToNormFields($wz_2,$assign_wz2);

		$assign['wz'.$wz_1] = $assign_wz1;
		$assign['wz'.$wz_2] = $assign_wz2;

		if ($_REQUEST['WZFETCHINFO'] == 1)
		{
			echo "<pre>";
			print_r($assign);
			echo "</pre>";
		}

		return $assign;
	}


	public  static function fetchFullWizardData($wz_id, $wz_r_id)
	{
		// Checke alle FREMDSCHLÜSSELN
	}

	public  static function genExtFuntionsConfig($a_id)
	{
		$extFunctionsConfig = false;

		$atomSettings = false;
		if (!is_array(($atomSettings=xredaktor_atoms::getById($a_id)))) frontcontrollerx::json_failure('WIZARD_CONFIG_WRONG(genExtFuntionsConfig)',800,array('a_id'=>$a_id));
		$a_wizard_as_p_name = $atomSettings['a_wizard_as_p_name'];
		$a_wizard_as_p_nameAttribute = "";
		$langs = xredaktor_pages::getValidLangs();
		$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' order by as_sort");
		if (!is_array($ass)) $ass = array();

		$fields = array('wz_id','wz_name','wz_sort','wz_online','wz_created','wz_createdBy');
		foreach ($ass as $as)
		{
			$as_id = $as['as_id'];
			if ($as_id  == $a_wizard_as_p_name)
			{
				$a_wizard_as_p_nameAttribute = "wz_".$as['as_name'];
			}

			$atttributeNameX = 'wz_'.$as['as_name'];
			$fields[] = $atttributeNameX;
			if ($as['as_type_multilang']=='Y')
			{
				foreach ($langs as $lang)
				{
					$fields[] = '_'.strtoupper($lang).'_'.$atttributeNameX;
				}
			}
		}


		$extFunctionsConfig = array(
		'table'		=> xredaktor_wizards::genWizardTableNameBy_a_id($a_id),
		'sort'		=> 'wz_sort',
		'pid'		=> 'wz_id',
		'fid'		=> 'wz_fid',
		'name'		=> $a_wizard_as_p_nameAttribute,			// FOR TREE
		'del'		=> 'wz_del',
		'fields'	=> $fields,
		'update'	=> $fields,
		'extraInsert' => array('wz_created' => 'NOW()'),
		'normalize'	=> array(
		'string'	=> $fields
		));

		return $extFunctionsConfig;

	}


	public  static function mail($emails,$emailPage,$globalAssigns=array(),$subject='')
	{
		$send2 = explode(",",$emails);
		if (!is_array($send2)) $send2 = array();
		$send2[] = 'alexander.schramm@pixelfarmers.at';
		$html = "";

		if (is_numeric($emailPage) && count($send2)>0)
		{

			$html = xredaktor_render::renderPage($emailPage,true,$globalAssigns);
			$storage = dirname(xredaktor_storage::getDirOfStorageScope(1)); // CHACNGE FOR THE NEXT SITES

			foreach ($send2 as $to)
			{
				$mailCfg = array(
				'to'						=> array('email' => $to, 'name'=> $to),
				'from'						=> array('email' => Ixredaktor::wizard_from_email ,	'name' => Ixredaktor::wizard_from_name ),
				'reply'						=> array('email' => Ixredaktor::wizard_from_email ,	'name' => Ixredaktor::wizard_from_name ),
				'html'						=> $html,
				'txt'						=> '',
				'subject'					=> $subject,
				'priority'					=> mailx::PRIO_NORMAL,
				'imageProcessing' 			=> true,
				'imageProcessing_type' 		=> 'embedd',
				'imageProcessing_location' 	=> $storage,
				);

				if (!mailx::sendMail($mailCfg))
				{
					// sollten wir melden ...
				}
			}
		}
	}

}