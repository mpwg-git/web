<?

class xluerzer_oe
{
	public static function defaultAjaxHandler($scope, $function)
	{
		switch ($scope)
		{
			case 'oe_data_load':
				self::data_load();
				break;
			case 'oe_data_save':
				self::data_save();
				break;
			case 'oe_media':
				self::handle_media_titleImg($function);
				break;
			case  'oe_thisweek':
				self::handle_thisweek($function);
				break;
			case  'oe_blogposts':
				self::handle_blogpost($function);
				break;
			case  'oe_inspiration':
				self::handle_inspiration($function);
				break;
			case  'oe_partners':
				self::handle_partners($function);
				break;
			case  'oe_designerprofiles':
				self::handle_designerprofiles($function);
				break;
			case  'oe_events':
				self::handle_events($function);
				break;
			case  'oe_otherarticle':
				self::handle_other_articles($function);
				break;
			case  'oe_log':
				self::handle_log($function);
				break;
			case  'oe_log_overview':
				self::handle_log_overview($function);
				break;
			case  'oe_gallery':
				self::handle_gallery($function);
				break;
			default:
				return false;
		}
	}

	public static function handle_gallery($function)
	{
		switch ($function)
		{
			case 'removeFile':
				$s_id_kill		= intval($_REQUEST['s_id']);
				$scopex_r_id 	= intval($_REQUEST['scopex_r_id']);
				$scopex 		= $_REQUEST['scopex'];

				list($table,$p_id) = self::scopex2db($scopex);

				$prefix 	= array_shift(explode("_",$p_id))."_";
				$data		= dbx::query("select * from $table where $p_id = $scopex_r_id");
				$field 		= $prefix.'img_gallery';


				$arrayOfImages = json_decode($data[$field],true);
				if (!is_array($arrayOfImages)) $arrayOfImages = array();

				$final = array();
				foreach ($arrayOfImages as $s_id)
				{
					if ($s_id == $s_id_kill) continue;
					$final[] = $s_id;
				}
				
				$update = array(
				$field => json_encode($final)
				);

				dbx::update($table,$update,array($p_id=>$scopex_r_id));

				frontcontrollerx::json_success();
				break;

			case 'append':

				$s_id 			= intval($_REQUEST['s_id']);
				$scopex_r_id 	= intval($_REQUEST['scopex_r_id']);
				$scopex 		= $_REQUEST['scopex'];

				list($table,$p_id) = self::scopex2db($scopex);

				$prefix 	= array_shift(explode("_",$p_id))."_";
				$data		= dbx::query("select * from $table where $p_id = $scopex_r_id");
				$field 		= $prefix.'img_gallery';


				$arrayOfImages = json_decode($data[$field],true);
				if (!is_array($arrayOfImages)) $arrayOfImages = array();
				$arrayOfImages[] = $s_id;

				$update = array(
				$field => json_encode($arrayOfImages)
				);

				dbx::update($table,$update,array($p_id=>$scopex_r_id));

				frontcontrollerx::json_success();
				break;
			case 'setFileInfos':

				$s_id 	= intval($_REQUEST['id']);
				if ($s_id == 0) die("INVALID FILE");

				$field 	= $_REQUEST['field'];
				$value	= dbx::escape($_REQUEST['value']);
				$lang	= $_REQUEST['lang'];

				$validLangs = array('EN');
				if (!in_array($lang,$validLangs)) die("INVALID LANGS");


				$f = xredaktor_storage::getById($s_id);

				$s_alts 	= json_decode($f['s_alts'],true);
				$s_descs 	= json_decode($f['s_descs'],true);
				$s_titles 	= json_decode($f['s_titles'],true);


				$update = array();
				switch ($field)
				{
					case 'f_description':
						$s_descs[$lang] 	= $value;
						$update['s_descs'] 	= json_encode($s_descs);
						break;
					case 'f_alt':
						$s_alts[$lang] 		= $value;
						$update['s_alts'] 	= json_encode($s_alts);
						break;
					case 'f_title':
						$s_titles[$lang] 	= $value;
						$update['s_titles'] = json_encode($s_titles);
						break;
					default: die('XXXX');
				}

				xredaktor_storage::updateDb($s_id,$update);

				$f = xredaktor_storage::getById($s_id);
				frontcontrollerx::json_success(array('file'=>$f));

				break;

			case 'getFileInfos':

				$s_ids = json_decode($_REQUEST['s_ids'],true);

				$data = array();
				foreach ($s_ids as $s_id)
				{
					$s_id = intval($s_id);
					if ($s_id == 0 ) continue;
					$data[$s_id] = xredaktor_storage::getById($s_id);
				}

				frontcontrollerx::json_success(array('infos'=>$data));
				break;
			default: break;
		}
	}

