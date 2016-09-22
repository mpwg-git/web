<?
echo "<h1>xSync Wizards ...</h1>";

require_once(dirname(__FILE__).'/../xcore/xcore.php');
require_once(dirname(__FILE__).'/../xplugs/xredaktor/_includes.php');
require_once(dirname(__FILE__).'/patch/patch_util.php');

patch_util::syncWizards();

die('END');

