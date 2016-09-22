<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_wzUpdate($params, &$template)
{
	
	if (!templatex::arePluginsEnabled()) return false;
	
	
	if (!is_numeric($params['w_id'])) {
		return "ACHTUNG: w_id ist nicht angegeben...";
	}
	$newRecord = xredaktor_wizards::processFrontEndFormUpdate($params);
	$template->assign($params['var'],$newRecord);
}

