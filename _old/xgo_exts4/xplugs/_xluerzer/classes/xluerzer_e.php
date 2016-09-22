<?

class xluerzer_e
{
	public static function defaultAjaxHandler($scope, $function)
	{
		switch ($scope)
		{
			case 'e_app_getById':
				self::app_getById();
				break;
			case 'e_web_getById':
				self::web_getById();
				break;
			case 'e_interview_getById':
				self::interview_getById();
				break;
			case 'e_dinterviewx_getById':
				self::digital_interview_getById();
				break;
			case 'e_credits_save':
				xluerzer_user::liveSecurityCheckByTag('EDITORAL');
				self::e_credits_save();
				break;
			case 'e_data_load':
				self::data_load();
				break;
			case 'e_data_save':
				xluerzer_user::liveSecurityCheckByTag('EDITORAL');
				self::data_save();
				break;
			case 'e_students_winner':
				xluerzer_user::liveSecurityCheckByTag('EDITORAL');
				self::handle_esw($function);
				break;
			case  'e_digitals':
				xluerzer_user::liveSecurityCheckByTag('EDITORAL');
				self::handle_digitals($function);
				break;
			case  'e_digital_web':
				xluerzer_user::liveSecurityCheckByTag('EDITORAL');
				self::handle_digital_web($function);
				break;
			case  'e_digital_app':
				xluerzer_user::liveSecurityCheckByTag('EDITORAL');
				self::handle_digital_app($function);
				break;
			case  'e_interviews':
				xluerzer_user::liveSecurityCheckByTag('EDITORAL');
				self::handle_interviews($function);
				break;
			case  'e_digitalInterviews':
				xluerzer_user::liveSecurityCheckByTag('EDITORAL');
				self::handle_digitalInterviews($function);
				break;
			case  'e_magazines':
				//xluerzer_user::liveSecurityCheckByTag('EDITORAL');
				xluerzer_user::liveSecurityCheckByTag('CRM-PUBLISH-MEDIA');
				self::handle_magazines($function);
				break;
			case  'e_reminder':
				self::handle_reminder($function);
				break;
			case  'e_reminder_by_user_id':
				self::handle_reminder_by_user_id($function);
				break;	
			case  'e_reminder_data':
				self::handle_data_reminder($function);
				break;
			case  'e_media':
				//xluerzer_user::liveSecurityCheckByTag('EDITORAL');
				xluerzer_user::liveSecurityCheckByTag('CRM-PUBLISH-MEDIA');
				self::handle_media($function);
				break;
			case 'e_submissionOfTheDayX':
				self::showSubmissionsOfDayX();
				break;
			case  'oe_log':
				xluerzer_oe::handle_log($function);
				break;
			default:
				return false;
		}

		die('xxx'.$scope);
	}

	public static function web_getById()
	{
		$id = intval($_REQUEST['id']);
		$db = dbx::query("select * from e_digital_web where edw_id = $id");
		frontcontrollerx::json_success(array('data'=>$db));
	}
	public static function app_getById()
	{
		$id = intval($_REQUEST['id']);
		$db = dbx::query("select * from e_digital_app where eda_id = $id");
		frontcontrollerx::json_success(array('data'=>$db));
	}
	public static function interview_getById()
	{
		$id = intval($_REQUEST['id']);
		$db = dbx::query("select * from e_interviews where ei_id = $id");
		frontcontrollerx::json_success(array('data'=>$db));
	}

	public static function digital_interview_getById()
	{
		$id = intval($_REQUEST['id']);
		$db = dbx::query("select * from e_digital_interviews where edi_id = $id");
		frontcontrollerx::json_success(array('data'=>$db));
	}

