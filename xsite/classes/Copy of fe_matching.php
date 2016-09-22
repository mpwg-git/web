<?

class fe_matching
{
	
	
	public static function ajax_testMatch()
	{
		
		$id1	= intval($_REQUEST['id1']);
		$id2	= intval($_REQUEST['id2']);
		
		if ($id1 == 0) die("please provide id1 param");
		if ($id2 == 0) die("please provide id2 param");
		
		$result = self::matchUsers($id1,$id2);
		
		die(" ".print_r($result));
		
		return $result;
	}
	
	
	public static function ajax_testMatchRoom()
	{
		
		$id1	= intval($_REQUEST['id1']);
		$id2	= intval($_REQUEST['id2']);
		
		if ($id1 == 0) die("please provide id1 = user param");
		if ($id2 == 0) die("please provide id2 = room param");
		
		$result = self::matchUser2Room($id1,$id2);
		
		die(" ".print_r($result));
		
	}
	
	
	public static function doMatch($userId1, $userId2)
	{
		
		$userId1 	= intval($userId1);
		$userId2 	= intval($userId2);
		
		if ($userId1 == 0 || $userId1 == 0) return false;
		
		$result					= 0;
		
		$gewichtungDb			= dbx::query("select * from wizard_auto_771 where wz_online = 'Y' and wz_del = 'N' order by wz_id desc limit 1");
		$gewichtung 			= array($gewichtungDb['wz_GEWICHTUNG_1'], $gewichtungDb['wz_GEWICHTUNG_2'], $gewichtungDb['wz_GEWICHTUNG_3'], $gewichtungDb['wz_GEWICHTUNG_4']);
		
		$kategorien				= dbx::queryAll("select wz_id from wizard_auto_772 where wz_online = 'Y' and wz_del = 'N' order by wz_id asc");
		
		$pointsTotal 			= 0;
		$pointsTotalPossible	= 0;
		
		$pointsTotalKategorie			= array();
		$pointsTotalKategoriePossible	= array();
		
		
		$userId1Answers		= dbx::queryAll("select wz_FRAGE_ID, wz_USERID, wz_ANTWORT_BIN, wz_ANTWORT_SUCHE, wz_ANTWORT_WICHTIG, wz_KATEGORIE from wizard_auto_765 as ergebnis, wizard_auto_755 as frage where frage.wz_id = ergebnis.wz_FRAGE_ID and wz_USERID = $userId1 order by wz_FRAGE_ID ASC");
		$userId2Answers		= dbx::queryAll("select wz_FRAGE_ID, wz_USERID, wz_ANTWORT_BIN, wz_ANTWORT_SUCHE, wz_ANTWORT_WICHTIG, wz_KATEGORIE from wizard_auto_765 as ergebnis, wizard_auto_755 as frage where frage.wz_id = ergebnis.wz_FRAGE_ID and wz_USERID = $userId2 order by wz_FRAGE_ID ASC");
		
		$fragen1			= self::buildAnswersArray($userId1Answers);
		$fragen2			= self::buildAnswersArray($userId2Answers);
		
		foreach ($fragen1 as $k => $v) 
		{
			// if question not answered on 1 of the profiles
			if (!$fragen2[$k]) 
			{
				continue;
			}
			
			$pointsTotalPossible 								+= $gewichtung[$v['wz_ANTWORT_WICHTIG']];
			$pointsTotalKategoriePossible[$v['wz_KATEGORIE']] 	+= $gewichtung[$v['wz_ANTWORT_WICHTIG']];
			
			if ($v['wz_ANTWORT_SUCHE'] == $fragen2[$k]['wz_ANTWORT_BIN'])
			{
				$pointsTotal									+= $gewichtung[$v['wz_ANTWORT_WICHTIG']];
				$pointsTotalKategorie[$v['wz_KATEGORIE']] 		+= $gewichtung[$v['wz_ANTWORT_WICHTIG']];
			}
		}
		
		$matchGesamt 		= 0;
		$matchKategorien	= array();
		
		$matchGesamt		= round(100 * $pointsTotal / $pointsTotalPossible, 0);
		
		foreach ($kategorien as $k => $v) {
			$katId			= $v['wz_id'];
			$matchKategorien[$katId] = round(100 * $pointsTotalKategorie[$katId] / $pointsTotalKategoriePossible[$katId], 0);
		}
		
		$result	= array(
			'userId1'				=> $userId1,
			'userId2'				=> $userId2,
			'matchGesamt' 			=> $matchGesamt, 
			'matchKategorien'		=> $matchKategorien
		);
		
		return $result;
	}	


