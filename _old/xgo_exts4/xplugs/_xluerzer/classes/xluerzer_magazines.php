<?

/*
1 .. PRINT
2 .. TVC
3 .. STUDENTS
4 .. WEB
5 .. APP
6 .. STUDENTS_VIDEO
*/


class xluerzer_magazines
{

	public static $skipCredits_print 	= 0;
	public static $skipCredits_video 	= 0;
	public static $skipCredits_student 	= 0;
	public static $skipCredits_app 		= 0;
	public static $skipCredits_web 		= 0;
	public static $totalOK 				= 1;

	public static function defaultAjaxHandler($function,$param_0)
	{

		switch ($function)
		{
			case 'campaign_view':
				self::handleCampaignOverview($param_0);
			case 'overview':
				self::handleOverview($param_0);
				break;
			case 'save_interviews':
				self::save_interviews($param_0);
				break;
			case 'save_fp':
				self::save_fp($param_0);
				break;
			case 'autoCampaign':
				self::autoCampaign($param_0);
				break;
			case 'save_detail':
				self::save_detail($param_0);
				break;
			case 'details':
				self::handleDetails($param_0);
				break;
			case 'publish':
				self::publish($param_0);
				break;
			case 'submissions':
				self::handleSubmissions($param_0);
				break;
			case 'published':
				self::published($param_0);
				break;
			case 'preselections':
				self::preselections($param_0);
				break;
			case 'selections':
				self::selections($param_0);
				break;
			case 'interviews':
				self::handleInterviews($param_0);
				break;
			case 'digitalInterviews':
				self::handleDigitalInterviews($param_0);
				break;
			case 'apps':
				self::handleApps($param_0);
				break;
			case 'web':
				self::handleWeb($param_0);
				break;
			case 'students':
				self::handleStudents($param_0);
				break;

			default:
				die('JJJ');
		}
	}


	public static function check_feprofilechange($fep_id) {

		$data = dbx::query("select fep_modified_by_fe_user from fe_profiles where fep_contact_id = $fep_id");

		if ($data['fep_modified_by_fe_user'] == '0') {
			return false;
		}
		else {
			return true;
		}

	}

	public static function check_coverImage($em_id) {

		$isEmpty = dbx::query ("select em_cover_s_id, em_id from e_magazine where em_id = $em_id");

		if ($isEmpty['em_cover_s_id'] == '0') {
			self::$totalOK = 0;
			return 'MISSING';
		}
		else {
			return 'PRESENT';
		}
	}

	public static function check_description($em_id) {

		$isEmpty = dbx::query ("select em_descripton, em_id from e_magazine where em_id = $em_id");

		if ($isEmpty['em_description'] == '0') {
			self::$totalOK = 0;
			return 'MISSING';
		}
		else {
			return 'PRESENT';
		}
	}

	public static function check_interview($em_id) {

		$isEmpty = dbx::query ("select * from e_interviews where ei_magazine_id = $em_id");

		if ($isEmpty === false) {
			self::$totalOK = 0;
			return 'MISSING';
		}
		else {
			return 'PRESENT';
		}

	}

	public static function check_digital_interview($em_id) {

		$isEmpty = dbx::query ("select * from e_digital_interviews where edi_magazine_id = $em_id");

		if ($isEmpty === false) {
			self::$totalOK = 0;
			return 'MISSING';
		}
		else {
			return 'PRESENT';
		}
	}


	public static function check_submissions_print($em_id) {

		$data = dbx::query ("select count(es_id) as cnt from e_submissions where es_magazine_id = $em_id and (es_state = 5 or es_state = 9) and es_mediaType_id = 1");
		$count = $data['cnt'];

		if ($count == 0) {
			self::$totalOK = 0;
			self::$skipCredits_print = 1;
			return 'MISSING ('.$count.'<150)';
		}

		else if ($count < 150) {
			self::$totalOK = 0;
			return 'MISSING ('.$count.'<150)';
		}
		else {
			return 'PRESENT ('.$count.'>150)';
		}
	}


	public static function check_submissions_print_credits($em_id) {

		if (self::$skipCredits_print == 1) {
			return 'NO SUBMISSIONS FOUND';
		}
		else {
			$data = dbx::queryAll ("select es_id, es_magazine_id, es_state, es_mediaType_id from e_submissions where es_magazine_id =$em_id and (es_state = 5 or es_state = 9) and es_mediaType_id = 1 and (es_id NOT IN (SELECT esc_submission_id FROM e_submissions_credits))");

			if ($data === false) {
				return 'ALL PRESENT';
			}
			else {
				$count = count($data);
				self::$totalOK = 0;
				return 'MISSING '.$count;
			}
		}
	}

