<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_cssWrapper($params, &$template)
{
		if (!templatex::arePluginsEnabled()) return false;

	$s_id 	= intval($params['s_id']); // '' oder 0
	if ($s_id == 0) return "";
	$imgCfg = xredaktor_storage::xr_file($params);
	$src 	= $imgCfg['url'];
	return "<link rel=\"stylesheet\" type=\"text/css\" href=\"$src\" />";
}

