<?

class xredaktor_storage
{

	public static function registerExistingDir($storageId,$dir)
	{
		$storageId = intval($storageId);
		if ($storageId == 0) die("\nStorage Scope Id : 0 ? \n");
		if (!is_dir($dir)) return false;
		$root = self::getDirOfStorageScope($storageId);


		$test 	= explode("/",substr($dir,strlen($root)+1));
		$check	= $root;
		$last_s_dir_id = 0;

		foreach ($test as $i => $t)
		{
			$check .= '/' . $t;
			usleep(rand(0,300));
			$s = dbx::query("select * from storage where s_onDisk = '$check' and s_dir='Y' and s_del='N'");
			if ($s === false)
			{

				if ($i == 0) // ROOT
				{

					$db = array(
					's_fid' 			=> 0, // root
					's_name' 			=> $t,
					's_onDisk' 			=> $check,
					's_dir' 			=> 'Y',
					's_del' 			=> 'N',
					's_sort' 			=> '999999',
					's_storage_scope' 	=> $storageId,
					's_created'			=> 'NOW()'
					);

					dbx::insert('storage',$db);
					$s_dir = dbx::getLastInsertId();

				} else {

					$db = array(
					's_fid' 			=> $last_s_dir_id,
					's_name' 			=> $t,
					's_onDisk' 			=> $check,
					's_dir' 			=> 'Y',
					's_del' 			=> 'N',
					's_sort' 			=> '999999',
					's_storage_scope' 	=> $storageId,
					's_created'			=> 'NOW()'
					);

					dbx::insert('storage',$db);
					$s_dir = dbx::getLastInsertId();

				}

			} else {
				$s_dir = intval($s['s_id']);
			}

			$last_s_dir_id = $s_dir;
		}

		return $last_s_dir_id;
	}


	public static function registerExistingFile($storageId,$file)
	{

		$debug = (basename($file)=='11896145_1120233301333023_7879741639459553501_n - Copy.jpg');


		$storageId = intval($storageId);
		if ($storageId == 0) die("\nStorage Scope Id : 0 ? \n");
		if (!is_file($file)) return false;
		$root = self::getDirOfStorageScope($storageId);


		$infos = pathinfo($file);
		$dirname = $infos['dirname'];

		$test 	= explode("/",substr($dirname,strlen($root)+1));
		$check	= $root;
		$last_s_dir_id = 0;

		foreach ($test as $i => $t)
		{



			$check .= '/' .$t;

			usleep(rand(0,300));
			$s = dbx::query("select * from storage where s_onDisk = '$check' and s_dir='Y' and s_del='N'");
			if ($s === false)
			{

				if ($i == 0) // ROOT
				{

					$db = array(
					's_fid' 			=> 0, // root
					's_name' 			=> $t,
					's_onDisk' 			=> $check,
					's_dir' 			=> 'Y',
					's_del' 			=> 'N',
					's_sort' 			=> '999999',
					's_storage_scope' 	=> $storageId,
					's_created'			=> 'NOW()'
					);

					dbx::insert('storage',$db);
					$s_dir = dbx::getLastInsertId();

				} else {

					$db = array(
					's_fid' 			=> $last_s_dir_id,
					's_name' 			=> $t,
					's_onDisk' 			=> $check,
					's_dir' 			=> 'Y',
					's_del' 			=> 'N',
					's_sort' 			=> '999999',
					's_storage_scope' 	=> $storageId,
					's_created'			=> 'NOW()'
					);

					dbx::insert('storage',$db);
					$s_dir = dbx::getLastInsertId();

				}

			} else {
				$s_dir = intval($s['s_id']);
			}

			$last_s_dir_id = $s_dir;

			//	echo "$check -> $s_dir \n";
		}



		// TODO proper fix
		$file = dbx::escape($file);

		$s = dbx::query("select * from storage where s_onDisk = '$file' and s_dir='N' and s_del='N' and s_storage_scope = $storageId  ");

		if ($s === false)
		{

			$file_size = filesize($file);

			list($width, $height, $type, $attr) = @getimagesize($file);

			if ($debug)
			{
				// die('TTTTTTTT');
			}

			$db = array(
			's_fid' 			=> $last_s_dir_id,
			's_name' 			=> basename($file),
			's_onDisk' 			=> $file,
			's_dir' 			=> 'N',
			's_del' 			=> 'N',
			's_sort' 			=> '999999',
			's_storage_scope' 	=> $storageId,
			's_created'			=> 'NOW()',

			's_fileSizeBytes'		=> $file_size,
			's_fileSizeBytesHuman'	=> hdx::bytes2HumanReadAble($file_size),
			's_mimeType'			=> hdx::getMimeByExtension($file),
			's_media_w'				=> $width,
			's_media_h'				=> $height,

			);

			dbx::insert('storage',$db);
			$s_id = dbx::getLastInsertId();
			self::handleCMYK($s_id);
			return $s_id;
		} else {



			$file_size = filesize($file);
			list($width, $height, $type, $attr) = @getimagesize($file);

			$db = array(
			's_name' 				=> basename($file),
			's_lastmod'				=> 'NOW()',
			's_fileSizeBytes'		=> $file_size,
			's_fileSizeBytesHuman'	=> hdx::bytes2HumanReadAble($file_size),
			's_mimeType'			=> hdx::getMimeByExtension($file),
			's_media_w'				=> $width,
			's_media_h'				=> $height,
			);
			$s_id = $s['s_id'];
			dbx::update('storage',$db,array('s_id'=>$s_id));



			self::handleCMYK($s_id);

			return $s_id;
		}
	}

	public static function getFilePathById($s_id)
	{
		$f = self::getById($s_id);
		if ($f === false) return false;
		if (!file_exists($f['s_onDisk'])) return false;
		return $f['s_onDisk'];
	}


	public static function getFileStorageScopeId($s_id)
	{
		$f = self::getById($s_id);
		if ($f === false) return false;
		return intval($f['s_storage_scope']);
	}


	public static function webSafeFileName($str)
	{
		$str = mb_strtolower($str,'UTF-8');

		$replaceMe = array(
		'?' => '-',
		'%' => '-prozent-',
		'Ü' => 'ue',
		'Ä' => 'ae',
		'Ö' => 'oe',
		'ä' => 'ae',
		'ö' => 'oe',
		'ü' => 'ue',
		'ä' => 'ae',
		"\\" => '',
		"|" => '-',
		"=" => '-',
		" " => '_',
		"ó" => 'o',
		"ò" => 'o',
		"á" => 'a',
		"à" => 'a',
		"í" => 'i',
		"é" => 'e',
		"è" => 'e',
		"*" => '',
		"´" => '',
		"'" => '',
		"&amp;" => '-',
		"amp;" => '-',
		"--" => '-',
		"&" => 'und',
		);

		$s = array();
		$r = array();

		foreach ($replaceMe as $k => $v)
		{
			$s[] = $k;
			$r[] = $v;
		}

		$str = str_replace($s,$r,$str);
		$str = str_replace('--','-',$str);

		return $str;
	}

	public static function findNotUsedFileName($s_onDisk,$finalDest)
	{
		$file_name		= basename($finalDest);
		$file_nameX 	= explode(".",$file_name);
		$ext 			= array_pop($file_nameX);
		$nakedName 		= implode('.',$file_nameX);

		$numberMe = 1;
		while (file_exists($finalDest))
		{
			if ($numberMe == 1)
			{
				$file_name = $nakedName.' - Copy.'.$ext;

			} else
			{
				$file_name 	= $nakedName.' - Copy ('.$numberMe.').'.$ext;
			}

			$finalDest 	= $s_onDisk . '/' . $file_name;
			$numberMe++;
		}
		return $finalDest;
	}

	public static function getByFileLocation($s_storage_scope,$file)
	{
		$s_storage_scope 	= intval($s_storage_scope);
		$finalFile 			= realpath(dirname($file)).'/'.basename($file);

		if (!is_file($finalFile)) return false;
		$file = dbx::query("select * from storage where s_onDisk = '$finalFile' and s_storage_scope = $s_storage_scope and s_del='N' and s_dir='N'");

		if ($file === false) return false;
		return intval($file['s_id']);
	}

	public static function fc_singleUpload()
	{
		$invalidExtensions = array('php','htaccess','pl','php3');

		$ext = explode(".",basename($_FILES['file']['name']));
		$ext = array_pop($ext);

		if (in_array($ext,$invalidExtensions))
		{
			frontcontrollerx::json_success(array('MSG'=>'INVALID FILE TYPE'));
			die();
		}

		$file_tmp 	= $_FILES['file']['tmp_name'];

		$f_s_id 	= intval($_REQUEST['f_s_id']);
		$dir 		= self::getFileDstById($f_s_id);
		$name 		= basename($_FILES['file']['name']);


		$file		= $dir . '/' . $name;

		if (file_exists($file))
		{
			$file = self::findNotUsedFileName($dir,$file);
		}

		if (file_exists($file))
		{
			@unlink($file);
		}

		$dir = dirname($file);
		if (!is_dir($dir))
		{
			exec("mkdir $dir -p");
		}

		if (move_uploaded_file($file_tmp,$file))
		{
			$s_id = xredaktor_storage::registerExistingFile(1,$file);
			frontcontrollerx::json_success(array('FILE'=>$s_id));
		} else {
			frontcontrollerx::json_success(array('MSG'=>'MOVE FILE FAILED'));
		}
	}

	public static function fc_handleUpload()
	{
		$s_id 				= frontcontrollerx::isInt($_REQUEST['s_id']);
		$s_storage_scope 	= frontcontrollerx::isInt($_REQUEST['s_storage_scope']);

		$file_tmp 	= $_FILES['files']['tmp_name'][0];
		if (!file_exists($file_tmp)) frontcontrollerx::json_failure('TMP_FILE_NOT_EXISTS',1,$_FILES['files']);

		$file_name	= basename($_FILES['files']['name'][0]);
		$file_size	= filesize($file_tmp);

		if ($s_id != 0)
		{
			$s = self::getById($s_id);
			if ($s['s_dir'] != 'Y') frontcontrollerx::json_failure('DIR_NOT_EXISTS',2);
			$s_onDisk	= $s['s_onDisk'];
		} else
		{
			$s_onDisk	= self::getDirOfStorageScope($s_storage_scope);
		}

		$finalDest 	= $s_onDisk . '/' . $file_name;


		$autoRename = (isset($_REQUEST['autoRename']) && intval($_REQUEST['autoRename']) == 1);
		if (!isset($_REQUEST['autoRename'])) $autoRename = true;

		if (is_file($finalDest) && $autoRename) {
			$finalDest = self::findNotUsedFileName($s_onDisk,$finalDest);
			$file_name = basename($finalDest);
		} else
		{


			if (is_file($finalDest)) // over
			{

				$s_id = self::getByFileLocation($s_storage_scope,$finalDest);

				if ($s_id === false) {
					frontcontrollerx::json_failure('DB_ID_NOT_FOUND',3,array($file_tmp,$finalDest));
				}

				$s_id = intval($s_id);

				$tmpFile = hdx::getTempFileName('file_overwrite_'.$s_id);
				rename($finalDest,$tmpFile);

				if (move_uploaded_file($file_tmp,$finalDest))
				{

					list($width, $height, $type, $attr) = @getimagesize($finalDest);

					dbx::update('storage',array(
					's_fileSizeBytes'		=> $file_size,
					's_fileSizeBytesHuman'	=> hdx::bytes2HumanReadAble($file_size),
					's_mimeType'			=> hdx::getMimeByExtension($finalDest),
					's_media_w'				=> $width,
					's_media_h'				=> $height,
					's_lastmod'				=> 'NOW()'
					),array('s_id'=>$s_id));

					dbx::query("update storage set s_version = s_version + 1 where s_id = $s_id");

					@unlink($tmpFile);
					xredaktor_log::fileOverwrite($s_id);

					frontcontrollerx::json_success(array('s_id'=>$s_id));

				} else
				{
					rename($tmpFile,$finalDest);
					frontcontrollerx::json_failure('OVERWRITE_FAILED',3,array($file_tmp,$finalDest));
				}



			} else // file existiert nicht // passt
			{



			}

		}

		if (move_uploaded_file($file_tmp,$finalDest))
		{

			list($width, $height, $type, $attr) = @getimagesize($finalDest);

			dbx::insert('storage',array(
			's_dir' 			=> 'N',
			's_storage_scope' 	=> $s_storage_scope,
			's_sort' 			=> dbx::queryAttribute("select max(s_sort)+1 as sorty from storage where s_fid = $s_id and s_dir = 'N'",'sorty'),
			's_fileSizeBytes'		=> $file_size,
			's_fileSizeBytesHuman'	=> hdx::bytes2HumanReadAble($file_size),
			's_mimeType'		=> hdx::getMimeByExtension($finalDest),
			's_onDisk'			=> $finalDest,
			's_name'			=> $file_name,
			's_fid'				=> $s_id,
			's_media_w'			=> $width,
			's_media_h'			=> $height,
			's_created'			=> 'NOW()'
			));

			$s_id = dbx::getLastInsertId();

			xredaktor_log::fileUpload($s_id);

			frontcontrollerx::json_success(array('s_id'=>$s_id));

		} else
		{
			frontcontrollerx::json_failure('MOVE_FAILED',3,array($file_tmp,$finalDest));
		}
	}

