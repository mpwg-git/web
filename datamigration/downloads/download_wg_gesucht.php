<?


require_once(dirname(__FILE__).'/../_includes.php');

$links = array();

for ($i=0;$i<=35;$i++)
{
	$links[] = 	"http://www.wg-gesucht.de/wg-zimmer-in-Wien.163.0.0.$i.html";
}


function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	curl_setopt ($ch, CURLOPT_COOKIEJAR, dirname(__FILE__).'/cookie.txt');
	curl_setopt ($ch, CURLOPT_COOKIEFILE, dirname(__FILE__).'/cookie.txt');

	//curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.0');

	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}



foreach ($links as $i => $l)
{
	//$l = "http://www.orf.at";

	$md5 	= md5($l);
	$dl_f 	= dirname(__FILE__).'/cache/'.$md5.".html";

	if (!file_exists($dl_f))
	{
		$html = get_data($l);
		//sleep(1);
		hdx::fwrite($dl_f,$html);
	}

	//if ($i > 2) die();
}




libx::load_phpQuery();


$zimmer = array();

foreach ($links as $l)
{

	$md5 	= md5($l);
	$dl_f 	= dirname(__FILE__).'/cache/'.$md5.".html";

	$html = hdx::fread($dl_f);
	$html_md5 = md5($html);

	//echo "Processing $l [$md5] ($html_md5)\n";

	$doc = phpQuery::newDocument($html);
	phpQuery::selectDocument($doc);

	foreach(pq('#table-compact-list tr td a') as $link) {

		$link = trim(pq($link)->attr('href'));
		if (strpos($link,"wg-zimmer-in-Wien-") !== false)
		{
			if (!in_array($link,$zimmer))
			{
				$zimmer[] = $link;
			}
		}
	}
}


function cleanHtml($html)
{
	$html = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $html);
	$html = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $html);
	$html = strip_tags($html,"<b><span><br>");
	return $html;
}

function strictClean($html)
{
	$html = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $html);
	$html = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $html);
	$html = strip_tags($html);
	$html = str_replace("\n"," ",$html);
	$html = str_replace("\t"," ",$html);
	$html = preg_replace('!\s+!', ' ', $html);
	return trim($html);
}

function downloadImages($images)
{
	if (count($images)==0) return array();

	$imgs = array();
	foreach ($images as $i)
	{
		$i = str_replace("https","http",$i);
		$ext 	= array_pop(explode('.',$i));
		$md5 	= "_v3-".md5($i).'.'.$ext;

		$cache_file = realpath(dirname(__FILE__).'/../../xstorage/downloads').'/'.$md5;

		if (!file_exists($cache_file))
		{
			$imageString = file_get_contents($i);
			
			if (trim($imageString) != '' && $imageString != false)
			{
				$save = file_put_contents($cache_file,$imageString);
				echo "\n download $cache_file ";
			}
			else
			{
				if ($imageString === false)
				{
					echo "\nERROR: image string false -> $i";
				}
				if (trim($imageString) == '')
				{
					echo "\nERROR: image string false -> $i";
				}
			}

		}

		if (file_exists($cache_file))
		{
			$imgs[] = xredaktor_storage::registerExistingFile(1,$cache_file);
			echo "\r register $cache_file ";
		}

	}

	return $imgs;
}

function getNumbersFromString($txt)
{
	return str_replace('-','',filter_var($txt, FILTER_SANITIZE_NUMBER_INT));
}

