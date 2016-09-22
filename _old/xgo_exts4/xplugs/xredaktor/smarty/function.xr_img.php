<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_img($params, &$template)
{
	if (xredaktor_core::isCodeTesting()) return false;
		
	$ret = xredaktor_storage::xr_img2($params,true);
	if ($ret === false) return false;

	if (isset($params['var']))
	{
		$template->assign($params['var'],$ret);
	}


	if ($template === false) return $ret;

	return false;
}

