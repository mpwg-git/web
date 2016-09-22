<?

class xredaktor_atoms_settings
{

	private static $cache = array();
	
	public static function getTreePath($as_id)
	{
		$as_id = intval($as_id);
		$paths2expand = '';
		$as = dbx::query("select * from atoms_settings where as_id = $as_id");
		if ($as === false) return '';
		$as_fid	= $as['as_fid'];
		if ($as_fid == 0) return '';
		$paths2expand .= $as_fid;
		$append = self::getTreePath($as_fid);
		if ($append != "")
		{
			$paths2expand .= '/'.$append;
		}
		return $paths2expand;
	}
	
	public static function getById($as_id)
	{
		if (isset(self::$cache[$as_id])) return self::$cache[$as_id];
		$as_id = frontcontrollerx::isInt($as_id);
		$data  = dbx::query("select * from atoms_settings where as_id = $as_id");
		self::$cache[$as_id] = $data;
		return self::$cache[$as_id];
	}

	
	public static function getAllValidByAId($a_id)
	{
		$a_id = frontcontrollerx::isInt($a_id);
		return dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del='N' and as_type != ''");
	}

	
	public static function getSiteIdByID($as_id)
	{
		$as_id = frontcontrollerx::isInt($as_id);
		$a = xredaktor_atoms::getARecordBy_as_id($as_id);
		return $a['a_s_id'];
	}

	public static function update($as_id,$data=array())
	{
		$as_id = frontcontrollerx::isInt($as_id);
		if (count($data) == 0) return false;
		if (!is_array($data)) return false;
		return dbx::update('atoms_settings',$data,array('as_id'=>$as_id));
	}

	public static function field2WizardName($as_id,$lang=false)
	{
		$as_id = intval($as_id);
		$as = dbx::query("select * from atoms_settings where as_id = $as_id");

		switch ($as['as_type'])
		{
			case 'CHECKBOX':
				$cfg = json_decode($as['as_config'],true);
				foreach ($cfg['l'] as $c)
				{
					$k=$c['v'];
					$attribName = 'wz_'.$as['as_name'].'_'.$k;
				}
				break;
			default:
				$attribName = 'wz_'.$as['as_name'];
				break;
		}

		if ($lang === false)
		{
			return $attribName;
		} else
		{
			return "_".$lang."_".$attribName;
		}
	}
}