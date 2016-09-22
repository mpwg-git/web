<?

// update `mail_queue` set mq_state = 'Q', `mq_last_smtp_contact` = '0000-00-00 00:00:00', `mq_error` = '', `mq_sent` = '0000-00-00 00:00:00'

class xredaktor_mailbroadcaster {

	private static function echoCron($txt)
	{
		echo "$txt<br>\n";
	}

	public static function errorPrint($msg)
	{
		$html = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Fehler</title>
<style type='text/css'>
.aaaaaaa {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 18px;
	color:red;
}
</style>
</head>

<body class='aaaaaaa'>
$msg
</body>
</html>
";
		die($html);
	}

	public static function infoPrint($msg)
	{
		$html = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Fehler</title>
<style type='text/css'>
.aaaaaaa {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 18px;
	color:black;
}
</style>
</head>

<body class='aaaaaaa'>
$msg
</body>
</html>
";
		die($html);
	}


	public static function getMailByDataRecord($record)
	{
		return $record['wz_EMAIL'];
	}

	public static function getUidByDataRecord($record)
	{
		return $record['wz_id'];
	}

	public static function getNameByDataRecord($record)
	{
		$wz_VORNAME		= $record['wz_VORNAME'];
		$wz_NACHNAME	= $record['wz_NACHNAME'];
		$wz_EMAIL		= self::getMailByDataRecord($record);
		//$wz_EMAIL 		= "alexander.schramm@pixelfarmers.at";

		$to = trim($wz_VORNAME." ".$wz_NACHNAME);
		$to = trim(str_replace("null",'',$to));

		if ($to == "")
		{
			$to = $wz_EMAIL;
		}

		return $to;
	}

	public static function getContactsForSubmission()
	{
		$contacts = dbx::queryAll("SELECT * FROM `wizard_auto_102` WHERE `wz_SPRACHE` = '1' and `wz_NEWSLETTER_1` = 'on' and wz_del = 'N'");
		return $contacts;
	}

	public static function getContactById($u_id)
	{
		$contact = dbx::query("SELECT * FROM `wizard_auto_102` WHERE wz_id = $u_id");
		return $contact;
	}

	public static function fixHtmlForAbmelden($htmlTemplate,$record)
	{

		$wz_id			= $record['wz_id'];
		$wz_TITEL		= $record['wz_TITEL'];
		$wz_ANREDE		= $record['wz_ANREDE'];
		$wz_VORNAME		= $record['wz_VORNAME'];
		$wz_NACHNAME	= $record['wz_NACHNAME'];
		$wz_EMAIL		= $record['wz_EMAIL'];
		$URLPOSTFIX		= "?r_id=$wz_id&nl=november2011&usr=$wz_EMAIL";
		$unsubscripe 	= "?p_id=194&r_id=$wz_id&nl=november2011&usr=$wz_EMAIL";

		switch ($wz_ANREDE)
		{
			case '1':
				$wz_ANREDE = "Sehr geehrte Frau";
				break;
			case '2':
				$wz_ANREDE = "Sehr geehrter Herr";
				break;
			case '3':
				$wz_ANREDE = "Sehr geehrte Familie";
				break;
			default: continue;
		}

		$s = array('[GREETING]','[ANREDE]','[TITEL]','[NACHNAME]','[URLPOSTFIX]','[UNSUBSCRIBEURL]');
		$r = array('',$wz_ANREDE,$wz_TITEL,$wz_NACHNAME,$URLPOSTFIX,$unsubscripe);
		$html = str_replace($s,$r,$htmlTemplate);

		return $html;
	}

