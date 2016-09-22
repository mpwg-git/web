<?

class xluerzer_a
{
	public static function defaultAjaxHandler($scope, $function)
	{
		switch ($scope)
		{

			case 'a_data_load':
				self::data_load();
				break;

			case 'a_data_save':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::data_save();
				break;

			case  'a_blog_categories':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::handle_blog_categories($function);
				break;
				
			case  'a_mailarchiv':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::handle_mail_archiv($function);
				break;	

			case  'a_contact_categories':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::handle_contact_categories($function);
				break;

			case  'a_contact_categories_group':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::handle_contact_categories_group($function);
				break;

			case  'a_backenduser':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::handle_backenduser($function);
				break;

			case  'a_frontendcontact':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::handle_frontenduser($function);
				break;

			case  'a_submission_categories':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::handle_submission_categories($function);
				break;

			case  'a_countries':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::handle_datacountries($function);
				break;

			case  'a_salutations':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::handle_salutations($function);
				break;

			case  'a_branches':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::handle_branch($function);
				break;
			case  'a_log':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::handle_log($function);
				break;
			case  'a_rankingexclusions':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::handle_exclusions($function);
				break;
			case  'a_ipranges':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::handle_ipranges($function);
				break;
			case  'a_distributors':
				xluerzer_user::liveSecurityCheckByTag('ADMIN');
				self::handle_distributors($function);
				break;

			default:
				return false;
		}
	}


