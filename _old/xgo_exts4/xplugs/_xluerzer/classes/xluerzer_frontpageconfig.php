<?

class xluerzer_frontpageconfig
{
		
	public static $state_draft = 3;
		
	public static function defaultAjaxHandler($scope, $function)
	{
		switch ($scope)
		{
			case 'frontpageconfig_resolveFeatureByIdAndDate':
				self::frontpageconfig_resolveFeatureByIdAndDate();
				break;
			case 'frontpageconfig_resolveProfileByDate':
				self::frontpageconfig_resolveProfileByDate();
				break;
			case 'frontpageconfig_addInspiration':
				self::frontpageconfig_addInspiration();
				break;	
			case 'frontpageconfig_addPartners':
				self::frontpageconfig_addPartners();
				break;				
			case 'frontpageconfig_resolveAdsByIdAndDate':
				self::frontpageconfig_resolveAdsByIdAndDate();
				break;
			case 'frontpageconfig_default_load':
				self::frontpageconfig_load();
				break;
			case 'frontpageconfig_default_save':
				self::frontpageconfig_save();
				break;
			case 'searchComboArticles':
				self::searchCombo();
				break;
			case 'frontpageconfig_imgViaSid':
				self::renderImg();
				break;
			default:
				return false;
		}
	}

	public static function frontpageconfig_resolveFeatureByIdAndDate()
	{
		$day 			= $_REQUEST['day'];
		$dayOfTheWeek 	= $_REQUEST['dayOfTheWeek'];

		
		$date = new DateTime($day);
		$week = $date->format("W");
		$year = $date->format("Y");


		$present = dbx::query("select * from oe_this_week where oetw_day_of_week = '$dayOfTheWeek' and oetw_year = '$year' and oetw_week = '$week'");
		if ($present === false)
		{
			dbx::insert('oe_this_week',array(
			'oetw_day_of_week' 	=> $dayOfTheWeek,
			'oetw_year' 		=> $year,
			'oetw_week' 		=> $week,
			'oetw_state'		=> '3'
			));
			$id = dbx::getLastInsertId();
		} else
		{
			$id = $present['oetw_id'];
		}

		frontcontrollerx::json_success(array('id'=>$id));
	}
	
	public static function frontpageconfig_resolveAdsByIdAndDate()
	{
		$day = $_REQUEST['day'];
		
		$date = new DateTime($day);
		$week = $date->format("W");
		$year = $date->format("Y");


		$present = dbx::query("select * from e_spots_of_the_week where esotw_year = '$year' and esotw_kw = '$week'");
		if ($present === false)
		{
			dbx::insert('e_spots_of_the_week',array(
			'esotw_year' 		=> $year,
			'esotw_kw' 			=> $week,
			'esotw_date' 		=> $year."-".$week,
			));
			$id = dbx::getLastInsertId();
		} else
		{
			$id = $present['esotw_id'];
		}

		frontcontrollerx::json_success(array('id'=>$id));
	}
	
	public static function frontpageconfig_resolveProfileByDate()
	{
		$day = $_REQUEST['day'];
		
		$date = new DateTime($day);
		$week = $date->format("W");
		$year = $date->format("Y");

		$present = dbx::query("select * from oe_designer_profiles where $week >= oedp_start_kw and $week <= oedp_end_kw and $year >=  oedp_start_year and $year <=  oedp_end_year ORDER BY oedp_id desc LIMIT 1");
		if ($present === false)
		{
			dbx::insert('oe_designer_profiles',array(
			'oedp_start_year' 		=> $year,
			'oedp_start_kw' 		=> $week,
			'oedp_state' 			=> self::$state_draft
			));
			$id = dbx::getLastInsertId();
		} else
		{
			$id = $present['oedp_id'];
		}

		frontcontrollerx::json_success(array('id'=>$id));
	}
	
