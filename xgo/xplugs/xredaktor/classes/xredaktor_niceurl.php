<?

class xredaktor_niceurl
{

	/**
		 * 
		 * WARTUNGSMODUS UND OFFLINE CHECKEN !!!!
		 * 
		 * **/


	private static $cacheCrumbTree = false;
	private static $currentNiceUrlSettings = false;
	private static $siteDomainSettings = false;
	private static $siteDomainSettingsOverrule = false;

	public static function getCurrentNiceUrlVars()
	{
		return self::$currentNiceUrlSettings;
	}

	public static function burnDownLink($url)
	{

		$regex 	= '/<[^>]*>[^<]*<[^>]*>/';
		$url 	= preg_replace($regex, '', $url);
		$url 	= strip_tags($url);

		$url 	= mb_strtolower($url,'UTF-8');
		$url 	= html_entity_decode($url);

		$replaceMe = array(
		'?' => '--',
		'%' => '-prozent-',
		'Ü' => 'ue',
		'Ä' => 'ae',
		'Ö' => 'oe',
		'ä' => 'ae',
		'ö' => 'oe',
		'ü' => 'ue',
		'ä' => 'ae',
		"\\" => '',
		"|" => '-',
		//		"=" => '-',
		" " => '-',
		"ó" => 'o',
		"ò" => 'o',
		"." => '',
		"á" => 'a',
		"à" => 'a',
		"í" => 'i',
		"é" => 'e',
		"è" => 'e',
		"*" => '',
		"´" => '',
		"'" => '',
		"&amp;" => '-',
		"amp;" => '-',
		"--" => '-',
		"&" => 'and',
		"+" => 'and',
		"," => '',
		'"' => '',
		'+' => '-'
		);

		$s = array();
		$r = array();

		foreach ($replaceMe as $k => $v)
		{
			$s[] = $k;
			$r[] = $v;
		}

		$url = str_replace($s,$r,$url);
		$url = str_replace('--','-',$url);
		$url = filter_var($url, FILTER_SANITIZE_URL);

		return $url;
	}

	public static function getCacheDir()
	{
		return dirname(__FILE__).'/../cache/niceurl';
	}

	public static function getSettings()
	{

	}

	public static function setSettings()
	{

	}


	public static function handleEmptySegment($p,$lang)
	{
		$next = xredaktor_pages::getLangFailOverOrder();
		foreach ($next as $l)
		{
			$try = trim($p['p_name'.$l]);
			if ($try !="") return $try;
		}

		if (trim($p['p_name']) == "")
		{
			$p_id = $p['p_id'];
			return $p_id;
		}

		return $p['p_name'];
	}



	public static function buildCrumbTree($p_id,$lang,$del=0,$menu=0,$online=0,$kickLastSegmentIfNotInMenue=0)
	{
		$key = md5(implode(",",array($p_id,$lang,$del,$menu,$online,$kickLastSegmentIfNotInMenue)));
		$key2 = "XR_NICE_URL_buildCrumbTree".$key;

		$cached = memcachex::get($key2);
		if ($cached !== false)
		{
			return $cached;
		}


		if (isset(self::$cacheCrumbTree[$key]))
		{
			//return self::$cacheCrumbTree[$key]; MEM CACHED
		}


		$bc = xredaktor_pages::getCrumbTreeReverse($p_id,$del,1,$online);
		if (count($bc)==0)	$bc[] = xredaktor_render::getPageById($p_id);


		//echo "<pre>";
		//print_r($bc);
		//echo "</pre>";

		$url = "";
		$i	= 0;
		$it = count($bc);

		foreach ($bc as $p)
		{
			$i++;

			//if (($p_id != self::guessStartPage()) && ($p['p_id'] == self::guessStartPage())) continue;
			if (($p_id != self::getStartPageById($p_id)) && ($p['p_id'] == self::getStartPageById($p_id))) continue;

			$segment = $p['p_name_'.$lang];
			//echo "[$segment] $i || $it\n";

			if ($i < $it)
			{
				if (($p['p_inMenue'] == 'N') && ($menu==0))
				{
					continue;
				}
			}

			//echo "[$segment] $i || $it <--- INN \n";



			if (trim($segment) == "") $segment = self::handleEmptySegment($p,$lang);

			if ($p['p_nice_'.$lang] != "") // SPEED, nicht immer deshalb trim...
			{
				if (trim($p['p_nice_'.$lang]) != "")
				{
					$segment = trim($p['p_nice_'.$lang]);
				}
			}

			$url .= '/'. $segment;
		}

		$lastSeg = array_pop($bc);

		if (($lastSeg['p_inMenue'] == 'N') && ($kickLastSegmentIfNotInMenue == 1))
		{
			$urlSegments = explode("/",$url);
			array_pop($urlSegments);
			$url = implode("/",$urlSegments);
		}


		$url = self::burnDownLink($url);
		self::$cacheCrumbTree[$key] = $url;
		memcachex::set($key2,$url);

		return $url;
	}

