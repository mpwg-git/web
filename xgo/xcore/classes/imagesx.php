<?

class imagesx
{

	public static function square($cropfile,$final,$new_w,$new_h)
	{
		$source_img = @imagecreatefromjpeg($cropfile); //Create a copy of our image for our thumbnails...

		//$new_w = $w;
		//$new_h = $w;

		$orig_w = imagesx($source_img);
		$orig_h = imagesy($source_img);

		$w_ratio = ($new_w / $orig_w);
		$h_ratio = ($new_h / $orig_h);

		if ($orig_w > $orig_h ) {//landscape from here new
			$crop_w = round($orig_w * $h_ratio);
			$crop_h = $new_h;
			$src_x = ceil( ( $orig_w - $orig_h ) / 2 );
			$src_y = 0;
		} elseif ($orig_w < $orig_h ) {//portrait
			$crop_h = round($orig_h * $w_ratio);
			$crop_w = $new_w;
			$src_x = 0;
			$src_y = ceil( ( $orig_h - $orig_w ) / 2 );
		} else {//square
			$crop_w = $new_w;
			$crop_h = $new_h;
			$src_x = 0;
			$src_y = 0;
		}

		$dest_img = imagecreatetruecolor($new_w,$new_h);
		imagecopyresampled($dest_img, $source_img, 0 , 0 , $src_x, $src_y, $crop_w, $crop_h, $orig_w, $orig_h); //till here
		imagejpeg($dest_img, $final, 95);
		imagedestroy($dest_img);
		imagedestroy($source_img);
		$curimage++;
	}


	public static function isValidImage($file)
	{
		$p = explode(".",$file);
		$ext = strtolower(array_pop($p));

		return in_array($ext,array('jpg','jpeg','png','bmp','gif','tiff','tif','pdf'));
	}