	private static function validFileType($as,$fileName)
	{
		$ext 		= strtolower(hdx::getFileExtension($fileName));
		if ($ext == "") return false;

		$ext_block 	= array('sh','exe','bat','com');
		$ext_imgs 	= array('bmp','jpeg','jpg','gif','png');

		$as_type = $as['as_type'];

		switch ($as_type)
		{
			case 'CONTAINER-FILES':
				if (in_array($ext,$ext_block)) return false;
				break;
			case 'CONTAINER-IMAGES':
				if (!in_array($ext,$ext_imgs)) return false;
				break;
		}

		return true;
	}



	public static function getImageColorspace($file_src)
	{

		if (!$file_src) return;

		$ret ="sRGB";
		$outColorSpace = array();

		exec("identify -format '%[colorspace]' $file_src", $outColorSpace);

		switch ($outColorSpace[0]) {

			case 'CMYK':
			case 'CMYK':
				$ret = "CMYK";
				break;

			default:
				break;
		};

		return $ret;
	}

	public static function handleCMYK($s_id)
	{
		return false;
		$file = self::getFileDstById($s_id);
		clearstatcache();
		if (imagesx::isValidImage($file) && file_exists($file))
		{
			$cs = self::getImageColorspace($file);
			if ($cs != 'sRGB')
			{
				$convert 		= Ixcore::PATH_ImageMagick;
				$targetProfile 	=  dirname(__FILE__).'/sRGB.icc';
				$inputProfile =  dirname(__FILE__).'/USWebCoatedSWOP.icc';
				$cmd = "$convert '$file' -profile '$targetProfile' '$file' 2>&1";

				// check for no profile
				$cmdDev = "identify -verbose $file | grep -A 2 'Profile-icc'";
				exec($cmdDev,$outDev);

				// no profile
				if (empty($outDev))
				{
					$cmd = "$convert '$file' -strip -profile '$inputProfile' -profile '$targetProfile' '$file' 2>&1";
				}

				// hat profile, aber vl incorrect?
				else
				{
					$searchword = 'sRGB';
					$matches = array_filter($outDev, function($var) use ($searchword) { return preg_match("/\b$searchword\b/i", $var); });

					// incorrect profile => strip
					if (!empty($matches))
					{
						$cmd = "$convert '$file' -strip -profile '$inputProfile' -profile '$targetProfile' '$file' 2>&1";
					}
				}

				exec($cmd,$out);
			}
		}

		return true;
	}


	public static function registerFileInStorage($s_id,$file_tmp,$file_name,$move=true,$overwrite=false)
	{
		$file_name			= basename($file_name);
		$s_fid 				= frontcontrollerx::isInt($s_id);
		$s_storage_scope 	= self::getByIdStorageScope($s_fid);
		$file_size			= filesize($file_tmp);

		if ($s_id != 0)
		{
			$s = self::getById($s_id);
			if ($s['s_dir'] != 'Y') frontcontrollerx::html_failure('DIR_NOT_EXISTS',2);
			$s_onDisk	= $s['s_onDisk'];
		} else
		{
			$s_onDisk	= self::getDirOfStorageScope($s_storage_scope);
		}

		$finalDest 	= $s_onDisk . '/' . $file_name;


		##### CHECK IF EXISTS AND NOT RENAME (OVERWRITE)

		if (is_file($finalDest) && ($overwrite === false)) {

			$file_nameX 	= explode(".",$file_name);
			$ext 			= array_pop($file_nameX);
			$nakedName 		= implode('.',$file_nameX);

			$numberMe = 1;
			while (file_exists($finalDest))
			{
				if ($numberMe == 1)
				{
					$file_name = $nakedName.' - Copy.'.$ext;

				} else
				{
					$file_name 	= $nakedName.' - Copy ('.$numberMe.').'.$ext;
				}

				$finalDest 	= $s_onDisk . '/' . $file_name;
				$numberMe++;
			}
		}

		$state = false;
		if ($move)
		{

			if ($file_tmp == $finalDest) {
				$state = true;
			} else {

				if (rename($file_tmp,$finalDest))
				{
					$state = true;
				}
			}


		} else
		{
			if ($file_tmp == $finalDest) {
				$state = true;
			} else {
				if (@copy($file_tmp,$finalDest))
				{
					$state = true;
				}
			}
		}

		if ($state)
		{
			list($width, $height, $type, $attr) = @getimagesize($finalDest);
			
			$db = array(
			's_dir' 				=> 'N',
			's_storage_scope' 		=> $s_storage_scope,
			's_sort' 				=> dbx::queryAttribute("select max(s_sort)+1 as sorty from storage where s_fid = $s_id and s_dir = 'N'",'sorty'),
			's_fileSizeBytes'		=> $file_size,
			's_fileSizeBytesHuman'	=> hdx::bytes2HumanReadAble($file_size),
			's_mimeType'			=> hdx::getMimeByExtension($finalDest),
			's_onDisk'				=> $finalDest,
			's_name'				=> $file_name,
			's_fid'					=> $s_id,
			's_media_w'				=> $width,
			's_media_h'				=> $height,
			's_created'				=> 'NOW()'
			);

			if ($overwrite)
			{
				$exists = dbx::query("select * from storage where s_del='N' and s_storage_scope = $s_storage_scope and s_dir = 'N' and s_onDisk = '$finalDest'");

				if ($exists === false) {
					dbx::insert('storage',$db);
					return dbx::getLastInsertId();
				} else {
					$s_id = intval($exists['s_id']);

					$db['s_version'] = intval($exists['s_version'])+1;
					$db['s_lastmod'] = 'NOW()';

					unset($db['s_sort']);
					unset($db['s_created']);
					dbx::update('storage',$db,array('s_id'=>$s_id));
					self::handleCMYK($s_id);
					return $s_id;
				}

			} else {
				dbx::insert('storage',$db);
				$s_id = dbx::getLastInsertId();
				self::handleCMYK($s_id);
				return $s_id;
			}


		}

		return false;
	}


	public static function registerMultiFilesInStorage($as_id,$wz_id,$files,$moveFile=false)
	{
		$as_id  = intval($as_id);
		$wz_id 	= intval($wz_id);

		$as 	= xredaktor_atoms_settings::getById($as_id);
		$s_f_id = intval($as['as_config']);

		$success 	= false;
		$id 		= 0;

		$ret = array();

		if ($s_f_id != 0)
		{

			foreach ($files as $file)
			{

				$file_tmp 	= $file;
				$file_name 	= basename($file);

				if (!self::validFileType($as,$file_name))
				{
					$ret[$file_tmp] = -4;
					continue;
					//frontcontrollerx::json_success(array('ok'=>false,'error'=>$file_name.' hat einen falschen File-Typ.'));
				}

				if (file_exists($file_tmp)) {

					$table = xredaktor_wizards::handle_CONTAINER_FILES_table($as);
					if ($table !== false) {

						$success 	= true;
						$s_name 	= "Datensatz_".$wz_id;

						$s_f_id_record = xredaktor_storage::createDir($s_f_id,$s_name);

						if ($s_f_id_record === false) {
							$ret[$file_tmp] = -5;
							continue;
							//frontcontrollerx::json_success(array('ok'=>false,'error'=>'Datensatzverzeichnis konnte nicht angelegt werden.'));
						}

						$s_id = xredaktor_storage::registerFileInStorage($s_f_id_record,$file_tmp,$file_name,$moveFile);

						if ($s_id === false) {
							$ret[$file_tmp] = -6;
							continue;
							//frontcontrollerx::json_success(array('ok'=>false,'error'=>'Register fehlgeschlagen.'));
						}

						$wz_sort 	= dbx::queryAttribute("select max(wz_sort) as maxx from $table where wz_r_id = $wz_id","maxx");

						$data = array(
						'wz_sort' 		=> intval($wz_sort)+1,
						'wz_del' 		=> 'N',
						'wz_s_id' 		=> $s_id,
						'wz_r_id' 		=> $wz_id,
						'wz_created' 	=> 'NOW()',
						);
						dbx::insert($table,$data);
						$id = dbx::getLastInsertId();

						$ret[$file_tmp] = $id;
						//return $id;

					} else {
						$ret[$file_tmp] = -3;
						continue;
						//frontcontrollerx::json_success(array('ok'=>false,'error'=>'Feld hat keine gültige DIR-ID 0'));
					}

				} else {
					$ret[$file_tmp] = -2;
					continue;
					//frontcontrollerx::json_success(array('ok'=>false,'error'=>'Tempfile nicht gefunden'));
				}


			} // files

			return $ret;
		}

		return -1;
		//frontcontrollerx::json_success(array('ok'=>false,'error'=>'Feld hat keine gültige DIR-ID 1'));
	}