	public static function scopex2db($scopex)
	{
		switch ($scopex)
		{
			case 'oe_thisweek':
				$table 	= "oe_this_week";
				$p_id 	= "oetw_id";
				break;
			case 'oe_blogposts':
				$table 	= "oe_blog_posts";
				$p_id 	= "oebp_id";
				break;
			case 'oe_inspiration':
				$table 	= "oe_inspiration";
				$p_id 	= "oei_id";
				break;
			case 'oe_partners':
				$table 	= "oe_partners";
				$p_id 	= "oep_id";
				break;
			case 'oe_designerprofiles':
				$table 	= "oe_designer_profiles";
				$p_id 	= "oedp_id";
				break;
			case 'oe_events':
				$table 	= "oe_events";
				$p_id 	= "oee_id";
				break;
			case 'oe_otherarticle':
				$table 	= "oe_other_articles";
				$p_id 	= "oeoa_id";
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

	public static function handle_log($function)
	{

		$scopex = trim($_REQUEST['scopex']);
		list($table,$p_id) = self::scopex2db($scopex);
		$scopex_r_id = intval($_REQUEST['scopex_r_id']);

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'a_log',
		'db_prefix'			=> 'al_',
		'pid'				=> 'al_id',
		'del'				=> 'al_del',
		'preSelect'			=> ' , (select wz_u_username from be_users where wz_id = al_backend_user_id) as al_backend_user_id_human  ',
		'extraLoad'			=> "al_table = '$table' and al_record_id = $scopex_r_id ",
		'fields'			=> array(),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_log_overview($function)
	{
		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'a_log',
		'db_prefix'			=> 'al_',
		'pid'				=> 'al_id',
		'del'				=> 'al_del',
		'preSelect'			=> ' , (select wz_u_username from be_users where wz_id = al_backend_user_id) as al_backend_user_id_human  ',
		'fields'			=> array(),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_thisweek($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_this_week',
		'db_prefix'			=> 'oetw_',
		'pid'				=> 'oetw_id',
		'del'				=> 'oetw_del',
		'fields'			=> array('oetw_id','oetw_day','oetw_new2_id','oetw_col_left','oetw_col_right','oetw_img_promo_id','oetw_img_single_id','oetw_title','oetw_desc_short','oetw_keywords','oetw_media_id','oetw_state','oetw_created_ts','oetw_created_id','oetw_gallery_id','oetw_modified_ts','oetw_img_gallery','oetw_del','oetw_fid','oetw_sort','oetw_meta_keywords_auto','oetw_meta_keywords','oetw_meta_desc_auto','oetw_meta_desc','oetw_og_auto','oetw_og_image','oetw_og_title','oetw_og_description','oetw_og_url','oetw_og_site_name','oetw_vu_auto','oetw_vu_title','oetw_created_by','oetw_modified_by'),
		'update'			=> array('oetw_col_left','oetw_col_right'),
		'normalize'			=> array('string'=> array('oetw_col_left','oetw_col_right'),'int'=>array('oetw_img_promo_id','oetw_img_single_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_blogpost($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_blog_posts',
		'db_prefix'			=> 'oebp_',
		'pid'				=> 'oebp_id',
		'del'				=> 'oebp_del',
		'fields'			=> array('oebp_id','oebp_new2_id','oebp_old_img_promo_id','oebp_old_img_promo_single_id','oebp_featured','oebp_col_left','oebp_col_right','oebp_date_start','oebp_date_end','oebp_title','oebp_desc_short','oebp_keywords','oebp_media_id','oebp_state','oebp_url','oebp_created_ts','oebp_created_id','oebp_gallery_id','oebp_modified_ts','oebp_img_gallery','oebp_img_promo_id','oebp_img_promo_single_id','oebp_del','oebp_fid','oebp_sort','oebp_meta_keywords_auto','oebp_meta_keywords','oebp_meta_desc_auto','oebp_meta_desc','oebp_og_auto','oebp_og_image','oebp_og_title','oebp_og_description','oebp_og_url','oebp_og_site_name','oebp_vu_auto','oebp_vu_title','oebp_created_by','oebp_modified_by'),
		'update'			=> array('oebp_col_left','oebp_col_right'),
		'normalize'			=> array('string'=> array('oebp_col_left','oebp_col_right'),'int'=>array('oebp_old_img_promo_id','oebp_old_img_promo_single_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_inspiration($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_inspiration',
		'db_prefix'			=> 'oei_',
		'pid'				=> 'oei_id',
		'del'				=> 'oei_del',
		'fields'			=> array('oei_id','oei_new2_id','oei_desc_long','oei_title','oei_desc_short','oei_keywords','oei_media_id','oei_state','oei_url','oei_created_ts','oei_created_id','oei_gallery_id','oei_modified_ts','oei_img_gallery','oei_del','oei_fid','oei_sort','oei_meta_keywords_auto','oei_meta_keywords','oei_meta_desc_auto','oei_meta_desc','oei_og_auto','oei_og_image','oei_og_title','oei_og_description','oei_og_url','oei_og_site_name','oei_vu_auto','oei_vu_title','oei_created_by','oei_modified_by','oei_date_start','oei_date_end'),
		'update'			=> array('oei_col_left','oei_col_right'),
		'normalize'			=> array('string'=> array('oei_col_left','oei_col_right'),'int'=>array('oei_img_promo_id','oei_img_single_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_partners($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_partners',
		'db_prefix'			=> 'oep_',
		'pid'				=> 'oep_id',
		'del'				=> 'oep_del',
		'fields'			=> array('oep_id','oep_new2_id','oep_desc_long','oep_title','oep_desc_short','oep_keywords','oep_media_id','oep_state','oep_url','oep_created_ts','oep_created_id','oep_gallery_id','oep_modified_ts','oep_img_gallery','oep_del','oep_fid','oep_sort','oep_meta_keywords_auto','oep_meta_keywords','oep_meta_desc_auto','oep_meta_desc','oep_og_auto','oep_og_image','oep_og_title','oep_og_description','oep_og_url','oep_og_site_name','oep_vu_auto','oep_vu_title','oep_created_by','oep_modified_by','oep_date_start','oep_date_end'),
		'update'			=> array('oep_col_left','oep_col_right'),
		'normalize'			=> array('string'=> array('oep_col_left','oep_col_right'),'int'=>array('oep_img_promo_id','oep_img_single_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_designerprofiles($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_designer_profiles',
		'db_prefix'			=> 'oedp_',
		'pid'				=> 'oedp_id',
		'del'				=> 'oedp_del',
		'fields'			=> array('oedp_id','oedp_new2_id','oedp_name_first','oedp_name_last','oedp_bio','oedp_title','oedp_desc_short','oedp_keywords','oedp_media_id','oedp_state','oedp_url','oedp_created_ts','oedp_created_id','oedp_gallery_id','oedp_start_kw','oedp_end_kw','oedp_start-year','oedp_end_year','oedp_modified_ts','oedp_img_gallery','oedp_del','oedp_fid','oedp_sort','oedp_meta_keywords_auto','oedp_meta_keywords','oedp_meta_desc_auto','oedp_meta_desc','oedp_og_auto','oedp_og_image','oedp_og_title','oedp_og_description','oedp_og_url','oedp_og_site_name','oedp_vu_auto','oedp_vu_title','oedp_created_by','oedp_modified_by','oedp_date_start','oedp_date_end'),
		'update'			=> array('oedp_col_left','oedp_col_right'),
		'normalize'			=> array('string'=> array('oedp_col_left','oedp_col_right'),'int'=>array('oedp_img_promo_id','oedp_img_single_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}


	public static function handle_events($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_events',
		'db_prefix'			=> 'oee_',
		'pid'				=> 'oee_id',
		'del'				=> 'oee_del',
		'fields'			=> array('oee_id','oee_new2_id','oee_date_from','oee_desc_long','oee_date_to','oee_title','oee_desc_short','oee_keywords','oee_media_id','oee_state','oee_url','oee_created_ts','oee_created_id','oee_gallery_id','oee_modified_ts','oee_img_gallery','oee_del','oee_fid','oee_sort','oee_meta_keywords_auto','oee_meta_keywords','oee_meta_desc_auto','oee_meta_desc','oee_og_auto','oee_og_image','oee_og_title','oee_og_description','oee_og_url','oee_og_site_name','oee_vu_auto','oee_vu_title','oee_created_by','oee_modified_by','oee_date_start','oee_date_end'),
		'update'			=> array('oee_col_left','oee_col_right'),
		'normalize'			=> array('string'=> array('oee_col_left','oee_col_right'),'int'=>array('oee_img_promo_id','oee_img_single_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}


	public static function handle_other_articles($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_other_articles',
		'db_prefix'			=> 'oeoa_',
		'pid'				=> 'oeoa_id',
		'del'				=> 'oeoa_del',
		'fields'			=> array('oeoa_id','oeoa_new2_id','oeoa_col_left','oeoa_col_right','oeoa_date_start','oeoa_date_end','oeoa_title','oeoa_desc_short','oeoa_keywords','oeoa_media_id','oeoa_state','oeoa_url','oeoa_created_ts','oeoa_created_id','oeoa_gallery_id','oeoa_modified_ts','oeoa_img_gallery','oeoa_img_promo_id','oeoa_img_promo_single_id','oeoa_del','oeoa_fid','oeoa_sort','oeoa_meta_keywords_auto','oeoa_meta_keywords','oeoa_meta_desc_auto','oeoa_meta_desc','oeoa_og_auto','oeoa_og_image','oeoa_og_title','oeoa_og_description','oeoa_og_url','oeoa_og_site_name','oeoa_vu_auto','oeoa_vu_title','oeoa_created_by','oeoa_modified_by'),
		'update'			=> array('oeoa_col_left','oeoa_col_right'),
		'normalize'			=> array('string'=> array('oeoa_col_left','oeoa_col_right'),'int'=>array('oeoa_old_img_promo_id','oeoa_old_img_promo_single_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}


	public static function handle_media_titleImg($function)
	{
		list($scope,$function0,$param_0,$param_1,$param_2) = explode("/",$_REQUEST['url']);
		$mediaId = intval($param_0);
		switch ($function)
		{
			case 'titleImg':
				$f 		= xredaktor_storage::getById($mediaId);
				$file	= $f['s_onDisk'];
				imagesx::smartResizer($file,120,40,'cco',dirname(__FILE__).'/../cache/oe_imgs',1,false,false,'png');
				die();
				break;
			default:break;
		}
	}


}
