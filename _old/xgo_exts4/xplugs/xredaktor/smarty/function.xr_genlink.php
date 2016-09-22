<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_genlink($params, &$template)
{	
	if (xredaktor_core::isCodeTesting()) return false;
	
	if (!is_numeric($params['p_id'])) $params['p_id'] = $template->get_template_vars('P_ID');
	if (!is_numeric($params['p_id'])) return '';
	
	if (!isset($params['lang'])) $params['lang'] = xredaktor_pages::getFrontEndLang();
	return xredaktor_niceurl::genUrl($params);
}

