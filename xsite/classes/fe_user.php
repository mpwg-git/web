<?
// error_reporting(E_ALL);

class fe_user
{

	public static $defaultImageFemale 	= 792;
	public static $defaultImageMale	 	= 791;

	const table_room_fav 	= 'wizard_auto_846';
	const table_room_block 	= 'wizard_auto_847';

	const table_user_fav	= 'wizard_auto_767';
	const table_user_block	= 'wizard_auto_768';

	const errorMessage_cant_deactivate_room_roomies_inside 	= '###cannot_deactivate_room_roomies_still_inside###';
	const errorMessage_cant_delete_room_roomies_inside		= '###cannot_delete_room_roomies_still_inside###';
	const message_room_deleted								= '###room_deleted###';
	const message_room_activated							= '###room_activated###';
	const message_room_deactivated							= '###room_deactivated###';



	// defaults bei reg
	public static $regDefaults = array(
// 		'wz_LAND'			=> 1,	// österreich

		'wz_HAUSTIERE' 		=> 'X',
		'wz_VEGGIE' 		=> 'X',
		'wz_ABLOESE' 		=> 'X',
		'wz_MITBEWOHNER'	=> 'X',
		'wz_RAUCHER'		=> 'X',
		'wz_BARRIEREFREI' 	=> 'X',

// 		'wz_ADRESSE'		=> 'Wien, Österreich',
// 		'wz_ADRESSE_LAT' 	=> 48.2081743,
// 		'wz_ADRESSE_LNG'	=> 16.3738189,

		'wz_MIETE_VON' 		=> 0,
		'wz_MIETE_BIS' 		=> 1000,
		'wz_UMKREIS'		=> 50,

		//'wz_WGGROESSE_VON' => 1,
		//'wz_WGGROESSE_BIS' => 10,
	);


	public static function doIBlockUser($otherUserId)
	{
		$otherUserId = intval($otherUserId);
		if ($otherUserId == 0) return false;

		$myUserId = xredaktor_feUser::getUserId();
		$myUserId = intval($myUserId);
		if ($myUserId == 0) return false;
		$result = dbx::query("SELECT wz_id FROM " . self::table_user_block . " WHERE wz_USERID = $myUserId AND wz_F_USERID = $otherUserId ");
		if ($result !== false) return true;
		return false;
	}


	public static function amIBlockedFromUser($otherUserId)
	{

		$otherUserId = intval($otherUserId);
		if ($otherUserId == 0) return false;

		$myUserId = xredaktor_feUser::getUserId();
		$myUserId = intval($myUserId);
		if ($myUserId == 0) return false;

		$result = dbx::query("SELECT wz_id FROM " . self::table_user_block . " WHERE wz_F_USERID = $myUserId AND wz_USERID = $otherUserId ");
		if ($result !== false) return true;
		return false;
	}


	public static function create_tmp_anbieter_by_email($email)
	{
		$email = trim($email);

		if ($email == '') return false;

		$exists = dbx::query("SELECT * FROM wizard_auto_707 WHERE wz_EMAIL = '$email' AND wz_del = 'N' ");


		//user aus xkalt passwort selbst eingeben lassen
		//$pass = 'drduck' . rand(1000, 9999);

		$db = array(
			'wz_del' 			=> 'N',
			'wz_online' 		=> 'Y',
			'wz_TYPE'			=> 'biete',
			'wz_MAIL_CHECKED' 	=> 'Y',
			'wz_GESCHLECHT'		=> 'F',
			'wz_IS_TMP_USER'	=> 'Y',
			'wz_EMAIL'			=> $email,
			//'wz_PASSWORT'		=> md5($pass),
		);

		$db = array_merge($db, self::$regDefaults);

		if ($exists) {
			$userId = $exists['wz_id'];
			dbx::update('wizard_auto_707', $db, array('wz_id' => intval($exists['wz_id'])));
			$existing = true;
		} else {
			$db['wz_created'] = 'NOW()';
			$db['wz_USERDEL'] = 'Y';
			$db['wz_ACTIVE']  = 'Y';

			dbx::insert('wizard_auto_707', $db);
			$userId = dbx::getLastInsertId();
			$existing = false;
		}

		return array(
			//'PASS' 		=> $pass,
			'USER_ID'	=> $userId,
			'EXISTING'	=> $existing
		);
	}

	public static function deactivate_user_account($userId)
	{
		$userId = intval($userId);
		if ($userId == 0) return false;

		$myUserId = xredaktor_feUser::getUserId();
		$myUserId = intval($myUserId);

		// nur eigenes profil abdrehen können
		if ($myUserId != $userId) {
			return false;
		}

		// UPDATE USER wz
		dbx::update("wizard_auto_707", array(
			'wz_USERDEL' 	=> 'Y',
			'wz_USERDEL_TS' => 'NOW()',
			'wz_ACTIVE' 	=> 'N',
			'wz_online' 	=> 'N',
			'wz_del' 		=> 'Y'),
		array(
			'wz_id' => $userId
			));

		// DELETE ROOMS n2n
		dbx::query("DELETE FROM wizard_auto_SIMPLE_W2W_707_809 WHERE wz_id_low = $userId ");

		// ROOM wz
		$roomsWhereUserIsAdmin = dbx::queryAll("SELECT wz_id FROM wizard_auto_809 WHERE wz_ADMIN = $userId AND wz_del = 'N' ");
		foreach ($roomsWhereUserIsAdmin as $room)
		{
			// count checken - uns selbst haben wir schon vorher bei delete rooms n2n rausgelöscht
			// wenn jetzt hier keiner mehr kommt können wir den raum löschen
			$roomId = intval($room['wz_id']);
			$mitbewohner_count = dbx::queryAttribute("SELECT COUNT(*) AS cntx FROM wizard_auto_SIMPLE_W2W_707_809 WHERE wz_id_high = $roomId ", 'cntx');
			$mitbewohner_count = intval($mitbewohner_count);
			if ($mitbewohner_count > 0)
			{
				continue;
			}

			dbx::update("wizard_auto_809", array(
				'wz_USERDEL' 	=> 'Y',
				'wz_USERDEL_TS' => 'NOW()',
				'wz_ACTIVE' 	=> 'N',
				'wz_online' 	=> 'N',
				'wz_del' 		=> 'Y'),
			array(
				'wz_id' => $roomId
			));
		}

		// TODO: INVITATIONS

		// logout
		if ($myUserId > 0 && $userId == $myUserId)
		{
			xredaktor_feUser::doLogout();
		}

		return true;
	}

	public static function sc_is_active($params)
	{
		return self::is_active(intval($params['userId']));
	}

	public static function is_active($userId)
	{
		$userId = intval($userId);
		if ($userId == 0) return false;

		$active = dbx::query("SELECT wz_id FROM wizard_auto_707 WHERE wz_id = $userId AND wz_ACTIVE = 'Y' ");
		if ($active === false) return false;
		return true;
	}

	###############
	public static function ajax_reset_password()
	{
		// -1 || PASSWORT != PASSWORT2
		// -2 || currentPWD ist false
		// -3 || nicht eingeloggt
		// 1 || alles ok

		$status = self::reset_password();

		if($status < 0)
		{
			frontcontrollerx::json_failure(array('id'=>$status));
		}
		else
		{
			frontcontrollerx::json_success();
		}
	}


	public static function reset_password()
	{
		$user_email = dbx::escape(trim($_REQUEST['EMAIL']));

		// -1 || PASSWORT != PASSWORT2
		// -2 || currentPWD ist false
		// -3 || nicht eingeloggt
		// 1 || alles ok

		if(!filter_var($user_email, FILTER_VALIDATE_EMAIL))
		{
			return -3;
		}

		$currentPwd = dbx::escape($_REQUEST['currentPWD']);
		$PASSWORT 	= dbx::escape($_REQUEST['PASSWORT']);
		$PASSWORT2 	= dbx::escape($_REQUEST['PASSWORT2']);

		if($PASSWORT != $PASSWORT2)
		{
			return -1;
		}

		$table = xredaktor_wizards::genWizardTableNameBy_a_id(707);
		$user = dbx::query("select * from $table where wz_EMAIL= '$user_email' and wz_PASSWORT = MD5('$currentPwd')");

		if($user === false)
		{
			return -2;
		}

		$user_id = intval($user['wz_id']);

		dbx::update($table,array('wz_PASSWORT'=>md5($PASSWORT)),array('wz_id'=>$user_id,'wz_PASSWORT'=>md5($currentPwd)));

		return 1;

	}



	// WEB-276
	public static function ajax_changeMail()
	{
		$emailNeu = dbx::escape($_REQUEST['email_neu']);

		$user = xredaktor_feUser::getUserInfo();
		$userid = $user['wz_id'];

		$update = array(
				'wz_id'				=> $userid,
				'wz_EMAIL_ALT'		=> $emailNeu //zwischenspeichern der neuen mail bis wz_MAIL_CHECKED == Y
		);

		dbx::update('wizard_auto_707',$update,array('wz_id'=>$userid));

		xredaktor_feUser::sendConfirmMailChange($userid);

		self::doLogout();

		echo json_encode("OK");

		return;
	}


	public static function ajax_checkNewMail()
	{
		$ok = false;

		$emailNeu 			= dbx::escape($_REQUEST['email_neu']);
		$emailNeuConfirm 	= dbx::escape($_REQUEST['email_neu_confirm']);

		$present = dbx::queryAll("select * from wizard_auto_707 where wz_email = '$emailNeu' and wz_del = 'N' and wz_online = 'Y'");

		if(!filter_var($emailNeu, FILTER_VALIDATE_EMAIL))
		{
			$ok = -1;
			echo json_encode($ok);
			return;
		}
		elseif($emailNeu != $emailNeuConfirm)
		{
			$ok = -2;
			echo json_encode($ok);
			return;
		}
		elseif($present !== false || $present != "")
		{
			$ok = -3;
			echo json_encode($ok);
			return;
		}
		else
		{
			$ok = 1;
			echo json_encode($ok);
			return;
		}

	}



	// WEB-271
	public static function ajax_changePwd()
	{
		$pw = dbx::escape(md5($_REQUEST['pwChange']));

		$userid = intval(xredaktor_feUser::getUserId());

		$update = dbx::update('wizard_auto_707',array('wz_PASSWORT'=>$pw),array('wz_id'=>$userid));

		echo json_encode($update);
	}


	public static function ajax_checkPasswdForm()
	{
		$checkAlt = dbx::escape($_REQUEST['pwd_alt']);
		$checkNeu = dbx::escape($_REQUEST['pwd_neu']);
		$checkNeuConfirm = dbx::escape($_REQUEST['pwd_neuConfirm']);

		$ok = false;
		$status = array();

		$userid = intval(xredaktor_feUser::getUserId());
		$userpw = dbx::queryAttribute("select wz_passwort from wizard_auto_707 where wz_id = '$userid'", "wz_passwort");

		// aktuelles Passwort leer
		if(strlen($checkAlt) == 0)
		{
			$ok = "01";
			$status['checkAlt'] = $ok;
			echo json_encode($status);
			return;
		}
		// pw neu strlen < 6
		if(strlen($checkNeu) < 6)
		{
			$ok = "02";
			$status['checkNeu'] = $ok;
			echo json_encode($status);
			return;
		}
		//aktuelles Passwort != db passwort
		if($userpw != $checkAlt)
		{
			$ok = "-1";
			$status['checkAlt'] = $ok;
		}
		//pw neu != pw neu confirm
		if($checkNeu != $checkNeuConfirm)
		{
			$ok = "-2";
			$status['checkNeu'] = $ok;
		}
		//aktuelles Passwort == db passwort
		if($userpw == md5($checkAlt))
		{
			$ok = "1";
			$status['checkAlt'] = $ok;
		}
		//pw neu == pw neu confirm
		if(($checkNeu == $checkNeuConfirm) && strlen($checkNeu) > 5)
		{
			$ok = "2";
			$status['checkNeu'] = $ok;
		}
		echo json_encode($status);
	}



	public static function afterRegistration()
	{
		// NO PROFILE TABLE ANYMORE

		$type 				= dbx::escape($_REQUEST['TYPE']);
		$geschlecht 		= $_REQUEST['GESCHLECHT']; // nix escapen, wird eh gleich im switch sauber gesetzt
		$email				= dbx::escape($_REQUEST['EMAIL']);

		fe_cookie::deleteLoginCookie();

		/*
		 * debug by ML
		$saveToFile = array(
			'type' => $type,
			'geschlecht' => $geschlecht,
			'email' => $email,
			'request' => $_REQUEST
		);
		file_put_contents(Ixcore::htdocsRoot . '/register_out.txt', print_r($saveToFile, 1), FILE_APPEND);
		*/

		switch ($geschlecht) {
			case 'male':
				$geschlecht = 'M';
				break;

			default:
				$geschlecht = 'F';
				break;
		}

		// MASTER BUG - hier wurde nicht auf del/online gecheckt, dadurch alte (bereits testweise registrierte) User ID von einer Email zurückbekommen
		// und wir wundern uns warum nix im Posthook geht...
		$user_id	= dbx::queryAttribute("select * from wizard_auto_707 where wz_EMAIL = '$email' AND wz_del = 'N' AND wz_online = 'Y' ", "wz_id");

		if ($user_id === false) frontcontrollerx::json_failure("ERROR: User does not exist");

		$user_id		= intval($user_id);

		$update = array(
			'wz_created' 	=> 'NOW()',
			'wz_GESCHLECHT' => $geschlecht,
			'wz_TYPE' 		=> $type,
			//'wz_ACTIVE'		=> 'Y' // erst nach Mailbestätigung
		);

		unset($update['wz_SPRACHEN']);


		// neue default werte | WEB-172
		$update = array_merge($update, self::$regDefaults);

		dbx::update("wizard_auto_707", $update, array('wz_id' => $user_id));
	}
	

	public static function ajax_resetEmailConfirmationAgain()
	{
		@session_start();
		$_SESSION['EmailConfirmMsg'] = false;
		frontcontrollerx::json_success();
	}

	public static function setEmailConfirmMsg()
	{
		@session_start();
		$_SESSION['EmailConfirmMsg'] = true;
	}

	public static function getEmailConfirmMsg()
	{
		@session_start();
		return ($_SESSION['EmailConfirmMsg']) ? true : false;
	}

