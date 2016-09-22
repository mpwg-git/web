<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_refer($params, &$template)
{
	
	if (xredaktor_core::isCodeTesting()) return false;

	
	$HTTP_REFERER 	= $_SERVER['HTTP_REFERER'];
	$HTTP_HOST		= $_SERVER['HTTP_HOST'];

	$pos = strpos($HTTP_REFERER,$HTTP_HOST);
	$data = false;
	
	if ($pos === false)
	{
		$data = false;
	} else
	{
		$url 	= substr($HTTP_REFERER,$pos+strlen($HTTP_HOST)+1);
		$data	= xredaktor_niceurl::cache_exists($url);
		//unset($data['pnu_settings_serialized']);
		//unset($data['pnu_settings_serialized']);
	}
	
	$template->assign($params['var'],$data);
	
}
