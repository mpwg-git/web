<?

require_once(dirname(__FILE__).'/../xgo/xplugs/xredaktor/_includes.php');
require_once(dirname(__FILE__).'/PHPReport.php');

$von = trim($_REQUEST['von']);
$bis = trim($_REQUEST['bis']);

$vonExp = explode('-', $von);
$bisExp = explode('-', $bis);

if(count($vonExp) != 3)
{
	$von = date('Y-m-d',time());
}

if(count($bisExp) != 3)
{
	$bis = date('Y-m-d',time());
}

$von = dbx::escape($von);
$bis = dbx::escape($bis);

$sql = "SELECT * FROM xp_brochure_requests WHERE DATE(wz_created) >= '$von' AND DATE(wz_created) <= '$bis' AND wz_id > 15 ORDER BY wz_id ASC";

$data = dbx::queryAll($sql);

if($data === false)
{
	$data = array();
}

foreach ($data as $key => $value) 
{
	$anrede = intval($value['wz_ANREDE']);
	
	if($anrede == 0)
	{
		$anrede = 1;
	}
	
	$anredeData = dbx::query("SELECT * FROM fe_salutations WHERE wz_id = $anrede");
	$anredeData = xredaktor_wizards::mapLanguageFieldsToNormFields(1171,$anredeData);
	
	$data[$key]['wz_ANREDE'] = trim($anredeData['wz_ANREDE']);
	
	$empfehlung = intval($value['wz_EMPFEHLUNG']);
	
	if($empfehlung == 0)
	{
		$empfehlung = 1;
	}
	
	$empfehlungData = dbx::query("SELECT * FROM wizard_auto_1237 WHERE wz_id = $empfehlung");
	$empfehlungData = xredaktor_wizards::mapLanguageFieldsToNormFields(1237,$empfehlungData);
	
	$data[$key]['wz_EMPFEHLUNG'] = trim($empfehlungData['wz_NAME']);
}

//print_r($data);

$csvData = array();
		
$header = array('NUMMER','SPRACHE','ANREDE','VORNAME','NACHNAME','STRASSE','STRASSENR','PLZ','ORT','LAND','EMAIL','TELEFON','EMPFEHLUNG','EMPFEHLUNG_ANDERES');
	
//$csvData[] = implode(";",$header);
//$csvData[] = $header;

$fields = array('id','SPRACHE_PROSPEKT','ANREDE','VORNAME','NACHNAME','STRASSE','STRASSENR','PLZ','ORT','LAND','EMAIL','TELEFON','EMPFEHLUNG','EMPFEHLUNG_ANDERES');
		
foreach ($data as $i=>$d)
{
	$tmp = array();
	foreach ($fields as $f)
	{
		if($f == 'TELEFON' || $f == 'STRASSENR')
		{
			$tmp[] = " ".$d['wz_'.$f];
		}
		else 
		{
			$tmp[] = $d['wz_'.$f];
		}
		
	}
	//$csvData[] = implode(";",$tmp);
	$csvData[] = $tmp;
}

$filename = 'Katalogbestellungen_'.$von.'-'.$bis.'.csv';

$R=new PHPReport();
$R->load(array(
            'id'=>'Katalogbestellungen',
            'header' => $header,
            'data'=>$csvData
        ));

echo $R->render('excel',$filename);
exit();

/*
//$csvData = implode("\n",$csvData);

$filename = 'Katalogbestellungen_'.$von.'-'.$bis.'.csv';

//hdx::csvContentDownload($csvData,$filename);

function array2csv(array &$array)
{
	ob_start();
	$df = fopen("php://output", 'w');
	fprintf($df, chr(0xEF).chr(0xBB).chr(0xBF));
	//fputcsv($df, array_keys(reset($array)));
	foreach ($array as $row) {
		fputcsv($df, $row, ';');
	}
	fclose($df);
	
	return ob_get_clean();
}

function download_send_headers($filename) 
{
	// disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}

download_send_headers($filename);
echo array2csv($csvData);
die();
*/