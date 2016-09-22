<?

class hdx
{
	private static $version		= "4.0";


	public static function getMime($file)
	{

		if (!file_exists($file)) return "";
		$a = @getimagesize($file);
		switch($a[2]) {
			case '1':
				$btype = 'image/gif';
				break;
			case '2':
				$btype = 'image/jpeg';
				break;
			case '3':
				$btype = 'image/png';
				break;
			case '4':
				$btype = 'application/x-shockwave-flash';
				break;
			default:
				$btype = "application/octet-stream";
		}
		return $btype;
	}


	public static function fread($filename) {
		if (@filesize($filename)==0) return "";
		if (($fp = @fopen($filename, 'rb'))) {
			$buffer = fread($fp, filesize($filename));
			fclose($fp);
			return $buffer;
		}
		return false;
	}

	public static function fwrite($filename, $filedata, $mode='w',$chmode='666')
	{
		if ($fp = @fopen($filename, $mode)) {
			fwrite($fp, $filedata);
			fclose($fp);
			return true;
		}
		return false;
	}

	public static function test()
	{

	}

	public static function fwrite2($filename, $filedata, $mode='w',$chmode='666')
	{
		die('XYZ');

		if ($fp = @fopen($filename, $mode)) {
			fwrite($fp, $filedata);
			fclose($fp);
			return true;
		}
		return false;
	}

	public static function getMimeByExtension($filename)
	{
		$mime_types = array(

		// images
		'txt' 	=> 'text/plain',
		'htm' 	=> 'text/html',
		'html' 	=> 'text/html',
		'php' 	=> 'text/html',
		'css' 	=> 'text/css',
		'js' 	=> 'application/javascript',
		'json' 	=> 'application/json',
		'xml' 	=> 'application/xml',
		'swf' 	=> 'application/x-shockwave-flash',
		'flv' 	=> 'video/x-flv',

		// images
		'png' 	=> 'image/png',
		'jpe' 	=> 'image/jpeg',
		'jpeg' 	=> 'image/jpeg',
		'jpg' 	=> 'image/jpeg',
		'gif' 	=> 'image/gif',
		'bmp' 	=> 'image/bmp',
		'ico' 	=> 'image/vnd.microsoft.icon',
		'tiff' 	=> 'image/tiff',
		'tif' 	=> 'image/tiff',
		'svg' 	=> 'image/svg+xml',
		'svgz' 	=> 'image/svg+xml',

		// archives
		'zip' 	=> 'application/zip',
		'rar' 	=> 'application/x-rar-compressed',
		'exe' 	=> 'application/x-msdownload',
		'msi' 	=> 'application/x-msdownload',
		'cab' 	=> 'application/vnd.ms-cab-compressed',

		// audio/video
		'mp3' 	=> 'audio/mpeg',
		'qt' 	=> 'video/quicktime',
		'mov' 	=> 'video/quicktime',

		// adobe
		'pdf' 	=> 'application/pdf',
		'psd' 	=> 'image/vnd.adobe.photoshop',
		'ai' 	=> 'application/postscript',
		'eps' 	=> 'application/postscript',
		'ps' 	=> 'application/postscript',

		// ms office
		'doc' 	=> 'application/msword',
		'rtf' 	=> 'application/rtf',
		'xls' 	=> 'application/vnd.ms-excel',
		'ppt' 	=> 'application/vnd.ms-powerpoint',
		'docx' 	=> "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
		'dotx' 	=> "application/vnd.openxmlformats-officedocument.wordprocessingml.template" ,
		'pptx' 	=> "application/vnd.openxmlformats-officedocument.presentationml.presentation" ,
		'ppsx' 	=> "application/vnd.openxmlformats-officedocument.presentationml.slideshow",
		'potx' 	=> "application/vnd.openxmlformats-officedocument.presentationml.template",
		'xlsx' 	=> "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
		'xltx' 	=> "application/vnd.openxmlformats-officedocument.spreadsheetml.template",

		// open office
		'odt' 	=> 'application/vnd.oasis.opendocument.text',
		'ods' 	=> 'application/vnd.oasis.opendocument.spreadsheet',
		);

		$ext = explode(".",basename($filename));
		$ext = array_pop($ext);

		if (isset($mime_types[$ext]))
		{
			return $mime_types[$ext];
		}

		return 'application/octet-stream';
	}

