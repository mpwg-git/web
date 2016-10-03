<?

require_once(dirname(__FILE__).'/../../xgo/xplugs/xredaktor/_includes.php');
require_once(dirname(__FILE__).'/../PHPReport.php');

$users = dbx::queryAll("SELECT * FROM wizard_auto_707 WHERE wz_online = 'Y' AND wz_del = 'N' ORDER BY wz_id ASC");

$header = array(
'ID',
'TYP',
'VORNAME',
'NACHNAME',
'GESCHLECT',
'GEBURTSDATUM',
'EMAIL',
'TELEFON',
'WOHNSITZLAND',
'BESCHREIBUNG',
'REGISTRIERT',
'PROFILBILD',
'ZIMMER',
'FRAGEN BEANTWORTET',
'BLOCKIERT VON',
'NACHRICHTEN GESENDET',
'NACHRICHTEN ERHALTEN',
'NACHRICHTEN UNGELESEN',
'FAVORIT MARKIERT VON',
'LASTLOGIN',
'EMAIL CONFIRMED',
'AKTIV',
'xKalt',
'EMAILBENACHRICHTIGUNGEN',
'USERDELETE',
'TEMP USER',
'ANSCHREIBEN',
);

$userData = array();

foreach ($users as $key => $value)
{
	$ID = intval($value['wz_id']);
	$land = '';
	$LandID = intval($value['wz_LAND']);

	$l = dbx::query("SELECT * FROM wizard_auto_716 WHERE wz_id = $LandID");

	$l = xredaktor_wizards::mapLanguageFieldsToNormFields(716,$l);

	if(trim($l['wz_label']) != '')
	{
		$land = trim($l['wz_label']);
	}

	$PROFILBILD = (intval($value['wz_PROFILBILD']) == 0) ? 'Nein' : 'Ja';

	$ZIMMER = dbx::queryAttribute("SELECT COUNT(wz_id) AS cntx FROM wizard_auto_809 WHERE wz_ADMIN = $ID","cntx");
	$ZIMMER = intval($ZIMMER);

	$FRAGEN = dbx::queryAttribute("SELECT COUNT(wz_id) AS cntx FROM wizard_auto_765 WHERE wz_USERID = $ID","cntx");
	$FRAGEN = intval($FRAGEN);

	$BLOCKED = dbx::queryAttribute("SELECT COUNT(wz_id) AS cntx FROM wizard_auto_768 WHERE wz_F_USERID = $ID","cntx");
	$BLOCKED = intval($BLOCKED);

	$GESENDET = dbx::queryAttribute("SELECT COUNT(wz_id) AS cntx FROM chatitems WHERE wz_USERID = $ID","cntx");
	$GESENDET = intval($GESENDET);

	$ERHALTEN = dbx::queryAttribute("SELECT COUNT(wz_id) AS cntx FROM chatitems WHERE wz_F_USERID = $ID","cntx");
	$ERHALTEN = intval($ERHALTEN);

	$UNGELESEN = dbx::queryAttribute("SELECT COUNT(wz_id) AS cntx FROM chatitems WHERE wz_F_USERID = $ID AND wz_SEEN = 'N'","cntx");
	$UNGELESEN = intval($UNGELESEN);

	$FAVORIT = dbx::queryAttribute("SELECT COUNT(wz_id) AS cntx FROM wizard_auto_767 WHERE wz_F_USERID = $ID","cntx");
	$FAVORIT = intval($FAVORIT);
	
	$xKALT = dbx::query("SELECT * FROM wizard_auto_809 WHERE wz_ADMIN = $ID and wz_SOURCE = 'wg-gesucht'");
	
	$ANSCHREIBEN = 'N';
	
	if($value['wz_MAIL_CHECKED'] == 'Y' && $value['wz_ACTIVE'] == 'Y' && $value['wz_USERDEL'] == 'N' && $value['wz_EMAILBENACHRICHTIGUNG'] != 'KEINE' && $value['wz_IS_TMP_USER'] != 'Y')
	{
		$ANSCHREIBEN = 'Y';
	}

	
	
	$tmp = array(
	"".$ID,
	"".$value['wz_TYPE'],
	"".$value['wz_VORNAME'],
	"".$value['wz_NACHNAME'],
	"".$value['wz_GESCHLECHT'],
	"".$value['wz_GEBURTSDATUM'],
	"".$value['wz_EMAIL'],
	"".$value['wz_TELEFON'],
	"".$land,
	"".$value['wz_BESCHREIBUNG'],
	"".$value['wz_created'],
	"".$PROFILBILD,
	"".$ZIMMER,
	"".$FRAGEN,
	"".$BLOCKED,
	"".$GESENDET,
	"".$ERHALTEN,
	"".$UNGELESEN,
	"".$FAVORIT,
	"".$value['wz_LASTLOGIN'],
	"".$value['wz_MAIL_CHECKED'],
	"".$value['wz_ACTIVE'],
	"".$xKALT['wz_SOURCE'],
	"".$value['wz_EMAILBENACHRICHTIGUNG'],
	"".$value['wz_USERDEL'],
	"".$value['wz_IS_TMP_USER'],
	"".$ANSCHREIBEN,
	);

	$userData[] = $tmp;
}

$filename = 'User';

$R=new PHPReport();
$R->load(array(
            'id'=>'User',
            'header' => $header,
            'data'=>$userData,
            'format' => array()
        ));

echo $R->render('excel',$filename);
exit();
