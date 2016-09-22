<?
require_once(dirname(__FILE__).'/_includes.php');
require_once(dirname(__FILE__).'/../xgo/xplugs/_includes.php');

/******************* SETUP ***********************/
$folder 	= Ixcore::htdocsRoot . '/datamigration/answers_import/';
$table		= 'wizard_auto_756';
$fields		= array('wz_id', '_DE_wz_TEXT', '_EN_wz_TEXT', '_RU_wz_TEXT', '_FR_wz_TEXT', '_IT_wz_TEXT', '_RO_wz_TEXT', '_HU_wz_TEXT', '_CZ_wz_TEXT');

/******************* IMPORT **********************/

// vorsortieren - einfach das neueste .csv file benutzen
$files = array();
foreach (glob($folder . '*.csv') as $filename)
{
	$filemtime = filectime($filename);
	$files[$filemtime] = $filename;
}
ksort($files); 
$newestFile = end($files); 

echo "\n using file: $newestFile dated " . date('Y-m-d H:i:s', filectime($newestFile)); 

$file = file_get_contents($newestFile);

$lines = explode("\r\n", $file); 

foreach ($lines as $line)
{
	$line = explode(';', $line); 
	
	// headerline nicht verarbeiten
	if ($line[0] == $fields[0]) continue;
	
	print_r($line); 
	
}
