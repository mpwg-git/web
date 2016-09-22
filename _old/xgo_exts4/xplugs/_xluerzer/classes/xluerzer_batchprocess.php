<?

class xluerzer_batchprocess
{


	/********************** TODO
	* - doEmails() => absenden an empfänger string
	* - doSearchContacts()
	*
	***************************/



	public static function doTask($taskid,$array)
	{

		$ret = false;

		switch ($taskid) {

			case '1':
				// assocNotesContact.bat
				// DONE
				$ret = self::doAssocNotesContact($array);
				break;

			case '2':
				// categories.bat
				// DONE
				$ret = self::doCategories($array);
				break;

			case '3':
				// co.bat
				//DONE
				$ret = self::doCo($array);
				break;

			case '4':
				// contactDteails.bat
				// DONE
				$ret = self::doContactDetails($array);
				break;

			case '5':
				// creditedFirstCampagne.bat
				// DONE
				$ret = self::doCreditedFirstCampagne($array);
				break;

			case '6':
				// delete.bat
				// DONE
				$ret = self::doDelete($array);
				break;

			case '7':
				// duplicates ids inserted by the user.bat
				// DONE
				$ret = self::doDuplicatedInsertedByUser($array);
				break;

			case '8':
				// emails.bat
				// TODO absenden fehlt
				$ret = self::doEmails($array);
				break;

			case '9':
				// exportAdAgencyfromSubmissions.bat
				// DONE
				$ret = self::doExportAdAgencyfromSubmissions($array);
				break;

			case '10':
				// exportContactDetails1.bat
				// DONE
				$ret = self::doExportContactDetails($array);
				break;

			case '11':
				// exportIlluPhotofromMagazine.bat
				// DONE
				$ret = self::doExportIlluPhotofromMagazine($array);
				break;

			case '12':
				// exportIlluPhotofromSubmissions.bat
				// DONE
				$ret = self::doExportIlluPhotofromSubmissions($array);
				break;

			case '13':
				// exportNotes.bat
				// DONE
				$ret = self::doExportNotes($array);
				break;

			case '14':
				// insertAssocIds.bat
				// DONE
				$ret = self::doInsertAssocIds($array);
				break;

			case '15':
				// listDuplicates.bat
				// DONE
				$ret = self::doListDuplicates($array);
				break;

			case '16':
				// log.bat
				// DONE
				$ret = self::doLog($array);
				break;

			case '17':
				// searchContacts.bat
				// TODO
				$ret = self::doSearchContacts($array);
				break;

			default:
				break;
		}

		return $ret;
	}



	public static function doAssocNotesContact($array)
	{

		$fields		= array("Contact ID", "Cause of Error");
		$data 	= array();
		$specifiedtext = "This contact was automatically marked as associate from contact $key.";

		/*
		$contactids	= array(
		array(i189143,189144)
		);
		*/
		$contactids = $array;

		foreach ($contactids as $k => $v)
		{
			$aux 		= array();

			$key 		= intval($v[0]);
			$value		= intval($v[1]);

			// insert in assoc
			$insert = array();

			$insert['eca_contact_id']			= intval($key);
			$insert['eca_associated_id']		= intval($value);
			$insert['eca_created_by']			= 0;
			$insert['eca_created_ts']			= 'NOW()';

			$insert = dbx::insert('e_contacts_associated',$insert);

			// update contact notes with specified text
			$update = dbx::insert('e_contacts_notes',array('eca_contact_id'=>$value,'eca_contact'=>'AUTO Batch','eca_date'=>'NOW()','eca_time'=>date('H:i:s'),'eca_backendUser_id'=>0,'eca_created_ts'=>'NOW()','eca_description'=>$specifiedtext));

			// publish main id
			xluerzer_publish::contact_publish($key);

			if (!$insert)
			{
				$data[] = array($key, 'ERROR INSERTING IN ASSCOCIATES');
			}

			if ($data)
			{
				return self::makeExcel("failedtoassoc", $fields, $data);

			}
			else {
				return "Task successfully executed.";
			}
		}

	}


