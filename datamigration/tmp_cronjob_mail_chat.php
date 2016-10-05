<?

require_once(dirname(__FILE__).'/_includes.php');
require_once(dirname(__FILE__).'/../xgo/xplugs/_includes.php');

$items = dbx::queryAll("select c.wz_f_userid, c.wz_userid, max(c.wz_id) as 'wz_id' from chatitems c where wz_seen = 'N' and wz_deleted = 'N' and wz_f_userid = '10593' group by c.wz_f_userid ORDER BY `c`.`wz_f_userid`  ASC");

$ids_done	= array();

echo "\n\n Start sending mails New Chat Message(53) \n\n";


foreach ($items as $i) {
	
	$fUserId		= intval($i['wz_f_userid']);
	$userId			= intval($i['wz_userid']);	
	
	$countNotSeen	= fe_chat::getNotSeenCount($fUserId);
	echo "\n";
	
	$lastWzId				= intval($i['wz_id']);	

	$checkId	= dbx::queryAttribute("select wz_lastMailedMessageId from chatitems where wz_id = $lastWzId","wz_lastMailedMessageId");

	
	if((!in_array($fUserId, $ids_done)) && ($checkId != $lastWzId))
	{

		$user = dbx::query("select * from wizard_auto_707 where wz_id = $fUserId and wz_del = 'N' and wz_online = 'Y' and wz_emailbenachrichtigung != 'KEINE'");
		
		$email  = strtolower($user['wz_EMAIL']);
		$lng	= strtolower($user['wz_EMAILBENACHRICHTIGUNG']);
		
		$subject_1 = "Du hast " . $countNotSeen;
		$subject_2 = " neue Nachricht/en auf MeinePerfekteWG";
		
		/*
		if($lng == 'en')
		{
			$subject_1 = "You have ";
			$subject_2 = " new messages at MeinePerfekteWG";
		}
		*/
		 
		$replacers = fe_chat::get_mail_replacers_for_fuser($fUserId);
		
		echo "mail an " . $fUserId . " " . $email ."<br>";
		
		fe_user::burnMail(
			$email,
			53,
			$subject_1 . $subject_2,
			$replacers,
			array(),
			'office@meineperfektewg.com',
			'office@meineperfektewg.com'
		);
		
		
		dbx::update("chatitems", array('wz_lastMailedMessageId' =>  $lastWzId, 'wz_lastChanged' => 'NOW()'), array('wz_id' => $lastWzId));
	
		$ids_done[] = $fUserId;

		echo "DB updated: " . "fUser: $fUserId " . "wz_id: $lastWzId " ."<br>";
		
	}
	else
	{
		echo "$fUserId already done";
		continue;
	}
}

echo "\n\r\n\r DONE \n\n\n";


