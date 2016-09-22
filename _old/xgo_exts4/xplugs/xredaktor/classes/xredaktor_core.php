<?

class xredaktor_core
{

	
	public static function isCodeTesting()
	{
		global $XREDAKTOR_CODE_TESTING;
		return ($XREDAKTOR_CODE_TESTING == 1);
	}

	
	public static function checkFaces() {

		$faces = self::getFaces();
		foreach ($faces as $f) {
			$f_id = intval($f['f_id']);
			if ($f_id == 0) continue;

			if (!dbx::attributePresent('atoms_history','ah_backup_'.$f_id)) {
				dbx::query("ALTER TABLE  `atoms_history` ADD  `ah_backup_$f_id` LONGTEXT NOT NULL");
			}

			if (!dbx::attributePresent('atoms','a_content_'.$f_id)) {
				dbx::query("ALTER TABLE  `atoms` ADD  `a_content_$f_id` LONGTEXT NOT NULL");
			}

			if (!dbx::attributePresent('pages','p_inMenue_'.$f_id)) {
				dbx::query("ALTER TABLE  `pages` ADD  `p_inMenue_$f_id` ENUM(  'Y',  'N' ) NOT NULL DEFAULT  'N'");
			}
			
		}

	}

	public static function getFaces()
	{
		$faces = dbx::queryAll("select * from faces where f_del = 'N' and f_online='Y' order by f_sort");
		if ($faces === false) $faces = array();
		return $faces;
	}
	
	public static function flushAllTemp()
	{
		xredaktor_core::updateSecurity();
		xcore::flushTemp();
		xredaktor_core::flushTemp();
	}

	public static function flushTemp()
	{
		$root = dirname(__FILE__).'/../smarty';
		$dirs2clean = array($root.'/atom_cache',$root.'/psa_cache');

		foreach ($dirs2clean as $dir)
		{
			$files = hdx::readDirFlatArray($dir);
			foreach ($files as $file)
			{
				if ($file['TYPE'] != 'FILE') continue;
				@unlink($file['F_NAME_FULL']);
			}
		}
	}

	public static function isBackendEndUserLoggedIn()
	{
		@session_start();
		$userState = ($_SESSION['_X_USER_X_'] == libx::getIp()) ? true : false;
		return $userState;
	}

	private static function getUserSettings_LIMIT($option,$key)
	{
		$user 	= self::getUserSettings();
		if ($user['wz_u_limit_mode'] == 'N') 	return false;
		if ($user[$option] == 'off') 			return false;
		if (!isset($user[$key])) 				return false;

		$value 	= trim($user[$key]);
		if ($value == "") 						return false;

		$values 		= explode(";",$value);
		$valuesClean 	= array();

		foreach ($values as $v)
		{
			if (!is_numeric($v)) continue;
			$valuesClean[] = $v;
		}

		return $valuesClean;
	}

	public static function getUserSettings_LIMIT_ONOFF_FE_TRANS()
	{
		$user = self::getUserSettings();
		return ($user['wz_u_limits_FE_TRANS'] == 'on');
	}

	public static function getUserSettings_LIMIT_Infopool()
	{
		return self::getUserSettings_LIMIT('wz_u_limits_INFOPOOL','wz_u_limit_infopool');
	}

	public static function getUserSettings_LIMIT_Wizards()
	{
		return self::getUserSettings_LIMIT('wz_u_limits_WIZARDS','wz_u_limit_wizards');
	}

	public static function getUserSettings_LIMIT_FileArchiv()
	{
		return self::getUserSettings_LIMIT('wz_u_limits_FA','wz_u_limit_fa');
	}

	public static function getUserSettings_LIMIT_Atoms()
	{
		return self::getUserSettings_LIMIT('wz_u_limits_ATOMS','wz_u_limit_atoms');
	}

	public static function getUserSettings_LIMIT_Frames()
	{
		return self::getUserSettings_LIMIT('wz_u_limits_FRAMES','wz_u_limit_frames');
	}

	public static function getUserSettings_LIMIT_Pages()
	{
		return self::getUserSettings_LIMIT('wz_u_limits_PAGES','wz_u_limit_pages');
	}

