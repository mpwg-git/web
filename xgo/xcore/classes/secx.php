<?
class secx
{
	public static function error($die,$human_readable="UNKOWN ERROR",$no=-1,$detail='')
	{
		reportx::error('SECX',$human_readable,$no,$detail,$die,$backInTime=1);
	}

	public static function make_ajax_dir($dir,$dieIfNotDone=true)
	{
		$htaccess_file = $dir.'/.htaccess';
		$content = "RewriteEngine on
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteRule ^(.*)$ ajaxer.php?url=$1 [QSA,L]";
		$state = hdx::fwrite($htaccess_file,$content);

		if (!$state)
		{
			self::error($dieIfNotDone,"make_ajax_dir :: cannot write in file : $htaccess_file");
			return false;
		}
	}

	public static function unProtect_dir($dir,$dieIfNotDone=true)
	{
		if (!is_dir($dir)) {
			self::error($dieIfNotDone,"unProtect_dir :: dir ($dir) not present");
			return false;
		}


		$htaccess_content 	= "AuthType none\nSatisfy Any";
		$htaccess_file		= $dir.'/.htaccess';


		//libx::turnOnErrorReporting();

		//echo libx::getHost();
		//hdx2::test();
		$state = hdx::fwrite($htaccess_file,$htaccess_content);

		//die("$htaccess_file,$htaccess_content XXXXXXXXXXXXXXX");

		if (!$state)
		{
			self::error($dieIfNotDone,"unProtect_dir :: cannot write in file : $htaccess_file");
			return false;
		}

		return true;
	}

	public static function protect_dir($dir,$dirOfPwdFile,$users,$realm,$obfuscate=false,$dieIfNotDone=true)
	{
		$htaccess_file		= ($dir).'/.htaccess';
		$htpwd_file 		= ($dirOfPwdFile).'/.htpasswd';

		$htaccess_content 	= "AuthType Basic\nAuthName '$realm'\nAuthUserFile $htpwd_file\nRequire valid-user";
		$htpwd_content		= array();


		if (Ixcore::FCGI_AUTH)
		{
			$htaccess_content 	= "AuthType Basic\nAuthName '$realm'\nAuthUserFile $htpwd_file\nRequire valid-user\nRewriteEngine on\nRewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization},L]";
		}

		foreach ($users as $user)
		{
			$user_name 	= $user['name'];
			$user_pwd 	= $user['pwd'];

			if (trim($user_name) == "")
			{
				$user_name = md5(time());
			}

			if (trim($user_pwd) == "")
			{
				$user_pwd = md5(time());
			}

			if ($obfuscate)
			{
				$user_name 	= md5($user_name);
			}
			$salt=substr($user_pwd,0,2);
			//$pwd = md5("$user_name:$realm:$user_pwd");
			//$htpwd_content[] = "$user_name:$user_pwd:$pwd";
			$htpwd_content[] = $user_name.":".crypt($user_pwd);
		}

		if (!hdx::fwrite($htaccess_file,$htaccess_content)) 			self::error($dieIfNotDone,"protect_dir :: cannot create $htaccess_file");
		if (!hdx::fwrite($htpwd_file,implode("\n",$htpwd_content))) 	self::error($dieIfNotDone,"protect_dir :: cannot create $htpwd_file");

		return true;
	}

}