	public static function e_credits_save()
	{
		$id			= intval($_REQUEST['id']);
		$credits 	= json_decode($_REQUEST['credits'],true);
		$scopex 	= trim($_REQUEST['scopex']);


		switch ($scopex)
		{
			case  'e_digital_web':


				$sql = "delete from e_digital_web_credits where edwc_digital_web_id = $id ";
				dbx::query($sql);

				$duplicates = array();

				$log = array();

				foreach ($credits as $type => $_contacts)
				{
					$contacts = json_decode($_contacts,true);
					foreach ($contacts as $c)
					{
						$ec_id = intval($c[id]);

						if (!isset($log['credits_'.$type]))
						{
							$log['credits_'.$type] = array('new'=>$ec_id,'old'=>'-');
						} else {
							$log['credits_'.$type] = array('new'=>$log['credits_'.$type]['new'].','.$ec_id,'old'=>'-');
						}

						$present = dbx::query("select * from  e_digital_web_credits where edwc_digital_web_id = $id and edwc_contactType_id = $type and edwc_contact_id = $ec_id");
						if ($present === false)
						{
							dbx::insert('e_digital_web_credits',array(
							edwc_digital_web_id	=> $id,
							edwc_contactType_id	=> $type,
							edwc_contact_id		=> $ec_id,
							edwc_created_ts		=> 'NOW()',
							));
						}
					}
				}

				xluerzer_log::pushLog('CREDITS','e_digital_web','edw_id',$id,false,print_r($log,true));


				break;
			case  'e_digital_app':





				$sql = "delete from e_digital_app_credits where edac_digital_app_id = $id ";
				dbx::query($sql);

				$duplicates = array();

				$log = array();

				foreach ($credits as $type => $_contacts)
				{
					$contacts = json_decode($_contacts,true);
					foreach ($contacts as $c)
					{
						$ec_id = intval($c[id]);

						if (!isset($log['credits_'.$type]))
						{
							$log['credits_'.$type] = array('new'=>$ec_id,'old'=>'-');
						} else {
							$log['credits_'.$type] = array('new'=>$log['credits_'.$type]['new'].','.$ec_id,'old'=>'-');
						}

						$present = dbx::query("select * from  e_digital_app_credits where edac_digital_app_id = $id and edac_contactType_id = $type and edac_contact_id = $ec_id");

						if ($present === false)
						{
							dbx::insert('e_digital_app_credits',array(
							edac_digital_app_id	=> $id,
							edac_contactType_id	=> $type,
							edac_contact_id		=> $ec_id,
							edac_created_ts		=> 'NOW()',
							));
						}
					}
				}

				xluerzer_log::pushLog('CREDITS','e_digital_app','eda_id',$id,false,'',$log);

				break;
			default: break;
		}



		frontcontrollerx::json_success();
	}

	public static function showSubmissionsOfDayX()
	{
		$dayx 		= dbx2::escape($_REQUEST['dayx']);
		$sql_data 	= "SELECT * FROM e_submissions WHERE DATE_FORMAT(es_created_date,\"%Y-%m-%d\") = '$dayx'";
		$sql_cnt = "SELECT count(es_id) as sql_cnt FROM `e_submissions` WHERE es_created_date = '$dayx'";

		xluerzer_db_junky::uniqueDataGridWrapper(array(
		'db' 		=> Ixcore::DB_NAME,
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));
	}

	public static function scopex2db($scopex)
	{
		switch ($scopex)
		{
			case  'e_students_winner':
				$table 	= "e_students_winners";
				$p_id 	= "esw_id";
				$prefix = "esw_";
				break;
			case  'e_digitals':
				$table 	= "e_digital";
				$p_id 	= "ed_id";
				$prefix = "ed_";
				break;
			case  'e_digital_web':
				$table 	= "e_digital_web";
				$p_id 	= "edw_id";
				$prefix = "edw_";
				break;
			case  'e_digital_app':
				$table 	= "e_digital_app";
				$p_id 	= "eda_id";
				$prefix = "eda_";
				break;
			case  'e_interviews':
				$table 	= "e_interviews";
				$p_id 	= "ei_id";
				$prefix = "ei_";
				break;
			case 'e_digitalInterviews':
				$table 	= "e_digital_interviews";
				$p_id 	= "edi_id";
				$prefix = "edi_";
				break;
			case  'e_magazines':
				$table 	= "e_magazine";
				$p_id 	= "em_id";
				$prefix = "em_";
				break;
			default: die('2*2=3');
		}
		return array($table,$p_id,$prefix);
	}


