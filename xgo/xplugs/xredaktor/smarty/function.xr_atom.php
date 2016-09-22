<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_atom($params, &$template)
{
		if (!templatex::arePluginsEnabled()) return false;

	
	$a_id 	= intval($params['a_id']);
	$assign = $params;

	if ($_REQUEST['xr_debug']=='ATOM_PR_SHOW')
	{
		echo "[XXXXXXX $a_id START]\n";
	}

	unset($assign['a_id']);
	unset($assign['return']);
	unset($assign['var']);

	$assign = array_merge($assign,$template->getTemplateVars());
	$html 	= xredaktor_render::renderSoloAtom($a_id,$assign);

	

	
	if ($_REQUEST['xr_debug']=='ATOM_PR_SHOW')
	{
		echo "[XXXXXXX $a_id END (".strlen($html).")]\n";
	}
	
	if (isset($params['var']))
	{
		$template->assign($params['var'],$html);
	}

	if (isset($params['return']))
	{
		if ($params['return']==1)
		{
			return $html;
		}
	}

	return false;
}


