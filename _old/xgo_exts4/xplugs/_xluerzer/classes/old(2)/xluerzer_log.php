<?

class xluerzer_log
{


	public static function pushLog($al_action,$table,$pid,$id,$oldData=false)
	{
		$al_mods = array();

		if ($oldData !== false)
		{
			$newData = dbx::query("select * from $table where $pid = $id");
			foreach ($oldData as $attrib => $old)
			{
				$new = $newData[$attrib];
				if ($new != $old)
				{
					$al_mods[$attrib] = array('old'=>$old,'new'=>$new);
				}
			}
		}

		$db = array(
		'al_action' 			=> $al_action,
		'al_ip' 				=> libx::getIp(),
		'al_host' 				=> libx::getHost(),
		'al_table' 				=> $table,
		'al_table_pid' 			=> $pid,
		'al_record_id' 			=> $id,
		'al_backend_user_id' 	=> xluerzer::getCurrentUserId(),
		'al_created_ts' 		=> 'NOW()',
		'al_modified_ts' 		=> 'NOW()',
		'al_created_by' 		=> xluerzer::getCurrentUserId(),
		'al_modified_by' 		=> xluerzer::getCurrentUserId(),
		'al_mods'				=> json_encode($al_mods)
		);
		
		dbx::insert('a_log',$db);
	}

	public static function update($table,$pid,$id,$oldDataRecord)
	{
		self::pushLog('UPDATE',$table,$pid,$id,$oldDataRecord);
	}

	public static function insert($table,$pid,$id)
	{
		self::pushLog('INSERT',$table,$pid,$id);
	}

	public static function delete($table,$pid,$id)
	{
		self::pushLog('DELETE',$table,$pid,$id);
	}

	public static function postHook_insert($idx,$extFunctionsConfig)
	{
		$table 	= $extFunctionsConfig['table'];
		$pid 	= $extFunctionsConfig['pid'];
		self::insert($table,$pid,$idx);
	}

	public static function postHook_update($idx,$newDataRecord,$oldDataRecord,$extFunctionsConfig)
	{
		$table 	= $extFunctionsConfig['table'];
		$pid 	= $extFunctionsConfig['pid'];
		self::update($table,$pid,$idx,$newDataRecord,$oldDataRecord);
	}

	public static function postHook_remove($idx,$extFunctionsConfig)
	{
		$table 	= $extFunctionsConfig['table'];
		$pid 	= $extFunctionsConfig['pid'];
		self::delete($table,$pid,$idx);
	}

	public static function postHook_move($idx, $record, $newFatherRecord, $oldFatherRecord, $extFunctionsConfig)
	{
		$table 	= $extFunctionsConfig['table'];
		$pid 	= $extFunctionsConfig['pid'];
		self::update($table,$pid,$idx,$record);
	}


}
