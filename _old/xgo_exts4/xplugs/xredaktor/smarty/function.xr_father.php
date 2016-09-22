<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_father($params, &$template)
{
	if (xredaktor_core::isCodeTesting()) return false;
	
	if (!is_numeric($params['p_id'])) $params['p_id'] = $template->get_template_vars('P_ID');
	if (!is_numeric($params['p_id']))
	{
		$ret = array();
	} else
	{
		$p_id 	= $params['p_id'];
		$page 	= xredaktor_pages::getById($p_id);
		$p_fid  = $page['p_fid'];
		$ret 	= array('p_fid'=>$p_fid);
	}
	if (isset($params['var']))
	{
		$template->assign($params['var'],$ret);
	}
	return false;
}

