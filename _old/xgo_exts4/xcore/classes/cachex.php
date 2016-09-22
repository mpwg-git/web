<?


class cachex
{

	static $cacheVersion = 1;

	private static function _getCacheDir()
	{
		return dirname(__FILE__).'/../tmp/cache';
	}

	private static function _genKey($namespace,$vars,$files) {
		$key = "";

		$key .= md5($namespace,json_encode($vars));

		if (is_array($files)) {
			foreach ($files as $file)
			{
				if (file_exists($file))
				{
					$key .= filemtime($file);
				}
			}
		}

		return md5($key);
	}

	private static function _getFinalFileName($namespace,$vars,$files)
	{
		$key 		= self::_genKey($namespace,$vars,$files);
		$fileOnDisk	= self::_getCacheDir().'/'.$namespace.'_'.$key .'.xcached';
		return $fileOnDisk;
	}

	public static function exists($namespace,$vars,$files=array()) {
		$fileOnDisk = self::_getFinalFileName($namespace,$vars,$files);
		return file_exists($fileOnDisk);
	}

	public static function get($namespace,$vars,$files=array()) {
		$fileOnDisk = self::_getFinalFileName($namespace,$vars,$files);
		if (!file_exists($fileOnDisk)) return false;
		return hdx::fread($fileOnDisk);
	}

	public static function clear($namespace,$vars,$files=array()) {
		$fileOnDisk = self::_getFinalFileName($namespace,$vars,$files);
		@unlink($fileOnDisk);
	}

	public static function register($namespace,$vars,$data2cache,$files=array()) {
		$fileOnDisk = self::_getFinalFileName($namespace,$vars,$files);
		hdx::fwrite($fileOnDisk,$data2cache);
	}

}