	public static function matchUser2AllRooms($userId)
	{
		
		$userId = intval($userId);
		
		dbx::query("delete from wizard_auto_844 where wz_USERID = $userId");
		
		$rooms = dbx::queryAll("select * from wizard_auto_809 where wz_del='N'");
		
		foreach ($rooms as $k => $v) 
		{
			$roomId = intval($v['wz_id']);	
			
			echo "\r matching user $userId => room $roomId ";
			self::matchUser2Room($userId, $roomId);
		}
		
		return "done";		
	}
	
	
	public static function matchUser2AllUsers($userId)
	{
		
		$userId = intval($userId);
		
		dbx::query("delete from wizard_auto_773 where wz_USERID1 = $userId");
		
		$users = dbx::queryAll("select * from wizard_auto_707 where wz_id != $userId and wz_del='N'");
		
		foreach ($users as $k => $v) 
		{
			$fUserId = intval($v['wz_id']);	
			echo "\r matching user $userId => user $fUserId ";
			self::matchUsers($userId, $fUserId);
		}
		
		return "done";		
	}
	
	
	public static function getMatchResultFromDbUser2Room($userId, $roomId)
	{
		$userId		= intval($userId);
		$roomId 	= intval($roomId); 
		
		if ($userId == 0 || $roomId == 0) return false;
		
		$res 		= self::matchUser2Room($userId, $roomId);
		
		return $res;
	}


	public static function matchUser2Room($userId1, $roomId)
	{
		$userId1	= intval($userId1);
		$roomId 	= intval($roomId); 
		
		if ($userId1 == 0 || $roomId == 0) return false;
		
		$bewohner 		= fe_user::getUsersByRoomId($roomId);
		$bewohnerAnzahl = count($bewohner);
		
		$roomResults	= array();
		
		foreach ($bewohner as $k => $v) 
		{
			$userId2 		= intval($v);
			$roomResults[] 	= self::matchUsers($userId1, $userId2);
		}
		
		$resultTotal 		= 0;
		
		foreach ($roomResults as $k => $v) {
			$resultTotal 	+= intval($v['matchGesamt']);
		}
		
		$resultRoom			= ceil($resultTotal / $bewohnerAnzahl);
		
		
		$sortedResults = $roomResults;
		
		/*
		usort($sortedResults, function($a, $b) {
		    return intval($b['matchGesamt']) - intval($a['matchGesamt']);
		});
		*/
		
		$resultRoomArr			= array('matchGesamt' => $resultRoom);
		
		//self::setMatchingResultRoom($userId1, $roomId, $resultRoomArr);
		
		$ret = array(
			'MATCHROOM' 		=> $resultRoomArr,
			'MATCHUSERS'		=> $sortedResults
		);
		
		return $ret;
		
	}


	public static function matchUsers($userId1, $userId2, $justReturnPresent=false)
	{
		
		$userId1 	= intval($userId1);
		$userId2 	= intval($userId2);
		
		if ($userId1 == 0 || $userId1 == 0) return false;
		
		$noneAnswered = self::checkNotAnsweredAnyQuestions($userId2);
		
		// if other user has answered questions, check if MySelf has too
		if ($noneAnswered == false)
		{
			$noneAnswered = self::checkNotAnsweredAnyQuestions($userId1);
		}
		
		if ($noneAnswered == true)
		{
			return self::returnDefaultNoneAnsweredResult();
		}
		
		$present	= self::checkMatchingResultPresent($userId1, $userId2);
		
		if ($present != false || $justReturnPresent === true)
		{
			return $present;
		}
		
		$matchA		= self::doMatch($userId1, $userId2);
		$matchB		= self::doMatch($userId2, $userId1);
		
		return self::combineMatch($matchA, $matchB);
	}
	
