<?

class fe_room
{
	public static $defaultProfileImage 	= 792;
	public static $table_rooms 			= "wizard_auto_809";
	public static $table_roomImages 	= "wizard_auto_810";

	public static $regDefaults = array(
		//'wz_COUNT_MITBEWOHNER_M' 	=> 1,
		//'wz_COUNT_MITBEWOHNER_F' 	=> 1,
		//'wz_COUNT_MITBEWOHNER' 		=> 1,
		// 'wz_UNREG_M' 				=> 1,
		// 'wz_UNREG_F' 				=> 1,
		'wz_ADRESSE_LAT' 			=> 48.2081743,
		'wz_ADRESSE_LNG' 			=> 16.3738189,
		//'wz_GROESSE' 				=> 10,
		//'wz_MIETE'				=> 250,
		'wz_RAUCHER'				=> 'X',
		'wz_ABLOESE'				=> 'X',
		'wz_HAUSTIERE'				=> 'X',
		'wz_VEGGIE'					=> 'X',
		'wz_BARRIEREFREI'			=> 'X',
		'wz_GESCHLECHT_MITBEWOHNER'	=> 'X',
	);

	// taken from NTG
	public static function getLatLongByAdress($street, $plz, $ort)
	{

		$ret 			= array();

		$street			= dbx::escape($street);
		$plz			= intval($plz);
		$ort			= dbx::escape($ort);

		// danke an NTG.. :)
		$api_key		= "AIzaSyBVQ-EjCEqNG71cWrTzqy0DCS8-05plTyE";

		$address 		= $street."+".$plz."+".$ort;
        $prepAddr 		= str_replace(' ','+',$address);
		$url2get		= 'https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&key='.$api_key;

        $geocode		= file_get_contents($url2get);
        $output			= json_decode($geocode, true);

		if ($output['status'] == "OK")
		{
			$ret['lat']		 	= floatval($output['results'][0]['geometry']['location']['lat']);
        	$ret['long'] 		= floatval($output['results'][0]['geometry']['location']['lng']);
		}

		return $ret;
	}


	public static function get_hash_by_roomId($roomId)
	{
		$roomId = intval($roomId);
		if ($roomId == 0) return false;

		$hash = dbx::queryAttribute("SELECT wz_HASH FROM wizard_auto_809 WHERE wz_id = $roomId AND wz_del = 'N' ", 'wz_HASH');

		return $hash;
	}

	public static function get_hashlink_by_roomId($roomId)
	{
		$roomId = intval($roomId);
		if ($roomId == 0) return false;

		$url = xredaktor_niceurl::genUrl(array('p_id' => 13, 'm_suffix' => $roomId, 'id' => $roomId));
		$hash = self::get_hash_by_roomId($roomId);

		$fullLink = $url . '?h=' . $hash;

		return $fullLink;
	}

	public static function get_room_activation_link_by_roomId($roomId)
	{
		$roomId = intval($roomId);
		if ($roomId == 0) return false;

		$url = self::get_hashlink_by_roomId($roomId);
		$url .= '&activate=1';
		return $url;
	}

	public static function get_mail_replacers_for_roomId($roomId)
	{
		$roomId = intval($roomId);
		if ($roomId == 0) return array();

		$room = dbx::query("SELECT * FROM wizard_auto_809 WHERE wz_id = $roomId ");

		$replacers = array();

		$replacers['###HASHLINK###'] 	= 'http://' . $_SERVER["SERVER_NAME"] . self::get_hashlink_by_roomId($roomId);
		$replacers['###ACTIVELINK###']	= 'http://' . $_SERVER["SERVER_NAME"] . self::get_room_activation_link_by_roomId($roomId);
		$replacers['###SOURCE###']		= $room['wz_SOURCE'];

		return $replacers;
	}


	public static function send_kaltaquise_mail_by_roomId_and_email($roomId, $email)
	{
		$roomId = intval($roomId);
		$email = trim($email);

		if ($roomId == 0 || $email == '') {
			return false;
		}

		$room = dbx::query("select * from wizard_auto_809 where wz_id = $roomId");

		$tmpUserData = fe_user::create_tmp_anbieter_by_email($email);

		if ($tmpUserData === false) {
			return false;
		}

		$replacers 					 = self::get_mail_replacers_for_roomId($roomId);

/*
		if ($tmpUserData['EXISTS'] === true) {		$replacers['###PASSWORT###'] = xredaktor_translate::doTranslate('Bitte benutze dein eingestelltes Passwort.', xredaktor_pages::getFrontEndLang(), 1);
		} else {
			$replacers['###PASSWORT###'] = $tmpUserData['PASS'];
		}
*/
		dbx::update('wizard_auto_809', array('wz_ADMIN' => $tmpUserData['USER_ID']), array('wz_id' => $roomId));

		fe_user::burnMail(
			$email,
			39,
			'Anfrage zu WG: ' . $room['wz_SOURCE_ID'] . ' / ' . $room['wz_SOURCE'],
			$replacers,
			array(),
			'office@meineperfektewg.com',
			'office@meineperfektewg.com'
		);

		return true;
	}



