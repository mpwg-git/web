<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_wz_fetch($params, &$template)
{
	if (!templatex::arePluginsEnabled()) return false;

	// FLY = 1

	$filter = $params;
	unset($filter['r_id']);
	unset($filter['id']);
	unset($filter['var']);
	unset($filter['fly']);
	unset($filter['order']);
	unset($filter['limit']);

	$records = array();

	if (!is_numeric($params['id']))
	{
		return 'xr_wz_fetch wird falsch aufgerufen...';
	}

	$id = $params['id'];
	$tableName 	= xredaktor_wizards::genWizardTableNameBy_a_id($id);

	if (is_numeric($params['r_id']))
	{
		$rid = $params['r_id'];


		if (!isset($filter['wz_del'])) 		$filter['wz_del'] = "N";
		if (!isset($filter['wz_online'])) 	$filter['wz_online'] = "Y";



		$sql_extra = "";

		if (count($filter)>0)
		{
			/*
			REINI BEKOMMT ! als OR
			*/

			$sql_filter = array();
			foreach ($filter as $k => $v)
			{
				$k = dbx::escape($k);
				$v = dbx::escape($v);

				$sql_filter[] = " `$k` = '$v' ";
			}

			$sql_extra = " AND ".implode(" AND ",$sql_filter);
		}


		//$records = dbx::query("select * from $tableName where 1 AND wz_id = $rid and wz_online = 'Y' and wz_del = 'N' order by wz_sort ASC");
		$records = dbx::query("select * from $tableName where 1 AND wz_id = $rid $sql_extra order by wz_sort ASC",true,false);
		$records = xredaktor_wizards::mapLanguageFieldsToNormFields($id,$records);

	} else
	{
		$sql_extra = "";
		$sql_filter = array();

		if (!isset($filter['wz_del'])) 		$filter['wz_del'] = "N";
		if (!isset($filter['wz_online'])) 	$filter['wz_online'] = "Y";

		if (count($filter)>0)
		{
			$sql_filter = array();
			foreach ($filter as $k => $v)
			{
				$k = dbx::escape($k);
				if (strpos($v,",") !== false)
				{
					$sql_filter[] = " `$k` IN ('$v') ";
				} else
				{
					$v = dbx::escape($v);

					if (is_numeric($v))
					{
						$sql_filter[] = " `$k` = '$v' ";
					} else
					{

						$numberEq = str_replace(array('>','=','<','!','!=','ASC','DESC'),array('','','','','','',''),strtolower($v));

						if (is_numeric($numberEq))
						{
							$sql_filter[] = " `$k` '$v' ";
						} else
						{
							$sql_filter[] = " `$k` = '$v' ";
						}
					}
				}
			}
			$sql_extra = " AND ".implode(" AND ",$sql_filter);
		}

		$sql = "select * from $tableName where 1 $sql_extra ";

		if (!isset($params['order']))
		{
			$sql .= " order by wz_sort ASC ";
		} else
		{
			$sql .= " order by ".$params['order'];
		}

		if (isset($params['limit']))
		{
			if (is_numeric($params['limit']))
			{
				$sql .= " LIMIT ".$params['limit'];
			}
		}

		$records = dbx::queryAll($sql,true,false);
		$records = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti($id,$records);
	}

	if ($records === false) $records = array();

	if (isset($params['var']))
	{
		$template->assign($params['var'],$records);
	}
}

