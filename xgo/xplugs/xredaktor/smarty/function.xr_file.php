<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_file($params, &$template)
{
		if (!templatex::arePluginsEnabled()) return false;
	
	$ret = xredaktor_storage::xr_file($params);
	if ($ret === false) return false;

	if (isset($params['var']))
	{
		$template->assign($params['var'],$ret);
	} else 
	{
		return $ret['url'];
	}

	if ($template === false) return $ret;
	return false;
	/*
	$s_id = intval($params['s_id']);
	
	$f = xredaktor_storage::getById($s_id);
	$f_alts = json_decode($f['s_alts'],true);
	$fileOnDisk = $f['s_onDisk'];

	
	$curLang 	= strtoupper(xredaktor_pages::getFrontEndLang());
	$f_alt		= trim($f_alts[$curLang]);
	
	if ($f_alt == "")
	{
		$failOverLangs = xredaktor_pages::getLangFailOverOrder();
		
		foreach ($failOverLangs as $curLang)
		{
			$curLang = strtoupper($curLang);
			$f_alt = trim($f_alts[$curLang]);
			if ($f_alt != "") break;
		}
	}
	
	$ret = array(
	'id' 	=> $s_id,
	'w' 	=> $f['s_media_w'],
	'h' 	=> $f['s_media_h'],
	'size'	=> $f['s_fileSizeBytes'],
	'hsize'	=> $f['s_fileSizeBytesHuman'],
	'mime'  => $f['s_mimeType'],
	'lang'	=> $curLang,
	'alts'  => $f_alts,
	'alt'	=> $f_alt,
	'url'	=> substr($fileOnDisk,strlen(Ixcore::htdocsRoot))
	);
	
	
	if (isset($params['var']))
	{
		$template->assign($params['var'],$ret);
	} else 
	{
		return $ret['url'];
	}

	return false;*/
}

