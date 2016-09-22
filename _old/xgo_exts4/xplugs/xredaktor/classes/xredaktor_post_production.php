<?

class xredaktor_post_production {

	public static function doPostProcessing($s_id, $generatedHtml)
	{
		//if (!libx::isDeveloper()) return $generatedHtml;

		switch ($s_id)
		{
			case '9':
				return self::fixMrp($generatedHtml);
				break;
		}


		return $generatedHtml;
	}

	function replacedFixedForMrp($matches) {
		if (strpos($matches[0], '<') === false) {
			return $matches[0];
		} else {
			return '<span class="mrpTag">'.$matches[1].'</span>'.$matches[2];
		}
	} 

	private static function fixMrp($generatedHtml)
	{
		$search 		= "MRP hotels";
		$body_orig 		= preg_replace("/.*<body[^>]*>|<\/body>.*/si", "", $generatedHtml);
		$body_fixed		= preg_replace_callback('/(\b'.$search.'\b)(.*?>)/i',
		'xredaktor_post_production::replacedFixedForMrp',
		$body_orig);
		$finally = str_replace($body_orig,$body_fixed,$generatedHtml);
		return $finally;
	}

}