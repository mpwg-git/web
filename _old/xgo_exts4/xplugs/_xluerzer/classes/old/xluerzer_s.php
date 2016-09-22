<?

class xluerzer_s
{
	public static function defaultAjaxHandler($scope, $function)
	{
		switch ($scope)
		{
			case 's_contact_details':
				self::handleContacts();
				break;
			case 's_credits_details':
				self::handleCreditsOfSubmission($function);
				break;
			case 's_details':
				self::handleDetails($function);
				break;
			case 's_day_overview':
				self::s_day_overview();
				break;
			case 's_OfTheDayX':
				self::s_OfTheDayX($function);
				break;
			default:
				self::defaultAjaxHandler2($scope, $function);
		}
	}
	
	public static function handleContacts()
	{
		$ec_id = intval($_REQUEST['ec_id']);
		$d = dbx::query("select * from e_contacts where ec_id = $ec_id");
		frontcontrollerx::json_success($d);
	}

	public static function handleCreditsOfSubmission($function)
	{

		$es_id = intval($_REQUEST['es_id']);

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_submission_credits',
		'db_prefix'			=> 'esc_',
		'pid'				=> 'esc_id',
		'del'				=> 'esc_del',
		'extraLoad'			=> "esc_submission_id = '$es_id' ",
		'fields'			=> array(),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}

	public static function handleDetails($function)
	{
		switch ($function)
		{
			case 'load':
				$es_id = intval($_REQUEST['es_id']);
				$s = dbx::query("select * from e_submissions where es_id = $es_id");
				frontcontrollerx::json_success($s);
				break;
			case 'save':
				frontcontrollerx::json_success();
				break;
		}
	}

	public static function s_OfTheDayX($function)
	{

		$dayx = dbx::escape($_REQUEST['dayx']);
		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_submissions',
		'db_prefix'			=> 'es_',
		'pid'				=> 'es_id',
		'del'				=> 'es_del',
		'extraLoad'			=> "es_created_date = '$dayx' ",
		'fields'			=> array(),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}

