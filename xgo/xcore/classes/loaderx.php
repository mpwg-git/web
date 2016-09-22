<?

class loaderx
{
	
	const version = "2.0";
	
	private static $autoLoadPaths = null;
	private static $extraClassMissingHooks = null;

	public static function register()
	{
		spl_autoload_register(array(__CLASS__, '_autoload'));
	}

	public static function addAutoLoadPath($pathx)
	{
		if (!is_array(self::$autoLoadPaths)) self::$autoLoadPaths = array();
		self::$autoLoadPaths[] = $pathx;
	}

	private static function _emptyClassPaths($class)
	{
		die("<pre>class paths empty -  class ".$class." required.</pre>");
	}

	public static function _autoload($class)
	{
		if (!is_array(self::$autoLoadPaths)) self::_emptyClassPaths($class);
		foreach (self::$autoLoadPaths as $pathx) {
			$class_file = $pathx."/".$class.".php";
			if (file_exists($class_file))
			{
				self::_require_once_check($class_file,$class);
				return;
			}
		}
		self::_classFileMissing($class);
	}

	private static function _classFileMissing($class)
	{
		return ;
		if (is_array(self::$extraClassMissingHooks))
		{
			foreach (self::$extraClassMissingHooks as $class_func) {
				$c = $class_func['c'];
				$f = $class_func['f'];
				$staticCall = $c.'::'.$f;
				$ret = @call_user_func($staticCall,$class);
				if ($ret) return;
			}
		}
		die("<pre>class file missing -  class ".$class." required.</pre>");
	}

	private static function _classFileException($class)
	{
		die("<pre>class file exception -  class ".$class." required.</pre>");
	}

	private static function _require_once_check($file,$class=false)
	{
		if ($class === false) $class = basename(substr($file,0,-4));

		if (!file_exists($file))
		{
			self::_classFileMissing($class);
		}
		try {
			require_once($file);
		} catch (Exception $x)
		{
			self::_classFileException($class);
		}
	}

}
loaderx::register();
loaderx::addAutoLoadPath(dirname(__FILE__));