	public static function getTmpDir()
	{
		$xcoreTmp = dirname(__FILE__).'/../tmp';
		if (Ixcore::TEMP_DIR_USE_DEFAULT)
		{
			return $xcoreTmp;
		}
		if (is_dir(Ixcore::TEMP_DIR_ALTERNATE)) return Ixcore::TEMP_DIR_ALTERNATE;
		return $xcoreTmp;
	}

	public static function getTempFileName($name, $append="")
	{
		return tempnam(self::getTmpDir(),Ixcore::TEMP_DIR_PREFIX . $name) . $append;
	}
	public static function packFilesAndSend($path, $extension){

		if (!is_array($path)) $path = array($path);

		$files 	= array();
		$sort 	= true;

		foreach ($path as $p)
		{
			if (is_file($p)) {
				$files[] = $p;
				$sort = false;
			}

			if (is_dir($p))
			{
				$files = array_merge($files,self::fileListing($p));
			}
		}

		if ($sort)
		sort($files);

		$lastModTime = 0;
		$output = "";

		foreach ($files as $file)
		{
			if (!self::isExtension($file,$extension)) continue;
			$lastModTime = max(filemtime($file),$lastModTime);
			$output 	.= "\n/* ".basename($file)." - Line #".count(explode("\n",$output))." */\n";
			$output 	.= self::fread($file);
		}



		$lastModTime = time();

		header('Last-Modified: '.gmdate('D, d M Y H:i:s',$lastModTime) . ' GMT');
		header("Content-Type: text/html; charset=utf-8");
		header("Content-Length: ".strlen($output));

		switch ($extension)
		{
			case 'js':
				header("Content-Type: text/javascript");
				break;
			case 'css':
				header("Content-Type: text/css");
				break;
			default: break;
		}

		echo $output;
		die();
	}




	public static function packFilesAndStoreAndRedirect($path2store,$path,$extension,$die=true){

		$file_min = $path2store."/hdx_packed-gmin.$extension";

		if (!Ixconfig::production)
		{

			$files = hdx::fileListing($path);
			sort($files);

			$lastModTime = 0;
			$output = "";

			foreach ($files as $file)
			{
				if (!hdx::isExtension($file,$extension)) continue;
				$lastModTime = max(filemtime($file),$lastModTime);

				$output 	.= "\n/* ".basename($file)." - Line #".count(explode("\n",$output))." */\n";
				$output 	.= hdx::fread($file);
			}

			$lastModTime = time();

			if ($die) {
				header('Last-Modified: '.gmdate('D, d M Y H:i:s',$lastModTime) . ' GMT');
				header("Content-Type: text/html; charset=utf-8");
				header("Content-Length: ".strlen($output));
				switch ($extension)
				{
					case 'js':
						header("Content-Type: text/javascript");
						//header("Content-Type: application/javascript");
						break;
					case 'css':
						header("Content-Type: text/css");
						break;
					default: break;
				}
			}

			$file = $path2store."/hdx_packed.$extension";
			hdx::fwrite($file,$output);
			#$file_min = $path2store."/hdx_packed-min.$extension";
			#$cmd = "java -jar /home/admin-isp/yuicompressor-2.4.2/build/yuicompressor-2.4.2.jar $file -o $file_min --charset utf-8";
			#$cmd = "java -jar /home/admin-isp/closure-compiler/compiler.jar --compilation_level ADVANCED_OPTIMIZATIONS --js $file --js_output_file $file_min  2>&1";
			$cmd = "java -jar /usr/share/closure-compiler/compiler.jar --js $file --js_output_file $file_min  2>&1";
			$output = array();
			exec($cmd,$output);
			if (!file_exists($file_min)){
				print_r($output);
			}
		}

		if ($die){
			header("Location: ".basename($file_min),true,307);
			die();
		}
	}


	public static function modFileDate($filename)
	{
		return date ("F d Y H:i:s.",filemtime($filename));
	}



	public static function getFileExtension($fileName)
	{
		if ($fileName == null) return "";
		$fileName = trim(basename($fileName));
		if ($fileName == "") return "";
		$arr = explode('.',$fileName);
		return array_pop($arr);
	}

