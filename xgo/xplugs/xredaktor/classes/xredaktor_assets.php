<?

class xredaktor_assets
{


	public static function wrapper_less($params)
	{
		$ids_clean = array();
		$ids = explode(",",$params['ids']);

		foreach ($ids as $s_id)
		{
			$s_id = intval($s_id);
			if ($s_id == 0) continue;
			$ids_clean[] = $s_id;
		}


		$ids_clean = implode(",",$ids_clean);
		$lessfiles = dbx::queryAll("select cl_id from css_less where cl_id IN ($ids_clean)");

		if ($lessfiles === false) return "";
		$ret = array();

		foreach ($lessfiles as $lf)
		{
			$id = intval($lf['cl_id']);
			$src = '/assets/codeless/'.$id.'.css';
			$ret[] = "<link rel=\"stylesheet\" type=\"text/css\" href=\"$src\" class=\"css_flush\"/>";;
		}

		return implode("",$ret);
	}

	public static function compile_less($id)
	{

		$id = intval($id);

		$file_css 		= realpath(dirname(__FILE__).'/../../../../').'/assets/codeless/'.$id.'.css';
		$file_css_test  = realpath(dirname(__FILE__).'/../../../../').'/assets/codeless/'.$id.'.test.css';
		$file_less 		= realpath(dirname(__FILE__).'/../../../../').'/assets/codeless/'.$id.'.less';

		$cl_content = dbx::queryAttribute("select cl_content from css_less where cl_id = $id","cl_content");
		if ($cl_content === false) return "less is empty";

		$state = hdx::fwrite($file_less,$cl_content);
		if (!$state) frontcontrollerx::json_debug(array('lessc'=>'Cannot write less file...','code'=>$cl_content,'file_css'=>$file_css));

		unlink($file_css_test);
		$cmd = "lessc $file_less -x --source-map-less-inline --source-map-map-inline > $file_css_test 2>&1";
		$output = array();
		exec($cmd,$output);

		if ((!file_exists($file_css_test))||(filesize($file_css_test) == 0))
		{
			return implode("\n",$output);
		}
		
		$code = hdx::fread($file_css_test);
		if (strpos($code,"31mFileError") !== false)
		{
			return "DIESE NACHRICHT GEHT AN ARIS !!! :: ".$code;
		}

		copy($file_css_test,$file_css);

		return true;
	}


	public static function getBy_s_id($s_id)
	{
		$s_id = intval($s_id);
		$memKey = "XR_ASSET_S_ID_".$s_id;

		$cached = memcachex::get($memKey);
		if ($cached !== false)
		{
			return $cached;
		}


		$media = dbx::query("select s_onDisk from storage where s_id = $s_id");

		if($media === false)
		{
			return '';
		}

		$s_onDisk = trim($media['s_onDisk']);
		$resourceKey = substr($s_onDisk,strlen(Ixcore::htdocsRoot));

		memcachex::set($memKey,$resourceKey);

		return $resourceKey;
	}


	public static function getCloudArchiveVideo($eam_id)
	{

	}



	public static function fullCloudUpdateMemcache()
	{
		$cacheFiles = dbx::queryAll("select * from e_archive_media_cloud where eamc_storage_id != -1 and eamc_bucket_state = 'DONE'",false);

		foreach ($cacheFiles as $cf)
		{

		}

	}


	public static function cloud_available($file)
	{
		$present = dbx::query("select * from e_archive_media_cloud where eamc_cache_onDisk = '$file' and eamc_bucket_state = 'DONE'");
		if($present === false) return false;
		if (!Icloud::CDN_NO_AUTH_ENABLED) return false;

		$replace 	= Ixcore::htdocsRoot;
		$file 		= str_replace($replace,"",$file);

		return Icloud::CDN_NO_AUTH . $file;
	}

