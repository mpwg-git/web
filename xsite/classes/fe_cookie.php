<?
class fe_cookie
{
	const cookiename			= 'wsf_login';
	const cookietable			= 'wizard_auto_861';
	const cookie_lifetime_days 	= 1800;
	const cookiename_fragen		= 'wsf_fragen';
	const cookiename_cookiewarn = 'wsf_cookie_warning_seen';
	const cookie_longterm_life_days = 1800;
	
	
	public static function createLoginCookieForUserId($userId)
	{
		$userId = intval($userId);
		if ($userId == 0) return false;
		
		// cookie exists? remove
		if ($_COOKIE[self::cookiename] != "")
		{
			self::deleteLoginCookie();
		}
		
		// create new hash and save 
		$hash = self::genCookiehash();
		self::setCookieByUserIdAndHash($userId, $hash);
	}
	
	public static function deleteLoginCookie()
	{
		$hash = $_COOKIE[self::cookiename];
		if ($hash == '') return false;
		
		// delete from db
		$hash = dbx::escape($_COOKIE[self::cookiename]);
		dbx::query("DELETE FROM ".self::cookietable." WHERE wz_COOKIE = '$hash' ");
		
		// delete from server
		setcookie(self::cookiename, 'deleted', 1, '/');
		
		return true;
	}
	
	public static function genCookiehash()
	{
		return md5( rand(0, 999999) . microtime(1) . 'WSF' . rand(0,99999) );
	}
	
	public static function getUserIdByHash($hash)
	{
		if ($hash == '') return false;
		$hash = dbx::escape($hash);	
		$usercookie = dbx::query("SELECT wz_USERID FROM " . self::cookietable . " WHERE wz_COOKIE = '$hash' AND wz_del = 'N' ");
		if ($usercookie == false) return false;
		return intval($usercookie['wz_USERID']);
	}
	
	public static function setCookieByUserIdAndHash($userId, $hash)
	{
		$userId = intval($userId);
		$hash   = trim($hash);
		
		if ($userId == 0 || $hash == '') return false;
		
		dbx::insert('wizard_auto_861', array(
			'wz_created' 	=> 'NOW()',
			'wz_USERID'		=> $userId,
			'wz_COOKIE'		=> $hash
		));
		setcookie(self::cookiename, $hash, time() + (86400 * self::cookie_lifetime_days), '/');
	}
	
	public static function sc_checkCookie()
	{
		if ($_REQUEST['cms'] == 1) return true; // xGo Workaround
		
		// user kommt von startseite
		if ($_REQUEST['url'] == '') {
			if (isset($_COOKIE[self::cookiename]))
			{
				// try to find user via hash
				$userId 	= self::getUserIdByHash($_COOKIE[self::cookiename]);
				
				if ($userId === false) return false;
				
				// log the user in
				$feUserSessionKey 			 = xredaktor_feUser::getPrivateStatic('sessionName_FEUSER');
				$userData 		  			 = dbx::query("SELECT * FROM wizard_auto_707 WHERE wz_id = $userId ");
				$_SESSION[$feUserSessionKey] = $userData;
				fe_user::redirectToSearch();
				die();
			}
		}
		return true;
	}
	
	public static function sc_checkFragencookie()
	{
		if (!$_COOKIE[self::cookiename_fragen])
		{
			// -1 = session cookie
			setcookie(self::cookiename_fragen, '1', -1, '/');
			return true;
		}

		return false;
	}
	
	public static function checkFragenSession()
	{
		@session_start();
		
		if(!isset($_SESSION['SHOWFRAGENCOOKIE']))
		{
			$_SESSION['SHOWFRAGENCOOKIE'] = false;
			return true;
		}
				
		return false;
	}
	
	public static function sc_showCookieUsageWarning()
	{
		if (!$_COOKIE[self::cookiename_cookiewarn])
		{
			return true;
		}
		
		return false;
	}

	public static function ajax_setCookieWarningSeen()
	{
		setcookie(self::cookiename_cookiewarn, '1', time() + (86400 * self::cookie_longterm_life_days) , '/');
	}
	
		
	
	/*
	public static function updateCookieByHashAndData($hash, $data)
	{
		dbx::update(fe_user::cookietable, $data, array('wz_COOKIE' => $hash));
	}
	*/
	
}
