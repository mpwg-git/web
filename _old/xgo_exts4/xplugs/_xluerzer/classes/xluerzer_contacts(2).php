<?

class xluerzer_contacts
{


	public static function defaultAjaxHandler($function,$param_0)
	{
		switch ($function)
		{
			case 'bulkChange':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::bulkChange();
				break;
			case 'createNewEmpty':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::createNewEmpty();
				break;
			case 'createNew':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::createNew();
				break;
			case 'updateById':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::updateById();
				break;
			case 'loadById':
				self::loadById();
				break;
			case 'insert':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ACCESS');
				self::insert();
				break;
			case 'remove':
				xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-DEL');
				self::remove();
				break;
			case 'search':
				self::search();
				break;
			case 'searchCombo':
				self::searchCombo($param_0);
				break;
			case 'searchComboProfiles':
				self::searchComboProfiles($param_0);
				break;
			default:
				die('XXX');
		}
	}

	public static function bulkChange()
	{
		$cfg = json_decode($_REQUEST['cfg'],true);

		$cleanIds = array();
		foreach ($cfg['ids'] as $id)
		{
			$id = intval($id);
			if ($id == 0) continue;
			$cleanIds[] = $id;
		}

		$type  = dbx::escape($cfg['type']);
		$value = dbx::escape($cfg['values'][$type]);


		switch ($type)
		{
			case 'addCats':


				foreach ($cleanIds as $ec_id)
				{
					foreach ($cfg['values'] as $idx)
					{
						if (!is_numeric($idx)) continue;

						$presnt = dbx::query("select * from a_contact_to_category where actc_contact_id	= $ec_id and actc_category_id = $idx");
						if ($presnt === false)
						{

							$db = array(
							'actc_created_ts' 	=> 'NOW()',
							'actc_contact_id' 	=> $ec_id,
							'actc_category_id' 	=> $idx,
							);

							dbx::insert('a_contact_to_category',$db);
						}
					}
				}

				break;
			default:

				if (dbx::attributePresent('e_contacts',$type))
				{

					if ($type == 'ec_assignedTo')
					{
						xluerzer_user::liveSecurityCheckByTag('CRM-CONTACTS-ASSIGNED_TO');
					}


					$sql = "update e_contacts set $type = '$value' where ec_id IN (".implode(',',$cleanIds).")";
					dbx::query($sql);
				}

		}



		frontcontrollerx::json_success(array('cfg'=>$cfg,'sql'=>$sql));
	}


	public static function insert()
	{
		dbx::insert('e_contacts',array(
		'ec_created_date'=>'NOW()',
		'ec_created_ts'=>'NOW()',
		'ec_created_by' => xluerzer_user::getCurrentUserId(),
		'ec_assignedTo'=>'0',
		'ec_country_id'=>'0',
		'ec_contactType_id'=>'0',
		));

		$ec_id = dbx::getLastInsertId();
		$c = self::getById($ec_id);
		frontcontrollerx::json_success(array('record'=>$c));
	}

	public static function remove()
	{
		$ids = explode(",",trim($_REQUEST['ids']));

		foreach ($ids as $ec_id)
		{
			dbx::update('e_contacts',array('ec_del'=>'Y'),array('ec_id'=>$ec_id));
			xluerzer_log::delete('e_contacts','ec_id',$ec_id);
		}

		frontcontrollerx::json_success();
	}

	public static function createNewEmpty()
	{
		$db = array();
		$db['ec_created_ts'] 	= "NOW()";
		$db['ec_created_date'] 	= "NOW()";
		$db['ec_created_by'] 	= xluerzer_user::getCurrentUserId();
		dbx::insert('e_contacts',$db);
		$ec_id = dbx::getLastInsertId();

		frontcontrollerx::json_success(array('ec_id'=>$ec_id));
	}

