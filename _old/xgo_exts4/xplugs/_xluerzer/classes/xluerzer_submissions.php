<?

class xluerzer_submissions
{

	public static $image_submission_media_type_invalid 				= 903387;
	public static $image_submission_submitted_media_type_invalid 	= 903389;
	public static $image_submission_s_id_zero						= 903388;


	public static function defaultAjaxHandler($function,$param_0)
	{
		switch ($function)
		{
			case 'copySubmissionCampaignCredits':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::copySubmissionCampaignCredits();
				break;
			case 'copySubmissionCredits':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::copySubmissionCampaignCredits(true);
				break;
			case 'bulkChange':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::bulkChange();
				break;
			case 'createEmpty':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::createEmpty();
				break;
			case 'resendSubmissionMail':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::resendSubmissionMail($param_0);
				break;
			case 'resendSubmissionMailNow':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::resendSubmissionMailNow($param_0);
				break;
			case 'uploadLowResVideo':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::uploadLowResVideo($param_0);
				break;
			case 'uploadLowResPrint':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::uploadLowResPrint($param_0);
				break;
			case 'uploadHighResPrint':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::uploadHighResPrint($param_0);
				break;
			case 'uploadHighResVideo':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::uploadHighResVideo($param_0);
				break;
			case 'encodeVideo':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::encodeVideo($param_0);
				break;
			case 'downloadSubmission':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::downloadSubmission($param_0);
				break;
			case 'downloadSubmissionHighRes':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::downloadSubmissionHighRes($param_0);
				break;
			case 'downloadBEStillHigh':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::downloadBEStillHigh($param_0);
				break;
			case 'downloadOrigStillHigh':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::downloadOrigStillHigh($param_0);
				break;
			case 'search':
				self::search(false);
				die();
			case 'search4Combiner':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::search4Combiner(false);
				die();
			case 'search4CombinerDoIt':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::search4CombinerDoIt(false);
				die();
			case 'search_stats':
				self::search(true);
				die();
			case 'searchCombo':
				self::searchCombo($param_0);
				die();
			case 'xcreditSavedPleasJoin':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::xcreditSavedPleasJoin();
				die();
			case 'saveOverall':
			case 'saveVideo':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::submissionSave();
				break;
			case 'genVideoThumbBySId':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::genVideoThumbBySId($param_0);
				break;
			case 'getVideoFileBySId':
				self::getVideoFileBySId();
				break;
			case 'saveCredits':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::saveCredits();
				break;
			case 'saveCredits2':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::saveCredits2();
				break;
			case 'save_xcredit':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::save_xcredit();
				break;
			case 'load_xcredit':
				self::load_xcredit();
				break;
			case 'loadContactTypes':
				self::loadContactTypes();
				break;
			case 'loadData':
				self::loadData();
				break;
			case 'loadMagazineTypes':
				self::loadMagazineTypes();
				break;
			case 'loadCountries':
				self::loadCountries();
				break;
			case 'loadSubmittedFor':
				self::loadSubmittedFor();
				break;
			case 'loadCountriesShop':
				self::loadCountriesShop();
				break;
			case 'loadCategories':
				self::loadCategories();
				break;
			case 'loadMagazinesSearch':
				self::loadMagazinesSearch();
				break;
			case 'loadMagazines':
				self::loadMagazines();
				break;
			case 'loadMagazines_specials':
				self::loadMagazines_specials();
				break;
			case 'day_overview':
				self::grid_day_overview();
				break;
			case 'grid_load':
				self::grid_load();
				break;
			case 'grid_load_extra':
				self::grid_load_extra();
				break;
			case 'img_small':
				self::img_small($param_0);
				break;
			case 'img_orig':
				self::img_orig($param_0);
				break;
			case 'img_medium':
				self::img_medium($param_0);
				break;
			case 'search_credits':
				self::search_credits();
				break;
			default:
				die('XXX');
		}
	}

	public static function copySubmissionCampaignCredits($creditsOnly=false)
	{
		$es_id 		= intval($_REQUEST['es_id']);
		$from_es_id = intval($_REQUEST['from_es_id']);

		if ($es_id == $from_es_id)
		{
			frontcontrollerx::json_failure("Origin and destination submission is equal.");
		}

		$dest 	= dbx::query("select * from e_submissions where es_id = $es_id");
		$orgin 	= dbx::query("select * from e_submissions where es_id = $from_es_id");

		if ($dest === false)
		{
			frontcontrollerx::json_failure("Destination submission not present");
		}
		if ($orgin === false)
		{
			frontcontrollerx::json_failure("Origin submission not present");
		}

		if (!$creditsOnly)
		{
			dbx::update('e_submissions',array(

			'es_campaign_admin' => $orgin['es_campaign_admin'],
			'es_archivNr' 		=> $orgin['es_archivNr'],
			'es_category_id' 	=> $orgin['es_category_id'],
			'es_magazine_id' 	=> $orgin['es_magazine_id'],
			'es_infotext' 		=> $orgin['es_infotext'],
			'es_modified_by' 	=> xluerzer_user::getCurrentUserId()

			),array('es_id'=>$es_id));
		}

		$e_submissions_credits = dbx::queryAll("select * from e_submissions_credits where esc_submission_id = $from_es_id");
		dbx::query("delete from e_submissions_credits where esc_submission_id = $es_id ");

		foreach ($e_submissions_credits as $inject)
		{
			$inject['esc_submission_id'] = $es_id;
			unset($inject['esc_id']);
			dbx::insert('e_submissions_credits',$inject);
		}

		xluerzer_log::pushLog('IMPORT_CREDITS_CAMPAIGN','e_submissions','es_id',$es_id,false,"Import from submission: $es_id");

		frontcontrollerx::json_success();
	}

	public static function bulkChange()
	{
		
		$cfg 	= json_decode($_REQUEST['cfg'],true);
		$LIMIT 	= 2500;
		
		$cleanIds = array();
		foreach ($cfg['ids'] as $id)
		{
			$id = intval($id);
			if ($id == 0) continue;
			$cleanIds[] = $id;
		}
		
		
		$selector = false;
		if ($_REQUEST['selector'] != 'false')
		{

			global $_REQUEST;
			$_REQUEST['searchData'] = $_REQUEST['selector'];
			list($sql_data,$sql_cnt) = self::search(false,true);

			$selector 	= " SELECT es_id FROM ( ".str_replace("[GRID_FILTERS]","",$sql_data).") emilia ";
			$cnt 		= dbx::queryAttribute(str_replace("[GRID_FILTERS]","",$sql_cnt),"sql_cnt");

			if ($cnt > $LIMIT)
			{
				frontcontrollerx::json_failure("TOO MUCH SUBMISSIONS SELECTED: LIMIT $LIMIT");
			}
			
		}


		$type  = dbx::escape($cfg['type']);
		$value = dbx::escape($cfg['values'][$type]);

		if (dbx::attributePresent('e_submissions',$type))
		{

			if (($type == 'es_state') and ($value == 10 || $value == 9))
			{
				frontcontrollerx::json_failure("ERROR: Cannot publish/unpublish submissions via bulk.");
			}

			if ($type == 'es_state')
			{
				$sql = "update e_submissions set $type = '$value' where es_state NOT IN (9) and es_id IN (".implode(',',$cleanIds).")";
				
			}
			elseif($type == 'es_magazine_id')
			{
				$emt_name = "";
				$es_magazine_id = intval($value);
				
				if($es_magazine_id > 0)
				{
					$emt_name = dbx::query("select emt_name from e_magazine_type,e_magazine where em_id = $es_magazine_id and em_type = emt_id");
					if($emt_name === false) $emt_name = array();
					
					$emt_name = dbx::escape($emt_name['emt_name']);
				}
				
				$extra_update = "";
				
				if($emt_name != "")
				{
					$extra_update = " , es_submittedFor = '$emt_name' ";
				}
				
				$sql = "update e_submissions set $type = '$value' $extra_update where es_id IN (".implode(',',$cleanIds).")";
			} 
			else 
			{
				$sql = "update e_submissions set $type = '$value' where es_id IN (".implode(',',$cleanIds).")";
			}
			
			if ($selector)
			{
				if ($type == 'es_state')
				{
					$records = dbx::queryAll($selector,false);
					
					foreach ($records as $key => $rec) {
						$es_id = intval($rec['es_id']);
						
						$sql = "update e_submissions set $type = '$value' where es_state NOT IN (9) and es_id = $es_id";
						dbx::query($sql);
					}
					
					//$sql = "update e_submissions set $type = '$value' where es_state NOT IN (9) and es_id IN ($selector)";
				} 
				elseif($type == 'es_magazine_id')
				{
					$emt_name = "";
					$es_magazine_id = intval($value);
					
					if($es_magazine_id > 0)
					{
						$emt_name = dbx::query("select emt_name from e_magazine_type,e_magazine where em_id = $es_magazine_id and em_type = emt_id");
						if($emt_name === false) $emt_name = array();
						
						$emt_name = dbx::escape($emt_name['emt_name']);
					}
					
					$extra_update = "";
					
					if($emt_name != "")
					{
						$extra_update = " , es_submittedFor = '$emt_name' ";
					}		
					
					$records = dbx::queryAll($selector,false);
					
					foreach ($records as $key => $rec) {
						$es_id = intval($rec['es_id']);
						
						$sql = "update e_submissions set $type = '$value' $extra_update where es_id = $es_id";
						dbx::query($sql);
					}
				}
				else 
				{
					$records = dbx::queryAll($selector,false);
					
					foreach ($records as $key => $rec) {
						$es_id = intval($rec['es_id']);
						
						$sql = "update e_submissions set $type = '$value' where es_id = $es_id";
						dbx::query($sql);
					}
					
					//$sql = "update e_submissions set $type = '$value' where es_id IN ($selector)";
				}
			}
			else
			{
				dbx::query($sql);
			}			
		}

		frontcontrollerx::json_success(array('cfg'=>$cfg,'sql'=>$sql));
	}

	public static function createEmpty()
	{
		$currUser = xluerzer_user::getCurrentUserId();
		$es_mediaType_id = intval($_REQUEST['es_mediaType_id']);
		dbx::insert('e_submissions',array('es_mediaType_id'=>$es_mediaType_id, 'es_created_by'=>$currUser, 'es_created_ts' => 'NOW()','es_created_date'=>'NOW()','es_year'=>date("Y")));
		$es_id = dbx::getLastInsertId();
		frontcontrollerx::json_success(array('es_id'=>$es_id));
	}

