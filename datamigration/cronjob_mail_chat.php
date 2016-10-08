<?

require_once(dirname(__FILE__).'/_includes.php');
require_once(dirname(__FILE__).'/../xgo/xplugs/_includes.php');


$items = dbx::queryAll("SELECT wz_F_USERID, wz_USERID, max(wz_id) AS msgID FROM chatitems WHERE wz_SEEN = 'N' and wz_DELETED = 'N' AND wz_F_USERID = '10593' GROUP BY wz_F_USERID");

$log_file = 'cronlog.log';

//$ids_done	= array();

echo "\n\n Start sending mails New Chat Message \n\n";

foreach ($items as $k => $i) {

	$fUserId		= intval($i['wz_F_USERID']);

	$userId			= intval($i['wz_USERID']);

	$countNotSeen	= fe_chat::getNotSeenCount($fUserId);

	$lastWzId		= intval($i['msgID']);

	$checkId	= intval(dbx::queryAttribute("SELECT wz_lastMailedMessageId FROM chatitems WHERE wz_id = " . $i['msgID'], 'wz_lastMailedMessageId'));

	// if((!in_array($fUserId, $ids_done)) && ($checkId != $i['wz_id']))
	if ($checkId != $lastWzId)
	{

		$user = dbx::query("SELECT * FROM wizard_auto_707 WHERE wz_id = $fUserId and wz_del = 'N' and wz_online = 'Y' and wz_EMAILBENACHRICHTIGUNG != 'KEINE'");

		$email   = trim($user['wz_EMAIL']);

		$replacers = fe_chat::get_mail_replacers_for_fuser($fUserId);

		fe_user::burnMail(
			$email,
			53,
			'Du hast ' . $countNotSeen . ' neue Nachricht/en auf MeinePerfekteWG',
			$replacers,
			array(),
			'office@meineperfektewg.com',
			'office@meineperfektewg.com'
		);

		dbx::query("UPDATE chatitems SET wz_lastMailedMessageId = $lastWzId, wz_lastChanged = NOW() WHERE wz_id = $lastWzId");
		//dbx::update("chatitems", array('wz_lastMailedMessageId' =>  $lastWzId, 'wz_lastChanged' => 'NOW()'), array('wz_id' => $lastWzId));

		$data = "DB updated: " . "fUser: $fUserId " . "wz_id: " . $i['msgID'] . " mail: $email" ."\n";
		file_put_contents($log_file, $data, FILE_APPEND);

	}
	else
	{
		$data = "fUser: $fUserId " . "already done\n";

		file_put_contents($log_file, $data, FILE_APPEND);

		continue;
	}
}

echo "\n\r\n\r DONE \n\n\n";
