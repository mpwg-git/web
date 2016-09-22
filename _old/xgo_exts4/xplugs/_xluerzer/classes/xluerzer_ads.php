<?

class xluerzer_ads
{
	public static function defaultAjaxHandler($function,$param_0)
	{

		switch ($function)
		{
			case 'save':
				self::save();
				break;
			case 'load':
				self::load();
				break;
			case 'overview':
				self::handleOverview($param_0);
				break;
			default:
				die('JJJ');
		}
	}

	public static function load()
	{
		$a_id = intval($_REQUEST['a_id']);
		$db = dbx::query("select * from a_ads where a_id = $a_id");
		frontcontrollerx::json_success(array('data'=>$db));
	}

	public static function save()
	{
		$a_id = intval($_REQUEST['a_id']);
		$db = json_decode($_REQUEST['data'],true);
		dbx::update('a_ads',$db,array('a_id'=>$a_id));
		
		file_get_contents("http://lz-www.xgodev.com/en/inspiration.html?DISABLE_FULL_CACHE");
		file_get_contents("http://lz-www.xgodev.com/en/blog.html?DISABLE_FULL_CACHE");
		file_get_contents("http://lz-www.xgodev.com/en/features.html?DISABLE_FULL_CACHE");
		
		frontcontrollerx::json_success(array('data'=>$db));
	}

	public static function handleOverview($function)
	{

		$extFunctionsConfig = array(
		'table'				=> 'a_ads',
		'db_prefix'			=> 'a_',
		'pid'				=> 'a_id',
		'fid'				=> 'a_fid',
		'sort'				=> 'a_sort',
		'del'				=> 'a_del',
		'fields'			=> array('a_media_sky_s_id', 'a_media_sky_s_id'),
		'extraInsert'		=> array('a_created' => 'NOW()'),
		'update'			=> array(),
		'normalize'			=> array()
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
		die('T');
	}


}