	public static function cache_update($p_id,$lang,$cfg,$url,$urlClash)
	{


		$md5		= md5(serialize(array($p_id,$lang,$cfg,$url,$urlClash)));
		$key 		= "XR_NICE_URL_CACHE_" 		. $md5;
		$key_cfg 	= "XR_NICE_URL_CACHE_CFG_" 	. $md5;

		$cached = memcachex::get($key);

		if ($cached === false)
		{
			//echo  "$key | NO CACHE <br>";

			$link = self::cache_update_doit($p_id,$lang,$cfg,$url,$urlClash);
			memcachex::set($key,$link);


		} else {

			//echo  "$key | CACHE <br>";

			$link = $cached;
		}

		return $link;
	}

	public static function cache_update_doit($p_id,$lang,$cfg,$url,$urlClash)
	{

		$site = self::getSiteConfigViaPageId($p_id);
		$pnu_siteId = intval($site['s_id']);

		$pnu_md5 					= trim(md5($url.$pnu_siteId));
		$pnu_settings_serialized 	= serialize($cfg);

		$pnu_wz_w_id = intval($cfg['pnu_wz_w_id']);
		$pnu_wz_r_id = intval($cfg['pnu_wz_r_id']);
		$pnu_wz_c_id = intval($cfg['pnu_wz_c_id']);
		$pnu_wz_t_id = intval($cfg['pnu_wz_t_id']);



		if (($pnu_wz_r_id != 0) && ($pnu_wz_w_id != 0))
		{

			$present = dbx::query("select * from pages_niceurls where pnu_md5 = '$pnu_md5' and pnu_siteId = $pnu_siteId LIMIT 1");
			if ($present !== false)
			{
				if (($present['pnu_wz_w_id'] == $pnu_wz_w_id) && ($present['pnu_wz_r_id'] == $pnu_wz_r_id))
				{

					$check = array(
					'pnu_nice_url' 				=> $url,
					'pnu_p_id' 					=> $p_id,
					'pnu_lang'					=> $lang,
					'pnu_settings_serialized' 	=> $pnu_settings_serialized,
					'pnu_wz_w_id' 				=> $pnu_wz_w_id,
					'pnu_wz_r_id' 				=> $pnu_wz_r_id,
					);


					$update = false;

					foreach ($check as $k => $v)
					{
						if ($present[$k] != $v) $update = true;
					}

					if ($update)
					{
						$pnu_id = $present['pnu_id'];
						$sql 	= "UPDATE pages_niceurls set pnu_md5 = '$pnu_md5', pnu_siteId=$pnu_siteId, pnu_nice_url = '$url', pnu_lang='$lang', pnu_p_id=$p_id, pnu_settings_serialized='$pnu_settings_serialized', pnu_wz_w_id = '$pnu_wz_w_id', pnu_wz_r_id = '$pnu_wz_r_id',pnu_wz_c_id = '$pnu_wz_c_id',pnu_wz_t_id = '$pnu_wz_t_id' , pnu_del='N' where pnu_id = $pnu_id";
					}

				}
				else
				{
					$pnu_md5 = trim(md5($urlClash.$pnu_siteId));

					$sql = "INSERT INTO `pages_niceurls` 	(`pnu_id` ,`pnu_siteId`, `pnu_md5` ,`pnu_nice_url` ,`pnu_p_id` ,`pnu_lang`, `pnu_settings_serialized`,   `pnu_wz_w_id` ,`pnu_wz_r_id` ,`pnu_wz_c_id`, `pnu_wz_t_id`)
				VALUES 							(NULL, '$pnu_siteId', '$pnu_md5',  '$urlClash',  '$p_id',  '$lang', '$pnu_settings_serialized','$pnu_wz_w_id','$pnu_wz_r_id','$pnu_wz_c_id','$pnu_wz_t_id') 
				ON DUPLICATE KEY UPDATE pnu_md5 = '$pnu_md5', pnu_siteId=$pnu_siteId, pnu_nice_url = '$urlClash', pnu_lang='$lang', pnu_p_id=$p_id, pnu_settings_serialized='$pnu_settings_serialized', pnu_wz_w_id = '$pnu_wz_w_id', pnu_wz_r_id = '$pnu_wz_r_id',pnu_wz_c_id = '$pnu_wz_c_id',pnu_wz_t_id = '$pnu_wz_t_id' , pnu_del='N' ";
					dbx::query($sql);
					return $urlClash;
				}
			}
			else
			{
				$sql = "INSERT INTO `pages_niceurls` 	(`pnu_id` ,`pnu_siteId`, `pnu_md5` ,`pnu_nice_url` ,`pnu_p_id` ,`pnu_lang`, `pnu_settings_serialized`,   `pnu_wz_w_id` ,`pnu_wz_r_id` ,`pnu_wz_c_id`, `pnu_wz_t_id`)
				VALUES 							(NULL, '$pnu_siteId', '$pnu_md5',  '$url',  '$p_id',  '$lang', '$pnu_settings_serialized','$pnu_wz_w_id','$pnu_wz_r_id','$pnu_wz_c_id','$pnu_wz_t_id') 
				ON DUPLICATE KEY UPDATE pnu_md5 = '$pnu_md5', pnu_siteId=$pnu_siteId, pnu_nice_url = '$url', pnu_lang='$lang', pnu_p_id=$p_id, pnu_settings_serialized='$pnu_settings_serialized', pnu_wz_w_id = '$pnu_wz_w_id', pnu_wz_r_id = '$pnu_wz_r_id',pnu_wz_c_id = '$pnu_wz_c_id',pnu_wz_t_id = '$pnu_wz_t_id' , pnu_del='N' ";
				dbx::query($sql);
			}

		} else {
			$sql = "INSERT INTO `pages_niceurls` 	(`pnu_id` ,`pnu_siteId`, `pnu_md5` ,`pnu_nice_url` ,`pnu_p_id` ,`pnu_lang`, `pnu_settings_serialized`,   `pnu_wz_w_id` ,`pnu_wz_r_id` ,`pnu_wz_c_id`, `pnu_wz_t_id`)
				VALUES 							(NULL, '$pnu_siteId', '$pnu_md5',  '$url',  '$p_id',  '$lang', '$pnu_settings_serialized','$pnu_wz_w_id','$pnu_wz_r_id','$pnu_wz_c_id','$pnu_wz_t_id') 
				ON DUPLICATE KEY UPDATE pnu_md5 = '$pnu_md5', pnu_siteId=$pnu_siteId, pnu_nice_url = '$url', pnu_lang='$lang', pnu_p_id=$p_id, pnu_settings_serialized='$pnu_settings_serialized', pnu_wz_w_id = '$pnu_wz_w_id', pnu_wz_r_id = '$pnu_wz_r_id',pnu_wz_c_id = '$pnu_wz_c_id',pnu_wz_t_id = '$pnu_wz_t_id' , pnu_del='N' ";
			dbx::query($sql);
		}

		return $url;
	}

