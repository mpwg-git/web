<?

class xluerzer_contacts_detail
{
	public static function defaultAjaxHandler($function,$param_0)
	{

		switch ($function)
		{
			case 'setAssociate':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::setAssociate();
				break;
			case 'setDupli':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::setDupli();
				break;
			case 'setRepr':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::setRepr();
				break;
			case 'setClient':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::setClient();
				break;
			case 'setDistri':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::setDistri();
				break;

			case 'loadContactLog':
				self::loadContactLog();
				break;
			case 'saveContactLog':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::saveContactLog();
				break;
			case 'delContactLog':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::delContactLog();
				break;

			case 'mediaByCatId':
				self::mediaByCatId();
				die();
			case 'publish':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				xluerzer_user::liveSecurityCheckByTag('CRM-PUBLISH-MEDIA');
				self::publish($param_0);
				break;
			case 'updateProfile':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::updateProfile($param_0);
				break;
			case 'updateContacts':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::updateContacts($param_0);
				break;
			case 'save':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::save($param_0);
				break;
			case 'details':
				self::handleDetailData($param_0);
				break;
			case 'detailsLoadFE':
				self::detailsLoadFE($param_0);
				break;
			case 'associated':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::handleAssociated($param_0);
				break;
			case 'associatedReverse':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::handleAssociatedReserved($param_0);
				break;
			case 'duplicates':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::handleDuplicates($param_0);
				break;
			case 'distributors':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::handleDistributors($param_0);
				break;
			case 'representatives':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::handleRepresentatives($param_0);
				break;
			case 'clients':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::handleClients($param_0);
				break;
			case 'employees':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::handleEmployees($param_0);
				break;
			case 'contactLog':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::handleContactLog($param_0);
				break;
			case 'ranking':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::loadRanking();
				break;
			case 'undeleteContact':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::undeleteContact();
				break;
			default:
				die('JJJ');
		}
	}


	public static function setAssociate()
	{
		$ec_id = intval($_REQUEST['ec_id']);
		$other = intval($_REQUEST['other']);

		dbx::insert('e_contacts_associated',array('eca_contact_id'=>$ec_id,'eca_associated_id'=>$other,'eca_created_ts'=>'NOW()'));

		xluerzer_contacts::updateRankingById($ec_id);
		xluerzer_contacts::updateRankingById($other);


		frontcontrollerx::json_success(array('setAssociate'));
	}

	public static function setDupli()
	{
		$ec_id = intval($_REQUEST['ec_id']);
		$other = intval($_REQUEST['other']);

		if ($ec_id == $other)
		{
			frontcontrollerx::json_failure("ERROR: You cannot set the same contact as it's own duplicate.");
		}

		dbx::insert('e_contacts_duplicates',array('ecd_contact_id'=>$ec_id,'ecd_duplicate_id'=>$other,'ecd_created_ts'=>'NOW()'));
		dbx::update('e_contacts',array('ec_duplicate'=>1),array('ec_id'=>$other));


		xluerzer_contacts::updateRankingById($ec_id);
		xluerzer_contacts::updateRankingById($other);


		frontcontrollerx::json_success(array('setDupli'));
	}

	public static function setRepr()
	{
		$ec_id = intval($_REQUEST['ec_id']);
		$other = intval($_REQUEST['other']);

		dbx::insert('e_contacts_representants',array('ecr_contact_id'=>$ec_id,'ecr_represented_id'=>$other,'ecr_created_ts'=>'NOW()'));

		frontcontrollerx::json_success(array('setRepr'));
	}

	public static function setClient()
	{
		$ec_id = intval($_REQUEST['ec_id']);
		$other = intval($_REQUEST['other']);

		dbx::insert('e_contacts_representants',array('ecr_contact_id'=>$other,'ecr_represented_id'=>$ec_id,'ecr_created_ts'=>'NOW()'));

		frontcontrollerx::json_success(array('setClient'));
	}

	public static function setDistri()
	{
		$ec_id = intval($_REQUEST['ec_id']);
		$other = intval($_REQUEST['other']);

		//		dbx::insert('e_distributors',array('ed_contact_id'=>$ec_id,'acc_client_id'=>$other,'ecr_created_ts'=>'NOW()'));

		frontcontrollerx::json_success(array('setDistri'));
	}


