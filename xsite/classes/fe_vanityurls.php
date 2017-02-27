<?

class fe_vanityurls
{
	
	public static $page_login			 	= 6;	
	public static $page_registrieren 		= 5;
	public static $page_profil_suche		= 14;
	public static $page_profil_biete		= 13;
	public static $page_wgtest				= 10;
	public static $page_suche				= 11;
	public static $page_mein_profil			= 7;
	public static $page_raum_beitreten		= 33;
	public static $page_chat				= 12; 
	public static $page_trefferliste		= 17;
	public static $page_blog_detail			= 46;
	
	public static function genUrl_blogdetail($blogId)
	{
		$blogId = intval($blogId);
		if ($blogId == 0) return false;
		
		$lang = xredaktor_pages::getFrontEndLang();

		$blogEntry = dbx::query("SELECT * FROM wizard_auto_834 where wz_id = $blogId ");
		$blogEntry = xredaktor_wizards::mapLanguageFieldsToNormFields(834, $blogEntry);
		
		$url = xredaktor_niceurl::genUrl(array(
			'p_id' 		=> self::$page_blog_detail,
			'blogId'	=> $blogId,
			'lang'		=> $lang,
			'm_suffix'	=> $blogId . '/' . $blogEntry['wz_HEADLINE']
		));
		return $url;
	}
	
	public static function sc_get_blog_detail_url($params)
	{
		$blogId = intval($params['blogId']);
		if ($blogId == 0) return false;
		
		return self::genUrl_blogdetail($blogId);
	}
	
	public static function genUrl_chat($userId, $type=false)
	{
		$userId = intval($userId);
		if($userId == 0) return '';
		
		$lang = xredaktor_pages::getFrontEndLang();
			

		$url = xredaktor_niceurl::genUrl(array(
			'p_id' 		=> self::$page_chat,
			'id'		=> $userId,
			'lang'		=> $lang,
			'm_suffix'	=> $userId
		));
		return $url;
	}
	
	public static function genUrl_room($roomId)
	{
		$roomId = intval($roomId);
		
		if($roomId == 0)
		{
			return "#";
		}
		
		$url = xredaktor_niceurl::genUrl(array(
			'p_id' 		=> 13,
			'id'		=> $roomId,
			'm_suffix'	=> $roomId
		));
		
		return $url;
	}
	
	public static function genUrl_profil($userId, $type=false)
	{
		
		$userId = intval($userId);
		
		if($userId == 0) return 'nothing-userid-'.$userId.'-type-'.$type;
		
 		$url = '';
		
		if ($type == false)
		{
			$type			= fe_user::getUserType($userId);
		}
		
		$lang = xredaktor_pages::getFrontEndLang();
			
		$user = dbx::query("select * from wizard_auto_707 where wz_id = $userId");

		switch($type)
		{
			case 'suche':
				
				$user = dbx::query("select * from wizard_auto_707 where wz_id = $userId");
				
				$url = xredaktor_niceurl::genUrl(array(
					'p_id' 		=> self::$page_profil_suche,
					'id'		=> $userId,
					'm_suffix'	=> $userId."/".$user['wz_VORNAME']."-".$user['wz_NACHNAME']
				));
				break;
				
			case 'biete':
				$url = xredaktor_niceurl::genUrl(array(
					'p_id' 		=> self::$page_profil_biete,
					'id'		=> $userId,
					'm_suffix'	=> $userId
				));
				break;
				
			default:
				break;		
		}
		
		return $url;
	}
	
	
	public static function genUrl_suche()
	{
		$url = xredaktor_niceurl::genUrl(array(
			'p_id' 		=> self::$page_suche,
		));
		
		return $url;		
	}
	
	
	public static function genUrl_login()
	{
		$url = xredaktor_niceurl::genUrl(array(
				'p_id' 		=> self::$page_login,
		));
	
		return $url;
	}
	
	
	public static function genUrl_trefferliste()
	{
		$url = xredaktor_niceurl::genUrl(array(
			'p_id' 		=> self::$page_trefferliste,
		));
		
		return $url;
	}
	
	public static function genUrl_myprofile()
	{
		$url = xredaktor_niceurl::genUrl(array(
			'p_id' 		=> self::$page_mein_profil,
		));
		
		return $url;
	}	
	
	
	public static function genUrl_invitationsOverview()
	{
		
		$url = '';
		
		$url = xredaktor_niceurl::genUrl(array(
			'p_id' 		=> self::$page_raum_beitreten
		));
		
		return $url;	
	}
	
	
	
	public static function genUrl_joinLink($roomId, $email, $userId)
	{
		$roomId 	= intval($roomId);
		$userId		= intval($userId);
		$email		= dbx::escape($email);
		
		if ($roomId == 0) return false;
		
		// user is already registered, generate join link
		if ($userId > 0)
		{
			$url = xredaktor_niceurl::genUrl(array(
				'p_id' 		=> self::$page_raum_beitreten,
				'joinRoom'	=> $roomId,
				'joinUser'	=> $userId,
				'm_suffix'	=> $roomId
			));
		}
		// new user, generate register link 
		else
		{
			$url = xredaktor_niceurl::genUrl(array(
				'p_id' 		=> self::$page_registrieren,
				'joinRoom'	=> $roomId,
				'joinEmail' => $email,
				'm_suffix'	=> $roomId
			));
		}
		
		return $url;
	}
	
	public static function getFacebookShare()
	{
		
		$p_id = intval($_REQUEST['p_id']);
		
		$room_id = 0;
		
		switch ($p_id) {
			case 13:
				$room_id = intval($_REQUEST['id']);
				break;
			case 30:
				$room_id = intval($_REQUEST['roomId']);
				break;
			default:
				
				break;
		}
		
		if($room_id == 0)
		{
			return '';
		}
		
		$url = fe_vanityurls::genUrl_profil($room_id, 'biete');
		
		return "https://www.facebook.com/sharer/sharer.php?u=".urlencode("http://www.meineperfektewg.com/".$url);
	}
}