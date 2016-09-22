<?

class xredaktor_sanitize
{


	public static function print_r($arr)
	{
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
	}

	public static function smarty_class_call(&$template,$params,$fn)
	{

		if (!templatex::arePluginsEnabled()) return false;
		$return = frontcontrollerx::safeCallUserFunction($fn,$params);

		if (isset($params['var']))
		{
			$template->assign($params['var'],$return);
		}

		return false;
	}


	public static function pi_error($field,$msg)
	{
		die("pi_error: $field $msg");
		return;
	}

	public static function pi($parse,$values=false)
	{

		if ($values === false)
		{
			$values = $_REQUEST;
		}

		$ret = array();

		if (isset($parse['i']))
		{
			$ints = $parse['i'];
			foreach ($ints as $i => &$varx)
			{
				$v = intval($values[$i]);
				if ($v === 0) self::pi_error($i,"wurde nicht angegeben");
				$varx = $ret[$i] = $v;
			}
		}

		if (isset($parse['s']))
		{
			$strings = $parse['s'];
			foreach ($strings as $s => &$varx)
			{
				if (is_array($values[$s])) continue;
				if (is_object($values[$s])) continue;
				
				$varx = $v = dbx::escape(trim($values[$s]));
				$varx = $ret[$s] = $v;
			}
		}
		
		if (isset($parse['o']))
		{
			$objects = $parse['o'];
			foreach ($objects as $o => &$varx)
			{
				$varx = $v = $values[$o];
				$varx = $ret[$s] = $v;
			}
		}
		if (isset($parse['j']))
		{
			$objects = $parse['j'];
			foreach ($objects as $o => &$varx)
			{
				$varx = $v = json_decode($values[$o],true);
				$varx = $ret[$s] = $v;
			}
		}
		
		return $ret;
	}


	public static function inputException()
	{
		
		// CHECKEN DIE IP 
		// IN DEN REDDIS PER IP, mit TTL = 60*5
		
		die("inputException");
		
	}
	
	public static function allowAccess()
	{
		
	}

	
}
