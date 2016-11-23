<?

class fe_matching
{


	public static function ajax_testMatch()
	{

		$id1	= intval($_REQUEST['id1']);
		$id2	= intval($_REQUEST['id2']);

		if ($id1 == 0) die("please provide id1 param");
		if ($id2 == 0) die("please provide id2 param");

		$result = self::matchUsers($id1,$id2, false, true);

		print_r($result);
		die('end of ajax_testMatch');

		// return $result; // wozu? ist eh die() drin
	}


	public static function ajax_testMatchRoom()
	{

		$id1	= intval($_REQUEST['id1']);
		$id2	= intval($_REQUEST['id2']);

		if ($id1 == 0) die("please provide id1 = user param");
		if ($id2 == 0) die("please provide id2 = room param");

		$result = self::matchUser2Room($id1,$id2, false, true);




		print_r($result);
		die('end of ajax_testMatchRoom');
	}


	public static function buildAnswersArrayByCat($data)
	{
		$ret = array();
		foreach ($data as $frage) {
			$kat = $frage['wz_KATEGORIE'];
			if (!isset($ret[$kat])) {
				$ret[$kat] = array();
			}
			$ret[$kat][$frage['wz_FRAGE_ID']] = $frage;
		}
		return $ret;
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


		$fragen1_by_cat = self::buildAnswersArrayByCat($userId1Answers);
		$fragen2_by_cat = self::buildAnswersArrayByCat($userId2Answers);

		// check if at least 1 question is answered by both users in this category (WEB-288)
		// use 2-3-4 to avoid naming shizzle..

		$have_kat_2 = false;
		$have_kat_3 = false;
		$have_kat_4 = false;
		foreach ($fragen1_by_cat as $katId => $answers)
		{
			$varname = 'have_kat_'.$katId;
			foreach ($answers as $answer)
			{
				if (isset($fragen2_by_cat[$katId][$answer['wz_FRAGE_ID']]))
				{
					$$varname = true;
					break; // kat abgearbeitet
				}
			}
		}

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
			$corrKatId		= $katId+1;
			$matchKategorien[$katId] = round(100 * $pointsTotalKategorie[$corrKatId] / $pointsTotalKategoriePossible[$corrKatId], 0);

			$varname = 'have_kat_'.$corrKatId;
			if ($$varname === false)
			{
				$matchKategorien[$katId] = -1;
			}
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
			self::matchUser2Room($userId, $roomId, false, true);
		}

