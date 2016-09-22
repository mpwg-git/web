<?

class memcachex
{
	/***********************************************************************
	
	
	MEMCACHE IS DEPRECATED
	
	
	*/
	
	public static $inst 		= false;
	public static $key_prefix 	= Ixcore::memcachex_preFix; 
	
	function init() {
		/*
		self::$inst = new Memcached();
		self::$inst->addServer('localhost', 11211);
		*/
	}

	function get($key) {
		return false;
		if (!self::$inst) self::init();
		return self::$inst->get(self::$key_prefix.$key);
	}

	function set($key, $v) {
		return false;
		if (!self::$inst) self::init();
		return self::$inst->set(self::$key_prefix.$key, $v);
	}

	function del($key) {
		return false;
		if (!self::$inst) self::init();
		return self::$inst->delete(self::$key_prefix.$key);
	}

}