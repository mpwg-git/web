<?

class xredaktor_forms
{

	public static function defaultFeRenderById($f_id)
	{
		$f_id = intval($f_id);
		$f = dbx::query("select * from forms where f_id = $f_id");
		if ($f === false) die('x_0');

		$f_a_id 	= intval($f['f_a_id']);
		$site 		= dbx::query("select sites.* from atoms,sites where a_s_id = s_id and a_id = $f_a_id");
		$s_p_forms	= intval($site['s_p_forms']);


		global $_REQUEST;
		$_REQUEST['form_id'] = $f_id;
		xredaktor_render::renderPage($s_p_forms);
		die();
	}

	public static function getSiteId()
	{
		return 1;
	}


	public static $cacheMapping = false;
	public static function getMappings()
	{

		if (self::$cacheMapping === false)
		{
			$siteId 	= self::getSiteId();
			$mappings 	= dbx::queryAll("select * from forms_mappings where fm_s_id = $siteId and fm_del='N'");

			self::$cacheMapping_AS = array();
			foreach ($mappings as $m)
			{
				$fm_type 	= $m['fm_type'];
				$fm_a_id	= intval($m['fm_a_id']);

				self::$cacheMapping_AS[$fm_type] = $fm_a_id;
			}
		}

		return $cacheMapping;
	}


	public static function getAtomIdByAsId($as_id)
	{
		$mappings	= self::getMappings();
		$as_id 		= intval($as_id);
		$as_type 	= dbx::queryAttribute("select as_type from atoms_settings where as_id = $as_id");
		return intval($mappings[$as_type]);
	}

	public static function getAtomIdByGuiType($gui_type)
	{
		$mappings	= self::getMappings();
		return intval($mappings['GUI_'.$gui_type]);
	}


	public static function renderFormById_fe($f_id,$raw=false,$fas_fid=0)
	{

		$html = array();

		$records = dbx::queryAll("select *, (select count(*) from forms_atoms_settings b where b.fas_fid = a.fas_id and fas_del='N') as jumpInto from forms_atoms_settings a where fas_f_id = $f_id and fas_fid = $fas_fid and fas_del='N' order by fas_sort");
		foreach ($records as $r)
		{
			$fas_id 	= $r['fas_id'];
			$fas_type 	= $r['fas_type'];
			
			switch ($fas_type)
			{
				case 'GUI':

					$fas_gui_type = $r['fas_gui_type'];
					switch ($fas_gui_type)
					{
						case 'row':

							$a_id = self::getAtomIdByGuiType($fas_gui_type);
							if ($a_id == 0) break;


							$html_children = self::renderFormById_fe($f_id,$raw,$fas_id);
							
							$cfg = array(
							'fas' 	=> $r,
							'html' 	=> $html_children
							);
							
							$html[] = xredaktor_render::renderSoloAtom($a_id,$cfg);
							
							break;

						default: break;
					}


					break;
				case 'AS':

					$as_id 	= intval($r['fas_as_id']);
					$a_id 	= self::getAtomIdByAsId($as_id);
					if ($a_id == 0) break;

					$cfg = array(
					'fas' 	=> $r,
					'raw'	=> $raw
					);

					$atom_html = xredaktor_render::renderSoloAtom($a_id,$cfg);
					$html[] = $atom_html;

					break;
				default: break;
			}


			if ($r['jumpInto']) // process children
			{

			}
		}



		return implode("",$html);
	}





