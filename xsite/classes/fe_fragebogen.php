<?

class fe_fragebogen
{
	
	
	public static function sc_get_fragen_count($params)
	{
		$countFragen = dbx::queryAttribute("select count(wz_id) as cnt from wizard_auto_961 where wz_del = 'N' and wz_online = 'Y'", "cnt");
		return intval($countFragen);
	}
	
	
	public static function sc_getAntworten()
	{
		
		$userId = intval(xredaktor_feUser::getUserId());
		
		if($userId === false || $userId < 0)
		{
			return false;
		}
		
		$res = dbx::queryAll("SELECT wz_FRAGEID, wz_DELTA, wz_SUPERWICHTIG FROM wizard_auto_1002 WHERE wz_USERID = $userId ORDER BY wz_id");
		
		return $res;
	}
	
	
	public static function sc_getAllFragen($type)
	{

		if($type === false || $type == '') {
			
			return false;
		}
		
		return self::getAllFragen($type);
	}
	
	
	public static function getAllFragen($type)
	{
		$fragen = array();
		
		$fragen = dbx::queryAll("SELECT * FROM wizard_auto_961 WHERE wz_del = 'N' AND wz_online = 'Y' ORDER BY wz_sort ASC");
		
		if($fragen === false || $type === false)
		{
			return array();
		}
		
		$return = array();
		
		foreach ($fragen as $k => $v) {
			$fid = intval($v['wz_id']);
			
			$options = dbx::queryAll("SELECT * FROM wizard_auto_962 WHERE wz_FRAGE_ID = $fid AND wz_del = 'N' AND wz_online = 'Y' ORDER BY wz_sort ASC");
			
			$options = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(962, $options);
			
			$return[] = array(
					'FRAGE' 	=> $v,
					'OPTIONS'	=> $options
			);
		}
		return $return;
	}
	
	
	
	public static function sc_getInitFragen()
	{
		$type = false;

		if(intval($_REQUEST['p_id'] == 47))
		{
			$type = 'suche';
		}

		if(intval($_REQUEST['p_id'] == 48))
		{
			$type = 'biete';
		}

		return self::getInitFragen($type);
	}
	public static function getInitFragen($type)
	{
		$fragen = array();

		$fragen = dbx::queryAll("SELECT * FROM wizard_auto_961 WHERE wz_del = 'N' AND wz_online = 'Y' AND wz_INIT_FRAGE = 'Y' ORDER BY wz_sort ASC");

		if($fragen === false || $type === false)
		{
			return array();
		}

		$return = array();

		foreach ($fragen as $k => $v) {
		    $fid = intval($v['wz_id']);

		    $options = dbx::queryAll("SELECT * FROM wizard_auto_962 WHERE wz_FRAGE_ID = $fid AND wz_del = 'N' AND wz_online = 'Y' ORDER BY wz_sort ASC");

		    $options = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(962, $options);

		    $return[] = array(
		        'FRAGE' 	=> $v,
		        'OPTIONS'	=> $options
		    );
		}
		return $return;
	}


	public static function ajax_collectAnswer()
	{		
		$collection 		= $_REQUEST['collection'];
		$userId				= intval(xredaktor_feUser::getUserId());

		if($collection !== false && is_Array($collection))
		{
			foreach ($collection as $k => $v) {
				
				if($userId > 0)
				{
					$wz_FRAGEID 	 = intval($v['id']);
					$wz_USERID 		 = intval($userId);
					$wz_DELTA 		 = intval($v['delta']);
					$wz_SUPERWICHTIG = intval($v['superwichtig']);
					
					$check = dbx::query("SELECT * FROM wizard_auto_1002 WHERE wz_FRAGEID = $wz_FRAGEID AND wz_USERID = $wz_USERID");
					
					if($check == false)
					{
						dbx::query("INSERT INTO wizard_auto_1002 (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $wz_USERID, $wz_DELTA, $wz_SUPERWICHTIG)");
					}
					else
					{
						$wz_id = intval($check['wz_id']);
						
						dbx::query("UPDATE `wizard_auto_1002` SET `wz_FRAGEID` = '$wz_FRAGEID',`wz_USERID` = '$wz_USERID',`wz_DELTA` = '$wz_DELTA',`wz_SUPERWICHTIG` = '$wz_SUPERWICHTIG' WHERE `wz_id` = '$wz_id'");
					}
				}
			}
			
			return true;
		}
		else 
		{
			return false;
		}
		
	}
}


