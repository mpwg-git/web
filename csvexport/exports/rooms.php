<?

require_once(dirname(__FILE__).'/../../xgo/xplugs/xredaktor/_includes.php');
require_once(dirname(__FILE__).'/../PHPReport.php');

$rooms = dbx::queryAll("SELECT * FROM wizard_auto_809 WHERE wz_id >= 10000 AND wz_online = 'Y' AND wz_del = 'N' and wz_ADMIN > 0 ORDER BY wz_id ASC");

$header = array(
'ID',
'ERSTELLT',
'ADMIN',
'VORNAME',
'NACHNAME',
'EMAIL',
'BESCHRIFTUNG INTERN',
'PROFILBILD',
'GESUCHT',
'FRAUEN IN WG',
'MÄNNER IN WG',
'ALTER VON',
'ALTER BIS',
'ZEITRAUM VON',
'ZEITRAUM BIS',
'MIETE',
'ZIMMERGRÖSSE',
'RAUCHEN ERLAUBT',
'KAUTION',
'ZUSATZKOSTEN',
'HAUSTIERE ERLAUBT',
'NUR VEGETARIER / VEGANER',
'BARRIEREFREI',
'STRASSE',
'NUMMER',
'PLZ',
'ORT',
'LAND',
'LAGE',
'AUSSTATTUNG',
'BESCHREIBUNG',
'BILDER',
'LAST SAVED',
'AKTIV',
'xKALT',
);


$roomData = array();

foreach ($rooms as $key => $value)
{
	$ID = intval($value['wz_id']);
	$land = '';
	$LandID = intval($value['ADRESSE_LAND']);

	$l = dbx::query("SELECT * FROM wizard_auto_716 WHERE wz_id = $LandID");

	$l = xredaktor_wizards::mapLanguageFieldsToNormFields(716,$l);

	if(trim($l['wz_label']) != '')
	{
		$land = trim($l['wz_label']);
	}
	
	$PROFILBILD = (intval($value['wz_PROFILBILD']) == 0) ? 'Nein' : 'Ja';

	$BILDER = dbx::queryAttribute("SELECT COUNT(wz_id) AS cntx FROM wizard_auto_810 WHERE wz_ROOMID = $ID AND wz_del = 'N'","cntx");
	$BILDER = intval($BILDER);
	
	$admin = $value['wz_ADMIN'];

	
	$USER = dbx::query("SELECT * FROM wizard_auto_707 WHERE wz_id = $admin");
	
	$tmp = array(
	"".$ID,
	"".$value['wz_created'],
	"".$value['wz_ADMIN'],
	"".$USER['wz_VORNAME'],
	"".$USER['wz_NACHNAME'],
	"".$USER['wz_EMAIL'],
	"".$value['wz_BESCHRIFTUNG_INTERN'],
	"".$PROFILBILD,
	"".$value['wz_GESCHLECHT_MITBEWOHNER'],
	"".$value['wz_UNREG_F'],
	"".$value['wz_UNREG_M'],
	"".$value['wz_MITBEWOHNER_ALTER_VON'],
	"".$value['wz_MITBEWOHNER_ALTER_BIS'],
	"".$value['wz_ZEITRAUM_VON'],
	"".$value['wz_ZEITRAUM_BIS'],
	"".$value['wz_MIETE'],
	"".$value['wz_GROESSE'],
	"".$value['wz_RAUCHER'],
	"".$value['wz_ABLOESE'],
	"".$value['wz_ZUSATZKOSTEN'],
	"".$value['wz_HAUSTIERE'],
	"".$value['wz_VEGGIE'],
	"".$value['wz_BARRIEREFREI'],
	"".$value['wz_ADRESSE_STRASSE'],
	"".$value['wz_ADRESSE_STRASSE_NR'],
	"".$value['wz_ADRESSE_PLZ'],
	"".$value['wz_ADRESSE_STADT'],
	"".$land,
	"".$value['wz_LAGE'],
	"".$value['wz_AUSSTATTUNG'],
	"".$value['wz_BESCHREIBUNG'],
	"".$BILDER,
	"".$value['wz_lastChanged'],
	"".$value['wz_ACTIVE'],
	"".$value['wz_SOURCE'],
	);

	$roomData[] = $tmp;

}

$filename = 'Rooms';

$R=new PHPReport();
$R->load(array(
            'id'=>'Rooms',
            'header' => $header,
            'data'=>$roomData,
            'format' => array()
        ));

echo $R->render('excel',$filename);
exit();