	public static function check_submissions_video($em_id) {

		$data = dbx::query ("select count(es_id) as cnt from e_submissions where es_magazine_id = $em_id and (es_state = 5 or es_state = 9) and es_mediaType_id = 2");
		$count = $data['cnt'];

		if ($count == 0) {
			self::$skipCredits_video = 1;
			self::$totalOK = 0;
			return 'MISSING ('.$count.'<50)';
		}
		else if ($count < 50) {
			self::$totalOK = 0;
			return 'MISSING ('.$count.'<50)';
		}
		else {
			return 'PRESENT ('.$count.'>50)';
		}
	}

	public static function check_submissions_video_credits($em_id) {

		if (self::$skipCredits_video == 1) {
			return 'NO SUBMISSIONS FOUND';
		}
		else {

			$data = dbx::queryAll ("select es_id, es_magazine_id, es_state, es_mediaType_id from e_submissions where es_magazine_id =$em_id and (es_state = 5 or es_state = 9) and es_mediaType_id = 2 and (es_id NOT IN (SELECT esc_submission_id FROM e_submissions_credits))");

			if ($data === false) {
				return 'ALL PRESENT';
			}
			else {
				$count = count($data);
				self::$totalOK = 0;
				return 'MISSING '.$count;
			}
		}
	}

	public static function check_submissions_digital($em_id) {

		/*
		$data = dbx::query ("select count(eam_id) as cnt from e_archive_media where eam_magazine_id = $em_id and (eam_type = 4 or eam_type = 5)");
		$count = $data['cnt'];
		*/

		$dataApp 	= dbx::query("select count(eda_id) as cnt from e_digital_app where eda_magazine_id = $em_id");
		$countApp	= $dataApp['cnt'];

		$dataWeb 	= dbx::query("select count(edw_id) as cnt from e_digital_web where edw_magazine_id = $em_id");
		$countweb	= $dataWeb['cnt'];

		$count 		= $countApp + $countweb;

		if ($count == 0) {
			self::$skipCredits_app = 1;
			self::$skipCredits_web = 1;
			self::$totalOK = 0;
			return 'MISSING ('.$count.'<10)';
		}
		else if ($count < 10) {
			self::$totalOK = 0;
			return 'MISSING ('.$count.'<10)';
		}
		else {
			return 'PRESENT ('.$count.'>10)';
		}
	}

	public static function check_submissions_web_credits($em_id) {

		if (self::$skipCredits_app == 1) {
			return 'NO SUBMISSIONS FOUND';
		}
		else {
			$data = dbx::queryAll ("select edw_id, edw_magazine_id, edw_state from e_digital_web where edw_magazine_id =$em_id and (edw_state = 5 or edw_state = 9) and (edw_id NOT IN (SELECT edwc_digital_web_id FROM e_digital_web_credits))");

			if ($data === false) {
				return 'ALL PRESENT';
			}
			else {
				$count = count($data);
				self::$totalOK = 0;
				return 'MISSING '.$count;
			}
		}
	}

	public static function check_submissions_app_credits($em_id) {

		if (self::$skipCredits_app == 1) {
			return 'NO SUBMISSIONS FOUND';
		}
		else {
			$data = dbx::queryAll ("select eda_id, eda_magazine_id, eda_state from e_digital_app where eda_magazine_id =$em_id and (eda_state = 5 or eda_state = 9) and (eda_id NOT IN (SELECT edac_digital_app_id FROM e_digital_app_credits))");

			if ($data === false) {
				return 'ALL PRESENT';
			}
			else {
				$count = count($data);
				self::$totalOK = 0;
				return 'MISSING '.$count;
			}
		}
	}

	public static function check_submissions_students($em_id) {

		$data = dbx::query ("select count(ess_id) as cnt from e_submissions_students where ess_magazine_id = $em_id and (ess_state = 5 or ess_state = 9)");
		$count = $data['cnt'];

		if ($count == 0) {
			self::$skipCredits_student = 1;
			self::$totalOK = 0;
			return 'MISSING ('.$count.'<2)';
		}
		else if ($count < 2) {
			self::$totalOK = 0;
			return 'MISSING ('.$count.'<2)';
		}
		else {
			return 'PRESENT ('.$count.'>2)';
		}
	}

