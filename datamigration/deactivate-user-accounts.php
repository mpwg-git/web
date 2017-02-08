<?
require_once(dirname(__FILE__).'/_includes.php');
require_once(dirname(__FILE__).'/../xgo/xplugs/_includes.php');


$req = array_keys($_REQUEST);

switch($req[0]) {
	case 'printlist':
		handleUserAccounts::printUserList();
		break;
	case 'deactivateuser':
		handleUserAccounts::deactivateUsers();
		break;
	case 'printlistemail':
		handleUserAccounts::printUserListEmail();
		break;
	case 'resendemailconfirm':
		handleUserAccounts::resendEmailConfirm();
		break;
}


class handleUserAccounts
{

	public static $hostName = "wsfbeta";

	/*
	 public static function setDbName()
	 {
		if(preg_match('/\bbeta\b/', $_SERVER['HTTP_HOST']) == 1)
			return self::$hostName = "wsfbeta";
			elseif(preg_match('/\bpre\b/', $_SERVER['HTTP_HOST']) == 1)
			return self::$hostName = "mpwg-pre";
			else
				return self::$hostName = "wsfdev";
				}
				*/

			public static function printUserList()
			{
				// 		$db = self::setDbName();
				$db = self::$hostName;

				echo "!!!! LIST DATABASE ==> WSFBETA !!!!";

				echo "<pre>";
				print_r(self::getUserList());
				echo "</pre>";
			}
			public static function getUserList()
			{
				// 		$db = self::setDbName();
				$db = self::$hostName;

				$data = dbx::queryAll("SELECT wz_id, wz_del, wz_created, wz_LASTLOGIN, wz_EMAIL FROM `$db`.wizard_auto_707 WHERE `wz_del` =  'N' AND `wz_ACTIVE` = 'Y' AND `wz_LASTLOGIN` < DATE_SUB(CURDATE(), INTERVAL 12 WEEK) AND `wz_created` < DATE_SUB(CURDATE(), INTERVAL 12 WEEK) ORDER BY wz_created DESC");
				return $data;
			}


			public static function printUserListEmail()
			{
				// 		$db = self::setDbName();
				$db = self::$hostName;

				echo "!!!! LIST DATABASE ==> WSFBETA !!!!";
				
				echo "<pre>";
				print_r(self::getEmailUserList());
				echo "</pre>";
			}
			public static function getEmailUserList()
			{
				// 		 $db = self::setDbName();
				$db = self::$hostName;

				$data = dbx::queryAll("SELECT wz_id, wz_del, wz_USERDEL, wz_IS_TMP_USER, wz_online, wz_ACTIVE, wz_created, wz_LASTLOGIN, wz_EMAIL, wz_MAIL_CHECKED, wz_MAIL_TOKEN FROM `$db`.wizard_auto_707 WHERE `wz_del` = 'N' AND `wz_USERDEL` = 'N' AND `wz_online` = 'Y' AND `wz_EMAIL` != '' AND `wz_MAIL_CHECKED` = 'N' AND `wz_MAIL_TOKEN`!= '' AND `wz_created` > DATE_SUB(CURDATE(), INTERVAL 2 MONTH) AND `wz_LASTLOGIN` < DATE_SUB(CURDATE(), INTERVAL 24 HOUR)");
				return $data;
			}


			public static function deactivateUsers()
			{
				$db = self::$hostName;

				$list = self::getUserList();

				// $wzAdmin = array();

				foreach ($list as $l)
				{
					$id = $l['wz_id'];
					/*
					 $room = dbx::query("SELECT wz_id, wz_ADMIN, wz_del, wz_ACTIVE FROM `$db`.wizard_auto_809 WHERE wz_ADMIN = $id");
					 if($room !== false){
					 $wzAdmin = array (
					 'userID' => $id,
					 'wzAdmin' => $room['wz_ADMIN'],
					 'roomID' => $room['wz_id']
					 );
					 }
					 print_r($wzAdmin);
					 die( ' -- x -- ' );
					 */
						
					$res = fe_user::setUserInactive($id);
						
					if($res)
						echo "\nuser " . $id . " deactivated\n";
						else
							echo "\n DEACTIVATION ERROR \n";
				}
				echo "\n\n ALL DONE \n\n";
			}


			public static function resendEmailConfirm()
			{
				$list = self::getEmailUserList();

				$params = array();
				$params['triggerByVar'] = 'doResend';
				$params['triggerByVal'] = '';

				foreach ($list as $l)
				{
					$id = $l['wz_id'];
					$mail = trim($l['wz_EMAIL']);
						
					$_REQUEST['feuser_email'] = $mail;
						
					$res = array();
					$res = xredaktor_feUser::resendRegistration($params);
						
					if($res['status'] == 'RESEND')
					{
						echo " " . $mail . " userid: " . $id . " resend done";
					}
					else
						echo "\n CAN NOT SEND EMAIL " . "userid: " . $id . "\n";
				}
				echo "\n --- END --- \n";
			}
}
