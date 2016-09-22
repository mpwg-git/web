<?

class xr_forms
{

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
		$wz_id 	= intval($params['wz_id']);
		$fields = array();


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


		$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $wz_id and as_del='N' order by as_sort, as_fe_row");
		
		$row = false;
		
		foreach ($ass as $as)
		{

			$curRow = intval($as['as_fe_row']);
			
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
			
			$as_type = $as['as_type'];

			if ($as['as_gui'] == "HIDDEN")
			{
				$as_type = "HIDDEN";
			}


			// get atom id
			$as_tpl_id	= dbx::queryAttribute("select * from atoms_types2atoms where as_type ='$as_type'", "ata_a_id");
			$tpl_id	= intval($as_tpl_id);
			
			
			// do specific stuff

			switch ($as_type)
			{
				case 'DATE':
					break;
					
				case 'RADIO':
					$as['config'] = json_decode($as['as_config'],true);
					break;
					
				case 'YN':
					break;
					
				case 'CHECKBOX':
					$as['config'] = json_decode($as['as_config'],true);
					break;
					
				case 'COMBO':
					
					$confix = json_decode($as['as_config'],true);
					$records = array();
					
					foreach ($confix['l'] as $wtf)
					{
						$records[] = array('value'=>$wtf['v'],'titleIt'=>$wtf['v']);
					}
					
					$as['records'] 	= $records;
					
					break;
					
				case 'TEXTAREA':
					break;
					
				case 'HIDDEN':
					break;
					
				case 'WIZARD':

					$as_config = intval($as['as_config']);
					if ($as_config == 0) continue;

					$table		= xredaktor_wizards::genWizardTableNameBy_a_id($as_config);
					$titleIt	= xredaktor_wizard_do_magic_grid::getTitleItSql($as_config);

					$tpl_id 		= 480;
					$records 		= dbx::queryAll("select $titleIt, wz_id as value from $table where wz_del='N' and wz_online='Y'");
					$as['records'] 	= $records;

					break;

				case 'TEXT':
					break;
					
				default:
					continue;
					
			}

			$as['col'] 			= $as['as_fe_col'];
			$as['row'] 			= $as['as_fe_row'];
			$as['name'] 		= $as['as_name'];
			$as['label'] 		= $as['as_label'];
			$as['placeholder'] 	= $as['as_fe_placeholder'];
			$as['class'] 		= $as['as_fe_class'];
			$as['required'] 	= $as['as_fe_required'];
			$as['tpl_id'] 		= $tpl_id;

			if (isset($injects[$as['name']]))
			{
				$as['value'] = $injects[$as['name']];
			}

			$fields[] = $as;

		}

		$lng = 'de';
		
		if (isset($_REQUEST['lang']) && $_REQUEST['lang'] != 'de') {
			$lng = dbx::escape($_REQUEST['lang']);
		} 		
		

		$btn = array(

		'submit_txt' => xredaktor_translate::doTranslate($params['submit_txt'], $lng, 1) 

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
		'hash'		=> xr_forms::getHash()

		);

		return xredaktor_render::renderSoloAtom(476,$vars);
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