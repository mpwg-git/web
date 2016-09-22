<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_imgWrapper($params, &$template)
{
		if (!templatex::arePluginsEnabled()) return false;
		
	$s_id 	= intval($params['s_id']); // '' oder 0
	if ($s_id == 0) return "";
 
	
	$imgCfg = xredaktor_storage::xr_img2($params,true);

	unset($params['s_id']);
	unset($params['ext']);
	unset($params['rmode']);
	unset($params['var']);
	unset($params['w']);
	unset($params['h']);
	unset($params['q']);
	unset($params['colorspace']);
	unset($params['cloud']);
	unset($params['showgififgif']);

	$params['src'] 		= $imgCfg['src'];
	$params['width'] 	= $imgCfg['rw'];
	$params['height']	= $imgCfg['rh'];
	$params['alt']		= $imgCfg['alt'];

	if (!isset($params['border'])) {
		$params['border']	= 0;
	}

	
	$tag = "<img ";
	
	foreach ($params as $k => $v)
	{
		$tag .= ' '.$k.'='.'"'.$v.'"'.' ';
	}
	
	$tag .= " />";
	
	
	return $tag;
}