	public static function activateRoomWithHash($roomId, $hash)
	{
		$roomId = intval($roomId);

		if ($roomId == 0 || $hash == '') return false;
		$room = dbx::query("select * from wizard_auto_809 where wz_id = $roomId");

		if ($room['wz_HASH'] != '' && $hash != $room['wz_HASH']) {
			header("Location: " . xredaktor_niceurl::genUrl(array('p_id' => 1)));
			die();
		}


		// remove hash from room + activate, now can be seen by everyone
		dbx::update('wizard_auto_809', array('wz_HASH' 	=> '','wz_ACTIVE' => 'Y'), array('wz_id' => $roomId));

		// update user so he can be found in chat
		dbx::update('wizard_auto_707', array('wz_IS_TMP_USER'=>'C','wz_USERDEL'=>'N'), array('wz_id'=>intval($room['wz_ADMIN'])));

		// insert into room cron
		dbx::insert('wizard_auto_853', array('wz_ROOMID' => $roomId, 'wz_STATUS' => 'TODO'));

		// insert into matching cron
		dbx::insert('wizard_auto_845', array('wz_USERID' => intval($room['wz_ADMIN']), 'wz_STATUS' => 'TODO'));


		self::assignUser2Room($room['wz_ADMIN'], $roomId);

		$xKalt = true;
		self::sendMailNewRoom($room['wz_ADMIN'], $xKalt);

		// redirect to startpage
		header("Location: " . xredaktor_niceurl::genUrl(array('p_id' => 1)));
		die();
	}


	public static function sc_getRoomData()
	{
		$roomId   = intval($_REQUEST['id']);
		$hash     = trim($_REQUEST['h']);
		$activate = intval($_REQUEST['activate']);

		return self::getRoomData($roomId, $hash, $activate);
	}


	public static function getRoomData($roomId, $hash, $activate)
	{
		$roomId			= intval($roomId);
		if ($roomId == 0) return array();

		$itsMe 			= false;

		if (self::checkIfIAmPartOfThisRoom($roomId) !== false)
		{
			$itsMe 		= true;
		}

		$myUserId		= xredaktor_feUser::getUserId();

		$room			= dbx::query("select * from wizard_auto_809 where wz_id = $roomId and wz_online = 'Y' ");


///// redirect to error page if room is not online/active/ADMIN = 0 OR hide = Y
		if(!$itsMe && !libx::isDeveloper()){

			if ($room['wz_del'] == 'Y' || $room['wz_ACTIVE'] == 'N' || $room['wz_HIDE'] == 'Y' || $room['wz_USERDEL'] == 'Y')
			{
				header("Location: " . xredaktor_niceurl::genUrl(array('p_id' => 2)));
				die();
			}
		}

		// if hash of room not empty, check if correct
		if ($room['wz_HASH'] != '' && $hash != $room['wz_HASH']) {
			header("Location: " . xredaktor_niceurl::genUrl(array('p_id' => 1)));
			die();
		}

		if ($room['wz_HASH'] != '' && $hash == $room['wz_HASH'] && intval($activate) == 1)
		{
			return self::activateRoomWithHash($roomId, $hash);
		}

		$admin			= intval($room['wz_ADMIN']);
		$user			= fe_user::getUserData($admin);


		if ($room['wz_PROFILBILD'] == 0)
		{
			$room['wz_PROFILBILD'] = self::$defaultProfileImage;
		}
		else
		{
			array_unshift($images, array('wz_S_ID' => $room['wz_PROFILBILD']));
		}

		$images					 = array();

		$images					 = self::getRoomImages($roomId);


		$bewohner 		= fe_user::getUsersByRoomIdWithDetails($roomId);
		$bewohner_age   = fe_user::getUserAgespanByRoomId($roomId);

		// TODO Matching für sprachen etc
		$room['ABLOESE']			= self::matchYN($room['wz_ABLOESE']);
		$room['RAUCHER'] 			= self::matchYN($room['wz_RAUCHER']);
		$room['VEGGIE'] 			= self::matchYN($room['wz_VEGGIE']);
		$room['BARRIEREFREI'] 		= self::matchYN($room['wz_BARRIEREFREI']);
		$room['HAUSTIERE'] 			= self::matchYN($room['wz_HAUSTIERE']);
		$room['ZUSATZKOSTEN'] 		= intval($room['wz_ZUSATZKOSTEN']);

		$fieldsDate		= array('wz_ZEITRAUM_VON', 'wz_ZEITRAUM_BIS');

		foreach ($fieldsDate as $k => $v)
		{
			if ($room[$v] == "0000-00-00" || trim($room[$v]) == '')
			{
				unset($room[$v]);
			}
			else
			{
				$room[$v] = date("d.m.Y", strtotime($room[$v]));
			}
		}

		$ret 			= array(
			'USER' 		=> $user['USER'],
			'ROOM' 		=> $room,
			'ROOMIES'	=> $bewohner,
			'ROOMIES_COUNT' => count($bewohner),
			'ROOMIES_AGE' => $bewohner_age,
			'IMAGES'	=> $images
		);

		if ($itsMe == false)
		{
			$matchResult		= fe_matching::getMatchResultFromDbUser2Room($myUserId, $roomId);

			// warum müssen wir das so behindert machen? :(
			// ultra dirty fix für WEB-341
			if (
				(  $matchResult['MATCHROOM']['matchKategorien'][1] == 0
				&& $matchResult['MATCHROOM']['matchKategorien'][2] == 0
				&& $matchResult['MATCHROOM']['matchKategorien'][3] == 0
				)
				&&
				(
				$matchResult['MATCHUSERS'][0]['matchKategorien'][1] > 0
				||
				$matchResult['MATCHUSERS'][0]['matchKategorien'][2] > 0
				||
				$matchResult['MATCHUSERS'][0]['matchKategorien'][3] > 0
				)
			) {
				$matchResult['MATCHROOM'] = $matchResult['MATCHUSERS'][0];
			}


			// 2. fix für WEB-369 - "in die andere richtung"

			else if (
				(  $matchResult['MATCHROOM']['matchKategorien'][1] == 0
				&& $matchResult['MATCHROOM']['matchKategorien'][2] == 0
				&& $matchResult['MATCHROOM']['matchKategorien'][3] == 0
				)
				&&
				(
					!isset($matchResult['MATCHUSERS'][1])
					&&
					$matchResult['MATCHUSERS'][0]['matchGesamt'] == '?'
				)
			) {
				$matchResult['MATCHROOM'] = $matchResult['MATCHUSERS'][0];
			}

			// und 3. fix, damit nicht 0% angezeigt wird wenn es kein matching gab (2. user hat keine fragen beantwortet)
			else if ( empty($matchResult['MATCHUSERS']) ) {
				$matchResult['MATCHROOM'] = array(
					'matchGesamt' => '?',
					'matchKategorien' => '?'
				);
			}


			$matching 			= array(
				'RESULT'		=> $matchResult,
				'TEXT'			=> fe_matching::getMatchTextByRoomResult($matchResult)
			);

			$ret['MATCHING'] 	= $matching;
		}

		return $ret;
	}


