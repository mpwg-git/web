<?

class xredaktor_feUser
{

	/*****************************************************************************************
	* CONFIG START
	*/

	private static $sessionName_FEUSER 					= 'xredaktor_feUser_wsf';
	private static $siteCallAfterLogin					= "fe_user::afterLogin";
	private static $siteCallAfterRegister				= "fe_user::afterRegistration";
	private static $siteCallAfterSave					= "";
	private static $wzId 								= 707;

	private static $page_login							= 6;
	private static $page_account						= 7;
	private static $page_resendToken					= 26;
	private static $page_resetPwd						= 25;
	private static $page_errorDuplicateEmail			= 24;
	private static $page_checkToken						= 27;

	private static $mailPage_welcomeWithToken			= 21;
	private static $mailPage_welcomeWithToken_subject	= "Registrierung auf MeinePerfekteWG";
	private static $mailPage_resetPwdWithToken			= 22;
	private static $mailPage_resetPwdWithToken_subject	= "Passwort MeinePerfekteWG neu setzen";
	private static $MAIL_FROM_NAME						= "MeinePerfekteWG";
	private static $MAIL_FROM_EMAIL						= "hello@meineperfektewg.com";

	private static $userState_notChecked	= -1;
	private static $userState_notFound		= 0;
	private static $userState_mailCheck		= 1;
	private static $userState_deleted		= 2;
	private static $userState_ok			= 3;

	private static $userField_type 			= "wz_GESCHLECHT";
	private static $userField_firstName 	= "wz_VORNAME";
	private static $userField_LastName 		= "wz_NACHNAME";
	private static $userField_eMail 		= "wz_EMAIL";
	private static $userField_userName		= "wz_EMAIL";
	private static $userField_userPassword	= "wz_PASSWORT";
	private static $userField_userToken		= "wz_MAIL_TOKEN";
	private static $userField_userConfirmed = "wz_MAIL_CHECKED";
	private static $userField_pwdToken 		= "wz_PWD_TOKEN";

	private static $initFieldsDone = true;

	/*
	* CONFIG END
	******************************************************************************************/

	public static function getPrivateStatic($settingName)
	{
		// usage: xredaktor_feUser::getPrivateStatic('sessionName_FEUSER');
		if (isset(self::$$settingName)) {
			return self::$$settingName;
		} 
		return false;
	}
	
	public static function sc_get_fe_user_session_keyname()
	{
		return self::getPrivateStatic('sessionName_FEUSER');
	}

	public static function initSettings()
	{

		if (self::$initFieldsDone) return false;
		self::$initFieldsDone = true;

		$lang = '_'.strtoupper(xredaktor_pages::getFrontEndLang()).'_';
		
		$mappers = array(
		'wz_WIZARD_ID' 							=> 'wzId',
		'wz_SESSION_NAME' 						=> 'sessionName_FEUSER',
		'wz_AFTER_LOGIN_FN' 					=> 'siteCallAfterLogin',
		'wz_AFTER_SAVE_FN' 						=> 'siteCallAfterSave',
		'wz_AFTER_REGISTER_FN' 					=> 'siteCallAfterRegister',
		'wz_PAGE_LOGIN' 						=> 'page_login',
		'wz_PAGE_ACCOUNT' 						=> 'page_account',
		'wz_PAGE_RESEND_TOKEN' 					=> 'page_resendToken',
		'wz_PAGE_RESEND_PWD' 					=> 'page_resetPwd',
		'wz_PAGE_ERROR_DUPLICATE_EMAIL' 		=> 'page_errorDuplicateEmail',
		'wz_PAGE_CHECK_TOKEN' 					=> 'page_checkToken',
		'wz_MAIL_WELCOME_WITH_TOKEN'			=> 'mailPage_welcomeWithToken',
		$lang.'wz_MAIL_WELCOME_WITH_TOKEN_SUBJECT' 	=> 'mailPage_welcomeWithToken_subject',
		'wz_MAIL_RESET_WITH_TOKEN' 				=> 'mailPage_resetPwdWithToken',
		$lang.'wz_MAIL_RESET_WITH_TOKEN_SUBJECT'		=> 'mailPage_resetPwdWithToken_subject',
		'wz_FIELD_TYPE' 						=> 'userField_type',
		'wz_FIELD_NAME_FIRST' 					=> 'userField_firstName',
		'wz_FIELD_NAME_LAST' 					=> 'userField_LastName',
		'wz_FIELD_EMAIL' 						=> 'userField_eMail',
		'wz_FIELD_UNAME' 						=> 'userField_userName',
		'wz_FIELD_UPASSWORD' 					=> 'userField_userPassword',
		'wz_FIELD_CONFIRMED_TOKEN' 				=> 'userField_userToken',
		'wz_FIELD_CONFIRMED' 					=> 'userField_userConfirmed',
		'wz_FIELD_PWDTOKEN' 					=> 'userField_pwdToken',
		'wz_MAIL_FROM_EMAIL' 					=> 'MAIL_FROM_EMAIL',
		'wz_MAIL_FROM_NAME' 					=> 'MAIL_FROM_NAME',
		);

		$sideId 	= xredaktor_niceurl::getSiteIdViaHttpHost();
		$dataConfig = xredaktor_fe::wQueryViaVID(5000,array('wz_SITE_ID'=>$sideId));
		$instance 	= self;

		foreach ($mappers as $db_k => $php_k)
		{
			self::$$php_k = $dataConfig[$db_k];
		}

		return true;
	}