	public static function check_submissions_students_credits($em_id) {

		if (self::$skipCredits_student == 1) {
			return 'NO SUBMISSIONS FOUND';
		}
		else {
			$data = dbx::queryAll ("select ess_id, ess_magazine_id, ess_state, ess_mediaType_id from e_submissions_students where ess_magazine_id =$em_id and (ess_state = 5 or ess_state = 9) and (ess_id NOT IN (SELECT essc_submission_id FROM e_submissions_students_credits))");

			if ($data === false) {
				return 'ALL PRESENT';
			}
			else {
				$count = count($data);
				self::$totalOK = 0;
				return 'MISSING '.$count;
			}
		}

	}
	
	
	public static function check_submission_countries($em_id) {
				
		$em_id = intval($em_id);
		
		$data = dbx::query("select es_id, es_country_id, es_state from e_submissions where es_magazine_id = $em_id and es_country_id = 0 and (es_state = 5 or es_state = 9)");

		if ($data !== false) 
		{
			self::$totalOK = 0;
			
			$missingData = array();
			
			foreach ($data as $k => $v) {
				$missingData[] = $v['es_id'];
			}
			
			$missingStr = implode(",",$missingData);
			
			return 'Country missing in Submission(s): '.$missingStr;
		}

		else 
		{
			return 'All OK';
		}
	}
	
	
	public static function check_submission_categories($em_id) {
					
		$em_id = intval($em_id);				
			
		$data = dbx::query("select es_id, es_category_id, es_state from e_submissions where es_magazine_id = $em_id and es_category_id = NULL and (es_state = 5 or es_state = 9)");

		if ($data !== false) 
		{
			self::$totalOK = 0;
			
			$missingData = array();
			
			foreach ($data as $k => $v) {
				$missingData[] = $v['es_id'];
			}
			
			$missingStr = implode(",",$missingData);
			
			return 'Category missing in Submission(s): '.$missingStr;
		}
		else 
		{
			return 'All OK';
		}
		
	}



	public static function publish()
	{
		/*
		REQUIREMENTS:
		translations duerfen fehlen
		print	150
		videos	50
		students	2
		DIGITAL	Summe von 10
		*/

		$em_id 	= intval($_REQUEST['em_id']);
		$check 	= intval($_REQUEST['check']);
		
		$em_type = dbx::queryAttribute("select * from e_magazine where em_id = $em_id", "em_type");
		
		// special
		if ($em_type != 1)
		{
			$state = array(
	
			'Cover Image' 			=> self::check_coverImage($em_id),
			'Magazine Description' 	=> self::check_description($em_id),
			'Prints' 				=> self::check_submissions_print($em_id),
			'Print Credits' 		=> self::check_submissions_print_credits($em_id),
			'Submission Countries'	=> self::check_submission_countries($em_id),
			'Submission Categories'	=> self::check_submission_categories($em_id)
			);
				
		}
		
		// normales magazine
		else
		{
			$state = array(

			'Cover Image' 			=> self::check_coverImage($em_id),
			'Magazine Description' 	=> self::check_description($em_id),
			'Prints' 				=> self::check_submissions_print($em_id),
			'Print Credits' 		=> self::check_submissions_print_credits($em_id),
			'Videos' 				=> self::check_submissions_video($em_id),
			'Video Credits' 		=> self::check_submissions_video_credits($em_id),
			'Students' 				=> self::check_submissions_students($em_id),
			'Student Credits' 		=> self::check_submissions_students_credits($em_id),
			'Digital' 				=> self::check_submissions_digital($em_id),
			'Digital App Credits' 	=> self::check_submissions_app_credits($em_id),
			'Digital Web Credits' 	=> self::check_submissions_web_credits($em_id),
			'Digital Interview' 	=> self::check_digital_interview($em_id),
			'Interview' 			=> self::check_interview($em_id),
			'Submission Countries'	=> self::check_submission_countries($em_id),
			'Submission Categories'	=> self::check_submission_categories($em_id)
			);
		}
		
		
		if ($check == 2)
		{
			self::publishMagazineNow($em_id);
			frontcontrollerx::json_success(array('publish'=>$state,'publish_state'=>true));
		}

		if (self::$totalOK == 1 && $check == 0) {
			self::publishMagazineNow($em_id);
			frontcontrollerx::json_success(array('publish'=>$state,'publish_state'=>true));
		}
		else if (self::$totalOK == 1 && $check == 1) {
			frontcontrollerx::json_success(array('publish'=>$state,'publish_state'=>false, 'no_errors_found' => true));
		}
		else {
			frontcontrollerx::json_success(array('publish'=>$state,'publish_state'=>false));
		}

	}


