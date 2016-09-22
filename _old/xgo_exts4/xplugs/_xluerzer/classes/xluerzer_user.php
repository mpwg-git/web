<?

class xluerzer_user
{


	public static function getCurrentUser()
	{

		$prefix = "abu_security_";

		$user = xredaktor_core::getUserSettings();
		if ($user === false) return false;
		
		if (!$user['wz_id'] || $user['wz_id'] == '') return false;

		$wz_id = $user['wz_id'];
		$user2 = dbx::query("select * from a_backend_user where abu_id = $wz_id");

		$secs = array();
		foreach ($user2 as $k => $v)
		{
			if (strpos($k,$prefix)===false) continue;
			if (intval($v) == 0) continue;
			$secs[] = substr($k,strlen($prefix));
		}
		$user2['lz_sec'] = $secs;
		$user2['lz_sec_id'] = $wz_id;

		unset($user2['abu_password']);
		return $user2;
	}
	
	
	
	public static function getCurrentUserId()
	{

		$prefix = "abu_security_";

		$user = xredaktor_core::getUserSettings();
		if ($user === false) return false;

		$userid = intval($user['wz_id']);

		return $userid;
	}
	

	/// eg. ADMIN, CRM-CONTACTS-ACCESS
	public static function liveSecurityCheckByTag($tag,$dieIfNoRights=true)
	{
		if (xredaktor_core::isAdmin())
		{
			return true;
		}
		
		$user = self::getCurrentUser();
		if (!in_array($tag,$user['lz_sec']))
		{
			if ($dieIfNoRights)
			{
				frontcontrollerx::json_failure('PERMISSION DENIED. REQUIRED : '.$tag);
			}
		}

		return true;

	}

	public static function sync2xgo()
	{

		dbx::query("update be_users set wz_del='Y' where wz_id > 1");

		$be_users = dbx::queryAll("select * from a_backend_user ");
		foreach ($be_users as $bu)
		{

			$abu_id 	= intval($bu['abu_id']);
			$abu_email	= dbx::escape($bu['abu_email']);

			if ($abu_id < 2) continue;


			$user = array(

			'wz_u_email' 	=> $bu['abu_email'],
			'wz_u_username' => $bu['abu_email'],
			'wz_u_password' => md5($bu['abu_password']),
			'wz_u_is_admin' => 'N',
			'wz_del' 		=> 'N',
			'wz_online' 	=> 'Y',

			);


			$present = dbx::query("select * from be_users where wz_u_email = '$abu_email'");
			

			if ($present === false)
			{
				dbx::insert('be_users',$user);
			} else
			{
				dbx::update('be_users',$user,array('wz_id'=>$abu_id));
			}


		}


	}


}