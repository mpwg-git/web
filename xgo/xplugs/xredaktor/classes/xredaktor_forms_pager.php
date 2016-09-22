<?

class xredaktor_forms_pager extends xredaktor_sanitize
{

	
	private static function getOffset($pos)
	{
		return $pos * self::getLimit();
	}

	private static function getPos()
	{
		if (!isset($_REQUEST['pos'])) return 0;
		$pos = intval($_REQUEST['pos']);
		return $pos;
	}

	private static function getLimit()
	{
		$limits = self::getLimitConfig();

		$limit = intval($_REQUEST['cnt']);
		if ($limit == 0) $limit = $limits[0];
		
		return $limit;
	}
	
	private static function getLimitConfig()
	{
		return array(5,10,20,50);
	}
	
	public static function render($params)
	{

		$fas_id		= 0;
		$as_id 		= 0;
		$settings 	= array();

		self::pi(array(

		'i'	=> array(

		'rel_f_id'		=> &$rel_f_id,
		'rel_id' 		=> &$as_id,
		'rel_fas_id' 	=> &$fas_id,

		),

		),$params);

		$settings = xredaktor_forms::getSettingsByFasId($fas_id);
		
		switch ($settings['RAW']['wz_VIEW_MODE'])
		{
			case 'PAGER':
				$a_id = xredaktor_forms::getAtomIdByGuiType('pager');
				break;
			case 'LOADMORE':
				$a_id = xredaktor_forms::getAtomIdByGuiType('loadmore');
				break;
			default:
				return "[INVALID VIEW_MODE]";
				break;
		}

		$as = xredaktor_atoms_settings::getById($as_id);

		switch ($as['as_type'])
		{
			case 'WIZARDLIST':
				$sql = xredaktor_relations::resolve_wizardlist($as_id,$rel_f_id);
				$selector = " * ";
				break;
			default: 
			die('INVALID TYPE');
		}
		
		
		$sql_total		= str_replace(array('[SELECTOR]',"[LIMIT]"),array('count(wz_id) as cntx',''),$sql);
		$total_pages	= ceil(dbx::queryAttribute($sql_total,'cntx')/self::getLimit());
		
		//
		$pos = self::getPos();
		if ($pos >= $total_pages) $pos = 0;
		
		$limit 		= " LIMIT ".self::getOffset($pos).",".self::getLimit(); 
		$sql_paged 	= str_replace(array('[SELECTOR]',"[LIMIT]"),array($selector,$limit),$sql);
		
		$record_atom_view = intval($settings['RAW']['wz_RECORD_VIEW_A_ID']);
		if ($record_atom_view == 0) die('ATOM-VIEW INVALID');
		
		
		$pager_a_id = intval(xredaktor_forms::getAtomIdByGuiType('pager'));
		if ($pager_a_id == 0)
		{
			die("PAGER A-ID");
		} 
		
		$buttons = array();
		for ($i=0;$i<$total_pages;$i++)
		{
			$buttons[] = $i;
		}
		
		$prev 	= $pos-1;
		$next	= $pos+1;
		
		if ($prev<0) 	$prev = $total_pages-1;
		if ($next>=$total_pages) $next = 0;
		
		
		$params = array('rel_id'=>$as_id,'rel_f_id'=>$rel_f_id,'rel_fas_id'=>$fas_id);
		$params['token'] = self::tokenize($params);
		
		
		$html = xredaktor_render::renderSoloAtom($pager_a_id,array(
		'div_id'			=> md5($as_id.'_'.$rel_f_id),
		'params'			=> json_encode($params),
		'next'				=> $next,
		'prev'				=> $prev,
		'pos'				=> $pos,
		'buttons'			=> $buttons,
		'record_atom_view' 	=> $record_atom_view,
		'records'			=> dbx::queryAll($sql_paged), 
		'limits'			=> self::getLimitConfig(),
		'cnt'				=> self::getLimit(),
		'pager'				=> 'xr/page',
		'rel_f_id'			=> $rel_f_id
		));
		
		return $html;
	}
	
	private static function tokenize($array)
	{
		return md5(Ixcore::formsKey . json_encode($array));
	}

	public static function page_via_ajax()
	{
		
		$rel_f_id 	= 0;
		$rel_id 	= 0;
		$fas_id 	= 0;
		$token 		= '';
		
		$input = self::pi(array(
		'i'	=> array(
		'rel_f_id'		=> &$rel_f_id,
		'rel_id' 		=> &$rel_id,
		'rel_fas_id' 	=> &$fas_id,
		),
		's' => array('token'=>&$token)
		));

		$params = array('rel_id'=>$rel_id,'rel_f_id'=>$rel_f_id,'rel_fas_id'=>$fas_id);
		if ($token != self::tokenize($params))
		{
			die("INVALID TOKEN: $token");			
		}
		
		
		$html = self::render($params);
		frontcontrollerx::json_success(array('html'=>$html));
	}

	public static function more_via_ajax()
	{
		die(':-)');
	}

}
