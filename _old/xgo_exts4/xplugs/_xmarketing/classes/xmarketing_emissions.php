<?

class xmarketing_emissions
{

	public static function frontcontrollerErrorNotEditableAnyMore()
	{
		frontcontrollerx::json_failure("Aussendung kann leider nicht mehr modifiziert werden!");
		die();
	}

	public static function frontcontrollerDieIfNotEditable($xmes_e_id)
	{
		if (!self::isEmissionEditable($xmes_e_id))
		{
			self::frontcontrollerErrorNotEditableAnyMore();
		}
	}

	public static function emission_config_sender($function)
	{
		switch ($function)
		{
			case 'updateCheck':

				$checked 	= ($_REQUEST['checked'] == 'on');
				$xmes_e_id 	= xmarketing_security::safe_emissions_id($_REQUEST['xmes_e_id']);
				$xmes_s_id 	= xmarketing_security::safe_send_connectors_id($_REQUEST['xmes_s_id']);

				self::frontcontrollerDieIfNotEditable($xmes_e_id);
				$key = array('xmes_e_id'=>$xmes_e_id,'xmes_s_id'=>$xmes_s_id);

				if ($checked)
				{
					dbx::insert('xm_emissions_senders',$key);
				} else
				{
					dbx::delete('xm_emissions_senders',$key);
				}

				frontcontrollerx::json_success();
				break;
			case 'load':
				$wzListScopeID	= xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				$siteId			= xmarketing_config::getCurrentSiteId();

				$check_table 	= "xm_emissions_senders";
				$checkId		= "xmes_id";
				$wa_fieldName	= "xmes_e_id";
				$wb_fieldName	= "xmes_s_id";

				$table 			= "xm_send_connectors";
				$table_id		= "xmsc_id";
				$table_del		= "xmsc_del";
				$table_sort		= "xmsc_sort";

				$sql			= "select $check_table.*,$table.*,$check_table.$checkId as checkId,!ISNULL($check_table.$wa_fieldName) as xml_xmr_checked from $table   left join $check_table ON $check_table.$wb_fieldName=$table.$table_id and $check_table.$wa_fieldName = $wzListScopeID where $table.$table_del = 'N' and xm_send_connectors.xmsc_s_id = $siteId $querySql order by $table.$table_sort ASC";


				$nodes 			= dbx::queryAll($sql);

				if ($totalCount === false) $totalCount = count($nodes);
				frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
				break;
			default: die('XX');
		}
	}

	public static function emission_config_lists($function)
	{
		switch ($function)
		{
			case 'updateCheck':

				$checked 	= ($_REQUEST['checked'] == 'on');

				$xmel_e_id 	= xmarketing_security::safe_emissions_id($_REQUEST['xmel_e_id']);
				$xmel_l_id 	= xmarketing_security::safe_list_id($_REQUEST['xmel_l_id']);

				self::frontcontrollerDieIfNotEditable($xmel_e_id);
				$key = array('xmel_e_id'=>$xmel_e_id,'xmel_l_id'=>$xmel_l_id);

				if ($checked)
				{
					dbx::insert('xm_emissions_lists',$key);
				} else
				{
					dbx::delete('xm_emissions_lists',$key);
				}

				frontcontrollerx::json_success();
				break;
			case 'load':
				$wzListScopeID	= intval($_REQUEST['xme_id']);
				$siteId = xmarketing_config::getCurrentSiteId();

				$check_table 	= "xm_emissions_lists";
				$checkId		= "xmel_id";
				$wa_fieldName	= "xmel_e_id";
				$wb_fieldName	= "xmel_l_id";

				$table 			= "xm_lists";
				$table_id		= "xml_id";
				$table_del		= "xml_del";
				$table_sort		= "xml_sort";

				$sql			= "select $check_table.*,$table.*,$check_table.$checkId as checkId,!ISNULL($check_table.$wa_fieldName) as xml_xmr_checked from $table left join $check_table ON $check_table.$wb_fieldName=$table.$table_id and $check_table.$wa_fieldName = $wzListScopeID where $table.$table_del = 'N' and xm_lists.xml_s_id = $siteId $querySql order by $table.$table_sort ASC";
				$nodes 			= dbx::queryAll($sql);

				if ($totalCount === false) $totalCount = count($nodes);
				frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
				break;
			default: die('XX');
		}
	}