	public static function getUserSettings_LIMIT_Sites()
	{
		return self::getUserSettings_LIMIT('wz_u_limits_SITES','wz_u_limit_sites');
	}

	public static function getUserSettings()
	{

		$user 	= trim(self::getRawAuthUser());
		$pass 	= trim($_SERVER['PHP_AUTH_PW']); // PWD wird nicht IMMER mitgeschickt...

		$present = xredaktor_fe::wQueryViaVID(1000,array(
		"MD5(wz_u_username)"	=> $user
		//,"wz_u_password" 		=> $pass
		));

		if (is_array($present))
		{
			//$present['groups'] = xredaktor_fe::wN2N_(407,$present['wz_id']);
			$present['groups'] = array();
			
		} else
		{
			$present['groups'] = array();
		}

		return $present;
	}

	public static function getUserId()
	{
		$user 	= self::getUserSettings();
		return intval($user['wz_id']);
	}
	
	public static function isAdmin()
	{
		$user 	= self::getUserSettings();
		return ($user['wz_u_is_admin'] == "Y");
	}
	
	public static function genSalt()
	{
		@session_start();
		$_SESSION['X_RED_LOGIN_SALTY'] = md5(time());
		return self::getLastSalt();
	}

	public static function getLastSalt()
	{
		@session_start();
		return $_SESSION['X_RED_LOGIN_SALTY'];
	}


	public static function getRawAuthUser()
	{
		$user = $_SERVER['REMOTE_USER'];

		if ($user == "")
		{
			$user = $_SERVER['PHP_AUTH_USER'];
		}

		return $user;
	}

	public static function checkUserAccessViaRemoteUser()
	{
	
		
		$present = xredaktor_fe::wQueryViaVID(1000,array(
		"MD5(wz_u_username)"	=> self::getRawAuthUser()
		));

		
		if ($present === false) frontcontrollerx::json_failure('FAILED');
		
		xredaktor_log::add('',0,0,'LOGIN',"User ".$present['wz_id'].": RELOAD");
			
		frontcontrollerx::json_success(array('bootstrap'=>'/xgo/xplugs/xredaktor/media/js/bootstrap/x.js','_SERVER'=>$_SERVER,'settings'=>xredaktor_defaults::getWorkBenchSettings()));
	}

	public static function checkUserAccessViaLoginForm($user,$pass)
	{
		libx::turnOnErrorReporting();

		$present = xredaktor_fe::wQueryViaVID(1000,array(
		"MD5(wz_u_username)"	=> $user,
		"wz_u_password" 		=> $pass
		));

		if ($present === false) frontcontrollerx::json_failure('FAILED');

		$_SERVER['REMOTE_USER'] = $_SERVER['PHP_AUTH_USER'] 	= $user;
		//$_SERVER['PHP_AUTH_PW']		= $pass;

		xredaktor_log::add('',0,0,'LOGIN',"User ".$present['wz_id'].": LOGIN");
		
		
		frontcontrollerx::json_success(array('bootstrap'=>'/xgo/xplugs/xredaktor/media/js/bootstrap/x.js','settings'=>xredaktor_defaults::getWorkBenchSettings()));
	}

