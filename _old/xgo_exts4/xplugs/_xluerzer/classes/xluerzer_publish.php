<?

class xluerzer_publish
{

	static $dieOnPublishError = true;
	public static function dieOnPublishError($state)
	{
		self::$dieOnPublishError = $state;
	}


	public static function defaultAjaxHandler($scope, $function)
	{
		switch ($scope)
		{
			case 'e_publish':
				self::e_publish();
				break;

			case 'e_unpublish':
				self::e_unpublish();
				break;

			case 'submission_publish':
				$id = intval($_REQUEST['id']);
				self::submission_publish($id);
				break;

			case 'submission_unpublish':
				$id = intval($_REQUEST['id']);
				self::submission_unpublish($id);
				break;

			default:
				return false;
		}

		die($scope);
	}


	public static function updateRankingByMediaId($media_id)
	{

		$media_id = intval($media_id);
		// get all contacts from credits
		$contactids = dbx::queryAll("select eamc_contact_id from e_archive_media_credits where eamc_archive_media_id = $media_id");

		foreach ($contactids as $k => $v) {
			$ec_id = intval($v['eamc_contact_id']);
			dbx::query("call update_ranking_by_id($ec_id);");

			$is_credited = self::checkIfContactIsCredited($ec_id);

			if ($is_credited)
			{
				self::setContactAsCredited($ec_id);
			}
			else
			{
				self::setContactAsNotCredited($ec_id);
			}

		}

	}

	public static function setMediaDataByMediaId($media_id, $data) {
		// die ("change in media id: ".$media_id." --> ".print_r($data));
		dbx::update('e_archive_media',$data,array('eam_id'=>$media_id));
	}

	public static function getCampaignId($em_id,$es_campaign)
	{
		$em_id 			= intval($em_id);
		$es_campaign 	= addslashes(trim($es_campaign));

		$present = dbx::query("select * from e_campaigns where ec_name = '$es_campaign' and ec_magazine_id = $em_id ");

		if ($present)
		{
			return $present['ec_id'];
		}

		dbx::insert('e_campaigns',array('ec_name'=>$es_campaign,'ec_magazine_id'=>$em_id));
		return dbx::getLastInsertId();
	}

