<?

class xluerzer_oe
{
	public static function defaultAjaxHandler($scope, $function)
	{
		switch ($scope)
		{
			case 'oe_thisweek_getById':
				self::oe_thisweek_getById();
				break;
			case 'oe_profile_getById':
				self::oe_profile_getById();
				break;
			case 'oe_ads_getById':
				self::oe_ads_getById();
				break;
			case 'oe_inspiration_getById':
				self::oe_inspiration_getById();
				break;
			case 'oe_blogpost_getById':
				self::oe_blogpost_getById();
				break;
			case 'oe_partners_getById':
				self::oe_partners_getById();
				break;
			case 'oe_events_getById':
				self::oe_events_getById();
				break;
			case 'oe_otherarticle_getById':
				self::oe_otherarticle_getById();
				break;
			case 'oe_data_load':
				xluerzer_user::liveSecurityCheckByTag('OE',true);
				self::data_load();
				break;
			case 'oe_data_save':
				xluerzer_user::liveSecurityCheckByTag('OE',true);
				self::data_save();
				break;
			case 'oe_unpublish':
				xluerzer_user::liveSecurityCheckByTag('OE',true);
				self::unpublish();
				break;
			case 'oe_media':
				self::handle_media_titleImg($function);
				break;
			case  'oe_thisweek':
				xluerzer_user::liveSecurityCheckByTag('OE',true);
				self::handle_thisweek($function);
				break;
			case  'oe_blogposts':
				xluerzer_user::liveSecurityCheckByTag('OE',true);
				self::handle_blogpost($function);
				break;
			case  'oe_inspiration':
				xluerzer_user::liveSecurityCheckByTag('OE',true);
				self::handle_inspiration($function);
				break;
			case  'oe_partners':
				xluerzer_user::liveSecurityCheckByTag('OE',true);
				self::handle_partners($function);
				break;
			case  'oe_designerprofiles':
				xluerzer_user::liveSecurityCheckByTag('OE',true);
				self::handle_designerprofiles($function);
				break;
			case  'oe_frontpage_teaser_articles':
				xluerzer_user::liveSecurityCheckByTag('OE',true);
				self::handle_oe_frontpage_teaser_articles($function);
				break;
			case  'oe_events':
				xluerzer_user::liveSecurityCheckByTag('OE',true);
				self::handle_events($function);
				break;
			case  'oe_otherarticle':
				xluerzer_user::liveSecurityCheckByTag('OE',true);
				self::handle_other_articles($function);
				break;
			case  'oe_log':
				self::handle_log($function);
				break;
			case  'oe_log_user':
				self::handle_log_user($function);
				break;
			case  'oe_log_overview':
				self::handle_log_overview($function);
				break;
			case  'oe_gallery':
				xluerzer_user::liveSecurityCheckByTag('OE',true);
				self::handle_gallery($function);
				break;
			case 'oe_frontpageconfig_load':
				self::frontpageconfig_load();
				break;
			case 'oe_profiles':
				xluerzer_user::liveSecurityCheckByTag('OE',true);
				self::loadDesignerprofiles($function);

			default:
				return false;
		}
	}

	public static function loadDesignerprofiles($function) {

		$records = array();

		$records[] = array('label'=>'not set','value'=>0);

		$records = array_merge($records,dbx::queryAll("select CONCAT(fep_firstname,' ',fep_lastname) as label, 	fep_contact_id as value from fe_profiles where fep_del = 'N' order by fep_contact_id desc"));
		frontcontrollerx::json_success(array('combodata'=>$records));

	}

	public static function oe_thisweek_getById()
	{
		$id = intval($_REQUEST['id']);
		$db = dbx::query("select * from oe_this_week where oetw_id = $id");
		frontcontrollerx::json_success(array('data'=>$db));
	}

	public static function oe_profile_getById()
	{
		$id = intval($_REQUEST['id']);
		$db = dbx::query("select * from oe_designer_profiles where oedp_id = $id");
		frontcontrollerx::json_success(array('data'=>$db));
	}

	public static function oe_inspiration_getById()
	{
		$id = intval($_REQUEST['id']);
		$db = dbx::query("select * from oe_inspiration where oei_id = $id");
		frontcontrollerx::json_success(array('data'=>$db));
	}

	public static function oe_blogpost_getById()
	{
		$id = intval($_REQUEST['id']);
		$db = dbx::query("select * from oe_blog_posts where oebp_id = $id");
		frontcontrollerx::json_success(array('data'=>$db));
	}

	public static function oe_partners_getById()
	{
		$id = intval($_REQUEST['id']);
		$db = dbx::query("select * from oe_partners where oep_id = $id");
		frontcontrollerx::json_success(array('data'=>$db));
	}

	public static function oe_events_getById()
	{
		$id = intval($_REQUEST['id']);
		$db = dbx::query("select * from oe_events where oee_id = $id");
		frontcontrollerx::json_success(array('data'=>$db));
	}


	public static function oe_otherarticle_getById()
	{
		$id = intval($_REQUEST['id']);
		$db = dbx::query("select * from oe_other_articles where oeoa_id = $id");
		frontcontrollerx::json_success(array('data'=>$db));
	}