	public static function updateSecurity()
	{
	
		$allActiveUsers 	= xredaktor_fe::wGetAllViaVID(1000);
		if (!is_array($allActiveUsers)) $allActiveUsers = array();



		$unsecureDirs		= array();
		$unsecureDirs[]		= realpath(dirname(__FILE__).'/../../../../xgo/xframe/libs').'/extjs';

		foreach ($unsecureDirs as $dir)
		{
			if (!is_dir($dir)) continue;
			secx::unProtect_dir($dir);
		}

		$dir2secure			= array();
		$dir2secure[] 		= (Ixcore::htdocsRoot_HTACCESS . '/xgo/xsplash/login');
		$dir2secure[] 		= (Ixcore::htdocsRoot_HTACCESS . '/xgo');
		$dir2secureLogout 	= (Ixcore::htdocsRoot_HTACCESS . '/xgo/xsplash/logout');

		$users = array();


		foreach ($allActiveUsers as $u)
		{
			$users[] = array('name'=>$u['wz_u_username'],'pwd'=>$u['wz_u_password']);
		}

		foreach ($dir2secure as $dir)
		{
			secx::protect_dir($dir,$dir,$users,Ixredaktor::xGoNameWithVersion ,true);
		}
		secx::protect_dir($dir2secureLogout,$dir2secureLogout,array(array('name'=>md5('logout'),'pwd'=>md5('logout'))), Ixredaktor::xGoNameWithVersion ,false);
		secx::unProtect_dir(Ixcore::htdocsRoot_HTACCESS . '/xgo/xsplash');
		secx::unProtect_dir(Ixcore::htdocsRoot_HTACCESS . '/xgo/xplugs/xredaktor/upload');

		secx::make_ajax_dir(Ixcore::htdocsRoot_HTACCESS . '/xgo/xplugs/xredaktor/ajax');

		@mkdir(Ixcore::htdocsRoot_HTACCESS . '/xgo/xplugs/xredaktor/smarty/atom_cache');
		@mkdir(Ixcore::htdocsRoot_HTACCESS . '/xgo/xplugs/xredaktor/smarty/psa_cache');
		@mkdir(Ixcore::htdocsRoot_HTACCESS . '/xgo/xcore/tmp');
		@mkdir(Ixcore::htdocsRoot_HTACCESS . '/xgo/xcore/logs');
		@mkdir(Ixcore::htdocsRoot_HTACCESS . '/xgo/xcore/tmp/cache');
		@mkdir(Ixcore::htdocsRoot_HTACCESS . '/xgo/xcore/tmp/smarty');

		
	}

	public static function flush_fe_sites_load_PRE()
	{
		$s_id = frontcontrollerx::getInt('s_id');
		if ($s_id === false) return;

		$allFe 		= dbx::queryAll("select * from fe_language where fel_del = 'N' ");
		if (!is_array($allFe)) $allFe = array();

		$allFeAssoz	= array();
		foreach ($allFe as $l)
		{
			$fel_id = $l['fel_id'];
			$allFeAssoz[$fel_id] = 1;
		}

		$current = dbx::queryAll("select * from sites_fe_languages where sfl_del = 'N' and sfl_s_id = '$s_id'");
		if (!is_array($current)) $current = array();

		$currentAssoz = array();
		foreach ($current as $l)
		{
			$sfl_fl_id = $l['sfl_fl_id'];
			$currentAssoz[$sfl_fl_id] = $l['sfl_id'];
			unset($allFeAssoz[$sfl_fl_id]);
		}

		foreach ($allFeAssoz as $missingFeLangId => $crap)
		{
			$sort = dbx::queryAttribute("select max(sfl_sort)+1 as maxxx from sites_fe_languages where sfl_s_id = '$s_id'",'maxxx');
			dbx::insert('sites_fe_languages',array('sfl_s_id'=>$s_id,'sfl_fl_id'=>$missingFeLangId));
		}

		$delFe = dbx::queryAll("select * from fe_language where fel_del = 'Y'");
		if (!is_array($delFe)) $delFe = array();

		foreach ($delFe as $l)
		{
			$fel_id = $l['fel_id'];;
			if (isset($currentAssoz[$fel_id])) {
				$sfl_id = $currentAssoz[$fel_id];
				dbx::update('sites_fe_languages',array('sfl_del'=>'Y','sfl_created'=>'NOW()'),array('sfl_id'=>$sfl_id));
			}
		}

	}

	public static function flush_be_sites_load_PRE()
	{
		$s_id = frontcontrollerx::getInt('s_id');
		if ($s_id === false) return;

		$allFe 		= dbx::queryAll("select * from be_language where bel_del = 'N' ");
		if (!is_array($allFe)) $allFe = array();

		$allFeAssoz	= array();
		foreach ($allFe as $l)
		{
			$fel_id = $l['bel_id'];
			$allFeAssoz[$fel_id] = 1;
		}

		$current = dbx::queryAll("select * from sites_be_languages where sbl_del = 'N' and sbl_s_id = '$s_id'");
		if (!is_array($current)) $current = array();

		$currentAssoz = array();
		foreach ($current as $l)
		{
			$sfl_fl_id = $l['sbl_bl_id'];
			$currentAssoz[$sfl_fl_id] = $l['sbl_id'];
			unset($allFeAssoz[$sfl_fl_id]);
		}

		foreach ($allFeAssoz as $missingFeLangId => $crap)
		{
			$sort = dbx::queryAttribute("select max(sbl_sort)+1 as maxxx from sites_be_languages where sbl_s_id = '$s_id'",'maxxx');
			dbx::insert('sites_be_languages',array('sbl_s_id'=>$s_id,'sbl_bl_id'=>$missingFeLangId));
		}

		$delFe = dbx::queryAll("select * from be_language where bel_del = 'Y'");
		if (!is_array($delFe)) $delFe = array();


		foreach ($delFe as $l)
		{
			$fel_id = $l['bel_id'];;
			if (isset($currentAssoz[$fel_id])) {
				$sfl_id = $currentAssoz[$fel_id];
				dbx::update('sites_be_languages',array('sbl_del'=>'Y','sbl_created'=>'NOW()'),array('sbl_id'=>$sfl_id));
			}
		}

	}