	public static function doCategories($array)
	{
		/*
		$contactids	= array(
		// id, addcats, delcats
		array(189143, array(), array()),
		array(189144, array(), array()),
		);
		*/

		$contactids = $array;

		foreach ($contactids as $k	=> $v)
		{
			// add
			foreach ($v[1] as $add) {

				// add categorie if not exists
				$id 		= intval($v[0]);
				$category 	= intval($add);

				$present = dbx::query("select * from a_contact_to_category where actc_contact_id = $id and actc_category_id = $category");

				if (!$present)
				{
					$insert = array();

					$insert['actc_contact_id']				= $id;
					$insert['actc_category_id']				= $category;

					dbx::insert('a_contact_to_category',$insert);
				}
			}

			// del
			foreach ($v[2] as $del) {

				// del categorie if exists
				$id 		= intval($v[0]);
				$category 	= intval($del);

				$present = dbx::query("select * from a_contact_to_category where actc_contact_id = $id and actc_category_id = $category");

				if ($present)
				{
					dbx::query("delete from a_contact_to_category where actc_contact_id = $id and actc_category_id = $category");
				}

			}
		}

		return "categories added / removed";

	}


	public static function doCo($array)
	{
		$data 			= array();
		$fields 		= array();

		$fields		= array("Contact ID", "Agency");

		//$contactids = array(72555, 477);

		$contactids = $array;

		foreach ($contactids as $process) {


			$contactid  = $process[0];
			$aux 		= dbx::query("select * from e_archive_media_credits where eamc_contact_id = $contactid order by eamc_archive_media_year desc, eamc_archive_media_id desc LIMIT 1");

			if (!$aux) continue;

			$aux2 		= dbx::query("select * from e_archive_media_credits where eamc_contactType_id = 2 and eamc_record_id = ".$aux['eamc_record_id']." LIMIT 1");

			if (!$aux2) continue;

			$aux3		= dbx::query("select * from e_contacts where ec_id = ".$aux2['eamc_contact_id']);
			$data[]		= array(
			$aux['eamc_contact_id'],
			$aux3['ec_company'],
			);
		}

		if ($data)
		{
			return self::makeExcel("co", $fields, $data);

		}
		else {
			return "no data found";
		}
	}