	public static function html_imgs_2_cloud($html)
	{
		$memKey_cloud 	= "html_imgs_2_cloud_v3_".md5($html);

		$html_cloud = memcachex::get($memKey_cloud);
		if ($html_cloud !== false)
		{
			return $html_cloud;
		}

		$pattern = '/src="([^"]*)"/';
		$ret = preg_match_all($pattern,$html, $imgs);

		$all_via_buckets = true;

		foreach ($imgs[1] as $src)
		{
			if (substr($src,0,8) != '/archive') continue;


			$file = Ixcore::htdocsRoot . $src;
			$available = self::cloud_available($file);
			//$available = false;

			$src2 = $src;
			if ($available === false)
			{
				$all_via_buckets = false;

				self::cachedImages_setFile($file);

				if (Icloud::REVERSE_ORIGIN_ENABLED)
				{
					$src2 = Icloud::REVERSE_ORIGIN . $src;
				}

			} else
			{



				if (Icloud::CDN_NO_AUTH_ENABLED)
				{
					$src2 = Icloud::CDN_NO_AUTH . $src;
				}
			}

			$html = str_replace($src,$src2,$html);
		}

		if ($all_via_buckets) {
			memcachex::set($memKey_cloud,$html);
		} else {
			memcachex::set($memKey_cloud,false);
		}

		return $html;
	}


	public static function cachedImages_uploadIntoCloudFinish($eamc_id)
	{
		$eamc_id = intval($eamc_id);
		$c = dbx::query("select * from e_archive_media_cloud where eamc_id = $eamc_id");

		if ($c['eamc_storage_id'] > 0) { 	// IMAGE


			return true;
		}

		if ($c['eamc_eam_id'] > 0) { 		// MEDIA


			return true;
		}

		if ($c['eamc_submission_id'] > 0) { // SUBMISSION


			return true;
		}

		return false;

	}

	public static function cachedImages_getKeyByParams($params)
	{
		$key = array();

		$key[] = $params['colorspace'];
		$key[] = intval($params['s_id']);
		$key[] = intval($params['w']);
		$key[] = intval($params['h']);
		$key[] = intval($params['q']);
		$key[] = $params['rmode'];
		$key[] = $params['crop'];
		$key[] = intval($params['cut']);
		$key[] = $params['ext'];

		return md5(implode("|",$key));
	}

	public static function getMemKeyCachedImages($key)
	{
		return "XR_ASSETS_CI_3_".$key;
	}

	public static function cachedImages_getByKey($key)
	{
		//	return false;
		return memcachex::get(self::getMemKeyCachedImages($key));
	}


	public static function cachedImages_setMemCache($key,$absoluteFile,$returnArray)
	{
		$replace 	= Ixcore::htdocsRoot ;
		$file 		= str_replace($replace,"",$absoluteFile);

		$data = array(
		'file' 	=> $file,
		'ret' 	=> $returnArray,
		);

		memcachex::set(self::getMemKeyCachedImages($key),$data);

		$key = self::getMemKeyCachedImages($key);
	}

	public static function cachedImages_setKeyFile($s_id,$key,$file,$returnArray)
	{
		$present = dbx::query("select * from e_archive_media_cloud where eamc_cache_onDisk = '$file'");
		if($present === false)
		{
			dbx::insert('e_archive_media_cloud',array('eamc_storage_id'=>$s_id,'eamc_cache_onDisk'=>$file,'eamc_bucket_1'=>1,'eamc_bucket_2'=>2,'eamc_memcache_key'=>$key,'eamc_created'=>'NOW()'));
		} else {

			$eamc_id = intval($present['eamc_id']);

			if ($present['eamc_bucket_state'] == 'DONE') // UPLOAD ALREADY FINISHED
			{
				self::cachedImages_setMemCache($key,$file,$returnArray);
			}

			dbx::update('e_archive_media_cloud',array('eamc_memcache_key'=>$key),array('eamc_id'=>$eamc_id));
		}
	}