	public static function undeleteContact()
	{
		$ec_id = intval($_REQUEST['ec_id']);
		
		if ($ec_id == 0) return false;
		
		dbx::update('e_contacts',array('ec_del'=>'N'),array('ec_id' => $ec_id));

		xluerzer_contacts::updateRankingById($ec_id);

		frontcontrollerx::json_success(array('undeleteContact'));
	}


	public static function publish()
	{
		$ec_id	= intval($_REQUEST['ec_id']);
		xluerzer_publish::contact_publish($ec_id);
		frontcontrollerx::json_success(array('publish'=>1));


		$copy = array(
		array(
		name_old=> 'fep_company',
		name_new=> 'ec_company'
		),
		array(
		name_old=> 'fep_firstname',
		name_new=> 'ec_firstname'
		),
		array(
		name_old=> 'fep_lastname',
		name_new=> 'ec_lastname'
		),
		array(
		name_old=> 'fep_street',
		name_new=> 'ec_address'
		),
		array(
		name_old=> 'fep_city',
		name_new=> 'ec_city'
		),
		array(
		name_old=> 'fep_zipcode',
		name_new=> 'ec_zip'
		),
		array(
		name_old=> 'fep_country_id',
		name_new=> 'ec_country_id'
		),
		array(
		name_old=> 'fep_phone_code',
		name_new=> 'ec_phone_code'
		),
		array(
		name_old=> 'fep_phone',
		name_new=> 'ec_phone'
		),
		array(
		name_old=> 'fep_fax',
		name_new=> 'ec_fax'
		),
		array(
		name_old=> 'fep_email',
		name_new=> 'ec_email'
		),
		array(
		name_old=> 'fep_url',
		name_new=> 'ec_url'
		));


		$ec_id	= intval($_REQUEST['ec_id']);
		$contact = dbx::query("select * from e_contacts where ec_id = $ec_id");
		if ($contact === false) {
			frontcontrollerx::json_success(array('nojobforme'=>1));
		}

		$db = array();

		foreach ($copy as $c)
		{
			$profileField = $c['name_old'];
			$contactField = $c['name_new'];
			$db[$profileField] = $contact[$contactField];
		}

		$profile_present = dbx::query("select * from fe_profiles where fep_contact_id = $ec_id");
		if ($profile_present === false)
		{
			$db['fep_contact_id'] = $ec_id;
			dbx::insert('fe_profiles',$db);
		} else {
			dbx::update('fe_profiles',$db,array('fep_contact_id'=>$ec_id));
		}


		frontcontrollerx::json_success(array('publish'=>1));
	}

	public static function updateContacts()
	{
		$ec_id	= intval($_REQUEST['ec_id']);
		$data 	= json_decode($_REQUEST['data']);
		$db = array();

		foreach ($data as $k => $v)
		{
			list($type,$crap) = explode("_",$k,2);
			if ($type != 'ec') continue;
			$db[$k] = $v;
		}

		dbx::update('e_contacts',$db,array('ec_id'=>$ec_id));
		frontcontrollerx::json_success(array('updateContacts'=>1));
	}

	public static function updateProfile()
	{
		$ec_id	= intval($_REQUEST['ec_id']);
		$data 	= json_decode($_REQUEST['data']);
		$db = array();

		foreach ($data as $k => $v)
		{
			list($type,$crap) = explode("_",$k,2);
			if ($type != 'fep') continue;
			$db[$k] = $v;
		}

		$fep_fe_user_id = intval($db['fep_fe_user_id']);
		if ($fep_fe_user_id > 0)
		{
			dbx::query("update fe_users set feu_personalshowcase_id=0 where feu_personalshowcase_id=$ec_id");
			dbx::update('fe_users',array('feu_personalshowcase_id'=>$ec_id),array('feu_id'=>$fep_fe_user_id));
		}

		dbx::update('fe_profiles',$db,array('fep_contact_id'=>$ec_id));
		frontcontrollerx::json_success(array('updateProfile'=>1));
	}