	public static function scopex2db($scopex)
	{
		switch ($scopex)
		{
			case 'a_contact_categories':
				$table 	= "a_contact_category";
				$p_id 	= "acc_id";
				break;
			case 'a_contact_categories_group':
				$table 	= "a_contact_category_group";
				$p_id 	= "accg_id";
				break;
			case 'a_blog_categories':
				$table 	= "oe_blog_categories";
				$p_id 	= "oebc_id";
				break;
			case 'a_backenduser':
				$table 	= "a_backend_user";
				$p_id 	= "abu_id";
				break;
			case 'a_rankingexclusions':
				$table 	= "a_ranking_exclusions";
				$p_id 	= "are_id";
				break;
			case 'a_ipranges':
				$table 	= "a_ip_to_customer";
				$p_id 	= "aitc_id";
				break;
			case 'a_frontendcontact':
				$table 	= "fe_users";
				$p_id 	= "feu_id";
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
			case 'a_distributors':
				$table 	= "e_distributors";
				$p_id 	= "ed_id";
				break;
			case 'a_mailarchiv':
				$table 	= "wizard_auto_661";
				$p_id 	= "wz_id";
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

		$oldData = dbx::query("select * from $table where $p_id = $id");
		dbx::update($table,$db,array($p_id => $id));
		$record = dbx::query("select * from $table where $p_id = $id");

		$data = array(
		'record' => $record
		);

		xluerzer_log::update($table,$p_id,$id,$oldData);

		
		switch ($scopex)
		{
			case 'a_distributors':
				self::handle_distributer_cache();
				break;
			default: break;
		}
		
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

	public static function handle_blog_categories($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'oe_blog_categories',
		'db_prefix'			=> 'oebc_',
		'pid'				=> 'oebc_id',
		'del'				=> 'oebc_del',
		'extraInsert'		=> array('oebc_created_by' => $currUser, 'oebc_created_ts' => 'NOW'),
		'fields'			=> array('oebc_id','oebc_name','oebc_del','oebc_fid','oebc_sort','oebc_created_ts','oebc_modified_ts'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}


	public static function handle_mail_archiv($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'wizard_auto_661',
		'db_prefix'			=> 'wz_',
		'pid'				=> 'wz_id',
		'del'				=> 'wz_del',
		'extraInsert'		=> array(),
		'fields'			=> array('wz_id','wz_firstname','wz_lastname','wz_email', 'wz_country', 'wz_phone', 'wz_phone_code', 'wz_created '),
		'preSelect'			=> ', (select ac_name from a_country where ac_id = wz_country) as country_name_human ',
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}
	


	public static function handle_contact_categories($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'a_contact_category',
		'db_prefix'			=> 'acc_',
		'pid'				=> 'acc_id',
		'del'				=> 'acc_del',
		'extraInsert'		=> array('acc_created_by' => $currUser, 'acc_created_ts' => 'NOW'),
		'fields'			=> array('acc_id','acc_category','acc_created','acc_categoryGroup_id','acc_listed','acc_notes','acc_modified_ts','acc_modified_by','acc_del','acc_fid','acc_sort','acc_created_ts'),
		'preSelect'			=> ', (select accg_categorygroup from a_contact_category_group where accg_id = acc_categoryGroup_id) as accg_categorygroup, (select count(actc_contact_id) from a_contact_to_category where actc_category_id = acc_id) as countcontacts ',
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_contact_categories_group($function)
	{
		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'a_contact_category_group',
		'db_prefix'			=> 'accg_',
		'pid'				=> 'accg_id',
		'del'				=> 'accg_del',
		'extraInsert'		=> array('accg_created_by' => $currUser, 'accg_created_ts' => 'NOW'),
		'fields'			=> array('accg_id','accg_categorygroup','accg_del','accg_fid','accg_sort','accg_created_ts','accg_modified_ts','accg_created_by	accg_modified_by'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_backenduser($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'a_backend_user',
		'db_prefix'			=> 'abu_',
		'pid'				=> 'abu_id',
		'del'				=> 'abu_del',
		'extraInsert'		=> array('abu_created_by' => $currUser, 'abu_created_ts' => 'NOW'),
		'fields'			=> array('abu_id','abu_email','abu_password','abu_username','abu_lastLogin','abu_online','abu_moduleAdmin','abu_moduleContact','abu_moduleBackend','abu_modulePublish','abu_contactDelete','abu_moduleShop','abu_contactUpdate','abu_contactCredits','abu_contactAssignedTo','abu_contactCategories','abu_moduleCreditCards','abu_moduleTranslations','abu_deleted','abu_assignedTo','abu_del','abu_fid','abu_sort','abu_created_ts','abu_created_by','abu_modified_ts','abu_modified_by','abu_security_CRM-CONTACTS-ACCESS','abu_security_CRM-CONTACTS-ASSIGNED_TO','abu_security_CRM-CONTACTS-DEL','abu_security_CRM-PUBLISH-MEDIA','abu_security_ADMIN','abu_security_VOTING','abu_security_CMS'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_frontenduser($function)
	{
		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'fe_users',
		'db_prefix'			=> 'feu_',
		'pid'				=> 'feu_id',
		'del'				=> 'feu_del',
		'extraInsert'		=> array('feu_created_by' => $currUser, 'feu_created_ts' => 'NOW'),
		//'fields'			=> array('feu_id','feu_lastname','feu_firstname','feu_company','feu_published','feu_street','feu_zipcode','feu_city','feu_state','feu_tel','feu_fax','feu_email','feu_url','feu_country_id','feu_created','feu_createdBy','feu_modified','feu_modifiedBy','feu_simpleSearch','feu_searchPrint','feu_searchVideo','feu_searchCategories','feu_searchArtPerson','feu_pscItems','feu_publishRestricted','feu_profileViews','feu_fullname','feu_modifiedByUser','feu_publishFirstname','feu_pubLastname','feu_publishCompany','feu_publishStreet','feu_publishTel','feu_publishFax','feu_publishMail','feu_publishUrl','feu_publishzip','feu_publishedPlain','feu_beyond_archive_contactType','feu_seo', 'feu_del', 'feu_fid', 'feu_sort'),
		'fields'			=> array('feu_id','feu_lastname','feu_firstname','feu_company','feu_street','feu_zip','feu_city','feu_state','feu_fax','feu_email','feu_url','feu_country_id','feu_created','feu_createdBy','feu_modified','feu_modifiedBy'),
		'preSelect'			=> ', (select asc_name from a_shop_country where asc_id = feu_country_id) as asc_name, (DATEDIFF(feu_oa_validto,CURDATE())) as feu_oa_validto_remaining ',
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_submission_categories($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'category',
		'db_prefix'			=> 'cat_',
		'pid'				=> 'cat_id',
		'del'				=> 'cat_del',
		'extraInsert'		=> array('cat_created_by' => $currUser, 'cat_created_ts' => 'NOW'),
		'fields'			=> array('cat_id','cat_name','cat_filename','cat_del','cat_fid','cat_sort','cat_created_ts','cat_created_by','cat_modified_ts','cat_modified_by'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_datacountries($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

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


	public static function handle_ipranges($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'a_ip_to_customer',
		'db_prefix'			=> 'aitc_',
		'pid'				=> 'aitc_id',
		'del'				=> 'aitc_del',
		'preSelect'			=> ', (select CONCAT(feu_company, " ", feu_firstname, " ", feu_lastname) as namexxx from fe_users where feu_id = aitc_fe_user_id) as aitc_contact_id_human',
		'extraSearchFields' => array('aitc_contact_id_human'),
		'extraInsert'		=> array('aitc_created_by' => $currUser, 'aitc_created_ts' => 'NOW'),
		'fields'			=> array('aitc_id','aitc_aitc_ip','aitc_aitc_fe_user_id','aitc_aitc_created_ts','aitc_aitc_created_by','aitc_aitc_modified_ts','aitc_aitc_modified_by','aitc_aitc_del','aitc_fid','aitc_sort'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}


	public static function handle_distributer_cache()
	{
		set_time_limit(0);
		ignore_user_abort(true);
		
		$dropdown = fe_distributors::sc_get_dropdown();
		$dropdown[] = array('url'=>'/en/services/distributors.html');
		foreach ($dropdown as $d)
		{
			$url = 'http://www.luerzersarchive.net'.$d['url'].'?DISABLE_FULL_CACHE';
			file_get_contents($url);
		}
	}

	public static function handle_distributors($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'e_distributors',
		'db_prefix'			=> 'ed_',
		'pid'				=> 'ed_id',
		'del'				=> 'ed_del',
		'preSelect'			=> ', (select CONCAT(ec_company, " ", ec_firstname, " ", ec_lastname) as namexxx from e_contacts where ec_id = ed_contact_id) as ed_contact_name, (select ac_name from a_country where ac_id = ed_country_id) as ed_shop_country_human',
		'extraSearchFields' => array('ed_contact_name','ed_shop_country_human'),
		'extraInsert'		=> array('ed_created_by' => $currUser, 'ed_created_ts' => 'NOW'),
		'fields'			=> array('ed_id','ed_country_id','ed_contact_id','ed_ed_created_ts','ed_ed_created_by','ed_ed_modified_ts','ed_ed_modified_by','ed_ed_del','ed_fid','ed_sort'),
		'update'			=> array(),
		'normalize'			=> array(),
		
		'postModFunc' 		=> __CLASS__.'::handle_distributer_cache'
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_exclusions($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'a_ranking_exclusions',
		'db_prefix'			=> 'are_',
		'pid'				=> 'are_id',
		'del'				=> 'are_del',
		'preSelect'			=> ', (select CONCAT(ec_company, " ", ec_firstname, " ", ec_lastname) as namexxx from e_contacts where ec_id = are_contact_id) as are_contact_id_human',
		'extraSearchFields' => array('are_contact_id_human'),
		'extraInsert'		=> array('are_created_by' => $currUser, 'are_created_ts' => 'NOW'),
		'fields'			=> array('are_contact_id','are_del','are_modified_ts','are_created_by','are_modified_by','are_created_ts'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}

	public static function handle_salutations($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'a_salutations',
		'db_prefix'			=> 'as_',
		'pid'				=> 'as_id',
		'del'				=> 'as_del',
		'extraInsert'		=> array('abu_created_by' => $currUser, 'abu_created_ts' => 'NOW'),
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



