<?

class xluerzer_crm
{

	public static function defaultAjaxHandler($scope,$function)
	{

		switch ($scope)
		{
			case 'crm_personCategories':
				
				/* $query = trim(dbx2::escape($_REQUEST['query']));
				
				$sql_data 	= "select Categorie as _display, pk_categorie as _value from old_lao_backend__vs_WebCategories where `Categorie` LIKE  '%$query%' order by Categorie asc";
				$sql_cnt 	= "select count(pk_categorie) as sql_cnt from old_lao_backend__vs_WebCategories where `Categorie` LIKE  '%$query%'";

				xluerzer_db_junky::uniqueDataGridWrapper(array(
				'db' 		=> Ixcore::DB_NAME,
				'sql_data' 	=> $sql_data,
				'sql_cnt' 	=> $sql_cnt,
				)); */
								
				break;
				
			case 'crm_contacts':

				
				// header('Access-Control-Allow-Origin: http://lz4.donefor.me');  
				
				$query 		= trim(dbx2::escape($_REQUEST['query']));
				$where 		= " and (ec_firstname LIKE '%$query%' or ec_lastname LIKE '%$query%') ";
				
				$sql_data 	= "select * from e_contacts where 1 $where ";
				$sql_cnt 	= "select count(ec_id) as sql_cnt from e_contacts where 1 $where ";
				
				xluerzer_db_junky::uniqueDataGridWrapper(array(
				'db' 		=> Ixcore::DB_NAME,
				'sql_data' 	=> $sql_data,
				'sql_cnt' 	=> $sql_cnt,
				));

				break;
				
			case 'crm_contacts_bubble':

				// header('Access-Control-Allow-Origin: http://lz4.donefor.me');  
				
				$query 		= trim(dbx2::escape($_REQUEST['query']));
				$where 		= "WHERE (ec_firstname LIKE '%$query%' or ec_lastname LIKE '%$query%') ";
				
				//$sql_data 	= "select concat(pers_vorname,' ',pers_nachname) as name, pk_person as id from old_lao_backend__person where 1 $where ";
				$sql_data 	= "select concat(e_contacts.ec_firstname,' ',e_contacts.ec_lastname') as name, e_contacts.ec_id as id from e_contacts $where";		
				
				dbx2::select_database(Ixcore::DB_NAME);
				
				$data = dbx2::queryAll($sql_data);
				
				if($data === false) $data = array();
				
				die(json_encode($data));
				
				break;
			
			case 'crm_contacts_by_id':

				$query 		= intval($_REQUEST['query']);
								
				$sql_data 	= "select concat(ec_firstname,' ',ec_lastname) as name from e_contacts where ec_id = $query";
				
				dbx2::select_database(Ixcore::DB_NAME);
				
				$data = dbx2::query($sql_data);
				
				if($data === false) $data = array();
				
				die($data['name']);
				
				break;
			default: break;
		}
		
		die('TTTT');

	}
	
}