		return true;
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
			self::matchUsers($userId, $fUserId, false, true);
		}

		return true;
	}

    /*
    public static function matchRoom2AllUsers($roomId)
    {

    }
    */

	public static function getMatchResultFromDbUser2Room($userId, $roomId)
	{
		$userId		= intval($userId);
		$roomId 	= intval($roomId);

		if ($userId == 0 || $roomId == 0) return false;
		$res 		= self::matchUser2Room($userId, $roomId, true);

		return $res;
	}


	public static function matchUser2Room($userId1, $roomId, $justReturnPresent=false,$forceRecalculate=false)
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
			$roomResults[] 	= self::matchUsers($userId1, $userId2, $justReturnPresent);
		}

		$resultTotal 			= 0;
		$resultTotal_kat_1 		= 0;
		$resultTotal_kat_2 		= 0;
		$resultTotal_kat_3 		= 0;

		if ($justReturnPresent === true)
		{
			$resultTotalDb = dbx::query("select * from wizard_auto_844 where wz_USERID = $userId1 and wz_ROOMID = $roomId");
			if ($resultTotalDb === false)
			{
				$resultRoom 		= 0;
				$resultRoom_kat_1 	= 0;
				$resultRoom_kat_2 	= 0;
				$resultRoom_kat_3 	= 0;
			}
			else
			{
				$resultRoom 		= intval($resultTotalDb['wz_RESULT']);
				$resultRoom_kat_1 	= intval($resultTotalDb['wz_RESULT_KAT_1']);
				$resultRoom_kat_2 	= intval($resultTotalDb['wz_RESULT_KAT_2']);
				$resultRoom_kat_3 	= intval($resultTotalDb['wz_RESULT_KAT_1']);
			}
		}
		else
		{
			foreach ($roomResults as $k => $v) {
				$resultTotal 			+= intval($v['matchGesamt']);
				$resultTotal_kat_1 		+= intval($v['matchKategorien'][1]);
				$resultTotal_kat_2 		+= intval($v['matchKategorien'][2]);
				$resultTotal_kat_3 		+= intval($v['matchKategorien'][3]);
			}

			$resultRoom			= ceil($resultTotal / $bewohnerAnzahl);
			$resultTotal_kat_1 	= ceil($resultTotal_kat_1 / $bewohnerAnzahl);
			$resultTotal_kat_2 	= ceil($resultTotal_kat_2 / $bewohnerAnzahl);
			$resultTotal_kat_3 	= ceil($resultTotal_kat_3 / $bewohnerAnzahl);
		}




		$sortedResults = $roomResults;

		/*
		usort($sortedResults, function($a, $b) {
		    return intval($b['matchGesamt']) - intval($a['matchGesamt']);
		});
		*/

		$matchKategorien		= array(
			'1' => $resultTotal_kat_1,
			'2' => $resultTotal_kat_2,
			'3' => $resultTotal_kat_3
		);

		$resultRoomArr			= array(
			'matchGesamt' 			=> $resultRoom,
			'matchKategorien'		=> $matchKategorien
		);


		if ($_REQUEST['debug'] == 1)
		{
			if ($resultRoom == 0) {
				$resultRoomArr['matchGesamt'] = '?';
				$resultRoomArr['matchKategorien'] = '?';
			}
		}







		if ($justReturnPresent == false && $forceRecalculate == true)
		{
			self::setMatchingResultRoom($userId1, $roomId, $resultRoomArr);
		}


		$ret = array(
			'MATCHROOM' 		=> $resultRoomArr,
			'MATCHUSERS'		=> $sortedResults
		);

		return $ret;

	}


	public static function matchUsers($userId1, $userId2, $justReturnPresent=false, $forceRecalculate=false)
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

		if (($present != false || $justReturnPresent === true) && $forceRecalculate == false)
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

			if ($matchA['matchKategorien'][$katId] == -1)
			{
				$matchKategorien[$katId] = -1;
			}
		}

		$userId1			= intval($matchA['userId1']);
		$userId2			= intval($matchA['userId2']);

		$result	= array(
			'matchGesamt' 						=> $matchGesamt,
			'matchKategorien'					=> $matchKategorien
		);

		$setMatchResultReturn = self::setMatchingResult($userId1, $userId2, $result);

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


		// bei ? nix inserten!
		if ($result['matchGesamt'] != '?') {
			$matchGesamt 	= floatval($result['matchGesamt']);

			$matchKat_1 	= floatval($result['matchKategorien'][1]);
			$matchKat_2 	= floatval($result['matchKategorien'][2]);
			$matchKat_3 	= floatval($result['matchKategorien'][3]);
			dbx::insert("wizard_auto_844", array('wz_USERID' => $userId1, 'wz_ROOMID' => $userId2, 'wz_RESULT' => $matchGesamt, 'wz_RESULT_KAT_1' => $matchKat_1, 'wz_RESULT_KAT_2' => $matchKat_2, 'wz_RESULT_KAT_3' => $matchKat_3));
		}


		return true;

	}


	public static function checkMatchingResultPresent($userId1, $userId2)
	{
		$userId1	= intval($userId1);
		$userId2	= intval($userId2);

		if ($userId1 == 0 || $userId2 == 0) return false;

		$present 	= dbx::query("select *, CONCAT('xxxxx') as MARKER_ML from wizard_auto_773 where (wz_USERID1 = $userId1 AND wz_USERID2 = $userId2) OR (wz_USERID1 = $userId2 AND wz_USERID2 = $userId1)");

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


        // DANKE JULIAN......... Wenn ich noch nie gematcht worden bin und es keine Matching Results
        // von mir gibt, lande ich in return false und werde NIEMALS JEMALS EVER gemacht - SUPER DANKE
        // written Friday, 27/11/2015 21:45 @ home!
        /*
		$present 	= dbx::query("select * from wizard_auto_773 where (wz_USERID1 = $userId OR wz_USERID2 = $userId)");

		if ($present === false) return false;
		*/


        // clear user match results
		dbx::query("delete from wizard_auto_773 where (wz_USERID1 = $userId OR wz_USERID2 = $userId)");
		// clear matching results room
      dbx::query("delete from wizard_auto_844 where wz_USERID = $userId");

		// insert in matching todo for cron
		dbx::insert("wizard_auto_845", array('wz_USERID' => $userId, 'wz_STATUS' => 'TODO'));

		// get rooms of admin user, insert each into cron
		$rooms = dbx::queryAll("SELECT * FROM wizard_auto_809 WHERE wz_ADMIN = $userId AND wz_del = 'N' AND wz_ACTIVE != 'N' AND wz_USERDEL != 'Y' AND wz_online = 'Y'");
		foreach ($rooms as $r)
		{
			if (intval($r['wz_id']) == 0) continue;
			dbx::insert('wizard_auto_853', array('wz_ROOMID' => $r['wz_id'], 'wz_STATUS' => 'TODO'));
		}

		return true;
	}


