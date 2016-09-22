<?

class xluerzer
{

	public static function getCurrentUserId()
	{
		return xredaktor_core::getUserId();
	}


	public static function checkDefaultExtFunction($extFunctionsConfig)
	{

		if (!isset($extFunctionsConfig['db_prefix']) || (trim($extFunctionsConfig['db_prefix']) == "")) {
			die("CFG_WRONG: UPDATE db_prefix.");
		}

		if (!isset($extFunctionsConfig['fid'])) {
			$extFunctionsConfig['fid'] = $extFunctionsConfig['pid'];
		}

		if (!isset($extFunctionsConfig['sort'])) {
			$extFunctionsConfig['sort'] = $extFunctionsConfig['pid'];
		}

		if (!isset($extFunctionsConfig['name'])) {
			$extFunctionsConfig['name'] = $extFunctionsConfig['pid'];
		}


		if (!isset($extFunctionsConfig['extraInsert']) || (!is_array($extFunctionsConfig['extraInsert']))) {
			$extFunctionsConfig['extraInsert'] = array();
		}

		if (!isset($extFunctionsConfig['preSelect'])) {
			$extFunctionsConfig['preSelect'] = '';
		}

		$db_prefix = $extFunctionsConfig['db_prefix'];

		if ($extFunctionsConfig['db_prefix'] != 'wz_')
		{
			$extFunctionsConfig['preSelect'] .= ", (select abu_username from a_backend_user where abu_id = ".$db_prefix."created_by) as ".$db_prefix."created_by  , (select abu_username from a_backend_user where abu_id = ".$db_prefix."modified_by) as ".$db_prefix."modified_by";
		}

		$dayField 		= $db_prefix."day";
		$stateField 	= $db_prefix."state";
		
		if ((dbx::attributePresent($extFunctionsConfig['table'],$dayField)) && (dbx::attributePresent($extFunctionsConfig['table'],$stateField)))
		{
			$extFunctionsConfig['preSelect'] .= ", ((CURDATE() >= $dayField) AND ($dayField != '0000-00-00') AND ($stateField=1)) as ".$db_prefix."online";
		} else {
			$dayField = $db_prefix."date_start";
			if (dbx::attributePresent($extFunctionsConfig['table'],$dayField))
			{
				$extFunctionsConfig['preSelect'] .= ", (CURDATE() >= $dayField) as ".$db_prefix."online";
			}
		}

		$f_modified_ts 	= $db_prefix.'modified_ts';
		$f_modified_by 	= $db_prefix.'modified_by';
		$f_created_ts 	= $db_prefix.'created_ts';
		$f_created_by 	= $db_prefix.'created_by';

		$extFunctionsConfig['extraInsert'][$f_created_by] 	= self::getCurrentUserId();
		$extFunctionsConfig['extraInsert'][$f_modified_by] 	= self::getCurrentUserId();
		$extFunctionsConfig['extraInsert'][$f_created_ts] 	= "NOW()";
		$extFunctionsConfig['extraInsert'][$f_modified_ts] 	= "NOW()";

		if (!isset($extFunctionsConfig['update'])) $extFunctionsConfig['update'] = array();
		$extFunctionsConfig['update'] = array_merge($extFunctionsConfig['update'],array($f_created_by,$f_created_ts,$f_modified_by,$f_modified_ts));


		if ($_REQUEST['HELPME']==69)
		{
			$table 	= dbx::escape($extFunctionsConfig['table']);
			$fields = dbx::queryAll("SHOW COLUMNS FROM $table");

			foreach ($fields as $_f)
			{
				$f = $_f['Field'];
				echo "'$f',";
			}

			die();
		}

		if (!isset($extFunctionsConfig['postHooks']))
		{
			$extFunctionsConfig['postHooks'] = array(
			'insert'			=> 'xluerzer_log::postHook_insert',
			'move'				=> 'xluerzer_log::postHook_move',
			'update'			=> 'xluerzer_log::postHook_update',
			'remove'			=> 'xluerzer_log::postHook_remove',
			);
		}

		return $extFunctionsConfig;
	}

	public static function refreshFrontPageCache()
	{
		file_get_contents('http://www.luerzersarchive.net/en/start.html?DISABLE_FULL_CACHE');
	}


}