	public static function e_getUpdateDetails($id, $idfield, $table) {

		$data = dbx::query("select * from $table where $idfield = $id");

		if($data === false)
		{
			frontcontrollerx::json_failure("ERROR: e_getUpdateDetails $idfield, $table");
		}

		$update = array();

		switch ($table) {

			case 'e_digital_web':

				### Magazin Infos
				$em_id = intval($data['edw_magazine_id']);

				if($em_id > 0)
				{
					$magazin = dbx::query("select * from e_magazine where em_id = $em_id");

					$em_type 			= intval($magazin['em_type']);
					$em_published_day 	= trim($magazin['em_published_day']);

					$update['eam_magazine_type'] 		= $em_type;
					$update['eam_magazine_published'] 	= $em_published_day;
				}

				$update['eam_record_title']		 = $data['edw_title'];
				$update['eam_record_infotext']	 = xredaktor_xr_html::toStaticHtml($data['edw_description']);
				$update['eam_record_img_s_id']	 = $data['edw_preview_image'];
				$update['eam_record_id']	 	= $data['edw_id'];
				$update['eam_type']	 	 		= 4;
				$update['eam_magazine_id']	 	= $data['edw_magazine_id'];
				$update['eam_magazine_year']	= $data['edw_year'];
				$update['eam_magazine_edition']	= $data['edw_edition'];
				$update['eam_full_text_search']	= $data['edw_title'].' '.strip_tags($data['edw_description']);
				$update['eam_created_ts']		= 'NOW()';

				// aus json: id, link1, link2, gallery
				$json_data = array(
				'edw_id' 			=> $data['edw_id'],
				'edw_link1' 		=> $data['edw_link1'],
				'edw_linkText1' 	=> $data['edw_linkText1'],
				'edw_link2' 		=> $data['edw_link2'],
				'edw_linkText2' 	=> $data['edw_linkText2'],
				'edw_img_gallery' 	=> $data['edw_img_gallery']
				);
				$json_data = json_encode($json_data);
				$update['eam_record_data_json']  = $json_data;
				break;


			case 'e_digital_app':

				### Magazin Infos
				$em_id = intval($data['eda_magazine_id']);

				if($em_id > 0)
				{
					$magazin = dbx::query("select * from e_magazine where em_id = $em_id");

					$em_type 			= intval($magazin['em_type']);
					$em_published_day 	= trim($magazin['em_published_day']);

					$update['eam_magazine_type'] 		= $em_type;
					$update['eam_magazine_published'] 	= $em_published_day;
				}

				$update['eam_record_title']		= $data['eda_title'];
				$update['eam_record_infotext']	= xredaktor_xr_html::toStaticHtml($data['eda_description']);
				$update['eam_record_img_s_id']	= $data['eda_preview_image'];
				$update['eam_record_id']	 	= $data['eda_id'];
				$update['eam_type']	 	 		= 5;
				$update['eam_magazine_id']	 	= $data['eda_magazine_id'];
				$update['eam_magazine_year']	= $data['eda_year'];
				$update['eam_magazine_edition']	= $data['eda_edition'];
				$update['eam_full_text_search']	= $data['eda_title'].' '.strip_tags($data['eda_description_publish']);
				$update['eam_created_ts']		= 'NOW()';

				// aus json: id, link1, link2, gallery
				$json_data = array(
				'eda_id' 			=> $data['eda_id'],
				'eda_link1' 		=> $data['eda_link1'],
				'eda_linkText1' 	=> $data['eda_linkText1'],
				'eda_link2' 		=> $data['eda_link2'],
				'eda_linkText2' 	=> $data['eda_linkText2'],
				'eda_img_gallery' 	=> $data['eda_img_gallery']
				);
				$json_data = json_encode($json_data);
				$update['eam_record_data_json']  = $json_data;
				break;


			case 'e_submissions':
				// TODO
				$em_id = intval($data['es_magazine_id']);

				if($em_id > 0)
				{
					$magazin = dbx::query("select * from e_magazine where em_id = $em_id");

					$em_type 			= intval($magazin['em_type']);
					$em_published_day 	= trim($magazin['em_published_day']);
					$em_edition			= $magazin['em_edition'];
					$em_year			= $magazin['em_year'];

					$update['eam_magazine_type'] 		= $em_type;
					$update['eam_magazine_published'] 	= $em_published_day;
					$update['eam_magazine_edition']		= $em_edition;
					$update['eam_magazine_year']		= $em_year;
				}

				$update['eam_magazine_id']				= $data['es_magazine_id'];
				$update['eam_type']						= $data['es_mediaType_id'];
				$update['eam_specials_category_id']		= $data['es_category_id'];
				$update['eam_specials_country_id']		= $data['es_country_id'];
				$update['eam_specials_submission_id']	= $data['es_id'];
				$update['eam_specials_archivNr']		= trim($data['es_archivNr']);
				$update['eam_record_id']				= $data['es_id'];
				//$update['eam_record_campaign_id']		= trim($data['es_campaign']);
				// $update['eam_record_title']			wird unten via credits aufgerufne
				$update['eam_record_campaign']			= $data['es_campaign'];
				$update['eam_record_infotext']			= $data['es_infotext'];
				$update['eam_record_img_s_id']			= $data['es_image_s_id'];
				$update['eam_record_video_s_id']		= $data['es_video_s_id'];




				$json_data = array();

				if (trim($data['es_archivNr']) == "")
				{
					frontcontrollerx::json_failure("SUBMISSION #$id - ERROR: Archiv Nr. is not set.");
				}

				## check format of archivNr
				if (strpos($data['es_archivNr'],'.')===false)
				{
					frontcontrollerx::json_failure("SUBMISSION #$id - ERROR: Archiv Nr. is not in correct format: yyyy.xxxx .");
				}


				/* TODO für specials anpassen
				 
				list($_dot_pre,$_dot_post) = explode(".",$data['es_archivNr']);

				if (strlen($_dot_post) != 4)
				{
					frontcontrollerx::json_failure("SUBMISSION #$id - ERROR: Archiv Nr. is not in correct format: yyyy.xxxx .");
				}

				if (strlen($_dot_pre) < 1)
				{
					frontcontrollerx::json_failure("SUBMISSION #$id - ERROR: Archiv Nr. is not in correct format: yyyy.xxxx .");
				}
				
				*/
				
				switch ($data['es_mediaType_id'])
				{
					case '1':
						$json_data = array(
						'es_image_s_id' 						=> $data['es_image_s_id'],
						'es_image_highRes_s_id' 				=> $data['es_image_highRes_s_id'],
						'es_image_highRes_created' 				=> $data['es_image_highRes_created'],
						'es_image_highRes_modified' 			=> $data['es_image_highRes_modified'],
						'es_image_highRes_status' 				=> $data['es_image_highRes_status'],
						);
						break;

					case '2':

						if (($data['es_video_poster_original_or_thumb'] == 'ORIGINAL') && (intval($data['es_video_poster_original_id'])>0))
						{
							$update['eam_record_img_s_id']			= $data['es_video_poster_original_id'];
						} else {
							$update['eam_record_img_s_id']			= $data['es_video_poster_s_id'];
						}

						if ($data['es_video_encoded'] == 0)
						{
							frontcontrollerx::json_failure("SUBMISSION #$id - ERROR: Video is not encoded yet.");
						}

						$json_data = array(
						'es_video_s_id' 						=> $data['es_video_s_id'],
						'es_video_poster_s_id' 					=> $data['es_video_poster_s_id'],
						'es_video_poster_original_id' 			=> $data['es_video_poster_original_id'],
						'es_video_poster_original_or_thumb' 	=> $data['es_video_poster_original_or_thumb'],
						'es_video_thumbs_json' 					=> $data['es_video_thumbs_json'],
						'es_video_480_mp4_s_id' 				=> $data['es_video_480_mp4_s_id'],
						'es_video_480_webm_s_id' 				=> $data['es_video_480_webm_s_id'],
						'es_video_720_mp4_s_id' 				=> $data['es_video_720_mp4_s_id'],
						'es_video_720_webm_s_id' 				=> $data['es_video_720_webm_s_id'],
						'es_video_1080_mp4_s_id' 				=> $data['es_video_1080_mp4_s_id'],
						'es_video_1080_webm_s_id' 				=> $data['es_video_1080_webm_s_id'],
						);
						break;

					default:
						break;
				}

				$json_data = json_encode($json_data);
				$update['eam_record_data_json']  = $json_data;

				$eam_record_title = dbx::query("select * from e_contacts,e_submissions_credits where esc_submission_id = $id and esc_contactType_id = 7 and esc_contact_id = ec_id");
				$update['eam_record_title'] = $eam_record_title['ec_company'];


				$data['es_campaign_admin'] = trim($data['es_campaign_admin']);

				if ($data['es_campaign_admin'] == "")
				{
					$data['es_campaign_admin'] = trim($data['es_campaign']);
				}

				if (trim($data['es_campaign_admin']) == "")
				{
					frontcontrollerx::json_failure("SUBMISSION #$id - ERROR: No campaign name is set.");
				}

				dbx::update('e_submissions',array('es_campaign_admin'=>$data['es_campaign_admin'],'es_campaign_id'=>self::getCampaignId($em_id,$data['es_campaign_admin'])),array('es_id'=>intval($id)));
				$update['eam_record_campaign_id'] 	 = self::getCampaignId($em_id,$data['es_campaign_admin']);

				break;

			case 'e_contacts':

				$published = '';

				switch ($data['ec_type'])
				{
					case 1:
						$published = $data['ec_lastname'].", ".$data['ec_firstname'];
						break;

					case 0:
					default:
						$published = $data['ec_company'];
						break;
				}

				$full_name = '';

				if ($data['ec_lastname'] != '' || $data['ec_lastname'] != '')
				{
					$full_name = $data['ec_lastname'].", ".$data['ec_firstname'];
				}

				$update['fep_contact_id']		 = $data['ec_id'];

				$update['fep_lastname']		 	 = $data['ec_lastname'];
				$update['fep_firstname']		 = $data['ec_firstname'];
				$update['fep_company']			 = $data['ec_company'];
				$update['fep_published']		 = $published;
				$update['fep_street']		 	 = $data['ec_address'];
				$update['fep_zipcode']		 	 = $data['ec_zip'];
				$update['fep_city']				 = $data['ec_city'];
				$update['fep_state']		 	 = $data['ec_state'];
				$update['fep_phone']		 	 = $data['ec_phone'];
				$update['fep_fax']		 		 = $data['ec_fax'];
				$update['fep_email']		 	 = $data['ec_email'];
				$update['fep_url']		 		 = $data['ec_url'];
				$update['fep_country_id']		 = $data['ec_country_id'];
				$update['fep_fullname']		 	 = $fullname;

				$update['fep_publishFirstname']		 	 = 1;
				$update['fep_publishLastname']		 	 = 1;
				$update['fep_publishCompany']		 	 = 1;
				$update['fep_publishStreet']		 	 = 0;
				$update['fep_publishPhone']		 	 	 = 0;
				$update['fep_publishFax']		 	 	 = 0;
				$update['fep_publishMail']		 	 	 = 0;
				$update['fep_publishUrl']		 	 	 = 1;
				$update['fep_publishzip']		 	 	 = 1;

				$update['fep_beyond_archive_contactType'] = $data['ec_contactType_id'];
				$update['fep_phone_code'] = $data['ec_phone_code'];

				$update['fep_social_skype'] = $data['ec_skype'];
				$update['fep_social_facebook'] = $data['ec_facebook'];
				$update['fep_social_linkedin'] = $data['ec_linkedin'];

				$update['fep_type'] = $data['ec_type'];

				$update['fep_created_ts']		= 'NOW()';

				$update['fep_full_text_search'] = $update['fep_firstname']." ".$update['fep_lastname']." ".$update['fep_company']." ".$update['fep_url'];

				break;

			default:
		}

		return $update;
	}


