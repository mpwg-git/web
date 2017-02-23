<?

class fe_chat
{

	public static function ajax_submitMessage()
	{

		$userId 	= intval(xredaktor_feUser::getUserId());
		$fUserId 	= intval($_REQUEST['userid']);

		if ($userId == 0 || $fUserId == 0) return array();

		// check if my user_acc is active
		$iAmActive 			= fe_user::is_active($userId);
		$isOtherActive 		= fe_user::is_active($fUserId);
		$iBlockThisUser 	= fe_user::doIBlockUser($fUserId);
		$iAmBlocked 		= fe_user::amIBlockedFromUser($fUserId);

		if (!$iAmActive)
		{
			$html = xredaktor_render::renderSoloAtom(857, array('error' => 'sender_inactive', 'showFace' => 0));
			frontcontrollerx::json_failure(array('html' => $html));
		}

		else if (!$isOtherActive)
		{
			$html = xredaktor_render::renderSoloAtom(857, array('error' => 'receiver_inactive', 'showFace' => 0));
			frontcontrollerx::json_failure(array('html' => $html));
		}

		// check if other user_acc is in block list
		else if ($iBlockThisUser)
		{
			$html = xredaktor_render::renderSoloAtom(857, array('error' => 'you_block_receiver', 'showFace' => 0));
			frontcontrollerx::json_failure(array('html' => $html));
		}

		// check if my user_acc is in block list
		else if ($iAmBlocked)
		{
			$html = xredaktor_render::renderSoloAtom(857, array('error' => 'receiver_blocking_you', 'showFace' => 0));
			frontcontrollerx::json_failure(array('html' => $html));
		}


		$myAtomId			= 680;
		$yourAtomId			= 697;

		$message			= dbx::escape($_REQUEST['message']);

		dbx::insert("chatitems", array('wz_USERID' => $userId, 'wz_F_USERID' => $fUserId, 'wz_MESSAGE' => $message, 'wz_TIME' => 'NOW()'));

		$maxId = dbx::getLastInsertId();

		$insertedData = dbx::query("SELECT user1.wz_VORNAME AS chat_vorname,
		user1.wz_PROFILBILD AS chat_img,
		DATE_FORMAT(chatitems.wz_TIME, '%d.%m.%Y %H:%i:%S') AS chat_time,
		chatitems.wz_MESSAGE AS chat_text,
		chatitems.wz_DELETED AS chat_deleted,
		IF( user1.wz_id =  $userId,  'sender',  'receiver' ) AS direction
		FROM
			chatitems, wizard_auto_707 as user1
		WHERE
			(wz_USERID = $userId and user1.wz_id = $userId)
		and chatitems.wz_del = 'N'
		and chatitems.wz_id = $maxId");

		//sth wrong?
		if ($insertedData === false){
			$html = '';
		}
		else
		{
			$html 	= xredaktor_render::renderSoloAtom(680, array('data' => $insertedData));
		}

		frontcontrollerx::json_success(array('html' => $html,'maxid' => $maxId));
	}

	public static function sc_getConversations()
	{
		//print_r(self::ajax_getConversations(true)); die();
		return self::ajax_getConversations(true);
	}

	public static function ajax_getConversations($return = false)
	{
		$userId 		= xredaktor_feUser::getUserId();

		$users		= self::getInvolvedUsers($userId);

		if (libx::isDeveloper())
		{
			//print_r($users); die();
		}

		$results		= array();

		foreach ($users as $k => $v) {

			$user					= fe_user::getUserDataOnly($v['otherUser']);
			$user['PROFILEIMAGE'] 	= fe_user::getProfileImage($v['otherUser']);

			$assign = array(
				'USER' 		=> $user,
				'MESSAGE'	=> self::getLastMessageFromConversation($userId, $v['otherUser']),
				'NOTSEEN'	=> self::getNotSeenCount($userId, $v['otherUser'])
			);

			$results[] 	= xredaktor_render::renderSoloAtom(679, array('data' => $assign));
		}

		if (count($results) > 0)
		{
			$html 		= implode("", $results);
		}

		if ($return === true) return $html;

		frontcontrollerx::json_success(array('html' => $html));
	}

	public static function getNotSeenCount($userId, $otherUserID = null)
	{
		$userId 	= intval($userId);
		if ($userId == 0) return 0;

		if (intval($otherUserID) > 0)
		{
			$otherUserID = intval($otherUserID);
			$count = dbx::queryAttribute("select count(wz_id) as cnt from chatitems where wz_F_USERID = $userId and wz_SEEN = 'N' AND wz_USERID = $otherUserID ", "cnt");
		}
		else {
			$count = dbx::queryAttribute("select count(wz_id) as cnt from chatitems where wz_F_USERID = $userId and wz_SEEN = 'N'", "cnt");
		}


		if ($count === false) return 0;

		return $count;
	}


	public static function getLastMessageFromConversation($userId, $fUserId)
	{
		$fUserId 	= intval($fUserId);
		$userId 	= intval(xredaktor_feUser::getUserId());
		if ($userId == 0 || $fUserId == 0) return $html;

		$lastMessage	= dbx::query("select * from chatitems where (wz_USERID = $userId and wz_F_USERID = $fUserId) OR (wz_USERID = $fUserId and wz_F_USERID = $userId) ORDER BY wz_id DESC LIMIT 1");

		if ($lastMessage === false) return false;

		return $lastMessage;
	}


	public static function getLastMessageId($userId, $fUserId)
	{
		$fUserId 	= intval($fUserId);
		$userId		= intval($userId);
		if ($userId == 0 || $fUserId == 0) return 0;

		$lastMessage = dbx::query("select * from chatitems where (wz_USERID = $userId and wz_F_USERID = $fUserId) OR (wz_USERID = $fUserId and wz_F_USERID = $userId) ORDER BY wz_id DESC LIMIT 1");

		$lastMessageId	= intval($lastMessage['wz_id']);

		if ($lastMessageId == 0) return 0;

		return $lastMessageId;
	}


	public static function get_mail_replacers_for_fuser($fUserId)
	{
		$fUserId = intval($fUserId);
		if ($fUserId == 0) return array();

		$user = dbx::query("SELECT * FROM wizard_auto_707 WHERE wz_id = $fUserId ");
		$lng = xredaktor_pages::getFrontEndLang();

		$replacers = array();

		$replacers['###VORNAME###'] = $user['wz_VORNAME'];

		$replacers['###LINK###']	= 'http://' . $_SERVER["SERVER_NAME"] . '/' . $lng . '/anmelden';

		return $replacers;
	}

	public static function getInvolvedUsers($userId)
	{
		$userId 		= intval($userId);
		if ($userId == 0) return array();

		$sql			= "select *, IF(wz_USERID =  '$userId',  wz_F_USERID,  wz_USERID ) AS otherUser  from chatitems where (wz_USERID = $userId OR wz_F_USERID = $userId) GROUP BY otherUser";
		$involvedUsers	= dbx::queryAll($sql);

		$aux			= array();
		foreach ($involvedUsers as $k => $v)
		{
			$fUserId	= $v['otherUser'];

			$delAttr = dbx::queryAttribute("select wz_del from wizard_auto_707 where wz_id = $fUserId","wz_del");
			$active = dbx::queryAttribute("select wz_ACTIVE from wizard_auto_707 where wz_id = $fUserId","wz_ACTIVE");

			if($delAttr == 'N' && $active == 'Y')
			{
				if (self::checkConversationHidden($userId, $fUserId) == false)
				{
					$aux[] = $v;
				}
			}
		}

		return $aux;
	}


	public static function checkConversationHidden($userId, $fUserId)
	{
		$userId				= intval($userId);
		$fUserId			= intval($fUserId);
		$lastMessage		= self::getLastMessageFromConversation($userId,$fUserId);

		if ($lastMessageId === false) return false;

		$lastMessageId		= intval($lastMessage['wz_id']);

		$present			= dbx::query("select * from wizard_auto_801 where wz_USERID = $userId AND wz_F_USERID = $fUserId and wz_FROM_MESSAGE >= $lastMessageId and wz_del='N'");

		if ($present === false)
		{
			return false;
		}
		else
		{
			return true;
		}

	}

	public static function ajax_hideConversation()
	{
		$fUserId		= intval($_REQUEST['userId']);
		$messageId		= intval($_REQUEST['messageId']);
		$userId 		= intval(xredaktor_feUser::getUserId());

		if ($fUserId == 0 || $messageId == 0 || $userId == 0)
		{
			frontcontrollerx::json_success(array('ERROR' => 'user or message 0'));
		}

		dbx::insert("wizard_auto_801", array('wz_USERID' => $userId, 'wz_F_USERID' => $fUserId, 'wz_FROM_MESSAGE' => $messageId));

		frontcontrollerx::json_success();
	}

	public static function getMessagesByFUser($fUserId)
	{

		$fUserId 	= intval($fUserId);
		$userId 	= intval(xredaktor_feUser::getUserId());
		if ($userId == 0 || $fUserId == 0) return $html;

	}

	public static function ajax_checkMessages()
	{

		$html 		= "";

		$fUserId 	= intval($_REQUEST['userid']);
		$maxId		= intval($_REQUEST['maxid']);

		$userId 		= intval(xredaktor_feUser::getUserId());


		if ($userId == 0 || $fUserId == 0) return $html;

		$myAtomId			= 680;
		$yourAtomId			= 697;

		//die();

		// WEB-306: Beim Where hat beim userID selektions-teil eine klammer drumrum gefehlt..
		$sqlTest = "SELECT MAX( chatitems.wz_id ) AS maxid
			 FROM  chatitems, wizard_auto_707 as user1, wizard_auto_707 as user2
			 WHERE
			 (
				(
					(wz_USERID = $userId and user1.wz_id = $userId)
					and
					(wz_F_USERID = $fUserId and user2.wz_id = $fUserId)
				)
				OR
				(
					(wz_USERID = $fUserId and user1.wz_id = $fUserId)
					and
					(wz_F_USERID = $userId and user2.wz_id = $userId)
				)
			)
			and chatitems.wz_del = 'N'
			and chatitems.wz_id > ".$maxId."
			order by MAX(chatitems.wz_id) desc";

		$maxIdTest		= dbx::queryAttribute($sqlTest, 'maxid');

		if ($maxIdTest === false)
		{
			frontcontrollerx::json_success();
		}


		$sql = "SELECT user1.wz_VORNAME 						AS chat_vorname,
			user1.wz_PROFILBILD 								AS chat_img,
			DATE_FORMAT(chatitems.wz_TIME, '%d.%m.%Y %H:%i:%S') AS chat_time,
			chatitems.wz_MESSAGE 								AS chat_text,
			chatitems.wz_id 									AS chat_message_id,
			chatitems.wz_DELETED 								AS chat_deleted,
			chatitems.wz_SEEN										AS chat_seen,
			IF( user1.wz_id =  $userId,  'sender',  'receiver' ) AS direction
			FROM chatitems, wizard_auto_707 as user1, wizard_auto_707 as user2
			WHERE
			(
				(
					(wz_USERID = $userId and user1.wz_id = $userId)
					and
					(wz_F_USERID = $fUserId and user2.wz_id = $fUserId)
				)
				OR
				(
					(wz_USERID = $fUserId and user1.wz_id = $fUserId)
					and
					(wz_F_USERID = $userId and user2.wz_id = $userId)
				)
			)
			and chatitems.wz_del = 'N'
			and chatitems.wz_id > $maxId
			order by chatitems.wz_id asc";

		$allMessages = dbx::queryAll($sql);


		// update messages as already seen
		$other_userid = intval($_REQUEST['other_userid']);
		//
		// echo "$other_userid\n";
		// echo "$userId\n";
		// print_r($allMessages);
		// die("eeeeeeeeeee");
		if ($other_userid > 0 ) {
			//
			// echo "$userId\n";
			// echo "$other_userid\n";
			// echo "$maxId\n";
			// print_r($allMessages);
			//
			// die("cccccccccccc");

			//dbx::query("update chatitems set wz_SEEN = 'Y' where wz_F_USERID = $userId AND wz_USERID = $other_userid and wz_id > $maxId");
			dbx::query("update chatitems set wz_SEEN = 'Y' where wz_USERID = $other_userid AND wz_F_USERID = $userId and wz_id > $maxId");
		}


		$results		= array();

		foreach ($allMessages as $k => $v)
		{
			switch ($v['direction'])
			{
				case 'sender':
					$results[] = xredaktor_render::renderSoloAtom($myAtomId, array('data' => $v));
					break;

				case 'receiver':
					$results[] = xredaktor_render::renderSoloAtom($yourAtomId, array('data' => $v));
					break;

				default:
					//die("sth wrnog");
					break;
			}
		}

		if (count($results) > 0)
		{
			$html 		= implode("", $results);
		}

		frontcontrollerx::json_success(array('html' => $html, 'maxid' => $maxIdTest));
	}


	public static function ajax_checkConversations()
	{

		$html 	= "";

		$fUserId 	= intval($_REQUEST['userid']);
		$maxId		= intval($_REQUEST['maxid']);

		$userId 	= intval(xredaktor_feUser::getUserId());

		if ($userId == 0 || $fUserId == 0) return $html;


		$html = self::ajax_getConversations(true);

		frontcontrollerx::json_success(array('html' => $html));
	}

}