	public static function getTableName()
	{
		self::initSettings();
		return xredaktor_wizards::genWizardTableNameBy_a_id(self::$wzId);
	}

	public static function handleSmartyCall($params,&$template)
	{
		@session_start();
		self::initSettings();

		$ret			= array();
		switch (strtolower($params['action']))
		{
			case 'isloggedin':
				$ret = self::isLoggedIn($params);
				break;
			case 'getuserinfo':
				$ret = self::getUserInfo($params);
				break;
			case 'dologin':
				$ret = self::doLogin($params);
				break;
			case 'dologout':
				$ret = self::doLogout($params);
				break;
			case 'finishinternalregistration':
				$ret = self::finishInternalRegistration($params);
				break;
			case 'finishexternalregistration':
				$ret = self::finishExternalRegistration($params);
				break;
			case 'resendregistration':
				$ret = self::resendRegistration($params);
				break;
			case 'resetpassword':
				$ret = self::resetPassword($params);
				break;
			case 'saveaccount':
				$ret = self::saveAccount($params);
				break;
			default: break;
		}

		if (isset($params['var']))
		{
			$template->assign($params['var'],$ret);
		}
	}

	public static function refreshUserdata($userId)
	{
		$userId = intval($userId);
		if ($userId == 0) return false;
		
		$freshUserData = dbx::query("SELECT * FROM wizard_auto_707 WHERE wz_id = $userId");
		if ($freshUserData === false || !is_array($freshUserData)) return false;
		
		self::setSessionData($freshUserData);
	}
	
	private static function setSessionData($d)
	{
		@session_start();
		self::initSettings();
		$_SESSION[self::$sessionName_FEUSER] = $d;
	}

	private static function getSessionData()
	{
		@session_start();
		self::initSettings();
		if (!isset($_SESSION[self::$sessionName_FEUSER])) 		return false;
		if (!is_array($_SESSION[self::$sessionName_FEUSER])) 	return false;
		$d = $_SESSION[self::$sessionName_FEUSER];
		return $d;
	}

	public static function isLoggedIn($params=false)
	{
		$d = self::getSessionData();
		if ($d === false) 			return false;
		if (!isset($d['wz_id'])) 	return false;
		return (is_numeric($d['wz_id']));
	}

	public static function getUserId($params=false)
	{
		$d = self::getSessionData();
		if ($d === false) 			return false;
		if (!isset($d['wz_id'])) 	return false;
		return intval($d['wz_id']);
	}

	public static function getUserInfo($params=false)
	{
		return self::getSessionData();
	}

