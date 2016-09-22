<?
echo "<h1>patch all databases ...</h1>";

require_once(dirname(__FILE__).'/../xcore/xcore.php');
require_once(dirname(__FILE__).'/../xplugs/xredaktor/_includes.php');
require_once(dirname(__FILE__).'/patch/patch_util.php');

$changeTables = dbx::queryAll("

SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = 'xgoshop'

");

if ($changeTables === false) $changeTables = array();
foreach ($changeTables as $c)
{
	$table = $c['TABLE_NAME'];
	echo "$table \n";
	dbx::query("ALTER TABLE `$table` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
	dbx::query("ALTER TABLE `$table` ENGINE = INNODB");
	dbx::query("OPTIMIZE TABLE `$table` ");
};





