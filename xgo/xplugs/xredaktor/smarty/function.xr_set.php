<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_set($params, &$template)
{
	if (!templatex::arePluginsEnabled()) return false;

	if (!isset($params['override'])) $params['override'] = 0;
	$overRideIfPresent = ($params['override']=='1');

	$p_id = $template->get_template_vars('P_ID');

	foreach ($params as $k => $v)
	{
		if (in_array($k,array('override'))) continue;
		xredaktor_render::setRunningValue($p_id,$k,$v);
	}
}