	public static function isExtension($file,$extension,$caseSense=false)
	{
		$ext = self::getFileExtension($file);
		if (!$caseSense)
		{
			return (strtolower($ext) == strtolower($extension));
		}
		else
		{
			return ($ext == $extension);
		}
	}

	public static function bytes2HumanReadAble ($size, $retstring = null) {
		$sizes = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
		if ($retstring === null) { $retstring = '%01.2f %s'; }
		$lastsizestring = end($sizes);
		foreach ($sizes as $sizestring) {
			if ($size < 1024) { break; }
			if ($sizestring != $lastsizestring) { $size /= 1024; }
		}
		if ($sizestring == $sizes[0]) { $retstring = '%01d %s'; } // Bytes aren't normally fractional
		return sprintf($retstring, $size, $sizestring);
	}


	public static function dirsize($dirname) {
		if (!is_dir($dirname) || !is_readable($dirname)) {
			return false;
		}

		$dirname_stack[] = $dirname;
		$size = 0;

		do {
			$dirname = array_shift($dirname_stack);
			$handle = opendir($dirname);
			while (false !== ($file = readdir($handle))) {
				if ($file != '.' && $file != '..' && is_readable($dirname . DIRECTORY_SEPARATOR . $file)) {
					if (is_dir($dirname . DIRECTORY_SEPARATOR . $file)) {
						$dirname_stack[] = $dirname . DIRECTORY_SEPARATOR . $file;
					}
					$size += filesize($dirname . DIRECTORY_SEPARATOR . $file);
				}
			}
			closedir($handle);
		} while (count($dirname_stack) > 0);

		return $size;
	}

	public static function isImage($file)
	{
		$arr = explode(".",$file);
		$ext = strtolower(array_pop($arr));

		switch ($ext)
		{
			case 'ico':
			case 'jpeg':
			case 'tif':
			case 'png':
			case 'jpg':
			case 'gif':
			case 'bmp':
			case 'pdf':
				return true;
			default:
				return false;
		}
	}

	public static function readDir($dir,$hide=array(),$recursive=false,$checkFileSize=false,$checkDirSize=false,$showDirs=true,$showFiles=true,$phpAllowed=false)
	{
		if (!is_dir($dir)) return false;

		$dir = realpath($dir);

		if (!isset($hide['filenames'])) 			$hide['filenames'] = array();
		if (!isset($hide['absoluteFilenames'])) 	$hide['absoluteFilenames'] = array();
		if (!isset($hide['extensions'])) 			$hide['extensions'] = array();
		if (!isset($hide['extensions']['cs'])) 		$hide['extensions']['cs'] = array();
		if (!isset($hide['extensions']['ncs'])) 	$hide['extensions']['ncs'] = array();
		if (!isset($hide['dirs'])) 					$hide['dirs'] = array();

		$hide['filenames'][] = ".";
		$hide['filenames'][] = "..";
		$hide['filenames'][] = ".svn";
		$hide['filenames'][] = ".htaccess";
		$hide['filenames'][] = ".htpasswd";

		if (!$phpAllowed)
		$hide['extensions']['ncs'][] = "php";




		$content = array();
		if ($handle = opendir($dir)) {
			while (false !== ($file = readdir($handle))) {

				$processFile = true;

				$fullName = $dir."/".$file;
				$ext = self::getFileExtension($file);

				if (in_array($ext,$hide['extensions']['cs'])) 				$processFile = false;
				if (in_array(strtolower($ext),$hide['extensions']['ncs'])) 	$processFile = false;
				if (in_array($file,$hide['filenames'])) 					$processFile = false;
				if (in_array($fullName,$hide['absoluteFilenames'])) 		$processFile = false;

				if ($processFile)
				{

					$tmp = array();

					if (is_dir($fullName) && $showDirs) // DIR
					{
						$tmp['TYPE']			= 'DIR';
						$tmp['D_NAME']			= $file;
						$tmp['D_NAME_FULL']		= $fullName;
						$tmp['D_DIR']			= $dir;

						if ($checkDirSize)
						{
							$tmp['D_SIZE']			= self::dirsize($fullName);
							$tmp['D_SIZE_HUMAN']	= self::bytes2HumanReadAble($tmp['D_SIZE']);
						}
						else
						{
							$tmp['D_SIZE']			= -1;
							$tmp['D_SIZE_HUMAN']	= "-1";
						}

						if ($recursive)
						{
							if (!in_array($fullName,$hide['dirs']))
							$tmp['D_FILES']			= self::readDir($fullName,$hide,$recursive,$checkFileSize,$checkDirSize,$showDirs,$showFiles);
						}
						else
						$tmp['D_FILES']			= false;

					}
					if (is_file($fullName) && $showFiles)
					{
						$tmp['TYPE']			= 'FILE';
						$tmp['F_NAME']			= $file;
						$tmp['F_NAME_FULL']		= $fullName;
						$tmp['F_DIR']			= $dir;
						if ($checkFileSize)
						{
							$tmp['F_SIZE']			= filesize($fullName);
							$tmp['F_SIZE_HUMAN']	= self::bytes2HumanReadAble($tmp['F_SIZE']);
						}
						else
						{
							$tmp['F_SIZE']			= -1;
							$tmp['F_SIZE_HUMAN']	= "-1";
						}
					}

					$content[] = $tmp;
				}
			}
			closedir($handle);
		}
		return $content;
	}