	public static function frontpageconfig_addInspiration()
	{
		$day = dbx::escape($_REQUEST['day']);
		
		$date = new DateTime($day);

		dbx::insert('oe_inspiration',array(
		'oei_date_start' 		=> $day,
		'oei_state' 			=> self::$state_draft
		));
		$id = dbx::getLastInsertId();

		frontcontrollerx::json_success(array('id'=>$id));
	}
	
	
	public static function frontpageconfig_addPartners()
	{
		$day = dbx::escape($_REQUEST['day']);
		
		$date = new DateTime($day);

		dbx::insert('oe_partners',array(
		'oep_date_start' 		=> $day,
		'oep_state' 			=> self::$state_draft
		));
		$id = dbx::getLastInsertId();

		frontcontrollerx::json_success(array('id'=>$id));
	}
	

	

	public static function renderImg()
	{
		list($scope,$s_id,$w,$h) = explode("/",$_REQUEST['url']);

		$s_id 	= intval($s_id);
		$ext 	= 'png';

		$img = xredaktor_storage::xr_img2(array(
		s_id 		=> $s_id,
		w 			=> $w,
		h 			=> $h,
		q 			=> 85,
		fullpath 	=> 'Y',
		rmode		=> 'cco',
		ext			=> $ext,
		));

		$fullPath = $img['src'];
		imagesx::readfile_if_modified($fullPath,array('Content-Type: image/'.$ext));
		die();

	}

	public static function getDefaultImageUrl($width,$height)
	{

		return 'http://placehold.it/'.$width.'x'.$height;
	}


	public static function frontpageconfig_load()
	{

		$day = $_REQUEST['day'];
		if ($day == "")
		{
			$day = date("Y-m-d");
		}


		$features = array();
		$features = self::getFeaturesByDate($day);

		$audiovisual = array(
		'html'				=> $features['audiovisual']['html'],
		'needsconfigure'	=> $features['audiovisual']['needsconfigure']
		);
		$campaigns = array(
		'html'				=> $features['campaigns']['html'],
		'needsconfigure'	=> $features['campaigns']['needsconfigure']
		);
		$whoiswho = array(
		'html'				=> $features['whoiswho']['html'],
		'needsconfigure'	=> $features['whoiswho']['needsconfigure']
		);
		$digital = array(
		'html'				=> $features['digital']['html'],
		'needsconfigure'	=> $features['digital']['needsconfigure']
		);
		$editorsblog = array(
		'html'				=> $features['editorsblog']['html'],
		'needsconfigure'	=> $features['editorsblog']['needsconfigure']
		);


		$adsoftheweek = self::getAdsoftheweekByDate($day);

		$printAd 	= array(
		'html'				=> $adsoftheweek['print'],
		'needsconfigure'	=> $adsoftheweek['print_need']
		);
		$spotAd 	= array(
		'html'				=> $adsoftheweek['spot'],
		'needsconfigure'	=> $adsoftheweek['spot_need']
		);
		$classicAd 	= array(
		'html'				=> $adsoftheweek['classic'],
		'needsconfigure'	=> $adsoftheweek['classic_need']
		);

		$inspiration = array();
		$inspiration = self::getInspirationByDate($day);

		$profile = array();
		$profile = self::getProfileByDate($day);

		$partners = array();
		$partners = self::getPartnersByDate($day);

		$yourpicks = array();
		$yourpicks = self::getYourpicksByDate($day);

		$mostread = array();
		$mostread = self::getMostreadByDate($day);


		$data = array(

		'audiovisual' 	=> $audiovisual,
		'campaigns' 	=> $campaigns,
		'whoiswho' 		=> $whoiswho,
		'digital' 		=> $digital,
		'editorsblog' 	=> $editorsblog,
		'printad'		=> $printAd,
		'spotad'		=> $spotAd,
		'classicad'		=> $classicAd,
		'inspiration' 	=> $inspiration,
		'profile' 		=> $profile,
		'yourpicks' 	=> $yourpicks,
		'partners' 		=> $partners,
		'mostread' 		=> $mostread,
		'features'		=> $features,
		'adsoftheweek'	=> $adsoftheweek

		);

		frontcontrollerx::json_success($data);
	}