	public static function registerFileInStorageOld($s_id,$file_tmp,$file_name,$move=true)
	{
		$file_name			= basename($file_name);
		$s_fid 				= frontcontrollerx::isInt($s_id);
		$s_storage_scope 	= self::getByIdStorageScope($s_fid);
		$file_size			= filesize($file_tmp);

		if ($s_id != 0)
		{
			$s = self::getById($s_id);
			if ($s['s_dir'] != 'Y') frontcontrollerx::html_failure('DIR_NOT_EXISTS',2);
			$s_onDisk	= $s['s_onDisk'];
		} else
		{
			$s_onDisk	= self::getDirOfStorageScope($s_storage_scope);
		}

		$finalDest 	= $s_onDisk . '/' . $file_name;

		if (is_file($finalDest)) {

			$file_nameX 	= explode(".",$file_name);
			$ext 			= array_pop($file_nameX);
			$nakedName 		= implode('.',$file_nameX);

			$numberMe = 1;
			while (file_exists($finalDest))
			{
				if ($numberMe == 1)
				{
					$file_name = $nakedName.' - Copy.'.$ext;

				} else
				{
					$file_name 	= $nakedName.' - Copy ('.$numberMe.').'.$ext;
				}

				$finalDest 	= $s_onDisk . '/' . $file_name;
				$numberMe++;
			}
		}

		$state = false;
		if ($move)
		{
			if (rename($file_tmp,$finalDest))
			{
				$state = true;
			}
		} else
		{
			if (@copy($file_tmp,$finalDest))
			{
				$state = true;
			}
		}

		if ($state)
		{
			list($width, $height, $type, $attr) = @getimagesize($finalDest);

			dbx::insert('storage',array(
			's_dir' 				=> 'N',
			's_storage_scope' 		=> $s_storage_scope,
			's_sort' 				=> dbx::queryAttribute("select max(s_sort)+1 as sorty from storage where s_fid = $s_id and s_dir = 'N'",'sorty'),
			's_fileSizeBytes'		=> $file_size,
			's_fileSizeBytesHuman'	=> hdx::bytes2HumanReadAble($file_size),
			's_mimeType'			=> hdx::getMimeByExtension($finalDest),
			's_onDisk'				=> $finalDest,
			's_name'				=> $file_name,
			's_fid'					=> $s_id,
			's_media_w'				=> $width,
			's_media_h'				=> $height,
			's_created'				=> 'NOW()'
			));

			$s_id = dbx::getLastInsertId();
			self::handleCMYK($s_id);
			return $s_id;
		}

		return false;
	}

	public static function xr_img3($params)
	{
		$fullpath 	= $params['fullpath'];

		$s_id 	= intval($params['s_id']);
		$w 		= intval($params['w']);
		$h	 	= intval($params['h']);
		$q	 	= intval($params['q']);

		$rmode 		= $params['rmode'];
		$crop		= $params['crop'];

		if ($q == 0) $q = 95;

		$cut 	= intval($params['cut']);
		if ($cut == 0) $cut = 150;

		$f = xredaktor_storage::getById($s_id);

		if ($f === false) 		return false;
		if ($f['s_del']=='Y') 	return false;


		if (($w == 0) && ($h == 0))
		{
			$w = $f['s_media_w'];
			$h = $f['s_media_h'];
		}

		if ($w == 0) $w = -1;
		if ($h == 0) $h = -1;

		$f_alts 	= json_decode($f['s_alts'],true);

		$fileOnDisk = $f['s_onDisk'];
		if (trim($file_name)=="") $file_name = basename($fileOnDisk);

		$type	= self::getImageValidExtension($params['ext'],$file_name);


		$curLang 	= strtoupper(xredaktor_pages::getFrontEndLang());
		$f_alt		= trim($f_alts[$curLang]);

		if ($f_alt == "")
		{
			$failOverLangs = xredaktor_pages::getLangFailOverOrder();
			foreach ($failOverLangs as $curLang)
			{
				$curLang = strtoupper($curLang);
				$f_alt = trim($f_alts[$curLang]);
				if ($f_alt != "") break;
			}
		}

		$file_name 	= xredaktor_niceurl::burnDownLink($f_alt);

		$ret = array(
		'id' 	=> $s_id,
		'w' 	=> $f['s_media_w'],
		'h' 	=> $f['s_media_h'],
		'size'	=> $f['s_fileSizeBytes'],
		'hsize'	=> $f['s_fileSizeBytesHuman'],
		'mime'  => $f['s_mimeType'],
		'rw'	=> 0,
		'rh'	=> 0,
		'lang'	=> $curLang,
		'alts'  => $f_alts,
		'alt'	=> $f_alt,
		'url'	=> substr($fileOnDisk,strlen(Ixcore::htdocsRoot)),
		'src'	=> ''
		);

		$colorspace = $params['colorspace'];
		$cacheDir 	= xredaktor_storage::getDirOfStorageScopeCache(xredaktor_storage::getByIdStorageScope($s_id));

		$onDisk 	= imagesx::smartResizer2($fileOnDisk,$w,$h,$rmode,$cacheDir,false,true,false,$type,$file_name.'_'.$s_id,$q,$colorspace,$crop);

		if(trim($fullpath)=='Y')
		{
			$ret['src'] = $onDisk;
		}
		else
		{
			$ret['src'] = substr($onDisk,strlen(Ixcore::htdocsRoot));
		}

		list($width, $height, $type, $attr) = @getimagesize($onDisk);
		$ret['rw'] = $width;
		$ret['rh'] = $height;
		return $ret;
	}

	public static function download($params)
	{
		$s_id 			= intval($params['s_id']);
		if ($s_id == 0) return false;

		$FA_MODE 		= $params['mode'];
		$FA_RESIZE 		= $params['resize'];
		$FA_RESIZE_W 	= $params['w'];
		$FA_RESIZE_H 	= $params['h'];

		$target 		= "_top";
		$image_title 	= "";

		switch ($FA_RESIZE)
		{
			default:
			case 'N':
				$f = xredaktor_storage::getById($s_id);
				$fS = xredaktor_storage::fetchStructurePatchFile($f);
				$image_title 	= $fS['alt'];
				$image_href 	= $fS['url'];
				break;
			case 'Y':
				$f = xredaktor_storage::getById($s_id);
				$filename = basename($f['s_onDisk']);
				$image_title = $fS['alt'];

				if (hdx::isImage($filename))
				{
					$params = array(
					's_id'=>$s_id,
					'w' => $FA_RESIZE_W,
					'h' => $FA_RESIZE_H,
					);

					$ret = xredaktor_storage::xr_img2($params);
					$image_title = $ret['alt'];
					$image_href  = $ret['src'];
				} else
				{
					$FA_MODE = "DOWNLOAD";
					$f = xredaktor_storage::getById($s_id);
					$fS = xredaktor_storage::fetchStructurePatchFile($f);
					$image_title = $fS['alt'];
					$image_href = $fS['url'];
				}
				break;
		}

		switch ($FA_MODE)
		{
			case 'DOWNLOAD':
				$image_href = "/downloadFile?f=".base64_encode($image_href);
				break;
			case 'OPEN':
			default:
				$target = "_blank";
				break;
		}

		$ret = array(
		'target' 	=> $target,
		'href'		=> $image_href,
		'title'		=> $image_title,
		);

		return $ret;
	}

	public static function fetchStructurePatchFile($f)
	{
		$s_id = $f['s_id'];
		$f_alts = json_decode($f['s_alts'],true);
		$fileOnDisk = $f['s_onDisk'];

		$curLang 	= strtoupper(xredaktor_pages::getFrontEndLang());
		$f_alt		= trim($f_alts[$curLang]);

		if ($f_alt == "")
		{
			$failOverLangs = xredaktor_pages::getLangFailOverOrder();

			foreach ($failOverLangs as $curLang)
			{
				$curLang = strtoupper($curLang);
				$f_alt = trim($f_alts[$curLang]);
				if ($f_alt != "") break;
			}
		}

		$ret = array(
		'id' 	=> $s_id,
		'w' 	=> $f['s_media_w'],
		'h' 	=> $f['s_media_h'],
		'size'	=> $f['s_fileSizeBytes'],
		'hsize'	=> $f['s_fileSizeBytesHuman'],
		'mime'  => $f['s_mimeType'],
		'lang'	=> $curLang,
		'alts'  => $f_alts,
		'alt'	=> $f_alt,
		'url'	=> substr($fileOnDisk,strlen(Ixcore::htdocsRoot))
		);
		return $ret;
	}

	public static function fetchStructureDeep($s_id,$s_s_storage_scope)
	{
		$s_id = intval($s_id);
		$s_s_storage_scope = intval($s_s_storage_scope);

		$dirs = dbx::queryAll("select * from storage where s_del = 'N' and s_storage_scope = $s_s_storage_scope and s_fid = $s_id and s_dir = 'Y' order by s_name");
		$filesInner = array();

		foreach ($dirs as $dir)
		{
			$_s_id = $dir['s_id'];
			$filesInner = array_merge($filesInner,self::fetchStructureDeep($_s_id,$s_s_storage_scope));
		}

		$files 		= dbx::queryAll("select * from storage where s_del = 'N' and s_storage_scope = $s_s_storage_scope and s_fid = $s_id and s_dir = 'N' order by s_name");

		if (is_array($files))
		{
			$filesInner = array_merge($filesInner,$files);
		}

		return $filesInner;
	}


	public static function fetchStructure($params)
	{

		$s_id = intval($params['s_id']);
		$p_id = intval($params['p_id']);

		$settings = xredaktor_niceurl::getSiteConfigViaPageId($p_id);
		$s_s_storage_scope = $settings['s_s_storage_scope'];

		$ret2 = self::fetchStructureDeep($s_id,$s_s_storage_scope);
		$ret = array();

		foreach ($ret2 as $r)
		{
			$ret[] = self::fetchStructurePatchFile($r);
		}

		return $ret;
	}

	public static function patchDb_dirsAfterMove($mathOld,$storageGroup)
	{
		$storageGroup 	= frontcontrollerx::isInt($storageGroup);
		$dir 			= self::getDirOfStorageScope($storageGroup);
		$mathOld		= dbx::escape($mathOld);
		dbx::query("update storage set s_onDisk = replace(s_onDisk,'$mathOld','$dir') where s_storage_scope = $storageGroup");
	}

	public static function patchDb_dirsAfterMovePlain($mathOld,$dir)
	{
		$mathOld		= dbx::escape($mathOld);
		dbx::query("update storage set s_onDisk = replace(s_onDisk,'$mathOld','$dir') where 1");
	}

	public static function storage_group_update_PRE($sg_id,$data)
	{
		if (!isset($data['sg_dirname'])) return true;

		$sg_dirnameCurrent 	= trim(dbx::queryAttribute("select sg_dirname from storage_groups where sg_id = $sg_id","sg_dirname"));
		$sg_dirnameNew 		= trim($data['sg_dirname']);

		if ($sg_dirnameNew != $sg_dirnameCurrent)
		{
			$dir = realpath(dirname(__FILE__).'/../../../../'.$sg_dirnameNew);
			if (is_dir($dir)) return false;
		}

		return true;
	}

	public static function createDefaultStorageDir($dir)
	{
		mkdir($dir);
		mkdir($dir.'/_deleted');
		mkdir($dir.'/_cache');
	}

	public static function storage_group_update_POST($sg_id,$newDataRecord,$oldDataRecord)
	{
		$sg_dirnameCurrent 	= trim($oldDataRecord['sg_dirname']);
		$sg_dirnameNew 		= trim($newDataRecord['sg_dirname']);

		$dirCurrent = realpath(dirname(__FILE__).'/../../../../'.$sg_dirnameCurrent);
		$dirNew 	= dirname(__FILE__).'/../../../../'.$sg_dirnameNew;

		if (is_dir($dirCurrent))
		{
			rename($dirCurrent,$dirNew);
		} else
		{
			self::createDefaultStorageDir($dirNew);
		}

		return true;
	}

	public static function isDir($record)
	{
		return ($record['s_dir'] == 'Y');
	}

	public static function getDirNameOfStorageScope($sg_id)
	{

		if ($sg_id == 0) {
			frontcontrollerx::json_debug(debug_backtrace());
			die('STORAGE_DIR == 0');
		}

		$sg_id 			= frontcontrollerx::isInt($sg_id);
		$sg_dirname 	= trim(dbx::queryAttribute("select sg_dirname from storage_groups where sg_id = $sg_id","sg_dirname"));
		if ($sg_dirname == "")
		{

			$data 		= array('sg_id'=>$sg_id,'sg_name'=>'xgo','sg_del'=>'N','sg_created'=>'NOW()','sg_fid'=>0);
			$present 	= dbx::query("select * from storage_groups where sg_id = $sg_id");

			if ($sg_id == 1)
			{
				$data['sg_name'] 	= "xstorage";
				$data['sg_dirname'] = "xstorage";
			} else
			{
				$data['sg_name'] 	= "xstorage_".$sg_id;
				$data['sg_dirname'] = "xstorage_".$sg_id;
			}

			if ($present === false)
			{
				dbx::insert("storage_groups",$data);
			} else
			{
				dbx::update("storage_groups",$data,array('sg_id'=>$sg_id));
			}
			$sg_dirname = $data['sg_dirname'];
		}
		return $sg_dirname;
	}

