<?

class xluerzer_media
{

	public static $image_submission_media_type_invalid 				= 903387;
	public static $image_submission_submitted_media_type_invalid 	= 903388;
	public static $image_submission_s_id_zero						= 903389;


	public static function defaultAjaxHandler($function,$param_0)
	{
		switch ($function)
		{
			case 'uploadLowResVideo':
				self::uploadLowResVideo($param_0);
				break;
			case 'uploadLowResPrint':
				self::uploadLowResPrint($param_0);
				break;
			case 'uploadHighResPrint':
				self::uploadHighResPrint($param_0);
				break;
			case 'uploadHighResVideo':
				self::uploadHighResVideo($param_0);
				break;
			case 'encodeVideo':
				self::encodeVideo($param_0);
				break;
			case 'downloadMedia':
				self::downloadMedia($param_0);
				break;
			case 'downloadVideo':
				self::downloadVideo($param_0);
				break;
			case 'downloadMediaHighRes':
				self::downloadMediaHighRes($param_0);
				break;
			case 'search':
				self::search();
				die();
			case 'searchCombo':
				self::searchCombo($param_0);
				die();
			case 'xcreditSavedPleasJoin':
				self::xcreditSavedPleasJoin();
				die();
			case 'saveOverall':
			case 'saveVideo':
				self::submissionSave();
				break;
			case 'genVideoThumbBySId':
				self::genVideoThumbBySId($param_0);
				break;
			case 'getVideoFileBySId':
				self::getVideoFileBySId();
				break;
			case 'saveCredits':
				self::saveCredits();
				break;
			case 'save_xcredit':
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
			case 'loadCountries':
				self::loadCountries();
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
			case 'img_small':
				self::img_small($param_0);
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
			dbx::update('e_submissions22',array('es_video_s_id'=>$s_id),array('es_id'=>$es_id));
			frontcontrollerx::json_success(array('FILE'=>$s_id));
		} else {
			frontcontrollerx::json_success(array('MSG'=>'MOVE FILE FAILED'));
		}

		die();
	}

