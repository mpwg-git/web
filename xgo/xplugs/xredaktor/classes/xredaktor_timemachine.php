<?

class xredaktor_timemachine
{

	public static function getById($tm_id)
	{
		$tm_id = intval($tm_id);
		$tmage = dbx::query("select * from timemachine where tm_id = $tm_id");
		return $tmage;
	}


	public static function getTreePath($tm_id)
	{
		$tmaths2expand = '';
		$tm = dbx::query("select * from timemachine where tm_id = $tm_id");
		if ($tm === false) return '';
		$tm_fid	= $tm['p_fid'];
		if ($tm_fid == 0) return '';
		$tmaths2expand .= $tm_fid;
		$append = self::getTreePath($tm_fid);
		if ($append != "")
		{
			$tmaths2expand .= '/'.$append;
		}
		return $tmaths2expand;
	}




}