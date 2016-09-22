<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_changeLang($params, &$template)
{
	if (!templatex::arePluginsEnabled()) return false;
	
	
	if (!isset($params['lang'])) $params['lang'] = xredaktor_pages::getFrontEndLang();
	if (!is_numeric($params['p_id'])) $params['p_id'] = $template->get_template_vars('P_ID');
	if (!is_numeric($params['p_id'])) $params['p_id'] = 1;

	$p_id = $params['p_id'];
	$lang = $params['lang'];

	$request = $template->get_template_vars('REQUEST');




	if ((is_numeric($request['pnu_wz_w_id'])) && (is_numeric($request['pnu_wz_r_id'])) && (is_numeric($request['pnu_wz_c_id'])) && (is_numeric($request['pnu_wz_t_id'])))
	{
		$w_id = $request['pnu_wz_w_id'];
		$r_id = $request['pnu_wz_r_id'];
		$c_id = $request['pnu_wz_c_id'];
		$t_id = $request['pnu_wz_t_id'];

		return xredaktor_niceurl::genWizardUrl(array(
		'p_id' => $p_id,
		'lang' => $lang,
		'w_id' => $w_id,
		'r_id' => $r_id,
		'c_id' => $c_id,
		't_id' => $t_id
		));
	} else
	{

		$niceUrlSettings = xredaktor_niceurl::getCurrentNiceUrlVars();
		if (is_array($niceUrlSettings))
		{
			$params = array_merge($niceUrlSettings,$params);
		}
	}

	/*

	if (libx::isDeveloper())
	{

	} else
	{
	if ((is_numeric($request['pnu_wz_w_id'])) || (is_numeric($request['pnu_wz_r_id'])) || (is_numeric($request['pnu_wz_c_id'])) || (is_numeric($request['pnu_wz_t_id'])))
	{
	$w_id = $request['pnu_wz_w_id'];
	$r_id = $request['pnu_wz_r_id'];
	$c_id = $request['pnu_wz_c_id'];
	$t_id = $request['pnu_wz_t_id'];

	return xredaktor_niceurl::genWizardUrl(array(
	'p_id' => $p_id,
	'lang' => $lang,
	'w_id' => $w_id,
	'r_id' => $r_id,
	'c_id' => $c_id,
	't_id' => $t_id
	));
	}
	}

	*/

	return xredaktor_niceurl::genUrl($params);
}