	public static function doContactDetails($lines)
	{

		$mapping = array(
		'ec_id'					=> 'id',
		'ec_type'				=> '1',
		'ec_firstname' 			=> '2',
		'ec_lastname' 			=> '3',
		'ec_company' 			=> '4',
		'ec_branch' 			=> '5',
		'ec_position' 			=> '6',
		'ec_email' 				=> '8',
		'ec_email2' 			=> '9',
		'ec_phone'				=> '10',
		'ec_phone2' 			=> '11',
		'ec_fax' 				=> '12',
		'ec_url' 				=> '13',
		'ec_skype' 				=> '15',
		'ec_facebook' 			=> '16',
		'ec_linkedin'			=> '17',
		'ec_address' 			=> '18',
		'ec_zip' 				=> '19',
		'ec_state' 				=> '20',
		'ec_city' 				=> '21',
		'ec_masterContact_id' 	=> '22',
		'ec_secondContact' 		=> '23',
		'ec_note' 				=> '26',
		'ec_country_id' 		=> '27',
		'ec_assignedTo' 		=> '28',
		'ec_twitter' 			=> '29',

		'ecr_date' 				=> '24',
		'ecr_time' 				=> '25',
		'ecptoc_company' 		=> '30',
		);


		$mappingReverse = array();
		foreach ($mapping as $k => $v)
		{
			$mappingReverse[$v] = $k;
		}

		$dbMapping = array(

		);


		$header = $lines[0];
		foreach ($header as $k => $key)
		{
			$dbMapping[$k] = $mappingReverse[$key];
		}

		foreach ($lines as $l => $line)
		{
			if ($l == 0) continue;

			

			$db = array();
			foreach ($dbMapping as $pos => $db_key)
			{
				if ($db_key != '')
				{
					$db[$db_key] = dbx::escape($line[$pos]);	
				}
				
			}

			$db['ec_id'] = intval($db['ec_id']);
			if (isset($db['ec_type']))
			{
				$db['ec_type'] = intval($db['ec_type']-1);
			}

			
			#####################################################################################################
			#####################################################################################################
			#####################################################################################################
			#####################################################################################################
			
			$specialsKeys 	= array('ecr_date','ecr_time','ecptoc_company');
			$specials 		= array();
			
			foreach ($specialsKeys as $sk)
			{
				if (isset($db[$sk]))
				{
					$specials[$sk] = $db[$sk];
					unset($db[$sk]);
				}
			}


			#####################################################################################################
			#####################################################################################################
			#####################################################################################################
			#####################################################################################################			
			
			
			$update 	= $db;
			$updateRem 	= array();

			

			$id = intval($update['ec_id']);
			
			
			
			if ($id == 0)
			{
				unset($update['ec_id']); 
			}
			
			$updateRem['ecr_date'] 		 = '';
			$updateRem['ecr_time']		 = '';
			$notestext 					 = 'Auto Reminder inserted by Batch';
			$updateRem['ecr_created_ts'] = 'NOW()';
			$updateRem['ecr_created_by'] = xluerzer_user::getCurrentUserId();

			if ($specials['ecr_date'] != '')
			{
				$updateRem['ecr_date'] = date("Y-m-d", strtotime($specials['ecr_date']));
			}

			if ($specials['ecr_time'] != '')
			{
				$updateRem['ecr_time'] = date("H:i:s", strtotime($specials['ecr_time']));
			}

			// new contact
			if ($id == "0")
			{
				// insert new
				unset($update['ec_id']);  // SAFTEY FIRST
				$insert = dbx::insert('e_contacts',$update);
				$lastid = intval(dbx::getLastInsertId());
				
				xluerzer_log::pushLog('INSERT','e_contacts','ec_id',$lastid,false,'VIA BATCH');


				// insert in reminder
				if ($updateRem['ecr_date'] != '' && $updateRem['ecr_time'] != '')
				{
					$updateRem['ecr_contact_id'] = $lastid;
					$updateRem['ecr_notes'] 	 = $notestext;
					$insertRem = dbx::insert('e_contacts_reminder',$updateRem);
				}
				// update company
				if (intval($specials['ecptoc_company']) != 0)
				{
					$insert = dbx::insert('e_contacts_person_to_company', array('ecptoc_company' => intval($specials['ecptoc_company']), 'ecptoc_person' => $lastid));
				}

			}

			// existing contact
			else {
				
				// update existing
				$old = dbx::query("select * from e_contacts where ec_id = $id");
				unset($update['ec_id']);  // SAFTEY FIRST
				
				
				
				if (!empty($update))
				{
					$update = dbx::update('e_contacts',$update,array('ec_id'=>$id));	
				}
				
				if ($old !== false) // LOG IF EXISTS 
				{
					xluerzer_log::pushLog('UPDATE','e_contacts','ec_id',$id,$old,'VIA BATCH');
				}
				
				// insert in reminder
				if ($updateRem['ecr_date'] != '' && $updateRem['ecr_time'] != '')
				{
					$updateRem['ecr_contact_id'] = $id;
					$updateRem['ecr_notes'] 	 = $notestext;
					$insertRem = dbx::insert('e_contacts_reminder',$updateRem);
				}
				// update company
				
				
				
				
				if (intval($specials['ecptoc_company']) != 0)
				{
					$companyid = intval($specials['ecptoc_company']);
					
					$present = dbx::query("select * from e_contacts_person_to_company where ecptoc_person = $id and ecptoc_company = $companyid");
					
					$doAgain = 0;
					
					if ($present === false || $doAgain == 1)
					{
						$id = intval($id);
						dbx::query("delete from e_contacts_person_to_company where ecptoc_person = $id");
						$insert = dbx::insert('e_contacts_person_to_company', array('ecptoc_company' => $companyid, 'ecptoc_person' => $id));
					}
				}
				
				xluerzer_publish::contact_publish($id);
			}
		}

		return "Task successfully executed";
	}