	public static function resendSubmissionMail($es_id)
	{
		$es_id = intval($es_id);

		$submission = dbx::query("select * from e_submissions where es_id = $es_id");

		if($submission === false) $submission = array();

		$es_state = intval($submission['es_state']);
		
		
		if (isset($_REQUEST['st_or']))
		{
			$amt_id = intval($_REQUEST['st_or']);
		}
		
		if ($amt_id && $amt_id != 0)
		{
			$template = dbx::query("select * from a_mail_templates where amt_id = $amt_id");
		}
		else
		{
			switch ($es_state) {
				case 2:
				case 4:
					$template = dbx::query("select * from a_mail_templates where amt_id = 4");
					break;
				case 3:
				case 7:
					$template = dbx::query("select * from a_mail_templates where amt_id = 3");
					break;
				case 5:
					$template = dbx::query("select * from a_mail_templates where amt_id = 11");
					break;
				default:
					$template = array();
					break;
			}
		}
		
		if($template === false) $template = array();
		
		
		$subject = $template['amt_subject'];
		$body = $template['amt_body'];

		$replace = array(
		'###NAME###',
		'###SUBMISSIONID###'
		);

		$with = array(
		$submission['es_submittedBy'],
		$es_id
		);

		$subject = str_replace($replace, $with, $subject);
		$body = str_replace($replace, $with, $body);

		$body = xredaktor_xr_html::transformLinks($body);
		$to = $submission['es_email'];

		$mail_subject	= $subject;
		$mail_to		= $to;
		$mail_bcc		= "";
		$mail_body		= $body;

		$d = array(

		'es_id'=>$es_id,

		'mail_subject'  => $mail_subject,
		'mail_to'		=> $mail_to,
		'mail_bcc'		=> $mail_bcc,
		'mail_body'		=> $mail_body,

		'alternative_mails' => dbx::queryAll("select * from a_mail_templates where 1")

		);
		
		frontcontrollerx::json_success($d);
	}

	public static function resendSubmissionMailNow($es_id)
	{
		$data = json_decode($_REQUEST['data'], true);

		$es_id = intval($es_id);
		// get name
		
		$submitted_by = dbx::queryAttribute("select * from e_submissions where es_id = $es_id", "es_submittedBy");

		$mail_subject	= trim($data['mail_subject']);
		$mail_to		= trim($data['mail_to']);
		$mail_bcc		= trim($data['mail_bcc']);
		$mail_body		= $data['mail_body'];
		$my_subm_link	= "http://luerzersarchive.com/en/my-submissions.html";
		

		$mail_body 		= xredaktor_xr_html::transformLinks($mail_body);

		$mailReplacers  = array(
		'###NAME###'				=> $submitted_by,
		'###SUBJECT###'				=> $mail_subject,
		'###CONTENT###'				=> $mail_body,
		'###EMAIL###'				=> $mail_to,
		'###MYSUBMISSIONSLINK###'	=> $my_subm_link
		);

		if(!filter_var($mail_to, FILTER_VALIDATE_EMAIL))
		{
			frontcontrollerx::json_failure('invalid email');
		}

		if(!filter_var($mail_bcc, FILTER_VALIDATE_EMAIL) && $mail_bcc != '')
		{
			frontcontrollerx::json_failure('invalid bcc email');
		}

		$lang = 'en';
		site::burnMail(126,$mail_subject,$mailReplacers,$attachments=array(),$mail_to,$lang);

		if($mail_bcc != '')
		{
			site::burnMail(126,$mail_subject,$mailReplacers,$attachments=array(),$mail_bcc,$lang);
		}

		$d = array(
		'es_id'=>$es_id,
		);

		frontcontrollerx::json_success($d);
	}

	public static function uploadLowResVideo($es_id)
	{
		$es_id = intval($es_id);
		if ($es_id == 0) die();

		$validExtensions = array('mp4','mov','wmv','flv','mkv','m4v','mpg','mpeg','avi','divx');

		$ext = explode(".",basename($_FILES['file']['name']));
		$ext = array_pop($ext);

		if (!in_array($ext,$validExtensions))
		{
			frontcontrollerx::json_success(array('MSG'=>'INVALID FILE TYPE'));
			die();
		}

		$file 		= '/srv/www/www.luerzersarchive.net/web/archive/submissions/tv_commercials/lowres/'.date('Y').'/'.$es_id.'.'.$ext;
		$file_tmp 	= $_FILES['file']['tmp_name'];

		if (file_exists($file))
		{
			@unlink($file);
		}

		$dir = dirname($file);
		if (!is_dir($dir))
		{
			exec("mkdir $dir -p");
		}

		if (move_uploaded_file($file_tmp,$file))
		{
			$s_id = xredaktor_storage::registerExistingFile(1,$file);
			self::db_update(array('es_video_s_id'=>$s_id),$es_id,'uploadLowResVideo');
			frontcontrollerx::json_success(array('FILE'=>$s_id));
		} else {
			frontcontrollerx::json_success(array('MSG'=>'MOVE FILE FAILED'));
		}

		die();
	}

	public static function db_update($db,$es_id,$human="")
	{
		$es_id = intval($es_id);

		$db['es_modified_by'] = xluerzer_user::getCurrentUserId();

		$old = dbx::query("select * from e_submissions where es_id = $es_id");
		dbx::update('e_submissions',$db,array('es_id'=>$es_id));
		xluerzer_log::pushLog('UPDATE','e_submissions','es_id',$es_id,$old,$human);
	}


	public static function uploadLowResPrint($es_id)
	{
		$es_id = intval($es_id);
		if ($es_id == 0) die();

		$validExtensions = array('jpg','jpeg','bmp','png','gif','tif','tiff','pdf');

		$ext = explode(".",basename($_FILES['file']['name']));
		$ext = array_pop($ext);

		if (!in_array($ext,$validExtensions))
		{
			frontcontrollerx::json_success(array('MSG'=>'INVALID FILE TYPE'));
			die();
		}

		$file 		= '/srv/www/www.luerzersarchive.net/web/archive/submissions/print/lowres/'.date('Y').'/'.$es_id.'.'.$ext;
		$file_tmp 	= $_FILES['file']['tmp_name'];

		if (file_exists($file))
		{
			@unlink($file);
		}

		$dir = dirname($file);
		if (!is_dir($dir))
		{
			exec("mkdir $dir -p");
		}

		if (move_uploaded_file($file_tmp,$file))
		{
			$s_id = xredaktor_storage::registerExistingFile(1,$file);
			self::db_update(array('es_image_s_id'=>$s_id),$es_id,'uploadLowResPrint');
			frontcontrollerx::json_success(array('FILE'=>$s_id));
		} else {
			frontcontrollerx::json_success(array('MSG'=>'MOVE FILE FAILED'));
		}
	}

	public static function uploadHighResPrint($es_id)
	{
		$es_id = intval($es_id);
		if ($es_id == 0) die();

		$validExtensions = array('jpg','jpeg','bmp','png','gif','tif','pdf');

		$ext = explode(".",basename($_FILES['file']['name']));
		$ext = array_pop($ext);

		if (!in_array($ext,$validExtensions))
		{
			frontcontrollerx::json_success(array('MSG'=>'INVALID FILE TYPE'));
			die();
		}

		$file 		= '/srv/www/www.luerzersarchive.net/web/archive/submissions/print/highres/'.date('Y').'/'.$es_id.'.'.$ext;
		$file_tmp 	= $_FILES['file']['tmp_name'];

		if (file_exists($file))
		{
			@unlink($file);
		}

		$dir = dirname($file);
		if (!is_dir($dir))
		{
			exec("mkdir $dir -p");
		}

		if (move_uploaded_file($file_tmp,$file))
		{
			$s_id = xredaktor_storage::registerExistingFile(1,$file);
			dbx::update('e_submissions',array('es_image_highRes_s_id'=>$s_id,'es_image_highRes_modified'=>'NOW()','es_image_highRes_created'=>'NOW()','es_image_highRes_status'=>'PRESENT'),array('es_id'=>$es_id));
			frontcontrollerx::json_success(array('FILE'=>$s_id));
		} else {
			frontcontrollerx::json_success(array('MSG'=>'MOVE FILE FAILED'));
		}

	}
	public static function uploadHighResVideo($es_id)
	{
		$es_id = intval($es_id);
		if ($es_id == 0) die();

		$validExtensions = array('mp4','mov','wmv','flv','mkv','m4v','mpg','mpeg','avi','divx');

		$ext = explode(".",basename($_FILES['file']['name']));
		$ext = array_pop($ext);

		if (!in_array($ext,$validExtensions))
		{
			frontcontrollerx::json_success(array('MSG'=>'INVALID FILE TYPE'));
			die();
		}

		$file 		= '/srv/www/www.luerzersarchive.net/web/archive/submissions/tv_commercials/highres/'.date('Y').'/'.$es_id.'.'.$ext;
		$file_tmp 	= $_FILES['file']['tmp_name'];

		if (file_exists($file))
		{
			@unlink($file);
		}

		$dir = dirname($file);
		if (!is_dir($dir))
		{
			exec("mkdir $dir -p");
		}

		if (move_uploaded_file($file_tmp,$file))
		{
			$s_id = xredaktor_storage::registerExistingFile(1,$file);
			dbx::update('e_submissions',array('es_video_highRes_s_id'=>$s_id),array('es_id'=>$es_id));
			frontcontrollerx::json_success(array('FILE'=>$s_id));
		} else {
			frontcontrollerx::json_success(array('MSG'=>'MOVE FILE FAILED'));
		}

		die();

	}

