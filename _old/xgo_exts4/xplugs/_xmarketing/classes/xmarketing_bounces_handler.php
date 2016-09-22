<?

class xmarketing_bounces_handler
{

	public static function process_mail($message_id,$my_mail,$cfg,$settings)
	{
		$content 	= $my_mail['body']."\n".$my_mail['html'];
		$inspect	= explode("\n",$content);

		$found 		= array();
		foreach ($inspect as $line)
		{
			$pos = strpos($line,"X-xmarketing_");
			if (($pos !== false) && ($pos == 0))
			{
				list($k,$v) = explode(":",$line,2);
				$found[trim($k)] = trim($v);
			}
		}

		$xmsc_id 	= intval($cfg['xmsc_id']);
		$sc 		= xmarketing_config::getSendConnectorById($xmsc_id);
		$xmscb_s_id = intval($sc['xmsc_s_id']);
		
		$db = array(
		'xmscb_subject'		=> $my_mail['subject'],
		'xmscb_xmsc_id'		=> $xmsc_id,
		'xmscb_ts'			=> 'NOW()',
		'xmscb_html' 		=> $content,
		'xmscb_json_full'	=> json_encode($my_mail),
		'xmscb_message_id'	=> $message_id,
		'xmscb_created'		=> 'NOW()',
		'xmscb_s_id'		=> $xmscb_s_id 
		);

		$xmscp_id = intval($cfg['xmscp_id']);

		if (xmarketing_security::checkIfValidEMailByHeaders($found))
		{
			$db['xmscb_valid'] = "Y";
			if (is_numeric($found['X-xmarketing_xmr_id'])) {
				$db['xmscb_r_id'] = $found['X-xmarketing_xmr_id'];
			}
			if (isset($found['X-xmarketing_xmr_email'])) {
				$db['xmscb_r_email'] = $found['X-xmarketing_xmr_email'];
			}
			if (is_numeric($found['X-xmarketing_xme_id'])) {
				$db['xmscb_e_id'] = $found['X-xmarketing_xme_id'];
			}
			if (is_numeric($found['X-xmarketing_xmq_id'])) {
				$db['xmscb_q_id'] = $found['X-xmarketing_xmq_id'];
			}

			dbx::query("update xm_send_connectors_popping set xmscp_xmsc_mails_ok=xmscp_xmsc_mails_ok+1 where xmscp_id = $xmscp_id");
		} else
		{
			dbx::query("update xm_send_connectors_popping set xmscp_xmsc_mails_nok=xmscp_xmsc_mails_nok+1 where xmscp_id = $xmscp_id");
		}

		dbx::insert('xm_send_connectors_bounces',$db);
		return true;
	}

	public static function collectByEMail($settings)
	{

		$xmsc_id 		= intval($settings['xmsc_id']);
		$wz_mail_server = $settings['xmsc_pop_host'];
		$wz_mail_user 	= $settings['xmsc_pop_user'];
		$wz_mail_pass 	= $settings['xmsc_pop_password'];

		$SAVE2DISK 		= dirname(__FILE__).'/../mailPopperStorage/'.$xmsc_id;
		if (!is_dir($SAVE2DISK)) {
			@mkdir($SAVE2DISK);
		}

		$xmscp_initiator = $settings['xmscp_initiator'];

		dbx::update("xm_send_connectors",array('xmsc_last_popped'=>'NOW()'),array('xmsc_id'=>$xmsc_id));

		dbx::insert("xm_send_connectors_popping",array(
		'xmscp_xmsc_id'			=> $xmsc_id,
		'xmscp_initiator'		=> $xmscp_initiator,
		'xmscp_xmsc_ts'			=> "NOW()",
		'xmscp_xmsc_duration'	=> "-1",
		'xmscp_xmsc_mails_ok'	=> "0",
		'xmscp_xmsc_mails_nok'	=> "0",
		));

		$xmscp_id	= dbx::getLastInsertId();

		$cfg = array();
		$cfg['xmscp_id'] 					= $xmscp_id;
		$cfg['antispam'] 					= false;
		$cfg['antispamkey'] 				= "";
		$cfg['antispamkeyautodel'] 			= false;
		$cfg['debug'] 						= false;
		$cfg['delete_mail'] 				= false;
		$cfg['save_embedded'] 				= true;
		$cfg['save_attachments'] 			= true;
		$cfg['send_invalidattach_mail'] 	= false; /// NOT WORKING !!!!!
		$cfg['IMAP']['host'] 				= "{".$wz_mail_server.":110/pop3/novalidate-cert}";
		$cfg['IMAP']['user'] 				= $wz_mail_user;
		$cfg['IMAP']['pass'] 				= $wz_mail_pass;
		$cfg['IMAP']['folder'] 				= "";
		$cfg['SAVE2DISK']					= $SAVE2DISK;
		$cfg['CHECK_ATTACH_PREG_MATCH']		= "";
		$cfg['CHECK_ATTACH_ENABLED']		= false;
		$cfg['subject']						= "";

		$cfg['xmsc_id']						= $xmsc_id;

		$cfg['process_ham_says_delete_mail']= true;
		$cfg['process_ham']					= "xmarketing_bounces_handler::process_mail";

		$state = popperx::collect($cfg,$settings);

		dbx::query("update xm_send_connectors_popping set xmscp_xmsc_duration = TIME_TO_SEC(TIMEDIFF(NOW(),xmscp_xmsc_ts)) where xmscp_id = $xmscp_id");

		if (!$state)
		{
			echo "[ERROR]";
		}
	}

	public static function collectAll($xmsc_id,$xmscp_initiator='CRON')
	{
		$xmsc_id 	= xmarketing_security::safe_send_connectors_id($xmsc_id);
		$settings 	= xmarketing_config::getSendConnectorById($xmsc_id);
		if ($settings['xmsc_pop_active'] == 'N') return false;
		$settings['xmscp_initiator'] = $xmscp_initiator;
		return self::collectByEMail($settings);
	}
}

