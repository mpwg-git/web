<?

class xredaktor_wizards
{
	const wizard_prefixes = "wizard_auto";



	public static function toStaticArrayFlat($a_id,$r_id,$maxRelationsDepth=2)
	{
		$maxRelationsDepth--;
		if ($maxRelationsDepth < 0) return false;

		$table = self::genWizardTableNameBy_a_id($a_id);
		$db 	= dbx::query("select * from $table where wz_id = $r_id");
		$ass 	= dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del='N'");


		$static = $db;

		foreach ($ass as $as)
		{

			$as_name	= $as['as_name'];
			$as_type 	= $as['as_type'];

			$value 		= $db['wz_'.$as_name];

			switch ($as_type)
			{
				case 'WIZARDLIST':

					$wzl_id 	= intval($as['as_config']);

					if ($wzl_id > 0)
					{



						$_as = xredaktor_atoms_settings::getById($wzl_id);
						$other_a = $_as['as_a_id'];

						$table = xredaktor_wizards::genWizardTableNameBy_a_id($other_a);
						$field = 'wz_'.$_as['as_name'];


						//frontcontrollerx::json_debug(" $table $field ");

						if (dbx::attributePresent($table,$field))
						{
							$data = dbx::queryAll("select * from $table where $field = $r_id and wz_del='N'");
							$data = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti($other_a,$data);
							$static['data_'.$as_name] = $data;
						}
					}


					break;

				case 'HTML':

					$static['wz_'.$as_name] = xredaktor_xr_html::toStaticHtml($value);

					break;
				case 'FILE':

					$value = intval($value);
					$f = dbx::query("select * from storage where s_id = $value");
					if ($f === false)
					{
						continue;
					}

					$alts = json_decode($f['s_alts'],true);
					if (!is_array($alts)) $alts = array();

					$static['file_'.$as_name] = array(
					's_id' 			=> $value,
					'alt' 			=> $alts['DE'],
					'description' 	=> "",
					'copyright' 	=> "",
					);


					break;
				case 'CONTAINER-IMAGES':
				case 'CONTAINER-FILES':


					$table 			= xredaktor_wizards::handle_CONTAINER_FILES_table($as);
					$files 			= dbx::queryAll("select * from $table,storage where wz_r_id = $r_id and wz_del = 'N' and s_id = wz_s_id and s_del='N' order by wz_sort asc");

					$as_id = $as['as_id'];
					//echo " $as_name | $as_id ($a_id,$r_id) select * from $table,storage where wz_r_id = $r_id and wz_del = 'N' and s_id = wz_s_id and s_del='N'\n";
					$tmp = array();
					foreach ($files as $f)
					{
						$wz_meta_data = json_decode($f['wz_meta_data'],true);
						$wz_meta_data['s_id'] = $f['wz_s_id'];



						if (!isset($wz_meta_data['description'])) 	$wz_meta_data['description'] 	= "";
						if (!isset($wz_meta_data['copyright'])) 	$wz_meta_data['copyright'] 		= "";
						if (!isset($wz_meta_data['alt'])) 			$wz_meta_data['alt'] 			= "";


						$tmp[]  = $wz_meta_data;
					}

					$static['files_'.$as_name] = $tmp;


					break;
				case 'SIMPLE_W2W':

					$as_gui_mode 	= intval($as['as_gui_mode']);
					$wz_id 			= intval($as['as_config']);

					$foreignData = xredaktor_gui::getGenericDataSets2($wz_id,$r_id,$wz_id,$as['as_a_id'],true);
					$checkboxes = array();

					foreach ($foreignData as $fdata)
					{
						if ($fdata['wz_n2n_check'] != '1') continue;

						$title 	= xredaktor_wizards::getWizardRecordDataTitleByConfig($wz_id,intval($fdata['wz_id']));

						$checkboxes[] = array(
						'titleIt'	=> $title,
						'wz_r_id'	=> $fdata['wz_id'],
						'wz_id'		=> $wz_id,
						//	'static'	=>
						);
					}

					switch ($as_gui_mode)
					{

						case 1: // checkbox 1:n

						$static['sw2w_1n_'.$as_name] = $checkboxes[0];

						break;

						default:

							$static['sw2w_nn_'.$as_name] = $checkboxes;

							break;
					}


					break;

				case 'WIZARD':

					$as_config = intval($as['as_config']);
					if ($as_config == 0) continue;

					$table		= xredaktor_wizards::genWizardTableNameBy_a_id($as_config);
					$titleIt	= xredaktor_wizard_do_magic_grid::getTitleItSql($as_config);

					$value = intval($value);

					$record	= dbx::query("select $titleIt, wz_id as wz_r_id, $as_config as wz_id  from $table where wz_del='N' and wz_id = $value");

					$static['cfg_'.$as_name] 	= $record;
					$static['static_'.$as_name] = self::toStaticArrayFlat($as_config,$value,$maxRelationsDepth);

					break;

				case 'COLLECTOR':
				case 'STAMPER':
				case 'TEXTAREA':
				case 'TEXT':
				case 'DATE':
				case 'TIME':
				case 'PASSWORD':
				case 'INT':
				case 'FLOAT':
				case 'GEO-POINT':
					break;
				case 'COMBO':
				case 'RADIO':
				case 'CHECKBOX':

					$as_config 		= json_decode($as['as_config'],true);
					$linearSorted 	= $as_config['l'];

					foreach ($linearSorted as $pack)
					{

						$tmp = array();
						$key = $pack['v'];
						$tmp['k'] = $key;
						$value = $pack[$currentLang];

						if (trim($value)=="")
						{
							$found = false;
							foreach ($failOverLangs as $lang)
							{
								$lang 	= strtoupper($lang);
								$value 	= $pack[$lang];
								if (trim($value)!="")
								{
									$found=true;
									break;
								}
							}
							if (!$found) {
								$value = $pack['g'];
							}
						}

						$tmp['v'] = $value;
						$cfg['l'][] = $tmp;
						$cfg['a'][$key] = $value;

					}


					$static['cfg_'.$as_name] = $cfg;




					break;



				default:
					//	echo "not $as_type<br>";
					break;

			}

		}

		return $static;
	}


	public static function getMysqlFuncNameOfTitleIt($a_id)
	{
		return "xr_getWzTitleIt_".intval($a_id);
	}

	public static function dbFunctions_titleIt($a_id)
	{
		$a_id = intval($a_id);
		if ($a_id == 0) return false;

		$funcName 	= self::getMysqlFuncNameOfTitleIt($a_id);
		$table		= xredaktor_wizards::genWizardTableNameBy_a_id($a_id);
		$sql		= xredaktor_wizard_do_magic_grid::getTitleItFieldCombi($a_id);


		$sql_drop = "DROP FUNCTION IF EXISTS $funcName;";
		dbx::mQuery($sql_drop);

		$sql_create = "CREATE FUNCTION `$funcName`(id INT) RETURNS text CHARSET utf8
BEGIN
DECLARE titleIt TEXT;
SELECT ($sql) as titleItX INTO titleIt FROM $table WHERE wz_id = id;
RETURN titleIt;
END
;
";
		dbx::query($sql_create);
		if (!dbx::isFunctionPresent($funcName)) {
			return false;
		}
		return true;
	}



	public static function getCheckBoxConfigById($id=0)
	{
		$cfg = array();

		$id = intval($id);

		$cfg = array(
		'l'=>array(),
		'a'=>array());

		$as = dbx::query("select * from atoms_settings where as_id = $id and as_del = 'N' and (as_type = 'COMBO' OR as_type = 'RADIO' or as_type='CHECKBOX')");
		if ($as === false) $cfg = false;
		else
		{
			$currentLang 	= strtoupper(xredaktor_pages::getFrontEndLang());
			$failOverLangs 	= xredaktor_pages::getLangFailOverOrder();

			$as_config 		= json_decode($as['as_config'],true);
			$linearSorted 	= $as_config['l'];

			foreach ($linearSorted as $pack)
			{

				$tmp = array();
				$key = $pack['v'];
				$tmp['k'] = $key;
				$value = $pack[$currentLang];

				if (trim($value)=="")
				{
					$found = false;
					foreach ($failOverLangs as $lang)
					{
						$lang 	= strtoupper($lang);
						$value 	= $pack[$lang];
						if (trim($value)!="")
						{
							$found=true;
							break;
						}
					}
					if (!$found) {
						$value = $pack['g'];
					}
				}

				$tmp['v'] = $value;
				$cfg['l'][] = $tmp;
				$cfg['a'][$key] = $value;

			}

		}

		return $cfg;
	}


	public static function processFrontEndFormUpdate($cfg)
	{
		$disableSecurity = false;
		if (isset($cfg['disableSecurity']))
		{
			$disableSecurity = ($cfg['disableSecurity'] == '1');
			unset($cfg['disableSecurity']);
		}
	
		if (!self::processFrontEndFormSecurityCheck())
		{
			if (!$disableSecurity)
			{
				if (libx::isDeveloper())
				{
					die('SEC-FAULT');
				}
				return false;
			}
		}

		$w_id 			= $cfg['w_id'];
		$r_id 			= $cfg['r_id'];

		$ass 			= self::getASS($w_id);
		$fields 		= array();
		$data2inject 	= array();

		$fields2parse	= array();

		foreach ($ass as $as)
		{
			$as_name 	= $as['as_name'];
			$as_type 	= $as['as_type'];
			$as_config 	= $as['as_config'];

			switch ($as_type) {
				case 'WIZARDLIST':
				case 'WIZARD2WIZARD':
				case 'COMMENT':
				case 'CONTAINER':
				case 'SIMPLE_W2W':	
					break;
				case 'CHECKBOX':
					/*
					$checkboxCfg = json_decode($as_config,true);
					foreach ($checkboxCfg['l'] as $d) // MULTILANG NOCH CHECKEN
					{
					//list($k,$v,$crap) = $d;
					$k = $d['v'];
					$data2inject['wz_'.$as_name.'_'.$k] = $_REQUEST[$as_name.'_'.$k];
					}
					*/
					break;
				default:
					//$data2inject['wz_'.$as_name] = $_REQUEST[$as_name];
					$fields2parse[] = $as_name;
					if (isset($_REQUEST[''.$as_name]))
					{
						$data2inject['wz_'.$as_name] = $_REQUEST[''.$as_name];
					}
			}
		}

		if (!is_numeric($r_id)) return false;
		if (count($data2inject) == 0) return false;

		$tableName = self::genWizardTableNameBy_a_id($w_id);
		dbx::update($tableName,$data2inject,array('wz_id'=>$r_id));

		$record = dbx::query("select * from $tableName where 1 AND wz_id = $r_id order by wz_sort ASC");
		$record = xredaktor_wizards::mapLanguageFieldsToNormFields($r_id,$record);

		return $record;
	}


	public static function getRecordByIds($w_id,$r_id)
	{
		$w_id = intval($w_id);
		$r_id = intval($r_id);
		$tableName = self::genWizardTableNameBy_a_id($w_id);
		$r = dbx::query("select * from $tableName where wz_id = $r_id");
		$r = self::mapLanguageFieldsToNormFields($w_id,$r);
		return $r;
	}

	public static function getRecordByVIds($vw_id,$r_id)
	{
		$vw_id = intval($vw_id);
		$r_id = intval($r_id);

		$atom		= xredaktor_atoms::getByVID($vw_id);
		$w_id 		= $atom['a_id'];

		$tableName = self::genWizardTableNameByVID($vw_id);

		$r = dbx::query("select * from $tableName where wz_id = $r_id");
		$r = self::mapLanguageFieldsToNormFields($w_id,$r);
		return $r;
	}

	public static function getRecordsByVId($vw_id)
	{
		$vw_id = intval($vw_id);

		$atom		= xredaktor_atoms::getByVID($vw_id);
		$w_id 		= $atom['a_id'];

		$tableName = self::genWizardTableNameByVID($vw_id);
		$rs = dbx::queryAll("select * from $tableName where 1 = 1");
		$rs = self::mapLanguageFieldsToNormFieldsMulti($w_id,$rs);

		return $rs;
	}

	public static function getRecordsById($a_id,$sql_add_on = " and wz_del='N' and wz_online='Y' order by wz_sort asc")
	{
		$a_id = intval($a_id);
		$tableName = self::genWizardTableNameBy_a_id($a_id);
		$rs = dbx::queryAll("select * from $tableName where 1 = 1 ");
		$rs = self::mapLanguageFieldsToNormFieldsMulti($a_id,$rs);
		return $rs;
	}

	/*****************************************************************************************************************
	********                                                       ***************************************************
	******** FRONTEND STUFF
	********                                                       ***************************************************
	******************************************************************************************************************/

	private static function _initFormSecurity()
	{
		@session_start();
		if (!isset($_SESSION['ONE_TIME_PAD'])) $_SESSION['ONE_TIME_PAD'] = array();
	}

	private static function _genFromSecuritryKey()

	{
		self::_initFormSecurity();
		$key = md5(time()*rand());
		$_SESSION['ONE_TIME_PAD'][$key] = 1;
		return $key;
	}

	private static function _isValidFromSecuritryKey($key)

	{
		self::_initFormSecurity();
		return isset($_SESSION['ONE_TIME_PAD'][$key]);
	}

	public static function processFrontEndFormSecurity()
	{

		$key = self::_genFromSecuritryKey();
		$html = "<input type='hidden' value='$key' name='wzActionInvisibleCaptcha' class='wzActionInvisibleCaptcha' >";
		return $html;
	}

	public static function processFrontEndFormSecurityCheck()
	{
		self::_initFormSecurity();
		$key = $_REQUEST['wzActionInvisibleCaptcha'];
		
		if (self::_isValidFromSecuritryKey($key)) {
			unset($_SESSION['ONE_TIME_PAD'][$key]);
			return true;
		} else
		{
			return false;
		}
	}