	private static function reDirect($state, $email = false)
	{
		switch ($state)
		{
			case (self::$userState_ok):

				if (self::$siteCallAfterLogin != "")
				{
					$url = frontcontrollerx::safeCallUserFunction(self::$siteCallAfterLogin);
				}

				if ($url != "")
				{
					header("Location: ".$url);
					die();
				} else 
				{
					header("Location: ".xredaktor_niceurl::genUrl(array('p_id'=>self::$page_account)));
				}
				break;
				
			case (self::$userState_mailCheck):
				header("Location: ".xredaktor_niceurl::genUrl(array('p_id'=>self::$page_resendToken)) . ($email ? '?m=' . $email : '') );
				break;
			default: die('MISSCONIFG');
		}
		die();
	}

	private static function reDirectByPageId($p_id)
	{
		header("Location: ".xredaktor_niceurl::genUrl(array('p_id'=>$p_id)));
		die();
	}

	public static function doLogin($params)
	{
		self::initSettings();
		
		/*
		if (libx::isDeveloper())
		{
			
			$t = self::getTableName();
			$u = dbx::escape($_REQUEST[self::$userField_userName]);
			
			
			$u = strtolower($u);
			
			$present = dbx::query("select * from $t where LOWER(wz_EMAIL) = '$u' and wz_online = 'Y' and wz_del='N'");
			
			if ($present === false) return array('state'=>self::$userState_notFound);
	
			self::setSessionData($present);
			self::reDirect(self::$userState_ok);
	
			die();
			
		}
		*/
		
		if ((!isset($params['triggerByVar'])) || (!isset($params['triggerByVal']))) return array('state'=>self::$userState_notChecked);
		if ($_REQUEST[$params['triggerByVar']] != $params['triggerByVal']) 			return array('state'=>self::$userState_notChecked);

		$t = self::getTableName();
		$u = dbx::escape($_REQUEST[self::$userField_userName]);
		$p = dbx::escape($_REQUEST[self::$userField_userPassword]);
		
		$u = strtolower($u);
		
		$present = dbx::query("select * from $t where LOWER(wz_EMAIL) = '$u' and wz_PASSWORT = MD5('$p') and wz_online = 'Y' and wz_del='N'");
		
		if ($present === false) return array('state'=>self::$userState_notFound);
		
		// fix auf Wunsch von Michi => User kann einloggen, aber wz_AVTIVE = false
		//if ($present[self::$userField_userConfirmed] != 'Y') self::reDirect(self::$userState_mailCheck, $_REQUEST[self::$userField_userName]);
		self::setSessionData($present);
		self::reDirect(self::$userState_ok);

		die();
	}

	public static function doLogout($params)
	{
		self::setSessionData(false);
	}

	public static function getUserRecordById($userId)
	{
		$userId = intval($userId);
		$table 	= self::getTableName();
		$u 		= dbx::query("select * from $table where wz_id = $userId");
		return $u;
	}

	public static function getUserRecordByEMail($email)
	{
		$email 		= dbx::escape(trim($email));
		
		$email		= strtolower($email);
		
		$table 		= self::getTableName();
		$fieldEmail = self::$userField_eMail;
		$u 			= dbx::query("select * from $table where LOWER($fieldEmail) = '$email' and wz_del='N' and wz_online='Y'");
		
		return $u;
	}

	public static function getUserRecordByToken($token)
	{
		$token 		= dbx::escape(trim($token));
		$table 		= self::getTableName();
		$tokenField = self::$userField_userToken;
		$u 			= dbx::query("select * from $table where $tokenField = '$token'");
		return $u;
	}

	public static function getUserRecordByPwdResetToken($token)
	{
		$token 		= dbx::escape(trim($token));
		$table 		= self::getTableName();
		$tokenField = self::$userField_pwdToken;
		$u 			= dbx::query("select * from $table where $tokenField = '$token'");
		return $u;
	}

