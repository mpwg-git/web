<?

class xmarketing_bounces
{

	public static function getSearchFields()
	{
		return array('xmscb_subject','xmscb_message_id','xmscb_html','xmscb_r_email','xmscb_id');
	}

	private static function bouncesPagerBySenderId($xmsc_id)
	{
		$xmsc_id 	= xmarketing_security::safe_send_connectors_id($xmsc_id);
		$limit 		= 100;
		$start 		= intval($_REQUEST['start']);

		$query 	   = xmarketing_config::injectQueryString(self::getSearchFields(),$_REQUEST['_query']);
		$sql_basic = " from xm_send_connectors_bounces where xmscb_xmsc_id = $xmsc_id $query";

		$sql_data 	= "select *, ROUND(CHAR_LENGTH(xmscb_html)/1024,0) AS xmscb_html_size, concat('','') as xmscb_json_full $sql_basic LIMIT $start,$limit";
		$sql_count 	= "select count(xm_send_connectors_bounces.xmscb_id) as countx $sql_basic";

		$nodes		= dbx::queryAll($sql_data);
		$totalCount = dbx::queryAttribute($sql_count,'countx');

		frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
	}

	private static function bouncesPagerByEmissionId($xmse_id)
	{
		$xmse_id 	= xmarketing_security::safe_emissions_id($xmse_id);
		$limit 		= 100;
		$start 		= intval($_REQUEST['start']);

		$query 	   = xmarketing_config::injectQueryString(self::getSearchFields(),$_REQUEST['_query']);
		$sql_basic = " from xm_send_connectors_bounces where xmscb_e_id = $xmse_id $query";

		$sql_data 	= "select *, ROUND(CHAR_LENGTH(xmscb_html)/1024,0) AS xmscb_html_size, concat('','') as xmscb_json_full $sql_basic LIMIT $start,$limit";
		$sql_count 	= "select count(xm_send_connectors_bounces.xmscb_id) as countx $sql_basic";

		$nodes		= dbx::queryAll($sql_data);
		$totalCount = dbx::queryAttribute($sql_count,'countx');

		frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
	}

	public static function getMailPopperStorageBy_BounceId($xmscb_id)
	{
		$xmscb_id 		= xmarketing_security::safe_send_connectors_bounce_id($xmscb_id);
		$bounce 		= self::getById($xmscb_id);
		$xmscb_xmsc_id	= $bounce['xmscb_xmsc_id'];
		return self::getMailPopperStorageBy_SendConnector($xmscb_xmsc_id);
	}

	public static function getMailPopperStorageBy_SendConnector($xmsc_id)
	{
		$xmsc_id = xmarketing_security::safe_send_connectors_id($xmsc_id);
		$path = realpath(dirname(__FILE__).'/../mailPopperStorage').'/'.$xmsc_id;
		return $path;
	}

	public static function getById($xmscb_id)
	{
		$xmscb_id = xmarketing_security::safe_send_connectors_bounce_id($xmscb_id);
		return dbx::query("select * from xm_send_connectors_bounces where xmscb_id = $xmscb_id");
	}

	public static function getAttachedFilesByBounceId($xmscb_id)
	{
		$xmscb_id = xmarketing_security::safe_send_connectors_bounce_id($xmscb_id);
		$bounce 			= self::getById($xmscb_id);
		$xmscb_message_id 	= $bounce['xmscb_message_id'];

		$xmscb_json_full = json_decode($bounce['xmscb_json_full'],true);

		$embedded 	= $xmscb_json_full['embedded'];
		$attach 	= $xmscb_json_full['attach'];

		$files = array();
		$root  = self::getMailPopperStorageBy_BounceId($xmscb_id);

		foreach ($embedded as $f)
		{
			$files[] = $root.'/'.$xmscb_message_id.'/'.basename($f);
		}
		foreach ($attach as $f)
		{
			$files[] = $root.'/'.$xmscb_message_id.'/'.basename($f);
		}

		return $files;
	}

	public static function showHeader($title)
	{
		?>
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title><?=$title?></title>
			</head>
			<body style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
		<?
	}

	public static function showFooter()
	{
		?>
		</body>
		</html>
		<?
	}

