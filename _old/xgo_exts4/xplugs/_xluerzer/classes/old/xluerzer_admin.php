<?

class xluerzer_admin
{
	public static function defaultAjaxHandler($scope, $function)
	{

		switch ($scope)
		{
		
			case 'a_data_load':
				self::data_load();
				break;
				
			case 'a_data_save':
				self::data_save();
				break;
		
			case  'a_backenduser':
				self::handle_backenduser($function);
				break;
				
			case  'a_frontendcontact':
				self::handle_frontenduser($function);
				break;
				
			case  'a_submission_categories':
				self::handle_submission_categories($function);
				break;
				
			case  'a_countries':
				self::handle_datacountries($function);
				break;
				
			case  'a_salutations':
				self::handle_salutations($function);
				break;
				
			case  'a_branches':
				self::handle_branch($function);
				break;
				
			case  'a_log':
				self::handle_log($function);
				break;
				
			default:
				return false;
		}
	}


	public static function scopex2db($scopex)
	{
		switch ($scopex)
		{
			case 'a_backenduser':
				$table 	= "a_backend_user";
				$p_id 	= "abu_id";
				break;
			case 'a_frontendcontact':
				$table 	= "a_frontend_contact";
				$p_id 	= "afc_id";
				break;
			case 'a_submission_categories':
				$table 	= "category";
				$p_id 	= "cat_id";
				break;
			case 'a_countries':
				$table 	= "country";
				$p_id 	= "c_id";
				break;
			case 'a_salutations':
				$table 	= "a_salutations";
				$p_id 	= "as_id";
				break;
			case 'a_branches':
				$table 	= "a_branch";
				$p_id 	= "ab_id";
				break;
			case 'a_log':
				$table 	= "a_log";
				$p_id 	= "al_id";
				break;
			default: die('1*1=3');
		}
		return array($table,$p_id);
	}


	public static function data_load()
	{
		$scopex = trim($_REQUEST['scopex']);
		list($table,$p_id) = self::scopex2db($scopex);

		$id 	= intval($_REQUEST['id']);
		$record = dbx::query("select * from $table where $p_id = $id");

		$data = array(
		'record' => $record
		);
		frontcontrollerx::json_success($data);
	}

	public static function data_save()
	{
		$scopex = trim($_REQUEST['scopex']);
		list($table,$p_id) = self::scopex2db($scopex);

		$db 	= json_decode($_REQUEST['record'],true);
		$id 	= intval($_REQUEST['id']);
		dbx::update($table,$db,array($p_id => $id));
		$record = dbx::query("select * from $table where $p_id = $id");

		$data = array(
		'record' => $record
		);

		xluerzer_log::update($table,$p_id,$id,$db);

		frontcontrollerx::json_success($data);
	}

	/*
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
	 
	 */


	public static function handle_backenduser($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'a_backend_user',
		'db_prefix'			=> 'abu_',
		'pid'				=> 'abu_id',
		'del'				=> 'abu_del',
		'fields'			=> array('abu_id','abu_email','abu_password','abu_username','abu_lastLogin','abu_online','abu_moduleAdmin','abu_moduleContact','abu_moduleBackend','abu_modulePublish','abu_contactDelete','abu_moduleShop','abu_contactUpdate','abu_contactCredits','abu_contactAssignedTo','abu_contactCategories','abu_moduleCreditCards','abu_moduleTranslations','abu_deleted','abu_assignedTo','abu_del','abu_fid','abu_sort','abu_created_ts','abu_created_by','abu_modified_ts','abu_modified_by'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_frontenduser($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'fe_users',
		'db_prefix'			=> 'feu_',
		'pid'				=> 'feu_id',
		'del'				=> 'feu_del',
		'fields'			=> array('feu_id','feu_lastname','feu_firstname','feu_company','feu_published','feu_street','feu_zipcode','feu_city','feu_state','feu_tel','feu_fax','feu_email','feu_url','feu_country_id','feu_created','feu_createdBy','feu_modified','feu_modifiedBy','feu_simpleSearch','feu_searchPrint','feu_searchVideo','feu_searchCategories','feu_searchArtPerson','feu_pscItems','feu_publishRestricted','feu_profileViews','feu_fullname','feu_modifiedByUser','feu_publishFirstname','feu_pubLastname','feu_publishCompany','feu_publishStreet','feu_publishTel','feu_publishFax','feu_publishMail','feu_publishUrl','feu_publishzip','feu_publishedPlain','feu_beyond_archive_contactType','feu_seo', 'feu_del', 'feu_fid', 'feu_sort'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_submission_categories($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'category',
		'db_prefix'			=> 'cat_',
		'pid'				=> 'cat_id',
		'del'				=> 'cat_del',
		'fields'			=> array('cat_id','cat_name','cat_filename','cat_del','cat_fid','cat_sort','cat_created_ts','cat_created_by','cat_modified_ts','cat_modified_by'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_datacountries($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'country',
		'db_prefix'			=> 'c_',
		'pid'				=> 'c_id',
		'del'				=> 'c_del',
		'fields'			=> array('c_id','c_continent','c_name','c_iso','c_modified_ts','c_modified_by','c_del','c_fid','c_sort','c_created_ts', 'c_created_by'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}
	
	public static function handle_log($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'a_log',
		'db_prefix'			=> 'al_',
		'pid'				=> 'al_id',
		'del'				=> 'al_del',
		'fields'			=> array('al_id','al_action','al_table','al_record_id','al_backend_user_id','al_ip','al_host','al_del','al_fid','al_sort','al_created_ts', 'al_created_by', 'al_modified_ts', 'al_modified_by', 'al_mods'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}
	
	public static function handle_salutations($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'a_salutations',
		'db_prefix'			=> 'as_',
		'pid'				=> 'as_id',
		'del'				=> 'as_del',
		'fields'			=> array('as_id','as_salutation','as_old_salutation','as_del','as_fid','as_sort','as_created_ts', 'as_created_by', 'as_modified_ts', 'as_modified_by'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}
	
	
	public static function handle_branch($function)
	{

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'a_branch',
		'db_prefix'			=> 'ab_',
		'pid'				=> 'ab_id',
		'del'				=> 'ab_del',
		'fields'			=> array('ab_id','ab_name','ab_del','ab_fid','ab_sort','ab_created_ts', 'ab_created_by', 'ab_modified_ts', 'ab_modified_by'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}
	

}