	public static function dirListing($path)
	{
		$ret = array();

		if (file_exists(($path)) && is_dir(($path))) {
			foreach (new DirectoryIterator(($path)) as $file) {
				if (($file->getBasename() == ".")  || ($file->getBasename() == "..")) continue;
				if (true === $file->isDir()) {
					$ret[] = $file->getPathName();
				}
			}
		}

		return $ret;
	}

	public static function fileListing($path)
	{
		$ret = array();

		if (file_exists(($path)) && is_dir(($path))) {
			foreach (new DirectoryIterator(($path)) as $file) {
				if (($file->getBasename() == ".")  || ($file->getBasename() == "..")) continue;
				if (true === $file->isFile()) {
					$ret[] = $file->getPathName();
				}
			}
		}

		return $ret;
	}

	public static function isEmptyDir($path)
	{
		if (file_exists(($path)) && is_dir(($path))) {
			foreach (new DirectoryIterator(($path)) as $file) {
				if (($file->getBasename() == ".")  || ($file->getBasename() == "..")) continue;
				return false;
			}
		}
		return true;
	}

	public static function readDirFlatArray($dir,$hide=array(),$recursive=false,$checkFileSize=false,$checkDirSize=false,$showDirs=true,$showFiles=true,$hideDir=array())
	{
		if (!is_dir($dir)) return false;


		$dir = realpath($dir);

		if (!isset($hide['filenames'])) 			$hide['filenames'] = array();
		if (!isset($hide['absoluteFilenames'])) 	$hide['absoluteFilenames'] = array();
		if (!isset($hide['extensions'])) 			$hide['extensions'] = array();
		if (!isset($hide['extensions']['cs'])) 		$hide['extensions']['cs'] = array();
		if (!isset($hide['extensions']['ncs'])) 	$hide['extensions']['ncs'] = array();
		if (!isset($hide['dirs'])) 					$hide['dirs'] = array();


		$hide['filenames'][] = ".";
		$hide['filenames'][] = "..";

		$content = array();
		if ($handle = opendir($dir)) {
			while (false !== ($file = readdir($handle))) {

				$processFile = true;

				$fullName = $dir."/".$file;
				$ext = self::getFileExtension($file);

				if (in_array($ext,$hide['extensions']['cs'])) 				$processFile = false;
				if (in_array(strtolower($ext),$hide['extensions']['ncs'])) 	$processFile = false;
				if (in_array($file,$hide['filenames'])) 					$processFile = false;
				if (in_array($fullName,$hide['absoluteFilenames'])) 		$processFile = false;

				if ($processFile)
				{

					$tmp = array();

					if (is_dir($fullName) && $showDirs) // DIR
					{
						$tmp['TYPE']			= 'DIR';
						$tmp['D_NAME']			= $file;
						$tmp['D_NAME_FULL']		= $fullName;
						$tmp['D_DIR']			= $dir;

						if ($checkDirSize)
						{
							$tmp['D_SIZE']			= self::dirsize($fullName);
							$tmp['D_SIZE_HUMAN']	= self::bytes2HumanReadAble($tmp['D_SIZE']);
						}
						else
						{
							$tmp['D_SIZE']			= -1;
							$tmp['D_SIZE_HUMAN']	= "-1";
						}

						if ($recursive)
						{
							if (!in_array($fullName,$hide['dirs']))
							{
								$flatten = self::readDirFlatArray($fullName,$hide,$recursive,$checkFileSize,$checkDirSize,$showDirs,$showFiles);

								for ($f=0;$f<count($flatten);$f++)
								{
									$content[] = $flatten[$f];
								}
							}
						}

					}
					if (is_file($fullName) && $showFiles)
					{
						$tmp['TYPE']			= 'FILE';
						$tmp['F_NAME']			= $file;
						$tmp['F_NAME_FULL']		= $fullName;
						$tmp['F_DIR']			= $dir;
						if ($checkFileSize)
						{
							$tmp['F_SIZE']			= filesize($fullName);
							$tmp['F_SIZE_HUMAN']	= self::bytes2HumanReadAble($tmp['F_SIZE']);
						}
						else
						{
							$tmp['F_SIZE']			= -1;
							$tmp['F_SIZE_HUMAN']	= "-1";
						}
					}

					$content[] = $tmp;
				}
			}
			closedir($handle);
		}



		return $content;
	}


