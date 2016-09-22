<?

class xmarketing_security
{

	private static $latestErrorIndex = "";

	public static function specialRightsGrantAccess()
	{
		$ret = false;
		if (xmarketing_cronjobs::$isRunning) return true;
		return $ret;
	}

	public static function secError($message='SECURITY-ERROR')
	{
		frontcontrollerx::json_failure($message);
		die();
	}

	private static function checkTable($table,$fields)
	{
		return true;
		
		$_f = array();
		foreach ($fields as $k => $v)
		{
			$_f[] = " $k = '$v' ";
		}
		$where = implode(" AND ",$_f);

		$sql 		= "select * from $table where $where";
		$present 	= dbx::query($sql);

		if ($present === false) self::secError("Sie haben nicht die Berechtigung für ".self::$latestErrorIndex);
		return true;
	}

	public static function checkAccess($type,$id)
	{
		$id 	= intval($id);
		//if ($id == 0) return 0;

		if (self::specialRightsGrantAccess()) return $id;
		$siteId	= xmarketing_config::getCurrentSiteId();

		self::$latestErrorIndex = "$type,$id,$siteId";

		switch ($type)
		{
			case 'xm_emissions':
				self::checkTable('xm_emissions',array('xme_id'=>$id,'xme_s_id'=>$siteId));
				break;
			case 'atoms':
				self::checkTable('atoms',array('a_id'=>$id,'a_s_id'=>$siteId,'a_type'=>'FRAME'));
				break;
			case 'xm_recipients':
				self::checkTable('xm_recipients',array('xmr_id'=>$id,'xmr_s_id'=>$siteId));
				break;
			case 'xm_lists':
				self::checkTable('xm_lists',array('xml_id'=>$id,'xml_s_id'=>$siteId));
				break;
			case 'xm_send_connectors':
				self::checkTable('xm_send_connectors',array('xmsc_id'=>$id,'xmsc_s_id'=>$siteId));
				break;
			case 'xm_send_connectors_bounces':
				self::checkTable('xm_send_connectors_bounces',array('xmscb_id'=>$id,'xmscb_s_id'=>$siteId));
				break;
			case 'xm_send_queue':
				self::checkTable('xm_send_queue',array('xmsq_id'=>$id,'xmsq_s_id'=>$siteId));
				break;
			case 'xm_recipients_history':
				self::checkTable('xm_recipients_history',array('xmrh_id'=>$id,'xmrh_s_id'=>$siteId));
				break;
			case 'xm_lists_import':
				self::checkTable('xm_lists_import',array('xmli_id'=>$id,'xmli_s_id'=>$siteId));
				break;
			default:
				self::secError($type.'-'.$id.'-'.$siteId);
		}

		return $id;
	}

	/* - ------------------------------------------------------------------------------- - */

	public static function safe_emissions_id($xme_id)
	{
		return self::checkAccess('xm_emissions',$xme_id);
	}

	public static function safe_frame_id($frame_id)
	{
		return self::checkAccess('atoms',$frame_id);
	}

	public static function safe_recipient_id($xmr_id)
	{
		return self::checkAccess('xm_recipients',$xmr_id);
	}

	public static function safe_list_id($xml_id)
	{
		return self::checkAccess('xm_lists',$xml_id);
	}

	public static function safe_send_connectors_id($xmsc_id)
	{
		return self::checkAccess('xm_send_connectors',$xmsc_id);
	}

	public static function safe_send_connectors_bounce_id($xmscb_id)
	{
		return self::checkAccess('xm_send_connectors_bounces',$xmscb_id);
	}

	public static function safe_send_queue_id($xmsq_id)
	{
		return self::checkAccess('xm_send_queue',$xmsq_id);
	}

	public static function safe_recipients_history_id($xmrh_id)
	{
		return self::checkAccess('xm_recipients_history',$xmrh_id);
	}

	public static function safe_list_import_id($xmli_id)
	{
		return self::checkAccess('xm_lists_import',$xmli_id);
	}

	public static function isValidEmail($email)
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	public static function isValidUrl($url)
	{
		return filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED);
	}

	public static function safe_email($email)
	{
		$email = trim($email);
		if (self::isValidEmail($email)) return $email;
		self::secError("E-Mail Adresse ist ungültig.");
	}

	public static function safe_url($url)
	{
		$url = trim($url);
		if (self::isValidUrl($url)) return $url;
		self::secError("URL ist ungültig.");
	}

	/* - ------------------------------------------------------------------------------- - */

	private static function getHashKey()
	{
		return "sdkjlkds/3232j,n,m";
	}

	private static function doHashing($arr)
	{
		$clean = array();
		foreach ($arr as $k => $v)
		{
			$clean[trim($k)] = ''.trim($v);
		}
		ksort($clean);
		return md5(self::getHashKey().serialize($clean));
	}

	public static function generateHeaders($mailHeaders)
	{
		$mailHeaders['X-xmarketing_hash'] = self::doHashing($mailHeaders);
		return $mailHeaders;
	}

	public static function checkIfValidEMailByHeaders($mailHeaders)
	{
		if (!isset($mailHeaders['X-xmarketing_hash'])) return false;
		$hash_test = $mailHeaders['X-xmarketing_hash'];
		unset($mailHeaders['X-xmarketing_hash']);
		$hash_calc = self::doHashing($mailHeaders);
		return ($hash_test == $hash_calc);
	}

	public static function getUserId()
	{
		$be = xredaktor_core::getUserSettings();
		return intval($be['wz_id']);
	}
}