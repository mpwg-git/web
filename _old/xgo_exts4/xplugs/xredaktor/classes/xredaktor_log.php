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

	public static function add($table,$wz_id,$r_id,$type,$human)
	{
		if ($wz_id != 0)
		{
			$a 			 = xredaktor_atoms::getById($wz_id);
			$buh_wz_name = $a['a_name'];
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
		);

		dbx::insert('be_users_history',$d);

		return dbx::getLastInsertId();
	}


}