<?
require_once(dirname(__FILE__).'/../../xplugs/xredaktor/_includes.php');

$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

xredaktor_core::checkUserAccessViaLoginForm($user,$pass);