	public static function resize($rmode,$file_src,$file_dest,$w,$h,$ext='jpg',$quality=95,$colorspace='',$crop='', $isAnimGif=false)
	{

		
		$background = "transparent";
		$alpharemove = "";

		if ($ext != "png")
		{
			$background = "white";
			$alpharemove = "-flatten";
		}

		if (!self::isValidImage($file_src))
		{
			return "$file_src is not a valid Image Type.";
		}


		$grayCmd = "";

		if (strtolower($colorspace)=='gray')
		{
			$grayCmd = " -colorspace Gray ";
		}


		$convert = Ixcore::PATH_ImageMagick;



		if ($crop != "")
		{
			$crop = json_decode($crop,true);

			$_x = intval($crop['x']);
			$_y = intval($crop['y']);
			$_w = intval($crop['w']);
			$_h = intval($crop['h']);

			$cropCmd 	= " -crop ".$_w."x".$_h."+".$_x."+".$_y." ";
			$cmd 		= "$convert -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." '$file_src' $cropCmd '$file_dest'  2>&1";


			exec($cmd,$out);
			if (!file_exists($file_dest)) {
				return $out;
			}

			return true;
		}
		
		
		if ($isAnimGif !== false)
		{
			
			//if (libx::isDeveloper())
			{
				if (($w == "") && ($h == ""))
				{
					$cmd = "$convert -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." '$file_src' -quality $quality $alpharemove -coalesce '$file_dest' 2>&1";
					exec($cmd,$out);
				} 
				
				else
				{
					$tmpGif 	= dirname($file_dest);
					$tmpGif 	.= 'temp_'.basename($file_dest); 
					
					$cmd = "$convert '$file_src' -coalesce '$tmpGif' 2>&1";
					exec($cmd,$out);
					
					$cmd = "$convert '$tmpGif' -resize ".$w."x".$h." '$file_dest' 2>&1";
					exec($cmd,$out);
					
					return true;
				}
				
					
				//die("is anim gif in resize");
				
				
			}
			
		}
		


		$addOnPdf 	= " ";
		$p2 		= explode(".",$file_src);
		$ext2 		= strtolower(array_pop($p2));

		if (in_array($ext2,array('pdf','tiff','tif')))
		{
			$addOnPdf = " -density 300 ";
		}

		switch ($rmode)
		{
			case 'strict':


				

				$w = intval($w);
				$h = intval($h);

				if (($w == 0) || ($h == 0)) return "strict: W ODER H ist 0 !!";

				if (libx::isDeveloper())
				{
					//exec("$convert -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." '$file_src' -background #ff0000 -flatten -resize ".$w."x".$h."\> -size ".$w."x".$h." -flatten -quality $quality '$file_dest' 2>&1",$out);
				}

				exec("$convert -units PixelsPerInch -resample 72 -auto-orient -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd -background $background '$file_src' -resize ".$w."x".$h."\> -size ".$w."x".$h." xc:none +swap -gravity center -quality $quality -composite '$file_dest' 2>&1",$out);

				if (!file_exists($file_dest))
				{
					return $out;
				}

				break;

			case 'vcut':
			case 'hcut':

				$extra_w = "";
				$extra_h = "";

				switch ($rmode)
				{
					case 'vcut':
						$extra_h = "^";
						break;
					case 'hcut':
						$extra_w = "^";
						break;
				}

				$out = array();
				exec("$convert -units PixelsPerInch -resample 72 -auto-orient -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd -background $background $addOnPdf '$file_src' -resize ".$w.$extra_w."x".$h.$extra_h." -gravity center  -extent ".$w."x".$h." -quality $quality  '$file_dest'  2>&1",$out);
				if (!file_exists($file_dest)) {
					return $out;
				}
				break;

			case 'cco':

				$w = intval($w);
				$h = intval($h);

				if (($w == 0) || ($h == 0)) return "CCO: W ODER H ist 0 !!";
				
				// check for broken images
				$memKey = "SMART_RESIZER_SKIP_IMAGES";
				$skipFiles = memcachex::get($memKey);
				if (!is_array($skipFiles)) $skipFiles = array();
				
				if (in_array($file_src,$skipFiles))
				{
					$file_src = '/srv/gitgo_daten/www/burgenland.info/web/xstorage/sonne.jpg';
				} 

				$cmd = "$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd $addOnPdf '$file_src' -resize ".$w."x".$h."^ -gravity center -crop ".$w."x".$h."+0+0 -quality $quality '$file_dest'   2>&1";


				$out = array();
				exec($cmd,$out);
				if (!file_exists($file_dest)) {


					$skipFiles[] = $file_src;
					memcachex::set($memKey,$skipFiles);
					dbx::insert('storage_defect_images',array('sdi_file'=>$file_src));

					$out[] = $cmd;
					return $out;
				}


				break;
				
				
			case 'ccowhitebg':

				$w = intval($w);
				$h = intval($h);


				if (($w == 0) || ($h == 0)) return "CCO: W ODER H ist 0 !!";

				$cmd = "$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd $addOnPdf '$file_src' -resize ".$w."x".$h."^ -gravity center -crop ".$w."x".$h."+0+0 -quality $quality '$file_dest'   2>&1";

				if (libx::isDeveloper())
				{
						$cmd = "$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd '$file_src' $alpharemove -resize ".$w."x".$h."^ -gravity center -crop ".$w."x".$h."+0+0 -quality $quality -background $background '$file_dest'   2>&1";
						//die("ja ".$cmd);
				}
				

				exec($cmd,$out);
				if (!file_exists($file_dest)) {
					return $out;
				}
				break;	
				
					
			case 'festrict':
				
				$w = intval($w);
				$h = intval($h);

				if (($w == 0) || ($h == 0)) return "strict: W ODER H ist 0 !!";

				exec("$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd '$file_src' -resize ".$w."x".$h."\> -size ".$w."x".$h."  xc:none +swap -gravity center -quality $quality -composite -flatten -background white '$file_dest' 2>&1",$out);

				if (!file_exists($file_dest))
				{
					return $out;
				}

				break;

				
			case 'squeeze':
			default:


				$out = array();
				if (($w==-1)||($h==-1))
				{
					if ($w == -1) $w="";
					if ($h == -1) $h="";

					if (($w == "") && ($h == ""))
					{
						$cmd = "$convert -units PixelsPerInch -resample 72 -auto-orient -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd $addOnPdf '$file_src'  -quality $quality $alpharemove '$file_dest' 2>&1";
					} else
					{
								
						$cmd = "$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd $addOnPdf '$file_src' -resize ".$w."x".$h."  -quality $quality $alpharemove '$file_dest' 2>&1";
						
						
					}
				} else
				{
					//$cmd = "$convert -background transparent '$file_src' -resize ".$w."x".$h."\> -size ".$w."x".$h." xc:none +swap -gravity center -quality $quality -composite '$file_dest' 2>&1";




					if ($ext == 'png')
					{
						$cmd = "$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB."  $grayCmd -background $background $addOnPdf '$file_src' -resize ".$w."x".$h."\> -quality $quality  '$file_dest'  2>&1";
					} else
					{
						$cmd = "$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB."  $grayCmd -background $background -alpha remove $addOnPdf '$file_src' -resize ".$w."x".$h."\> -quality $quality  '$file_dest'  2>&1";
					}
				}

				exec($cmd,$out);
				if (!file_exists($file_dest)) {
					$out[] = $cmd;
					return $out;
				}
		}





		return true;
	}


