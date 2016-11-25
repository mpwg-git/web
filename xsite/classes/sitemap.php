<?

class sitemap
{
	const baseURL = 'https://www.meineperfektewg.com';

	public static function generate_sitemaps()
	{
		//error_reporting(7); // falls man entity fehler finden will...

		$static_pages = array(
			 1,	// start
			 4,	// worum gehts
			 //5, 	// register | Reg. nur mehr über p_id=47 & p_id=48
			 6, 	// anmelden
			29, 	// faq
			36, 	// blog overview
			37, 	// impressum
			38, 	// agb
			47,	// wg zimmer finden | Reg. als Suchender
			48,	// neuen mitbewohner finden | Reg. als Anbieter
			// 50, 	//pressebereich overview
		);

		// $langs = array('de', 'en');
		$langs = array('de');

		$urlPrefix = self::baseURL;

		$targetFile 	= Ixcore::htdocsRoot . '/sitemap.xml';

		foreach ($langs as $lang)
		{
			// request lang setzen für mapLanguageFieldsToNormFields
			$_REQUEST['lang'] = $lang;

			// $targetFile 	= Ixcore::htdocsRoot . '/sitemap_' .$lang . '.xml';
			$data_this_lang	= array();

			foreach ($static_pages as $p_id)
			{
				$push 		 = array();
				$push['url'] = xredaktor_niceurl::genUrl(array('p_id' => $p_id, 'lang' => $lang));

				$data_this_lang[] = $push;
			}

			// blog einträge - wir brauchen nur wz_id da wir nur URLs rausspucken
			$blogEntries = dbx::queryAll("SELECT wz_id FROM " . fe_blog::table_blog . " WHERE wz_del = 'N' and wz_online = 'Y' ");

			// multilang brauchen wir nicht aus selbem grund
			//$blogEntries = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(fe_blog::table_blog_id, $blogEntries);

			foreach ($blogEntries as $blogEntry)
			{
				$push = array();
				$push['url'] = fe_vanityurls::genUrl_blogdetail($blogEntry['wz_id']);

				$data_this_lang[] = $push;
			}

			// XML START
			$xml   = new DOMDocument("1.0", "UTF-8");
			$root  = $xml->createElementNS("http://www.sitemaps.org/schemas/sitemap/0.9", 'urlset');
			$xml->appendChild($root);

			// add support for images
			$root->setAttributeNS('http://www.w3.org/2000/xmlns/','xmlns:image','http://www.google.com/schemas/sitemap-image/1.1');

			$root->setAttributeNS('http://www.w3.org/2000/xmlns/','xmlns:xhtml','http://www.w3.org/1999/xhtml');
			// XML LOOP
			foreach ($data_this_lang as $k => $contents)
			{
				// create URL node
				$urlNode = $xml->createElement('url');
				$loc 	 = $xml->createElement('loc', $urlPrefix . $contents['url']);
				$urlNode->appendChild($loc);
				$root->appendChild($urlNode);

				$xLink = $xml->createElement('xhtml:link');

				//Attributes for mulitlang
				$relAttr 		= $xml->createAttribute('rel');
				$hrefLangAttr	= $xml->createAttribute('hreflang');
				$hrefAttr		= $xml->createAttribute('href');

				$relAttr->value 		= 'alternate';
				$hrefLangAttr->value = 'en';
				$hrefAttr->value		= $urlPrefix.(str_replace('/de/','/en/',$contents['url']));

				$xLink->appendChild($relAttr);
				$xLink->appendChild($hrefLangAttr);
				$xLink->appendChild($hrefAttr);
				$urlNode->appendChild($xLink);

			}

			// XML OUT
			$xml->formatOutput = true;
			file_put_contents($targetFile, $xml->saveXML());
			echo "\n DONE: $targetFile \n";
			$xml = null;
		}
	}





	/*
	unused functions, braucht man für multilang content (zB bild-descriptions)



	public static function xml_text_sanitize($text)
	{
		$text = str_replace('…', '...', $text);
		$text = str_replace(array('<br>', '<br/>', '<br />', '&nbsp;', '<li>', '</li>'), array(' ', ' ', ' ', ' ', ' ', ' '), $text );
		$text = strip_tags($text);
		return $text;
	}

	public static function mb_safe_excerpt($text, $length = 100, $encoding = 'UTF-8', $dotdot = '...')
	{
		if (mb_strlen($text) > 100)
		{
			$text = mb_substr($text, 0, $length-mb_strlen($dotdot), $encoding) . $dotdot;
		}
		return $text;
	}

	public static function xmlesc($str)
	{
		$str = str_replace(array('& ', "'", '"', '>', '<'), array('&amp;', '&apos;', '&quot;', '&gt;', '&lt;'), $str);

		return $str;
	}
	 *
	 */
}