	public static function encodeVideo($es_id)
	{
		$es_id = intval($es_id);
		$s = dbx::query("select * from e_submissions where es_id = $es_id");
		if ($s === false) die('no valid submission');


		$vid_encoder = dbx::query("select * from vid_encoder where ve_es_id = $es_id");

		$es_video_s_id 		= intval($s['es_video_s_id']);
		$es_video_high_s_id = intval($s['es_video_highRes_s_id']);


		if (($es_video_high_s_id != 0 || $es_video_s_id != 0))
		{
			if ($vid_encoder !== false) {
				dbx::update('vid_encoder',array('ve_state'=>'ABORT_BY_USER'),array('ve_es_id'=>$es_id));
			}

			require_once("/srv/www/www.luerzersarchive.net/web/datamigration/_includes.php");
			$ve_id = video_encoder2::encodeSubmission($es_id);

			echo "[$ve_id]<br>";
			ignore_user_abort(true);
			echo "<pre style='background-color:black;color:white;padding:50px;'>";
			video_encoder2::encodeAnyVideo($ve_id,true);
			echo "</pre>";

		} else { // OLD HISTORY

			if ($vid_encoder === false)
			{
				die("VIDEO ENCODER CONFIG NOT FOUND.");
			} else {

				dbx::update('e_submissions',array('es_video_encoded'=>0),array('es_id'=>$es_id));

				$ve_id = $vid_encoder['ve_id'];
				echo "[$ve_id]<br>";
				require_once("/srv/www/www.luerzersarchive.net/web/datamigration/_includes.php");
				ignore_user_abort(true);
				echo "<pre style='background-color:black;color:white;padding:50px;'>";
				video_encoder2::encodeAnyVideo($ve_id,true);
				echo "</pre>";
			}
		}

		die('END OF VIDEO-TRANSMISSION');
	}

	public static function downloadSubmission($es_id)
	{
		$es_id = intval($es_id);
		$s = dbx::query("select * from e_submissions where es_id = $es_id");
		if ($s === false) die('no valid submission');

		$es_mediaType_id = $s['es_mediaType_id'];

		switch ($es_mediaType_id)
		{
			case 1:
				$s_id = $s['es_image_s_id'];
				break;
			case 2:
				$s_id = $s['es_video_s_id'];

				// fix empty video_s_id values
				if ($s_id == 0)
				{
					$s_id = $s['es_video_1080_mp4_s_id'];
				}
				if ($s_id == 0)
				{
					$s_id = $s['es_video_720_mp4_s_id'];
				}
				if ($s_id == 0)
				{
					$s_id = $s['es_video_480_mp4_s_id'];
				}

				break;
			case 3:
				break;
			default: break;
		}


		$params = array();
		$params['s_id'] = $s_id;
		$params['mode'] = "DOWNLOAD";
		$ret 	= xredaktor_storage::download($params);

		$href 	= $ret['href'];
		header("Location: $href");

		die();
	}

	public static function downloadSubmissionHighRes($es_id)
	{
		$es_id = intval($es_id);

		$s = dbx::query("select * from e_submissions where es_id = $es_id");
		if ($s === false) die('no valid submission');

		$es_mediaType_id = $s['es_mediaType_id'];

		switch ($es_mediaType_id)
		{
			case 1:
				$s_id = $s['es_image_highRes_s_id'];
				break;
			case 2:
				$s_id = $s['es_video_highRes_s_id'];
				break;
			case 3:
				break;
			default: break;
		}


		$params = array();
		$params['s_id'] = $s_id;
		$params['mode'] = "DOWNLOAD";
		$ret 	= xredaktor_storage::download($params);
		$href 	= $ret['href'];
		header("Location: $href");

		die();
	}


	public static function downloadBEStillHigh($es_id)
	{
		$es_id = intval($es_id);

		$s = dbx::query("select * from e_submissions where es_id = $es_id");
		if ($s === false) die('no valid submission');
		
		$s_id = $s['es_video_poster_s_id'];
		
		$params = array();
		$params['s_id'] = $s_id;
		$params['mode'] = "DOWNLOAD";
		$ret 	= xredaktor_storage::download($params);
		$href 	= $ret['href'];
		header("Location: $href");

		die();
	}
	
	public static function downloadOrigStillHigh($es_id)
	{
		$es_id = intval($es_id);

		$s = dbx::query("select * from e_submissions where es_id = $es_id");
		if ($s === false) die('no valid submission');
		
		$s_id = $s['es_video_poster_original_id'];
		
		$params = array();
		$params['s_id'] = $s_id;
		$params['mode'] = "DOWNLOAD";
		$ret 	= xredaktor_storage::download($params);
		$href 	= $ret['href'];
		header("Location: $href");

		die();
	}
	


	public static function doDedaultFieldQuery($field,$query)
	{
		$field = dbx::escape($field);

		//$query = addslashes($query);

		$sql_data 	= "select DISTINCT(`$field`) as _value, `$field` as _display from e_submissions where $field LIKE '%$query%'";
		$sql_cnt 	= "select count(DISTINCT(`$field`)) as sql_cnt from e_submissions where $field LIKE '%$query%'";

		xluerzer_db::uniqueDataGridWrapper(array(
		'db' 		=> Ixcore::DB_NAME,
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));
	}

	public static function searchCombo($field)
	{
		$query = trim(dbx2::escape($_REQUEST['query']));
		//$query = addslashes($query);

		switch ($field)
		{


			case 'es_ad_title':
			case 'es_campaign':
			case 'es_firstname':
			case 'es_lastname':
			case 'es_city':
			case 'es_company':
			case 'es_agency':
			case 'es_email':
			case 'es_submittedFor':
			case 'es_comments':
			case 'es_notes':
			case 'es_archivNr':

				self::doDedaultFieldQuery($field,$query);
				break;

				break;

			default: break;
		}
	}


	public static function doDedaultFieldQuerySql($fields,$query,$like=false)
	{
		$query = trim($query);
		if ($query == "") return false;

		if (!is_array($fields)) $fields = array($fields);

		$queryFull = $query;
		$query = explode(" ",$query);
		$query = array($query);
		$where = array();

		foreach ($fields as $field)
		{

			$tmp = array();

			/*foreach ($query as $_q)
			{
			$_q = trim($_q);
			if ($like)
			{
			$tmp[] = " $field LIKE '%$_q%' ";
			} else {
			$tmp[] = " $field LIKE '$_q' ";
			}
			}
			*/
			$tmp[] = " $field LIKE '%$queryFull%' ";

			$where[] = " ( ".implode(" OR ",$tmp).") ";

		}

		$where = " ( ".implode(" OR ",$where)." ) ";
		return $where;
	}

	public static function parseDate($date)
	{
		list($m,$d,$y) = explode("/",$date);
		return "$y-$m-$d";
	}