	public static function e_publish($scopex=false,$id=false,$terminate=true)
	{
		$eam_id = 0;

		if ($id === false)
		{
			$id	= intval($_REQUEST['id']);
		}

		if ($scopex === false)
		{
			$scopex = trim($_REQUEST['scopex']);
		}
		if(intval($id) == 0)
		{
			frontcontrollerx::json_failure("ERROR: ID missing for $scopex.");
		}

		list($table,$p_id,$prefix) = xluerzer_oe::scopex2db($scopex);
		$old = dbx::query("select * from $table where $p_id = $id ");

		xluerzer_log::pushLog('PUBLISH',$table,$p_id,$id);

		if ($old[$prefix.'og_auto'] == 'Y')
		{
			switch ($scopex)
			{
				case 'e_interviews':
				case 'e_digitalInterviews':

					$db = array();
					$gallery = json_decode($old[$prefix.'img_gallery'],true);
					$db[$prefix.'og_image'] = 0;
					if (isset($gallery[0]))
					{
						$db[$prefix.'og_image'] = $gallery[0];
					}
					$db[$prefix.'og_title'] 		= trim(strip_tags($old[$prefix.'title']));
					$db[$prefix.'og_description'] 	= trim(strip_tags($old[$prefix.'col_left']));
					dbx::update($table,$db,array($p_id=>$id));

					break;


				case 'e_digital_app':
				case 'e_digital_web':

					$db = array();
					$gallery = json_decode($old[$prefix.'img_gallery'],true);
					$db[$prefix.'og_image'] = 0;
					if (isset($gallery[0]))
					{
						$db[$prefix.'og_image'] = $gallery[0];
					}
					$db[$prefix.'og_title'] 		= trim(strip_tags($old[$prefix.'title']));
					$db[$prefix.'og_description'] 	= trim(strip_tags($old[$prefix.'description']));
					dbx::update($table,$db,array($p_id=>$id));

					break;
				default:

					break;
			}


		}

		switch ($scopex)
		{
			case 'e_interviews':
			case 'e_digitalInterviews':

				if (($old[$prefix.'edition'] == 0) || ($old[$prefix.'year'] == 0))
				{
					if (!self::$dieOnPublishError) return ;
					frontcontrollerx::json_failure("($scopex) #$id cannot be published. Please publish via Magazine/Publish.");
				}


				$db = array();

				$db[$prefix.'title_publish'] 	= trim($old[$prefix.'title']);
				$db[$prefix.'col_left_publish'] = trim($old[$prefix.'col_left']);

				## GALLERY
				$db[$prefix.'img_gallery_publish'] 		= $old[$prefix.'img_gallery'];
				$s_ids = json_decode($db[$prefix.'img_gallery_publish'],true);
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


				$db[$prefix.'img_gallery_publish_txt'] = json_encode($data);
				$db[$prefix.'state'] = 'PUBLISHED';

				if (($db[$prefix.'title_publish'] == ""))
				{
					if (!self::$dieOnPublishError) return ;
					frontcontrollerx::json_failure("($scopex) #$id cannot be published. Please enter a interview partner.");
				}


				if (trim(strip_tags($db[$prefix.'col_left_publish']) == "") && ($old['ei_pdfOnly'] != 'Y'))
				{
					if (!self::$dieOnPublishError) return ;
					print_r($db);
					frontcontrollerx::json_failure("($scopex) #$id cannot be published. Please enter content.");
				}


				xluerzer_log::pushLog('PUBLISH',$table,$p_id,$id);
				dbx::update($table,$db,array($p_id=>$id));
				break;

			case  'e_digital_web':

				$present = dbx::query("select e_digital_web.*, em_published, em_id from e_digital_web,e_magazine where edw_id = $id and edw_magazine_id = em_id");

				if($present === false)
				{
					if (!self::$dieOnPublishError) return ;
					frontcontrollerx::json_failure("WEB #$id - ERROR: No magazine assigned.");
				}

				$edw_media_id 	= intval($present['edw_media_id']);
				$em_id 			= intval($present['em_id']);
				$em_published 	= intval($present['em_published']);

				if($em_id == 0)
				{
					if (!self::$dieOnPublishError) return ;
					frontcontrollerx::json_failure("WEB #$id -ERROR: No magazine assigned.");
				}

				if($em_published == 0)
				{
					//if (!self::$dieOnPublishError) return ;
					//frontcontrollerx::json_failure("WEB #$id -ERROR: Magazine not published.");
				}

				// TODO check min 2 credits, bild id, title, recordid, year

				$archive_present = dbx::query("select eam_id from e_archive_media where eam_id = $edw_media_id and eam_type = 4 and eam_record_id = $id");

				$dataToPublish = self::e_getUpdateDetails($id, 'edw_id', 'e_digital_web');

				if($archive_present === false)
				{
					dbx::insert('e_archive_media',$dataToPublish);
					$eam_id = dbx::getLastInsertId();
				}
				else
				{
					$eam_id = intval($archive_present['eam_id']);
					dbx::update('e_archive_media',$dataToPublish,array('eam_id'=>$eam_id));
				}



				dbx::query("delete from e_archive_media_credits where eamc_archive_media_id = $eam_id and eamc_archive_media_type_id = 4 and eamc_record_id = $id");
				self::updateRankingByMediaId($eam_id);

				$credits = dbx::queryAll("select * from e_digital_web_credits where edwc_digital_web_id = $id");

				if($credits !== false && $eam_id > 0)
				{
					foreach ($credits as $key => $value) {

						$db = array(
						'eamc_record_id' 				=> $id,
						'eamc_contactType_id' 			=> intval($value['edwc_contactType_id']),
						'eamc_contact_id' 				=> intval($value['edwc_contact_id']),
						'eamc_archive_media_id' 		=> $eam_id,
						'eamc_archive_media_type_id' 	=> 4,
						'eamc_archive_media_year' 		=> intval($present['edw_year']),
						'eamc_created_ts' 				=> 'NOW()'
						);

						dbx::insert('e_archive_media_credits',$db);
						// update ranking
						$ec_id = intval($value['edwc_contact_id']);
						dbx::query("call update_ranking_by_id($ec_id);");
					}
				}

				dbx::update('e_digital_web',array('edw_state' => 9,'edw_media_id'=>$eam_id), array('edw_id'=>$id));
				self::media_publish($eam_id);

				break;


			case  'e_digital_app':

				$present = dbx::query("select e_digital_app.*, em_published, em_id from e_digital_app,e_magazine where eda_id = $id and eda_magazine_id = em_id");

				if($present === false)
				{
					if (!self::$dieOnPublishError) return ;
					frontcontrollerx::json_failure("APP #$id - ERROR: No magazine assigned.");
				}

				$eda_media_id 	= intval($present['eda_media_id']);
				$em_id 			= intval($present['em_id']);
				$em_published 	= intval($present['em_published']);

				if($em_id == 0)
				{
					if (!self::$dieOnPublishError) return ;
					frontcontrollerx::json_failure("APP #$id - ERROR: No magazine assigned.");
				}

				if($em_published == 0)
				{
					//if (!self::$dieOnPublishError) return ;
					//frontcontrollerx::json_failure("APP #$id - ERROR: Magazine not published.");
				}

				// TODO check min 2 credits, bild id, title, recordid, year

				$archive_present = dbx::query("select eam_id from e_archive_media where eam_id = $eda_media_id and eam_type = 5 and eam_record_id = $id");

				$dataToPublish = self::e_getUpdateDetails($id, 'eda_id', 'e_digital_app');

				if($archive_present === false)
				{
					dbx::insert('e_archive_media',$dataToPublish);
					$eam_id = dbx::getLastInsertId();
				}
				else
				{
					$eam_id = intval($archive_present['eam_id']);
					dbx::update('e_archive_media',$dataToPublish,array('eam_id'=>$eam_id));
				}

				dbx::query("delete from e_archive_media_credits where eamc_archive_media_id = $eam_id and eamc_archive_media_type_id = 5 and eamc_record_id = $id");

				$credits = dbx::queryAll("select * from e_digital_app_credits where edac_digital_app_id = $id");


				if($credits !== false && $eam_id > 0)
				{
					foreach ($credits as $key => $value) {

						$db = array(
						'eamc_record_id' 				=> $id,
						'eamc_contactType_id' 			=> intval($value['edac_contactType_id']),
						'eamc_contact_id' 				=> intval($value['edac_contact_id']),
						'eamc_archive_media_id' 		=> $eam_id,
						'eamc_archive_media_type_id' 	=> 5,
						'eamc_archive_media_year' 		=> intval($present['eda_year']),
						'eamc_created_ts' 				=> 'NOW()'
						);

						dbx::insert('e_archive_media_credits',$db);
					}
				}

				dbx::update('e_digital_app',array('eda_state' => 9,'eda_media_id'=>$eam_id), array('eda_id'=>$id));
				self::media_publish($eam_id);


				break;

			case  'e_submission':
				self::submission_publish($id);
				break;

			case  'e_contacts':
				self::contact_publish($id);
				break;


			default: break;
		}

		if ($terminate)
		{
			frontcontrollerx::json_success();
		}

		return $eam_id;
	}