	public static function doContactDetailsOld($array)
	{
		$data 			= array();

		$inputs 		= $array;

		$header 		= $inputs[0];

		die("header: ".print_r($header));

		foreach ($header as $k => $v) {
			if ($k == 0) continue;
		}

		unset($inputs[0]);

		foreach ($inputs as $input) {

			$update = array();

			$update['ec_id']				= intval($input[0]);
			$update['ec_type']				= intval($input[1]-1);
			$update['ec_firstname'] 		= dbx::escape($input[2]);
			$update['ec_lastname'] 			= dbx::escape($input[3]);
			$update['ec_company'] 			= dbx::escape($input[4]);
			$update['ec_branch'] 			= dbx::escape($input[5]);
			$update['ec_position'] 			= dbx::escape($input[6]);
			// salutation - $input[7]
			$update['ec_email'] 			= dbx::escape($input[8]);
			$update['ec_email2'] 			= dbx::escape($input[9]);
			$update['ec_phone'] 			= dbx::escape($input[10]);
			$update['ec_phone2'] 			= dbx::escape($input[11]);
			$update['ec_fax'] 				= dbx::escape($input[12]);
			$update['ec_url'] 				= dbx::escape($input[13]);
			// nickname - $input[14]
			$update['ec_skype'] 			= dbx::escape($input[15]);
			$update['ec_facebook'] 			= dbx::escape($input[16]);
			$update['ec_linkedin']			= dbx::escape($input[17]);
			$update['ec_address'] 			= dbx::escape($input[18]);
			$update['ec_zip'] 				= dbx::escape($input[19]);
			$update['ec_state'] 			= dbx::escape($input[20]);
			$update['ec_city'] 				= dbx::escape($input[21]);
			$update['ec_masterContact_id'] 	= dbx::escape($input[22]);
			$update['ec_secondContact'] 	= dbx::escape($input[23]);
			// reminder date - $input[24]
			// reminder time - $input[25]
			$update['ec_note'] 				= dbx::escape($input[26]);
			$update['ec_country_id'] 		= dbx::escape($input[27]);
			$update['ec_assignedTo'] 		= dbx::escape($input[28]);
			$update['ec_twitter'] 			= dbx::escape($input[29]);

			$id = intval($update['ec_id']);

			$updateRem['ecr_date'] 		 = '';
			$updateRem['ecr_time']		 = '';
			$notestext 					 = 'Auto Reminder inserted by Batch';
			$updateRem['ecr_created_ts'] = 'NOW()';
			$updateRem['ecr_created_by'] = 0;

			if ($input[24] != '')
			{
				$updateRem['ecr_date'] 		 = date("Y-m-d", strtotime($input[24]));
			}

			if ($input[25] != '')
			{
				$updateRem['ecr_time'] 		 = date("H:i:s", strtotime($input[25]));
			}

			// new contact
			if ($id == "0")
			{
				// insert new
				$insert = dbx::insert('e_contacts',$update);

				$lastid = intval(dbx::getLastInsertId());

				// insert in reminder
				if ($updateRem['ecr_date'] != '' && $updateRem['ecr_time'] != '')
				{
					$updateRem['ecr_contact_id'] = $lastid;
					$updateRem['ecr_notes'] 	 = $notestext;
					$insertRem = dbx::insert('e_contacts_reminder',$updateRem);
				}
				// update company
				if ($input[30] != '')
				{
					$insert = dbx::insert('e_contacts_person_to_company', array('ecptoc_company' => intval($input[30]), 'ecptoc_person' => $lastid));
				}

			}

			// existing contact
			else {
				// update existing
				$update = dbx::update('e_contacts',$update,array('ec_id'=>$id));

				// insert in reminder
				if ($updateRem['ecr_date'] != '' && $updateRem['ecr_time'] != '')
				{
					$updateRem['ecr_contact_id'] = $id;
					$updateRem['ecr_notes'] 	 = $notestext;
					$insertRem = dbx::insert('e_contacts_reminder',$updateRem);
				}
				// update company
				if ($input[30] != '')
				{
					$companyid = intval($input[30]);

					$present = dbx::query("select * from e_contacts_person_to_company where ecptoc_person = $id and ecptoc_company = $companyid");

					if ($present === false)
					{
						$insert = dbx::insert('e_contacts_person_to_company', array('ecptoc_company' => intval($input[30]), 'ecptoc_person' => $lastid));
					}
				}
			}
		}

		return "Task successfully executed";
	}


	public static function doCreditedFirstCampagne($array)
	{

		$data 			= array();
		$fields 		= array();

		$fields		= array("Contact ID", "Campaign ID", "Campaign Year");

		//$contactids = array(72555, 477);

		$contactids = $array;

		foreach ($contactids as $process) {

			$contactid = intval($process[0]);

			$aux 		= dbx::query("select * from e_archive_media_credits where eamc_contact_id = $contactid order by eamc_archive_media_year desc, eamc_archive_media_id desc LIMIT 1");

			if (!$aux) continue;

			$aux2		= dbx::query("select * from e_archive_media where eam_id = ".$aux['eamc_record_id']);
			$data[]		= array(
			$aux['eamc_contact_id'],
			$aux2['eam_record_campaign_id'],
			$aux['eamc_archive_media_year']
			);
		}

		if ($data)
		{
			return self::makeExcel("creditedFirstCampagne", $fields, $data);

		}

		else {
			return "No data found";
		}
	}

