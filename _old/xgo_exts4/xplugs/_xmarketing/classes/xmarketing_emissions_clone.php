<?

class xmarketing_emissions_clone
{
	public static function cloneEmission($xme_id)
	{
		$xme_id = intval($xme_id);
		if ($xme_id == 0) die('XXX');
		$p_id = xmarketing_emissions::getPageIdById($xme_id);
		
		//die('_'.$p_id);
		
		// Create New Emission
		$emmission = dbx::query("select * from xm_emissions where xme_id = $xme_id");
		unset($emmission['xme_id']);
		
		$emmission['xme_del'] 		= "N"; 
		$emmission['xme_p_id'] 		= "0"; 
		$emmission['xme_state'] 	= "CONFIG"; 
		$emmission['xme_created'] 	= "NOW()"; 
		$emmission['xme_tested'] 	= "0"; 
		$emmission['xme_q_start'] 	= "0000-00-00 00:00:00"; 
		$emmission['xme_q_end'] 	= "0000-00-00 00:00:00"; 
		$emmission['xme_q_time'] 	= "0"; 
		$emmission['xme_q_error'] 	= ""; 
		$emmission['xme_name'] 		= 'Kopie von '.$emmission['xme_name']; 
		
		
		dbx::insert("xm_emissions",$emmission);
		$xme_id_new = dbx::getLastInsertId();
		
		// Create New Page and Hook into Emission
		if ($p_id == 0) return $xme_id_new;
		
		
		$page = dbx::query("select * from pages where p_id = $p_id");
		if ($page === false)  return $xme_id_new;
		
		unset($page['p_id']);
		$page['p_created'] = "NOW()"; 
		dbx::insert('pages',$page);
		$p_id_new = dbx::getLastInsertId();

		dbx::update('xm_emissions',array('xme_p_id'=>$p_id_new),array('xme_id'=>$xme_id_new));
		
		// Clone Page Old 2 Page New
		$psas 	= dbx::queryAll("select * from pages_settings_atoms where psa_p_id = $p_id order by psa_id asc");
		if ($psas === false) return $xme_id_new;
		
		
		$mapper_d 	= array();
		$mapper_r 	= array();
		
		foreach ($psas as $p)
		{
			$psa_id = $p['psa_id'];
			unset($p['psa_id']);
			unset($p['psa_lastmod']);
			$p['psa_created'] 	= "NOW()"; 
			$p['psa_p_id'] 		= $p_id_new; 
			dbx::insert('pages_settings_atoms',$p);
			$psa_id_new = dbx::getLastInsertId();
			
			$mapper_d[$psa_id] 		= $psa_id_new;
			$mapper_r[$psa_id_new] 	= $psa_id;
		}
		
		foreach ($mapper_r as $psa_id_new => $psa_id)
		{
			$d = dbx::query("select * from pages_settings_atoms where psa_id = $psa_id_new");			
			$d['psa_fid'] = $mapper_d[$d['psa_fid']];
			dbx::update("pages_settings_atoms",$d,array('psa_id'=>$psa_id_new));
		}
		
		
		return $xme_id_new;
	}
}
