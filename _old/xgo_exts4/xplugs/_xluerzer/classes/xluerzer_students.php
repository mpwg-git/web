<?

class xluerzer_students
{

	public static $image_submission_media_type_invalid 				= 903387;
	public static $image_submission_submitted_media_type_invalid 	= 903388;
	public static $image_submission_s_id_zero						= 903389;


	public static function defaultAjaxHandler($function,$param_0)
	{
		switch ($function)
		{
			case 'copySubmissionCampaignCredits':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::copySubmissionCampaignCredits();
				break;
			case 'bulkChange':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::bulkChange();
				break;
			case 'createEmpty':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::createEmpty();
				break;
			case 'resendStudentsSubmissionMail':
				xluerzer_user::liveSecurityCheckByTag('SUBMISSIONS');
				self::resendSubmissionMail($param_0);
				break;
			case 'resendStudentsSubmissionMailNow':
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
			case 'search':
				self::search(false);
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
			case 'loadCountriesShop':
				self::loadCountriesShop();
				break;
			case 'loadCategories':
				self::loadCategories();
				break;
			case 'loadMagazines':
				self::loadMagazines();
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

	public static function copySubmissionCampaignCredits()
	{
		$ess_id 		= intval($_REQUEST['ess_id']);
		$from_ess_id 	= intval($_REQUEST['from_ess_id']);

		if ($ess_id == $from_ess_id)
		{
			frontcontrollerx::json_failure("Origin and destination submission is equal.");
		}

		$dest 	= dbx::query("select * from e_submissions_students where ess_id = $ess_id");
		$orgin 	= dbx::query("select * from e_submissions_students where ess_id = $from_ess_id");

		if ($dest === false)
		{
			frontcontrollerx::json_failure("Destination submission not present");
		}
		if ($orgin === false)
		{
			frontcontrollerx::json_failure("Origin submission not present");
		}

		dbx::update('e_submissions_students',array('ess_campaign_admin'=>$orgin['ess_campaign_admin']),array('ess_id'=>$ess_id));


		$e_submissions_students_credits = dbx::queryAll("select * from e_submissions_students_credits where essc_submission_id = $from_ess_id");
		dbx::query("delete from e_submissions_students_credits where essc_submission_id = $ess_id ");
		
		foreach ($e_submissions_students_credits as $inject)
		{
			$inject['essc_submission_id'] = $ess_id;
			unset($inject['essc_id']);
			dbx::insert('e_submissions_students_credits',$inject);
		}
		
		xluerzer_log::pushLog('IMPORT_CREDITS_CAMPAIGN','e_submissions_students','ess_id',$ess_id,false,"Import from submission: $ess_id");
		
		frontcontrollerx::json_success();
	}

	public static function bulkChange()
	{
				
		
		$cfg = json_decode($_REQUEST['cfg'],true);
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
			
			$selector 	= " SELECT ess_id FROM ( ".str_replace("[GRID_FILTERS]","",$sql_data).") emilia ";
			$cnt 		= dbx::queryAttribute(str_replace("[GRID_FILTERS]","",$sql_cnt),"sql_cnt");

			if ($cnt > $LIMIT)
			{
				frontcontrollerx::json_failure("TOO MUCH SUBMISSIONS SELECTED: LIMIT $LIMIT");
			}
			
		}
		
		
		$type  = dbx::escape($cfg['type']);
		$value = dbx::escape($cfg['values'][$type]);




		if (dbx::attributePresent('e_submissions_students',$type))
		{
			
		
			if (($type == 'ess_state') and ($value == 10 || $value == 9))
			{
				frontcontrollerx::json_failure("ERROR: Cannot publish/unpublish submissions via bulk.");
			}
			
			if ($type == 'ess_state')
			{
				$sql = "update e_submissions_students set $type = '$value' where ess_state NOT IN (9) and ess_id IN (".implode(',',$cleanIds).")";
			} 
			elseif($type == 'ess_magazine_id')
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
					$extra_update = " , ess_submittedFor = '$emt_name' ";
				}
				
				$sql = "update e_submissions_students set $type = '$value' $extra_update where ess_id IN (".implode(',',$cleanIds).")";
			} 
			else {
				$sql = "update e_submissions_students set $type = '$value' where ess_id IN (".implode(',',$cleanIds).")";
			}
			
			if ($selector)
			{
				if ($type == 'ess_state')
				{
					$records = dbx::queryAll($selector,false);
					
					foreach ($records as $key => $rec) {
						$es_id = intval($rec['ess_id']);
						
						$sql = "update e_submissions_students set $type = '$value' where ess_state NOT IN (9) and ess_id = $es_id";
						dbx::query($sql);
					}
					
					//$sql = "update e_submissions set $type = '$value' where es_state NOT IN (9) and es_id IN ($selector)";
				} 
				elseif($type == 'ess_magazine_id')
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
						$extra_update = " , ess_submittedFor = '$emt_name' ";
					}		
					
					$records = dbx::queryAll($selector,false);
					
					foreach ($records as $key => $rec) {
						$es_id = intval($rec['es_id']);
						
						$sql = "update e_submissions_students set $type = '$value' $extra_update where ess_id = $es_id";
						dbx::query($sql);
					}
				}
				else 
				{
					$records = dbx::queryAll($selector,false);
					
					foreach ($records as $key => $rec) {
						$es_id = intval($rec['ess_id']);
						
						$sql = "update e_submissions_students set $type = '$value' where ess_id = $es_id";
						dbx::query($sql);
					}
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
		$ess_mediaType_id = intval($_REQUEST['ess_mediaType_id']);
		dbx::insert('e_submissions_students',array('ess_mediaType_id'=>$ess_mediaType_id));
		$ess_id = dbx::getLastInsertId();
		frontcontrollerx::json_success(array('ess_id'=>$ess_id));
	}

