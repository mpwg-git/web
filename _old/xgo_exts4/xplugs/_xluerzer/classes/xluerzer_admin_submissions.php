<?

class xluerzer_admin_submissions
{
	public static function defaultAjaxHandler($scope,$function,$param_0)
	{

		switch ($function)
		{
			case 'load':
				self::load();
				break;
			case 'save':
				self::save();
				break;
			default:
				die("xluerzer_admin_submissions [$scope] [$function] [$param_0]");
		}

	}

	public static function load()
	{
		// $data = dbx::queryAll("select * from a_submission2Mag");
		$data = dbx::queryAll("SELECT a_submission2Mag.* , es_id, MIN(es_id) AS min_es_id FROM a_submission2Mag LEFT JOIN e_submissions ON as2m_m_id = es_magazine_id GROUP BY as2m_id");
		frontcontrollerx::json_success(array('data'=>$data));
	}

	public static function save()
	{
		$data = json_decode($_REQUEST['data'],true);
		
		foreach ($data as $d)
		{
			
			$as2m_mt_id = $d['as2m_mt_id'];
			$as2m_m_id 	= $d['as2m_m_id'];
			
			dbx::update('a_submission2Mag',array('as2m_m_id'=>$as2m_m_id),array('as2m_mt_id'=>$as2m_mt_id));
			
		}
		
		frontcontrollerx::json_success();
	}

}