	public static function processFrontEndForm($cfg)
	{

		global $XREDAKTOR_CODE_TESTING;

		if ($XREDAKTOR_CODE_TESTING) return array();
		if (xredaktor_render::isCMS_MODE()) return array();

		$disableSecurity = false;

		if (isset($cfg['disableSecurity']))
		{
			$disableSecurity = ($cfg['disableSecurity'] == '1');
			unset($cfg['disableSecurity']);
		}

		if (!self::processFrontEndFormSecurityCheck())
		{
			if (!$disableSecurity)
			{
				if (libx::isDeveloper())
				{
					//die('SEC-FAULT-NO-VALID-SECURITY-TOKEN-PRESENT');
				}
				return false;
			}
		}

		$w_id								= $cfg['w_id'];
		$ass 			= self::getASS($w_id);
		$fields								= array();
		$data2inject 	= array();

		foreach ($ass as $as)
		{
			$as_name 	= $as['as_name'];
			$as_type 	= $as['as_type'];
			$as_config 	= $as['as_config'];

			switch ($as_type) {
				case 'WIZARDLIST':
				case 'WIZARD2WIZARD':
				case 'COMMENT':
				case 'CONTAINER':
				case 'SIMPLE_W2W':
					break;
				case 'CHECKBOX':
					$checkboxCfg = json_decode($as_config,true);
					foreach ($checkboxCfg['l'] as $d) // MULTILANG NOCH CHECKEN
					{
						//list($k,$v,$crap) = $d;
						$k = $d['v'];
						$data2inject['wz_'.$as_name.'_'.$k] = $_REQUEST[$as_name.'_'.$k];
					}
					break;
				default:
					$data2inject['wz_'.$as_name] = $_REQUEST[$as_name];
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
		$tableName = self::genWizardTableNameBy_a_id($w_id);
		
		dbx::insert($tableName,$data2inject);
		$r_id = dbx::getLastInsertId();


		if ($cfg['mail']==1)
		{
			$send2 		= explode(",",$cfg['email']);
			if (!is_array($send2)) $send2 = array();
			$send2[] = 'alexander.schramm@pixelfarmers.at';

			$emailPage 	= $cfg['emailPage'];
			$html 		= "";

			$customerMail = trim($data2inject[$cfg['mailCustomer']]);

			if ($customerMail != "") {
				$send2[] = $customerMail;
			}

			$mailSettings = xredaktor_niceurl::getSiteConfigViaPageId($emailPage);

			if (is_numeric($emailPage) && count($send2)>0)
			{
				$_REQUEST['R_ID'] = $r_id;
				$html = xredaktor_render::renderPage($emailPage,true);

				$storage = dirname(xredaktor_storage::getDirOfStorageScope(1)); // CHACNGE FOR THE NEXT SITES

				$s_mail_from_name 	= $mailSettings['s_mail_from_name'];
				$s_mail_from_email 	= $mailSettings['s_mail_from_email'];
				$s_mail_smtp_server = $mailSettings['s_mail_smtp_server'];
				$s_mail_smtp_user 	= $mailSettings['s_mail_smtp_user'];
				$s_mail_smtp_pwd 	= $mailSettings['s_mail_smtp_pwd'];

				if (isset($cfg['s_mail_smtp_server']))
				{
					$s_mail_reply_name 	= $cfg['s_mail_reply_name'];
					$s_mail_reply_email = $cfg['s_mail_reply_email'];
					$s_mail_from_name 	= $cfg['s_mail_from_name'];
					$s_mail_from_email 	= $cfg['s_mail_from_email'];
					$s_mail_smtp_server = $cfg['s_mail_smtp_server'];
					$s_mail_smtp_user 	= $cfg['s_mail_smtp_user'];
					$s_mail_smtp_pwd 	= $cfg['s_mail_smtp_pwd'];
				}

				if (trim($s_mail_reply_name) == "") 	$s_mail_reply_name 	= $s_mail_from_name;
				if (trim($s_mail_reply_email) == "") 	$s_mail_reply_email = $s_mail_from_email;

				foreach ($send2 as $to)
				{
					$mailCfg = array(
					'to'						=> array('email'=>$to,'name'=>$to),
					'from'						=> array('email' => $s_mail_from_email ,	'name' => $s_mail_from_name ),
					'reply'						=> array('email' => $s_mail_from_email ,	'name' => $s_mail_from_name ),
					'html'						=> $html,
					'txt'						=> '',
					'subject'					=> $cfg['subject'],
					'priority'					=> mailx::PRIO_NORMAL,
					'imageProcessing' 			=> true,
					'imageProcessing_type' 		=> 'embedd',
					'imageProcessing_location' 	=> $storage,
					'smtp_settings'				=> array(
					'smtp_server'	=> $s_mail_smtp_server,
					'smtp_user'		=> $s_mail_smtp_user,
					'smtp_pwd'		=> $s_mail_smtp_pwd,
					)
					);

					/*
					echo "<pre>";
					print_r($mailCfg);
					echo "</pre>";
					*/
					if (!mailx::sendMail($mailCfg))
					{
						echo "<b>Mail konnte nicht geschickt werden.</b>";
					}
				}
			}
		}

		return dbx::query("select * from $tableName where wz_id = $r_id");
	}

	public static function fetchRecord($w_id,$r_id)
	{
		if (!is_numeric($w_id)) return false;
		if (!is_numeric($r_id)) return false;
		$tableName	= self::genWizardTableNameBy_a_id($w_id);
		$record		= dbx::query("select * from $tableName where 1 AND wz_id = $r_id and wz_del='N' and wz_online='Y'");
		return $record;
	}


	public static function mapLanguageFieldsToNormFieldsMulti($a_id,$records)
	{
		if ($records === false) return false;
		$translated = array();
		foreach ($records as $r)
		{
			$tmp = self::mapLanguageFieldsToNormFields($a_id,$r);
			$translated[] = $tmp;
		}
		return $translated;
	}


	public static function resolveWizard2Wizard($r_id, $n2n_cfg_as_id,$N2N_ONLY_CHECKED=false)
	{
		$wzListScopeID 	= intval($r_id);
		if ($n2n_cfg_as_id === false) frontcontrollerx::json_failure('n2n_cfg_as_id not int');

		$as 		= xredaktor_atoms_settings::getById($n2n_cfg_as_id);
		$as_config 	= json_decode($as['as_config'],true);

		$wa_attr = $as_config['wa_attr'];
		$wb_attr = $as_config['wb_attr'];

		if (!is_numeric($wa_attr) || !is_numeric($wb_attr))
		{
			return array();
			frontcontrollerx::json_failure('NO CONFIG');
		}

		$wa_settings = xredaktor_atoms_settings::getById($wa_attr);
		$wb_settings = xredaktor_atoms_settings::getById($wb_attr);

		$wa_fieldName = 'wz_'.$wa_settings['as_name'];
		$wb_fieldName = 'wz_'.$wb_settings['as_name'];


		$wa_a_id	 = $wa_settings['as_a_id'];
		$wb_a_id	 = $wb_settings['as_a_id'];

		if ($wa_a_id != $wb_a_id) {
			return array();
			frontcontrollerx::json_failure('CONFIG FAILED!');
		}

		$wa_wizardRecordsID	 = $wa_settings['as_config'];
		$wb_wizardRecordsID	 = $wb_settings['as_config'];

		$check_table 	= xredaktor_wizards::genWizardTableNameBy_a_id($wa_a_id);
		$table 			= xredaktor_wizards::genWizardTableNameBy_a_id($wb_wizardRecordsID);

		if ($N2N_ONLY_CHECKED)
		{
			$sql 	= "select $check_table.*,$table.*, 1 as wz_n2n_check from $table,$check_table where $check_table.$wb_fieldName=$table.wz_id and $check_table.$wa_fieldName = $wzListScopeID and $table.wz_del = 'N' order by $table.wz_sort ASC";
			$data 	= dbx::queryAll($sql);
		}
		else
		{
			$data 			= dbx::queryAll("select $check_table.*,$table.*,!ISNULL($check_table.$wa_fieldName) as wz_n2n_check from $table left join $check_table ON $check_table.$wb_fieldName=$table.wz_id and $check_table.$wa_fieldName = $wzListScopeID where $table.wz_del = 'N' order by $table.wz_sort ASC");
		}

		$data = self::mapLanguageFieldsToNormFieldsMulti($wb_wizardRecordsID,$data);

		return $data;
	}


	public static function mapLanguageFieldsToNormFields($a_id,$record,$processN2N=false,$N2N_ONLY_CHECKED=false,$RESOLVE_WIZARDS_RECORD=false,$currentLang=false)
	{
		if ($record === false) return false;

		$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N'");
		if (!is_array($ass)) return $record;

		if ($currentLang === false)
		{
			$currentLang 	= strtoupper(xredaktor_pages::getFrontEndLang());
		} else
		{
			$currentLang 	= strtoupper($currentLang);
		}

		$failOverLangs 	= xredaktor_pages::getLangFailOverOrder();
		$jsonFields 	= xredaktor_render::getJSON_Fields($a_id);

		foreach ($ass as $as)
		{
			$as_type_multilang 		= $as['as_type_multilang'];
			$as_type				= $as['as_type'];
			$key 					= $as['as_name'];
			$atttributeName 		= 'wz_'.$key;
			$atttributeNameLang 	= '_'.$currentLang.'_'.$atttributeName;

			$value = trim($record[$atttributeName]);

			if ($as_type_multilang == "Y")
			{

				$value = trim($record[$atttributeNameLang]);
				$value = xredaktor_render::handleValueByType($as,$value);


				if ((($as_type == 'FILE') || ($as_type == 'IMAGE')) && ($value == "0")) {
					$value = "";
				}

				if (trim($value)=="")
				{
					$found = false;

					foreach ($failOverLangs as $lang)
					{
						$value = trim($record['_'.strtoupper($lang).'_'.$atttributeName]);
						$value = xredaktor_render::handleValueByType($as,$value);
						if ($value!="")
						{
							$found = true;
							break;
						}
					}

					if (!$found)
					{
						$value = trim($record[$atttributeName]);
						$value = xredaktor_render::handleValueByType($as,$value);
					}
				}

				if ((($as_type == 'FILE') || ($as_type == 'IMAGE')) && ($value == "")) {
					$value = "0";
				}
			}

			if ($RESOLVE_WIZARDS_RECORD && $as_type == "WIZARD")
			{

			}

			if (($as_type == "WIZARD2WIZARD") && ($processN2N))
			{
				$as_id		= $as['as_id'];
				$wz_r_id 	= $record['wz_id'];
				$data 		= self::resolveWizard2Wizard($wz_r_id,$as_id,$N2N_ONLY_CHECKED);
				$record[$atttributeName] = $data;
				continue;
			}


			if (in_array($as_type,array('CHECKBOX','COMBO','RADIO')))
			{
				$as_type_multilang 	= $as['as_type_multilang'];
				$as_name 			= $as['as_name'];
				$as_config 			= $as['as_config'];
				$tmp  				= json_decode($as_config,true);

				$assoz 						= $tmp['a'];
				$linearSorted				= $tmp['l'];
				$record['CFG_wz_'.$as_name] = $tmp;

				switch ($as_type)
				{
					case 'CHECKBOX':

						$reassign = array('a'=>array(),'l'=>array(),'on'=>array(),'off'=>array());

						/*echo "------------------------- START";
						echo "<pre>\nLANG :: $currentLang\n";
						print_r($linearSorted);
						echo "</pre>";
						echo "------------------------- END";
						*/

						foreach ($linearSorted as $checkSets)
						{

							$preKey = "";
							if ($as_type_multilang == 'Y')
							{
								$preKey = '_'.$currentLang.'_';
							}

							$keyNacked	= 'wz_'.$as_name.'_'.$checkSets['v'];
							$key 		= $preKey.$keyNacked;


							$checked 	= isset($record[$key]);

							if ($checked)
							{

								$label = $checkSets[$currentLang];

								if (trim($label)=="")
								{
									$found = false;
									foreach ($failOverLangs as $i=>$flang)
									{
										$flang	= strtoupper($flang);
										$label 	= $checkSets[$flang];
										if (trim($label) != "")
										{
											$found = true;
											break;
										}
									}
									if (!$found)
									{
										$label = $checkSets['g'];
									}
								}


								$state = $record[$key];

								$record['LABEL_wz_'.$as_name.'_'.$checkSets['v']] 	= $label;
								$reassign['a'][$checkSets['v']] = $label;
								$reassign['l'][] 				= array('k'=>$checkSets['v'],'v'=>$label);

								$reassign[$state]['a'][$checkSets['v']] = $label;
								$reassign[$state]['l'][] 		= array('k'=>$checkSets['v'],'v'=>$label);
							}

						}

						/*


						echo "------------------------- $reassign START";
						echo "<pre>\nLANG :: $currentLang\n";
						print_r($reassign);
						echo "</pre>";
						echo "------------------------- END";
						/**/

						$record['wz_'.$as_name] = $reassign;


						break;
					default:

						if ($as_type_multilang == 'Y')
						{
							$multiKey = '_'.$lang.'_wz_'.$as_name;
							$label = $tmp['a'][$record[$multiKey]][$lang];
							if (trim($label)=="")
							{
								$found = false;
								foreach ($langFailOver as $i=>$flang)
								{
									$flang 		= strtoupper($flang);
									$multiKey	= '_'.$flang.'_wz_'.$as_name;
									$label = $tmp['a'][$record[$multiKey]][$flang];
									if ($value != "")
									{
										$found = true;
										break;
									}
								}
								if (!$found)
								{
									$label = $tmp['a'][$record[$multiKey]]['g'];
								}
							}
						} else
						{
							$label = $tmp['a'][$value][$currentLang];
							// ÜBERLAUF FEHLT HIER
						}
						$record['LABEL_wz_'.$as_name] 	= $label;
				}
			} else
			{
				$record[$atttributeName] = $value;
			}

			//			$record[$atttributeName] = $value;

			if ($as_type == "HTML") {
					
				
				
				$record[$atttributeName] = xredaktor_render::renderHtmlEditor($value);
			}

			if (in_array($key,$jsonFields)) {
				$record[$atttributeName] = json_decode($value,true);
			}
		}

		return $record;
	}

	/*****************************************************************************************************************
	********                                                       ***************************************************
	******** HARDCORE
	********                                                       ***************************************************
	******************************************************************************************************************/

	public static function getASS($a_id)
	{
		$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N'");
		if (!is_array($ass)) $ass = array();
		return $ass;
	}


	private static function cerateDefaultWizardTable($tableName)
	{
		$sql = "CREATE TABLE IF NOT EXISTS `$tableName` (
		
		`wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
		`wz_id_version` int(11) NOT NULL COMMENT 'VERSION',
		
		`wz_tm_id` int(11) NOT NULL COMMENT 'TM OVERALL',
		
		`wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
		`wz_sort` int(11) NOT NULL COMMENT 'SORT',
		`wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
		`wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
		`wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
		`wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
		`wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
		`wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
		`wz_online_start` 	timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE START',
		`wz_online_stop` 	timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE END',
		
		PRIMARY KEY (`wz_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='COMMENT' AUTO_INCREMENT=1 ;";


		dbx::query($sql);


	}


	private static $checked_ultimo = array();

	public static function checkTableAndCreateIfNotExistsViaAtom($a_id)
	{

		if (isset(self::$checked_ultimo[$a_id])) return true;
		self::$checked_ultimo[$a_id] = true;

		$a_id 				= frontcontrollerx::isInt($a_id,'checkTableAndCreateIfNotExistsViaAtom');
		$a_s_id				= intval(dbx::queryAttribute("select a_s_id from atoms where a_id = $a_id"));


		$tableName 			= self::genWizardTableNameBy_a_id($a_id);
		$tableNameNumeric 	= self::_genNumericTableName($a_id);


		$tableName_published 	= $tableName.'_published';
		$tableName_versioning 	= $tableName.'_versioning';

		$tableName_publishedNumeric 	= $tableName.'_published';
		$tableName_versioningNumeric 	= $tableName.'_versioning';


		$doTheWizardDance = array(
		$tableName 				=> $tableNameNumeric,
		$tableName_published 	=> $tableName_publishedNumeric,
		//		$tableName_versioning 	=> $tableName_versioningNumeric,
		);

		//dbx::query("DROP TABLE IF EXISTS $tableName_versioning;");
		//dbx::query("DROP TABLE IF EXISTS $tableName_versioningNumeric;");


		foreach ($doTheWizardDance as $tableName => $tableNameNumeric)
		{
			if ($tableName != $tableNameNumeric) {

				if (dbx::tablePresent($tableNameNumeric)&&!dbx::tablePresent($tableName))
				{
					$sql = "RENAME TABLE  `$tableNameNumeric` TO  `$tableName`;";
					dbx::query($sql);
				}
			}


			self::cerateDefaultWizardTable($tableName);
			self::combatOldTables($tableName,$siteId);
		}


	}


	public static function combatOldTables($table,$siteId)
	{
		return false; 
		
		$cols2kick 	= dbx::getAllAttributes($table,"wz_url%"); // OLD STUFF
		//$cols2kick 	= dbx::getAllAttributes($table,"wz_sseo%"); // OLD STUFF
		$remove 	= array("wz_tm",'wz_tm_de','wz_tm_en','wz_url','wz_url_pnu_id');

		foreach ($cols2kick as $c2k)
		{
			$remove[] = $c2k['Field'];
		}

		//print_r($remove);

		foreach ($remove as $r)
		{
			if (dbx::attributePresent($table,$r))
			{
				dbx::query("alter table $table drop $r");
			}
		}


		$final = array(

		array(
		'field' => 'wz_id_version',
		'type'	=> "int(11) NOT NULL DEFAULT 0 COMMENT 'VERSION'",
		'after' => 'wz_id'
		),

		array(
		'field' => 'wz_fid',
		'type'	=> "int(11) NOT NULL DEFAULT 0 COMMENT ''",
		'after' => 'wz_id'
		),

		array(
		'field' => 'wz_state',
		'type'	=> "enum('DRAFT','PUBLISHED') NOT NULL DEFAULT 'DRAFT' COMMENT 'OVERALL STATE'",
		'after' => 'wz_id_version'
		),

		array(
		'field' => 'wz_tm_id',
		'type'	=> "int(11) NOT NULL DEFAULT 0 COMMENT 'TM OVERALL'",
		'after' => 'wz_state'
		),

		array(
		'field' => 'wz_sort_tree',
		'type'	=> "int(11) NOT NULL DEFAULT 0 COMMENT 'SORT TREE'",
		'after' => 'wz_sort'
		),

		array(
		'field' => 'wz_static',
		'type'	=> "longtext NOT NULL COMMENT 'DA STATIC'",
		'after' => 'wz_sort'
		),

		);

		$langs = xredaktor_pages::getValidLangs($siteId);


		$extend_multilang_yes = array(

		array(
		'field' => 'wz_state',
		'type' 	=> "enum('DRAFT','PUBLISHED') NOT NULL DEFAULT 'DRAFT' COMMENT 'STATE LANG SPECIFIC'",
		'after'	=> 'wz_state',
		),

		array(
		'field' => 'wz_tm_id',
		'type' 	=> "int(11) NOT NULL DEFAULT 0 COMMENT 'TM LANG SPECIFIC'",
		'after'	=> '',
		),

		array(
		'field' => 'wz_created',
		'type' 	=> "timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'STATE LANG SPECIFIC'",
		'after'	=> '',
		),

		array(
		'field' => 'wz_lastChanged',
		'type' 	=> "timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'STATE LANG SPECIFIC'",
		'after'	=> '',
		),

		array(
		'field' => 'wz_createdBy',
		'type' 	=> "int(11) NOT NULL DEFAULT 0 COMMENT 'LANG SPECIFIC'",
		'after'	=> '',
		),

		array(
		'field' => 'wz_lastChangedBy',
		'type' 	=> "int(11) NOT NULL DEFAULT 0 COMMENT 'LANG SPECIFIC'",
		'after'	=> '',
		),

		array(
		'field' => 'wz_static',
		'type' 	=> "longtext NOT NULL DEFAULT '' COMMENT 'STATIC'",
		'after'	=> 'wz_tm_id',
		),

		array(
		'field' => 'wz_url',
		'type' 	=> "longtext NOT NULL DEFAULT '' COMMENT 'URL'",
		'after'	=> '',
		),

		array(
		'field' => 'wz_url_manual',
		'type' 	=> "longtext NOT NULL DEFAULT '' COMMENT 'URL'",
		'after'	=> '',
		),

		array(
		'field' => 'wz_url_pnu_id',
		'type' 	=> "int(11) NOT NULL DEFAULT 0 COMMENT 'URL-PNU-ID'",
		'after'	=> '',
		),

		array(
		'field' => 'wz_url_mode',
		'type' 	=> "ENUM ('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO' COMMENT ''",
		'after'	=> '',
		),

		);

		$sseo_config_multi_no = array(
		'sseo_page_noindex' 	=> "ENUM('Y','N') NOT NULL DEFAULT 'N'",
		'sseo_og_type' 			=> 'int NOT NULL', // wizard
		'sseo_og_latitude' 		=> 'double',
		'sseo_og_longitude' 	=> 'double',
		'sseo_og_altitude' 		=> 'float',
		'sseo_og_postal_code' 	=> 'varchar(50) NOT NULL',
		'sseo_og_locality' 		=> 'text NOT NULL',
		'sseo_og_country_name' 	=> 'int NOT NULL', // WIZARD
		);

		foreach ($sseo_config_multi_no as $name => $type)
		{

			$final[] = array(
			'field' => 'wz_'.$name,
			'type' 	=> "$type ",
			'after'	=> '',
			);

		}

		$sseo_config_multi_yes = array(
		'sseo_page_title' 		=> 'text',
		'sseo_page_description' => 'text',
		'sseo_page_keywords' 	=> 'text',
		'sseo_page_canonical' 	=> 'text',
		'sseo_og_title' 		=> 'text',
		'sseo_og_description' 	=> 'text',
		'sseo_og_image' 		=> 'int(11)',
		);


		foreach ($sseo_config_multi_yes as $name => $type)
		{

			switch ($name)
			{
				case '':
					$extend_multilang_yes[] = array(
					'field' => 'wz_'.$name.'_mode',
					'type' 	=> "ENUM ('Y','N') NOT NULL DEFAULT 'N' COMMENT 'MODE FOR $name'",
					'after'	=> '',
					);
					break;

				default:
					$extend_multilang_yes[] = array(
					'field' => 'wz_'.$name.'_mode',
					'type' 	=> "ENUM ('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO' COMMENT 'MODE FOR $name'",
					'after'	=> '',
					);
			}

			$extend_multilang_yes[] = array(
			'field' => 'wz_'.$name,
			'type' 	=> "$type NOT NULL",
			'after'	=> '',
			);

		}

		foreach ($extend_multilang_yes as $obj)
		{
			foreach ($langs as $lang)
			{

				$lang = trim($lang);
				if ($lang == "") continue;
				$lang = strtolower($lang);


				$tmp = array(
				'field' => trim($obj['field']).'_'.$lang,
				'type' 	=> $obj['type'],
				'after'	=> $obj['after'],
				);
				$final[] = $tmp;
			}
		}

		$lastAfter = "wz_id";
		foreach ($final as $fx)
		{

			$field 	= trim($fx['field']);
			$type 	= $fx['type'];
			$after 	= trim($fx['after']);

			if ($after == "")
			{
				$after = $lastAfter;
			}

			$type .= " AFTER ".$after;
			$lastAfter = $field;

			if (!dbx::attributePresent($table,$field))
			{
				$sql = "ALTER TABLE `$table`  ADD `$field` ".$type;
			} else
			{
				$sql = "ALTER TABLE `$table`  MODIFY `$field` ".$type;
				$sql = false; // SPEED UP
			}

			//echo "<br>$sql";
			if ($sql !== false)
			{
				dbx::query($sql);
			}
		}


		$keys = dbx::queryAll("SHOW INDEX FROM $table");
		if ($keys === false) $keys = array();

		$index_x = array();

		foreach ($keys as $k)
		{
			$index_x[$k['Key_name']] = $k;
		}

		$index = array(

		array('wz_fid','wz_del'),
		array('wz_fid','wz_del','wz_online'),

		array('wz_del'),
		array('wz_del','wz_online'),

		);

		foreach ($index as $indexPack)
		{

			$index_name = "xr_auto_index__".md5(implode($indexPack));
			if (isset($index_x[$index_name]))
			{
				continue; // SPEEDUP
				dbx::query("ALTER TABLE $table DROP INDEX $index_name");
			}

			$sql 	= "ALTER TABLE $table ADD INDEX $index_name ";
			$append = array();

			foreach ($indexPack as $f)
			{
				$append[] = "  `$f` ";
			}

			$append = implode(" , ",$append);
			$sql .= " ( ".$append." ) ";

			dbx::query($sql);
		}


		dbx::query("ALTER TABLE `$table` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
		dbx::query("ALTER TABLE `$table` ENGINE = INNODB");
		dbx::query("OPTIMIZE TABLE `$table` "); // SPEED UP

		return true;
	}


	public static function checkTableAndCreateIfNotExists($as_id)
	{
		$atom = xredaktor_atoms::getARecordBy_as_id($as_id);
		$a_id = $atom['a_id'];
		return self::checkTableAndCreateIfNotExistsViaAtom($a_id);
	}


	public static function getWizardSettings($a_id)
	{
		$atom = xredaktor_atoms::getById($a_id);
		$a_wizardSettings = json_decode($atom['a_wizardSettings'],true);
		return $a_wizardSettings;
	}

	public static function getWizardSettingsByVID($vid)
	{
		$atom = xredaktor_atoms::getByVID($vid);
		$a_wizardSettings = json_decode($atom['a_wizardSettings'],true);
		return $a_wizardSettings;
	}

	public static function genWizardTableName($as_id)
	{
		$as_id 		= frontcontrollerx::isInt($as_id);
		$as 		= xredaktor_atoms_settings::getById($as_id);
		$a_id 		= frontcontrollerx::isInt($as['as_a_id'],'genWizardTableName');
		return self::genWizardTableNameBy_a_id($a_id);
	}

	private static function _genNumericTableName($a_id)
	{
		$a_id = frontcontrollerx::isInt($a_id,'_genNumericTableName');
		return self::wizard_prefixes . '_' . $a_id;
	}

	public static function genWizardTableNameBy_a_id($a_id)
	{
		$a_id 		= frontcontrollerx::isInt($a_id,'genWizardTableNameBy_a_id');
		$wzSettings = self::getWizardSettings($a_id);
		if (trim($wzSettings['es_databaseTableName']) != "") return $wzSettings['es_databaseTableName'];
		return self::_genNumericTableName($a_id);
	}

	public static function genWizardTableNameByVID($a_vid)
	{
		$a_vid 		= frontcontrollerx::isInt($a_vid,'genWizardTableNameByVID');
		$wzSettings = self::getWizardSettingsByVID($a_vid);
		$atom		= xredaktor_atoms::getByVID($a_vid);
		$a_id 		= intval($atom['a_id']);
		if ($a_id == 0) return false;
		if (trim($wzSettings['es_databaseTableName']) != "") return $wzSettings['es_databaseTableName'];
		return self::_genNumericTableName($a_id);
	}

	public static function genAttributeName($as_id,$lang=false,$patchASnamePostFix='')
	{
		$as_id 		= frontcontrollerx::isInt($as_id);
		$as 		= xredaktor_atoms_settings::getById($as_id);

		$as_type 	= $as['as_type'];
		$as_name 	= $as['as_name'];
		$as_label 	= $as['as_label'];
		$as_init 	= $as['as_init'];
		$as_config 	= $as['as_config'];

		$attributeName 	= 'wz_'.$as_name.$patchASnamePostFix;
		if ($lang !== false)
		{
			$attributeName 	= '_'.strtoupper($lang).'_'.$attributeName;
		}
		return $attributeName;
	}

	public static function attributePresent($as_id,$fix=false,$lang=false,$tablePostFix=false)
	{
		self::checkTableAndCreateIfNotExists($as_id);

		if ($tablePostFix === false) $tablePostFix = "";
		$tableName 	= self::genWizardTableName($as_id).$tablePostFix;
		$attrName 	= self::genAttributeName($as_id,$lang);

		if ($fix!==false)
		{
			$attrName = $fix;

		}

		$sql 	= "SHOW COLUMNS FROM  `$tableName` LIKE  '$attrName'";
		$rs 	= dbx::query($sql);


		return 	($rs['Field'] == $attrName);
	}

	public static function translate2basicSQLTyp_update($as_id,$new=false,$old=false)
	{
		return self::translate2basicSQLTyp($as_id,'ALTER',$old);
	}


	public static function translate2basicSQLTyp_create($as_id)
	{
		/* MAIN NAME WITHOUT LANG */
		self::translate2basicSQLTyp($as_id,'CREATE');
	}

	public static function updateTableCommentOfWizard($a_id)
	{
		$a_id 		= intval($a_id);
		$a 			= xredaktor_atoms::getById($a_id);
		$a_name 	= addslashes($a['a_name']);
		$tableName 	= self::genWizardTableNameBy_a_id($a_id);
		if (!dbx::tablePresent($tableName)) return false;
		dbx::query("ALTER TABLE  `$tableName` COMMENT = 'WIZARD :: $a_name ($a_id)'");
		return true;
	}

	public static function processMultiLangSQL($as,$sqlFragment,$old=false,$patchASnamePostFix='')
	{
		$as_id		= $as['as_id'];
		$oldMulti	= $as['as_type_multilang'];
		$newMulti	= $as['as_type_multilang'];

		$oldNameNotMulti = $oldName 	= 'wz_'.$as['as_name'].$patchASnamePostFix;
		$newNameNotMulti = $newName 	= 'wz_'.$as['as_name'].$patchASnamePostFix;
		$tableName	= self::genWizardTableName($as_id);


		/* UPDATE TABLE COMMENT START */
		$a = xredaktor_atoms::getARecordBy_as_id($as_id);
		self::updateTableCommentOfWizard($a['a_id']);
		/* UPDATE TABLE COMMENT END */

		$multiCopy	= false;

		if ($old !== false) {

			if (($as_name != $old['as_name']) && ($old['as_name'] != ''))
			{
				$oldName = 'wz_'.$old['as_name'].$patchASnamePostFix;
			}
			$oldMulti = $old['as_type_multilang'];
		}

		$checkFields = array(array('oldName'=>$oldName,'newName'=>$newName));
		$langs = xredaktor_pages::getValidLangs();


		/*
		OLD SETTING WAS MULTI, NEW SETTING IS NOT MULTI
		*/

		if (($oldMulti != $newMulti) && ($newMulti == 'N'))
		{
			foreach ($langs as $l)
			{
				if (self::attributePresent($as_id,false,$l))
				{
					$attributeNameLang = self::genAttributeName($as_id,$l);
					//dbx::query("ALTER TABLE `$tableName` DROP `$attributeNameLang`");
				}
			}
		}

		if (($oldMulti != $newMulti) && ($oldMulti == 'N'))
		{
			$multiCopy = true;
		}

		if ($newMulti=='Y')
		{
			foreach ($langs as $l)
			{
				$langTag = "_".strtoupper($l).'_';
				$checkFields[] = array('oldName'=>$langTag.$oldName,'newName'=>$langTag.$newName);
			}
		}


		$postfix_pub = "_published";
		$postfix_ver = "_versioning";

		$tables = array(

		$tableName					=> false,
		$tableName.$postfix_pub		=> $postfix_pub,
		//$tableName.$postfix_ver		=> $postfix_ver,

		);


		foreach ($tables as $tableName => $postfix)
		{

			foreach ($checkFields as $check)
			{
				$oldName = $check['oldName'];
				$newName = $check['newName'];

				/* NEW AND OLD ATTRIB PRESENT IN TABLE -> KICK NEW */
				if (self::attributePresent($as_id,$oldName,false,$postfix) && self::attributePresent($as_id,$newName,false,$postfix) && ($oldName != $newName))
				{
					dbx::query("ALTER TABLE `$tableName` DROP `$newName`");
				}

				if (self::attributePresent($as_id,$oldName,false,$postfix))
				{
					$sql = "ALTER TABLE `$tableName`  CHANGE `$oldName` `$newName` ".$sqlFragment;
				}else
				{
					$sql = "ALTER TABLE `$tableName`  ADD `$newName` ".$sqlFragment;
				}


				dbx::query($sql);
			}
		}



	}


	public static function doMultiTableSql($tableName,$sql)
	{

	}


	public function getSearchFields($a_id)
	{
		$a_id 				= frontcontrollerx::isInt($a_id);

		$typesSearchable 	= self::getFieldTypesWichAreSearchable();
		foreach ($typesSearchable as $k => $v)
		{
			$typesSearchable[$k] = "'$v'";
		}
		$sql = "select * from atoms_settings where as_a_id = $a_id and as_del='N' and as_type IN (".implode(',',$typesSearchable).")";
		$fields 			= dbx::queryAll($sql);

		if ($fields === false) $fields = array();

		$langs				= xredaktor_pages::getValidLangs();
		$table 				= self::genWizardTableNameBy_a_id($a_id);

		$fields2search = array();

		foreach ($fields as $as)
		{
			$as_name 			= trim($as['as_name']);
			$as_type_multilang	= $as['as_type_multilang'];
			if ($as_name == "") continue;

			$tmp = array('wz_'.$as_name);
			if ($as_type_multilang == 'Y')
			{
				$tmp = array();
				foreach ($langs as $l)
				{
					$tmp[] = '_'.strtoupper($l).'_wz_'.$as_name;
				}
			}

			foreach ($tmp as $t)
			{
				if  (dbx::attributePresent($table,$t)) $fields2search[] = $t;
			}
		}
		
	/*
		$fields2search[] = 'a_content'; 
		$fields2search[] = 'a_content_1';
		$fields2search[] = 'a_content_2';
		$fields2search[] = 'a_content_3';
		$fields2search[] = 'a_content_4';
		*/

		return $fields2search;
	}

	public static function getFieldTypesWichAreSearchable()
	{
		return array('COMBO','RADIO','HTML','TEXTAREA','MD5PASSWORD','TEXT');
	}

	public static function getTable_SIMPLE_OR_UNIQUE($as)
	{
		$as_type = $as['as_type'];
		switch ($as_type)
		{
			case 'SIMPLE_W2W':
				return self::gen_TABLE_SIMPLE_W2W($as);
				break;
			case 'UNIQUE_W2W':
				return self::gen_TABLE_UNIQUE_W2W($as);
				break;
			default: return false;
		}
	}

	public static function gen_TABLE_SIMPLE_W2W($as)
	{
		$w_id_low 	= min(intval($as['as_a_id']),intval($as['as_config']));
		$w_id_high	= max(intval($as['as_a_id']),intval($as['as_config']));

		if ($w_id_low 	== 0) 	return false;
		if ($w_id_high 	== 0) 	return false;

		$table_name = "wizard_auto_SIMPLE_W2W_".$w_id_low."_".$w_id_high;
		if (!dbx::tablePresent($table_name)) return false;

		return array(
		'wz_id_low' 	=> $w_id_low,
		'wz_id_high'	=> $w_id_high,
		'table_name' 	=> $table_name);
	}

	public static function gen_TABLE_UNIQUE_W2W($as)
	{
		$as_id 		= intval($as['as_id']);
		$w_id_low 	= min(intval($as['as_a_id']),intval($as['as_config']));
		$w_id_high	= max(intval($as['as_a_id']),intval($as['as_config']));

		if ($as_id		== 0) 	return false;
		if ($w_id_low 	== 0) 	return false;
		if ($w_id_high 	== 0) 	return false;

		$table_name = "wizard_auto_UNIQUE_W2W_".$as_id."_".$w_id_low."_".$w_id_high;
		if (!dbx::tablePresent($table_name)) return false;

		return array(
		'wz_id_low' 	=> $w_id_low,
		'wz_id_high'	=> $w_id_high,
		'table_name' 	=> $table_name);
	}


	private static function handle_SIMPLE_W2W($as)
	{
		$as_id 		= intval($as['as_id']);
		$w_id_low 	= min(intval($as['as_a_id']),intval($as['as_config']));
		$w_id_high	= max(intval($as['as_a_id']),intval($as['as_config']));

		if ($as_id		== 0) 	return false;
		if ($w_id_low 	== 0) 	return false;
		if ($w_id_high 	== 0) 	return false;

		$table_name = "wizard_auto_SIMPLE_W2W_".$w_id_low."_".$w_id_high;

		if (!dbx::tablePresent($table_name))
		{
			$sql_simple = "
			CREATE TABLE IF NOT EXISTS `$table_name` (
			  `wz_id` int(11) 			NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
			  `wz_created` timestamp 	NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
			  `wz_createdBy` int(11) 	NOT NULL COMMENT 'WAS CREATED BY BE_USER',
			  `wz_id_low` int(11) 		NOT NULL COMMENT 'LOWER WIZARD_AS_ID Record-ID',
			  `wz_id_high` int(11) 		NOT NULL COMMENT 'LOWER WIZARD_AS_ID Record-ID',
			  PRIMARY KEY (`wz_id`),
			  KEY `wz_id_low` (`wz_id_low`,`wz_id_high`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='WIZARD W2W :: $w_id_low - $w_id_high' AUTO_INCREMENT=1 ;
			";
			dbx::query($sql_simple);
		}

		$table_name = "wizard_auto_SIMPLE_W2W_".$w_id_low."_".$w_id_high."_published";

		if (!dbx::tablePresent($table_name))
		{
			$sql_simple = "
			CREATE TABLE IF NOT EXISTS `$table_name` (
			  `wz_id` int(11) 			NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
			  `wz_created` timestamp 	NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
			  `wz_createdBy` int(11) 	NOT NULL COMMENT 'WAS CREATED BY BE_USER',
			  `wz_id_low` int(11) 		NOT NULL COMMENT 'LOWER WIZARD_AS_ID Record-ID',
			  `wz_id_high` int(11) 		NOT NULL COMMENT 'LOWER WIZARD_AS_ID Record-ID',
			  PRIMARY KEY (`wz_id`),
			  KEY `wz_id_low` (`wz_id_low`,`wz_id_high`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='WIZARD W2W :: $w_id_low - $w_id_high' AUTO_INCREMENT=1 ;
			";
			dbx::query($sql_simple);
		}


	}

	private static function handle_UNIQUE_W2W($as)
	{
		$as_id 		= intval($as['as_id']);
		$w_id_low 	= min(intval($as['as_a_id']),intval($as['as_config']));
		$w_id_high	= max(intval($as['as_a_id']),intval($as['as_config']));

		if ($as_id		== 0) 	return false;
		if ($w_id_low 	== 0) 	return false;
		if ($w_id_high 	== 0) 	return false;

		$table_name = "wizard_auto_UNIQUE_W2W_".$as_id."_".$w_id_low."_".$w_id_high;

		if (!dbx::tablePresent($table_name))
		{
			$sql_simple = "
			CREATE TABLE IF NOT EXISTS `$table_name` (
			  `wz_id` int(11) 			NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
			  `wz_created` timestamp 	NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
			  `wz_createdBy` int(11) 	NOT NULL COMMENT 'WAS CREATED BY BE_USER',
			  `wz_id_low` int(11) 		NOT NULL COMMENT 'LOWER WIZARD_AS_ID Record-ID',
			  `wz_id_high` int(11) 		NOT NULL COMMENT 'LOWER WIZARD_AS_ID Record-ID',
			  PRIMARY KEY (`wz_id`),
			  KEY `wz_id_low` (`wz_id_low`,`wz_id_high`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='WIZARD W2W :: $w_id_low - $w_id_high' AUTO_INCREMENT=1 ;
			";
			dbx::query($sql_simple);
		}

		$table_name = "wizard_auto_UNIQUE_W2W_".$as_id."_".$w_id_low."_".$w_id_high.'_published';

		if (!dbx::tablePresent($table_name))
		{
			$sql_simple = "
			CREATE TABLE IF NOT EXISTS `$table_name` (
			  `wz_id` int(11) 			NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
			  `wz_created` timestamp 	NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
			  `wz_createdBy` int(11) 	NOT NULL COMMENT 'WAS CREATED BY BE_USER',
			  `wz_id_low` int(11) 		NOT NULL COMMENT 'LOWER WIZARD_AS_ID Record-ID',
			  `wz_id_high` int(11) 		NOT NULL COMMENT 'LOWER WIZARD_AS_ID Record-ID',
			  PRIMARY KEY (`wz_id`),
			  KEY `wz_id_low` (`wz_id_low`,`wz_id_high`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='WIZARD W2W :: $w_id_low - $w_id_high' AUTO_INCREMENT=1 ;
			";
			dbx::query($sql_simple);
		}
	}

	public  static function handle_CONTAINER_FILES_table($as)
	{
		$as_id = intval($as['as_id']);
		if ($as_id == 0) 	return false;

		$table_name = "wizard_container_of_FILES_".$as_id;
		if (!dbx::tablePresent($table_name)) return false;

		return $table_name;
	}

	private static function handle_CONTAINER_FILES($as)
	{
		$as_id = intval($as['as_id']);
		if ($as_id == 0) 	return false;

		$table_name = "wizard_container_of_FILES_".$as_id;

		if (!dbx::tablePresent($table_name))
		{
			$sql_simple = "
			CREATE TABLE IF NOT EXISTS `$table_name` (
			  `wz_id` int(11) 			NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
			  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
			  `wz_del` enum('Y','N')	NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
			  `wz_fa_item` enum('Y','N')	NOT NULL DEFAULT 'N' COMMENT 'IS FA ITEM',
			  `wz_created` timestamp 	NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
			  `wz_createdBy` int(11) 	NOT NULL COMMENT 'WAS CREATED BY BE_USER',
			  `wz_s_id` int(11) 		NOT NULL COMMENT 'Storage ID',
			  `wz_r_id` int(11) 		NOT NULL COMMENT 'F.Record ID',
			  `wz_meta_data` TEXT 		NOT NULL COMMENT 'File Metadata',
			  PRIMARY KEY (`wz_id`),
			  KEY `wz_s_id` (`wz_s_id`),
  			  KEY `wz_s_id_2` (`wz_s_id`,`wz_r_id`),
  			  KEY `wz_s_id_3` (`wz_r_id`,`wz_del`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='AUTO WIZARD FOR FIELD $as_id' AUTO_INCREMENT=1 ;
			";
			dbx::query($sql_simple);
		}

		$table_name = "wizard_container_of_FILES_".$as_id.'_published';

		if (!dbx::tablePresent($table_name))
		{
			$sql_simple = "
			CREATE TABLE IF NOT EXISTS `$table_name` (
			  `wz_id` int(11) 			NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
			  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
			  `wz_del` enum('Y','N')	NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
			  `wz_fa_item` enum('Y','N')	NOT NULL DEFAULT 'N' COMMENT 'IS FA ITEM',
			  `wz_created` timestamp 	NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
			  `wz_createdBy` int(11) 	NOT NULL COMMENT 'WAS CREATED BY BE_USER',
			  `wz_s_id` int(11) 		NOT NULL COMMENT 'Storage ID',
			  `wz_r_id` int(11) 		NOT NULL COMMENT 'F.Record ID',
			  `wz_meta_data` TEXT 		NOT NULL COMMENT 'File Metadata',
			  PRIMARY KEY (`wz_id`),
			  KEY `wz_s_id` (`wz_s_id`),
  			  KEY `wz_s_id_2` (`wz_s_id`,`wz_r_id`),
  			  KEY `wz_s_id_3` (`wz_r_id`,`wz_del`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='AUTO WIZARD FOR FIELD $as_id' AUTO_INCREMENT=1 ;
			";
			dbx::query($sql_simple);
		}
	}

	public static function translate2basicSQLTyp($as_id,$mode,$old=false)
	{

		$validModes = array('CREATE','ALTER');
		if (!in_array($mode,$validModes)) return false;


		self::checkTableAndCreateIfNotExists($as_id);



		$langs		= xredaktor_pages::getValidLangs();
		$as_id 		= frontcontrollerx::isInt($as_id);
		$as 		= xredaktor_atoms_settings::getById($as_id);
		$sql 		= array();

		$as_type 			= $as['as_type'];
		$as_name 			= $as['as_name'];
		$as_label 			= $as['as_label'];
		$as_init 			= $as['as_init'];
		$as_config 			= $as['as_config'];
		$as_type_multilang	= $as['as_type_multilang'];

		if (trim($as_name)=="") return false;

		$tableName 		= self::genWizardTableName($as_id);
		$attributeName 	= self::genAttributeName($as_id);
		$comment 		= $as_id."::".$as_type.":: ".$as_label;

		switch ($as_type)
		{
			case 'TIMESTAMP':
				self::processMultiLangSQL($as," TIMESTAMP NOT NULL COMMENT '$comment' ",$old);
				return;
				break;
			case 'DATE':
				self::processMultiLangSQL($as," DATE NOT NULL COMMENT '$comment' ",$old);
				return;
				break;
			case 'TIME':
				self::processMultiLangSQL($as," TIME NOT NULL COMMENT '$comment' ",$old);
				break;
			case 'SIMPLE_W2W':
				self::handle_SIMPLE_W2W($as);
				break;
			case 'UNIQUE_W2W':
				self::handle_UNIQUE_W2W($as);
				break;
			case 'CONTAINER-FILES':
			case 'CONTAINER-IMAGES':
			case 'IMG_GALLERY':
				self::handle_CONTAINER_FILES($as);
				break;
			case 'PAGE':
			case 'ATOM':
			case 'FRAME':
			case 'ACTION':
			case 'WATTRIBUTE':
			case 'WIZARD':
			case 'DIR':
				/*			case 'CONTAINER-IMAGES':
				case 'CONTAINER-FILES':*/
			case 'FILE':
			case 'IMAGE':
			case 'WID':
			case 'INT':
			case 'TIMEMACHINE':
				self::processMultiLangSQL($as," INT NOT NULL COMMENT '$comment' ",$old);
				break;
			case 'FLOAT':
				self::processMultiLangSQL($as," FLOAT NOT NULL COMMENT '$comment' ",$old);
				break;

			case 'MD5PASSWORD':
			case 'INFOPOOL_RECORD':
				self::processMultiLangSQL($as," TINYTEXT NOT NULL COMMENT '$comment' ",$old);
				break;

			case 'LINK':
			case 'GEO-BOX':
			case 'GEO-POLY':
			case 'GEO-POINT':
			case 'TEXT':
				self::processMultiLangSQL($as," TEXT NOT NULL COMMENT '$comment' ",$old);
				break;
			case 'HTML':
			case 'ATOMLIST':
			case 'TEXTAREA':
			case 'JSON':
				self::processMultiLangSQL($as," LONGTEXT NOT NULL COMMENT '$comment' ",$old);
				break;
			case 'CHECKBOX':

				$default  = json_decode($as_init,true);
				$settings = json_decode($as_config,true);

				$keys = array();
				if (!is_array($settings['l'])) $settings['l'] = array();
				foreach ($settings['l'] as $i => $setting)
				{
					/*
					$k = $setting[0];
					$v = $setting[1];
					*/

					$k = $setting['v'];

					if (!in_array($k,$keys))
					{
						$keys[] = $k;
					}
				}

				if (count($keys) > 0)
				{
					$initValue = $default[$as_name];
					if (!in_array($initValue,$keys)) $initValue = '';
					foreach ($keys as $i)
					{
						$patchASnamePostFix = '_'.$i;
						if ($i == $initValue) $def = "on";
						else $def = 'off';
						$sqlFragment = " ENUM('on','off') NOT NULL DEFAULT '$def' COMMENT '$comment' ";
						self::processMultiLangSQL($as,$sqlFragment,$old,$patchASnamePostFix);
					}
					return true;
				}

				/*
				if (count($keys) == -1212210)
				{
				$initValue = $default[$as_name];
				if (!in_array($initValue,$keys)) $initValue = $keys[0];

				$oldName 	= $attributeName.'_';
				$newName 	= $attributeName.'_';

				if ($old !== false) {
				if (($as_name != $old['as_name']) && ($old['as_name'] != ''))
				{
				$oldName = 'wz_'.$old['as_name'].'_';
				}
				}

				$naked_old = $oldName;
				$naked_new = $newName;

				foreach ($keys as $i)
				{

				$oldName = $naked_old.$i;
				$newName = $naked_new.$i;

				/* NEW AND OLD ATTRIB PRESENT IN TABLE -> KICK NEW * /
				if (self::attributePresent($as_id,$oldName) && self::attributePresent($as_id,$newName) && ($oldName != $newName))
				{
				dbx::query("ALTER TABLE `$tableName` DROP `$newName`");
				}

				if ($i == $initValue) $def = "on";
				else $def = 'off';

				if (self::attributePresent($as_id,$newName))
				{
				$sql = "ALTER TABLE `$tableName`  CHANGE `$oldName` `$newName` ENUM('on','off') NOT NULL DEFAULT '$def' COMMENT '$comment'";
				}else
				{
				$sql = "ALTER TABLE `$tableName`  ADD `$newName` ENUM('on','off') NOT NULL DEFAULT '$def' COMMENT '$comment'";
				}

				dbx::query($sql);
				}
				return true;
				}
				*/

				return false;

				break;
			case 'COLOR':
				self::processMultiLangSQL($as," VARCHAR(50) NOT NULL DEFAULT '' COMMENT '$comment'",$old);
				break;
			case 'YN':
				self::processMultiLangSQL($as," ENUM('N','Y') NOT NULL DEFAULT 'N' COMMENT '$comment'",$old);
				break;
			case 'COMBO':
			case 'RADIO':


				$default  = json_decode($as_init,true);
				$settings = json_decode($as_config,true);

				$keys = array();
				if (!is_array($settings['l'])) $settings['l'] = array();
				foreach ($settings['l'] as $i => $setting)
				{
					/*$k = $setting[0];
					$v = $setting[1];*/

					$k = $setting['v'];

					if (!in_array($k,$keys))
					{
						$keys[] = $k;
					}
				}

				if (count($keys) > 0)
				{
					$initValue = $default[$as_name];
					if (!in_array($initValue,$keys)) $initValue = $keys[0];

					foreach ($keys as $i => $v)
					{
						$keys[$i] = "'$v'";
					}

					$sqlFragment = " ENUM(".implode(',',$keys).") NOT NULL DEFAULT '$initValue' COMMENT '$comment'";

					self::processMultiLangSQL($as,$sqlFragment,$old);
				}

				break;
			case 'WIZARDLIST':

				$as_config = intval($as_config);

				if ($as_config > 0)
				{

					$f_a		= xredaktor_atoms::getARecordBy_as_id($as_config);
					$f_a_id		= intval($f_a['a_id']);
					$f_as		= xredaktor_atoms_settings::getById($as_config);

					$table_f	= self::genWizardTableNameBy_a_id($f_a_id);
					$f_attrib	= 'wz_'.$f_as['as_name'];


					$funcName = "xr_wzListResolver_".$as_id;
					$sql_drop = "DROP FUNCTION IF EXISTS $funcName;";
					dbx::mQuery($sql_drop);


					$sql_create = "CREATE FUNCTION `$funcName`(id INT) RETURNS text CHARSET utf8
BEGIN
DECLARE titleIt TEXT;
SELECT GROUP_CONCAT(xr_getWzTitleIt_".$f_a_id."($table_f.wz_id)) AS titleIt into titleIt
FROM $table_f WHERE $table_f.wz_del = 'N' AND $table_f.$f_attrib = id GROUP BY $table_f.$f_attrib;
RETURN titleIt;
END
;
";
					dbx::query($sql_create);
					if (!dbx::isFunctionPresent($funcName)) {
						return false;
					}
				}






				break;


			case 'ARRAY':
			case 'COMMENT':
			case 'UNDEFINED':
			case 'CONTAINER':
			default:
				break;
		}





		if (count($sql)>0)
		{
			switch ($mode)
			{
				case 'CREATE':

					foreach ($sql as $i => $v)
					{
						$sql[$i] = ' ADD '.$v;
					}

					$sql = "ALTER TABLE `$tableName`  ".implode(" , ",$sql);
					break;
				case 'ALTER':

					foreach ($sql as $i => $v)
					{

						$oldName = $i;
						if ($old !== false)
						{
							if ($as_name != $old['as_name'])
							{
								$oldName = 'wz_'.$old['as_name'];
								if (self::attributePresent($as_id,'wz_'.$as_name))
								{
									dbx::query("ALTER TABLE `$tableName` DROP `$i`");

								}

							}
						}
						$sql[$i] = " `$oldName` ".$v;
					}

					$sql = "ALTER TABLE `$tableName`  CHANGE ".implode(" , ",$sql);
					break;
				default: return false;
			}

			dbx::query($sql);
			return true;
		}

		return false;
	}

	/************************************
	**
	**		POST_HOOKS
	*/

	public static function is_wizard($as_id)
	{
		$as_id 	= frontcontrollerx::isInt($as_id);
		$as		= xredaktor_atoms_settings::getById($as_id);
		$a 		= xredaktor_render::getAtom($as['as_a_id']);
		return ($a['a_type'] == "WIZARD");
	}

	public static function as_check($as_id)
	{
		if (!self::is_wizard($as_id)) return false;
		return self::translate2basicSQLTyp_update($as_id);
	}

	public static function as_insert($as_id)
	{
		if (!self::is_wizard($as_id)) return false;
		return self::translate2basicSQLTyp_create($as_id);
	}

	public static function as_move($as_id,$current, $newDataRecord,$oldDataRecord)
	{
		if (!self::is_wizard($as_id)) return false;
	}

	public static function as_update($as_id,$newDataRecord,$oldDataRecord)
	{
		// RENAME TABLE  `db_1_27`.`wizard_13` TO  `db_1_27`.`wizard_12` ;
		if (!self::is_wizard($as_id))
		{

			if (($oldDataRecord['as_type_multilang']=='N') && ($newDataRecord['as_type_multilang']=='Y'))
			{
				$targetLang = "DE";
				$settings 	= dbx::queryAll("select * from pages_settings_atoms, atoms_settings where as_type_multilang = 'Y' and (psa_inline_a_id = as_a_id OR psa_a_id = as_a_id) and as_id = $as_id and as_del='N'");
				if (is_array($settings))
				{
					foreach ($settings as $s)
					{
						$as_name 	= $s['as_name'];
						$psa_id 	= $s['psa_id'];

						$psa_json_cfg_new = $psa_json_cfg = json_decode($s['psa_json_cfg'],true);
						$psa_json_cfg_new['_'.$targetLang.'_'.$as_name] = $psa_json_cfg[$as_name];

						//echo 'PSA_ID:'.$psa_id." - PATCHED\n";
						//echo 'OLD:'.print_r($psa_json_cfg,true)."\n";
						//echo 'NEW:'.print_r($psa_json_cfg_new,true)."\n";
						dbx::update('pages_settings_atoms',array('psa_json_cfg'=>json_encode($psa_json_cfg_new)),array('psa_id'=>$psa_id));
					}
				}
			}

			if (($oldDataRecord['as_type_multilang']=='Y') && ($newDataRecord['as_type_multilang']=='N'))
			{
				$targetLang = "DE";
				$settings 	= dbx::queryAll("select * from pages_settings_atoms, atoms_settings where as_type_multilang = 'Y' and (psa_inline_a_id = as_a_id OR psa_a_id = as_a_id) and as_id = $as_id  and as_del='N'");
				if (is_array($settings))
				{
					foreach ($settings as $s)
					{
						$as_name 	= $s['as_name'];
						$psa_id 	= $s['psa_id'];

						$psa_json_cfg_new = $psa_json_cfg = json_decode($s['psa_json_cfg'],true);
						$psa_json_cfg_new[$as_name] = $psa_json_cfg['_'.$targetLang.'_'.$as_name];

						dbx::update('pages_settings_atoms',array('psa_json_cfg'=>json_encode($psa_json_cfg_new)),array('psa_id'=>$psa_id));
					}
				}
			}

			return false;
		}
		return self::translate2basicSQLTyp_update($as_id,$newDataRecord,$oldDataRecord);
	}

	public static function as_remove($as_id)
	{
		if (!self::is_wizard($as_id)) return false;
		//return self::removeBasicSQLTyp(self::translate2basicSQLTyp($as_id));
	}

	public static function checkWizardFields($a_id)
	{

		$a_id 	= frontcontrollerx::isInt($a_id);
		$ass 	= dbx::queryAll("select * from atoms_settings where as_del='N' and as_a_id = $a_id");
		if (!is_array($ass)) return false;

		foreach ($ass as $as)
		{
			$as_id = $as['as_id'];
			self::as_check($as_id);
		}

		//self::combatOldTables($a_id);

		return true;
	}


	// TODO CHECK CHECKBOXES ETC ..., ALLES ZENTRALISIEREN ...
	public function getWizardRecordDataTitleByConfig($w_id,$r_id)
	{
		$settings 			= self::getWizardSettings($w_id);
		$es_titleSettings 	= trim($settings['es_titleSettings']);
		$extFunctionsConfig = self::defaultWizardGrid($w_id,'load');
		$record 			= self::mapLanguageFieldsToNormFields($w_id,xredaktor_defaults::getById2($extFunctionsConfig,$r_id));

		if ($es_titleSettings == "")
		{
			return $record['wz_id'];
		}

		$w_as_config 		= $w_id;
		$relations 			= explode("\n",$es_titleSettings);
		$name 				= "";


		$be_lang	= xredaktor_pages::getBackndEndLang();


		foreach ($relations as $line)
		{
			list($DR_local_as_id,$DR_wz_id,$DR_wz_as_id) = explode("|",$line);

			if (is_numeric($DR_local_as_id)&&is_numeric($DR_wz_id)&&is_numeric($DR_wz_as_id)) // REMOTE FETCHER
			{
				$ass 		= xredaktor_render::getASRecordByID($DR_local_as_id);
				$r_id_val 	= $record['wz_'.$ass['as_name']];

				if (!is_numeric($r_id_val))
				{
					//$name = '[X]';
					$name = '[X]';
				} else
				{
					$name .= self::getWizardRecordDataTitleByConfig($DR_wz_id,$r_id_val);
				}
			} else // LOKAL FETCHER
			{

				$part = "";

				if (is_numeric($line))
				{

					switch ($line)
					{
						case -1:
							$part = $record['wz_id'];
							break;
						default:break;
					}

					$ass = xredaktor_atoms_settings::getById($line);


					if ($ass !== false)
					{
						$part = $record['wz_'.$ass['as_name']];
					}

				} else
				{
					$part = $line;
				}

				if (trim($part) == "") $part = "[X]";
				$name .= $part.' ';
			}
		}

		return $name;
	}



	public function defaultWizardGrid($a_id,$function)
	{
		$atomSettings = false;

		if (!is_array(($atomSettings=xredaktor_atoms::getById($a_id)))) frontcontrollerx::json_failure('WIZARD_CONFIG_WRONG(defaultWizardGrid)',800,array('a_id'=>$a_id));
		if ($atomSettings['a_type'] != 'WIZARD')						frontcontrollerx::json_failure('WIZARD_CONFIG_WRONG(defaultWizardGrid2)',800,array('a_id'=>$a_id));
		$a_wizard_as_p_name = $atomSettings['a_wizard_as_p_name'];
		$a_wizard_as_p_nameAttribute = "";
		$langs = xredaktor_pages::getValidLangs();
		$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' and as_type != 'WIZARDLIST' order by as_sort");
		if (!is_array($ass)) $ass = array();

		$masterTable 		= xredaktor_wizards::genWizardTableNameBy_a_id($a_id);
		$preSelect 			= "";
		$_select 			= "";
		$_selectTables		= "";
		$_selectWhere		= "";

		switch ($a_wizard_as_p_name)
		{
			case -1:
				$a_wizard_as_p_nameAttribute = "wz_id";
				$preSelect = ", `$masterTable`.`wz_id` AS _WZ_LABEL_ ";
				break;
		}

		$fields 	= array('wz_id','wz_sort','wz_online','wz_tm_id','wz_created','wz_createdBy');
		foreach ($ass as $as)
		{
			$as_id = $as['as_id'];
			if ($as_id  == $a_wizard_as_p_name)
			{
				$preSelect = " , `$masterTable`.`wz_".$as['as_name']."` AS _WZ_LABEL_ ";
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

		/****************************************************************************************
		* REPLACE WIZARDS FKEYS  - MASTER BRAIN MIXING
		*/

		if ($function == "load" || $function == "update")
		{
			$be_lang = $_REQUEST['be_lang'];
			if (!in_array($be_lang,xredaktor_pages::getValidBELangs())) $be_lang = "DE";

			$wizardsReplacer = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_type = 'WIZARD'");
			if (!is_array($wizardsReplacer)) $wizardsReplacer = array();

			$_select 		= array();
			$_selectTables 	= array();
			$_selectWhere 	= array();

			if ($_REQUEST['wzFKeyMapping'] != 'N')
			{
				{
					foreach ($wizardsReplacer as $w_as)
					{
						$w_as_id		= $w_as['as_a_id'];
						$w_as_config	= intval($w_as['as_config']);
						$w_as_name 		= 'wz_'.$w_as['as_name'];

						if ($w_as['as_type_multilang']=='Y')
						{
							$w_as_name = '_'.$be_lang.'_'.$w_as_name;
						}

						if ($w_as_config == 0) continue;
						$ra = dbx::query("select * from atoms where a_id = $w_as_config AND a_del='N'");
						if ($ra === false) continue;

						if (trim($ra['a_wizard_as_p_name_wizard']) != "")
						{

							$relations = explode("\n",$ra['a_wizard_as_p_name_wizard']);


							$locals = array();
							$remote = array();
							$remoteWizardId = -1;
							$remoteWizardIdRelation = -1;

							foreach ($relations as $line)
							{
								list($DR_local_as_id,$DR_wz_id,$DR_wz_as_id) = explode("|",$line);
								if (!is_numeric($DR_wz_id))
								{
									$locals[] = $DR_local_as_id;
								} else
								{
									$remoteWizardIdRelation = $DR_wz_as_id;

									$wuas = dbx::query("select * from atoms_settings where as_id = $DR_local_as_id");
									$remoteWizardIdRelation = 'wz_'.$wuas['as_name'];
									if ($wuas['as_type_multilang']=='Y')
									{
										$remoteWizardIdRelation = '_'.$be_lang.'_'.$remoteWizardIdRelation;
									}

									$remoteWizardId 		= $DR_wz_id;
									$remote[] 				= $DR_wz_as_id;
								}
							}

							$w_table 			= xredaktor_wizards::genWizardTableNameBy_a_id($w_as_config);
							$w_table2 			= xredaktor_wizards::genWizardTableNameBy_a_id($remoteWizardId);

							$_selectTables[] 	= $w_table;
							$_selectTables[] 	= $w_table2;

							$remote_selector = array();
							$local_selector = array();

							foreach ($locals as $l)
							{
								$wuas = dbx::query("select * from atoms_settings where as_id = $l");
								$wuas_name = 'wz_'.$wuas['as_name'];
								if ($wuas['as_type_multilang']=='Y')
								{
									$wuas_name = '_'.$be_lang.'_'.$wuas_name;
								}
								$local_selector[] = "`$w_table`.`$wuas_name`";
							}

							if ($remoteWizardId != -1)
							{
								foreach ($remote as $r)
								{
									$wuas = dbx::query("select * from atoms_settings where as_id = $r");
									$wuas_name = 'wz_'.$wuas['as_name'];
									if ($wuas['as_type_multilang']=='Y')
									{
										$wuas_name = '_'.$be_lang.'_'.$wuas_name;
									}
									$remote_selector[] = "`$w_table2`.`$wuas_name`";
								}
							}

							if (count($remote_selector)>0)
							{
								$_select[]			= "CONCAT(".implode(",' ',",$remote_selector).",' - ',".implode(",' ',",$local_selector).")  as `$w_as_name` ";
							} else
							{
								$_select[]			= "CONCAT(".implode(",' ',",$local_selector).")  as `$w_as_name` ";
							}

							$_selectWhere[]		= " `$w_table`.`wz_id` = `$masterTable`.`$w_as_name` AND `$w_table`.`wz_del` = 'N' ";
							$_selectWhere[]		= " `$w_table2`.`wz_id` = `$w_table`.`$remoteWizardIdRelation` AND `$w_table2`.`wz_del` = 'N' ";


						} else {


							$ra_wizard_as_p_name	= intval($ra['a_wizard_as_p_name']);
							if ($ra_wizard_as_p_name ==  0) continue;

							switch ($ra_wizard_as_p_name)
							{
								case -1:
									$ras_name = 'wz_id';
									break;
								default:
									$ras = dbx::query("select * from atoms_settings where as_id = $ra_wizard_as_p_name and as_del = 'N'");
									if ($ras === false) continue;
									$ras_name = 'wz_'.$ras['as_name'];
									if ($ras['as_type_multilang']=='Y')
									{
										$ras_name = '_'.$be_lang.'_'.$ras_name;
									}
							}

							$w_table 			= xredaktor_wizards::genWizardTableNameBy_a_id($w_as_config);
							$_selectTables[] 	= $w_table;
							$_select[]			= " `$w_table`.`$ras_name` as `$w_as_name` ";
							$_selectWhere[]		= " `$w_table`.`wz_id` = `$masterTable`.`$w_as_name` AND `$w_table`.`wz_del` = 'N' ";
						}
					}
				}
			}

			if (count($_selectTables)>0)
			{
				$_select 		= " `$masterTable`.* , ".implode(' , ',$_select);
			} else
			{
				$_select 		= "";
				$_selectTables 	= "";
				$_selectWhere 	= "";
			}
		}

		$extFunctionsConfig = array(
		'wizardID'		=> $a_id,
		'xtype'			=> 'grid',
		'table'			=> $masterTable,
		'sort'			=> 'wz_sort', // GRID ONLY SINCE UPDATE OF DB
		'pid'			=> 'wz_id',
		'fid'			=> 'wz_fid',
		'name'			=> $a_wizard_as_p_nameAttribute,			// FOR TREE
		'del'			=> 'wz_del',
		'fields'		=> $fields,
		'preSelect'		=> $preSelect,
		'_select'		=> $_select,
		'_selectTables'	=> $_selectTables,
		'_selectWhere'	=> $_selectWhere,
		'update'		=> $fields,
		'extraInsert' 	=> array('wz_created' => 'NOW()'),
		'normalize'		=> array(
		'string'		=> $fields
		));


		if (is_numeric($_REQUEST['wzListScope'])&&is_numeric($_REQUEST['wzListScopeID']))
		{
			$wzListScopeID	= $_REQUEST['wzListScopeID'];
			$wzListScope	= $_REQUEST['wzListScope'];
			$as 			= dbx::query("select * from atoms_settings where as_id = $wzListScope");
			$as_name 		= 'wz_'.$as['as_name'];

			if ($as['as_type_multilang'] == 'N')
			{
				$extFunctionsConfig['extraInsert'][$as_name] = $wzListScopeID;
				$extFunctionsConfig['extraLoad'] = " $as_name = $wzListScopeID ";
			}
		}

		if ($_select == "")
		{
			unset($extFunctionsConfig['_select']);
			unset($extFunctionsConfig['_selectTables']);
			unset($extFunctionsConfig['_selectWhere']);
		}

		return $extFunctionsConfig;
	}

	public static function getPostHookForWizard($a_id)
	{
		$atom 				= xredaktor_atoms::getById($a_id);
		$a_wizardSettings	= json_decode($atom['a_wizardSettings'],true);
		if (trim($a_wizardSettings['es_postHooks']) == "") return false;
		return $a_wizardSettings['es_postHooks'];
	}

	public static function checkForPostHooks($wizards)
	{
		$callOnce = array();

		foreach ($wizards as $a_id)
		{
			$hook = self::getPostHookForWizard($a_id);
			if ($hook === false) continue;
			if (!in_array($hook,$callOnce)) $callOnce[] = $hook;
		}

		$whiteList = array('xredaktor');

		foreach ($callOnce as $hook)
		{
			list($classPrefix,$crap) = explode("_",$hook,2);
			if (!in_array($classPrefix,$whiteList)) continue;
			frontcontrollerx::safeCallUserFunction($hook);
		}
	}

	public static function checkForPostHooksViaCfg($cfg)
	{
		if (is_numeric($cfg['wizardID'])) {
			return self::checkForPostHooks(array($cfg['wizardID']));
		}
	}


	/***************************************************************************
	***************************************************************************
	***************************************************************************
	***************************************************************************
	***************************************************************************
	***************************************************************************
	***************************************************************************
	***************************************************************************
	***************************************************************************
	***************************************************************************
	***************************************************************************
	*/

	public static function wizard_do_magic_grid($function,$extraExtendExtFunctions=false)
	{


		$asTree	= false;


		if (isset($_REQUEST['asTree']) && ($_REQUEST['asTree'] == "1"))
		{
			$asTree = true;
		}


		$extFunctionsConfig = false;


		if (isset($_REQUEST['queryPack']) && ($function == 'load'))
		{
			$queryPack = json_decode(base64_decode($_REQUEST['queryPack']),true);

			foreach ($queryPack as $k => $v)
			{
				$_REQUEST[$k] = $v;
			}

			$_REQUEST['doPaging'] 	= 1;
			$_REQUEST['start'] 		= 0;
			$_REQUEST['limit'] 		= 100000;


			$_filters 	= $_REQUEST['filter'];
			$filters 	= array();

			foreach ($_filters as $f)
			{
				$filters[] = array(
				'type' 	=> $f['data']['type'],
				'value' => $f['data']['value'],
				'field' => $f['field']
				);
			}

			$_REQUEST['filter'] 	= json_encode($filters);

			$function = 'load';
		}


		if (is_numeric($_REQUEST['domagic']))
		{

			$search = array();
			$search_blackList = array('WIZARD2WIZARD','CHECKBOX','WIZARDLIST');
			// 'WID','WATTRIBUTE','WIZARD2WIZARD','UNDEFINED','TEXT','TEXTAREA','HTML','FILE','FLOAT','COMBO','CONTAINER','TIMESTAMP','DATE','TIME','INT','RADIO','CHECKBOX','COMMENT','LINK','ARRAY','WIZARD','CAPTCHA','HIDDEN','PASSWORD','UPLOAD','ATOMLIST','WIZARDLIST','MD5PASSWORD','GEO'

			$a_id 	= $_REQUEST['domagic'];
			$a_s_id = xredaktor_atoms::getSiteIdByID($a_id);
			xredaktor_niceurl::setSiteConfig($a_s_id);

			$atomSettings = false;


			if (!is_array(($atomSettings=xredaktor_atoms::getById($a_id)))) frontcontrollerx::json_failure('WIZARD_CONFIG_WRONG(wizard_do_magic_grid)',800,array('a_id'=>$a_id));
			if ($atomSettings['a_type'] != 'WIZARD')						frontcontrollerx::json_failure('WIZARD_CONFIG_WRONG(wizard_do_magic_grid2)',800,array('a_id'=>$a_id));
			$a_wizard_as_p_name = $atomSettings['a_wizard_as_p_name'];
			$a_wizard_as_p_nameAttribute = "";
			$langs = xredaktor_pages::getValidLangs();
			$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' and as_type != 'WIZARDLIST' order by as_sort");
			if (!is_array($ass)) $ass = array();

			$masterTable 		= xredaktor_wizards::genWizardTableNameBy_a_id($a_id);
			$preSelect 			= "";
			$_select 			= "";
			$_selectTables		= "";
			$_selectWhere		= "";

			switch ($a_wizard_as_p_name)
			{
				case -1:
					$a_wizard_as_p_nameAttribute = "wz_id";
					$preSelect = ", `$masterTable`.`wz_id` AS _WZ_LABEL_ ";
					break;
			}

			$langs = xredaktor_pages::getValidLangs($siteId);


			$fields = array('wz_id','wz_sort','wz_sort_tree','wz_online','wz_tm_id','wz_created','wz_createdBy');

			$langDance = array();
			$langDance[] = 'wz_page_title_';
			$langDance[] = 'wz_page_title_mode_';
			$langDance[] = 'wz_sseo_og_description_';
			$langDance[] = 'wz_sseo_og_description_mode_';
			$langDance[] = 'wz_sseo_og_image_';
			$langDance[] = 'wz_sseo_og_image_mode_';
			$langDance[] = 'wz_sseo_og_title_';
			$langDance[] = 'wz_sseo_og_title_mode_';
			$langDance[] = 'wz_sseo_page_canonical_';
			$langDance[] = 'wz_sseo_page_description_';
			$langDance[] = 'wz_sseo_page_description_mode_';
			$langDance[] = 'wz_sseo_page_keywords_';
			$langDance[] = 'wz_sseo_page_keywords_mode_';
			$langDance[] = 'wz_url_';
			$langDance[] = 'wz_url_manual_';
			$langDance[] = 'wz_url_mode_';

			foreach ($langDance as $ld)
			{
				foreach ($langs as $lx)
				{
					$fields[] = $ld.$lx;
				}
			}

			$fields[] = 'wz_sseo_og_altitude';
			$fields[] = 'wz_sseo_og_country_name';
			$fields[] = 'wz_sseo_og_latitude';
			$fields[] = 'wz_sseo_og_locality';
			$fields[] = 'wz_sseo_og_longitude';
			$fields[] = 'wz_sseo_og_postal_code';
			$fields[] = 'wz_sseo_og_type';
			$fields[] = 'wz_sseo_page_noindex';

			foreach ($ass as $as)
			{
				$as_id = $as['as_id'];
				if ($as_id  == $a_wizard_as_p_name)
				{
					$preSelect = " , `$masterTable`.`wz_".$as['as_name']."` AS _WZ_LABEL_ ";
					$a_wizard_as_p_nameAttribute = "wz_".$as['as_name'];
				}

				$atttributeNameX = 'wz_'.$as['as_name'];

				$add2search = false;
				if (!in_array($as['as_type'],$search_blackList))
				{
					$add2search = true;
				}

				if ($as['as_type_multilang']=='Y')
				{
					foreach ($langs as $lang)
					{
						$ff = '_'.strtoupper($lang).'_'.$atttributeNameX;
						$fields[] = $ff;
						if ($add2search)
						{
							$search[] = $ff;
						}

						// fix old non multifields which are now multilang
						$fields[] = $atttributeNameX;
					}
				} else
				{
					$ff = $atttributeNameX;
					$fields[] = $ff;
					if ($add2search)
					{
						$search[] = $ff;
					}
				}
			}

			/****************************************************************************************
			* REPLACE WIZARDS FKEYS  - MASTER BRAIN MIXING
			*/

			if ($function == 'load')
			{
				$export 	= (isset($_REQUEST['exportToCsv']) 	&& ($_REQUEST['exportToCsv'] 	== '1'));
				$asTree 	= (isset($_REQUEST['asTree']) 		&& ($_REQUEST['asTree'] 		== '1'));
				$published 	= (isset($_REQUEST['published']) 	&& ($_REQUEST['published'] 		== '1'));

				xredaktor_wizard_do_magic_grid::load($a_id,$export,$asTree,$published);
			}


			if ($function == "load" || $function == "update")
			{

				$be_lang = $_REQUEST['be_lang'];
				if (!in_array($be_lang,xredaktor_pages::getValidBELangs())) $be_lang = "DE";

				$wizardsReplacer = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_type = 'WIZARD' and as_del='N'");
				if (!is_array($wizardsReplacer)) $wizardsReplacer = array();

				$_select 		= array();
				$_selectTables 	= array();
				$_selectWhere 	= array();

				if ($_REQUEST['wzFKeyMapping'] != 'N')
				{
					{
						foreach ($wizardsReplacer as $w_as)
						{
							$w_as_id		= $w_as['as_a_id'];
							$w_as_config	= intval($w_as['as_config']);
							$w_as_name 		= 'wz_'.$w_as['as_name'];

							if ($w_as['as_type_multilang']=='Y')
							{
								$w_as_name = '_'.$be_lang.'_'.$w_as_name;
							}

							if ($w_as_config == 0) continue;
							$ra = dbx::query("select * from atoms where a_id = $w_as_config AND a_del='N'");
							if ($ra === false) continue;

							if (trim($ra['a_wizard_as_p_name_wizard']) != "")
							{

								$relations = explode("\n",$ra['a_wizard_as_p_name_wizard']);


								$locals = array();
								$remote = array();
								$remoteWizardId = -1;
								$remoteWizardIdRelation = -1;

								foreach ($relations as $line)
								{
									list($DR_local_as_id,$DR_wz_id,$DR_wz_as_id) = explode("|",$line);
									if (!is_numeric($DR_wz_id))
									{
										$locals[] = $DR_local_as_id;
									} else
									{
										$remoteWizardIdRelation = $DR_wz_as_id;

										$wuas = dbx::query("select * from atoms_settings where as_id = $DR_local_as_id");
										$remoteWizardIdRelation = 'wz_'.$wuas['as_name'];
										if ($wuas['as_type_multilang']=='Y')
										{
											$remoteWizardIdRelation = '_'.$be_lang.'_'.$remoteWizardIdRelation;
										}

										$remoteWizardId 		= $DR_wz_id;
										$remote[] 				= $DR_wz_as_id;
									}
								}

								$w_table 			= xredaktor_wizards::genWizardTableNameBy_a_id($w_as_config);
								$w_table2 			= xredaktor_wizards::genWizardTableNameBy_a_id($remoteWizardId);

								$_selectTables[] 	= $w_table;
								$_selectTables[] 	= $w_table2;

								$remote_selector = array();
								$local_selector = array();

								foreach ($locals as $l)
								{
									$wuas = dbx::query("select * from atoms_settings where as_id = $l");
									$wuas_name = 'wz_'.$wuas['as_name'];
									if ($wuas['as_type_multilang']=='Y')
									{
										$wuas_name = '_'.$be_lang.'_'.$wuas_name;
									}
									$local_selector[] = "`$w_table`.`$wuas_name`";
								}

								if ($remoteWizardId != -1)
								{
									foreach ($remote as $r)
									{
										$wuas = dbx::query("select * from atoms_settings where as_id = $r");
										$wuas_name = 'wz_'.$wuas['as_name'];
										if ($wuas['as_type_multilang']=='Y')
										{
											$wuas_name = '_'.$be_lang.'_'.$wuas_name;
										}
										$remote_selector[] = "`$w_table2`.`$wuas_name`";
									}
								}

								if (count($remote_selector)>0)
								{
									$_select[]			= "CONCAT(".implode(",' ',",$remote_selector).",' - ',".implode(",' ',",$local_selector).")  as `$w_as_name` ";
								} else
								{
									$_select[]			= "CONCAT(".implode(",' ',",$local_selector).")  as `$w_as_name` ";
								}

								$_selectWhere[]		= " `$w_table`.`wz_id` = `$masterTable`.`$w_as_name` AND `$w_table`.`wz_del` = 'N' ";
								$_selectWhere[]		= " `$w_table2`.`wz_id` = `$w_table`.`$remoteWizardIdRelation` AND `$w_table2`.`wz_del` = 'N' ";


							} else {


								$ra_wizard_as_p_name	= intval($ra['a_wizard_as_p_name']);
								if ($ra_wizard_as_p_name ==  0) continue;

								switch ($ra_wizard_as_p_name)
								{
									case -1:
										$ras_name = 'wz_id';
										break;
									default:
										$ras = dbx::query("select * from atoms_settings where as_id = $ra_wizard_as_p_name and as_del = 'N'");
										if ($ras === false) continue;
										$ras_name = 'wz_'.$ras['as_name'];
										if ($ras['as_type_multilang']=='Y')
										{
											$ras_name = '_'.$be_lang.'_'.$ras_name;
										}
								}

								$w_table 			= xredaktor_wizards::genWizardTableNameBy_a_id($w_as_config);
								$_selectTables[] 	= $w_table;
								$_select[]			= " `$w_table`.`$ras_name` as `$w_as_name` ";
								$_selectWhere[]		= " `$w_table`.`wz_id` = `$masterTable`.`$w_as_name` AND `$w_table`.`wz_del` = 'N' ";
							}
						}
					}
				}

				if (count($_selectTables)>0)
				{
					$_select 		= " `$masterTable`.* , ".implode(' , ',$_select);
					//$_selectTables 	= " ".implode(" , ",$_selectTables)." ";
					//$_selectWhere 	= " ".implode(" AND ",$_selectWhere)." ";
					//$_selectTables 	= " ".implode(" , ",$_selectTables)." ";
					//$_selectWhere 	= " ".implode(" AND ",$_selectWhere)." ";
				} else
				{
					$_select 		= "";
					$_selectTables 	= "";
					$_selectWhere 	= "";
				}


			}





			$extFunctionsConfig = array(
			'titleIt'		=> intval($_REQUEST['titleIt']),
			'wizardID'		=> $a_id,
			'xtype'			=> 'grid',
			'table'			=> $masterTable,
			'sort'			=> 'wz_sort',
			'pid'			=> 'wz_id',
			'fid'			=> 'wz_fid',
			'name'			=> $a_wizard_as_p_nameAttribute,			// FOR TREE
			'del'			=> 'wz_del',
			'search'		=> $search,
			'fields'		=> $fields,
			'preSelect'		=> $preSelect,
			'_select'		=> $_select,
			'_selectTables'	=> $_selectTables,
			'_selectWhere'	=> $_selectWhere,
			'update'		=> $fields,
			'extraInsert' 	=> array('wz_created' => 'NOW()'),
			'normalize'		=> array(
			'string'		=> $fields
			));

			/* ****************************************************************************************************************
			****************************************************************************************************************

			HOOKS

			*/

			$extFunctionsConfig['preHooks'] 	= array();
			$extFunctionsConfig['postHooks'] 	= array(

			'insert' => array('xredaktor_wizards_management::hook_post_insert'),
			'update' => array('xredaktor_wizards_management::hook_post_update'),
			'remove' => array('xredaktor_wizards_management::hook_post_delete'),
			'move' => array('xredaktor_wizards_management::hook_post_move'),
			'sort' => array('xredaktor_wizards_management::hook_post_sort'),

			);

			/*

			MERGE GUI-SETTINGS

			*/

			$settings 	= self::getWizardSettings($a_id);
			$autoHook 	= trim($settings['es_postHooks']);

			if ($autoHook != "")
			{

				// OLD SCHOOL STYLE
				if (is_callable($autoHook))
				{
					$extFunctionsConfig['postHooks']['update'][] = $autoHook;
				}

				// NEW SCHOOL STYLE

				$fn_pre_insert = $autoHook."_pre_insert";
				$fn_pre_update = $autoHook."_pre_update";
				$fn_pre_delete = $autoHook."_pre_delete";
				$fn_pre_move = $autoHook."_pre_move";
				$fn_pre_sort = $autoHook."_pre_sort";

				if (is_callable($fn_pre_insert)) $extFunctionsConfig['preHooks']['insert'][] = $fn_pre_insert;
				if (is_callable($fn_pre_update)) $extFunctionsConfig['preHooks']['update'][] = $fn_pre_update;
				if (is_callable($fn_pre_delete)) $extFunctionsConfig['preHooks']['remove'][] = $fn_pre_delete;

				if (is_callable($fn_pre_move)) $extFunctionsConfig['preHooks']['move'][] = $fn_pre_move;
				if (is_callable($fn_pre_sort)) $extFunctionsConfig['preHooks']['sort'][] = $fn_pre_sort;

				$fn_post_insert = $autoHook."_post_insert";
				$fn_post_update = $autoHook."_post_update";
				$fn_post_delete = $autoHook."_post_delete";
				$fn_post_move = $autoHook."_post_move";
				$fn_post_sort = $autoHook."_post_sort";

				if (is_callable($fn_post_insert)) $extFunctionsConfig['postHooks']['insert'][] = $fn_post_insert;
				if (is_callable($fn_post_update)) $extFunctionsConfig['postHooks']['update'][] = $fn_post_update;
				if (is_callable($fn_post_delete)) $extFunctionsConfig['postHooks']['remove'][] = $fn_post_delete;

				if (is_callable($fn_post_move)) $extFunctionsConfig['postHooks']['move'][] = $fn_post_move;
				if (is_callable($fn_post_sort)) $extFunctionsConfig['postHooks']['sort'][] = $fn_post_sort;

			}


			// HOOKS END
			// HOOKS END
			// HOOKS END
			// HOOKS END
			// HOOKS END
			// HOOKS END


			if ($extraExtendExtFunctions !== false)
			{
				foreach ($extraExtendExtFunctions as $eeef_key => $eeef_array_data)
				{
					if (is_array($eeef_array_data))
					{
						foreach ($eeef_array_data as $_k => $_v)
						{
							$extFunctionsConfig[$eeef_key][$_k] = $_v;
						}
					}
				}
			}


			// OLD EXTRAAAAAAAAAAAs

			if (is_numeric($_REQUEST['wzListScope'])&&is_numeric($_REQUEST['wzListScopeID']))
			{
				$wzListScopeID	= $_REQUEST['wzListScopeID'];
				$wzListScope	= $_REQUEST['wzListScope'];
				$as 			= dbx::query("select * from atoms_settings where as_id = $wzListScope");
				$as_name 		= 'wz_'.$as['as_name'];


				if ($as['as_type'] == "SIMPLE_W2W")
				{
					$sqlIn = xredaktor_gui::getGenericDataSetsLoaderSql($as['as_id'],$wzListScopeID);
					$extFunctionsConfig['extraLoad'] = " (wz_id IN ($sqlIn)) ";

				} else
				{
					if ($as['as_type_multilang'] == 'N')
					{
						$extFunctionsConfig['extraInsert'][$as_name] = $wzListScopeID;
						$extFunctionsConfig['extraLoad'] = " $as_name = $wzListScopeID ";

					}
				}
			}

			/// NEW



			/// the3musts

			if ($_REQUEST['the3musts'] != "")
			{
				$_query = json_decode($_REQUEST['the3musts'],true);


				$append = array();

				foreach ($_query as $_asID) {

					$as = xredaktor_atoms_settings::getById($_asID);

					if ($as === false) continue;
					$as_name = 'wz_'.$as['as_name'];


					if ($as['as_type'] == "SIMPLE_W2W")
					{
						$sqlIn = xredaktor_gui::getGenericDataSetsLoaderSql($as['as_id'],$masterTable.'.wz_id',true);
						$append[] = " (wz_id IN ($sqlIn)) ";
					}
				}

				if ((trim($extFunctionsConfig['extraLoad']) != "") && (count($append)>0)) {
					$extFunctionsConfig['extraLoad'] .= " AND ";
					$extFunctionsConfig['extraLoad'] .= implode(" AND ",$append);
				}

			}

			if ($_select == "")
			{
				unset($extFunctionsConfig['_select']);
				unset($extFunctionsConfig['_selectTables']);
				unset($extFunctionsConfig['_selectWhere']);
			}



			$extFunctionsConfig['log_insert'] = array('wz_id'=>$a_id);


			if ($asTree === true)
			{
				$extFunctionsConfig['sort'] = "wz_sort_tree";
				xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$function);
			}
			else {
				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
			}


		}

		switch ($function)
		{
			case 'getDataRecordByIdName':

				if ($extFunctionsConfig === false) frontcontrollerx::json_failure('WIZARD_CONFIG_WRONG',801,array('a_id'=>$a_id));
				if (!is_numeric($_REQUEST['id']))  frontcontrollerx::json_success(array('name'=>''));

				$be_lang	= xredaktor_pages::getBackndEndLang();

				$id 		= frontcontrollerx::isInt($_REQUEST['id']);
				$record 	= xredaktor_defaults::getById($extFunctionsConfig,$id);

				$name = xredaktor_wizards::getWizardRecordDataTitleByConfig(intval($_REQUEST['domagic']),$id);

				/*
				$name = "";
				if ($record !== false)
				{
				$a 	= xredaktor_atoms::getById($a_id);
				$a_wizard_as_p_name = $a['a_wizard_as_p_name'];

				switch ($a_wizard_as_p_name)
				{
				case -1:
				$name = $record['wz_id'];
				break;
				default:
				$as = xredaktor_atoms_settings::getById($a_wizard_as_p_name);
				$name = $record['wz_'.$as['as_name']];

				if ($as['as_type_multilang']=='Y')
				{
				$name = $record['_'.$be_lang.'_wz_'.$as['as_name']];
				}
				break;
				}
				}
				*/

				frontcontrollerx::json_success(array('name'=>$name));
				break;
			case 'getDataRecordById':
				if ($extFunctionsConfig === false) frontcontrollerx::json_failure('WIZARD_CONFIG_WRONG',801,array('a_id'=>$a_id));
				$id = frontcontrollerx::isInt($_REQUEST['id']);
				$record = xredaktor_defaults::getById($extFunctionsConfig,$id);
				frontcontrollerx::json_success(array('record'=>$record));
				break;
			case 'spreadSave':

				if ($extFunctionsConfig === false) frontcontrollerx::json_failure('WIZARD_CONFIG_WRONG',801,array('a_id'=>$a_id));

				$id 	= frontcontrollerx::isInt($_REQUEST['id']);

				xredaktor_log::add($masterTable,$a_id,$id,'UPDATE',"Datensatz $id aktualisiert");

				$backupData = $data 	= json_decode($_REQUEST['json_cfg'],true);
				$fdata 	= array();


				$domagic = intval($_REQUEST['domagic']);

				if ($domagic > 0)
				{
					$table = xredaktor_wizards::genWizardTableNameBy_a_id($domagic);
					foreach ($data as $k => $v)
					{
						if (dbx::attributePresent($table,$k))
						{
							$fdata[$k] = $v;
						}
					}
				}

				foreach ($ass as $as)
				{
					$requestNameX 		= $as['as_name'];
					$atttributeNameX 	= 'wz_'.$as['as_name'];

					if (isset($data[$requestNameX]))
					{
						$fdata[$atttributeNameX] = $data[$requestNameX];
					}

					if ($as['as_type_multilang']=='Y')
					{
						foreach ($langs as $lang)
						{
							$_lang = '_'.strtoupper($lang).'_';
							$_lang_requestNameX 	= $_lang.$as['as_name'];
							$_lang_atttributeNameX 	= $_lang.'wz_'.$as['as_name'];
							if (isset($data[$_lang_requestNameX]))
							{
								$fdata[$_lang_atttributeNameX] = $data[$_lang_requestNameX];
							}
						}
					}

					switch ($as['as_type'])
					{
						case 'SIMPLE_W2W':

							if ($as['as_gui_mode'] != 0) break;
							if ($as['as_gui'] == 'NORMAL') {


								$attribName 	= 'wz_'.$as['as_name'];
								$requestNameX	= $as['as_name'];

								if (isset($data[$requestNameX]))
								{
									$values = $data[$requestNameX];
									if (!is_array($values)) $values = array($values);

									$clearValues = array();
									foreach ($values as $v) {
										$v = intval($v);
										if ($v == 0) continue;
										$clearValues[] = $v;
									}

									xredaktor_gui::setGenericDataSets2($as['as_id'],$id,$clearValues);

								} else {
									xredaktor_gui::setGenericDataSets2($as['as_id'],$id,false);
								}
							}
							break;

						case 'UNIQUE_W2W':

							if ($as['as_gui_mode'] != 0) break;
							$attribName 	= 'wz_'.$as['as_name'];
							$requestNameX	= $as['as_name'];

							if (isset($data[$requestNameX]))
							{
								$values = $data[$requestNameX];
								if (!is_array($values)) $values = array($values);

								$clearValues = array();
								foreach ($values as $v) {
									$v = intval($v);
									if ($v == 0) continue;
									$clearValues[] = $v;
								}

								xredaktor_gui::setUniqueDataSetsNew($as['as_id'],$id,$clearValues);

							} else {
								xredaktor_gui::setUniqueDataSetsNew($as['as_id'],$id,false);
							}

							break;

						case 'YN':

							$attribName 	= 'wz_'.$as['as_name'];
							$requestNameX	= $as['as_name'];

							$fdata[$attribName] = 'N';
							if ($data[$requestNameX] == 'Y')
							{
								$fdata[$attribName] = 'Y';
							}



							break;
						case 'CHECKBOX':

							$cfg = json_decode($as['as_config'],true);
							foreach ($cfg['l'] as $c)
							{
								$k=$c['v'];
								$attribName 	= 'wz_'.$as['as_name'].'_'.$k;
								$requestNameX	= $as['as_name'].'_'.$k;

								$fdata[$attribName] = 'off';
								if (isset($data[$requestNameX]))
								{
									$fdata[$attribName] = $data[$requestNameX];
								}

								$extFunctionsConfig['fields'][] 				= $attribName;
								$extFunctionsConfig['update'][] 				= $attribName;
								$extFunctionsConfig['normalize']['string'][] 	= $attribName;
							}

							if ($as['as_type_multilang']=='Y')
							{
								foreach ($langs as $lang)
								{
									$langTag = '_'.strtoupper($lang).'_';
									foreach ($cfg['l'] as $c)
									{
										$k=$c['v'];

										$attribName 	= $langTag.'wz_'.$as['as_name'].'_'.$k;
										$requestNameX	= $langTag.$as['as_name'].'_'.$k;

										$fdata[$attribName] = 'off';
										if (isset($data[$requestNameX]))
										{
											$fdata[$attribName] = $data[$requestNameX];
										}

										$extFunctionsConfig['fields'][] 				= $attribName;
										$extFunctionsConfig['update'][] 				= $attribName;
										$extFunctionsConfig['normalize']['string'][] 	= $attribName;
									}


								}
							}

							break;
						default:
							break;
					}
				}


				xredaktor_defaults::updateById($extFunctionsConfig,$id,$fdata,true);
				$fdata['titleIt'] = xredaktor_wizards::getWizardRecordDataTitleByConfig($a_id,$id);
				$fdata['postedValues'] = $backupData;



				frontcontrollerx::json_success($fdata);

				break;
			case 'spreadDel':
				if ($extFunctionsConfig === false) frontcontrollerx::json_failure('WIZARD_CONFIG_WRONG',801,array('a_id'=>$a_id));
				$id = frontcontrollerx::isInt($_REQUEST['id']);
				xredaktor_fe::wUpdate($a_id,$id,array('wz_del'=>'Y'));
				frontcontrollerx::json_success();
				break;
			case 'spreadLoad':

				if ($extFunctionsConfig === false) frontcontrollerx::json_failure('WIZARD_CONFIG_WRONG',801,array('a_id'=>$a_id));
				$id = frontcontrollerx::isInt($_REQUEST['id']);
				$dbCreated = false;

				if ($id == -1) // SQL - SELECTOR
				{
					$selector = json_decode($_REQUEST['selector'],true);
					if (!is_array($selector)) $selector = array();

					$recordViaSelectorCnt = xredaktor_fe::wQueryCount($a_id,$selector);


					if ($recordViaSelectorCnt > 1)
					{
						frontcontrollerx::json_failure('SPREAD_LOAD_EXCEPTION__MULTIPLE_RECORDS_PRESENT');
					} elseif ($recordViaSelectorCnt == 0)
					{
						$extFunctionsConfigExtra = $extFunctionsConfig;
						foreach ($selector as $k => $v)
						{
							$extFunctionsConfigExtra['extraInsert'][$k] = $v;
						}
						$recordXYZ = xredaktor_defaults::insertBlank($extFunctionsConfigExtra);
						$id = $recordXYZ['wz_id'];
						$dbCreated = true;
					} else
					{
						$recordViaSelector = xredaktor_fe::wQuery($a_id,$selector);
						if ($recordViaSelector === false)
						{
							frontcontrollerx::json_failure('SPREAD_LOAD_EXCEPTION__SELECTOR_FAILED_TO_FETCH_DATA');
						}
						$id = intval($recordViaSelector['wz_id']);
					}
				} else
				{

					if (is_numeric($_REQUEST['extraLoadSettings']))
					{
						$eLoadSettings = $_REQUEST['extraLoadSettings'];

						switch ($eLoadSettings)
						{
							case 10:
								$eLoadPresent = dbx::query("select wz_id from $masterTable where wz_id = $id");
								if ($eLoadPresent === false)
								{
									$extFunctionsConfigExtra = $extFunctionsConfig;
									$extFunctionsConfigExtra['extraInsert']['wz_id'] = $id;
									xredaktor_defaults::insertBlank($extFunctionsConfigExtra);
									$dbCreated = true;
								}
								break;
							default: break;
						}
					}
				}

				$dataOfDb = xredaktor_defaults::getById($extFunctionsConfig,$id);
				$fdata = array();
				foreach ($ass as $as)
				{
					switch ($as['as_type'])
					{
						case 'CHECKBOX':
							$cfg = json_decode($as['as_config'],true);
							foreach ($cfg['l'] as $c)
							{
								$k=$c['v'];
								$attribName = $as['as_name'].'_'.$k;
								$fdata[$attribName] = $dataOfDb['wz_'.$attribName];
							}

							if ($as['as_type_multilang']=='Y')
							{
								foreach ($langs as $lang)
								{
									$_lang = '_'.strtoupper($lang).'_';
									foreach ($cfg['l'] as $c)
									{
										$k=$c['v'];
										$attribName = $_lang.$as['as_name'].'_'.$k;
										$fdata[$attribName] = $dataOfDb[$_lang.'wz_'.$as['as_name'].'_'.$k];
									}
								}
							}

							break;
						default:

							$fdata[$as['as_name']] = $dataOfDb['wz_'.$as['as_name']];

							if ($as['as_type_multilang']=='Y')
							{
								foreach ($langs as $lang)
								{
									$_lang = '_'.strtoupper($lang).'_';
									$fdata[$_lang.$as['as_name']] = $dataOfDb[$_lang.'wz_'.$as['as_name']];
								}
							}

							break;
					}
				}
				frontcontrollerx::json_success(array('value'=>$fdata,'record_wz_id'=>$id,'dbCreated'=>$dbCreated));
				break;
			default:
				frontcontrollerx::error_func_notfound();
		}
	}

}