	public static function getNameBy($userId, $vornameOnly = false)
	{
		$u = self::getUserRecordById($userId);

		$name_first = trim($u[self::$userField_firstName]);

		if ($vornameOnly == true)
		{
			return $name_first;
		}
		
		$name_type	= trim($u[self::$userField_type]);
		$name_last 	= trim($u[self::$userField_LastName]);

		$fail_man 		= "Sehr geehrter Kunde";
		$fail_woman 	= "Sehr geehrte Kundin";
		$fail_company 	= "Sehr geehrte Firma";
		$fail_family	= "Sehr geehrte Famile";

		switch ($name_type)
		{
			case 0: // man
			if ($name_last == "") return $fail_man;
			return "Sehr geehrter Herr $name_last";
			break;
			case 1: // woman
			if ($name_last == "") return $fail_woman;
			return "Sehr geehrte Frau $name_last";
			break;
			case 2: // company
			if ($name_last == "") return $fail_company;
			return "Sehr geehrte Firma $name_last";
			break;
			case 3: // family
			if ($name_last == "") return $fail_family;
			return "Sehr geehrte Familie $name_last";
			break;
			default: break;
		}
		return "$fail_woman / $fail_man";
	}

	public static function isEmailAlreadyRegistered($email)
	{
		$table			= self::getTableName();
		$field_email	= self::$userField_eMail;
		$email 			= dbx::escape(trim($email));
		
		$email			= strtolower($email);
		
		$emailCnt 		= dbx::queryAttribute("select count(wz_id) as emailCnt from $table where LOWER($field_email) = '$email' and wz_del='N'",'emailCnt');
		return ($emailCnt >= 1);
	}

	public static function isEmailAlreadyRegisteredCnt($email)
	{
		$table			= self::getTableName();
		$field_email	= self::$userField_eMail;
		$email 			= dbx::escape(trim($email));
		
		$email			= strtolower($email);
		
		$emailCnt 		= dbx::queryAttribute("select count(wz_id) as emailCnt from $table where LOWER($field_email) = '$email' and wz_del='N'",'emailCnt');
		return $emailCnt;
	}

	private static function genUserTokenById($wz_id)
	{
		return md5($wz_id).''.$wz_id.'_'.md5(time());
	}

	private static function sendTokenMail($wz_id,$subject=false,$params=false) {

		$u 			= self::getUserRecordById($wz_id);
		$subject 	= self::$mailPage_welcomeWithToken_subject;
		$token		= $u[self::$userField_userToken];

		$replacers = array(
		'###BLOCK_NAME###' 	=> self::getNameBy($wz_id),
		'###VORNAME###' 	=> self::getNameBy($wz_id, true),
		'###LINK###' 		=> 'http://'.$_SERVER['HTTP_HOST'].''.xredaktor_niceurl::genUrl(array('p_id'=>self::$page_checkToken)).'?t='.$token
		);

		$html 			= "";
		$send2 			= array();

		$customerMail	= trim($u[self::$userField_eMail]);

		if ($customerMail != "") {
			$send2[] = $customerMail;
		}

		$mailSettings = xredaktor_niceurl::getSiteConfigViaPageId(self::$mailPage_welcomeWithToken);

		if (count($send2)>0)
		{
			$html = xredaktor_render::renderPage(self::$mailPage_welcomeWithToken,true);

			$_s = array();
			$_r = array();

			foreach ($replacers as $k=>$v)
			{
				$_s[] = $k;
				$_r[] = $v;
			}

			$html 		= str_replace($_s,$_r,$html);
			$storage 	= dirname(xredaktor_storage::getDirOfStorageScope($mailSettings['s_s_storage_scope']));

			$s_mail_from_name 	= $mailSettings['s_mail_from_name'];
			$s_mail_from_email 	= $mailSettings['s_mail_from_email'];
			$s_mail_smtp_server = $mailSettings['s_mail_smtp_server'];
			$s_mail_smtp_user 	= $mailSettings['s_mail_smtp_user'];
			$s_mail_smtp_pwd 	= $mailSettings['s_mail_smtp_pwd'];

			if (isset($params['s_mail_smtp_server']))
			{
				$s_mail_reply_name 	= $params['s_mail_reply_name'];
				$s_mail_reply_email = $params['s_mail_reply_email'];
				$s_mail_from_name 	= $params['s_mail_from_name'];
				$s_mail_from_email 	= $params['s_mail_from_email'];
				$s_mail_smtp_server = $params['s_mail_smtp_server'];
				$s_mail_smtp_user 	= $params['s_mail_smtp_user'];
				$s_mail_smtp_pwd 	= $params['s_mail_smtp_pwd'];
			}

			if (trim($s_mail_reply_name) == "") 	$s_mail_reply_name 	= $s_mail_from_name;
			if (trim($s_mail_reply_email) == "") 	$s_mail_reply_email = $s_mail_from_email;

			foreach ($send2 as $to)
			{
				$mailCfg = array(
				'to'						=> array('email' => $to, 'name'=>$to),
				'from'						=> array('email' => self::getFromMail_EMAIL($mailSettings),	'name' => self::getFromMail_NAME($mailSettings)),
				'reply'						=> array('email' => self::getFromMail_EMAIL($mailSettings),	'name' => self::getFromMail_NAME($mailSettings)),
				'bcc' 						=> array('email' => 'xgo@pixelfarmers.at', 	'name' => 'xgo@pixelfarmers.at'),
				'html'						=> $html,
				'txt'						=> '',
				'subject'					=> $subject,
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
					$error = mailx::sendMailGetLastError();
					if (libx::isDeveloper())
					{
						echo "<b>Mail konnte nicht an ($to) geschickt werden.</b>";
						echo "<pre>\n$error</pre>";
						echo "<pre>".print_r($mailCfg['smtp_settings'],true).'</pre>';
					}

					return false;

				} else
				{
					return true;
				}
			}
		}

	}

