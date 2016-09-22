<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_pageVars($params, &$template)
{
	if (xredaktor_core::isCodeTesting()) return false;

	if (!is_numeric($params['p_id'])) $params['p_id'] = $template->get_template_vars('P_ID');
	if (!is_numeric($params['p_id'])) return false;


	$mode = strtolower($params['mode']);
	$p_id = intval($params['p_id']);

	unset($params['mode']);
	unset($params['p_id']);

	switch ($mode)
	{
		case 'set':
			if (!is_array($params)) $params = array();
			$params_ser = serialize($params);
			dbx::update('pages',array('p_vars'=>$params_ser),array('p_id'=>$p_id));
			return false;
			break;

		case 'get':
			$params_ser = dbx::queryAttribute("select p_vars from pages where p_id = $p_id","p_vars");
			$paramsDb = unserialize($params_ser);
			if (!is_array($paramsDb)) $paramsDb = array();
			if (isset($params['var']))
			{
				$template->assign($params['var'],$paramsDb);
			}
			break;

		case 'get_vr':


			$HTTP_REFERER 	= $_SERVER['HTTP_REFERER'];
			$HTTP_HOST		= $_SERVER['HTTP_HOST'];

			$pos = strpos($HTTP_REFERER,$HTTP_HOST);
			$data = false;

			if ($pos === false)
			{
				$paramsDb = array();
			} else
			{
				$url 	= substr($HTTP_REFERER,$pos+strlen($HTTP_HOST)+1);
				$data	= xredaktor_niceurl::cache_exists($url);

				if (is_numeric($data['pnu_p_id']))
				{
					$p_id = $data['pnu_p_id'];
					$params_ser = dbx::queryAttribute("select p_vars from pages where p_id = $p_id","p_vars");
					$paramsDb 	= unserialize($params_ser);
					if (!is_array($paramsDb)) $paramsDb = array();
				}
			}

			if (isset($params['var']))
			{
				$template->assign($params['var'],$paramsDb);
			}
			break;
	}

}
