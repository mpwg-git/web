<?

require_once(dirname(__FILE__).'/_includes.php');
require_once(dirname(__FILE__).'/../xgo/xplugs/_includes.php');


// TODO 
// $server = $_SERVER;
// IF preg_match "/wsfdev/i"  $server['DOCUMENT_ROOT'] &&  [HTTP_HOST] => www.meineperfektewg.com ==> DB == wsfdev
// OR pre ....


function getAllMessages()
{
	$db = "wsfbeta";
	
	$data = dbx::queryAll("SELECT wz_USERID, wz_F_USERID FROM `$db`.chatitems GROUP BY wz_USERID DESC");	

	$html = "";
			
	foreach ($data as $key => $value)
	{
		$userId	 = intval($value['wz_USERID']);
		$fUserId = intval($value['wz_F_USERID']);
		
		$sql = dbx::queryAll("SELECT wz_USERID, wz_F_USERID, wz_MESSAGE FROM `$db`.chatitems WHERE(((wz_USERID = '$userId') AND (wz_F_USERID = '$fUserId')) OR ((wz_USERID = '$fUserId') AND (wz_F_USERID = '$userId')))");

		echo "CHAT CONVERSATION $key";
		echo "<pre>";
		print_r($sql);
		echo "</pre>";

	}
	die();
}


if(libx::isDeveloper())
{
	//echo "<pre>";
	//print_r($_SERVER);
	//echo "</pre>";
	getAllMessages();
}
else {
	echo "IP IS NOT REGISTERED AS DEVELOPER-IP";
}