	public static function e_unpublish($scopex=false,$id=false,$terminate=true)
	{

		if ($id === false)
		{
			$id	= intval($_REQUEST['id']);
		}


		if ($scopex === false)
		{
			$scopex = trim($_REQUEST['scopex']);
		}
		if(intval($id) == 0)
		{
			frontcontrollerx::json_failure("ERROR: ID missing for $scopex.");
		}


		list($table,$p_id,$prefix) = xluerzer_oe::scopex2db($scopex);
		xluerzer_log::pushLog('UNPUBLISH',$table,$p_id,$id);

		switch ($scopex)
		{
			case 'e_interviews':
			case 'e_digitalInterviews':

				$db = array();
				$db[$prefix.'state'] = 'EDITING';
				dbx::update($table,$db,array($p_id=>$id));

				break;

			case  'e_digital_web':

				$present = dbx::query("select edw_media_id, em_published, em_id from e_digital_web,e_magazine where edw_id = $id and edw_magazine_id = em_id");

				if($present === false)
				{
					frontcontrollerx::json_failure("ERROR: No magazine assigned.");
				}

				$edw_media_id 	= intval($present['edw_media_id']);
				$em_id 			= intval($present['em_id']);
				$em_published 	= intval($present['em_published']);

				if($edw_media_id == 0)
				{
					frontcontrollerx::json_failure("ERROR: No archive media id assigned.");
				}

				if($em_id == 0)
				{
					frontcontrollerx::json_failure("ERROR: No magazine assigned.");
				}

				$archive_present = dbx::query("select eam_id from e_archive_media where eam_id = $edw_media_id and eam_type = 4 and eam_record_id = $id");

				if($archive_present === false)
				{
					frontcontrollerx::json_failure("ERROR: Not in archive media present.");
				}

				$eam_id = intval($archive_present['eam_id']);
				dbx::query("delete from e_archive_media where eam_id = $eam_id and eam_type = 4 and eam_record_id = $id");
				dbx::query("delete from e_archive_media_credits where eamc_archive_media_id = $eam_id and eamc_archive_media_type_id = 4 and eamc_record_id = $id");
				dbx::update('e_digital_web',array('edw_state' => 10,'edw_media_id'=>0), array('edw_id'=>$id));
				break;

			case  'e_digital_app':

				$present = dbx::query("select eda_media_id, em_published, em_id from e_digital_app,e_magazine where eda_id = $id and eda_magazine_id = em_id");

				if($present === false)
				{
					frontcontrollerx::json_failure("ERROR: No magazine assigned.");
				}

				$eda_media_id 	= intval($present['eda_media_id']);
				$em_id 			= intval($present['em_id']);
				$em_published 	= intval($present['em_published']);

				if($eda_media_id == 0)
				{
					frontcontrollerx::json_failure("ERROR: No archive media id assigned.");
				}

				if($em_id == 0)
				{
					frontcontrollerx::json_failure("ERROR: No magazine assigned.");
				}

				$archive_present = dbx::query("select eam_id from e_archive_media where eam_id = $eda_media_id and eam_type = 5 and eam_record_id = $id");

				if($archive_present === false)
				{
					frontcontrollerx::json_failure("ERROR: Not in archive media present.");
				}

				$eam_id = intval($archive_present['eam_id']);
				dbx::query("delete from e_archive_media where eam_id = $eam_id and eam_type = 5 and eam_record_id = $id");
				dbx::query("delete from e_archive_media_credits where eamc_archive_media_id = $eam_id and eamc_archive_media_type_id = 5 and eamc_record_id = $id");
				dbx::update('e_digital_app',array('eda_state' => 10,'eda_media_id'=>0), array('eda_id'=>$id));
				break;

			case  'e_submission':
				self::submission_unpublish($id);
				break;

			case  'e_archive_media':
				self::media_unpublish($id);
				break;

			case  'e_contacts':
				self::contact_unpublish($id);
				break;

			default:
				break;
		}

		// die ("unpublish media: ".$mediaId);

		frontcontrollerx::json_success();
	}


