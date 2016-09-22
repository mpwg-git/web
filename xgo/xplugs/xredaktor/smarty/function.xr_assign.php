<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_assign($params, &$template)
{
	if (!templatex::arePluginsEnabled()) return false;
	
	$var 	= $params['var'];
	$value 	= $params['value'];
	$set 	= $params['set'];
	
	$val 	= "";
	$sets 	= explode(",",$set);
	
	foreach ($sets as $s)
	{
		if (!isset($value[$s])) 
		{
			$val .= $s;
			continue;
		}
		$val .= $value[$s];
	}
	
	if (isset($params['var']))
	{
		$template->assign($params['var'],$val);
	}

	return false;
}


