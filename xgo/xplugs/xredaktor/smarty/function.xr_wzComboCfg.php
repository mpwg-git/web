<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_wzComboCfg($params, &$template)
{
	
	if (!templatex::arePluginsEnabled()) return false;
	
	if (!is_numeric($params['id'])) {
		return "ACHTUNG: id ist nicht angegeben...";
	}

	$id = $params['id'];
	$cfg = array(
	'l'=>array(),
	'a'=>array());

	$as = dbx::query("select * from atoms_settings where as_id = $id and as_del = 'N' and (as_type = 'COMBO' OR as_type = 'RADIO' or as_type='CHECKBOX')");
	if ($as === false) $cfg = false;
	else
	{
		$currentLang 	= strtoupper(xredaktor_pages::getFrontEndLang());
		$failOverLangs 	= xredaktor_pages::getLangFailOverOrder();

		$as_config 		= json_decode($as['as_config'],true);
		$linearSorted 	= $as_config['l'];

		foreach ($linearSorted as $pack)
		{

			$tmp = array();
			$key = $pack['v'];
			$tmp['k'] = $key;
			$value = $pack[$currentLang];

			if (trim($value)=="")
			{
				$found = false;
				foreach ($failOverLangs as $lang)
				{
					$lang 	= strtoupper($lang);
					$value 	= $pack[$lang];
					if (trim($value)!="")
					{
						$found=true;
						break;
					}
				}
				if (!$found) {
					$value = $pack['g'];
				}
			}

			$tmp['v'] = $value;
			$cfg['l'][] = $tmp;
			$cfg['a'][$key] = $value;

		}

	}
	
	$template->assign($params['var'],$cfg);
}

