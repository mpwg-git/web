<?
require_once(dirname(__FILE__).'/_includes.php');
require_once(dirname(__FILE__).'/../xgo/xplugs/_includes.php');

/******************* SETUP ***********************/

$filename	= 'matchingtexts_export.csv'; 
$table		= 'wizard_auto_775';
$fields		= array('wz_id', '_DE_wz_TEXT', '_EN_wz_TEXT', '_RU_wz_TEXT', '_FR_wz_TEXT', '_IT_wz_TEXT', '_RO_wz_TEXT', '_HU_wz_TEXT', '_CZ_wz_TEXT');
$order		= 'wz_sort ASC';

/******************* EXPORT ***********************/ 

$lines 		= array();
$fieldsStr 	= implode(',', $fields); 
$data 		= dbx::queryAll("SELECT $fieldsStr FROM $table WHERE wz_online = 'Y' AND wz_del = 'N' " . ($order ? " ORDER BY $order " : '' ) );

// headerline
$lines[] = array_keys($data[0]);

// records
foreach ($data as $record)
{
	$lines[] = $record;
	
}
 

// mutlilang bom 
$out = "\xEF\xBB\xBF";

// lines out
foreach ($lines as $line)
{
	foreach ($line as $field => $value)
	{
		$out .= $value . ";";		
	}
	$out .= "\r\n";
}

// headers
header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="'.$filename.'"');

// return
die($out);