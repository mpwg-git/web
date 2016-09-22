<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_jsWrapper($params, &$template)
{
	if (xredaktor_core::isCodeTesting()) return false;

	$d_id 	= intval($params['d_id']);

	if ($d_id > 0)
	{
		$files = dbx::queryAll("select * from storage where s_fid = $d_id and s_del='N'");

		$ret = "";
		foreach ($files as $f)
		{
			$file = xredaktor_storage::xr_file(array('s_id'=>$f['s_id']));
			$src 	= $file['url'];
			$ret[] 	= "<script src=\"$src\" type=\"text/javascript\"></script>";
		}
		return implode("\n",$ret);
		
	} else {
		$s_id 	= intval($params['s_id']); // '' oder 0
		if ($s_id == 0) return "";
		$imgCfg = xredaktor_storage::xr_file($params);
		$src 	= $imgCfg['url'];
		return "<script src=\"$src\" type=\"text/javascript\"></script>";
	}


}

