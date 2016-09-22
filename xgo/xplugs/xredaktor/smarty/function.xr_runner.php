<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_runner($params, &$template)
{

	if (!templatex::arePluginsEnabled()) return false;
	
	global $_XR_RUNNERS;

	if (!isset($params['id'])) 				$params['id'] 	= 'DEFAULT';
	if (!isset($params['segs'])) 			$params['segs'] = 2;

	$id		= $params['id'];
	$segs 	= $params['segs'];

	if (!isset($_XR_RUNNERS[$id])) $_XR_RUNNERS[$id] = 0;
	$_XR_RUNNERS[$id]++;

	$ret = $_XR_RUNNERS[$id]%$segs;

	$template->assign($params['var'],$ret);
}
