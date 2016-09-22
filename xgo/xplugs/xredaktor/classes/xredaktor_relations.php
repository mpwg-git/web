<?

class xredaktor_relations
{

	public static function resolve_wizardlist($as_id,$rel_f_id)
	{

		$as 		= xredaktor_atoms_settings::getById($as_id);
		$as_config 	= intval($as['as_config']);
		
		$_as 		= xredaktor_atoms_settings::getById($as_config);
		$_as_id 	= intval($_as['as_id']);
		$_as_a_id 	= intval($_as['as_a_id']);
		
		return wzx::translate_sql("select [SELECTOR],($_as_a_id) as _wizard_id from [:$_as_a_id] where <:$_as_id> = '$rel_f_id' and wz_del= 'N' [LIMIT]");
	}

	public static function resolve_generic()
	{



	}

	public static function resolve_unique()
	{


	}


	public static function resolve_files()
	{


	}


}