	public static function afterLogin()
	{
		@session_start();
		unset($_SESSION['SHOWFRAGENCOOKIE']);

		$email		= dbx::escape($_REQUEST['wz_EMAIL']);

		$FbId			= trim($_REQUEST['id']);

		$user		= dbx::query("select * from wizard_auto_707 where wz_EMAIL = '$email' AND wz_del = 'N' ");
		$counter	= $user['wz_LOGINCOUNTER'];

		if ($user === false) {
			return "/";
		}

		$userId		= intval($user['wz_id']);

		++$counter;
		dbx::update('wizard_auto_707',array('wz_LOGINCOUNTER'=>$counter),array('wz_id'=>$userId));

		// CHECK IF ACTIVATE NEEDED
		if ($user['wz_IS_TMP_USER'] == 'Y')
		{
			if (isset($_REQUEST['h']) && $_REQUEST['h'] != '')
			{
				$hash = trim(dbx::escape($_REQUEST['h']));
				$ok = dbx::query("select * from wizard_auto_809 where wz_del= 'N' and wz_HASH = '$hash' and wz_ADMIN = $userId");

				if ($ok !== false)
				{
					fe_room::activateRoomWithHash($ok['wz_id'], $hash);
				}
			}
		}

		// cookie ablegen
		$feUserSessionKey = xredaktor_feUser::getPrivateStatic('sessionName_FEUSER');
		if (isset($_REQUEST['use_cookie']))
		{
			$_SESSION[$feUserSessionKey]['useCookie'] = 'Y';
			fe_cookie::createLoginCookieForUserId($userId);
		}
		else
		{
			$_SESSION[$feUserSessionKey]['useCookie'] = 'N';
			fe_cookie::deleteLoginCookie();
		}

// 		if($user['wz_ACTIVE'] == 'N')
// 		{
// 			self::setEmailConfirmMsg();
// 		}

		dbx::update('wizard_auto_707',array('wz_LASTLOGIN'=>'NOW()'),array('wz_id'=>$userId));

		if(isset($_SESSION['LAST_PUBLIC_ROMM_ID']))
		{
			$LAST_PUBLIC_ROMM_ID = intval($_SESSION['LAST_PUBLIC_ROMM_ID']);

			if($LAST_PUBLIC_ROMM_ID > 0)
			{
				unset($_SESSION['LAST_PUBLIC_ROMM_ID']);
	
				return fe_vanityurls::genUrl_room($LAST_PUBLIC_ROMM_ID);
			}
		}

		if(isset($_SESSION['SEARCHLIST']))
		{
			return fe_vanityurls::genUrl_suche();
		}


		if(isset($_SESSION['DEACTIVATE_ACCOUNT']))
		{
			if(intval($_SESSION['DEACTIVATE_ACCOUNT']) > 0)
			{
				unset($_SESSION['DEACTIVATE_ACCOUNT']);
				
				$redirectUrl = fe_vanityurls::genUrl_myprofile() . "?deactivate-account";
				
				return $redirectUrl; 
			}
		}
		
		if(isset($_SESSION['ROOM_LISTVIEW']) && $user['wz_TYPE'] == 'biete')
		{
			if(intval($_SESSION['ROOM_LISTVIEW']) > 0)
			{
				unset($_SESSION['ROOM_LISTVIEW']);
		
				$redirectUrl = fe_vanityurls::genUrl_myprofile() . "?room-list-view";
		
				return $redirectUrl;
			}
		}


		// FIRST visit ever after registration
		if ($user['wz_NOTLOGGEDIN'] == 1)
		{
			dbx::update("wizard_auto_707", array('wz_NOTLOGGEDIN' => 0), array('wz_id' => $userId));

			// check invitations
			/*
			if (self::checkForInvitations($userId, $email) !== false)
			{
				return fe_vanityurls::genUrl_invitationsOverview();
			}
			*/
			// redirect my profie
			return fe_vanityurls::genUrl_myprofile();
		}

		// regular visit
		else
		{
			/*
			if (self::checkForInvitations($userId, $email) !== false)
			{
				return fe_vanityurls::genUrl_invitationsOverview();
			}
			*/
			$_SESSION[$feUserSessionKey]['useCookie'] = 'N';

			//return fe_vanityurls::genUrl_myprofile();

			return fe_vanityurls::genUrl_suche();
			
			
// 			switch ($_SESSION['XR_FACE'])
// 			{
// 				case 1:
// 					return fe_vanityurls::genUrl_suche();
// 					break;
// 				case 3:
// 					return fe_vanityurls::genUrl_suche();
// 					break;
// 				case 4:
// 					return fe_vanityurls::genUrl_suche() . "?xr_face=4";
// 					break;
// 				default:
// 					return fe_vanityurls::genUrl_suche();
// 					break;
// 			}
		}
	}


	public static function checkForInvitations($userId, $email)
	{
		$userId		= intval($userId);
		if ($userId == 0) return false;

		$email 		= dbx::escape($email);

		$invitations = dbx::queryAll("select * from wizard_auto_822 where (wz_USERID = $userId OR wz_EMAIL = '$email') and wz_del='N'");

		return $invitations;
	}


	public static function getMyRoomData($params)
	{
		self::checkLoggedIn();

		$userId			= xredaktor_feUser::getUserId();
		$userId			= intval($userId);
		
		if ($userId == 0) return false;

		//$myRoomId		= fe_room::getRoomIdByUserId($userId);
		$myRoomId = intval($params['roomId']);
		
		$sex = 'F';
		$sex = dbx::query("SELECT wz_GESCHLECHT FROM wizard_auto_707 WHERE wz_id = $userId");

		if (isset($_REQUEST['createNew']) && $_REQUEST['createNew'] == 1)
		{
			if ($myRoomId == false)
			{
				$insert = array(
					'wz_ADMIN' 		=> $userId,
					'wz_online' 	=> 'Y',
					'wz_created' 	=> 'NOW()',
					'wz_ACTIVE' 	=> 'Y'
				);
				// defaultwerte hinzufügen
				$insert = array_merge($insert, fe_room::$regDefaults);
				
				if($sex == 'M')
				{
					$insert['wz_COUNT_MITBEWOHNER_M'] = 1;
					$insert['wz_COUNT_MITBEWOHNER'] = 1;
				}
				else 
				{
					$insert['wz_COUNT_MITBEWOHNER_F'] = 1;
					$insert['wz_COUNT_MITBEWOHNER'] = 1;
				}
				
				dbx::insert("wizard_auto_809", $insert);
					
				$myRoomId	= dbx::getLastInsertId();

				fe_room::assignUser2Room($userId, $myRoomId);

                // raum in matching room Todo eintragen
                dbx::insert('wizard_auto_853', array('wz_ROOMID' => $myRoomId, 'wz_STATUS' => 'TODO'));

				if ($params['redirect'] === true)
				{
					$newRoomUrl = xredaktor_niceurl::genUrl(array('p_id' => 30, 'm_suffix' => $myRoomId, 'roomId' => $myRoomId, 'comingFromRedirect' => 1));
					header("Location: " . 'http://' . $_SERVER['HTTP_HOST'] . $newRoomUrl);
				}

			}
		}
		return fe_room::getRoomData($myRoomId);
	}


	public static function getMyRooms()
	{
		$userId			= xredaktor_feUser::getUserId();
		$userId			= intval($userId);

		if ($userId == 0) return false;

		$rooms = dbx::queryAll("SELECT * FROM wizard_auto_809 WHERE wz_ADMIN = $userId AND wz_del != 'Y' ORDER BY wz_created ASC");

		$return = array();
		foreach ($rooms as $record)
		{
			$return[] = fe_room::getRoomData(intval($record['wz_id']));
		}
		return $return;
	}


	public static function getUserProfileId($user)
	{
		$userId			= xredaktor_feUser::getUserId();

		$profileTable 	= self::getUserProfileTable($user);

		$profileId		= dbx::queryAttribute("select * from $profileTable where wz_USERID = $userId", 'wz_id');

		return $profileId;
	}


	public static function getUserProfileTable($user,$returnId=false)
	{
		switch ($user['wz_TYPE']) {

			case 'suche':
				$a_id	= 718;
				break;

			case 'biete':
				$a_id	= 717;
				break;
			default:
				return false;
				break;
		}

		if ($returnId != false)
		{
			return $a_id;
		}

		$table 	= "wizard_auto_".$a_id;

		return $table;
	}


	public static function getMyData()
	{

		self::checkLoggedIn();

		$userId			= xredaktor_feUser::getUserId();

		return self::getUserData($userId);
	}


	public static function getMyAccountData()
	{
		self::checkLoggedIn();

		$userId			= xredaktor_feUser::getUserId();
	}


	public static function getUserData($userId)
	{
		self::checkLoggedIn();


		$userId			= intval($userId);
		$myUserId		= xredaktor_feUser::getUserId();
		$itsMe			= false;

		if ($userId == $myUserId) $itsMe = true;

		if ($userId == 0) return array();

		$user			= dbx::query("select * from wizard_auto_707 where wz_id = $userId");

///// redirect to error page if user is deleted || not active etc
		if(!$itsMe){
			if (($user['wz_del'] == 'Y' && $user['wz_USERDEL'] == 'Y') || $user['wz_ACTIVE'] == 'N' || $user['wz_online'] == 'N')
			{
				header("Location: " . xredaktor_niceurl::genUrl(array('p_id' => 2)));
				die();
			}
		}



		if($user === false)
		{
			return array();
		}

		if ($user['wz_PROFILBILD'] == 0)
		{
			$user['wz_PROFILBILD'] = self::getProfileImage($userId);
		}

		if ($user['wz_GEBURTSDATUM'] == '0000-00-00') $user['wz_GEBURTSDATUM'] = '';

		if(trim($user['wz_GEBURTSDATUM']) != '')
		{
			$user['wz_GEBURTSDATUM'] = date("d.m.Y", strtotime($user['wz_GEBURTSDATUM']));
		}

		$user['ALTER']  = self::getAgeByBirthday($user['wz_GEBURTSDATUM']);

		$profile		= self::getUserProfile($user);
		$images			= self::getUserImages($user);

		$user['STATE_FAV'] 		 = self::getUser2UserState($myUserId, $userId, "fav");
		$user['STATE_BLOCK']	 = self::getUser2UserState($myUserId, $userId, "block");


		$user['PROFILE_URL']			= fe_vanityurls::genUrl_profil($userId, "suche");

		$lng 				= xredaktor_pages::getFrontEndLang();
		$lngPref			= "_".strtoupper($lng)."_";

		$countries = dbx::queryAll("select * from wizard_auto_716 where wz_del= 'N' order by ".$lngPref.'wz_label'.' ASC');
		$countriesState = array();

		foreach ($countries as $k => $v)
		{

			$aux = array();

			$aux['label'] 		= $v[$lngPref.'wz_label'];

			$aux['id'] 			= $v['wz_id'];
			$aux['selected'] 	= 0;

			if ($v['wz_id'] == $user['wz_LAND'])
			{
				$aux['selected'] = 1;
			}
			$countriesState[] = $aux;
		}

		$user['LAND_COMBO'] = $countriesState;


		$ret 			= array(
			'USER' 		=> $user,
			'PROFILE'	=> $profile,
			'IMAGES'	=> $images
		);

		if ($itsMe == false)
		{
			$matchResult		= fe_matching::matchUsers($myUserId, $userId, true);
			$matching 			= array(
				'RESULT'		=> $matchResult,
				'TEXT'			=> fe_matching::getMatchTextByResult($matchResult)
			);

			$ret['MATCHING'] 	= $matching;
			$ret['x'] = 'Y';
		}


		return $ret;
	}

	public static function sc_getUser2UserState($params)
	{
		$userId 	= intval(xredaktor_feUser::getUserId());
		$fUserId	= intval($params['fUserId']);

		return array(
			'FAV' 		=> self::getUser2UserState($userId, $fUserId, "fav"),
			'BLOCK'		=> self::getUser2UserState($userId, $fUserId, "block")
		);

	}

	public static function sc_getUser2RoomState($params)
	{
		$userId 	= intval(xredaktor_feUser::getUserId());
		$fUserId	= intval($params['fUserId']);

		return array(
			'FAV' 		=> self::getUser2RoomState($userId, $fUserId, "fav"),
			'BLOCK'		=> self::getUser2RoomState($userId, $fUserId, "block")
		);

	}

	public static function redirectIfLoggedIn()
	{

		if (xredaktor_feUser::isLoggedIn() !== false)
		{
			return self::redirectToSearch();
		}

	}

	public static function sc_redirectIfNotLoggedIn()
	{

		if (xredaktor_feUser::isLoggedIn() === false)
		{
			return self::redirectToLogin();
		}

	}


