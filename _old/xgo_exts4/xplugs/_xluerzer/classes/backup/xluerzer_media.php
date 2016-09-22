<?

class xredaktor_media
{

	public static function handleAjax($function)
	{
		list($scope,$function,$param_0,$param_1,$param_2) = explode("/",$_REQUEST['url']);



		switch ($function)
		{
			case 'oe_120x40':

				$mediaId = intval($param_0);

				dbx2::select_database("luerzer-dev");

				$db 	= dbx2::query("select * from cms_media where id = $mediaId");
				$file	= '/srv/www/dev.luerzersarchive.net/web/media/oe/images/'.$db['link'];
				
				
				if (file_exists($file)) {
					imagesx::smartResizer($file,120,40,'cco',dirname(__FILE__).'/../cache/oe_imgs',1,false,false,'png');
				}

				
				$filename = '/srv/www/dev.luerzersarchive.net/web/media/oe/images/'.basename($db['link']);
				
				// die ($filename);
				
					header('content-type: image/jpeg');
					header('Content-length: '.filesize($filename));
					header('Content-Disposition: inline; filename="'.$filename.'";');
					readfile($filename);
				
				break;
			default:
				die('Y');
		}


	}



}