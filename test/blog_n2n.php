<?
require_once(dirname(__FILE__) .  '/../xsite/_includes.php');

//$_REQUEST['blogcat-1'] = 2;
//$_REQUEST['blogcat-2'] = 4;
 
echo "SELECTED IDs: " . implode(',', $_REQUEST)  ."\n"; 

$blogEntries = fe_blog::ajax_getFiltered();