	public static function getFromMail_EMAIL($mailSettings)
	{
		$email = trim(self::$MAIL_FROM_EMAIL);

		if ($email == "")
		{
			$email = trim($mailSettings['s_mail_from_email']);
		}

		if ($email == "")
		{
			$email = Ixcore::REPORTING_USE_MAIL_FROM;
		}

		return $email;
	}

	public static function getFromMail_NAME($mailSettings)
	{
		$name = trim(self::$MAIL_FROM_NAME);

		if ($name == "")
		{
			$name = trim($mailSettings['s_mail_from_name']);
		}

		if ($name == "")
		{
			$name = Ixcore::REPORTING_USE_MAIL_FROM;
		}

		return $name;
	}


	private static function sendPwdMail($wz_id,$subject=false,$params=false) {

		$u 			= self::getUserRecordById($wz_id);
		$subject 	= self::$mailPage_resetPwdWithToken_subject;
		$token		= $u[self::$userField_pwdToken];

		$replacers = array(
		'###BLOCK_NAME###' 	=> self::getNameBy($wz_id),
		'###VORNAME###' 	=> self::getNameBy($wz_id, true),
		'###LINK###' 		=> 'http://'.$_SERVER['HTTP_HOST'].''.xredaktor_niceurl::genUrl(array('p_id'=>self::$page_resetPwd)).'?t='.$token
		);

		$html 			= "";
		$send2 			= array();

		$customerMail	= trim($u[self::$userField_eMail]);

		if ($customerMail != "") {
			$send2[] = $customerMail;
		}

		$mailSettings = xredaktor_niceurl::getSiteConfigViaPageId(self::$mailPage_resetPwdWithToken);

		if (count($send2)>0)
		{
			$html = xredaktor_render::renderPage(self::$mailPage_resetPwdWithToken,true);

			$_s = array();
			$_r = array();

			foreach ($replacers as $k=>$v)
			{
				$_s[] = $k;
				$_r[] = $v;
			}

			$html 		= str_replace($_s,$_r,$html);
			$storage 	= dirname(xredaktor_storage::getDirOfStorageScope($mailSettings['s_s_storage_scope']));

			$s_mail_from_name 	= $mailSettings['s_mail_from_name'];
			$s_mail_from_email 	= $mailSettings['s_mail_from_email'];
			$s_mail_smtp_server = $mailSettings['s_mail_smtp_server'];
			$s_mail_smtp_user 	= $mailSettings['s_mail_smtp_user'];
			$s_mail_smtp_pwd 	= $mailSettings['s_mail_smtp_pwd'];

			if (isset($params['s_mail_smtp_server']))
			{
				$s_mail_reply_name 	= $params['s_mail_reply_name'];
				$s_mail_reply_email = $params['s_mail_reply_email'];
				$s_mail_from_name 	= $params['s_mail_from_name'];
				$s_mail_from_email 	= $params['s_mail_from_email'];
				$s_mail_smtp_server = $params['s_mail_smtp_server'];
				$s_mail_smtp_user 	= $params['s_mail_smtp_user'];
				$s_mail_smtp_pwd 	= $params['s_mail_smtp_pwd'];
			}

			if (trim($s_mail_reply_name) == "") 	$s_mail_reply_name 	= $s_mail_from_name;
			if (trim($s_mail_reply_email) == "") 	$s_mail_reply_email = $s_mail_from_email;

			foreach ($send2 as $to)
			{
				$mailCfg = array(
				'to'						=> array('email' => $to, 'name'=>$to),
				'from'						=> array('email' => self::getFromMail_EMAIL($mailSettings),	'name' => self::getFromMail_NAME($mailSettings)),
				'reply'						=> array('email' => self::getFromMail_EMAIL($mailSettings),	'name' => self::getFromMail_NAME($mailSettings)),
				'bcc' 						=> array('email' => 'xgo@pixelfarmers.at', 'name' => 'xgo@pixelfarmers.at'),
				'html'						=> $html,
				'txt'						=> '',
				'subject'					=> $subject,
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
					$error = mailx::sendMailGetLastError();
					if (libx::isDeveloper())
					{
						echo "<b>Mail konnte nicht an ($to) geschickt werden.</b>";
						echo "<pre>\n$error</pre>";
						echo "<pre>".print_r($mailCfg['smtp_settings'],true).'</pre>';
					}

					return false;

				} else
				{
					return true;
				}
			}
		}

	}


