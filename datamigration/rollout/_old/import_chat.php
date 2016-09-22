<?

require_once(dirname(__FILE__).'/../_includes.php');

$items = dbx::queryAll("SELECT * FROM wsfdev.chatitems WHERE wz_del = 'N' ORDER BY wz_id");


foreach ($items as $key => $value) {
	
	$userid = $value['wz_USERID'];
	$f_userid = $value['wz_F_USERID'];
	$message = $value['wz_MESSAGE'];

	
	$file = dirname(__FILE__).'/files/chatitems/'.$userid." > ".$f_userid.".txt";
	
	hdx::fwrite($file, $message);
}