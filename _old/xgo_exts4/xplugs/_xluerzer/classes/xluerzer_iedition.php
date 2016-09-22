<?

class xluerzer_iedition
{


	public static function defaultAjaxHandler($scope,$function)
	{

		switch ($scope)
		{
			case 'iedtion_pdfs_locales_load':
				self::iedtion_pdfs_locales_load();
				break;
			case 'iedtion_pdfs_locales_save':
				self::iedtion_pdfs_locales_save();
				break;
			case 'iedtion_pdfs_locales':
				self::iedtion_pdfs_locales($function);
				break;
			case 'iedtion_pdfs_load':
				self::iedtion_pdfs_load();
				break;
			case 'iedtion_pdfs_save':
				self::iedtion_pdfs_save();
				break;
			case 'iedtion_pdfs':
				self::handle_iedtion_pdfs($function);
				break;
			default: break;
		}

		die('XXXX');
	}

	public static function iedtion_pdfs_load()
	{
		$ip_id = intval($_REQUEST['ip_id']);
		$data = dbx::query("select * from iedition_pdfs where ip_id = $ip_id");
		frontcontrollerx::json_success(array('data'=>$data));
	}

	
	public static function handleCloudCache($s_id)
	{
		$s_id = intval($s_id);
		if ($s_id == 0) return false;

		$file 	= xredaktor_storage::getFilePathById($s_id);
		$key 	= md5($file.'_'.$s_id);

		xredaktor_assets::cachedImages_setKeyFile($s_id,$key,$file,array());

		return true;
	}

	public static function iedtion_pdfs_save()
	{
		$ip_id 	= intval($_REQUEST['ip_id']);
		$data 	= json_decode($_REQUEST['data'],true);

		$ip_url		= intval($data['ip_url']);
		$ip_image	= intval($data['ip_image']);

		self::handleCloudCache($ip_url);
		self::handleCloudCache($ip_image);

		unset($data['ip_id']);
		dbx::update('iedition_pdfs',$data,array('ip_id'=>$ip_id));
		dbx::query("update iedition_pdfs set ip_hash=ip_hash+1 where ip_id = $ip_id ");

		frontcontrollerx::json_success(array('data'=>$data));
	}

	public static function handle_iedtion_pdfs($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = array(
		'table'				=> 'iedition_pdfs',
		'db_prefix'			=> 'ip_',
		'pid'				=> 'ip_id',
		'fid'				=> 'ip_fid',
		'sort'				=> 'ip_sort',
		'del'				=> 'ip_del',
		'fields'			=> array('ip_id', 'ip_name'),
		'extraInsert'		=> array('ip_created_ts' => 'NOW()', 'ip_created_by' => $currUser),
		'update'			=> array(),
		'normalize'			=> array()
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}


	public static function iedtion_pdfs_locales_load()
	{
		$ipl_id = intval($_REQUEST['ipl_id']);
		$data = dbx::query("select * from iedition_pdfs_locales where ipl_id = $ipl_id");
		frontcontrollerx::json_success(array('data'=>$data));
	}

	public static function iedtion_pdfs_locales_save()
	{
		$ipl_id 	= intval($_REQUEST['ipl_id']);
		$data 	= json_decode($_REQUEST['data'],true);

		
		$ipl_url	= intval($data['ipl_url']);
		$ipl_image	= intval($data['ipl_image']);

		self::handleCloudCache($ipl_url);
		self::handleCloudCache($ipl_image);
		
		
		unset($data['ipl_id']);
		dbx::update('iedition_pdfs_locales',$data,array('ipl_id'=>$ipl_id));
		dbx::query("update iedition_pdfs_locales set ipl_hash=ipl_hash+1 where ipl_id = $ipl_id ");

		frontcontrollerx::json_success(array('data'=>$data));
	}

	public static function iedtion_pdfs_locales($function)
	{

		$ipl_ip_id 	= intval($_REQUEST['ipl_ip_id']);
		$currUser 	= xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = array(
		'table'				=> 'iedition_pdfs_locales',
		'db_prefix'			=> 'ipl_',
		'pid'				=> 'ipl_id',
		'fid'				=> 'ipl_fid',
		'sort'				=> 'ipl_sort',
		'del'				=> 'ipl_del',
		'extraInsertFlyInt' => array('ipl_ip_id'),
		'extraLoad'			=> " ipl_ip_id = $ipl_ip_id ",
		'fields'			=> array('ipl_id', 'ipl_lang'),
		'extraInsert'		=> array('ipl_created_ts' => 'NOW()', 'ipl_created_by' => $currUser),
		'update'			=> array(),
		'normalize'			=> array()
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}


}