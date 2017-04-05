<?

class fe_mapping_fragen {
	
	
	const table_wgTest2User	 	= 'wizard_auto_765';
	const table_fragenNeu 		= 'wizard_auto_961';	
	const table_Fragebogen2User = 'wizard_auto_1002';
	

	
	public static function mapping_alt_neu()
	{
		$fragen = dbx::queryAll("SELECT * FROM " . self::table_fragenNeu . " WHERE wz_del = 'N' AND wz_online = 'Y' ORDER BY wz_sort ASC");
		
		$userlist = dbx::queryAll("SELECT DISTINCT wz_USERID FROM wizard_auto_765 WHERE wz_USERID > 0");
		
		
		foreach($userlist as $u)
		{
			$userId = intval($u['wz_USERID']);
			
			$collection = array();
			$delta = 0;
			$wichtig = 0;
		
			foreach($fragen as $k => $v)
			{
				if($v['wz_NR'] == 1)
				{
					$getFrage = dbx::query("select * from " . self::table_wgTest2User . " where wz_USERID = $userId and wz_FRAGE_ID = 1");
					
					if($getFrage !== false)
					{
						$wz_FRAGEID = $v['wz_NR'];
						$antwort = $getFrage['wz_ANTWORT_BIN'];
						if($antwort == 15) $delta = 2;
						if($antwort == 14) $delta = 3;
						if($antwort == 13) $delta = 4;
						if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
						
						$check = dbx::query("SELECT * FROM " . self::table_Fragebogen2User . " WHERE wz_FRAGEID = $wz_FRAGEID AND wz_USERID = $userId");
						if($check == false)
						{
							dbx::query("INSERT INTO " . self::table_Fragebogen2User . " (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
						}
						else
						{
							$wz_id = intval($check['wz_id']);
							dbx::query("UPDATE `" . self::table_Fragebogen2User . "` SET `wz_FRAGEID` = '$wz_FRAGEID', `wz_USERID` = '$userId', `wz_DELTA` = '$delta', `wz_SUPERWICHTIG` = '$wichtig' WHERE `wz_id` = '$wz_id'");
						}
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => $delta,
								'wz_SUPERWICHTIG' => $wichtig
						);
					}
					else {
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => 0,
								'wz_SUPERWICHTIG' => 0
						);
					}
				}
				
				
				if($v['wz_NR'] == 2)
				{
					$getFrage = dbx::query("select * from " . self::table_wgTest2User . " where wz_USERID = $userId and wz_FRAGE_ID = 16");
					
					if($getFrage !== false)
					{
						$wz_FRAGEID = $v['wz_NR'];
						$antwort = $getFrage['wz_ANTWORT_BIN'];
						if($antwort == 56) $delta = 2;
						if($antwort == 57) $delta = 4;
						if($antwort == 58) $delta = 3;
						if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
						
						$check = dbx::query("SELECT * FROM " . self::table_Fragebogen2User . " WHERE wz_FRAGEID = $wz_FRAGEID AND wz_USERID = $userId");
						if($check == false)
						{
							dbx::query("INSERT INTO " . self::table_Fragebogen2User . " (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
						}
						else
						{
							$wz_id = intval($check['wz_id']);
							dbx::query("UPDATE `" . self::table_Fragebogen2User . "` SET `wz_FRAGEID` = '$wz_FRAGEID', `wz_USERID` = '$userId', `wz_DELTA` = '$delta', `wz_SUPERWICHTIG` = '$wichtig' WHERE `wz_id` = '$wz_id'");
						}
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => $delta,
								'wz_SUPERWICHTIG' => $wichtig
						);
					}
					else {
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => 0,
								'wz_SUPERWICHTIG' => 0
						);
					}
				}
				
				
				if($v['wz_NR'] == 3)
				{
					$getFrage = dbx::query("select * from " . self::table_wgTest2User . " where wz_USERID = $userId and wz_FRAGE_ID = 11");
					
					if($getFrage !== false)
					{
						$wz_FRAGEID = $v['wz_NR'];
						$antwort = $getFrage['wz_ANTWORT_BIN'];
						if($antwort == 42) $delta = 5;
						if($antwort == 43)	$delta = 3;
						if($antwort == 44) $delta = 1;
						if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
						
						$check = dbx::query("SELECT * FROM " . self::table_Fragebogen2User . " WHERE wz_FRAGEID = $wz_FRAGEID AND wz_USERID = $userId");
						if($check == false)
						{
							dbx::query("INSERT INTO " . self::table_Fragebogen2User . " (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
						}
						else
						{
							$wz_id = intval($check['wz_id']);
							dbx::query("UPDATE `" . self::table_Fragebogen2User . "` SET `wz_FRAGEID` = '$wz_FRAGEID', `wz_USERID` = '$userId', `wz_DELTA` = '$delta', `wz_SUPERWICHTIG` = '$wichtig' WHERE `wz_id` = '$wz_id'");
						}
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => $delta,
								'wz_SUPERWICHTIG' => $wichtig
						);
					}
					else {
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => 0,
								'wz_SUPERWICHTIG' => 0
						);
					}
				}
				
				
				if($v['wz_NR'] == 4)
				{
					$getFrage = dbx::query("select * from " . self::table_wgTest2User . " where wz_USERID = $userId and wz_FRAGE_ID = 14");
					
					if($getFrage !== false)
					{
						$wz_FRAGEID = $v['wz_NR'];
						$antwort = $getFrage['wz_ANTWORT_BIN'];
						if($antwort == 51) $delta = 4;
						if($antwort == 52)	$delta = 2;
						if($antwort == 53) $delta = 3;
						if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
						
						$check = dbx::query("SELECT * FROM " . self::table_Fragebogen2User . " WHERE wz_FRAGEID = $wz_FRAGEID AND wz_USERID = $userId");
						if($check == false)
						{
							dbx::query("INSERT INTO " . self::table_Fragebogen2User . " (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
						}
						else
						{
							$wz_id = intval($check['wz_id']);
							dbx::query("UPDATE `" . self::table_Fragebogen2User . "` SET `wz_FRAGEID` = '$wz_FRAGEID', `wz_USERID` = '$userId', `wz_DELTA` = '$delta', `wz_SUPERWICHTIG` = '$wichtig' WHERE `wz_id` = '$wz_id'");
						}
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => $delta,
								'wz_SUPERWICHTIG' => $wichtig
						);
					}
					else {
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => 0,
								'wz_SUPERWICHTIG' => 0
						);
					}
				}
				
				
				if($v['wz_NR'] == 5)
				{
					$getFrage = dbx::query("select * from " . self::table_wgTest2User . " where wz_USERID = $userId and wz_FRAGE_ID = 2");
					
					if($getFrage !== false)
					{
						$wz_FRAGEID = $v['wz_NR'];
						$antwort = $getFrage['wz_ANTWORT_BIN'];
						if($antwort == 16) $delta = 4;
						if($antwort == 17)	$delta = 2;
						if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
						
						$check = dbx::query("SELECT * FROM " . self::table_Fragebogen2User . " WHERE wz_FRAGEID = $wz_FRAGEID AND wz_USERID = $userId");
						if($check == false)
						{
							dbx::query("INSERT INTO " . self::table_Fragebogen2User . " (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
						}
						else
						{
							$wz_id = intval($check['wz_id']);
							dbx::query("UPDATE `" . self::table_Fragebogen2User . "` SET `wz_FRAGEID` = '$wz_FRAGEID', `wz_USERID` = '$userId', `wz_DELTA` = '$delta', `wz_SUPERWICHTIG` = '$wichtig' WHERE `wz_id` = '$wz_id'");
						}
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => $delta,
								'wz_SUPERWICHTIG' => $wichtig
						);
					}
					else {
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => 0,
								'wz_SUPERWICHTIG' => 0
						);
					}
				}
				
				
				if($v['wz_NR'] == 6)
				{
					$getFrage = dbx::query("select * from " . self::table_wgTest2User . " where wz_USERID = $userId and wz_FRAGE_ID = 8");
					
					if($getFrage !== false)
					{
						$wz_FRAGEID = $v['wz_NR'];
						$antwort = $getFrage['wz_ANTWORT_BIN'];
						if($antwort == 33) $delta = 1;
						if($antwort == 34) $delta = 5;
						if($antwort == 35)	$delta = 3;
						if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
						
						$check = dbx::query("SELECT * FROM " . self::table_Fragebogen2User . " WHERE wz_FRAGEID = $wz_FRAGEID AND wz_USERID = $userId");
						if($check == false)
						{
							dbx::query("INSERT INTO " . self::table_Fragebogen2User . " (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
						}
						else
						{
							$wz_id = intval($check['wz_id']);
							dbx::query("UPDATE `" . self::table_Fragebogen2User . "` SET `wz_FRAGEID` = '$wz_FRAGEID', `wz_USERID` = '$userId', `wz_DELTA` = '$delta', `wz_SUPERWICHTIG` = '$wichtig' WHERE `wz_id` = '$wz_id'");
						}
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => $delta,
								'wz_SUPERWICHTIG' => $wichtig
						);
					}
					else {
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => 0,
								'wz_SUPERWICHTIG' => 0
						);
					}
				}
				
				
				if($v['wz_NR'] == 7)
				{
					$getFrage = dbx::query("select * from " . self::table_wgTest2User . " where wz_USERID = $userId and wz_FRAGE_ID = 6");
					
					if($getFrage !== false)
					{
						$wz_FRAGEID = $v['wz_NR'];
						$antwort = $getFrage['wz_ANTWORT_BIN'];
						if($antwort == 27) $delta = 1;
						if($antwort == 28)	$delta = 2;
						if($antwort == 29) $delta = 5;
						if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
						
						$check = dbx::query("SELECT * FROM " . self::table_Fragebogen2User . " WHERE wz_FRAGEID = $wz_FRAGEID AND wz_USERID = $userId");
						if($check == false)
						{
							dbx::query("INSERT INTO " . self::table_Fragebogen2User . " (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
						}
						else
						{
							$wz_id = intval($check['wz_id']);
							dbx::query("UPDATE `" . self::table_Fragebogen2User . "` SET `wz_FRAGEID` = '$wz_FRAGEID', `wz_USERID` = '$userId', `wz_DELTA` = '$delta', `wz_SUPERWICHTIG` = '$wichtig' WHERE `wz_id` = '$wz_id'");
						}
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => $delta,
								'wz_SUPERWICHTIG' => $wichtig
						);
					}
					else {
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => 0,
								'wz_SUPERWICHTIG' => 0
						);
					}
				}
				
				
				if($v['wz_NR'] == 8)
				{
					$getFrage = dbx::query("select * from " . self::table_wgTest2User . " where wz_USERID = $userId and wz_FRAGE_ID = 13");
					
					if($getFrage !== false)
					{
						$wz_FRAGEID = $v['wz_NR'];
						$antwort = $getFrage['wz_ANTWORT_BIN'];
						if($antwort == 48) $delta = 5;
						if($antwort == 49)	$delta = 3;
						if($antwort == 50) $delta = 1;
						if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
						
						$check = dbx::query("SELECT * FROM " . self::table_Fragebogen2User . " WHERE wz_FRAGEID = $wz_FRAGEID AND wz_USERID = $userId");
						if($check == false)
						{
							dbx::query("INSERT INTO " . self::table_Fragebogen2User . " (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
						}
						else
						{
							$wz_id = intval($check['wz_id']);
							dbx::query("UPDATE `" . self::table_Fragebogen2User . "` SET `wz_FRAGEID` = '$wz_FRAGEID', `wz_USERID` = '$userId', `wz_DELTA` = '$delta', `wz_SUPERWICHTIG` = '$wichtig' WHERE `wz_id` = '$wz_id'");
						}
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => $delta,
								'wz_SUPERWICHTIG' => $wichtig
						);
					}
					else {
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => 0,
								'wz_SUPERWICHTIG' => 0
						);
					}
				}
				
				
				if($v['wz_NR'] == 9)
				{
					$getFrage = dbx::query("select * from " . self::table_wgTest2User . " where wz_USERID = $userId and wz_FRAGE_ID = 3");
					
					if($getFrage !== false)
					{
						$wz_FRAGEID = $v['wz_NR'];
						$antwort = $getFrage['wz_ANTWORT_BIN'];
						if($antwort == 18) $delta = 1;
						if($antwort == 19)	$delta = 3;
						if($antwort == 20) $delta = 5;
						if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
						
						$check = dbx::query("SELECT * FROM " . self::table_Fragebogen2User . " WHERE wz_FRAGEID = $wz_FRAGEID AND wz_USERID = $userId");
						if($check == false)
						{
							dbx::query("INSERT INTO " . self::table_Fragebogen2User . " (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
						}
						else
						{
							$wz_id = intval($check['wz_id']);
							dbx::query("UPDATE `" . self::table_Fragebogen2User . "` SET `wz_FRAGEID` = '$wz_FRAGEID', `wz_USERID` = '$userId', `wz_DELTA` = '$delta', `wz_SUPERWICHTIG` = '$wichtig' WHERE `wz_id` = '$wz_id'");
						}
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => $delta,
								'wz_SUPERWICHTIG' => $wichtig
						);
					}
					else {
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => 0,
								'wz_SUPERWICHTIG' => 0
						);
					}
				}
				
				
				if($v['wz_NR'] == 10)
				{
					$getFrage = dbx::query("select * from " . self::table_wgTest2User . " where wz_USERID = $userId and wz_FRAGE_ID = 12");
					
					if($getFrage !== false)
					{
						$wz_FRAGEID = $v['wz_NR'];
						$antwort = $getFrage['wz_ANTWORT_BIN'];
						if($antwort == 45) $delta = 3;
						if($antwort == 46)	$delta = 1;
						if($antwort == 47) $delta = 5;
						if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
						
						$check = dbx::query("SELECT * FROM " . self::table_Fragebogen2User . " WHERE wz_FRAGEID = $wz_FRAGEID AND wz_USERID = $userId");
						if($check == false)
						{
							dbx::query("INSERT INTO " . self::table_Fragebogen2User . " (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
						}
						else
						{
							$wz_id = intval($check['wz_id']);
							dbx::query("UPDATE `" . self::table_Fragebogen2User . "` SET `wz_FRAGEID` = '$wz_FRAGEID', `wz_USERID` = '$userId', `wz_DELTA` = '$delta', `wz_SUPERWICHTIG` = '$wichtig' WHERE `wz_id` = '$wz_id'");
						}
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => $delta,
								'wz_SUPERWICHTIG' => $wichtig
						);
					}
					else {
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => 0,
								'wz_SUPERWICHTIG' => 0
						);
					}
				}
				
				
				if($v['wz_NR'] == 11)
				{
					$getFrage = dbx::query("select * from " . self::table_wgTest2User . " where wz_USERID = $userId and wz_FRAGE_ID = 15");
					
					if($getFrage !== false)
					{
						$wz_FRAGEID = $v['wz_NR'];
						$antwort = $getFrage['wz_ANTWORT_BIN'];
						if($antwort == 54) $delta = 4;
						if($antwort == 55)	$delta = 2;
						if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
						
						$check = dbx::query("SELECT * FROM " . self::table_Fragebogen2User . " WHERE wz_FRAGEID = $wz_FRAGEID AND wz_USERID = $userId");
						if($check == false)
						{
							dbx::query("INSERT INTO " . self::table_Fragebogen2User . " (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
						}
						else
						{
							$wz_id = intval($check['wz_id']);
							dbx::query("UPDATE `" . self::table_Fragebogen2User . "` SET `wz_FRAGEID` = '$wz_FRAGEID', `wz_USERID` = '$userId', `wz_DELTA` = '$delta', `wz_SUPERWICHTIG` = '$wichtig' WHERE `wz_id` = '$wz_id'");
						}
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => $delta,
								'wz_SUPERWICHTIG' => $wichtig
						);
					}
					else {
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => 0,
								'wz_SUPERWICHTIG' => 0
						);
					}
				}
				
				
				if($v['wz_NR'] == 12)
				{
					$getFrage = dbx::query("select * from " . self::table_wgTest2User . " where wz_USERID = $userId and wz_FRAGE_ID = 15");
					
					if($getFrage !== false)
					{
						$wz_FRAGEID = $v['wz_NR'];
						$antwort = $getFrage['wz_ANTWORT_BIN'];
						if($antwort == 54) $delta = 4;
						if($antwort == 55)	$delta = 2;
						if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
						
						$check = dbx::query("SELECT * FROM " . self::table_Fragebogen2User . " WHERE wz_FRAGEID = $wz_FRAGEID AND wz_USERID = $userId");
						if($check == false)
						{
							dbx::query("INSERT INTO " . self::table_Fragebogen2User . " (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
						}
						else
						{
							$wz_id = intval($check['wz_id']);
							dbx::query("UPDATE `" . self::table_Fragebogen2User . "` SET `wz_FRAGEID` = '$wz_FRAGEID', `wz_USERID` = '$userId', `wz_DELTA` = '$delta', `wz_SUPERWICHTIG` = '$wichtig' WHERE `wz_id` = '$wz_id'");
						}
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => $delta,
								'wz_SUPERWICHTIG' => $wichtig
						);
					}
					else {
						$collection[$k] = array(
								'wz_FRAGEID' => $v['wz_NR'],
								'wz_USERID' => $userId,
								'wz_DELTA' => 0,
								'wz_SUPERWICHTIG' => 0
						);
					}
				}
			}
			dbx::update("UPDATE wizard_auto_707 SET wz_FRAGEN_V2 = 'Y' WHERE wz_id = $userId");
		}
		
		return $collection;
	}
	
	
