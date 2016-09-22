<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_wzCfg($params, &$template)
{
	
	if (xredaktor_core::isCodeTesting()) return;
	
	if (!is_numeric($params['w_id'])) {
		return "ACHTUNG: w_id ist nicht angegeben...";
	}

	$recordSettings = array();
	$w_id = $params['w_id'];



	$lang 			= strtoupper(xredaktor_pages::getFrontEndLang());
	$langFailOver 	= xredaktor_pages::getLangFailOverOrder();


	$fields = dbx::queryAll("SELECT * FROM  `atoms_settings` WHERE  `as_a_id` = $w_id and as_type IN ('COMBO','CHECKBOX') and as_del = 'N'");
	foreach ($fields as $f)
	{
		$as_id 		= $f['as_id'];
		$as_name 	= $f['as_name'];
		$as_type 	= $f['as_type'];

		$as_config	= json_decode($f['as_config'],true);
		if (!is_array($as_config)) $as_config = array();

		$mapped_a = array();
		$mapped_l = array();

		foreach ($as_config['l'] as $t)
		{
			$k = $t['v'];
			$v = trim($t[$lang]);

			if ($v == "")
			{
				foreach ($langFailOver as $flang)
				{
					$flang = strtoupper($flang);
					$v = trim($t[$flang]);
					if ($v != "") break;
				}
				if ($v == "") $v = $t['g'];
				if ($v == "") $v = $t['v'];
			}

			$mapped_l[] = array('k'=>$k,'v'=>$v);
			$mapped_a[$k] = $v;
		}

		$as_config	= array('as_type'=>$as_type,'as_config'=>$as_config,'mapped_l'=>$mapped_l,'mapped_a'=>$mapped_a);
		$recordSettings[$as_id] = $as_config;
		$recordSettings[$as_name] = $as_config;
	}
	
	$template->assign($params['var'],$recordSettings);
}

