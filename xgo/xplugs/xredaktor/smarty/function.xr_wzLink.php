<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_wzLink($params, &$template)
{
	
	if (!templatex::arePluginsEnabled()) return false;
	
	if (!is_numeric($params['p_id'])) 	$params['p_id'] = $template->get_template_vars('P_ID');
	if (!is_numeric($params['p_id'])) 	return '';
	
	if (!isset($params['lang'])) 		$params['lang'] = xredaktor_pages::getFrontEndLang();
	
	if ((!is_numeric($params['p_id'])) || (!is_numeric($params['w_id'])) || (!is_numeric($params['r_id'])) || (!is_numeric($params['c_id'])) || (!is_numeric($params['t_id'])))
	{
		echo "xr_wzLink wird falsch aufgerufen p_id,w_id,r_id,c_id,t_id müssen numerisch sein...";
		return "";
	}
	
	return xredaktor_niceurl::genWizardUrl($params);
}

