<?
require_once(dirname(__FILE__).'/../_includes.php');


function smarty_function_xr_siteCall($params, &$template)
{
	if (xredaktor_core::isCodeTesting()) return;
	
	$siteInclude = dirname(__FILE__).'/../../../../xsite/_includes.php';
	if (!is_file($siteInclude)) return "/xsite/_includes.php existiert nicht.";
	require_once($siteInclude);
	$fn 	= $params['fn'];
	$cfg 	= array('params'=>$params,'template'=>&$template);
	if (is_callable($fn)) {
		$ret = call_user_func_array($fn,$cfg);
		if (isset($params['var']))
		{
			$template->assign($params['var'],$ret);
			return false;
		} else 
		{
			return $ret;
		}
	}
	else return "Funktion kann nicht ausgeführt werden ...";
}

