<?

class xredaktor_pages
{

	static $cache = false;

	public static function getById($p_id)
	{
		$p_id = intval($p_id);
		
		if (isset(self::$cache[$p_id]))
		{
			return self::$cache[$p_id];
		}
		
		$page = dbx::query("select * from pages where p_id = $p_id");
		self::$cache[$p_id] = $page;
		
		return $page;
	}

	public static function afterPageInsert($id)
	{
		$p_id = intval($id);
		dbx::update('pages',array('p_frameid'=>163,'p_isOnline'=>'Y','p_inMenue'=>'Y'),array('p_id'=>$id));
		return true;
	}



	public static function handle_PSA_update($psa_id)
	{
		//xredaktor_storage::fixFileUsage($psa_id);

		//fix
		//$ass 						= self::getASsMultiLangRecordsByIDAId($a_id);
	}

	public static function getPagesOfPage($p_id)
	{
		$p_id = intval($p_id);
		$pages = dbx::queryAll("select * from pages where p_fid = $p_id and p_del = 'N'");
		return $pages;
	}

	public static function getTreePathOfPages($p_id)
	{
		$paths2expand = '';
		$p = dbx::query("select * from pages where p_id = $p_id");
		if ($p === false) return '';
		$p_fid	= $p['p_fid'];
		if ($p_fid == 0) return '';
		$paths2expand .= $p_fid;
		$append = self::getTreePathOfPages($p_fid);
		if ($append != "")
		{
			$paths2expand .= '/'.$append;
		}
		return $paths2expand;
	}


	public static function getChildrenOfPId($p_id,$del=0,$menu=0,$online=0,$P_ID=0)
	{
		frontcontrollerx::isInt($p_id,'getChildrenOfPId');




		$sql_menu 	= " and p_inMenue = 'Y' ";
		$sql_del 	= " and p_del = 'N' ";
		$sql_online = " and p_isOnline = 'Y' ";

		if ($menu != 0) 	$sql_menu = "  ";
		if ($online != 0) 	$sql_online = "  ";
		if ($del != 0) 		$sql_del = "  ";

		$sql = "select * from pages where p_fid = $p_id $sql_menu $sql_del $sql_online order by p_sort";
		if ($_REQUEST['xr_menu']==1)
		{
			echo "<br>getChildrenOfPId::$sql";
		}

		$children = dbx::queryAll($sql);
		if (!is_array($children)) $children = array();

		if ($P_ID != 0)
		{
			$parents = self::getCrumbTree($P_ID,array(),$del,1,$online);

			$parentsFlat = array();
			foreach ($parents as $p)
			{
				$parentsFlat[] = $p['p_id'];
			}

			foreach ($children as $i => $arr)
			{



				$f_id = $arr['p_id'];

				if ($_REQUEST['xr_menu']==1)
				{
					echo "Parents:<pre>".print_r($parentsFlat,true)."</pre>";
				}

				$children[$i]['iAmAParent'] = (in_array($f_id,$parentsFlat)) ? 'Y' : 'N';
				$children[$i] = self::translatePageByRecord($children[$i]);
			}
		}


		return $children;
	}

	public static function translatePageByRecord($page)
	{
		if ($page === false) return false;
		$lang = self::getFrontEndLang();
		$val = trim($page['p_name_'.$lang]);

		if ($val=="")
		{
			$found = false;
			foreach (self::getLangFailOverOrder() as $lang)
			{
				$val = $page['p_name_'.$lang];
				if (trim($val)!="")
				{
					$found = true;
					break;
				}
			}
			if (!$found) $val = $page['p_name'];
		}
		$page['p_name'] = xredaktor_render::xr_htmlSpecialChars($val);
		return $page;
	}

	public static function getPapsch($p_id)
	{
		frontcontrollerx::isInt($p_id);
		$p_fid 	= dbx::queryAttribute("select p_fid from pages where p_id = $p_id","p_fid");
		$page 	= dbx::query("select * from pages where p_id = $p_fid and p_fid > 0");
		return self::translatePageByRecord($page);
	}

