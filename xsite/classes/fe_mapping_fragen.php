<?

class fe_mapping_fragen {
	
	const table_settings	 	= 'wizard_auto_964';
	const table_fragenAlt	 	= 'wizard_auto_755';
	const table_fragenNeu 		= 'wizard_auto_961';
	
	
	
	
	
	public static function sc_getSuperwichtig() {
		
		return self::getSuperwichtig();
	}
	
	public static function sc_getDeltas() {
		
		return self::getDeltas();
	}
	
	
	public static function getSuperwichtig() {
		
		$return = dbx::queryAttribute("SELECT * FROM " . self::table_settings . " WHERE wz_del = 'N' AND wz_online = 'Y' ", 'wz_SUPERWICHTIG');
		
		if($return === false || $return == '')
		{
			return false;
		}
		
		return $return;
	}
	
	
	public static function getDeltas() {
		
		$deltaArray = dbx::queryAll("SELECT * FROM " . self::table_settings . " WHERE wz_del = 'N' AND wz_online = 'Y' ");
		
		if($deltaArray === false || $deltaArray == '')
		{
			return false;
		}
		
		return $deltaArray;
	}
	
	
	
}