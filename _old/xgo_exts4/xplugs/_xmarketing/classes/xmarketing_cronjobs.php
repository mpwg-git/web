<?

class xmarketing_cronjobs
{
	
	public static $isRunning = false;

	static $delay_popping_mins = 15;

	private static function log($message)
	{
		echo "<pre>$message</pre>";
		ob_flush();
		flush();
	}

	private static function registerCall()
	{
		dbx::insert("xm_cronjobs",array(
		'xmc_ip'=>libx::getIp(),
		'xmc_ts'=>"NOW()"));
		return dbx::getLastInsertId();
	}

	public static function doMasterCall()
	{
		self::$isRunning = true;
		$xmc_id = self::registerCall();
		
		self::log("CRON_SLOT_ID :: ".intval($_REQUEST['CRON_SLOT_ID'])); 
		self::log("START-CRONJOB :: $xmc_id");
		self::collectBounces($xmc_id);
		self::collectRemoteLists($xmc_id);
		xmarketing_queue::processQ();
		
		self::log("END-CRONJOB :: $xmc_id");
	}
	
	public static function collectRemoteLists($xmc_id)
	{
		$remoteLists = xmarketing_lists::getAllRemoteListsForSyncNow();
		if (!is_array($remoteLists)) $remoteLists = array();
		
		foreach ($remoteLists as $rl)
		{
			$xml_id = intval($rl['xml_id']);
			if ($xml_id == 0) continue;
			self::log("Collecting Remote List: $xml_id");
			xmarketing_lists::collectRemoteList($xml_id);
		}
	}

	public static function collectBounces($xmc_id)
	{
		$xmc_id 		= intval($xmc_id);
		$connectors 	= xmarketing_config::getAllSendConnectorsForPoppingNow(self::$delay_popping_mins);
		if (!is_array($connectors)) $connectors = array();

		dbx::update("xm_cronjobs",array('xmc_bounces_popping_start'=>'NOW()'),array('xmc_id'=>$xmc_id));

		foreach ($connectors as $c)
		{
			$xmsc_id = intval($c['xmsc_id']);
			self::log("Collecting Bounces of SC: $xmsc_id");
			xmarketing_bounces_handler::collectAll($xmsc_id);
		}

		$xmc_bounces_cnt_connectors = count($connectors);
		dbx::query("update xm_cronjobs set xmc_bounces_cnt_connectors=$xmc_bounces_cnt_connectors, xmc_bounces_popping_duration=TIME_TO_SEC(TIMEDIFF(NOW(),xmc_bounces_popping_start)) where xmc_id = $xmc_id");
	}

}