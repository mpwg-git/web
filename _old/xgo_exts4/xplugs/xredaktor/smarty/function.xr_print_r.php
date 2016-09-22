<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_print_r($params, &$template)
{
	if (xredaktor_core::isCodeTesting()) return false;

	$val = $params['val'];
	$ret = "<pre style='text-align:left;'>".print_r($val,true)."</pre>";
	return $ret;
}

