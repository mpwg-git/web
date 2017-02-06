<?

require_once(dirname(__FILE__).'/_includes.php');
require_once(dirname(__FILE__).'/../xgo/xplugs/_includes.php');


if(isset($_GET['printlist']))
{
	handelUserAccounts::printUserList();
}

if(isset($_GET['deactivateuser']))
{
	handelUserAccounts::deactivateUsers();
}

if(isset($_GET['printlistemail']))
{
	handelUserAccounts::printUserListEmail();
}

if(isset($_GET['resendemailconfirm']))
{
	handelUserAccounts::resendEmailConfirm();
}


class handelUserAccounts
{

	public static function printUserList()
	{
		$list = self::getUserList();
		echo "<pre>";
		print_r($list);
		echo "</pre>";

		die(' user list ');
	}
	public static function getUserList()
	{
		$str = $_SERVER;
		
		echo "<pre>";
		print_r($str);
		echo "</pre>";
		
		die();

		$db = "wsfbeta";

		$data = dbx::queryAll("SELECT wz_id, wz_del, wz_created, wz_LASTLOGIN, wz_EMAIL FROM `$db`.wizard_auto_707 WHERE `wz_del` =  'N' AND `wz_LASTLOGIN` < DATE_SUB(CURDATE(), INTERVAL 12 WEEK) ORDER BY wz_LASTLOGIN DESC");

		return $data;
	}


	public static function printUserListEmail()
	{

		$list = self::getEmailUserList();
		echo "<pre>";
		print_r($list);
		echo "</pre>";

		die(' email user list ');
	}
	public static function getEmailUserList()
	{
		$db = "wsfbeta";
		
		$data = dbx::queryAll("SELECT wz_id, wz_del, wz_USERDEL, wz_IS_TMP_USER, wz_online, wz_ACTIVE, wz_created, wz_LASTLOGIN, wz_EMAIL, wz_MAIL_CHECKED, wz_MAIL_TOKEN FROM `$db`.wizard_auto_707 WHERE `wz_del` = 'N' AND `wz_USERDEL` = 'N' AND `wz_online` = 'Y' AND `wz_EMAIL` != '' AND `wz_MAIL_CHECKED` = 'N' AND `wz_MAIL_TOKEN`!= '' AND `wz_created` > DATE_SUB(CURDATE(), INTERVAL 2 MONTH) AND `wz_LASTLOGIN` < DATE_SUB(CURDATE(), INTERVAL 24 HOUR)");

		return $data;
	}


	public static function resendEmailConfirm()
	{

		$list = self::getEmailUserList();


		foreach ($list as $l)
		{
			$id = $l['wz_id'];
			$mail = trim($l['wz_EMAIL']);
				
			print_r($id . ' ' . $mail);
				
			die( ' die before sending mail ' );

			$res = fe_user::setUserInactive($id);
			if($res)
			{
				echo "confirmation email sent to " . $mail . " userid: " . $id . " ";
			}
			else
				echo "\n CAN NOT SEND EMAIL \n";
		}

		echo "\n\n ALL DONE \n\n";
	}


	public static function deactivateUsers()
	{

		$list = self::getUserList();

		echo "<pre>";
		print_r($list);
		echo "</pre>";

		die(' check list ');

		foreach ($list as $l)
		{
			$id = $l['wz_id'];
				
			$res = fe_user::setUserInactive($id);
			if($res)
			{
				echo "user " . $id . " deactivated";
			}
			else
				echo "\n DEACTIVATION ERROR \n";
		}

		echo "\n\n ALL DONE \n\n";

	}
}
