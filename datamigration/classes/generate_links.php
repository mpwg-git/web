<?

require_once(dirname(__FILE__) . '/../_includes.php');

class generate_links
{
	const wzUser = 'wizard_auto_707';
	const wzRoom = 'wizard_auto_809';

	public static function getLinks()
	{
		
		print_r(getDate());
		
		die(' ');
// 		$list = self::getFilteredList();

	}


	public static function getFilteredList()
	{
		$wzUser 	= self::wzUser;

		$user_list 	= dbx::queryAll("SELECT wz_id FROM wizard_auto_707 WHERE wz_del = 'N' AND wz_ACTIVE = 'Y' AND wz_TYPE = 'biete' AND wz_NOTLOGGEDIN = 0 AND wz_LASTLOGIN != '0000-00-00 00:00:00' AND wz_LASTLOGIN < DATE_SUB(CURDATE(), INTERVAL 4 WEEK) ORDER BY `wizard_auto_707`.`wz_LASTLOGIN`  DESC");
				
		foreach ($user_list as $uid) {					
			echo $uid[];
		}
		$admin_list = dbx::queryAll("SELECT wz_id, wz_ADMIN FROM wizard_auto_809 WHERE wz_del = 'N' AND wz_ADMIN != 0");
		
		$list = array();
		$roomId_list = array();
		
		foreach ($admin_list as $room) {
			$admin = $room['wz_ADMIN'];
			
			die();
// 				if($admin == $userid['wz_id']) {
// 					echo "admin: ".$admin." wz_id: ".$userId['wz_id']." roomid: ".$room['wz_id']."<br>";
// 				}
				
// 				die();
			
// 				echo $admin;	
// 				echo "<br>";
// 				echo $list[0];
			}
		}
		
	}
}


// generate_links::getLinks();
generate_links::getFilteredList();