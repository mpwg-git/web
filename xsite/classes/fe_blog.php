<?

class fe_blog
{
	const table_blog 				= 'wizard_auto_834';
	const table_blog_id 			= 834;
	const table_blog_categories 	= 'wizard_auto_882';
	const table_blog_categories_id 	= 882;


	const atom_blog_overview		= 835;

	const table_blog_n2n_cat = 'wizard_auto_SIMPLE_W2W_834_882';


	public static function get_categories_keyed()
	{
		$categories = dbx::queryAll("SELECT * FROM " . self::table_blog_categories . " WHERE wz_del = 'N' AND wz_online = 'Y' ");
		$categories = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(self::table_blog_categories_id, $categories);

		$ret = array();
		foreach ($categories as $c)
		{
			$ret[$c['wz_id']] = $c;
		}
		return $ret;
	}


	public static function sc_get_latest_blogentries()
	{
		// order by wz_sort / WEB-454
		$data = dbx::queryAll("SELECT blog.*, (SELECT GROUP_CONCAT(wz_id_high) FROM wizard_auto_SIMPLE_W2W_834_882 WHERE wz_id_low = blog.wz_id) AS categories
			FROM " . self::table_blog . " AS blog
			WHERE blog.wz_online = 'Y' AND blog.wz_del = 'N' AND blog.wz_MENU = 'Y'
			ORDER BY blog.wz_sort DESC LIMIT 2
		");

		// jetzt noch die categories exploden damit wir sie schön foreachen können im template...
		foreach ($data as $k => &$v)
		{
			$blogCategoriesStr = $v['categories'];
			$blogCategories = explode(',', $blogCategoriesStr);
			$v['categories'] = $blogCategories;
		}

		$data = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(self::table_blog_id, $data);
		return $data;
	}

	public static function sc_get_all_blogentries()
	{
		// order by wz_sort / WEB-454
		$data = dbx::queryAll("SELECT blog.*, (SELECT GROUP_CONCAT(wz_id_high) FROM wizard_auto_SIMPLE_W2W_834_882 WHERE wz_id_low = blog.wz_id) AS categories
			FROM " . self::table_blog . " AS blog
			WHERE blog.wz_online = 'Y' AND blog.wz_del = 'N' AND blog.wz_MENU = 'Y'
			ORDER BY blog.wz_sort DESC
		");

		// jetzt noch die categories exploden damit wir sie schön foreachen können im template...
		foreach ($data as $k => &$v)
		{
			$blogCategoriesStr = $v['categories'];
			$blogCategories = explode(',', $blogCategoriesStr);
			$v['categories'] = $blogCategories;
		}

		$data = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(self::table_blog_id, $data);
		return $data;
	}

	public static function ajax_getFiltered()
	{
		$categories = array();
		foreach ($_REQUEST as $k => $v)
		{
			if (strpos($k, 'blogcat-') === false) continue;
			$catId = intval($v);

			if ($catId == 0) continue;

			$categories[] = $catId;
		}

		// wenn keine checkboxen selektiert wurden...
		if (empty($categories))
		{
			$html = xredaktor_render::renderSoloAtom(self::atom_blog_overview);
			frontcontrollerx::json_success(array('html' => $html));
		}

		// ansonsten normal weiter mit filtering
		$categoriesStr = implode(',', $categories);

		$sql = "SELECT DISTINCT blog.*,
		(SELECT GROUP_CONCAT(wz_id_high) FROM wizard_auto_SIMPLE_W2W_834_882 WHERE wz_id_low = blog.wz_id) AS categories
		FROM " . self::table_blog . " AS blog
		INNER JOIN ".self::table_blog_n2n_cat." AS n2n ON wz_id_low = blog.wz_id
		WHERE blog.wz_online = 'Y' AND blog.wz_del = 'N' AND blog.wz_MENU = 'Y' AND n2n.wz_id_high IN ( $categoriesStr )
		ORDER BY blog.wz_DATUM DESC ";

		// die($sql);

		$blogEntries = dbx::queryAll($sql);
		$blogEntries = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(self::table_blog_id, $blogEntries);


		// jetzt noch die categories exploden damit wir sie schön foreachen können im template...
		foreach ($blogEntries as $k => &$v)
		{
			$blogCategoriesStr = $v['categories'];
			$blogCategories = explode(',', $blogCategoriesStr);
			$v['categories'] = $blogCategories;
		}

		$html = xredaktor_render::renderSoloAtom(self::atom_blog_overview, array('dataViaAjax' => $blogEntries));

		frontcontrollerx::json_success(array('html' => $html));
	}
}