	public static function getJsonByAtomId($a_id, $getAsArray=false)
	{
		$a_id 							= intval($a_id);
		$as_fields_config				= false;

		if ($a_id == 0)
		{
			return false;
		}

		$as 							= dbx::query("select * from atoms_settings where as_a_id = $a_id and as_del='N'");

		$as_type						= $as['as_type'];

		switch ($as_type)
		{
			case 'ATOM':

				break;

			case 'ATOMLIST':

				break;

			case 'CHECKBOX':

				break;

			case 'COLLECTOR':

				break;

			case 'COLOR':

				break;

			case 'COMBO':
				/*
				$confix = json_decode($as['as_config'],true);
				$records = array();

				foreach ($confix['l'] as $wtf)
				{
				$records[] = array('value'=>$wtf['v'],'titleIt'=>$wtf['v']);
				}

				$as['records'] 	= $records;
				*/
				break;

			case 'CONTAINER':

				break;

			case 'CONTAINER-FILES':

				break;

			case 'CONTAINER_IMAGES':

				break;

			case 'DATE':

				break;

			case 'FILE':

				break;

			case 'FLOAT':

				break;

			case 'FRAME':

				break;

			case 'GEO-POINT':

				break;

			case 'GEO-POLY':

				break;

			case 'HTML':

				break;

			case 'IMAGE':

				break;

			case 'IMG_GALLERY':

				$as_fields_config['test'] = "jjj";
				break;

			case 'INFOPOOL_RECORD':

				break;

			case 'INT':

				break;

			case 'JSON':

				break;

			case 'LINK':

				break;

			case 'MD5PASSWORD':

				break;

			case 'PAGE':

				break;

			case 'RADIO':

				break;

			case 'REMOTE_FIELD':

				break;

			case 'REMOTE_RECORD':

				break;

			case 'SIMPLE_W2W':

				//switch based on as_gui_mode
				break;

			case 'STAMPER':

				break;

			case 'TEXT':

				break;

			case 'TEXTAREA':

				break;

			case 'TIME':

				break;

			case 'TIMESTAMP':

				break;

			case 'UNIQUE_W2W':

				//switch based on as_gui_mode
				break;

			case 'VIDEO':

				break;

			case 'WATTRIBUTE':

				break;

			case 'WID':

				break;

			case 'WIZARD':
				/*
				$as_config = intval($as['as_config']);
				if ($as_config == 0) continue;

				$table		= xredaktor_wizards::genWizardTableNameBy_a_id($as_config);
				$titleIt	= xredaktor_wizard_do_magic_grid::getTitleItSql($as_config);

				$records 		= dbx::queryAll("select $titleIt, wz_id as value from $table where wz_del='N' and wz_online='Y'");
				$as['records'] 	= $records;
				*/
				break;


			case 'WIZARD2WIZARD':

				break;

			case 'WIZARDLIST':

				break;

			case 'YN':

				break;

			default:
				continue;

		}

		if ($getAsArray === true)
		{
			return $as_fields_config;
		}

		return json_encode($as_fields_config);
	}

	public static function init()
	{
		@session_start();
		if (!isset($_SESSION['FROM_KEYS'])) $_SESSION['FROM_KEYS'] = array();
	}

	public static $key 		= "12983209832093284äöläsdfasdfasd";
	public static $key_fe 	= "XR_FORMS";

	public static function getHash()
	{
		self::init();
		$hash = md5(self::$key.rand(0,10000).time().$_SERVER['REMOTE_ADDR']);
		$_SESSION['FROM_KEYS'][] = $hash;
		return $hash;
	}

	public static function isValidHash($hash)
	{
		self::init();
		return in_array($hash,$_SESSION['FROM_KEYS']);
	}