	public static function resendSubmissionMail($ess_id)
	{
		$ess_id = intval($ess_id);

		$submission = dbx::query("select * from e_submissions_students where ess_id = $ess_id");

		if($submission === false) $submission = array();

		$ess_state = intval($submission['ess_state']);

		switch ($ess_state) {
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

		if($template === false) $template = array();

		$subject = $template['amt_subject'];
		$body = $template['amt_body'];

		$replace = array(
		'###NAME###',
		'###SUBMISSIONID###'
		);

		$with = array(
		$submission['ess_submittedBy'],
		$ess_id
		);

		$subject = str_replace($replace, $with, $subject);
		$body = str_replace($replace, $with, $body);

		$body = xredaktor_xr_html::transformLinks($body);
		$to = $submission['ess_email'];

		$mail_subject	= $subject;
		$mail_to		= $to;
		$mail_bcc		= "webdev@gitgo.at";
		$mail_body		= $body;

		$d = array(

		'ess_id'=>$ess_id,

		'mail_subject'  => $mail_subject,
		'mail_to'		=> $mail_to,
		'mail_bcc'		=> $mail_bcc,
		'mail_body'		=> $mail_body,

		);

		frontcontrollerx::json_success($d);
	}

	public static function resendSubmissionMailNow($ess_id)
	{
		$data = json_decode($_REQUEST['data'], true);

		$mail_subject	= trim($data['mail_subject']);
		$mail_to		= trim($data['mail_to']);
		$mail_bcc		= trim($data['mail_bcc']);
		$mail_body		= $data['mail_body'];

		$mailReplacers  = array(
		'###SUBJECT###'				=> $mail_subject,
		'###CONTENT###'				=> $mail_body,
		'###EMAIL###'				=> $mail_to,
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
		'ess_id'=>$ess_id,
		);

		frontcontrollerx::json_success($d);
	}


	public static function uploadLowResVideo($ess_id)
	{
		$ess_id = intval($ess_id);
		if ($ess_id == 0) die();

		$validExtensions = array('mp4','mov','wmv','flv','mkv','m4v','mpg','mpeg','avi','divx');

		$ext = explode(".",basename($_FILES['file']['name']));
		$ext = array_pop($ext);

		if (!in_array($ext,$validExtensions))
		{
			frontcontrollerx::json_success(array('MSG'=>'INVALID FILE TYPE'));
			die();
		}

		$file 		= '/srv/www/www.luerzersarchive.net/web/archive/submissions/tv_commercials/lowres/'.date('Y').'/'.$ess_id.'.'.$ext;
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
			self::db_update(array('ess_video_s_id'=>$s_id),$ess_id,'uploadLowResVideo');
			frontcontrollerx::json_success(array('FILE'=>$s_id));
		} else {
			frontcontrollerx::json_success(array('MSG'=>'MOVE FILE FAILED'));
		}

		die();
	}
	
	public static function db_update($db,$ess_id,$human="")
	{
		$ess_id = intval($ess_id);
		$old = dbx::query("select * from e_submissions_students where ess_id = $ess_id");
		dbx::update('e_submissions_students',$db,array('ess_id'=>$ess_id));
		xluerzer_log::pushLog('UPDATE','e_submissions_students','ess_id',$ess_id,$old,$human);
	}
	

