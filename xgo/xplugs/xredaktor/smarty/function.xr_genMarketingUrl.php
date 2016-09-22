<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_genMarketingUrl($params, &$template)
{
		if (!templatex::arePluginsEnabled()) return false;
	
	if (!isset($params['host']))		return '';
	if ((!isset($params['url'])) && (!isset($params['p_id'])))	return '';
	if (!isset($params['code'])) 		$params['code'] 	= "";
	if (!isset($params['userId'])) 		$params['userId'] 	= "";
	if (!isset($params['tracker'])) 	$params['tracker'] 	= "";
	if (!isset($params['lang'])) 		$params['lang'] = xredaktor_pages::getFrontEndLang();

	if (isset($params['p_id']))
	{
		$url2go = xredaktor_niceurl::genUrl(array('p_id'=>$params['p_id'],'lang'=>xredaktor_pages::getFrontEndLang()));
	} else
	{
		$url2go = $params['url'];
	}

	$package = array(
	'url' 		=> $url2go,
	'code' 		=> $params['code'],
	'userId' 	=> $params['userId'],
	'tracker' 	=> $params['tracker']
	);
	
	$secret 		= Ixredaktor::xMarketingSecret;
	$dataPackage 	= base64_encode(serialize($package));
	$checkSum 		= md5($dataPackage.$secret);
	$url 			= "$checkSum/$dataPackage";

	return $host.'/xMarketing/'.$url;
}