	public static function getDirOfStorageScope($id)
	{
		$dir = realpath(dirname(__FILE__).'/../../../../'.self::getDirNameOfStorageScope($id));
		if (!is_dir($dir)) die('DIR_NOT_EXISTS_0 :: '.$dir);
		return $dir;
	}

	public static function getDirOfStorageScopeCache($id)
	{
		$dir = self::getDirOfStorageScope($id).'/_cache';
		if (!is_dir($dir)) die('DIR_NOT_EXISTS_1 :: '.$dir);
		return $dir;
	}

	public static function getDirOfStorageScopeDel($id)
	{

		$dir = self::getDirOfStorageScope($id).'/_deleted';
		if (!is_dir($dir)) die('DIR_NOT_EXISTS_2 :: '.$dir);
		return $dir;
	}

	public static function getWebDirOfStorageScope($id)
	{
		$dir = "/".basename(self::getDirNameOfStorageScope($id));
		return $dir;
	}

	public static function getById($id,$all=false)
	{
		if (!$all)
		{
			$id = frontcontrollerx::isInt($id,'GET-BY-ID');
			return dbx::query("select * from storage where s_id = $id");
		} else
		{
			$file 				= self::getById($id,false);
			if ($file === false) return false;
			if ($file['s_del'] == 'Y') return $file;

			$s_storage_scope 	= $file['s_storage_scope'];
			$diskDir 			= self::getDirOfStorageScope($s_storage_scope);
			$webDir 			= self::getWebDirOfStorageScope($s_storage_scope);
			$diskDirLen 		= strlen($diskDir);
			$file['dirOfFile']	= dirname(substr($file['s_onDisk'],$diskDirLen+1));
			$file['webSrc'] 	= $webDir.substr($file['s_onDisk'],$diskDirLen);
			$file['scaleSrc'] 	= "/xgo/xplugs/xredaktor/ajax/storage/scaleBoxed/".$id;
			return $file;
		}
	}

	public static function getByIdStorageScope($id)
	{
		$s = self::getById($id);
		return $s['s_storage_scope'];
	}

	public static function updateDb($id,$data)
	{
		dbx::update("storage",$data,array('s_id'=>$id));
	}

	private static function insertDb($data)
	{
		dbx::insert("storage",$data);
		return dbx::getLastInsertId();
	}

	public static function dirInsert($id)
	{
		$s 		= self::getById($id);
		$fid	= $s['s_fid'];
		$f 		= self::getById($fid);

		if ($fid == 0)
		{
			$dir = self::getDirOfStorageScope($s['s_storage_scope']);
		} else
		{
			$dir = $f['s_onDisk'];
		}

		$onDisk	= $dir.'/'.$s['s_name'];

		if (!mkdir($onDisk))
		{
			self::updateDb($id,array('s_del'=>'Y'));
			frontcontrollerx::json_debug('CANNOT_CREATE_DIR');
		} else
		{
			xredaktor_log::dirCreate($id);
			self::updateDb($id,array('s_onDisk'=>$onDisk));
		}
		return true;
	}

	public static function createDir($s_f_id,$s_name)
	{
		$s_f_id		= intval($s_f_id);
		if ($s_f_id == 0) return false;

		$s_name		= dbx::escape($s_name);

		$present 	= dbx::query("select * from storage where s_name = '$s_name' and s_del = 'N' and s_dir='Y' and s_fid = $s_f_id");
		if ($present !== false) {
			return $present['s_id'];
		}

		$father = dbx::query("select * from storage where s_id = $s_f_id and s_del = 'N' and s_dir='Y'");
		if ($father === false) return false;

		$s_storage_scope 	= intval($father['s_storage_scope']);
		$s_onDisk 			= $father['s_onDisk'] . '/' . $s_name;

		dbx::insert('storage',array(
		's_name' 				=> $s_name,
		's_isOnline'			=> 'Y',
		's_dir'					=> 'Y',
		's_fid'					=> $s_f_id,
		's_del'					=> 'N',
		's_storage_scope'		=> $s_storage_scope,
		's_sort'				=> 99999999,
		's_onDisk'				=> $s_onDisk
		));

		$id = dbx::getLastInsertId();

		if (!mkdir($s_onDisk))
		{
			dbx::delete('storage',array('s_id'=>$id));
			return false;
		} else
		{
			return $id;
		}
	}

	public static function syncFromDisc($s_storage_scope,$s_id)
	{
		set_time_limit(0);
		ignore_user_abort(true);
		ini_set('memory_limit', '256M');

		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################

		################ GENERAL CHECK ### DUPLICATE DIRS

		$sql = "select  s_onDisk, count(s_id) as cntx from storage where s_del='N' and s_dir='Y' group by `s_onDisk` order by cntx desc";
		$duplicates = dbx::queryAll($sql,false);

		foreach ($duplicates as $d)
		{
			$cntx = intval($d['cntx']);
			if ($cntx < 2) break;

			$s_onDisk =  $d['s_onDisk'];

			$fixs 	= dbx::queryAll("select * from storage where s_onDisk = '$s_onDisk' order by s_id asc");
			$master = array_shift($fixs);

			$master_s_id 	= $master['s_id'];
			$join			= array();

			foreach ($fixs as $f)
			{
				$join[] = $f['s_id'];
			}

			$join = implode(",",$join);

			dbx::query("update storage set s_fid = $master_s_id where s_fid IN ($join)");
			dbx::query("update storage set s_del = 'Y' where s_id IN ($join)");
		}

		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################

		################ CHECK IF DB FILES EXISTS ON DISK

		$s_id 				= frontcontrollerx::isInt($s_id);
		$s_storage_scope 	= frontcontrollerx::isInt($s_storage_scope);

		if ($s_id == 0)
		{
			$dir = self::getDirOfStorageScope($s_storage_scope);
		} else
		{
			$s = self::getById($s_id);
			if ($s['s_dir'] == 'N') return false;
			$dir = self::getFileDstById($s_id);
		}

		if ($s_id == 0)
		{
			$getAllChildren = dbx::queryAll("select * from storage order by s_id asc",false);
		} else
		{
			$getAllChildren = self::getFilesRecFlat($s_id,$s_storage_scope);
		}

		foreach ($getAllChildren as $gac)
		{
			$child 	= $gac['f'];
			$s_id 	= $child['s_id'];

			switch ($child['s_dir'])
			{
				case 'Y':
					$onDisk = $child['s_onDisk'];
					if (!file_exists($onDisk) || !is_dir($onDisk)) {
						self::updateDb($s_id,array('s_del'=>'Y'));
					}
					break;
				case 'N':
					$onDisk = $child['s_onDisk'];
					if (!file_exists($onDisk) || is_dir($onDisk)) {
						self::updateDb($s_id,array('s_del'=>'Y'));
					}
					break;
				default: break;
			}
		}

		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################

		################ CHECK IF DISK FILES EXISTS IN DB

		if (!is_dir($dir)) {
			frontcontrollerx::json_failure("Datenbank-Fehler: Verzeichnis existiert nicht am Server! (eventuell kopiertes Projekt)");
		}

		$all = hdx::readDirFlatArray($dir);
		foreach ($all as $i)
		{
			switch ($i['TYPE'])
			{
				case 'FILE':
					$F_NAME_FULL = $i['F_NAME_FULL'];
					self::registerExistingFile($s_storage_scope,$F_NAME_FULL);
					break;
				case 'DIR':
					$D_NAME_FULL 	= $i['D_NAME_FULL'];

					if (!in_array(basename($D_NAME_FULL),array('_deleted','_cache')))
					{
						$pleaseCheckMeToo = self::registerExistingDir($s_storage_scope,$D_NAME_FULL);
						if ($pleaseCheckMeToo !== false)
						{
							if ($pleaseCheckMeToo != $s_id)
							{
								self::syncFromDisc($s_storage_scope,$pleaseCheckMeToo);
							}
						}
					}

					break;
				default: break;
			}
		}

		return true;
	}

	public static function updateFileName($s_id,$s_name)
	{
		$s_id 	= frontcontrollerx::isInt($s_id);
		$s_name = basename(frontcontrollerx::isNotEmptyString($s_name));

		$s = self::getById($s_id);

		$s_onDisk 		= $s['s_onDisk'];
		$s_onDiskNew 	= dirname($s_onDisk).'/'.$s_name;

		if (rename($s_onDisk,$s_onDiskNew))
		{
			self::updateDb($s_id,array('s_name'=>$s_name,'s_onDisk'=>$s_onDiskNew));
		}
	}

	public static function getTreePathOfFile($s_id)
	{
		$paths2expand = '';

		$s 		= dbx::query("select * from storage where s_id = $s_id");
		if ($s === false) return '';

		$s_fid	= $s['s_fid'];
		if ($s_fid == 0) return '';
		$paths2expand .= $s_fid;
		$append = self::getTreePathOfFile($s_fid);
		if ($append != "")
		{
			$paths2expand .= '/'.$append;
		}
		return $paths2expand;
	}


	public static function getFatherById($s_id)
	{
		$s_id = intval($s_id);
		return dbx::query("select * from storage where s_id = (select s_fid from storage where s_id = $s_id and s_del='N') and s_del='N'");
	}

	public static function recMoveDir($s_id)
	{

		$dir 		= self::getById($s_id);
		$newRootDir = $dir['s_onDisk'];
		$allNodes 	= dbx::queryAll("select * from storage where s_fid = $s_id and s_del='N'");

		foreach ($allNodes as $n)
		{
			$n_id 	= $n['s_id'];
			$n_dir 	= $n['s_dir'];

			$sql = "update storage set s_onDisk = CONCAT('$newRootDir','/',s_name) where s_id = $n_id ";
			dbx::query($sql);

			if ($n_dir == 'Y')
			{
				self::recMoveDir($n_id);
			}
		}
	}

	public static function dirMove($id, $current, $newDataRecord, $oldDataRecord)
	{
		$name   	= $current['s_name'];

		$newFather	= @($newDataRecord['s_onDisk']);
		$oldFather 	= @($oldDataRecord['s_onDisk']);

		if ($newFather == "") $newFather = self::getDirOfStorageScope($current['s_storage_scope']);
		if ($oldFather == "") $oldFather = self::getDirOfStorageScope($current['s_storage_scope']);

		$newDir = $newFather.'/'.$name;
		$oldDir = $oldFather.'/'.$name;

		if (!rename($oldDir,$newDir))
		{
			frontcontrollerx::json_failure('FAILURE_MOVE','-200',array(
			'old' => $oldDir,
			'new' => $newDir
			));
		} else
		{
			ignore_user_abort(true);
			set_time_limit(0);

			xredaktor_log::dirMove($id);

			self::updateDb($id,array('s_onDisk'=>$newDir));
			self::recMoveDir($id);
		}
	}

	public static function recPathFileNames($id)
	{
		$father 	= self::getById($id);
		$s_onDisk 	= $father['s_onDisk'];
		$files 		= dbx::queryAll("select * from storage where s_fid = $id");

		foreach ($files as $f)
		{
			$nid 	= $f['s_id'];
			$s_name = $f['s_name'];

			self::updateDb($nid,array(
			's_onDisk' => $s_onDisk.'/'.$s_name
			));

			if ($f['s_dir']=='Y')
			{
				self::recPathFileNames($nid);
			}
		}
	}