	public static function checkNotAnsweredAnyQuestions($userId)
	{
	
		$userId = intval($userId);
		if ($userId === false) return false;
		
		$answersPresent		= dbx::queryAll("select wz_FRAGE_ID, wz_USERID, wz_ANTWORT_BIN, wz_ANTWORT_SUCHE, wz_ANTWORT_WICHTIG, wz_KATEGORIE from wizard_auto_765 as ergebnis, wizard_auto_755 as frage where frage.wz_id = ergebnis.wz_FRAGE_ID and wz_USERID = $userId order by wz_FRAGE_ID ASC");
		
		if ($answersPresent === false) return true;
	
		return false;
	}
	
	
	public static function returnDefaultNoneAnsweredResult()
	{
		$result	= array(
			'matchGesamt' 						=> '?', 
			'matchKategorien'					=> '?'
		);
		
		return $result;
	}
	
	
	public static function combineMatch($matchA, $matchB)
	{
		$kategorien				= dbx::queryAll("select wz_id from wizard_auto_772 where wz_online = 'Y' and wz_del = 'N' order by wz_id asc");
			
		$matchGesamt 		= 0;
		$matchKategorien	= array();
		
		// geometrisches Mittel  errechnen
		$matchGesamt		= intval(round(sqrt($matchA['matchGesamt'] * $matchB['matchGesamt']),0));
		
		foreach ($kategorien as $k => $v) {
			$katId						= $v['wz_id'];
			$matchKategorien[$katId]	= intval(round(sqrt($matchA['matchKategorien'][$katId] * $matchB['matchKategorien'][$katId]),0));
		}
		
		$userId1			= intval($matchA['userId1']);
		$userId2			= intval($matchA['userId2']);
		
		$result	= array(
			'matchGesamt' 						=> $matchGesamt, 
			'matchKategorien'					=> $matchKategorien
		);
		
		self::setMatchingResult($userId1, $userId2, $result);
		
		return $result;
	}
	
	public static function setMatchingResult($userId1, $userId2, $result)
	{
		$userId1	= intval($userId1);
		$userId2	= intval($userId2);
		
		if ($userId1 == 0 || $userId2 == 0) return false;
		
		$present 			= self::checkMatchingResultPresent($userId1, $userId2);
		
		if ($present != false)
		{
			dbx::query("delete from wizard_auto_773 where (wz_USERID1 = $userId1 AND wz_USERID2 = $userId2) OR (wz_USERID1 = $userId2 AND wz_USERID2 = $userId1)");
		}
		
		$matchGesamt 	= floatval($result['matchGesamt']);
		$matchKat1 		= floatval($result['matchKategorien'][1]);
		$matchKat2 		= floatval($result['matchKategorien'][2]);
		$matchKat3 		= floatval($result['matchKategorien'][3]);
		
		dbx::insert("wizard_auto_773", array('wz_USERID1' => $userId1, 'wz_USERID2' => $userId2, 'wz_RESULT' => $matchGesamt, 'wz_RESULT_KAT_1' => $matchKat1, 'wz_RESULT_KAT_2' => $matchKat2, 'wz_RESULT_KAT_3' => $matchKat3));
		dbx::insert("wizard_auto_773", array('wz_USERID1' => $userId2, 'wz_USERID2' => $userId1, 'wz_RESULT' => $matchGesamt, 'wz_RESULT_KAT_1' => $matchKat1, 'wz_RESULT_KAT_2' => $matchKat2, 'wz_RESULT_KAT_3' => $matchKat3));
		
		return true;
		
	}

	public static function setMatchingResultRoom($userId1, $userId2, $result)
	{
		$userId1	= intval($userId1);
		$userId2	= intval($userId2);
		
		if ($userId1 == 0 || $userId2 == 0) return false;
		
		$present 			= self::checkMatchingResultPresentRoom($userId1, $userId2);
		
		if ($present != false)
		{
			dbx::query("delete from wizard_auto_844 where (wz_USERID = $userId1 AND wz_ROOMID = $userId2)");
		}
		
		$matchGesamt 	= floatval($result['matchGesamt']);
		
		dbx::insert("wizard_auto_844", array('wz_USERID' => $userId1, 'wz_ROOMID' => $userId2, 'wz_RESULT' => $matchGesamt));
		
		return true;
		
	}
	
	
	public static function checkMatchingResultPresent($userId1, $userId2)
	{
		$userId1	= intval($userId1);
		$userId2	= intval($userId2);
		
		if ($userId1 == 0 || $userId2 == 0) return false;
		
		$present 	= dbx::query("select * from wizard_auto_773 where (wz_USERID1 = $userId1 AND wz_USERID2 = $userId2) OR (wz_USERID1 = $userId2 AND wz_USERID2 = $userId1)");
		
		if ($present === false) return false;
		
		$matchGesamt 		= $present['wz_RESULT'];
		$matchKategorien	= array(
			'1'		=> $present['wz_RESULT_KAT_1'],
			'2'		=> $present['wz_RESULT_KAT_2'],
			'3'		=> $present['wz_RESULT_KAT_3']
		);
		
		$result	= array(
			'matchGesamt' 						=> $matchGesamt, 
			'matchKategorien'					=> $matchKategorien
		);
		
		return $result;
	}