	public static function sc_getMieteByRoomHash(){

		$hash 		= dbx::escape(trim($_REQUEST['h']));

		$miete		= dbx::queryAttribute("select wz_MIETE FROM wizard_auto_809 WHERE wz_HASH = '$hash' ","wz_MIETE");

		return $miete;
	}


	public static function sc_getRoomAdresseByRoomHash(){

		$hash			= dbx::escape(trim($_REQUEST['h']));
		// $userId		= intval(dbx::queryAttribute("select wz_ADMIN FROM wizard_auto_809 WHERE wz_HASH = '$hash' ","wz_ADMIN"));
		$adresse		= dbx::queryAttribute("select wz_ADRESSE FROM wizard_auto_809 WHERE wz_HASH = '$hash' ","wz_ADRESSE");

		return $adresse;
	}


	public static function sc_getPublicRoomData()
	{
		$roomId   = intval($_REQUEST['id']);
		$hash     = trim($_REQUEST['h']);
		$activate = intval($_REQUEST['activate']);
		return self::getPublicRoomData($roomId, $hash, $activate);
	}

	public static function getPublicRoomData($roomId, $hash, $activate)
	{
		@session_start();
		$_SESSION['LAST_PUBLIC_ROMM_ID'] = $roomId;

		$roomId			= intval($roomId);
		if ($roomId == 0) return array();

		$itsMe 			= false;

		$room			= dbx::query("select * from wizard_auto_809 where wz_id = $roomId");


///// redirect to error page if room is not online/active/ADMIN = 0 OR hide = Y
		if(!libx::isDeveloper())
		{
			if ($room['wz_del'] == 'Y' || $room['wz_ACTIVE'] == 'N' || $room['wz_HIDE'] == 'Y' || $room['wz_USERDEL'] == 'Y')
			{

				header("Location: " . xredaktor_niceurl::genUrl(array('p_id' => 2)));
				die();
			}
		}

		$admin			= intval($room['wz_ADMIN']);
		//$user			= fe_user::getUserData($admin);

		$images					 = array();

		/*
		if ($room['wz_PROFILBILD'] == 0)
		{
			$room['wz_PROFILBILD'] = self::$defaultProfileImage;
		}
		else
		{
			array_unshift($images, array('wz_S_ID' => $room['wz_PROFILBILD']));
		}
		*/

		$images					 = self::getRoomImages($roomId);

		if(!empty($images))
		{
			if($room['wz_PROFILBILD'] == 0)
			{
				$room['wz_PROFILBILD'] = $images[0]['wz_S_ID'];
			}
		}

		if ($room['wz_PROFILBILD'] == 0)
		{
			$room['wz_PROFILBILD'] = self::$defaultProfileImage;
		}

		//$bewohner 		= fe_user::getUsersByRoomIdWithDetails($roomId);

		$bewohner_age   = fe_user::getUserAgespanByRoomId($roomId);

		// TODO Matching für sprachen etc
		$room['ABLOESE']			= self::matchYN($room['wz_ABLOESE']);
		$room['RAUCHER'] 			= self::matchYN($room['wz_RAUCHER']);
		$room['VEGGIE'] 			= self::matchYN($room['wz_VEGGIE']);
		$room['BARRIEREFREI'] 		= self::matchYN($room['wz_BARRIEREFREI']);
		$room['HAUSTIERE'] 			= self::matchYN($room['wz_HAUSTIERE']);
		$room['ZUSATZKOSTEN'] 		= intval($room['wz_ZUSATZKOSTEN']);

		$fieldsDate		= array('wz_ZEITRAUM_VON', 'wz_ZEITRAUM_BIS');

		foreach ($fieldsDate as $k => $v)
		{
			if ($room[$v] == "0000-00-00" || trim($room[$v]) == '')
			{
				unset($room[$v]);
			}
			else
			{
				$room[$v] = date("d.m.Y", strtotime($room[$v]));
			}
		}

		$ret 			= array(
			'USER' 		=> $user['USER'],
			'ROOM' 		=> $room,
			'ROOMIES'	=> $bewohner,
			'ROOMIES_COUNT' => count($bewohner),
			'ROOMIES_AGE' => $bewohner_age,
			'IMAGES'	=> $images
		);

		if ($itsMe == false)
		{
			$matchResult		= fe_matching::getMatchResultFromDbUser2Room($myUserId, $roomId);

			// warum müssen wir das so behindert machen? :(
			// ultra dirty fix für WEB-341
			if (
				(  $matchResult['MATCHROOM']['matchKategorien'][1] == 0
				&& $matchResult['MATCHROOM']['matchKategorien'][2] == 0
				&& $matchResult['MATCHROOM']['matchKategorien'][3] == 0
				)
				&&
				(
				$matchResult['MATCHUSERS'][0]['matchKategorien'][1] > 0
				||
				$matchResult['MATCHUSERS'][0]['matchKategorien'][2] > 0
				||
				$matchResult['MATCHUSERS'][0]['matchKategorien'][3] > 0
				)
			) {
				$matchResult['MATCHROOM'] = $matchResult['MATCHUSERS'][0];
			}


			// 2. fix für WEB-369 - "in die andere richtung"

			else if (
				(  $matchResult['MATCHROOM']['matchKategorien'][1] == 0
				&& $matchResult['MATCHROOM']['matchKategorien'][2] == 0
				&& $matchResult['MATCHROOM']['matchKategorien'][3] == 0
				)
				&&
				(
					!isset($matchResult['MATCHUSERS'][1])
					&&
					$matchResult['MATCHUSERS'][0]['matchGesamt'] == '?'
				)
			) {
				$matchResult['MATCHROOM'] = $matchResult['MATCHUSERS'][0];
			}

			// und 3. fix, damit nicht 0% angezeigt wird wenn es kein matching gab (2. user hat keine fragen beantwortet)
			else if ( empty($matchResult['MATCHUSERS']) ) {
				$matchResult['MATCHROOM'] = array(
					'matchGesamt' => '?',
					'matchKategorien' => '?'
				);
			}

			$matching 		= array(
				'RESULT'		=> $matchResult,
				'TEXT'		=> fe_matching::getMatchTextByRoomResult($matchResult)
			);

			$ret['MATCHING'] 	= $matching;
		}

		return $ret;
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


	public static function delContentRoom($type, $id)
	{

		$id 		= intval($id);
		$userId		= intval(xredaktor_feUser::getUserId());

		switch ($type) {
			case 'bild-room':
				break;
			default:
				frontcontrollerx::json_failure();
				break;
		}

		$present 	= dbx::query("select * from wizard_auto_810 where wz_id = $id");
		if (present === false) frontcontrollerx::json_failure();

		// check if room belongs to user
		$isAdmin = self::checkIfIAmAdminOfThisRoom($present['wz_ROOMID']);
		if ($isAdmin === false) frontcontrollerx::json_failure();

		dbx::update(self::$table_roomImages, array('wz_del' => 'Y'), array('wz_id' => $id));
		frontcontrollerx::json_success();

	}


	public static function checkIfIAmPartOfThisRoom($roomId, $returnAdminOnly = false)
	{
		$roomId			= intval($roomId);
		$userId			= intval(xredaktor_feUser::getUserId());

		if ($userId == 0 || $roomId == 0) return false;

		$amIAdmin		= dbx::query("select * from wizard_auto_809 where wz_ADMIN = $userId and wz_id = $roomId");
		if ($amIAdmin !== false) return true;

		if ($returnAdminOnly === true)
		{
			return false;
		}

		$amIMitbewohner = dbx::query("select * from wizard_auto_SIMPLE_W2W_707_809 where wz_id_low = $userId and wz_id_high = $roomId");
		if ($amIMitbewohner !== false) return true;

		return false;
	}


	public static function checkIfIAmAdminOfThisRoom($roomId)
	{

		return self::checkIfIAmPartOfThisRoom($roomId, true);

	}


	public static function inviteUserToRoom($roomId, $inviteEmail, $subject, $text)
	{
		$roomId = intval($roomId);
		if ($roomId == 0) frontcontrollerx::json_failure("ERROR: Room not set");

		$inviteEmail	= dbx::escape($inviteEmail);

		if (!filter_var($inviteEmail, FILTER_VALIDATE_EMAIL)) {
		    frontcontrollerx::json_failure("ERROR: Not a valid email address");
		}

		$userId = self::checkIfUserExists($inviteEmail);
		if ($userId === false) $userId = 0;

		$present = dbx::query("select * from wizard_auto_822 where wz_ROOMID = $roomId and wz_EMAIL = '$inviteEmail' and wz_del='N'");

		$present = false;

		if ($present === false)
		{
			dbx::insert('wizard_auto_822', array('wz_ROOMID' => $roomId, 'wz_USERID' => $userId, 'wz_EMAIL' => $inviteEmail));
		}

		return self::sendInvitationMail($roomId, $inviteEmail, $userId, $subject, $text);

	}


	public static function ajax_sendInvitation()
	{

		$userId		= intval(xredaktor_feUser::getUserId());
		if ($userId == 0) return false;

		parse_str($_REQUEST['form'], $form);

		$email 		= dbx::escape($form['email']);

		$subject 	= dbx::escape($form['subject']);
		$text		= dbx::escape($form['text']);

		//$roomId 	= self::getRoomIdByUserId($userId);
		$roomId = intval($form['id']);

		if (self::getAdminOfRoomByRoomId($roomId) != $userId)
		{
			frontcontrollerx::json_failure("ERROR: This is not your room.");
		}

		if ($roomId == 0) frontcontrollerx::json_failure("ERROR: Room not set");

		self::inviteUserToRoom($roomId, $email, $subject, $text);

		frontcontrollerx::json_success();

	}


	public static function sendInvitationMail($roomId, $email, $userId, $subject, $text)
	{
		$email 		= dbx::escape($email);
		$roomId		= intval($roomId);
		$userId		= intval($userId);

		$absender	= xredaktor_feUser::getUserInfo();


		$subject	= dbx::escape($subject);
		$text		= dbx::escape($text);

		$joinLink	= fe_vanityurls::genUrl_joinLink($roomId, $email, $userId);



		$replacersExtra = array(
			'###TEXT###' 				=> $text,
			'###LINK###'				=> $joinLink,
			'###ABSENDER_VORNAME###'	=> $absender['wz_VORNAME'],
			'###ABSENDER_NACHNAME###'	=> $absender['wz_NACHNAME'],
		);

		$pageId		= 34;

		if ($userId > 0)
		{
			$user = dbx::query("select * from wizard_auto_707 where wz_id = $userId and wz_del='N'");
			if ($user !== false)
			{
				$replacersExtra['###VORNAME###'] 		= $user['wz_VORNAME'];
				$replacersExtra['###NACHNAME###'] 		= $user['wz_NACHAME'];
				$pageId 								= 35;
			}
		}

		fe_user::burnMail($email,$pageId,$subject,$replacersExtra);

		return true;

	}


	public static function checkIfUserExists($email)
	{
		$email 		= dbx::escape($email);
		$present 	= dbx::query("select * from wizard_auto_707 where wz_EMAIL = '$email' and wz_del = 'N'");

		if ($present !== false)
		{
			return $present['wz_id'];
		}
		else
		{
			return false;
		}
	}


	public static function ajax_acceptInvitation()
	{
		fe_user::checkLoggedIn();

		$roomId 		= intval($_REQUEST['room']);
		$userId			= xredaktor_feUser::getUserId();
		$user			= xredaktor_feUser::getUserInfo();

		if ($roomId == 0) frontcontrollerx::json_failure("ERROR: Room not set");

		self::assignUser2Room($userId, $roomId, $user['wz_EMAIL']);

		frontcontrollerx::json_success();

	}


	public static function ajax_rejectInvitation()
	{
		fe_user::checkLoggedIn();

		$roomId 		= intval($_REQUEST['room']);
		$userId			= xredaktor_feUser::getUserId();
		$user			= xredaktor_feUser::getUserInfo();
		$email			= $user['wz_EMAIL'];

		if ($roomId == 0) frontcontrollerx::json_failure("ERROR: Room not set");

		$present 		= dbx::query("select * from wizard_auto_822 where wz_ROOMID = $roomId and (wz_USERID = $userId or wz_EMAIL = '$email')");

		if ($present !== false)
		{
			dbx::query("delete from wizard_auto_822 where wz_ROOMID = $roomId and (wz_USERID = $userId or wz_EMAIL = '$email') LIMIT 1");
		}

		frontcontrollerx::json_success();

	}

	public static function switchRoomActiveState($active=true, $roomId = null)
	{

		fe_user::checkLoggedIn();

		$userId			= xredaktor_feUser::getUserId();

		if ($roomId === null)
		{
			$roomId 	= self::getRoomIdByUserId($userId);
		}
		else {
			$roomId = intval($roomId);
		}

		if ($roomId == 0) frontcontrollerx::json_failure("ERROR: Room not set");

		// gute idee, könnte dann aber auch ein mitbewohner per AJAX feuern...
		$allowed = self::checkIfIAmPartOfThisRoom($roomId, true);
		if (!$allowed) return false;

		// bessere idee: user sollte admin sein.
		if (self::getAdminOfRoomByRoomId($roomId) != $userId) return false;


		// auf roomies prüfen
		$bewohner = fe_user::getUsersByRoomIdWithDetails($roomId);
		if (count($bewohner) > 1) {
			fe_user::setErrorMessage(fe_user::errorMessage_cant_deactivate_room_roomies_inside);
			frontcontrollerx::json_success(); // success damit das JS die page neu ladet..
		}

		$update = array();
		$state = '';

		switch ($active) {
			case true:
				$update = array('wz_ACTIVE' => 'Y');
				fe_user::setErrorMessage(fe_user::message_room_activated);
				break;

			case false:
				$update = array('wz_ACTIVE' => 'N');
				fe_user::setErrorMessage(fe_user::message_room_deactivated);
				break;

			default:
				break;
		}

		dbx::update("wizard_auto_809", $update, array('wz_id' => $roomId));

		if($update['wz_ACTIVE'] == 'Y')
		{
			$xKalt = false;
			frontcontrollerx::json_success(self::sendRoomActivatedMail($roomId, $xKalt));
		}
		else
		{
			frontcontrollerx::json_success();
		}

	}




////////////////////////////////////////////////////////////////////////////////////
////////////////////////////		START NEW MAILINGS		///////////////////////////
////////////////////////////////////////////////////////////////////////////////////

	public static function sc_getReplacersRoomActivateMail($roomId)
	{
		$url = fe_vanityurls::genUrl_room(intval($roomId));
		$deactivateSearch = xredaktor_niceurl::genUrl(array('p_id' => 7, 'm_suffix' => $userId, 'id' => $roomId));

		$replacers = array();
		$replacers['###VORNAME###'] = 'DocDuck';
		$replacers['###LINK_VIEW###']	= 'https://' . $_SERVER['HTTP_HOST'] . $url;
		$replacers['###LINK_DEACTIVATE_SEARCH###'] = 'https://' . $_SERVER['HTTP_HOST'] . $deactivateSearch;
		$replacers['###LINK_CONTACT###'] = 'https://' . $_SERVER['HTTP_HOST'] . xredaktor_niceurl::genUrl(array('p_id' => 37));
		return $replacers;
	}


	public static function sc_getReplacersNewRoomMail($userId)
	{
		$userData 	= dbx::query("SELECT wz_VORNAME, wz_NACHNAME FROM wizard_auto_707 WHERE wz_id = $userId");

		$urlUser = xredaktor_niceurl::genUrl(array('p_id' => 14, 'm_suffix' => $userId, 'id' => $userId));
		$username = '/' . $userData['wz_VORNAME'] . '-' . $userData['wz_NACHNAME'];
		$urlUser .= $username;

		$replacers = array();
		$replacers['###VORNAME###'] 		= 'DocDuck';
		$replacers['###USERID###'] 		= 'UserID: ' . $userId;
		$replacers['###USERPROFIL###'] 	= 'https://' . $_SERVER['HTTP_HOST'] . $urlUser;

		return $replacers;
	}


	public static function sendMailNewRoom($userId, $xKalt)
	{
		$peter 		= 'admin@mack.pm';
		$peter2 		= 'peter@mack.pm';
		$peter3 		= 'peter2@mack.pm';
		$peter4		= 'peter3@mack.pm';
		$peter5 		= 'peter4@mack.pm';
		$peter6 		= 'peter5@mack.pm';
		$peter7 		= 'peter6@mack.pm';
		$peter8 		= 'peter7@mack.pm';
		$peter9 		= 'peter8@mack.pm';
		$peter10 	= 'peter9@mack.pm';
		$peter22 	= 'peter10@mack.pm';

		$testMailingList = array();
		array_push($testMailingList,$peter,$peter2,$peter3,$peter4,$peter5,$peter6,$peter7,$peter8,$peter9,$peter10);


		$id = intval($userId);

		$replacers = self::sc_getReplacersNewRoomMail($id);

		$sql = dbx::query("SELECT max(wz_id) AS roomId FROM `wizard_auto_809`");
		$roomId = intval($sql['roomId']) + 1;

		$replacers['###ZIMMERPROFIL###'] = 'https://' . $_SERVER['HTTP_HOST'] . fe_vanityurls::genUrl_room($roomId);

//tNR = Testkennzeichen Neues Zimmer
		$subject = '(tNZ) Neues Zimmer angelegt von User: ' . $id . ' Zimmer: ' . $roomId;

		if($xKalt == true)
		{
			$subject = '(tNZ) xKalt: Zimmer von User: ' . $id . ' wurde aktiviert!';
		}

		foreach ($testMailingList as $k => $v)
		{
			$mail = trim($v);
			$replacers['###VORNAME###'] = $v;

			fe_user::burnMail(
				$mail,
				57,
				$subject,
				$replacers,
				array(),
				'office@meineperfektewg.com',
				'office@meineperfektewg.com'
			);
		}
		return true;
	}


	public static function sendRoomActivatedMail($roomId)
	{

//USER MAILS
//Finales Mailing in Cronjob wegen performance

		//$users = dbx::queryAll("SELECT * FROM wizard_auto_707 WHERE wz_del = 'N' AND wz_USERDEL = 'N' AND wz_online = 'Y' AND wz_ACTIVE = 'Y' AND wz_MAIL_CHECKED = 'Y' AND wz_TYPE = 'suche' AND wz_EMAILBENACHRICHTIGUNG != 'KEINE' ");
		// $send2 = array();
		// $user = dbx::queryAll("SELECT * FROM `wizard_auto_707` WHERE `wz_EMAIL` LIKE '%mack.pm%' AND wz_del = 'N' AND wz_TYPE = 'suche'");
		//
		// foreach ($user as $k => $u) {
		// 	$send2[$k] = $u['wz_EMAIL'];
		// }
		//
		// $bccMail = 'peter@meineperfektewg.com';
		// array_push($send2, $bccMail);

		$id = intval($roomId);

		$testMailingList = array();

		$docDuck = 'docduck@meineperfektewg.com';
		$peter = 'peter@meineperfektewg.com';
      $michi  = 'michael@meineperfektewg.com';
      $valentina  = 'valentina@meineperfektewg.com';
      $damian = 'damian@meineperfektewg.com';

      array_push($testMailingList,$docDuck,$peter,$michi,$valentina,$damian);

		$subject = '(t) Achtung: Neues Zimmer online auf MeinePerfekteWG.com!';
		$replacers = self::sc_getReplacersRoomActivateMail($roomId);

		fe_user::burnMail(
			$peter2,
			56,
			$subject,
			$replacers,
			array(),
			'office@meineperfektewg.com',
			'office@meineperfektewg.com'
		);

		return true;

		// foreach ($testMailingList as $k => $u)
		// {
		// 	$mail = trim($u);
		// 	$replacers['###VORNAME###'] = $u;
		//
		// 	fe_user::burnMail(
		// 		$mail,
		// 		56,
		// 		$subject,
		// 		$replacers,
		// 		array(),
		// 		'office@meineperfektewg.com',
		// 		'office@meineperfektewg.com'
		// 	);
		// }

		// $user = dbx::queryAll("SELECT * FROM `wizard_auto_707` WHERE `wz_EMAIL` LIKE '%mack.pm%' AND wz_del = 'N' AND wz_TYPE = 'suche'");
		//
		// foreach ($user as $k => $u)
		// {
		// 	$mail = trim($u['wz_EMAIL']);
		// 	$replacers['###VORNAME###'] = $u['wz_VORNAME'];
		//
		// 	fe_user::burnMail(
		// 		$mail,
		// 		56,
		// 		$subject,
		// 		$replacers,
		// 		array(),
		// 		'office@meineperfektewg.com',
		// 		'office@meineperfektewg.com'
		// 	);
		// }
	}


	public static function ajax_sendMailNewRoom()
	{
		return self::sendMailNewRoom(intval($_REQUEST['user']),$_REQUEST['xKalt']);
	}

	public static function ajax_activateRoom()
	{
		return self::switchRoomActiveState(true, intval($_REQUEST['room']));
	}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////		END NEW MAILINGS		//////////////////////////////
////////////////////////////////////////////////////////////////////////////////////





	public static function ajax_deactivateRoom()
	{
		return self::switchRoomActiveState(false, intval($_REQUEST['room']));
	}


	public static function deleteRoom($roomId)
	{
		$roomId = intval($roomId);
		if ($roomId == 0) return false;

		$userId			= xredaktor_feUser::getUserId();
		if ($userId == 0) return false;

		if (self::getAdminOfRoomByRoomId($roomId) != $userId) return false;


		// check ob roomies im raum sind
		$bewohner = fe_user::getUsersByRoomIdWithDetails($roomId);
		if (count($bewohner) > 1) {
			fe_user::setErrorMessage(fe_user::errorMessage_cant_delete_room_roomies_inside);
			frontcontrollerx::json_success(); // success damit das JS die page neu ladet..
		}

		dbx::update(self::$table_rooms, array('wz_online' => 'N', 'wz_USERDEL' => 'Y', 'wz_del' => 'Y', 'wz_USERDEL_TS' => 'NOW()'), array('wz_id' => $roomId));
		fe_user::setErrorMessage(fe_user::message_room_deleted);
		return true;
	}


	public static function getRoomById($roomId)
	{
		return dbx::query("SELECT * FROM wizard_auto_809 WHERE wz_id = $roomId AND wz_del = 'N'");
	}
	public static function sc_getMyRoomState($params)
	{

		fe_user::checkLoggedIn();
		$userId			= xredaktor_feUser::getUserId();

		//$room 			= self::getRoomDetailsByUserId($userId);

		$roomId = intval($params['roomId']);
		if ($roomId == 0) return 0;

		// soll das nur der admin vom raum wissen dürfen?
		//if (self::getAdminOfRoomByRoomId($roomId) != $userId) return 0;

		$room = self::getRoomById($roomId);

		if ($room['wz_ACTIVE'] == 'N')
		{
			return 0;
		}
		else
		{
			return 1;
		}


	}


	public static function update_mitbewohner_counts_of_room($roomId)
	{
		$roomId = intval($roomId);
		if ($roomId == false) return false;

		$cnt_female = intval(dbx::queryAttribute("SELECT COUNT(*) AS cntx FROM wizard_auto_707 WHERE
		wz_id IN (SELECT wz_id_low FROM wizard_auto_SIMPLE_W2W_707_809 WHERE wz_id_high = $roomId )

		AND wz_GESCHLECHT = 'F'", 'cntx'));

		$cnt_male = intval(dbx::queryAttribute("SELECT COUNT(*) AS cntx FROM wizard_auto_707 WHERE
			wz_id IN (SELECT wz_id_low FROM wizard_auto_SIMPLE_W2W_707_809 WHERE wz_id_high = $roomId )
			AND wz_GESCHLECHT != 'F'", 'cntx'));

		$cnt_female_unreg = intval(dbx::queryAttribute("SELECT wz_UNREG_F FROM wizard_auto_809 WHERE wz_id = $roomId ", 'wz_UNREG_F'));
		$cnt_male_unreg   = intval(dbx::queryAttribute("SELECT wz_UNREG_M FROM wizard_auto_809 WHERE wz_id = $roomId ", 'wz_UNREG_M'));
		$cnt_total_unreg = $cnt_female_unreg + $cnt_male_unreg;

		// einstweilen nehmen wir nur die zahlen die der raumadmin einstellt (UNREG_F, UNREG_M heißen die)
		if (1==2)
		{
			dbx::update("wizard_auto_809", array(
				'wz_COUNT_MITBEWOHNER_M' => $cnt_male + $cnt_male_unreg,
				'wz_COUNT_MITBEWOHNER_F' => $cnt_female + $cnt_female_unreg,
				'wz_COUNT_MITBEWOHNER' => $cnt_total + $cnt_total_unreg,
			), array('wz_id' => $roomId));

			return array(
				'MALE' 	 => $cnt_male + $cnt_male_unreg,
				'FEMALE' => $cnt_female + $cnt_female_unreg,
				'TOTAL'	 => $cnt_total + $cnt_total_unreg
			);
		}
		else {
			dbx::update("wizard_auto_809", array(
				'wz_COUNT_MITBEWOHNER_M' => $cnt_male_unreg,
				'wz_COUNT_MITBEWOHNER_F' => $cnt_female_unreg,
				'wz_COUNT_MITBEWOHNER' => $cnt_total_unreg,
			), array('wz_id' => $roomId));

			return array(
				'MALE' 	 => $cnt_male_unreg,
				'FEMALE' => $cnt_female_unreg,
				'TOTAL'	 => $cnt_total_unreg
			);
		}

	}


	public static function assignUser2Room($userId, $roomId, $email='')
	{
		$roomId			= intval($roomId);
		$userId			= intval($userId);
		$email 			= dbx::escape($email);

		if ($roomId == 0 || $userId == 0) return false;

		$present 		= dbx::query("select * from wizard_auto_SIMPLE_W2W_707_809 where wz_id_low = $userId and wz_id_high = $roomId");

		if ($present === false)
		{
			dbx::insert("wizard_auto_SIMPLE_W2W_707_809", array('wz_id_low' => $userId, 'wz_id_high' => $roomId));
		}

		dbx::query("delete from wizard_auto_822 where ((wz_ROOMID = $roomId and wz_USERID = $userId) OR (wz_ROOMID = $roomId and wz_EMAIL = '$email') )");

		fe_room::update_mitbewohner_counts_of_room($roomId);

		return true;
	}


	public static function getRoomImages($roomId)
	{
		$roomId			= intval($roomId);

		if ($roomId == 0) return array();

		$ret 			= dbx::queryAll("select * from wizard_auto_810 where wz_ROOMID = $roomId and wz_del='N' ORDER BY wz_id DESC ");

		if ($ret === false) $ret = array();

		return $ret;
	}


	public static function getRoomIdByUserId($userId)
	{
		$userId			= intval($userId);
		if ($userId == 0) return false;

		$roomId			= dbx::queryAttribute("select * from wizard_auto_809 where wz_ADMIN = $userId", "wz_id");

		return $roomId;

	}

	public static function getRoomIdsByUserId($userId)
	{
		$userId			= intval($userId);
		if ($userId == 0) return false;

		$roomIds		= dbx::queryAll("select * from wizard_auto_809 where wz_ADMIN = $userId");
		return $roomIds;
	}


	public static function getRoomDetailsByUserId($userId)
	{
		$userId			= intval($userId);
		if ($userId == 0) return false;

		$room			= dbx::query("select * from wizard_auto_809 where wz_ADMIN = $userId");

		return $room;

	}

	public static function getAdminOfRoomByRoomId($roomId)
	{
		$roomId = intval($roomId);
		if ($roomId == 0) return false;

		return intval(dbx::queryAttribute("SELECT wz_ADMIN FROM wizard_auto_809 WHERE wz_id = $roomId", 'wz_ADMIN'));
	}

	public static function ajax_profileSave()
	{
		$user 	= xredaktor_feUser::getUserInfo();

		if ($user === false)
		{
			frontcontrollerx::json_failure("ERROR: User not set");
		}
		$userId 	= intval($user['wz_id']);


		parse_str($_REQUEST['room'], $userReq);

		//$roomId		= self::getRoomIdByUserId($userId);
		$roomId = intval($userReq['id']);

		if ($roomId == 0)
		{
			frontcontrollerx::json_failure("ERROR: User has no Room?");
		}


		// check ob der raum eh dem user gehört
		if ($userId != self::getAdminOfRoomByRoomId($roomId))
		{
			frontcontrollerx::json_failure("ERROR: User $userId is NOT admin of room $roomId !");
		}

		parse_str($_REQUEST['room'], $userReq);

		$updateCollection = $userReq;

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

		$update 		= array();
		$updateUser 	= array();

		// also update userdata
		// extract user fields from request

		if(isset($updateCollection['allData']))
		{
			$userFields = array('VORNAME','NACHNAME','GEBURTSDATUM','TELEFON','BESCHREIBUNG','LAND');

			foreach ($updateCollection as $k => $v)
			{
				if (in_array($k, $userFields))
				{
					$updateUser['wz_'.$k] = $updateCollection[$k];
				}
				else
				{
					$update['wz_'.$k] = $updateCollection[$k];
				}
			}
			unset($update['wz_allData']);
		}
		else
		{
			foreach ($updateCollection as $k => $v) {
				$update['wz_'.$k] = $updateCollection[$k];
			}
		}



		// safety first
		unset($update['wz_id']);


		// handle specials

		// handle n:n
		$sprachen	= false;

		if (trim($update['wz_ZEITRAUM_VON']) != '')
		{
			$update['wz_ZEITRAUM_VON'] = date("Y-m-d", strtotime($update['wz_ZEITRAUM_VON']));
		}

		if (trim($update['wz_ZEITRAUM_BIS']) != '')
		{
			$update['wz_ZEITRAUM_BIS'] = date("Y-m-d", strtotime($update['wz_ZEITRAUM_BIS']));
		}


		// update room
		dbx::update("wizard_auto_809", $update, array("wz_id" => $roomId));
		self::update_mitbewohner_counts_of_room($roomId);

		frontcontrollerx::json_success();
	}



}