	public static function cachedImages_setFile($file)
	{
		$present = dbx::query("select * from e_archive_media_cloud where eamc_cache_onDisk = '$file'");
		if($present === false)
		{
			dbx::insert('e_archive_media_cloud',array('eamc_storage_id'=>-1,'eamc_cache_onDisk'=>$file,'eamc_bucket_1'=>1,'eamc_bucket_2'=>2,'eamc_memcache_key'=>''));
		} else {
			//echo "ALREADY REGISTERED: $file<br>";
		}
	}

	public static function create($ids, $extension, $noCompress = false)
	{
		$searchForErrors = (isset($_REQUEST['XR_ASSETS_DEBUG_CC']));


		// AS !!!!!!!!!
		$noCompress	= true;


		$files		= array();

		$ids_clean = array();
		$ids = explode(",",$ids);

		foreach ($ids as $s_id)
		{
			if (!is_numeric($s_id)) continue;
			$s_id = intval($s_id);

			if ($s_id == 0) continue;
			$ids_clean[] = $s_id;
		}


		foreach ($ids_clean as $s_id)
		{
			$f = xredaktor_storage::getById($s_id);

			$ext = pathinfo($f['s_onDisk'], PATHINFO_EXTENSION);

			if ($ext == "less")
			{
				// make css
				$cssFilename	= $f['s_onDisk'].".css";
				$cmd = "lessc ".$f['s_onDisk']." -x --source-map-less-inline --source-map-map-inline > $cssFilename 2>&1";
				$output = array();
				exec($cmd,$output);

				if (libx::isDeveloper())
				{
					if ((filesize($cssFilename) == 0))
					{
						echo "<div>";
						echo "ERROR::$cssFilename is EMPTY";
						nl2br(print_r($output,true));
						echo "</div>";
						die();
					}
				}

				$files[] = $cssFilename	= $f['s_onDisk'].".css";
			}
			else {
				$files[] = $f['s_onDisk'];
			}
		}

		$output = "";

		if ($noCompress === true && $extension == 'js')
		{
			foreach ($files as $file) {

				$t = substr($file,strlen(Ixcore::htdocsRoot));
				$output .= "<script src=\"$t\" type=\"text/javascript\"></script>";

			}
			//die("".$output);

			return $output;
		}


		foreach ($files as $file)
		{

			if (!file_exists($file)) continue;
			if (!hdx::isExtension($file,$extension)) continue;



			$path = substr($file,strlen(Ixcore::htdocsRoot));
			$output .= "@import url($path); \n";


			//$lastModTime = max(filemtime($file),$lastModTime);
			//$output 	.= "\n/* ".basename($file)." - Line #".count(explode("\n",$output))." */\n";

			/*$fixed = hdx::fread($file);

			if ($extension == 'css')
			{
			$path 		= substr(dirname($file),strlen(Ixcore::htdocsRoot)).'/';
			$search 	= '#url\((?!\s*[\'"]?(?:https?:)?//)\s*([\'"])?#';
			$replace 	= "url($1{$path}";
			$fixed 		= preg_replace($search, $replace, $fixed);
			$fixed		= str_replace($path."data:image","data:image",$fixed);
			}

			$output 	.= $fixed;

			*/
		}

		$output_md5 = md5($output);


		$present = dbx::query("select * from assets_compressed where ac_output_md5 = '$output_md5' and ac_extension = '$extension' ");
		$present = false;

		if ($searchForErrors)
		{
			$present = false;
		}

		if ($present === false)
		{
			dbx::insert('assets_compressed',array('ac_output_md5'=>$output_md5,'ac_extension'=>$extension,'ac_files'=>implode(",",$ids_clean)));
			$ac_id = dbx::getLastInsertId();

			$src 	= '/assets/uncompressed/packed-'.$ac_id.'.'.$extension;
			$file	= Ixcore::htdocsRoot . $src;

			hdx::fwrite($file, $output);
			memcachex::set(self::getMemKey($extension),$src);


			/* MINIFY */

			switch ($extension)
			{
				case 'js':

					die('XXXX'.$extension);

					$compiler = Ixcore::htdocsRoot . '/xgo/xcore/libs/closure-compiler/compiler.jar';

					$src_min 	= '/assets/compressed/packed-'.$ac_id.'.min.'.$extension;
					$file_min	= Ixcore::htdocsRoot . $src_min;


					if (Ixcore::jsCompression)
					{
						$cmd = "java -jar $compiler --js $file --js_output_file $file_min  2>&1";
						$output2 = array();
						exec($cmd,$output2);

						if (!file_exists($file_min)) {
							if (libx::isDeveloper())
							{
								if ($searchForErrors)
								{
									$output2 = implode("\n",$output2);
									echo "<pre>$output2</pre>";
								} else
								{
									echo "<script>console.error('CC-ERROR','Javascript contains errors. Please open: ', window.location + '?XR_ASSETS_DEBUG_CC');</script>";
								}
							}
						} else
						{
							memcachex::set(self::getMemKey($extension),$src_min);
							$src = $src_min;
						}
					} else {
						$src = $file;
					}

					break;

				case 'css':


					$compiler = Ixcore::htdocsRoot . '/xgo/xcore/libs/yuicompressor/yuicompressor-2.4.8.jar';

					$src_min 	= '/assets/compressed/packed-'.$ac_id.'.min.'.$extension;
					$file_min	= Ixcore::htdocsRoot . $src_min;

					if (Ixcore::cssCompression)
					{
						$cmd = "java -jar $compiler --type css -o $file_min $file  2>&1";
						$output2 = array();
						exec($cmd,$output2);

						if (!file_exists($file_min)) {
							if (libx::isDeveloper())
							{
								if ($searchForErrors)
								{
									$output2 = implode("\n",$output2);
									echo "<pre>$output2</pre>";
								} else
								{
									echo "<script>console.error('YUI-ERROR','Javascript contains errors. Please open: ', window.location + '?XR_ASSETS_DEBUG_CC');</script>";
								}
							}
						} else
						{
							memcachex::set(self::getMemKey($extension),$src_min);
							$src = $src_min;
						}
					} else {

						$src = substr($file,strlen(Ixcore::htdocsRoot ));
					}

					break;


				default: break;
			}





		} else {
			$ac_id = $present['ac_id'];
			$src 	= '/assets/uncompressed/packed-'.$ac_id.'.'.$extension;
		}



		return $src;
	}

