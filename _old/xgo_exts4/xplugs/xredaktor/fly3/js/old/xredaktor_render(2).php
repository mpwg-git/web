<?
class xredaktor_render
{
	public static function processRequest()
	{
		$p_id = frontcontrollerx::isInt($_REQUEST['p_id'],'PAGE_ID_NOT_NUMERIC');
		self::renderPage($p_id);
	}


	public static function getPageById($p_id)
	{
		$p = dbx::query("select * from pages where p_id = $p_id");
		return $p;
	}

	public static function getFrameByPageId($p_id)
	{
		$p = dbx::query("select * from pages where p_id = $p_id");
		$p_frameid = $p['p_frameid'];
		$f = dbx::query("select * from atoms where a_id = $p_frameid");
		return $f;
	}

	public static function getAtom($a_id)
	{
		$a = dbx::query("select * from atoms where a_id = $a_id");
		return $a;
	}

	public static function getContainers($a)
	{
		$a_id = $a['a_id'];
		$containers = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_type = 'CONTAINER'");
		if (!is_array($containers)) $containers = array();
		return $containers;
	}

	public static function getASRecordByID($as_id)
	{
		return dbx::queryAll("select * from atoms_settings where as_id = $as_id");
	}

	public static function getContainersContent($p_id,$a_id,$as_id)
	{
		$containers = dbx::queryAll("select * from pages_settings_atoms where psa_a_id = $a_id and psa_as_id = $as_id and psa_p_id = $p_id and psa_del = 'N' order by psa_sort");
		if (!is_array($containers)) $containers = array();
		return $containers;
	}

	public static function getMainSettings($p_id,$a_id)
	{
		$settings = dbx::query("select * from pages_settings_atoms where psa_as_id = 0 and psa_p_id = $p_id and psa_a_id = $a_id");
		return $settings;
	}

	public static function renderAtom($p_id,$containerCfg,$psa_inline_a_id,$inline_atom_cfg,$atomx)
	{
		$html = "";
		$assign = array();
		
		$a_id = $psa_inline_a_id;
		$a = self::getAtom($psa_inline_a_id);
		$html .= self::injectAtomDivStart($atomx);
		
		/***********************************************************
		* MAIN_SETTINGS
		*/

		$main_settings = self::getMainSettings($p_id,$a_id);
		if (is_array($main_settings))
		{
			$cfg = json_decode($main_settings,true);

			foreach ($cfg as $k => $pack)
			{
				switch ($pack['as_type'])
				{
					default:
						$assign[$k] = $pack['v'];
						break;
				}
			}
		}

		/***********************************************************
		* CONTAINERS
		*/

		$containers  = self::getContainers($a_id);
		foreach ($containers as $container)
		{
			$as_id 		= $container['as_id'];
			$as_name 	= $container['as_name'];
			$_html 		= self::renderContainerInlines($p_id,$a_id,$as_id,$container);
			$assign[$as_name] = $_html;
		}
		
		
		$html .= templatex::renderOnTheFly($a['a_content'],$assign);
		
		
		$html .= self::injectAtomDivEnd($atomx);
		return $html;
	}

	public static function renderContainerInlines($p_id,$a_id,$as_id,$container)
	{
		libx::turnOnErrorReporting();
		echo "$p_id,$a_id,$as_id\n<br>";

		$_html = "";
		$_html .= self::injectContainerDivStart($p_id,$a_id,$container);

		//die("$p_id,$a_id,$as_id");
		$atomsInContainer = self::getContainersContent($p_id,$a_id,$as_id);
		foreach ($atomsInContainer as $atomx)
		{
			$psa_inline_a_id 	= $atomx['psa_inline_a_id'];
			$inline_atom_cfg 	= $atomx['psa_json_cfg'];
			$_html .= self::renderAtom($p_id,$containerCfg,$psa_inline_a_id,$inline_atom_cfg,$atomx);
		}


		$_html		.= self::injectContainerDivEnd($p_id,$a_id,$container);
		return $_html;
	}

	public static function renderContainer($p_id,$f)
	{
		$a_id = $f['a_id'];
		$html = $f['a_content'];

		$assign = array();


		/***********************************************************
		* MAIN_SETTINGS
		*/

		$main_settings = self::getMainSettings($p_id,$a_id);
		if (is_array($main_settings))
		{
			$cfg = json_decode($main_settings,true);

			foreach ($cfg as $k => $pack)
			{
				switch ($pack['as_type'])
				{
					default:
						$assign[$k] = $pack['v'];
						break;
				}
			}
		}

		/***********************************************************
		* CONTAINERS
		*/

		$containers  = self::getContainers($a_id);
		foreach ($containers as $container)
		{
			$as_id 		= $container['as_id'];
			$as_name 	= $container['as_name'];
			$_html 		= self::renderContainerInlines($p_id,$a_id,$as_id,$container);
			$assign[$as_name] = $_html;
		}

		$assign['CMS'] = self::injectEditHtml();

		$html = templatex::renderOnTheFly($html,$assign);

		if (4==3)
		{
			echo "<pre>";
			echo htmlspecialchars($html);
			echo "</pre>";
		}

		return $html;
	}



	public static function injectContainerDivStart($p_id,$a_id,$container)
	{
		$as_id 		= $container['as_id'];
		$as_name 	= $container['as_name'];
		return "<div class='xc_container_start' rel='$as_id' p_id='$p_id' as_id='$as_id' a_id='$a_id' as_name='$as_name'></div>";
	}

