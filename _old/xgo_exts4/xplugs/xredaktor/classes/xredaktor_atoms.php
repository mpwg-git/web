<?

class xredaktor_atoms
{

	public static function afterAtomRecordUpdate_POSTHOOK($id,$newDataRecord,$oldDataRecord)
	{
		$nameNew = $newDataRecord['a_name'];
		$nameOld = $oldDataRecord['a_name'];

		if ($nameOld != $nameNew)
		{
			if ($newDataRecord['a_type'] == 'WIZARD')
			{
				xredaktor_wizards::updateTableCommentOfWizard($id);
			}
		}
	}

	public static function getSiteIdByID($a_id)
	{
		$a = self::getById($a_id);
		if ($a === false) return $a;
		return $a['a_s_id'];
	}

	public static function getARecordBy_as_id($as_id)
	{
		return dbx::query("select atoms.* from atoms_settings,atoms where as_a_id = a_id and as_id = $as_id");
	}

	public static function saveContentByIdAndFace($a_id, $f_id,$a_content)
	{
		$f_id = intval($f_id);
		if ($f_id == 0) return false;
		self::save2history($a_id);
		self::updateById($a_id,array('a_content_'.$f_id=>$a_content));
		xredaktor_render::atom_cache_check($a_id,true);
	}

	public static function getTreePathOfAtoms($a_id)
	{
		$paths2expand = '';
		$a = dbx::query("select * from atoms where a_id = $a_id");
		if ($a === false) return '';
		$a_fid	= $a['a_fid'];
		if ($a_fid == 0) return '';
		$paths2expand .= $a_fid;
		$append = self::getTreePathOfAtoms($a_fid);
		if ($append != "")
		{
			$paths2expand .= '/'.$append;
		}
		return $paths2expand;
	}

	public static function getById($a_id)
	{
		$a_id 	= intval($a_id);
		$a 		= dbx::query("select * from atoms where a_id = $a_id");
		return $a;
	}

	public static function getByVID($a_vid)
	{
		$a_vid 	= intval($a_vid);
		$a 		= dbx::query("select * from atoms where a_vid = $a_vid");
		return $a;
	}

	public static function updateById($a_id,$data)
	{
		dbx::update('atoms',$data,array('a_id'=>$a_id));
	}

	public static function loadContentById($a_id)
	{
		$a = self::getById($a_id);
		return $a['a_content'];
	}

	public static function save2history($a_id)
	{
		$content = self::getById($a_id);
		$content = $content['a_content'];

		$lastHistory = dbx::query("select * from atoms_history where ah_a_id = $a_id order by ah_id desc LIMIT 1");
		if ($lastHistory['ah_backup'] != $content)
		{

			dbx::insert('atoms_history',array(
			'ah_a_id' => $a_id,
			'ah_created' => 'NOW()',
			'ah_backup' => $content
			));
			return dbx::getLastInsertId();
		}
		return false;
	}

	public static function saveContentById($a_id, $a_content)
	{
		self::save2history($a_id);
		self::updateById($a_id,array('a_content'=>$a_content));
		xredaktor_render::atom_cache_check($a_id,true);
	}

	public static function getAllFrames($siteSelector=false)
	{
		if ($siteSelector === false)
		{
			$frames = dbx::queryAll("select * from atoms where a_del = 'N' and a_type = 'FRAME' order by a_name");
		} else
		{
			$siteSelector = frontcontrollerx::isInt($siteSelector,'getAllFrames');
			$frames = dbx::queryAll("select * from atoms where a_del = 'N' and a_type = 'FRAME' and a_s_id = $siteSelector order by a_name");
		}
		if (!is_array($frames)) $frames = array();
		return $frames;
	}

	public static function getAllWizards()
	{
		$frames = dbx::queryAll("select * from atoms where a_del = 'N' and a_type = 'WIZARD' and a_wizard_online = 'Y' order by a_name");
		if (!is_array($frames)) $frames = array();
		return $frames;
	}

	public static function getAllWizardsOK($s_id)
	{
		$s_id = frontcontrollerx::isInt($s_id,'getAllWizardsOK');
		$frames = dbx::queryAll("select * from atoms where a_del = 'N' and a_type = 'WIZARD' and a_s_id = $s_id and a_wizard_online = 'Y' and a_id IN (select as_a_id from atoms_settings where as_del = 'N' group by as_a_id) order by a_sort");
		if (!is_array($frames)) $frames = array();
		return $frames;
	}

}