	public static function flush_faces_sites_load_PRE()
	{
		$s_id = frontcontrollerx::getInt('s_id');
		if ($s_id === false) return;

		$allFe 		= dbx::queryAll("select * from faces where f_del = 'N' ");
		if (!is_array($allFe)) $allFe = array();

		$allFeAssoz	= array();
		foreach ($allFe as $l)
		{
			$fel_id = $l['f_id'];
			$allFeAssoz[$fel_id] = 1;
		}

		$current = dbx::queryAll("select * from sites_faces where sf_del = 'N' and sf_s_id = '$s_id'");
		if (!is_array($current)) $current = array();

		$currentAssoz = array();
		foreach ($current as $l)
		{
			$sfl_fl_id = $l['sf_f_id'];
			$currentAssoz[$sfl_fl_id] = $l['sf_id'];
			unset($allFeAssoz[$sfl_fl_id]);
		}

		foreach ($allFeAssoz as $missingFeLangId => $crap)
		{
			$sort = dbx::queryAttribute("select max(sf_sort)+1 as maxxx from sites_faces where sf_s_id = '$s_id'",'maxxx');
			dbx::insert('sites_faces',array('sf_s_id'=>$s_id,'sf_f_id'=>$missingFeLangId));
		}

		$delFe = dbx::queryAll("select * from faces where f_del = 'Y'");
		if (!is_array($delFe)) $delFe = array();


		foreach ($delFe as $l)
		{
			$fel_id = $l['f_id'];;
			if (isset($currentAssoz[$fel_id])) {
				$sfl_id = $currentAssoz[$fel_id];
				dbx::update('sites_faces',array('sf_del'=>'Y','sf_created'=>'NOW()'),array('sf_id'=>$sfl_id));
			}
		}

	}

	public static function tag_fe_insert_PRE($data)
	{
		//if (!isset($data['fet_tag'])) return $data;
		if (trim($data['fet_tag'])=="")
		{
			$data['fet_tag'] = md5(time());
		}
		$data['fet_tag_md5'] = md5($data['fet_tag']);
		return $data;
	}

	public static function tag_fe_update_PRE($id, $data)
	{
		if (!isset($data['fet_tag'])) return $data;
		$data['fet_tag_md5'] = md5($data['fet_tag']);
		return $data;
	}

	public static function tag_be_insert_PRE($data)
	{
		if (!isset($data['bet_tag'])) return $data;
		if (trim($data['bet_tag'])=="")
		{
			$data['bet_tag'] = md5(time());
		}
		$data['bet_tag_md5'] = md5($data['bet_tag']);
		return $data;
	}

	public static function tag_be_update_PRE($id, $data)
	{
		if (!isset($data['bet_tag'])) return $data;
		$data['bet_tag_md5'] = md5($data['bet_tag']);
		return $data;
	}

	public static function getValidBELangsFromDB()
	{
		$langs = dbx::queryAll("select * from be_language where bel_del = 'N'");
		if ($langs === false) $langs = array();
		$ret = array();
		foreach ($langs as $l)
		{
			$ret[] = strtoupper($l['bel_ISO']);
		}
		return $ret;
	}

	public static function getActivatedBELangsFromDB()
	{
		$langs = dbx::queryAll("select * from be_language where bel_del = 'N' and bel_online = 'Y'");
		if ($langs === false) $langs = array();
		$ret = array();
		foreach ($langs as $l)
		{
			$ret[] = strtoupper($l['bel_ISO']);
		}
		return $ret;
	}

