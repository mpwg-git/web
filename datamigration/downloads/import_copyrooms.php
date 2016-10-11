<?

require_once(dirname(__FILE__).'/../_includes.php');

//$copyRooms = dbx::queryAll("SELECT * FROM wizard_auto_858 WHERE wz_images_cnt != '0' ORDER BY wz_created DESC");
$copyRooms = dbx::queryAll("SELECT * FROM wizard_auto_858 WHERE wz_images_cnt != '0' ORDER BY wz_created DESC");


 foreach ($copyRooms as $room)
{
	$source 		= $room['wz_source'];
	$source_id 	= $room['wz_source_id'];
	$exists 		= dbx::query("SELECT wz_id, wz_ADRESSE_LAT, wz_ADRESSE_LNG FROM wizard_auto_809 WHERE wz_FROM_IMPORT = 'Y' AND wz_SOURCE = '$source' AND wz_SOURCE_ID = '$source_id' ");

	$roomData = json_decode($room['wz_json_cfg'], true);


/////////// ABLÖSE / KAUTIONS
	$wz_abloese = intval(str_replace('-','',filter_var($roomData['angabenObjekt']['Kaution'], FILTER_SANITIZE_NUMBER_INT)));

	if(is_int($wz_abloese) && $wz_abloese != 0){
		$wz_abloese = 'Y';
	}
	else
	{
		$wz_abloese = 'N';
	}


////////// MITBEWOHNER
	$bewohner = $roomData['details']['Die WG']['2'];
	$exBewohner = explode(" ", $bewohner);

	$frau = intval(preg_replace('/\(/', '', $exBewohner['2']));
	$mann = intval($exBewohner['5']);


////////// MITBEWOHNER ALTER
	$bewohnerAlter = $roomData['details']['Die WG']['3'];
	$explode = explode(" ", $bewohnerAlter);

	$alterVon = $explode[1];
	$alterBis = $explode[3];
	//wenn Bewohneralter im Format: "bis XX Jahre"
	if($explode[1] == "bis")
	{
		$alterBis=$explode[2];
		$alterVon=1;
	}
	if($explode[1] == "ab")
	{
		$alterVon=$explode[2];
		$alterBis=99;
	}
	if($alterVon == '' && $alterBis == '')
	{
		$alterVon = 1;
		$alterBis = 99;
	}

	//$stripText = strip_tags($roomData['anzeigenText']);
	$splitText = utf8_decode($roomData['anzeigenText']);

	$splitText = explode("<b>",$splitText);



	$db = array(
		'wz_FROM_IMPORT'				=> 'Y',

		'wz_GROESSE' 					=> intval($room['wz_size']),
		'wz_MIETE'						=> intval($room['wz_total']),
		//'wz_BESCHREIBUNG'				=> strip_tags($roomData['anzeigenText']),
		'wz_BESCHREIBUNG'				=> strip_tags($splitText[3]) . strip_tags($splitText[4]),
		//'wz_BESCHREIBUNG_PREMIUM'	=> $roomData['anzeigenText'],
		'wz_BESCHREIBUNG_PREMIUM'	=> strip_tags($splitText[3]) . strip_tags($splitText[4]),
		'wz_ADRESSE' 					=> $roomData['search']['Adresse'],

		'wz_HAUSTIERE'					=> 'X',
		'wz_VEGGIE'						=> 'X',
		'wz_RAUCHER'					=> 'X',
		'wz_ABLOESE'					=> $wz_abloese,
		'wz_GESCHLECHT_MITBEWOHNER' => 'X',

		'wz_PROFILBILD' 				=> intval($roomData['images'][0]),
		'wz_ACTIVE' 					=> 'N',
		'wz_COUNT_MITBEWOHNER' 		=> intval($mann + $frau), //4,
		'wz_COUNT_MITBEWOHNER_M' 	=> $mann, //2,
		'wz_COUNT_MITBEWOHNER_F' 	=> $frau, //2,
		//'wz_UNREG_M' 				=> X, //2,
		//'wz_UNREG_F' 				=> X, //2,
		'wz_SOURCE'						=> $roomData['source'],
		'wz_SOURCE_ID'					=> $roomData['id'],
		'wz_COPY_ID'					=> $room['wz_id'],

		'wz_LAGE'						=> strip_tags(preg_replace('/\bLage\b/','',$splitText[2])),

		'wz_MITBEWOHNER_ALTER_VON'	=> $alterVon,
		'wz_MITBEWOHNER_ALTER_BIS'	=> $alterBis
	);


	// verfügbarkeit
	preg_match_all('/(\d+\.\d+\.\d+)/', $roomData['search']['Verfügbarkeit'], $matches);

	if ($matches[0][0] != "") {
		$db['wz_ZEITRAUM_VON'] = date('Y-m-d', strtotime($matches[0][0]));
	}
	if ($matches[0][1] != "") {
		$db['wz_ZEITRAUM_BIS'] = date('Y-m-d', strtotime($matches[0][1]));
	}

	// reverse geocode
	if (
		($exists !== false && floatval($exists['wz_ADRESSE_LAT']) == 0 && floatval($exists['wz_ADRESSE_LNG']) == 0)
		||
		$exists === false
	) {
		$ort 	= $roomData['ad_city'];
		$plz 	= $roomData['ad_zip'];
		$street = $roomData['ad_street'] . ' ' . $roomData['ad_street_nr'];
		$geo 	= fe_room::getLatLongByAdress($street, $plz, $ort);

		if (floatval($geo['lat']) > 0 && floatval($geo['long']) > 0) {
			echo "\n got lat lng ";
			$db['wz_ADRESSE_LAT'] = $geo['lat'];
			$db['wz_ADRESSE_LNG'] = $geo['long'];
		}
	}

	// room insert/update
	if ($exists !== false)
	{
		dbx::update('wizard_auto_809', $db, array('wz_id' => $exists['wz_id']));
		echo "\r updated " . $roomData['source'] . ' ' . $roomData['id'];
		$roomId = $exists['wz_id'];
	}
	else
	{
		$db['wz_online']  = 'Y';
		$db['wz_created'] = 'NOW()';
		$db['wz_HASH']    = md5(rand(5, 999999999) . microtime(1) . $room['wz_source'] . $room['wz_source_id']);
		dbx::insert('wizard_auto_809', $db);
		echo "\n insert " . $roomData['source'] . ' ' . $roomData['id'];
		$roomId = dbx::getLastInsertId();
	}

	// PNU entry erzeugen..
	$url = xredaktor_niceurl::genUrl(array('p_id' => 13, 'm_suffix' => $roomId, 'id' => $roomId));

	// have room id now - images insert/update
	$roomImgs = json_decode($room['wz_images'], true);
	foreach ($roomImgs as $img_s_id)
	{
		$img_s_id = intval($img_s_id);
		if ($img_s_id == 0) continue;

		$imgExists = dbx::query("SELECT wz_id FROM wizard_auto_810 WHERE wz_S_ID = $img_s_id AND wz_ROOMID = $roomId ");

		$dbImg = array(
			'wz_ROOMID' => $roomId,
			'wz_S_ID'	=> $img_s_id
		);

		if ($imgExists !== false) {
			dbx::update('wizard_auto_810', $dbImg, array('wz_id' => $imgExists['wz_id']));
			echo "\r img updated ";
		}
		else
		{
			$dbImg['wz_created'] = 'NOW()';
			$dbImg['wz_online']  = 'Y';

			dbx::insert('wizard_auto_810', $dbImg);
			echo "\n img added ";
		}
	}
}


function getNumerics ($str) {
	preg_match_all('/\d+/', $str, $matches);
	return $matches[0];
}



echo "\nENDE IMPORT COPYROOMS\n\n";
