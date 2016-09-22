<?

class xredaktor_state_xrprovider
{

	public static function handleAjax($function)
	{
		switch ($function)
		{
			case 'set':

				$u_id 	= intval($_REQUEST['user_id']);
				$name 	= $_REQUEST['name'];
				$value 	= $_REQUEST['value'];
				self::set($u_id,$name,$value);
				frontcontrollerx::json_success();
				break;
			case 'clear':

				$u_id 	= intval($_REQUEST['user_id']);
				$name 	= $_REQUEST['name'];
				self::clear($u_id,$name);
				frontcontrollerx::json_success();
				break;
			default: die('xredaktor_state_xrprovider');
		}
	}

	public static function set($u_id,$name,$value)
	{
		self::clear($u_id, $name);
		dbx::insert('xr_state_provider',array('xrsp_u_id'=>$u_id,'xrsp_name'=>$name,'xrsp_value'=>$value));
		$last = dbx::getLastInsertId();

	}

	public static function clear($u_id,$name)
	{
		dbx::delete('xr_state_provider',array('xrsp_u_id'=>$u_id,'xrsp_name'=>$name));
	}

	public static function getAllByUserId($u_id)
	{
		$u_id = intval($u_id);
		$data = dbx::queryAll("select * from xr_state_provider where xrsp_u_id = $u_id");
		if ($data === false) $data = array();

		$ret = array();
		foreach ($data as $v)
		{
			$ret[$v['xrsp_name']] = json_decode($v['xrsp_value']);
		}

		return $ret;
	}



}