	public static function dirRename($id,$newDataRecord,$oldDataRecord)
	{
		$nameNew = dirname($newDataRecord['s_onDisk']).'/'.$newDataRecord['s_name'];
		$nameOld = dirname($oldDataRecord['s_onDisk']).'/'.$oldDataRecord['s_name'];

		if (!rename($nameOld,$nameNew))
		{
			frontcontrollerx::json_failure('FAILURE_MOVE','-200',array(
			'old' => $oldDir,
			'new' => $newDir
			));
		} else
		{
			self::updateDb($id,array('s_onDisk'=>$nameNew));
			self::recPathFileNames($id);
		}
	}

	public static function getBlackListedDirNames()
	{
		return array('_cache','_deleted');
	}

	public static function getFiles($extFunctionsConfig)
	{
		$s_storage_scope 	= $extFunctionsConfig['s_storage_scope'];
		$s_id 				= frontcontrollerx::isInt($_REQUEST['s_id']);

		$diskDir 	= self::getDirOfStorageScope($s_storage_scope);
		$webDir 	= self::getWebDirOfStorageScope($s_storage_scope);
		$diskDirLen = strlen($diskDir)+2;

		$father 		= " s_fid = $s_id and ";
		$queryString 	= "";

		if (isset($_REQUEST['qALL']))
		{
			if ($_REQUEST['qALL'] == 'Y')
			{
				$father = "";
			}
		}

		if (isset($_REQUEST['_query']))
		{
			$_query = dbx::escape($_REQUEST['_query']);

			$queryString = array();
			$fields = array('s_onDisk','s_alts','s_id');

			foreach ($fields as $f)
			{
				$queryString[] = " $f LIKE '%$_query%' ";
			}

			$queryString = " AND (".implode(" OR ",$queryString)." ) ";

		}


		if ($_REQUEST['sort'] != "")
		{
			$_sort = json_decode($_REQUEST['sort'],true);

			$sorter 	= dbx::escape($_sort[0]['property']);
			$sorter_dir = dbx::escape($_sort[0]['direction']);

			$sorterTable = "`storage`.";

			if (!dbx::attributePresent('storage',$sorter)) {
				$sorter 		= 's_id';
				$sorter_dir 	= " ASC ";
			}
		}


		$keysExtender = "";
		if ($_REQUEST['extraParams'])
		{
			$keys = xcrm_gui::imageSearcherViaStorageView();

			if (count($keys)>0)
			{
				$keysExtender = " and s_id IN (".implode(',',$keys).")";
			}
		}

		$limit 	= intval($_REQUEST['limit']);
		$offset = intval($_REQUEST['offset']);
		$start 	= intval($_REQUEST['start']);

		$sql = "select *,CONCAT('$webDir','/',SUBSTRING(s_onDisk,$diskDirLen)) as webSrc, CONCAT('/xgo/xplugs/xredaktor/ajax/storage/scaleBoxed/',s_id) as scaleSrc from storage where $father s_dir = 'N' and s_storage_scope = $s_storage_scope and s_del='N' $queryString $keysExtender ORDER by $sorter $sorter_dir LIMIT $start, $limit";
		$files = dbx::queryAll($sql);

		$sql = "select count(s_id) as cntx from storage where $father s_dir = 'N' and s_storage_scope = $s_storage_scope and s_del='N' $queryString $keysExtender";
		$totalCount = intval(dbx::queryAttribute($sql,'cntx'));

		if (!is_array($files)) $files = array();

		frontcontrollerx::json(array('root'=>$files,'totalCount'=>$totalCount,'success'=>true));
	}

	public static function getFileDstById($s_id)
	{
		$s_id = frontcontrollerx::isInt($s_id);
		$s = self::getById($s_id);
		return $s['s_onDisk'];
	}

	public static function handleUpload()
	{
		$s_id 				= frontcontrollerx::isInt($_REQUEST['s_id']);
		$s_storage_scope 	= frontcontrollerx::isInt($_REQUEST['s_storage_scope']);

		$file_tmp 	= $_FILES['Filedata']['tmp_name'];
		if (!file_exists($file_tmp)) frontcontrollerx::html_failure('TMP_FILE_NOT_EXISTS',1);

		$file_name	= basename($_FILES['Filedata']['name']);
		$file_size	= filesize($file_tmp);

		if ($s_id != 0)
		{
			$s = self::getById($s_id);
			if ($s['s_dir'] != 'Y') frontcontrollerx::html_failure('DIR_NOT_EXISTS',2);
			$s_onDisk	= $s['s_onDisk'];
		} else
		{
			$s_onDisk	= self::getDirOfStorageScope($s_storage_scope);
		}

		$finalDest 	= $s_onDisk . '/' . $file_name;

		if (is_file($finalDest)) {

			$file_nameX 	= explode(".",$file_name);
			$ext 			= array_pop($file_nameX);
			$nakedName 		= implode('.',$file_nameX);

			$numberMe = 1;
			while (file_exists($finalDest))
			{
				if ($numberMe == 1)
				{
					$file_name = $nakedName.' - Copy.'.$ext;

				} else
				{
					$file_name 	= $nakedName.' - Copy ('.$numberMe.').'.$ext;
				}

				$finalDest 	= $s_onDisk . '/' . $file_name;
				$numberMe++;
			}
		}

		if (move_uploaded_file($file_tmp,$finalDest))
		{

			list($width, $height, $type, $attr) = @getimagesize($finalDest);

			dbx::insert('storage',array(
			's_dir' 			=> 'N',
			's_storage_scope' 	=> $s_storage_scope,
			's_sort' 			=> dbx::queryAttribute("select max(s_sort)+1 as sorty from storage where s_fid = $s_id and s_dir = 'N'",'sorty'),
			's_fileSizeBytes'		=> $file_size,
			's_fileSizeBytesHuman'	=> hdx::bytes2HumanReadAble($file_size),
			's_mimeType'		=> hdx::getMimeByExtension($finalDest),
			's_onDisk'			=> $finalDest,
			's_name'			=> $file_name,
			's_fid'				=> $s_id,
			's_media_w'			=> $width,
			's_media_h'			=> $height,
			's_created'			=> 'NOW()'
			));

		} else
		{
			frontcontrollerx::html_failure('MOVE_FAILED',3,array($file_tmp,$finalDest));
		}
	}

	public static function preInsert($data)
	{

		//frontcontrollerx::json_debug($data);

		$s_storage_scope 	= frontcontrollerx::isNotEmptyString($data['s_storage_scope']);
		$s_fid 				= frontcontrollerx::isNotEmptyString($data['s_fid']);
		$s_name 			= frontcontrollerx::isNotEmptyString($data['s_name']);

		if (in_array($s_name,self::getBlackListedDirNames()))
		{
			frontcontrollerx::json_failure('INVALID_DIR_NAME',600,array('s_name'=>$s_name));
		}

		$s = self::getById($s_fid);

		if ($s_id == 0)
		{
			$dir = self::getDirOfStorageScope($s_storage_scope);
		} else
		{
			$dir = $s['s_onDisk'];
		}

		if (is_dir($dir.'/'.$s_name))
		{
			frontcontrollerx::json_failure('Verzeichnis existiert auf der Festplatte',600,array('s_name'=>$s_name,'s_fid'=>$s_fid));
		}

		$present = dbx::query("select * from storage where s_name = '$s_name' and s_fid = $s_fid and s_del = 'N' and s_storage_scope = $s_storage_scope");
		if ($present !== false)
		{
			frontcontrollerx::json_failure('Verzeichnis existiert in der Datenbank',601,array('s_name'=>$s_name,'s_fid'=>$s_fid));
		}

		return true;
	}

	public static function preRename($s_id,$data)
	{
		if (!isset($data['s_name'])) return true;

		$s_id 	= frontcontrollerx::isNotEmptyString($s_id);
		$c 		= self::getById($s_id);

		$s_storage_scope 	= $c['s_storage_scope'];
		$s_name_old 		= $c['s_name'];
		$s_fid 				= $c['s_fid'];
		$s_name 			= frontcontrollerx::isNotEmptyString($data['s_name']);

		if (in_array($s_name,self::getBlackListedDirNames()))
		{
			frontcontrollerx::json_failure('INVALID_DIR_NAME',600,array('s_name'=>$s_name));
		}

		$s = self::getById($s_fid);

		if ($s_fid == 0)
		{
			$dir = self::getDirOfStorageScope($s_storage_scope);
		} else
		{
			$dir = $s['s_onDisk'];
		}

		if (is_dir($dir.'/'.$s_name))
		{
			frontcontrollerx::json_failure('Verzeichnis existiert auf der Festplatte',600,array('s_name'=>$s_name,'s_fid'=>$s_fid));
		}

		$present = dbx::query("select * from storage where md5(s_name) = md5('$s_name') and s_fid = $s_fid and s_del = 'N' and s_storage_scope = $s_storage_scope");
		if ($present !== false)
		{
			frontcontrollerx::json_failure('Verzeichnis existiert in der Datenbank',601,array('s_name'=>$s_name,'s_fid'=>$s_fid));
		}

		return true;
	}

	public static function fileIsUsed($s_id)
	{
		return false;
	}

	public static function fileIsUsedDetailed($s_id)
	{
		return false;
	}

	public static function rawFileDel($s_id)
	{
		$s_id 				= frontcontrollerx::isInt($s_id);
		$s 					= self::getById($s_id);

		if ($s === false) return false;

		$s_storage_scope 	= $s['s_storage_scope'];
		$s_onDisk			= $s['s_onDisk'];
		$parkDir 			= self::getDirOfStorageScopeDel($s_storage_scope);

		$ext = array_pop(explode(".",$s['s_name']));
		$killFile = $parkDir.'/'.$s_id.'.'.$ext;

		if (file_exists($killFile))
		{
			$killFile .= md5(time());
			if (file_exists($killFile))
			{
				frontcontrollerx::json_failure('RAW_FILE_DEL :: CANNOT_MOVE_DELETED_FILE_EXISTS '."(<br>$s_onDisk<br>$killFile)",650,array($s));
			}
		}

		if (rename($s_onDisk,$killFile))
		{
			self::updateDb($s_id,array('s_del'=>'Y','s_del_soft'=>'NOW()'));
		} else
		{
			if (!file_exists($s_onDisk)) {
				self::updateDb($s_id,array('s_del'=>'Y','s_del_soft'=>'NOW()'));
			} else {
				frontcontrollerx::json_failure('CANNOT_MOVE_DELETED_FILE_RENAME_FAILED'."($s_onDisk,$killFile)",660,array($s));
			}
		}
	}

	public static function rawDirDel($s_id)
	{
		$s_id 				= frontcontrollerx::isInt($s_id);
		if ($s_id == 0) 	return false;
		$s 					= self::getById($s_id);
		if ($s === false)	return false;
		if ($s['s_dir'] == 'N') return false;

		$s_storage_scope 	= $s['s_storage_scope'];
		$s_onDisk			= $s['s_onDisk'];
		$parkDir 			= self::getDirOfStorageScopeDel($s_storage_scope);

		$killDir = $parkDir.'/'.$s_id;

		if (is_dir($killDir))
		{
			rename($killDir,$killDir.'_'.md5(time())); // DIRTY FALL BACK!!!! NEVER SHOULD BE DONE..
		}

		if (rename($s_onDisk,$killDir))
		{
			self::updateDb($s_id,array('s_del'=>'Y','s_del_soft'=>'NOW()'));
			return true;
		} else
		{
			$existsS = file_exists($s_onDisk) ? 'Y' : 'N';
			$existsK = file_exists($killDir) ? 'Y' : 'N';

			frontcontrollerx::json_failure("CANNOT_MOVE_DELETED_DIR_RENAME_FAILED || <br>$s_onDisk ($existsS)--> <br>$killDir ($existsK)",660,array($s));
			return false;
		}
	}

