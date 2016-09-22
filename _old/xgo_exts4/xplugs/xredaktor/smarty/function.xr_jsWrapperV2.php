<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_jsWrapperV2($params, &$template)
{
	if (xredaktor_core::isCodeTesting()) return false;
	return xredaktor_assets::wrapper_js($params);
}

