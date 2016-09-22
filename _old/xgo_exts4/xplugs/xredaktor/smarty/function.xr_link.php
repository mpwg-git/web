<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_link($params, &$template)
{
	if (xredaktor_core::isCodeTesting()) return false;

	if (is_array($params['val']))
	{
		$settings = $params['val'];
		$ret = array(
		'target' 	=> $settings['target'],
		'title' 	=> $settings['title']
		);
		if ($settings['type']=='external')
		{
			$ret['url'] = $settings['external'];
		} else
		{
			if (!is_numeric($settings['internal'])) $settings['internal'] = 1;

			$cfg = array(
			'p_id' => $settings['internal'],
			'lang' => xredaktor_pages::getFrontEndLang()
			);

			$ret['url'] = xredaktor_niceurl::genUrl($cfg);
		}
		if (isset($params['var']))
		{
			$template->assign($params['var'],$ret);
		}
	} else
	{
		if (isset($params['var']))
		{
			$template->assign($params['var'],false);
		} else
		{
			return "KEIN LINK OBJEKT GEFUNDEN";
		}
	}
}

