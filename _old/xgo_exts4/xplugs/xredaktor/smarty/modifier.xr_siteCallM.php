<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_modifier_xr_siteCallM($fn,$param_0,$param_1,$param_2,$param_3)
{
	
	if (xredaktor_core::isCodeTesting()) return;
	
	$siteInclude = dirname(__FILE__).'/../../../../core/_includes.php';
	if (!is_file($siteInclude)) return "/core/_includes.php existiert nicht.";
	require_once($siteInclude);

	echo $fn;
	
	if (is_callable($fn)) {
		try{
			$ret = call_user_func_array($fn,$param_0);
		} catch (Exception $e)
		{
			echo "Exception".$e->getMessage();
		}
		echo "[$ret]";
		return $ret;
	} else
	{
		echo "Funktion $fn existiert nicht...";
	}
	return false;
}

