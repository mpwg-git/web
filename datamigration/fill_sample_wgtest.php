<?
require_once(dirname(__FILE__).'/_includes.php');
require_once(dirname(__FILE__).'/../xgo/xplugs/_includes.php');

dbx::query("TRUNCATE wizard_auto_765");

$users = dbx::queryAll("select wz_id from wizard_auto_707 where 1");

foreach ($users as $k => $v) {
	$id = intval($v['wz_id']);
	sampledata::fillWgTestAnswers($id);	
}



echo "\n\r\n\r DONE";