	public static function search($stats=false,$returnSql=false)
	{

		$searchData = json_decode($_REQUEST['searchData'],true);

		$where 		= array();
		$extraTable = "";

		$credits = array();

		foreach ($searchData as $k => $v)
		{
			$v = dbx::escape($v);
			switch ($k)
			{
				// SPECIALS
				case credits_1:
				case credits_2:
				case credits_3:
				case credits_4:
				case credits_5:
				case credits_6:
				case credits_7:
				case credits_8:
				case credits_12:
				case credits_13:
				case credits_14:
				case credits_16:

					if (trim($v)=="") continue;
					$credits[] = array($k,$v);

					break;

				case 'created_from':
					if (trim($v)=="") break;
					$v = self::parseDate($v);
					$where[] = " es_created_date >= '$v' ";
					break;
				case 'created_to':
					if (trim($v)=="") break;
					$v = self::parseDate($v);
					$where[] = " es_created_date <= '$v' ";
					break;


				case 'created_from_time':
					if (trim($v)=="") break;
					$v = dbx::escape($v).':00';
					$where[] = " TIME(es_created_ts) >= '$v' ";
					break;
				case 'created_to_time':
					if (trim($v)=="") break;
					$v = dbx::escape($v).':00';
					$where[] = " TIME(es_created_ts)  <= '$v' ";
					break;


					/// FIELDS - NOT LIKE

				case 'es_mediaType_id':
				case 'es_category_id':
				case 'es_country_id':
				case 'es_magazine_id':
					$where[] = self::doDedaultFieldQuerySql($k,$v,false);
					break;

				case 'es_submission_type':

					if (trim($v)=="") break;
					$v = intval($v);

					if ($v > 0)
					{
						$where[] = " es_submission_type = $v ";
					} else if ($v < 0)
					{

						switch ($v)
						{
							case -10:
								$where[] = " `es_submission_type`<12 and es_submission_type >1 ";
								break;
							default: break;
						}


					}


					break;
				case 'es_campaign':
				case 'es_artwork':
				case 'es_state':
				case 'es_credits':
				case 'es_id':
				case 'es_firstname':
				case 'es_lastname':
				case 'es_city':
				case 'es_ad_title':
				case 'es_company':
				case 'es_agency':
				case 'es_email':
				case 'es_comments':
				case 'es_submittedFor':
				case 'es_notes':
				case 'es_archivNr':
					$where[] = self::doDedaultFieldQuerySql($k,$v,false);
					break;

					/// FIELDS - LIKE ?
				case 'es_lastname':
				case 'es_firstname':
					$where[] = self::doDedaultFieldQuerySql($k,$v,false);
					break;

				case 'overall':

					/*	$where[] = self::doDedaultFieldQuerySql(array(
					'es_company',
					'es_lastname',
					'es_firstname',
					'es_email',
					),$v,true);
					*/

					if (trim($v) == "") break;

					if (is_numeric($v))
					{
						$where[] = " es_id = $v ";
						continue;
					}


					list($p0,$p1) = explode(" ",$v,2);

					if (($p0 != "") && ($p1 != ""))
					{
						$where[] = " (
					(es_firstname LIKE '%$p0%' AND es_lastname LIKE '%$p1%' ) OR ( es_firstname LIKE '%$p1%' AND es_lastname LIKE '%$p0%' ) OR ( es_submittedBy LIKE '%$p0 $p1%' OR es_submittedBy LIKE '%$p1 $p0%' ) OR (es_email LIKE '%$p0') OR (es_email LIKE '%$p1') OR (es_company LIKE '%$p1 $p0%') OR (es_company LIKE '%$p0 $p1%') OR (es_firstname LIKE '%$p1 $p0%') OR (es_lastname LIKE '%$p0 $p1%')  
					) ";

						/*
						$where[] = " (
						(es_firstname LIKE '$p0' AND es_lastname LIKE '$p1' ) OR ( es_firstname LIKE '$p1' AND es_lastname LIKE '$p0' ) OR ( es_submittedBy LIKE '%$p1%' OR es_submittedBy LIKE '%$p0%' ) OR (es_company LIKE '$p0') OR (es_company LIKE '$p1') OR (es_email LIKE '$p0') OR (es_email LIKE '$p1') OR (es_company LIKE '$p1 $p0') OR (es_company LIKE '$p0 $p1')
						) ";

						*/
					} else {
						$where[] = " (
					(es_firstname LIKE '%$p0%') OR ( es_lastname LIKE '%$p0%') OR (es_company LIKE '%$p0%') OR (es_email LIKE '%$p0') OR (es_submittedBy LIKE '%$p0%') 
					) ";

					}

					break;

				default: break;
			}
		}

		/// CREDITS

		if (count($credits)==1)
		{
			list($k,$v) = $credits[0];
			list($crappppp,$stripped) = explode("_",$k);
			$extraTable = " , e_submissions_credits ";
			$where[] = " esc_submission_id = es_id and esc_contact_id in($v) and esc_contactType_id = $stripped ";

		} else if (count($credits)>1)
		{

			$extraTable = " , e_submissions_credits ";
			$xwhere 	= array();

			foreach ($credits as $c)
			{
				list($k,$v) = $c;
				list($crappppp,$stripped) = explode("_",$k);
				$xwhere[] = "  esc_contact_id = $v and esc_contactType_id = $stripped ";
			}

			$where[] = " esc_submission_id = es_id and esc_submission_id in (select esc_submission_id from e_submissions_credits where (".implode(' AND ',$xwhere).")) ";
		}


		if (($searchData['credit_universal'] != '')  && ($searchData['credit_scope'] != '')) // credit_universal + credit_scope
		{
			$extraTable 		= " , e_submissions_credits ";

			$credit_universal 	= dbx::escape($searchData['credit_universal']);

			list($p0,$p1) = explode(" ",$credit_universal,2);

			$credit_scope 	= $searchData['credit_scope'];
			if (is_array($credit_scope))
			{
				$credit_scope = implode(",",$searchData['credit_scope']);
			}

			$where[] = " esc_submission_id = es_id and esc_contactType_id IN ($credit_scope) and esc_contact_id IN (select ec_id from e_contacts where ((ec_firstname LIKE '%$p0%' AND ec_lastname LIKE '%$p1%') OR (ec_firstname LIKE '%$p1%' AND ec_lastname LIKE '%$p0%') OR ec_company LIKE '%$credit_universal%' ) ) ";
			// $where[] = " esc_submission_id = es_id and esc_contactType_id IN ($credit_scope) and esc_contact_id IN (select ec_id from e_contacts where (ec_firstname LIKE '%$credit_universal%' OR ec_lastname LIKE '%$credit_universal%' OR ec_company LIKE '%$credit_universal%' ) ) ";
		}

		if (($searchData['credit_universal'] == '') && ($searchData['credit_scope'] != '')) // credit_scope
		{
			$extraTable 	= " , e_submissions_credits ";

			$credit_scope 	= $searchData['credit_scope'];
			if (is_array($credit_scope))
			{
				$credit_scope = implode(",",$searchData['credit_scope']);
			}

			$where[] = " esc_submission_id = es_id and esc_contactType_id IN ($credit_scope) ";
		}


		if (($searchData['credit_universal'] != '') && ($searchData['credit_scope'] == '')) // credit_universal
		{
			$extraTable 		= " , e_submissions_credits ";
			$credit_universal 	= dbx::escape($searchData['credit_universal']);

			list($p0,$p1) = explode(" ",$credit_universal,2);

			$where[] = " esc_submission_id = es_id and esc_contact_id IN (select ec_id from e_contacts where ((ec_firstname LIKE '%$p0%' AND ec_lastname LIKE '%$p1%') OR (ec_firstname LIKE '%$p1%' AND ec_lastname LIKE '%$p0%') OR ec_company LIKE '%$credit_universal%' ) ) ";
		}





		/*
		if (($searchData['credit_person'] != '') || ($searchData['credit_company'] != ''))
		{

		$contact_id = $searchData['credit_company'];
		if ($searchData['credit_person'] != '')
		{
		$contact_id = $searchData['credit_person'];
		}


		$extraTable = " , e_submissions_credits ";

		$ttt = " esc_submission_id = es_id and esc_contact_id  = $contact_id ";

		if ($searchData['credit_scope'] != '')
		{
		$credit_scope = $searchData['credit_scope'];
		if (is_array($credit_scope))
		{
		$credit_scope = implode(",",$searchData['credit_scope']);
		}
		$ttt .= " and esc_contactType_id IN ($credit_scope) 	";
		}




		$where[] = $ttt;

		}
		*/


		if (isset($_REQUEST['filterCountry']))
		{
			$country_id = intval($_REQUEST['filterCountry']);
			$where[] = " es_country_id = $country_id ";
		}



		// CLEANING
		$backup = $where;
		$where 	= array();
		foreach ($backup as $w)
		{
			if ($w === false) continue;
			$where[] = $w;
		}

		// FINALLY
		if (count($where)==0)
		{
			$where = " 1=1 ";
		} else {
			$where = implode(" AND ",$where);
		}

		if ($stats)
		{
			$sql_data = "SELECT asc_name, asc_id, es_country_id, count(distinct(`es_submittedBy`)) as total_submitter, count(es_country_id) as total_submissions
		FROM `e_submissions`,a_shop_country $extraTable WHERE [GRID_FILTERS] asc_id = es_country_id and $where
		GROUP BY es_country_id
		order by asc_name
		";

			$sql_cnt = "SELECT count(es_id) as cntx
		FROM `e_submissions`,a_shop_country $extraTable WHERE [GRID_FILTERS] asc_id = es_country_id and $where
		GROUP BY es_country_id
		";


			xluerzer_db::uniqueDataGridWrapper(array(
			'sql_data' 	=> $sql_data,
			'sql_cnt' 	=> $sql_cnt,
			));

		}

		/*
		{name:'es_credits_total',					text:'Credits', 				type: 'string'},
		{name:'es_xcredits_total',					text:'X-Credits', 			type: 'string'},
		{name:'es_credits_none_total',				text:'Credits None', 			type: 'string'},


		(select count(esc_id) from e_submissions_credits where esc_submission_id  = es_id ) as es_credits_total,
		(select count(esxts_id) from e_submissions_xcredits_to_submissions where esxts_submission_id = es_id and esxts_contact_id > 0) as es_xcredits_total,
		(select count(esxts_id) from e_submissions_xcredits_to_submissions where esxts_submission_id  = es_id and esxts_contact_id = -1) as es_credits_none_total,

		*/

		$sql_data = "SELECT *,
		
		(select count(esc_id) from e_submissions_credits where esc_submission_id  = es_id ) as es_credits_total,
		(select count(esxts_id) from e_submissions_xcredits_to_submissions where esxts_submission_id = es_id and esxts_contact_id > 0) as es_xcredits_total,
			(select count(esxts_id) from e_submissions_xcredits_to_submissions where esxts_submission_id  = es_id and esxts_contact_id = -2) as es_credits_donotknow_total
		
		FROM `e_submissions`, `a_shop_country` $extraTable WHERE [GRID_FILTERS] $where and es_country_id = asc_id ORDER BY `es_id` desc";
		$sql_cnt = "SELECT count(*) as sql_cnt FROM `e_submissions` $extraTable WHERE [GRID_FILTERS] $where ";

		if ($returnSql)
		{
			return array($sql_data,$sql_cnt);
		}

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

		die();
	}


	public static function search4CombinerDoIt()
	{
		set_time_limit(0);


		list($sql,$sql_cnt) = self::search4Combiner(true);

		$sql 		= str_replace('[GRID_FILTERS]','',$sql);
		$sql_cnt 	= str_replace('[GRID_FILTERS]','',$sql_cnt);


		$searchData = json_decode($_REQUEST['q'],true);
		$es_user_id = intval($searchData['es_user_id']);

		if ($es_user_id == 0)
		{
			frontcontrollerx::json_failure("User-ID is wrong!");
		}

		$user = dbx::query("select * from fe_users where feu_id = $es_user_id and feu_deleted = 0");

		if ($user === false)
		{
			frontcontrollerx::json_failure("No valid FE-USER found.");
		}


		$count = intval(dbx::queryAttribute($sql_cnt,"sql_cnt"));

		if ($count == 0)
		{
			frontcontrollerx::json_failure("Sorry, no count submission selected.");
		}
		$max = 300;
		if ($count > $max)
		{
			frontcontrollerx::json_failure("Sorry, $count submission selected. Maximum is $max !");
		}

		$data = dbx::queryAll($sql,false);
		foreach ($data as $d)
		{
			$es_id 			= intval($d['es_id']);
			$es_fe_user_id 	= intval($d['es_fe_user_id']);

			if ($es_id == 0) continue;

			dbx::insert('e_submissions_backup_fe_user_id',array(

			'esbf_es_id' 			=> $es_id,
			'esbf_feu_id_old' 		=> $es_fe_user_id,
			'esbf_feu_id_new' 		=> $es_user_id,
			'esbf_feu_ts' 			=> 'NOW()',
			'esbf_feu_be_user_id' 	=> xluerzer::getCurrentUserId()

			));

			dbx::update('e_submissions',array('es_fe_user_id'=>$es_user_id),array('es_id'=>$es_id));

		}

		frontcontrollerx::json_success();
	}

	public static function search4Combiner($sqlOnly=false)
	{

		$searchData = json_decode($_REQUEST['q'],true);

		$where 		= array();
		$extraTable = "";

		$credits = array();

		foreach ($searchData as $k => $v)
		{
			$v = dbx::escape($v);
			switch ($k)
			{
				case 'es_emails':
					$vs = explode("\\n",trim($v));

					$ors = array();
					foreach ($vs as $emailpart)
					{
						if (trim($emailpart) == "") continue;
						$ors[] = self::doDedaultFieldQuerySql('es_email',"%$emailpart%",true);
					}

					if (count($ors) > 0)
					{
						$where[] = " ( ".implode(" OR ",$ors)." ) ";
					}



					break;

				case 'es_campaign':
				case 'es_artwork':
				case 'es_state':
				case 'es_credits':
				case 'es_id':
				case 'es_firstname':
				case 'es_lastname':
				case 'es_city':
				case 'es_company':
				case 'es_agency':
				case 'es_email':
				case 'es_comments':
				case 'es_submittedFor':
				case 'es_notes':
				case 'es_archivNr':
					if (trim($v) == "") continue;
					$where[] = self::doDedaultFieldQuerySql($k,"%$v%",false);
					break;

					/// FIELDS - LIKE ?
				case 'es_lastname':
				case 'es_firstname':
					if (trim($v) == "") continue;
					$where[] = self::doDedaultFieldQuerySql($k,"%$v%",false);
					break;
				default: break;
			}
		}

		// CLEANING
		$backup = $where;
		$where 	= array();
		foreach ($backup as $w)
		{
			if ($w === false) continue;
			$where[] = $w;
		}

		// FINALLY
		if (count($where)==0)
		{
			$where = " 1=1 ";
		} else {
			$where = implode(" AND ",$where);
		}


		$where = trim($where);
		if ($where == "")
		{
			$where = " 1=1 ";
		}


		$sql_data = "SELECT *
		
		FROM `e_submissions` $extraTable WHERE [GRID_FILTERS] $where ORDER BY `es_id` desc";
		$sql_cnt = "SELECT count(*) as sql_cnt FROM `e_submissions` $extraTable WHERE [GRID_FILTERS] $where ";


		if ($sqlOnly)
		{
			return array($sql_data,$sql_cnt);
		}


		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

		die();
	}


	public static function xcreditSavedPleasJoin()
	{
		$ec_id = intval($_REQUEST['ec_id']);
		$contact = xluerzer_contacts::getById($ec_id);
		$ec_id = intval($contact['ec_id']);

		if ($ec_id == 0) {
			frontcontrollerx::json_failure("ERROR: Contact $ec_id does not exist.");
		}

		$es_contactType_id = intval($contact['es_contactType_id']);

		if ($es_contactType_id == 0) {
			//			frontcontrollerx::json_failure("ERROR: Contact $es_id has no Credit Type - please fix this error. Assignment aborted.");
		}

		$esxc_id = intval($_REQUEST['esxc_id']);
		$esx = dbx::queryAll("select * from e_submissions_xcredits_to_submissions where esxts_contact_id = $esxc_id");

		if($esx === false) $esx = array();
		foreach ($esx as $key => $value) {
			$esxc_submission_id = intval($value['esxts_submission_id']);
			$es_contactType_id = intval($value['esxts_contactType_id']);


			$presentContact = dbx::query("select * from e_submissions_credits where esc_submission_id = $esxc_submission_id  and esc_contact_id = $ec_id and esc_contactType_id = $es_contactType_id");
			if ($presentContact !== false) {
				//frontcontrollerx::json_failure("WARNING: Contact already assigned.");
				continue;
			}

			$db2 = array(
			esc_checked 		=> 'OK',
			esc_submission_id	=> $esxc_submission_id,
			esc_contactType_id	=> $es_contactType_id,
			esc_contact_id		=> $ec_id,
			esc_created_ts		=> 'NOW()',
			);
			dbx::insert('e_submissions_credits',$db2);
			$esc_id = dbx::getLastInsertId();
		}

		frontcontrollerx::json_success(array('data'=>$data,'db'=>$db,'es_id'=>$es_id,'esc_id'=>$esc_id));
	}

	public static function submissionSave()
	{
		$es_id 	= intval($_REQUEST['es_id']);
		$data 	= json_decode($_REQUEST['data'],true);

		$db = array();
		foreach ($data as $k => $v)
		{
			if (!dbx::attributePresent('e_submissions',$k)) continue;
			$db[$k] = $v;
		}

		unset($db['es_original_submitter_infos']);

		$db['es_modified_by'] = xluerzer_user::getCurrentUserId();

		$oldData = dbx::query("select * from e_submissions where es_id = $es_id");
		dbx::update('e_submissions',$db,array('es_id'=>$es_id));
		xluerzer_log::pushLog('UPDATE','e_submissions','es_id',$es_id,$oldData);

		if(intval($db['es_state']) == 5)
		{
			$cfg = array('es_id'=>$es_id);
			xluerzer_cloud::insert_queue_from_submission($cfg);
		}

		frontcontrollerx::json_success();
	}

	public static function genVideoThumbBySId($param_0)
	{
		$s_id 	= intval($param_0);
		$ext 	= 'png';

		$img = xredaktor_storage::xr_img2(array(
		s_id 		=> $s_id,
		w 			=> 100,
		h 			=> 56,
		q 			=> 85,
		fullpath 	=> 'Y',
		rmode		=> 'strict',
		ext			=> $ext,
		));

		$fullPath = $img['src'];
		imagesx::readfile_if_modified($fullPath,array('Content-Type: image/'.$ext));
		die();
	}


	public static function getVideoFileBySId()
	{
		$video_s_id = intval($_REQUEST['video_s_id']);
		$file = xredaktor_storage::getById($video_s_id,true);

		$video = array(
		url_video => $file['webSrc']
		);

		frontcontrollerx::json_success(array('video'=>$video));
	}

	public static function saveCredits()
	{
		$es_id 		= intval($_REQUEST['es_id']);
		$credits 	= json_decode($_REQUEST['credits'],true);

		$sql = "delete from e_submissions_credits where esc_submission_id = $es_id ";
		dbx::query($sql);

		$duplicates = array();

		foreach ($credits as $type => $_contacts)
		{
			$contacts = json_decode($_contacts,true);
			foreach ($contacts as $c)
			{
				$ec_id = intval($c['id']);

				$present = dbx::query("select * from e_submissions_credits where esc_submission_id = $es_id and esc_contactType_id = $type and esc_contact_id = $ec_id");

				if ($present === false)
				{
					dbx::insert('e_submissions_credits',array(
					esc_checked 		=> 'OK',
					esc_submission_id	=> $es_id,
					esc_contactType_id	=> $type,
					esc_contact_id		=> $ec_id,
					esc_created_ts		=> 'NOW()',
					));
				}
			}
		}

		frontcontrollerx::json_success();
	}


	public static function checkCreditsPresent($es_id)
	{

	}

	public static function saveCredits2()
	{
		$es_id 		= intval($_REQUEST['es_id']);

		$credits 	= json_decode($_REQUEST['credits'],true);
		$xcredits 	= json_decode($_REQUEST['xcredits'],true);

		dbx::query("delete from e_submissions_credits 					where esc_submission_id = $es_id ");
		dbx::query("delete from e_submissions_xcredits_to_submissions 	where esxts_submission_id = $es_id and esxts_contact_id = -2");

		$duplicates = array();

		foreach ($credits as $type => $_contacts)
		{
			$contacts = json_decode($_contacts,true);
			foreach ($contacts as $c)
			{
				$ec_id = intval($c['id']);

				$present = dbx::query("select * from e_submissions_credits where esc_submission_id = $es_id and esc_contactType_id = $type and esc_contact_id = $ec_id");

				if ($present === false)
				{
					dbx::insert('e_submissions_credits',array(
					esc_checked 		=> 'OK',
					esc_submission_id	=> $es_id,
					esc_contactType_id	=> $type,
					esc_contact_id		=> $ec_id,
					esc_created_ts		=> 'NOW()',
					));
				}
			}
		}

		foreach ($xcredits as $type => $_contacts)
		{
			$contacts = json_decode($_contacts,true);
			foreach ($contacts as $c)
			{
				$ec_id = intval($c['id']);

				if ($ec_id == -1) {
					continue;
				}

				if ($ec_id == -2) {


					if (count(json_decode($credits[$type]),true) == 0)
					{
						dbx::insert('e_submissions_xcredits_to_submissions',array(
						esxts_submission_id		=> $es_id,
						esxts_contactType_id	=> $type,
						esxts_contact_id		=> $ec_id,
						esxts_created_ts		=> 'NOW()',
						));
					}

				}


			}
		}

		self::checkCreditsPresent($es_id);

		frontcontrollerx::json_success();
	}

	public static function save_xcredit()
	{
		$esxc_id = intval($_REQUEST['esxc_id']);
		$data  = json_decode($_REQUEST['data'],true);

		$esx = dbx::query("select * from e_submissions_xcredits where esxc_id = $esxc_id");
		$esxc_submission_id = intval($esx['esxc_submission_id']);

		$mapper = array(
		esxc_city 			=> 'ec_city',
		esxc_company 		=> 'ec_company',
		esxc_contactType_id => 'ec_contactType_id',
		esxc_country_id 	=> 'ec_country_id',
		esxc_firstname 		=> 'ec_firstname',
		//esxc_id 			=> 'ec_id',
		esxc_lastname 		=> 'ec_lastname',
		esxc_phone 			=> 'ec_phone',
		esxc_phone_code 	=> 'ec_phone_code',
		esxc_type 			=> 'ec_type',
		esxc_zip 			=> 'ec_zip',
		);

		$db = array();

		foreach ($mapper as $old => $new)
		{
			$db[$new] = $data[$old];
		}

		$db['ec_created_by'] = xluerzer_user::getCurrentUserId();
		$db['ec_created_ts'] = 'NOW()';


		dbx::insert('e_contacts',$db);
		$es_id = dbx::getLastInsertId();

		$esc_contactType_id = intval($db['es_contactType_id']);


		$db2 = array(
		esc_checked 		=> 'OK',
		esc_submission_id	=> $esxc_submission_id,
		esc_contactType_id	=> $esc_contactType_id,
		esc_contact_id		=> $es_id,
		esc_created_ts		=> 'NOW()',
		);

		dbx::insert('e_submissions_credits',$db2);
		$esc_id = dbx::getLastInsertId();

		frontcontrollerx::json_success(array('data'=>$data,'db'=>$db,'es_id'=>$es_id,'esc_id'=>$esc_id));
	}

	public static function load_xcredit()
	{
		$esxc_id = intval($_REQUEST['esxc_id']);
		$record = dbx::query("select * from e_submissions_xcredits where esxc_id = $esxc_id");
		frontcontrollerx::json_success(array('record'=>$record));
	}

	public static function loadContactTypes()
	{
		$records = array();
		$records[] = array('label'=>'not set','value'=>0);
		$records = array_merge($records,dbx::queryAll("select act_description as label, act_id as value from a_contact_type order by act_description"));
		frontcontrollerx::json_success(array('contactTypes'=>$records));
	}

	public static function loadCountries()
	{
		$records = array();

		$records[] = array('label'=>'All Countries','value'=>'');
		$records[] = array('label'=>'International','value'=>0);

		$records = array_merge($records,dbx::queryAll("select ac_name as label, ac_id as value from a_country order by ac_name"));
		frontcontrollerx::json_success(array('countries'=>$records));
	}

	public static function loadCountriesShop()
	{
		$records = array();

		$records[] = array('label'=>'not set','value'=>0);
		$records[] = array('label'=>'All Countries','value'=>'');

		$records = array_merge($records,dbx::queryAll("select asc_name as label, asc_id as value from a_shop_country order by asc_name"));
		frontcontrollerx::json_success(array('countries'=>$records));
	}

	public static function loadSubmittedFor()
	{
		$records = array();

		$records[] = array('label'=>'not set','value'=>0);

		$records = array_merge($records,dbx::queryAll("select distinct(es_submittedFor) as label, es_submittedFor as value from e_submissions where es_submittedFor != '' and es_submittedFor != 'DAMAGED' order by es_submittedFor"));
		frontcontrollerx::json_success(array('submittedfor'=>$records));

	}

	public static function loadMagazineTypes()
	{
		$records = array();
		$records[] = array('label'=>'not set','value'=>0);
		$records = array_merge($records,dbx::queryAll("select emt_name as label, emt_id as value from e_magazine_type  where emt_real_type = 1 order by emt_name"));
		frontcontrollerx::json_success(array('countries'=>$records));
	}

	public static function loadCategories()
	{
		$records = array();
		$records[] = array('label'=>'not set','value'=>0);
		$records = array_merge($records,dbx::queryAll("select ac_name as label, ac_id as value from a_category order by ac_name"));
		frontcontrollerx::json_success(array('categories'=>$records));
	}

	public static function loadMagazines()
	{
		$records = array();
		$records[] = array('label'=>'not set','value'=>0);
		$records = array_merge($records,dbx::queryAll("select em_name as label, em_id as value from e_magazine order by em_year desc, em_edition desc, em_name desc "));
		frontcontrollerx::json_success(array('magazines'=>$records));
	}

	public static function loadMagazines_specials()
	{
		$records = array();
		$records[] = array('label'=>'not set','value'=>0);
		$records = array_merge($records,dbx::queryAll("select em_name as label, em_id as value from e_magazine where em_type > 1 and em_type < 12 order by em_year desc, em_edition desc, em_name desc "));
		frontcontrollerx::json_success(array('magazines'=>$records));
	}

	public static function loadMagazinesSearch()
	{
		$records = array();
		$records[] = array('label'=>'not credited','value'=>0);
		$records = array_merge($records,dbx::queryAll("select em_name as label, em_id as value from e_magazine order by em_year desc, em_edition desc, em_name desc "));
		frontcontrollerx::json_success(array('magazines'=>$records));
	}



	public static function getSymbolForType($contact_type)
	{
		$contact_type = intval($contact_type);
		$d = dbx::query("select act_symbol_char from a_contact_type where act_id = $contact_type");
		if ($d === false) return "";
		return trim($d['act_symbol_char']);
	}

	public static function getTextForType($es_id,$contact_type)
	{
		$contact_type = intval($contact_type);
		$es_id = intval($es_id);

		//$credits = dbx::queryAll("select * from e_submissions_credits,e_contacts where esc_submission_id = $es_id and esc_contactType_id = $contact_type and esc_contact_id = ec_id");

		$sql = "select ec_id, ec_company, ec_firstname, ec_lastname, esc_submission_id, esc_contactType_id, esc_contact_id  from e_submissions_credits,e_contacts where esc_submission_id = $es_id and esc_contactType_id = $contact_type and esc_contact_id = ec_id
				 UNION 
				select esxc_id as ec_id, esxc_company as ec_company, esxc_firstname as ec_firstname, esxc_lastname as ec_lastname, esxts_submission_id, esxc_contactType_id, esxts_contact_id  from e_submissions_xcredits_to_submissions,e_submissions_xcredits where esxts_submission_id = $es_id and esxts_contactType_id = $contact_type and esxts_contact_id = esxc_id and (esxts_contact_id != '-1' and esxts_contact_id != '-2') ";
		$credits = dbx::queryAll($sql);


		if ($credits === false) return "";

		$smybol = self::getSymbolForType($contact_type);
		$name 	= array();

		foreach ($credits as $c)
		{
			switch ($contact_type)
			{
				case 2: // ad agency
				case 6: // production company
				case 7: // client company
				case 12: // institute

				$name[] = trim($c['ec_company']); // COMPANY
				break;
				default:
					$name[] = trim($c['ec_firstname'].' '.$c['ec_lastname']); // PERSON
					break;
			}

		}

		return $smybol." ".implode(", ",$name);
	}

	public static function getCredits2CopyNorm($es_id,$es_mediaType_id, $es_submission_type = 1)
	{
		switch ($es_mediaType_id)
		{
			case 1: // PRINT

			/*

			∆ JWT (J. Walter Thompson), Melbourne ‡ Christian Gosch ∏ Daniela Reichmann ∂ Fabian Ruetschi ≥ Nadav Kander ∞ Mario Wagner ∫ Alex Melik-Adamov / Patrick Salonen

			*/

			$ret = array();
			$ret[] = self::getTextForType($es_id,2); 	// AD AGENCY
			$ret[] = self::getTextForType($es_id,16); 	// CREATIVE DIRECTOR
			$ret[] = self::getTextForType($es_id,5); 	// ART DIRECTOR
			$ret[] = self::getTextForType($es_id,3); 	// COPYWRITER
			$ret[] = self::getTextForType($es_id,1); 	// PHOTOGRAPHER
			$ret[] = self::getTextForType($es_id,4); 	// ILLUSTRATOR
			$ret[] = self::getTextForType($es_id,13); 	// typographer
			$ret[] = self::getTextForType($es_id,14); 	// DIGITAL
			
			// wenn special dann auch CLIENT
			if ($es_submission_type > 1)
			{
				$ret[] = self::getTextForType($es_id,7); 	// DIGITAL
			}
			
			return implode(" ",$ret);

			break;

			case 2: // VIDEO


			/*

			∆ DDB, Vancouver ‡ Dean Lee, Cosmo Campbell ∏ John Larigakis ∂ Neil Shapiro ± Soft Citizen ≤ Arni Thor Jonsson

			*/


			$ret = array();
			$ret[] = self::getTextForType($es_id,2); 	// AD AGENCY
			$ret[] = self::getTextForType($es_id,16); 	// CREATIVE DIRECTOR
			$ret[] = self::getTextForType($es_id,5); 	// ART DIRECTOR
			$ret[] = self::getTextForType($es_id,3); 	// COPYWRITER
			$ret[] = self::getTextForType($es_id,8); 	// DIRECTOR
			$ret[] = self::getTextForType($es_id,6); 	// PRODUCTION COMPANY

			return implode(" ",$ret);


			break;
			default: return ""; // STUDENTS NOTHING ...
		}
	}

	public static function getCredits2CopySpecial($es_id,$es_mediaType_id)
	{


		switch ($es_mediaType_id)
		{
			case 1: // PRINT

			/*

			∞ Mario Wagner ∆ JWT (J. Walter Thompson), Melbourne ∏ Daniela Reichmann π Tiempo BBDO, Barcelona

			*/

			$ret = array();
			$ret[] = self::getTextForType($es_id,4); 	// ILLUSTRTAOR
			$ret[] = self::getTextForType($es_id,2); 	// AD AGENCY
			$ret[] = self::getTextForType($es_id,5); 	// ART DIRECTOR
			$ret[] = self::getTextForType($es_id,7); 	// CLIENT COMPANY
			return implode(" ",$ret);


			break;

			case 2: // VIDEO



			/*

			∞  ∆ DDB, Vancouver ∏ John Larigakis π Strategic Milk Alliance

			*/


			$ret = array();
			$ret[] = self::getTextForType($es_id,4); 	// ILLUSTRTAOR
			$ret[] = self::getTextForType($es_id,2); 	// AD AGENCY
			$ret[] = self::getTextForType($es_id,5); 	// ART DIRECTOR
			$ret[] = self::getTextForType($es_id,7); 	// CLIENT COMPANY
			return implode(" ",$ret);


			break;
			default: return ""; // STUDENTS NOTHING ...
		}
	}


	public static function loadData()
	{
		$es_id = intval($_REQUEST['es_id']);
		$delta = intval($_REQUEST['delta']);


		if ($delta != 0)
		{
			if ($delta < 0)
			{
				if ($delta == -1)
				{
					$submission = dbx::query("select * from e_submissions where es_id < $es_id order by es_id desc LIMIT 1");
				} else {
					$submission = dbx::query("select * from e_submissions where es_id < $es_id and es_state = 5 order by es_id desc LIMIT 1");
				}

			} else {

				switch ($delta)
				{
					case 1:
						$submission = dbx::query("select * from e_submissions where es_id > $es_id order by es_id asc limit 1");
						break;
					case 2:
						$submission = dbx::query("select * from e_submissions where es_id > $es_id and es_state = 5 order by es_id asc limit 1");
						break;
					default:
					case 3:
						$submission = dbx::query("select * from e_submissions where 1 order by es_id desc limit 1");
						break;
				}
			}

			$es_id = intval($submission['es_id']);

		} else {
			$submission = dbx::query("select * from e_submissions where es_id = $es_id LIMIT 1");
		}

		################# CREDITS

		$_credits 	= dbx::queryAll("select * from e_submissions_credits,e_contacts where esc_submission_id = $es_id and ec_id = esc_contact_id ");
		$credits 	= array();

		foreach ($_credits as $c)
		{
			$id = $c['esc_contactType_id'];
			$fieldName = "credits_".$id;

			if (!isset($credits[$fieldName])) $credits[$fieldName] = array();

			switch ($id)
			{
				case '2':
				case '6':
				case '7':
				case '12':

					$tmp = array(
					id 		=> $c['ec_id'],
					name 	=> trim($c['ec_company'].' ['.$c['ec_id'].']'), // es_firstname	es_lastname es_company
					);

					break;

				default:
					$tmp = array(
					id 		=> $c['ec_id'],
					name 	=> trim($c['ec_firstname'].' '.$c['ec_lastname'].' ['.$c['ec_id'].']'), // es_firstname	es_lastname es_company
					);
					break;
			}




			$credits[$fieldName][] = $tmp;
		}

		for ($i=1;$i<=16;$i++)
		{
			$key = "credits_".$i;
			if (!isset($credits[$key])) $credits[$key] = array();
			$credits[$key] = json_encode($credits[$key]);
		}

		################# XCREDITS

		$_xcredits 	= dbx::queryAll("select * from e_submissions_xcredits,e_submissions_xcredits_to_submissions where esxts_submission_id = $es_id and esxc_id = esxts_contact_id ");
		$xcredits 	= array();

		foreach ($_xcredits as $c)
		{
			$id = $c['esxts_contactType_id'];
			$fieldName = "xcredits_".$id;

			if (!isset($xcredits[$fieldName])) $xcredits[$fieldName] = array();

			switch ($c['esxc_id'])
			{
				case -1:
				case -2:

					$tmp = array(
					id 		=> $c['esxc_id'],
					name 	=> trim($c['esxc_company']), // es_firstname	es_lastname es_company
					);

					break;
				default:

					$tmp = array(
					id 		=> $c['esxc_id'],
					name 	=> trim($c['esxc_company'].' '.$c['esxc_firstname'].' '.$c['esxc_lastname'].' ['.$c['esxc_id'].']'), // es_firstname	es_lastname es_company
					//name 	=> trim($c['esxc_company'].' '.$c['esxc_firstname'].' '.$c['esxc_lastname']), // es_firstname	es_lastname es_company
					);

			}


			$xcredits[$fieldName][] = $tmp;
		}

		for ($i=1;$i<=16;$i++)
		{
			$key = "xcredits_".$i;
			if (!isset($xcredits[$key])) $xcredits[$key] = array();
			$xcredits[$key] = json_encode($xcredits[$key]);
		}

		################# BACKUP - CREDITS

		$backupCreditsAndXCredits = json_decode($submission['es_original_submitter_credits'],true);

		$_credits 		= $backupCreditsAndXCredits['CREDITS'];
		$creditsOld 	= array();


		foreach ($_credits as $c)
		{
			$id = $c['esc_contactType_id'];
			$ec_id = intval($c['esc_contact_id']);

			$fieldName = "credits_".$id;
			if (!isset($creditsOld[$fieldName])) $creditsOld[$fieldName] = array();
			$c2 = dbx::query("select * from e_contacts where ec_id = $ec_id");

			$tmp = array(
			id 		=> $c2['ec_id'],
			name 	=> trim($c2['ec_company'].' '.$c2['ec_firstname'].' '.$c2['ec_lastname'].' ['.$c2['ec_id'].']'), // es_firstname	es_lastname es_company
			);

			$creditsOld[$fieldName][] = $tmp;
		}

		for ($i=1;$i<=16;$i++)
		{
			$key = "credits_".$i;
			if (!isset($creditsOld[$key])) $creditsOld[$key] = array();
			$creditsOld[$key] = json_encode($creditsOld[$key]);
		}

		################# BACKUP - XCREDITS

		$_xcredits 	= $backupCreditsAndXCredits['XCREDITS'];
		$xcreditsOld 	= array();

		foreach ($_xcredits as $c)
		{
			$id = $c['esxts_contactType_id'];
			$esxc_id = intval($c['esxts_contact_id']);


			$fieldName = "xcredits_".$id;
			if (!isset($xcreditsOld[$fieldName])) $xcreditsOld[$fieldName] = array();
			$c2 = dbx::query("select * from e_submissions_xcredits where esxc_id = $esxc_id");

			// TODO CHECK WER ER IST

			$tmp = array(
			id 		=> $c2['esxc_id'],
			name 	=> trim($c2['esxc_company'].' '.$c2['esxc_firstname'].' '.$c2['esxc_lastname'].' ['.$c2['esxc_id'].']'), // es_firstname	es_lastname es_company
			);

			$xcreditsOld[$fieldName][] = $tmp;
		}

		for ($i=1;$i<=16;$i++)
		{
			$key = "xcredits_".$i;
			if (!isset($xcreditsOld[$key])) $xcreditsOld[$key] = array();
			$xcreditsOld[$key] = json_encode($xcreditsOld[$key]);
		}

		################### FINALIZE


		$es_mediaType_id 	= intval($submission['es_mediaType_id']);
		$es_magazine_id 	= intval($submission['es_magazine_id']);
		
		$es_submission_type = intval($submission['es_submission_type']);

		$magazin = dbx::query("select * from e_magazine where em_id = $es_magazine_id");
		if ($magazin == false) $magazin = array();
		$em_type = intval($magazin['em_type']);

		switch ($em_type)
		{
			case 1:
				if ($es_mediaType_id == 2) $em_type = 12;
				break;
			default: break;
		}

		if ($em_type == 0 ) {

			switch ($es_mediaType_id)
			{
				case 2:
					$em_type = 12;
					break;
				case 1:
					$em_type = 1;
					break;
				default: break;
			}

		}

		$creditsInput = dbx::queryAll("select * from a_credits2mag,a_contact_type where c2m_m_id = $em_type and c2m_c_id = act_id and c2m_checked = 1 order by c2m_sort");


		$ccopy_norm 	= trim(self::getCredits2CopyNorm($es_id,$es_mediaType_id, $es_submission_type));
		$ccopy_special 	= trim(self::getCredits2CopySpecial($es_id,$es_mediaType_id));


		// get credits 2 view

		$singlePattern = "[°!!§$%]";


		$ccopy_norm_replace 	= str_replace("/",$singlePattern,$ccopy_norm);
		$ccopy_special_replace  = str_replace("/",$singlePattern,$ccopy_special);

		$data_contacttypes = dbx::queryAll("select * from a_contact_type");

		$search = array();
		$replace = array();

		foreach ($data_contacttypes as $k => $v) {

			if($v['act_symbol_char'] != '')
			{
				if (trim($v['act_symbol_char']) == "/") $v['act_symbol_char'] = $singlePattern;

				$search[]		= str_replace("/",$singlePattern,$v['act_symbol_char']);
				$replace[]		= '<img src="/archive_template/img/icons/nodot/credit_'.$v['act_id'].'.png">';
			}
		}

		$ccopy_norm_html 	= str_replace("/", $singlePattern, $ccopy_norm);
		$ccopy_norm_special = str_replace("/", $singlePattern, $ccopy_special_replace);

		$ccopy_norm_html 	= str_replace($search, $replace, $ccopy_norm_html);
		$ccopy_norm_special = str_replace($search, $replace, $ccopy_norm_special);






		//frontcontrollerx::json_debug(array($ccopy_norm,$search,$replace));

		switch($submission['es_of_the_week'])
		{
			case '1': // AD
			$adofweek = dbx::queryAttribute("select CONCAT(esotw_date,' | ',esotw_id) as tellme from e_spots_of_the_week where esotw_printSubmission_id = $es_id","tellme");
			$submission['es_of_the_week'] = $adofweek;
			break;
			case '2': // SPOT
			$adofweek = dbx::queryAttribute("select CONCAT(esotw_date,' | ',esotw_id) as tellme from e_spots_of_the_week where esotw_spotSubmission_id = $es_id","tellme");
			$submission['es_of_the_week'] = $adofweek;
			break;
			case '3': // CLASSIC
			$adofweek = dbx::queryAttribute("select CONCAT(esotw_date,' | ',esotw_id) as tellme from e_spots_of_the_week where esotw_classicSubmission_id = $es_id","tellme");
			$submission['es_of_the_week'] = $adofweek;
			break;
			case '0':
			default:
				$submission['es_of_the_week'] = "NO";
				break;

		}



		$data = array(

		ccopy_norm 			=> $ccopy_norm,
		ccopy_special		=> $ccopy_special,
		ccopy_special_html	=> $ccopy_special_html,
		ccopy_norm_html 	=> $ccopy_norm_html,


		es_magazine_id	=> $es_magazine_id,
		em_type			=> $em_type,
		creditsInput	=> $creditsInput,
		es_id			=> $es_id,
		submission 		=> $submission,
		credits			=> $credits,
		xcredits		=> $xcredits,
		creditsOld		=> $creditsOld,
		xcreditsOld		=> $xcreditsOld,

		/*
		backupCreditsAndXCredits => $backupCreditsAndXCredits,
		_credits => $_credits,
		_xcredits => $_xcredits,
		*/

		);

		frontcontrollerx::json_success($data);
	}


	public static function search_credits()
	{
		$type 		= intval($_REQUEST['type']);
		$q 			= trim(dbx::escape($_REQUEST['q']));
		$q_backup	= trim(dbx::escape($_REQUEST['q']));

		if ($q == "")
		{
			die("[]");
		}

		switch ($type)
		{
			case 7: 	// client
			case 2: 	// agency
			case 12: 	// institute
			case 6: 	// production company

			$q = explode(" ",$q);
			$where = array();
			foreach ($q as $_q)
			{
				$where[] = " ec_company LIKE \"%$_q%\" ";
			}

			if (is_numeric($q_backup))
			{
				$t = intval($q_backup);
				$where = array();
				$where[] = " ( ec_id = $t ) ";
			}


			$where = implode(" AND ",$where);
			$results = dbx::queryAll("
			select 
			concat(ec_company,' [',ec_id,'] , ',ec_city,' ',ac_name) as name, ec_id as id 
			from e_contacts,a_country
			WHERE ($where)  and ec_duplicate = 0 and ec_country_id = ac_id and ec_type = 0
			");

			/*

			Illustrtaor = ?

			$results = dbx::queryAll("
			select
			concat(ec_company,' [',ec_id,'] , ',ec_city,' ',ac_name) as name, ec_id as id
			from e_contacts,a_country
			WHERE ($where)  and ec_duplicate = 0 and ec_country_id = ac_id and ec_type = 0
			");
			*/

			break;
			default: // persons

			$OR = "";
			$q = explode(" ",$q);
			$where = array();
			foreach ($q as $_q)
			{
				$where[] = " ( ec_firstname LIKE \"%$_q%\" OR ec_lastname LIKE \"%$_q%\" OR ec_company LIKE \"%$_q%\" ) ";
			}

			if (is_numeric($q_backup))
			{
				$t = intval($q_backup);
				$where = array();
				$where[] = " ( ec_id = $t ) ";
			}

			$where = implode(" AND ",$where);
			$results = dbx::queryAll("
			select 
			concat(ec_firstname,' ',ec_lastname,' [',ec_id,'] (',ec_company,') , ',ec_city,' ',ac_name) as name, ec_id as id 
			from e_contacts,a_country
			WHERE (($where))   and ec_duplicate = 0 and ec_country_id = ac_id 
			");

			/*

			elsa sagt: alle

			$results = dbx::queryAll("
			select
			concat(ec_firstname,' ',ec_lastname,' [',ec_id,'] (',ec_company,') , ',ec_city,' ',ac_name) as name, ec_id as id
			from e_contacts,a_country
			WHERE ($where)   and ec_duplicate = 0 and ec_country_id = ac_id  and ec_type = 1
			");
			*/


		}

		if ($results === false) $results = array();
		echo json_encode($results);
		die();
	}

	public static function getById($es_id)
	{
		return dbx::query("select * from e_submissions where es_id = $es_id");
	}

	public static function getMediaTypeOfsubmissionById($es_id)
	{
		$s = self::getById($es_id);
		if ($s === false) return false;
		return intval($s['es_mediaType_id']);
	}

	public static function img_small($param_0,$die=true)
	{
		$es_id = intval($param_0);
		$submission = self::getById($es_id);

		if ($submission === false) {
			die('SUBMISSION_NOT_FOUND');
		}

		$mediaType = self::getMediaTypeOfsubmissionById($es_id);

		if ($mediaType == 0)
		{
			$mediaType = 1;
		}


		if ($mediaType == 0)
		{
			//die('MEDIA_TYPE_ZERO');
			$s_id = self::$image_submission_media_type_invalid;

		} else {

			if ($mediaType == 1) // IMAGE
			{
				$s_id = $submission['es_image_s_id'];
			}

			if ($mediaType == 2) // VIDEO
			{
				$s_id = $submission['es_video_poster_s_id'];

				/*
				if ($submission['es_video_poster_original_or_thumb'] == 'THUMB') {
				$s_id = $submission['es_video_poster_s_id'];
				}
				*/
			}
		}

		$s_id = intval($s_id);

		if ($s_id == 0)
		{
			$s_id = self::$image_submission_s_id_zero;
		}

		$s_onDisk = dbx::queryAttribute("select s_onDisk from storage where s_id = $s_id","s_onDisk");
		list($width, $height, $type, $attr) = getimagesize($s_onDisk);

		if ($width == 0)
		{
			if (!imagesx::isValidImage($s_onDisk))
			{
				$s_id = self::$image_submission_submitted_media_type_invalid;
			}
		}

		$ext = 'png';

		$ext = pathinfo($s_onDisk, PATHINFO_EXTENSION);


		$img = xredaktor_storage::xr_img2(array(
		s_id 		=> $s_id,
		w 			=> 200,
		h 			=> 200,
		q 			=> 85,
		fullpath 	=> 'Y',
		rmode		=> 'strict',
		ext			=> $ext,
		));

		if (!$die) return ;

		$fullPath = $img['src'];
		imagesx::readfile_if_modified($fullPath,array('Content-Type: image/'.$ext));
		die();
	}

	public static function img_medium($param_0,$die=true)
	{
		$es_id = intval($param_0);
		$submission = self::getById($es_id);

		if ($submission === false) {
			die('SUBMISSION_NOT_FOUND');
		}

		$mediaType = self::getMediaTypeOfsubmissionById($es_id);

		if ($mediaType == 0)
		{
			$mediaType = 1;
		}


		if ($mediaType == 0)
		{
			//die('MEDIA_TYPE_ZERO');
			$s_id = self::$image_submission_media_type_invalid;

		} else {

			if ($mediaType == 1) // IMAGE
			{
				$s_id = $submission['es_image_s_id'];
			}

			if ($mediaType == 2) // VIDEO
			{
				$s_id = $submission['es_video_poster_s_id'];

				/*
				if ($submission['es_video_poster_original_or_thumb'] == 'THUMB') {
				$s_id = $submission['es_video_poster_s_id'];
				}
				*/

			}
		}

		$s_id = intval($s_id);

		if ($s_id == 0)
		{
			$s_id = self::$image_submission_s_id_zero;
		}

		$s_onDisk = dbx::queryAttribute("select s_onDisk from storage where s_id = $s_id","s_onDisk");
		list($width, $height, $type, $attr) = getimagesize($s_onDisk);

		if ($width == 0)
		{
			if (!imagesx::isValidImage($s_onDisk))
			{

				//die("no valid image");

				$s_id = self::$image_submission_submitted_media_type_invalid;
			}
		}

		$ext = 'png';

		$ext = pathinfo($s_onDisk, PATHINFO_EXTENSION);

		$img = xredaktor_storage::xr_img2(array(
		s_id 		=> $s_id,
		w 			=> 400,
		h 			=> 400,
		q 			=> 85,
		fullpath 	=> 'Y',
		rmode		=> 'strict',
		ext			=> $ext,
		));

		if (!$die) return ;

		$fullPath = $img['src'];
		imagesx::readfile_if_modified($fullPath,array('Content-Type: image/'.$ext));
		die();
	}


	public static function img_orig($param_0)
	{
		$es_id = intval($param_0);
		$submission = self::getById($es_id);

		if ($submission === false) {
			die('SUBMISSION_NOT_FOUND');
		}

		$mediaType = self::getMediaTypeOfsubmissionById($es_id);


		if ($mediaType == 0)
		{
			$mediaType = 1;
		}


		if ($mediaType == 0)
		{
			die('MEDIA_TYPE_ZERO');
		} else {

			if ($mediaType == 1) // IMAGE
			{
				$s_id = $submission['es_image_s_id'];
			}

			if ($mediaType == 2) // VIDEO
			{
				die('SUBMISSION IS A VIDEO');
			}
		}

		$s_id = intval($s_id);

		if ($s_id == 0)
		{
			$s_id = self::$image_submission_s_id_zero;
		}

		$full 	= xredaktor_storage::getById($s_id,true);
		$webSrc = $full['webSrc'];

		header("Location: $webSrc");


		die();
	}


	public static function grid_day_overview()
	{

		$sql_data = "SELECT

						es_created_date as dayx,
						count(`es_id`) as total_submissions,
						count(distinct(`es_submittedBy`)) as total_submitter,
						
						sum(`es_submission_type`=12) as total_tv,
						(select count(distinct(`es_submittedBy`)) as total_submitter from e_submissions where `es_submission_type`=12 and es_created_date = dayx) as total_tv_submitter,
						
						
						sum(`es_submission_type`=1) as total_print,
						(select count(distinct(`es_submittedBy`)) as total_submitter from e_submissions where `es_submission_type`=1 and 
						es_created_date = dayx) as total_print_submitter,
						
						sum(`es_submission_type`<12 and es_submission_type >1) as total_specials,
						(select count(distinct(`es_submittedBy`)) as total_submitter from e_submissions where `es_submission_type`<12 and es_submission_type >1 and es_created_date = dayx) as total_specials_submitter,
						
						(select count(*) as total_submitter from e_submissions_students where ess_created_date = dayx) as total_students,
						(select count(distinct(`ess_submittedBy`)) as total_submitter from e_submissions_students where ess_created_date = dayx) as total_students_submitter
						
						FROM `e_submissions` WHERE 1
						
						group by `dayx`
						ORDER BY `dayx`  DESC";

		$sql_cnt = "SELECT count(distinct(es_id)) as sql_cnt FROM `e_submissions` WHERE 1";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

		die();
	}

	public static function grid_load()
	{
		$where = array();


		###########################################################   DAY
		if (isset($_REQUEST['dayx']))
		{
			$day_x = $_REQUEST['dayx'];
			$where[] = " es_created_date = '$day_x' ";
		}

		if (isset($_REQUEST['es_submission_type']))
		{
			$es_submission_type = intval($_REQUEST['es_submission_type']);
			$where[] = " es_submission_type = $es_submission_type ";
		}

		if (count($where)>0)
		{
			$where = implode(" AND ",$where);
		} else {
			$where = "";
		}

		/*
		(select count(esc_id) from e_submissions_credits where esc_submission_id  = es_id ) as es_credits_total,
		(select count(esxts_id) from e_submissions_xcredits_to_submissions where esxts_submission_id = es_id and esxts_contact_id > 0) as es_xcredits_total,
		(select count(esxts_id) from e_submissions_xcredits_to_submissions where esxts_submission_id  = es_id and esxts_contact_id = -1) as es_credits_none_total,

		*/

		$sql_data = "SELECT *,
		
			(select count(esc_id) from e_submissions_credits where esc_submission_id  = es_id ) as es_credits_total,
			(select count(esxts_id) from e_submissions_xcredits_to_submissions where esxts_submission_id = es_id and esxts_contact_id > 0) as es_xcredits_total,
			(select count(esxts_id) from e_submissions_xcredits_to_submissions where esxts_submission_id  = es_id and esxts_contact_id = -2) as es_credits_donotknow_total

						FROM `e_submissions`, `a_shop_country` WHERE es_country_id = asc_id and $where
						
						ORDER BY `es_id`  DESC";

		$sql_cnt = "SELECT count(distinct(es_id)) as sql_cnt FROM `e_submissions` WHERE $where";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

		die();
	}

	public static function grid_load_extra()
	{
		$where = array();


		###########################################################   DAY
		if (isset($_REQUEST['dayx']))
		{
			$day_x = $_REQUEST['dayx'];
			$where[] = " es_created_date = '$day_x' ";
		}
		if (count($where)>0)
		{
			$where = implode(" AND ",$where);
		}

		$sql_data = "SELECT es_submission_type, emt_name, count(es_id) as es_cnt_total, sum(es_state=4) as es_cnt_pre
						FROM `e_submissions`,e_magazine_type WHERE emt_id = es_submission_type and $where 
						group by es_submission_type
						ORDER BY `es_id`  DESC";

		$sql_cnt = "SELECT count(distinct(es_id)) as sql_cnt FROM `e_submissions` WHERE $where";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

		die();
	}


}