	public static function cache_exists($url)
	{

		$site = self::getSiteConfigViaHttpHost();
		$pnu_siteId = intval($site['s_id']);

		$url = '/'.$url;
		$pnu_md5 = md5($url.$pnu_siteId);
		return dbx::query("select * from pages_niceurls where pnu_md5 = '$pnu_md5' and pnu_del = 'N' and pnu_siteId=$pnu_siteId");
	}

	public static function genUrl($cfg,$test=false)
	{

		$p_id 			= $cfg['p_id'];
		$siteSettings 	= self::getSiteConfigViaPageId($p_id);
		$defaultLang	= trim($siteSettings['s_default_lang']);
		$currentLang	= xredaktor_pages::getFrontEndLang();

		if (!isset($cfg['lang']))
		{
			$cfg['lang'] = $currentLang;
		}

		$lang = $cfg['lang'];
		if (!in_array($lang,xredaktor_pages::getValidLangs())) $lang = array_shift(xredaktor_pages::getValidLangs());

		$suffixSegment = "";

		if ($cfg['m_suffix'] != "")
		{
			$cfg['m_suffix'] = self::burnDownLink($cfg['m_suffix']);
			$suffixSegment = '/'.$cfg['m_suffix'];
		}


		$w_id = intval($cfg['w_id']);
		$r_id = intval($cfg['r_id']);

		if (($w_id != 0) && ($r_id != 0))
		{
			$cfg['pnu_wz_w_id'] = intval($cfg['w_id']);
			$cfg['pnu_wz_r_id'] = intval($cfg['r_id']);
		}

		$url 		= '/'.$lang.self::buildCrumbTree($p_id,$lang,0,0,0).$suffixSegment;

		$urlClash 	= $url.'-'.$r_id;

		$url 		.= $siteSettings['s_suffix'];
		$urlClash	.= $siteSettings['s_suffix'];

		if ($test)
		{
			return $url;
		}



		$finalUrl = self::cache_update($p_id,$lang,$cfg,$url,$urlClash);
		return $finalUrl;
	}

