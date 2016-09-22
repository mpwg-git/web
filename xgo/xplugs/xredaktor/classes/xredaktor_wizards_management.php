<?

class xredaktor_wizards_management
{

	public static function hook_post_insert($id,$extFunctionsConfig)
	{
		$wz_id = intval($extFunctionsConfig['wizardID']);
		xredaktor_log::wz_insert($wz_id,$id);
		wzx::cache_build($wz_id,$id);
	}

	public static function hook_post_update($id,$newDataRecord,$oldDataRecord,$extFunctionsConfig)
	{
		$wz_id = intval($extFunctionsConfig['wizardID']);
		xredaktor_log::wz_update($wz_id,$id,$newDataRecord,$oldDataRecord);
		wzx::cache_build($wz_id,$id);
	}

	public static function hook_post_delete($id,$extFunctionsConfig)
	{
		$wz_id = intval($extFunctionsConfig['wizardID']);
		xredaktor_log::wz_delete($wz_id,$id);
		wzx::cache_del($wz_id,$id);
	}

	public static function hook_post_move($id,$current,$newDataRecordFather,$oldDataRecordFather,$oldRecordBackup,$extFunctionsConfig)
	{
		$wz_id = intval($extFunctionsConfig['wizardID']);
		xredaktor_log::wz_move($wz_id,$id,$current,$oldRecordBackup);
		wzx::cache_build($wz_id,$id);
	}

	public static function hook_post_sort($id,$extFunctionsConfig,$newSortPos,$oldSortPos)
	{
		$wz_id = intval($extFunctionsConfig['wizardID']);
		xredaktor_log::wz_sort($wz_id,$id,$newSortPos,$oldSortPos);
		wzx::cache_build($wz_id,$id);
	}

}