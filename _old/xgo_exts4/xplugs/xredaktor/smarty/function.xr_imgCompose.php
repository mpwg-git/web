<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_imgCompose($params, &$template)
{
	if (xredaktor_core::isCodeTesting()) return false;

	$jcfg = json_decode(libx::fixJsonSimple($params['jcfg']),true);

	if (!is_array($jcfg))
	{
		$error = "";
		/*switch(json_last_error())
		{
		case JSON_ERROR_DEPTH:
		$error = 'jcfg ERROR - Maximale Stacktiefe überschritten';
		break;
		case JSON_ERROR_CTRL_CHAR:
		$error = 'jcfg ERROR - Unerwartetes Steuerzeichen gefunden';
		break;
		case JSON_ERROR_SYNTAX:
		$error =  'jcfg ERROR - Syntaxfehler, ungültiges JSON';
		break;
		case JSON_ERROR_NONE:
		$error = '';
		break;
		}*/
		$template->assign($params['var'],array('ERROR'=>'JCFG ERROR'));
		return $error;
	}

	if (!isset($jcfg['alt']))
	{

		if ((!isset($jcfg['fname'])) || (trim($jcfg['fname'])==""))
		{
			$template->assign($params['var'],array('ERROR'=>"fname ist nicht gesetzt ..."));
			return false;
		} else
		{
			$cacheDir 	= xredaktor_storage::getDirOfStorageScopeCache(1);
			$file_name	= $jcfg['fname'];
			$f_alts		= array();
			$alt		= "";
		}

	} else {

		$s_id = intval($jcfg['alt']);

		$f = xredaktor_storage::getById($s_id);
		if ($f === false) {
			$template->assign($params['var'],array('ERROR'=>"BILD $s_id exitsiert nicht..."));
			return false;
		}

		$cacheDir 	= xredaktor_storage::getDirOfStorageScopeCache(xredaktor_storage::getByIdStorageScope($s_id));
		$f_alts 	= json_decode($f['s_alts'],true);
		$file_name 	= $alt = $f_alts[frontcontrollerx::getCurrentLang()];

		if (trim($file_name)=="") $file_name = basename($f['s_onDisk']);
	}


	$jcfg['cacheDir'] 	= $cacheDir;
	$jcfg['file_name'] 	= $file_name;
	$fileOnDisk = xredaktor_storage::imageComposer($jcfg);

	list($width, $height, $type, $attr) = @getimagesize($fileOnDisk);

	$ret = array(
	'url' 	=> substr($fileOnDisk,strlen(Ixcore::htdocsRoot)),
	'src' 	=> substr($fileOnDisk,strlen(Ixcore::htdocsRoot)),
	'rw' 	=> $width,
	'rh' 	=> $height,
	'lang'	=> frontcontrollerx::getCurrentLang(),
	'alts'  => $f_alts,
	'alt'	=> $alt,
	);


	if (Icloud::REVERSE_ORIGIN_ENABLED)
	{
		$url = $ret['src'];
		$url = Icloud::REVERSE_ORIGIN . $url;

		$ret['src'] = $url;
		$ret['url'] = $url;
	}

	if (isset($params['var']))
	{
		$template->assign($params['var'],$ret);
	}
}