	public static function genWizardUrl($cfg)
	{
		$p_id = $cfg['p_id'];
		$w_id = $cfg['w_id'];
		$r_id = $cfg['r_id'];
		$c_id = $cfg['c_id'];
		$t_id = $cfg['t_id'];

		if ((!is_numeric($cfg['p_id'])) || (!is_numeric($cfg['w_id'])) || (!is_numeric($cfg['r_id'])) || (!is_numeric($cfg['c_id'])) || (!is_numeric($cfg['t_id'])))
		{
			echo "genWizardUrl wird falsch aufgerufen p_id($p_id),w_id($w_id),r_id($r_id),c_id($c_id),t_id($t_id) müssen numerisch sein...";
			return "";
		}

		$lang = $cfg['lang'];
		if (!in_array($lang,xredaktor_pages::getValidLangs())) $lang = array_shift(xredaktor_pages::getValidLangs());

		$recordData = xredaktor_wizards::fetchRecord($w_id,$r_id);
		if ($recordData === false) return "WIZARD-RECORD-NOT-FOUND";

		$field_c = dbx::query("select * from atoms_settings where as_id = $c_id");
		$field_t = dbx::query("select * from atoms_settings where as_id = $t_id");

		if (isset($_REQUEST['niceUrlDebug']))
		{
			echo "<pre>";
			print_r($field_c);
			print_r($field_t);
			echo "</pre>";
		}

		if ($field_c == false) return "WIZARD-RECORD-FIELD-C-NOT-FOUND";
		if ($field_t == false) return "WIZARD-RECORD-FIELD-T-NOT-FOUND";

		$segment_category 	= xredaktor_render::getMultiLangValInclFailOverValueByASandRecord($field_c,$recordData,true,$lang,false);
		$segment_title 		= xredaktor_render::getMultiLangValInclFailOverValueByASandRecord($field_t,$recordData,true,$lang,false);

		$segment_category   = self::burnDownLink($segment_category);
		$segment_title   	= self::burnDownLink($segment_title);

		$url 	= '/'.$lang.self::buildCrumbTree($p_id,$lang,0,1,0,1);
		$url	.= '/'.$segment_category.'/'.$segment_title;

		$cfg['pnu_wz_w_id'] = $w_id;
		$cfg['pnu_wz_r_id'] = $r_id;
		$cfg['pnu_wz_c_id'] = $c_id;
		$cfg['pnu_wz_t_id'] = $t_id;

		$siteSettings = self::getSiteConfigViaPageId($p_id);
		$url .= $siteSettings['s_suffix'];

		self::cache_update($p_id,$lang,$cfg,$url);
		return $url;
	}

	public static function configFailed($msg)
	{
		//die();
		header("HTTP/1.0 503 Service Unavailable");
		die('503 Service Unavailable - '.$msg);
	}

	public static function guessStartPage()
	{
		$config = self::getSiteConfigViaHttpHost();
		$startPage = $config['s_p_id'];
		if (xredaktor_render::getPageById($startPage)===false) {
			self::configFailed('STARTPAGE INVALID');
		}
		return $startPage;
	}

