<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_translate($params, &$template)
{

	if (!templatex::arePluginsEnabled()) return false;

	global $currentSiteId;
	if (!isset($params['lang'])) $params['lang'] = xredaktor_pages::getFrontEndLang();

	if (!is_numeric($currentSiteId))
	{
		if (!is_numeric($params['p_id'])) $params['p_id'] = $template->get_template_vars('P_ID');
		if (!is_numeric($params['p_id'])) return $tag;

		if (!isset($params['lang'])) $params['lang'] = xredaktor_pages::getFrontEndLang();

		$lang  	= $params['lang'];
		$tag 	= $params['tag'];
		$p_id 	= intval($params['p_id']);


		$p = dbx::query("select * from pages where p_id = $p_id");
		if ($p === false) return $tag;

		$p_s_id = $p['p_s_id'];
	}
	else
	{
		$p_s_id = $currentSiteId;
		$lang  	= $params['lang'];
		$tag 	= $params['tag'];
	}

	return xredaktor_translate::doTranslate($tag,$lang,$p_s_id);
}