	public static function sc_genForm($params)
	{
		$f_id	= intval($params['form_id']);
		$html 	= self::renderFormById_fe($f_id);
		
		$form_a_id = intval(dbx::queryAttribute("select * from atoms_types2atoms where ata_type ='GUI_FORM'", "ata_a_id"));
		
		$btn = array(
		'submit_txt' => $params['submit_txt']
		);
		
		$vars = array(
		'pre_action'=> $params['pre_action'],
		'action'	=> $params['action'],
		'js'		=> $params['js'],
		'url'		=> $params['url'],
		'class'		=> $params['class'],
		'html' 		=> $html,
		'btn'	 	=> $btn,
		'hash'		=> xredaktor_forms::getHash()
		);

		return xredaktor_render::renderSoloAtom($form_a_id,$vars);
		
		
		
		
		
		
		
		return false;
		
		
		
		
		
		
		
		$fields = array();

		$form_a_id		= dbx::queryAttribute("select * from atoms_types2atoms where ata_type ='_FORM'", "ata_a_id");
		$form_a_id		= intval($form_a_id);

		if (($form_a_id) == 0)
		{
			return "[ERROR] FORM ATOM ID NOT SET";
		}

		$injectPrefix 		= "inject_";
		$injectPrefixLen 	= strlen($injectPrefix);
		$injects = array();

		foreach ($params as $k => $v)
		{
			if (substr($k,0,$injectPrefixLen) == $injectPrefix)
			{
				$k2 = substr($k,$injectPrefixLen);
				$injects[$k2] = $v;
			}
		}

		$ass = dbx::queryAll("select * from forms_atom_settings where fas_f_id = $form_id and fas_del='N' order by fas_sort");

		$row = false;

		foreach ($ass as $as)
		{

			switch($as['fas_gui_type'])
			{

				case 'row':
					continue;
					break;

				case 'tabpanel':
					continue;
					break;

				case 'step':
					continue;
					break;

				default:
					$as_settings = xredaktor_atoms_settings::getById($as['fas_as_id']);
					break;
			}

			// TODO
			/*
			$curRow = 0;

			$as['ROW_OPEN'] 	= false;
			$as['ROW_CLOSE'] 	= false;

			if ($row === false)
			{
			$row = $curRow;
			$as['ROW_OPEN'] = true;
			}

			if ($curRow != $row)
			{
			$row = $curRow;
			$as['ROW_OPEN'] 	= true;
			$as['ROW_CLOSE'] 	= true;
			}

			*/

			$as_type = $as_settings['as_type'];

			// get atom id
			$as_tpl_id	= dbx::queryAttribute("select * from atoms_types2atoms where ata_type ='$as_type'", "ata_a_id");
			$a_id		= intval($as_tpl_id);

			$atom_json 	= self::getJsonByAtomId($a_id,true);

			$assign 	= array('config' => $atom_json);

			$fields[] 	= xredaktor_render::renderSoloAtom($a_id, $assign);

		}

		$btn = array(
		'submit_txt' => $params['submit_txt']
		);


		//print_r($params);

		$vars = array(
		'pre_action'=> $params['pre_action'],
		'action'	=> $params['action'],
		'js'		=> $params['js'],
		'url'		=> $params['url'],
		'class'		=> $params['class'],
		'fields' 	=> $fields,
		'btn'	 	=> $btn,
		'wz_id'	 	=> $wz_id,
		'hash'		=> xredaktor_forms::getHash()

		);

		return xredaktor_render::renderSoloAtom($form_a_id,$vars);
	}

	public static function cleanString($value)
	{
		return $value;
	}

	public static function ajax_fe_process()
	{
		//if (libx::isDeveloper()) frontcontrollerx::json_failure("DEVELOPER IP !!!! - NO REQUEST SENT !!!!!");

		$hash1 	= $_REQUEST['hash1'];

		//if (!self::isValidHash($hash1)) frontcontrollerx::json_failure("INVALID HASH0");

		$wz_id 	= $_REQUEST['wz_id'];
		$hash0	= $_REQUEST['hash0'];

		$hash1_check = md5(self::$key_fe . d . $wz_id);

		//if (!self::isValidHash($hash1)) frontcontrollerx::json_failure("INVALID HASH1");

		$data 	= json_decode($_REQUEST['data'],true);
		$db 	= array();

		$wz_id 	= intval($_REQUEST['wz_id']);
		$fields = array();

		$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $wz_id and as_del='N' order by as_sort");
		foreach ($ass as $as)
		{
			$as_id			= $as['as_id'];
			$name 			= $as['as_name'];
			$as_fe_required = $as['as_fe_required'];
			$as_type		= $as['as_type'];


			switch (strtoupper($name))
			{
				case 'IP':
					$data[$name] = $_SERVER['REMOTE_ADDR'];
					break;
				case 'SPRACHE':
					$data[$name] = xredaktor_pages::getFrontEndLang();
					break;
				default: break;
			}

			if (!isset($data[$name])) continue;

			$value = trim($data[$name]);

			if ($as_type == 'DATE')
			{
				$correctDateTs 	= strtotime($value);
				$correctDate	= date("Y-m-d", $correctDateTs);
				$value			= $correctDate;
			}


			switch ($as_fe_required)
			{
				case 'Y':
					if ($value == "") frontcontrollerx::json_failure("REQUIRED:".$name,'',array('req_check_failed'=>1,'field'=>$name));
					break;
				case 'N':
					$value = self::cleanString($value);
					break;
				case 'EMAIL':
					if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
						frontcontrollerx::json_failure("NOTEMAIL:".$name,array('req_check_failed'=>1,'field'=>$name));
					}
					break;
				default: continue;
			}

			$db['wz_'.$name] = $value;
		}

