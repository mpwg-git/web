<?

class xredaktor_log
{

	public static function logout()
	{

	}


	public static function userInsert($id)
	{
		self::add('be_users',0,$id,'USER_INSERT',"User $id wurde angelegt.");
	}

	public static function userDelete($id)
	{
		self::add('be_users',0,$id,'USER_DELETE',"User $id wurde gelöscht.");
	}

	public static function userUpdate($id)
	{
		self::add('be_users',0,$id,'USER_UPDATE',"User $id wurde aktualisiert.");
	}




	public static function roleInsert($id)
	{
		self::add('roles',0,$id,'ROLE_INSERT',"Rolle $id wurde angelegt.");
	}

	public static function roleDelete($id)
	{
		self::add('roles',0,$id,'ROLE_DELETE',"Rolle $id wurde gelöscht.");
	}

	public static function roleUpdate($id)
	{
		self::add('roles',0,$id,'ROLE_UPDATE',"Rolle $id wurde aktualisiert.");
	}




	public static function fileUpload($s_id)
	{
		self::add('storage',0,$s_id,'UPLOAD',"Datei $s_id wurde upgeloaded.");
	}

	public static function fileOverwrite($s_id)
	{
		self::add('storage',0,$s_id,'UPLOAD',"Datei $s_id wurde überschrieben.");
	}

	public static function fileDelete($s_id)
	{
		self::add('storage',0,$s_id,'FILE_DELETE',"Datei $s_id wurde gelöscht.");
	}

	public static function fileMove($s_id)
	{
		self::add('storage',0,$s_id,'FILE_MOVE',"Datei $s_id wurde verschoben.");
	}

	public static function fileCopy($s_id)
	{
		self::add('storage',0,$s_id,'FILE_COPY',"Datei $s_id wurde kopiert.");
	}

	public static function dirCreate($s_id)
	{
		self::add('storage',0,$s_id,'DIR_CREATED',"Verzeichnis $s_id wurde angelegt.");
	}

	public static function dirMove($s_id)
	{
		self::add('storage',0,$s_id,'DIR_MOVE',"Verzeichnis $s_id wurde verschoben.");
	}

	public static function dirDelete($s_id)
	{
		self::add('storage',0,$s_id,'DIR_DELETE',"Verzeichnis $s_id wurde gelöscht.");
	}



	/*

	AS

	*/


	public static function aCreate($a_id)
	{
		self::add('atoms',$a_id,0,'CREATE','Wizard wurde angelegt',false,'AS');
	}

	public static function asCreate($id,$data)
	{
		$as 		= xredaktor_atoms_settings::getById($id);
		$as_name 	= $as['as_name'];
		self::add('atoms_settings',intval($data['as_a_id']),$id,'INSERT',"Feld $as_name wurde angeleget",false,'AS');
	}

	public static function asUpdate($id,$newDataRecord,$oldDataRecord)
	{
		$a_id 	= intval($oldDataRecord['as_a_id']);
		$diffs 	= self::getBasicDiff($newDataRecord,$oldDataRecord);
		self::add('atoms_settings',$a_id,$id,'UPDATE',"Feld $id wurde geändert",$diffs,'AS');
	}

	public static function asDelete($as_id)
	{
		$as 		= xredaktor_atoms_settings::getById($as_id);
		$as_name 	= $as['as_name'];
		$a_id 		= intval($as['as_a_id']);

		self::add('atoms_settings',$a_id,$as_id,'DELETE',"Feld $as_name wurde gelöscht",false,'AS');
	}

	/*

	WIZARDS

	*/
	
	public static function wz_unpublish($wz_id,$wz_r_id)
	{
		self::add('',$wz_id,$wz_r_id,'UNPUBLISH','',false,'RECORDS');
	}

	public static function wz_publish($wz_id,$wz_r_id)
	{
		self::add('',$wz_id,$wz_r_id,'PUBLISH','',false,'RECORDS');
	}