function processRoom($l)
{
	$dl_f = dirname(__FILE__).'/zimmer/'.basename($l);
	$html = hdx::fread($dl_f);


	$doc = phpQuery::newDocument($html);
	phpQuery::selectDocument($doc);

	//////////////////// Images
	$images = array();
	foreach(pq('img') as $img) {

		$data_large = trim(pq($img)->attr('data-large'));
		if (strpos($data_large,"https://img.wg-gesucht.de") !== false)
		{
			if (!in_array($data_large,$images))
			{
				$images[] = $data_large;
			}
		}
	}

	//////////////////// AnzeigenText
	$anzeigentext = array();
	foreach(pq('.panel.panel-default.panelToTranslate .wordWrap') as $txt) {
		$anzeigentext[] = pq($txt)->html();
	}
	$anzeigentext = cleanHtml(implode("",$anzeigentext));


	//////////////////// AngabenObjekt
	$angabenObjekt = array();
	foreach(pq('.panel.panel-default table tr') as $tr) {

		$k = "";
		$v = "";

		foreach(pq('td',$tr) as $i => $td) {

			if (pq($td)->attr('colspan')==2)
			{
				$split = pq($td)->html();
				list($k,$v) = explode(":",$split,2);

				$k = strictClean($k);
				$v = strictClean($v);

			} else
			{
				switch ($i)
				{
					case 0:
						$k = strictClean(pq($td)->html());
						$k = str_replace(":","",$k);
						break;
					case 1:
						$v = strictClean(pq($td)->html());
						break;
					default: break;
				}
			}
		}

		$angabenObjekt[$k] = $v;
	}

	//////////////////// WG-Details
	$details = array();
	foreach(pq('.panel.panel-default ul.ul-detailed-view-datasheet') as $ulset) {

		$k = strictClean(pq($ulset)->prev('h4')->html());
		foreach(pq('li',$ulset) as $li) {
			if (!isset($details[$k])) $details[$k] = array();
			$details[$k][] = strictClean(pq($li)->html());
		}

	}

	//////////////////// Div:
	$search = array(


	'Adresse' => array(
	'find' 		=> 'h3.headline.headline-detailed-view-panel-title',
	'search'	=> 'Adresse',
	'get' 		=> 'p',
	'kick'		=> 'Umzugsfirma beauftragen1'
	)
	
	);

	$searchObject = array();
	foreach ($search as $key => $cfg)
	{

		$find 	= $cfg['find'];
		$search = $cfg['search'];
		$get 	= $cfg['get'];
		$kick 	= $cfg['kick'];

		foreach(pq($find) as $ulset) {
			$k = strictClean(pq($ulset)->html());
			if ($k != $search) continue;
			$v = strictClean(pq($ulset)->next($get)->html());
			$v = str_replace($kick,'',$v);
			$searchObject[$key] = $v;
		}
	}

	list($ad_zip,$ad_city,$ad_dist,$ad_street,$ad_street_nr) = explode(' ',$searchObject['Adresse'],6);

	$id = str_replace('-','',filter_var($l, FILTER_SANITIZE_NUMBER_INT));

	$room = array();

	$room['source']			= 'wg-gesucht';
	$room['id']				= $id;
	$room['images'] 		= $images;
	$room['anzeigenText'] 	= $anzeigentext;
	$room['angabenObjekt'] 	= $angabenObjekt;
	$room['details'] 		= $details;
	$room['search'] 		= $searchObject;
	$room['ad_street'] 		= $ad_street;
	$room['ad_street_nr']	= $ad_street_nr;
	$room['ad_zip']			= $ad_zip;
	$room['ad_city']		= $ad_city;

	$room['key'] = array();

	//	header('Content-Type: text/html; charset=utf-8');
	
	$key_facts = pq("h1.headline.headline-orange.headline-key-facts")->text(); 
	$key_facts = preg_replace('!\s+!', ' ', $key_facts);
	$key_facts = explode(utf8_decode('Â'),$key_facts);

	foreach ($key_facts as $key)
	{

		list($k,$v) = explode(":",$key);

		$k = trim(strictClean($k));
		$v = trim(strictClean($v));
		$k = strtolower(trim(filter_var($k,FILTER_SANITIZE_URL,FILTER_FLAG_ENCODE_AMP)));
		if ($v == "") continue;
		$room['key'][$k] = $v;
	}

	$room['key_size']		= getNumbersFromString($room['key']['zimmergröße']);
	$room['key_total']		= getNumbersFromString($room['key']['gesamtmiete']);


	$wz_source_id 	= $room['id'];
	$wz_source 		= $room['source'];

	$present = dbx::query("select * from wizard_auto_858 where wz_del='N' and wz_source_id = $wz_source_id and wz_source='$wz_source'");
	
	// WG ZIMMER GRÖSSE
	$RoomSize = $room['details']['Die WG'];
	$newRoomSize = substr($RoomSize[0], 0, 2);
	
	// MIETE
	$wz_miete = intval($room['angabenObjekt']['Miete']);
	if ($wz_miete == 0 || $wz_miete === 0)
		$wz_miete = intval($room['angabenObjekt']['Miete pro Tag']);
	
	
	
	$db = array(
	'wz_source' 	=> $wz_source,
	'wz_source_id' 	=> $wz_source_id,
	'wz_url' 		=> $l,
	'wz_images_cnt'	=> count($images),
	'wz_images'		=> json_encode(downloadImages($images)),
	'wz_json_cfg'	=> json_encode($room),
	//'wz_size'		=> $room['key_size'],
	'wz_size'		=> $newRoomSize,
	'wz_total'		=> $wz_miete,
	//'wz_total'		=> $room['angabenObjekt']['Miete'],
			
	);


	

	if ($present === false)
	{
		$db['wz_created'] = 'NOW()';
		dbx::insert('wizard_auto_858',$db);

	} else
	{
		$wz_id = intval($present['wz_id']);
		dbx::update('wizard_auto_858',$db,array('wz_id'=>$wz_id));
	}
	
	
}


$download = 0;
foreach ($zimmer as $l)
{

	$dl_f = dirname(__FILE__).'/zimmer/'.basename($l);
	if (!file_exists($dl_f))
	{
		$download++;
		$html = get_data('http://www.wg-gesucht.de/'.$l);
		//sleep(1);
		hdx::fwrite($dl_f,$html);
	}

	//if ($download > 40) die();
	//echo "Processing $l\n";

	processRoom($l);
}

//processRoom('wg-zimmer-in-Wien-Favoriten.4898434.html');
//processRoom('wg-zimmer-in-Wien-Margareten.5345257.html');