		$db['wz_created'] = 'NOW()';

		$table = xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		dbx::insert($table,$db);
		$r_id = dbx::getLastInsertId();
		$insertedID = $r_id;

		$db_loaded = dbx::query("select * from $table where wz_id = $r_id");


		$wizard 	= dbx::query("select * from atoms where a_id = $wz_id ");
		$settings 	= json_decode($wizard['a_wizardSettings'],true);
		$mailFields = array('es_mail_0','es_mail_1');

		foreach ($mailFields as $f)
		{
			if (trim($settings[$f]) == "") continue;

			$mailSettings = array();
			$_mailSettings = explode("\n",trim($settings[$f]));

			foreach ($_mailSettings as $line)
			{
				list($_key,$_value) = explode("=",$line,2);
				$_key 	= trim($_key);
				$_value = trim($_value);
				$mailSettings[$_key] = $_value;
			}


			####### TO STANDARD


			$to_from_record_clean = array();
			$to_from_record = explode(",",$mailSettings['to_from_record']);
			unset($mailSettings['to_from_record']);

			if (is_array($to_from_record))
			{
				foreach ($to_from_record as $as_id)
				{
					$as_id = intval($as_id);
					if ($as_id == 0) continue;

					$as = dbx::query("select * from atoms_settings where as_id = $as_id");
					if ($as === false) continue;

					$emailx = $db_loaded['wz_'.$as['as_name']];
					if (filter_var($emailx, FILTER_VALIDATE_EMAIL)) {
						$to_from_record_clean[] = $emailx;
					}
				}
			}

			################ 			to_from_wizard=1766|964


			$to_from_wizard = array();
			if (isset($mailSettings['to_from_wizard']))
			{

				list($record_field,$f_record_field) = explode("|",$mailSettings['to_from_wizard']);

				$record_field 	= intval($record_field);
				$f_record_field = intval($f_record_field);

				if (($record_field == 0) || ($f_record_field == 0))
				{

				} else {


					$r_as 	= xredaktor_atoms_settings::getById($record_field);
					$fr_as 	= xredaktor_atoms_settings::getById($f_record_field);


					$key = intval($db_loaded['wz_'.$r_as['as_name']]);
					$ftable = xredaktor_wizards::genWizardTableNameBy_a_id(intval($fr_as['as_a_id']));

					$fdb = dbx::query("select * from $ftable where wz_id = $key");

					$xxx_email = $fdb['wz_'.$fr_as['as_name']];

					if (filter_var($xxx_email, FILTER_VALIDATE_EMAIL)) {
						$to_from_wizard[] = $xxx_email;
					}

				}

			}

			$to = explode(",",$mailSettings['to']);
			if (!is_array($to)) $to = array();

			foreach ($to_from_record_clean as $e)
			{
				if (filter_var($e, FILTER_VALIDATE_EMAIL)) {
					$to[] = $e;
				}
			}

			foreach ($to_from_wizard as $e)
			{
				if (filter_var($e, FILTER_VALIDATE_EMAIL)) {
					$to[] = $e;
				}
			}

			$mailSettings['to'] = $to;
			xredaktor_mail::qMail($mailSettings,$db);
		}

		//check if posthook set
		$a_id = intval($_REQUEST['wz_id']);

		$wizard_settings = array();
		$posthook 		 = '';

		if ($a_id != 0)
		{
			$wizard_settings = xredaktor_wizards::getWizardSettings($a_id);
		}

		if ($wizard_settings && $wizard_settings['es_postHooks'] != '')
		{
			$data['insertedId'] = $insertedID;

			$posthook = $wizard_settings['es_postHooks'];
			if (is_callable($posthook))
			{
				call_user_func($posthook, $data);
			}
		}


		frontcontrollerx::json_success(array('r_id'=>$r_id));
	}

}