	public static function getCrumbTree($p_id,$array=array(),$del=0,$menu=0,$online=0)
	{
		if ($p_id == 0) return $array;
		frontcontrollerx::isInt($p_id,'getCrumbTree');

		$sql_menu 	= " and p_inMenue = 'Y' ";
		$sql_del 	= " and p_del = 'N' ";
		$sql_online = " and p_isOnline = 'Y' ";

		if ($menu != 0) 	$sql_menu = "  ";
		if ($online != 0) 	$sql_online = "  ";
		if ($del != 0) 		$sql_del = "  ";

		$sql = "select * from pages where p_id = $p_id $sql_menu $sql_online $sql_del ";
		if ($_REQUEST['xr_menu']==1)
		{
			echo "<br>getCrumbTree::".$sql;
		}

		$page = dbx::query($sql);
		if ($page === false) return $array;

		$page = self::translatePageByRecord($page);

		$p_fid 		= $page['p_fid'];
		$array[] 	= $page;

		return self::getCrumbTree($p_fid,$array,$del,$menu,$online);
	}

	public static function getCrumbTreeReverse($p_id,$del=0,$menu=0,$online=0)
	{
		$r = self::getCrumbTree($p_id,array(),$del,$menu,$online);
		return array_reverse($r);
	}

	public static function iAmAParent($p_id,$f_id,$del=0,$menu=0,$online=0)
	{
		$parents = self::getCrumbTree($p_id,array(),$del,$menu,$online);

		$parentsFlat = array();
		foreach ($parents as $p)
		{
			$parentsFlat[] = $p['p_id'];
		}

		if ($_REQUEST['xr_menu']==1)
		{
			echo "Parents:<pre>".print_r($parentsFlat,true)."</pre>";
		}


		$state = (in_array($f_id,$parentsFlat)) ? 'Y' : 'N';

		return $state;
	}


	static $currentLang = 'en';

	public static function getValidLangs() // Frontend only
	{

		$key = "XR_SITE_SETTINGS_getValidLangs";
		$cached = memcachex::get($key);
		
		if (($cached != false) && (xredaktor_render::useCache()))
		{
			return $cached;
		}
		
		
		$s_id = xredaktor_niceurl::getSiteIdViaHttpHost();
		$langs = array();

		if ($s_id === 0)
		{
			$dbSettings = dbx::queryAll("select fe_language.* from sites_fe_languages,fe_language where sfl_online = 'Y'  and sfl_del = 'N'  and sfl_fl_id = fel_id order by sfl_sort asc");
		} else
		{
			$dbSettings = dbx::queryAll("select fe_language.* from sites_fe_languages,fe_language where sfl_s_id = $s_id and sfl_online = 'Y'  and sfl_del = 'N'  and sfl_fl_id = fel_id order by sfl_sort asc");
		}

		foreach ($dbSettings as $r)
		{
			$langs[] = strtolower($r['fel_ISO']);
		}

		memcachex::set($key,$langs);

		return $langs;
		//return array('de','en','ru','fr','ro','it');
	}

	public static function getValidBELangs()
	{
		$s_id = xredaktor_niceurl::getSiteIdViaHttpHost();
		$langs = array();

		$dbSettings = dbx::queryAll("select be_language.* from sites_be_languages,be_language where sbl_s_id = $s_id and sbl_online = 'Y' and sbl_del = 'N' and sbl_bl_id = bel_id order by sbl_sort asc");
		foreach ($dbSettings as $r)
		{
			$langs[] = strtolower($r['bel_ISO']);
		}

		return $langs;
		return array('DE','EN','RU');
	}

	public static function getDefaultBELang()
	{
		return array('DE');
	}

	public static function getLangFailOverOrder()
	{
		$ret = self::getValidLangs();
		$ret[] = '';
		return $ret;
		//return array('de','en','ru','fr','it','ro','');
	}

	public static function getFrontEndLang()
	{
		
		return "en";
		
		if (in_array($_REQUEST['lang'],self::getValidLangs()))
		{
			self::setFrontEndLang($_REQUEST['lang']);
		}

		
		
		return self::$currentLang;
	}

	public static function setFrontEndLang($lang)
	{
		if (!in_array($lang,self::getValidLangs())) return false;
		self::$currentLang = $lang;
		return true;
	}

}