	public static function createNew()
	{
		$data 	= json_decode($_REQUEST['data'],true);

		$db = array();
		foreach ($data as $k => $v)
		{
			if (!dbx::attributePresent('e_contacts',$k)) continue;
			$db[$k] = $v;
		}

		unset($db['ec_id']);
		$db['ec_created_ts'] 	= "NOW()";
		$db['ec_created_date'] 	= "NOW()";
		$db['ec_created_by'] 	= xluerzer_user::getCurrentUserId();

		dbx::insert('e_contacts',$db);
		$ec_id = dbx::getLastInsertId();


		$companyId = intval($_REQUEST['companyId']);
		if (($db['ec_type'] == 1) && ($companyId > 0))
		{
			dbx::insert('e_contacts_person_to_company',array('ecptoc_company'=>$companyId,'ecptoc_person'=>$ec_id));
		}


		frontcontrollerx::json_success(array('ec_id'=>$ec_id));
	}

	public static function updateById()
	{
		$ec_id 	= intval($_REQUEST['ec_id']);
		$data 	= json_decode($_REQUEST['data'],true);

		$db = array();
		foreach ($data as $k => $v)
		{
			if (!dbx::attributePresent('e_contacts',$k)) continue;
			$db[$k] = $v;
		}

		unset($db['ec_id']);
		$db['ec_modified_ts'] 	= "NOW()";
		$db['ec_modified_date'] = "NOW()";
		$db['ec_modified_by'] 	= xluerzer_user::getCurrentUserId();

		dbx::update('e_contacts',$db,array('ec_id'=>$ec_id));

		frontcontrollerx::json_success();
	}

	public static function updateRankingById($ec_id)
	{
		$ec_id = intval($ec_id);
		dbx::query("call update_ranking_by_id($ec_id);");
	}

	public static function loadById()
	{
		$ec_id = intval($_REQUEST['ec_id']);

		$contact = self::getById($ec_id);
		$company = dbx::query("select * from e_contacts_person_to_company where ecptoc_person = $ec_id");

		frontcontrollerx::json_success(array('contact'=>$contact,'company'=>$company));
	}

	public static function getById($ec_id)
	{
		return dbx::query("select * from e_contacts where ec_id = $ec_id");
	}

	public static function doDedaultFieldQuery($field,$query,$and='')
	{

		$field = dbx::escape($field);

		$sql_data 	= "select DISTINCT(`$field`) as _value, `$field` as _display from e_contacts where $field LIKE '%$query%' $and";
		$sql_cnt 	= "select count(DISTINCT(`$field`)) as sql_cnt from e_contacts where $field LIKE '%$query%' $and";

		xluerzer_db::uniqueDataGridWrapper(array(
		'db' 		=> Ixcore::DB_NAME,
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));
	}