	public static function handleBouncesGui($function)
	{
		switch ($function)
		{
			case 'showThumb':

				$xmscb_id 	= xmarketing_security::safe_send_connectors_bounce_id($_REQUEST['xmscb_id']);
				$files 		= self::getAttachedFilesByBounceId($xmscb_id);
				$n 			= intval($_REQUEST['n']);

				if (isset($files[$n]))
				{
					$f = $files[$n];
					$file = hdx::getTempFileName('imgResizer').'.jpg';
					$cmd = "convert -strip -quality 10 -resize 100x100 '$f' '$file'";
					exec($cmd);
					header("Pragma: public");
					header('Expires: 0');
					header('Content-Disposition: attachment; filename="'.basename($file).'"');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header("Content-type: ".mime_content_type($file));
					header('Content-Transfer-Encoding: binary');
					header('Content-Length: '.filesize($file));
					$fs = stat($file);
					header("Etag: ".sprintf('"%x-%x-%s"', $fs['ino'], $fs['size'],base_convert(str_pad($fs['mtime'],16,"0"),10,16)));
					ob_clean();
					flush();
					readfile($file);
					@unlink($file);
					die();
				}

				die();

				break;
			case 'openFile':
				$xmscb_id 	= xmarketing_security::safe_send_connectors_bounce_id($_REQUEST['xmscb_id']);
				$files 		= self::getAttachedFilesByBounceId($xmscb_id);
				$n 			= intval($_REQUEST['n']);

				if (isset($files[$n]))
				{
					$file = $files[$n];
					header("Pragma: public");
					header('Expires: 0');
					header('Content-Disposition: attachment; filename="'.basename($file).'"');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header("Content-type: ".mime_content_type($file));
					header('Content-Transfer-Encoding: binary');
					header('Content-Length: '.filesize($file));
					$fs = stat($file);
					header("Etag: ".sprintf('"%x-%x-%s"', $fs['ino'], $fs['size'],base_convert(str_pad($fs['mtime'],16,"0"),10,16)));
					ob_clean();
					flush();
					readfile($file);
					die();
				}

				die();
				break;
			case 'showAttachments':
				$xmscb_id 	= xmarketing_security::safe_send_connectors_bounce_id($_REQUEST['xmscb_id']);
				$files 		= self::getAttachedFilesByBounceId($xmscb_id);

				self::showHeader("Attachments");
				echo "<iframe width=1 height=0 name='downloadFileAsAttach' frameborder=0></iframe>";
				echo "<table>";
				foreach ($files as $i=>$f)
				{
					$fn 	= basename($f);
					$size 	= getimagesize($f);
					$fsize	= hdx::bytes2HumanReadAble(filesize($f));

					if ($size === false)
					{
						$prev = "<b>Keine Vorschau möglich.</b>";
					} else
					{
						$prev 	= "<img width=100 src='/xgo/xplugs/xmarketing/ajax/bounces/showThumb?xmscb_id=$xmscb_id&n=$i'>";
					}

					echo "<tr>";
					echo "<td>$fn</td>";
					echo "<td>$prev</td>";
					echo "<td>$fsize</td>";
					echo "<td><a href='/xgo/xplugs/xmarketing/ajax/bounces/openFile?xmscb_id=$xmscb_id&n=$i' target='downloadFileAsAttach'>Download</a></td>";
					echo "</tr>";
				}
				echo "</table>";
				self::showFooter();

				die('');
				break;
			case 'showHTML':
				$url 				= str_replace("/xgo/xplugs/xmarketing/ajax/bounces/showHTML","",$_SERVER['REQUEST_URI']);
				$parse				= explode("/",$_SERVER['REQUEST_URI']);
				$xmscb_id 			= xmarketing_security::safe_send_connectors_bounce_id($parse[7]);
				$url 				= $parse[8];
				$bounce 			= self::getById($xmscb_id);
				$xmscb_message_id 	= $bounce['xmscb_message_id'];
				$rootHtmlEmail 		= self::getMailPopperStorageBy_BounceId($xmscb_id).'/'.$xmscb_message_id.'';
				switch ($url)
				{
					case '':
						$indexFile = $rootHtmlEmail.'/index.html';
						if (file_exists($indexFile)) {

							$dirty_html = implode("",file($indexFile));
							libx::load_htmlPurifier();
							$config = HTMLPurifier_Config::createDefault();
							$purifier = new HTMLPurifier($config);
							$clean_html = $purifier->purify($dirty_html);

							die($clean_html);
						}
						die('<pre>Keine HTML E-Mail</pre>');
						break;
					default:
						$file = $rootHtmlEmail.'/'.basename($url);
						if (file_exists($file)) {

							header("Pragma: public");
							header('Expires: 0');
							header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
							header("Content-type: ".mime_content_type($file));
							header('Content-Transfer-Encoding: binary');
							header('Content-Length: '.filesize($file));
							$fs = stat($file);
							header("Etag: ".sprintf('"%x-%x-%s"', $fs['ino'], $fs['size'],base_convert(str_pad($fs['mtime'],16,"0"),10,16)));

							ob_clean();
							flush();
							readfile($file);
							die();
						}
						die('INVALID');
				}
				break;
			case 'downloadEmail':

				$xmscb_id 			= xmarketing_security::safe_send_connectors_bounce_id($_REQUEST['xmscb_id']);
				$bounce 			= self::getById($xmscb_id);
				$xmscb_message_id 	= $bounce['xmscb_message_id'];
				$xmscb_xmsc_id	 	= $bounce['xmscb_xmsc_id'];

				$file = self::getMailPopperStorageBy_BounceId($xmscb_id).'/'.$xmscb_message_id.'.ceml';

				header("Pragma: public");
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Content-disposition: attachment; filename="'.$xmscb_id.'_'.basename($file).'"');
				header("Content-type: ".mime_content_type($file));
				header('Content-Transfer-Encoding: binary');


				$b = print_r(unserialize(base64_decode(implode("",file($file)))),true);
				header('Content-Length: '.strlen($b));
				die($b);

				break;
			case 'getById':
				$xmscb_id 					= xmarketing_security::safe_send_connectors_bounce_id($_REQUEST['xmscb_id']);
				$bounce 					= self::getById($xmscb_id);
				$bounce['xmscb_json_full'] 	= json_decode($bounce['xmscb_json_full'],true);
				$bounce['xmscb_json_full']['attachment'] = 1;
				frontcontrollerx::json_success(array('bounce'=>$bounce));
				break;
			case 'collectBounces':
				if (isset($_REQUEST['xmse_id'])) {
					$xmse_id = xmarketing_security::safe_emissions_id($_REQUEST['xmse_id']);
					self::collectBouncesOfEmission($xmse_id);
				} else
				{
					$xmsc_id = xmarketing_security::safe_send_connectors_id($_REQUEST['xmsc_id']);
					self::collectBounces($xmsc_id);
				}
				break;
			case 'load':

				if (isset($_REQUEST['xmse_id'])) {
					$xmse_id = xmarketing_security::safe_emissions_id($_REQUEST['xmse_id']);
					self::bouncesPagerByEmissionId($xmse_id);
				} else
				{
					$xmsc_id = xmarketing_security::safe_send_connectors_id($_REQUEST['xmsc_id']);
					self::bouncesPagerBySenderId($xmsc_id);
				}
				break;
			default:die("TT");
		}
	}

	public static function collectBounces($xmsc_id)
	{
		$xmsc_id = xmarketing_security::safe_send_connectors_id($xmsc_id);
		xmarketing_bounces_handler::collectAll($xmsc_id,'MANUAL');
		frontcontrollerx::json_success();
	}

	public static function collectBouncesOfEmission($xmse_id)
	{
		$xmse_id 	= xmarketing_security::safe_emissions_id($xmse_id);
		$scs		= xmarketing_emissions::getSenderAccountsById($xmse_id);

		if ($scs === false) return;
		foreach ($scs as $sc)
		{
			$xmsc_id = xmarketing_security::safe_send_connectors_id($sc['xmsc_id']);
			xmarketing_bounces_handler::collectAll($xmsc_id,'MANUAL');
		}

		frontcontrollerx::json_success();
	}

}