<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_rbreadcrumb($params, &$template)
{
	if (xredaktor_core::isCodeTesting()) return false;

		
	$p_id = intval($params['p_id']);
	$var  = $params['var'];

	$del 	= isset($params['del']) 	? intval($params['del']) 	: 0;
	$menue	= isset($params['menue']) 	? intval($params['menue']) 	: 0;
	$online = isset($params['online'])  ? intval($params['online']) : 0;

	$data = xredaktor_pages::getCrumbTreeReverse($p_id,$del,$menue,$online);


	if (isset($params['cutBeforePageID']))
	{
		$p_id_cut = $params['cutBeforePageID'];
		$dBackup = $data;
		$data = array();
		$copy = false;
		foreach ($dBackup as $d)
		{
			if ($d['p_id'] == $p_id_cut)
			{
				$copy = true;
			}
			if ($copy)
			{
				$data[] = $d;
			}
		}
	}
	
	$template->assign($var,$data);
}