	public static function frontpageconfig_save()
	{
		$db 	= json_decode($_REQUEST['data'],true);
		$day 	=  date("Y-m-d ", strToTime($db['selectedDate']));
		
		$update['oefc_day'] = $day;
		
		
		if ($db['or_profile'] == 0) {
			$update['oefc_profile_article'] = 0;
		}
		else {
			$update['oefc_profile_article'] = $db['or_profile_article'];
		}
		
		
		if ($db['or_yourpicks'] == 0) {
			$update['oefc_yourpicks_article'] = 0;
		}
		else {
			$update['oefc_yourpicks_article'] = $db['or_yourpicks_article'];
		}

		
		if ($db['or_partners'] == 0) {
			$update['oefc_partners_article'] = 0;
		}
		else {
			$update['oefc_partners_article'] = $db['or_partners_article'];
		}
		
		
		if ($db['or_mostread'] == 0) {
			$update['oefc_mostread_article'] = 0;
		}
		else {
			$update['oefc_mostread_article'] = $db['or_mostread_article'];
		}

		$update['oefc_mostread_conf'] = $db['cfg_most_read'];
	
	
		
		$id 	= intval($_REQUEST['id']);
		
		$present = dbx::query("select * from oe_frontpage_config where oefc_day = '$day'");
		if ($present === false)
		{
			dbx::insert('oe_frontpage_config',$update);
			$id = dbx::getLastInsertId();
		} else
		{
			$id = $present['oefc_id'];
			$ret = dbx::update('oe_frontpage_config',$update,array('oefc_day' => $day));
		}
		
		
		$data = array(
		'record' => $ret
		);

		// xluerzer_log::update($table,$p_id,$id,$db);

		file_get_contents('http://lz-www.xgodev.com/en/start.html?UPDATE_CACHE');
		
		frontcontrollerx::json_success($data);
	}


	public static function getFeaturesByDate($date) {

		$date = new DateTime($date);
		$week = $date->format("W");
		$year = $date->format("Y");

		$ret = array();
		$ret = dbx::queryAll("select * from oe_this_week where oetw_year = $year and oetw_week = $week");
		$rets = array();


		$titlepresent = $leftpresent = $rightpresent = $imgpresent = '<span style="color: #ff0000;">missing</span>';

		$rets['audiovisual']['html'] = $rets['campaigns']['html'] = $rets['whoiswho']['html'] = $rets['digital']['html'] = $rets['editorsblog']['html'] = '<img src="'.self::getDefaultImageurl(1007,309).'" alt="not set" height="309" "/><br /><table style="width: 300px;"><tr><td>Image</td><td>Title</td><td>Text left</td><td>Text right</td></tr><tr><td> '.$imgpresent.'</td><td> '.$titlepresent.'</td><td>'.$leftpresent.'</td><td>'.$rightpresent.'</td></tr></table>';
		$rets['audiovisual']['needsconfigure'] = $rets['campaigns']['needsconfigure'] = $rets['whoiswho']['needsconfigure'] = $rets['digital']['needsconfigure'] = $rets['editorsblog']['needsconfigure'] = 1;


		if (!empty($ret)) {

			foreach ($ret as $k => $v) {
				
				$titlepresent = $leftpresent = $rightpresent = $imgpresent = '<span style="color: #ff0000;">missing</span>';
				
				$mediaId = $v['oetw_media_id'];
				$need = 1;
				if (!$mediaId || $mediaId == 0) {
					$file = self::getDefaultImageurl(1007,309);
				}
				else {
					$need = 0;
					$file = "/xgo/xplugs/xluerzer/ajax/frontpageconfig_imgViaSid/$mediaId/1007/309";
					$imgpresent = '<span style="color: #00aa00;">present</span>';
				}
				
				
				
				if ($v['oetw_title']) $titlepresent = '<span style="color: #00aa00;">present</span>';
				if ($v['oetw_col_left_publish']) $leftpresent = '<span style="color: #00aa00;">present</span>';
				if ($v['oetw_col_right_publish']) $rightpresent = '<span style="color: #00aa00;">present</span>';

				$html = '<img src="'.$file.'" height="309" /><br /><table style="width: 300px;"><tr><td>Image</td><td>Title</td><td>Text left</td><td>Text right</td></tr><tr><td> '.$imgpresent.'</td><td> '.$titlepresent.'</td><td>'.$leftpresent.'</td><td>'.$rightpresent.'</td></tr></table>';

				switch ($v['oetw_day_of_week']) {
					case '1':
						$rets['audiovisual']['needsconfigure']	= $need;
						$rets['audiovisual']['html']			= $html;
						break;
					case '2':
						$rets['campaigns']['needsconfigure']	= $need;
						$rets['campaigns']['html']				= $html;
						break;
					case '3':
						$rets['whoiswho']['needsconfigure']		= $need;
						$rets['whoiswho']['html'] 				= $html;
						break;
					case '4':
						$rets['digital']['needsconfigure']		= $need;
						$rets['digital']['html'] 				= $html;
						break;
					case '5':
						$rets['editorsblog']['needsconfigure']	= $need;
						$rets['editorsblog']['html'] 			= $html;
						break;

					default:
						break;
				}
			}
		}

		return $rets;

	}