	public static function publishMagazineNow($em_id) {

		set_time_limit(0);

		$em_id = intval($em_id);
		if (($em_id == 0))
		{
			die('INVALID MAGAZINE');
		}

		$m 			= dbx::query("select * from e_magazine where em_id = $em_id");
		$mYear		= $m['em_year'];
		
		$isSpecial 	= false;
		
		if ($m['em_type'] != 1)
		{
			$isSpecial = true;	
		}
		

		$data 		= dbx::update('e_magazine',array(

		'em_name_publish' 				=> $m['em_name'],
		'em_descripton_publish'			=> $m['em_descripton'],
		'em_frontpage_title_publish'	=> $m['em_frontpage_title'],
		'em_frontpage_text_publish'		=> $m['em_frontpage_text'],

		'em_published'					=> 0,

		),array('em_id'=>$em_id));

		## submissions

		$submissions 	= dbx::queryAll("select es_id,es_mediaType_id from e_submissions where es_magazine_id = $em_id and (es_state = 5 or es_state = 9) ",true); // SELECTED
		$submissionsCnt = dbx::queryAttribute("select count(es_id) as cntx from e_submissions where es_magazine_id = $em_id and (es_state = 5 or es_state = 9) ","cntx"); // SELECTED
		
		foreach ($submissions as $i => $s)
		{

			$es_id = $s['es_id'];
			$es_mediaType_id = $s['es_mediaType_id'];


			echo "<h1>Publish Submission: $es_id [$es_mediaType_id] ($i / $submissionsCnt) </h1>";
			flush();
			ob_flush();
			flush();
			ob_flush();
			
			$eam_id = xluerzer_publish::submission_publish($es_id,false);
			$url 	= fe_vanityurls::genUrl_archive_media_detail($eam_id);
			$url2 	= "http://www.luerzersarchive.com".$url."?IGNORE_PUBLISH_STATE";
			
			echo "<h3>Fetching URL (GENERATING IMAGES): <a href='$url2' target='INSPECT_IT'>$url2</a></h3>";
			
			flush();
			ob_flush();
			flush();
			ob_flush();
			file_get_contents($url2);
			
		}


		

		## web
		$web = dbx::queryAll("select * from e_digital_web where edw_magazine_id = $em_id ",false);
		foreach ($web as $r)
		{
			$edw_id = $r['edw_id'];
			
			
			
			echo "<h1>Publish Web: $edw_id</h1>";
			flush();
			ob_flush();
			flush();
			ob_flush();
			
			$eam_id = xluerzer_publish::e_publish('e_digital_web',$edw_id,false);
			
			$url 	= fe_vanityurls::genUrl_archive_media_detail($eam_id);
			$url2 	= "http://www.luerzersarchive.com".$url."?IGNORE_PUBLISH_STATE";
			
			echo "<h3>Fetching URL (GENERATING IMAGES): $url2</h3>";
			
			flush();
			ob_flush();
			flush();
			ob_flush();
			file_get_contents($url2);
			
		}

		## app
		$app = dbx::queryAll("select * from e_digital_app where eda_magazine_id = $em_id ",false);
		foreach ($app as $r)
		{
			$eda_id = $r['eda_id'];
			
			echo "<h1>Publish App: $eda_id</h1>";
			flush();
			ob_flush();
			flush();
			ob_flush();
			
			$eam_id = xluerzer_publish::e_publish('e_digital_app',$eda_id,false);
			
			$url 	= fe_vanityurls::genUrl_archive_media_detail($eam_id);
			$url2 	= "http://www.luerzersarchive.com".$url."?IGNORE_PUBLISH_STATE";
			
			echo "<h3>Fetching URL (GENERATING IMAGES): $url2</h3>";
			
			flush();
			ob_flush();
			flush();
			ob_flush();
			file_get_contents($url2);
			
		}
		
		

		### digital interview
		$edi = dbx::query("select * from e_digital_interviews where edi_magazine_id = $em_id");
		if ($edi !== false)
		{
			$edi_id = $edi['edi_id'];
			
			echo "<h1>Publish Digital Interview: $edi_id</h1>";
			flush();
			ob_flush();
			flush();
			ob_flush();
			
			xluerzer_publish::e_publish('e_digitalInterviews',$edi_id,false);
			
			$url 	= fe_vanityurls::genUrl_digital_interview_detail($edi_id);
			$url2 	= "http://www.luerzersarchive.com".$url."?IGNORE_PUBLISH_STATE";
			
			echo "<h3>Fetching URL (GENERATING IMAGES): $url2</h3>";
			
			flush();
			ob_flush();
			flush();
			ob_flush();
			file_get_contents($url2);
			
		}
		
		

		### interview
		$ei = dbx::query("select * from e_interviews where ei_magazine_id = $em_id");
		if ($ei !== false)
		{
			$ei_id = $ei['ei_id'];
			
			echo "<h1>Publish Interview: $ei_id</h1>";
			flush();
			ob_flush();
			flush();
			ob_flush();
			
			xluerzer_publish::e_publish('e_interviews',$ei_id,false);
			
			$url 	= fe_vanityurls::genUrl_interview_detail($ei_id);
			$url2 	= "http://www.luerzersarchive.com".$url."?IGNORE_PUBLISH_STATE";
			
			echo "<h3>Fetching URL (GENERATING IMAGES): $url2</h3>";
			
			flush();
			ob_flush();
			flush();
			ob_flush();
			file_get_contents($url2);
		}

		$data = dbx::update('e_magazine',array(
		'em_published' => 1,
		),array('em_id'=>$em_id));

		$url = "http://www.luerzersarchive.com".fe_vanityurls::genUrl_magazine_detail($em_id);
		
		if ($isSpecial === true)
		{
			$url = "http://www.luerzersarchive.com".fe_vanityurls::genUrl_specials_overview_year($mYear)."?DISABLE_FULL_CACHE";
		}
		
		
		echo "<h1>Magazin $em_id is published.... ;-)</h1>"; 
		echo "<h1><a href='http://luerzersarchive.net/datamigration/mailsAfterPublish.php?magazine_id=$em_id'>Click here to send Emails to published Contacts</a>";
		echo "<h3><a href='$url' target='INSPECT_IT'>$url</a></h3>"; 
		
		
		die();
		
		return $data;
	}

