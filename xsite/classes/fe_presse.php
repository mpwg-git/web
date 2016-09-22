<?
   	class fe_presse
{
	const table_presse 					= 'wizard_auto_907';
	const table_presse_id 				= 907;
	const table_presse_categories 		= 'wizard_auto_911';
	const table_presse_categories_id	= 911;
	
	const table_presse_n2n_cat = 'wizard_auto_SIMPLE_W2W_907_911';


	public static function get_categories_keyed()
	{
		$categories = dbx::queryAll("SELECT * FROM " . self::table_presse_categories . " WHERE wz_del = 'N' AND wz_online = 'Y' ");
		$categories = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(self::table_presse_categories_id, $categories);
		
		$ret = array();
		foreach ($categories as $c)
		{
			$ret[$c['wz_id']] = $c;
		}
		return $ret;
	}

}