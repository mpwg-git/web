<?
require_once(dirname(__FILE__).'/_includes.php');
require_once(dirname(__FILE__).'/../xgo/xplugs/_includes.php');

############################ User Matching ############################################

dbx::update("wizard_auto_845", array('wz_STATUS' => 'SCHEDULED', 'wz_WORKING_TS' => 'NOW()'), array('wz_STATUS' => 'TODO'));
$todo = dbx::queryAll("select wz_id, wz_USERID from wizard_auto_845 where wz_STATUS = 'SCHEDULED' and wz_del='N' ");

echo "\n\n Process User Matches"; 

$user_ids = array();

foreach ($todo as $k => $v) 
{
	$userId 	= intval($v['wz_USERID']);
	
	if ($userId == 0) 				  continue;
	//if (in_array($userId, $ids_done)) continue;
	
	// re-check status
	$status = dbx::queryAttribute("SELECT wz_STATUS FROM wizard_auto_845 WHERE wz_id = " . $v['wz_id'], 'wz_STATUS');
	if ($status != 'SCHEDULED') continue; 
	
	dbx::update("wizard_auto_845", array('wz_STATUS' => 'WORKING', 'wz_WORKING_TS' => 'NOW()'), array('wz_USERID' => $userId));
	//die(); 
	
	fe_matching::matchUser2AllUsers($userId);
	echo "\n";
	
	 
	dbx::update("wizard_auto_845", array('wz_STATUS' => 'DONE', 'wz_WORKING_TS' => 'NOW()' ), array('wz_USERID' => $userId));	
	$user_ids[] = $userId;
}

foreach ($user_ids as $userId)
{
	fe_matching::matchUser2AllRooms($userId);
	echo "\n";
}

echo "\n\r\n\r DONE Users \n\n\n";




############################ ROOM Matching ############################################

dbx::update("wizard_auto_853", array('wz_STATUS' => 'SCHEDULED', 'wz_WORKING_TS' => 'NOW()'), array('wz_STATUS' => 'TODO'));
$todo = dbx::queryAll("select wz_id, wz_ROOMID from wizard_auto_853 where wz_STATUS = 'SCHEDULED' and wz_del='N' ");

echo "\n\n Now process rooms"; 

$ids_done = array();

foreach ($todo as $k => $v) 
{
	$roomId = intval($v['wz_ROOMID']);
	
	if ($roomId == 0) 					continue;
	if (in_array($roomId, $ids_done)) 	continue;
	 
	// re-check status
	$status = dbx::queryAttribute("SELECT wz_STATUS FROM wizard_auto_853 WHERE wz_id = " . $v['wz_id'], 'wz_STATUS');
	if ($status != 'SCHEDULED') continue; 
	
	dbx::update("wizard_auto_853", array('wz_STATUS' => 'WORKING', 'wz_WORKING_TS' => 'NOW()'), array('wz_ROOMID' => $roomId));
	  
	fe_matching::matchRoom2AllUsers($roomId);
	echo "\n";



	dbx::update("wizard_auto_853", array('wz_STATUS' => 'DONE', 'wz_WORKING_TS' => 'NOW()'), array('wz_ROOMID' => $roomId));
	$ids_done[] = $roomId;
}

echo "\n\r\n\r DONE Rooms";


