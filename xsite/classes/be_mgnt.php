<?

class be_mgnt
{
	public static function ajax_getUsers()
	{
		$users = dbx::queryAll("SELECT wz_id,wz_PROFILBILD FROM wizard_auto_707 WHERE wz_PROFILBILD > 0");
		
		if($users === false)
		{
			$users = array();
		}
		
		foreach ($users as $key => $value) 
		{
			$users[$key]['url'] = fe_vanityurls::genUrl_profil($value['wz_id']);
		}
		
		$html = xredaktor_render::renderSoloAtom(903, array('data' => $users));		
		
		frontcontrollerx::json_success(array('html' => $html));
	}
	
	public static function ajax_getRooms()
	{
		$rooms = dbx::queryAll("SELECT wz_id,wz_PROFILBILD FROM wizard_auto_809 WHERE wz_PROFILBILD > 0");
		
		if($rooms === false)
		{
			$rooms = array();
		}
		
		foreach ($rooms as $key => $value) 
		{
			$rooms[$key]['BILDER'] = array();
			$rooms[$key]['url'] = fe_vanityurls::genUrl_room($value['wz_id']);
			
			$id = intval($value['wz_id']);
			
			if($id == 0)
			{
				continue;
			}
			
			$imgs = dbx::queryAll("SELECT wz_S_ID FROM wizard_auto_810 WHERE wz_ROOMID = $id AND wz_del = 'N'");
			
			if($imgs === false)
			{
				$imgs = array();
			}
			
			$rooms[$key]['BILDER'] = $imgs;
		}
		
		
		$html = xredaktor_render::renderSoloAtom(904, array('data' => $rooms));		
		
		frontcontrollerx::json_success(array('html' => $html));
	}
}
