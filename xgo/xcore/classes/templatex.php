<?

class templatex
{

	const version = "10.0";
	
	public static $allowPlugins = true;
	
	public static function disablePlugins()
	{
		self::$allowPlugins = false;
	}
	
	public static function arePluginsEnabled()
	{
		return self::$allowPlugins;
	}
	

	public static function render($filename,$assigned=array(),$pluginDir=false,$templateDir=false)
	{

		$smartyDir = dirname(__FILE__)."/../libs/smarty3";
		#		loaderx::addAutoLoadPath($smartyDir.'/sysplugins');
		#		loaderx::addAutoLoadPath($smartyDir.'/sysplugins');
		require_once($smartyDir."/Smarty.class.php");

		$smarty = new Smarty();

		$smarty->compile_dir 		= 	dirname(__FILE__).'/../tmp/smarty';
		$smarty->cache_dir			=	dirname(__FILE__).'/../tmp/smarty';
		$smarty->caching 			= 	Ixcore::SMARTY_CACHEING ;
		$smarty->cache_lifetime 	= 	Ixcore::SMARTY_LIFETIME ;
		$smarty->compile_check 		= 	Ixcore::SMARTY_COMPILE_CHECK ;
		//$smarty->autoload_filters['pre'][] = 'switch';
		//$smarty->loadPlugin('smarty_compiler_switch');

		if ($pluginDir !== false)
		{
			//if (!is_dir($pluginDir)) frontcontrollerx::html_failure('SMARTY_PLUGIN_DIR_NOT_EXISTS');
			if (is_array($pluginDir))
			{
				$smarty->plugins_dir = $pluginDir;
			} else
			{
				$smarty->plugins_dir[] = $pluginDir;
			}
		}

		if ($templateDir !== false)
		{
			//if (!is_dir($templateDir)) frontcontrollerx::html_failure('SMARTY_TEMP_DIR_NOT_EXISTS');
			$smarty->template_dir = $templateDir;
		}

		$smarty->left_delimiter 	= '<%';
		$smarty->right_delimiter 	= '%>';

		if (file_exists($filename) && is_file($filename))
		{
			$smarty->assign($assigned);
			return $smarty->fetch($filename);
		}

		die('NOT_FOUND:'.$filename);
		reportx::error('templatex','SMARTY_TEMPLATE_NOT_FOUND',-1,$filename,true);
	}

	public static function renderOnTheFly($content,$assigned=array(),$pluginDir=false,$templateDir=false)
	{
		$tmpFile = hdx::getTempFileName('renderOnTheFly');
		hdx::fwrite($tmpFile,$content);
		return self::render($tmpFile,$assigned,$pluginDir,$templateDir);
	}

	private static function _load_lib_htmlparser()
	{
		require_once(dirname(__FILE__)."/../libs/htmlparser/htmlparser.php");
		require_once(dirname(__FILE__)."/../libs/htmlparser/html2text.php");
	}

	public static function renderBase64ImageIncluded($filename,$assigned=array())
	{
		if (!file_exists($filename)) die('renderBase64ImageIncluded-templateNotFound');

		self::_load_lib_htmlparser();

		//$html			= hdx::fread($filename);
		try {
			$html = self::render($filename,$assigned);
		} catch (Exception $e)
		{
			$inspect = explode("\n",htmlspecialchars($html));

			foreach ($inspect as $i=>$line)
			{
				$l = $i+1;
				$inspect[$i] = "Line $l :: ".$line;
			}

			$inspect = join("\n",$inspect);

			echo "<pre>".$e->getMessage()."\n$inspect</pre>";
			die();
		}


		$images			= array();
		$dirOfImages 	= dirname($filename);
		$parser 		= new HtmlParser($html);

		while ($parser->parse()) {
			$name = $parser->iNodeName;
			$type = $parser->iNodeType;

			if ((trim(strtolower($name)) == "img") && ($type == NODE_TYPE_ELEMENT))
			{
				$attrValues = $parser->iNodeAttributes;
				$attrNames 	= array_keys($attrValues);
				$srcValue 	= $attrValues['src'];

				if (trim(strtolower($srcValue)) != "")
				{
					if (!in_array($srcValue,$images))
					{
						$images[] = $srcValue;
					}
				}
			}
		}

		$s = array();
		$r = array();

		foreach ($images as $img)
		{
			$fileOnDisk = $dirOfImages.'/'.$img;
			$mime 		= hdx::getMimeByExtension($img);
			$r[] 		= "data:$mime;base64,".base64_encode(hdx::fread($fileOnDisk));
			$s[] 		= $img;
		}

		$html 		= str_replace($s,$r,$html);
		return $html;
	}

}

