<?
echo "<h1>xGo-Patching ...</h1>";

require_once(dirname(__FILE__).'/../xcore/xcore.php');
require_once(dirname(__FILE__).'/../xplugs/xredaktor/_includes.php');
require_once(dirname(__FILE__).'/patch/patch_util.php');
$old_storage_root = "/gitgo/web/web_83/web"; 
patch_util::doAll($old_storage_root);

die('END');