	public static function setContactAsCredited($contact_id)
	{

		$ec_id = intval($contact_id);

		$profile = dbx::query("select * from fe_profiles where fep_contact_id = $ec_id");

		if ($profile == false)
		{
			return false;
		}
		else
		{
			$fep_contact_id = intval($profile['fep_contact_id']);

			if ($profile['fep_is_credited'] == 0)
			{
				dbx::update("fe_profiles", array('fep_is_credited' => 1), array('fep_contact_id' => $fep_contact_id));
			}
		}

		return true;

	}


	public static function setContactAsNotCredited($contact_id)
	{

		$ec_id = intval($contact_id);

		$profile = dbx::query("select * from fe_profiles where fep_contact_id = $ec_id");

		if ($profile == false)
		{
			return false;
		}
		else
		{
			$fep_contact_id = intval($profile['fep_contact_id']);

			if ($profile['fep_is_credited'] == 1)
			{
				dbx::update("fe_profiles", array('fep_is_credited' => 0), array('fep_contact_id' => $fep_contact_id));
			}
		}

		return true;

	}


	public static function setContactAsCreditedByMediaId($media_id)
	{

		$media_id = intval($media_id);
		// get all contacts from credits
		$contactids = dbx::queryAll("select eamc_contact_id from e_archive_media_credits where eamc_archive_media_id = $media_id");

		foreach ($contactids as $k => $v) {
			$ec_id = intval($v['eamc_contact_id']);
			self::setContactAsCredited($ec_id);
		}

		return true;

	}


