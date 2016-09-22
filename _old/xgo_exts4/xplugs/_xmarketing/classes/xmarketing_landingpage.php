<?

class xmarketing_landingpage
{

	public static function cleanLinksById($xme_id,$xme_s_id)
	{
		dbx::delete('xm_tracking_links',array('xmtl_e_id'=>$xme_id,'xmtl_s_id'=>$xme_s_id));
	}

	public static function registerLink($xme_id,$linkObj)
	{
		$xme_id 	= intval($xme_id);
		$e			= xmarketing_emissions::getByid($xme_id);
		$xme_s_id 	= intval($e['xme_s_id']);

		$url 		= dbx::escape(trim($linkObj->getAttribute('href')));
		$target		= $linkObj->getAttribute('target');
		$title		= $linkObj->getAttribute('title');

		if (strpos($url,"XMTLOFF=1")!==false) 								return false;
		if (strpos($url,"###SHOW_THIS_MAILING_IN_WEB###")!==false) 			return false;
		if (strpos($url,"mailto:")!==false) 								return false;
		if (strpos($url,self::getMasterLandingPageLinkRoot()) !== false) 	return false;
		if ((strpos($url,'#') !== false) && (strpos($url,'#') == 0)) 		return false;

		$tableName 	= "xm_tracking_links";
		$sql 		= "select * from $tableName where xmtl_tl_url = '$url' and xmtl_e_id = $xme_id and xmtl_del = 'N' and xmtl_s_id = $xme_s_id";
		$present 	= dbx::query($sql);

		$data = array(
		'xmtl_created'		=> 'NOW()',
		'xmtl_e_id' 		=> $xme_id,
		'xmtl_s_id'			=> $xme_s_id,
		'xmtl_tl_target'	=> $target,
		'xmtl_tl_title'		=> $title,
		'xmtl_tl_urlOrig'	=> $url,
		'xmtl_tl_url'		=> $url
		);

		$xmtl_id = -1;

		if ($present === false)
		{
			dbx::insert($tableName,$data);
			$xmtl_id = dbx::getLastInsertId();
		} else
		{
			$xmtl_id = $present['xmtl_id'];
			dbx::update($tableName,$data,array('xmtl_id'=>$xmtl_id));
		}

		return $xmtl_id;
	}

	public static function getLinks($htmlCode)
	{
		$html 		= new DOMDocument();
		$html->loadHTML('<?xml version="1.0" encoding="utf-8"?>'.($htmlCode));
		$xpath 	= new DomXPath($html);
		$links 	= $xpath->query('//a');
		return $links;
	}

	public static function scan($xme_id)
	{
		$xme_id 		= intval($xme_id);
		$p_id 			= xmarketing_emissions::getPageIdById($xme_id);
		if ($p_id == 0) return false;

		$htmlCode	= xredaktor_render::renderPage($p_id,true);
		$links 		= self::getLinks($htmlCode);

		for ($i=0;$i<$links->length;$i++) {
			self::registerLink($xme_id,$links->item($i));
		}

		return true;
	}

	public static function getMasterLandingPageLinkRoot()
	{
		return "http://pichlarn-v2.donefor.me/xmarketing";
	}

	public static function genMasterLandingPageUrl($xmsq_id,$xme_id,$url,$linkObj)
	{
		$linkId = self::registerLink($xme_id,$linkObj);
		if ($linkId === false) return $url;
		$mqHashed = $xmsq_id.'-'.md5($xmsq_id.'_SECRET_0815');
		$newUrl = self::getMasterLandingPageLinkRoot()."/goto/$mqHashed/$linkId";
		return $newUrl;
	}

	public static function genOpeningTrackerImageTag($xmsq_id)
	{
		$linkId 	= "0";
		$mqHashed 	= $xmsq_id.'-'.md5($xmsq_id.'_SECRET_0815');

		$url 		= self::getMasterLandingPageLinkRoot()."/open/$mqHashed/$linkId";
		$html 		= "<img src=\"$url\" width=1 height=0>";

		return $html;
	}

	public static function genOpenInWebUrl($xmsq_id)
	{
		$linkId 	= "LINK";
		$mqHashed 	= $xmsq_id.'-'.md5($xmsq_id.'_SECRET_0815');
		$url 		= "/show/$mqHashed/$linkId";
		return $url;
	}