	public static function uploadLowResPrint($media_id)
	{
		
		
		$media_id 	= intval($media_id);
		
		if ($media_id == 0) die();
		
		$es_id 		= dbx::queryAttribute("select * from e_archive_media where eam_id = $media_id", 'eam_specials_submission_id');
		$es_id		= intval($es_id);
		
		
		$validExtensions = array('jpg','jpeg','bmp','png','gif','tif','pdf');

		$ext = explode(".",basename($_FILES['file']['name']));
		$ext = array_pop($ext);

		if (!in_array($ext,$validExtensions))
		{
			frontcontrollerx::json_success(array('MSG'=>'INVALID FILE TYPE'));
			die();
		}
		
		$file 		= '/srv/www/www.luerzersarchive.net/web/archive/submissions/print/lowres/'.date('Y').'/'.$es_id.'.'.$ext;
		
		if ($es_id == 0) 
		{
			// koennte classic spot sien
			$isClassic = dbx::query("select * from e_spots_of_the_week where esotw_classicMedia_id = $media_id");
			if ($isClassic === false)
			{
				die();
			}
			else 
			{
				$eam_classic_id 	= $isClassic['esotw_classicMedia_id'];
				
				$file 				= '/srv/www/www.luerzersarchive.net/web/archive/submissions/print/lowres/'.date('Y').'/classic_'.$eam_classic_id.'.'.$ext;
			}
			
		}
		
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
			
			$media_id = intval($media_id);
			dbx::update('e_archive_media',array('eam_record_img_s_id'=>$s_id),array('eam_id'=>$media_id));
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
			dbx::update('e_submissions22',array('es_image_highRes_s_id'=>$s_id,'es_image_highRes_modified'=>'NOW()','es_image_highRes_created'=>'NOW()','es_image_highRes_status'=>'PRESENT'),array('es_id'=>$es_id));
			frontcontrollerx::json_success(array('FILE'=>$s_id));
		} else {
			frontcontrollerx::json_success(array('MSG'=>'MOVE FILE FAILED'));
		}

	}
	public static function uploadHighResVideo($eam_id)
	{
		
		$eam_id = intval ($eam_id);
		
		if ($eam_id == 0) die();

		$validExtensions = array('mp4','mov','wmv','flv','mkv','m4v','mpg','mpeg','avi','divx');

		$ext = explode(".",basename($_FILES['file']['name']));
		$ext = array_pop($ext);

		if (!in_array($ext,$validExtensions))
		{
			frontcontrollerx::json_success(array('MSG'=>'INVALID FILE TYPE'));
			die();
		}

		$file 		= '/srv/www/www.luerzersarchive.net/web/archive/videos/480/'.date('Y').'/'.$eam_id.'.'.$ext;
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
			dbx::update('e_archive_media',array('eam_record_video_s_id'=>$s_id),array('eam_id'=>$eam_id));
			frontcontrollerx::json_success(array('FILE'=>$s_id));
		} else {
			frontcontrollerx::json_success(array('MSG'=>'MOVE FILE FAILED'));
		}

		die();

	}

	public static function encodeVideo($eam_id)
	{
		$eam_id = intval($eam_id);
		$s = dbx::query("select * from e_archive_media where eam_id = $eam_id");
		if ($s === false) die('no valid media');

		$eam_video_high_s_id = intval($s['eam_record_video_s_id']);
		
		if (($eam_video_high_s_id != 0))
		{
			$year = date('Y');
			
			$ve_id = video_encoder2::encodeVideo('MEDIA_VIDEO', $eam_video_high_s_id, $year, $eam_id, 0);
			
			echo "[$ve_id]<br>";
			ignore_user_abort(true);
			echo "<pre style='background-color:black;color:white;padding:50px;'>";
			video_encoder2::encodeAnyVideo($ve_id,true);
			echo "</pre>";

		} 
		
		die('END OF VIDEO-TRANSMISSION');
	}

	public static function downloadMedia($eam_id)
	{
		$eam_id = intval($eam_id);
		$s = dbx::query("select * from e_archive_media where eam_id = $eam_id");
		if ($s === false) die('no valid media');

		$s_id = intval($s['eam_record_img_s_id']);

		$params = array();
		$params['s_id'] = $s_id;
		$params['mode'] = "DOWNLOAD";
		$ret 	= xredaktor_storage::download($params);
		$href 	= $ret['href'];
		header("Location: $href");

		die();
	}

	public static function downloadVideo($eam_id)
	{
		$eam_id = intval($eam_id);
		$s = dbx::query("select * from e_archive_media where eam_id = $eam_id");
		if ($s === false) die('no valid media');

		$s_id = intval($s['eam_record_video_s_id']);

		$params = array();
		$params['s_id'] = $s_id;
		$params['mode'] = "DOWNLOAD";
		$ret 	= xredaktor_storage::download($params);
		$href 	= $ret['href'];
		header("Location: $href");

		die();
	}

	public static function downloadMediaHighRes($es_id)
	{
		$es_id = intval($es_id);

		$s = dbx::query("select * from e_submissions22 where es_id = $es_id");
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

	public static function doDedaultFieldQuery($field,$query)
	{

		$field = dbx::escape($field);

		$sql_data 	= "select DISTINCT(`$field`) as _value, `$field` as _display from e_archive_media where $field LIKE '%$query%'";
		$sql_cnt 	= "select count(DISTINCT(`$field`)) as sql_cnt from e_archive_media where $field LIKE '%$query%'";

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

			case 'eam_specials_archivNr':
				self::doDedaultFieldQuery($field,$query);
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
		$where = array();

		foreach ($fields as $field)
		{

			$tmp = array();
			foreach ($query as $_q)
			{
				$_q = trim($_q);
				if ($like)
				{
					$tmp[] = " $field LIKE '%$_q%' ";
				} else {
					$tmp[] = " $field LIKE '$_q' ";
				}

			}

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

	public static function search()
	{

		$searchData = json_decode($_REQUEST['searchData'],true);

		$where = array();

		$extraTable = "";

		foreach ($searchData as $k => $v)
		{
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
					$extraTable = " , e_archive_media_credits ";
					$where[] = " eamc_archive_media_id = eam_id and eamc_contact_id in($v) and eamc_contactType_id = $stripped ";

					break;

				case 'created_from':
					if (trim($v)=="") break;
					$v = self::parseDate($v);
					$where[] = " eam_magazine_published >= '$v' ";
					break;
				case 'created_to':
					if (trim($v)=="") break;
					$v = self::parseDate($v);
					$where[] = " eam_magazine_published <= '$v' ";
					break;


					/// FIELDS - NOT LIKE

				case 'eam_specials_country_id':
				case 'eam_type':
				case 'eam_id':
				case 'eam_specials_archivNr':
				case 'eam_specials_submission_id':
				case 'eam_magazine_id':
				case 'eam_specials_category_id':
					$where[] = self::doDedaultFieldQuerySql($k,$v,false);
					break;

				case 'overall':

					$where[] = self::doDedaultFieldQuerySql(array(
					'eam_record_infotext',
					'eam_record_title'
					),$v,true);

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

		$sql_data = "SELECT * FROM `e_archive_media` $extraTable WHERE $where ORDER BY `eam_id` desc";
		$sql_cnt = "SELECT count(*) as sql_cnt FROM `e_archive_media` $extraTable WHERE $where ";

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
		$ec_contactType_id = intval($contact['ec_contactType_id']);

		if ($ec_contactType_id == 0) {
			//			frontcontrollerx::json_failure("ERROR: Contact $ec_id has no Credit Type - please fix this error. Assignment aborted.");
		}

		$esxc_id = intval($_REQUEST['esxc_id']);
		$esx = dbx::query("select * from e_submissions22_xcredits_to_submissions where esxts_contact_id = $esxc_id");
		$esxc_submission_id = intval($esx['esxts_submission_id']);
		$ec_contactType_id = intval($esx['esxts_contactType_id']);


		$presentContact = dbx::query("select * from e_submissions22_credits where esc_submission_id = $esxc_submission_id  and esc_contact_id = $ec_id");
		if ($presentContact !== false) {
			frontcontrollerx::json_failure("WARNING: Contact already assigned.");
		}

		$db2 = array(
		esc_checked 		=> 'OK',
		esc_submission_id	=> $esxc_submission_id,
		esc_contactType_id	=> $ec_contactType_id,
		esc_contact_id		=> $ec_id,
		esc_created_ts		=> 'NOW()',
		);
		dbx::insert('e_submissions22_credits',$db2);
		$esc_id = dbx::getLastInsertId();

		frontcontrollerx::json_success(array('data'=>$data,'db'=>$db,'ec_id'=>$ec_id,'esc_id'=>$esc_id));
	}

	public static function submissionSave()
	{
		$eam_id 	= intval($_REQUEST['eam_id']);
		$data 		= json_decode($_REQUEST['data'],true);
		
		$db = array();
		foreach ($data as $k => $v)
		{
			if (!dbx::attributePresent('e_archive_media',$k)) continue;
			$db[$k] = $v;
		}
		
		$old = dbx::query("select * from e_archive_media where eam_id = $eam_id");
		dbx::update('e_archive_media',$db,array('eam_id'=>$eam_id));
		xluerzer_log::pushLog('UPDATE','e_archive_media','eam_id',$eam_id,$old);
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

		$eam_id 	= intval($_REQUEST['eam_id']);
		$credits 	= json_decode($_REQUEST['credits'],true);

		ignore_user_abort(true);

		$credit = dbx::query("select * from e_archive_media_credits where eamc_archive_media_id = $eam_id LIMIT 1");

		$eamc_record_id 			= $credit['eamc_record_id'];
		$eamc_archive_media_type_id = $credit['eamc_archive_media_type_id'];
		$eamc_archive_media_year 	= $credit['eamc_archive_media_year'];


		$sql = "delete from e_archive_media_credits where eamc_archive_media_id = $eam_id and eamc_id";
		dbx::query($sql);
		
		//xluerzer_ranking::rebuildRankingByMediaId($eam_id);

		foreach ($credits as $type => $_contacts)
		{
			$contacts = json_decode($_contacts,true);
			foreach ($contacts as $c)
			{
				$ec_id = intval($c[id]);

				$sqlx = "select * from e_archive_media_credits where eamc_archive_media_id = $eam_id and eamc_contactType_id = $type and eamc_contact_id = $ec_id";
				
				
				$present = dbx::query($sqlx);
				

				$db = array(

				eamc_archive_media_id		=> $eam_id,

				eamc_record_id 				=> $eamc_record_id,
				eamc_archive_media_type_id	=> $eamc_archive_media_type_id,
				eamc_archive_media_year		=> $eamc_archive_media_year,

				eamc_created_ts				=> 'NOW()',
				eamc_modified_ts			=> 'NOW()',


				eamc_contactType_id			=> $type,
				eamc_contact_id				=> $ec_id,
				);

				if ($present === false)
				{
					dbx::insert('e_archive_media_credits',$db);
				}
				// update ranking
				dbx::query("call update_ranking_by_id($ec_id);");

			}
		}

		xluerzer_publish::media_publish($eam_id);
		frontcontrollerx::json_success();
	}

	public static function save_xcredit()
	{
		$esxc_id = intval($_REQUEST['esxc_id']);
		$data  = json_decode($_REQUEST['data'],true);

		$esx = dbx::query("select * from e_submissions22_xcredits where esxc_id = $esxc_id");
		$esxc_submission_id = intval($esx['esxc_submission_id']);

		$mapper = array(
		esxc_city 			=> 'ec_city',
		esxc_company 		=> 'ec_company',
		esxc_contactType_id => 'ec_contactType_id',
		esxc_country_id 	=> 'ec_country_id',
		esxc_firstname 		=> 'ec_firstname',
		esxc_id 			=> 'ec_id',
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

		dbx::insert('e_contacts',$db);
		$ec_id = dbx::getLastInsertId();

		$esc_contactType_id = intval($db['ec_contactType_id']);


		$db2 = array(
		esc_checked 		=> 'OK',
		esc_submission_id	=> $esxc_submission_id,
		esc_contactType_id	=> $esc_contactType_id,
		esc_contact_id		=> $ec_id,
		esc_created_ts		=> 'NOW()',
		);

		dbx::insert('e_submissions22_credits',$db2);
		$esc_id = dbx::getLastInsertId();

		frontcontrollerx::json_success(array('data'=>$data,'db'=>$db,'ec_id'=>$ec_id,'esc_id'=>$esc_id));
	}

	public static function load_xcredit()
	{
		$esxc_id = intval($_REQUEST['esxc_id']);
		$record = dbx::query("select * from e_submissions22_xcredits where esxc_id = $esxc_id");
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
		$records = array_merge($records,dbx::queryAll("select em_name as label, em_id as value from e_magazine order by em_name desc"));
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
		$credits = dbx::queryAll("select * from e_submissions22_credits,e_contacts where esc_submission_id = $es_id and esc_contactType_id = $contact_type and esc_contact_id = ec_id");

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
				$name[] = trim($c['ec_company']); // COMPANY
				break;
				default:
					$name[] = trim($c['ec_firstname'].' '.$c['ec_lastname']); // PERSON
					break;
			}

		}

		return $smybol." ".implode(", ",$name);
	}

	public static function getCredits2CopyNorm($es_id,$es_mediaType_id)
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
			$ret[] = self::getTextForType($es_id,6); 	// PRODUCTION COMPANY
			$ret[] = self::getTextForType($es_id,8); 	// DIRECTOR
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
		$eam_id = intval($_REQUEST['eam_id']);
		$delta = intval($_REQUEST['delta']);


		if ($delta != 0)
		{
			if ($delta < 0)
			{
				if ($delta == -1)
				{
					$media = dbx::query("select * from e_archive_media where eam_id < $eam_id order by eam_id desc LIMIT 1");
				} else {
					$media = dbx::query("select * from e_archive_media where eam_id < $eam_id and es_state = 5 order by eam_id desc LIMIT 1");
				}

			} else {

				switch ($delta)
				{
					case 1:
						$media = dbx::query("select * from e_archive_media where eam_id > $eam_id order by eam_id asc limit 1");
						break;
					case 2:
						$media = dbx::query("select * from e_archive_media where eam_id > $eam_id and es_state = 5 order by eam_id asc limit 1");
						break;
					default:
					case 3:
						$media = dbx::query("select * from e_archive_media where 1 order by eam_id desc limit 1");
						break;
				}
			}

			$eam_id = intval($media['eam_id']);

		} else {
			$media = dbx::query("select * from e_archive_media where eam_id = $eam_id LIMIT 1");
		}


		################# CREDITS

		$_credits 	= dbx::queryAll("select * from e_archive_media_credits,e_contacts where eamc_archive_media_id = $eam_id and ec_id = eamc_contact_id ");
		$credits 	= array();

		foreach ($_credits as $c)
		{
			$id = $c['eamc_contactType_id'];
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

		################### FINALIZE


		$es_mediaType_id 	= intval($media['eam_type']);
		$es_magazine_id 	= intval($media['eam_magazine_id']);

		$magazin = dbx::query("select * from e_magazine where em_id = $es_magazine_id");
		if ($magazin == false) $magazin = array();

		$e_archive_media = dbx::query("select * from e_archive_media where eam_id = $eam_id");
		if ($e_archive_media == false) $magazin = array();



		$em_type = intval($e_archive_media['eam_type']);

		switch ($em_type)
		{
			case 1:
				if ($es_mediaType_id == 2) $em_type = 12;
				break;
			case 4:
				$em_type = 14;
				break;
			case 5:
				$em_type = 15;
				break;
			default: break;
		}

		$creditsInput = dbx::queryAll("select * from a_credits2mag,a_contact_type where c2m_m_id = $em_type and c2m_c_id = act_id and c2m_checked = 1 order by c2m_sort");
		$data = array(

		es_magazine_id	=> $es_magazine_id,
		em_type			=> $em_type,
		creditsInput	=> $creditsInput,
		eam_id			=> $eam_id,
		media 			=> $media,
		credits			=> $credits,
		_credits		=> $_credits,
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
				$OR = " OR ( ec_id = $t ) ";
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

	public static function getById($eam_id)
	{
		return dbx::query("select * from e_archive_media where eam_id = $eam_id");
	}

	public static function getMediaTypeOfsubmissionById($eam_id)
	{
		$s = self::getById($eam_id);
		if ($s === false) return false;
		return intval($s['eam_type']);
	}

	public static function img_small($param_0,$die=true)
	{
		$eam_id = intval($param_0);
		$media 	= self::getById($eam_id);

		if ($media === false) {
			die('MEDIA_NOT_FOUND');
		}

		$mediaType = self::getMediaTypeOfsubmissionById($eam_id);

		if ($mediaType == 0)
		{
			$mediaType = 1;
		}

		if ($mediaType == 0)
		{
			$s_id = self::$image_submission_media_type_invalid;

		} else {
			$s_id = $media['eam_record_img_s_id'];
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
			$s_id = self::$image_submission_submitted_media_type_invalid;
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
		$eam_id = intval($param_0);
		$media = self::getById($eam_id);

		if ($media === false) {
			die('MEDIA_NOT_FOUND');
		}

		$mediaType = self::getMediaTypeOfsubmissionById($eam_id);

		if ($mediaType == 0)
		{
			$mediaType = 1;
		}

		if ($mediaType == 0)
		{
			$s_id = self::$image_submission_media_type_invalid;
		} else {
			$s_id = $media['eam_record_img_s_id'];
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
			$s_id = self::$image_submission_submitted_media_type_invalid;
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


	public static function grid_day_overview()
	{

		$sql_data = "SELECT

						es_created_date as dayx,
						count(`es_id`) as total_submissions,
						count(distinct(`es_submittedBy`)) as total_submitter,
						
						sum(`es_submittedFor`='Commercials') as total_tv,
						(select count(distinct(`es_submittedBy`)) as total_submitter from e_submissions22 where `es_submittedFor`='Commercials' and es_created_date = dayx) as total_tv_submitter,
						
						
						sum(`es_submittedFor`='Magazine') as total_print,
						(select count(distinct(`es_submittedBy`)) as total_submitter from e_submissions22 where `es_submittedFor`='Magazine' and 
						es_created_date = dayx) as total_print_submitter,
						
						
						sum(`es_submittedFor`='students-print') as total_students,
						(select count(distinct(`es_submittedBy`)) as total_submitter from e_submissions22 where `es_submittedFor`='students-print' and es_created_date = dayx) as total_students_submitter,
						
						
						
						sum(`es_submittedFor`='Specials') as total_specials,
						(select count(distinct(`es_submittedBy`)) as total_submitter from e_submissions22 where `es_submittedFor`='Specials' and es_created_date = dayx) as total_specials_submitter
						

						FROM `e_submissions22` WHERE 1
						
						group by `dayx`
						ORDER BY `dayx`  DESC";

		$sql_cnt = "SELECT count(distinct(es_id)) as sql_cnt FROM `e_submissions22` WHERE 1";

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

		if (count($where)>0)
		{
			$where = implode(" AND ",$where);
		} else {
			$where = "";
		}

		$sql_data = "SELECT *

						FROM `e_submissions22` WHERE $where
						
						ORDER BY `es_id`  DESC";

		$sql_cnt = "SELECT count(distinct(es_id)) as sql_cnt FROM `e_submissions22` WHERE 1";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

		die();
	}


}
