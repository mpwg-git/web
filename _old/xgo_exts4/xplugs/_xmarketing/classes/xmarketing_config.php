<?
class xmarketing_config {

	public static function getAllSendConnectorsForPoppingNow($minutesNotPopped=15)
	{
		$minutesNotPopped = abs(intval($minutesNotPopped));
		if ($minutesNotPopped < 5) $minutesNotPopped = 5;
		$all = dbx::queryAll("select * from xm_send_connectors where xmsc_del='N' and xmsc_pop_active='Y' and (DATE_ADD(xmsc_last_popped,INTERVAL $minutesNotPopped MINUTE) < NOW() OR (xmsc_last_popped = '0000-00-00 00:00:00')) ORDER BY xmsc_last_popped ASC LIMIT 10");
		return $all;
	}

	public static function getSendConnectorById($xmsc_id)
	{
		$xmsc_id = xmarketing_security::safe_send_connectors_id($xmsc_id);
		$sc = dbx::query("select * from xm_send_connectors where xmsc_id=$xmsc_id");
		return $sc;
	}

	private static $cachedCurrentSiteId = false;

	public static function getCurrentSiteId()
	{
		return 1;
		// UPDATE FOR BT 
		
		if (self::$cachedCurrentSiteId !== false) return self::$cachedCurrentSiteId;

		$user = xredaktor_core::getUserSettings();
		$wz_xme_siteid = intval($user['wz_xme_siteid']);
		if ($wz_xme_siteid == 0) 
		{
			if (libx::isDeveloper())
			{
				echo "<pre>";
				print_r(debug_backtrace());
				echo "</pre>";
			}
			die('getCurrentSiteId:XXX');
		}
		self::$cachedCurrentSiteId = $wz_xme_siteid;

		return $wz_xme_siteid;
	}

	public static function getCurrentSiteIdStorage()
	{
		$s_id = intval(self::getCurrentSiteId());
		$site = dbx::query("select * from sites where s_id=$s_id");
		if ($site === false) die('getCurrentSiteIdStorage:XXX');
		$s_s_storage_scope = intval($site['s_s_storage_scope']);
		if ($s_s_storage_scope == 0) die('getCurrentSiteIdStorage:YYY');
		return $s_s_storage_scope;
	}

	public static function burnMail($storageId,$senderAccountId,$to_email,$to_name,$subject,$html,$mailHeaders=array(),$imageProcessing_type='embedd',$priority=3,$files=false)
	{
		$storage 	= dirname(xredaktor_storage::getDirOfStorageScope($storageId));
		$sender		= dbx::query("select * from xm_send_connectors where xmsc_id = $senderAccountId");

		if ($sender === false) {
			die('burnMail:INVALID burnMail-Settings:$sender');
			return false;
		}

		$s_mail_reply_name 	= trim($sender['xmsc_reply_name']);
		$s_mail_reply_email = trim($sender['xmsc_reply_mail']);
		$s_mail_from_name 	= trim($sender['xmsc_from_name']);
		$s_mail_from_email 	= trim($sender['xmsc_from_mail']);
		$s_mail_smtp_server = trim($sender['xmsc_smtp_host']);
		$s_mail_smtp_user 	= trim($sender['xmsc_smtp_user']);
		$s_mail_smtp_pwd 	= trim($sender['xmsc_smtp_pwd']);

		if (trim($s_mail_reply_name) == "") 	$s_mail_reply_name 	= $s_mail_from_name;
		if (trim($s_mail_reply_email) == "") 	$s_mail_reply_email = $s_mail_from_email;
		if ($to_name == "") 					$to_name = $to_email;


		$mailHeaders = xmarketing_security::generateHeaders($mailHeaders);


		$mailCfg = array(
		'to'						=> array('email' => $to_email,				'name' => $to_name),
		'from'						=> array('email' => $s_mail_from_email ,	'name' => $s_mail_from_name ),
		'reply'						=> array('email' => $s_mail_reply_email,	'name' => $s_mail_reply_name ),
		'html'						=> $html,
		'txt'						=> '',
		'subject'					=> $subject,
		'priority'					=> $priority,
		'imageProcessing' 			=> true,
		'imageProcessing_type' 		=> $imageProcessing_type,
		'imageProcessing_location' 	=> $storage,
		'headers'					=> $mailHeaders,
		'smtp_settings'				=> array(
		'smtp_server'	=> $s_mail_smtp_server,
		'smtp_user'		=> $s_mail_smtp_user,
		'smtp_pwd'		=> $s_mail_smtp_pwd,
		));
		
		
		// Files 
		if (trim($files) == "") $files = false;
		if ($files !== false) {
			
			$files 			= explode(";",trim($files));
			$files_finaly 	= array();
			
			foreach ($files as $fileId)
			{
				if (!is_numeric($fileId)) continue;
				
				$filex 		= xredaktor_storage::getById($fileId);
				$fileName 	= $filex['s_name'];
				$filePath 	= $filex['s_onDisk'];
				
				if (!file_exists($filePath)) continue;
				
				$files_finaly[] = array( $fileName => $filePath);
			}
			
			if (count($files_finaly) > 0) {
				$mailCfg['attachment'] = $files_finaly;
			}
			
		}
		

		return mailx::sendMail($mailCfg);
	}