	public static function replaceLinksForSendingForThisUserAndEmission($xmsq_id, $xme_id, $htmlCode)
	{
		$html = new DOMDocument();
		$html->loadHTML('<?xml version="1.0" encoding="utf-8"?>'.($htmlCode));
		$xpath 	= new DomXPath($html);
		$links 	= $xpath->query('//a');

		for ($i=0;$i<$links->length;$i++) {

			$url 	= $links->item($i)->getAttribute('href');
			$target	= $links->item($i)->getAttribute('target');
			$title	= trim($links->item($i)->getAttribute('title'));

			$newUrl	= self::genMasterLandingPageUrl($xmsq_id,$xme_id,$url,$links->item($i));
			$links->item($i)->setAttribute('href',$newUrl);
		}

		$value = $html->saveHTML();

		### ADD - OPENING TAG
		### ADD - SHOW THIS ON THE WEB

		$TRACK_OPEN_MARKER 			= self::genOpeningTrackerImageTag($xmsq_id);
		$SHOW_THIS_MAILING_IN_WEB 	= self::genOpenInWebUrl($xmsq_id);

		$value = str_replace("###TRACK_OPEN_MARKER###",			$TRACK_OPEN_MARKER,			$value);
		$value = str_replace("###SHOW_THIS_MAILING_IN_WEB###",	$SHOW_THIS_MAILING_IN_WEB,	$value);

		return $value;
	}

	/**
	 * ************************************* AFTER CLICKING ... 
	 *
	 * @param unknown_type $mq_id
	 */

	public static function registerOpen($xmsq_id)
	{
		if (!is_numeric($xmsq_id)) 	die('N1');
		$mq = dbx::query("select *,CONCAT('') as xmsq_html from xm_send_queue where xmsq_id = $xmsq_id");
		if ($mq === false) 			die('N2');


		$xmor_e_id = intval($mq['xmsq_e_id']);
		$xmor_r_id = intval($mq['xmsq_r_id']);

		$db = array(
		'xmor_e_id'				=> $xmor_e_id,
		'xmor_r_id'				=> $xmor_r_id,
		'xmor_created'			=> 'NOW()',
		'xmor_sq_id'			=> $xmsq_id,
		'xmor_HTTP_USER_AGENT'	=> $_SERVER['HTTP_USER_AGENT'],
		'xmor_ip'				=> libx::getIp(),
		'xmor_host'				=> libx::getHost(),
		'xmor_ref'				=> $_SERVER['HTTP_REFERER']);

		dbx::insert('xm_tracking_opening_rates',$db);
		die('Y');
	}

	/*
	public static function openUnsubscribeSite($xmsq_id)
	{
	$mqHashed = $mq_id.'-'.md5($mq_id.'_SECRET_0815');
	$url2jump = xredaktor_niceurl::genUrl(array('p_id'=>195)).'?_id'.$mq_id."&h=$mqHashed";
	header('Location: '.$url2jump);
	die();
	}
	*/

	private static function getUnsafeQueue($xmsq_id,$htmlUncompress=false)
	{
		$xmsq_id = intval($xmsq_id);

		if ($htmlUncompress) {
			$sql = "select *,UNCOMPRESS(xmsq_html) as xmsq_html from xm_send_queue where xmsq_id = $xmsq_id";
		} else
		{
			$sql = "select *,CONCAT('') as xmsq_html from xm_send_queue where xmsq_id = $xmsq_id";
		}

		return dbx::query($sql);
	}

	public static function showContent($xmsq_id)
	{
		$xmsq_id	= intval($xmsq_id);
		$mq 		= self::getUnsafeQueue($xmsq_id,true);
		if ($mq === false) die("Falsche Abfrage");

		$xme_id		= intval($mq['xmsq_e_id']);
		$html 		= $mq['xmsq_html'];
		$emission 	= dbx::query("select * from xm_emissions where xme_id = $xme_id");

		if ($emission['xme_state'] == "READY_4_SENDING")
		{
			dbx::query("update xm_emissions set xme_tested=xme_tested+1 where xme_id = $xme_id");
		}

		$s = array();

		// FIX IMAGES ETC ...
		$s[]	= "</head>";
		$r[] 	= "<base href=\"http://pichlarn-v2.donefor.me\"></head>";

		// FIX SHOW IN HTML ...
		$s[]	= 'id="replaceMe"';
		$r[] 	= "style='display:none;'";

		$html 	= str_replace($s,$r,$html);

		die($html);
	}

