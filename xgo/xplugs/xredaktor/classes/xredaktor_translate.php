<?

class xredaktor_translate
{
	static $translated = array();
	public static function doTranslate($tag,$lang,$fet_s_id=false)
	{
		if ($fet_s_id === false) return $tag;
		$fet_s_id = intval($fet_s_id);
		if ($fet_s_id == 0) return $tag;

		if (isset(self::$translated[$tag][$lang]))
		{
			return self::$translated[$tag][$lang];
		}

		$fet_tag_md5 = md5($tag.$fet_s_id);

		$translated 	= dbx::query("select * from fe_tags where fet_tag_md5 = '$fet_tag_md5' and fet_s_id = $fet_s_id");

		if ($translated === false)
		{

			$data = array(
			'fet_created'	=> 'NOW()',
			'fet_s_id' 		=> $fet_s_id,
			'fet_tag' 		=> $tag,
			'fet_tag_md5' 	=> $fet_tag_md5
			);


			$sys_fe_languages = dbx::queryAll("select * from fe_language where fel_del = 'N'");

			foreach ($sys_fe_languages as $sfl)
			{
				$langRun = strtolower($sfl['fel_ISO']);
				$data['fet_t_'.$langRun] = $tag;
			}

			dbx::insert('fe_tags',$data);
			$translated 	= dbx::query("select * from fe_tags where fet_tag_md5 = '$fet_tag_md5' and fet_s_id = $fet_s_id");
		}

		$tagTranslated =  $translated['fet_t_'.$lang];
		self::$translated[$tag][$lang] = $tagTranslated;

		return $tagTranslated;
	}
}