	public static function burnMail($nextMail,$msettings,$userRecord) {


		$state = false;
		$error = "Unbekannter Fehler";

		$to_name 	= self::getNameByDataRecord($userRecord);
		$to_email	= self::getMailByDataRecord($userRecord);
		//$to_email 	= "alexander.schramm@pixelfarmers.at";

		if ($to_name == "")
		{
			$to_name = $to_email;
		}

		$cfg 					= json_decode($msettings['mqs_mailconfig'],true);
		$html 					= self::fixHtmlForAbmelden($cfg['html'],$userRecord);
		$mq_mqs_id 				= $nextMail['mq_mqs_id'];
		$mailingSettings 		= dbx::query("select * from mail_queue_settings where mqs_id = $mq_mqs_id");;

		$subject				= $mailingSettings['mqs_subject'];

		$s_mail_smtp_server		= 'mail.gitgo.at';
		$s_mail_smtp_user		= 'tennerhof@gitgo.at';
		$s_mail_smtp_pwd		= 'imac7000';
		$s_mail_from_name		= 'Relais & Châteaux Hotel Tennerhof';
		$s_mail_from_email		= 'tennerhof@gitgo.at';
		$s_mail_reply_name		= 'Relais & Châteaux Hotel Tennerhof';
		$s_mail_reply_email		= 'tennerhof@gitgo.at';

		$mailCfg = array(
		'to'						=> array('email' => $to_email, 				'name' => $to_name ),
		'from'						=> array('email' => $s_mail_from_email ,	'name' => $s_mail_from_name ),
		'reply'						=> array('email' => $s_mail_reply_name ,	'name' => $s_mail_reply_email ),
		'html'						=> $html,
		'txt'						=> '',
		'subject'					=> $subject,
		'priority'					=> mailx::PRIO_NORMAL,
		'imageProcessing' 			=> true,
		'imageProcessing_type' 		=> 'embedd',
		'imageProcessing_location' 	=> dirname(xredaktor_storage::getDirOfStorageScope(15)),
		'smtp_settings'				=> array(
		'smtp_server'				=> $s_mail_smtp_server,
		'smtp_user'					=> $s_mail_smtp_user,
		'smtp_pwd'					=> $s_mail_smtp_pwd,
		));

		$state = self::sendMail($mailCfg);
		if ($state === true)
		{
			$error = "";
		}
		else
		{
			$errorTxt = self::sendMailGetLastError();
			if (trim($errorTxt) != "") $error = $errorTxt;
		}

		return array($state,$error);
	}

	public static function sendMail($cfg)
	{
		echo "<pre>";
		print_r($cfg['to']);
		echo "</pre>";

		//return false;
		return mailx::sendMail($cfg);
	}

	public static function sendMailGetLastError()
	{
		return "Simulierter Fehler";
		return mailx::sendMailGetLastError();
	}