	public static function getYourpicksByDate($date) {

		$day 	= dbx::escape($date);
		$ret 	= array();
		$rets	= array();
		
		$overrule = 0;
		$overrule = self::checkOverRule($day, 'yourpicks');
		
		$needsconfigure = 0;
		if ($overrule['needsconfigure'] == 1 && $overrule['articleid'] != '0') {
			$needsconfigure = 1;
		}
		
		if ($overrule['articleid'] == 0 || !$overrule['articleid']) {
			
			$rethtml = '';
			$overrule = 0;
		}
		
		else {
			$rethtml = $overrule['html'];
			$overrule = $overrule['articleid'];
		}	

		$rets = array(
		'html' 				=> $rethtml,
		'needsconfigure'	=> $needsconfigure,
		'overrule'			=> $overrule
		);
		
		return $rets;
		

	}
	
	
	public static function getMostreadByDate($date) {

		$day	= dbx::escape($date);
		$ret 	= array();
		$rets	= array();
		
		$overrule = 0;
		$overrule = self::checkOverRule($day,'mostread');
		
		if (!$overrule['conf']) {
			$conf = 1;		
		}
		else {
			$conf 		= $overrule['conf'];
		}
		
		
		$needsconfigure = 0;
		if ($overrule['needsconfigure'] == 1 && $overrule['articleid'] != '0') {
			$needsconfigure = 1;
		}
		
		
		if ($overrule['articleid'] == 0 || !$overrule['articleid']) {
			
			$rethtml = '';
			$overrule = 0;
		}
		
		else {
			$rethtml 	= $overrule['html'];
			$overrule 	= $overrule['articleid'];
			
		}	
		
		
		$rets = array(
		'html' 				=> $rethtml,
		'needsconfigure'	=> $needsconfigure,
		'overrule'			=> $overrule,
		'conf'				=> $conf
		);
		
		return $rets;
		

	}


	public static function getInspirationByDate($date) {

		$date 	= dbx::escape($date);
		$ret 	= array();
		$rets	= array();
		$ret 	= dbx::queryAll("select * from oe_inspiration where oei_state = 1 and oei_date_end <= $date order by oei_date_end desc, oei_id desc limit 4");
		// $ret 	= dbx::queryAll("select * from oe_inspiration where oei_state = 1 order by oei_id desc limit 4");

		foreach ($ret as $k => $v) {

			$mediaId = $v['oei_media_id'];

			if (!$mediaId || $mediaId == 0) {
				$file = self::getDefaultImageurl(247,137);
			}
			else {

				$file = "/xgo/xplugs/xluerzer/ajax/frontpageconfig_imgViaSid/$mediaId/247/137";
			}


			$rets[] = array('html' => '<img src="'.$file.'" style="float: left; height: auto">'.$v['oei_desc_short']);
		}

		return $rets;

	}


