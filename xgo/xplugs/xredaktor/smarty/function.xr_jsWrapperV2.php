<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_jsWrapperV2($params, &$template)
{
		if (!templatex::arePluginsEnabled()) return false;
	return xredaktor_assets::wrapper_js($params);
}

