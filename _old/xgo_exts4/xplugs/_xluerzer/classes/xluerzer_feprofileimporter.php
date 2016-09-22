<?

class xluerzer_feprofileimporter
{

	public static function defaultAjaxHandler($scope,$function,$param_0)
	{
		switch ($function)
		{
			case 'loadFE':
				self::loadFE();
				break;
			case 'grid_scontacts':
				self::grid_scontacts();
				break;
			case 'grid_fe_users':
				self::grid_fe_users();
				break;
			case 'loadSimilar':
				self::loadSimilar();
				break;
			case 'linkThem':
				self::linkThem();
				break;
			default: die('???!??');
		}

		die(" $function $param_0");
	}

	
	public static function linkThem()
	{
		$feu_id 		= intval($_REQUEST['feu_id']);
		$fep_contact_id = intval($_REQUEST['fep_contact_id']);
		
		if ($feu_id == 0) 			frontcontrollerx::json_failure("FE-USER: 0?");
		if ($fep_contact_id == 0) 	frontcontrollerx::json_failure("PROFILE-ID: 0?");
		
		#dbx::update('fe_users',		array('feu_e_contact_id'=> $fep_contact_id),	array('feu_id'			=> intval($feu_id)));
		#dbx::update('fe_profiles',	array('fep_fe_user_id'	=> $feu_id),			array('fep_contact_id'	=> intval($fep_contact_id)));
		
		frontcontrollerx::json_success();
	}
	
	public static function loadFE()
	{
		$feu_id = intval($_REQUEST['feu_id']);
		$data = dbx::query("SELECT * FROM fe_users WHERE feu_id = $feu_id ");
		frontcontrollerx::json_success(array('fe_user'=>$data));
	}

	public static function loadSimilar()
	{
		$fep_contact_id = intval($_REQUEST['fep_contact_id']);
		$data = dbx::query("SELECT * FROM fe_profiles WHERE fep_contact_id = $fep_contact_id ");
		frontcontrollerx::json_success(array('profile'=>$data));
	}

	public static function grid_fe_users()
	{
		$sql_data = "SELECT * FROM fe_users WHERE feu_e_contact_id = 0 and feu_lastname != 'iphonelocal' ";
		$sql_cnt  = "SELECT count(*) as sql_cnt FROM fe_users WHERE feu_e_contact_id = 0 ";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));
	}

	public static function grid_scontacts()
	{
		$feu_id = intval($_REQUEST['feu_id']);

		if ($feu_id == 0) {
			frontcontrollerx::json_success();
		}

		$find = dbx::query("select * from fe_users where feu_id = $feu_id");

		$firstname 	= "";
		$lastname 	= "";
		$email 		= "";

		if ($find === false)
		{
		} else {
			$firstname 	= $find['feu_firstname'];
			$lastname 	= $find['feu_lastname'];
			$email 		= $find['feu_email'];
		}

		$firstname 	= str_replace("'","\\'",$firstname);
		$lastname 	= str_replace("'","\\'",$lastname);
		$email 		= str_replace("'","\\'",$email);


		$ORS = array();



		if (($lastname != "") && ($firstname != ""))
		{
			$ORS[] = " (MATCH (fep_firstname) AGAINST ('$firstname') AND MATCH (fep_lastname) AGAINST ('$lastname')) ";
		}

		if (($lastname != "") )
		{
			$ORS[] = " (MATCH (fep_lastname) AGAINST ('$lastname')) ";
		}

		if ($email != "")
		{
			$ORS[] = " (fep_email LIKE '%$email%')  ";
		}

		if (count($ORS) == 0)
		{
			frontcontrollerx::json_success();
		}
		
		$where = " ( ".implode(" OR ",$ORS)." ) ";

		$sql_data = "SELECT * FROM fe_profiles where $where";
		$sql_cnt  = "SELECT count(*) as sql_cnt FROM  fe_profiles where $where";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));
	}


}