	public static function delete_rec($dir) {
		if (!file_exists($dir)) return true;
		if (!is_dir($dir) || is_link($dir)) return unlink($dir);
		foreach (scandir($dir) as $item) {
			if ($item == '.' || $item == '..') continue;
			if (!self::delete_rec($dir . "/" . $item)) {
				chmod($dir . "/" . $item, 0777);
				if (!self::delete_rec($dir . "/" . $item)) return false;
			};
		}
		return rmdir($dir);
	}


	public static function zipFilesAndSendAsDownload($files,$nameOfZipFile)
	{
		$tmpfname = hdx::getTempFileName("zipping_$nameOfZipFile",".rar");

		$existingFiles = array();

		foreach ($files as $file) {
			if (file_exists($file)) $existingFiles[] = "'".realpath($file)."'";
		}
		if (count($existingFiles) == 0) return 'NO_FILES_EXISTING';

		$cmd = "zip -0 -j -rD '$tmpfname' ".implode(' ',$existingFiles)." 2>&1";
		//$cmd = "rar a -ep '$tmpfname' ".implode(' ',$existingFiles)." 2>&1";
		$out = array();
		exec($cmd,$out);
		if (!file_exists($tmpfname))
		{
			echo "<pre>";
			echo "ERROR CREATING ZIP.";
			print_r($out);
			echo "</pre>";
			die();
		}
		if (filesize($tmpfname) == 0)
		{
			echo "<pre>";
			echo "ERROR CREATING ZIP.";
			print_r($out);
			echo "</pre>";
			die();
		}

		ignore_user_abort(true);
		header("Cache-Control: public, must-revalidate");
		header("Pragma: hack");
		header("Content-Type: application/force-download");
		header("Content-Length: " .filesize($tmpfname));
		header('Content-Disposition: attachment; filename="'.$nameOfZipFile.'"');
		header("Content-Transfer-Encoding: binary\n");
		readfile($tmpfname);
		@unlink($tmpfname);
		die();
	}

	public static function csvContentInline($csvData,$nameOfCSVFile)
	{
		//header("Cache-Control: public, must-revalidate");
		//header("Pragma: hack");
		header("Content-type: text/csv; charset=utf-8");
		//header("Content-Type: text/csv");
		header("Content-Length: " .strlen($csvData));
		header('Content-Disposition: inline; filename="'.$nameOfCSVFile.'"');
		//header("Content-Transfer-Encoding: binary\n");
		echo $csvData;
		die();
	}

	public static function csvContentDownload($csvData,$nameOfCSVFile)
	{
		//header("Cache-Control: public, must-revalidate");
		//header("Pragma: hack");
		//header("Content-Type: text/csv");
		header("Content-type: text/csv; charset=utf-8");
		header("Content-Length: " .strlen($csvData));
		header('Content-Disposition: attachment; filename="'.$nameOfCSVFile.'"');
		//header("Content-Transfer-Encoding: binary\n");
		echo utf8_decode($csvData);
		die();
	}

	public static function excelContentDownload($csvData,$nameOfCSVFile)
	{
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="01simple.xls"');
		header('Cache-Control: max-age=0');
	}




}
