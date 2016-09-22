<?
die();

require_once(dirname(__FILE__).'/../xcore/xcore.php');
require_once(dirname(__FILE__).'/../xplugs/xredaktor/_includes.php');
require_once(dirname(__FILE__).'/patch/install_util.php');


if (!libx::isCli())
{
	die('ONLY VIA CLI :-)');
}

install_util::updateAccessControll();

/*
$setupMysql = true;
if ($setupMysql)
{

	$user 		= Ixcore::DB_USER;
	$pwd 		= Ixcore::DB_PWD ;
	$db_name	= Ixcore::DB_NAME ;
	
	
	mysql -u root -p[root_password] [database_name] < dumpfilename.sql
}

*/

dbx::query("TRUNCATE TABLE  `assets_compressed`;");
$path = Ixcore::htdocsRoot ;
echo "\n\n################## Please chown web DIR!\nchown [?]:[?] $path/* -R\n\n"; 