	public static function getAdsoftheweekByDate($date) {

		$date = new DateTime($date);
		$week = $date->format("W");
		$year = $date->format("Y");

		$ret = array();
		$ret = dbx::query("select * from e_spots_of_the_week where esotw_year = $year and esotw_kw = $week limit 1");

		// die ($ret['esotw_printSubmission_id']." - ".$ret['esotw_spotSubmission_id']." - ".$ret['esotw_classicSubmission_id']);

		if (empty($ret)) {
			$rets['print'] = $rets['campaigns'] = $rets['spot'] = $rets['classic'] = '<img src="'.self::getDefaultImageurl(335,200).'" alt="not set" />';

			$rets['print_need'] = 1;
			$rets['spot_need'] = 1;
			$rets['classic_need'] = 1;
		}

		else {

			$printMediaId 	= self::getMediaIdBySubmissionId($ret['esotw_printSubmission_id'], true);
			
			if($printMediaId == 0) {
				$printMediaId 	= self::getMediaIdByMediaId($ret['esotw_printMedia_id'], true);
			}
			
			
			$spotMediaId 	= self::getMediaIdByMediaId($ret['esotw_spotMedia_id']);
			
			if($spotMediaId == 0) {
				$spotMediaId 	= self::getMediaIdBySubmissionId($ret['esotw_spotSubmission_id']);
			}
			
			
			$classicMediaId 	= self::getMediaIdByMediaId($ret['esotw_classicMedia_id']);
			
			if($classicMediaId == 0) {
				$classicMediaId 	= self::getMediaIdBySubmissionId($ret['esotw_classicSubmission_id']);
			}
			


			$print_need 	= 1;
			$spot_need 		= 1;
			$classic_need 	= 1;

			if (!$printMediaId || $printMediaId == 0) {
				$file = self::getDefaultImageurl(335,200);
			}
			else {
				$file = "/xgo/xplugs/xluerzer/ajax/frontpageconfig_imgViaSid/$printMediaId/335/200";
				$print  = $ret['esotw_printClient'].'<br /><img src="'.$file.'" style="float: left; height: auto">';
				$print_need 	= 0;
			}


			if (!$spotMediaId || $spotMediaId == 0) {
				$file = self::getDefaultImageurl(335,200);
				$spot  = $ret['esotw_spotClient'].'<br /><img src="'.$file.'" style="float: left; height: auto">';
			}
			else {

				$file = "/xgo/xplugs/xluerzer/ajax/frontpageconfig_imgViaSid/$spotMediaId/335/200";
				$spot  = $ret['esotw_spotClient'].'<br /><img src="'.$file.'" style="float: left; height: auto">';
				$spot_need 		= 0;
			}


			if (!$classicMediaId || $classicMediaId == 0) {
				$file = self::getDefaultImageurl(335,200);
				$classic  = $ret['esotw_classicClient'].'<br /><img src="'.$file.'" style="float: left; height: auto">';				
			}
			else {
				
				$file = "/xgo/xplugs/xluerzer/ajax/frontpageconfig_imgViaSid/$classicMediaId/335/200";
				$classic  = $ret['esotw_classicClient'].'<br /><img src="'.$file.'" style="float: left; height: auto">';
				$classic_need 	= 0;
			}

			$rets = array(
			'print' 		=> $print,
			'spot'			=> $spot,
			'classic' 		=> $classic,
			'print_need' 	=> $print_need,
			'spot_need'		=> $spot_need,
			'classic_need' 	=> $classic_need
			);
		}

		return $rets;
	}


