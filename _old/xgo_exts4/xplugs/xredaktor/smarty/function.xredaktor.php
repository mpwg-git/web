<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xredaktor($params, $template)
{
	return xredaktor_render::smartyTester();
}
