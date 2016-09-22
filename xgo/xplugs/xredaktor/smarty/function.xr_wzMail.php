<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_wzMail($params, &$template)
{
	
	if (!templatex::arePluginsEnabled()) return false;
	
	if (!is_numeric($params['w_id'])) {
		//return "ACHTUNG: w_id ist nicht angegeben...";
	}
	$newRecord = xredaktor_wizards::mail($params,$template);
	$template->assign($params['var'],$newRecord);
}

