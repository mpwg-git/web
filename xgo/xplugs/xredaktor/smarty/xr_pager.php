<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_form($params, &$template)
{
	xredaktor_sanitize::smarty_class_call($template,$params,'xredaktor_forms::sc_genForm');
}