	public static function handleCampaignOverview()
	{
		$em_id 	= intval($_REQUEST['em_id']);

		$es_state = " and es_state in (5) ";

		$search = "";

		if (isset($_REQUEST['_query']))
		{
			$q = addslashes(dbx::escape($_REQUEST['_query']));

			$search = " and es_campaign like '%$q%' ";
		}

		$sql_data 	= "SELECT es_id,es_infotext,es_archivNr, (select ac_name from a_category where es_category_id = ac_id ) as ac_name,  es_campaign_admin, count(es_campaign_admin) as cntx , group_concat(es_id) as es_ids , group_concat(DISTINCT es_fe_user_id SEPARATOR '<br>') as fe_users_ids FROM `e_submissions` WHERE  `es_magazine_id` = $em_id $es_state $search group by es_campaign_admin";
		$sql_cnt 	= "SELECT count(distinct(es_campaign_admin)) as sql_cnt FROM `e_submissions` WHERE  `es_magazine_id` = $em_id $es_state  $search";


		if (!isset($_REQUEST['sort'])&&(isset($_REQUEST['initSort'])))
		{
			$_REQUEST['sort'] = $_REQUEST['initSort'];
		}

		if (isset($_REQUEST['sort']))
		{
			$sorter = json_decode($_REQUEST['sort'],true);

			$sql_data .= " ORDER BY ";
			$tmp = array();

			foreach ($sorter as $s)
			{
				$field = $s['property'];
				$tmp[] = $field." ".$s['direction'];
			}

			$sql_data.= implode(",",$tmp);
		}



		$nodes 		= dbx::queryAll($sql_data);
		$totalCount = dbx::queryAttribute($sql_cnt,'sql_cnt');


		foreach ($nodes as &$n)
		{
			$es_id = $n['es_id'];
			$credits = dbx::queryAttribute("select group_concat(t.contact SEPARATOR '<br> ') as credits from (SELECT concat (act_description, ': (',ec_company, ') ',ec_firstname, ' ',ec_lastname) as contact FROM a_contact_type,e_contacts,`e_submissions_credits` WHERE `esc_submission_id` = $es_id and `esc_contact_id` = ec_id and esc_contactType_id = act_id order by act_description asc ) t","credits");
			$n['credits'] = $credits;
		}


		$sql_data_clean = str_replace(array("\t","\n"),array(" "," "),$sql_data);

		frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true,'sql'=>$sql_data_clean));




	}

	public static function handleOverview($function)
	{
		$type = $_REQUEST['type'];
		switch ($type)
		{
			case 'specials':
				$em_type = " ( em_type != 1  and em_type != 0 ) ";
				$em_type_insert = 3;
				break;
			default:
				$em_type = " em_type = 1  ";
				$em_type_insert = 1;
		}

		$currUser = xluerzer_user::getCurrentUserId();


		$extFunctionsConfig = array(
		'table'				=> 'e_magazine',
		'db_prefix'			=> 'em_',
		'pid'				=> 'em_id',
		'fid'				=> 'em_fid',
		'sort'				=> 'em_sort',
		'del'				=> 'em_del',
		'fields'			=> array('em_id', 'em_name', 'em_published', 'em_published_day', 'em_descripton', 'em_year', 'em_edition', 'em_type','em_cover_s_id','em_translations_json','em_del','em_fid','em_sort','em_created_ts','em_modified_ts','em_modified_by','em_year_edition'),
		'extraInsert'		=> array('em_created_ts' => 'NOW()', 'em_created_by' => $currUser,'em_type'=>$em_type_insert,'em_year'=>'NOW()'),
		'preSelect'			=> " , concat(em_year, '-',em_edition) as em_year_edition  ",
		'extraLoad'			=> " $em_type ",
		'specialSorts'		=> array('em_year_edition'),
		'update'			=> array(),
		'normalize'			=> array()
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}


	public static function save_interviews($function)
	{
		$em_id 	= intval($_REQUEST['em_id']);
		$data 	= json_decode($_REQUEST['data'],true);

		$ei_id 	= intval($data['interview']);
		$edi_id = intval($data['digital_interview']);



		$m = dbx::query("select * from e_magazine where em_id = $em_id");
		$m_year 	= $m['em_year'];
		$m_edition	= $m['em_edition'];


		if ($ei_id != 0)
		{
			$em_id_ei_data		= dbx::query("select * from e_interviews where ei_id = $ei_id");
			$em_id_ei_id		= $em_id_ei_data['ei_magazine_id'];
			$em_id_ei_partner	= $em_id_ei_data['ei_title'];

			//die(print_r($em_id_ei_data));

			//$em_id_ei_id	= dbx::queryAttribute("select * from e_interviews where ei_id = $ei_id","ei_magazine_id");

			if (($em_id_ei_id != 0) && ($em_id_ei_id != $em_id)) {
				frontcontrollerx::json_failure('wrong selection, interview already assigned to mag: '.$em_id_ei_id);
			}




			dbx::update('e_interviews',array('ei_magazine_id'=>$em_id,'ei_edition'=>$m_edition,'ei_year'=>$m_year),array('ei_id'=>$ei_id));
		}

		if ($edi_id != 0)
		{
			$em_id_edi_data 	= dbx::query("select * from e_digital_interviews where edi_id 	= $edi_id");
			$em_id_edi_id 		= $em_id_edi_data['edi_magazine_id'];
			$em_id_edi_partner 	= $em_id_edi_data['edi_title'];

			if (($em_id_edi_id != 0) && ($em_id_edi_id != $em_id)) {
				frontcontrollerx::json_failure('wrong selection, digital interview already assigned to mag:'.$em_id_edi_id);
			}

			dbx::update('e_digital_interviews',array('edi_magazine_id'=>$em_id,'edi_edition'=>$m_edition,'edi_year'=>$m_year),array('edi_id'=>$edi_id));
		}

		frontcontrollerx::json_success(array('record' => array('interview_partner' => $em_id_ei_partner, 'digital_interview_partner' => $em_id_edi_partner)));
	}

	public static function save_fp($function)
	{
		$em_id = intval($_REQUEST['em_id']);
		$save = array("em_frontpage_publish","em_frontpage_s_id","em_frontpage_title","em_frontpage_text");
		$data = json_decode($_REQUEST['data'],true);
		$db = array();

		foreach ($save as $f)
		{
			$db[$f] = ($data[$f]);
		}

		dbx::update('e_magazine',$db,array('em_id'=>$em_id));

		file_get_contents("http://lz-www.xgodev.com/en/start.html?UPDATE_CACHE");

		frontcontrollerx::json_success();
	}

	public static function autoCampaign($param_0)
	{

		$em_id = intval($_REQUEST['em_id']);

		dbx::query("update e_submissions set es_campaign = trim(es_campaign);");

		$checkSubmissions = dbx::queryAll("SELECT es_campaign, count(es_campaign) as cntx , group_concat(es_id) as es_ids , group_concat(DISTINCT es_fe_user_id SEPARATOR ',') as fe_users_ids, count(distinct(es_fe_user_id)) as cnt_users FROM `e_submissions` WHERE  `es_magazine_id` = $em_id group by es_campaign order by cnt_users desc ",false);


		foreach ($checkSubmissions as $s)
		{
			$cnt_users 		= intval($s['cnt_users']);
			$es_campaign 	= $s['es_campaign'];
			$es_ids 		= $s['es_ids'];

			if ($cnt_users < 2) break;

			$sql = "SELECT distinct(es_fe_user_id) FROM `e_submissions` WHERE  `es_magazine_id` = $em_id and es_campaign='".str_replace("'","\\'",$es_campaign)."' ";
			$fe_users_ids 	= dbx::queryAll($sql);

			foreach ($fe_users_ids as $u)
			{
				$fe_user_id = intval($u['es_fe_user_id']);
				$es_campaign_new = trim($es_campaign . ' [AUTO] '.$fe_user_id);
				$sql = " update e_submissions set es_campaign = '".str_replace("'","\\'",$es_campaign_new)."' where es_fe_user_id = $fe_user_id and es_campaign = '".str_replace("'","\\'",$es_campaign)."' and `es_magazine_id` = $em_id  ";
				dbx::query($sql);
			}
		}



		frontcontrollerx::json_success();
	}

	public static function save_detail($function)
	{

		/*
		em_cover_s_id: "286257"
		em_description: ""
		em_edition: "1"
		em_name: "Issue 1/2014"
		em_type: "1"
		em_year: "2014"
		translation_en_s_id: ""
		translation_es_s_id: ""
		translation_it_s_id: ""
		translation_jp_s_id: ""

		*/

		$em_id = intval($_REQUEST['em_id']);
		$save = array("em_cover_s_id","em_descripton","em_edition","em_name","em_type","em_year","em_paywall_break_digital","em_paywall_break_film");
		$data = json_decode($_REQUEST['data'],true);
		$db = array();

		foreach ($save as $f)
		{
			$db[$f] = ($data[$f]);
		}


		$translation_fr_s_id = intval($data['translation_fr_s_id']);
		$translation_sp_s_id = intval($data['translation_sp_s_id']);
		$translation_it_s_id = intval($data['translation_it_s_id']);
		$translation_jp_s_id = intval($data['translation_jp_s_id']);
		$translation_ru_s_id = intval($data['translation_ru_s_id']);

		$translations = array(
		'fr' => $translation_fr_s_id,
		'sp' => $translation_sp_s_id,
		'it' => $translation_it_s_id,
		'jp' => $translation_jp_s_id,
		'ru' => $translation_ru_s_id,
		);

		$db['em_translations_json'] = json_encode($translations);
		$db['em_modified_by'] 		= xluerzer_user::getCurrentUserId();

		dbx::update('e_magazine',$db,array('em_id'=>$em_id));
		frontcontrollerx::json_success();
	}

	public static function handleDetails($function)
	{
		$em_id 	= intval($_REQUEST['em_id']);
		$record = dbx::query("select * from e_magazine where em_id = $em_id");

		$translations = json_decode($record['em_translations_json'],true);

		$translation_fr_s_id = intval($translations['fr']);
		$translation_sp_s_id = intval($translations['sp']);
		$translation_it_s_id = intval($translations['it']);
		$translation_jp_s_id = intval($translations['jp']);
		$translation_ru_s_id = intval($translations['ru']);

		$record['translation_fr_s_id']=$translation_fr_s_id;
		$record['translation_sp_s_id']=$translation_sp_s_id;
		$record['translation_it_s_id']=$translation_it_s_id;
		$record['translation_jp_s_id']=$translation_jp_s_id;
		$record['translation_ru_s_id']=$translation_ru_s_id;

		$data_interview 		= dbx::query("select * from e_interviews where ei_magazine_id = $em_id");
		$data_digitalinterview 	= dbx::query("select * from e_digital_interviews where edi_magazine_id = $em_id");

		$record['interview'] 			= $data_interview['ei_id'];
		$record['interview_partner'] 	= $data_interview['ei_title'];

		$record['digital_interview'] 			= $data_digitalinterview['edi_id'];
		$record['digital_interview_partner'] 	= $data_digitalinterview['edi_title'];

		//$record['interview']			= dbx::queryAttribute("select ei_id from e_interviews where ei_magazine_id = $em_id","ei_id");
		//$record['digital_interview']	= dbx::queryAttribute("select edi_id from e_digital_interviews where edi_magazine_id = $em_id","edi_id");

		frontcontrollerx::json_success(array('record'=>$record));
	}

	public static function handleSubmissions($function)
	{

		$em_id 	= intval($_REQUEST['em_id']);

		$es_mediaType_id = intval($_REQUEST['es_mediaType_id']);

		$filter = intval($_REQUEST['filter']);
		if ($filter > 0)
		{
			$es_state = " es_state = $filter and ";
		}

		$extFunctionsConfig = array(
		'table'				=> 'e_submissions',
		'db_prefix'			=> 'es_',
		'pid'				=> 'es_id',
		'fid'				=> 'es_fid',
		'sort'				=> 'es_sort',
		'del'				=> 'es_del',
		'preSelect'			=> " , ( select ec_company from e_contacts, e_submissions_credits where ec_id = esc_contact_id and esc_contactType_id = 7 and esc_submission_id = es_id LIMIT 1) as credit_client",
		'fields'			=> array('es_id', 'es_backend_upload', 'es_mediaType_id', 'es_magazine_id','es_image_s_id','es_client','es_product','es_submittedBy','es_ad_title','es_product'),
		'extraLoad'			=> " es_magazine_id = $em_id and $es_state es_mediaType_id=$es_mediaType_id ",
		'update'			=> array(),
		'normalize'			=> array(),
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}

	public static function submissions_post($nodes,$totalCount)
	{
		foreach ($nodes as &$n)
		{
		}
		return array($nodes,$totalCount);
	}

	public static function preselections($function)
	{


		$em_id = intval($_REQUEST['em_id']);

		$extFunctionsConfig = array(
		'table'				=> 'e_submissions',
		'db_prefix'			=> 'es_',
		'pid'				=> 'es_id',
		'fid'				=> 'es_id',
		'sort'				=> 'es_id',
		'del'				=> 'es_del',
		'fields'			=> array('es_id', 'es_backend_upload', 'es_mediaType_id', 'es_magazine_id','es_image_s_id','es_client','es_product'),
		'extraLoad'			=> " es_magazine_id = $em_id and es_state = 4 ",
		'update'			=> array(),
		'normalize'			=> array(),
		);


		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}

	public static function published($function)
	{
		$em_id = intval($_REQUEST['em_id']);

		$extFunctionsConfig = array(
		'table'				=> 'e_submissions',
		'db_prefix'			=> 'es_',
		'pid'				=> 'es_id',
		'fid'				=> 'es_id',
		'sort'				=> 'es_id',
		'del'				=> 'es_del',
		'fields'			=> array('es_id', 'es_backend_upload', 'es_mediaType_id', 'es_magazine_id','es_image_s_id','es_client','es_product'),
		'extraLoad'			=> " es_magazine_id = $em_id and es_state = 9 ",
		'update'			=> array(),
		'normalize'			=> array(),
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}

	public static function preselections_post($nodes,$totalCount)
	{
		die('x');
		foreach ($nodes as &$n)
		{
			$n['es_client'] = "X";
		}
		return array($nodes,$totalCount);
	}

	public static function selections($function)
	{


		$em_id = intval($_REQUEST['em_id']);

		$extFunctionsConfig = array(
		'table'				=> 'e_submissions',
		'db_prefix'			=> 'es_',
		'pid'				=> 'es_id',
		'fid'				=> 'es_id',
		'sort'				=> 'es_id',
		'del'				=> 'es_del',
		'fields'			=> array('es_id', 'es_backend_upload', 'es_mediaType_id', 'es_magazine_id','es_image_s_id','es_client','es_product'),
		'extraLoad'			=> " es_magazine_id = $em_id and es_state = 5 ",
		'update'			=> array(),
		'normalize'			=> array()
		);


		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}

	public static function handleInterviews($function)
	{

	}

	public static function handleDigitalInterviews($function)
	{

	}

	public static function burn_app($nodes,$totalCount)
	{
		foreach ($nodes as &$n)
		{
			$eda_id = $n['eda_id'];
			$credits = dbx::queryAttribute("select group_concat(t.contact SEPARATOR '<br> ') as credits from (SELECT concat (act_description, ': (',ec_company, ') ',ec_firstname, ' ',ec_lastname) as contact FROM a_contact_type,e_contacts,`e_digital_app_credits` WHERE
			`edac_digital_app_id` = $eda_id and `edac_contact_id` = ec_id and edac_contactType_id = act_id order by act_description asc ) t","credits");
			$n['credits'] = $credits;
		}

		return array($nodes,$totalCount);
	}


	public static function handleApps($function)
	{

		$em_id = intval($_REQUEST['em_id']);

		$extFunctionsConfig = array(
		'table'				=> 'e_digital_app',
		'db_prefix'			=> 'eda_',
		'pid'				=> 'eda_id',
		'fid'				=> 'eda_id',
		'sort'				=> 'eda_id',
		'del'				=> 'eda_del',
		'fields'			=> array('eda_id', 'eda_preview_image', 'eda_title', 'eda_description', 'eda_link1', 'eda_linkText1','eda_link2', 'eda_linkText2','eda_magazine_id'),
		'extraLoad'			=> " eda_magazine_id = $em_id and eda_del = 'N' ",
		'update'			=> array(),
		'normalize'			=> array(),
		'postHooks' => array(
		'load' => 'xluerzer_magazines::burn_app'
		)
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}


	public static function burn_web($nodes,$totalCount)
	{
		foreach ($nodes as &$n)
		{

			$edw_id = $n['edw_id'];
			$credits = dbx::queryAttribute("select group_concat(t.contact SEPARATOR '<br> ') as credits from (SELECT concat (act_description, ': (',ec_company, ') ',ec_firstname, ' ',ec_lastname) as contact FROM a_contact_type,e_contacts,`e_digital_web_credits` WHERE
			`edwc_digital_web_id` = $edw_id and `edwc_contact_id` = ec_id and edwc_contactType_id = act_id order by act_description asc ) t","credits");
			$n['credits'] = $credits;

		}

		return array($nodes,$totalCount);
	}

	public static function handleWeb($function)
	{

		$em_id = intval($_REQUEST['em_id']);

		$extFunctionsConfig = array(
		'table'				=> 'e_digital_web',
		'db_prefix'			=> 'edw_',
		'pid'				=> 'edw_id',
		'fid'				=> 'edw_id',
		'sort'				=> 'edw_id',
		'del'				=> 'edw_del',
		'fields'			=> array('edw_id', 'edw_preview_image', 'edw_title', 'edw_description', 'edw_link1', 'edw_linkText1','edw_link2', 'edw_linkText2','edw_magazine_id'),
		'extraLoad'			=> " edw_magazine_id = $em_id and edw_del = 'N' ",
		'update'			=> array(),
		'normalize'			=> array(),
		'postHooks' => array(
		'load' => 'xluerzer_magazines::burn_web'
		)
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}


	public static function handleStudents($function)
	{

		$em_id = intval($_REQUEST['em_id']);
		$filter = intval($_REQUEST['filter']);

		if ($filter > 0)
		{
			$ess_state = " and ess_state = $filter  ";
		}


		$extFunctionsConfig = array(
		'table'				=> 'e_submissions_students',
		'db_prefix'			=> 'ess_',
		'pid'				=> 'ess_id',
		'fid'				=> 'ess_id',
		'sort'				=> 'ess_id',
		'del'				=> 'ess_del',
		'fields'			=> array('ess_id', 'ess_backend_upload', 'es_mediaType_id', 'ess_magazine_id','ess_image_s_id'),
		'extraLoad'			=> " ess_magazine_id = $em_id $ess_state ",
		'update'			=> array(),
		'normalize'			=> array()
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}


}