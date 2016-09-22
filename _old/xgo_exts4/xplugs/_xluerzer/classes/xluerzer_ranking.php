<?

class xluerzer_ranking
{

	public static function isExcluded($contact_id)
	{
		// TODO
		return false;
	}


	public static function getPoints($count)
	{
		if($count > 0)
		{
			if ($count <= 2)
			{
				$auxPoints = 1;
			}
			else if ($count > 2 && $count < 5)
			{
				$auxPoints = 2;
			}
			else if ($count > 4)
			{
				$auxPoints = 3;
			}
		}
		else
		{
			$auxPoints = 0;
		}
		return $auxPoints;
	}



	public static function getDataForPeriod($contact_id, $contact_type_id, $period, $startyear)
	{

		// fk_category <> 33 classics nicht im ranking

		$dataMagSql = "SELECT COUNT(DISTINCT e_archive_media.eam_record_campaign_id) as count
                     FROM e_archive_media_credits 
                     INNER JOIN e_archive_media ON e_archive_media_credits.eamc_record_id = e_archive_media.eam_id
                     WHERE e_archive_media_credits.eamc_contact_id = $contact_id 
                     AND eam_magazine_type = 1
                     AND eam_specials_category_id <> 33
                     AND e_archive_media_credits.eamc_contactType_id = $contact_type_id";


		$dataSpecialSql = "SELECT COUNT(DISTINCT e_archive_media.eam_record_campaign_id) as count
                     FROM e_archive_media_credits 
                     INNER JOIN e_archive_media ON e_archive_media_credits.eamc_record_id = e_archive_media.eam_id
                     WHERE e_archive_media_credits.eamc_contact_id = $contact_id 
                     AND eam_magazine_type > 1
                     AND eam_specials_category_id <> 33
                     AND e_archive_media_credits.eamc_contactType_id = $contact_type_id";


		switch ($period) {
			// this year
			case '0':
				$dataMagSql .= " AND (e_archive_media.eam_magazine_year = '$startyear')";
				$dataSpecialSql .= " AND (e_archive_media.eam_magazine_year = '$startyear')";
				break;
				// last year
			case '1':
				$startyear = $startyear - 1;
				$dataMagSql .= " AND (e_archive_media.eam_magazine_year = '$startyear')";
				$dataSpecialSql .= " AND (e_archive_media.eam_magazine_year = '$startyear')";
				break;
				// last year
			case '3':
				$endyear = $startyear - 3;
				$dataMagSql .= " AND (e_archive_media.eam_magazine_year <= '$startyear')
				   				AND (e_archive_media.eam_magazine_year >= '$endyear')";
				$dataSpecialSql .= " AND (e_archive_media.eam_magazine_year <= '$startyear')
				   				AND (e_archive_media.eam_magazine_year >= '$endyear')";
				break;
				// last year
			case '5':
				$endyear = $startyear - 5;
				$dataMagSql .= " AND (e_archive_media.eam_magazine_year <= '$startyear')
				   				AND (e_archive_media.eam_magazine_year >= '$endyear')";
				$dataSpecialSql .= " AND (e_archive_media.eam_magazine_year <= '$startyear')
				   				AND (e_archive_media.eam_magazine_year >= '$endyear')";
				break;
				// last year
			case '10':
				$endyear = $startyear - 10;
				$dataMagSql .= " AND (e_archive_media.eam_magazine_year <= '$startyear')
				   				AND (e_archive_media.eam_magazine_year >= '$endyear')";
				$dataSpecialSql .= " AND (e_archive_media.eam_magazine_year <= '$startyear')
				   				AND (e_archive_media.eam_magazine_year >= '$endyear')";
				break;
			case 'all':
				$dataMagSql .= " AND (e_archive_media.eam_magazine_year <= '$startyear')";
				$dataSpecialSql .= " AND (e_archive_media.eam_magazine_year <= '$startyear')";
				break;

			default:

				break;
		}

		$dataMag 		=  dbx::query($dataMagSql);
		$dataSpecial 	=  dbx::query($dataSpecialSql);

		$countMag = $dataMag['count'];
		$countSpecial = self::getPoints($dataSpecial['count']);

		$countGesamt = $countMag + $countSpecial;

		return $countGesamt;

	}


	public static function getAllButExcludedIds()
	{

		$data = dbx::queryAll("select eamc_contactType_id as ctid, ec_id as id from e_contacts,e_archive_media_credits where e_archive_media_credits.eamc_contact_id = e_contacts.ec_id and ec_duplicate = 0 and eamc_archive_media_id > 0 and ec_id not in (select are_contact_id from a_ranking_exclusions) group by ec_id, eamc_contactType_id", false);
		return $data;
	}