	public static function getFilesRecFlat($s_id,$s_storage_scope = false)
	{
		$files = array();

		if ($s_id == 0)
		{
			if ($s_storage_scope === false) return array(); // ERROR OF CODER !!!
			$s_storage_scope = intval($s_storage_scope);
			$filesOfDir = dbx::queryAll("select * from storage where s_fid = 0 and s_storage_scope = $s_storage_scope and s_del = 'N' order by s_sort");
		} else
		{
			$filesOfDir = dbx::queryAll("select * from storage where s_fid = $s_id and s_del = 'N' order by s_sort");
		}

		if ($s_id > 0)
		{
			$fileX = self::getById($s_id);

			if ($fileX['s_dir'] == 'Y') {
				$fileX['usage'] = "N";
			} else
			{
				$fileX['usage'] = 'N';
			}

			$files[] = array('f'=>$fileX,'s_id'=>$s_id,'s_dir'=>$fileX['s_dir'],'usage'=>$fileX['usage']);
		}


		if ($filesOfDir === false)
		{
			// NOTHING
		} else
		{
			$filesInDir = array();

			foreach ($filesOfDir as $f)
			{
				$id = $f['s_id'];
				if ($f['s_dir']=='Y')
				{
					$filesInDir = array_merge($filesInDir,self::getFilesRecFlat($id,$s_storage_scope));
				} else
				{
					$tmp = array('s_id'=>$id,'s_dir'=>'N','usage'=>'N','f'=>$f);
					$filesInDir[] = $tmp;
				}
			}

			$files = array_merge($files,$filesInDir); // for better view in GUI
		}

		return $files;
	}

	public static function delDir($s_id)
	{
		$s = self::getById($s_id);
		if ($s === false) return false;
		if ($s['s_dir']=='N') return false;
		$s_onDisk = $s['s_onDisk'];

		$filesViaDbRecursiver = self::getFilesRecFlat($s_id);
		$usage = array();

		foreach ($filesViaDbRecursiver as $pack)
		{
			if ($pack['usage']=='Y')
			{
				$tmp = $pack;
				$tmp['f']['hname'] = substr($pack['f']['s_onDisk'],strlen($s_onDisk)+1);
				$usage[] = $tmp;
			}
		}

		if (count($usage)==0)
		{
			$kick_dirs	= array();
			$kick_files = array();

			foreach ($filesViaDbRecursiver as $f)
			{
				if ($f['s_dir']=='Y')
				{
					$kick_dirs[] = $f['s_id'];
				} else
				{
					$kick_files[] = $f['s_id'];
				}
			}

			foreach ($kick_files as $_s_id)
			{
				self::rawFileDel($_s_id);
			}

			$kick_dirs = array_reverse($kick_dirs);

			foreach ($kick_dirs as $_s_id)
			{
				xredaktor_log::dirDelete($_s_id);
				self::rawDirDel($_s_id);
			}
		}

		return $usage;
	}

	public static function delFiles($ids, $return = false)
	{
		$ids = explode(",",$ids);
		$safeIds = array();

		$files_unused = array();
		$files_used = array();

		foreach ($ids as $s_id)
		{
			if (!is_numeric($s_id)) continue;
			$safeIds[] = $s_id;

			if (self::fileIsUsed($s_id)) {
				$files_used[] = self::getById($s_id);
			} else
			{
				$files_unused[] = $s_id;
				xredaktor_log::fileDelete($s_id);
				self::rawFileDel($s_id);
			}
		}

		$ret = array(
		'files_unused' 	=> $files_unused,
		'files_used' 	=> $files_used,
		);

		if ($return != false)
		{
			return $ret;
		}

		frontcontrollerx::json_success($ret);
	}

	public static function moveFiles($cfg)
	{
		$notMoved 	= array();
		$moved 		= array();

		$pipe = json_decode($cfg,true);
		if (!is_array($pipe)) $pipe = array($pipe);

		foreach ($pipe as $action)
		{
			$s_id 			= $action['s_id'];
			$newFatherId 	= $action['newFatherId'];
			$mode			= $action['mode'];

			if (is_numeric($s_id)&&is_numeric($newFatherId)) {

				$s 					= self::getById($s_id);
				$s_storage_scope 	= $s['s_storage_scope'];
				$s_name				= $s['s_name'];

				if ($newFatherId != 0)
				{
					$f = self::getById($newFatherId);
					if (($s === false) || ($f === false) || ($s['s_dir'] == 'Y') || ($s['s_del'] == 'Y') || ($f['s_del'] == 'Y') || ($f['s_dir'] == 'N') || ($s['s_storage_scope'] != $f['s_storage_scope']))
					{
						$action['error'] 	= 'INVALID_MOVE1';
						$action['s'] 		= $s;
						$action['f']		= $f;
						$notMoved[] = $action;
						continue;
					}

					$dir 	= $f['s_onDisk'];
				} else
				{
					if (($s === false) || ($s['s_dir'] == 'Y'))
					{
						$action['s'] = $s;
						$action['error'] = 'INVALID_MOVE2';
						$notMoved[] = $action;
						continue;
					}
					$dir = self::getDirOfStorageScope($s_storage_scope);
				}

				$action['s'] = $s;
				$action['f'] = $f;

				$s_onDisk = $dir.'/'.$s_name;

				if (is_file($s_onDisk))
				{
					$action['error'] = 'FILE_EXISTS_IN_DESTINATION';
					$notMoved[] = $action;
					continue;
				}

				$present = dbx::query("select * from storage where s_name = '$s_name' and s_fid = $newFatherId and s_del = 'N' and s_storage_scope = $s_storage_scope");

				if ($present !== false)
				{
					$action['error'] = 'FILE_EXISTS_IN_DB';
					$notMoved[] = $action;
					continue;
				}

				$s_onDiskOld = $s['s_onDisk'];
				if (!is_file($s_onDiskOld))
				{
					$action['error'] = 'ORIG_FILE_NOT_EXISTS';
					$notMoved[] = $action;
					continue;
				}

				if ($mode == 'move' || $mode == '') // MOVE
				{

					if (rename($s_onDiskOld,$s_onDisk)){
						xredaktor_log::fileMove($s_id);
						self::updateDb($s_id,array('s_fid'=>$newFatherId,'s_onDisk'=>$s_onDisk,'s_lastmod'=>'NOW()'));
						$moved[] = $action;
						continue;
					} else
					{
						$action['error'] = 'ORIG_FILE_NOT_EXISTS';
						$notMoved[] = $action;
						continue;
					}

				} else { // COPY



					if (is_file($s_onDisk))
					{
						$action['error'] = 'ORIG_FILE_NOT_EXISTS';
						$notMoved[] = $action;
						continue;
					} else {

						if (copy($s_onDiskOld,$s_onDisk)){

							$copy = $s;
							unset($copy['s_id']);
							$copy['s_fid'] 		= $newFatherId;
							$copy['s_onDisk'] 	= $s_onDisk;
							$copy['s_lastmod'] 	= 'NOW()';

							$s_id_new = self::insertDb($copy);
							xredaktor_log::fileCopy($s_id_new);
							$moved[] = $action;
							continue;
						} else
						{
							$action['error'] = 'ORIG_FILE_NOT_EXISTS';
							$notMoved[] = $action;
							continue;
						}

					}


				}


			}
		}
		return array('notMoved'=>$notMoved,'moved'=>$moved);
	}

	public static function imageComposer_resize($rmode,$file_src,$file_dest,$w,$h,$ext='jpg',$quality=95)
	{
		return imagesx::resize($rmode,$file_src,$file_dest,$w,$h,$ext,$quality);
	}

	public static function imageComposer_magic($jConfig,$file_src,$file_dest,$w,$h,$ext='jpg',$quality=95)
	{

		$convert 	= Ixcore::PATH_ImageMagick;
		$fn 		= $jConfig['fn'];

		$functions = array(

		/*****************************************************************************************************
		***** borderwithshadow
		******************************************************************************************************/

		'borderwithshadow' =>

		array( 'fields' => array(

		'border' 		=> 6,
		'bordercolor' 	=> 'grey60',
		'background' 	=> 'black',
		'r' 			=> 0,
		'opacity' 		=> 40,
		'sigma' 		=> 4,
		'x' 			=> 4,
		'y' 			=> 4,

		),
		'cmd' => "$convert $file_src \
          -bordercolor white  -border {border} \
          -bordercolor \"{bordercolor}\" -border 1 \
          -background  none   -rotate {r} \
          -background  \"{background}\"  \( +clone -shadow {opacity}x{sigma}+{x}-{y} \) +swap \
          -background  \"{background}\"  \( +clone -shadow {opacity}x{sigma}+{x}+{y} \) +swap \
          -background  \"{background}\"  \( +clone -shadow {opacity}x{sigma}-{x}+{y} \) +swap \
          -background  \"{background}\"  \( +clone -shadow {opacity}x{sigma}-{x}-{y} \) +swap \
          -background  none  -layers merge +repage  $file_dest"

          ),

          /*********************************/

          );

          $action 	= $functions[$fn];

          $fields 	= $action['fields'];
          $cmd 		= $action['cmd'];

          foreach ($fields as $f => $v)
          {
          	if (isset($jConfig[$f]))
          	{
          		$v = $jConfig[$f];
          	}
          	$cmd = str_replace('{'.$f.'}',$v,$cmd);
          }

          $out = array();
          exec($cmd,$out);

          if (!file_exists($file_dest)) {
          	return $out;
          }

          return true;
	}

	public static function imageComposer_error($action,$file_src,$file_dest,$outArray)
	{
		if (libx::isDeveloper())
		{
			echo "<pre>";
			echo "ERROR: $action :: $file_src | $file_dest\n";
			print_r($outArray);
			echo "</pre>";
		}
	}

	public static function imageComposer_text($useImage,$tmpPix,$textSettings)
	{
		$convert = Ixcore::PATH_ImageMagick;
		$font 	= $textSettings['font'];
		$size 	= intval($textSettings['size']);
		$color 	= $textSettings['color'];
		$rotate = intval($textSettings['rotate']);
		if ($rotate>0) $rotate=360-$rotate;
		$text 	= $textSettings['text'];
		$x 		= intval($textSettings['x']);
		$y 		= intval($textSettings['y']);
		$gravity = $textSettings['gravity'];

		/*******************************************************************************************************
		** NORMALIZE SETTINGS
		**/
		if ($size == 0) $size = 12;
		if ((is_numeric($font)) || (is_numeric($textSettings['s_id'])))
		{
			$font = self::getFileDstById($font);
		} else
		{
			$font = $textSettings['font'];
		}

		/*******************************************************************************************************
		** DOIT
		**/

		$out = array();
		if(isset($gravity) && $gravity != '')
		{
			$cmd = "$convert '$useImage' -font '$font' -pointsize $size -gravity $gravity -fill '$color' -draw \"rotate $rotate text $x,$y '$text'\" '$tmpPix' 2>&1";
		}
		else
		{
			$cmd = "$convert '$useImage' -font '$font' -pointsize $size -fill '$color' -draw \"rotate $rotate text $x,$y '$text'\" '$tmpPix' 2>&1";
		}
		exec($cmd,$out);

		if (!file_exists($tmpPix)) {

			print_r($out);
			return $out;
		}

		return true;
	}