	public static function uploadLowResPrint($ess_id)
	{
		$ess_id = intval($ess_id);
		if ($ess_id == 0) die();

		$validExtensions = array('jpg','jpeg','bmp','png','gif','tif','pdf');

		$ext = explode(".",basename($_FILES['file']['name']));
		$ext = array_pop($ext);

		if (!in_array($ext,$validExtensions))
		{
			frontcontrollerx::json_success(array('MSG'=>'INVALID FILE TYPE'));
			die();
		}

		$file 		= '/srv/www/www.luerzersarchive.net/web/archive/submissions/print/lowres/'.date('Y').'/'.$ess_id.'.'.$ext;
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
			self::db_update(array('ess_image_s_id'=>$s_id),$ess_id,'uploadLowResPrint');
			frontcontrollerx::json_success(array('FILE'=>$s_id));
		} else {
			frontcontrollerx::json_success(array('MSG'=>'MOVE FILE FAILED'));
		}
	}

	public static function uploadHighResPrint($ess_id)
	{
		$ess_id = intval($ess_id);
		if ($ess_id == 0) die();

		$validExtensions = array('jpg','jpeg','bmp','png','gif','tif','pdf');

		$ext = explode(".",basename($_FILES['file']['name']));
		$ext = array_pop($ext);

		if (!in_array($ext,$validExtensions))
		{
			frontcontrollerx::json_success(array('MSG'=>'INVALID FILE TYPE'));
			die();
		}

		$file 		= '/srv/www/www.luerzersarchive.net/web/archive/submissions/print/highres/'.date('Y').'/'.$ess_id.'.'.$ext;
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
			dbx::update('e_submissions_students',array('ess_image_highRes_s_id'=>$s_id,'ess_image_highRes_modified'=>'NOW()','ess_image_highRes_created'=>'NOW()','ess_image_highRes_status'=>'PRESENT'),array('ess_id'=>$ess_id));
			frontcontrollerx::json_success(array('FILE'=>$s_id));
		} else {
			frontcontrollerx::json_success(array('MSG'=>'MOVE FILE FAILED'));
		}

	}
	public static function uploadHighResVideo($ess_id)
	{
		$ess_id = intval($ess_id);
		if ($ess_id == 0) die();

		$validExtensions = array('mp4','mov','wmv','flv','mkv','m4v','mpg','mpeg','avi','divx');

		$ext = explode(".",basename($_FILES['file']['name']));
		$ext = array_pop($ext);

		if (!in_array($ext,$validExtensions))
		{
			frontcontrollerx::json_success(array('MSG'=>'INVALID FILE TYPE'));
			die();
		}

		$file 		= '/srv/www/www.luerzersarchive.net/web/archive/submissions/tv_commercials/highres/'.date('Y').'/'.$ess_id.'.'.$ext;
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
			dbx::update('e_submissions_students',array('ess_video_highRes_s_id'=>$s_id),array('ess_id'=>$ess_id));
			frontcontrollerx::json_success(array('FILE'=>$s_id));
		} else {
			frontcontrollerx::json_success(array('MSG'=>'MOVE FILE FAILED'));
		}

		die();

	}

	public static function encodeVideo($ess_id)
	{
		$ess_id = intval($ess_id);
		$s = dbx::query("select * from e_submissions_students where ess_id = $ess_id");
		if ($s === false) die('no valid submission');


		$vid_encoder = dbx::query("select * from vid_encoder where ve_ess_id = $ess_id");

		$ess_video_s_id 		= intval($s['ess_video_s_id']);
		$ess_video_high_s_id = intval($s['ess_video_highRes_s_id']);


		if (($ess_video_high_s_id != 0 || $ess_video_s_id != 0))
		{
			if ($vid_encoder !== false) {
				dbx::update('vid_encoder',array('ve_state'=>'ABORT_BY_USER'),array('ve_ess_id'=>$ess_id));
			}

			require_once("/srv/www/www.luerzersarchive.net/web/datamigration/_includes.php");
			$ve_id = video_encoder2::encodeSubmission($ess_id);

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

				dbx::update('e_submissions_students',array('ess_video_encoded'=>0),array('ess_id'=>$ess_id));

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

	public static function downloadSubmission($ess_id)
	{
		$ess_id = intval($ess_id);
		$s = dbx::query("select * from e_submissions_students where ess_id = $ess_id");
		if ($s === false) die('no valid submission');

		$ess_mediaType_id = $s['ess_mediaType_id'];

		switch ($ess_mediaType_id)
		{
			case 1:
				$s_id = $s['ess_image_s_id'];
				break;
			case 2:
				$s_id = $s['ess_video_s_id'];
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

	public static function downloadSubmissionHighRes($ess_id)
	{
		$ess_id = intval($ess_id);

		$s = dbx::query("select * from e_submissions_students where ess_id = $ess_id");
		if ($s === false) die('no valid submission');

		$ess_mediaType_id = $s['ess_mediaType_id'];

		switch ($ess_mediaType_id)
		{
			case 1:
				$s_id = $s['ess_image_highRes_s_id'];
				break;
			case 2:
				$s_id = $s['ess_video_highRes_s_id'];
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

	public static function doDedaultFieldQuery($field,$query)
	{
		$field = dbx::escape($field);

		$sql_data 	= "select DISTINCT(`$field`) as _value, `$field` as _display from e_submissions_students where $field LIKE '%$query%'";
		$sql_cnt 	= "select count(DISTINCT(`$field`)) as sql_cnt from e_submissions_students where $field LIKE '%$query%'";

		xluerzer_db::uniqueDataGridWrapper(array(
		'db' 		=> Ixcore::DB_NAME,
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));
	}

	public static function searchCombo($field)
	{
		$query = trim(dbx2::escape($_REQUEST['query']));
		switch ($field)
		{

			case 'ess_firstname':
			case 'ess_lastname':
			case 'ess_city':
			case 'ess_company':
			case 'ess_agency':
			case 'ess_email':
			case 'ess_submittedFor':
			case 'ess_comments':
			case 'ess_notes':
			case 'ess_archivNr':

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
			$tmp[] = " $field LIKE '$queryFull' ";

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

		$where = array();
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
					list($crappppp,$stripped) = explode("_",$k);
					$extraTable = " , e_submissions_students_credits ";
					$where[] = " essc_submission_id = ess_id and essc_contact_id in($v) and essc_contactType_id = $stripped ";

					break;

				case 'created_from':
					if (trim($v)=="") break;
					$v = self::parseDate($v);
					$where[] = " ess_created_date >= '$v' ";
					break;
				case 'created_to':
					if (trim($v)=="") break;
					$v = self::parseDate($v);
					$where[] = " ess_created_date <= '$v' ";
					break;


					/// FIELDS - NOT LIKE

				case 'ess_mediaType_id':
				case 'ess_artwork':
				case 'ess_state':
				case 'ess_category_id':
				case 'ess_country_id':
				case 'ess_credits':
				case 'ess_id':
				case 'ess_magazine_id':
				case 'ess_firstname':
				case 'ess_lastname':
				case 'ess_city':
				case 'ess_company':
				case 'ess_agency':
				case 'ess_email':
				case 'ess_comments':
				case 'ess_notes':
				case 'ess_archivNr':
					$where[] = self::doDedaultFieldQuerySql($k,$v,false);
					break;

					/// FIELDS - LIKE ?
				case 'ess_lastname':
				case 'ess_firstname':
					$where[] = self::doDedaultFieldQuerySql($k,$v,false);
					break;

				case 'overall':

					/*	$where[] = self::doDedaultFieldQuerySql(array(
					'ess_company',
					'ess_lastname',
					'ess_firstname',
					'ess_email',
					),$v,true);
					*/

					if (trim($v) == "") break;

					if (is_numeric($v))
					{
						$where[] = " ess_id = $v ";
						continue;
					}


					list($p0,$p1) = explode(" ",$v,2);

					if (($p0 != "") && ($p1 != ""))
					{
						$where[] = " (
					(ess_firstname LIKE '%$p0%' AND ess_lastname LIKE '%$p1%' ) OR ( ess_firstname LIKE '%$p1%' AND ess_lastname LIKE '%$p0%' ) OR (ess_company LIKE '%$p0%') OR (ess_company LIKE '%$p1%') OR (ess_company LIKE '%$p1%$p0%') OR (ess_company LIKE '%$p0%$p1%')
					) ";

					} else {
						$where[] = " (
					(ess_firstname LIKE '%$p0%') OR ( ess_lastname LIKE '%$p0%') OR (ess_company LIKE '%$p0%') OR (ess_email LIKE '%$p0%') 
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
			$extraTable = " , e_submissions_students_credits ";
			$where[] = " essc_submission_id = es_id and essc_contact_id in($v) and essc_contactType_id = $stripped ";

		} else if (count($credits)>1)
		{

			$extraTable = " , e_submissions_students_credits ";
			$xwhere 	= array();

			foreach ($credits as $c)
			{
				list($k,$v) = $c;
				list($crappppp,$stripped) = explode("_",$k);
				$xwhere[] = "  essc_contact_id = $v and essc_contactType_id = $stripped ";
			}

			$where[] = " essc_submission_id = ess_id and essc_submission_id in (select essc_submission_id from e_submissions_students_credits where (".implode(' AND ',$xwhere).")) ";
		}


		if (($searchData['credit_universal'] != '')  && ($searchData['credit_scope'] != '')) // credit_universal + credit_scope
		{
			$extraTable 		= " , e_submissions_students_credits ";

			$credit_universal 	= dbx::escape($searchData['credit_universal']);
			$credit_scope 	= $searchData['credit_scope'];
			if (is_array($credit_scope))
			{
				$credit_scope = implode(",",$searchData['credit_scope']);
			}

			$where[] = " essc_submission_id = ess_id and essc_contactType_id IN ($credit_scope) and essc_contact_id IN (select ec_id from e_contacts where (ec_firstname LIKE '%$credit_universal%' OR ec_lastname LIKE '%$credit_universal%' OR ec_company LIKE '%$credit_universal%' ) ) ";

		}

		if (($searchData['credit_universal'] == '') && ($searchData['credit_scope'] != '')) // credit_scope
		{
			$extraTable 	= " , e_submissions_students_credits ";

			$credit_scope 	= $searchData['credit_scope'];
			if (is_array($credit_scope))
			{
				$credit_scope = implode(",",$searchData['credit_scope']);
			}

			$where[] = " essc_submission_id = ess_id and essc_contactType_id IN ($credit_scope) ";
		}


		if (($searchData['credit_universal'] != '') && ($searchData['credit_scope'] == '')) // credit_universal
		{
			$extraTable 		= " , e_submissions_students_credits ";
			$credit_universal 	= dbx::escape($searchData['credit_universal']);

			$where[] = " essc_submission_id = ess_id and essc_contact_id IN (select ec_id from e_contacts where (ec_firstname LIKE '%$credit_universal%' OR ec_lastname LIKE '%$credit_universal%' OR ec_company LIKE '%$credit_universal%' ) ) ";
		}
		


		if (isset($_REQUEST['filterCountry']))
		{
			$country_id = intval($_REQUEST['filterCountry']);
			$where[] = " ess_country_id = $country_id ";
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
			$sql_data = "SELECT asc_name, asc_id, ess_country_id, count(distinct(`ess_submittedBy`)) as total_submitter, count(ess_country_id) as total_submissions
		FROM `e_submissions_students`,a_shop_country $extraTable WHERE [GRID_FILTERS] asc_id = ess_country_id and $where
		GROUP BY ess_country_id
		order by asc_name
		";

			$sql_cnt = "SELECT count(ess_id) as cntx
		FROM `e_submissions_students`,a_shop_country $extraTable WHERE [GRID_FILTERS] asc_id = ess_country_id and $where
		GROUP BY ess_country_id
		";


			xluerzer_db::uniqueDataGridWrapper(array(
			'sql_data' 	=> $sql_data,
			'sql_cnt' 	=> $sql_cnt,
			));

		}

		/*
		{name:'ess_credits_total',					text:'Credits', 				type: 'string'},
		{name:'ess_xcredits_total',					text:'X-Credits', 			type: 'string'},
		{name:'ess_credits_none_total',				text:'Credits None', 			type: 'string'},


		(select count(essc_id) from e_submissions_students_credits where essc_submission_id  = ess_id ) as ess_credits_total,
		(select count(essxts_id) from e_submissions_students_xcredits_to_submissions where essxts_submission_id = ess_id and essxts_contact_id > 0) as ess_xcredits_total,
		(select count(essxts_id) from e_submissions_students_xcredits_to_submissions where essxts_submission_id  = ess_id and essxts_contact_id = -1) as ess_credits_none_total,

		*/

		$sql_data = "SELECT *,
		
			(select count(essxts_id) from e_submissions_students_xcredits_to_submissions where essxts_submission_id  = ess_id and essxts_contact_id = -2) as ess_credits_donotknow_total
		
		FROM `e_submissions_students` $extraTable WHERE [GRID_FILTERS] $where ORDER BY `ess_id` desc";
		$sql_cnt = "SELECT count(*) as sql_cnt FROM `e_submissions_students` $extraTable WHERE [GRID_FILTERS] $where ";

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


	public static function xcreditSavedPleasJoin()
	{
		$ess_id = intval($_REQUEST['ess_id']);
		$contact = xluerzer_contacts::getById($ess_id);
		$ess_contactType_id = intval($contact['ess_contactType_id']);

		if ($ess_contactType_id == 0) {
			//			frontcontrollerx::json_failure("ERROR: Contact $ess_id has no Credit Type - please fix this error. Assignment aborted.");
		}

		$essxc_id = intval($_REQUEST['essxc_id']);
		$esx = dbx::query("select * from e_submissions_students_xcredits_to_submissions where essxts_contact_id = $essxc_id");
		$essxc_submission_id = intval($esx['essxts_submission_id']);
		$ess_contactType_id = intval($esx['essxts_contactType_id']);


		$presentContact = dbx::query("select * from e_submissions_students_credits where essc_submission_id = $essxc_submission_id  and essc_contact_id = $ess_id");
		if ($presentContact !== false) {
			frontcontrollerx::json_failure("WARNING: Contact already assigned.");
		}

		$db2 = array(
		essc_checked 		=> 'OK',
		essc_submission_id	=> $essxc_submission_id,
		essc_contactType_id	=> $ess_contactType_id,
		essc_contact_id		=> $ess_id,
		essc_created_ts		=> 'NOW()',
		);
		dbx::insert('e_submissions_students_credits',$db2);
		$essc_id = dbx::getLastInsertId();

		frontcontrollerx::json_success(array('data'=>$data,'db'=>$db,'ess_id'=>$ess_id,'essc_id'=>$essc_id));
	}

	public static function submissionSave()
	{
		$ess_id 	= intval($_REQUEST['ess_id']);
		$data 	= json_decode($_REQUEST['data'],true);

		$db = array();
		foreach ($data as $k => $v)
		{
			if (!dbx::attributePresent('e_submissions_students',$k)) continue;
			$db[$k] = $v;
		}

		unset($db['ess_original_submitter_infos']);



		$oldData = dbx::query("select * from e_submissions_students where ess_id = $ess_id");
		dbx::update('e_submissions_students',$db,array('ess_id'=>$ess_id));
		xluerzer_log::pushLog('UPDATE','e_submissions_students','ess_id',$ess_id,$oldData);

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
		$ess_id 		= intval($_REQUEST['ess_id']);
		$credits 		= json_decode($_REQUEST['credits'],true);

		$sql = "delete from e_submissions_students_credits where essc_submission_id = $ess_id ";
		dbx::query($sql);

		$duplicates = array();
		

		foreach ($credits as $type => $_contacts)
		{
			$contacts = json_decode($_contacts,true);
			
			foreach ($contacts as $c)
			{
				$essc_id = intval($c[id]);
				
				$present = dbx::query("select * from e_submissions_students_credits where essc_submission_id = $ess_id and essc_contactType_id = $type and essc_contact_id = $essc_id");

				if ($present === false)
				{
					dbx::insert('e_submissions_students_credits',array(
					essc_checked 		=> 'OK',
					essc_submission_id	=> $ess_id,
					essc_contactType_id	=> $type,
					essc_contact_id		=> $essc_id,
					essc_created_ts		=> 'NOW()',
					));
				}
			}
		}

		frontcontrollerx::json_success();
	}

	public static function save_xcredit()
	{
		$essxc_id = intval($_REQUEST['essxc_id']);
		$data  = json_decode($_REQUEST['data'],true);

		$esx = dbx::query("select * from e_submissions_students_xcredits where essxc_id = $essxc_id");
		$essxc_submission_id = intval($esx['essxc_submission_id']);

		$mapper = array(
		essxc_city 			=> 'ess_city',
		essxc_company 		=> 'ess_company',
		essxc_contactType_id => 'ess_contactType_id',
		essxc_country_id 	=> 'ess_country_id',
		essxc_firstname 		=> 'ess_firstname',
		essxc_id 			=> 'ess_id',
		essxc_lastname 		=> 'ess_lastname',
		essxc_phone 			=> 'ess_phone',
		essxc_phone_code 	=> 'ess_phone_code',
		essxc_type 			=> 'ess_type',
		essxc_zip 			=> 'ess_zip',
		);

		$db = array();

		foreach ($mapper as $old => $new)
		{
			$db[$new] = $data[$old];
		}

		dbx::insert('e_contacts',$db);
		$ess_id = dbx::getLastInsertId();

		$essc_contactType_id = intval($db['ess_contactType_id']);


		$db2 = array(
		essc_checked 		=> 'OK',
		essc_submission_id	=> $essxc_submission_id,
		essc_contactType_id	=> $essc_contactType_id,
		essc_contact_id		=> $ess_id,
		essc_created_ts		=> 'NOW()',
		);

		dbx::insert('e_submissions_students_credits',$db2);
		$essc_id = dbx::getLastInsertId();

		frontcontrollerx::json_success(array('data'=>$data,'db'=>$db,'ess_id'=>$ess_id,'essc_id'=>$essc_id));
	}

	public static function load_xcredit()
	{
		$essxc_id = intval($_REQUEST['essxc_id']);
		$record = dbx::query("select * from e_submissions_students_xcredits where essxc_id = $essxc_id");
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
		$records[] = array('label'=>'not set','value'=>0);
		$records = array_merge($records,dbx::queryAll("select ac_name as label, ac_id as value from a_country order by ac_name"));
		frontcontrollerx::json_success(array('countries'=>$records));
	}

	public static function loadCountriesShop()
	{
		$records = array();
		$records[] = array('label'=>'not set','value'=>0);
		$records = array_merge($records,dbx::queryAll("select asc_name as label, asc_id as value from a_shop_country order by asc_name"));
		frontcontrollerx::json_success(array('countries'=>$records));
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



	public static function getSymbolForType($contact_type)
	{
		$contact_type = intval($contact_type);
		$d = dbx::query("select act_symbol_char from a_contact_type where act_id = $contact_type");
		if ($d === false) return "";
		return trim($d['act_symbol_char']);
	}

	public static function getTextForType($ess_id,$contact_type)
	{
		$contact_type = intval($contact_type);
		$ess_id = intval($ess_id);
		
		//$credits = dbx::queryAll("select * from e_submissions_students_credits,e_contacts where essc_submission_id = $ess_id and essc_contactType_id = $contact_type and essc_contact_id = ec_id");

		$sql = "select ec_id, ec_company, ec_firstname, ec_lastname, essc_submission_id, essc_contactType_id, essc_contact_id from e_submissions_students_credits,e_contacts where essc_submission_id = $ess_id and essc_contactType_id = $contact_type and essc_contact_id = ec_id
			 UNION 
			select essxc_id as ec_id, essxc_company as ec_company, essxc_firstname as ec_firstname, essxc_lastname as ec_lastname, essxts_submission_id, essxc_contactType_id, essxts_contact_id  from e_submissions_students_xcredits_to_submissions,e_submissions_students_xcredits where essxts_submission_id = $ess_id and essxts_contactType_id = $contact_type and essxts_contact_id = essxc_id and (essxts_contact_id != '-1' and essxts_contact_id != '-2') ";
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

	public static function getCredits2CopyNorm($ess_id,$ess_mediaType_id)
	{
		switch ($ess_mediaType_id)
		{
			case 1: // PRINT
			case 3:
			/*

			∆ JWT (J. Walter Thompson), Melbourne ‡ Christian Gosch ∏ Daniela Reichmann ∂ Fabian Ruetschi ≥ Nadav Kander ∞ Mario Wagner ∫ Alex Melik-Adamov / Patrick Salonen

			*/

			$ret = array();
			$ret[] = self::getTextForType($ess_id,2); 	// AD AGENCY
			$ret[] = self::getTextForType($ess_id,7); 	// CLIENT
			$ret[] = self::getTextForType($ess_id,16); 	// CREATIVE DIRECTOR
			$ret[] = self::getTextForType($ess_id,5); 	// ART DIRECTOR
			$ret[] = self::getTextForType($ess_id,3); 	// COPYWRITER
			$ret[] = self::getTextForType($ess_id,1); 	// PHOTOGRAPHER
			$ret[] = self::getTextForType($ess_id,4); 	// ILLUSTRATOR
			$ret[] = self::getTextForType($ess_id,12); 	// INSTITUTE
			$ret[] = self::getTextForType($ess_id,13); 	// typographer
			$ret[] = self::getTextForType($ess_id,14); 	// DIGITAL
			$ret[] = self::getTextForType($ess_id,15); 	// INSTRUCTOR
			return implode(" ",$ret);

			break;

			case 2: // VIDEO


			/*

			∆ DDB, Vancouver ‡ Dean Lee, Cosmo Campbell ∏ John Larigakis ∂ Neil Shapiro ± Soft Citizen ≤ Arni Thor Jonsson

			*/


			$ret = array();
			$ret[] = self::getTextForType($ess_id,2); 	// AD AGENCY
			$ret[] = self::getTextForType($ess_id,16); 	// CREATIVE DIRECTOR
			$ret[] = self::getTextForType($ess_id,5); 	// ART DIRECTOR
			$ret[] = self::getTextForType($ess_id,3); 	// COPYWRITER
			$ret[] = self::getTextForType($ess_id,6); 	// PRODUCTION COMPANY
			$ret[] = self::getTextForType($ess_id,8); 	// DIRECTOR
			$ret[] = self::getTextForType($ess_id,12); 	// INSTITUTE
			$ret[] = self::getTextForType($ess_id,15); 	// INSTRUCTORL
			return implode(" ",$ret);


			break;
			default: return ""; // STUDENTS NOTHING ...
		}
	}

	public static function getCredits2CopySpecial($ess_id,$ess_mediaType_id)
	{


		switch ($ess_mediaType_id)
		{
			case 1: // PRINT

			/*

			∞ Mario Wagner ∆ JWT (J. Walter Thompson), Melbourne ∏ Daniela Reichmann π Tiempo BBDO, Barcelona

			*/

			$ret = array();
			$ret[] = self::getTextForType($ess_id,4); 	// ILLUSTRTAOR
			$ret[] = self::getTextForType($ess_id,2); 	// AD AGENCY
			$ret[] = self::getTextForType($ess_id,5); 	// ART DIRECTOR
			$ret[] = self::getTextForType($ess_id,7); 	// CLIENT COMPANY
			return implode(" ",$ret);


			break;

			case 2: // VIDEO



			/*

			∞  ∆ DDB, Vancouver ∏ John Larigakis π Strategic Milk Alliance

			*/


			$ret = array();
			$ret[] = self::getTextForType($ess_id,4); 	// ILLUSTRTAOR
			$ret[] = self::getTextForType($ess_id,2); 	// AD AGENCY
			$ret[] = self::getTextForType($ess_id,5); 	// ART DIRECTOR
			$ret[] = self::getTextForType($ess_id,7); 	// CLIENT COMPANY
			return implode(" ",$ret);


			break;
			default: return ""; // STUDENTS NOTHING ...
		}
	}


	public static function loadData()
	{
		$ess_id = intval($_REQUEST['ess_id']);
		$delta = intval($_REQUEST['delta']);


		if ($delta != 0)
		{
			if ($delta < 0)
			{
				if ($delta == -1)
				{
					$submission = dbx::query("select * from e_submissions_students where ess_id < $ess_id order by ess_id desc LIMIT 1");
				} else {
					$submission = dbx::query("select * from e_submissions_students where ess_id < $ess_id and ess_state = 5 order by ess_id desc LIMIT 1");
				}

			} else {

				switch ($delta)
				{
					case 1:
						$submission = dbx::query("select * from e_submissions_students where ess_id > $ess_id order by ess_id asc limit 1");
						break;
					case 2:
						$submission = dbx::query("select * from e_submissions_students where ess_id > $ess_id and ess_state = 5 order by ess_id asc limit 1");
						break;
					default:
					case 3:
						$submission = dbx::query("select * from e_submissions_students where 1 order by ess_id desc limit 1");
						break;
				}
			}

			$ess_id = intval($submission['ess_id']);

		} else {
			$submission = dbx::query("select * from e_submissions_students where ess_id = $ess_id LIMIT 1");
		}

		################# CREDITS

		$_credits 	= dbx::queryAll("select * from e_submissions_students_credits,e_contacts where essc_submission_id = $ess_id and ec_id = essc_contact_id ");
		$credits 	= array();

		foreach ($_credits as $c)
		{
			$id = $c['essc_contactType_id'];
			$fieldName = "credits_".$id;

			if (!isset($credits[$fieldName])) $credits[$fieldName] = array();

			// TODO CHECK WER ER IST

			$tmp = array(
			id 		=> $c['ec_id'],
			name 	=> trim($c['ec_company'].' '.$c['ec_firstname'].' '.$c['ec_lastname'].' ['.$c['ec_id'].']'), // ess_firstname	ess_lastname ess_company
			);

			$credits[$fieldName][] = $tmp;
		}

		for ($i=1;$i<=16;$i++)
		{
			$key = "credits_".$i;
			if (!isset($credits[$key])) $credits[$key] = array();
			$credits[$key] = json_encode($credits[$key]);
		}

		################# XCREDITS

		$_xcredits 	= dbx::queryAll("select * from e_submissions_students_xcredits,e_submissions_students_xcredits_to_submissions where essxts_submission_id = $ess_id and essxc_id = essxts_contact_id ");
		$xcredits 	= array();

		foreach ($_xcredits as $c)
		{
			$id = $c['essxts_contactType_id'];
			$fieldName = "xcredits_".$id;

			if (!isset($xcredits[$fieldName])) $xcredits[$fieldName] = array();

			// TODO CHECK WER ER IST

			$tmp = array(
			id 		=> $c['essxc_id'],
			name 	=> trim($c['essxc_company'].' '.$c['essxc_firstname'].' '.$c['essxc_lastname'].' ['.$c['essxc_id'].']'), // ess_firstname	ess_lastname ess_company
			);

			$xcredits[$fieldName][] = $tmp;
		}

		for ($i=1;$i<=16;$i++)
		{
			$key = "xcredits_".$i;
			if (!isset($xcredits[$key])) $xcredits[$key] = array();
			$xcredits[$key] = json_encode($xcredits[$key]);
		}

		################# BACKUP - CREDITS

		$backupCreditsAndXCredits = json_decode($submission['ess_original_submitter_credits'],true);

		$_credits 		= $backupCreditsAndXCredits['CREDITS'];
		$creditsOld 	= array();


		foreach ($_credits as $c)
		{
			$id = $c['essc_contactType_id'];
			$ec_id = intval($c['essc_contact_id']);

			$fieldName = "credits_".$id;
			if (!isset($creditsOld[$fieldName])) $creditsOld[$fieldName] = array();
			$c2 = dbx::query("select * from e_contacts where ec_id = $ec_id");

			$tmp = array(
			id 		=> $c2['ec_id'],
			name 	=> trim($c2['ec_company'].' '.$c2['ec_firstname'].' '.$c2['ec_lastname'].' ['.$c2['ec_id'].']'), // ess_firstname	ess_lastname ess_company
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
			$id = $c['essxts_contactType_id'];
			$essxc_id = intval($c['essxts_contact_id']);


			$fieldName = "xcredits_".$id;
			if (!isset($xcreditsOld[$fieldName])) $xcreditsOld[$fieldName] = array();
			$c2 = dbx::query("select * from e_submissions_students_xcredits where essxc_id = $essxc_id");

			// TODO CHECK WER ER IST

			$tmp = array(
			id 		=> $c2['essxc_id'],
			name 	=> trim($c2['essxc_company'].' '.$c2['essxc_firstname'].' '.$c2['essxc_lastname'].' ['.$c2['essxc_id'].']'), // ess_firstname	ess_lastname ess_company
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


		$ess_mediaType_id 	= intval($submission['ess_mediaType_id']);
		$ess_magazine_id 	= intval($submission['ess_magazine_id']);

		$magazin = dbx::query("select * from e_magazine where em_id = $ess_magazine_id");
		if ($magazin == false) $magazin = array();
		$em_type = intval($magazin['em_type']);

		switch ($em_type)
		{
			case 1:
				if ($ess_mediaType_id == 2) $em_type = 12;
				break;
			default: break;
		}
		
		$em_type=13; 

		$creditsInput = dbx::queryAll("select * from a_credits2mag,a_contact_type where c2m_m_id = $em_type and c2m_c_id = act_id and c2m_checked = 1 order by c2m_sort");


		$ccopy_norm 	= self::getCredits2CopyNorm($ess_id,$ess_mediaType_id);
		$ccopy_special 	= self::getCredits2CopySpecial($ess_id,$ess_mediaType_id);
		
		
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
		
		
		


		switch($submission['ess_of_the_week'])
		{
			case '1': // AD
			$adofweek = dbx::queryAttribute("select CONCAT(esotw_date,' | ',esotw_id) as tellme from e_spots_of_the_week where esotw_printSubmission_id = $ess_id","tellme");
			$submission['ess_of_the_week'] = $adofweek;
			break;
			case '2': // SPOT
			$adofweek = dbx::queryAttribute("select CONCAT(esotw_date,' | ',esotw_id) as tellme from e_spots_of_the_week where esotw_spotSubmission_id = $ess_id","tellme");
			$submission['ess_of_the_week'] = $adofweek;
			break;
			case '3': // CLASSIC
			$adofweek = dbx::queryAttribute("select CONCAT(esotw_date,' | ',esotw_id) as tellme from e_spots_of_the_week where esotw_classicSubmission_id = $ess_id","tellme");
			$submission['ess_of_the_week'] = $adofweek;
			break;
			case '0':
			default:
				$submission['ess_of_the_week'] = "NO";
				break;

		}


		$data = array(

		ccopy_norm 			=> $ccopy_norm,
		ccopy_special		=> $ccopy_special,
		ccopy_special_html	=> $ccopy_special_html,
		ccopy_norm_html 	=> $ccopy_norm_html,
		ess_magazine_id	=> $ess_magazine_id,
		em_type			=> $em_type,
		creditsInput	=> $creditsInput,
		ess_id			=> $ess_id,
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
			// companys


			$q = explode(" ",$q);
			$where = array();
			foreach ($q as $_q)
			{
				$where[] = " ec_company LIKE \"%$_q%\" ";
			}

			if (is_numeric($q_backup))
			{
				$t = intval($q_backup);
				$OR = " OR ( ec_id = $t ) ";
			}


			$where = implode(" AND ",$where);
			$results = dbx::queryAll("
			select 
			concat(ec_company,' [',ec_id,'] , ',ec_city,' ',ac_name) as name, ec_id as id 
			from e_contacts,a_country
			WHERE ($where) $OR and ec_duplicate = 0 and ec_country_id = ac_id  
			");

			break;
			default: // persons

			$q = explode(" ",$q);
			$where = array();
			foreach ($q as $_q)
			{
				$where[] = " ( ec_firstname LIKE \"%$_q%\" OR ec_lastname LIKE \"%$_q%\" OR ec_company LIKE \"%$_q%\" ) ";
			}

			if (is_numeric($q_backup))
			{
				$t = intval($q_backup);
				$OR = " OR ( ess_id = $t ) ";
			}

			$where = implode(" AND ",$where);
			$results = dbx::queryAll("
			select 
			concat(ec_firstname,' ',ec_lastname,' [',ec_id,'] (',ec_company,') , ',ec_city,' ',ac_name) as name, ec_id as id 
			from e_contacts,a_country
			WHERE ($where) $OR  and ec_duplicate = 0 and ec_country_id = ac_id  
			");



		}

		if ($results === false) $results = array();
		echo json_encode($results);
		die();
	}

	public static function getById($ess_id)
	{
		return dbx::query("select * from e_submissions_students where ess_id = $ess_id");
	}

	public static function getMediaTypeOfsubmissionById($ess_id)
	{
		$s = self::getById($ess_id);
		if ($s === false) return false;
		return intval($s['ess_mediaType_id']);
	}

	public static function img_small($param_0,$die=true)
	{
		$ess_id = intval($param_0);
		$submission = self::getById($ess_id);

		if ($submission === false) {
			die('SUBMISSION_NOT_FOUND');
		}

		$mediaType = self::getMediaTypeOfsubmissionById($ess_id);

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
				$s_id = $submission['ess_image_s_id'];
			}

			if ($mediaType == 2) // VIDEO
			{
				$s_id = $submission['ess_video_poster_s_id'];

				/*
				if ($submission['ess_video_poster_original_or_thumb'] == 'THUMB') {
				$s_id = $submission['ess_video_poster_s_id'];
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
		$ess_id = intval($param_0);
		$submission = self::getById($ess_id);

		if ($submission === false) {
			die('SUBMISSION_NOT_FOUND');
		}

		$mediaType = self::getMediaTypeOfsubmissionById($ess_id);

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
				$s_id = $submission['ess_image_s_id'];
			}

			if ($mediaType == 2) // VIDEO
			{
				$s_id = $submission['ess_video_poster_s_id'];

				/*
				if ($submission['ess_video_poster_original_or_thumb'] == 'THUMB') {
				$s_id = $submission['ess_video_poster_s_id'];
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
			//$s_id = self::$image_submission_submitted_media_type_invalid;
		}
		
		
		if ($width == 0)
		{
			if (!imagesx::isValidImage($s_onDisk))
			{

				//die("no valid image");

				$s_id = self::$image_submission_submitted_media_type_invalid;
			}
		}

		

		$ext = 'png';

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
		$ess_id = intval($param_0);
		$submission = self::getById($ess_id);

		if ($submission === false) {
			die('SUBMISSION_NOT_FOUND');
		}

		$mediaType = self::getMediaTypeOfsubmissionById($ess_id);

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
				$s_id = $submission['ess_image_s_id'];
			}

			if ($mediaType == 2) // VIDEO
			{
				die('SUBMISSION IS A VIDEO');
			}
		}

		$s_id = intval($s_id);

		if ($s_id == 0)
		{
			die('NO IMAGE');
		}

		$full 	= xredaktor_storage::getById($s_id,true);
		$webSrc = $full['webSrc'];

		header("Location: $webSrc");


		die();
	}


	public static function grid_day_overview()
	{

		$sql_data = "SELECT

						ess_created_date as dayx,
						count(`ess_id`) as total_submissions,
						count(distinct(`ess_submittedBy`)) as total_submitter,
						
						sum(`ess_submittedFor`='Commercials') as total_tv,
						(select count(distinct(`ess_submittedBy`)) as total_submitter from e_submissions_students where `ess_submittedFor`='Commercials' and ess_created_date = dayx) as total_tv_submitter,
						
						
						sum(`ess_submittedFor`='Magazine') as total_print,
						(select count(distinct(`ess_submittedBy`)) as total_submitter from e_submissions_students where `ess_submittedFor`='Magazine' and 
						ess_created_date = dayx) as total_print_submitter,
						
						sum(`ess_submittedFor`='Specials') as total_specials,
						(select count(distinct(`ess_submittedBy`)) as total_submitter from e_submissions_students where `ess_submittedFor`='Specials' and ess_created_date = dayx) as total_specials_submitter,
						
						(select count(*) as total_submitter from e_submissions_students_students where ess_created_date = dayx) as total_students,
						(select count(distinct(`ess_submittedBy`)) as total_submitter from e_submissions_students_students where ess_created_date = dayx) as total_students_submitter
						
						FROM `e_submissions_students` WHERE 1
						
						group by `dayx`
						ORDER BY `dayx`  DESC";

		$sql_cnt = "SELECT count(distinct(ess_id)) as sql_cnt FROM `e_submissions_students` WHERE 1";

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
			$where[] = " ess_created_date = '$day_x' ";
		}

		if (isset($_REQUEST['ess_submission_type']))
		{
			$ess_submission_type = intval($_REQUEST['ess_submission_type']);
			$where[] = " ess_submission_type = $ess_submission_type ";
		}

		if (count($where)>0)
		{
			$where = implode(" AND ",$where);
		} else {
			$where = "";
		}

		/*
		(select count(essc_id) from e_submissions_students_credits where essc_submission_id  = ess_id ) as ess_credits_total,
		(select count(essxts_id) from e_submissions_students_xcredits_to_submissions where essxts_submission_id = ess_id and essxts_contact_id > 0) as ess_xcredits_total,
		(select count(essxts_id) from e_submissions_students_xcredits_to_submissions where essxts_submission_id  = ess_id and essxts_contact_id = -1) as ess_credits_none_total,

		*/

		$sql_data = "SELECT *,
		
			(select count(essxts_id) from e_submissions_students_xcredits_to_submissions where essxts_submission_id  = ess_id and essxts_contact_id = -2) as ess_credits_donotknow_total

						FROM `e_submissions_students` WHERE $where
						
						ORDER BY `ess_id`  DESC";

		$sql_cnt = "SELECT count(distinct(ess_id)) as sql_cnt FROM `e_submissions_students` WHERE $where";

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
			$where[] = " ess_created_date = '$day_x' ";
		}
		if (count($where)>0)
		{
			$where = implode(" AND ",$where);
		}

		$sql_data = "SELECT ess_submission_type, emt_name, count(ess_id) as ess_cnt_total, sum(ess_state=4) as ess_cnt_pre
						FROM `e_submissions_students`,e_magazine_type WHERE emt_id = ess_submission_type and $where 
						group by ess_submission_type
						ORDER BY `ess_id`  DESC";

		$sql_cnt = "SELECT count(distinct(ess_id)) as sql_cnt FROM `e_submissions_students` WHERE $where";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

		die();
	}


}
