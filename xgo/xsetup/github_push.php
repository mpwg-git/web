<?

die();

require_once(dirname(__FILE__).'/../xcore/xcore.php');
require_once(dirname(__FILE__).'/../xplugs/xredaktor/_includes.php');

if (!libx::isCli())
{
	die('ONLY VIA CLI :-)');
}

if (getcwd() != "/srv/gitgo_daten/www/edge.v6.donefor.me/web/xgo/xsetup")
{
	die('INVALID XGO.');
}

$commands = array(

"git add . ".Ixcore::htdocsRoot ,
"git add -u . ".Ixcore::htdocsRoot ,
"git commit -m'ups'",
"git push origin"

);

echo "\n###### Pushing this xgo to github ...."; 

foreach ($commands as $cmd)
{
	echo "\nCMD: $cmd\n"; 
	system($cmd.' 2>&1 ');
}


echo "\nEND.\n"; 
die();
