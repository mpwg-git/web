<?

class xcrm_closure
{
	public static function handleAjaxFunction($function)
	{
		switch ($function)
		{
			case 'doit':
				$path = '/gitgo/web/web_36/web/xgo/xplugs/xredaktor/media/js';
				self::checkCode($path);
				$path = '/gitgo/web/web_36/web/xgo/xplugs/xredaktor/media/js/xr_fields';
				self::checkCode($path);
				$path = '/gitgo/web/web_36/web/xgo/xplugs/xcrm/media/js';
				self::checkCode($path);
				die();
				break;
			default: 
				die('FUNCTION_NOT_FOUND _ '.$function);
				break;
		}
	}
	
	public static function checkCode($path)
	{
		$tmpFile 	= hdx::getTempFileName('tmpFile',	'.js');
		$closure = "java -jar /gitgo/tools/compiler.jar";
		
		$exclude = array(
		'.',
		'..',
		'xr_fields',
		'loadAll.php',
		'bootstrap',
		'xredaktor_atoms(2).jsxxx',
		'xcrm_gui2(3).j_s',
		'xcrm_gui2(2).j_s',
		'xcrm_gui(2).j_s'
		);
				
		if ($handle = opendir($path)) {
		    
		    while (false !== ($file = readdir($handle))) {
		    	if(in_array($file, $exclude)) continue;
				
				$cmd = "$closure --js $path/$file --js_output_file $tmpFile 2>&1";
				
		        echo "<h1>$file</h1>";
				
				//echo $cmd;
				
				$out = array();
				exec($cmd,$out);
				echo '<pre>';
				print_r($out);
				echo '</pre>';
				
		    }
		
			
		
		    closedir($handle);
		}
	}
}
