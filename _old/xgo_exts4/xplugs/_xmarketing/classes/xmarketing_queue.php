<?

class xmarketing_queue
{

	public static function getById($xmsq_id)
	{
		$xmsq_id = xmarketing_security::safe_send_queue_id($xmsq_id);
		if ($xmsq_id == 0) return false;
		$q = dbx::query("select *,UNCOMPRESS(xmsq_html) as xmsq_html from xm_send_queue where xmsq_id = $xmsq_id");
		return $q;
	}

	public static function getQueueHtmlById($xmsq_id)
	{
		$xmsq_id = xmarketing_security::safe_send_queue_id($xmsq_id);
		$q = self::getById($xmsq_id);
		if ($q === false) return false;
		return $q['xmsq_html'];
	}

	public static function checkIfValidEmail($email)
	{
		return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email);
	}

	public static function sendQueuedHtmlMailToTestEMail($xmsq_id,$email)
	{
		if (!self::checkIfValidEmail($email)) return xmarketing_error::$INVALID_EMAIL;

		$xmsq_id 	= xmarketing_security::safe_send_queue_id($xmsq_id);

		$q			= self::getById($xmsq_id);
		if ($q === false) return xmarketing_error::$INVALID_QUEUE;

		$xmsq_e_id	= xmarketing_security::safe_emissions_id($q['xmsq_e_id']);
		$html 		= self::getQueueHtmlById($xmsq_id);

		$sc 		= xmarketing_emissions::getSenderAccountsById($xmsq_e_id);
		if ($sc === false) {
			return xmarketing_error::$NO_SEND_CONNECTORS;
		}

		$xmsc_id = xmarketing_security::safe_send_connectors_id($sc[0]['xmsc_id']);
		if ($xmsc_id == 0) {
			return xmarketing_error::$INVALID_SEND_CONNECTOR_ID;
		}
		$subject	= xmarketing_emissions::getSubjectIdById($xmsq_e_id);
		$files		= xmarketing_emissions::getAttachedFiles($xmsq_e_id);
		$state 		= xmarketing_config::burnMail(xmarketing_config::getCurrentSiteIdStorage(),$xmsc_id,$email,$email,$subject,$html,array(),'embedd',3,$files);

		if ($state === false)
		{
			return mailx::sendMailGetLastError();
		}

		return true;
	}


	public static function fillEmissionIntoQ($xme_id)
	{
		error_reporting(E_ERROR | E_PARSE);

		set_time_limit(0);
		ignore_user_abort(true);

		dbx::query("UPDATE `xm_recipients` SET  `xmr_canceled` =  'N' WHERE  `xmr_canceled` =  ''");
		
		$e				= xmarketing_emissions::getByid($xme_id);

		$xme_s_id 		= intval($e['xme_s_id']);
		$xme_subject	= trim($e['xme_subject']);


		$rs 		= xmarketing_emissions::getRecieptsByEmissionId_iterable($xme_id);
		if ($rs === false) $rs = array();


		$stop 		= 1;
		$limiter 	= 1;

		$time_start = microtime(true);

		foreach ($rs as $r)
		{
			$xmr_id 	= intval($r['unique_xmr_id']);
			$xmr_email 	= $r['xmr_email'];

			if (!xmarketing_security::isValidEmail($xmr_email))
			{
				$db = array(
				'xmsq_s_id' 	=> $xme_s_id,
				'xmsq_e_id' 	=> $xme_id,
				'xmsq_r_id' 	=> $xmr_id,
				'xmsq_subject' 	=> $xme_subject,
				'xmsq_state' 	=> 'EMAIL_ERROR',
				'xmsq_created'	=> 'NOW()'
				);
				dbx::insert('xm_send_queue',$db);
				continue;
			}

			$present 	= false;
			$present 	= dbx::query("select xmsq_id from xm_send_queue where xmsq_e_id = $xme_id and xmsq_r_id = $xmr_id and xmsq_s_id = $xme_s_id");
			if ($present !== false)	continue;

			$db = array(
			'xmsq_s_id' 	=> $xme_s_id,
			'xmsq_e_id' 	=> $xme_id,
			'xmsq_r_id' 	=> $xmr_id,
			'xmsq_subject' 	=> $xme_subject,
			'xmsq_state' 	=> 'WAIT_4_Q',
			'xmsq_created'	=> 'NOW()'
			);

			dbx::insert('xm_send_queue',$db);
			$xmsq_id = dbx::getLastInsertId();

			### MERGE USER INFOS
			$html = xmarketing_emissions::generateHtmlMailForSubmission($xme_id,$xmr_id);

			### MERGE SENDING INFOS
			$html = xmarketing_landingpage::replaceLinksForSendingForThisUserAndEmission($xmsq_id,$xme_id,$html);

			### INSERT HTML
			dbx::update('xm_send_queue',array('xmsq_html'=>$html),array('xmsq_id'=>$xmsq_id));

			### COMPRESS HTML
			dbx::query("update xm_send_queue set xmsq_html = compress(xmsq_html) where xmsq_id = $xmsq_id");

			$limiter++;
			if ($limiter >= $stop) {
				//break;
			}
		}

		$mem 		= hdx::bytes2HumanReadAble(memory_get_usage());
		$runtime 	= microtime(true) - $time_start;
		//echo "x$limiter MU :: ". $mem . " |  $runtime <br>";

		return true;
	}

	private static function transportMailOk($xmsq_id)
	{
		$db = array(
		'xmsq_mine'					=> '',
		'xmsq_ts_S'					=> 'NOW()',
		'xmsq_smtp_last_contact'	=> 'NOW()',
		'xmsq_state'				=> $xmsq_state,
		'xmsq_state'				=> 'S',
		);
		dbx::update('xm_send_queue',$db,array('xmsq_id' => $xmsq_id));
	}

	private static function transportMailError($xmsq_id, $xmsq_state, $xmsq_error_h="")
	{
		$db = array('xmsq_mine'=>'','xmsq_smtp_last_contact'=>'NOW()','xmsq_state'=>$xmsq_state,'xmsq_error_h'=>$xmsq_error_h);

		switch ($xmsq_state)
		{
			case 'EE':
				$db['xmsq_ts_EE'] = "NOW()";
				break;
			case 'E1':
				$db['xmsq_ts_E1'] = "NOW()";
				break;
			case 'E2':
				$db['xmsq_ts_E2'] = "NOW()";
				break;
			case 'E3':
				$db['xmsq_ts_E3'] = "NOW()";
				break;
			default: break;
		}

		dbx::update('xm_send_queue',$db,array('xmsq_id'=>$xmsq_id));
	}

	private static function transportMail($xmsq_id, $xmsc_id)
	{
		// die("TTT::$xmsq_id");
		// CHECK IF I WAS THE FIRST

		$xmsq_id = intval($xmsq_id);
		$xmsc_id = intval($xmsc_id);

		$xmsq_mine 		= md5(rand().time());
		dbx::query("update xm_send_queue set xmsq_mine = '$xmsq_mine' where xmsq_id = $xmsq_id and xmsq_mine=''");

		$iAmTheWinner 	= dbx::query("select xmsq_id from xm_send_queue where xmsq_id = $xmsq_id and xmsq_mine = '$xmsq_mine'");
		if ($iAmTheWinner === false) {
			echo "<pre>Lost Processing: $xmsq_id</pre>";
			return false; // OTHER PROCESS took it.
		}
		echo "<pre>Processing: $xmsq_id</pre>";

		if ($xmsq_id == 0) return false;
		if ($xmsc_id == 0) {
			self::transportMailError($xmsq_id,'E_SMTP_CONFIG');
			return false;
		}

		//
		// GET SEND - CONNECTOR
		//

		$sc = dbx::query("select * from xm_send_connectors where xmsc_id = $xmsc_id and xmsc_del = 'N'");
		if ($sc === false)
		{
			self::transportMailError($xmsq_id,'E_SMTP_CONFIG',"SC :: $xmsc_id nicht gefunden.");
			return false;
		}

		//
		// GET USER, MESSAGE
		//

		$q  = dbx::query("select *,UNCOMPRESS(xmsq_html) as xmsq_html from xm_send_queue where xmsq_id = $xmsq_id");
		if ($q === false) {
			self::transportMailError($xmsq_id,'EE',"Q :: $xmsq_id nicht gefunden.");
			return false;
		}

		$xmsq_state 	= $q['xmsq_state'];
		$nextErrorState = $xmsq_state;

		switch ($xmsq_state)
		{
			case 'WAIT_4_Q':
			case 'Q':
				$nextErrorState = "E1";
				break;
			case 'E1':
				$nextErrorState = "E2";
				break;
			case 'E2':
				$nextErrorState = "E3";
				break;
			case 'E3':
				$nextErrorState = "EE";
				break;
			default:
				self::transportMailError($xmsq_id,'EE',"Q Eintrag ist nicht im gültigen State ($xmsq_state).");
				return false;
		}

		$xmsq_html = trim($q['xmsq_html']);
		if ($xmsq_html == "")
		{
			self::transportMailError($xmsq_id,'EE',"HTML von $xmsq_id ist leer.");
			return false;
		}

		$xmsq_subject = trim($q['xmsq_subject']);
		if ($xmsq_subject == "")
		{
			self::transportMailError($xmsq_id,'EE',"Betreff von $xmsq_id ist leer.");
			return false;
		}

		$xmsq_r_id 	= intval($q['xmsq_r_id']);
		if ($xmsq_r_id == 0) {
			self::transportMailError($xmsq_id,'EE',"xmsq_r_id :: 0 nicht gefunden.");
			return false;
		}

		$r = dbx::query("select * from xm_recipients where xmr_del = 'N' and xmr_canceled != 'Y' and xmr_id = $xmsq_r_id");
		if ($r === false) {
			self::transportMailError($xmsq_id,'EE',"xmsq_r_id :: $xmsq_r_id nicht gefunden.");
			return false;
		}

		$xmr_email = trim($r['xmr_email']);

		if (!xmarketing_security::isValidEmail($xmr_email)) {
			self::transportMailError($xmsq_id,'EMAIL_ERROR',"xmr_email :: $xmr_email ungültig.");
			return false;
		}

		#
		#
		#
		#
		#	FINALIZEEEEEEE
		#
		#
		#
		#


		$xmsq_s_id = intval($q['xmsq_s_id']);
		if ($xmsq_s_id == 0)
		{
			self::transportMailError($xmsq_id,'EE',"xmsq_s_id ist 0.");
			return false;
		}

		$site = dbx::query("select * from sites where s_id = $xmsq_s_id");
		if ($site === false)
		{
			self::transportMailError($xmsq_id,'EE',"site settings :: $xmsq_s_id ist false.");
			return false;
		}

		$s_s_storage_scope = intval($site['s_s_storage_scope']);
		if ($s_s_storage_scope == 0)
		{
			self::transportMailError($xmsq_id,'EE',"s_s_storage_scope :: $s_s_storage_scope ist 0.");
			return false;
		}

		
		// FILES 
		
		$xmsq_e_id 	= intval($q['xmsq_e_id']);
		$files		= xmarketing_emissions::getAttachedFiles($xmsq_e_id);
		
		//die("$xmr_email -  $xmsq_id");
		//		$xmr_email 	= "as@gitgo.at";

		//die("$s_s_storage_scope,$xmsc_id,$xmr_email,$xmr_email,$xmsq_subject,-html-");
		$state = xmarketing_config::burnMail($s_s_storage_scope,$xmsc_id,$xmr_email,$xmr_email,$xmsq_subject,$xmsq_html,array(),'embedd',3,$files);

		//hdx::fwrite(dirname(__FILE__).'/logs/'.$xmsq_id.'.html',$xmr_email.'|'.$xmsq_html);

		if ($state === false)
		{
			$xmsq_error_h = mailx::sendMailGetLastError();
			self::transportMailError($xmsq_id,$nextErrorState,$xmsq_error_h);
			return false;

		} else {

			self::transportMailOk($xmsq_id);
			return true;

		}
	}

	private static function transportNotStartBecauseOfQueueError($xme_id, $xme_q_error)
	{
		dbx::update('xm_emissions',array('xme_state'=>'PAUSE','xme_q_error'=>$xme_q_error),array('xme_id'=>$xme_id));
	}

	private static function mayIrun()
	{
		$CRON_SLOT_ID = intval($_REQUEST['CRON_SLOT_ID']);

		if ($CRON_SLOT_ID == 0)
		{
			die('I AM NOT SLOTTTED !! ;-)');
		}

		if (($CRON_SLOT_ID < 1) || ($CRON_SLOT_ID > 6)) {
			die('I AM SLOTTTED WRONG !! ;-)');
		}

		$lastCall = dbx::query("select * from xm_cronjobs_slots where xmcs_id = $CRON_SLOT_ID");

		if ($lastCall == false) {
			dbx::insert('xm_cronjobs_slots',array('xmcs_id'=>$CRON_SLOT_ID,'xmcs_last_call'=>'NOW()'));
			return true;
		}

		$TIME_TO_SLEEP = 55;

		$doit = dbx::query("select *,(TIME_TO_SEC(TIMEDIFF(NOW(),xmcs_last_call))/60) as TIMEDIFFX from xm_cronjobs_slots where xmcs_id = $CRON_SLOT_ID and (    (TIME_TO_SEC(TIMEDIFF(NOW(),xmcs_last_call))/60)    >    $TIME_TO_SLEEP   ) ");
		if ($doit === false) {
			$waitMinutes = $TIME_TO_SLEEP - (dbx::queryAttribute("select (TIME_TO_SEC(TIMEDIFF(NOW(),xmcs_last_call))/60) as TIMEDIFFX from xm_cronjobs_slots where xmcs_id = $CRON_SLOT_ID",'TIMEDIFFX'));
			
			if ($_REQUEST['IGN_TIME_STOP'] == '1') 
			{
				$doit = dbx::query("select *,(TIME_TO_SEC(TIMEDIFF(NOW(),xmcs_last_call))/60) as TIMEDIFFX from xm_cronjobs_slots where xmcs_id = $CRON_SLOT_ID");
			} else 
			{
			die("<pre>IT IS NOT MY TIME - U HAVE TO WAIT $waitMinutes Minutes !!!!</pre>");
			}
		}

		dbx::update("xm_cronjobs_slots",array('xmcs_last_call'=>'NOW()'),array('xmcs_id'=>$CRON_SLOT_ID));
		echo "Abstand letzter Call :: ".$doit['TIMEDIFFX']." Minuten vorbei ....<br><br>";

		return true;
	}

	public static function processQ()
	{
		self::mayIrun();

		$timeStarted 	= microtime(true);
		$CRON_SLOT_ID 	= intval($_REQUEST['CRON_SLOT_ID']);

		if ($CRON_SLOT_ID == 0) die("CRON_SLOT_ID VERGESSEN....");
		$CRON_SLOT_ID --; // MOD BEGINNT BEI 0

		$MAX_TIME_2_WORK_4_ME = 45;
		set_time_limit(60*50); // 50 MINUTEN MAX RUN , sollte nach 45 min von selber aufhören ...
		$emissions2send = dbx::queryAll("select * from xm_emissions where xme_del='N' and xme_state = 'SENDING' AND (MOD(xme_id,6) = $CRON_SLOT_ID) ORDER BY RAND()",true);

		if ($emissions2send === false) {
			die("Keine Aussendung für mich ...");
		}

		foreach ($emissions2send as $emission)
		{

			//// #############################################################################
			////
			//// SENDING BY EMISSION
			////

			$run 		= true;
			$xme_id 	= intval($emission['xme_id']);
			$xme_s_id 	= intval($emission['xme_s_id']);

			if ($xme_id == 0) continue; // INTERNAL MASTER BUG !! :D

			$xmcl_e_left_open = intval(dbx::queryAttribute("select count(xmsq_id) as cntx from xm_send_queue
				where xmsq_del = 'N' and xmsq_e_id = $xme_id 
				and xmsq_state IN ('Q','WAIT_4_Q','E1','E2','E3') 
				and xmsq_mine = ''
				LIMIT 1","cntx"));

			dbx::insert('xm_cronjobs_logs',array('xmcl_ts'=>'NOW()','xmcl_e_id'=>$xme_id,'xmcl_CRON_SLOT_ID'=>($CRON_SLOT_ID+1),'xmcl_e_left_open'=>$xmcl_e_left_open));

			//
			//
			// ########### CHECK IF DONE
			//
			//
			//

			$leftOpenSend = intval(dbx::queryAttribute("select count(xmsq_id) as cntx from xm_send_queue where xmsq_del='N' and xmsq_e_id = $xme_id and xmsq_state IN ('Q','WAIT_4_Q','E1','E2','E3')","cntx"));
			if ($leftOpenSend == 0)
			{
				dbx::update('xm_emissions',array('xme_state'=>'DONE'),array('xme_id'=>$xme_id));
				continue;
			}

			/// CHECK CONFIG OF SUBMISSION ACCOUNT
			$sc = xmarketing_emissions::getSenderAccountsById($xme_id);

			if ($sc === false) // KEIN SC, dann pausiere Aussendung
			{
				self::transportNotStartBecauseOfQueueError($xme_id,'Keine SC gefunden');
				continue;
			}

			$xmsc_id = intval($sc[0]['xmsc_id']);
			if ($xmsc_id == 0) {
				self::transportNotStartBecauseOfQueueError($xme_id,'SC ungültig');
				continue;
			}

			$sc = dbx::query("select * from xm_send_connectors where xmsc_id = $xmsc_id and xmsc_s_id = $xme_s_id and xmsc_del = 'N'");
			if ($sc === false) // KEIN SC, dann pausiere Aussendung
			{
				self::transportNotStartBecauseOfQueueError($xme_id,'Keine SC gefunden - S_ID ?');
				continue;
			}

			//// #############################################################################
			////
			//// GET SC - LIMITATIONS
			////

			$xmsc_smtp_limit_time 	= intval($sc['xmsc_smtp_limit_time']);
			$xmsc_smtp_limit_cnt 	= intval($sc['xmsc_smtp_limit_cnt']);

			$xxxx = 0;
			while ($run)
			{
				$xxxx++;
				//if ($xxxx > 500) die('TEST');

				$runTimeMin 	= round((microtime(true) - $timeStarted) / 60);
				$runTimeMinLeft = $MAX_TIME_2_WORK_4_ME - $runTimeMin;

				echo "Ich laufe seit $runTimeMin Minuten, darf noch $runTimeMinLeft Minuten !<br>";
				if ($runTimeMinLeft <= 0) {
					die("Sorry ich darf nur $MAX_TIME_2_WORK_4_ME min laufen ... ");
				}


				###########
				########### CHECK IF STILL SENDING OK !!
				###########

				$emissions2send = dbx::queryAll("select * from xm_emissions where xme_del='N' and xme_state = 'SENDING' and xme_id = $xme_id",true);
				if ($emissions2send === false) {
					die("EMISSION ist pausiert oder gelöscht ...");
				}

				#
				###
				### SC - TIME CHECKER, LIMIT MAY BE EMPTY ?
				###
				#

				$currentTraffic		= dbx::queryAttribute("select count(xmsq_id) as cntx from xm_send_queue where (xmsq_smtp_last_contact > DATE_SUB(NOW(), INTERVAL $xmsc_smtp_limit_time MINUTE )) and xmsq_e_id = $xme_id and xmsq_del = 'N' ","cntx");
				$leftOpenTraffic 	= $xmsc_smtp_limit_cnt - $currentTraffic;

				echo "<pre>Duerfte aktuell $leftOpenTraffic Mails senden ...<pre>";

				if ($leftOpenTraffic <= 0)
				{
					echo "<pre>Deshalb stoppe ich...<pre>";
					$run = false;
					continue;
				}

				#
				# STATES 'Q','S','E1','E2','E3','EE','E_SMTP_CONFIG','E_IMAGE_NOT_FOUND','WAIT_4_Q','EMAIL_ERROR'
				#

				$work2do = dbx::query("select * from xm_send_queue
				where xmsq_del = 'N' and xmsq_e_id = $xme_id 
				and xmsq_state IN ('Q', 'E1','E2','E3') 
				and (xmsq_smtp_last_contact < DATE_SUB( NOW(), INTERVAL $xmsc_smtp_limit_time MINUTE ))
				and xmsq_mine = ''
				ORDER BY RAND()
				LIMIT 1");

				if ($work2do === false) {

					$leftOpen = dbx::queryAttribute("select count(xmsq_id) as cntx from xm_send_queue
				where xmsq_del = 'N' and xmsq_e_id = $xme_id 
				and xmsq_state IN ('Q','WAIT_4_Q','E1','E2','E3') 
				and xmsq_mine = ''
				LIMIT 1","cntx");

					echo "<pre>Habe aktuell keine Arbeit mehr (muss aber noch $leftOpen schicken - LIMITS: Darf $xmsc_smtp_limit_cnt Mails in $xmsc_smtp_limit_time minuten nur schicken)..<pre>";
					$run = false;
					continue;
				}

				$xmsq_id = intval($work2do['xmsq_id']);
				self::transportMail($xmsq_id, $xmsc_id);

				flush();
				ob_flush();
				flush();
				ob_flush();
			}

			###
			### Bin ich fertig ?
			###

			$leftOpenSend = intval(dbx::queryAttribute("select count(xmsq_id) as cntx from xm_send_queue where xmsq_del='N' and xmsq_e_id = $xme_id and xmsq_state IN ('Q','WAIT_4_Q','E1','E2','E3')","cntx"));
			if ($leftOpenSend == 0)
			{
				dbx::update('xm_emissions',array('xme_state'=>'DONE'),array('xme_id'=>$xme_id));
				continue;
			}

		}

		die('ENDE - processQ');
	}
}