	public static function getPartnersByDate($date) {

		$date 	= dbx::escape($date);
		$day 	= $date;
		$ret 	= array();
		$rets	= array();
		
		$overrule = 0;
		$overrule = self::checkOverRule($day, 'partners');
		
		$needsconfigure = 0;
		if ($overrule['needsconfigure'] == 1 && $overrule['articleid'] != '0') {
			$needsconfigure = 1;
		}
		
		if ($overrule['articleid'] == 0 || !$overrule['articleid']) {
		
			$ret 	= dbx::query("select * from oe_partners where oep_state = 1 and oep_del != 'Y' and oep_date_end <= $date and oep_state = 1 and oep_del = 'N' order by oep_date_end desc, oep_id desc limit 1");
			// $ret 	= dbx::queryAll("select * from oe_inspiration where oei_state = 1 order by oei_id desc limit 4");
	
			$mediaId = $ret['oep_media_id'];
	
			$overrule = 0;
			$or_data = dbx::query("select * from oe_frontpage_config where oefc_day = '$day' LIMIT 1");
			
			if ((!$mediaId || $mediaId == 0) && (!$or_data['oefc_partners_article'] || $or_data['oefc_partners_article'] == 0)) {
				$file = self::getDefaultImageurl(302,252);
				$needsconfigure = 1;
			}
			else if ($or_data['oefc_partners_article'] && $or_data['oefc_partners_article'] != 0) {
				$overrule = $or_data['oefc_partners_article'];
			}
			else {
	
				$file = "/xgo/xplugs/xluerzer/ajax/frontpageconfig_imgViaSid/$mediaId/302/252";
			}
			
			$rethtml = '<img src="'.$file.'" style="float: left;  width: 302px; height: 252px; margin-right: 20px;">'.$ret['oep_title']."<br />".$ret['oep_desc_short'];
			
			
		}
		
		else {
			$rethtml = $overrule['html'];
			$overrule = $overrule['articleid'];
		}	

		$rets = array(
		'html' 				=> $rethtml,
		'needsconfigure'	=> $needsconfigure,
		'overrule'			=> $overrule
		);
		
		return $rets;

	}
	
