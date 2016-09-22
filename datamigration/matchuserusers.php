<?
require_once(dirname(__FILE__).'/_includes.php');
require_once(dirname(__FILE__).'/../xgo/xplugs/_includes.php');



$todo = dbx::queryAll("select * from wizard_auto_707 where wz_del='N' AND wz_id > 5000 ");

echo "<br /><br /><br />+++++++++++ start @ ".date("Y-m-d H:i:s");

foreach ($todo as $k => $v) 
{
	$userId = $v['wz_id'];
	
	fe_matching::matchUser2AllUsers($userId);	
	//fe_matching::matchUser2AllRooms($userId);
	
	echo "<br /> <br /> matched $userId";
		
}

echo "<br /><br /><br />+++++++++++ stop @ ".date("Y-m-d H:i:s");
echo "\n\r\n\r DONE";
