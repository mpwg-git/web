<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_getSiteSettingsById($params, &$template)
{
			if (!templatex::arePluginsEnabled()) return false;
		
	$s_id = $params['s_id'];
	
	if (!is_numeric($s_id))
	{
		return false;
	} 
	
	$settings = xredaktor_niceurl::getSiteConfigById($s_id);

	if (isset($params['var']))
	{
		$template->assign($params['var'],$settings);
	}

	return false;
}
