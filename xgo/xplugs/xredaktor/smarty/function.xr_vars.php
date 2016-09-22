<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_vars($params, &$template)
{

	if (!templatex::arePluginsEnabled()) return false;

	$name 	= $params['name'];
	$val 	= $params['val'];
	$mode	= strtolower($params['mode']);
	$action	= strtolower($params['action']);

	switch ($action)
	{
		case 'set':
			switch ($mode)
			{
				case 'session':
					@session_start();
					$_SESSION[$name] = $val;
					break;
				case 'cookie':
					header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"'); // IE IFRAME BUG
					setcookie($name, $val, time()+3600*24*1000);
					$_COOKIE[$name] = $val;
					break;
				default: break;
			}
			break;
		case 'del':
			switch ($mode)
			{
				case 'session':
					@session_start();
					unset($_SESSION[$name]);
					break;
				case 'cookie':
					header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"'); // IE IFRAME BUG
					setcookie($name,'', time()-3600);
					unset($_COOKIE[$name]);
					break;
				default: break;
			}
			break;
		case 'get':
			$ret = false;
			switch ($mode)
			{
				case 'session':
					@session_start();
					if (isset($_SESSION[$name])) 	$ret = $_SESSION[$name];
					break;
				case 'cookie':
					if (isset($_COOKIE[$name])) 	$ret = $_COOKIE[$name];
					break;
				default: break;
			}
			if (isset($params['var']))
			{

				if ($params['decode']=='json')
				{
					$ret = json_decode($ret,true);
				}

				/*if ($params['dateFields']!='')
				{
				list($lang,$fields) = explode("|",$params['dateFields']);
				$fields = explode(",",$fields);

				foreach ($fields as $f)
				{
				switch ($lang)
				{
				case '2en':

				if (strpos())
				$ret[$f] =


				break;
				case '2de':
				break;
				}

				}

				}*/

				$template->assign($params['var'],$ret);
			}
			break;
		default: break;
	}

	return false;
}