	// deltes contacts, if not conditions met
	public static function doDelete($array)
	{

		/* only dels contacts that
		* --- are not credited
		* --- dont have assocs or dups
		* --- dont have personalshowcases
		*
		* failed dels export in failedtodelete.xls
		*/

		$data 			= array();
		$fields 		= array();
		$table 			= "e_contacts";

		$fields		= array("Contact ID", "Cause of Error");

		//$contactids = array(189141, 189142);

		$contactids = $array;

		foreach ($contactids as $process) {

			$contactid = intval($process[0]);

			//check if credited

			$credited = dbx::query("select eamc_id, eamc_contact_id from e_archive_media_credits where eamc_contact_id = $contactid");
			if ($credited)
			{
				$data[] = array($contactid, 'IS CREDITED');
				continue;
			}

			// check if has assocs
			$associated = dbx::query("select eca_contact_id from e_contacts_associated where eca_contact_id = $contactid");
			if ($associated)
			{
				$data[] = array($contactid, 'IS ASSOCIATED');
				continue;
			}

			// check if has dups
			$duplicated = dbx::query("select ecd_contact_id from e_contacts_duplicates where ecd_contact_id = $contactid");
			if ($duplicated)
			{
				$data[] = array($contactid, 'HAS DUPLICATES');
				continue;
			}

			// check if has personal showcasw
			$beyondarchive = dbx::query("select fep_contact_id, fep_beyond_archive_contactType from fe_profiles where fep_contact_id = $contactid");
			if ($beyondarchive['fep_beyond_archive_contactType'] != 0 && $beyondarchive['fep_beyond_archive_contactType'] != '')
			{
				$data[] = array($contactid, 'HAS PERSONAL SHOWCASE');
				continue;
			}

			// none of no-del requirements met -> del user
			// echo "<br />".$contactid." safe to delete";

			dbx::query("delete from e_contacts where ec_id = $contactid");
		}

		if ($data)
		{
			return self::makeExcel("failedtodelete", $fields, $data);

		}

		else {
			return "Task successfully executed.";
		}

	}


	public static function doDuplicatedInsertedByUser($array)
	{
		$fields		= array("Contact ID", "Cause of Error");
		$data 	= array();

		/*
		$contactids	= array(
		array(189143, 189144)
		);
		*/

		$contactids = $array;

		foreach ($contactids as $k => $v)
		{
			$aux 		= array();

			$key 		= intval($v[0]);
			$value		= intval($v[1]);

			$specifiedtext = "This contact was automatically marked as duplicate from contact $key.";

			// insert in duplicates
			$insert = array();

			$insert['ecd_contact_id']			= intval($key);
			$insert['ecd_duplicate_id']			= intval($value);
			$insert['ecd_created_by']			= 0;
			$insert['ecd_created_ts']			= 'NOW()';

			$insert = dbx::insert('e_contacts_duplicates',$insert);

			// set id 2 duplicate = 1
			$update = dbx::update('e_contacts',array('ec_duplicate'=>1),array('ec_id'=>$value));

			// update contact notes with specified text
			$update = dbx::insert('e_contacts_notes',array('eca_contact_id'=>$value, 'eca_description'=>$specifiedtext),array('ec_id'=>$value));

			// publish main id
			xluerzer_publish::contact_publish($key);

			if (!$update)
			{
				$data[] = array($key, 'ID ALREADY MARKED AS DUPLICATE');
			}

		}


		if ($data)
		{
			return self::makeExcel("failedtoduplicate", $fields, $data);

		}
		else {
			return "Task successfully executed.";
		}

	}


	public static function doEmails($array)
	{

		// $contactids 	= array(95091, 95095);

		$contactids = $array;

		foreach ($contactids as $process) {

			$aux[] = intval($process[0]);
		}

		$contactidsStr	= implode(",", $aux);
		$empfaenger 	= array();

		$empfaengerData = dbx::queryAll("select ec_email from e_contacts where ec_id in ($contactidsStr)");

		foreach ($empfaengerData as $empf) {
			$empfaenger[] = $empf['ec_email'];
		}

		$empfaengerStr 	= implode(",",$empfaenger);

		// TODO mail an $empfaengerStr
		return ("TODO: mail an: ".$empfaengerStr);

	}