	private static function testFireAccount($xmsc_id,$email)
	{
		$xmsc_id 	= intval($xmsc_id);
		$email 		= trim($email);
		if (($email == "") || ($xmsc_id == 0)) die('XXX - testFireAccount');

		$subject 	= "TEST-SUBJECT";
		$html 		= "TEST-KONFIGURATION";

		$state = self::burnMail(self::getCurrentSiteIdStorage(),$xmsc_id,$email,$email,$subject,$html);
		if ($state === false)
		{
			frontcontrollerx::json_failure(mailx::sendMailGetLastError());
		}
	}

	public static function config_faccounts($function)
	{

		switch ($function)
		{
			case 'checkAccount':

				$xmsc_id 	= xmarketing_security::safe_send_connectors_id($_REQUEST['xmsc_id']);
				$email		= $_REQUEST['email'];

				self::testFireAccount($xmsc_id,$email);
				frontcontrollerx::json_success();

				break;
			case 'getRecordById':
				$xmsc_id = xmarketing_security::safe_send_connectors_id($_REQUEST['xmsc_id']);
				if ($xmsc_id == 0) die('TTT');
				$d = dbx::query("select * from xm_send_connectors where xmsc_id = $xmsc_id");
				frontcontrollerx::json_success(array('record'=>$d));
				break;
			case 'updateRecord':
				$ret = array();

				$fields = array(
				'xmsc_reply_name',
				'xmsc_reply_mail',
				'xmsc_from_name',
				'xmsc_from_mail',
				'xmsc_smtp_limit_cnt',
				'xmsc_smtp_limit_time',
				'xmsc_smtp_pwd',
				'xmsc_smtp_user',
				'xmsc_smtp_host',
				'xmsc_pop_host',
				'xmsc_pop_user',
				'xmsc_pop_password',
				'xmsc_pop_active',
				);

				$xmsc_id = xmarketing_security::safe_send_connectors_id($_REQUEST['xmsc_id']);

				$db = array();
				foreach ($fields as $f)
				{
					$db[$f] = $_REQUEST[$f];
				}

				dbx::update('xm_send_connectors',$db,array('xmsc_id'=>$xmsc_id));

				$ret = array('r'=>$db);
				frontcontrollerx::json_success($ret);
				break;
			default: break;
		}

		$xmsc_s_id = self::getCurrentSiteId();

		$fields = array('xmsc_id','xmsc_lastmod','xmsc_lastmodBy','xmsc_sort','xmsc_created',
		'xmsc_name',
		'xmsc_smtp_host',
		'xmsc_smtp_user',
		'xmsc_smtp_pwd',
		'xmsc_smtp_limit_time',
		'xmsc_smtp_limit_cnt',
		);

		$update = array(
		'xmsc_name'
		);

		$string = $update;
		$int 	= array();

		$extFunctionsConfig = array(
		'table'		=> 'xm_send_connectors',
		'sort'		=> 'xmsc_sort',
		'pid'		=> 'xmsc_id',
		'fid'		=> 'xmsc_fid',
		'name'		=> 'xmsc_name',
		'del'		=> 'xmsc_del',

		'extraInsertFlyInt' => array(),
		'extraLoad'			=> "  xmsc_s_id = $xmsc_s_id ",
		'extraInsert' 		=> array('xmsc_created' => 'NOW()','xmsc_s_id'=>$xmsc_s_id),

		'fields'	=> $fields,
		'update'	=> $update,

		'normalize'	=> array(
		'string'	=> $string,
		'int'		=> $int
		),

		'postHooks' 		=> array(
		'insert'			=> 'xmarketing_emissions::handleEmission_insert',
		'update'			=> 'xmarketing_emissions::handleEmission_update'
		));

		xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$function);

		die('XXX');
	}


	public static function injectQueryString($fields2search,$_query)
	{
		$query = "";
		if ($_query != "")
		{
			$_q = explode(" ",$_query);
			$qs = array();

			foreach ($_q as $q)
			{
				$tmp = array();

				foreach ($fields2search as $f2s)
				{
					$q = dbx::escape($q);
					$tmp[] = " $f2s LIKE '%$q%' ";
				}

				$qs[] = " ( " .implode(" OR ",$tmp)." )";
			}
			$query = " and (".implode(" AND ",$qs).")";
		}
		return $query;
	}

}