	public static function burnMail($wz_id,$pageId,$subject='',$replacersExtra=false,$attachments=array()) {

		$u 			= self::getUserRecordById($wz_id);
		$token		= $u[self::$userField_pwdToken];

		$replacers = array(
		'###BLOCK_NAME###' 	=> self::getNameBy($wz_id),
		'###VORNAME###' 	=> self::getNameBy($wz_id, true),
		);

		$replacers = array_merge($replacers,$replacersExtra);

		$html 			= "";
		$send2 			= array();

		$customerMail	= trim($u[self::$userField_eMail]);

		if ($customerMail != "") {
			$send2[] = $customerMail;
		}

		$mailSettings = xredaktor_niceurl::getSiteConfigViaPageId($pageId);


		if (count($send2)>0)
		{

			$html = xredaktor_render::renderPage($pageId,true);

			$_s = array();
			$_r = array();

			foreach ($replacers as $k=>$v)
			{
				$_s[] = $k;
				$_r[] = $v;
			}


			$html 		= str_replace($_s,$_r,$html);
			$storage 	= dirname(xredaktor_storage::getDirOfStorageScope($mailSettings['s_s_storage_scope']));

			$s_mail_from_name 	= $mailSettings['s_mail_from_name'];
			$s_mail_from_email 	= $mailSettings['s_mail_from_email'];
			$s_mail_smtp_server = $mailSettings['s_mail_smtp_server'];
			$s_mail_smtp_user 	= $mailSettings['s_mail_smtp_user'];
			$s_mail_smtp_pwd 	= $mailSettings['s_mail_smtp_pwd'];

			if (trim($s_mail_reply_name) == "") 	$s_mail_reply_name 	= $s_mail_from_name;
			if (trim($s_mail_reply_email) == "") 	$s_mail_reply_email = $s_mail_from_email;

			foreach ($send2 as $to)
			{
				$mailCfg = array(
				'to'						=> array('email' => $to, 'name'=>$to),
				'from'						=> array('email' => self::getFromMail_EMAIL($mailSettings),	'name' => self::getFromMail_NAME($mailSettings)),
				'reply'						=> array('email' => self::getFromMail_EMAIL($mailSettings),	'name' => self::getFromMail_NAME($mailSettings)),
				'bcc' 						=> array('email' => 'xgo@pixelfarmers.at', 'name' => 'xgo@pixelfarmers.at'),
				'html'						=> $html,
				'txt'						=> '',
				'subject'					=> $subject,
				'attachment'				=> $attachments,
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
					$error = mailx::sendMailGetLastError();
					if (libx::isDeveloper())
					{
						echo "<b>Mail konnte nicht an ($to) geschickt werden.</b>";
						echo "<pre>\n$error</pre>";
						echo "<pre>".print_r($mailCfg['smtp_settings'],true).'</pre>';
					}

					return false;

				} else
				{
					return true;
				}
			}
		}

	}