// sofort matchen wenn wg-test frage beantwortet wurde
	public static function doInstantMatching()
	{
		$matchDone = false;

		if($matchDone == false)
		{
			exec('php /srv/gitgo_daten/www/wsfbeta.xgodev.com/web/datamigration/cronjob_matching.php',$out);
			if($out != '' || $out !== false || $out != null)
			{
				$matchDone = true;
				return true;
			}
			else
			{
				return false;
			}
		}
	}



   public static function matchRoom2AllUsers($roomId)
    {
        $roomId = intval($roomId);
        if ($roomId == 0) return false;
        // userliste holen...
        $users = dbx::queryAll("SELECT wz_id FROM wizard_auto_707 WHERE wz_del = 'N' ");
        foreach ($users as $u)
        {
            self::matchUser2Room($u['wz_id'], $roomId, false, true);
            echo "matching user " . $u['wz_id'] . " to room $roomId    \r";
        }
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
			$staerke = 'no_match';
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

			if ($result['matchKategorien'][$kat-1] == -1)
			{
				$staerke = 'no_match';
			}

			else if ($result['matchKategorien'][$kat-1] > $grenzen['MITTEL'] && $result['matchKategorien'][$kat-1] < $grenzen['STARK'])
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
		// falsche node war selektiert!!!!!
		$result = $result['MATCHROOM'];

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

			if ($result['matchKategorien'][$kat-1] == -1)
			{
				$staerke = 'no_match';
			}

			else if ($result['matchKategorien'][$kat-1] > $grenzen['MITTEL'] && $result['matchKategorien'][$kat-1] < $grenzen['STARK'])
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

	public static function sc_checkIfCurrentUserIsInMatchingToDoTable($params)
	{
		$userId	= xredaktor_feUser::getUserId();
		return self::checkIfUserIsInMatchingToDoTable($userId);
	}


	public static function checkIfUserIsInMatchingToDoTable($userId)
	{
		$userId = intval($userId);
		if ($userId == 0) return false;

		$exists = dbx::queryAll("SELECT * FROM wizard_auto_845 WHERE wz_USERID = $userId AND wz_STATUS != 'DONE' ");
		if ($exists !== false) {
			return true;
		}
		return false;
	}

	public static function checkIfUserHasAnyQuestionAnswered($userId)
	{
		$userId = intval($userId);
		if ($userId == 0) return false;

		$exists = dbx::queryAll("SELECT * FROM wizard_auto_765 WHERE wz_USERID = $userId ");
		if ($exists !== false) {
			return true;
		}
		return false;

	}

	public static function sc_checkIfUserHasAnyQuestionAnswered($params)
	{
		$userId	= xredaktor_feUser::getUserId();
		return self::checkIfUserHasAnyQuestionAnswered($userId);
	}


	/*
	public static function checkIfUserHasAnsweredAllQuestions($userId)
	{
		$userId = intval($userId);
		if ($userId == 0) return false;

		$state = null;
		echo $state;

		if(fe_wgtest::answeredQuestionsState($userId) == 1){
			$state = 1;
			echo $state;
			return true;
		}
		else
		{
			$state = 0;
			echo $state;
			return false;
		}


	}

	public static function sc_checkIfUserHasAnsweredAllQuestions($params)
	{
		$userId	= xredaktor_feUser::getUserId();
		return self::checkIfUserHasAnsweredAllQuestions($userId);
	}

	*/




}