	public static function handle_gallery($function)
	{
		switch ($function)
		{
			case 'sync':
				$scopex_r_id 		= intval($_REQUEST['scopex_r_id']);
				$scopex 			= $_REQUEST['scopex'];

				list($table,$p_id,$prefix)	= self::scopex2db($scopex);

				$field 	= $prefix.'img_gallery';
				$final	= array();
				$s_ids	= explode(",",$_REQUEST['s_ids']);

				foreach ($s_ids as $s_id)
				{
					$s_id = intval($s_id);
					if ($s_id == 0) continue;
					$final[] = $s_id;
				}

				$update = array(
				$field => json_encode($final)
				);

				dbx::update($table,$update,array($p_id=>$scopex_r_id));
				xluerzer_log::pushLog('GALLERY',$table,$p_id,$scopex_r_id,false,"REORDER FILES: ".implode(",",$final));

				frontcontrollerx::json_success();
				break;

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
				xluerzer_log::pushLog('GALLERY',$table,$p_id,$scopex_r_id,false,"REMOVE FILE $s_id_kill");

				frontcontrollerx::json_success();
				break;

			case 'upload':

				$f_s_id = 1174888;
				$scopex = $_REQUEST['scopex'];

				switch ($scopex)
				{
					case 'e_interviews':
						$addOnPath	= 'interviews/'.date("Y/W");
						break;
					case 'e_digitalInterviews':
						$addOnPath	= 'digital_interviews/'.date("Y/W");
						break;
					case 'e_digital_web':
						$addOnPath	= 'websites/'.date("Y/W");
						break;
					case 'e_digital_app':
						$addOnPath	= 'apps/'.date("Y/W");
						break;
					case 'oe_thisweek':
						$addOnPath	= 'features/'.date("Y/W");
						break;
					case 'oe_blogposts':
						$addOnPath	= 'bog/'.date("Y/W");
						break;
					case 'oe_otherarticle':
						$addOnPath	= 'other_articles/'.date("Y/W");
						break;
					case 'e_students_winner':
						$addOnPath	= 'students/'.date("Y/W");
						break;
					default: die('addOnPath is not set');
				}

				$storageScopeId = xredaktor_storage::getFileStorageScopeId($f_s_id);
				$dir = xredaktor_storage::getFileDstById($f_s_id)."/".$addOnPath;
				exec("mkdir -p $dir");

				if (is_dir($dir))
				{
					$s_id = xredaktor_storage::registerExistingDir($storageScopeId,$dir);
				} else
				{
					frontcontrollerx::json_failure("CANNOT CREATE DIR");
				}

				global $_REQUEST;
				$_REQUEST['s_id'] = $s_id;
				xredaktor_storage::fc_handleUpload();
				die();

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
				if (in_array($s_id,$arrayOfImages)) frontcontrollerx::json_failure('Image is already in Gallery');
				$arrayOfImages[] = $s_id;

				$update = array(
				$field => json_encode($arrayOfImages)
				);

				dbx::update($table,$update,array($p_id=>$scopex_r_id));
				xluerzer_log::pushLog('GALLERY',$table,$p_id,$scopex_r_id,false,"APPEND FILE $s_id");

				frontcontrollerx::json_success();
				break;
			case 'setFileInfos':

				$s_id 	= intval($_REQUEST['id']);
				if ($s_id == 0) die("INVALID FILE");

				$field 	= $_REQUEST['field'];
				$value	= $_REQUEST['value'];
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



				$scopex_r_id 	= intval($_REQUEST['scopex_r_id']);
				$scopex 		= $_REQUEST['scopex'];
				list($table,$p_id,$prefix) = self::scopex2db($scopex);

				xluerzer_log::pushLog('GALLERY',$table,$p_id,$scopex_r_id,false,"UPDATE FILE INFOS $s_id : $field : $value");

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
			case 'e_students_winner':
				$table 	= "e_students_winners";
				$p_id 	= "esw_id";
				$prefix = "esw_";
				break;
			case 'oe_thisweek':
				$table 	= "oe_this_week";
				$p_id 	= "oetw_id";
				$prefix = "oetw_";
				break;
			case 'oe_blogposts':
				$table 	= "oe_blog_posts";
				$p_id 	= "oebp_id";
				$prefix = "oebp_";
				break;
			case 'oe_inspiration':
				$table 	= "oe_inspiration";
				$p_id 	= "oei_id";
				$prefix = "oei_";
				break;
			case 'oe_partners':
				$table 	= "oe_partners";
				$p_id 	= "oep_id";
				$prefix = "oep_";
				break;
			case 'oe_designerprofiles':
				$table 	= "oe_designer_profiles";
				$p_id 	= "oedp_id";
				$prefix = "oedp_";
				break;
			case 'oe_events':
				$table 	= "oe_events";
				$p_id 	= "oee_id";
				$prefix = "oee_";
				break;
			case 'oe_frontpage_teaser_articles':
				$table 	= "oe_frontpage_teaser_articles";
				$p_id	= "oefta_id";
				$prefix = "oefta_";
				break;
			case 'oe_otherarticle':
				$table 	= "oe_other_articles";
				$p_id 	= "oeoa_id";
				$prefix = "oeoa_";
				break;
			case 'e_submissions':
				$table 	= "e_submissions";
				$p_id 	= "es_id";
				$prefix = "es_";
				break;
			case 'e_submissions_students':
				$table 	= "e_submissions_students";
				$p_id 	= "ess_id";
				$prefix = "ess_";
				break;
			case 'e_archive_media':
				$table 	= "e_archive_media";
				$p_id 	= "eam_id";
				$prefix = "eam_";
				break;
			case 'e_contacts':
				$table 	= "e_contacts";
				$p_id 	= "ec_id";
				$prefix = "ec_";
				break;

			case 'e_interviews':
				$table 	= "e_interviews";
				$p_id 	= "ei_id";
				$prefix = "ei_";
				break;
			case 'e_digitalInterviews':
				$table 	= "e_digital_interviews";
				$p_id 	= "edi_id";
				$prefix = "edi_";
				break;
			case 'e_digital_app':
				$table 	= "e_digital_app";
				$p_id 	= "eda_id";
				$prefix = "eda_";
				break;
			case 'e_digital_web':
				$table 	= "e_digital_web";
				$p_id 	= "edw_id";
				$prefix = "edw_";
				break;
			case 'fe_profiles':
				$table 	= "fe_profiles";
				$p_id 	= "fep_contact_id";
				$prefix = "fep_";
				break;
			default: die('1*1=333');
		}
		return array($table,$p_id,$prefix);
	}