	public static function doExportAdAgencyfromSubmissions($array)
	{
		$fields = array("Submission ID", "Agency", "Submitted for", "Submitted by", "Submitted on", "Client", "Product", "Country", "ZIP", "City", "Address", "Phone Code", "Phone", "Email", "Date of Release", "Magazine ID");
		$data 	= array();

		// $submissionids	= array(115679,146490,243940,243937,243933);

		$submissionids = $array;

		foreach ($submissionids as $process)
		{

			$submissionid	= intval($process[0]);
			$aux 			= array();

			$aux 			= dbx::queryAll("select * from e_submissions, a_shop_country
						where es_id = $submissionid 
						and es_country_id = asc_id 
						");

			if (!empty($aux))
			{
				foreach ($aux as $k => $v)
				{
					$data[] = array(
					$v['es_id'],
					$v['es_agency'],
					$v['es_submittedFor'],
					$v['es_submittedBy'],
					$v['es_created_date'],
					$v['es_client'],
					$v['es_product'],
					$v['asc_name'],
					$v['es_zip'],
					$v['es_city'],
					$v['es_address'],
					$v['es_phone_code'],
					$v['es_phone'],
					$v['es_email'],
					$v['es_releaseDate'],
					$v['es_magazine_id'],
					);
				}
			}
		}

		if ($data)
		{
			return self::makeExcel("exportAdAgencyfromSubmissions", $fields, $data);

		}
		else
		{
			return "no data found";
		}
	}


	// exports contact details from contactdetails1 -> exceL exportContactDetails1.xls
	public static function doExportContactDetails($array)
	{

		$data 			= array();
		$fields 		= array();
		$table 			= "e_contacts";

		$fields		= self::getTableFieldsWithoutPrefix($table);

		// $contactids = array(95091, 95095);

		$contactids = $array;

		foreach ($contactids as $process) {

			$contactid 	= intval($process[0]);

			$aux 		= dbx::query("select * from $table where ec_id = $contactid");
			$data[]		= $aux;
		}

		if ($data)
		{
			return self::makeExcel("exportContactDetails1", $fields, $data);

		}

		else {
			return "no data found";
		}
	}


	// exports photographer and illustrator data from media id
	public static function doExportIlluPhotofromMagazine($array)
	{
		$fields = array("Media ID", "Type", "Contact ID", "Company", "City", "First Name", "Last Name",  "Telephone", "Email");
		$data 	= array();
		$aux	= array();

		// $mediaids	= array(42700,41700);

		$mediaids = $array;

		foreach ($mediaids as $process) {

			$mediaid	= intval($process[0]);

			$aux 		= dbx::queryAll("select * from e_archive_media_credits, a_contact_type, e_contacts
						where eamc_record_id = $mediaid 
						and (eamc_contactType_id = 1 or eamc_contactType_id = 4) 
						and act_id = eamc_contactType_id 
						and eamc_contact_id = ec_id"
						);

						foreach ($aux as $k => $v)
						{
							$data[] 		= array(
							$v['eamc_record_id'],
							$v['act_description'],
							$v['eamc_contact_id'],
							$v['ec_company'],
							$v['ec_city'],
							$v['ec_firstname'],
							$v['ec_lastname'],
							$v['ec_phone'],
							$v['ec_email'],
							);
						}
		}

		if ($data)
		{
			return self::makeExcel("exportIlluPhotofromMagazine", $fields, $data);

		}
		else
		{
			return "No data found";
		}
	}


	// exports agencydata from submission, photographer and illustrator from credits
	public static function doExportIlluPhotofromSubmissions($array)
	{

		$fields = array("Submission ID", "Agency", "Contact Type", "Contact ID", "Company", "City", "First Name", "Last Name", "Telephone", "Email");
		$data 	= array();

		// $submissionids	= array(115679,146490);
		$submissionids	= $array;

		foreach ($submissionids as $process)
		{
			$submissionid	= intval($process[0]);

			$aux 		= array();

			$aux 		= dbx::queryAll("select * from e_submissions_credits, a_contact_type, e_contacts, e_submissions
						where esc_submission_id = $submissionid  
						and esc_submission_id = es_id 
						and (esc_contactType_id = 1 or esc_contactType_id = 4) 
						and act_id = esc_contactType_id 
						and esc_contact_id = ec_id"
						);

						if (!empty($aux))
						{
							foreach ($aux as $k => $v)
							{
								$data[] 	= array(
								$v['esc_submission_id'],
								$v['es_agency'],
								$v['act_description'],
								$v['esc_contact_id'],
								$v['ec_company'],
								$v['ec_city'],
								$v['ec_firstname'],
								$v['ec_lastname'],
								$v['ec_phone'],
								$v['ec_email']
								);
							}
						}
		}

		if ($data)
		{
			return self::makeExcel("exportIlluPhotofromSubmissions", $fields, $data);

		}
		else
		{
			return "no data found";

		}
	}


	public static function doExportNotes($array)
	{
		$fields = array("Contact ID", "Date", "Backend User", "Text");
		$data 	= array();

		/*
		$contactids	= array(
		array(29, "10.11.2010"),
		array(34, "10.11.2010"),
		);
		*/

		$contactids	= $array;

		foreach ($contactids as $k => $v)
		{
			$aux 		= array();

			$key 		= intval($v[0]);

			$starttime	= date("Y-m-d 00:00:00", strtotime($v[1]));
			$endtime	= date("Y-m-d 23:59:59", strtotime($v[1]));

			$aux 		= dbx::queryAll("select * from e_contacts_notes
						where eca_contact_id = $key  
						and eca_date between '$starttime' and '$endtime'" 
						);

						if (!empty($aux))
						{
							foreach ($aux as $k => $v)
							{
								$data[] 	= array(
								$v['eca_contact_id'],
								$v['eca_date'],
								$v['eca_backendUser_id'],
								$v['eca_description'],
								);
							}
						}
		}

		if ($data)
		{
			return self::makeExcel("exportNotes", $fields, $data);

		}
		else
		{
			return "no data found";
		}
	}


	public static function doInsertAssocIds($array)
	{

		$fields		= array("Contact ID", "Cause of Error");
		$data 		= array();


		/*
		$contactids	= array(
		array(189143,189144)
		);
		*/
		
		$contactids = array();

		$contactids	= $array;
		
		

		foreach ($contactids as $k => $v)
		{
			$aux 		= array();

			$key 		= intval($v[0]);
			$value		= intval($v[1]);

			foreach ($v[1] as $add) {
						

				$specifiedtext = "This contact was automatically marked as associate from contact $key.";

				// insert in duplicates
				$insert = array();

				$insert['eca_contact_id']			= intval($key);
				$insert['eca_associated_id']		= intval($add);
				$insert['eca_created_by']			= 0;
				$insert['eca_created_ts']			= 'NOW()';

				$insert = dbx::insert('e_contacts_associated',$insert);

				// publish main id
				xluerzer_publish::contact_publish($key);

				if (!$insert)
				{
					$data[] = array($key, 'ERROR INSERTING IN ASSCOCIATES');
				}

			}

		}


		if ($data)
		{
			return self::makeExcel("failedtoassoc", $fields, $data);

		}
		else
		{
			return 'Task successfully executed.';
		}

	}

	// exports all duplicates as xls
	public static function doListDuplicates($array)
	{

		$fields = array("Contact ID", "Duplicate Contact ID", "Contact Type", "Company", "City", "First Name", "Last Name", "Telephone", "Email");
		$data 	= array();

		// $contactids	= array(4469,11751);
		$contactids	= $array;

		foreach ($contactids as $process)
		{
			$contactid  = intval($process[0]);
			$aux 		= array();

			$aux 		= dbx::queryAll("select * from e_contacts_duplicates, e_contacts, a_contact_type
						where ecd_contact_id = $contactid  
						and ecd_duplicate_id = ec_id 
						and ec_contactType_id = act_id    
						and ec_duplicate = 1"
						);

						if (!empty($aux))
						{
							foreach ($aux as $k => $v)
							{
								$data[] 	= array(
								$v['ecd_contact_id'],
								$v['ecd_duplicate_id'],
								$v['act_description'],
								$v['ec_company'],
								$v['ec_city'],
								$v['ec_firstname'],
								$v['ec_lastname'],
								$v['ec_phone'],
								$v['ec_email']
								);
							}
						}
		}

		if ($data)
		{
			return self::makeExcel("listDuplicates", $fields, $data);

		}
		else
		{
			return "no data found";
		}

	}

	public static function doLog($array)
	{

		/*
		$contactids	= array(
		array(172765, 0, '20.03.1985','02:00:00','emailed to not me','das bin ich')
		);
		*/

		$contactids	= $array;

		foreach ($contactids as $k	=> $v)
		{
			$insert = array();

			$insert['eca_contact_id']				= intval($v[0]);
			$insert['eca_backendUser_id']			= intval($v[1]);
			$insert['eca_date']						= date("Y-m-d H:i:s", strtotime($v[2]));
			$insert['eca_time']						= date("H:i:s", strtotime($v[3]));
			$insert['eca_created_ts']				= 'NOW()';
			$insert['eca_contact']					= dbx::escape($v[4]);
			$insert['eca_description']				= dbx::escape($v[5]);

			dbx::insert('e_contacts_notes',$insert);
		}

		return "Task executed successfully.";

	}


	public static function doSearchContacts($array)
	{

		$fields		= array("Found", "Contact ID", "Contact Type", "Last Name", "First Name", "Company", "Branch", "Position", "Address", "ZIP", "City", "State", "Telephone", "Telephone 2", "Fax", "Email", "Email 2", "Website", "Country ID", "Skype", "Facebook", "Linkedin", "Twitter", "Second Contact", "Notes", "Assigned to", "Search Parameter");
		$dataXls		= array();

		set_time_limit(0);

		$ret = array();
		foreach ($array as $search)
		{

			global $_REQUEST;
			$_REQUEST['searchData'] = $search;

			list($data,$cnt) = xluerzer_contacts::search(true);

			$data 	= str_replace("[GRID_FILTERS]","",$data);
			$cnt 	= str_replace("[GRID_FILTERS]","",$cnt);

			$count = intval(dbx::queryAttribute($cnt,'sql_cnt'));

			switch ($count)
			{
				case 1:

					$r = dbx::query($data);
					$ec_id = intval($r['ec_id']);

					$ret[] = "1\t$ec_id";

					$dataXls[] 	= array(
					"1",
					$r['ec_id'],
					$r['ec_type'],
					$r['ec_firstname'],
					$r['ec_lastname'],
					$r['ec_company'],
					$r['ec_branch'],
					$r['ec_position'],
					$r['ec_address'],
					$r['ec_zip'],
					$r['ec_city'],
					$r['ec_state'],
					$r['ec_phone'],
					$r['ec_phone2'],
					$r['ec_fax'],
					$r['ec_email'],
					$r['ec_email2'],
					$r['ec_url'],
					$r['ec_country_id'],
					$r['ec_skype'],
					$r['ec_facebook'],
					$r['ec_linkedin'],
					$r['ec_twitter'],
					$r['ec_secondContact'],
					$r['ec_note'],
					$r['ec_assignedTo'],
					$search
					);

					break;
				case 0:
					$ret[] = 0;
					$dataXls[]	= array(
					"0",
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					$search
					);
					
					break;
				default:
					$ret[] = -2;
					$dataXls[]	= array(
					"-2",
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					' ',
					$search
					);
					break;
			}

		}

		if ($dataXls)
		{
			return self::makeExcel("searchContacts", $fields, $dataXls);

		}

		return implode("\n",$ret);
	}



	/************************ UTILITIES ************************************/

	public static function getTableFieldsWithoutPrefix ($table)
	{
		$aux = array();

		$fields = dbx::queryAll("SELECT `COLUMN_NAME`
			FROM `INFORMATION_SCHEMA`.`COLUMNS` 
			WHERE `TABLE_SCHEMA`='luerzer-www' 
    		AND `TABLE_NAME`='$table';");

		foreach ($fields as $k => $r) {

			$aux[] 	= ltrim(strstr($r['COLUMN_NAME'], '_'), '_');
		}

		return $aux;
	}


	public static function makeExcel($filename, $fieldnamesheadline, $data)
	{

		if (!isset($filename) || empty($data))
		{
			die("parameter for excel write missing");
		}

		$objPHPExcel = new PHPExcel();

		// set document properties
		$objPHPExcel->getProperties()->setCreator("Luerzer Automatic")
		->setLastModifiedBy("Luerzer Automatic")
		->setTitle($filename)
		->setSubject($filename);

		// active sheet notwaendig
		$objPHPExcel->setActiveSheetIndex(0);

		// headline bold
		$objPHPExcel->getActiveSheet()->getStyle('A1:BZ1')->getFont()->setBold(true);

		// insert headline with fields in data
		$objPHPExcel->getActiveSheet()->fromArray($fieldnamesheadline, null, 'A1');

		// fill data
		$objPHPExcel->getActiveSheet()->fromArray($data, null, 'A2');

		//  resize cols

		$letters = array();
		$letter = 'A';
		while ($letter !== 'BZ') {
			$letters[] = $letter++;
		}

		foreach($letters as $columnID) {
			$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
			->setAutoSize(true);
		}
		$objPHPExcel->getActiveSheet()->calculateColumnWidths();

		// save
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

		$datumzusatz = date("Y_m_d_H_i_s");

		$objWriter->save(dirname(__FILE__).'/batch_output/'.$filename."_".$datumzusatz.'.xls');

		return 'Xls '.$filename."_".$datumzusatz.'.xls written. <a href="/xgo/xplugs/xluerzer/classes/batch_output/'.$filename."_".$datumzusatz.'.xls" target="_blank">Click here to download</a>';

	}


}