	public static function getValidFELangsFromDB()
	{
		$langs = dbx::queryAll("select * from fe_language where fel_del = 'N'");
		if ($langs === false) $langs = array();
		$ret = array();
		foreach ($langs as $l)
		{
			$ret[] = strtoupper($l['fel_ISO']);
		}
		return $ret;
	}

	public static function getActivatedFELangsFromDB()
	{
		$langs = dbx::queryAll("select * from fe_language where fel_del = 'N' and fel_online = 'Y'");
		if ($langs === false) $langs = array();
		$ret = array();
		foreach ($langs as $l)
		{
			$ret[] = strtoupper($l['fel_ISO']);
		}
		return $ret;
	}

	public static function getDefaultBELang()
	{
		return array('DE');
	}

	/********************************************************************/
	/**********************    BACK END LANGS    ************************/
	/********************************************************************/


	public static function lang_be_update_PRE($bel_id,$data)
	{
		$bel_ISO = $data['bel_ISO'];
		if (strlen($bel_ISO)>2)
		{
			return false;
		}
		return true;
	}

	public static function lang_be_update_POST($id,$newDataRecord,$oldDataRecord)
	{
		$oldName = strtolower($oldDataRecord['bel_ISO']);
		$newName = strtolower($newDataRecord['bel_ISO']);

		if ($newName == "") return false;
		if ((strlen($oldName)>2)||(strlen($newName)>2)) {
			return false;
		}

		$oldName = dbx::escape($oldName);
		$newName = dbx::escape($newName);

		$blackListedNames = array('de','en','ru','fr','it','ro');
		$blackListedNames = array();

		if (in_array($newName,$blackListedNames)) return true;
		if (in_array($oldName,$blackListedNames)) return true;


		/********************************************************************/
		/**********************    ALTER THE TABLES  ************************/
		/********************************************************************/

		$alterCmds = array(
		//               ATOMS
		array(
		'after'			=> 'a_name',
		'table'			=> 'atoms',
		'oldName' 		=> $oldName,
		'newName' 		=> $newName,
		'oldAttrib' 	=> 'a_name_'.$oldName,
		'newAttrib' 	=> 'a_name_'.$newName,
		),
		//               PAGES
		array(
		'after'			=> 'p_name',
		'table'			=> 'pages',
		'oldName' 		=> $oldName,
		'newName' 		=> $newName,
		'oldAttrib' 	=> 'p_name_'.$oldName,
		'newAttrib' 	=> 'p_name_'.$newName,
		),
		//               NICE
		array(
		'after'			=> 'p_nice',
		'table'			=> 'pages',
		'oldName' 		=> $oldName,
		'newName' 		=> $newName,
		'oldAttrib' 	=> 'p_nice_'.$oldName,
		'newAttrib' 	=> 'p_nice_'.$newName,
		),
		//               ATOMS-SETTINGS
		array(
		'after'			=> 'as_name',
		'table'			=> 'atoms_settings',
		'oldName' 		=> $oldName,
		'newName' 		=> $newName,
		'oldAttrib' 	=> 'as_name_'.$oldName,
		'newAttrib' 	=> 'as_name_'.$newName,
		),
		array(
		'after'			=> 'sys_t_de',
		'table'			=> 'sys_tags',
		'oldName' 		=> $oldName,
		'newName' 		=> $newName,
		'oldAttrib' 	=> 'sys_t_'.$oldName,
		'newAttrib' 	=> 'sys_t_'.$newName,
		),
		);

		foreach ($alterCmds as $sett)
		{

			$after  	= $sett['after'];
			$table  	= $sett['table'];
			$oldName	= $sett['oldName'];
			$newName	= $sett['newName'];
			$oldAttrib	= $sett['oldAttrib'];
			$newAttrib	= $sett['newAttrib'];

			if (($oldName != $newName) && ($oldName != "") && ($newName != ""))
			{
				if (dbx::attributePresent($table,$oldAttrib)&&!dbx::attributePresent($table,$newAttrib)) {
					$sql = "ALTER TABLE  `$table` CHANGE  `$oldAttrib` `$newAttrib` TINYTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL";
					//frontcontrollerx::json_debug($sql);
					dbx::query($sql);
				}
			}

			if (!dbx::attributePresent($table,$newAttrib))
			{
				$sql = "ALTER TABLE  `$table` ADD  `$newAttrib` TINYTEXT NOT NULL AFTER `$after`";
				//frontcontrollerx::json_debug($sql);
				dbx::query($sql);
			}
		}
		return true;
	}


