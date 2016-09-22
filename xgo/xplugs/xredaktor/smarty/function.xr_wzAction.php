<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_wzAction($params, &$template)
{

	if (!templatex::arePluginsEnabled()) return false;

	if (!is_numeric($params['w_id'])) {
		return "ACHTUNG: w_id ist nicht angegeben...";
	}
	$newRecord = xredaktor_wizards::processFrontEndForm($params);
	$template->assign($params['var'],$newRecord);
}

