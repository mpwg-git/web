<?

class fe_fragebogen
{

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

		$fragen = dbx::queryAll("SELECT * FROM wizard_auto_961 WHERE wz_del = 'N' AND wz_online = 'Y' AND wz_INIT_FRAGE = 'Y' AND (wz_TYP = '$type' || wz_TYP = 'alle') ORDER BY wz_sort ASC");

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
}