	public static function getAssociates($contactid)
	{
		$assocs = dbx::queryAll("select ec_id as id, ec_contactType_id as ctid from e_contacts_associated, e_contacts where eca_contact_id = ec_id and eca_contact_id = $contactid");

		if ($assocs !== false)
		{
			return $assocs;
		}
		else {
			return false;
		}
	}


	public static function getDuplicates($contactid)
	{
		$dups = dbx::queryAll("select ec_id as id, ec_contactType_id as ctid from e_contacts_duplicates, e_contacts where ecd_contact_id = ec_id and ecd_contact_id = $contactid");

		if ($dups !== false)
		{
			return $dups;
		}
		else {
			return false;
		}

	}

	public static function rebuildRankingByMediaId($mediaid)
	{

		// get all affected contacts
		$ids = dbx::queryAll("select eamc_contact_id as id, eamc_contactType_id as ctid from e_archive_media_credits where eamc_archive_media_id = $mediaid");

		foreach ($ids as $k => $v) {

			self::calcOne($v['id'], $v['ctid']);
		}

		return;

		// rebuild ranking for contacts

	}



	public static function calcAll($startyear)
	{

		if (!isset($startyear))
		{
			$startyear = date("Y");
		}

		$trunc = dbx::query("TRUNCATE TABLE  `a_ranking_test`");

		$ids = self::getAllButExcludedIds();

		foreach ($ids as $k => $v) {

			$assocs = self::getAssociates($v['id']);
			$dups	= self::getDuplicates($v['id']);

			$pointsAssoc = array(
			'ar_pub_0'		=> 0,
			'ar_pub_1'		=> 0,
			'ar_pub_3'		=> 0,
			'ar_pub_5'		=> 0,
			'ar_pub_10'		=> 0,
			'ar_pub_all'	=> 0,
			);

			$pointsDup = array(
			'ar_pub_0'		=> 0,
			'ar_pub_1'		=> 0,
			'ar_pub_3'		=> 0,
			'ar_pub_5'		=> 0,
			'ar_pub_10'		=> 0,
			'ar_pub_all'	=> 0,
			);

			if ($assocs !== 'false')
			{

				foreach ($assocs as $k2 => $v2) {

					$pointsAssoc['ar_pub_0']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 0, $startyear);
					$pointsAssoc['ar_pub_1']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 1, $startyear);
					$pointsAssoc['ar_pub_3']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 3, $startyear);
					$pointsAssoc['ar_pub_5']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 5, $startyear);
					$pointsAssoc['ar_pub_10']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 10, $startyear);
					$pointsAssoc['ar_pub_all']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 'all', $startyear);
				}
			}

			if ($dups !== 'false')
			{

				foreach ($dups as $k2 => $v2) {

					$pointsDup['ar_pub_0']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 0, $startyear);
					$pointsDup['ar_pub_1']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 1, $startyear);
					$pointsDup['ar_pub_3']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 3, $startyear);
					$pointsDup['ar_pub_5']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 5, $startyear);
					$pointsDup['ar_pub_10']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 10, $startyear);
					$pointsDup['ar_pub_all']	+= self::getDataForPeriod($v2['id'], $v2['ctid'], 'all', $startyear);
				}
			}


			$ret['ar_pub_0'] 	= self::getDataForPeriod($v['id'], $v['ctid'], 0, $startyear) + $pointsDup['ar_pub_0'] + $pointsAssoc['ar_pub_0'];

			$ret['ar_pub_1'] 	= self::getDataForPeriod($v['id'], $v['ctid'], 1, $startyear) + $pointsDup['ar_pub_1'] + $pointsAssoc['ar_pub_1'];

			$ret['ar_pub_3'] 	= self::getDataForPeriod($v['id'], $v['ctid'], 3, $startyear) + $pointsDup['ar_pub_3'] + $pointsAssoc['ar_pub_3'];

			$ret['ar_pub_5'] 	= self::getDataForPeriod($v['id'], $v['ctid'], 5, $startyear) + $pointsDup['ar_pub_5'] + $pointsAssoc['ar_pub_5'];

			$ret['ar_pub_10'] 	= self::getDataForPeriod($v['id'], $v['ctid'], 10, $startyear) + $pointsDup['ar_pub_10'] + $pointsAssoc['ar_pub_10'];

			$ret['ar_pub_all'] 	= self::getDataForPeriod($v['id'], $v['ctid'], 'all', $startyear) + $pointsDup['ar_pub_all'] + $pointsAssoc['ar_pub_all'];


			dbx::insert('a_ranking_test',array(
			'ar_contact_id' 	=> $v['id'],
			'ar_contactType_id' => $v['ctid'],
			'ar_pub_0'			=> $ret['ar_pub_0'],
			'ar_pub_1'			=> $ret['ar_pub_1'],
			'ar_pub_3'			=> $ret['ar_pub_3'],
			'ar_pub_5'			=> $ret['ar_pub_5'],
			'ar_pub_10'			=> $ret['ar_pub_10'],
			'ar_pub_all'		=> $ret['ar_pub_all']
			));

		}

		return $ret;

	}

	public static function calcOne($contact_id, $contact_type_id, $startyear)
	{

		if (!isset($contact_id) || !isset($contact_type_id))
		{
			die("parameters missing...");
		}

		if (!isset($startyear))
		{
			$startyear = date("Y");
		}

		$del = dbx::query("delete from a_ranking_test where ar_contact_id = $contact_id and ar_contactType_id = $contact_type_id");

		$assocs = self::getAssociates($contact_id);
		$dups	= self::getDuplicates($contact_id);

		$pointsAssoc = array(
		'ar_pub_0'		=> 0,
		'ar_pub_1'		=> 0,
		'ar_pub_3'		=> 0,
		'ar_pub_5'		=> 0,
		'ar_pub_10'		=> 0,
		'ar_pub_all'	=> 0,
		);

		$pointsDup = array(
		'ar_pub_0'		=> 0,
		'ar_pub_1'		=> 0,
		'ar_pub_3'		=> 0,
		'ar_pub_5'		=> 0,
		'ar_pub_10'		=> 0,
		'ar_pub_all'	=> 0,
		);

		if ($assocs !== 'false')
		{
			foreach ($assocs as $k2 => $v2) {

				$pointsAssoc['ar_pub_0']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 0, $startyear);
				$pointsAssoc['ar_pub_1']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 1, $startyear);
				$pointsAssoc['ar_pub_3']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 3, $startyear);
				$pointsAssoc['ar_pub_5']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 5, $startyear);
				$pointsAssoc['ar_pub_10']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 10, $startyear);
				$pointsAssoc['ar_pub_all']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 'all', $startyear);
			}
		}

		if ($dups !== 'false')
		{
			foreach ($dups as $k2 => $v2) {

				$pointsDup['ar_pub_0']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 0, $startyear);
				$pointsDup['ar_pub_1']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 1, $startyear);
				$pointsDup['ar_pub_3']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 3, $startyear);
				$pointsDup['ar_pub_5']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 5, $startyear);
				$pointsDup['ar_pub_10']		+= self::getDataForPeriod($v2['id'], $v2['ctid'], 10, $startyear);
				$pointsDup['ar_pub_all']	+= self::getDataForPeriod($v2['id'], $v2['ctid'], 'all', $startyear);
			}
		}


		$ret['ar_pub_0'] 	= self::getDataForPeriod($contact_id, $contact_type_id, 0, $startyear)  + $pointsDup['ar_pub_0'] + $pointsAssoc['ar_pub_0'];

		$ret['ar_pub_1'] 	= self::getDataForPeriod($contact_id, $contact_type_id, 1, $startyear) + $pointsDup['ar_pub_1'] + $pointsAssoc['ar_pub_1'];

		$ret['ar_pub_3'] 	= self::getDataForPeriod($contact_id, $contact_type_id, 3, $startyear) + $pointsDup['ar_pub_3'] + $pointsAssoc['ar_pub_3'];

		$ret['ar_pub_5'] 	= self::getDataForPeriod($contact_id, $contact_type_id, 5, $startyear) + $pointsDup['ar_pub_5'] + $pointsAssoc['ar_pub_5'];

		$ret['ar_pub_10'] 	= self::getDataForPeriod($contact_id, $contact_type_id, 10, $startyear) + $pointsDup['ar_pub_10'] + $pointsAssoc['ar_pub_10'];

		$ret['ar_pub_all'] 	= self::getDataForPeriod($contact_id, $contact_type_id, 'all', $startyear) + $pointsDup['ar_pub_all'] + $pointsAssoc['ar_pub_all'];


		dbx::insert('a_ranking_test',array(
		'ar_contact_id' 	=> $contact_id,
		'ar_contactType_id' => $contact_type_id,
		'ar_pub_0'			=> $ret['ar_pub_0'],
		'ar_pub_1'			=> $ret['ar_pub_1'],
		'ar_pub_3'			=> $ret['ar_pub_3'],
		'ar_pub_5'			=> $ret['ar_pub_5'],
		'ar_pub_10'			=> $ret['ar_pub_10'],
		'ar_pub_all'		=> $ret['ar_pub_all']
		));


		return;

	}




	/********************************************************************************************************************************************
	********************************************************************************************************
	* ************************old *****************
	*/



	public static function calcOld($contact_id, $contact_type_id, $startyear)
	{

		$ret['ar_pub_0'] 	= self::getDataForPeriodOld($contact_id, $contact_type_id, 0, $startyear);

		$ret['ar_pub_1'] 	= self::getDataForPeriodOld($contact_id, $contact_type_id, 1, $startyear);

		$ret['ar_pub_3'] 	= self::getDataForPeriodOld($contact_id, $contact_type_id, 3, $startyear);

		$ret['ar_pub_5'] 	= self::getDataForPeriodOld($contact_id, $contact_type_id, 5, $startyear);

		$ret['ar_pub_10'] 	= self::getDataForPeriodOld($contact_id, $contact_type_id, 10, $startyear);

		$ret['ar_pub_all'] 	= self::getDataForPeriodOld($contact_id, $contact_type_id, 'all', $startyear);


		return $ret;

	}



	public static function getDataForPeriodOld($contact_id, $contact_type_id, $period, $startyear)
	{

		// fk_category <> 33 classics nicht im ranking

		$dataMagSql = "SELECT COUNT(DISTINCT new2_archivmedia.kampagne) as count
                     FROM new2_med_person 
                     INNER JOIN new2_archivmedia ON  new2_med_person.pk_media =new2_archivmedia.pk_media
                     WHERE new2_med_person.pk_person = $contact_id 
                     AND fk_magazin_typ = 1
                     AND fk_category <> 33
                     AND  new2_med_person.pk_artperson_vs = $contact_type_id";


		$dataSpecialSql = "SELECT COUNT(DISTINCT new2_archivmedia.kampagne) as count
                     FROM new2_med_person 
                     INNER JOIN new2_archivmedia ON  new2_med_person.pk_media =new2_archivmedia.pk_media
                     WHERE new2_med_person.pk_person = $contact_id 
                     AND fk_magazin_typ > 1
                     AND fk_category <> 33
                     AND  new2_med_person.pk_artperson_vs = $contact_type_id";


		switch ($period) {
			// this year
			case '0':
				$dataMagSql .= " AND (new2_archivmedia.year = '$startyear')";
				$dataSpecialSql .= " AND (new2_archivmedia.year = '$startyear')";
				break;
				// last year
			case '1':
				$startyear = $startyear - 1;
				$dataMagSql .= " AND (new2_archivmedia.year = '$startyear')";
				$dataSpecialSql .= " AND (new2_archivmedia.year = '$startyear')";
				break;
				// last year
			case '3':
				$endyear = $startyear - 3;
				$dataMagSql .= " AND (new2_archivmedia.year <= '$startyear')
				   				AND (new2_archivmedia.year >= '$endyear')";
				$dataSpecialSql .= " AND (new2_archivmedia.year <= '$startyear')
				   				AND (new2_archivmedia.year >= '$endyear')";
				break;
				// last year
			case '5':
				$endyear = $startyear - 5;
				$dataMagSql .= " AND (new2_archivmedia.year <= '$startyear')
				   				AND (new2_archivmedia.year >= '$endyear')";
				$dataSpecialSql .= " AND (new2_archivmedia.year <= '$startyear')
				   				AND (new2_archivmedia.year >= '$endyear')";
				break;
				// last year
			case '10':
				$endyear = $startyear - 10;
				$dataMagSql .= " AND (new2_archivmedia.year <= '$startyear')
				   				AND (new2_archivmedia.year >= '$endyear')";
				$dataSpecialSql .= " AND (new2_archivmedia.year <= '$startyear')
				   				AND (new2_archivmedia.year >= '$endyear')";
				break;
			case 'all':
				$dataMagSql .= " AND (new2_archivmedia.year <= '$startyear')";
				$dataSpecialSql .= " AND (new2_archivmedia.year <= '$startyear')";
				break;

			default:

				break;
		}

		$dataMag 		=  dbx::query($dataMagSql);
		$dataSpecial 	=  dbx::query($dataSpecialSql);

		$countMag = $dataMag['count'];
		$countSpecial = self::getPoints($dataSpecial['count']);

		$countGesamt = $countMag + $countSpecial;

		return $countGesamt;

	}

}

/*

$cid 	= 477;
$ctid 	= 1;

if (isset($_REQUEST['cid']))
{
$cid = intval($_REQUEST['cid']);
}

if (isset($_REQUEST['ctid']))
{
$ctid = intval($_REQUEST['ctid']);
}

// $nadav = rankingcalc::calcOld($cid,$ctid,2014);

$do = rankingcalc::calcAll(2014);

echo "done";
*/