	/********************************************************************/
	/**********************    FRONT END LANGS    ***********************/
	/********************************************************************/

	public static function lang_fe_update_PRE($fel_id,$data)
	{
		$bel_ISO = $data['fel_ISO'];
		if (strlen($bel_ISO)>2)
		{
			return false;
		}
		return true;
	}

	public static function lang_fe_update_POST($id,$newDataRecord,$oldDataRecord)
	{
		$oldName = strtolower($oldDataRecord['fel_ISO']);
		$newName = strtolower($newDataRecord['fel_ISO']);

		if ($newName == "") return false;
		if ((strlen($oldName)>2)||(strlen($newName)>2)) {
			return false;
		}

		$oldName = dbx::escape($oldName);
		$newName = dbx::escape($newName);

		$blackListedNames = array('de','en','ru','fr','it','ro');
		$blackListedNames = array();

		if (in_array($newName,$blackListedNames)) return true;
		if (in_array($oldName,$blackListedNames)) return true;


		/********************************************************************/
		/**********************    ALTER THE TABLES  ************************/
		/********************************************************************/

		$alterCmds = array(
		//               FE-TAGS
		array(
		'after'			=> 'fet_t_de',
		'table'			=> 'fe_tags',
		'oldName' 		=> $oldName,
		'newName' 		=> $newName,
		'oldAttrib' 	=> 'fet_t_'.$oldName,
		'newAttrib' 	=> 'fet_t_'.$newName,
		),
		//               NICE
		array(
		'after'			=> 'p_nice',
		'table'			=> 'pages',
		'oldName' 		=> $oldName,
		'newName' 		=> $newName,
		'oldAttrib' 	=> 'p_nice_'.$oldName,
		'newAttrib' 	=> 'p_nice_'.$newName,
		),
		//               PAGES
		array(
		'after'			=> 'p_name',
		'table'			=> 'pages',
		'oldName' 		=> $oldName,
		'newName' 		=> $newName,
		'oldAttrib' 	=> 'p_name_'.$oldName,
		'newAttrib' 	=> 'p_name_'.$newName,
		),
		//               STORAGE
		array(
		'after'			=> 's_name',
		'table'			=> 'storage',
		'oldName' 		=> $oldName,
		'newName' 		=> $newName,
		'oldAttrib' 	=> 's_name_'.$oldName,
		'newAttrib' 	=> 's_name_'.$newName,
		),
		//               STORAGEGROUP
		array(
		'after'			=> 'sg_name',
		'table'			=> 'storage_groups',
		'oldName' 		=> $oldName,
		'newName' 		=> $newName,
		'oldAttrib' 	=> 'sg_name_'.$oldName,
		'newAttrib' 	=> 'sg_name_'.$newName,
		),
		);

		foreach ($alterCmds as $sett)
		{

			$after  	= $sett['after'];
			$table  	= $sett['table'];
			$oldName	= $sett['oldName'];
			$newName	= $sett['newName'];
			$oldAttrib	= $sett['oldAttrib'];
			$newAttrib	= $sett['newAttrib'];

			if (($oldName != $newName) && ($oldName != "") && ($newName != ""))
			{
				if (dbx::attributePresent($table,$oldAttrib)&&!dbx::attributePresent($table,$newAttrib)) {
					$sql = "ALTER TABLE  `$table` CHANGE  `$oldAttrib` `$newAttrib` TINYTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL";
					//frontcontrollerx::json_debug($sql);
					dbx::query($sql);
				}
			}

			if (!dbx::attributePresent($table,$newAttrib))
			{
				$sql = "ALTER TABLE  `$table` ADD  `$newAttrib` TINYTEXT NOT NULL AFTER `$after`";
				//frontcontrollerx::json_debug($sql);
				dbx::query($sql);
			}
		}
		return true;
	}

}