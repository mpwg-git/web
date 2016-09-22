<?

class xredaktor_xr_html
{

	public static function toStaticHtml($xr_html)
	{
		$key = 'xredaktor_xr_html_v2_'.md5($xr_html);
		$cached = memcachex::get($key);

		if ($cached !== false) return $cached;

		$xr_html = self::transformImages($xr_html);
		$xr_html = self::transformLinks($xr_html);

		memcachex::set($key,$xr_html);

		return $xr_html;
	}

	public static function transformImages($xr_html)
	{
		
		if (trim($xr_html) == "") return $xr_html;
		if (strpos($xr_html,"img")===false) return $xr_html;


		$html = new DOMDocument();
		$html->loadHTML('<?xml version="1.0" encoding="utf-8"?>'.($xr_html));

		$xpath = new DomXPath($html);

		$links = $xpath->query('//img');
		for ($i=0;$i<$links->length;$i++) {

			$src	= $links->item($i)->getAttribute('src');
			$width	= $links->item($i)->getAttribute('width');
			$height	= $links->item($i)->getAttribute('height');


			$tagger = "/xr_img2/";
			if (strpos($src,$tagger)!==false)
			{
				$links->item($i)->removeAttribute('id');
				$links->item($i)->removeAttribute('class');


				list($crap,$settings) = explode("/xr_img2/",$src,2);
				$settings = json_decode(base64_decode($settings),true);


				$rmode = "vcut";

				if (isset($settings['RMODE']))
				{
					$rmode = $settings['RMODE'];
				}

				$params = array(
				's_id' 		=> intval($settings['IMG']),
				'w' 		=> intval($settings['WIDTH']),
				'h' 		=> intval($settings['HEIGHT']),
				'ext' 		=> trim($settings['EXT']),
				'fullpath' 	=> 'N',
				'rmode'		=> $rmode,
				'crop'		=> $settings['CROP']
				);

				$img = xredaktor_storage::xr_img2($params);
				$src = $img['src'];
				$links->item($i)->setAttribute('alt','');
				$links->item($i)->setAttribute('src',$src);
				$links->item($i)->setAttribute('class','img-responsive');
			}

		}

		$iframes = $xpath->query('//iframe');
		for ($i=0;$i<$iframes->length;$i++) {
			$iframes->item($i)->nodeValue = "";
		}

		$body  = $xpath->query('/html/body');
		$value = $html->saveXml($body->item(0));
		$value = substr($value,strlen("<body>"),-strlen("</body>"));


		return ($value);
	}

	public static function resolveWizardVanityUrlSettings($wz_id,$r_id)
	{

		$wsettings = xredaktor_wizards::getWizardSettings($wz_id);

		$es_detailPage 	= intval($wsettings['es_detailPage']);
		$es_vanityUrl 	= explode("/",$wsettings['es_vanityUrl']);

		if ($es_detailPage == 0) return false;



		$final = array();
		foreach ($es_vanityUrl as $segment_id)
		{
			$segment_id = intval($segment_id);
			if ($segment_id == 0) continue;

			$field = dbx::query("select * from atoms_settings where as_id = $segment_id and as_del='N' ");
			if ($field === false) continue;

			$final[] = $field;
		}

		if (count($final)==0) return false;

		$tableName = xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$recordData = dbx::query("select * from $tableName where wz_id = $r_id");
		if ($recordData === false) return false;

		$m_suffix = array();
		foreach ($final as $as)
		{
			$m_suffix[] = xredaktor_render::getMultiLangValInclFailOverValueByASandRecord($as,$recordData,true);
		}
		$m_suffix = trim(implode("/",$m_suffix));
		if ($m_suffix == "") return false;

		$cfg = array(
		'r_id'		=> $r_id,
		'w_id'		=> $wz_id,
		'p_id' 		=> $es_detailPage,
		'm_suffix' 	=> $m_suffix
		);

		$url = xredaktor_niceurl::genUrl($cfg);

		return array(
		'url' 	=> $url,
		'title'	=> $m_suffix
		);
	}


