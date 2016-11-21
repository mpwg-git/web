<?

require_once(dirname(__FILE__).'/../../xgo/xplugs/xredaktor/_includes.php');
require_once(dirname(__FILE__).'/../PHPReport.php');

$messages = dbx::queryAll("SELECT * FROM chatitems WHERE wz_del = 'N' ORDER BY wz_id ASC");

$header = array(
'ID',
'VON',
'VON VORNAME',
'VON NACHNAME',
'VON EMAIL',
'VON TYPE',
'AN',
'AN VORNAME',
'AN NACHNAME',
'AN EMAIL',
'AN TYPE',
'AM',
'TEXT',
'GELESEN',
'GELÖSCHT',
'LastMailMessageID',
);

$messageData = array();

foreach ($messages as $key => $value)
{
	$ID = intval($value['wz_id']);

	$wz_id = $value['wz_USERID'];
	$wz_f_id = $value['wz_F_USERID'];

	$USER = dbx::query("SELECT * FROM wizard_auto_707 WHERE wz_id = $wz_id");
	$FUSER = dbx::query("SELECT * FROM wizard_auto_707 WHERE wz_id = $wz_f_id");

	$tmp = array(
	"".$ID,
	"".$value['wz_USERID'],
	"".$USER['wz_VORNAME'],
	"".$USER['wz_NACHNAME'],
	"".$USER['wz_EMAIL'],
	"".$USER['wz_TYPE'],
	"".$value['wz_F_USERID'],
	"".$FUSER['wz_VORNAME'],
	"".$FUSER['wz_NACHNAME'],
	"".$FUSER['wz_EMAIL'],
	"".$FUSER['wz_TYPE'],
	"".$value['wz_TIME'],
	"".$value['wz_MESSAGE'],
	"".$value['wz_SEEN'],
	"".$value['wz_DELETED'],
	"".$value['wz_lastMailedMessageId'],
	);

	$messageData[] = $tmp;

}

$filename = 'Messages';


$R=new PHPReport();
$R->load(array(
            'id'=>'Messages',
            'header' => $header,
            'data'=>$messageData,
            'format' => array()
        ));

echo $R->render('excel',$filename);
exit();