	public static function resize2($rmode,$file_src,$file_dest,$w,$h,$ext='jpg',$quality=95,$colorspace='',$crop='', $isAnimGif=false)
	{

		
		$background = "transparent";
		$alpharemove = "";

		if ($ext != "png")
		{
			$background = "white";
			$alpharemove = "-flatten";
		}

		if (!self::isValidImage($file_src))
		{
			return "$file_src is not a valid Image Type.";
		}


		$grayCmd = "";

		if (strtolower($colorspace)=='gray')
		{
			$grayCmd = " -colorspace Gray ";
		}


		$convert = Ixcore::PATH_ImageMagick;



		if ($crop != "")
		{
			$crop = json_decode($crop,true);

			$_x = intval($crop['x']);
			$_y = intval($crop['y']);
			$_w = intval($crop['w']);
			$_h = intval($crop['h']);

			$cropCmd 	= " -crop ".$_w."x".$_h."+".$_x."+".$_y." ";
			$cmd 		= "$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." '$file_src' $cropCmd '$file_dest'  2>&1";


			exec($cmd,$out);
			
			
			if (!file_exists($file_dest)) {
				return $out;
			}

			return true;
		}
		
		
		if ($isAnimGif !== false)
		{
			
			//if (libx::isDeveloper())
			{
				if (($w == "") && ($h == ""))
				{
					$cmd = "$convert  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." '$file_src' -quality $quality $alpharemove -coalesce '$file_dest' 2>&1";
					exec($cmd,$out);
				} 
				
				else
				{
					$tmpGif 	= dirname($file_dest);
					$tmpGif 	.= 'temp_'.basename($file_dest); 
					
					$cmd = "$convert '$file_src' -coalesce '$tmpGif' 2>&1";
					exec($cmd,$out);
					
					$cmd = "$convert '$tmpGif' -resize ".$w."x".$h." '$file_dest' 2>&1";
					exec($cmd,$out);
					
					return true;
				}
				
					
				//die("is anim gif in resize");
				
				
			}
			
		}
		


		$addOnPdf 	= " ";
		$p2 		= explode(".",$file_src);
		$ext2 		= strtolower(array_pop($p2));

		if (in_array($ext2,array('pdf','tiff','tif')))
		{
			$addOnPdf = " -density 300 ";
		}

		switch ($rmode)
		{
			case 'strict':


				

				$w = intval($w);
				$h = intval($h);

				if (($w == 0) || ($h == 0)) return "strict: W ODER H ist 0 !!";

				if (libx::isDeveloper())
				{
					//exec("$convert -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." '$file_src' -background #ff0000 -flatten -resize ".$w."x".$h."\> -size ".$w."x".$h." -flatten -quality $quality '$file_dest' 2>&1",$out);
				}

				exec("$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd -background $background '$file_src' -resize ".$w."x".$h."\> -size ".$w."x".$h." xc:none +swap -gravity center -quality $quality -composite '$file_dest' 2>&1",$out);

				if (!file_exists($file_dest))
				{
					return $out;
				}

				break;

			case 'vcut':
			case 'hcut':

				$extra_w = "";
				$extra_h = "";

				switch ($rmode)
				{
					case 'vcut':
						$extra_h = "^";
						break;
					case 'hcut':
						$extra_w = "^";
						break;
				}

				$out = array();
				exec("$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd -background $background $addOnPdf '$file_src' -resize ".$w.$extra_w."x".$h.$extra_h." -gravity center  -extent ".$w."x".$h." -quality $quality  '$file_dest'  2>&1",$out);
				if (!file_exists($file_dest)) {
					return $out;
				}
				break;

			case 'cco':

				$w = intval($w);
				$h = intval($h);


				if (($w == 0) || ($h == 0)) return "CCO: W ODER H ist 0 !!";


				$cmd = "$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd $addOnPdf '$file_src' -resize ".$w."x".$h."^ -gravity center -crop ".$w."x".$h."+0+0 -quality $quality '$file_dest'   2>&1";


				exec($cmd,$out);
				if (!file_exists($file_dest)) {
					return $out;
				}
				break;
				
					
			case 'festrict':
				
				$w = intval($w);
				$h = intval($h);

				if (($w == 0) || ($h == 0)) return "strict: W ODER H ist 0 !!";

				exec("$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd '$file_src' -resize ".$w."x".$h."\> -size ".$w."x".$h."  xc:none +swap -gravity center -quality $quality -composite -flatten -background white '$file_dest' 2>&1",$out);

				if (!file_exists($file_dest))
				{
					return $out;
				}

				break;

				
			case 'squeeze':
			default:


				$out = array();
				if (($w==-1)||($h==-1))
				{
					if ($w == -1) $w="";
					if ($h == -1) $h="";

					if (($w == "") && ($h == ""))
					{
						$cmd = "$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd $addOnPdf '$file_src'  -quality $quality $alpharemove '$file_dest' 2>&1";
					} else
					{
								
						$cmd = "$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd $addOnPdf '$file_src' -resize ".$w."x".$h."  -quality $quality $alpharemove '$file_dest' 2>&1";
						
						
					}
				} else
				{
					//$cmd = "$convert -background transparent '$file_src' -resize ".$w."x".$h."\> -size ".$w."x".$h." xc:none +swap -gravity center -quality $quality -composite '$file_dest' 2>&1";




					if ($ext == 'png')
					{
						$cmd = "$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB."  $grayCmd -background $background $addOnPdf '$file_src' -resize ".$w."x".$h."\> -quality $quality  '$file_dest'  2>&1";
					} else
					{
						$cmd = "$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB."  $grayCmd -background $background -alpha remove $addOnPdf '$file_src' -resize ".$w."x".$h."\> -quality $quality  '$file_dest'  2>&1";
					}
				}

				exec($cmd,$out);
				if (!file_exists($file_dest)) {
					$out[] = $cmd;
					return $out;
				}
		}





		return true;
	}

