<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_feUser($params, &$template)
{	if (!templatex::arePluginsEnabled()) return false;
	return xredaktor_feUser::handleSmartyCall($params,$template);
}

