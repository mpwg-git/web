<?

class xredaktor_render
{


	public static function useCache()
	{
		if (isset($_REQUEST['cms']) && ($_REQUEST['cms']==1)) return false;
		if (isset($_REQUEST['UPDATE_CACHE'])) return false;
		if (isset($_REQUEST['NCNOW'])) return false;
		return true;
	}


	public static function getSettingsArrayByPSAInfos($psa_id,$a_id,$main_settings)
	{
		$assign = array();
		if (is_array($main_settings))
		{
			$cfg = json_decode($main_settings['psa_json_cfg'],true); // Patch für ATOM LIST

			$lang						= strtoupper(xredaktor_pages::getFrontEndLang());
			$langFailOver 				= xredaktor_pages::getLangFailOverOrder();
			$ass 						= self::getASsMultiLangRecordsByIDAId($a_id);
			$nonLangSpecificHtmlFields	= self::getASsNonMultiLangHTMLRecordsByIDAId($a_id);
			$checkComboRadio_settings 	= self::getASsSettingsComboCheckRadioRecordsByIDAId($a_id);
			$jsonFields 				= self::getJSON_Fields($a_id);

			/*
			VALUES SET
			*/

			foreach ($cfg as $k => $value)
			{
				$assign[$k] = $value;

				if (in_array($k,$jsonFields)) {
					$assign[$k] = json_decode($value,true);
				}
			}

			foreach ($nonLangSpecificHtmlFields as $as)
			{
				$as_name 			= $as['as_name'];
				$assign[$as_name] 	= self::psa_value_renderer($psa_fid,'',$as,$assign[$as_name],true);
			}

			/*
			VALUES PATCHED BY LANG
			*/

			foreach ($ass as $as)
			{
				$as_type = $as['as_type'];
				switch ($as_type)
				{
					default:

						$as_name 		= $as['as_name'];
						$doJsonDecode	= in_array($as_name,$jsonFields);
						$multiKey		= '_'.$lang.'_'.$as_name;
						$value  		= trim($cfg[$multiKey]);

						$value 			= self::psa_value_renderer($psa_fid,'',$as,$value,true);
						//						$value 			= self::handleValueByType($as,$value,true);

						if ($value == "")
						{
							$found = false;
							foreach ($langFailOver as $i=>$flang)
							{
								$flang 		= strtoupper($flang);
								$multiKey	= '_'.$flang.'_'.$as_name;
								$value  	= trim($cfg[$multiKey]);
								$value 			= self::psa_value_renderer($psa_fid,'',$as,$value);
								//$value 		= self::handleValueByType($as,$value);

								if ($value != "")
								{
									$found = true;
									break;
								}
							}
							if (!$found)
							{
								$value  	= self::handleValueByType($as,$cfg[$as_name]);
							}
						}

						if ($doJsonDecode)
						{
							$value = json_decode($value,true);
						}

						$assign[$as_name] = $value;
				}
			}

			/*

			INJECT SETTINGS OF COMBOS, CHECKBOX, RADIOS

			*/

			foreach ($checkComboRadio_settings as $setting)
			{
				$as_type_multilang 	= $setting['as_type_multilang'];
				$as_type 			= $setting['as_type'];
				$as_name 			= $setting['as_name'];
				$as_config 			= $setting['as_config'];
				$tmp  				= json_decode($as_config,true);

				$assoz 						= $tmp['a'];
				$linearSorted				= $tmp['l'];
				$assign['CFG_'.$as_name] 	= $tmp;

				switch ($as_type)
				{
					case 'CHECKBOX':

						$reassign = array('a'=>array(),'l'=>array());

						foreach ($linearSorted as $checkSets)
						{
							$preKey = "";
							if ($as_type_multilang == 'Y')
							{
								$preKey = '_'.$lang.'_';
							}

							$keyNacked	= $as_name.'_'.$checkSets['v'];
							$key 		= $preKey.$keyNacked;
							$checked 	= isset($assign[$key]);

							if ($checked)
							{

								$label = $checkSets[$lang];

								if (trim($label)=="")
								{
									$found = false;
									foreach ($langFailOver as $i=>$flang)
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

								$assign[$keyNacked.'_label'] = $label;
								$reassign['a'][$checkSets['v']] = $label;
								$reassign['l'][] 				= array('k'=>$checkSets['v'],'v'=>$label);
							}

						}

						$assign[$as_name] = $reassign;

						break;
					default:
						if ($as_type_multilang == 'Y')
						{
							$multiKey = '_'.$lang.'_'.$as_name;
							$label = $tmp['a'][$assign[$multiKey]][$lang];
							if (trim($label)=="")
							{
								$found = false;
								foreach ($langFailOver as $i=>$flang)
								{
									$flang 		= strtoupper($flang);
									$multiKey	= '_'.$flang.'_'.$as_name;
									$label = $tmp['a'][$assign[$multiKey]][$flang];
									if ($value != "")
									{
										$found = true;
										break;
									}
								}
								if (!$found)
								{
									$label = $tmp['a'][$assign[$multiKey]]['g'];
								}
							}
						} else
						{
							$label = $tmp['a'][$assign[$as_name]][$lang];
							// ÜBERLAUF FEHLT HIER
						}
						$assign['LABEL_'.$as_name] 	= $label;
				}
			}

		}
		return $assign;
	}

	private static $renderOfflinePages = false;
	private static $disableClientInfos = false;

	public static function renderHtmlEditor($value)
	{
		return xredaktor_xr_html::toStaticHtml($value);
	}

	public static function psa_value_renderer($psa_id,$lang,$as,$value,$htmlChars)
	{
		return xredaktor_xr_html::toStaticHtml($value);
	}

	/**
		 * 
		 * WARTUNGSMODUS UND OFFLINE CHECKEN !!!!
		 * 
		 * **/


	public static function get404PageId()
	{
		return xredaktor_niceurl::guessErrorPage();
	}

	public static function processRequest()
	{
		$p_id = frontcontrollerx::getInt('p_id');
		if ($p_id === false) {
			$p_id = xredaktor_niceurl::guessStartPage();
		}
		self::renderPage($p_id);
	}

	public static function getPageById($p_id)
	{
		frontcontrollerx::isInt($p_id,"getPageById_[".$p_id."]");
		$p = xredaktor_pages::getById($p_id);
		return $p;
	}

	public static function getFrameByPageId($p_id)
	{
		frontcontrollerx::isInt($p_id,'getFrameByPageId');
		$p = dbx::query("select * from pages where p_id = $p_id");
		$p_frameid = $p['p_frameid'];
		$f = dbx::query("select * from atoms where a_id = $p_frameid");
		return $f;
	}

	public static function getAtom($a_id)
	{
		$a = dbx::query("select * from atoms where a_id = $a_id");
		return $a;
	}
	public static function getAtomHTML($a_id)
	{
		$a = dbx::query("select * from atoms where a_id = $a_id");
		return $a['a_content'];
	}

	public static function getContainers($a_id)
	{
		$containers = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_type = 'CONTAINER'");
		if (!is_array($containers)) $containers = array();
		return $containers;
	}

	public static function getASsMultiLangRecordsByIDAId($a_id)
	{
		$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_type_multilang='Y'");
		if ($ass === false) $ass = array();
		return $ass;
	}

	public static function getASsNonMultiLangHTMLRecordsByIDAId($a_id)
	{
		$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_type_multilang='N' and as_type='HTML'");
		if ($ass === false) $ass = array();
		return $ass;
	}


	public static function getASsSettingsComboCheckRadioRecordsByIDAId($a_id)
	{
		$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and (as_type = 'COMBO' or as_type = 'CHECKBOX' or as_type = 'RADIO')");
		if ($ass === false) $ass = array();
		return $ass;
	}

	public static function getJSON_Fields($a_id)
	{
		$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and (as_type = 'LINK' OR as_type='ATOMLIST')");
		if ($ass === false) $ass = array();
		$ret = array();

		foreach ($ass as $as)
		{
			$ret[] = $as['as_name'];
		}

		return $ret;
	}

	public static function getATOMLIST_Fields($a_id)
	{
		$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and (as_type = 'ATOMLIST')");

		if ($ass === false) $ass = array();
		$ret = array(
		'check' => array(),
		'settings' => array(),
		);

		foreach ($ass as $as)
		{
			$ret['check'][] = $as['as_name'];
			$ret['settings'][$as['as_name']] = $as;
		}

		return $ret;
	}


	/****************************************************************************
	*
	*	REC-RENDERER
	*
	*/

	public static function getContainersContent($psa_fid,$as_id)
	{


		$containers = dbx::queryAll("select *  from pages_settings_atoms where psa_fid=$psa_fid and psa_as_id=$as_id and psa_del = 'N' order by psa_sort");

		if (!is_array($containers)) $containers = array();


		if (self::isCMS_MODE())
		{
			return $containers;
		}

		$final = array();
		foreach ($containers as $c)
		{

			$final[] = $c;
		}

		return $final;
	}

	public static function getMainSettings($p_id,$a_id,$psa_fid)
	{
		$settings = dbx::query("select * from pages_settings_atoms where psa_as_id = 0 and psa_p_id = $p_id and psa_a_id = $a_id and psa_fid=$psa_fid");
		return $settings;
	}


	public static function renderContainerInlines($p_id,$psa_fid,$as_id,$extraAssigns)
	{
		$_html = "";
		$_html .= self::injectContainerDivStart($p_id,$psa_fid,$as_id);

		$atomsInContainer = self::getContainersContent($psa_fid,$as_id);
		foreach ($atomsInContainer as $atomx)
		{
			$psa_id_of_atom		= $atomx['psa_id'];
			$psa_inline_a_id 	= $atomx['psa_inline_a_id'];
			$inline_atom_cfg 	= $atomx['psa_json_cfg'];
			$_html .= self::injectAtomDivStart($atomx);
			$_html .= self::renderAtom($p_id,$psa_inline_a_id,$psa_id_of_atom,array(),$extraAssigns);
			$_html .= self::injectAtomDivEnd($atomx);
		}

		$_html		.= self::injectContainerDivEnd($p_id,$psa_fid,$as_id);
		return $_html;
	}

	public static function checkContainer($p_id,$a_id,$as_id,$psa_fid)
	{
		if (count($ids)==0) $ids[] = -1;
		$ids = implode(",",$ids);

		$present = dbx::query("select * from pages_settings_atoms where psa_p_id = $p_id and psa_a_id = $a_id and psa_as_id = $as_id and psa_fid = $psa_fid");

		if ($present === false)
		{
			dbx::insert('pages_settings_atoms',array(
			'psa_p_id' 		=> $p_id,
			'psa_fid' 		=> $psa_fid,
			'psa_a_id' 		=> $a_id,
			'psa_as_id' 	=> $as_id,
			'psa_created' 	=> 'NOW()',
			'psa_sort'		=> dbx::queryAttribute("select max(psa_sort)+1 as county from pages_settings_atoms where psa_fid = $psa_fid",'county')
			));
			return dbx::getLastInsertId();
		} else
		{
			return $present['psa_id'];
		}
	}

	public static function atom_cache_check($a_id,$renew=false)
	{
		if ($_REQUEST['ACACHE']=='NO') $renew = true;
		$atom_cache_file_on_disk = dirname(__FILE__).'/../smarty/atom_cache/'.$a_id.'.cache.html';
		if ((!file_exists($atom_cache_file_on_disk)) || ($renew))
		{
			$html = self::getAtomHTML($a_id);
			hdx::fwrite($atom_cache_file_on_disk,$html);
		}
		return $atom_cache_file_on_disk;
	}

	static $runningValues = array();



	public static function xr_mb_str_replace($search, $replace, $subject, &$count=0) {
		if (!is_array($search) && is_array($replace)) {
			return false;
		}
		if (is_array($subject)) {
			// call mb_replace for each single string in $subject
			foreach ($subject as &$string) {
				$string = &self::xr_mb_str_replace($search, $replace, $string, $c);
				$count += $c;
			}
		} elseif (is_array($search)) {
			if (!is_array($replace)) {
				foreach ($search as &$string) {
					$subject = self::xr_mb_str_replace($string, $replace, $subject, $c);
					$count += $c;
				}
			} else {
				$n = max(count($search), count($replace));
				while ($n--) {
					$subject = self::xr_mb_str_replace(current($search), current($replace), $subject, $c);
					$count += $c;
					next($search);
					next($replace);
				}
			}
		} else {
			$parts = mb_split(preg_quote($search), $subject);
			$count = count($parts)-1;
			$subject = implode($replace, $parts);
		}
		return $subject;
	}



	// THIS SHOULD BE FIXED

	public static function cleanNastyThings($str)
	{
		return str_replace(array("\xe2\x80\x8b","<br>"), array('','<br />'), $str);
	}

	public static function xr_chars($ret)
	{
		$ret = htmlspecialchars($ret);
		return $ret;
	}

	public static function xr_htmlSpecialChars($ret)
	{
		return htmlspecialchars($ret);
	}

	public static function isCMS_MODE()
	{
		return isset($_REQUEST['cms']);
	}

	public static function isCMS_MODE_ENTRY()
	{
		return false;
		return isset($_REQUEST['cms2']);
	}

	public static function handleValueByType($as,$value,$htmlChars=true)
	{
		/* TYPE SPECIFIC VALUE=="" ZUSAMMMEN LEGEN MIT WIZARDS */
		switch ($as['as_type'])
		{
			case 'TEXT':
			case 'TEXTAREA':
				if ($htmlChars) {
					$value = self::xr_chars($value);
				}
				break;
			case 'HTML':
				if (trim($value)=="<br>")	$value = "";
				if (trim($value)=="<br />") $value = "";
				$value = self::cleanNastyThings($value);
				break;
			case 'LINK':
				if (strpos($value,'"type":null')!==false) $value = "";
				break;
			default: break;
		}
		/* TYPE SPECIFIC VALUE=="" */
		return $value;
	}



	public static function getMultiLangValInclFailOverValueByASandRecord($as,$record,$isWizardData=false,$lang=false,$htmlChars=true)
	{
		$midKey = "";
		if ($lang===false) $lang = xredaktor_pages::getFrontEndLang();
		$langFailOver = xredaktor_pages::getLangFailOverOrder();

		if ($isWizardData) $midKey = "wz_";
		$as_name = $as['as_name'];


		if ($as['as_type_multilang'] == 'N')
		{
			switch ($as['as_type'])
			{
				case 'CHECKBOX':

					$langUP = strtoupper($lang);
					$as_config = json_decode($as['as_config'],true);
					$segments = array();

					foreach ($as_config['l'] as $l)
					{
						$_k = $l['v'];
						$onOff = ($record[$midKey.$as_name.'_'.$_k] == "on");
						if ($onOff)
						{
							$value = trim($as_config['a'][$_k][$langUP]);
							if ($value == "")
							{
								foreach ($langFailOver as $flang)
								{
									$flang = strtoupper($flang);
									$value = trim($as_config['a'][$_k][$flang]);
									if ($value != "") break;
								}
								if ($value == "") $value = trim($as_config['a'][$_k]['g']);
								if ($value == "") $value = trim($as_config['a'][$_k]['v']);
							}
							$segments[] = $value;
						}
					}

					$value = implode('-',$segments);

					break;

				case 'COMBO':
					$key = $record[$midKey.$as_name];
					$as_config = json_decode($as['as_config'],true);
					$value = trim($as_config['a'][$key][strtoupper($lang)]);

					if ($value == "")
					{

						$found = false;
						foreach ($langFailOver as $i=>$flang)
						{
							$flang 		= strtoupper($flang);
							$value = trim($as_config['a'][$key][$flang]);
							if ($value != "")
							{
								$found = true;
								break;
							}
						}

						if (!$found)
						{
							$value  	= trim($as_config['a'][$key]['g']);
						}

					}

					break;
				default:
					$value = $record[$midKey.$as_name];
			}

		} else
		{

			// TYPES wie COMBO etc ....

			$multiKey		= '_'.strtoupper($lang).'_'.$midKey.$as_name;
			$value  		= trim($record[$multiKey]);
			$value 			= self::handleValueByType($as,$value,$htmlChars);

			if ($value == "")
			{
				$found = false;
				$langFailOver = xredaktor_pages::getLangFailOverOrder();
				foreach ($langFailOver as $i=>$flang)
				{
					$flang 		= strtoupper($flang);
					$multiKey	= '_'.$flang.'_'.$midKey.$as_name;


					$value  	= trim($record[$multiKey]);
					$value 		= self::handleValueByType($as,$value,$htmlChars);
					if ($value != "")
					{
						$found = true;
						break;
					}
				}
				if (!$found)
				{
					$value  	= self::handleValueByType($as,$record[$as_name]);
				}
			}
		}

		/* FIXING ARRAY RESULTING VALUES*/

		switch ($as['as_type'])
		{
			case 'LINK':
				$value = json_decode($value,true);
				break;
			default: break;
		}

		return $value;
	}


	public static function getMultiLangValInclFailOverValueByASandRecord_____Old($as,$record,$isWizardData=false,$lang=false,$htmlChars=true)
	{
		$midKey = "";
		if ($lang===false) $lang = xredaktor_pages::getFrontEndLang();
		if ($isWizardData) $midKey = "wz_";
		$as_name = $as['as_name'];

		if ($as['as_type_multilang'] == 'N')
		{
			$value = $record[$midKey.$as_name];
		} else
		{
			$multiKey		= '_'.strtoupper($lang).'_'.$midKey.$as_name;
			$value  		= trim($record[$multiKey]);
			$value 			= self::handleValueByType($as,$value,$htmlChars);

			if ($value == "")
			{
				$found = false;
				$langFailOver = xredaktor_pages::getLangFailOverOrder();
				foreach ($langFailOver as $i=>$flang)
				{
					$flang 		= strtoupper($flang);
					$multiKey	= '_'.$lang.'_'.$midKey.$as_name;
					$value  	= trim($record[$multiKey]);
					$value 		= self::handleValueByType($as,$value,$htmlChars);
					if ($value != "")
					{
						$found = true;
						break;
					}
				}
				if (!$found)
				{
					$value  	= self::handleValueByType($as,$record[$as_name]);
				}
			}
		}

		/* FIXING ARRAY RESULTING VALUES*/

		switch ($as['as_type'])
		{
			case 'LINK':
				$value = json_decode($value,true);
				break;
			default: break;
		}

		return $value;
	}

	public static function renderSoloAtom($a_id,$assign=array())
	{
		if (!is_numeric($a_id)) die('renderSoloAtom NO-ID');

		if (!isset($assign['P_LANG']))
		{
			$assign['P_LANG'] = xredaktor_pages::getFrontEndLang();
		}

		global $currentSiteId;
		$currentSiteId = xredaktor_atoms::getSiteIdByID($a_id);

		$file = self::atom_cache_check($a_id);

		$html =  templatex::render(self::atom_cache_check($a_id),$assign,self::getSmartyAddOnsDir(),self::getSmartyTemplatesDir());
		return $html;
	}

	public static function renderAtom($p_id,$a_id,$psa_fid,$assign=array(),$extraAssigns=array())
	{

		if ($_REQUEST['xr_debug']=='ATOM_PR_SHOW')
		{
			echo "[XXXXXXX $a_id START]\n";
		}

		if (!is_array($assign)) 		$assign = array();
		if (!is_array($extraAssigns)) 	$extraAssigns = array();


		/***********************************************************
		* MAIN_SETTINGS OF ATOM
		*/

		$cfg = false;

		if ($psa_fid == 0)
		{
			$main_settings = self::getMainSettings($p_id,$a_id,$psa_fid);
		} else
		{
			if (!is_array($psa_fid))
			{
				$main_settings = dbx::query("select * from pages_settings_atoms where psa_id = $psa_fid");
			} else
			{
				$cfg = $main_settings = $psa_fid;
			}
		}

		if (is_array($main_settings))
		{
			if ($cfg === false) $cfg = json_decode($main_settings['psa_json_cfg'],true); // Patch für ATOM LIST
			$lang						= strtoupper(xredaktor_pages::getFrontEndLang());
			$langFailOver 				= xredaktor_pages::getLangFailOverOrder();
			$ass 						= self::getASsMultiLangRecordsByIDAId($a_id);
			$nonLangSpecificHtmlFields	= self::getASsNonMultiLangHTMLRecordsByIDAId($a_id);
			$checkComboRadio_settings 	= self::getASsSettingsComboCheckRadioRecordsByIDAId($a_id);
			$jsonFields 				= self::getJSON_Fields($a_id);
			$atomListFields 			= self::getATOMLIST_Fields($a_id);

			/*
			VALUES SET
			*/

			foreach ($cfg as $k => $value)
			{
				$assign[$k] = $value;

				if (in_array($k,$jsonFields)) {
					$assign[$k] = json_decode($value,true);
				}

				if (in_array($k,$atomListFields['check'])) {

					$retAtomList = array();

					$_a_id 		= $atomListFields['settings'][$k]['as_config'];
					$loopConfig = json_decode($value,true);
					$loopConfig = $loopConfig['l'];


					foreach ($loopConfig as $lc)
					{
						$retAtomList[] = self::renderAtom($p_id,$_a_id,$lc['atom_cfg']);
					}

					$assign[$k] = $retAtomList;
				}

				if ($_REQUEST['xms2'])
				{
					echo "<pre>";
					echo "$k => LEN:".strlen($value)."-".htmlspecialchars($value);
					echo "<pre>";
				}

			}

			foreach ($nonLangSpecificHtmlFields as $as)
			{
				$as_name 			= $as['as_name'];
				$assign[$as_name] 	= self::psa_value_renderer($psa_fid,'',$as,$assign[$as_name],true);
			}

			/*
			VALUES PATCHED BY LANG
			*/

			foreach ($ass as $as)
			{
				$as_type = $as['as_type'];


				switch ($as_type)
				{
					case 'ATOMLIST':
						echo "<pre>";
						print_r($as);
						echo "</pre>";
						break;
					default:

						$as_name 		= $as['as_name'];
						$doJsonDecode	= in_array($as_name,$jsonFields);
						$multiKey		= '_'.$lang.'_'.$as_name;
						$value  		= trim($cfg[$multiKey]);

						$value 			= self::psa_value_renderer($psa_fid,'',$as,$value,true);
						//						$value 			= self::handleValueByType($as,$value,true);

						if ($value == "")
						{
							$found = false;
							foreach ($langFailOver as $i=>$flang)
							{
								$flang 		= strtoupper($flang);
								$multiKey	= '_'.$flang.'_'.$as_name;
								$value  	= trim($cfg[$multiKey]);
								$value 			= self::psa_value_renderer($psa_fid,'',$as,$value);
								//$value 		= self::handleValueByType($as,$value);

								if ($value != "")
								{
									$found = true;
									break;
								}
							}
							if (!$found)
							{
								$value  	= self::handleValueByType($as,$cfg[$as_name]);
							}
						}

						if ($doJsonDecode)
						{
							$value = json_decode($value,true);
						}

						$assign[$as_name] = $value;
				}
			}

			/*

			INJECT SETTINGS OF COMBOS, CHECKBOX, RADIOS

			*/

			foreach ($checkComboRadio_settings as $setting)
			{
				$as_type_multilang 	= $setting['as_type_multilang'];
				$as_type 			= $setting['as_type'];
				$as_name 			= $setting['as_name'];
				$as_config 			= $setting['as_config'];
				$tmp  				= json_decode($as_config,true);

				$assoz 						= $tmp['a'];
				$linearSorted				= $tmp['l'];
				$assign['CFG_'.$as_name] 	= $tmp;

				switch ($as_type)
				{
					case 'CHECKBOX':

						$reassign = array('a'=>array(),'l'=>array());

						foreach ($linearSorted as $checkSets)
						{
							$preKey = "";
							if ($as_type_multilang == 'Y')
							{
								$preKey = '_'.$lang.'_';
							}

							$keyNacked	= $as_name.'_'.$checkSets['v'];
							$key 		= $preKey.$keyNacked;
							$checked 	= isset($assign[$key]);

							if ($checked)
							{

								$label = $checkSets[$lang];

								if (trim($label)=="")
								{
									$found = false;
									foreach ($langFailOver as $i=>$flang)
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

								$assign[$keyNacked.'_label'] = $label;
								$reassign['a'][$checkSets['v']] = $label;
								$reassign['l'][] 				= array('k'=>$checkSets['v'],'v'=>$label);
							}

						}

						$assign[$as_name] = $reassign;

						break;
					default:
						if ($as_type_multilang == 'Y')
						{
							$multiKey = '_'.$lang.'_'.$as_name;
							$label = $tmp['a'][$assign[$multiKey]][$lang];
							if (trim($label)=="")
							{
								$found = false;
								foreach ($langFailOver as $i=>$flang)
								{
									$flang 		= strtoupper($flang);
									$multiKey	= '_'.$flang.'_'.$as_name;
									$label = $tmp['a'][$assign[$multiKey]][$flang];
									if ($value != "")
									{
										$found = true;
										break;
									}
								}
								if (!$found)
								{
									$label = $tmp['a'][$assign[$multiKey]]['g'];
								}
							}
						} else
						{
							$label = $tmp['a'][$assign[$as_name]][$lang];
							// ÜBERLAUF FEHLT HIER
						}
						$assign['LABEL_'.$as_name] 	= $label;
				}
			}

			/*

			CRAP

			*/

			if (isset($assign['HEADLINE']))
			{
				self::setRunningValue($p_id,'AHEADLINE',$assign['HEADLINE'],false);
			}
		}

		if (is_array($psa_fid)) return $assign; // PATCH FOR ATOMLIST

		if ($_REQUEST['xms'])
		{
			echo "<pre>";
			echo print_r($assign);
			echo "<pre>";
		}


		/***********************************************************
		* CONTAINERS OF ATOM
		*/

		$containers  = self::getContainers($a_id);
		foreach ($containers as $container)
		{
			$as_id 		= $container['as_id'];
			$as_name 	= $container['as_name'];

			$psa_id_container 	= self::checkContainer($p_id,$a_id,$as_id,$psa_fid);
			if ($psa_id_container === false) continue;

			$_html 				= self::renderContainerInlines($p_id,$psa_id_container,$as_id,$extraAssigns);
			$assign[$as_name] = $_html;
		}


		$protectedValues = array('P_ID','REQUEST','PSA_ID','CMS');
		foreach (self::$runningValues[$p_id] as $k => $v)
		{
			$assign[$k] = $v;
		}

		if (self::isCMS_MODE())
		{
			$assign['CMS'] = self::injectEditHtml($p_id);
		}

		$assign['GA'] 			= $extraAssigns;

		if (self::$disableClientInfos)
		{
			$assign['IS_USER_BE'] 	= false;
			$assign['IS_DEV'] 		= false;
		} else
		{
			$assign['IS_USER_BE'] 	= xredaktor_core::isBackendEndUserLoggedIn();
			$assign['IS_DEV'] 		= libx::isDeveloper();
		}

		//$assign['SITESETTINGS']	= site::getSiteSettings();

		$assign['REQUEST'] 		= $_REQUEST;
		$assign['P_ID'] 		= $p_id;
		$assign['PSA_ID'] 		= $psa_fid;
		$assign['P_LANG'] 		= xredaktor_pages::getFrontEndLang();



		$html =  templatex::render(self::atom_cache_check($a_id),$assign,self::getSmartyAddOnsDir(),self::getSmartyTemplatesDir());

		if ($_REQUEST['xr_debug']=='ATOM_PR_SHOW')
		{
			echo "[XXXXXXX $a_id END _ Länge:".strlen($html)."]\n";
		}




		return $html;
	}

	public static function setRunningValue($p_id,$k,$v,$overRideIfPresent)
	{
		if ((isset(self::$runningValues[$p_id][$k])) && !$overRideIfPresent) return;
		self::$runningValues[$p_id][$k] = $v;
	}

	public function getSmartyTemplatesDir()
	{
		return dirname(__FILE__).'/../../../../xstorage/';
		return dirname(__FILE__).'/../smarty';
	}

	public function getSmartyAddOnsDir()
	{
		return dirname(__FILE__).'/../smarty';
	}

	/****************************************************************************
	*
	*	MARKERS
	*
	*/


	public static function injectContainerDivStart($p_id,$psa_id,$as_id)
	{
		if (!self::isCMS_MODE()) return "";
		$psa 		= self::getPSARecordById($psa_id);
		$container 	= xredaktor_atoms_settings::getById($psa['psa_as_id']);
		$as_name 	= $container['as_name'];
		return "<div class='xc_container_start' rel='$psa_id' as_name='$as_name' psa_id='$psa_id' as_id='$as_id'></div>";
	}

	public static function injectContainerDivEnd($p_id,$psa_id,$as_id)
	{
		if (!self::isCMS_MODE()) return "";
		$psa 		= self::getPSARecordById($psa_id);
		$container 	= xredaktor_atoms_settings::getById($psa['psa_as_id']);
		$as_name 	= $container['as_name'];
		return "<div class='xc_container_end' rel='$psa_id' as_name='$as_name' psa_id='$psa_id' as_id='$as_id'></div>";
	}



	public static function injectAtomDivStart($atomx)
	{
		if (!self::isCMS_MODE()) return "";
		$psa_id 			= $atomx['psa_id'];
		$psa_inline_a_id 	= $atomx['psa_inline_a_id'];
		$atom = self::getAtom($psa_inline_a_id);
		$a_name = $atom['a_name'];
		return "<div class='xc_atom_start' rel='$psa_id' psa_id='$psa_id' a_name='$a_name'></div>";
	}

	public static function injectAtomDivEnd($atomx)
	{
		if (!self::isCMS_MODE()) return "";
		$psa_id 			= $atomx['psa_id'];
		$psa_inline_a_id 	= $atomx['psa_inline_a_id'];
		$atom = self::getAtom($psa_inline_a_id);
		$a_name = $atom['a_name'];
		return "<div class='xc_atom_end' rel='$psa_id' psa_id='$psa_id' a_name='$a_name'></div>";
	}


	public static function injectEditHtml($p_id)
	{
		$html	= "";
		$assign = array('p_id'=>$p_id,'project_id' => xredaktor_niceurl::getSiteIdViaPageId($p_id));
		$html = templatex::render(dirname(__FILE__).'/../fly3/tpl/inject.tpl',$assign,self::getSmartyAddOnsDir(),self::getSmartyTemplatesDir());
		return $html;
	}


	public static function jump2nice404($p_id)
	{
		if ($p_id == self::get404PageId())
		{
			frontcontrollerx::header404();
		}

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: ".xredaktor_niceurl::genUrl(array(
		'p_id' 	=> self::get404PageId(),
		'lang'	=> xredaktor_pages::getFrontEndLang()
		)));
		die();
	}

	public static function renderPageByVID($p_vid,$return=false,$extraAssigns=array())
	{
		$page = dbx::query("select * from pages where p_vid = $p_vid");
		$p_id = $page['p_id'];
		return self::renderPage($p_id,$return,$extraAssigns);
	}

	public static function renderPageEvenItIsOffline()
	{
		self::$renderOfflinePages = true;
	}

	public static function renderPageNoClientInfos()
	{
		self::$disableClientInfos = true;
	}


	public static function pageIsOfflineByTimeMachine($p_id)
	{
		if (self::isCMS_MODE())
		{
			$startSeite = xredaktor_niceurl::getStartPageById($p_id);
			if ($startSeite == $p_id) {
				echo "<div class='XR_PAGE_OFFLINE'>(TM) FEHLERHAFTE KONFIGURATION ! STARTSEITE IST OFFLINE.</div>";
			} else
			{
				echo "<div class='XR_PAGE_OFFLINE'>PAGE IST OFFLINE (TM)</div>";
			}
		} else
		{
			$startSeite = xredaktor_niceurl::getStartPageById($p_id);
			if ($startSeite == $p_id) return false; // FEHLER


			header("HTTP/1.1 301 Moved Permanently");
			header("Location: ".xredaktor_niceurl::genUrl(array(
			'p_id' 	=> $startSeite,
			'lang'	=> xredaktor_pages::getFrontEndLang()
			)));

			die();
		}
	}

	public static function renderPage($p_id,$return=false,$extraAssigns=array(),$header404Check=true)
	{
		
		if (memcachex::get('FULL_IMPORTER_RUNNING')!==false) {
			//$ts = memcachex::get('FULL_IMPORTER_RUNNING');
			//die("<pre>Hello! \n\n We are currently syncing from the LIVE-Servers...\n A full import takes approx. 4h - this import started at: <b>$ts</b> \n Normally this task runs at night. ( 24:00 - central european time)</pre>");
		}
		

		libx::turnOnErrorReporting();
		if ($p_id == 0) die('-');

		$p_id 	= frontcontrollerx::isInt($p_id,'PAGE_ID_NOT_NUMERIC');
		$p 		= self::getPageById($p_id);

		if ($p === false)
		{
			self::jump2nice404($p_id);
		}
		
		#### CACHE
		list($URL,$crap) = explode("?",$_SERVER['REQUEST_URI'],2);
		$page_cache_key = 'PAGE_FULL_CACHE_V_7_'.$p_id.md5($URL);

		if (($p['p_full_cache'] == 'Y') && (!isset($_REQUEST['DISABLE_FULL_CACHE'])) && self::useCache())
		{
			$cached_html = memcachex::get($page_cache_key);
			if ($cached_html !== false) 
			{
				$cached_html = str_replace("top.FULL_CACHE=false;","top.FULL_CACHE=true;",$cached_html);
				die($cached_html);
			}
		}

		if ($header404Check)
		{
			if ($p_id == self::get404PageId())
			{
				header("HTTP/1.0 404 Not Found");
			}
		}

		if (($p['p_isOnline'] == 'N') && ($p_id != self::get404PageId()))
		{
			if (!self::$renderOfflinePages)
			{
				frontcontrollerx::header404();
			}
		}

		

		$a 		= self::getFrameByPageId($p_id);
		if (!is_numeric($a['a_id'])) die('Topelement nicht ');


		if (!is_array($extraAssigns)) $extraAssigns = array();

		$assign = array(
		'P_ID' => $p_id,
		'REQUEST' => $_REQUEST
		);

		self::$runningValues[$p_id] = array();



		if (self::isCMS_MODE_ENTRY())
		{
			/*
			$project_id = 1;
			$project_id = xredaktor_niceurl::getSiteIdViaHttpHost();
			$assign = array('url'=>'/xgo/xplugs/xredaktor/ajax/render/page?p_id='.$p_id.'&cms2=1','p_id'=>$p_id,'project_id'=>$project_id);
			$html = templatex::render(dirname(__FILE__).'/../fly2/tpl/wrapper.tpl',$assign,self::getSmartyAddOnsDir(),self::getSmartyTemplatesDir());
			*/
		} else
		{
			//$key = '_PAGE_'.md5(serialize(array($p_id,$a['a_id'],0,$assign,$extraAssigns)));
			//$cached = memcachex::get($key);

			//if ($cached === false)
			{
				$html = self::renderAtom($p_id,$a['a_id'],0,$assign,$extraAssigns);
				//memcachex::set($key,$html);
				//$cached = $html;
			}

			//$html = $cached;
		}


		//if ($p['p_full_cache'] == 'Y')
		{
			if (!isset($_REQUEST['NCNOW']))
			{
				memcachex::set($page_cache_key,$html);
			}
		}
		
		if ($return) return $html;

		if (isset($_REQUEST['XR_MAIL2']) && libx::isDeveloper())
		{
			$to = trim($_REQUEST['XR_MAIL2']);
			$cfg = xredaktor_niceurl::getSiteConfigViaPageId($p_id);
			$storage = dirname(xredaktor_storage::getDirOfStorageScope($cfg['s_s_storage_scope']));


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

			$mailCfg = array(
			'to'						=> array('email' => $to,					'name' => $to),
			'from'						=> array('email' => $s_mail_from_email ,	'name' => $s_mail_from_name ),
			'reply'						=> array('email' => $s_mail_reply_email ,	'name' => $s_mail_reply_name ),
			'html'						=> $html,
			'txt'						=> '',
			'subject'					=> "PAGE2EMAIL VIA XGO [$p_id]",
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

			if (!mailx::sendMail($mailCfg))
			{
			}
		}

		


		die($html);
	}

	public static function getPSARecordById($psa_id)
	{
		return dbx::query("select * from pages_settings_atoms where psa_id = $psa_id");
	}

	/****************************************************************************
	*
	*	EDIT-FUNCTIONS
	*
	*/


	public static function atomAppend($cfg)
	{

		$psa_inline_a_id 	= $cfg['psa_inline_a_id'];
		$psa_fid 			= $cfg['psa_fid'];

		$father = self::getPSARecordById($psa_fid);
		$p_id = $cfg['psa_p_id'] = $father['psa_p_id'];
		$psa_as_id = $cfg['psa_as_id'];

		$psa_sort = dbx::queryAttribute("select max(psa_sort)+1 as county from pages_settings_atoms where psa_fid = $psa_fid ","county");
		$cfg['psa_sort'] 	= $psa_sort;
		$cfg['psa_created']	= 'NOW()';
		dbx::insert('pages_settings_atoms',$cfg);
		$psa_id = dbx::getLastInsertId();


		return array(self::getPSARecordById($psa_id),self::renderContainerInlines($p_id,$psa_fid,$psa_as_id));
	}

	public static function atomRemove($cfg)
	{
		$psa_id 	= $cfg['psa_id'];
		$psa 		= self::getPSARecordById($psa_id);
		$psa_fid 	= $psa['psa_fid'];
		$p_id 		= $psa['psa_p_id'];
		$psa_as_id 	= $psa['psa_as_id'];

		dbx::update('pages_settings_atoms',array('psa_del'=>'Y'),array('psa_id'=>$psa_id));
		xredaktor_storage::fixFileUsage($psa_id);
		return array(self::renderContainerInlines($p_id,$psa_fid,$psa_as_id));
	}

	public static function atomMoveUp($cfg)
	{
		$psa_id 			= $cfg['psa_id'];

		$psa = self::getPSARecordById($psa_id);

		$psa_p_id 	= $psa['psa_p_id'];
		$psa_a_id 	= $psa['psa_a_id'];
		$psa_fid 	= $psa['psa_fid'];
		$psa_as_id 	= $psa['psa_as_id'];
		$psa_sort 	= $psa['psa_sort'];

		$atom2change = dbx::query("select * from pages_settings_atoms where psa_p_id = $psa_p_id and psa_a_id = $psa_a_id and psa_as_id = $psa_as_id and psa_fid = $psa_fid and psa_sort < $psa_sort and psa_del = 'N' order BY psa_sort DESC");
		if ($atom2change !== false)
		{
			$psa_id_2 	= $atom2change['psa_id'];
			$psa_sort_2 = $atom2change['psa_sort'];
			dbx::update('pages_settings_atoms',array('psa_sort'=>$psa_sort),	array('psa_id'=>$psa_id_2));
			dbx::update('pages_settings_atoms',array('psa_sort'=>$psa_sort_2),	array('psa_id'=>$psa_id));
		}

		return array(self::getPSARecordById($psa_id),self::renderContainerInlines($psa_p_id,$psa_fid,$psa_as_id));
	}

	public static function atomMoveDown($cfg)
	{
		$psa_id 			= $cfg['psa_id'];

		$psa = self::getPSARecordById($psa_id);

		$psa_p_id 	= $psa['psa_p_id'];
		$psa_a_id 	= $psa['psa_a_id'];
		$psa_fid 	= $psa['psa_fid'];
		$psa_as_id 	= $psa['psa_as_id'];
		$psa_sort 	= $psa['psa_sort'];

		$atom2change = dbx::query("select * from pages_settings_atoms where psa_p_id = $psa_p_id and psa_a_id = $psa_a_id and psa_as_id = $psa_as_id and psa_fid = $psa_fid and psa_sort > $psa_sort and psa_del = 'N' order BY psa_sort ASC");
		if ($atom2change !== false)
		{
			$psa_id_2 	= $atom2change['psa_id'];
			$psa_sort_2 = $atom2change['psa_sort'];
			dbx::update('pages_settings_atoms',array('psa_sort'=>$psa_sort),	array('psa_id'=>$psa_id_2));
			dbx::update('pages_settings_atoms',array('psa_sort'=>$psa_sort_2),	array('psa_id'=>$psa_id));
		}

		return array(self::getPSARecordById($psa_id),self::renderContainerInlines($psa_p_id,$psa_fid,$psa_as_id));
	}

	public static function atomInsertBefore($cfg)
	{
		$psa_id 			= $cfg['psa_id'];
		$psa_inline_a_id 	= $cfg['psa_inline_a_id'];

		$psa = self::getPSARecordById($psa_id);

		$psa_p_id 	= $psa['psa_p_id'];
		$psa_a_id 	= $psa['psa_a_id'];
		$psa_fid 	= $psa['psa_fid'];
		$psa_as_id 	= $psa['psa_as_id'];
		$psa_sort 	= $psa['psa_sort'];

		dbx::insert('pages_settings_atoms',array(
		'psa_fid' 			=> $psa_fid,
		'psa_p_id' 			=> $psa_p_id,
		'psa_a_id' 			=> $psa_a_id,
		'psa_as_id' 		=> $psa_as_id,
		'psa_sort'			=> $psa_sort,
		'psa_inline_a_id' 	=> $psa_inline_a_id,
		'psa_created'		=> 'NOW()'
		));

		$psa_id_new = dbx::getLastInsertId();

		dbx::query("update pages_settings_atoms set psa_sort=psa_sort+1 where psa_a_id = $psa_a_id and psa_as_id = $psa_as_id and psa_p_id = $psa_p_id and psa_id != $psa_id_new and psa_sort >= $psa_sort");

		return array(self::getPSARecordById($psa_id_new),self::renderContainerInlines($psa_p_id,$psa_fid,$psa_as_id));
	}

	public static function smartyTester()
	{
		return "HELLO SMARTY!";
	}
}