	public static function clearMatchingResults($userId)
	{
		
		$userId	= intval($userId);
		
		if ($userId == 0) return false;
		
		$present 	= dbx::query("select * from wizard_auto_773 where (wz_USERID1 = $userId OR wz_USERID2 = $userId)");
		
		if ($present === false) return false;
		
		dbx::query("delete from wizard_auto_773 where (wz_USERID1 = $userId OR wz_USERID2 = $userId)");
		dbx::query("delete from wizard_auto_844 where wz_USERID = $userId");
		
		// insert in matching todo for cron
		dbx::insert("wizard_auto_845", array('wz_USERID' => $userId, 'wz_STATUS' => 'TODO'));
		
		
		return true;
	}
	
	public static function checkMatchingResultPresentRoom($userId1, $roomId)
	{
		$userId1	= intval($userId1);
		$roomId		= intval($roomId);
		
		if ($userId1 == 0 || $roomId == 0) return false;
		
		$present 	= dbx::query("select * from wizard_auto_844 where (wz_USERID = $userId1 AND wz_ROOMID = $roomId)");
		
		if ($present === false) return false;
		
		$matchGesamt 		= $present['wz_RESULT'];
				
		$result	= array(
			'matchGesamt' 						=> $matchGesamt, 
		);
		
		return $result;
	}

	
	
	
	public static function selfNotAnsweredAnyQuestions()
	{
		$userId 	= intval(xredaktor_feUser::getUserId());
		
		$present 	= dbx::query("select * from wizard_auto_765 where wz_USERID = $userId");
		
		if ($present === false)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	public static function getMatchingGrenzen()
	{
		
		$matchingSettings = dbx::query("select * from wizard_auto_771 where wz_del = 'N' order by wz_id DESC LIMIT 1");
		
		return array(
			'MITTEL' 	=> $matchingSettings['wz_GRENZE_MITTEL'],
			'STARK'		=> $matchingSettings['wz_GRENZE_STARK']
		);
		
	}
	
	
	public static function getMatchTextByResult($result)
	{
		
		$lng 				= xredaktor_pages::getFrontEndLang();
		$lngPref			= '_'.strtoupper($lng).'_';	
			
		$staerke 	= 'stark';
		
		$grenzen = self::getMatchingGrenzen();
		
		if (self::selfNotAnsweredAnyQuestions())
		{
			$retText = xredaktor_render::renderSoloAtom(795);
			return array(
				'GESAMT' => $retText 
			);
		}
		else if ($result['matchGesamt'] == '?')
		{
			$retText = xredaktor_render::renderSoloAtom(796);
			return array(
				'GESAMT' => $retText 
			);
		}
		else if ($result['matchGesamt'] > $grenzen['MITTEL'] && $result['matchGesamt'] < $grenzen['STARK'])
		{
			$staerke = 'mittel';
		}
		else if($result['matchGesamt'] < $grenzen['MITTEL'])
		{
			$staerke = 'schwach';
		}
		
		
		$textGesamtKomplett = dbx::query("select * from wizard_auto_775 where wz_KATEGORIE = 1 and wz_STAERKE = '$staerke' ORDER BY RAND() LIMIT 1");
		
		$textGesamt			= $textGesamtKomplett[$lngPref.'wz_TEXT'];
		
		$kategorien			= dbx::queryAll("select * from wizard_auto_776 where wz_del = 'N' and wz_id > 1");
		$texteKategorien 	= array();
		
		foreach ($kategorien as $k => $v) {
			$kat = intval($v['wz_id']);
			
			$staerke 	= 'stark';
			
			if ($result['matchKategorien'][$kat-1] > $grenzen['MITTEL'] && $result['matchKategorien'][$kat-1] < $grenzen['STARK'])
			{
				$staerke = 'mittel';
			}
			else if($result['matchKategorien'][$kat-1] < $grenzen['MITTEL'])
			{
				$staerke = 'schwach';
			}
			
			$texteKategorienKomplett = dbx::query("select * from wizard_auto_775 where wz_KATEGORIE = $kat and wz_STAERKE = '$staerke' ORDER BY RAND() LIMIT 1");
			$texteKategorien[$kat]	 = $texteKategorienKomplett[$lngPref.'wz_TEXT'];
		}
		
		$kategorienBlock  		= '';
		
		if (count($texteKategorien) > 0)
		{
			$kategorienBlock 		= implode("<br>", $texteKategorien);	
		}
		
		$ret = array(
			'GESAMT' 			=> $textGesamt,
			'KATEGORIEN'		=> $texteKategorien,
			'KATEGORIENBLOCK'	=> $kategorienBlock
		);
		
		return $ret;
	}


	public static function getMatchTextByRoomResult($result)
	{
		$lng 				= xredaktor_pages::getFrontEndLang();
		$lngPref			= '_'.strtoupper($lng).'_';	
		
		$grenzen = self::getMatchingGrenzen();
			
		$staerke 	= 'stark';
		
		if (self::selfNotAnsweredAnyQuestions())
		{
			$retText = xredaktor_render::renderSoloAtom(795);
			return array(
				'GESAMT' => $retText 
			);
		}
		else if ($result['matchGesamt'] == '?')
		{
			$retText = xredaktor_render::renderSoloAtom(796);
			return array(
				'GESAMT' => $retText 
			);
		}
		else if ($result['matchGesamt'] > $grenzen['MITTEL'] && $result['matchGesamt'] < $grenzen['STARK'])
		{
			$staerke = 'mittel';
		}
		else if($result['matchGesamt'] < $grenzen['MITTEL'])
		{
			$staerke = 'schwach';
		}
		
		$textGesamtKomplett = dbx::query("select * from wizard_auto_775 where wz_KATEGORIE = 1 and wz_STAERKE = '$staerke' ORDER BY RAND() LIMIT 1");
		$textGesamt			= $textGesamtKomplett[$lngPref.'wz_TEXT'];
		
		
		$kategorien			= dbx::queryAll("select * from wizard_auto_776 where wz_del = 'N' and wz_id > 1");
		$texteKategorien 	= array();
		
		foreach ($kategorien as $k => $v) {
			$kat = intval($v['wz_id']);
			
			$staerke 	= 'stark';
			
			if ($result['matchKategorien'][$kat-1] > $grenzen['MITTEL'] && $result['matchKategorien'][$kat-1] < $grenzen['STARK'])
			{
				$staerke = 'mittel';
			}
			else if($result['matchKategorien'][$kat-1] < $grenzen['MITTEL'])
			{
				$staerke = 'schwach';
			}
			
			//$texteKategorien[$kat] = dbx::queryAttribute("select * from wizard_auto_775 where wz_KATEGORIE = $kat and wz_STAERKE = '$staerke' ORDER BY RAND() LIMIT 1", 'wz_TEXT');
			$texteKategorienKomplett = dbx::query("select * from wizard_auto_775 where wz_KATEGORIE = $kat and wz_STAERKE = '$staerke' ORDER BY RAND() LIMIT 1");
			$texteKategorien[$kat]	 = $texteKategorienKomplett[$lngPref.'wz_TEXT'];
		}
		
		$kategorienBlock  		= '';
		
		if (count($texteKategorien) > 0)
		{
			$kategorienBlock 		= implode(" ", $texteKategorien);	
		}
		
		return array(
			'GESAMT' 			=> $textGesamt,
			'KATEGORIEN'		=> $texteKategorien,
			'KATEGORIENBLOCK'	=> $kategorienBlock
		);
	}
	
	public static function buildAnswersArray($data)
	{
		$fragen 	= array();
		
		foreach ($data as $k => $v) 
		{
			$fragen[$v['wz_FRAGE_ID']] = $v;
		}
		
		return $fragen;
	}
	
	
}