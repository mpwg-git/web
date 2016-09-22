<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_wzActionInvisibleCaptcha()
{
	if (!templatex::arePluginsEnabled()) return false;
	return xredaktor_wizards::processFrontEndFormSecurity();
}