	public static function getStartPageById($p_id)
	{
		$config = self::getSiteConfigViaPageId($p_id);
		$startPage = $config['s_p_id'];
		if ($startPage == -1) return -1;
		if (xredaktor_render::getPageById($startPage)===false) {
			self::configFailed('STARTPAGE INVALID');
		}
		return $startPage;
	}

	public static function guessErrorPage()
	{
		$config = self::getSiteConfigViaHttpHost();

		$errorPage = $config['s_error_p_id'];
		if ($errorPage == -1) return -1;
		if (xredaktor_render::getPageById($errorPage)===false) {
			self::configFailed('ERRORPAGE INVALID');
		}
		return $errorPage;
	}

	public static function getSiteIdViaHttpHost()
	{
		$site = self::getSiteConfigViaHttpHost();
		return intval($site['s_id']);
	}

	public static function getSiteConfigViaPageId($p_id)
	{

		$key = "XR_SITE_SETTINGS";
		$cached = memcachex::get($key);

		if ($cached === false)
		{
			$cached = dbx::query("SELECT * FROM `sites` WHERE s_id = 1");
		}

		memcachex::set($key,$cached);
		return $cached;

		/*
		$p_id = intval($p_id);

		$settings = dbx::query("SELECT sites.* FROM `sites`,`pages` WHERE p_id = $p_id and p_s_id = s_id and s_del = 'N' and s_online = 'Y' and p_del = 'N'");
		if ($settings === false)
		{
		$settings = dbx::query("SELECT * from `pages` WHERE p_id = $p_id and p_del = 'N'");
		if ($settings['p_s_id']==0)
		{

		$settings = array(
		's_error_p_id' => -1,
		's_p_id'	   => -1
		);


		} else
		{
		return false;
		}
		}
		return $settings;

		*/
	}

	public static function getSiteConfigById($s_id)
	{
		$s_id = intval($s_id);
		$settings = dbx::query("SELECT * FROM `sites` WHERE s_id = $s_id and s_del = 'N' and s_online = 'Y'");
		return $settings;
	}

	public static function getSiteIdViaPageId($p_id)
	{
		$p_id = intval($p_id);
		$settings = dbx::query("SELECT sites.* FROM `sites`,`pages` WHERE p_id = $p_id and p_s_id = s_id and s_del = 'N' and s_online = 'Y' and p_del = 'N'");
		if ($settings === false)
		{
			$settings = dbx::query("SELECT * from `pages` WHERE p_id = $p_id and p_del = 'N'");
			if ($settings['p_s_id']==0) return 0;
			return false;
		}
		return $settings['s_id'];
	}

	public static function setSiteConfig($s_id)
	{
		self::$siteDomainSettingsOverrule = intval($s_id);
	}

	public static function getSiteConfigViaHttpHost()
	{
		if (php_sapi_name() == 'cli')
		{
			return 1;			
		}
		
		if (self::$siteDomainSettingsOverrule !== false)
		{
			if (self::$siteDomainSettingsOverrule === 0)
			{
				self::$siteDomainSettings = array('s_error_p_id'=>-1);
			} else
			{
				self::$siteDomainSettings = dbx::query("select sites.* from sites where s_id = '".self::$siteDomainSettingsOverrule."' and s_del = 'N' and s_online = 'Y'");
				if (self::$siteDomainSettings === false)
				{
					frontcontrollerx::json_failure('SiteSettings are invalid.');
				}
			}
		}

		if ((self::$siteDomainSettings === false) && (self::$siteDomainSettingsOverrule === false))
		{
			$host 		= dbx::escape($_SERVER['HTTP_HOST']);
			$settings 	= dbx::query("select sites.* from sites,domains where (d_name = '$host' or d_name = '*.$host') and d_del = 'N' and d_online = 'Y' and d_s_id = s_id  and s_del = 'N' and s_online = 'Y'");
			if ($settings === false) { // subdomain safe ...
				list($subdomain,$subsAndTpl) = explode(".",$host,2);
				$settings 	= dbx::query("select sites.* from sites,domains where d_name = '*.$subsAndTpl' and d_del = 'N' and d_online = 'Y' and d_s_id = s_id  and s_del = 'N' and s_online = 'Y'");
			}

			// fetch default Site Settings if SET ...
			if ($settings === false)
			{
				$settings = dbx::query("select sites.* from sites where s_defaultSite = 'Y' and s_del = 'N' and s_online = 'Y'");
			}

		} else
		{
			$settings = self::$siteDomainSettings;
		}

		// 503 host not found ...
		if ($settings === false)
		{
			self::configFailed('UNKOWN HOST :: '.$_SERVER['HTTP_HOST']);
		} else
		{
			self::$siteDomainSettings = $settings;
		}

		return $settings;
	}