	public static function smartResizer($file,$w,$h,$rmode='',$cacheDir=false,$cacheVersion=false,$returnLink=false,$strict=false,$type='jpg',$file_name="",$quality="95",$colorspace="",$crop="", $isAnimGif=false)
	{
		$background = "transparent";
		$alpharemove = "";
		
		
		if ($type != "png" && $type != 'jpg')
		{
			$background = "white";
			$alpharemove = "-flatten";
		}


		if (!self::isValidImage($file))
		{
			return "$file is not a valid Image Type.";
		}

		if ($_REQUEST['FCACHE']=="NO")
		{
			$useCache = false;
		} else
		{
			$useCache = true;
		}

		if ($cacheVersion === false) $cacheVersion = 5;

		$convert = Ixcore::PATH_ImageMagick;

		if (!file_exists($file))
		{
			//header("HTTP/1.0 404 Not Found");
			echo "Sorry, no image present.";
			if (libx::isDeveloper())
			{
				echo "FILE:$file !!";
			}
			return false;
			die();
		}

			

		$cachedFileName = $file_name.'_'.$cacheVersion.'_'.md5(filemtime($file).$w.$h.$file.$type.$quality.$cacheVersion.$strict.$rmode.$colorspace.$crop).'.'.$type;
		if (($cacheDir !== false) && (!is_dir($cacheDir))) $cacheDir = false;

		if ($cacheDir === false)
		{
			$cachedFile 	= hdx::getTmpDir().'/'.$cachedFileName;
		} else
		{
			
			$cachedFile = $cacheDir.'/'.$cachedFileName;

			if ($_REQUEST['FCACHE']=="NO")
			{
				@unlink($cachedFile);
			}

		}

		if (!file_exists($file))
		{
			die('404');
		}


		/*******************************************************************************************************
		** GRAY
		**/

		$grayCmd = "";
		if (strtolower($colorspace)=='gray')
		{
			$grayCmd = " -colorspace Gray ";
		}
		
		if (!file_exists($cachedFile)||(!$useCache))
		{
			

			@unlink($cachedFile);
			if ($strict)
			{

				$out = array();
				
				exec("$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd -background $background $alpharemove '$file' -resize ".$w."x".$h."\> -size ".$w."x".$h." xc:none +swap -gravity center -quality $quality -composite '$cachedFile' 2>&1",$out);

				if (!file_exists($cachedFile)) {
					if (libx::isDeveloper())
					{
						echo "<pre>";
						echo "SMART-RESIZER : ERROR 0 :: $file\n";
						print_r($out);
						echo "</pre>";
					}
				}
			} else
			{
					
				$feedback = self::resize($rmode,$file,$cachedFile,$w,$h,$type,$quality,$colorspace,$crop, $isAnimGif);

				if ($feedback !== true)
				{
					if (libx::isDeveloper())
					{
						echo "<pre>";
						echo "SMART-RESIZER : ERROR 1 :: $file | $cachedFile\n";
						print_r($feedback);

						echo "</pre>";
					}
				}
			}
		}

		if($returnLink)
		{
			return $cachedFile;
		}

		if (is_file($cachedFile))
		{
			if ($type == 'jpg') $type = 'jpeg';
			self::readfile_if_modified($cachedFile, array('Content-Type: image/'.$type));
			die();

			/*
			$fs = stat($cachedFile);
			header("Etag: ".sprintf('"%x-%x-%s"', $fs['ino'], $fs['size'],base_convert(str_pad($fs['mtime'],16,"0"),10,16)));
			if ($type == 'jpg') $type = 'jpeg';
			header('Last-Modified: '.filemtime($cachedFile));
			header('Accept-Ranges: bytes');
			header('Content-Length: '.filesize($cachedFile));
			header('Content-Type: image/'.$type);
			ob_clean();
			flush();
			readfile($cachedFile);
			*/
		}
		else
		{
			die('ERROR');
		}
		if (($cacheDir === false) && (is_file($cachedFile)))
		{
			@unlink($cachedFile);
		}

		die();
	}

	
	public static function smartResizer2($file,$w,$h,$rmode='',$cacheDir=false,$cacheVersion=false,$returnLink=false,$strict=false,$type='jpg',$file_name="",$quality="95",$colorspace="",$crop="", $isAnimGif=false)
	{
		$background = "transparent";
		$alpharemove = "";


		if ($type != "png" && $type != 'jpg')
		{
			$background = "white";
			$alpharemove = "-flatten";
		}


		if (!self::isValidImage($file))
		{
			return "$file is not a valid Image Type.";
		}

		if ($_REQUEST['FCACHE']=="NO")
		{
			$useCache = false;
		} else
		{
			$useCache = true;
		}

		if ($cacheVersion === false) $cacheVersion = 5;

		$convert = Ixcore::PATH_ImageMagick;

		if (!file_exists($file))
		{
			//header("HTTP/1.0 404 Not Found");
			echo "Sorry, no image present.";
			if (libx::isDeveloper())
			{
				echo "FILE:$file !!";
			}
			return false;
			die();
		}

		$cachedFileName = $file_name.'_'.$cacheVersion.'_'.md5(filemtime($file).$w.$h.$file.$type.$quality.$cacheVersion.$strict.$rmode.$colorspace.$crop).'.'.$type;
		if (($cacheDir !== false) && (!is_dir($cacheDir))) $cacheDir = false;

		if ($cacheDir === false)
		{
			$cachedFile 	= hdx::getTmpDir().'/'.$cachedFileName;
		} else
		{
			$cachedFile = $cacheDir.'/'.$cachedFileName;


			if ($_REQUEST['FCACHE']=="NO")
			{
				@unlink($cachedFile);
			}

		}

		if (!file_exists($file))
		{
			die('404');
		}


		/*******************************************************************************************************
		** GRAY
		**/

		$grayCmd = "";
		if (strtolower($colorspace)=='gray')
		{
			$grayCmd = " -colorspace Gray ";
		}
		
		$useCache = false;
		
		if (!file_exists($cachedFile)||(!$useCache))
		{

			@unlink($cachedFile);
			if ($strict)
			{

				$out = array();

				exec("$convert -units PixelsPerInch -resample 72 -auto-orient  -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." $grayCmd -background $background $alpharemove '$file' -resize ".$w."x".$h."\> -size ".$w."x".$h." xc:none +swap -gravity center -quality $quality -composite '$cachedFile' 2>&1",$out);

				if (!file_exists($cachedFile)) {
					if (libx::isDeveloper())
					{
						echo "<pre>";
						echo "SMART-RESIZER : ERROR 0 :: $file\n";
						print_r($out);
						echo "</pre>";
					}
				}
			} else
			{

				$feedback = self::resize2($rmode,$file,$cachedFile,$w,$h,$type,$quality,$colorspace,$crop, $isAnimGif);

				if ($feedback !== true)
				{
					if (libx::isDeveloper())
					{
						echo "<pre>";
						echo "SMART-RESIZER : ERROR 1 :: $file | $cachedFile\n";
						print_r($feedback);

						echo "</pre>";
					}
				}
			}
		}

		if($returnLink)
		{
			return $cachedFile;
		}

		if (is_file($cachedFile))
		{
			if ($type == 'jpg') $type = 'jpeg';
			self::readfile_if_modified($cachedFile, array('Content-Type: image/'.$type));
			die();

			/*
			$fs = stat($cachedFile);
			header("Etag: ".sprintf('"%x-%x-%s"', $fs['ino'], $fs['size'],base_convert(str_pad($fs['mtime'],16,"0"),10,16)));
			if ($type == 'jpg') $type = 'jpeg';
			header('Last-Modified: '.filemtime($cachedFile));
			header('Accept-Ranges: bytes');
			header('Content-Length: '.filesize($cachedFile));
			header('Content-Type: image/'.$type);
			ob_clean();
			flush();
			readfile($cachedFile);
			*/
		}
		else
		{
			die('ERROR');
		}
		if (($cacheDir === false) && (is_file($cachedFile)))
		{
			@unlink($cachedFile);
		}

		die();
	}



	public static function readfile_if_modified($filename, $http_header_additionals = array()) {


		if(!is_file($filename)) {
			header('HTTP/1.0 404 Not Found');
			return 404;
		}

		if(!is_readable($filename)) {
			header('HTTP/1.0 403 Forbidden');
			return 403;
		}

		$stat = @stat($filename);
		$etag = sprintf('%x-%x-%x', $stat['ino'], $stat['size'], $stat['mtime'] * 1000000);

		header('Expires: ');
		header('Cache-Control: ');
		header('Pragma: ');

		if(isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] == $etag) {
			header('Etag: "' . $etag . '"');
			header('HTTP/1.0 304 Not Modified');
			return 304;
		} elseif(isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $stat['mtime']) {
			header('Last-Modified: ' . date('r', $stat['mtime']));
			header('HTTP/1.0 304 Not Modified');
			return 304;
		}

		header('Last-Modified: ' . date('r', $stat['mtime']));
		header('Etag: "' . $etag . '"');
		header('Accept-Ranges: bytes');
		header('Content-Length:' . $stat['size']);
		foreach($http_header_additionals as $header) {
			header($header);
		}


		if(@readfile($filename) === false) {
			header('HTTP/1.0 500 Internal Server Error');
			return 500;
		} else {
			header('HTTP/1.0 200 OK');
			return 200;
		}

	}
}

