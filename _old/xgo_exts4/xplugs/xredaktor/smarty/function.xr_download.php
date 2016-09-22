<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_download($params, &$template)
{
	if (xredaktor_core::isCodeTesting()) return false;
	
	$params['mode'] = "DOWNLOAD";
	$ret = xredaktor_storage::download($params);

	if (isset($params['var']))
	{
		$template->assign($params['var'],$ret);
		return false;
	}
	return $ret['href'];
}