	public static function data_load()
	{
		$scopex = trim($_REQUEST['scopex']);
		list($table,$p_id,$prefix) = self::scopex2db($scopex);

		$id 	= intval($_REQUEST['id']);
		$record = dbx::query("select * from $table where $p_id = $id");

		$data = array(
		'record' => $record
		);

		switch ($scopex)
		{
			case 'e_digital_app':

				################# CREDITS

				$_credits 	= dbx::queryAll("select * from e_digital_app_credits,e_contacts where edac_digital_app_id = $id and ec_id = edac_contact_id ");
				$credits 	= array();

				foreach ($_credits as $c)
				{
					$id = $c['edac_contactType_id'];
					$fieldName = "credits_".$id;

					if (!isset($credits[$fieldName])) $credits[$fieldName] = array();

					// TODO CHECK WER ER IST

					$tmp = array(
					id 		=> $c['ec_id'],
					name 	=> trim($c['ec_company'].' '.$c['ec_firstname'].' '.$c['ec_lastname'].' ['.$c['ec_id'].']'), // ec_firstname	ec_lastname ec_company
					);

					$credits[$fieldName][] = $tmp;
				}

				for ($i=1;$i<=16;$i++)
				{
					$key = "credits_".$i;
					if (!isset($credits[$key])) $credits[$key] = array();
					$credits[$key] = json_encode($credits[$key]);
				}

				$data['credits'] = $credits;

				break;
			case 'e_digital_web':

				################# CREDITS

				$_credits 	= dbx::queryAll("select * from e_digital_web_credits,e_contacts where edwc_digital_web_id = $id and ec_id = edwc_contact_id ");
				$credits 	= array();

				foreach ($_credits as $c)
				{
					$id = $c['edwc_contactType_id'];
					$fieldName = "credits_".$id;

					if (!isset($credits[$fieldName])) $credits[$fieldName] = array();

					// TODO CHECK WER ER IST

					$tmp = array(
					id 		=> $c['ec_id'],
					name 	=> trim($c['ec_company'].' '.$c['ec_firstname'].' '.$c['ec_lastname'].' ['.$c['ec_id'].']'), // ec_firstname	ec_lastname ec_company
					);

					$credits[$fieldName][] = $tmp;
				}

				for ($i=1;$i<=16;$i++)
				{
					$key = "credits_".$i;
					if (!isset($credits[$key])) $credits[$key] = array();
					$credits[$key] = json_encode($credits[$key]);
				}

				$data['credits'] = $credits;


				break;

			default: break;
		}

		frontcontrollerx::json_success($data);
	}



	public static function data_save()
	{
	
		$scopex = trim($_REQUEST['scopex']);
		list($table,$p_id,$prefix) = self::scopex2db($scopex);

		$db 	= json_decode($_REQUEST['record'],true);
		$id 	= intval($_REQUEST['id']);
		$old 	= dbx::query("select * from $table where $p_id = $id");

		
		### DATA PATCHING
		switch ($scopex)
		{
			case 'e_interviews':
			case 'e_digitalInterviews':

				### PUBLISH TEXT
				//$db[$prefix.'title_pre_publish'] = xredaktor_xr_html::toStaticHtml($db[$prefix.'title']);
				$db[$prefix.'col_left_pre_publish'] = xredaktor_xr_html::toStaticHtml($db[$prefix.'col_left']);


				### SAFETY FIRST, MAYBE NEEDED FOR OLD CODE ...
				if (!is_numeric($db[$prefix.'preview_image']))
				{
					$gallery = json_decode($old[$prefix.'img_gallery'],true);
					$db[$prefix.'preview_image'] = 0;
					if (isset($gallery[0]))
					{
						$db[$prefix.'preview_image'] = $gallery[0];
					}
				}

				break;

			case 'e_digital_web':
			case 'e_digital_app':

				### PUBLISH TEXT
				// machen wir in publish $db[$prefix.'description_publish'] = xredaktor_xr_html::toStaticHtml($db[$prefix.'description']);

				### MEDIA IMAGE
				if (!is_numeric($db[$prefix.'preview_image']) || $db[$prefix.'preview_image'] == 0)
				{
					$gallery = json_decode($old[$prefix.'img_gallery'],true);
					$db[$prefix.'preview_image'] = 0;

					if (isset($gallery[0]))
					{
						$db[$prefix.'preview_image'] = $gallery[0];
					}
				}
				
				### Magazin Infos
				
				$em_id = intval($db[$prefix.'magazine_id']);
				
				if($em_id > 0)
				{
					$magazin = dbx::query("select * from e_magazine where em_id = $em_id");
					
					$em_year 	= intval($magazin['em_year']);
					$em_edition = intval($magazin['em_edition']);
					
					$db[$prefix.'year'] = $em_year;
					$db[$prefix.'edition'] = $em_edition;
				}

				break;

			default: break;
		}

		########### UPDATE

		$db[$prefix.'modified_by'] = xluerzer_user::getCurrentUserId();
		
		dbx::update($table,$db,array($p_id => $id));
		$record = dbx::query("select * from $table where $p_id = $id");
		$data = array(
		'record' => $record
		);
		xluerzer_log::update($table,$p_id,$id,$old);


		############ POST SAVE CHECKS
		switch ($scopex)
		{
			case 'e_interviews':
				if (($db['ei_pdfOnly'] == 'Y') && (intval($db['ei_pdf']) == 0))
				{
					frontcontrollerx::json_failure("PDF-ONLY choosen (OLD INTERVIEWS), but no PDF File is selected.");
				}
				break;
			default: break;
		}

		frontcontrollerx::json_success($data);
	}



