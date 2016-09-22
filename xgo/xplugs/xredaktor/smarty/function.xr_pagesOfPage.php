<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_pagesOfPage($params, &$template)
{
		if (!templatex::arePluginsEnabled()) return false;

	if (!is_numeric($params['p_id']))
	{
		$p_id = $template->get_template_vars('P_ID');
	} else
	{
		$p_id = $params['p_id'];
	}

	$pages = xredaktor_pages::getPagesOfPage($p_id);

	if ($pages === false) return array();

	if (isset($params['var']))
	{
		$template->assign($params['var'],$pages);
	}

	return false;
}