	public static function extendLoadData($scopex,$record)
	{
		$scopex = trim($_REQUEST['scopex']);
		list($table,$p_id,$prefix) = self::scopex2db($scopex);
		// datetime fields converten
		$date_start = $record[$prefix."date_start"];

		if ($date_start != '0000-00-00 00:00:00') {
			$date_start = date("Y-m-d", strtotime($date_start));
		}

		$record[$prefix."date_start"] 	= $date_start;

		// events 2 extra fields
		/*if ($prefix == 'oee_') {
		$date_start = date("Y-m-d", strtotime($record["oee_date_from"]));
		$date_end 	= date("Y-m-d", strtotime($record["oee_date_to"]));
		$record["oee_date_from"] 	= $date_start;
		$record["oee_date_to"]		= $date_end;
		}*/
		return $record;
	}

	public static function getVanityURL($scopex,$id,$title)
	{
		if (trim($title) == "") return "Please enter Title first.";

		$base 	= "http://www.luerzersarchive.com";
		$url 	= "";

		switch ($scopex)
		{
			case 'oe_blogposts':
				$url = fe_vanityurls::genUrl_blog_posts_detail($id,true);
				break;
			case 'oe_thisweek':
				$url = fe_vanityurls::genUrl_this_week_detail($id,true);
				break;
			case 'oe_otherarticle':
				$url = fe_vanityurls::genUrl_otherarticle_detail($id,true);
				break;
			default: break;
		}


		return $base . $url;
	}

	public static function data_load()
	{
		$scopex = trim($_REQUEST['scopex']);
		list($table,$p_id,$prefix) = self::scopex2db($scopex);

		$id 	= intval($_REQUEST['id']);
		$record = dbx::query("select * from $table where $p_id = $id");
		$record = self::extendLoadData($scopex,$record);


		$record['_vanityUrl'] = self::getVanityURL($scopex,$id,$record[$prefix.'title']);
		
		$data = array(
		'record' => $record
		);
		frontcontrollerx::json_success($data);
	}

