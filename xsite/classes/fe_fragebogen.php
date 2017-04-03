<?

class fe_fragebogen
{
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

		$fragen = dbx::queryAll("SELECT * FROM wizard_auto_961 WHERE wz_del = 'N' AND wz_online = 'Y' AND wz_INIT_FRAGE = 'Y' ORDER BY wz_sort ASC Limit 3");

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
		$fragenId			= intval($_REQUEST['collection']['id']);
		$delta				= intval($_REQUEST['collection']['delta']);
		$superwichtig		= intval($_REQUEST['collection']['superwichtig']);
		
		print_r($collection);
		die();
				
		foreach($collection as $k => $v) {
			
			$update = array (
				'wz_USERID'				=> $userId,
				'wz_FRAGEID'			=> $v['id'], 
				'wz_DELTA'				=> $v['delta'],
				'wz_SUPERWICHTIG'		=> $v['superwichtig']
			);
			echo $k;
			echo $v;

			$present = dbx::query("select * from wizard_auto_1002 where wz_USERID = $userId and wz_FRAGEID = $fragenId");
			
			print_r($present);
			
			if ($present !== false) {
			
				dbx::query("delete from wizard_auto_1002 where wz_USERID = $userId and wz_FRAGEID = $fragenId AND wz_del = 'N' limit 1");
			}
	
			dbx::insert("wizard_auto_1002", $update);
		}
	}
}