	public static function handlePagerOfEmissionQueuePager($xme_id)
	{
		$xme_id = xmarketing_security::safe_emissions_id($xme_id);

		$limit 	= 100;
		$start 	= intval($_REQUEST['start']);

		$query 	   = xmarketing_config::injectQueryString(xmarketing_recipients::getRecipientSearchFields(),$_REQUEST['_query']);


		$em 		= self::getByid($xme_id);
		$xme_s_id 	= intval($em['xme_s_id']);


		$sql_basic = " from xm_send_queue, xm_recipients where xmsq_e_id = $xme_id and xmsq_r_id = xmr_id and xmsq_del = 'N' and xmr_del = 'N' and xmr_s_id = $xme_s_id $query";

		$sql_data 	= "select xm_recipients.*,xm_send_queue.*,CONCAT('') as xmsq_html $sql_basic ORDER BY xmsq_id LIMIT $start,$limit";
		$sql_count 	= "select count(xm_recipients.xmr_id) as countx $sql_basic";

		$nodes		= dbx::queryAll($sql_data);
		$totalCount = dbx::queryAttribute($sql_count,'countx');

		frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
		return ;
	}


	public static function emission_queue_recipient($function)
	{
		switch ($function)
		{
			case 'testSend':

				$email 		= xmarketing_security::safe_email($_REQUEST['email']);
				$xmsq_id 	= xmarketing_security::safe_send_queue_id($_REQUEST['xmsq_id']);
				$okOrError	= xmarketing_queue::sendQueuedHtmlMailToTestEMail($xmsq_id,$email);

				if ($okOrError === true)
				{
					frontcontrollerx::json_success(array('feedback'=>$okOrError));
				} else
				{
					if (is_numeric($okOrError)) {
						$ht = xmarketing_error::getHumanMessageById($okOrError);
						$okOrError = "Fehler : $ht ($okOrError)";
					}
					frontcontrollerx::json_failure($okOrError);
				}

				break;
			case 'show':
				$xmsq_id 	= xmarketing_security::safe_send_queue_id($_REQUEST['xmsq_id']);
				$html		= xmarketing_queue::getQueueHtmlById($xmsq_id);
				die($html);
				break;
			case 'load':
				$xmsq_e_id 		= xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				self::handlePagerOfEmissionQueuePager($xmsq_e_id);

				/*
				$query 			= xmarketing_config::injectQueryString(xmarketing_recipients::getRecipientSearchFields(),$_REQUEST['_query']);
				$xmsq_e_id 		= xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);

				$xmr_s_id		= xmarketing_config::getCurrentSiteId();

				$sql			= "select * from xm_send_queue, xm_recipients where xmsq_e_id = $xmsq_e_id and xmsq_r_id = xmr_id and xmsq_del = 'N' and xmr_del = 'N' and xmr_s_id = $xmr_s_id $query";
				$nodes 			= dbx::queryAll($sql);

				if ($totalCount === false) $totalCount = count($nodes);
				frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
				*/

				break;
			default: die('XX');
		}
	}