	public static function xr_file($params,&$template)
	{
		$s_id = intval($params['s_id']);

		$f = xredaktor_storage::getById($s_id);
		$f_alts = json_decode($f['s_alts'],true);
		$fileOnDisk = $f['s_onDisk'];



		$curLang 	= strtoupper(xredaktor_pages::getFrontEndLang());
		$f_alt		= trim($f_alts[$curLang]);

		if ($f_alt == "")
		{
			$failOverLangs = xredaktor_pages::getLangFailOverOrder();

			foreach ($failOverLangs as $curLang)
			{
				$curLang = strtoupper($curLang);
				$f_alt = trim($f_alts[$curLang]);
				if ($f_alt != "") break;
			}
		}

		$ret = array(
		'id' 	=> $s_id,
		'w' 	=> $f['s_media_w'],
		'h' 	=> $f['s_media_h'],
		'size'	=> $f['s_fileSizeBytes'],
		'hsize'	=> $f['s_fileSizeBytesHuman'],
		'mime'  => $f['s_mimeType'],
		'lang'	=> $curLang,
		'alts'  => $f_alts,
		'alt'	=> $f_alt,
		'url'	=> substr($fileOnDisk,strlen(Ixcore::htdocsRoot))
		);

		return $ret;
	}

	public static function getImageValidExtension($ext,$fileOnDisk='')
	{
		$ext = strtolower($ext);
		switch ($ext)
		{
			case 'png':
				return "png";
				break;
			case 'gif':
				return "gif";
				break;
			default:

				if ($fileOnDisk != "")
				{
					$ext = pathinfo($fileOnDisk);
					$ext = $ext['extension'];

					if ($ext == 'png')
					{
						return 'png';
					}

				}


				return "jpg";
		}
	}

	static $use_cloud = true;

	public static function xr_img2_cloud_on()
	{
		self::$use_cloud = true;
	}

	public static function xr_img2_cloud_off()
	{
		self::$use_cloud = false;
	}


	public static function xr_img2($params,$useReverseCloud=false)
	{


		$turn_off_cloud = false;

		if (isset($params['cloud']))
		{
			if (intval($params['cloud'])==0) $turn_off_cloud = true;
			unset($params['cloud']);
		}

		$fullpath 	= $params['fullpath'];

		/*
		$memCacheKey = xredaktor_assets::cachedImages_getKeyByParams($params);
		$cloud = xredaktor_assets::cachedImages_getByKey($memCacheKey);


		###### CLOUD USAGE
		$useCloud = true;
		if (!self::$use_cloud) 	$useCloud = false;
		if ($turn_off_cloud) 	$useCloud = false;


		if (($cloud !== false) && (trim($fullpath)!='Y') && ($useCloud))
		{
		if (Icloud::CDN_NO_AUTH_ENABLED)
		{

		$file 	= $cloud['file'];
		$ret 	= $cloud['ret'];

		$url = Icloud::CDN_NO_AUTH . $file;

		$ret['src'] = $url;
		$ret['url'] = $url;

		return $ret;
		}
		}

		*/


		$s_id 	= intval($params['s_id']);
		$w 		= intval($params['w']);
		$h	 	= intval($params['h']);
		$q	 	= intval($params['q']);

		$rmode 		= $params['rmode'];
		$crop		= $params['crop'];

		if ($q == 0) $q = 95;


		$cut 	= intval($params['cut']);
		if ($cut == 0) $cut = 150;


		$f = xredaktor_storage::getById($s_id);

		if ($f === false) 		return false;
		if ($f['s_del']=='Y') 	return false;


		if (($w == 0) && ($h == 0))
		{
			$w = $f['s_media_w'];
			$h = $f['s_media_h'];
		}

		if ($w == 0) $w = -1;
		if ($h == 0) $h = -1;

		$f_alts 	= json_decode($f['s_alts'],true);

		$fileOnDisk = $f['s_onDisk'];
		if (trim($file_name)=="") $file_name = basename($fileOnDisk);

		$type	= self::getImageValidExtension($params['ext'],$file_name);


		// fix show gifs, even if no ext set

		$isAnimatedGif = false;

		if ($params['showgififgif'] == 1)
		{
			$ext = pathinfo($file_name, PATHINFO_EXTENSION);

			if ($ext == "gif")
			{
				$type = "gif";

				// check if gif is animated
				exec("identify -format \"%n\" $fileOnDisk 2>&1",$out);

				if (intval($out[0]) > 1)
				{
					$isAnimatedGif = true;
				}

			}

			unset($params['showgififgif']);

		}


		$curLang 	= strtoupper(xredaktor_pages::getFrontEndLang());
		$f_alt		= trim($f_alts[$curLang]);

		if ($f_alt == "")
		{
			$failOverLangs = xredaktor_pages::getLangFailOverOrder();
			foreach ($failOverLangs as $curLang)
			{
				$curLang = strtoupper($curLang);
				$f_alt = trim($f_alts[$curLang]);
				if ($f_alt != "") break;
			}
		}

		$file_name 	= xredaktor_niceurl::burnDownLink($f_alt);

		$ret = array(
		'id' 	=> $s_id,
		'w' 	=> $f['s_media_w'],
		'h' 	=> $f['s_media_h'],
		'size'	=> $f['s_fileSizeBytes'],
		'hsize'	=> $f['s_fileSizeBytesHuman'],
		'mime'  => $f['s_mimeType'],
		'rw'	=> 0,
		'rh'	=> 0,
		'lang'	=> $curLang,
		'alts'  => $f_alts,
		'alt'	=> $f_alt,
		'url'	=> substr($fileOnDisk,strlen(Ixcore::htdocsRoot)),
		'src'	=> ''
		);

		$colorspace = $params['colorspace'];
		$cacheDir 	= xredaktor_storage::getDirOfStorageScopeCache(xredaktor_storage::getByIdStorageScope($s_id));



		$onDisk 	= imagesx::smartResizer($fileOnDisk,$w,$h,$rmode,$cacheDir,false,true,false,$type,$file_name.'_'.$s_id,$q,$colorspace,$crop,$isAnimatedGif);

		if(trim($fullpath)=='Y')
		{
			$ret['src'] = $onDisk;
		}
		else
		{
			$ret['src'] = substr($onDisk,strlen(Ixcore::htdocsRoot));
		}

		list($width, $height, $type, $attr) = @getimagesize($onDisk);
		$ret['rw'] = $width;
		$ret['rh'] = $height;

		// CLOUD - REGISTER

		/*

		xredaktor_assets::cachedImages_setKeyFile($s_id,$memCacheKey,$onDisk,$ret);


		$cloud = xredaktor_assets::cachedImages_getByKey($memCacheKey);
		if (($cloud !== false) && (trim($fullpath)!='Y') && ($useCloud))
		{
		if (Icloud::CDN_NO_AUTH_ENABLED)
		{

		$file 	= $cloud['file'];
		$ret 	= $cloud['ret'];

		$url = Icloud::CDN_NO_AUTH . $file;

		$ret['src'] = $url;
		$ret['url'] = $url;

		return $ret;
		}
		}

		if ($useReverseCloud)
		{

		if (Icloud::REVERSE_ORIGIN_ENABLED)
		{
		$url = $ret['src'];
		$url = Icloud::REVERSE_ORIGIN . $url;

		$ret['src'] = $url;
		$ret['url'] = $url;
		return $ret;
		}
		}

		*/


		return $ret;
	}

