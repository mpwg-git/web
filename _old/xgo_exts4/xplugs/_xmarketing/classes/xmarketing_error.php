<?

class xmarketing_error
{

	public function getHumanMessageById($error)
	{
		$class 	= new ReflectionClass(__CLASS__);
		$arr 	= $class->getStaticProperties();
		foreach ($arr as $k => $v)
		{
			if ($v == $error) return $k;
		}
		return "UNKWON - ERROR";
	}

	public static $INVALID_EMAIL 					= -1;
	public static $INVALID_QUEUE 					= -2;
	public static $NO_SEND_CONNECTORS 				= -3;
	public static $INVALID_SEND_CONNECTOR_ID		= -4;

}