	public static function s_day_overview()
	{

		$sql_data = "SELECT

						es_created_date as dayx,
						count(`es_id`) as total_submissions,
						count(distinct(`es_submittedBy`)) as total_submitter,
						
						sum(`es_submittedFor`='Commercials') as total_tv,
						(select count(distinct(`es_submittedBy`)) as total_submitter from e_submissions where `es_submittedFor`='Commercials' and es_created_date = dayx) as total_tv_submitter,
						
						
						sum(`es_submittedFor`='Magazine') as total_print,
						(select count(distinct(`es_submittedBy`)) as total_submitter from e_submissions where `es_submittedFor`='Magazine' and 
						es_created_date = dayx) as total_print_submitter,
						
						
						sum(`es_submittedFor`='students-print') as total_students,
						(select count(distinct(`es_submittedBy`)) as total_submitter from e_submissions where `es_submittedFor`='students-print' and es_created_date = dayx) as total_students_submitter,
						
						
						
						sum(`es_submittedFor`='Specials') as total_specials,
						(select count(distinct(`es_submittedBy`)) as total_submitter from e_submissions where `es_submittedFor`='Specials' and es_created_date = dayx) as total_specials_submitter
						

						FROM `e_submissions` WHERE 1
						
						group by `dayx`
						ORDER BY `dayx`  DESC";

		$sql_cnt = "SELECT count(distinct(es_id)) as sql_cnt FROM `e_submissions` WHERE 1";

		self::uniqueDataGridWrapper(array(

		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

	}

	public static function uniqueDataGridWrapper($cfg)
	{
		$sql_data 	= $cfg['sql_data'];
		$sql_cnt 	= $cfg['sql_cnt'];

		$limit 	= intval($_REQUEST['limit']);
		$offset = intval($_REQUEST['offset']);
		$start 	= intval($_REQUEST['start']);

		if (($limit == 0) || ($limit > 1000)) $limit = 1000;
		$sql_data .= " LIMIT $start, $limit";

		$nodes 		= dbx2::queryAll($sql_data);
		$totalCount = dbx2::queryAttribute($sql_cnt,'sql_cnt');

		frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
	}



	/*

	#############################################################
	#############################################################
	#############################################################

	*/


	public static function getConfigByScope($scope)
	{

		$db = Ixcore::DB_NAME;

		switch ($scope)
		{

			case  's_e_submissioncredits':
				$extFunctionsConfig = array(
				'db'			=> $db,
				'table'			=> 'e_submission_credits',
				'pid'			=> 'esc_id',
				'scope'			=> $scope,
				// 'fields'		=> array('oetw_id','oetw_state','oetw_title','oetw_desc_short','oetw_keywords','DATE_FORMAT(oetw_created,"%Y-%m-%d") as oetw_created','oetw_media_id'),
				);
				return $extFunctionsConfig;

			case  's_e_submission_details':
				$extFunctionsConfig = array(
				'db'			=> $db,
				'table'			=> 'e_submissions',
				'pid'			=> 'es_id',
				'scope'			=> $scope,
				// 'fields'		=> array(),
				);
				return $extFunctionsConfig;

			case  's_e_contact_details':
				$extFunctionsConfig = array(
				'db'			=> $db,
				'table'			=> 'e_contacts',
				'pid'			=> 'ec_id',
				'scope'			=> $scope,
				//'fields'		=> array(),
				);
				return $extFunctionsConfig;

			case  's_e_contact_representants':
				
				$extFunctionsConfig = array(
				'db'			=> $db,
				'table'			=> array('e_contacts_representants', 'e_contacts'),
				'pid'			=> 'e_contacts_representants.ecr_id',
				'extraLoad'		=> 'ecr_represented_id=ec_id ',
				'scope'			=> $scope,
				'fields'		=> array('ecr_id', 'ecr_contact_id', 'ecr_represented_id', 'ecr_perrep_relation', 'ecr_rep_relation', 'ecr_comments', 'ecr_ShowInLaos', 'ecr_ShowInSos', 'ecr_created', 'ecr_createdBy', 'ecr_modified', 'ecr_modifiedBy', 'ecr_deleted', 'ec_id', 'ec_company', 'ec_firstname', 'ec_lastname',)
				);
				return $extFunctionsConfig;

			case  's_e_contact_duplicates':
				$extFunctionsConfig = array(
				'db'			=> $db,
				'table'			=> array('e_contacts_duplicates', 'e_contacts'),
				'pid'			=> 'e_contacts_duplicates.ecd_id',
				'extraLoad'		=> 'ecd_duplicate_id = ec_id',
				'scope'			=> $scope,
				'fields'		=> array('ecd_id', 'ecd_contact_id', 'ecd_duplicate_id', 'ecd_created', 'ecd_createdBy', 'ec_id', 'ec_company', 'ec_firstname', 'ec_lastname')
				);
				return $extFunctionsConfig;

			case  's_e_contact_associates':
				$extFunctionsConfig = array(
				'db'			=> $db,
				'table'			=> array('e_contacts_associated', 'e_contacts'),
				'pid'			=> 'e_contacts_associated.eca_id',
				'extraLoad'		=> 'e_contacts_associated.eca_associated_id = e_contacts.ec_id',
				'scope'			=> $scope,
				'fields'		=> array('eca_id', 'eca_contact_id', 'eca_associated_id', 'eca_createdon', 'eca_createdby', 'ec_id', 'ec_company', 'ec_firstname', 'ec_lastname')
				);
				return $extFunctionsConfig;

			case  's_e_contact_backup':
				$extFunctionsConfig = array(
				'db'			=> $db,
				'table'			=> 'e_contact_backups',
				'pid'			=> 'ecb_id',
				'scope'			=> $scope,
				// 'fields'		=> array(),
				);
				return $extFunctionsConfig;


			default:
				return false;
		}
	}


	public static function defaultGetMediaType($id)
	{
		$id = intval($id);
		$db = Ixcore::DB_NAME;
		dbx2::select_database($db);

		// could also check for submittedFor

		$sql_data 	= "SELECT es_imageFileSize, es_videoFileSize from e_submissions WHERE es_id = ".$id;
		$data 		= dbx2::query($sql_data);

		if ($data['es_imageFileSize'] > 0) {
			$type = "img";
			return $type;
		}
		else if ($data['es_videoFileSize'] > 0) {
			$type = "vid";
			return $type;
		}
		else {
			return false;
		}
	}


	public static function defaultGetMediaYear($id)
	{
		$id = intval($id);
		$db = Ixcore::DB_NAME;
		dbx2::select_database($db);

		// could also check for submittedFor

		$sql_data 	= "SELECT DATE_FORMAT(es_created, '%Y') as year from e_submissions WHERE es_id = ".$id;
		$data 		= dbx2::query($sql_data);

		if ($data['year']) {
			return $data['year'];
		}
		else {
			return false;
		}
	}


	public static function defaultMedia($function, $id, $size)
	{
		$id = intval($id);
		$type = xluerzer_e::defaultGetMediaType($id);
		$year = xluerzer_e::defaultGetMediaYear($id);
		$size = "small";

		switch ($type)
		{

			case  'img':
				if (!$size) {$size = "medium";}
				$filename = Ixcore::htdocsRoot.'/media/submissions/print/'.$size.'/'.$year.'/'.$id.'.jpg';
				if (file_exists($filename))
				{

					header('content-type: image/jpeg');
					header('Content-length: '.filesize($filename));
					header('Content-Disposition: inline; filename="'.$s.'";');
					readfile($filename);
					exit;
				}
				else {
					die ("file ".$filename." nicht gefunden");
				}

				break;

			case  'vid':

				// check for poster
				if (!$size) {$size = "medium";}
				$filename = Ixcore::htdocsRoot.'/media/submissions/tv_commercials/poster/'.$size.'/'.$year.'/'.$id.'.jpg';
				if (file_exists($filename))
				{
					header('content-type: image/jpeg');
					header('Content-length: '.filesize($filename));
					header('Content-Disposition: inline; filename="'.$s.'";');
					readfile($filename);
					exit;
				}
				else {
					// TODO
					die ("file ".$filename." nicht gefunden");
				}

				// TODO
				// check for thumbnails
				// check for converted files

				return false;
				break;

			default:
				return false;

		}

		frontcontrollerx::json_success($data);
	}


	public static function defaultGetDetails($scope, $id)
	{
		$id = intval($id);
		$db = Ixcore::DB_NAME;
		dbx2::select_database($db);
		$selectFrom = "";
		$idName = "";
		$altSql = "";


		switch ($scope)
		{

			case 's_e_contact_representants':

				$selectFrom = "e_contacts_representants JOIN e_contacts on e_contacts_representants.ecr_represented_id = e_contacts.ec_id";
				$idName = "ecr_contact_id";
				break;

			case 's_e_contact_duplicates':

				$selectFrom = "e_contacts_duplicates JOIN e_contacts on e_contacts_duplicates.ecd_contact_id = e_contacts.ec_id";
				$idName = "ecd_contact_id";
				break;

			case 's_e_contact_associates':

				$selectFrom = "e_contacts_associated JOIN e_contacts on e_contacts_associated.eca_associated_id = e_contacts.ec_id";
				$idName = "eca_contact_id";
				break;

			case 's_e_contact_backups':

				$selectFrom = "e_contacts_backup JOIN e_contacts on e_contacts_backup.ecb_id = e_contacts.ec_id";
				$idName = "ecb_contact_id";
				break;

			default:
				
				$extFunctionsConfig = self::getConfigByScope($scope);
				$selectFrom 		= $extFunctionsConfig['table'];
				$idName 			= $extFunctionsConfig['pid'];

		}

		if ($altSql !== "") {
			$sql_data = $altSql;
		}
		else {
			$sql_data 	= "SELECT * from $selectFrom WHERE $idName = ".$id;
		}

		$data = dbx2::query($sql_data);

		frontcontrollerx::json_success($data);
	}


	public static function defaultSetDetails($scope, $id, $values)
	{

		$updateData = json_decode($values);

		$id = intval($id);
		$db = Ixcore::DB_NAME;
		dbx2::select_database($db);

		$updateTable = "";
		$idName = "";

		$extFunctionsConfig 	= self::getConfigByScope($scope);
		$updateTable 			= $extFunctionsConfig['table'];
		$idName 				= $extFunctionsConfig['pid'];

		$data = dbx2::update($updateTable,$updateData,array($idName=>$id));
		frontcontrollerx::json_success($data);
	}


	public static function defaultDetails($scope, $function, $id, $values) {
		switch ($function) {

			case 'load':
				xluerzer_e::defaultGetDetails($scope, $id);
				break;

			case 'save':
				xluerzer_e::defaultSetDetails($scope, $id, $values);
				break;

			default:
				break;

		}
	}


	public static function defaultGetCredits($id)
	{
		$id = intval($id);
		$db = Ixcore::DB_NAME;
		dbx2::select_database($db);

		$sql_data 	= "SELECT ct_symbol, ct_description, esc_firstname, esc_lastname, esc_company from (e_submission_credits JOIN contact_type ON esc_contactType_id = ct_id) WHERE esc_submission_id = ".$id;
		$sql_cnt 	= "select count(esc_submission_id) as sql_cnt FROM e_submission_credits WHERE esc_submission_id = ".$id;

		$data 		= dbx2::query($sql_data);

		xluerzer_db_junky::uniqueDataGridWrapper(array(
		'db' 		=> Ixcore::DB_NAME,
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

	}


	public static function defaultCredits($function, $id, $json) {
		switch ($function) {

			case 'load':
				xluerzer_e::defaultGetCredits($id);
				break;

			case 'save':
				xluerzer_e::defaultSetCredits($id, $json);
				break;

			default:
				break;

		}
	}


	public static function defaultAjaxHandler2($scope, $function)
	{

		switch ($scope)
		{

			case 's_e_crmSearchComboFor':

				$query = trim(dbx2::escape($_REQUEST['query']));

				switch ($function)
				{

					case 'firstname':

						$sql_data 	= "select DISTINCT(`ec_firstname`) as _value, `ec_firstname` as _display from e_contacts where ec_firstname LIKE '%$query%'";
						$sql_cnt 	= "select count(DISTINCT(`ec_firstname`)) as sql_cnt from e_contacts where ec_firstname LIKE '%$query%'";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					case 'lastname':

						$sql_data 	= "select DISTINCT(`ec_lastname`) as _value, `ec_lastname` as _display from e_contacts where ec_lastname LIKE '%$query%'";
						$sql_cnt 	= "select count(DISTINCT(`ec_lastname`)) as sql_cnt from e_contacts where ec_lastname LIKE '%$query%'";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					case 'city':

						$sql_data 	= "select DISTINCT(`ec_city`) as _value, `ec_city` as _display from e_contacts where ec_city LIKE '%$query%'";
						$sql_cnt 	= "select count(DISTINCT(`ec_city`)) as sql_cnt from e_contacts where ec_city LIKE '%$query%'";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					case 'companyname':

						$sql_data 	= "select DISTINCT(`ec_company`) as _value, `ec_company` as _display from e_contacts where ec_company LIKE '%$query%'";
						$sql_cnt 	= "select count(DISTINCT(`ec_company`)) as sql_cnt from e_contacts where ec_company LIKE '%$query%'";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					case 'position':

						$sql_data 	= "select DISTINCT(`ec_position`) as _value, `ec_position` as _display from e_contacts where ec_position LIKE '%$query%'";
						$sql_cnt 	= "select count(DISTINCT(`ec_position`)) as sql_cnt from e_contacts where ec_position LIKE '%$query%'";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					case 'country':

						$sql_data 	= "select DISTINCT(`ec_country`) as _value, `ec_country` as _display from e_contacts where ec_country LIKE '%$query%'";
						$sql_cnt 	= "select count(DISTINCT(`ec_country`)) as sql_cnt from e_contacts where ec_country LIKE '%$query%'";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					case 'email':

						$sql_data 	= "select DISTINCT(`ec_email`) as _value, `ec_email` as _display from e_contacts where ec_email LIKE '%$query%'";
						$sql_cnt 	= "select count(DISTINCT(`ec_email`)) as sql_cnt from e_contacts where ec_email LIKE '%$query%'";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					default: break;
				}

				break;


			case 's_e_submissionSearchComboFor':

				$query = trim(dbx2::escape($_REQUEST['query']));

				switch ($function)
				{
					// TODO students tabellen auch beruecksichtigen

					case 'submitter':

						$sql_data 	= "select DISTINCT(`es_submittedBy`) as _value, `es_submittedBy` as _display from e_submissions where es_submittedBy LIKE '%$query%'";
						$sql_cnt 	= "select count(DISTINCT(`es_submittedBy`)) as sql_cnt from e_submissions where es_submittedBy LIKE '%$query%'";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					case 'agency':

						$sql_data 	= "select DISTINCT(`es_agency`) as _value, `es_agency` as _display from e_submissions where es_agency LIKE '%$query%'";
						$sql_cnt 	= "select count(DISTINCT(`es_agency`)) as sql_cnt from e_submissions where es_agency LIKE '%$query%'";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					case 'country':

						$sql_data 	= "select DISTINCT(`es_country`) as _value, `es_ountry` as _display from e_submissions where es_country LIKE '%$query%'";
						$sql_cnt 	= "select count(DISTINCT(`es_country`)) as sql_cnt from e_submissions where es_country LIKE '%$query%'";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					case 'submissionID':

						$sql_data 	= "select DISTINCT(`es_id`) as _value, concat(es_id,' - ',es_agency,'/',es_city) as _display from e_submissions where es_id = '$query'";
						$sql_cnt 	= "select count(DISTINCT(`es_id`)) as sql_cnt from e_submissions where es_id = '$query'";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					case 'city':

						$sql_data 	= "select DISTINCT(`es_city`) as _value, `es_city` as _display from e_submissions where es_city LIKE '%$query%'";
						$sql_cnt 	= "select count(DISTINCT(`es_city`)) as sql_cnt from e_submissions where es_city LIKE '%$query%'";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					case 'email':

						$sql_data 	= "select DISTINCT(`es_email`) as _value, `es_email` as _display from e_submissions where es_email LIKE '%$query%'";
						$sql_cnt 	= "select count(DISTINCT(`es_email`)) as sql_cnt from e_submissions where es_email LIKE '%$query%'";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					case 'kindOf':

						$sql_data 	= "select DISTINCT(`es_submittedFor`) as _value, `es_submittedFor` as _display from e_submissions where es_submittedFor LIKE '%$query%'";
						$sql_cnt 	= "select count(DISTINCT(`es_submittedFor`)) as sql_cnt from e_submissions where es_submittedFor LIKE '%$query%'";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					case 'submissionStatus':

						$sql_data 	= "select ess_description as _value, `ess_description` as _display from e_submission_status where 1";
						$sql_cnt 	= "select count(ess_description) as sql_cnt from e_submission_status where 1";

						xluerzer_db_junky::uniqueDataGridWrapper(array(
						'db' 		=> Ixcore::DB_NAME,
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));

						break;

					default: break;
				}

				break;

			default:

				$extFunctionsConfig = self::getConfigByScope($scope);
				xluerzer_db_junky::handleDefaultExtGrid($extFunctionsConfig,$function);
		}

	}

}