/**********************************************************************************************************************************************	
	
***********************************************************************************************************************************************/	
	public static function getMappingArray($params)
	{
		$delta = 0;
		$wichtig = 0;
		
		$userId = intval($params['userId']);

		$fragen = dbx::queryAll("SELECT * FROM wizard_auto_961 WHERE wz_del = 'N' AND wz_online = 'Y' ORDER BY wz_sort ASC");
		
		$mapArr = array();
		
		foreach($fragen as $k => $v)
		{
			if($v['wz_NR'] == 1)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 1");
				
				if($getFrage !== false)
				{
					$wz_FRAGEID = $v['wz_NR'];
					$antwort = $getFrage['wz_ANTWORT_BIN'];
					if($antwort == 15) $delta = 2;
					if($antwort == 14) $delta = 3;
					if($antwort == 13) $delta = 4;
					if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
					
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => $delta,
							'wz_SUPERWICHTIG' => $wichtig
					);
				}
				else {
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => 0,
							'wz_SUPERWICHTIG' => 0
					);
				}
			}
			
			
			if($v['wz_NR'] == 2)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 16");
				
				if($getFrage !== false)
				{
					$wz_FRAGEID = $v['wz_NR'];
					$antwort = $getFrage['wz_ANTWORT_BIN'];
					if($antwort == 56) $delta = 2;
					if($antwort == 57) $delta = 4;
					if($antwort == 58) $delta = 3;
					if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
					
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => $delta,
							'wz_SUPERWICHTIG' => $wichtig
					);
				}
				else {
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => 0,
							'wz_SUPERWICHTIG' => 0
					);
				}
			}
			
			
			if($v['wz_NR'] == 3)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 11");
				
				if($getFrage !== false)
				{
					$wz_FRAGEID = $v['wz_NR'];
					$antwort = $getFrage['wz_ANTWORT_BIN'];
					if($antwort == 42) $delta = 5;
					if($antwort == 43)	$delta = 3;
					if($antwort == 44) $delta = 1;
					if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
					
					
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => $delta,
							'wz_SUPERWICHTIG' => $wichtig
					);
				}
				else {
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => 0,
							'wz_SUPERWICHTIG' => 0
					);
				}
			}
			
			
			if($v['wz_NR'] == 4)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 14");
				
				if($getFrage !== false)
				{
					$wz_FRAGEID = $v['wz_NR'];
					$antwort = $getFrage['wz_ANTWORT_BIN'];
					if($antwort == 51) $delta = 4;
					if($antwort == 52)	$delta = 2;
					if($antwort == 53) $delta = 3;
					if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
					
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => $delta,
							'wz_SUPERWICHTIG' => $wichtig
					);
				}
				else {
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => 0,
							'wz_SUPERWICHTIG' => 0
					);
				}
			}
			
			
			if($v['wz_NR'] == 5)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 2");
				
				if($getFrage !== false)
				{
					$wz_FRAGEID = $v['wz_NR'];
					$antwort = $getFrage['wz_ANTWORT_BIN'];
					if($antwort == 16) $delta = 4;
					if($antwort == 17)	$delta = 2;
					if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
					
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => $delta,
							'wz_SUPERWICHTIG' => $wichtig
					);
				}
				else {
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => 0,
							'wz_SUPERWICHTIG' => 0
					);
				}
			}
			
			
			if($v['wz_NR'] == 6)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 8");
				
				if($getFrage !== false)
				{
					$wz_FRAGEID = $v['wz_NR'];
					$antwort = $getFrage['wz_ANTWORT_BIN'];
					if($antwort == 33) $delta = 1;
					if($antwort == 34) $delta = 5;
					if($antwort == 35)	$delta = 3;
					if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
					
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => $delta,
							'wz_SUPERWICHTIG' => $wichtig
					);
				}
				else {
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => 0,
							'wz_SUPERWICHTIG' => 0
					);
				}
			}
			
			
			if($v['wz_NR'] == 7)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 6");
				
				if($getFrage !== false)
				{
					$wz_FRAGEID = $v['wz_NR'];
					$antwort = $getFrage['wz_ANTWORT_BIN'];
					if($antwort == 27) $delta = 1;
					if($antwort == 28)	$delta = 2;
					if($antwort == 29) $delta = 5;
					if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
					
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => $delta,
							'wz_SUPERWICHTIG' => $wichtig
					);
				}
				else {
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => 0,
							'wz_SUPERWICHTIG' => 0
					);
				}
			}
			
			
			if($v['wz_NR'] == 8)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 13");
				
				if($getFrage !== false)
				{
					$wz_FRAGEID = $v['wz_NR'];
					$antwort = $getFrage['wz_ANTWORT_BIN'];
					if($antwort == 48) $delta = 5;
					if($antwort == 49)	$delta = 3;
					if($antwort == 50) $delta = 1;
					if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
					
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => $delta,
							'wz_SUPERWICHTIG' => $wichtig
					);
				}
				else {
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => 0,
							'wz_SUPERWICHTIG' => 0
					);
				}
			}
			
			
			if($v['wz_NR'] == 9)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 3");
				
				if($getFrage !== false)
				{
					$wz_FRAGEID = $v['wz_NR'];
					$antwort = $getFrage['wz_ANTWORT_BIN'];
					if($antwort == 18) $delta = 1;
					if($antwort == 19)	$delta = 3;
					if($antwort == 20) $delta = 5;
					if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
					
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => $delta,
							'wz_SUPERWICHTIG' => $wichtig
					);
				}
				else {
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => 0,
							'wz_SUPERWICHTIG' => 0
					);
				}
			}
			
			
			if($v['wz_NR'] == 10)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 12");
				
				if($getFrage !== false)
				{
					$wz_FRAGEID = $v['wz_NR'];
					$antwort = $getFrage['wz_ANTWORT_BIN'];
					if($antwort == 45) $delta = 3;
					if($antwort == 46)	$delta = 1;
					if($antwort == 47) $delta = 5;
					if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
					
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => $delta,
							'wz_SUPERWICHTIG' => $wichtig
					);
				}
				else {
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => 0,
							'wz_SUPERWICHTIG' => 0
					);
				}
			}
			
			
			if($v['wz_NR'] == 11)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 15");
				
				if($getFrage !== false)
				{
					$wz_FRAGEID = $v['wz_NR'];
					$antwort = $getFrage['wz_ANTWORT_BIN'];
					if($antwort == 54) $delta = 4;
					if($antwort == 55)	$delta = 2;
					if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
					
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => $delta,
							'wz_SUPERWICHTIG' => $wichtig
					);
				}
				else {
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => 0,
							'wz_SUPERWICHTIG' => 0
					);
				}
			}
			
			
			if($v['wz_NR'] == 12)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 15");
				
				if($getFrage !== false)
				{
					$wz_FRAGEID = $v['wz_NR'];
					$antwort = $getFrage['wz_ANTWORT_BIN'];
					if($antwort == 54) $delta = 4;
					if($antwort == 55)	$delta = 2;
					if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
					
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => $delta,
							'wz_SUPERWICHTIG' => $wichtig
					);
				}
				else {
					$mapArr[$k] = array(
							'wz_FRAGEID' => $v['wz_NR'],
							'wz_USERID' => $userId,
							'wz_DELTA' => 0,
							'wz_SUPERWICHTIG' => 0
					);
				}
			}
		}
		
		return $mapArr;
	}
	
}





