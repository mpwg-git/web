<?

require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_wzFilter($params, &$template)
{
	
	if (!templatex::arePluginsEnabled()) return false;
	
	if (!is_numeric($params['w_id'])) {
		return "ACHTUNG: w_id ist nicht angegeben...";
	}

	$ret 		= array();
	$records 	= array();

	// VARS DURCHSCHLEUSEN

	foreach ($params['fields'] as $f)
	{
		if (isset($_REQUEST[$f]))
		{
			$ret[$f] = $_REQUEST[$f];
		}
	}

	// DATEN FETCHEN

	$filter = $params;

	unset($filter['w_id']);
	unset($filter['var']);
	unset($filter['limit']);
	unset($filter['fields']);

	$w_id = $params['w_id'];
	$tableName 	= xredaktor_wizards::genWizardTableNameBy_a_id($w_id);


	$sql_extra 	= "";
	$sql_filter = array();



	foreach ($params['fields'] as $f)
	{

		if (isset($_REQUEST[$f]))
		{
			list($crap,$as_id) = explode("_",$f,2);
			if (is_numeric($as_id)) {
				$field 		= dbx::query("select * from atoms_settings where as_id = $as_id");

				switch ($field['as_type'])
				{
					case 'CHECKBOX':
						$as_name 	= "wz_".$field['as_name'];
						$val 		= intval($_REQUEST['wz_'.$as_id]);
						$as_name	= $as_name."_".$val;

						if (dbx::attributePresent($tableName,$as_name))
						{
							$sql_filter[] = " `$as_name` = 'on' ";
						}
						break;
					default:
						$as_name 	= "wz_".$field['as_name'];
						$val 		= intval($_REQUEST['wz_'.$as_id]);
						$sql_filter[] = " `$as_name` = '$val' ";
				}
			} else
			{

				list($field_v,$part) = explode("-",$f,2);

				if ((isset($_REQUEST[$field_v.'-m'])) && (isset($_REQUEST[$field_v.'-Y'])))
				{
					list($crap,$as_id) = explode("_",$field_v,2);
					$field 			= dbx::query("select * from atoms_settings where as_id = $as_id");
					$as_name 		= "wz_".$field['as_name'];
					$val_m 			= intval($_REQUEST[$field_v."-m"]);
					$val_Y 			= intval($_REQUEST[$field_v."-Y"]);
					$sql_filter[] 	= " DATE_FORMAT(`$as_name`,'%c.%Y') = '$val_m.$val_Y' ";
				}

				if ((isset($_REQUEST[$field_v.'-m'])) && !(isset($_REQUEST[$field_v.'-Y'])))
				{
					list($crap,$as_id) = explode("_",$field_v,2);
					$field 			= dbx::query("select * from atoms_settings where as_id = $as_id");
					$as_name 		= "wz_".$field['as_name'];
					$val_m 			= intval($_REQUEST[$field_v."-m"]);
					$sql_filter[] 	= " DATE_FORMAT(`$as_name`,'%c') = '$val_m' ";
				}

				if (!(isset($_REQUEST[$field_v.'-m'])) && (isset($_REQUEST[$field_v.'-Y'])))
				{
					list($crap,$as_id) = explode("_",$field_v,2);
					$field 			= dbx::query("select * from atoms_settings where as_id = $as_id");
					$as_name 		= "wz_".$field['as_name'];
					$val_Y 			= intval($_REQUEST[$field_v."-Y"]);
					$sql_filter[] 	= " DATE_FORMAT(`$as_name`,'%Y') = '$val_Y' ";
				}


			}

		}
	}

	if (count($filter)>0)
	{
		/*
		REINI BEKOMMT ! als OR
		*/


		foreach ($filter as $k => $v)
		{
			$k = dbx::escape($k);
			if (strpos($v,",") !== false)
			{
				$sql_filter[] = " `$k` IN ($v) ";
			} else
			{
				$v = dbx::escape($v);

				if (is_numeric($v))
				{
					$sql_filter[] = " `$k` = $v ";
				} else
				{

					$numberEq = str_replace(array('>','=','<','!','!=','ASC','DESC'),array('','','','','','',''),strtolower($v));

					if (is_numeric($numberEq))
					{
						$sql_filter[] = " `$k` $v ";
					} else
					{
						$sql_filter[] = " `$k` = '$v' ";
					}
				}
			}


		}
	}

	if (count($sql_filter)>0)
	{
		$sql_extra = " AND ".implode(" AND ",$sql_filter);
	}

	$sql = "select * from $tableName where 1 $sql_extra order by wz_sort ASC";

	if (isset($params['limit']))
	{
		if (is_numeric($params['limit']))
		{
			$sql .= " LIMIT ".$params['limit'];
		}
	}

	$records = dbx::queryAll($sql,true,false);
	$records = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti($w_id,$records);

	$template->assign($params['var'],$records);
	return json_encode($ret);
}

