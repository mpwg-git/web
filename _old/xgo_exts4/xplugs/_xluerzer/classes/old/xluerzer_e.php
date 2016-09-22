<?

class xluerzer_e
{
	public static function defaultAjaxHandler($scope, $function)
	{
		switch ($scope)
		{
			case 'e_data_load':
				self::data_load();
				break;
			case 'e_data_save':
				self::data_save();
				break;
			case  'e_digitals':
				self::handle_digitals($function);
				break;
			case  'e_interviews':
				self::handle_interviews($function);
				break;
			case  'e_magazines':
				self::handle_magazines($function);
				break;
			case  'e_reminder':
				self::handle_reminder($function);
				break;
			case  'e_media':
				self::handle_media($function);
				break;
			case 'e_submissionOfTheDayX':
				self::showSubmissionsOfDayX();
				break;
			default:
				return false;
		}
		
		die('xxx'.$scope);
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
			case  'e_digitals':
				$table 	= "e_digital";
				$p_id 	= "ed_id";
				break;
			case  'e_interviews':
				$table 	= "e_interviews";
				$p_id 	= "ei_id";
				break;
			case  'e_magazines':
				$table 	= "e_magazine";
				$p_id 	= "em_id";
				break;
			default: die('1*1=3');
		}
		return array($table,$p_id);
	}


	public static function data_load()
	{
		$scopex = trim($_REQUEST['scopex']);
		list($table,$p_id) = self::scopex2db($scopex);

		$id 	= intval($_REQUEST['id']);
		$record = dbx::query("select * from $table where $p_id = $id");

		$data = array(
		'record' => $record
		);
		frontcontrollerx::json_success($data);
	}

	public static function data_save()
	{
		$scopex = trim($_REQUEST['scopex']);
		list($table,$p_id) = self::scopex2db($scopex);

		$db 	= json_decode($_REQUEST['record'],true);
		$id 	= intval($_REQUEST['id']);
		dbx::update($table,$db,array($p_id => $id));
		$record = dbx::query("select * from $table where $p_id = $id");

		$data = array(
		'record' => $record
		);

		xluerzer_log::update($table,$p_id,$id,$db);

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
				$f 		= xredaktor_storage::getById($mediaId);
				$file	= $f['s_onDisk'];
				imagesx::smartResizer($file,146,172,'cco',dirname(__FILE__).'/../cache/e_interviewImg',1,false,false,'png');
				die();
				break;
			default:break;
		}
	}

	public static function handle_digitals($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_digital_media',
		'db_prefix'			=> 'edm_',
		'pid'				=> 'edm_id',
		'del'				=> 'edm_del',
		'fields'			=> array('edm_id', 'edm_digital_id', 'edm_title', 'edm_link', 'edm_description', 'edm_isApp', 'edm_linkText', 'edm_state','edm_type','edm_del','edm_fid','edm_sort','edm_meta_keywords_auto','edm_meta_keywords','edm_meta_desc_auto','edm_meta_desc','edm_og_auto','edm_id','edm_og_image','edm_og_title','edm_og_description', 'edm_og_url','edm_og_site_name','edm_vu_auto','edm_vu_url','edm_created_ts','edm_created_by','edm_modified_ts','edm_modified_by' ),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_interviews($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_interviews',
		'db_prefix'			=> 'ei_',
		'pid'				=> 'ei_id',
		'del'				=> 'ei_del',
		'fields'			=> array('ei_id','ei_old_id','ei_title','ei_partner','ei_col_left','ei_edition','ei_year','ei_preview_image','ei_pdf','ei_img_gallery','ei_state','ei_type','ei_del','ei_fid','ei_sort','ei_meta_keywords_auto','ei_meta_keywords','ei_meta_desc_auto','ei_meta_desc','ei_og_auto','ei_id','ei_og_image','ei_og_title','ei_og_description', 'ei_og_url','ei_og_site_name','ei_vu_auto','ei_vu_url','ei_created_ts','ei_created_by','ei_modified_ts','ei_modified_by'),
		'update'			=> array('ei_col_left'),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_magazines($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_magazine',
		'db_prefix'			=> 'em_',
		'pid'				=> 'em_id',
		'del'				=> 'em_del',
		'fields'			=> array('em_id','em_country_id','em_magazinType_id','em_edition','em_pages','em_year','em_memberKey','em_mediaType','em_kindOf','em_openForVoting','em_minSubmission_id','em_cover_id','em_coverFileName','em_defaultForVoting','em_del','em_fid','em_sort','em_meta_keywords_auto','em_meta_keywords','em_meta_desc_auto','em_meta_desc','em_og_auto','em_id','em_og_image','em_og_title','em_og_description', 'em_og_url','em_og_site_name','em_vu_auto','em_vu_url','em_created_ts','em_created_by','em_modified_ts','em_modified_by'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_reminder($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_contacts_reminder',
		'db_prefix'			=> 'ecr_',
		'pid'				=> 'ecr_id',
		'del'				=> 'ecr_del',
		'preSelect'			=> ', (select CONCAT(ec_company, " ", ec_firstname, " ", ec_lastname) as namexxx from e_contacts where ec_id = ecr_contact_id) as ecr_contact_id_human',
		'extraSearchFields' => array('ecr_contact_id_human'),
		'fields'			=> array('ecr_date','ecr_time','ecr_notes','d_sort','ecr_contact_id'),
		'update'			=> array('ecr_date','ecr_time','ecr_notes','d_sort','ecr_contact_id'),
		'normalize'			=> array('string'=> array('d_name','d_online'),'int'=>array('ecr_contact_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

}