	public static function wz_insert($wz_id,$wz_r_id)
	{
		self::add('',$wz_id,$wz_r_id,'INSERT','',false,'RECORDS');
	}

	public static function wz_update($wz_id,$wz_r_id,$newDataRecord,$oldDataRecord)
	{
		self::add('',$wz_id,$wz_r_id,'UPDATE','',self::getBasicDiff($newDataRecord,$oldDataRecord),'RECORDS');
	}

	public static function wz_delete($wz_id,$wz_r_id)
	{
		self::add('',$wz_id,$wz_r_id,'DELETE','',false,'RECORDS');
	}

	public static function wz_sort($wz_id,$wz_r_id,$newSortPos,$oldSortPos)
	{
		$newDataRecord = array(
		'wz_sort' => $newSortPos
		);
		
		$oldDataRecord = array(
		'wz_sort' => $oldSortPos
		);
		
		self::add('',$wz_id,$wz_r_id,'SORT','',self::getBasicDiff($newDataRecord,$oldDataRecord),'RECORDS');
	}

	public static function wz_move($wz_id,$wz_r_id,$newConfig,$oldConfig)
	{
		self::add('',$wz_id,$wz_r_id,'MOVE','',self::getBasicDiff($newConfig,$oldConfig),'RECORDS');
	}
	
	/*

	GENERIC INFOS

	*/


	public static function generic_insert($extFunctionsConfig,$id,$data)
	{

		switch ($extFunctionsConfig['table'])
		{
			case 'atoms':
				switch ($data['a_type'])
				{
					case 'WIZARD':
						self::aCreate($id);
						break;
					default: break;
				}

				break;
			case 'atoms_settings':
				self::asCreate($id,$data);
				break;

			default: break;
		}



	}

	public static function generic_update($extFunctionsConfig,$id,$newDataRecord,$oldDataRecord)
	{



		switch ($extFunctionsConfig['table'])
		{
			case 'atoms_settings':
				self::asUpdate($id,$newDataRecord,$oldDataRecord);
				break;

			default: break;
		}
	}

	public static function generic_delete($extFunctionsConfig,$id)
	{
		switch ($extFunctionsConfig['table'])
		{
			case 'atoms_settings':
				self::asDelete($id);
				break;

			default: break;
		}
	}


	public static function getBasicDiff($newData,$oldData)
	{
		$al_mods = array();
		foreach ($oldData as $attrib => $old)
		{
			$new = $newData[$attrib];
			if ($new != $old)
			{
				$al_mods[$attrib] = array('old'=>$old,'new'=>$new);
			}
		}
		foreach ($newData as $attrib => $new)
		{
			if (isset($oldData[$attrib])) continue;
			$al_mods[$attrib] = array('old'=>'','new'=>$new);
		}
		return $al_mods;
	}

	public static function add($table,$wz_id,$r_id,$type,$human,$diffs_array=false,$scope='')
	{
		if ($wz_id != 0)
		{
			$a 			 = xredaktor_atoms::getById($wz_id);
			$buh_wz_name = $a['a_name'];
		}

		$buh_diff = "";
		if ($diffs_array == "") $diffs_array=false;
		if ($diffs_array !== false)
		{
			$buh_diff = json_encode($diffs_array);
		}

		$d = array(
		'buh_wz_name'	=> $buh_wz_name,
		'buh_wz_id'		=> $wz_id,
		'buh_r_id' 		=> $r_id,
		'buh_table' 	=> $table,
		'buh_created' 	=> 'NOW()',
		'buh_createdBy' => xredaktor_core::getUserId(),
		'buh_type' 		=> $type,
		'buh_human' 	=> $human,
		'buh_diff' 		=> $buh_diff,
		'buh_scope' 	=> $scope,
		);

		dbx::insert('be_users_history',$d);

		return dbx::getLastInsertId();
	}


}