	public static function getProfileByDate($date) {

		$date 	= dbx::escape($date);
		$day 	= $date;
		$date 	= new DateTime($date);
		$week 	= $date->format("W");
		$year 	= $date->format("Y");

		$ret 	= array();
		$rets	= array();

		$overrule = 0;
		$overrule = self::checkOverRule($day, 'profile');
		

		
		$needsconfigure = 0;
		if ($overrule['needsconfigure'] == 1 && $overrule['articleid'] != '0') {
			$needsconfigure = 1;
		}
		
		if ($overrule['articleid'] == 0 || !$overrule['articleid']) {
				
			$ret 	= dbx::query("select * from oe_designer_profiles where $week >= oedp_start_kw and $week <= oedp_end_kw and $year >=  oedp_start_year and $year <=  oedp_end_year and oedp_state = 1 and oedp_del = 'N' ORDER BY oedp_id desc LIMIT 1");
		
			$mediaId = $ret['oedp_media_id'];
			
			$overrule = 0;
			
			$or_data = dbx::query("select * from oe_frontpage_config where oefc_day <= '$day' order by oefc_day desc limit 1");
			
			if ((!$mediaId || $mediaId == 0) && (!$or_data['oefc_profile_article'] || $or_data['oefc_profile_article'] == 0)) {
				
				$file = self::getDefaultImageurl(216,252);
				$needsconfigure = 1;
			}
			else if ($or_data['oefc_profile_article'] && $or_data['oefc_profile_article'] != 0) {
				$overrule = $or_data['oefc_profile_article'];
			}
			else {
				$file = "/xgo/xplugs/xluerzer/ajax/frontpageconfig_imgViaSid/$mediaId/216/252";
			}
			
			$rethtml = '<img src="'.$file.'" style="float: left; width: 216px; height: 252px; margin-right: 20px;">'.$ret['oedp_title']."<br />".$ret['oedp_desc_short'];
		}
		
		else {
			$rethtml = $overrule['html'];
			$overrule = $overrule['articleid'];
		}


		$rets = array(
		'html' 				=> $rethtml,
		'needsconfigure'	=> $needsconfigure,
		'overrule'			=> $overrule
		);
		return $rets;

	}

	
	public static function checkOverRule($day,$type) {
			
		$html = '';
		$needsconfig = 1;
		
		// TODO check if article published - date_start, date_end
		
		$data = dbx::query("select * from oe_frontpage_config where oefc_day <= '$day' order by oefc_day desc limit 1");
		
		if ($data === false) 
		{
			return false;	
		}	
		else 
		{
			// die(print_r($data));
			$mostreadconf = $data['oefc_mostread_conf'];	
			
			
			$titlepresent = $shortpresent = $imgpresent = '<span style="color: #ff0000;">missing</span>';
				
			$typefield = $data['oefc_'.$type.'_article'];
			$article = dbx::query("select * from oe_other_articles where oeoa_id = $typefield");
			
			
			if ($article['oeoa_title']) $titlepresent = '<span style="color: #00aa00;">present</span>';
			if ($article['oeoa_desc_short']) $shortpresent = '<span style="color: #00aa00;">present</span>';
			
			
			$mediaId = $article['oeoa_media_id'];
			
			if ((!$mediaId || $mediaId == 0)) {
				$file = self::getDefaultImageurl(216,252);
				$needsconfig = 1;
			}
			
			else {
				$file = "/xgo/xplugs/xluerzer/ajax/frontpageconfig_imgViaSid/$mediaId/216/252";
				$needsconfig = 0;
				$imgpresent = '<span style="color: #00aa00;">present</span>';
			}
			
			$html = '<img src="'.$file.'" style="float: left; width: 216px; height: 252px; margin-right: 20px;"><b>'.$article['oeoa_title'].'</b><p>'.$article['oeoa_desc_short'].'</p><hr /><table style="width: 150px;"><tr><td>Image</td><td>Titel</td><td>Teaser</td></tr><tr><td> '.$imgpresent.'</td><td> '.$titlepresent.'</td><td>'.$shortpresent.'</td></tr></table>';
			
			// die ("most: ".$mostreadconf);
			
			if ($type == "mostread") {
				return array(
				'html'				=> $html,
				'articleid'			=> $typefield,
				'conf'				=> $mostreadconf,
				'needsconfigure'	=> $needsconfig
				);
			}
			else {
				return array(
				'html'				=> $html,
				'articleid'			=> $typefield,
				'needsconfigure'	=> $needsconfig
				);		
			}
		
		}
		
	}


	

	public static function getMediaIdBySubmissionId($submissionId, $print = false) {

		if ($submissionId) {
			$post 	= dbx::query("select * from e_submissions where es_id=$submissionId limit 1");
			if ($print == true) {
				$ret = $post['es_image_s_id'];
			}
			else {
				$ret = $post['es_video_poster_s_id'];
			}
			
			// check if present in archie media
			
			if ($ret == 0) {
				$ret = self::getMediaIdByMediaId($submissionId,$print);
			}
			
			return $ret;
			
		}
		else  {
			return 0;
		}
	}
	
	public static function getMediaIdByMediaId($eam_id, $print = false) {
			
		if ($eam_id) {	
			$post 	= dbx::query("select * from e_archive_media where eam_id=$eam_id limit 1");
			if ($print == true) {
				$ret = $post['eam_record_img_s_id'];	
			}
			else {
				$ret = $post['eam_record_img_s_id'];
			}
	
			return $ret;
		}
		else {
			return 0;
		}
	}
	


	public static function searchCombo($field)
	{
		$query = trim(dbx2::escape($_REQUEST['query']));

		xluerzer_contacts::doDedaultFieldQuery($field,$query);
	}




}