	public static function imageComposer($cfg)
	{
		//echo "<h1>IMG-COMPOSE</h1>";

		$cacheVersion = 1;
		$md5Files = "";
		foreach ($cfg['imgs'] as $id => $img)
		{
			if (is_numeric($img['s_id']))
			{
				$onDisk = self::getFileDstById($img['s_id']);
			} else
			{
				$onDisk = $img['s_id'];
			}
			if (file_exists($onDisk))
			{
				$md5Files .= filemtime($onDisk);
			}
		}

		$file_name  = $cfg['file_name'];
		$garbage 	= array();
		$extFinal	= $cfg['ext'];
		$cachedFile = $cfg['cacheDir'].'/'.xredaktor_niceurl::burnDownLink($file_name).'_'.md5(json_encode($cfg).$md5Files.$cacheVersion).'.'.$extFinal;
		$convert 	= Ixcore::PATH_ImageMagick;

		if (file_exists($cachedFile)&&(!$_REQUEST['FCACHE']=='NO'))
		{
			return $cachedFile;
		}

		$imgMProcessCode = array();
		foreach ($cfg['imgs'] as $id => $img)
		{
			if (is_numeric($img['s_id']))
			{
				$onDisk = self::getFileDstById($img['s_id']);
			} else
			{
				$onDisk = $img['s_id'];

			}

			if (!file_exists($onDisk)) continue;


			/* | FIXEN WIE XR_IMG */


			if (!isset($img['w']))
			{
				$w = -1;
			} else
			{
				$w = intval($img['w']);
			}

			if (!isset($img['h']))
			{
				$h = -1;
			}else
			{
				$h = intval($img['h']);
			}

			$quality 	= intval($img['quality']);
			$ext		= self::getImageValidExtension($img['ext']);

			//echo "$ext || ".$img['ext']."<br>";


			if ($quality == 0) $quality = 95;

			$useImage = $onDisk;



			/*******************************************************************************************************
			** RESIZE
			**/
			if (($w!=0)&&($h!=0))
			{
				$rmode = strtolower($img['rmode']);
				if (trim($rmode)=="") $rmode = "default";

				$tmpPix 	= hdx::getTmpDir().'/imageComposer_'.md5(json_encode($cfg).md5(time())).'_cco_'.md5($useImage).'.'.$ext;
				$garbage[] 	= $tmpPix;

				//	echo "[$onDisk|$ext|$rmode]<br>";
				$state = self::imageComposer_resize($rmode,$useImage,$tmpPix,$w,$h,$ext,$quality);
				if ($state !== true)
				{
					self::imageComposer_error("RESIZE|$rmode",$useImage,$tmpPix,$state);
				}
				$useImage 	= $tmpPix;
			}



			/*******************************************************************************************************
			** GRAY
			**/
			if (strtolower($img['colorspace'])=='gray')
			{
				$tmpPix 	= hdx::getTmpDir().'/imageComposer_'.md5(json_encode($cfg).md5(time())).'_colorspace_'.md5($useImage).'.'.$ext;
				$garbage[] 	= $tmpPix;
				$out = array();
				exec("$convert '$useImage' -colorspace Gray -quality $quality '$tmpPix' 2>&1",$out);
				if (!file_exists($tmpPix)) {
					self::imageComposer_error('COLORSPACE',$useImage,$tmpPix,$out);
				}
				$useImage 	= $tmpPix;
			}

			/*******************************************************************************************************
			** TEXT
			**/

			if (is_array($img['text']))
			{
				$textSettings 	= $img['text'];
				$tmpPix 		= hdx::getTmpDir().'/imageComposer_'.md5(json_encode($cfg).md5(time())).'_text_'.md5($useImage).'.'.$ext;
				$garbage[] 		= $tmpPix;
				$state = self::imageComposer_text($useImage,$tmpPix,$textSettings);
				if ($state !== true)
				{
					self::imageComposer_error("TEXT",$useImage,$tmpPix,$state);
				}
				$useImage 	= $tmpPix;
			}

			/*******************************************************************************************************
			** ROTATE
			**/
			$rotate = intval($img['rotate']);
			if ($rotate > 0)
			{
				$r 			= 360-$rotate;
				$tmpPix 	= hdx::getTmpDir().'/imageComposer_'.md5(json_encode($cfg).md5(time())).'_rotate_'.md5($useImage).'.'.$ext;
				$garbage[] 	= $tmpPix;

				$out = array();
				exec("$convert '$useImage' -virtual-pixel transparent +distort ScaleRotateTranslate $r -quality $quality '$tmpPix' 2>&1",$out);
				if (!file_exists($tmpPix)) {
					self::imageComposer_error('ROTATE',$useImage,$tmpPix,$out);
				}
				$useImage 	= $tmpPix;
			}

			if (!file_exists($useImage)) continue;

			#### MOVA THA IMAGE
			$x = intval($img['x']);
			$y = intval($img['y']);
			$action = " -page +$x+$y '$useImage' ";
			$imgMProcessCode[] = $action;
		}

		/*******************************************************************************************************
		** RESULTING IMAGE
		**/

		$quality = intval($cfg['quality']);
		if ($quality == 0) $quality = 95;

		/*******************************************************************************************************
		** ROTATE
		**/
		$rotateCmd 	= "";
		if ($cfg['rotate']>0)
		{
			$r = 360-$cfg['rotate'];
			$rotateCmd = " -virtual-pixel transparent +distort ScaleRotateTranslate $r ";
		}

		/*******************************************************************************************************
		** GRAY
		**/
		if (strtolower($img['colorspace'])=='gray')
		{
			$grayCmd = " -colorspace Gray ";
		}

		/*******************************************************************************************************
		** X/Y of IMAGES
		**/
		$cmd = " ".implode("",$imgMProcessCode)." -mosaic  ";
		$finalCmd = "$convert -strip -colorspace ".Ixcore::PATH_ImageMagick_RGB." -background transparent $cmd $grayCmd -quality $quality '$cachedFile'  2>&1";

		//echo $finalCmd."<br>";

		$out = array();
		exec($finalCmd, $out);

		/*******************************************************************************************************
		** MAGIC
		**/
		if (is_array($cfg['magic']))
		{
			$magic = $cfg['magic'];
			$state = self::imageComposer_magic($magic,$cachedFile,$cachedFile,$w,$h,$ext,$quality);
			if ($state !== true)
			{
				self::imageComposer_error("MAGIC|$magic",$cachedFile,$cachedFile,$state);
			}
		}

		/*******************************************************************************************************
		** GARBAGE
		**/

		foreach ($garbage as $f)
		{
			if (!is_file($f)) continue;
			@unlink($f);
		}

		/*******************************************************************************************************
		** FINAL HANDLING
		**/

		if (!file_exists($cachedFile)) {
			self::imageComposer_error('FINALIZE','',$cachedFile,$out);
			return "ERROR-FINALIZING";
		}

		/*******************************************************************************************************
		** FINAL RESIZING
		**/

		$w 			= intval($cfg['w']);
		$h 			= intval($cfg['h']);

		/*
		if ($w == -1)
		{
		list($width, $height, $type, $attr) = @getimagesize($cachedFile);
		$w = $width;
		}

		if ($h == -1)
		{
		list($width, $height, $type, $attr) = @getimagesize($cachedFile);
		$h = $height;
		}*/

		if (($w>0)&&($h>0)) {
			$rmode = strtolower($img['rmode']);
			if (trim($rmode)=="") $rmode = "default";
			$state = self::imageComposer_resize($rmode,$cachedFile,$cachedFile,$w,$h,$ext,$quality);
			if ($state !== true)
			{
				self::imageComposer_error("FINAL-RESIZE|$rmode",$cachedFile,$cachedFile,$state);
				return "ERROR-FINAL-RESIZE";
			}
		}


		/*******************************************************************************************************
		** TEXT
		**/
		if (is_array($cfg['text']))
		{
			$textSettings 	= $cfg['text'];
			//$tmpPix 		= hdx::getTmpDir().'/imageComposer_'.md5(json_encode($cfg)).'_text_'.md5(json_encode($cfg)).'.'.$ext;
			//$garbage[] 		= $tmpPix;
			$state = self::imageComposer_text($cachedFile,$cachedFile,$textSettings);
			if ($state !== true)
			{
				self::imageComposer_error("TEXT",$cachedFile,$cachedFile,$state);
			}
			$useImage 	= $tmpPix;

		}

		/*******************************************************************************************************
		** FINAL X/Y + ROTATION
		**/

		$x = intval($cfg['x']);
		$y = intval($cfg['y']);

		if (($x>0)||($y>0) || ($rotateCmd != "")) {
			$out = array();
			exec("$convert -background transparent -page +$x+$y $cachedFile -mosaic $rotateCmd -quality $quality '$cachedFile' 2>&1", $out);
			if (!file_exists($cachedFile))
			{
				self::imageComposer_error("FINAL-MOVE|$rmode",$cachedFile,$cachedFile,$state);
				return "ERROR-FINAL-MOVE";
			}
		}

		return $cachedFile;
	}


	// von PICHLARN
	public static function fixFileUsage($psa_id=false)
	{
		$scope = "";
		if (is_numeric($psa_id))
		{
			$scope = " AND psa_id = $psa_id ";
		}

		$sql 				= "SELECT * FROM pages_settings_atoms, atoms_settings WHERE as_del = 'N' AND psa_del =  'N' AND psa_json_cfg != '' AND  (as_a_id = psa_a_id OR as_a_id = psa_inline_a_id) AND as_type = 'FILE' $scope";
		$records2inspect 	= dbx::queryAll($sql);

		foreach ($records2inspect as $r)
		{

			$psa_json_cfg 		= json_decode($r['psa_json_cfg'],true);
			$psa_id 			= $r['psa_id'];
			$as_name 			= $r['as_name'];
			$as_id 				= $r['as_id'];
			$psa_p_id 			= $r['psa_p_id'];
			$as_type_multilang	= $r['as_type_multilang'];

			if ($as_type_multilang == 'Y')
			{
				$Vlangs = xredaktor_pages::getValidLangs();

				foreach ($Vlangs as $lang)
				{
					$lang = strtoupper($lang);
					$s_id = $psa_json_cfg['_'.$lang.'_'.$as_name];

					/* KICK NON-LANG SPECIFIC */
					$kick = dbx::queryAll("select * from storage_usage where su_psa_id = $psa_id and su_as_id = $as_id and su_langtag = ''");
					if ($kick !== false)
					{
						foreach ($kick as $present)
						{
							dbx::delete("storage_usage",array('su_id'=>$present['su_id']));
						}
					}
					if (is_numeric($s_id))
					{
						$present = dbx::query("select * from storage_usage where su_s_id = $s_id and su_psa_id = $psa_id and su_as_id = $as_id and su_langtag = '$lang'");
						if ($present === false)
						{
							dbx::insert("storage_usage",array('su_s_id'=>$s_id,'su_psa_id'=>$psa_id,'su_as_id'=>$as_id,'su_p_id'=>$psa_p_id,'su_type'=>'PAGE','su_langtag'=>$lang));
						}
					} else
					{
						$present = dbx::query("select * from storage_usage where su_psa_id = $psa_id and su_as_id = $as_id and su_langtag = '$lang'");
						if ($present !== false)
						{
							dbx::delete("storage_usage",array('su_id'=>$present['su_id']));
						}
					}
				}

			}
			else
			{
				$s_id = $psa_json_cfg[$as_name];

				/* KICK LANG SPECIFIC */
				$kick = dbx::queryAll("select * from storage_usage where su_psa_id = $psa_id and su_as_id = $as_id and su_langtag != ''");
				if ($kick !== false)
				{
					foreach ($kick as $present)
					{
						dbx::delete("storage_usage",array('su_id'=>$present['su_id']));
					}
				}

				if (is_numeric($psa_json_cfg[$as_name]))
				{
					$present = dbx::query("select * from storage_usage where su_s_id = $s_id and su_psa_id = $psa_id and su_as_id = $as_id and su_langtag = ''");
					if ($present === false)
					{
						dbx::insert("storage_usage",array('su_s_id'=>$s_id,'su_psa_id'=>$psa_id,'su_as_id'=>$as_id,'su_p_id'=>$psa_p_id,'su_type'=>'PAGE','su_langtag'=>''));
					}
				} else
				{
					$present = dbx::query("select * from storage_usage where su_psa_id = $psa_id and su_as_id = $as_id and su_langtag = ''");
					if ($present !== false)
					{
						dbx::delete("storage_usage",array('su_id'=>$present['su_id']));
					}
				}
			}


		}

		return true;
	}


	public static function rotate_if_necessary($img_s_id)
	{
		//return $img_s_id;
		$img_s_id = intval($img_s_id);
		if ($img_s_id == 0) return false;

		$fileOnSrv = self::getFilePathById($img_s_id);

		// todo: check if this is an image
		//if ($isNotAnImage) return false;


		$image = new Imagick($fileOnSrv);
		// todo: check returnval if img is dirty / unreadable etc

		$hasExif = false;
		$profilesArray = $image->getImageProfiles("*",false);
		foreach ($profilesArray as $k => $v)
		{
			if ($v == 'exif') {
				$hasExif = true;
				break;
			}
		}

		$rotation 	 = false;
		$orientation = $image->getImageOrientation();
		// todo: try/catch for getImageOrientation


		$width  = $image->getImageWidth();
		$height = $image->getImageHeight();


		switch($orientation) {
			/*
			case imagick::ORIENTATION_BOTTOMRIGHT:
			$rotation = 180;
			break;

			case imagick::ORIENTATION_RIGHTTOP:
			$rotation = 90;
			break;

			case imagick::ORIENTATION_LEFTBOTTOM:
			$rotation = -90;
			break;
			*
			*/
			case Imagick::ORIENTATION_TOPLEFT:
				break;
			case Imagick::ORIENTATION_TOPRIGHT:
				$image->flopImage();
				break;
			case Imagick::ORIENTATION_BOTTOMRIGHT:
				$image->rotateImage("#000", 180);
				break;
			case Imagick::ORIENTATION_BOTTOMLEFT:
				$image->flopImage();
				$image->rotateImage("#000", 180);
				break;
			case Imagick::ORIENTATION_LEFTTOP:
				$image->flopImage();
				$image->rotateImage("#000", -90);
				break;
			case Imagick::ORIENTATION_RIGHTTOP:
				$image->rotateImage("#000", 90);
				break;
			case Imagick::ORIENTATION_RIGHTBOTTOM:
				$image->flopImage();
				$image->rotateImage("#000", 90);
				break;
			case Imagick::ORIENTATION_LEFTBOTTOM:
				$image->rotateImage("#000", -90);
				break;
			default: // Invalid orientation
			break;
		}

		if ($rotation === false) {
			// either already properly rotated or errorneous
			// -> nothing to do, return
			return $img_s_id;
		}

		$image->rotateimage("#000", $rotation);

		if ($hasExif)
		{
			$image->removeImageProfile('exif');
		}

		// todo: try / catch for rotateImage

		// update width / height / filesize

		//$width  = $image->getImageWidth();
		//$height = $image->getImageHeight();
		$filesize = $image->getImageLength();

		dbx::update('storage', array(
		's_fileSizeBytes' 		=> $filesize,
		's_fileSizeBytesHuman'	=> hdx::bytes2HumanReadAble($filesize),
		//'s_media_w'				=> $width,
		//'s_media_h'				=> $height,
		), array(
		's_id' => $img_s_id
		));

		// Now that it's auto-rotated, make sure the EXIF data is correct in case the EXIF gets saved with the image!
		$image->setImageOrientation(imagick::ORIENTATION_TOPLEFT);
		// todo: try / catch for setImageOrientation






		$image->writeImage($fileOnSrv);
		// todo: try / catch for writeImage

		return true;
	}




}