	public static function checkIfContactIsCredited($contact_id)
	{

		$ec_id = intval($contact_id);

		$credits = dbx::queryAll("select eamc_contact_id from e_archive_media_credits where eamc_contact_id = $ec_id");

		if ($credits !== false)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	public static function checkMediaId($submission_id)
	{
		$submission_id = intval($submission_id);
		//$data = dbx::query("select * from e_archive_media where eam_record_id = $submission_id");
		$data = dbx::query("select * from e_archive_media where eam_specials_submission_id = $submission_id");
		if (!$data) {
			return false;
		}
		else {
			return $data['eam_id'];
		}

	}


	public static function contact_publish($id)
	{
		$id = intval($id);

		if ($id == 0)
		{
			frontcontrollerx::json_failure("ERROR: Contact-ID missing. (contact_publish)");
		}

		$present = dbx::query("select fep_contact_id from fe_profiles where fep_contact_id = $id");
		$dataToPublish = self::e_getUpdateDetails($id, 'ec_id', 'e_contacts');

		xluerzer_log::pushLog('PUBLISH',"e_contacts","ec_id",$id);

		if($present !== false)
		{
			unset($dataToPublish['fep_contact_id']);
			dbx::update('fe_profiles',$dataToPublish,array('fep_contact_id'=>intval($id)));
		}
		else
		{
			dbx::insert('fe_profiles',$dataToPublish);
		}

		dbx::query("call update_ranking_by_id($id);");

	}


	public static function contact_unpublish($id)
	{

		if (!isset($id))
		{
			frontcontrollerx::json_failure("ERROR: Contact-ID missing.");
		}

		$present = dbx::query("select fep_contact_id from fe_profiles where fep_contact_id = $id");

		xluerzer_log::pushLog('UNPUBLISH',"e_contacts","ec_id",$id);

		if($present === false)
		{
			frontcontrollerx::json_failure("ERROR: No public profile assigned.");
		}
		else
		{
			// TODO was noch beachten
			dbx::query("delete from fe_profiles where fep_contact_id = $id");
			dbx::query("call update_ranking_by_id($id);");
		}
	}

	public static function importSubmissionCreditsIntoArchiveMediaCredits_bySubmissionId($es_id,$eam_id)
	{
		$es_id 			= intval($es_id);
		$eam_id 		= intval($eam_id);
		$media_type_id 	= intval($media_type_id);

		$m = dbx::query("select * from e_archive_media where eam_id = $eam_id");


		$credits = dbx::queryAll("select * from e_submissions_credits where esc_submission_id = $es_id");
		dbx::query("delete from e_archive_media_credits where eamc_archive_media_id = $eam_id");

		foreach ($credits as $c)
		{
			$esc_contactType_id		= $c['esc_contactType_id'];
			$esc_contact_id			= $c['esc_contact_id'];

			$db = array(
			'eamc_record_id' 				=> $es_id,
			'eamc_contactType_id' 			=> $esc_contactType_id,
			'eamc_contact_id' 				=> $esc_contact_id,
			'eamc_archive_media_id' 		=> $eam_id,
			'eamc_archive_media_type_id'	=> $m['eam_type'],
			'eamc_archive_media_year'		=> $m['eam_magazine_year'],
			'eamc_created_ts'				=> 'NOW()',
			);

			dbx::insert('e_archive_media_credits',$db);

			// update ranking
			$ec_id = intval($db['eamc_contact_id']);
			dbx::query("call update_ranking_by_id($ec_id);");


		}
	}


	public static function handleVideoCloud($media_id)
	{
		$media_id = intval($media_id);

		$media = dbx::query("select eam_type from e_archive_media where eam_id = $media_id and eam_type = 2");
		if ($media === false) return false;

		$present = dbx::query("SELECT * FROM  `e_archive_media_cloud` WHERE  `eamc_eam_id` = $media_id ");

		if ($present === false)
		{
			$db = array(
			'eamc_cronjob_mine' 		=> '',
			'eamc_submission_id' 		=> -1,
			'eamc_eam_id' 				=> $media_id,
			'eamc_bucket_1' 			=> 1,
			'eamc_bucket_2' 			=> 2,
			'eamc_bucket_state' 		=> 'WAIT_4_UPLOAD',
			'eamc_bucket_state_1' 		=> 'NONE',
			'eamc_bucket_state_2' 		=> 'NONE',
			'eamc_bucket_1_up_start' 	=> '0000-00-00 00:00:00',
			'eamc_bucket_1_up_end' 		=> '0000-00-00 00:00:00',
			'eamc_bucket_2_up_start' 	=> '0000-00-00 00:00:00',
			'eamc_bucket_2_up_end' 		=> '0000-00-00 00:00:00',
			'eamc_bucket_1_up_seconds' 	=> 0,
			'eamc_bucket_2_up_seconds' 	=> 0,
			'eamc_created' 				=> 'CURRENT_TIMESTAMP'
			);

			dbx::insert('e_archive_media_cloud',$db);
		}
	}

	public static function submission_publish($id,$terminate=true)
	{
		if (!isset($id))
		{
			frontcontrollerx::json_failure("ERROR: Submission ID missing.");
		}

		$media_id = self::checkMediaId($id);

		// submission exists in archivemedia
		if ($media_id) {
			// update submission in archive media
			$dataToPublish = self::e_getUpdateDetails($id, 'es_id', 'e_submissions');

			xluerzer_log::pushLog('PUBLISH',"e_submissions","es_id",$id);

			$dataToPublish['eam_modified_ts']  = "NOW()";
			dbx::update('e_archive_media',$dataToPublish, array('eam_id'=>intval($media_id)));
			dbx::update('e_submissions',array('es_state'=>9), array('es_id'=>intval($id)));
			self::importSubmissionCreditsIntoArchiveMediaCredits_bySubmissionId($id,intval($media_id));
			self::handleVideoCloud($media_id);
			self::media_publish(intval($media_id));

			//xluerzer_ranking::rebuildRankingByMediaId($media_id);



			if ($terminate)
			{
				frontcontrollerx::json_success();
			}
			return $media_id;
		}
		else {

			// checks

			$dataToPublish = self::e_getUpdateDetails($id, 'es_id', 'e_submissions');

			if ($dataToPublish['eam_record_img_s_id'] == '' || $dataToPublish['eam_record_img_s_id'] == '0')
			{
				frontcontrollerx::json_failure("SUBMISSION #$id - ERROR: Submission Image missing.");
			}

			if ($dataToPublish['eam_record_id'] == '' || $dataToPublish['eam_record_id'] == '0')
			{
				frontcontrollerx::json_failure("SUBMISSION #$id - ERROR: Submission RecordID missing.");
			}

			if ($dataToPublish['eam_magazine_year'] == '' || $dataToPublish['eam_magazine_year'] == '0')
			{
				frontcontrollerx::json_failure("SUBMISSION #$id - ERROR: Submission Year missing.");
			}

			if ($dataToPublish['eam_specials_category_id'] == '' || $dataToPublish['eam_specials_category_id'] == '0')
			{
				frontcontrollerx::json_failure("SUBMISSION #$id - ERROR: Submission Category missing.");
			}

			if ($dataToPublish['eam_specials_country_id'] == '' || $dataToPublish['eam_specials_country_id'] == '0')
			{
				frontcontrollerx::json_failure("SUBMISSION #$id - ERROR: Submission Country missing.");
			}

			if (!self::getNumberOfCredits($id))
			{
				frontcontrollerx::json_failure("SUBMISSION #$id - ERROR: Less than 2 credits assigned");
			}

			if ($dataToPublish['eam_record_campaign'] == '')
			{
				$dataToPublish['eam_record_campaign'] = '[MANUAL PUBLISH] '.$dataToPublish['eam_record_id'];
			}

			// camapign id -> submission retour

			$dataToPublish = self::e_getUpdateDetails($id, 'es_id', 'e_submissions');


			//frontcontrollerx::json_debug($dataToPublish);
			//die();


			$dataToPublish['eam_created_ts']  = "NOW()";

			xluerzer_log::pushLog('PUBLISH',"e_submission","es_id",$id);


			dbx::insert('e_archive_media',$dataToPublish);
			dbx::update('e_submissions',array('es_state'=>9), array('es_id'=>intval($id)));
			$eam_id = dbx::getLastInsertId();

			self::importSubmissionCreditsIntoArchiveMediaCredits_bySubmissionId($id,intval($eam_id));

			//xluerzer_ranking::rebuildRankingByMediaId($eam_id);
			self::handleVideoCloud($media_id);
			self::media_publish($eam_id);

			if ($terminate)
			{
				frontcontrollerx::json_success();
			}
			return $eam_id;
		}

	}


	public static function submission_unpublish($id)
	{
		if (!isset($id))
		{
			frontcontrollerx::json_failure("ERROR: ID missing. (submission_unpublish)");
		}

		$media_id = self::checkMediaId($id);
		self::media_unpublish($media_id);
		frontcontrollerx::json_success();
	}


	public static function getNumberOfCredits($id)
	{

		$data = dbx::query("select count(esc_submission_id) as cnt FROM e_submissions_credits WHERE esc_submission_id = $id");

		if ($data['cnt'] >= 1) {
			return true;
		}
		else
		{
			return false;
		}

	}


	public static function media_publish($eam_id)
	{

		$eam_id = intval($eam_id);
		$contacts = dbx::queryAll("select * from e_archive_media_credits where eamc_archive_media_id = $eam_id and eamc_contact_id > 0");
		foreach ($contacts as $c)
		{

			$ec_id		= intval($c['eamc_contact_id']);
			$ec_type 	= $c['eamc_contactType_id'];

			### CONTACT PUBLISH
			if ($ec_id == 0)
			{
				frontcontrollerx::json_failure("ERROR: Contact-ID missing. (media_publish: $eam_id)");
			} else
			{
				self::contact_publish($ec_id);
			}

			// update ranking
			dbx::query("call update_ranking_by_id($ec_id);");
			self::setContactAsCredited($ec_id);
		}


	}

	public static function media_unpublish($eam_id)
	{
		$eam_id = intval($eam_id);

		$am = dbx::query("select * from e_archive_media where eam_id = $eam_id");
		if ($am === false) frontcontrollerx::json_failure("INVALID MEDIA ID");

		xluerzer_log::pushLog('UNPUBLISH',"e_archive_media","eam_id",$eam_id);

		$eam_type 		= $am['eam_type'];
		$eam_record_id 	= $am['eam_record_id'];

		switch ($eam_type)
		{
			case 5: // APP
			dbx::update('e_digital_app',array('eda_state'=>10),array('eda_id'=>$eam_record_id));
			break;
			case 4:	// WEB
			dbx::update('e_digital_web',array('edw_state'=>10),array('edw_id'=>$eam_record_id));
			break;
			case 3: // STUDENT
			break;
			case 2: // FILLM
			case 1: // print
			dbx::update('e_submissions',array('es_state'=>10),array('es_id'=>$eam_record_id));
			break;
			default: break;
		}

		dbx::query("delete from e_archive_media where eam_id = $eam_id ");
		dbx::query("delete from e_archive_media_credits where eamc_archive_media_id = $eam_id");
		self::updateRankingByMediaId($eam_id);

	}

}
