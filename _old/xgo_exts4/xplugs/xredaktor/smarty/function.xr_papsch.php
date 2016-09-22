<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_papsch($params, &$template)
{
	if (xredaktor_core::isCodeTesting()) return false;
	
	if (!is_numeric($params['p_id']))
	{
		$p_id = $template->get_template_vars('P_ID');
	} else 
	{
		$p_id = $params['p_id'];
	}

	$page = xredaktor_pages::getPapsch($p_id);
	if ($page === false) return "";

	$val 		= $page['p_name'];
	$postfix 	= $params['postfix'];
	$prefix 	= $params['prefix'];
	
	return $prefix.$val.$postfix;
}
