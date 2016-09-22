<?


class fe_testupload {
	
	
	public static function ajax_test()
	{
		
		//die(" ".print_r($_FILES));
		
		$safeFilename 		= xredaktor_niceurl::burnDownLink($_FILES['img']['name']).".jpg";
		
		$toMoveDestination  = dirname(__FILE__).'/../../xstorage/userbilder/'.$safeFilename;
		
		if(!move_uploaded_file($_FILES['img']['tmp_name'], $toMoveDestination)){
			die('NOK');
		}
		
		$storageDirId = 432;
		$s = xredaktor_storage::getById($storageDirId);
		if ($s['s_dir'] != 'Y') frontcontrollerx::html_failure('DIR_NOT_EXISTS',2);
		
		$src = dirname(__FILE__).'/../../xstorage/userbilder/'.$safeFilename;
		if(!file_exists($src)){
			die('NOTEXISTS');
		}
		
		$image_s_id 	= xredaktor_storage::registerFileInStorage($storageDirId,$src,$_FILES['img']['name']);
		
		if($image_s_id === false) return false;
		
		$img = xredaktor_storage::xr_img2(array(
			's_id' 	=> $image_s_id,
			 'ext' 	=>'jpg',
			 'q'	=>	90
		));
		
		frontcontrollerx::json_success(array(
			"status"	=> 'success',
			"url" 		=> $img['src'],
			"width" 	=> $img['w'],
			"height" 	=> $img['h'],
			's_id' 		=> $image_s_id
		
		));
		
	}


	
	public static function ajax_testCrop()
	{
		
		$imgInfos = array(
		
			"status" 		=> 'success',
			"imgUrl"		=> dbx::escape($_REQUEST['imgUrl']),
			"imgInitW" 		=> intval($_REQUEST['imgInitW']),
			"imgInitH" 		=> floatval($_REQUEST['imgInitH']),
			"imgW" 			=> $_REQUEST['imgW'],
			"imgH" 			=> $_REQUEST['imgH'],
			"imgX1" 		=> $_REQUEST['imgX1'],
			"imgY1" 		=> $_REQUEST['imgY1'],
			"cropW" 		=> $crop['cropW'],
			"cropH" 		=> $crop['cropH'],
			"rotation" 		=> $_REQUEST['rotation']
			
		);
		$imgInfos['imgXY1']=$imgInfos['imgX1']-$imgInfos['imgY1'];
		$imgInfos['imgX2']=$imgInfos['imgXY1']+($imgInfos['imgX1']*$imgInfos['imgX1']);
		$imgInfos['imgY2']=$imgInfos['imgXY1']+($imgInfos['imgY1']*$imgInfos['imgY1']);
		
		
		$cropdata = array(
			'x' 			=> $imgInfos['imgX1'],
			'y' 			=> $imgInfos['imgY1'],
			'x2' 			=> $imgInfos['imgX2'],
			'y2' 			=> $imgInfos['imgY2'],
			'w' 			=> $imgInfos['imgW'],
			'h' 			=>$imgInfos['imgH'],
			's_id' 			=> $imgInfos['s_id'],
		);
		
		$storageDirId = 432;
		$image_s_id 	= xredaktor_storage::registerFileInStorage($storageDirId,$imgInfos['imgUrl'],'test');
		
		
		$params = array(
			's_id' 		=> $image_s_id,
			'w' 		=> intval($cropdata['w']),
			'h' 		=> intval($cropdata['h']),
			'ext' 		=> 'jpg',
			'fullpath' 	=> 'Y',
			'rmode'		=> 'vcut',
			'crop'		=> json_encode(array(
				'x' => $cropdata['x2'],
				'y' => $cropdata['y2'],
				'w' => $cropdata['w'],
				'h' => floatval($cropdata['h'])
			))
		);
		
		// (eventuell gecropptes) image erzeugen
		$maybeCroppedImg = xredaktor_storage::xr_img3($params);
		
		die(" ".print_r($params));
		
		frontcontrollerx::json_success($imgInfos);
	

	}
}