	public static function handle_media($function)
	{
		list($scope,$function0,$param_0,$param_1,$param_2) = explode("/",$_REQUEST['url']);
		$mediaId = intval($param_0);
		switch ($function)
		{
			case 'submission':
				$f 		= xredaktor_storage::getById($mediaId);
				$file	= $f['s_onDisk'];
				imagesx::smartResizer($file,200,200,'',dirname(__FILE__).'/../cache/e_magazinImg',1,false,false,'png');
				die();
				break;
			case 'magazinImg':
				
				if ($mediaId == 0) $mediaId = 1171889;
				$f 		= xredaktor_storage::getById($mediaId);
				$file	= $f['s_onDisk'];
				imagesx::smartResizer($file,157,218,'cco',dirname(__FILE__).'/../cache/e_magazinImg',1,false,false,'png');
				die();
				break;
			case 'digitalImg':
				$f 		= xredaktor_storage::getById($mediaId);
				$file	= $f['s_onDisk'];
				imagesx::smartResizer($file,163,80,'cco',dirname(__FILE__).'/../cache/e_digitalImg',1,false,false,'png');
				die();
				break;
			case 'interviewImg':

				if ($mediaId == 0) $mediaId = 1171889;

				$img = xredaktor_storage::xr_img2(array(
				s_id 		=> $mediaId,
				w 			=> 146,
				h 			=> 172,
				q 			=> 85,
				fullpath 	=> 'Y',
				rmode		=> 'cco',
				ext			=> 'jpg',
				));

				$fullPath = $img['src'];
				imagesx::readfile_if_modified($fullPath,array('Content-Type: image/jpeg'));
				die();


				break;
			default:break;
		}
	}