	public static function getUser2UserState($userId, $fUserId, $type)
	{
		$userId 	= intval($userId);
		$fUserId 	= intval($fUserId);

		if ($userId == 0 || $fUserId == 0) return false;

		switch ($type) {
			case 'fav':
				$tableId = 767;
				break;
			case 'block':
				$tableId = 768;
				break;
			default:
				return false;
				break;
		}

		$present = dbx::query("select * from wizard_auto_$tableId where wz_USERID = $userId and wz_F_USERID = $fUserId");
		if ($present === false)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public static function getUser2RoomState($userId, $fUserId, $type)
	{
		$userId 	= intval($userId);
		$fUserId 	= intval($fUserId);

		if ($userId == 0 || $fUserId == 0) return false;

		switch ($type) {
			case 'fav':
				$tableId = 846;
				break;
			case 'block':
				$tableId = 847;
				break;
			default:
				return false;
				break;
		}

		$present = dbx::query("select * from wizard_auto_$tableId where wz_USERID = $userId and wz_F_USERID = $fUserId");
		if ($present === false)
		{
			return false;
		}
		else
		{
			return true;
		}
	}


	public static function getAgeByBirthday($date)
	{
		if ($date == '0000-00-00') return false;

		$age = date_create($date)->diff(date_create('today'))->y;
		return $age;
	}

	public static function getUserImages($user)
	{
		$userId			= intval($user['wz_id']);
		if ($userId == 0) return array();

		$ret 			= dbx::queryAll("select * from wizard_auto_720 where wz_USERID = $userId and wz_del='N' and wz_TYPE != 'PROFILE' ORDER BY wz_id DESC");

		if ($ret === false) $ret = array();

		return $ret;
	}


	public static function getUserProfile($user)
	{
		self::checkLoggedIn();

		$lng 				= xredaktor_pages::getFrontEndLang();
		$lngPref			= "_".strtoupper($lng)."_";

		$profileTable 		= self::getUserProfileTable($user);
		$profileTableId 	= self::getUserProfileTable($user, true);

		if ($profileTable === false) return array();

		$userId			= intval($user['wz_id']);

		$type			= self::getUserType($userId);


		//$profile 		= dbx::query("select * from $profileTable where wz_USERID = $userId");
		// TODO clean
		$profile 		= $user;


		//if ($profile === false) return array();

		$fieldsNull 	= array('wz_MIETE_VON', 'wz_MIETE_BIS', 'wz_WGGROESSE_VON', 'wz_WGGROESSE_BIS', 'wz_ZIMMERGROESSE_VON', 'wz_ZIMMERGROESSE_BIS', 'NEUE_MITBEWOHNER_VON', 'NEUE_MITBEWOHNER_BIS');
		$fieldsDate		= array('wz_ZEITRAUM_VON', 'wz_ZEITRAUM_BIS');

		// if 0 or not set => unset value
		foreach ($fieldsNull as $k => $v) {
			if ($profile[$v] == 0) unset($profile[$v]);
		}

		foreach ($fieldsDate as $k => $v) {
			if ($profile[$v] == "0000-00-00" || trim($profile[$v]) == '')
			{
				unset($profile[$v]);
			}
			else
			{
				$profile[$v] = date("d.m.Y", strtotime($profile[$v]));
			}
		}

		// get languages
		/*
		$profile['SPRACHEN'] 		= '';

		$sprachen					= dbx::queryAll("select sprachen.* from wizard_auto_707, wizard_auto_712 as sprachen, wizard_auto_SIMPLE_W2W_707_712 where wz_id_low = wizard_auto_707.wz_id and wz_id_high = sprachen.wz_id and wizard_auto_707.wz_id = $userId");
		$sprachenIds				= array();

		$sprachenCont				= array();

		foreach ($sprachen as $k => $v)
		{
			$sprachenIds[]			= $v['wz_id'];
			$sprachenCont[] 		= $v[$lngPref."wz_SPRACHE"];
		}

		$profile['SPRACHEN_IDS']	= $sprachenIds;

		if (count($sprachenCont) > 0)
		{
			$profile['SPRACHEN'] 	= implode(" | ", $sprachenCont);
		}
		*/


		// get mitbewohner

		$profile['ZEITRAUM']		= self::formatVonBis($profile['wz_ZEITRAUM_VON'], $profile['wz_ZEITRAUM_BIS'], "###ab###", "bis", "date");
		$profile['MIETE']			= self::formatVonBis($profile['wz_MIETE_VON'], $profile['wz_MIETE_BIS'], "###ab###");

		$profile['ABLOESE']			= self::matchYN($profile['wz_ABLOESE']);
		$profile['RAUCHER']			= self::matchYN($profile['wz_RAUCHER']);

		if ($type == 'suche')
		{
			$profile['WGGROESSE'] 		= self::formatVonBis($profile['wz_WGGROESSE_VON'], $profile['wz_WGGROESSE_BIS'], "###ab###", "bis");
			$profile['ZIMMERGROESSE'] 	= self::formatVonBis($profile['wz_ZIMMERGROESSE_VON'], $profile['wz_ZIMMERGROESSE_BIS'], "###ab###", "bis");
		}


		$profile['PROFILE_URL']			= fe_vanityurls::genUrl_profil($userId, $type);

		return $profile;
	}


	public static function matchYN($val)
	{

		$lng 		= xredaktor_pages::getFrontEndLang();

		switch ($val) {
			case 'N':
				return xredaktor_translate::doTranslate("Nein", $lng, 1);
				break;

			case 'Y':
				return xredaktor_translate::doTranslate("Ja", $lng, 1);
				break;

			default:
				return xredaktor_translate::doTranslate("Egal", $lng, 1);
				break;
		}
	}

	public static function formatVonBis($von, $bis, $vonStr = 'von', $bisStr = 'bis', $type = 'default')
	{
		$lng 		= xredaktor_pages::getFrontEndLang();
		$vonTrans 	= xredaktor_translate::doTranslate($vonStr, $lng, 1);
		$bisTrans 	= xredaktor_translate::doTranslate($bisStr, $lng, 1);

		if (($von == '0000-00-00' || $von == '0' || $von == false) && ($bis == '0000-00-00' || $bis == '0' || $bis == false))
		{
			return false;
		}
		else if ($bis == '0000-00-00' || $bis == '0' || $bis == false)
		{
			switch ($type) {
				case 'date':
					return "$vonTrans ".date("d.m.Y", strtotime($von));
					break;

				default:
					return "$vonTrans $von";
					break;
			}
		}
		else
		{
			return false;
		}
	}

	public static function sc_getMyUserType()
	{
		$userId = intval(xredaktor_feUser::getUserId());
		return self::getUserType($userId);
	}

	public static function ajax_delFoto()
	{
		self::checkLoggedIn();

		$userId = intval(xredaktor_feUser::getUserId());
		$fotoId = intval($_REQUEST['fotoId']);

		if ($userId == 0 || $fotoId == 0){
			frontcontrollerx::json_success();
			die();
		}

		$present = dbx::query("select * from wizard_auto_720 where wz_id = $fotoId and wz_USERID = $userId and wz_del='N'");

		if ($present === false)
		{
			frontcontrollerx::json_success();
			die();
		}

		dbx::update("wizard_auto_720", array('wz_del' => 'Y'), array('wz_id' => $fotoId, 'wz_USERID' => $userId));

		frontcontrollerx::json_success(array('fotoId' => $fotoId));
	}

	public static function getUserType($userId)
	{
		$userId = intval($userId);

		if ($userId == 0) return false;

		$type = dbx::queryAttribute("select * from wizard_auto_707 where wz_id = $userId", "wz_TYPE");


		return $type;
	}

	public static function sc_getUserData()
	{
		$userId = intval($_REQUEST['id']);

		self::checkLoggedIn();

		return self::getUserData($userId);
	}

	public static function getUserDataOnly($userId)
	{
		$userId = intval($userId);
		if ($userId == 0) return false;

		//$user = dbx::query("select *, TIMESTAMPDIFF(YEAR, wz_GEBURTSDATUM, CURDATE()) AS user_age from wizard_auto_707 where wz_id = $userId");
		$user = dbx::query("select *, TIMESTAMPDIFF(YEAR, wz_GEBURTSDATUM, CURDATE()) AS user_age from wizard_auto_707 where wz_id = $userId");

		return $user;

	}

	public static function sc_getLanguagesDropdown()
	{
		$langs = dbx::queryAll("select * from wizard_auto_712 where wz_del='N'");

		$ret = array();

		foreach ($langs as $k => $v) {
			$ret[] = array(
				'label' => $v["_DE_wz_SPRACHE"],
				'value'	=> $v['wz_id']
			);
		}

		return $ret;
	}

	public static function checkLoggedIn()
	{

		if (isset($_REQUEST['h']) && $_REQUEST['h'] != '')
		{
			return true;
		}

		if (xredaktor_feUser::isLoggedIn() === false)
		{
			return self::redirectToLogin();
		}
		else
		{
			return true;
		}
	}

	public static function getLoginStatus()
	{
		return xredaktor_feUser::isLoggedIn();
	}


	public static function getInvitations()
	{

		$userId		= intval(xredaktor_feUser::getUserId());
		if ($userId == 0) return false;

		$user		= xredaktor_feUser::getUserInfo();
		$email		= $user['wz_EMAIL'];

		$roomId		= intval($_REQUEST['joinRoom']);

		if ($roomId > 0)
		{
			$invitations = dbx::queryAll("select * from wizard_auto_822 as inv, wizard_auto_809 as room where (inv.wz_ROOMID = room.wz_id AND (wz_USERID = $userId or wz_EMAIL = '$email') and wz_ROOMID = $roomId and inv.wz_del='N')");
		}
		else
		{
			$invitations = dbx::queryAll("select * from wizard_auto_822 as inv, wizard_auto_809 as room where (inv.wz_ROOMID = room.wz_id AND (wz_USERID = $userId  or wz_EMAIL = '$email')) and inv.wz_del='N'");
		}

		if ($invitations === false) $invitations = array();

		return $invitations;

	}


	public static function doLogout()
	{
		if(isset($_SESSION['DEACTIVATE_ACCOUNT'])) unset($_SESSION['DEACTIVATE_ACCOUNT']);
		if(isset($_SESSION['ROOM_LISTVIEW'])) unset($_SESSION['ROOM_LISTVIEW']);
		if(isset($_SESSION['SEARCHLIST'])) unset($_SESSION['SEARCHLIST']);
		
		fe_cookie::deleteLoginCookie();
		xredaktor_feUser::doLogout();
		return self::redirectToLogin(true);
	}


	public static function redirectToLogin($addQueryParam = false)
	{

		$cfg = array('p_id' => fe_vanityurls::$page_login);

		// damit wir nicht in infinite loop kommen...
		if ($addQueryParam)
		{
			$cfg['m_suffix'] 	= 'from_logout';
			$cfg['from_logout'] = 1;
		}

		header("Location: ".xredaktor_niceurl::genUrl($cfg));
	}

	public static function redirectToSearch()
	{
		header("Location: ".xredaktor_niceurl::genUrl(array('p_id'=>fe_vanityurls::$page_suche)));
	}


	public static function ajax_profileSave()
	{
		$user 	= xredaktor_feUser::getUserInfo();

		if ($user === false)
		{
			frontcontrollerx::json_failure("ERROR: User not set");
		}
		$userId 	= intval($user['wz_id']);

		parse_str($_REQUEST['user'], $userReq);
		$profileReq = array();

		$alsoUpdateProfile = false;
		if (isset($_REQUEST['profile']))
		{
			$alsoUpdateProfile = true;
			parse_str($_REQUEST['profile'], $profileReq);
		}

		$updateCollection = array_merge($userReq, $profileReq);

		unset($updateCollection['allData']);

		if (trim($updateCollection['ADRESSE_LAND']) != '')
		{
			$landShort	= dbx::escape($updateCollection['ADRESSE_LAND']);
			$land		= dbx::queryAttribute("select * from wizard_auto_716 where wz_ISO2 = '$landShort'", "wz_id");

			if ($land === false)
			{
				unset($updateCollection['ADRESSE_LAND']);
			}
			else
			{
				$updateCollection['ADRESSE_LAND'] = $land;
			}
		}

		$update = array();
		foreach ($updateCollection as $k => $v) {
			$update['wz_'.$k] = $updateCollection[$k];
		}

// 		if(libx::isDeveloper())
// 		{
// 			print_r($update);
// 			die();
// 		}


// 		if(trim($update['wz_VORNAME'] == ''))
// 		{
// 			return frontcontrollerx::json_failure("vname");

// 		}

// 		if(trim($update['wz_NACHNAME'] == ''))
// 		{
// 			return frontcontrollerx::json_failure("nname");
// 		}




		$update['wz_LAND'] = $userReq['LAND'];

		if (isset($_REQUEST['profile']))
		{
			$update['wz_LAND'] = $profileReq['LAND'];
		}

		if (libx::isDeveloper() && $_REQUEST['x'] == 1)
		{
			print_r(compact('update', 'userReq', 'profileReq'));
			die(__FILE__ . ' --- line ' . __LINE__ . ' --- ( ' . __FUNCTION__ . ' )');
		}


		// safety first
		unset($update['wz_EMAIL']);
		unset($update['wz_id']);

		// handle specials

		// handle n:n

		$sprachen	= false;
		/*
		if (isset($update['wz_SPRACHEN']))
		{
			$sprachen = $update['wz_SPRACHEN'];
			unset($update['wz_SPRACHEN']);
		}
		*/

		if ($update['wz_GEBURTSDATUM'] != '')
		{
			$update['wz_GEBURTSDATUM'] = date("Y-m-d", strtotime($update['wz_GEBURTSDATUM']));
		}

		// größe von / bis
		if (
			(intval($update['wz_WGGROESSE_VON']) > intval($update['wz_WGGROESSE_BIS']))
			&&
			(intval($update['wz_WGGROESSE_VON']) > 0 && intval($update['wz_WGGROESSE_BIS']) > 0)
		) {
			$high = $update['wz_WGGROESSE_VON'];
			$low  = $update['wz_WGGROESSE_BIS'];
			$update['wz_WGGROESSE_VON'] = intval($low);
			$update['wz_WGGROESSE_BIS'] = intval($high);
		}

		// mitbewohner
		if (
			(intval($update['wz_ZIMMERGROESSE_VON']) > intval($update['wz_ZIMMERGROESSE_BIS']))
			&&
			(intval($update['wz_ZIMMERGROESSE_VON']) > 0 && intval($update['wz_ZIMMERGROESSE_BIS']) > 0)
		) {
			$high = $update['wz_ZIMMERGROESSE_VON'];
			$low  = $update['wz_ZIMMERGROESSE_BIS'];
			$update['wz_ZIMMERGROESSE_VON'] = intval($low);
			$update['wz_ZIMMERGROESSE_BIS'] = intval($high);
		}


		if (trim($update['wz_ZEITRAUM_VON']) != '')
		{
			$update['wz_ZEITRAUM_VON'] = date("Y-m-d", strtotime($update['wz_ZEITRAUM_VON']));
		}

		if (trim($update['wz_ZEITRAUM_BIS']) != '')
		{
			$update['wz_ZEITRAUM_BIS'] = date("Y-m-d", strtotime($update['wz_ZEITRAUM_BIS']));
		}

		/*
		if ($sprachen !== false)
		{
			dbx::query("delete from wizard_auto_SIMPLE_W2W_707_712 where wz_id_low = $userId");

			foreach ($sprachen as $k => $v)
			{
				$v = intval($v);
				if ($v > 0)
				{
					dbx::insert("wizard_auto_SIMPLE_W2W_707_712", array("wz_id_high" => $v, 'wz_id_low' => $userId));
				}
			}
		}
		*/

		//		update room ??
		$updateRoom = array();

		if(isset($_REQUEST['room'])) {

			parse_str($_REQUEST['room'], $meinRaum);

			$roomId = $meinRaum['id'];

			foreach($meinRaum as $k => $v)
			{
				$updateRoom['wz_'.$k] = $meinRaum[$k];
			}

			unset($updateRoom['wz_id']);

// 			print_r($roomId);
// 			print_r($updateRoom);
// 			die("-+-+-+-");

			dbx::update("wizard_auto_809", $updateRoom, array("wz_id" => $roomId));
		}


		// update user
		dbx::update("wizard_auto_707", $update, array("wz_id" => $userId));

		// das müsste man auch noch machen... damit die daten in der session passen

		xredaktor_feUser::refreshUserdata($userId);
		session_start();

		frontcontrollerx::json_success();
	}


	public static function sc_refreshSessionData($params)
	{
		$user 	= xredaktor_feUser::getUserInfo();
		$userId 	= intval($user['wz_id']);
		if (intval($userId) == 0 ) return false;

		xredaktor_feUser::refreshUserdata($userId);
	}

	public static function getProfileImage($userId)
	{
		$userId = intval($userId);

		if ($userId == 0) return false;

		$profileImg = dbx::queryAttribute("select * from wizard_auto_707 where wz_id = $userId", "wz_PROFILBILD");

		if ($profileImg == 0)
		{
			$profileImg = self::getDefaultImageByUserId($userId);
		}


		return $profileImg;

	}


	public static function ajax_searchUser()
	{

		$ret 		= array();
		$pieces 	= explode(" ", $_REQUEST['q']);

		foreach ($pieces as $k) {
			//echo "\n $k \n ";
			$k = dbx::escape($k);
			$pieces_search[] = "(wz_VORNAME like '%".$k."%' or wz_NACHNAME like '%".$k."%')";
		}
		$query 		= implode(" AND ",$pieces_search);
		$sql		= "select wz_id as value, CONCAT(wz_VORNAME, ' ', wz_NACHNAME) as label from wizard_auto_707 where wz_del='N' and wz_USERDEL != 'Y' AND wz_ACTIVE != 'N' AND wz_IS_TMP_USER != 'Y' AND ($query)";

		$retData 	= dbx::queryAll($sql);

		$aux = array();

		foreach ($retData as $k => $v) {

			//$url 	= fe_vanityurls::genUrl_profil($v['value']);
			$url = fe_vanityurls::genUrl_chat($v['value']);

			$aux[] 	= array('label'=>$v['label'],'value'=>$v['value'], 'id'=>$v['value'], 'url' => $url);
		}

		$json = json_encode($aux);

		echo $_REQUEST['callback'].'('.$json.');';
	}

	public static function getMyProfileImage()
	{
		$userId = intval(xredaktor_feUser::getUserId());

		if ($userId == 0) return false;

		return self::getProfileImage($userId);
	}

	public static function getDefaultImage($user)
	{

		switch ($user['wz_GESCHLECHT']) {
			case 'M':
				return self::$defaultImageMale;
				break;

			default:
				return self::$defaultImageFemale;
				break;
		}
	}

	public static function getDefaultImageByUserId($userId)
	{
		$userId = intval($userId);
		$user	= xredaktor_feUser::getUserRecordById($userId);

		return self::getDefaultImage($user);

	}


	################ Image processing


	public static function ajax_uploadImage($params)
	{

		if (!isset($_REQUEST['type']))
		{
			$type = "other";
		}
		else
		{
			$type 	= $_REQUEST['type'];
		}

		$refid	= intval($_REQUEST['refid']);

		if($_FILES['add-image-file']['error'] == 4)
		{
			return false;
		}
		elseif($_FILES['add-image-file']['error'] != 0)
		{
			die('NOK'.print_r($_FILES['add-image-file']['error']));
		}

		if($_FILES['add-image-file']['size'] > 10145728) // max. 10 MB
		{
			die('WRONGSIZE');
		}
		
		$extension = pathinfo($_FILES['add-image-file']['name'], PATHINFO_EXTENSION);
		$allowed = array('jpg', 'jpeg', 'png');

		if(!in_array(strtolower($extension), $allowed)){
			die('WRONGTYPE');
		}

		$safeFilename 		= xredaktor_niceurl::burnDownLink($_FILES['add-image-file']['name']).".jpg";

		$toMoveDestination  = dirname(__FILE__).'/../../xstorage/userbilder/'.$safeFilename;

		if(!move_uploaded_file($_FILES['add-image-file']['tmp_name'], $toMoveDestination)){
			die('NOK');
		}

		$storageDirId = 432;
		$s = xredaktor_storage::getById($storageDirId);
		if ($s['s_dir'] != 'Y') frontcontrollerx::html_failure('DIR_NOT_EXISTS',2);

		$src = dirname(__FILE__).'/../../xstorage/userbilder/'.$safeFilename;
		if(!file_exists($src)){
			die('NOTEXISTS');
		}
        
		$convert = Ixcore::PATH_ImageMagick;
// 		$cmd = "$convert -units PixelsPerInch -resample 72 -auto-orient -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." '$src' '$src'  2>&1 ";
		$cmd = "$convert -units PixelsPerInch -density 72 -resample 72 -auto-orient -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." '$src' '$src'  2>&1 "; 			
		$cmd = exec($cmd, $out);
		
		
		$image_s_id 	= xredaktor_storage::registerFileInStorage($storageDirId,$src,$_FILES['add-image-file']['name']);

		if($image_s_id === false) return false;

		$uploaded_file = xredaktor_storage::getById($image_s_id);
		
		$file_src = $uploaded_file['s_onDisk'];


		// bis hier her haben wir einfach die Datei übertragen
		// jetzt DPI + rotation setzen
		/*
		$convert = Ixcore::PATH_ImageMagick;
		//$cmd = "$convert -units PixelsPerInch -resample 72 -auto-orient -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." '$file_src' '$file_src'  2>&1 ";
		$cmd = "$convert -auto-orient -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." '$file_src' '$file_src'  2>&1 ";
		$cmd = exec($cmd, $out);
        */

		// jetzt sollte man noch die filesize updaten...


		// jetzt in xr_img2 werfen - sollte dann korrekte s_media_w und _h setzen

		// rotate if neccessary
		//xredaktor_storage::rotate_if_necessary($image_s_id);

		if (libx::isDeveloper())
		{
			// kamerabild
			//$image_s_id = 18213;

			// pixel bild querformat
			//$image_s_id = 18203;

			// pixel bild quadratisch
			//$image_s_id = 18251;
		}

		$img = xredaktor_storage::xr_img2(array(
			's_id' 	=> $image_s_id,
			 'ext' 	=>'jpg',
			 'q'	=>	90
		));

		$imageData  = array(
			'src' 	=> $img['src'],
			's_id' 	=> $image_s_id,
			'trueW' => $img['w'],
			'trueH' => $img['h']
		);

		$_SESSION['image']['src'] 	= $imageData['src'];
		$_SESSION['image']['s_id'] 	= $imageData['s_id'];
		$_SESSION['image']['trueW'] = $imageData['trueW'];
		$_SESSION['image']['trueH'] = $imageData['trueH'];

		$a_id = 746;

		$html = xredaktor_render::renderSoloAtom($a_id, array('image' =>$imageData, 'type' => $type, 'refid' => $refid));

		frontcontrollerx::json_success(array('data' => array('html' => $html)));

	}


	public static function ajax_finalSubmit()
	{

		$userId	= 0;

		$s_id	= intval($_REQUEST['s_id']);

		if (!isset($_REQUEST['type']))
		{
			$type = "other";
		}
		else
		{
			$type 	= $_REQUEST['type'];
		}

		$refid	= intval($_REQUEST['refid']);
		$userId = intval(xredaktor_feUser::getUserId());

		if ($s_id == 0) 	return false;
		if ($userId == 0) 	return false;

		switch ($type) {
			case 'other':
			case 'profile':
				self::handleFinalSubmit($userId, $s_id, $type);
				break;
			case 'other-room':
				self::handleFinalSubmitRoom($refid, $s_id, $type);
				break;
			default:
				frontcontrollerx::json_failure("ERROR: Type not set");
				break;
		}
	}

	public static function handleFinalSubmitRoom($roomId, $s_id, $type)
	{
		//print_r(compact('roomId', 's_id', 'type'));die('ML');
		$roomId 	= intval($roomId);
		$s_id		= intval($s_id);
		$type		= dbx::escape($type);

		$isAdmin 	= fe_room::checkIfIAmAdminOfThisRoom($roomId);
		if ($isAdmin === false) frontcontrollerx::json_failure();

		$db		= array(
			'wz_ROOMID' 		=> $roomId,
			'wz_S_ID' 			=> $s_id,
			'wz_TYPE'			=> 'OTHER'
		);

		dbx::insert("wizard_auto_810", $db);

		dbx::update("wizard_auto_809", array('wz_PROFILBILD' => $s_id), array('wz_id' => $roomId));

		frontcontrollerx::json_success();
	}

	
	public static function handleFinalSubmit($userId, $s_id, $type)
	{
		$userId 	= intval($userId);
		$s_id		= intval($s_id);
		$type		= dbx::escape($type);
	
		$db		= array(
				'wz_USERID' 		=> $userId,
				'wz_S_ID' 			=> $s_id,
				'wz_TYPE'			=> $type
		);
	
		dbx::insert("wizard_auto_720", $db);
	
		if ($type == 'profile')
		{
			dbx::update("wizard_auto_707", array('wz_PROFILBILD' => $s_id), array('wz_id' => $userId));
		}
	
		frontcontrollerx::json_success();
	}
	
	
	
	public static function ajax_get_dkrm_image()
	{
		$base64img = $_REQUEST['img'];

		// canbas.toDataURL() hat ein eigenes Format beim String. in dem sind LEERZEICHEN...
		// Deshalb: VIELEN VIELEN DANK an winkelnkemper@gmail ... AUF SOWAS WÜRDE KEIN MENSCH KOMMEN!!!
		// http://php.net/manual/de/function.base64-decode.php#102113
		$base64img = str_replace(' ','+',$base64img);

		// jetzt gehts wieder normal weiter...
		$base64img = str_replace('data:image/png;base64,', '', $base64img);
		$base64img = base64_decode($base64img);
		//header('HTTP/1.0 200 Ok'); header('Content-Type: image/png'); echo $base64img; die();

		$userId			= xredaktor_feUser::getUserId();
		$final_filename = 'userpic_darkroomcropped_' . $userId . '_' . md5(rand(0,9999999) . time())  . '.png';

		$tmpFilename = hdx::getTempFileName('userpic', '.png');
		file_put_contents($tmpFilename, $base64img);

		//432 = dir von userbildern
		$new_s_id = intval(xredaktor_storage::registerFileInStorage(432,$tmpFilename,$final_filename,true,true));

		if ($new_s_id == 0)
		{
			frontcontrollerx::json_failure();
		}

		dbx::update("wizard_auto_707", array('wz_PROFILBILD' => $new_s_id), array('wz_id' => $userId));
		frontcontrollerx::json_success();
	}

	
	/**
	 * // das gecroppte file (vom xr_img3) mit neuem namen in storage haun
		$filename_with_cropinfo = $dir . '/cropped/' . $name;
		copy($maybeCroppedImg['src'], $filename_with_cropinfo);

		xredaktor_storage::delFiles(array($s_id), true);

		$new_s_id = xredaktor_storage::registerExistingFile(1,$filename_with_cropinfo);
		$new_s_id = intval($new_s_id);

		dbx::update('storage',array('
			s_crop_original_s_id'=>$s_id,'s_crop_data'=>json_encode($cropdata)),array('s_id'=>$new_s_id)
		);

		$a_id = 747;
		$imageData = array('new_s_id'=>$new_s_id, 'xparams' => $params, 'xcropdata' => $cropdata);
		$html = xredaktor_render::renderSoloAtom($a_id, array('image' =>$imageData, 'type' => $type, 'refid' => $refid));
		
		frontcontrollerx::json_success(array('data' => array('html' => $html)));
	 * 
	 */

	public static function myescapeshellarg($arg){
		return "'".str_replace("'","\\'",$arg)."'";
	}

	public static function ajax_saveGuillotineImg()
	{
		$formData 	= $_REQUEST['glltFormData'];
		$cropData	= $_REQUEST['glltCropData'];
		
		$s_id = intval($formData['s_id']);

		$imgUploaded = xredaktor_storage::getById($s_id);
		$imgUploaded = $imgUploaded['s_onDisk'];
		
		if($s_id == 0) return frontcontrollerx::json_failure("FILE ID NOT VALID");
		if(!file_exists($imgUploaded)) return frontcontrollerx::json_failure('FILE NOT EXISTS');
		if(!is_file($imgUploaded)) return frontcontrollerx::json_failure('NO FILE');
		
		$type = $formData['type'];

		$refid = intval($_REQUEST['refid']);		
		if(intval($formData['p_id']) == 42 || intval($formData['p_id']) == 7)
		{
			
		}
		else
		{
			$refid = $_REQUEST['roomId'];
		}			
		$params = array(
				's_id' 	=> $s_id,
				'type' 	=> $type,
				'refid' => $refid,
				'w'		=> $cropData['w'],
				'h' 	=> $cropData['h'],
				'ext' 	=> 'jpg',
				'crop'	=> json_encode(array(
						'x' => $cropData['x'],
						'y' => $cropData['y'],
						'w' => $cropData['w'],
						'h' => $cropData['h'],
				))
		);
		$inFile  = realpath($imgUploaded);
		$outFileName = '/' . "_cropped_" . basename($inFile);
		$outFile = Ixcore::htdocsRoot . '/xstorage/userbilder/cropped'.$outFileName;

		if(file_exists($outFile)) unlink($outFile);
				
		$scale 	= $cropData['scale']*100;
		$rotate = intval($cropData['angle']);
		$w 		= $cropData['w'];
		$h 		= $cropData['h'];
		$x 		= $cropData['x'];
		$y 		= $cropData['y'];
		
		$inFileEscapped = self::myescapeshellarg($inFile);
		$outFileEscapped = self::myescapeshellarg($outFile);
		
		$convert = Ixcore::PATH_ImageMagick;

		//$cmd = "$convert $inFileEscapped -resize $scale".'%'." -gravity northwest -crop $w".'X'."$h+$x+$y $outFileEscapped 2>&1";
		$cmd = "$convert $inFileEscapped -rotate $rotate -resize $scale".'%'." -crop $w".'X'."$h+$x+$y $outFileEscapped 2>&1";
		
		$out = array();
 		exec($cmd,$out);

 		if(!file_exists($outFile)) return frontcontrollerx::json_failure('CROP ERROR - FILE MISSING');

		xredaktor_storage::delFiles(array($s_id), true);
		$new_s_id = xredaktor_storage::registerExistingFile(1,$outFile);
		$new_s_id = intval($new_s_id);
		
		unset($cropData['angle']);
		unset($cropData['scale']);
		$s_crop_data = $cropData;
		
		dbx::update('storage',array('s_crop_original_s_id'=>$s_id,'s_crop_data'=>json_encode($s_crop_data)),array('s_id'=>$new_s_id));
		
		$a_id = 747;
		
		$imageData = array('new_s_id'=>$new_s_id, 'refid' => $cropData['refid'], 'xparams' => $params, 'xcropdata' => $cropData);

		$html = xredaktor_render::renderSoloAtom($a_id, array('image' =>$imageData, 'type' => $type, 'refid' => $cropData['refid']));
		
		frontcontrollerx::json_success(array('data' => array('html' => $html)));
	}


	public static function ajax_cropImageAndSaveNew()
	{
		$crop = array();
		$crop = $_REQUEST;
		unset($crop['url']);


		// profil upload - per p_id catchen, pfeif auf den type
		if (intval($crop['p_id']) == 42 || intval($crop['p_id']) == 7)
		{
			$type = 'profile';
		} else {
			$type = 'other-room';
		}

		$refid	= intval($_REQUEST['refid']);
		$s_id   = intval($crop['s_id']);

		// SMOOTHZOOM
		if ($crop['uploader'] == 'smoothZoom')
		{
			$crop['normX'] 			 = floatval($crop['normX']);
			$crop['normY'] 			 = floatval($crop['normY']);
			$crop['normWidth'] 		 = intval($crop['normWidth']);
			$crop['normHeight'] 	 = intval($crop['normHeight']);
			$crop['centerX'] 		 = floatval($crop['centerX']);
			$crop['centerY'] 		 = floatval($crop['centerY']);
			$crop['selectionWidth']	 = floatval($crop['selectionWidth']);
			$crop['selectionHeight'] = floatval($crop['selectionHeight']);
			$crop['ratio'] 			 = floatval($crop['ratio']);
			$crop['s_id']			 = intval($crop['s_id']);


			$crop['devicepixelratio'] = floatval($crop['devicepixelratio']);

			$cropdata = array(
				'x' 	=> intval($crop['trueX']),
				'y' 	=> intval($crop['trueY']),
				'w' 	=> intval($crop['trueCropW']),
				'h' 	=> intval($crop['trueCropH']),
				's_id'	=> $s_id
			);


			if ($crop['devicepixelratio'] > 1)
			{
				//$cropdata['w'] 	= ($crop['selectionWidth'] / $crop['ratio']) * $crop['devicepixelratio'];
				//$cropdata['h'] 	= ($crop['selectionHeight'] / $crop['ratio']) * $crop['devicepixelratio'];
			}
			/*
			// mobiles gerät - canvas ist verzogen wegen zoom - also wieder wegrechnen
			*/

			/*
			// wieder echt-pixel rechnen
			$rechterRand = $cropdata['x'] + $cropdata['w'];
			if ($rechterRand > $crop['origW']) {
				$diff = $rechterRand - $crop['origW'];
				$cropdata['x'] -= $diff;
			}

			$untererRand = $cropdata['y'] + $cropdata['h'];
			if ($untererRand > $crop['origH']) {
				$diff = $untererRand - $crop['origH'];
				$cropdata['y'] -= $diff;
			}

			*/


			$params = array(
				's_id' 		=> $s_id,
				'w' 		=> intval($cropdata['w']),
				'h' 		=> intval($cropdata['h']),
				'ext' 		=> 'jpg',
				'fullpath' 	=> 'Y',
				'rmode'		=> 'vcut',
				'crop'		=> json_encode(array(
					'x' => intval($cropdata['x']),
					'y' => intval($cropdata['y']),
					'w' => intval($cropdata['w']),
					'h' => intval($cropdata['h'])
				))
			);

		}
		// JCROP
		else {
			$cropdata = array(
				'x' 	=> $_REQUEST['x1'],
				'y' 	=> $_REQUEST['y1'],
				'x2' 	=> $_REQUEST['x2'],
				'y2' 	=> $_REQUEST['y2'],
				'w' 	=> $_REQUEST['w'],
				'h' 	=> $_REQUEST['h'],
				's_id' 	=> $_REQUEST['s_id'],
			);

			$params = array(
				's_id' 		=> $s_id,
				'w' 		=> intval($crop['w']),
				'h' 		=> intval($crop['h']),
				'ext' 		=> 'jpg',
				'fullpath' 	=> 'Y',
				'rmode'		=> 'vcut',
				'crop'		=> json_encode(array(
					'x' => $_REQUEST['x1'],
					'y' => $_REQUEST['y1'],
					'w' => $_REQUEST['w'],
					'h' => $_REQUEST['h']
				))
			);
		}

		$filename = '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xstorage/upload_out_debug.txt';
		file_put_contents($filename, "\n\n " . date('Y-m-d H:i:s') . $_SERVER['HTTP_USER_AGENT'] . "\n" . print_r(array('cropdata' => $cropdata, 'crop' => $crop, 'params' => $params), true) . "\n", FILE_APPEND);

		if ($debug)
		{
			print_r(compact('crop', 'cropdata', 'params')); die('x');
		}

		// (eventuell gecropptes) image erzeugen

		$maybeCroppedImg = xredaktor_storage::xr_img3($params);


		// jetzt originalfilenamen mit _auto_cropped_x0_y0_w300_h300 angehängt
		$srcFile	= xredaktor_storage::getFileDstById($s_id);
		$dir 		= dirname($srcFile);
		$name 		= basename($srcFile);

		$nameSplitted = explode(".",$name);
		$ext 		  = array_pop($nameSplitted);
		$tagCrop 	= array();
		$tagCrop[] 	= "x".intval($crop['x1']);
		$tagCrop[] 	= "y".intval($crop['y1']);
		$tagCrop[] 	= "w".intval($crop['w']);
		$tagCrop[] 	= "h".intval($crop['h']);
		$tagCrop	= implode("_",$tagCrop);

		$nameSplitted = implode(".",$nameSplitted);
		$nameSplitted = xredaktor_niceurl::burnDownLink($nameSplitted);

		$name		  = $nameSplitted.'_auto_cropped_'.$tagCrop.'.'.$ext;

		// das gecroppte file (vom xr_img3) mit neuem namen in storage haun
		$filename_with_cropinfo = $dir . '/cropped/' . $name;
		copy($maybeCroppedImg['src'], $filename_with_cropinfo);

		xredaktor_storage::delFiles(array($s_id), true);

		$new_s_id = xredaktor_storage::registerExistingFile(1,$filename_with_cropinfo);

		$new_s_id = intval($new_s_id);


		dbx::update('storage',array('s_crop_original_s_id'=>$s_id,'s_crop_data'=>json_encode($cropdata)),array('s_id'=>$new_s_id));

		$a_id = 747;

		$imageData = array('new_s_id'=>$new_s_id, 'xparams' => $params, 'xcropdata' => $cropdata);

		$html = xredaktor_render::renderSoloAtom($a_id, array('image' =>$imageData, 'type' => $type, 'refid' => $refid));

		frontcontrollerx::json_success(array('data' => array('html' => $html)));

	}



	public static function ajax_toggleFav()
	{
		$userId			= xredaktor_feUser::getUserId();
		$f_userId		= intval($_REQUEST['f_userId']);
		$theType		= $_REQUEST['theType'];

		if ($f_userId == 0) frontcontrollerx::json_failure();

		switch ($theType) {
			case 'room':
				$table = fe_user::table_room_fav;
				break;
			default:
				$table = fe_user::table_user_fav;
				break;
		}

		$present = dbx::query("select wz_id from $table where wz_USERID = $userId AND wz_F_USERID = $f_userId");

		// insert into fav
		if ($present === false)
		{

			dbx::insert($table, array('wz_USERID' => $userId, 'wz_F_USERID' => $f_userId));
			$state = true;

			// WEB-339: in this case, also remove from block
			$is_blocked = false;

			// ROOM
			if ($theType == 'room')
			{
				$is_blocked = self::getUser2RoomState($userId, $f_userId, "block");
				if ($is_blocked)
				{
					$table = fe_user::table_room_block;
				}
			}

			// USER
			else
			{
				$is_blocked = self::getUser2UserState($userId, $f_userId, "block");
				if ($is_blocked)
				{
					$table = fe_user::table_user_block;
				}

			}
			if ($is_blocked)
			{
				dbx::query("delete from $table where wz_USERID = $userId AND wz_F_USERID = $f_userId limit 1");
			}
		}

		// remove from fav
		else
		{
			dbx::query("delete from $table where wz_USERID =$userId AND wz_F_USERID = $f_userId limit 1");
			$state = false;
		}

		frontcontrollerx::json_success(array('state' => $state));
	}


	public static function ajax_toggleBlock()
	{
		$userId			= xredaktor_feUser::getUserId();
		$f_userId		= intval($_REQUEST['f_userId']);
		$theType		= $_REQUEST['theType'];

		if ($f_userId == 0)
		{
			frontcontrollerx::json_failure();
		}

		switch ($theType) {
			case 'room':
				$table = fe_user::table_room_block;
				break;
			default:
				$table = fe_user::table_user_block;
				break;
		}

		$present = dbx::query("select wz_id from $table where wz_USERID = $userId AND wz_F_USERID = $f_userId");

		// insert into block
		if ($present === false)
		{
			dbx::insert($table, array('wz_USERID' => $userId, 'wz_F_USERID' => $f_userId));
			$state = true;

			// WEB-339: in this case, also remove from fav
			$is_fav = false;
			// ROOM
			if ($theType == 'room')
			{
				$is_fav = self::getUser2RoomState($userId, $f_userId, "fav");
				if ($is_fav)
				{
					$table = fe_user::table_room_fav;
				}
			}

			// USER
			else
			{
				$is_fav = self::getUser2UserState($userId, $f_userId, "fav");
				if ($is_fav)
				{
					$table = fe_user::table_user_fav;
				}
			}

			if ($is_fav)
			{
				dbx::query("delete from $table where wz_USERID = $userId AND wz_F_USERID = $f_userId limit 1");
			}

		}
		else
		{
			// remove from block
			dbx::query("delete from $table where wz_USERID = $userId AND wz_F_USERID = $f_userId ");
			$state = false;
		}

		frontcontrollerx::json_success(array('state' => $state));
	}

	public static function getMatchPercent($userId, $fUserId, $returnArray = false)
	{
		$result		= fe_matching::matchUsers($userId,$fUserId, true); // mark

		if ($returnArray == true)
		{
			return $result;
		}
		else
		{
			return $result['matchGesamt'];
		}
	}

	public static function getUsersByRoomId($roomId, $genderCountOnly = false)
	{

		$roomId 		= intval($roomId);
		if ($roomId == 0) return array();

		$user 	= array();

		//$admin 				= dbx::queryAttribute("select * from wizard_auto_809 where wz_id = $roomId", "wz_ADMIN");
		//$user[]				= $admin;
		$mitbewohner		= dbx::queryAll("select * from wizard_auto_SIMPLE_W2W_707_809 where wz_id_high = $roomId");

		foreach ($mitbewohner as $k => $v) {
			$user[]			= $v['wz_id_low'];
		}

		if ($genderCountOnly === true)
		{
			return self::genderCountByMitbewohnerIds($user);
		}

		return $user;
	}


	public static function genderCountByMitbewohnerIds($ids)
	{

		$cnt_f 	= 0;
		$cnt_m 	= 0;

		if (!is_array($ids) || count($ids) == 0) return array();
		$idsStr = "(".implode(",", $ids).")";

		if ($idsStr == "()") return array();

		$user	= dbx::queryAll("select * from wizard_auto_707 where wz_id in $idsStr");

		foreach ($user as $k => $v)
		{
			switch ($v['wz_GESCHLECHT']) {
				case 'F':
					$cnt_f++;
					break;

				case 'M':
					$cnt_m++;
					break;

				default:
					break;
			}
		}

		return array(
			'F' => $cnt_f,
			'M'	=> $cnt_m
		);

	}

	public static function getUserAgespanByRoomId($roomId)
	{
		$ret = array(
			'FROM'  => false,
			'TO'	=> false
		);

		$useData = 'room';


		if ($useData == 'mitbewohner_n2n')
		{
			$user			= self::getUsersByRoomId($roomId);
			foreach ($user as $userId)
			{
				$details = self::getUserDataOnly($userId);

				$age = intval($details['user_age']);
				if ($age == 0) continue;

				if ($age < intval($ret['FROM'])) $ret['FROM'] = $age;
				if ($age > intval($ret['TO'])) 	 $ret['TO']   = $age;
			}
		}
		else if ($useData == 'room')
		{
			$room = dbx::query("SELECT wz_MITBEWOHNER_ALTER_VON, wz_MITBEWOHNER_ALTER_BIS FROM wizard_auto_809 WHERE wz_id = $roomId ");
			$ret['FROM'] = intval($room['wz_MITBEWOHNER_ALTER_VON']);
			$ret['TO'] = intval($room['wz_MITBEWOHNER_ALTER_BIS']);
		}

		return $ret;
	}

	public static function getUsersByRoomIdWithDetails($roomId)
	{
		$roomId 		= intval($roomId);
		if ($roomId == 0) return array();

		$user			= self::getUsersByRoomId($roomId);

		$result			= array();

		foreach ($user as $k => $v) {
			$userId = intval($v);

			$result[] = self::getUserData($userId);

		}

		return $result;
	}


	public static function setUserInactive($userId)
	{

		$userId = intval($userId);
		if ($userId == 0) return false;
		dbx::update('wizard_auto_707', array('wz_active' => 'N'), array('wz_id' => $userId));

		// DELETE ROOMS MITBEWOHNER n2n
		dbx::query("DELETE FROM wizard_auto_SIMPLE_W2W_707_809 WHERE wz_id_low = $userId ");

		// ROOM wz
		$roomsWhereUserIsAdmin = dbx::queryAll("SELECT wz_id FROM wizard_auto_809 WHERE wz_ADMIN = $userId AND wz_del = 'N' ");
		foreach ($roomsWhereUserIsAdmin as $room)
		{
			// count checken - uns selbst haben wir schon vorher bei delete rooms n2n rausgelöscht
			// wenn jetzt hier keiner mehr kommt können wir den raum löschen
			$roomId = intval($room['wz_id']);
			$mitbewohner_count = dbx::queryAttribute("SELECT COUNT(*) AS cntx FROM wizard_auto_SIMPLE_W2W_707_809 WHERE wz_id_high = $roomId ", 'cntx');
			$mitbewohner_count = intval($mitbewohner_count);
			if ($mitbewohner_count > 0)
			{
				continue;
			}

			dbx::update("wizard_auto_809", array('wz_ACTIVE' 	=> 'N'),array('wz_id' => $roomId));
		}

		return true;
	}
	public static function setUserActive($userId)
	{
		$userId = intval($userId);
		if ($userId == 0) return false;
		dbx::update('wizard_auto_707', array('wz_active' => 'Y'), array('wz_id' => $userId));
		return true;
	}

	public static function ajax_delContent()
	{

		$type 		= dbx::escape($_REQUEST['type']);
		$id			= intval($_REQUEST['id']);
		$userId		= intval(xredaktor_feUser::getUserId());

		// room
		if ($type == 'room')
		{
			fe_room::deleteRoom($id);
			frontcontrollerx::json_success();
			die();
		}

		// room pictures
		if ($type == 'bild-room')
		{
			fe_room::delContentRoom($type, $id);
			die();
		}

		if ($type == 'user_inactive')
		{
			fe_user::setUserInactive($userId);
			frontcontrollerx::json_success();
		}

		if ($type == 'user_active')
		{
			fe_user::setUserActive($userId);
			frontcontrollerx::json_success();
		}

		if ($type == 'disable_my_account')
		{
			fe_user::deactivate_user_account($userId);
			frontcontrollerx::json_success();
		}

		// user stuff
		if ($userId == 0 || $id == 0)
		{
			frontcontrollerx::json_success();
		}

		switch ($type)
		{
			case 'bild':
				$table = "wizard_auto_720";
				break;
			case 'chat':
				$table = "chatitems";
				break;
			default:
				return false;
				break;
		}

		$present = dbx::query("select * from $table where wz_USERID = $userId and wz_id = $id");

		if ($present === false) {
			frontcontrollerx::json_success();
		}
		else
		{
			switch ($type)
			{
				case 'bild':
					dbx::update($table, array('wz_del' => 'Y'), array('wz_USERID' => $userId, 'wz_id' => $id));
					break;
				case 'chat':
					dbx::update($table, array('wz_MESSAGE' => 'Diese Nachricht wurde gelöscht', 'wz_DELETED' => 'Y'), array('wz_USERID' => $userId, 'wz_id' => $id));
					break;
				default:
					return false;
					break;
			}
		}

		frontcontrollerx::json_success();
	}


	public static function burnMail($email,$pageId,$subject='',$replacersExtra=false,$attachments=array(), $replyToEmail = false, $replyToName = false) {

		$replacers = array();

		$replacers = array_merge($replacers,$replacersExtra);

		$html 			= "";
		$send2 			= array();

		$customerMail	= $email;

		if ($customerMail != "") {
			$send2[] = $customerMail;
		}

		$mailSettings = xredaktor_niceurl::getSiteConfigViaPageId($pageId);

		if (count($send2)>0)
		{
			$html = xredaktor_render::renderPage($pageId,true,array(),false);

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

				$replyTo = array('email' => xredaktor_feUser::getFromMail_EMAIL($mailSettings),	'name' => xredaktor_feUser::getFromMail_NAME($mailSettings));

				if ($replyToEmail !== false) {
					$replyTo['email'] = $replyToEmail;
				}

				if ($replyToName !== false) {
					$replyTo['name'] = $replyToName;
				}


				$mailCfg = array(
				'to'						=> array('email' => $to, 'name'=>$to),
				'from'						=> array('email' => xredaktor_feUser::getFromMail_EMAIL($mailSettings),	'name' => xredaktor_feUser::getFromMail_NAME($mailSettings)),
				'reply'						=> $replyTo,
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

	public static function setErrorMessage($translateStr)
	{
		session_start();
		$_SESSION['error_message'] = xredaktor_translate::doTranslate($translateStr, xredaktor_pages::getFrontEndLang(), 1);

		return $_SESSION['error_message'];
	}

	public static function sc_clearSessionErrorMessage($params)
	{
		return self::clearSessionErrorMessage();
	}

	public static function clearSessionErrorMessage()
	{
		session_start();
		$_SESSION['error_message'] = null;
		$_SESSION['error_messages'] = null;
		unset($_SESSION['error_message']);
		unset($_SESSION['error_messages']);
		return true;
	}

	public static function handleImageDownload($imageurl,$fbId)
	{
		$fbId = trim($fbId);

		if($fbId == '')
		{
			return false;
		}

		list($nakedUrl,$crap) = explode("?",$imageurl);

		$fbFilename 		= basename($nakedUrl);

		$ext = pathinfo($fbFilename, PATHINFO_EXTENSION);

		$img2Store 	= '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xstorage/userbilderFacebook/'.$fbId.'.'.$ext;

		if (!file_exists($img2Store) || (filesize($img2Store) == 0))
		{
			file_put_contents($img2Store, file_get_contents($imageurl));
			if (filesize($img2Store) == 0)
			{
				return false;
			}
		}

		$image_sid = 0;

		$img2Store = dbx::escape($img2Store);

		$presentFile = dbx::query("SELECT * FROM storage WHERE s_onDisk = '$img2Store' AND s_del = 'N'");

		if ($presentFile === false)
		{
			$image_sid = xredaktor_storage::registerExistingFile(1,$img2Store);
		}
		else
		{
			$image_sid = intval($presentFile['s_id']);
		}

		return $image_sid;
	}

	public static function ajax_doFacebookLoginSimple()
	{
		$fbAuth = self::checkFacebookAuth($_REQUEST['accessToken']);

		$FACEBOOK_ID 	= trim($_REQUEST['id']);

		if($FACEBOOK_ID != $fbAuth['id'])
		{
			frontcontrollerx::json_success(array('status'=>'NOK','msg'=>'Invalid User'));
			die();
		}

		$FACEBOOK_ID 	= dbx::escape($FACEBOOK_ID);
		$EMAIL			= trim($_REQUEST['email']);

		$VORNAME		= trim($_REQUEST['first_name']);
		$NACHNAME		= trim($_REQUEST['last_name']);

		$GESCHLECHT = trim($_REQUEST['gender']);

		$redirectUrl = fe_vanityurls::genUrl_suche();

		
		$presentUser = dbx::query("SELECT * FROM wizard_auto_707 WHERE wz_FACEBOOK_ID = '$FACEBOOK_ID' AND wz_del = 'N' AND wz_online = 'Y'");
		
		if($presentUser !== false)
		{
			$counter = $presentUser['wz_LOGINCOUNTER'];
			++$counter;
			dbx::update("wizard_auto_707", array('wz_LOGINCOUNTER' => $counter), array('wz_id' => intval($presentUser['wz_id'])));
		}

		if(isset($_SESSION['LAST_PUBLIC_ROMM_ID']))
		{
			$LAST_PUBLIC_ROMM_ID = intval($_SESSION['LAST_PUBLIC_ROMM_ID']);

			if($LAST_PUBLIC_ROMM_ID > 0)
			{
				unset($_SESSION['LAST_PUBLIC_ROMM_ID']);

				$redirectUrl = fe_vanityurls::genUrl_room($LAST_PUBLIC_ROMM_ID);

				// return fe_vanityurls::genUrl_room($LAST_PUBLIC_ROMM_ID);
			}
		}		
		
		if(isset($_SESSION['DEACTIVATE_ACCOUNT']))
		{
			if(intval($_SESSION['DEACTIVATE_ACCOUNT']) > 0)
			{
				unset($_SESSION['DEACTIVATE_ACCOUNT']);
				$redirectUrl = fe_vanityurls::genUrl_myprofile() . "?deactivate-account";
			}
		}
		
		if(isset($_SESSION['ROOM_LISTVIEW']) && ($presentUser !== false && $presentUser['wz_TYPE'] == 'biete'))
		{	
			if(intval($_SESSION['ROOM_LISTVIEW']) > 0)
			{
				unset($_SESSION['ROOM_LISTVIEW']);
				$redirectUrl = fe_vanityurls::genUrl_myprofile() . "?room-list-view";
			}
		}
					

////// CHECK IF ACTIVATE NEEDED
		if (isset($_REQUEST['h']) && $_REQUEST['h'] != '')
		{
			$presentUser = dbx::query("SELECT * FROM wizard_auto_707 WHERE (wz_FACEBOOK_ID = '$FACEBOOK_ID' || wz_EMAIL = '$EMAIL') AND wz_del = 'N' AND wz_online = 'Y'");

			if ($presentUser['wz_IS_TMP_USER'] == 'Y')
			{
				$tmpUserId = intval($presentUser['wz_id']);
				$counter = $presentUser['wz_LOGINCOUNTER'];
				++$counter;

				dbx::query("UPDATE wizard_auto_707 SET wz_FACEBOOK_ID = '$FACEBOOK_ID', wz_LOGINCOUNTER = '$counter' WHERE wz_id = $tmpUserId");


				if (isset($_REQUEST['h']) && $_REQUEST['h'] != '')
				{
					$hash = trim(dbx::escape($_REQUEST['h']));
					$ok = dbx::query("select * from wizard_auto_809 where wz_del= 'N' and wz_HASH = '$hash' and wz_ADMIN = $tmpUserId");
					if ($ok !== false)
					{
						fe_room::activateRoomWithHash($ok['wz_id'], $hash);

					}
				}
			}


			if($presentUser === false)
			{

				// register mit facebook daten
					$FACEBOOK_ID 	= dbx::escape($FACEBOOK_ID);
					$EMAIL			= trim($_REQUEST['email']);
					$VORNAME		= trim($_REQUEST['first_name']);
					$NACHNAME		= trim($_REQUEST['last_name']);
					$AGB			= 'on';

					$db_user = self::$regDefaults;

					$db_user['wz_FACEBOOK_ID'] 			= $FACEBOOK_ID;
					$db_user['wz_EMAIL']				= $EMAIL;
					$db_user['wz_VORNAME']				= $VORNAME;
					$db_user['wz_NACHNAME']				= $NACHNAME;
					$db_user['wz_online']				= 'Y';
					$db_user['wz_created']				= 'NOW()';
					$db_user['wz_MAIL_CHECKED']			= 'Y';
					$db_user['wz_ACTIVE']				= 'Y';
					$db_user['wz_AGB_1']				= $AGB;
					$db_user['wz_TYPE'] 				= 'biete';

					dbx::insert('wizard_auto_707',$db_user);
					$feu_id = intval(dbx::getLastInsertId());
					xredaktor_feUser::refreshUserdata($feu_id);

					// als admin beim raum setzen
					if (isset($_REQUEST['h']) && $_REQUEST['h'] != '')
					{
						$hash = dbx::escape($_REQUEST['h']);
						$room = dbx::query("select * from wizard_auto_809 where wz_HASH = '$hash' && wz_HASH != ''");
						if ($room !== false)
						{
							$roomId = intval($room['wz_id']);
							dbx::update("wizard_auto_809", array('wz_ADMIN' => $feu_id), array('wz_id' => $roomId));

							// raum aktivieren
							fe_room::activateRoomWithHash($roomId, $hash);
						}
					}

					frontcontrollerx::json_success(array('status'=>'NOK','msg'=>'','redirect' => ''));
					die();
			}
		}

		if ($presentUser === false)
		{
			frontcontrollerx::json_success(array('status'=>'NOK','msg'=>'','redirect' => ''));
		}

		$feu_id = intval($presentUser['wz_id']);

		dbx::update('wizard_auto_707',array('wz_LASTLOGIN'=>'NOW()'),array('wz_id'=>$feu_id));

		xredaktor_feUser::refreshUserdata($feu_id);
		
		frontcontrollerx::json_success(array('status'=>'OK','msg'=>'','redirect' => $redirectUrl));
	}

	public static function ajax_doFacebookLogin()
	{
		$fbAuth = self::checkFacebookAuth($_REQUEST['accessToken']);

		$FACEBOOK_ID 	= trim($_REQUEST['id']);

		if($FACEBOOK_ID != $fbAuth['id'])
		{
			frontcontrollerx::json_success(array('status'=>'NOK','msg'=>'Invalid User'));
			die();
		}

		$FACEBOOK_ID 	= dbx::escape($FACEBOOK_ID);
		$EMAIL			= trim($_REQUEST['email']);

		$VORNAME		= trim($_REQUEST['first_name']);
		$NACHNAME		= trim($_REQUEST['last_name']);

		$ADRESSE			= trim($_REQUEST['ADRESSE']);
		$ADRESSE_STRASSE	= trim($_REQUEST['ADRESSE_STRASSE']);
		$ADRESSE_STRASSE_NR	= trim($_REQUEST['ADRESSE_STRASSE_NR']);
		$ADRESSE_PLZ		= trim($_REQUEST['ADRESSE_PLZ']);
		$ADRESSE_STADT		= trim($_REQUEST['ADRESSE_STADT']);
		$ADRESSE_LAT		= trim($_REQUEST['ADRESSE_LAT']);
		$ADRESSE_LNG		= trim($_REQUEST['ADRESSE_LNG']);
		$AGB				= (trim($_REQUEST['AGB']) == 'on') ? 'on' : 'off';

		if($AGB == 'off')
		{
			frontcontrollerx::json_success(array('status'=>'NOK','msg'=>'AGB'));
			die();
		}

		$landShort	= dbx::escape(trim($_REQUEST['ADRESSE_LAND']));

		$MIETE_BIS 	= intval($_REQUEST['MIETEMAX']);

		$GESCHLECHT = trim($_REQUEST['gender']);

		$searchData = array(
			'date'						=> '',
			'location'	=> array(
				'ADRESSE_STRASSE' 		=> $_REQUEST['ADRESSE_STRASSE'],
				'ADRESSE_STRASSE_NR' 	=> $_REQUEST['ADRESSE_STRASSE_NR'],
				'ADRESSE_PLZ' 			=> $_REQUEST['ADRESSE_PLZ'],
				'ADRESSE_STADT' 		=> $_REQUEST['ADRESSE_STADT'],
				'ADRESSE_LAT' 			=> $_REQUEST['ADRESSE_LAT'],
				'ADRESSE_LNG' 			=> $_REQUEST['ADRESSE_LNG'],
			),
			'adresse'					=> $_REQUEST['ADRESSE'],
			'price_from'				=> 1,
			'price_to'					=> $MIETE_BIS,
			'range'						=> 5,
			'type'						=> 'suche',
			'filter'					=> ''
		);

		$land		= dbx::queryAttribute("select * from wizard_auto_716 where wz_ISO2 = '$landShort'", "wz_id");

		$db_user = self::$regDefaults;

		$db_user['wz_FACEBOOK_ID'] 			= $FACEBOOK_ID;
		$db_user['wz_EMAIL']				= $EMAIL;
		$db_user['wz_VORNAME']				= $VORNAME;
		$db_user['wz_NACHNAME']				= $NACHNAME;
		$db_user['wz_ADRESSE']				= $ADRESSE;
		$db_user['wz_ADRESSE_STRASSE']		= $ADRESSE_STRASSE;
		$db_user['wz_ADRESSE_STRASSE_NR']	= $ADRESSE_STRASSE_NR;
		$db_user['wz_ADRESSE_PLZ']			= $ADRESSE_PLZ;
		$db_user['wz_ADRESSE_STADT']		= $ADRESSE_STADT;
		$db_user['wz_ADRESSE_LAND']			= intval($land);
		$db_user['wz_ADRESSE_LAT']			= $ADRESSE_LAT;
		$db_user['wz_ADRESSE_LNG']			= $ADRESSE_LNG;
		$db_user['wz_MIETE_BIS']			= $MIETE_BIS;
		$db_user['wz_GESCHLECHT']			= ($GESCHLECHT == 'male') ? 'M' : 'F';
		$db_user['wz_online']				= 'Y';
		$db_user['wz_created']				= 'NOW()';
		$db_user['wz_MAIL_CHECKED']			= 'Y';
		$db_user['wz_ACTIVE']				= 'Y';
		$db_user['wz_AGB_1']				= $AGB;

		$db_user['wz_TYPE'] = 'suche';

		if(intval($_REQUEST['p_id']) == 48)
		{
			$db_user['wz_TYPE'] 			= 'biete';
			$db_user['wz_MIETE_VON'] 	= $MIETE_BIS;
			$db_user['wz_MIETE_BIS']	= 1000;

			$searchData['type']			= 'biete';
			$searchData['price_from']	= $MIETE_BIS;
			$searchData['price_to']		= 1000;
		}


		$redirectUrl = fe_vanityurls::genUrl_suche();

		$presentUser = dbx::query("SELECT * FROM wizard_auto_707 WHERE wz_FACEBOOK_ID = '$FACEBOOK_ID' AND wz_del = 'N' AND wz_online = 'Y'");

		$counter	= $presentUser['wz_LOGINCOUNTER'];

		if($presentUser === false)
		{
			$presentEmail = false;

			if(filter_var($EMAIL, FILTER_VALIDATE_EMAIL))
			{
				$presentEmail = dbx::query("SELECT * FROM wizard_auto_707 WHERE wz_EMAIL = '$EMAIL' AND wz_del = 'N' AND wz_online = 'Y'");
			}

			if($presentEmail === false)
			{
				$profilPicUrl = trim($fbAuth['picture']['data']['url']);

				if($profilPicUrl != '')
				{
					$profilPic = intval(self::handleImageDownload($profilPicUrl,$FACEBOOK_ID));

					if($profilPic > 0)

					$db_user['wz_PROFILBILD'] = $profilPic;
				}

				$db_user['wz_SEARCHDATA'] = json_encode($searchData);

				dbx::insert('wizard_auto_707',$db_user);

				$feu_id = intval(dbx::getLastInsertId());

				xredaktor_feUser::refreshUserdata($feu_id);
			}
			else
			{
				$feu_id = intval($presentEmail['wz_id']);

				unset($db_user['wz_EMAIL']);
				unset($db_user['wz_created']);

				$dbUpdate = array();

				if(intval($presentEmail['wz_PROFILBILD']) == 0)
				{
					$profilPicUrl = trim($fbAuth['picture']['data']['url']);

					if($profilPicUrl != '')
					{
						$profilPic = intval(self::handleImageDownload($profilPicUrl,$FACEBOOK_ID));

						if($profilPic > 0)

						$dbUpdate['wz_PROFILBILD'] = $profilPic;
					}
				}

				$present_SEARCHDATA = json_decode($presentUser['wz_SEARCHDATA'],true);

				$searchData['type'] = $present_SEARCHDATA['type'];

				$db_user['wz_SEARCHDATA'] = json_encode($searchData);

				$dbUpdate['wz_FACEBOOK_ID'] = $FACEBOOK_ID;
				$dbUpdate['wz_SEARCHDATA'] 	= $db_user['wz_SEARCHDATA'];

				dbx::update('wizard_auto_707',$dbUpdate,array('wz_id'=>$feu_id));

				xredaktor_feUser::refreshUserdata($feu_id);
			}

			++$counter;

			dbx::update('wizard_auto_707',array('wz_LASTLOGIN'=>'NOW()','wz_LOGINCOUNTER'=>$counter),array('wz_id'=>$feu_id));

			if($db_user['wz_TYPE'] == 'biete' && $presentEmail === false)
			{

				foreach ($_REQUEST['frage'] as $key => $value) {
					$key 	= intval($key);
					$value 	= intval($value);

					if($feu_id > 0)
					{
						$wgTest = dbx::query("SELECT * FROM wizard_auto_765 WHERE wz_FRAGE_ID = $key AND wz_USERID = $feu_id");

						$db_frage = array(
							'wz_FRAGE_ID' 			=> $key,
							'wz_USERID' 			=> $feu_id,
							'wz_ANTWORT_BIN' 		=> $value,
							'wz_ANTWORT_SUCHE' 		=> $value,
							'wz_ANTWORT_WICHTIG' 	=> 3
						);

						if($wgTest === false)
						{
							dbx::insert('wizard_auto_765',$db_frage);
						}
						else
						{
							dbx::update('wizard_auto_765',$db_frage,array('wz_id'=>intval($wgTest['wz_id'])));
						}

					}
				}

				if($feu_id > 0)
				{
					fe_matching::clearMatchingResults($feu_id);
				}

				$insert = array(
					'wz_ADMIN' 		=> $feu_id,
					'wz_online' 	=> 'Y',
					'wz_created' 	=> 'NOW()',
					'wz_ACTIVE' 	=> 'Y'
				);
				// defaultwerte hinzufügen
				$insert = array_merge($insert, fe_room::$regDefaults);

				$insert['wz_MIETE'] 				= $MIETE_BIS;
				$insert['wz_ADRESSE']				= $ADRESSE;
				$insert['wz_ADRESSE_STRASSE']		= $ADRESSE_STRASSE;
				$insert['wz_ADRESSE_STRASSE_NR']	= $ADRESSE_STRASSE_NR;
				$insert['wz_ADRESSE_PLZ']			= $ADRESSE_PLZ;
				$insert['wz_ADRESSE_STADT']			= $ADRESSE_STADT;
				$insert['wz_ADRESSE_LAND']			= intval($land);
				$insert['wz_ADRESSE_LAT']			= $ADRESSE_LAT;
				$insert['wz_ADRESSE_LNG']			= $ADRESSE_LNG;

				dbx::insert("wizard_auto_809", $insert);

				$myRoomId	= dbx::getLastInsertId();

				fe_room::assignUser2Room($feu_id, $myRoomId);

		        // raum in matching room Todo eintragen
		        dbx::insert('wizard_auto_853', array('wz_ROOMID' => $myRoomId, 'wz_STATUS' => 'TODO'));

				$redirectUrl = xredaktor_niceurl::genUrl(array('p_id' => 30, 'm_suffix' => $myRoomId, 'roomId' => $myRoomId, 'comingFromRedirect' => 1));
			}
			else
			{
				$redirectUrl = xredaktor_niceurl::genUrl(array('p_id' => 8));
			}
		}
		else
		{
			$feu_id = intval($presentUser['wz_id']);

			++$counter;

			dbx::update('wizard_auto_707',array('wz_LASTLOGIN'=>'NOW()','wz_LOGINCOUNTER'=>$counter),array('wz_id'=>$feu_id));

			$dbUpdate = array();

			if(intval($presentEmail['wz_PROFILBILD']) == 0)
			{
				$profilPicUrl = trim($fbAuth['picture']['data']['url']);

				if($profilPicUrl != '')
				{
					$profilPic = intval(self::handleImageDownload($profilPicUrl,$FACEBOOK_ID));

					if($profilPic > 0)

					$dbUpdate['wz_PROFILBILD'] = $profilPic;
				}
			}

			$present_SEARCHDATA = json_decode($presentUser['wz_SEARCHDATA'],true);

			$searchData['type'] = $present_SEARCHDATA['type'];

			$db_user['wz_SEARCHDATA'] = json_encode($searchData);

			$dbUpdate['wz_SEARCHDATA'] 	= $db_user['wz_SEARCHDATA'];

			dbx::update('wizard_auto_707',$dbUpdate,array('wz_id'=>$feu_id));

			xredaktor_feUser::refreshUserdata($feu_id);
		}

		foreach ($_REQUEST['frage'] as $key => $value) {
			$key 	= intval($key);
			$value 	= intval($value);

			if($feu_id > 0)
			{
				$wgTest = dbx::query("SELECT * FROM wizard_auto_765 WHERE wz_FRAGE_ID = $key AND wz_USERID = $feu_id");

				$db_frage = array(
					'wz_FRAGE_ID' 			=> $key,
					'wz_USERID' 			=> $feu_id,
					'wz_ANTWORT_BIN' 		=> $value,
					'wz_ANTWORT_SUCHE' 		=> $value,
					'wz_ANTWORT_WICHTIG' 	=> 3
				);

				if($wgTest === false)
				{
					dbx::insert('wizard_auto_765',$db_frage);
				}
				else
				{
					dbx::update('wizard_auto_765',$db_frage,array('wz_id'=>intval($wgTest['wz_id'])));
				}
			}
		}

		if($feu_id > 0)
		{
			fe_matching::clearMatchingResults($feu_id);
		}

		if(isset($_SESSION['LAST_PUBLIC_ROMM_ID']))
		{
			$LAST_PUBLIC_ROMM_ID = intval($_SESSION['LAST_PUBLIC_ROMM_ID']);

			if($LAST_PUBLIC_ROMM_ID > 0)
			{
				unset($_SESSION['LAST_PUBLIC_ROMM_ID']);

				$redirectUrl = fe_vanityurls::genUrl_room($LAST_PUBLIC_ROMM_ID);

				// return fe_vanityurls::genUrl_room($LAST_PUBLIC_ROMM_ID);
			}
		}


		frontcontrollerx::json_success(array('status'=>'OK','msg'=>'','redirect' => $redirectUrl));
	}

	public static function ajax_doSimpleLogin()
	{
		$EMAIL		= dbx::escape(trim($_REQUEST['v2_EMAIL']));
		$PASSWORT	= dbx::escape($_REQUEST['v2_PASSWORT']);

/////// USER LOGIN AUS KALT
		$user		= dbx::query("select * from wizard_auto_707 where wz_EMAIL = '$EMAIL' AND wz_del = 'N' ");
		$tmpUserId	= intval($user['wz_id']);

/////// CHECK IF ACTIVATE NEEDED
		if ($user['wz_IS_TMP_USER'] == 'Y')
		{
			dbx::query("UPDATE wizard_auto_707 SET wz_PASSWORT = MD5('$PASSWORT') WHERE wz_id = $tmpUserId");

			if (isset($_REQUEST['h']) && $_REQUEST['h'] != '')
			{
				$hash = trim(dbx::escape($_REQUEST['h']));
				$ok = dbx::query("select * from wizard_auto_809 where wz_del= 'N' and wz_HASH = '$hash' and wz_ADMIN = $tmpUserId");

				if ($ok !== false)
				{
					fe_room::activateRoomWithHash($ok['wz_id'], $hash);
				}
			}
		}
////////

		$VORNAME			= trim($_REQUEST['VORNAME']);
		$NACHNAME			= trim($_REQUEST['NACHNAME']);

		$ADRESSE			= trim($_REQUEST['ADRESSE']);
		$ADRESSE_STRASSE	= trim($_REQUEST['ADRESSE_STRASSE']);
		$ADRESSE_STRASSE_NR	= trim($_REQUEST['ADRESSE_STRASSE_NR']);
		$ADRESSE_PLZ		= trim($_REQUEST['ADRESSE_PLZ']);
		$ADRESSE_STADT		= trim($_REQUEST['ADRESSE_STADT']);
		$ADRESSE_LAT		= trim($_REQUEST['ADRESSE_LAT']);
		$ADRESSE_LNG		= trim($_REQUEST['ADRESSE_LNG']);
		$AGB				= (trim($_REQUEST['AGB']) == 'on') ? 'on' : 'off';


		if($AGB == 'off')
		{
			frontcontrollerx::json_success(array('status'=>'NOK','msg'=>'AGB'));
			die();
		}


		$landShort	= dbx::escape(trim($_REQUEST['ADRESSE_LAND']));

		$MIETE_BIS 	= intval($_REQUEST['MIETEMAX']);

		$GESCHLECHT = trim($_REQUEST['GESCHLECHT']);
		$SEX		= (trim($_REQUEST['GESCHLECHT']) == 'male') ? 'M' : 'F';

		$checkUser = dbx::query("SELECT * FROM wizard_auto_707 WHERE wz_EMAIL = '$EMAIL' AND wz_online = 'Y' AND wz_del = 'N'");

		if($checkUser === false)
		{
			$searchData = array(
				'date'						=> '',
				'location'	=> array(
					'ADRESSE_STRASSE' 		=> $_REQUEST['ADRESSE_STRASSE'],
					'ADRESSE_STRASSE_NR' 	=> $_REQUEST['ADRESSE_STRASSE_NR'],
					'ADRESSE_PLZ' 			=> $_REQUEST['ADRESSE_PLZ'],
					'ADRESSE_STADT' 		=> $_REQUEST['ADRESSE_STADT'],
					'ADRESSE_LAT' 			=> $_REQUEST['ADRESSE_LAT'],
					'ADRESSE_LNG' 			=> $_REQUEST['ADRESSE_LNG'],
				),
				'adresse'					=> $_REQUEST['ADRESSE'],
				'price_from'				=> 1,
				'price_to'					=> $MIETE_BIS,
				'range'						=> 5,
				'type'						=> 'suche',
				'filter'						=> ''
			);

			$land		= dbx::queryAttribute("select * from wizard_auto_716 where wz_ISO2 = '$landShort'", "wz_id");

			$db_user = self::$regDefaults;

			$db_user['wz_EMAIL']				= $EMAIL;
			$db_user['wz_PASSWORT']				= md5($PASSWORT);
			$db_user['wz_VORNAME']				= $VORNAME;
			$db_user['wz_NACHNAME']				= $NACHNAME;
			$db_user['wz_ADRESSE']				= $ADRESSE;
			$db_user['wz_ADRESSE_STRASSE']		= $ADRESSE_STRASSE;
			$db_user['wz_ADRESSE_STRASSE_NR']	= $ADRESSE_STRASSE_NR;
			$db_user['wz_ADRESSE_PLZ']			= $ADRESSE_PLZ;
			$db_user['wz_ADRESSE_STADT']		= $ADRESSE_STADT;
			$db_user['wz_ADRESSE_LAND']			= intval($land);
			$db_user['wz_ADRESSE_LAT']			= $ADRESSE_LAT;
			$db_user['wz_ADRESSE_LNG']			= $ADRESSE_LNG;
			$db_user['wz_MIETE_BIS']			= $MIETE_BIS;
			$db_user['wz_GESCHLECHT']			= ($GESCHLECHT == 'male') ? 'M' : 'F';
			$db_user['wz_online']				= 'Y';
			$db_user['wz_created']				= 'NOW()';
			$db_user['wz_MAIL_CHECKED']			= 'N';
			$db_user['wz_ACTIVE']				= 'N';
			$db_user['wz_AGB_1']				= $AGB;
			$db_user['wz_TYPE'] 				= 'suche';

			if(intval($_REQUEST['p_id']) == 48)
			{
				$db_user['wz_TYPE'] 			= 'biete';
				$db_user['wz_MIETE_VON']	= $MIETE_BIS;
				$db_user['wz_MIETE_BIS']	= 1000;

				$searchData['type']			= 'biete';
				$searchData['price_from'] 	= $MIETE_BIS;
				$searchData['price_to'] 	= 1000;
			}

			if($searchData['type'] == 'biete')
			{
				$searchData['price_from'] = $MIETE_BIS;
				$searchData['price_to'] = 1000;
			}
			
			
			dbx::insert('wizard_auto_707',$db_user);

			$_REQUEST['feuser_email'] = $EMAIL;
			$_REQUEST['doResend'] = 1;

			$res = xredaktor_feUser::resendRegistration(array('triggerByVar'=>'doResend', 'triggerByVal'=>'1'));
		}

		$presentUser = dbx::query("SELECT * FROM wizard_auto_707 WHERE wz_EMAIL = '$EMAIL' AND wz_PASSWORT = MD5('$PASSWORT') AND wz_online = 'Y' AND wz_del = 'N'");

		if($presentUser === false)
		{
			frontcontrollerx::json_success(array('status'=>'NOK','msg'=>'PWD_ERROR'));
		}

		$present_SEARCHDATA = json_decode($presentUser['wz_SEARCHDATA'],true);

		$searchData = array(
			'date'						=> '',
			'location'	=> array(
				'ADRESSE_STRASSE' 		=> $_REQUEST['ADRESSE_STRASSE'],
				'ADRESSE_STRASSE_NR'	=> $_REQUEST['ADRESSE_STRASSE_NR'],
				'ADRESSE_PLZ' 			=> $_REQUEST['ADRESSE_PLZ'],
				'ADRESSE_STADT' 		=> $_REQUEST['ADRESSE_STADT'],
				'ADRESSE_LAT' 			=> $_REQUEST['ADRESSE_LAT'],
				'ADRESSE_LNG' 			=> $_REQUEST['ADRESSE_LNG'],
			),
			'adresse'					=> $_REQUEST['ADRESSE'],
			'price_from'				=> 1,
			'price_to'					=> $MIETE_BIS,
			'range'						=> 5,
			'type'						=> $present_SEARCHDATA['type'],
			'filter'					=> ''
		);

		if(intval($_REQUEST['p_id']) == 48)
		{
			$db_user['wz_TYPE'] 			= 'biete';
			$db_user['wz_MIETE_VON']	= $MIETE_BIS;
			$db_user['wz_MIETE_BIS']	= 1000;

			$searchData['type']			= 'biete';
			$searchData['price_from'] 	= $MIETE_BIS;
			$searchData['price_to'] 	= 1000;
		}

		if($searchData['type'] == 'biete')
		{
			$searchData['price_from'] 	= $MIETE_BIS;
			$searchData['price_to'] 	= 1000;
		}


		$feu_id = intval($presentUser['wz_id']);

		$searchData = json_encode($searchData);
		
		
		dbx::update('wizard_auto_707',array('wz_SEARCHDATA'=>$searchData,'wz_LASTLOGIN'=>'NOW()','wz_VORNAME'=>$VORNAME,'wz_NACHNAME'=>$NACHNAME,'wz_GESCHLECHT'=>$SEX,'wz_AGB_1'=>$AGB),array('wz_id'=>$feu_id));

		// insert into matching cron
		dbx::insert('wizard_auto_845', array('wz_USERID' => intval($presentUser['wz_id']), 'wz_STATUS' => 'TODO'));

		xredaktor_feUser::refreshUserdata($feu_id);

		foreach ($_REQUEST['frage'] as $key => $value) {
			$key 	= intval($key);
			$value 	= intval($value);

			if($feu_id > 0)
			{
				$wgTest = dbx::query("SELECT * FROM wizard_auto_765 WHERE wz_FRAGE_ID = $key AND wz_USERID = $feu_id");

				$db_frage = array(
					'wz_FRAGE_ID' 			=> $key,
					'wz_USERID' 			=> $feu_id,
					'wz_ANTWORT_BIN' 		=> $value,
					'wz_ANTWORT_SUCHE' 		=> $value,
					'wz_ANTWORT_WICHTIG' 	=> 3
				);

				if($wgTest === false)
				{
					dbx::insert('wizard_auto_765',$db_frage);
				}
				else
				{
					dbx::update('wizard_auto_765',$db_frage,array('wz_id'=>intval($wgTest['wz_id'])));
				}

			}
		}

		$redirectUrl = fe_vanityurls::genUrl_suche();

		if($db_user['wz_TYPE'] == 'biete')
		{
			$userData = dbx::query("SELECT * FROM wizard_auto_707 WHERE wz_id = $feu_id");
				
			if($userData['wz_IS_TMP_USER'] == 'N' || $userData['wz_IS_TMP_USER'] == '')
			{
				$insert = array(
						'wz_ADMIN' 		=> $feu_id,
						'wz_online' 	=> 'Y',
						'wz_created' 	=> 'NOW()',
						'wz_ACTIVE' 	=> 'Y'
				);
				// defaultwerte hinzufügen
				$insert = array_merge($insert, fe_room::$regDefaults);
		
				$insert['wz_MIETE'] 				= $MIETE_BIS;
				$insert['wz_ADRESSE']				= $ADRESSE;
				$insert['wz_ADRESSE_STRASSE']		= $ADRESSE_STRASSE;
				$insert['wz_ADRESSE_STRASSE_NR']	= $ADRESSE_STRASSE_NR;
				$insert['wz_ADRESSE_PLZ']			= $ADRESSE_PLZ;
				$insert['wz_ADRESSE_STADT']			= $ADRESSE_STADT;
				$insert['wz_ADRESSE_LAND']			= intval($land);
				$insert['wz_ADRESSE_LAT']			= $ADRESSE_LAT;
				$insert['wz_ADRESSE_LNG']			= $ADRESSE_LNG;
		
				dbx::insert("wizard_auto_809", $insert);
		
				$myRoomId	= dbx::getLastInsertId();
		
				fe_room::assignUser2Room($feu_id, $myRoomId);
		
				// raum in matching room Todo eintragen
				dbx::insert('wizard_auto_853', array('wz_ROOMID' => $myRoomId, 'wz_STATUS' => 'TODO'));
			}
				
			$redirectUrl = xredaktor_niceurl::genUrl(array('p_id' => 30, 'm_suffix' => $myRoomId, 'roomId' => $myRoomId, 'comingFromRedirect' => 1));
		}

		if(isset($_SESSION['LAST_PUBLIC_ROMM_ID']))
		{
			$LAST_PUBLIC_ROMM_ID = intval($_SESSION['LAST_PUBLIC_ROMM_ID']);

			if($LAST_PUBLIC_ROMM_ID > 0)
			{
				unset($_SESSION['LAST_PUBLIC_ROMM_ID']);

				$redirectUrl = fe_vanityurls::genUrl_room($LAST_PUBLIC_ROMM_ID);

				// return fe_vanityurls::genUrl_room($LAST_PUBLIC_ROMM_ID);
			}
		}

		frontcontrollerx::json_success(array('status'=>'OK','msg'=>'','redirect' => $redirectUrl));
	}


	public static function sc_getUserMailByRoomHash()
	{

		$hash 		= dbx::escape(trim($_REQUEST['h']));
		$userId		= intval(dbx::queryAttribute("select * FROM wizard_auto_809 WHERE wz_HASH = '$hash' ","wz_ADMIN"));
		$email		= dbx::queryAttribute("select wz_EMAIL FROM wizard_auto_707 WHERE wz_id = $userId","wz_EMAIL");

		if ($email == '')
		{
			return false;
		}
		return $email;
	}


	public static function sc_getLoginCount()
	{
		$userId = xredaktor_feUser::getUserId();

		return intval(dbx::queryAttribute("select * FROM wizard_auto_707 WHERE wz_id = '$userId' ","wz_LOGINCOUNTER"));

	}


	public static function ajax_sendEmailConfirmationAgain()
	{
		$user = xredaktor_feUser::getUserInfo();

		if(!$user)
		{
			frontcontrollerx::json_success(array('status'=>'NOK','msg'=>'','redirect' => '/'));
		}

		$_REQUEST['feuser_email'] = $user['wz_EMAIL'];
		$_REQUEST['doResend'] = 1;

		$res = xredaktor_feUser::resendRegistration(array('triggerByVar'=>'doResend', 'triggerByVal'=>'1'));

		if($res['user'] == false)
		{
			frontcontrollerx::json_success(array('status'=>'NOK','msg'=>'','redirect' => '/'));
		}
		else
		{
			frontcontrollerx::json_success(array('status'=>'OK','msg'=>'','redirect' => '/'));
		}
	}

	public static function checkFacebookAuth($accessToken)
	{
		@session_start();

		$accessToken = trim($accessToken);

		if($accessToken == '')
		{
			return false;
		}

		$_SESSION['facebook_access_token'] = (string) $accessToken;

		//ini_set('include_path',ini_get('include_path').':/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xsite/classes/libs/:');

		require_once('social/Facebook/autoload.php');

		$fb = new Facebook\Facebook([
		  'app_id' => '1101804963210825',
		  'app_secret' => 'f4a787724a05eec3be2be8404b53e09b',
		  'default_graph_version' => 'v2.6',
		  //'default_access_token' => '{access-token}', // optional
		]);

		/*
		try {
		  // Get the Facebook\GraphNodes\GraphUser object for the current user.
		  // If you provided a 'default_access_token', the '{access-token}' is optional.
		  $response = $fb->get('/me', $accessToken);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
		*/
		try {
		  // Get the Facebook\GraphNodes\GraphUser object for the current user.
		  // If you provided a 'default_access_token', the '{access-token}' is optional.
		  $imgResponse = $fb->get('/me?fields=picture.width(300),link', $accessToken);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		//return $response->getDecodedBody();
		return $imgResponse->getDecodedBody();
	}


	/*************************************** OLD

	public static function ajax_profileSaveOld()
	{
		$user 	= xredaktor_feUser::getUserInfo();

		if ($user === false)
		{
			frontcontrollerx::json_failure("ERROR: User not set");
		}
		$userId 	= intval($user['wz_id']);

		parse_str($_REQUEST['user'], $userReq);

		$alsoUpdateProfile = false;
		if (isset($_REQUEST['profile']))
		{
			$alsoUpdateProfile = true;
			parse_str($_REQUEST['profile'], $profileReq);
		}

		if ($alsoUpdateProfile == true)
		{
			// if coming from mobile / tablet, user and profile data is combined => allData is set to 1
			if (isset($profileReq['allData']) && $profileReq['allData'] == 1)
			{
				$userFields = array('VORNAME', 'NACHNAME', 'GEBURTSDATUM', 'TELEFON', 'BESCHREIBUNG');

				foreach ($userFields as $field) {
					$userReq[$field] = $profileReq[$field];
					unset($profileReq[$field]);
				}
				unset($profileReq['allData']);
			}

			if (trim($profileReq['ADRESSE_LAND']) != '')
			{
				$landShort	= dbx::escape($profileReq['ADRESSE_LAND']);
				$land		= dbx::queryAttribute("select * from wizard_auto_716 where wz_ISO2 = '$landShort'", "wz_id");

				if ($land === false)
				{
					unset($profileReq['ADRESSE_LAND']);
				}
				else
				{
					$profileReq['ADRESSE_LAND'] = $land;
				}
			}
		}

		$update 	= array();
		foreach ($userReq as $k => $v) {
			$update['wz_'.$k] = $userReq[$k];
		}

		// safety first
		unset($update['wz_EMAIL']);
		unset($update['wz_id']);

		// handle specials

		// handle n:n
		$sprachen	= false;
		if (isset($update['wz_SPRACHEN']))
		{
			$sprachen = $update['wz_SPRACHEN'];
			unset($update['wz_SPRACHEN']);
		}


		if ($update['wz_GEBURTSDATUM'] != '')
		{
			$update['wz_GEBURTSDATUM'] = date("Y-m-d", strtotime($update['wz_GEBURTSDATUM']));
		}

		if (trim($update['wz_ZEITRAUM_VON']) != '')
		{
			$update['wz_ZEITRAUM_VON'] = date("Y-m-d", strtotime($update['wz_ZEITRAUM_VON']));
		}

		if (trim($update['wz_ZEITRAUM_BIS']) != '')
		{
			$update['wz_ZEITRAUM_BIS'] = date("Y-m-d", strtotime($update['wz_ZEITRAUM_BIS']));
		}

		if ($sprachen !== false)
		{
			dbx::query("delete from wizard_auto_SIMPLE_W2W_712_$tableId where wz_id_high = $profileId");

			foreach ($sprachen as $k => $v)
			{
				dbx::insert("wizard_auto_SIMPLE_W2W_712_$tableId", array("wz_id_high" => $profileId, 'wz_id_low' => intval($v)));
			}
		}

		// update user
		dbx::update("wizard_auto_707", $update, array("wz_id" => $userId));

		frontcontrollerx::json_success();
	}


	// TODO
	public static function profileUpdate($user, $type, $data)
	{
		$userId 	= intval($user['wz_id']);
		$table 		= self::getUserProfileTable($user);
		$tableId	= self::getUserProfileTable($user, true);
		$profileId	= self::getUserProfileId($user);

		if ($table === false) frontcontrollerx::json_failure("ERROR: User Type not set");

		$update 	= array();

		$sprachen	= false;

		if (isset($data['SPRACHEN'])) {
			$sprachen = $data['SPRACHEN'];
			unset($data['SPRACHEN']);
		}

		foreach ($data as $k => $v) {
			$update['wz_'.$k] = $data[$k];
		}
		if (trim($update['wz_ZEITRAUM_VON']) != '')
		{
			$update['wz_ZEITRAUM_VON'] = date("Y-m-d", strtotime($update['wz_ZEITRAUM_VON']));
		}

		if (trim($update['wz_ZEITRAUM_BIS']) != '')
		{
			$update['wz_ZEITRAUM_BIS'] = date("Y-m-d", strtotime($update['wz_ZEITRAUM_BIS']));
		}

		if ($sprachen !== false)
		{

			dbx::query("delete from wizard_auto_SIMPLE_W2W_712_$tableId where wz_id_high = $profileId");

			foreach ($sprachen as $k => $v) {
				dbx::insert("wizard_auto_SIMPLE_W2W_712_$tableId", array("wz_id_high" => $profileId, 'wz_id_low' => intval($v)));
			}
		}

		dbx::update($table, $update, array('wz_USERID' => $userId));

		return true;
	}

	 OLD ****************************************************************************/


}