	public static function transformLinks($xr_html)
	{
		if (trim($xr_html) == "") return $xr_html;
		if (strpos($xr_html,"href")===false) return $xr_html;


		$html = new DOMDocument();
		$html->loadHTML('<?xml version="1.0" encoding="utf-8"?>'.($xr_html));

		$xpath = new DomXPath($html);


		$iframes = $xpath->query('//iframe');
		for ($i=0;$i<$iframes->length;$i++) {
			$iframes->item($i)->nodeValue = "";
		}


		$links = $xpath->query('//a');
		$valueAddon = "";

		for ($i=0;$i<$links->length;$i++) {

			$url	= $links->item($i)->getAttribute('href');
			$target	= $links->item($i)->getAttribute('target');
			$title	= $links->item($i)->getAttribute('title');
			$class	= "";

			// GENERATION 3 LINKS
			$tagger = "#XR_2LINK";
			if (strpos($url,$tagger)!==false)
			{
				list($crap,$json) = explode($tagger,$url);
				$settings = json_decode(base64_decode($json),true);

				$cfg = $settings['cfg'];
				$sel = $settings['sel'];

				switch ($sel)
				{
					case 'page':
						$p_id 			= intval($cfg['page']['p_id']);
						$p_title 		= $cfg['page']['p_title'];
						$p_target		= $cfg['page']['p_target'];


						if ($p_id == 0)
						{
							$p_id = xredaktor_niceurl::guessStartPage();
						}

						$cfg = array(
						'p_id' => $p_id,
						'lang' => xredaktor_pages::getFrontEndLang()
						);
						$url = xredaktor_niceurl::genUrl($cfg);

						$links->item($i)->removeAttribute('id');
						$links->item($i)->setAttribute('title',		$p_title);
						$links->item($i)->setAttribute('target',	$p_target);
						$links->item($i)->setAttribute('href',		$url);

						break;
					case 'external':
						$ext_url		= $cfg['external']['ext_url'];
						$ext_title		= $cfg['external']['ext_title'];
						$ext_target		= $cfg['external']['ext_target'];

						$links->item($i)->removeAttribute('id');
						$links->item($i)->setAttribute('title',		$ext_title);
						$links->item($i)->setAttribute('target',	$ext_target);
						$links->item($i)->setAttribute('href',		$ext_url);

						break;
					case 'media':

						$m_s_id			= intval($cfg['media']['m_s_id']);
						$downloadCfg 	= array(
						's_id' 		=> $m_s_id,
						'mode' 		=> 'DOWNLOAD',
						'resize' 	=> 'N',
						'w' 		=> 0,
						'h' 		=> 0,
						);

						if ($m_s_id == 0)
						{
							$links->item($i)->removeAttribute('id');
							$links->item($i)->removeAttribute('href');
						} else
						{
							$download = xredaktor_storage::download($downloadCfg);
							$links->item($i)->removeAttribute('id');
							$links->item($i)->setAttribute('title',	$download['title']);
							$links->item($i)->setAttribute('href',	$download['href']);
							$links->item($i)->setAttribute('target',$download['target']);
						}

						break;
					case 'email':

						$email_subject	= $cfg['email']['email_subject'];
						$email_to		= $cfg['email']['email_to'];
						$email_cc		= $cfg['email']['email_cc'];
						$email_content	= $cfg['email']['email_content'];

						$check = array();
						$check['subject'] 	= $email_subject;
						$check['cc'] 		= $email_cc;
						$check['body'] 		= $email_content;

						$url = "mailto:$email_to?d=1";
						foreach ($check as $k => $v)
						{
							if (trim($v) != "")
							{
								$url .= "&$k=$v";
							}
						}

						$links->item($i)->removeAttribute('id');
						$links->item($i)->setAttribute('title',	$email_subject);
						$links->item($i)->setAttribute('href',	$url);
						break;


						break;
					case 'infopool':
						$infopool_pair	= $cfg['infopool']['infopool_pair'];
						list($wizard_id,$record_id) = explode(";",$infopool_pair);

						$wizard_id = intval($wizard_id);
						$record_id = intval($record_id);

						if (($record_id == 0)||($wizard_id == 0))
						{
							$links->item($i)->removeAttribute('id');
							$links->item($i)->removeAttribute('href');
						} else {

							$url_cfg = self::resolveWizardVanityUrlSettings($wizard_id,$record_id);
							if ($url_cfg === false)
							{
								$links->item($i)->removeAttribute('id');
								$links->item($i)->removeAttribute('href');
							} else {

								$title 	= $url_cfg['title'];
								$url 	= $url_cfg['url'];

								$links->item($i)->setAttribute('title',	$title);
								$links->item($i)->setAttribute('href',	$url);
							}

						}

						break;

					default: // housten ?
					$links->item($i)->removeAttribute('id');
					$links->item($i)->removeAttribute('href');
					break;
				}

			}



			// GENERATION 2+1 LINKS
			$tagger = "#XR_LINK";
			if (strpos($url,$tagger)!==false)
			{
				list($crap,$json) = explode($tagger,$url);
				$settings = json_decode(urldecode($json),true);

				/*************
				* OLD STUFF BEGIN
				*****************/

				if (!isset($settings['choose']))
				{

					$target = $settings['target'];
					$title 	= $settings['title'];

					if (trim($settings['action'])=="")
					{
						$class 	= 'xr_noAction';
					} else
					{
						$class 	= 'xr_'.$settings['action'];
					}

					if ($settings['type']=='external')
					{
						$url = $settings['external'];
					} else
					{
						if (!is_numeric($settings['internal'])) $settings['internal'] = 1;


						$cfg = array(
						'p_id'=>intval($settings['internal']),
						'lang'=>xredaktor_pages::getFrontEndLang()
						);

						if ($cfg['p_id'] == 0)
						{
							$cfg['p_id'] = xredaktor_niceurl::guessStartPage();
						}


						$url = xredaktor_niceurl::genUrl($cfg);
					}

					$links->item($i)->removeAttribute('id');
					$links->item($i)->setAttribute('title',	$title);
					$links->item($i)->setAttribute('target',$target);
					$links->item($i)->setAttribute('href',	$url);
					$links->item($i)->setAttribute('class',	$class);

					/*************
					* OLD STUFF END
					*****************/
				} else
				{
					switch ($settings['choose'])
					{
						case 'EMAIL':

							$email_to = $settings['email_to'];

							$check = array();
							$check['subject'] 	= urlencode($settings['email_subject']);
							$check['cc'] 		= urlencode($settings['email_cc']);
							$check['body'] 		= urlencode($settings['email_body']);

							$url = "mailto:$email_to?d=1";

							foreach ($check as $k => $v)
							{
								if (trim($v) != "")
								{
									$url .= "&$k=$v";
								}
							}

							$links->item($i)->removeAttribute('id');
							$links->item($i)->setAttribute('title',	$email_subject);
							$links->item($i)->setAttribute('href',	$url);
							break;

						case 'FA':

							$s_id 			= intval($settings['filearchiv']);
							$FA_MODE 		= $settings['FA_MODE'];
							$FA_RESIZE 		= $settings['FA_RESIZE'];
							$FA_RESIZE_W 	= $settings['FA_RESIZE_W'];
							$FA_RESIZE_H 	= $settings['FA_RESIZE_H'];

							$downloadCfg 	= array(
							's_id' 		=> $s_id,
							'mode' 		=> $FA_MODE,
							'resize' 	=> $FA_RESIZE,
							'w' 		=> $FA_RESIZE_W,
							'h' 		=> $FA_RESIZE_H,
							);

							if ($s_id == 0)
							{
								$links->item($i)->removeAttribute('id');
								$links->item($i)->removeAttribute('href');
							} else
							{
								$download = xredaktor_storage::download($downloadCfg);
								$links->item($i)->removeAttribute('id');
								$links->item($i)->setAttribute('title',	$download['title']);
								$links->item($i)->setAttribute('href',	$download['href']);
								$links->item($i)->setAttribute('target',$download['target']);
							}
							break;

						case 'LB':
							$idOfContentDiv = "lb_content_0".'_'.$i;
							$valueAddon .= "<div class='xr_lightbox_content'><div id='$idOfContentDiv'>"."<h1>".$settings['lb_title']."</h1>".$settings['lb_html']."</div></div>";
							$links->item($i)->removeAttribute('id');
							$links->item($i)->setAttribute('title',	$settings['lb_title']);
							$links->item($i)->setAttribute('target','');
							$links->item($i)->setAttribute('href',	'#'.$idOfContentDiv);
							$links->item($i)->setAttribute('class',	'xr_lightbox');
							break;
						case 'LINK':
						default:

							$type		= $settings['type'];
							$target 	= $settings['target'];
							$title 		= $settings['title'];
							$external 	= $settings['external'];
							$internal 	= intval($settings['internal']);

							switch ($type)
							{
								case 'internal':
									if ($internal==0)
									{
										$start_p_id 	= xredaktor_niceurl::guessStartPage();
										$internal = $start_p_id;
									}
									$cfg = array(
									'p_id' => $internal,
									'lang' => xredaktor_pages::getFrontEndLang()
									);
									$url = xredaktor_niceurl::genUrl($cfg);
									break;
								case 'external':
								default:
									$url = $external;
							}

							$links->item($i)->removeAttribute('id');
							$links->item($i)->setAttribute('title',	$title);
							$links->item($i)->setAttribute('target',$target);
							$links->item($i)->setAttribute('href',	$url);
							$links->item($i)->setAttribute('class',	$class);
					}
				}

			}
		}

		$body  = $xpath->query('/html/body');
		$value = $html->saveXml($body->item(0));
		$value = substr($value,strlen("<body>"),-strlen("</body>"));
		return $value.$valueAddon;
	}




}