	public static function mediaByCatId()
	{
		$ec_id 					= intval($_REQUEST['ec_id']);
		$eamc_contactType_id 	= intval($_REQUEST['eamc_contactType_id']);

		$sql_data = "SELECT *
FROM e_archive_media, e_archive_media_credits, a_category 
WHERE  `eam_id` = eamc_archive_media_id
AND eam_specials_category_id = ac_id 
AND eamc_contact_id = $ec_id
AND eamc_contactType_id = $eamc_contactType_id ORDER BY eam_id DESC ";


		$sql_cnt = "SELECT count(*)  as sql_cnt
FROM e_archive_media, e_archive_media_credits
WHERE  `eam_id` = eamc_archive_media_id
AND eamc_contact_id = $ec_id
AND eamc_contactType_id = $eamc_contactType_id";


		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

	}

	public static function loadContactLog()
	{
		$eca_id = intval($_REQUEST['eca_id']);
		$record = dbx::query("select * from e_contacts_notes where eca_id = $eca_id");
		frontcontrollerx::json_success(array('record'=>$record));
	}

	public static function saveContactLog()
	{
		$eca_id = intval($_REQUEST['eca_id']);
		$db = json_decode($_REQUEST['record'],true);
		dbx::update("e_contacts_notes",$db,array('eca_id'=>$eca_id));
		$record = dbx::query("select * from e_contacts_notes where eca_id = $eca_id");
		frontcontrollerx::json_success(array('record'=>$record));
	}

	public static function delContactLog()
	{
		$eca_id = intval($_REQUEST['eca_id']);
		dbx::update("e_contacts_notes",array('eca_del'=>'Y'),array('eca_id'=>$eca_id));
		frontcontrollerx::json_success();
	}

	public static function save()
	{
		$ec_id 	= intval($_REQUEST['ec_id']);
		$data 	= json_decode($_REQUEST['data'],true);
		
		// check client id
		$ec_client_id	= intval($data['ec_client_id']);
		
		if ($ec_client_id != "0")
		{
			$present 		= dbx::query("select * from a_client_to_contact where actc_client_id = ".$ec_client_id);
		
			// gibt kundennr noch nicht
			if ($present === false)
			{	
				$presentOther = dbx::query("select * from a_client_to_contact where actc_contact_id = ".$ec_id);
				
				// gibt contact noch nicht
				if ($presentOther === false)
				{
					dbx::insert("a_client_to_contact", array('actc_client_id' => $ec_client_id, 'actc_contact_id' => $ec_id));	
				}	
				// gibt contcat
				else
				{
					dbx::update("a_client_to_contact", array('actc_client_id' => $ec_client_id), array('actc_contact_id' => $ec_id));	
				}
			}
			else
			{
				// ist nicht der gleiche contact
				if ($present['actc_contact_id'] != $ec_id)
				{
						frontcontrollerx::json_failure("This Client ID is already in use! Contact NOT saved!");
						die();	
				}
			}
			
		}
		
		
		$ec_company_id_via_n2n = intval($data['ec_company_id_via_n2n']);
		unset($data['ec_company_id_via_n2n']);

		$rankingexcluded = intval($data['rankingExcluded']);
		unset($data['rankingExcluded']);

		if ($ec_company_id_via_n2n == 0)
		{
			dbx::delete('e_contacts_person_to_company',array('ecptoc_person'=>$ec_id));
		} else {
			dbx::delete('e_contacts_person_to_company',array('ecptoc_person'=>$ec_id));
			dbx::insert('e_contacts_person_to_company',array('ecptoc_person'=>$ec_id,'ecptoc_company'=>$ec_company_id_via_n2n));
		}

		// update ranking exclusion

		$currUser = xluerzer::getCurrentUserId();
		$present = dbx::query("select * from a_ranking_exclusions where are_contact_id = $ec_id");
		if ($present)
		{
			if ($rankingexcluded == 0)
			{
				// update set del Y
				dbx::delete('a_ranking_exclusions',array('are_contact_id'=>$ec_id));

				// update ranking
				dbx::query("call update_ranking_by_id($ec_id);");

			}
		}
		else
		{
			if ($rankingexcluded == 1)
			{
				dbx::insert('a_ranking_exclusions',array('are_contact_id'=>$ec_id,'are_created_ts' => 'NOW()','are_created_by' => $currUser,'are_modified_by' => $currUser));

				// update ranking
				dbx::query("call update_ranking_by_id($ec_id);");

			}
		}

		$old = dbx::query("select * from e_contacts where ec_id = $ec_id");

		if (isset($data['ec_assignedTo']))
		{
			if ($old['ec_assignedTo'] != $data['ec_assignedTo'])
			{
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ASSIGNED_TO');
			}
		}
		
		
		$fep_show_on_web = ($data['ec_show_on_web'] == '1') ? '1' : '0';
		dbx::update('fe_profiles',array('fep_show_on_web'=>$fep_show_on_web),array('fep_contact_id'=>$ec_id));
		
		
		
		
		

		dbx::update('e_contacts',$data,array('ec_id'=>$ec_id));
		xluerzer_log::pushLog('UPDATE','e_contacts','ec_id',$ec_id,$old);
		frontcontrollerx::json_success(array('ec_id'=>$ec_id));
	}