	public static function doMailCron() {

		dbx::insert("mail_queue_cron",array(
		'mqc_ts' 		=> 'NOW()',
		'mqc_ip' 		=> $_SERVER['REMOTE_ADDR'],
		'mqc_runtime'	=> 0
		));

		$cronId = dbx::getLastInsertId();
		
		$processMailing = dbx::query("select * from mail_queue_settings where mqs_state = 'NOT_PROCESSED'");
		if ($processMailing === false) echo ("Keinen neuen Newsletter gefunden.<br>");
		else {

			$mqs_id = $processMailing['mqs_id'];
			$mqs_blocking_processing_key = $mqs_id.'_'.md5(time().rand());


			dbx::query("update mail_queue_settings set mqs_blocking_processing_key = '$mqs_blocking_processing_key', mqs_state='INIT' where mqs_state = 'NOT_PROCESSED' and mqs_blocking_processing_key = 'TAKE_ME' and mqs_id = $mqs_id");
			$processMailing = dbx::query("select * from mail_queue_settings where mqs_state = 'INIT' and mqs_blocking_processing_key = '$mqs_blocking_processing_key' and mqs_id = $mqs_id");
			if ($processMailing === false) die('Job leider weggeschnappt...');

			$contacts = self::getContactsForSubmission();
			$cntXXX = 0;

			foreach ($contacts as $contact) {

				$u_id = self::getUidByDataRecord($contact);
				$presentInQ	= dbx::query("select * from mail_queue where mq_u_id = $u_id and mq_mqs_id = $mqs_id");

				if ($presentInQ === false) {
					dbx::insert("mail_queue",array(
					'mq_state' 		=> 'Q',
					'mq_u_id' 		=> $u_id,
					'mq_mqs_id' 	=> $mqs_id,
					'mq_created' 	=> 'NOW()',
					));
				}

				echo "Newsletter $cntXXX angelegt...<br>";
				$cntXXX++;
			}
		}

		$cacheQSettings = array();

		$sent_limit_time_min 	= 10;
		$sent_limit_max_mails 	= 50;
		$delay_failed_min		= 15;

		$run 		= true;
		$secCheck 	= $sent_limit_max_mails+10;

		$mailsSend  = 0;
		
		while ($run)
		{
			$secCheck--;
			if ($secCheck <= 0)
			{
				$run = false;
				echo('ERROR LOOPING<br>');
				continue;
			}

			// checking the current limits
			$currentLimits 	= dbx::query("select count(*) as sent_in_last_time from mail_queue where mq_last_smtp_contact > DATE_SUB(NOW(), INTERVAL $sent_limit_time_min MINUTE ) ");
			$open 			= $sent_limit_max_mails;
			$open 			-= $currentLimits['sent_in_last_time'];

			if ($open <=0 ) // Darf ich noch schicken ?
			{
				echo "Darf derzeit keine Mails schicken ...<br>";
				$run = false;
				continue;
			}

			echo "Kann jetzt noch $open Mails schicken ...<br>";

			$nextMail = dbx::query("select * from mail_queue where mq_state NOT IN ('S','E3','U','EE') and ((mq_state = 'Q') OR (mq_last_smtp_contact < DATE_SUB(NOW(), INTERVAL $delay_failed_min MINUTE )))");

			if ($nextMail === false) {
				$run = false;
				continue;
			}

			// Getting Mailing Settings
			$mq_mqs_id 	= $nextMail['mq_mqs_id'];
			$mq_id		= $nextMail['mq_id'];
			$mq_state	= $nextMail['mq_state'];
			$mq_u_id	= $nextMail['mq_u_id'];

			$userRecord = self::getContactById($mq_u_id);
			$mq_email	= self::getMailByDataRecord($userRecord);

			list($mail,$domain) = explode("@",$mq_email);
			if ((trim($mail) == "") || (trim($domain) == "")) {

				dbx::update('mail_queue',
				array(
				'mq_state'				=> 'EE',
				'mq_error'				=> 'E-MAIL CONFIG WRONG',
				'mq_last_smtp_contact'	=>'NOW()',
				),array('mq_id'=>$mq_id));
				continue;
			}

			if (!isset($cacheQSettings[$mq_mqs_id]))
			{
				$cacheQSettings[$mq_mqs_id] = dbx::query("select * from mail_queue_settings where mqs_id = $mq_mqs_id");
			}

			$msettings = $cacheQSettings[$mq_mqs_id];
			list($state,$error) = self::burnMail($nextMail,$msettings,$userRecord);

			$mailsSend++;
			dbx::query("update mail_queue_cron set mqc_runtime = TIME_TO_SEC(TIMEDIFF(NOW(), mqc_ts)), `mqc_mail_cnt` = $mailsSend where mqc_id =  $cronId");
					
			ob_flush();
			flush();
			ob_flush();
			flush();

			if ($state === true) {
				dbx::update('mail_queue',
				array(
				'mq_state'				=>'S',
				'mq_error'				=> '',
				'mq_sent'				=>'NOW()',
				'mq_last_smtp_contact'	=>'NOW()',
				),array('mq_id'=>$mq_id));
				echo "Mail an $mq_email geschickt!<br>";
			} else
			{
				switch ($mq_state)
				{
					case 'Q':
						$mq_state_new = 'E1';
						break;
					case 'E1':
						$mq_state_new = 'E2';
						break;
					case 'E2':
						$mq_state_new = 'E3';
						break;
					default: die("INVALID mq_state");
				}

				echo "<span style='color:red'>Mail kann NICHT an '$mq_email' geschickt werden. Neuer Status : <b>$mq_state_new</b>.</span><br>";

				dbx::update('mail_queue',
				array(
				'mq_error'				=> $error,
				'mq_state'				=> $mq_state_new,
				'mq_last_smtp_contact'	=>'NOW()',
				),array('mq_id'=>$mq_id));

				if ($mq_state_new == "E3") // TOT
				{
					echo "Mail kann nicht an $mq_email[$mq_u_id] geschickt werden.<br>";
					continue;
				}
			}
		}

		echo "<br><br>CRONJOB - ENDE<br>";



	}

	public static function startBroadCaster()
	{
		$html = xredaktor_render::renderPage(193,true);

		$cfg = array(
		'html' => $html
		);

		dbx::insert('mail_queue_settings',array(
		'mqs_subject' 		=> "Landsitz Römerhof Top-Eröffnungsangebot",
		'mqs_mailconfig' 	=> json_encode($cfg),
		'mqs_created' 		=> 'NOW()',
		'mqs_state' 		=> 'NOT_PROCESSED'
		));

	}
}
