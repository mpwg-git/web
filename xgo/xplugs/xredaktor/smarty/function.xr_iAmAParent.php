<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_iAmAParent($params, &$template)
{
		if (!templatex::arePluginsEnabled()) return false;

	$p_id = intval($params['p_id']);
	$f_id = intval($params['f_id']);

	$var  = $params['var'];

	$del 	= isset($params['del']) 	? intval($params['del']) 	: 0;
	$menu	= isset($params['menu']) 	? intval($params['menu']) 	: 1;
	$online = isset($params['online'])  ? intval($params['online']) : 0;

	$data = xredaktor_pages::iAmAParent($p_id,$f_id,$del,$menu,$online);

	$template->assign($var,$data);
}