	public static function getMemKey($extension)
	{
		return "XR_ASSET_".$extension;
	}

	public static function get($ids, $extension)
	{

		$src = memcachex::get(self::getMemKey($extension));
		$src = false;

		if ($src === false)
		{
			$src = self::create($ids,$extension);
		}

		if (!file_exists(Ixcore::htdocsRoot . $src))
		{
			$src = self::create($ids,$extension);
		}

		if (Icloud::REVERSE_ORIGIN_ENABLED)
		{
			return Icloud::REVERSE_ORIGIN . $src;
		}

		return $src;
	}




	public static function compress($ids, $extension, $noCompress = false)
	{

		if (libx::isDeveloper()) // PUBLISH
		{
			self::create($ids, $extension, $noCompress);
		}

		return self::get($ids, $extension);
	}

	public static function wrapper_js($params)
	{

		$s_ids 			= $params['s_ids'];
		$noCompress		= false;

		if (isset($params['nocompress']))
		{
			$noCompress = true;
		}

		return $src = self::compress($s_ids,'js',$noCompress);

		//return "<script src=\"$src\" type=\"text/javascript\"></script>";
	}

	public static function wrapper_css($params)
	{
		$s_ids 	= $params['s_ids'];
		$src 	= self::compress($s_ids,'css');

		return "<link rel=\"stylesheet\" type=\"text/css\" href=\"$src\" />";
	}

}