	public static function handle_digital_app($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_digital_app',
		'db_prefix'			=> 'eda_',
		'pid'				=> 'eda_id',
		'del'				=> 'eda_del',
		'extraInsert'		=> array('eda_created_by' => $currUser, 'eda_created_ts' => 'NOW'),
		'fields'			=> array('eda_id' , 'eda_title' , 'eda_description' , 'eda_link1' , 'eda_link2' , 'eda_linkText1' , 'eda_linkText2' , 'eda_img_gallery' , 'eda_year' , 'eda_edition' , 'eda_magazine_id' , 'eda_preview_image' , 'eda_old_id' , 'eda_del' , 'eda_fid' , 'eda_sort' , 'eda_created_ts' , 'eda_modified_ts' , 'eda_created_by' , 'eda_modified_by'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_digital_web($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_digital_web',
		'db_prefix'			=> 'edw_',
		'pid'				=> 'edw_id',
		'del'				=> 'edw_del',
		'extraInsert'		=> array('edw_created_by' => $currUser, 'edw_created_ts' => 'NOW'),
		'fields'			=> array('edw_id' , 'edw_title' , 'edw_description' , 'edw_link1' , 'edw_link2' , 'edw_linkText1' , 'edw_linkText2' , 'edw_img_gallery' , 'edw_year' , 'edw_edition' , 'edw_magazine_id' , 'edw_preview_image' , 'edw_old_id' , 'edw_del' , 'edw_fid' , 'edw_sort' , 'edw_created_ts' , 'edw_modified_ts' , 'edw_created_by' , 'edw_modified_by'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_digitals($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_digital_media',
		'db_prefix'			=> 'edm_',
		'pid'				=> 'edm_id',
		'del'				=> 'edm_del',
		'extraInsert'		=> array('edm_created_by' => $currUser),
		'fields'			=> array('edm_id', 'edm_digital_id', 'edm_title', 'edm_link', 'edm_description', 'edm_isApp', 'edm_linkText', 'edm_state','edm_type','edm_del','edm_fid','edm_sort','edm_meta_keywords_auto','edm_meta_keywords','edm_meta_desc_auto','edm_meta_desc','edm_og_auto','edm_id','edm_og_image','edm_og_title','edm_og_description', 'edm_og_url','edm_og_site_name','edm_vu_auto','edm_vu_url','edm_created_ts','edm_created_by','edm_modified_ts','edm_modified_by' ),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_interviews($function)
	{
		
		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_interviews',
		'db_prefix'			=> 'ei_',
		'pid'				=> 'ei_id',
		'del'				=> 'ei_del',
		'extraInsert'		=> array('ei_created_by' => $currUser, 'ei_created_ts' => 'NOW'),
		'fields'			=> array('ei_id','ei_old_id','ei_title','ei_partner','ei_col_left','ei_edition','ei_year','ei_preview_image','ei_pdf','ei_img_gallery','ei_state','ei_type','ei_del','ei_fid','ei_sort','ei_meta_keywords_auto','ei_meta_keywords','ei_meta_desc_auto','ei_meta_desc','ei_og_auto','ei_id','ei_og_image','ei_og_title','ei_og_description', 'ei_og_url','ei_og_site_name','ei_vu_auto','ei_vu_url','ei_created_ts','ei_created_by','ei_modified_ts','ei_modified_by'),
		'update'			=> array('ei_col_left'),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_esw($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_students_winners',
		'db_prefix'			=> 'esw_',
		'pid'				=> 'esw_id',
		'del'				=> 'esw_del',
		'extraInsert'		=> array('esw_created_by' => $currUser, 'esw_created_ts' => 'NOW'),
		'fields'			=> array('esw_id','esw_old_id','esw_title','esw_partner','esw_col_left','esw_edition','esw_year','esw_preview_image','esw_pdf','esw_img_gallery','esw_state','esw_type','esw_del','esw_fid','esw_sort','esw_meta_keywords_auto','esw_meta_keywords','esw_meta_desc_auto','esw_meta_desc','esw_og_auto','esw_id','esw_og_image','esw_og_title','esw_og_description', 'esw_og_url','esw_og_site_name','esw_vu_auto','esw_vu_url','esw_created_ts','esw_created_by','esw_modified_ts','esw_modified_by'),
		'update'			=> array('esw_col_left'),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_digitalInterviews($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_digital_interviews',
		'db_prefix'			=> 'edi_',
		'pid'				=> 'edi_id',
		'del'				=> 'edi_del',
		'extraInsert'		=> array('edi_created_by' => $currUser, 'edi_created_ts' => 'NOW'),
		'fields'			=> array('edi_id','edi_old_id','edi_title','edi_partner','edi_col_left','edi_edition','edi_year','edi_preview_image','edi_pdf','edi_img_gallery','edi_state','edi_type','edi_del','edi_fid','edi_sort','edi_meta_keywords_auto','edi_meta_keywords','edi_meta_desc_auto','edi_meta_desc','edi_og_auto','edi_id','edi_og_image','edi_og_title','edi_og_description', 'edi_og_url','edi_og_site_name','edi_vu_auto','edi_vu_url','edi_created_ts','edi_created_by','edi_modified_ts','edi_modified_by'),
		'update'			=> array('edi_col_left'),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_magazines($function)
	{
		
		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_magazine',
		'db_prefix'			=> 'em_',
		'pid'				=> 'em_id',
		'del'				=> 'em_del',
		'extraInsert'		=> array('em_created_by' => $currUser, 'em_created_ts' => 'NOW'),
		'fields'			=> array('em_id','em_country_id','em_magazinType_id','em_edition','em_pages','em_year','em_memberKey','em_mediaType','em_kindOf','em_openForVoting','em_minSubmission_id','em_cover_id','em_coverFileName','em_defaultForVoting','em_del','em_fid','em_sort','em_meta_keywords_auto','em_meta_keywords','em_meta_desc_auto','em_meta_desc','em_og_auto','em_id','em_og_image','em_og_title','em_og_description', 'em_og_url','em_og_site_name','em_vu_auto','em_vu_url','em_created_ts','em_created_by','em_modified_ts','em_modified_by'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_reminder($function)
	{
		
		
		
		$ecr_contact_id = intval($_REQUEST['ecr_contact_id']);
		
		$ecr_created_by = intval(xluerzer::getCurrentUserId());

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_contacts_reminder',
		'db_prefix'			=> 'ecr_',
		'pid'				=> 'ecr_id',
		'del'				=> 'ecr_del',
		'preSelect'			=> ', (select CONCAT(ec_company, " ", ec_firstname, " ", ec_lastname) as namexxx from e_contacts where ec_id = ecr_contact_id) as ecr_contact_id_human',
		'extraSearchFields' => array('ecr_contact_id_human'),
		'extraLoad'			=> "ecr_contact_id = '$ecr_contact_id' and (ecr_created_by = '$ecr_created_by' or ecr_created_by = 0) ",
		'extraInsert'		=> array('ecr_contact_id' => $ecr_contact_id, 'ecr_created_ts' => 'NOW', 'ecr_created_by' => $ecr_created_by),
		'fields'			=> array('ecr_date','ecr_time','ecr_notes','d_sort','ecr_contact_id'),
		'update'			=> array('ecr_date','ecr_time','ecr_notes','d_sort','ecr_contact_id'),
		'normalize'			=> array('string'=> array('d_name','d_online'),'int'=>array('ecr_contact_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}
	
	public static function handle_reminder_by_user_id($function)
	{
		$ecr_created_by = intval(xluerzer::getCurrentUserId());
		
		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_contacts_reminder',
		'db_prefix'			=> 'ecr_',
		'pid'				=> 'ecr_id',
		'del'				=> 'ecr_del',
		'preSelect'			=> ', (select CONCAT(ec_company, " ", ec_firstname, " ", ec_lastname) as namexxx from e_contacts where ec_id = ecr_contact_id) as ecr_contact_id_human',
		'extraSearchFields' => array('ecr_contact_id_human'),
		'extraLoad'			=> "(ecr_created_by = '$ecr_created_by' or ecr_created_by = 0) and ecr_state = 'OPEN' ",
		'extraInsert'		=> array('ecr_contact_id' => $ecr_contact_id),
		'fields'			=> array('ecr_date','ecr_time','ecr_notes','d_sort','ecr_contact_id'),
		'update'			=> array('ecr_date','ecr_time','ecr_notes','d_sort','ecr_contact_id'),
		'normalize'			=> array('string'=> array('d_name','d_online'),'int'=>array('ecr_contact_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_data_reminder($function)
	{
		$ecr_id = intval($_REQUEST['ecr_id']);
		$record = json_decode($_REQUEST['record'],true);
		
		switch ($function) {
			case 'load':
				$data = dbx::query("select * from e_contacts_reminder where ecr_id = $ecr_id");
				frontcontrollerx::json_success(array('record' => $data));
				break;
			
			case 'save':
				$data = dbx::update("e_contacts_reminder",$record,array('ecr_id' => $ecr_id));
				frontcontrollerx::json_success(array('record' => $data));
				break;
			
						
			
			default:
				
				break;
		}

		//die("reminder data: ".$ecr_id." - record: ".$record);
		
		frontcontrollerx::json_success($record);
		
	}



}