	public static function finishInternalRegistration($params)
	{
		
		$_REQUEST['EMAIL'] = strtolower($_REQUEST['EMAIL']);
		
		$userRecord = xredaktor_wizards::processFrontEndForm(array(
		'db' => 1,
		'w_id'	=> self::$wzId
		));
		
		//fe_user::afterRegistration();
		
		if ($userRecord === false)
		{
			return array('status'=>'NO_USER_RECORD');
		}

		$wz_id 	= intval($userRecord['wz_id']);
		$token 	= self::genUserTokenById($wz_id);
		$user 	= self::getUserRecordById($wz_id);

		self::updateUserRecord($wz_id,array(self::$userField_userPassword=>md5($user[self::$userField_userPassword]),'wz_online'=>'Y',self::$userField_userToken=>$token,self::$userField_userConfirmed=>'N'));

		if (self::isEmailAlreadyRegisteredCnt($user[self::$userField_eMail])>1)
		{
			self::updateUserRecord($wz_id,array('wz_del'=>'Y'));
			self::reDirectByPageId(self::$page_errorDuplicateEmail);
		}

		if (self::$siteCallAfterRegister != "")
		{
					
			frontcontrollerx::safeCallUserFunction(self::$siteCallAfterRegister);
		}

		if (!self::sendTokenMail($wz_id,false,$params))
		{
			return array('status'=>'MAIL_NOK');
		} else
		{
			return array('status'=>'MAIL_OK');
		}
	}

	public static function finishExternalRegistration($params)
	{
		$status = 'NOK';
		$u 		= false;
		$t 		= dbx::escape(trim($_REQUEST['t']));

		if ($t != "")
		{
			$u = self::getUserRecordByToken($t);
			if ($u !== false) $status = 'OK';
			$uId = $u['wz_id'];
			//dbx::update(self::getTableName(),array(self::$userField_userToken=>'','wz_online'=>'Y',self::$userField_userConfirmed=>'Y'),array('wz_id'=>$uId));
			dbx::update(self::getTableName(),array(self::$userField_userToken=>'','wz_online'=>'Y',self::$userField_userConfirmed=>'Y','wz_ACTIVE'=>'Y'),array('wz_id'=>$uId));
		}

		return array('status'=>$status,'user'=>$u);
	}

	private static function updateUserRecord($wz_id,$data)
	{
		return dbx::update(self::getTableName(),$data,array('wz_id'=>$wz_id));
	}