	public static function handleSpecials($url)
	{
		switch ($url)
		{
			case 'start':
			case 'mailer':
			case 'xGo':
			case 'iGuest':
				require_once(dirname(__FILE__).'/../../../xsplash/index.php');
				die();
			case 'xInitXgo':
			case 'xFlushAllTemp':
				xredaktor_core::flushAllTemp();
				xredaktor_core::flushAllTemp();
				die('DONE');
			case 'downloadFile':
				$file = base64_decode($_REQUEST['f']);
				$f = realpath(Ixcore::htdocsRoot . $file);
				if (!file_exists($f)) frontcontrollerx::header404();
				$fSecure = substr($f,strlen(Ixcore::htdocsRoot));
				list($crap,$isThisAStoreDir,$crap2) = explode('/',$fSecure,3);
				$isThisAStoreDir = dbx::escape($isThisAStoreDir);
				$present = dbx::query("select sg_id from storage_groups where sg_dirname = '$isThisAStoreDir'");
				if ($present === false) frontcontrollerx::header404();
				header ("HTTP/1.1 200 OK");
				header("Content-type: ".hdx::getMime($f));
				header("Content-Length: ".filesize($f)); // Dateigröße
				header("Content-Disposition: attachment; filename=\"".basename($f)."\"");
				readfile($f);
				die();
				break;
			default:
				break;
		}
	}

	public static function processURL($url)
	{
		$url333 = $url;

		if ((isset($_REQUEST['p_id'])) || $url == "")
		{
			self::processRequest();
			die();
		}

		self::handleSpecials($url);
		
		//xredaktor_render::setFrontEndConnection();

		self::injcetDefaultLanguage();

		switch ($url)
		{
			case 'robots.txt':
				$siteSettings = self::getSiteConfigViaHttpHost();
				die($siteSettings['s_robots_txt']);
				break;
			case 'humans.txt':
				$siteSettings = self::getSiteConfigViaHttpHost();
				die($siteSettings['s_humans_txt']);
				break;
			default: break;
		}

		$siteSettings = self::getSiteConfigViaHttpHost();

		###################################### CACHE HIT ################################################
		if (($cached=self::cache_exists($url)) !== false) // site specific !
		{
			global $_REQUEST;
			$pnu_settings_unserialized = unserialize($cached['pnu_settings_serialized']);

			/*
			if (trim(strtoupper($pnu_settings_unserialized['lang'])) != 'EN') // HACK !!!!
			{
				$pnu_settings_unserialized['lang'] = 'EN';
				$redirectTo = self::genUrl($pnu_settings_unserialized);
				header("HTTP/1.1 301 Moved Permanently");
				header("location: ".$redirectTo);
				die();
			}
			*/

			self::$currentNiceUrlSettings = $pnu_settings_unserialized;
			$_REQUEST = array_merge($_REQUEST,$pnu_settings_unserialized);
			if ($siteSettings['s_redirectTLP'] == 'Y')
			{
				$redirectTo = trim($siteSettings['s_redirectTLP_domain']);
				if (!self::isHostName($redirectTo))
				{
					header("HTTP/1.1 301 Moved Permanently");
					header("location: ".$redirectTo."/".$url);
					die();
				}
			}

			xredaktor_render::renderPage($cached['pnu_p_id']);
			die();
		}

		###################################### OLD - URLS - HIT ################################################
		$url 		= dbx::escape(rawurldecode($_SERVER['REQUEST_URI']));
		$url2 		= dbx::escape('/'.$url333);


		$pnm_siteId = intval($siteSettings['s_id']);
		$oldUrlMath = dbx::query("select * from pages_niceurls_match where (pnm_url_match = \"$url\" OR pnm_url_match = \"$url2\")and pnm_del = 'N' and pnm_siteId=$pnm_siteId");
		if ($oldUrlMath !== false)
		{
			$pnm_http_code 		= $oldUrlMath['pnm_http_code'];
			$pnm_url_transport 	= $oldUrlMath['pnm_url_transport'];

			switch ($pnm_http_code)
			{
				case 404:



					/*frontcontrollerx::header404();
					die('NOT FOUND ONLY FOR TESTING');*/
					xredaktor_render::jump2nice404();
					die();
					break;
				case 410:
					header("HTTP/1.1 410 Gone");
					$id = xredaktor_niceurl::guessErrorPage();
					xredaktor_render::renderPage($id,false,array(),false);
					die();
					break;
				default:
					header("HTTP/1.1 301 Moved Permanently");
					header("location: ".$pnm_url_transport);
			}
			die();
		}

		###################################### 404 - TLR ################################################


		if ($siteSettings['s_redirectTLP'] == 'Y')
		{
			$redirectTo = trim($siteSettings['s_redirectTLP_domain']);
			if (!self::isHostName($redirectTo))
			{
				header("HTTP/1.1 301 Moved Permanently");
				header("location: ".$redirectTo."/".$_SERVER['REQUEST_URI']);
				die();
			}
		}


		xredaktor_render::jump2nice404();

		###################################### DO THE WORK ################################################

	}

