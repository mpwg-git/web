<?
require_once(dirname(__FILE__).'/_includes.php');
require_once(dirname(__FILE__).'/../xgo/xplugs/_includes.php');


die("jjj");

$i = 1000;

while ($i <= 1078)
{
	echo "insert $i";
	
	$insert = array(
		'wz_ROOMID' 	=> $i,
		'wz_STATUS'		=> 'TODO'
	);
	
	dbx::insert("wizard_auto_853", $insert);
	
	$i++;
}
