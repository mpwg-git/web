<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_menuGrid($params, &$template)
{
		if (!templatex::arePluginsEnabled()) return false;
	
	$cacheKey = "smarty_function_xr_menuGrid_".md5(serialize($params)); 
	if (xredaktor_render::useCache())
	{
		$cached = memcachex::get($cacheKey);
		if ($cached !== false)
		{
			$var  = $params['var'];
			$template->assign($var,$cached);
			return ;
		}
	}
	
	//$momentId = timex::logMoment_start('xr_menuGrid',print_r($params,true));
	
	$p_id 	= intval($params['p_id']);
	$P_ID 	= intval($params['P_ID']);
	$depth 	= intval($params['depth']);

	$del 	= isset($params['del']) 	? intval($params['del']) 	: 0;
	$menu	= isset($params['menu']) 	? intval($params['menu']) 	: 0;
	$online = isset($params['online'])  ? intval($params['online']) : 0;

	if ($_REQUEST['xr_menu']==1)
	{
		echo "[[$menu]]";
	}

	$var  = $params['var'];
	$data = xredaktor_pages::getChildrenOfPId($p_id,$del,$menu,$online,$P_ID);

	$hasChildren_2 	= false;

	foreach ($data as $i=>$d)
	{

		$data[$i]['depth'] 			= 2;
		$data[$i]['children_show'] 	= false;
		$children = xredaktor_pages::getChildrenOfPId($data[$i]['p_id'],$del,$menu,$online,$P_ID);
		$data[$i]['children'] 		= $children;

		if ($data[$i]['p_id'] == $P_ID)
		{
			$hasChildren_2 = (count($data[$i]['children']) > 0);
			$data[$i]['children_show'] = true;
		}


		foreach ($data[$i]['children'] as $u => $d2)
		{
			if ($d2['iAmAParent'] == 'Y')
			{
				$data[$i]['children_show'] = true;
				$hasChildren_2 = true;
				$data[$i]['children'][$u]['depth'] = 3;
				$data[$i]['children'][$u]['children'] = xredaktor_pages::getChildrenOfPId($d2['p_id'],$del,$menu,$online,$P_ID);
			}
		}
	}

	if (!$hasChildren_2)
	{
		foreach ($data as $i=>$d)
		{
			$data[$i]['children_show'] = (count($data[$i]['children'])>0);
		}
	}


	/*echo "<div align='left'><pre>";
	print_r($data);
	echo "</pre></div>";*/

	//timex::logMoment_end($momentId);
	memcachex::set($cacheKey,$data);

	$template->assign($var,$data);
}
