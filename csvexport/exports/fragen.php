<?

require_once(dirname(__FILE__).'/../../xgo/xplugs/xredaktor/_includes.php');
require_once(dirname(__FILE__).'/../PHPReport.php');

$header = array('USER ID');

$mapperABC = array('A','B','C');

$frageAntwort = array();

$fragen = dbx::queryAll("SELECT wz_id FROM wizard_auto_755 where wz_del='N' and wz_online = 'Y' order by wz_id ASC");

foreach ($fragen as $key => $value) 
{
	$frage_id = intval($value['wz_id']);
	
	$header[] = "FRAGE".$frage_id."-ICH";
	$header[] = "FRAGE".$frage_id."-DU";
	$header[] = "FRAGE".$frage_id."-GEW";
	
	$options	= dbx::queryAll("select wz_id from wizard_auto_756 where wz_FRAGE_ID = $frage_id and wz_del='N' and wz_online = 'Y' order by wz_sort asc");
	
	$frageAntwort[$frage_id] = array();
	
	foreach ($options as $k => $v) 
	{
		$antwort_id = intval($v['wz_id']);
		
		$frageAntwort[$frage_id][$antwort_id] = $mapperABC[$k];
	}
}

$users = dbx::queryAll("SELECT wz_USERID FROM wizard_auto_765 GROUP BY wz_USERID ORDER BY wz_id ASC");

$userData = array();

foreach ($users as $key => $user) 
{
	$wz_USERID = intval($user['wz_USERID']);
	
	if($wz_USERID == 0)
	{
		continue;
	}
	
	$tmp = array($wz_USERID);
	
	foreach ($frageAntwort as $k => $v) 
	{
		$data = dbx::query("SELECT * FROM wizard_auto_765 WHERE wz_USERID = $wz_USERID AND wz_FRAGE_ID = $k ORDER BY wz_id ASC");
		
		if($data === false || $data === NULL)
		{
			$tmp[] = "";
			$tmp[] = "";
			$tmp[] = "";
		}
		else
		{
			$wz_ANTWORT_BIN 	= intval($data['wz_ANTWORT_BIN']);
			$wz_ANTWORT_SUCHE 	= intval($data['wz_ANTWORT_SUCHE']);
			$wz_ANTWORT_WICHTIG = intval($data['wz_ANTWORT_WICHTIG']);
			
			$tmp[] = $frageAntwort[$k][$wz_ANTWORT_BIN];
			$tmp[] = $frageAntwort[$k][$wz_ANTWORT_SUCHE];
			$tmp[] = $wz_ANTWORT_WICHTIG;
		}
		
	}	
	
	$userData[] = $tmp;
}

$filename = 'Fragen';

$R=new PHPReport();
$R->load(array(
            'id'=>'Fragen',
            'header' => $header,
            'data'=>$userData
        ));

echo $R->render('excel',$filename);
exit();
