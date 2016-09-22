<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_faUrl($params, &$template)
{
	if (xredaktor_core::isCodeTesting()) return false;
	
	$s_id 	= intval($params['s_id']); // '' oder 0
	if ($s_id == 0) return ""; 
	$imgCfg = xredaktor_storage::xr_file($params);
	return $imgCfg['url'];
}

