<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_lessWrapper($params, &$template)
{
		if (!templatex::arePluginsEnabled()) return false;
	return xredaktor_assets::wrapper_less($params);
}

