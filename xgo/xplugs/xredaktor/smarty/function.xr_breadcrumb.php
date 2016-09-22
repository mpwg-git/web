<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_breadcrumb($params, &$template)
{
			if (!templatex::arePluginsEnabled()) return false;
	
	$p_id = intval($params['p_id']);
	$var  = $params['var'];
	$data = xredaktor_pages::getCrumbTree($p_id);
	
	$del 	= isset($params['del']) 	? intval($params['del']) 	: 0;
	$menue	= isset($params['menue']) 	? intval($params['menue']) 	: 0;
	$online = isset($params['online'])  ? intval($params['online']) : 0;
	
	$template->assign($var,$data);
}
