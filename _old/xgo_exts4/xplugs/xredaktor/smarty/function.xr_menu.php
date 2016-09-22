<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_menu($params, &$template)
{
	if (xredaktor_core::isCodeTesting()) return false;

	$p_id = intval($params['p_id']);
	$P_ID = intval($params['P_ID']);

	$del 	= isset($params['del']) 	? intval($params['del']) 	: 0;
	$menu	= isset($params['menu']) 	? intval($params['menu']) 	: 0;
	$online = isset($params['online'])  ? intval($params['online']) : 0;

	if ($_REQUEST['xr_menu']==1)
	{
		echo "[[$menu]]";
	}

	$var  = $params['var'];
	$data = xredaktor_pages::getChildrenOfPId($p_id,$del,$menu,$online,$P_ID);
	$template->assign($var,$data);
}