	public static function emission_config_detail($function)
	{
		switch ($function)
		{
			case 'updateRecord':

				$fields = array('xme_subject','xme_attach');
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);

				self::frontcontrollerDieIfNotEditable($xme_id);

				$db = array();
				foreach ($fields as $f)
				{
					if (isset($_REQUEST[$f]))
					{
						$db[$f] = $_REQUEST[$f];
					}
				}

				if (count($db)>0)
				{
					dbx::update('xm_emissions',$db,array('xme_id'=>$xme_id));
				}

				frontcontrollerx::json_success();

				break;
			case 'getRecordById':
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				frontcontrollerx::json_success(array('r'=>self::getById($xme_id)));
				break;
			default: die("TTTTTTTT");
		}
	}


	public static function handlePagerOfRecipientsOfEmissionPager($xme_id)
	{
		$xme_id = xmarketing_security::safe_emissions_id($xme_id);

		$limit 	= 100;
		$start 	= intval($_REQUEST['start']);

		$query 	   = xmarketing_config::injectQueryString(xmarketing_recipients::getRecipientSearchFields(),$_REQUEST['_query']);

		$em 		= self::getByid($xme_id);
		$xme_s_id 	= intval($em['xme_s_id']);

		$sql_basic = " from xm_recipients,xm_emissions_lists,xm_recipients2lists where 1=1
		and xm_recipients.xmr_del = 'N' and xm_recipients.xmr_s_id = $xme_s_id and xm_recipients.xmr_canceled != 'Y'
		and xm_recipients.xmr_id = xm_recipients2lists.xmr2l_r_id and xm_recipients2lists.xmr2l_del = 'N'
		and xm_recipients2lists.xmr2l_l_id = xm_emissions_lists.xmel_l_id
		and xm_emissions_lists.xmel_e_id = $xme_id
		$query";

		
		$sql_data 	= "select xm_recipients.* $sql_basic GROUP BY xm_recipients.xmr_id  ORDER BY xmr_id LIMIT $start,$limit";
		$sql_count 	= "select count(DISTINCT (xm_recipients.xmr_id)) as countx $sql_basic";

		
		//die($sql_data);
		//die($sql_data);
		
		$nodes		= dbx::queryAll($sql_data);
		$totalCount = dbx::queryAttribute($sql_count,'countx');

		frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
		return ;
	}

	public static function getSenderAccountsById($xme_id)
	{
		$xme_id 	= intval($xme_id);
		$sc 		= dbx::queryAll("select xm_send_connectors.* from xm_send_connectors, xm_emissions_senders where xmsc_id = xmes_s_id and xmes_e_id = $xme_id");
		return $sc;
	}

	public static function getMixedInUserKeysValues()
	{
		$arr = array('xmr_id','xmr_name_first','xmr_name_last','xmr_email','xmr_type','xmr_title_pre','xmr_title_post','xmr_full_salutation');
		return $arr;
	}

	public static function generateHtmlMailForSubmission($xme_id,$xmr_id)
	{
		$xme_id = intval($xme_id);
		$xmr_id = intval($xmr_id);


		$subject		= self::getSubjectIdById($xme_id);
		$p_id 			= self::getPageIdById($xme_id);
		$recipient		= xmarketing_recipients::getById($xmr_id);
		$html 			= xredaktor_render::renderPage($p_id,true);

		$mixInKeyValues = self::getMixedInUserKeysValues();

		$s = array();
		$r = array();

		foreach ($mixInKeyValues as $k)
		{
			if (!isset($recipient[$k])) continue;
			$v   = trim($recipient[$k]);

			if (($v == '') && $k == 'xmr_full_salutation') {
				$v = "Sehr geehrte Damen und Herren";
			}

			$s[] = "###$k###";
			$r[] = $v;
		}

		### MIX IN SUBJECT

		$s[] = '###SUBJECT###';
		$r[] = $subject;

		$html = str_replace($s,$r,$html);
		return $html;
	}



	public static function doTestSend($xme_id,$xmr_id,$email)
	{
		$xme_id = intval($xme_id);
		$xmr_id = intval($xmr_id);

		$sc = self::getSenderAccountsById($xme_id);
		if ($sc === false) {
			frontcontrollerx::json_failure('Kein gültiger Send-Connector gefunden.');
		}

		$xmsc_id = intval($sc[0]['xmsc_id']);
		if ($xmsc_id == 0) {
			frontcontrollerx::json_failure('Kein gültiger Send-Connector gefunden.');
		}

		$mailHeaders = array(
		'X-xmarketing_xme_id' 		=> $xme_id,
		'X-xmarketing_xmr_id' 		=> $xmr_id,
		'X-xmarketing_xmr_email' 	=> $email
		);

		$html 		= self::preShowHtml($xme_id,$xmr_id);
		$subject	= self::getSubjectIdById($xme_id);
		$files		= self::getAttachedFiles($xme_id);
		$state 		= xmarketing_config::burnMail(xmarketing_config::getCurrentSiteIdStorage(),$xmsc_id,$email,$email,$subject,$html,$mailHeaders,'embedd',3,$files);

		if ($state === false)
		{
			return mailx::sendMailGetLastError();
		}

		return true;
	}

	public static function preShowHtml($xme_id,$xmr_id)
	{
		$html 	= self::generateHtmlMailForSubmission($xme_id,$xmr_id);
		$html 	= str_replace('###SHOW_THIS_MAILING_IN_WEB###',xmarketing_landingpage::genPreShowHtmlOnWeb($xme_id,$xmr_id),$html);
		$html 	= str_replace("###TRACK_OPEN_MARKER###","",$html);
		
		
		$html2 = new DOMDocument();
		$html2->loadHTML('<?xml version="1.0" encoding="utf-8"?>'.($html));
		$html = $html2->saveHTML();
		
		return $html;
	}

	public static function emission_mails_recipient($function)
	{
		switch ($function)
		{
			case 'testSend':

				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				$xmr_id = xmarketing_security::safe_recipient_id($_REQUEST['xmr_id']);

				$email  = trim($_REQUEST['email']);

				$okOrError = self::doTestSend($xme_id,$xmr_id,$email);

				if ($okOrError === true)
				{
					frontcontrollerx::json_success(array('feedback'=>$okOrError));
				} else
				{
					if (is_numeric($okOrError)) {
						$okOrError = "Fehler : $okOrError";
					}
					frontcontrollerx::json_failure($okOrError);
				}
				break;
			case 'show':
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				$xmr_id = xmarketing_security::safe_recipient_id($_REQUEST['xmr_id']);
				$html = self::preShowHtml($xme_id,$xmr_id);
				die($html);
				break;
			case 'load':
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				self::handlePagerOfRecipientsOfEmissionPager($xme_id);
				break;
			default: die('X');
		}
	}

	public static function getStateOfEmission($xme_id)
	{
		$r = self::getByid($xme_id);
		return $r['xme_state'];
	}

	public static function isEmissionEditable($xme_id)
	{
		$r = self::getByid($xme_id);
		if ($r === false) return false;
		return ($r['xme_state'] == 'CONFIG');
	}

	private static function genOverviewHtml($html,$msg_ok,$msg_nok,$state)
	{
		if ($state)
		{
			$html .= $msg_ok ."<br>";
		} else
		{
			$html .= "<span class='error_config_emission'>".$msg_nok ."</span><br>";
		}
		return $html;
	}


	public static function isValidEmissionForSubmission($xme_id)
	{
		$xme_id = intval($xme_id);

		$error = false;

		if (!(self::getSenderAccountsById($xme_id)!==false)) 	$error = true;
		if (!(self::getCntOfRecieptsByEmissionId($xme_id)!=0)) 	$error = true;
		if (!(trim(self::getSubjectIdById($xme_id)) != '')) 	$error = true;
		if (!(trim(self::getPageIdById($xme_id)) != 0)) 		$error = true;

		return $error;
	}


	public static function getOverviewOfEmission($xme_id)
	{
		$html = "";

		// CHECK SEND CONNECTOREN
		$html = self::genOverviewHtml($html,'1.) Absenderkonten wurden definiert','1.) Absenderkonten wurden nicht definiert',(self::getSenderAccountsById($xme_id)!==false));

		// CHECK EMPFÄNGER LISTEN
		$html = self::genOverviewHtml($html,'2.) Empfängerlisten wurden definiert','2.) Empfängerlisten wurden nicht definiert',(self::getCntOfRecieptsByEmissionId($xme_id)!=0));

		// CHECK BETREFF
		$html = self::genOverviewHtml($html,'3.) Betreff wurde definiert','3.) Betreff wurde nicht definiert',(trim(self::getSubjectIdById($xme_id)) != ''));

		// CHECK BETREFF
		$html = self::genOverviewHtml($html,'4.) Layout wurde angelegt','4.) Layout wurde nicht angelegt',(trim(self::getPageIdById($xme_id)) != 0));


		return $html;
	}

	public static function emissionStart($xme_id)
	{
		$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
		$errors = self::isValidEmissionForSubmission($xme_id);

		if ($errors) {
			frontcontrollerx::json_failure("Aussendung ist nicht korrekt konfiguriert, bitte aktualisieren ggf. die Ansicht.");
		}

		$oldState = self::getStateOfEmission($xme_id);

		if ($oldState != 'CONFIG') {
			frontcontrollerx::json_failure("Aussendung wurde bereits fertig konfiguriert und gestartet.");
		}

		dbx::update('xm_emissions',array('xme_q_start'	=> 'NOW()','xme_state'=>'START_SENDING'),array('xme_id'=>$xme_id));
		xmarketing_queue::fillEmissionIntoQ($xme_id);
		dbx::update('xm_emissions',array('xme_q_end'	=> 'NOW()','xme_state'=>'READY_4_SENDING'),array('xme_id'=>$xme_id));

		dbx::query("update xm_emissions set xme_q_time = TIME_TO_SEC(TIMEDIFF(xme_q_end,xme_q_start)) where xme_id = $xme_id");
		frontcontrollerx::json_success();
	}

	public static function emissionStartFinaly($xme_id)
	{
		$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
		$errors = self::isValidEmissionForSubmission($xme_id);

		if ($errors) {
			frontcontrollerx::json_failure("Aussendung ist nicht korrekt konfiguriert, bitte aktualisieren ggf. die Ansicht.");
		}

		$oldState = self::getStateOfEmission($xme_id);

		if ($oldState != 'READY_4_SENDING') {
			frontcontrollerx::json_failure("Bitte aktualisieren Ihre Ansicht.");
		}

		$e = self::getByid($xme_id);

		if (intval($e['xme_tested']) == 0)
		{
			frontcontrollerx::json_failure("Bitte testen Sie mindestens eine E-Mail.");
		}

		dbx::query("update xm_send_queue set xmsq_state = 'Q' where xmsq_state = 'WAIT_4_Q' and xmsq_e_id = $xme_id and xmsq_del = 'N' ");
		dbx::update('xm_emissions',array('xme_state'=>'SENDING'),array('xme_id'=>$xme_id));

		frontcontrollerx::json_success();
	}

	public static function emissionPause($xme_id)
	{
		$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
		$oldState = self::getStateOfEmission($xme_id);

		if (!in_array($oldState,array('SENDING','PAUSE'))) {
			frontcontrollerx::json_failure("Aussendung kann nicht pausiert werden. Bitte aktualisieren Ihre Ansicht.");
		}

		switch ($oldState)
		{
			case 'SENDING':
				dbx::update('xm_emissions',array('xme_state'=>'PAUSE'),array('xme_id'=>$xme_id));
				frontcontrollerx::json_success();
				break;
			case 'PAUSE':
				dbx::update('xm_emissions',array('xme_state'=>'SENDING'),array('xme_id'=>$xme_id));
				frontcontrollerx::json_success();
				break;
			default:
				break;
		}

		frontcontrollerx::json_failure("Interner Fehler. Aussendung kann nicht pausiert/gestartet werden.");
	}

	public static function handleAjax($function)
	{
		switch ($function)
		{
			case 'clone':
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				$xme_id_new = xmarketing_emissions_clone::cloneEmission($xme_id);
				frontcontrollerx::json_success(array('xme_id_new'=>$xme_id_new));
				break;
			case 'pause':
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				self::emissionPause($xme_id);
				die();
				break;
			case 'startEmissionFinaly':
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				self::emissionStartFinaly($xme_id);
				die();
				break;
			case 'startEmission':
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				self::emissionStart($xme_id);
				die();
				break;
			case 'deleteDesign':
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				self::frontcontrollerDieIfNotEditable($xme_id);
				dbx::update("xm_emissions",array('xme_p_id'=>0),array('xme_id'=>$xme_id));
				xmarketing_landingpage::cleanLinksById($xme_id,xmarketing_config::getCurrentSiteId());
				frontcontrollerx::json_success();
				break;

			case 'handleLandingPages':
				$xme_id 	= xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				xmarketing_landingpage::scan($xme_id);
				frontcontrollerx::json_success();
				break;

			case 'createNew':

				$xme_id 	= xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				$frame_id 	= xmarketing_security::safe_frame_id($_REQUEST['frame_id']);

				self::frontcontrollerDieIfNotEditable($xme_id);
				xmarketing_landingpage::cleanLinksById($xme_id,xmarketing_config::getCurrentSiteId());

				$u = xredaktor_core::getUserSettings();
				//$p_fid 	= $u['wz_xme_pages_root'];
				$p_fid 	= Ixmarketing::pageHook_root_p_id;
				$p_s_id = xmarketing_config::getCurrentSiteId();

				//- CREATE New PAGE
				dbx::insert('pages',array('p_frameid'=>$frame_id,'p_isOnline'=>'Y','p_inMenue'=>'Y','p_fid'=>$p_fid,'p_s_id'=>$p_s_id,'p_name'=>'AUTO_XR_MARKETING_'.$xme_id));
				$p_id = dbx::getLastInsertId();

				//- INJECT
				dbx::update("xm_emissions",array('xme_p_id'=>$p_id),array('xme_id'=>$xme_id));

				$data = array();
				frontcontrollerx::json_success($data);
				break;

			case 'getTemplatesAs':

				$a_s_id 		= xmarketing_config::getCurrentSiteId();
				$u 				= xredaktor_core::getUserSettings();
				$wz_xme_frames 	= explode(",",Ixmarketing::frames_root_a_id);

				$ids = array();
				foreach ($wz_xme_frames as $idx)
				{
					if (is_numeric($idx))
					{
						$ids[] = $idx;
					}
				}

				if (count($ids)==0)
				{
					$data = array();
				} else
				{
					$ids = implode(", ",$ids);
					$data = dbx::queryAll("select * from atoms where a_type = 'FRAME' and a_id IN ($ids) and a_s_id = $a_s_id");
				}

				frontcontrollerx::json_success(array('data'=>$data));

				break;
			case 'getConfig':

				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				$e = xmarketing_emissions::getByid($xme_id);

				if ($_REQUEST['allInfos'] == 1) {


					/*
					select count(distinct(xm_recipients.xmr_id)) as totalCntOfRecp from xm_recipients,xm_emissions_lists,xm_recipients2lists where 1=1
					and xm_recipients.xmr_del = 'N'
					and xm_recipients.xmr_id = xm_recipients2lists.xmr2l_r_id and xm_recipients2lists.xmr2l_del = 'N'
					and xm_recipients2lists.xmr2l_l_id = xm_emissions_lists.xmel_l_id
					and xm_emissions_lists.xmel_e_id = $xme_id
					*/

					$q_missing  = "";


					$q_t = self::getCntOfRecieptsByEmissionIdViaSendQ($xme_id);
					$q_s = self::getCntOfSentByEmissionId($xme_id);
					$q_s = min($q_s,$q_t);

					$e['cnt_preQ'] 	= round(self::getCntOfPreQByEmissionId($xme_id)/$q_t*100,0);
					$e['cnt_total'] = $q_t;
					$e['cnt_sent'] 	= $q_s;
					$per = $q_s / $q_t * 100;
					$per = min($per,100);
					$e['sendmailsPercentage'] = round($per,0);


					$e['overview'] = self::getOverviewOfEmission($xme_id);

				}

				frontcontrollerx::json_success($e);

				break;
			default: break;
		}

		$fields = array('xme_id','xme_vid','xme_name','xme_lastmod','xme_lastmodBy','xme_sort');
		$update = array('xme_name');
		$string = array('xme_name');
		$int 	= array();

		$xme_s_id = xmarketing_config::getCurrentSiteId();

		$extFunctionsConfig = array(
		'table'		=> 'xm_emissions',
		'sort'		=> 'xme_sort',
		'pid'		=> 'xme_id',
		'fid'		=> 'xme_fid',
		'name'		=> 'xme_name',
		'del'		=> 'xme_del',

		'extraInsertFlyInt' => array(),
		'extraLoad'			=> " xme_s_id = '$xme_s_id' ",
		'extraInsert' 		=> array('xme_created' => 'NOW()','xme_s_id'=>$xme_s_id),

		'fields'	=> $fields,
		'update'	=> $update,

		'normalize'	=> array(
		'string'	=> $string,
		'int'		=> $int
		),

		'postHooks' 		=> array(
		'insert'			=> 'xmarketing_emissions::handleEmission_insert',
		'update'			=> 'xmarketing_emissions::handleEmission_update'
		));

		xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$function);
	}

	public static function getByid($xme_id)
	{
		$xme_id = intval($xme_id);
		return dbx::query("select * from xm_emissions where xme_id = $xme_id");
	}

	public static function getPageIdById($xme_id)
	{
		$e = self::getByid($xme_id);
		return intval($e['xme_p_id']);
	}

	public static function getSubjectIdById($xme_id)
	{
		$e = self::getByid($xme_id);
		return trim($e['xme_subject']);
	}
	
	public static function getAttachedFiles($xme_id)
	{
		$e = self::getByid($xme_id);
		return trim($e['xme_attach']);
	}

	public static function handleEmission_insert($id)
	{
		//$xme_s_id = self::getByid($id);
	}

	public static function handleEmission_update($id,$newDataRecord,$oldDataRecord)
	{

	}

	public static function getCntOfSentByEmissionId($xme_id)
	{
		$xme_id = intval($xme_id);
		return intval(dbx::queryAttribute("select count(xmsq_id) as cntx from xm_send_queue where xmsq_e_id = $xme_id and xmsq_state = 'S'","cntx"));
	}

	public static function getCntOfPreQByEmissionId($xme_id)
	{
		$xme_id = intval($xme_id);
		return intval(dbx::queryAttribute("select count(xmsq_id) as cntx from xm_send_queue where xmsq_e_id = $xme_id and xmsq_state = 'WAIT_4_Q'","cntx"));
	}

	public static function getCntOfRecieptsByEmissionId($xme_id)
	{
		$xme_id = intval($xme_id);
		
		$sql = "select count(distinct(xm_recipients.xmr_id)) as totalCntOfRecp from xm_recipients,xm_emissions_lists,xm_recipients2lists where 1=1
		and xm_recipients.xmr_del = 'N' and xm_recipients.xmr_canceled != 'Y'
		and xm_recipients.xmr_id = xm_recipients2lists.xmr2l_r_id and xm_recipients2lists.xmr2l_del = 'N'
		and xm_recipients2lists.xmr2l_l_id = xm_emissions_lists.xmel_l_id
		and xm_emissions_lists.xmel_e_id = $xme_id";

		return intval(dbx::queryAttribute($sql,'totalCntOfRecp'));
	}

	public static function getCntOfRecieptsByEmissionIdViaSendQ($xme_id)
	{
		$xme_id = intval($xme_id);
		
		$sql = "select count(distinct(xmsq_r_id)) as totalCntOfRecp from xm_send_queue where xmsq_e_id = $xme_id";

		return intval(dbx::queryAttribute($sql,'totalCntOfRecp'));
	}

	public static function getRecieptsByEmissionId_iterable($xme_id)
	{
		$xme_id = intval($xme_id);

		$sql = "select distinct(xm_recipients.xmr_id) as unique_xmr_id, xmr_email from xm_recipients,xm_emissions_lists,xm_recipients2lists where 1=1
		and xm_recipients.xmr_del = 'N' and xm_recipients.xmr_canceled != 'Y'
		and xm_recipients.xmr_id = xm_recipients2lists.xmr2l_r_id and xm_recipients2lists.xmr2l_del = 'N'
		and xm_recipients2lists.xmr2l_l_id = xm_emissions_lists.xmel_l_id
		and xm_emissions_lists.xmel_e_id = $xme_id";

		return dbx::queryAll($sql,false);
	}


}