	public static function injectContainerDivEnd($p_id,$a_id,$container)
	{
		$as_id 		= $container['as_id'];
		$as_name 	= $container['as_name'];
		return "<div class='xc_container_end' rel='$as_id' p_id='$p_id' as_id='$as_id' a_id='$a_id' as_name='$as_name'></div>";
	}



	public static function injectAtomDivStart($atomx)
	{
		$psa_id = $atomx['psa_id'];
		$psa_inline_a_id = $atomx['psa_inline_a_id'];
		$atom = self::getAtom($psa_inline_a_id);
		$a_name = $atom['a_name'];
		return "<div class='xc_atom_start' rel='$psa_id' psa_id='$psa_id' a_name='$a_name'></div>";
	}

	public static function injectAtomDivEnd($atomx)
	{
		$psa_id = $atomx['psa_id'];
		$psa_inline_a_id = $atomx['psa_inline_a_id'];
		$atom = self::getAtom($psa_inline_a_id);
		$a_name = $atom['a_name'];
		return "<div class='xc_atom_end' rel='$psa_id' psa_id='$psa_id' a_name='$a_name'></div>";
	}




	public static function injectEditHtml()
	{
		$html	= "";

		$html 	.= 	"<!-- CMS START-->\n";
		$html 	.= 	"<link rel='stylesheet' type='text/css' href='/xcdrive/xframe/libs/extjs/resources/css/ext-all.css' />\n";
		$html 	.= 	"<script type='text/javascript' src='/xcdrive/xframe/libs/extjs/bootstrap.js'></script>\n";

		$html 	.= 	"<link rel='stylesheet' type='text/css' href='/xcdrive/xplugs/xredaktor/fly/css/editor.php' />\n";
		$html 	.= 	"<script type='text/javascript' src='/xcdrive/xplugs/xredaktor/fly/js/editor.php'></script>\n";

		$html 	.= 	"<link rel='stylesheet' type='text/css' href='/xcdrive/xplugs/xredaktor/media/css/loadAll.php' />\n";
		$html 	.= 	"<script type='text/javascript' src='/xcdrive/xplugs/xredaktor/media/js/loadAll.php'></script>\n";

		$html 	.= 	"<!-- CMS END-->\n";

		return $html;
	}

	public static function renderPage($p_id)
	{
		$p_id 	= frontcontrollerx::isInt($p_id,'PAGE_ID_NOT_NUMERIC');
		$p 		= self::getPageById($p_id);
		$f 		= self::getFrameByPageId($p_id);
		$html 	= self::renderContainer($p_id,$f);
		die($html);
	}

	public static function getPSARecordById($psa_id)
	{
		return dbx::query("select * from pages_settings_atoms where psa_id = $psa_id");
	}

	/****************************************************************************
	*
	*	EDIT-FUNCTIONS
	*
	*/


	public static function atomAppend($cfg)
	{
		$psa_a_id 			= $cfg['psa_a_id'];
		$psa_as_id 			= $cfg['psa_as_id'];
		$psa_inline_a_id 	= $cfg['psa_inline_a_id'];
		$psa_p_id 			= $cfg['psa_p_id'];

		$psa_sort = dbx::queryAttribute("select max(psa_sort)+1 as county from pages_settings_atoms where psa_a_id = $psa_a_id and psa_as_id = $psa_as_id and psa_p_id = $psa_p_id and psa_del='N'","county");
		$cfg['psa_sort'] 	= $psa_sort;
		$cfg['psa_created']	= 'NOW()';
		dbx::insert('pages_settings_atoms',$cfg);
		$psa_id = dbx::getLastInsertId();

		return array(self::getPSARecordById($psa_id),self::renderContainerInlines($psa_p_id,$psa_a_id,$psa_as_id,self::getASRecordByID($psa_as_id)));
	}

	public static function atomRemove($cfg)
	{
		$psa_id = $cfg['psa_id'];
		$psa = self::getPSARecordById($psa_id);

		$psa_p_id = $psa['psa_p_id'];
		$psa_a_id = $psa['psa_a_id'];
		$psa_as_id = $psa['psa_as_id'];

		dbx::update('pages_settings_atoms',array('psa_del'=>'Y'),array('psa_id'=>$psa_id));

		return array(self::renderContainerInlines($psa_p_id,$psa_a_id,$psa_as_id,self::getASRecordByID($psa_as_id)));
	}

	public static function atomInsertBefore($cfg)
	{
		$psa_id 			= $cfg['psa_id'];
		$psa_inline_a_id 	= $cfg['psa_inline_a_id'];
		
		$psa = self::getPSARecordById($psa_id);

		$psa_p_id 	= $psa['psa_p_id'];
		$psa_a_id 	= $psa['psa_a_id'];
		$psa_as_id 	= $psa['psa_as_id'];
		$psa_sort 	= $psa['psa_sort'];


		dbx::insert('pages_settings_atoms',array(
		'psa_p_id' 			=> $psa_p_id,
		'psa_a_id' 			=> $psa_a_id,
		'psa_as_id' 		=> $psa_as_id,
		'psa_sort'			=> $psa_sort,
		'psa_inline_a_id' 	=> $psa_inline_a_id,
		'psa_created'		=> 'NOW()'
		));

		$psa_id_new = dbx::getLastInsertId();
		
		dbx::query("update pages_settings_atoms set psa_sort=psa_sort+1 where  psa_a_id = $psa_a_id and psa_as_id = $psa_as_id and psa_p_id = $psa_p_id and psa_id != $psa_id_new and psa_sort >= $psa_sort");

		return array(self::getPSARecordById($psa_id_new),self::renderContainerInlines($psa_p_id,$psa_a_id,$psa_as_id,self::getASRecordByID($psa_as_id)));
	}

}