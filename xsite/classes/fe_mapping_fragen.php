<?

class fe_mapping_fragen {
	
	const table_settings	 	= 'wizard_auto_964';
	
	const table_fragenAlt 		= 'wizard_auto_755';
	const table_fragenNeu 		= 'wizard_auto_961';
	
	const table_wgTest2User	 	= 'wizard_auto_765';
	const table_Fragebogen2User = 'wizard_auto_1002';
	

	
	public static function mapping_alt_neu()
	{
		$userId = '10642';
		
		$fragen = dbx::queryAll("SELECT * FROM wizard_auto_961 WHERE wz_del = 'N' AND wz_online = 'Y' ORDER BY wz_sort ASC");
		
		$delta = false;
		$wichtig = false;
		
		foreach($fragen as $k => $v)
		{
			if($v['wz_NR'] == 1)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 1");
				$antwort = $getFrage['wz_ANTWORT_BIN'];
				
				if($antwort == 15) $delta = 2;
				elseif ($antwort == 14) $delta = 3;
				elseif($antwort == 13) $delta = 4;
				
				if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
				else $wichtig = 0;
				
				$wz_FRAGEID = $v['wz_NR'];
				dbx::query("INSERT INTO wizard_auto_1002 (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
			}
			
			
			if($v['wz_NR'] == 2)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 16");
				$antwort = $getFrage['wz_ANTWORT_BIN'];
				if($antwort == 56) $delta = 2;
				elseif ($antwort == 57) $delta = 4;
				elseif($antwort == 58) $delta = 3;
				
				if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
				else $wichtig = 0;
				
				$wz_FRAGEID = $v['wz_NR'];
				dbx::query("INSERT INTO wizard_auto_1002 (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
			}
			
			
			if($v['wz_NR'] == 3)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 11");
				$antwort = $getFrage['wz_ANTWORT_BIN'];
				
				if($antwort == 42) $delta = 5;
				elseif ($antwort == 43)	$delta = 3;
				elseif($antwort == 44) $delta = 1;
				
				if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
				else $wichtig = 0;
				
				$wz_FRAGEID = $v['wz_NR'];
				dbx::query("INSERT INTO wizard_auto_1002 (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
			}
			
			
			if($v['wz_NR'] == 4)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 14");
				$antwort = $getFrage['wz_ANTWORT_BIN'];
				
				if($antwort == 51) $delta = 4;
				elseif ($antwort == 52)	$delta = 2;
				elseif($antwort == 53) $delta = 3;
				
				if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
				else $wichtig = 0;
				
				$wz_FRAGEID = $v['wz_NR'];
				dbx::query("INSERT INTO wizard_auto_1002 (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
			}
			
			
			if($v['wz_NR'] == 5)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 2");
				$antwort = $getFrage['wz_ANTWORT_BIN'];
				
				if($antwort == 16) $delta = 4;
				elseif ($antwort == 17)	$delta = 2;
				
				if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
				else $wichtig = 0;
				
				$wz_FRAGEID = $v['wz_NR'];
				dbx::query("INSERT INTO wizard_auto_1002 (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
			}
			
			
			if($v['wz_NR'] == 6)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 5");
				$antwort = $getFrage['wz_ANTWORT_BIN'];
				
				if($antwort == 24 || $antwort == 26) $delta = 4;
				elseif ($antwort == 25)	$delta = 1;
				
				if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
				else $wichtig = 0;
				
				$wz_FRAGEID = $v['wz_NR'];
				dbx::query("INSERT INTO wizard_auto_1002 (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
			}
			
			
			if($v['wz_NR'] == 7)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 6");
				$antwort = $getFrage['wz_ANTWORT_BIN'];
				
				if($antwort == 27) $delta = 1;
				elseif ($antwort == 28)	$delta = 2;
				elseif($antwort == 29) $delta = 5;
				
				if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
				else $wichtig = 0;
				
				$wz_FRAGEID = $v['wz_NR'];
				dbx::query("INSERT INTO wizard_auto_1002 (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
			}
			
			
			if($v['wz_NR'] == 8)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 13");
				$antwort = $getFrage['wz_ANTWORT_BIN'];
				
				if($antwort == 48) $delta = 5;
				elseif ($antwort == 49)	$delta = 3;
				elseif($antwort == 50) $delta = 1;
				
				if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
				else $wichtig = 0;
				
				$wz_FRAGEID = $v['wz_NR'];
				dbx::query("INSERT INTO wizard_auto_1002 (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
			}
			
			
			if($v['wz_NR'] == 9)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 3");
				$antwort = $getFrage['wz_ANTWORT_BIN'];
				
				if($antwort == 18) $delta = 1;
				elseif ($antwort == 19)	$delta = 3;
				elseif($antwort == 20) $delta = 5;
				
				if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
				else $wichtig = 0;
				
				$wz_FRAGEID = $v['wz_NR'];
				dbx::query("INSERT INTO wizard_auto_1002 (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
			}
			
			
			if($v['wz_NR'] == 10)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 12");
				$antwort = $getFrage['wz_ANTWORT_BIN'];
				
				if($antwort == 45) $delta = 3;
				elseif ($antwort == 46)	$delta = 1;
				elseif($antwort == 47) $delta = 5;
				
				if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
				else $wichtig = 0;
				
				$wz_FRAGEID = $v['wz_NR'];
				dbx::query("INSERT INTO wizard_auto_1002 (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
			}
			
			
			if($v['wz_NR'] == 11)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 15");
				$antwort = $getFrage['wz_ANTWORT_BIN'];
				
				if($antwort == 54) $delta = 4;
				elseif ($antwort == 55)	$delta = 2;
				
				if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
				else $wichtig = 0;
				
				$wz_FRAGEID = $v['wz_NR'];
				dbx::query("INSERT INTO wizard_auto_1002 (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
			}
			
			
			if($v['wz_NR'] == 12)
			{
				$getFrage = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = 15");
				$antwort = $getFrage['wz_ANTWORT_BIN'];
				
				if($antwort == 54) $delta = 4;
				elseif ($antwort == 55)	$delta = 2;
				
				if($getFrage['wz_ANTWORT_WICHTIG'] > 2) $wichtig = 1;
				else $wichtig = 0;
				
				$wz_FRAGEID = $v['wz_NR'];
				dbx::query("INSERT INTO wizard_auto_1002 (wz_FRAGEID, wz_USERID, wz_DELTA, wz_SUPERWICHTIG) VALUES ($wz_FRAGEID, $userId, $delta, $wichtig)");
			}
		}
		
		dbx::update("UPDATE wizard_auto_707 SET wz_FRAGEN_V2 = 'Y' WHERE wz_id = $userId");
	}
	
}