	public static function resendRegistration($params)
	{
		if ((!isset($params['triggerByVar'])) || (!isset($params['triggerByVal']))) return array('status'=>'NOT_ACTIVATED','user'=>false);
		if ($_REQUEST[$params['triggerByVar']] != $params['triggerByVal']) 			return array('status'=>'NOT_ACTIVATED','user'=>false);

		$email = $_REQUEST['feuser_email'];
		
		$email = strtolower($email);

		if (self::isEmailAlreadyRegistered($email))
		{
			$u = self::getUserRecordByEMail($email);
			if ($u === false) return array('status'=>'USER_NOT_FOUND','user'=>false);

			$wz_id		= $u['wz_id'];
			$token 		= trim($u[self::$userField_userToken]);
			$uConfirmed = $u[self::$userField_userConfirmed];
			
			if ($uConfirmed == 'Y')
			{
				return array('status'=>'IS_ALREADY_CONFIRMED','user'=>$u);
			} else
			{
				if ($token == "")
				{
					$token = self::genUserTokenById($wz_id);
					self::updateUserRecord($wz_id,array(self::$userField_userToken=>$token));
				}
				self::sendTokenMail($wz_id);
				return array('status'=>'RESEND','user'=>$u);
			}
		} else
		{
			return array('status'=>'USER_NOT_FOUND','user'=>false);
		}
	}

	public static function resetPassword($params)
	{
		$t = trim($_REQUEST['t']);

		if ($t != "")
		{
			$u = self::getUserRecordByPwdResetToken($t);
			if ($u === false) return array('status'=>'TOKEN_NOT_FOUND','user'=>false);
			$wz_id	= $u['wz_id'];
			$password = libx::generateCode(8);
			self::updateUserRecord($wz_id,array(self::$userField_userPassword=>md5($password),self::$userField_pwdToken=>''));
			return array('status'=>'PWD_RESET_DONE','user'=>$u,'newPassword'=>$password);
		}

		if ((!isset($params['triggerByVar'])) || (!isset($params['triggerByVal']))) return array('status'=>'NOT_ACTIVATED','user'=>false);
		if ($_REQUEST[$params['triggerByVar']] != $params['triggerByVal']) 			return array('status'=>'NOT_ACTIVATED','user'=>false);

		$email = $_REQUEST['feuser_email'];
		
		$email = strtolower($email);
		
		if (self::isEmailAlreadyRegistered($email))
		{
			$u = self::getUserRecordByEMail($email);
			if ($u === false) return array('status'=>'USER_NOT_FOUND','user'=>false);
			$wz_id	= $u['wz_id'];
			$token 	= self::genUserTokenById($wz_id);
			self::updateUserRecord($wz_id,array(self::$userField_pwdToken=>$token));
			$state = self::sendPwdMail($wz_id);
			return array('status'=>'RESEND','user'=>$u);
		} else
		{
			return array('status'=>'USER_NOT_FOUND','user'=>false);
		}
	}


	public static function saveAccount($params)
	{
		if ((!isset($params['triggerByVar'])) || (!isset($params['triggerByVal']))) return array('status'=>'NOT_ACTIVATED','user'=>false);
		if ($_REQUEST[$params['triggerByVar']] != $params['triggerByVal']) 			return array('status'=>'NOT_ACTIVATED','user'=>false);
		if (!self::isLoggedIn()) 													return array('status'=>'NOT_LOGGED_IN','user'=>false);

		$u 		= self::getUserInfo();
		$wz_id 	= $u['wz_id'];

		if (!is_numeric($wz_id))													return array('status'=>'INTERNAL_ERROR','user'=>false);
		if ($u[self::$userField_userPassword] != md5($_REQUEST['currentPWD']))		return array('status'=>'CURRENT_PWD_WRONG','user'=>false);
		if (trim($_REQUEST['PASSWORT']) != '') {
			$_REQUEST['PASSWORT'] = md5($_REQUEST['PASSWORT']);
		} else {
			unset($_REQUEST['PASSWORT']);
		}

		$present = false;
		$present = xredaktor_wizards::processFrontEndFormUpdate(array('w_id'=>180,'r_id'=>$wz_id));
		if ($present === false)
		{
			return array('status' => 'ERROR_SAVING_DATA', 'user' => $u);
		}

		self::setSessionData($present);

		if (self::$siteCallAfterSave != "")
		{
			frontcontrollerx::safeCallUserFunction(self::$siteCallAfterSave);
		}

		return array('status' => 'UPDATED', 'user' => $u);

	}

}