	public static function data_save()
	{
		$scopex = trim($_REQUEST['scopex']);
		list($table,$p_id,$prefix) = self::scopex2db($scopex);

		$db 	= json_decode($_REQUEST['record'],true);
		$id 	= intval($_REQUEST['id']);
		$old 	= dbx::query("select * from $table where $p_id = $id ");

		unset($db['_vanityUrl']);

		$mapping_pre = array(

		'col_left'		=> 'col_left_pre_publish',
		'col_right'		=> 'col_right_pre_publish',
		'desc_short'	=> 'desc_short_pre_publish',
		'desc_long'		=> 'desc_long_pre_publish',


		);

		$mapping_publish = array(
		'title'			=> 'title_publish',
		'col_left'		=> 'col_left_publish',
		'col_right'		=> 'col_right_publish',
		'desc_short'	=> 'desc_short_publish',
		'desc_long'		=> 'desc_long_publish',

		'img_gallery'		=> 'img_gallery_publish',
		'media_id'			=> 'media_id_publish',
		'media_cropped_id'	=> 'media_cropped_id_publish',

		'url'			=> 'url_publish'

		);

		foreach ($mapping_pre as $orig => $fin)
		{
			if (dbx::attributePresent($table,$prefix.$fin))
			{
				$db[$prefix.$fin] = trim(xredaktor_xr_html::toStaticHtml($db[$prefix.$orig]));
			}
		}


		switch ($scopex)
		{

			case 'oe_designerprofiles':
				if (trim($db['oedp_date_start']) == "")
				{
					frontcontrollerx::json_failure("ERROR: Publish start cannot be empty.");
				}
				break;

			case 'oe_thisweek':
				if (trim($db['oetw_day']) == "")
				{
					frontcontrollerx::json_failure("ERROR: Publish start cannot be empty.");
				}
			default: break;
		}

		############# PUHBLISH
		if (intval($_REQUEST['publish_content']) == 1)
		{

			$full_text_search = array();

			if (dbx::attributePresent($table,$prefix.'img_gallery'))
			{
				$db[$prefix.'img_gallery'] = $old[$prefix.'img_gallery'];
			}

			foreach ($mapping_publish as $orig => $fin)
			{
				if (dbx::attributePresent($table,$prefix.$fin))
				{
					$db[$prefix.$fin] = trim(xredaktor_xr_html::toStaticHtml($db[$prefix.$orig]));
					if (!in_array($fin,array('media_id_publish','media_cropped_id_publish','url_publish')))
					{
						$full_text_search[] = $db[$prefix.$fin];
					}
				}
			}

			$s_ids = json_decode($db[$prefix.'img_gallery'],true);
			$data = array();
			foreach ($s_ids as $s_id)
			{
				$s_id = intval($s_id);
				if ($s_id == 0 ) continue;
				$f  = xredaktor_storage::getById($s_id);

				$s_alts		= json_decode($f['s_alts'],		true);
				$s_titles	= json_decode($f['s_titles'],	true);
				$s_descs	= json_decode($f['s_descs'],	true);

				$f_title 	= $s_titles['EN'];
				$f_alt 		= $s_alts['EN'];
				$f_desc 	= $s_descs['EN'];

				$data[$s_id] = array(
				'f_title' 	=> $f_title,
				'f_alt' 	=> $f_alt,
				'f_desc' 	=> $f_desc,
				);
			}



			if (dbx::attributePresent($table,$prefix.'img_gallery_publish_txt'))
			{
				$db[$prefix.'img_gallery_publish_txt'] = json_encode($data);
			}

			/*
			##############
			############## 123
			##############
			*/

			//if ($db[$prefix.'meta_keywords_auto'] == 'Y')
			{
				#$db[$prefix.'meta_keywords'] = trim(strip_tags($db[$prefix.'keywords']));
			}

			//if ($db[$prefix.'meta_desc_auto'] == 'Y')
			{
				#$db[$prefix.'meta_desc'] = trim(strip_tags($db[$prefix.'desc_short']));
			}

			if ($db[$prefix.'og_auto'] == 'Y')
			{
				$db[$prefix.'og_image'] 		= trim($db[$prefix.'media_id']);
				$db[$prefix.'og_title'] 		= trim($db[$prefix.'title']);
				$db[$prefix.'og_description'] 	= trim(strip_tags($db[$prefix.'desc_short']));
			}

			$db[$prefix.'state'] = "1";
			
			$db[$prefix.'modified_by'] = xluerzer_user::getCurrentUserId();
			

			if (dbx::attributePresent($table,$prefix.'full_text_search'))
			{
				$db[$prefix.'full_text_search'] = implode("",$full_text_search);
			}

		}

		##### unpublish
		if (intval($_REQUEST['publish_content']) == 3)
		{
			$db[$prefix.'state'] = "3";
		}


		switch ($scopex)
		{
			case 'oe_events':

				if ($db['oee_date_to'] == "")
				{
					$db['oee_date_to'] = $db['oee_date_from'];
				}

				break;

			case 'oe_designerprofiles':
				$oedp_date_start			= $db['oedp_date_start'];
				$oedp_start_year			= date("Y", strtotime($oedp_date_start));
				$oedp_start_kw				= date("W", strtotime($oedp_date_start));
				$db['oedp_start_year'] 		= $oedp_start_year;
				$db['oedp_start_kw'] 		= $oedp_start_kw;
				break;

			case 'oe_thisweek':


				/*

				MO, case '1': return "Audivisual";
				DI, case '2': return "Campaigns";
				MI, case '3': return "Who\'s Who";
				DO, case '4': return "Digital";
				FR, case '5': return "Editor\'s Blog";

				*/

				$oetw_day = $db['oetw_day'];

				$oetw_year			= date("Y", strtotime($oetw_day));
				$oetw_week			= date("W", strtotime($oetw_day));
				$oetw_day_of_week	= date("w", strtotime($oetw_day));

				if (($oetw_day_of_week == 0) || ($oetw_day_of_week > 5))
				{
					frontcontrollerx::json_failure("Date is wrong ! Valid Dates: MO-FR");
				}

				$db['oetw_year'] 		= $oetw_year;
				$db['oetw_week'] 		= $oetw_week;
				$db['oetw_day_of_week'] = $oetw_day_of_week;

				$present = dbx::query("select * from oe_this_week where oetw_day = '$oetw_day' and oetw_del = 'N'");
				if ($present !== false)
				{
					$present_id = $present['oetw_id'];
					if ($present_id != $id)
					{
						frontcontrollerx::json_failure("ERROR: Feature #$present_id already set for this date.");
					}
				}

				break;
			default: break;
		}

		if ($db[$prefix.'state'] == 0)
		{
			$db[$prefix.'state'] = 3;
		}

		dbx::update($table,$db,array($p_id => $id));
		$record = dbx::query("select * from $table where $p_id = $id ");
		$record = self::extendLoadData($scopex,$record);

		xluerzer_log::update($table,$p_id,$id,$old);

		if (intval($_REQUEST['publish_content']) == 1)
		{
			xluerzer_log::pushLog('PUBLISH',$table,$p_id,$id);
		}
		else if (intval($_REQUEST['publish_content']) == 3)
		{
			xluerzer_log::pushLog('UNPUBLISH',$table,$p_id,$id);
		}

		$record['_vanityUrl'] = self::getVanityURL($scopex,$id,$db[$prefix.'title']);
		frontcontrollerx::json_success(array('record' => $record,'db'=>$db));
	}