	public static function injcetDefaultLanguage()
	{
		$siteSettings = self::getSiteConfigViaHttpHost();
		if (trim($siteSettings['s_default_lang']) != "")
		{
			xredaktor_pages::$currentLang = strtolower($siteSettings['s_default_lang']);
		}
	}

	public static function processRequest() // ohne URL....
	{
		self::injcetDefaultLanguage();

		$switchHost 	= false;
		$siteSettings 	= self::getSiteConfigViaHttpHost();

		self::injcetDefaultLanguage();

		if ($siteSettings['s_redirectTLP'] == 'Y')
		{
			$redirectTo = trim($siteSettings['s_redirectTLP_domain']);
			if (!self::isHostName($redirectTo))
			{
				$switchHost = true;
			}
		}

		$p_id = frontcontrollerx::getInt('p_id');
		if ($p_id === false) {
			if ($switchHost)
			{
				header("HTTP/1.1 301 Moved Permanently");
				header("location: ".$redirectTo);
				die();
			}

			$p_id = xredaktor_niceurl::guessStartPage();
			if (intval($siteSettings['s_p_id_mobile']) != 0)
			{
				@session_start();
				if ((isset($_REQUEST['noMobileVersion'])) || ($_SESSION['noMobileVersion'] == true))
				{
					$_SESSION['noMobileVersion'] = true;
				} else
				{
					if (libx::isMobileBrowser())
					{
						$p_id = $siteSettings['s_p_id_mobile'];
					}
				}
			}
		}

		xredaktor_render::renderPage($p_id);
	}

	public static function isHostName($checkWithCurrent)
	{
		if ((strpos($checkWithCurrent,'http://')===false)&&(strpos($checkWithCurrent,'https://')===false))
		{
			$checkWithCurrent = "http://".$checkWithCurrent;
		}
		return (strtolower(trim($checkWithCurrent)) == strtolower(self::getHostName()));
	}

	public static function getHostName()
	{
		if ($_SERVER['HTTPS'] == "on") $preFix = "https://";
		else $preFix = "http://";
		$ret = $preFix. $_SERVER['HTTP_HOST'];
		return strtolower($ret);
	}

	public static function checkCache_PAGE_POST($p_id,$newDataRecord,$oldDataRecord)
	{
		$fields = array();
		$flushCache = false;

		$feLanges = xredaktor_pages::getValidLangs();
		foreach ($feLanges as $l)
		{
			$l = strtolower($l);
			$fields[] = 'p_name_'.$l;
			$fields[] = 'p_nice_'.$l;
		}

		$fields[] = "p_name";

		foreach ($fields as $f)
		{
			if ($newDataRecord[$f] != $oldDataRecord[$f]) $flushCache = true;
		}

		if ($flushCache)
		{
			dbx::delete('pages_niceurls',array('pnu_p_id'=>$p_id));
		}

	}

	public static function checkCache_WZ_POST()
	{

	}

}