	public static function getLinkById($xmtl_id)
	{
		$xmtl_id	= intval($xmtl_id);
		$linkData 	= dbx::query("select * from xm_tracking_links where xmtl_id = $xmtl_id and xmtl_del = 'N'");
		return $linkData;
	}

	public static function trackClick($xmsq_id,$linkId)
	{
		if (!is_numeric($xmsq_id)) 	die('N1');
		if (!is_numeric($linkId)) 	die('N2');

		$mq = dbx::query("select *,CONCAT('') as xmsq_html from xm_send_queue where xmsq_id = $xmsq_id");
		if ($mq === false) 			die('N3');

		$xmtc_e_id = intval($mq['xmsq_e_id']);
		$xmtc_r_id = intval($mq['xmsq_r_id']);

		$db = array(
		'xmtc_e_id'				=> $xmtc_e_id,
		'xmtc_r_id'				=> $xmtc_r_id,
		'xmtc_created'			=> 'NOW()',
		'xmtc_sq_id'			=> $xmsq_id,
		'xmtc_link_id'			=> $linkId,
		'xmtc_HTTP_USER_AGENT'	=> $_SERVER['HTTP_USER_AGENT'],
		'xmtc_ref'				=> $_SERVER['HTTP_REFERER'],
		'xmtc_ip'				=> libx::getIp(),
		'xmtc_host'				=> libx::getHost(),
		);

		dbx::insert('xm_tracking_clicks',$db);
		return dbx::getLastInsertId();
	}

	public static function gotgo($xmsq_id, $linkId)
	{
		$xmsq_id 	= intval($xmsq_id);
		$linkId 	= intval($linkId);

		$linkData	= self::getLinkById($linkId);
		if ($linkData === false) die("Fehler XXX");

		$goto = trim($linkData['xmtl_tl_url']);
		self::trackClick($xmsq_id,$linkId);

		if (($goto == "") || ($goto == "#")) die("<pre>Keine Weiterleitung hinterlegt</pre>");

		header('Location: '.$goto);
		die();
	}


	public static function genPreShowHtmlOnWeb($xme_id,$xmr_id)
	{
		$linkId 	= $xmr_id;
		$mqHashed 	= $xme_id.'-'.md5($xme_id.'_SECRET_0815');
		$url 		= "/preshow/$mqHashed/$linkId";
		return $url;
	}

	public static function showPreHtmlFixedByCustomerUrl($xme_id,$xmr_id)
	{
		$html = xmarketing_emissions::preShowHtml($xme_id,$xmr_id);

		$s = array();

		// FIX IMAGES ETC ...
		$s[]	= "</head>";
		$r[] 	= "<base href=\"http://pichlarn-v2.donefor.me\"></head>";

		// FIX SHOW IN HTML ...
		$s[]	= 'id="replaceMe"';
		$r[] 	= "style='display:none;'";

		$html 	= str_replace($s,$r,$html);

		die($html);
	}


	public static function router()
	{
		list($link,$fragezeichen) 				= explode("?",$_SERVER['REQUEST_URI'],2);
		list($crap,$crap2,$action,$idHash,$id2) = (explode('/',$link));
		list($id,$hash) 						= explode("-",$idHash);

		if ($idHash != $id.'-'.md5($id.'_SECRET_0815'))
		{
			die('INVALID');
		}

		switch ($action)
		{
			case 'preshow':
				self::showPreHtmlFixedByCustomerUrl($id,$id2);
				die();
				break;
			case 'show':
			case 'zeige':
				self::showContent($id);
				die();
				break;
				/*	case 'unsubscribe':
				case 'abmelden':
				xmarketing_landingpage::openUnsubscribeSite($id);
				die();
				break;*/
			case 'open':
				xmarketing_landingpage::registerOpen($id);
				die();
				break;
			case 'goto':
			case 'gitgo':
				xmarketing_landingpage::gotgo($id,$id2);
				break;
			default:
				die("ABCDEFGH :D");

				/*
				list($crap,$crap2,$hash,$package) = explode('/',$REQUEST_URI);
				$REQUEST_URI = $_SERVER['REQUEST_URI'];
				list($crap,$crap2,$hash,$package) = explode('/',$REQUEST_URI);
				if (md5($package.Ixredaktor::xMarketingSecret) != $hash) die('invalidRequest');
				$dataPackage = unserialize(base64_decode($package));
				print_r($dataPackage);
				*/
		}

		die("EOC");
	}

}