	public static function doSearchInContactLogs($query)
	{
		$and	= '';
		$field 	= "eca_description";

		$sql_data 	= "select DISTINCT(`$field`) as _value, `$field` as _display from e_contacts_notes  where $field LIKE '%$query%' $and";
		$sql_cnt 	= "select count(DISTINCT(`$field`)) as sql_cnt from e_contacts_notes  where $field LIKE '%$query%' $and";

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
			case 'contactLog':
				self::doSearchInContactLogs($query);
				break;
			case 'ec_company':

				$query = str_replace(" ","%",$query);
				self::doDedaultFieldQuery($field,$query,' and ec_type = 0 ');
				break;

			case 'ec_firstname':
			case 'ec_lastname':
			case 'ec_city':
			case 'ec_position':
			case 'ec_email':
			case 'ec_branch':
			case 'ec_note':

				self::doDedaultFieldQuery($field,$query);
				break;

				break;

			default: break;
		}
	}

	public static function searchComboProfiles($field)
	{
		$query = trim(dbx2::escape($_REQUEST['query']));
		switch ($field)
		{

			case 'ec_firstname':
			case 'ec_lastname':
			case 'ec_city':
			case 'ec_company':
			case 'ec_position':
			case 'ec_email':
			case 'ec_branch':

				self::doDedaultFieldQuery($field,$query);
				break;

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
		//$query = explode(" ",$query);
		$query = array($query);
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


		foreach ($searchData as $k => $v)
		{

			// db escape zerstoert array
			if($k != 'contact_cats')
			{
				$v = dbx::escape($v);
			}

			switch ($k)
			{
				// SPECIALS

				case 'ec_retired':
					if (trim($v)=="") break;
					$v = intval($v);
					$where[] = " ec_retired = '$v' ";
					break;

				case 'ec_ranking_exklusion':
					if (trim($v)=="") break;
					$v = intval($v);

					if ($v == 1)
					{
						$where[] = " ec_id IN (select are_contact_id from a_ranking_exclusions)  ";
					} else
					{
						$where[] = " ec_id NOT IN (select are_contact_id from a_ranking_exclusions) ";
					}

					break;

				case 'created_from':
					if (trim($v)=="") break;
					$v = self::parseDate($v);
					$where[] = " ec_created_date >= '$v' ";
					break;
				case 'created_to':
					if (trim($v)=="") break;
					$v = self::parseDate($v);
					$where[] = " ec_created_date <= '$v' ";
					break;
				case 'modified_from':
					if (trim($v)=="") break;
					$v = self::parseDate($v);
					$where[] = " ec_modified_date >= '$v' ";
					break;
				case 'modified_to':
					if (trim($v)=="") break;
					$v = self::parseDate($v);
					$where[] = " ec_modified_date <= '$v' ";
					break;

				case 'contact_cats':

					$cats = $v;

					if (count($cats) == 0) break;

					$tmp = array();
					foreach ($cats as $c)
					{
						$c = dbx::escape($c);

						$tmp[] = " ec_id in (select actc_contact_id from a_contact_to_category where actc_category_id = $c ) ";
					}

					$where[] = " ( ".implode(" OR ",$tmp)." ) ";
					break;



				case 'credited_in_mag':
					if (trim($v)=="") break;
					$v = intval($v);
					if ($v == 0)
					{
						$where[] = " ec_id not in (select eamc_contact_id from e_archive_media_credits,e_archive_media where eamc_archive_media_id = eam_id) ";
					} else
					{
						$where[] = " ec_id in (select eamc_contact_id from e_archive_media_credits,e_archive_media where eamc_archive_media_id = eam_id and eam_magazine_id = $v) ";
					}
					break;

				case 'artwork_type':
					if (trim($v)=="") break;
					$v = intval($v);

					if ($v == 0)
					{
						$where[] = " ec_id in (select eamc_contact_id from e_archive_media_credits) ";
					} else {
						$where[] = " ec_id in (select eamc_contact_id from e_archive_media_credits,e_archive_media where eamc_archive_media_id = eam_id and eam_type = $v ) ";
					}

					break;

					/// FIELDS - NOT LIKE


				case 'ec_company':
					if (trim($v) == "") break;
					$where[] = self::doDedaultFieldQuerySql($k,$v,true);
					$where[] = " ec_type = 0 ";

					break;

				case 'ec_country_id':
					if (trim($v) == "") break;
					$where[] = self::doDedaultFieldQuerySql($k,$v,false);
					break;

				case 'beyond_archive':
					if (trim($v) == "") break;
					if ($v == 'Y')
					{
						$where[] = " ec_id in (select DISTINCT(fba_e_contact_id) from fe_beyond_archive  ) ";
					} else if ($v == 'N')
					{
						$where[] = " ec_id not in (select  DISTINCT(fba_e_contact_id) from fe_beyond_archive  ) ";
					}
					break;


				case 'ec_contactType_id':
					if (trim($v) == "") break;
					// $where[] = self::doDedaultFieldQuerySql($k,$v,false);
					$where[] = " ec_id in (select eamc_contact_id from e_archive_media_credits where eamc_contactType_id = $v) ";

					break;

				case 'contactLog':
					if (trim($v) == "") break;
					$v = addslashes($v);
					$where[] = " ec_id in (select distinct(eca_contact_id) from e_contacts_notes where eca_description LIKE '%$v%') ";
					break;
					
				case 'ec_position':
				case 'ec_type':
				case 'ec_id':
				case 'ec_email':
				case 'ec_city':
				case 'ec_branch':
				case 'ec_note':
					//case 'ec_assignedTo':
					if (trim($v) == "") break;
					$where[] = self::doDedaultFieldQuerySql($k,$v,true);
					break;

				case 'ec_assignedTo':
					if (trim($v) == "") break;
					$where[] = "(  ec_assignedTo LIKE '$v' )";
					break;

					/// FIELDS - LIKE ?
				case 'ec_lastname':
				case 'ec_firstname':
					$where[] = self::doDedaultFieldQuerySql($k,$v,true);
					break;

				case 'overall':

					if (trim($v) == "") break;

					/*
					$where[] = self::doDedaultFieldQuerySql(array(
					'ec_company',
					'ec_lastname',
					'ec_firstname',
					'ec_email',
					),$v,true);
					*/

					if (is_numeric($v))
					{
						$where[] = " ec_id = $v ";
						break;
					} else
					{

						list($p0,$p1) = explode(" ",$v,2);


						if (($p0 != "") && ($p1 != ""))
						{

							/*
							$where[] = " (

							(ec_firstname LIKE '%$p0%' AND ec_lastname LIKE '%$p1%' ) OR ( ec_firstname LIKE '%$p1%' AND ec_lastname LIKE '%$p0%' ) OR (ec_company LIKE '%$p0%') OR (ec_company LIKE '%$p1%') OR (ec_company LIKE '%$p1%$p0%') OR (ec_company LIKE '%$p0%$p1%')

							) ";

							*/

						} else {

							/*

							$where[] = " (
							(ec_firstname LIKE '%$p0%') OR ( ec_lastname LIKE '%$p0%') OR (ec_company LIKE '%$p0%')
							) ";

							*/

						}

						$company = ($searchData['overall_type_company'] == '1');
						$person	 = ($searchData['overall_type_person'] == '1');

						if (((!$company) && (!$person)) || ($company && $person))
						{

							if (($p0 != "") && ($p1 != ""))
							{
								$where[] = " (
									(ec_firstname LIKE '%$p0%' AND ec_lastname LIKE '%$p1%' ) OR ( ec_firstname LIKE '%$p1%' AND ec_lastname LIKE '%$p0%' ) OR (ec_company LIKE '%$p1%$p0%') OR (ec_company LIKE '%$p0%$p1%')
									) ";
							} else {
								$where[] = " (
									(ec_firstname LIKE '%$p0%') OR ( ec_lastname LIKE '%$p0%') OR (ec_company LIKE '%$p0%')
									) ";
							}



						} else {

							if ($company)
							{
								/*
								COMPANY ONLY
								*/


								if (($p0 != "") && ($p1 != ""))
								{
									$where[] = " (
								(ec_company LIKE '%$p1%$p0%') OR (ec_company LIKE '%$p0%$p1%')
								) ";
								} else {
									$where[] = " (
								ec_company LIKE '%$p0%'
								) ";
								}

								/*

								$where[] = " (
								ec_company LIKE '%$p0%'
								) ";

								*/
								$where[] = " ec_type = 0 ";
							} else
							{

								/*
								PERSON ONLY
								*/

								if (($p0 != "") && ($p1 != ""))
								{
									$where[] = " (
									(ec_firstname LIKE '%$p0%' AND ec_lastname LIKE '%$p1%' ) OR ( ec_firstname LIKE '%$p1%' AND ec_lastname LIKE '%$p0%' ) 
									) ";
								} else {
									$where[] = " (
									(ec_firstname LIKE '%$p0%') OR ( ec_lastname LIKE '%$p0%') 
									) ";
								}

								$where[] = " ec_type = 1 ";
							}


						}

					}



					break;

				default: break;
			}
		}

		$where[] = " (ec_duplicate = 0)  ";
		$where[] = " (ec_del = 'N')  ";

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

		$sql_data = "SELECT e_contacts.*, abu_username, ac_name, (select count(eamc_id) from e_archive_media_credits where ec_id = eamc_contact_id) as credits_total FROM `e_contacts`, a_country,a_backend_user WHERE [GRID_FILTERS] $where and ec_country_id = ac_id and ec_assignedTo = abu_id ORDER BY `ec_id` asc";
		$sql_cnt = "SELECT count(*) as sql_cnt FROM `e_contacts`, a_country,a_backend_user WHERE [GRID_FILTERS] $where and ec_country_id = ac_id  and ec_assignedTo = abu_id ";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

		die();
	}

}