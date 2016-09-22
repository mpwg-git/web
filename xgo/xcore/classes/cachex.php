<?

class cachex
{

	static $cacheVersion = 2;

	private static $instance = false;


	public static function init()
	{

		// USAGE OF https://github.com/phpredis/phpredis PRECOMPILED

		$redisPassword 	= $siteId . md5(Ixcore::DB_PWD) . md5(md5(Ixcore::DB_PWD)) . md5(Ixcore::DB_USER);
		$redisDB       	= Ixcore::DB_HOST;
		$redisPort	   	= Ixcore::redisPort;

		self::$instance = new Redis();
		self::$instance->connect(Ixcore::DB_HOST, $redisPort);
		self::$instance->auth($redisPassword);
		self::$instance->setOption(Redis::OPT_SERIALIZER, Redis::SERIALIZER_PHP);

	}

	public static function set($k,$v,$ttl_seconds=false)
	{
		if (!self::$instance) self::init();
		if (!self::$instance) return false;


		if ($ttl_seconds === false)
		{
			return self::$instance->set($k, $v);
		}

		$ttl_seconds = intval($ttl_seconds);
		if ($ttl_seconds == 0) return self::$instance->set($k, $v);

		return self::$instance->set($k, $v, Array('nx', 'ex'=> $ttl_seconds));
	}

	public static function get($k)
	{
		if (!self::$instance) self::init();
		if (!self::$instance) return false;
		if (!Ixcore::useCacheing) return false;
		return self::$instance->get($k);
	}

	public static function del($k)
	{
		if (!self::$instance) self::init();
		if (!self::$instance) return false;
		return self::$instance->delete($k);
	}

	public static function getInstance($k)
	{
		if (!self::$instance) self::init();
		if (!self::$instance) return false;
		return self::$instance;
	}
}