	public static function detailsLoadFE()
	{
		$ec_id = intval($_REQUEST['ec_id']); // FE USER ID 
		$fe_user = dbx::query("select * from  fe_users where feu_id = $ec_id");
		frontcontrollerx::json_success(array('fe_user'=>$fe_user));
	}
	
	public static function handleDetailData($function)
	{
		$ec_id 	= intval($_REQUEST['ec_id']);
		$record = dbx::query("select * from e_contacts where ec_id = $ec_id");

		$ec_assignedTo = intval($record['ec_assignedTo']);

		$credited = dbx::queryAll("SELECT COUNT( * ) AS cnt, act_description, eamc_contactType_id
FROM e_archive_media_credits, a_contact_type
WHERE act_id =  `eamc_contactType_id` 
AND  `eamc_contact_id` = $ec_id
AND eamc_archive_media_id != -1
GROUP BY  `eamc_contactType_id` "); 

		$record['credited'] 	= $credited;
		$record['profile'] 		= dbx::query("select * from fe_profiles where fep_contact_id = $ec_id");
		$record['assigned'] 	= dbx::query("select * from a_backend_user where abu_id = $ec_assignedTo");

		$record['ec_company_id_via_n2n'] = intval(dbx::queryAttribute("select * from e_contacts_person_to_company where ecptoc_person = $ec_id","ecptoc_company"));


		$cats = dbx::queryAll("SELECT accg_categorygroup, acc_category, acc_id
FROM a_contact_to_category, a_contact_category, a_contact_category_group
WHERE actc_contact_id = $ec_id
AND actc_category_id = acc_id
AND acc_categoryGroup_id = accg_id

ORDER BY accg_categorygroup ASC, acc_category ASC

");

		$record['company'] = dbx::query("select * from e_contacts,a_country  where ec_country_id = ac_id and ec_id = ".intval($record['ec_company_id_via_n2n']));
		$record['cats'] = $cats;

		$country = dbx::query("select * from e_contacts,a_country where ec_country_id = ac_id and ec_id = $ec_id");
		if ($country !== false)
		{
			foreach ($country as $k => $v)
			{
				$record[$k] = $v;
			}

		}


		// check for rankingexclusion

		$record['rankingExcluded'] = 0;
		$present = dbx::query("select * from a_ranking_exclusions where are_contact_id = $ec_id and are_del = 'N'");
		if ($present)
		{
			$record['rankingExcluded'] = 1;
		}


		frontcontrollerx::json_success(array('record'=>$record));
	}

	public static function handleAssociated($function)
	{
		$id = intval($_REQUEST['ec_id']);

		$sql_data = "select * from `e_contacts_associated`,e_contacts where eca_contact_id = $id and ec_id  = eca_associated_id	 order by `eca_associated_id` asc";
		$sql_cnt = "select count(distinct(eca_id)) as sql_cnt from `e_contacts_associated` , e_contacts where eca_contact_id = $id and ec_id  = eca_associated_id	 ";



		switch ($function)
		{
			case 'remove':

				$ids = explode(",",$_REQUEST['ids']);
				foreach ($ids as $idx)
				{
					$idx = intval($idx);
					if ($idx == 0) continue;

					dbx::delete('e_contacts_associated',array('eca_id'=>intval($idx)));

					xluerzer_contacts::updateRankingById($id);
					xluerzer_contacts::updateRankingById(intval($idx));


				}

				break;
			default: break;
		}



		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

	}
	
	public static function handleAssociatedReserved($function)
	{
		$id = intval($_REQUEST['ec_id']);

		$sql_data = "select * from `e_contacts_associated`,e_contacts where eca_contact_id = ec_id and $id  = eca_associated_id	 order by `eca_associated_id` asc";
		$sql_cnt = "select count(distinct(eca_id)) as sql_cnt from `e_contacts_associated` , e_contacts where eca_contact_id = ec_id and $id  = eca_associated_id	 ";



		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

	}
	public static function handleDuplicates($function)
	{
		$id = intval($_REQUEST['ec_id']);


		switch ($function)
		{
			case 'remove':


				$ids = explode(",",$_REQUEST['ids']);
				foreach ($ids as $idx)
				{
					$idx = intval($idx);
					if ($idx == 0) continue;

					set_time_limit(0);
					ignore_user_abort(true);

					$duplicate = dbx::query("select * from e_contacts_duplicates where ecd_id = $idx");
					dbx::delete('e_contacts_duplicates',array('ecd_id'=>intval($idx)));
					dbx::update('e_contacts',array('ec_duplicate'=>0),array('ec_id'=>intval($duplicate['ecd_duplicate_id'])));


					xluerzer_contacts::updateRankingById($id);
					xluerzer_contacts::updateRankingById($duplicate['ecd_duplicate_id']);

				}






				break;
			default: break;
		}


		$sql_data = "select * from `e_contacts_duplicates`,e_contacts where ecd_contact_id = $id and ec_id = ecd_duplicate_id order by `ecd_duplicate_id` asc";
		$sql_cnt = "select count(distinct(ecd_id)) as sql_cnt from `e_contacts_duplicates` ,e_contacts where ecd_contact_id = $id and ec_id = ecd_duplicate_id ";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

	}

	public static function handleDistributors($function)
	{
		$id = intval($_REQUEST['ec_id']);

		$sql_data = "select * from `e_distributors` where ed_contact_id = $id order by `ed_id` desc";
		$sql_cnt = "select count(distinct(ed_id)) as sql_cnt from `e_distributors` where ed_contact_id = $id";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

	}

	public static function handleRepresentatives($function)
	{
		$id = intval($_REQUEST['ec_id']);

		$sql_data = "select * from `e_contacts_representants`,e_contacts,a_country,a_backend_user where ecr_contact_id = $id and ec_id = ecr_represented_id and ecr_del='N' and ec_country_id = ac_id and abu_id = ec_assignedTo		order by `ecr_id` desc";
		$sql_cnt = "select count(distinct(ecr_id)) as sql_cnt from `e_contacts_representants`,e_contacts,a_country,a_backend_user where ecr_contact_id = $id  and ec_id = ecr_represented_id  and ecr_del='N'  and ec_country_id = ac_id  and abu_id = ec_assignedTo ";


		switch ($function)
		{

			case 'update':

				$field = $_REQUEST['field'];
				switch ($field)
				{
					case 'ecr_comments':
						dbx::update("e_contacts_representants",array('ecr_comments'=>$_REQUEST['value']),array('ecr_id'=>intval($_REQUEST['id'])));
						break;
					default: break;
				}

				break;

			case 'remove':

				$ids = explode(",",$_REQUEST['ids']);
				foreach ($ids as $idx)
				{
					$idx = intval($idx);
					if ($idx == 0) continue;
					dbx::update("e_contacts_representants",array('ecr_del'=>'Y'),array('ecr_id'=>intval($idx)));
				}

				break;
			default: break;
		}

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

	}

	public static function handleClients($function)
	{
		$id = intval($_REQUEST['ec_id']);

		$sql_data = "select * from `e_contacts_representants`,e_contacts,a_country,a_backend_user where ecr_represented_id = $id and ec_id = ecr_contact_id and ecr_del='N' and ec_country_id = ac_id and abu_id = ec_assignedTo		order by `ecr_id` desc";
		$sql_cnt = "select count(distinct(ecr_id)) as sql_cnt from `e_contacts_representants`,e_contacts,a_country,a_backend_user where ecr_represented_id = $id  and ec_id = ecr_contact_id  and ecr_del='N'  and ec_country_id = ac_id  and abu_id = ec_assignedTo ";



		switch ($function)
		{

			case 'update':

				$field = $_REQUEST['field'];
				switch ($field)
				{
					case 'ecr_comments':
						dbx::update("e_contacts_representants",array('ecr_comments'=>$_REQUEST['value']),array('ecr_id'=>intval($_REQUEST['id'])));
						break;
					default: break;
				}

				break;

			case 'remove':

				$ids = explode(",",$_REQUEST['ids']);
				foreach ($ids as $idx)
				{
					$idx = intval($idx);
					if ($idx == 0) continue;
					dbx::update("e_contacts_representants",array('ecr_del'=>'Y'),array('ecr_id'=>intval($idx)));
				}

				break;
			default: break;
		}

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

	}

	public static function handleEmployees($function)
	{
		$id = intval($_REQUEST['ec_id']);

		$data = dbx::query("select ecptoc_company from e_contacts_person_to_company where ecptoc_person = $id");

		$dataint = intval($data['ecptoc_company']);

		$sql_data = "select * from `e_contacts_person_to_company`,e_contacts where ecptoc_company = $id and ecptoc_person = ec_id order by `ecptoc_id` desc";
		$sql_cnt = "select count(distinct(ecptoc_id)) as sql_cnt from `e_contacts_person_to_company`,e_contacts where ecptoc_company = $id and ecptoc_person = ec_id";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

	}

	public static function handleContactLog($function)
	{

		$id = intval($_REQUEST['ec_id']);

		$extFunctionsConfig = array(
		'table'				=> 'e_contacts_notes',
		'db_prefix'			=> 'eca_',
		'pid'				=> 'eca_id',
		'fid'				=> 'eca_id',
		'sort'				=> 'eca_date',
		'del'				=> 'eca_del',
		'fields'			=> array('eca_id', 'eca_contact_id', 'eca_contact', 'eca_date', 'eca_time', 'eca_description', 'eca_backendUser_id', 'eca_created_ts','eca_created_by','eca_modified_ts','eca_modified_by','eca_deleted','edm_meta_keywords_auto','eca_del','eca_fid','eca_sort'),
		'preSelect'			=> ' , (select abu_username from a_backend_user where eca_backendUser_id = abu_id  ) as abu_username , date(eca_date) as eca_date ',
		'extraLoad'			=> " eca_contact_id = $id ",
		'extraInsert'		=> array('eca_date' => 'NOW()','eca_created_ts' => 'NOW()','eca_contact_id'=>$id,'eca_backendUser_id'=>0),
		'update'			=> array(),
		'normalize'			=> array()
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}
	
	
	public static function handleContactLogAll($function)
	{
		
		$day = dbx::escape($_REQUEST['dayx']);

		//die("logreport day ".$day);		

		$extFunctionsConfig = array(
		'table'				=> 'e_contacts_notes',
		'db_prefix'			=> 'eca_',
		'pid'				=> 'eca_id',
		'fid'				=> 'eca_id',
		'sort'				=> 'eca_date',
		'del'				=> 'eca_del',
		'fields'			=> array('eca_id', 'eca_contact_id', 'eca_contact', 'eca_date', 'eca_time', 'eca_description', 'eca_backendUser_id', 'eca_created_ts','eca_created_by','eca_modified_ts','eca_modified_by','eca_deleted','edm_meta_keywords_auto','eca_del','eca_fid','eca_sort'),
		'preSelect'			=> ' , (select abu_username from a_backend_user where eca_backendUser_id = abu_id  ) as abu_username , date(eca_date) as eca_date, (select CONCAT(ec_company, " ", ec_firstname, " ", ec_lastname) as namexxx from e_contacts where ec_id = eca_contact_id) as eca_contact_id_human ',
		'extraLoad'			=> " date(eca_date) = '$day' ",
		'update'			=> array(),
		'normalize'			=> array()
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}

	public static function loadRanking()
	{
		$id = intval($_REQUEST['ec_id']);

		$sql_data = "select * from `a_ranking` where ar_contact_id = $id order by `ar_pub_0` asc";
		$sql_cnt = "select count(distinct(ar_contact_id)) as sql_cnt from `a_ranking` where ar_contact_id = $id";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

	}




}