	public static function frontpageconfig_load()
	{

		// frontcontrollerx::json_success($data);
	}
	
	
	public static function unpublish() 
	{
	
		$scopex = dbx::escape($_REQUEST['scopex']);
		$id		= intval($_REQUEST['id']);
		
		if ($id == 0) die();
		
		switch ($scopex) {
				
			case 'oe_thisweek':
				dbx::update('oe_this_week', array('oetw_state' => 2), array('oetw_id' => $id));
				break;
			
			case 'oe_blogposts':
				dbx::update('oe_blog_posts', array('oebp_state' => 2), array('oebp_id' => $id));
				break;
			
			default:
				break;
		}
	
		frontcontrollerx::json_success(array('id'=>$id));
		
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

	public static function handle_log_user($function)
	{

		//$u_id = xredaktor_core::getUserId();
		$u_id = intval($_REQUEST['abu_id']);
		$extraload = " al_backend_user_id = $u_id " ; 
		
		
		if ($u_id == -100)
		{
			$extraload = " 1=1 "; 
		}
		
		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'a_log',
		'db_prefix'			=> 'al_',
		'pid'				=> 'al_id',
		'del'				=> 'al_del',
		'preSelect'			=> ' , (select wz_u_username from be_users where wz_id = al_backend_user_id) as al_backend_user_id_human  ',
		'extraLoad'			=> " $extraload ",
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


	public static function checkFeature($oetw_day)
	{
		$present = dbx::query("select * from oe_this_week where oetw_day = '$oetw_day' and oetw_del = 'N'");
		if ($present === false)
		{
			dbx::insert('oe_this_week',array(
			'oetw_day' 			=> $oetw_day,
			'oetw_week' 		=> date("W", strtotime($oetw_day)),
			'oetw_year' 		=> date("Y", strtotime($oetw_day)),
			'oetw_day_of_week' 	=> date("w", strtotime($oetw_day)),
			));
		} else {
			dbx::update('oe_this_week',array(
			'oetw_day' 			=> $oetw_day,
			'oetw_week' 		=> date("W", strtotime($oetw_day)),
			'oetw_year' 		=> date("Y", strtotime($oetw_day)),
			'oetw_day_of_week' 	=> date("w", strtotime($oetw_day)),
			),array('oetw_day'=>$oetw_day));
		}
	}

	public static function handle_thisweek($function)
	{

		switch ($function)
		{

			case 'remove':

				$ids = explode(",",$_REQUEST['ids']);
				$finalo = array();

				foreach ($ids as $id)
				{
					$id = intval($id);
					if ($id == 0) continue;


					$present = dbx::query("select *,(CURDATE() < oetw_day) as ready2del  from oe_this_week where oetw_id = '$id' and oetw_del = 'N'");
					if ($present === false) continue;

					if ($present['ready2del'] == "1")
					{
						$finalo[] = $present['oetw_id'];
					} else {
						frontcontrollerx::json_failure("Online records cannot be deleted.");
					}

				}

				global $_REQUEST;
				$_REQUEST['ids'] = implode(",",$finalo);

				break;

			case 'checkWeek':

				$oetw_day 	= $_REQUEST['date'];
				$oetw_year	= date("Y", strtotime($oetw_day));
				$oetw_week	= date("W", strtotime($oetw_day));


				$day = date("w", strtotime($oetw_day))-1;
				$monday = date('Y-m-d', strtotime('-'.$day.' days',strtotime($oetw_day)));
				self::checkFeature($monday); // MO
				self::checkFeature(date('Y-m-d', strtotime('+ 1 days',strtotime($monday)))); // DI
				self::checkFeature(date('Y-m-d', strtotime('+ 2 days',strtotime($monday)))); // MI
				self::checkFeature(date('Y-m-d', strtotime('+ 3 days',strtotime($monday)))); // DO
				self::checkFeature(date('Y-m-d', strtotime('+ 4 days',strtotime($monday)))); // FR

				frontcontrollerx::json_success();
				break;
		}

		
		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_this_week',
		'db_prefix'			=> 'oetw_',
		'pid'				=> 'oetw_id',
		'del'				=> 'oetw_del',
		'fid'				=> 'oetw_fid',
		'sort'				=> 'oetw_sort',
		'extraInsert'		=> array('oetw_created_by' => $currUser, 'oetw_created_ts' => 'NOW'),
		'fields'			=> array('oetw_id','oetw_day','oetw_new2_id','oetw_col_left','oetw_col_right','oetw_img_promo_id','oetw_img_single_id','oetw_title','oetw_desc_short','oetw_keywords','oetw_media_id','oetw_state','oetw_created_ts','oetw_created_id','oetw_gallery_id','oetw_modified_ts','oetw_img_gallery','oetw_del','oetw_fid','oetw_sort','oetw_meta_keywords_auto','oetw_meta_keywords','oetw_meta_desc_auto','oetw_meta_desc','oetw_og_auto','oetw_og_image','oetw_og_title','oetw_og_description','oetw_og_url','oetw_og_site_name','oetw_vu_auto','oetw_vu_title','oetw_created_by','oetw_modified_by','oetw_year_week'),
		'update'			=> array('oetw_col_left','oetw_col_right'),
		'preSelect'			=> " , concat(oetw_year,'-',oetw_week) as oetw_year_week  ",
		'specialSorts'		=> array('oetw_year_week'),
		'normalize'			=> array('string'=> array('oetw_col_left','oetw_col_right'),'int'=>array('oetw_img_promo_id','oetw_img_single_id'))
		));


		if (isset($_REQUEST['date']))
		{
			$oetw_day 	= $_REQUEST['date'];
			$oetw_year	= date("Y", strtotime($oetw_day));
			$oetw_week	= date("W", strtotime($oetw_day));

			$extFunctionsConfig['extraLoad'] = "oetw_year = '$oetw_year' and oetw_week = '$oetw_week'";
		}

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_blogpost($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_blog_posts',
		'db_prefix'			=> 'oebp_',
		'pid'				=> 'oebp_id',
		'del'				=> 'oebp_del',
		'fields'			=> array('oebp_id','oebp_new2_id','oebp_old_img_promo_id','oebp_old_img_promo_single_id','oebp_featured','oebp_col_left','oebp_col_right','oebp_date_start','oebp_date_end','oebp_title','oebp_desc_short','oebp_keywords','oebp_media_id','oebp_state','oebp_url','oebp_created_ts','oebp_created_id','oebp_gallery_id','oebp_modified_ts','oebp_img_gallery','oebp_img_promo_id','oebp_img_promo_single_id','oebp_del','oebp_fid','oebp_sort','oebp_meta_keywords_auto','oebp_meta_keywords','oebp_meta_desc_auto','oebp_meta_desc','oebp_og_auto','oebp_og_image','oebp_og_title','oebp_og_description','oebp_og_url','oebp_og_site_name','oebp_vu_auto','oebp_vu_title','oebp_created_by','oebp_modified_by'),
		'update'			=> array('oebp_col_left','oebp_col_right'),
		'preSelect'			=> ' , (select oebc_name from oe_blog_categories where oebc_id = oebp_cat_id) as oebp_cat_id_human ',
		'extraInsert'		=> array('oebp_created_by' => $currUser, 'oebp_created_ts' => 'NOW'),
		//'extraLoad'			=> "oeb2c_posts_id = oebp_id ",
		'normalize'			=> array('string'=> array('oebp_col_left','oebp_col_right'),'int'=>array('oebp_old_img_promo_id','oebp_old_img_promo_single_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_inspiration($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_inspiration',
		'db_prefix'			=> 'oei_',
		'pid'				=> 'oei_id',
		'del'				=> 'oei_del',
		'fields'			=> array('oei_online','oei_id','oei_new2_id','oei_desc_long','oei_title','oei_desc_short','oei_keywords','oei_media_id','oei_state','oei_url','oei_created_ts','oei_created_id','oei_gallery_id','oei_modified_ts','oei_url_external','oei_img_gallery','oei_del','oei_fid','oei_sort','oei_meta_keywords_auto','oei_meta_keywords','oei_meta_desc_auto','oei_meta_desc','oei_og_auto','oei_og_image','oei_og_title','oei_og_description','oei_og_url','oei_og_site_name','oei_vu_auto','oei_vu_title','oei_created_by','oei_modified_by','oei_date_start','oei_date_end'),
		'extraInsert'		=> array('oei_created_by' => $currUser, 'oei_created_ts' => 'NOW'),
		'update'			=> array('oei_col_left','oei_col_right'),
		'normalize'			=> array('string'=> array('oei_col_left','oei_col_right'),'int'=>array('oei_img_promo_id','oei_img_single_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_partners($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_partners',
		'db_prefix'			=> 'oep_',
		'pid'				=> 'oep_id',
		'del'				=> 'oep_del',
		'fields'			=> array('oep_id','oep_new2_id','oep_desc_long','oep_title','oep_desc_short','oep_keywords','oep_media_id','oep_state','oep_url','oep_created_ts','oep_created_id','oep_gallery_id','oep_modified_ts','oep_img_gallery','oep_del','oep_fid','oep_sort','oep_meta_keywords_auto','oep_meta_keywords','oep_meta_desc_auto','oep_meta_desc','oep_og_auto','oep_og_image','oep_og_title','oep_og_description','oep_og_url','oep_og_site_name','oep_vu_auto','oep_vu_title','oep_created_by','oep_modified_by','oep_date_start','oep_date_end'),
		'extraInsert'		=> array('oep_created_by' => $currUser, 'oep_created_ts' => 'NOW'),
		'update'			=> array('oep_col_left','oep_col_right'),
		'normalize'			=> array('string'=> array('oep_col_left','oep_col_right'),'int'=>array('oep_img_promo_id','oep_img_single_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_designerprofiles($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_designer_profiles',
		'db_prefix'			=> 'oedp_',
		'pid'				=> 'oedp_id',
		'del'				=> 'oedp_del',
		'fields'			=> array('oedp_date_start','oedp_id','oedp_new2_id','oedp_name_first','oedp_name_last','oedp_bio','oedp_title','oedp_desc_short','oedp_keywords','oedp_media_id','oedp_state','oedp_url','oedp_created_ts','oedp_created_id','oedp_gallery_id','oedp_start_kw','oedp_end_kw','oedp_start-year','oedp_end_year','oedp_modified_ts','oedp_img_gallery','oedp_del','oedp_fid','oedp_sort','oedp_meta_keywords_auto','oedp_meta_keywords','oedp_meta_desc_auto','oedp_meta_desc','oedp_og_auto','oedp_og_image','oedp_og_title','oedp_og_description','oedp_og_url','oedp_og_site_name','oedp_vu_auto','oedp_vu_title','oedp_created_by','oedp_modified_by','oedp_date_start','oedp_date_end','oedp_year_week'),
		'extraInsert'		=> array('oedp_created_by' => $currUser, 'oedp_created_ts' => 'NOW'),
		'preSelect'			=> " , concat(oedp_start_year,'-',oedp_start_kw) as oedp_year_week  ",
		'update'			=> array('oedp_col_left','oedp_col_right','oedp_date_start'),
		'normalize'			=> array('string'=> array('oedp_col_left','oedp_col_right'),'int'=>array('oedp_img_promo_id','oedp_img_single_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}


	public static function handle_oe_frontpage_teaser_articles($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_frontpage_teaser_articles',
		'db_prefix'			=> 'oefta_',
		'pid'				=> 'oefta_id',
		'del'				=> 'oefta_del',
		'fields'			=> array('oefta_id' , 'oefta_title' , 'oefta_html' , 'oefta_s_id' , 'oefta_created_ts' , 'oefta_created_by' , 'oefta_modified_ts' , 'oefta_modified_by' , 'oefta_start_year' , 'oefta_start_kw' , 'oefta_end_year' , 'oefta_end_kw' ),
		'extraInsert'		=> array('oefta_created_by' => $currUser),
		'update'			=> array('oefta_title','oefta_html','oefta_s_id'),
		'normalize'			=> array('string'=> array('oefta_title','oefta_html'),'int'=>array('oefta_s_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}


	public static function handle_events($function)
	{
		
		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_events',
		'db_prefix'			=> 'oee_',
		'pid'				=> 'oee_id',
		'del'				=> 'oee_del',
		'fields'			=> array('oee_id','oee_new2_id','oee_date_from','oee_desc_long','oee_date_to','oee_title','oee_desc_short','oee_keywords','oee_media_id','oee_state','oee_url','oee_created_ts','oee_created_id','oee_gallery_id','oee_modified_ts','oee_img_gallery','oee_del','oee_fid','oee_sort','oee_meta_keywords_auto','oee_meta_keywords','oee_meta_desc_auto','oee_meta_desc','oee_og_auto','oee_og_image','oee_og_title','oee_og_description','oee_og_url','oee_og_site_name','oee_vu_auto','oee_vu_title','oee_created_by','oee_modified_by','oee_date_start','oee_date_end'),
		'extraInsert'		=> array('oee_created_by' => $currUser, 'oee_created_ts' => 'NOW'),
		'update'			=> array('oee_col_left','oee_col_right'),
		'preSelect'			=> " , (CURDATE() <= oee_date_to) as oee_online_2 ",
		'normalize'			=> array('string'=> array('oee_col_left','oee_col_right'),'int'=>array('oee_img_promo_id','oee_img_single_id'))
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}


	public static function handle_other_articles($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_other_articles',
		'db_prefix'			=> 'oeoa_',
		'pid'				=> 'oeoa_id',
		'del'				=> 'oeoa_del',
		'fields'			=> array('oeoa_id','oeoa_new2_id','oeoa_col_left','oeoa_col_right','oeoa_date_start','oeoa_date_end','oeoa_title','oeoa_desc_short','oeoa_keywords','oeoa_media_id','oeoa_state','oeoa_url','oeoa_created_ts','oeoa_created_id','oeoa_gallery_id','oeoa_modified_ts','oeoa_img_gallery','oeoa_img_promo_id','oeoa_img_promo_single_id','oeoa_del','oeoa_fid','oeoa_sort','oeoa_meta_keywords_auto','oeoa_meta_keywords','oeoa_meta_desc_auto','oeoa_meta_desc','oeoa_og_auto','oeoa_og_image','oeoa_og_title','oeoa_og_description','oeoa_og_url','oeoa_og_site_name','oeoa_vu_auto','oeoa_vu_title','oeoa_created_by','oeoa_modified_by'),
		'extraInsert'		=> array('oeoa_created_by' => $currUser, 'oeoa_created_ts' => 'NOW'),
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
			case 'imageRenderer_spot':

				//fall back: media


				$spot = dbx::query("select * from  e_spots_of_the_week where esotw_id = $mediaId");

				if ($spot === false)
				{
					$s_id = 0;
				} else {
					if (($spot['esotw_spotSubmission_id']>0))
					{
						$classic = dbx::query("select * from e_submissions where es_id = ".intval($spot['esotw_spotSubmission_id']));
						$s_id = $classic['es_video_poster_s_id'];
					} else {
						$classic = dbx::query("select * from e_archive_media where 	eam_id = ".intval($spot['esotw_spotMedia_id']));
						$s_id = $classic['eam_record_img_s_id'];
					}
				}

				if  (intval($s_id) == 0)
				{
					$s_id = 1171889;
				}


				$img = xredaktor_storage::xr_img2(array(
				s_id 		=> $s_id,
				w 			=> 178,
				h 			=> 100,
				q 			=> 85,
				fullpath 	=> 'Y',
				rmode		=> 'cco',
				ext			=> 'png',
				));

				$fullPath = $img['src'];
				imagesx::readfile_if_modified($fullPath,array('Content-Type: image/png'));
				die();


				break;
			case 'imageRenderer_print':


				//fallback: submission

				$spot = dbx::query("select * from  e_spots_of_the_week where esotw_id = $mediaId");

				if ($spot === false)
				{
					$s_id = 0;
				} else {
					if (($spot['esotw_printMedia_id']>0))
					{
						$classic = dbx::query("select * from e_archive_media where 	eam_id = ".intval($spot['esotw_printMedia_id']));
						$s_id = $classic['eam_record_img_s_id'];
					} else
					{
						$classic = dbx::query("select * from e_submissions where es_id = ".intval($spot['esotw_printSubmission_id']));
						$s_id = $classic['es_image_s_id'];
					}
				}


				if  (intval($s_id) == 0)
				{
					$s_id = 1171889;
				}

				$img = xredaktor_storage::xr_img2(array(
				s_id 		=> $s_id,
				w 			=> 100,
				h 			=> 100,
				q 			=> 85,
				fullpath 	=> 'Y',
				rmode		=> 'strict',
				ext			=> 'png',
				));

				$fullPath = $img['src'];
				imagesx::readfile_if_modified($fullPath,array('Content-Type: image/png'));
				die();


				break;
			case 'imageRenderer_classic':

				$spot = dbx::query("select * from  e_spots_of_the_week where esotw_id = $mediaId");

				if ($spot === false)
				{
					$s_id = 0;
				} else {
					if (($spot['esotw_classicSubmission_id']>0))
					{
						$classic = dbx::query("select * from e_submissions where es_id = ".intval($spot['esotw_classicSubmission_id']));
						$s_id = $classic['es_video_poster_s_id'];
					} else {
						$classic = dbx::query("select * from e_archive_media where 	eam_id = ".intval($spot['esotw_classicMedia_id']));
						$s_id = $classic['eam_record_img_s_id'];
					}
				}

				if  ($s_id == 0)
				{
					$s_id = 1171889;
				}


				$img = xredaktor_storage::xr_img2(array(
				s_id 		=> $s_id,
				w 			=> 178,
				h 			=> 100,
				q 			=> 85,
				fullpath 	=> 'Y',
				rmode		=> 'cco',
				ext			=> 'png',
				));

				$fullPath = $img['src'];
				imagesx::readfile_if_modified($fullPath,array('Content-Type: image/png'));
				die();

				break;


			case 'img_orig':

				if  (intval($mediaId) == 0)
				{
					$mediaId = 1171889;
				}

				$full 	= xredaktor_storage::getById($mediaId,true);
				$webSrc = $full['webSrc'];

				header("Location: $webSrc");


				die();

			case 'galleryImg':

				if  (intval($mediaId) == 0)
				{
					$mediaId = 1171889;
				}


				$img = xredaktor_storage::xr_img2(array(
				s_id 		=> $mediaId,
				w 			=> 200,
				h 			=> 200,
				q 			=> 85,
				fullpath 	=> 'Y',
				rmode		=> 'strict',
				ext			=> 'png',
				));

				$fullPath = $img['src'];
				imagesx::readfile_if_modified($fullPath,array('Content-Type: image/png'));
				die();

				break;
			case 'titleImg':

				if  (intval($mediaId) == 0)
				{
					$mediaId = 1171889;
				}


				$img = xredaktor_storage::xr_img2(array(
				s_id 		=> $mediaId,
				w 			=> 120,
				h 			=> 37,
				q 			=> 85,
				fullpath 	=> 'Y',
				rmode		=> 'cco',
				ext			=> 'png',
				));

				$fullPath = $img['src'];
				imagesx::readfile_if_modified($fullPath,array('Content-Type: image/png'));
				die();
				break;
			case 'inpsiration':

				if  (intval($mediaId) == 0)
				{
					$mediaId = 1171889;
				}


				$img = xredaktor_storage::xr_img2(array(
				s_id 		=> $mediaId,
				w 			=> 71,
				h 			=> 50,
				q 			=> 85,
				fullpath 	=> 'Y',
				rmode		=> 'cco',
				ext			=> 'png',
				));

				$fullPath = $img['src'];
				imagesx::readfile_if_modified($fullPath,array('Content-Type: image/png'));
				die();

				break;


			case 'partner':

				if  (intval($mediaId) == 0)
				{
					$mediaId = 1171889;
				}


				$img = xredaktor_storage::xr_img2(array(
				s_id 		=> $mediaId,
				w 			=> 76,
				h 			=> 50,
				q 			=> 85,
				fullpath 	=> 'Y',
				rmode		=> 'cco',
				ext			=> 'png',
				));

				$fullPath = $img['src'];
				imagesx::readfile_if_modified($fullPath,array('Content-Type: image/png'));
				die();

			case 'blog':

				if  (intval($mediaId) == 0)
				{
					$mediaId = 1171889;
				}


				$img = xredaktor_storage::xr_img2(array(
				s_id 		=> $mediaId,
				w 			=> 150,
				h 			=> 50,
				q 			=> 85,
				fullpath 	=> 'Y',
				rmode		=> 'cco',
				ext			=> 'png',
				));

				$fullPath = $img['src'];
				imagesx::readfile_if_modified($fullPath,array('Content-Type: image/png'));
				die();


			case 'event':

				if  (intval($mediaId) == 0)
				{
					$mediaId = 1171889;
				}


				$img = xredaktor_storage::xr_img2(array(
				s_id 		=> $mediaId,
				w 			=> 69,
				h 			=> 50,
				q 			=> 85,
				fullpath 	=> 'Y',
				rmode		=> 'cco',
				ext			=> 'png',
				));

				$fullPath = $img['src'];
				imagesx::readfile_if_modified($fullPath,array('Content-Type: image/png'));
				die();

				break;

			case 'dprofile':

				if  (intval($mediaId) == 0)
				{
					$mediaId = 1171889;
				}


				$img = xredaktor_storage::xr_img2(array(
				s_id 		=> $mediaId,
				w 			=> 45,
				h 			=> 60,
				q 			=> 85,
				fullpath 	=> 'Y',
				rmode		=> 'cco',
				ext			=> 'png',
				));

				$fullPath = $img['src'];
				imagesx::readfile_if_modified($fullPath,array('Content-Type: image/png'));
				die();

				break;

			case 'oarticle':

				if  (intval($mediaId) == 0)
				{
					$mediaId = 1171889;
				}


				$img = xredaktor_storage::xr_img2(array(
				s_id 		=> $mediaId,
				w 			=> 72,
				h 			=> 50,
				q 			=> 85,
				fullpath 	=> 'Y',
				rmode		=> 'cco',
				ext			=> 'png',
				));

				$fullPath = $img['src'];
				imagesx::readfile_if_modified($fullPath,array('Content-Type: image/png'));
				die();

				break;


				break;
			default:break;
		}
	}


}
