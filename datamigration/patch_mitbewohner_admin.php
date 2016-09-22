<?
require_once(dirname(__FILE__) . '/_includes.php');

$rooms = dbx::queryAll("SELECT * FROM wizard_auto_809 ");

foreach ($rooms as $room)
{
	$roomId = $room['wz_id'];
	echo "\n room id : $roomId ";
	
	$admin = dbx::queryAttribute("SELECT wz_ADMIN from wizard_auto_809 WHERE wz_id = $roomId", 'wz_ADMIN');
	echo " admin: $admin ";
	
	// low = user; high = room
	$adminuser_in_n2n = dbx::query("SELECT * FROM wizard_auto_SIMPLE_W2W_707_809 WHERE wz_id_high = $roomId AND wz_id_low = (SELECT wz_ADMIN from wizard_auto_809 WHERE wz_id = $roomId ) ");
	
	if ($adminuser_in_n2n !== false) {
		echo " Admin in n2n-Table OK "; 
		continue;
	}
	
	
	echo " admin user not in n2n! ";
	fe_room::assignUser2Room($admin, $roomId);
	
	echo " - PATCHED! ";
	
	
	
		
}
	

			