<?

class fe_search
{

	public static function ajax_getStartResults()
	{

		$html = "";

		$results					= dbx::queryAll("select * from wizard_auto_707 where wz_del = 'N' and wz_PROFILBILD > 0 ORDER BY RAND() LIMIT 9");

		$resultsHtml				= array();

		$a_id_result_single		 	= 807;

		foreach ($results as $k => $v)
		{
			$assign		= array(
				'IMG' 					=> $v['wz_PROFILBILD'],
			);

			$resultsHtml[] 				= xredaktor_render::renderSoloAtom($a_id_result_single, array('data' => $assign));
		}

		$resultsCount	= count($resultsHtml);

		if ($resultsCount > 0)
		{
			$html 	= implode("", $resultsHtml);
		}

		frontcontrollerx::json_success(array('html' => $html));

	}


	public static function ajax_getResults()
	{
		session_start();

		$a_id_no_results			= 749;
		$filter						= false;
		$searchData					= array();
		$userId						= xredaktor_feUser::getUserId();

		$returnJson					= false;
		$showAll						= false;
		$userId						= intval(xredaktor_feUser::getUserId());

		$type							= "biete";

		$offset						= intval($_REQUEST['offset']);

		if ($_REQUEST['returnJson'] == 1)
		{
			$returnJson = true;
		}

		if ($_REQUEST['showAll'] == 1)
		{
			$showAll = true;
		}


		// ist das ein default search? Wenn ja, Daten aus Userdaten holen
		if(intval($_REQUEST['p_id']) == 11 && intval($_REQUEST['xr_face']) == 1)
		{
			// write to session
			$reqSearch = $_REQUEST['searchData'];
			$_SESSION['wsf_searchrequest_backup'] = $reqSearch;
		}
		// suchergebnisseite
		elseif(intval($_REQUEST['p_id']) == 17 && intval($_REQUEST['xr_face']) == 1)
		{
			// read from session
			$reqSearch = $_SESSION['wsf_searchrequest_backup'];
		}
		else
		{
			$reqSearch = $_REQUEST['searchData'];
		}

		$toSearch  = json_decode($reqSearch, true);


		// mobile: fav / block in request overrult immer
		if(intval($_REQUEST['p_id']) == 17 && intval($_REQUEST['xr_face']) == 1 ) {
			$tmp = json_decode($_REQUEST['searchData'], true);
			if ($tmp['filter'] != '') {
				$toSearch['filter'] = $tmp['filter'];
			}
		}

		// filter wegsaven geht irgendwo verloren...
		$trueFilter = $toSearch['filter'];

		// searchtype...
		$trueType = $toSearch['type'];

		// anbieter bekommen standardmäßig natürlich mitbewohner angezeigt
		// im template hats gepasst ("mitbewohner" = active) aber suchergebnisse zeigen bisher nur räume
		// this is the fix:
		$type = $toSearch['type'];
		if (trim($type) == '') {
			$xtype = fe_user::getUserType($userId);
			if ($xtype == 'biete') $type = 'biete';
			else if ($xtype == 'suche') $type = 'suche';
		}

		// WEB-385
			// MOBILE
		if(intval($_REQUEST['p_id']) == 17 && intval($_REQUEST['xr_face']) == 1 ) {

		}


		else {
			self::setSearchDataForUser($toSearch, $userId, false);
		}

		$onlyUseSavedSessionData = false;
		if (intval($_REQUEST['p_id']) == 17 && intval($_REQUEST['xr_face']) == "1")
		{
			$onlyUseSavedSessionData = true;
		}


		// check if searchData in session / if filter set ignore
		if ($onlyUseSavedSessionData || ($showAll == true && (!isset($searchDataBackup['filter']) || $searchDataBackup['filter'] == '')))
		{
			if (isset($_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_DATA']))
			{
				$searchData = $_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_DATA'];
			}
		}

		$searchData['filter'] 		= $trueFilter;
		$searchDataBackup['filter'] = $trueFilter;

		if ($trueType == '')
		{
			$trueType = fe_user::getUserType($userId);
		}

		$searchData['type'] 		= $trueType;
		$searchDataBackup['type'] 	= $trueType;

		$filterIsSet 	= false;
		if (isset($searchDataBackup['filter']) && trim($searchDataBackup['filter']) != '')
		{
			$filterIsSet = true;
		}

		// PROFILDATEN - SearchData erweitern...
		$search_rework = json_decode($searchData['SEARCH'], true);

		// Zimmergröße von / bis
		$search_rework['zimmer_von'] 		= intval( $_SESSION['xredaktor_feUser_wsf']['wz_ZIMMERGROESSE_VON']);
		$search_rework['zimmer_bis'] 		= intval( $_SESSION['xredaktor_feUser_wsf']['wz_ZIMMERGROESSE_BIS']);

		// wg-größe von bis
		$search_rework['mitbewohner_von'] 	= intval( $_SESSION['xredaktor_feUser_wsf']['wz_WGGROESSE_VON']);
		$search_rework['mitbewohner_bis'] 	= intval( $_SESSION['xredaktor_feUser_wsf']['wz_WGGROESSE_BIS']);

		// Kaution == wz_ABLOESE ???
		$search_rework['kaution'] 			= $_SESSION['xredaktor_feUser_wsf']['wz_ABLOESE'];

		// Barrierefrei ja/nein/egal
		$search_rework['barrierefrei'] 		= $_SESSION['xredaktor_feUser_wsf']['wz_BARRIEREFREI'];

		// Raucher ja/nein/egal
		$search_rework['raucher'] 			= $_SESSION['xredaktor_feUser_wsf']['wz_RAUCHER'];

		// Haustiere ja/nein/egal
		$search_rework['haustiere'] 		= $_SESSION['xredaktor_feUser_wsf']['wz_HAUSTIERE'];

		// Veggie ja/nein/egal
		$search_rework['veggie'] 			= $_SESSION['xredaktor_feUser_wsf']['wz_VEGGIE'];

		// Nur Männer / Nur Frauen
		$search_rework['geschlecht']		= ($_SESSION['xredaktor_feUser_wsf']['wz_MITBEWOHNER']);


		// WEB-385
		$search_rework['price_from']	= intval($_SESSION['xredaktor_feUser_wsf']['wz_MIETE_VON']);
		$search_rework['price_to'] 	= intval($_SESSION['xredaktor_feUser_wsf']['wz_MIETE_BIS']);

		$searchData['SEARCH'] 				= json_encode($search_rework);

		$resultsHtml	= array();
		$resultsData	= array();
		$type = $trueType;

		if ($type == '') $type = fe_user::getUserType($userId);

		/*
		print_r(compact('filterIsSet', 'trueType', 'trueFilter'));
		print_r($searchData); die();
			*/

		if ($type == "biete")
		{
			$a_id_result_single		= 753;

			if (libx::isDeveloper()) {
				 //file_put_contents(Ixcore::htdocsRoot . '/search.txt', "\n" . date('Y-m-d H:i:s') . "\n -- get USER Results by Params -- " . print_r($searchData, true) . "\n", FILE_APPEND);
			}
			$results				= self::getResultsByParams($searchData, $showAll, $offset);
		}
		else
		{
			$up_lat_lang = json_decode($searchData['SEARCH'], true);
			parse_str($up_lat_lang['location'], $lat_lng_data);

			$updateUserProfile = array(
				'wz_ADRESSE_LAT' => floatval($lat_lng_data['ADRESSE_LAT']),
				'wz_ADRESSE_LNG' => floatval($lat_lng_data['ADRESSE_LNG']),
			);

			if ($updateUserProfile['wz_ADRESSE_LAT'] > 0)
			{
				dbx::update('wizard_auto_707', $updateUserProfile, array('wz_id' => $userId));
				xredaktor_feUser::refreshUserdata($userId);
			}

			// WEB-385
			$userSearchDataSave = self::getSearchDataForUser($userId);

			// miete aus user datensatz restoren
			$searchData_rework = json_decode($searchData['SEARCH'], true);
			if (intval($userSearchDataSave['price_from']) > 0)
			{
				$searchData_rework['price_from'] = intval($userSearchDataSave['price_from']);
				$searchData_rework['price_to'] 	 = intval($userSearchDataSave['price_to']);
			}

			// location aus user datensatz restoren
			parse_str($userSearchDataSave['location'], $userSearchDataSave_location);
			if (floatval($userSearchDataSave_location['ADRESSE_LAT']) > 0)
			{
				$searchData_rework['location'] = array();
				$searchData_rework['location']['ADRESSE_LAT'] = floatval($userSearchDataSave_location['ADRESSE_LAT']);
				$searchData_rework['location']['ADRESSE_LNG'] = floatval($userSearchDataSave_location['ADRESSE_LNG']);
			  	$searchData_rework['range']		 			  = intval($userSearchDataSave['range']);
			}

			$searchData['SEARCH'] = json_encode($searchData_rework);


			// WEB-385 fin
			if (libx::isDeveloper()) {
				 //file_put_contents(Ixcore::htdocsRoot . '/search.txt', "\n" . date('Y-m-d H:i:s') . "\n -- get room Results by Params -- " . "line " . __LINE__ . print_r($searchData, true) . "\n", FILE_APPEND);
			}

			$a_id_result_single 	= 685;
			$results				= self::getRoomResultsByParams($searchData, $showAll, $offset);
		}

		foreach ($results as $k => &$v)
		{

			switch ($type) {

				case 'suche':
					// ROOMS
					$raumBild = intval($v['wz_PROFILBILD']);
					if ($raumBild == 0)
					{
						// alte profilbilder checken
						$adminProfileImg = dbx::query("SELECT wz_PROFILBILD FROM wizard_auto_707 WHERE wz_id = " . $v['wz_ADMIN']);
						if ($adminProfileImg !== false)
						{
							$raumBild = intval($adminProfileImg['wz_PROFILBILD']);
						}

						// neue profilbilder checken
						if ($raumBild == 0)
						{
							$adminProfileImgNew = dbx::queryAll("SELECT wz_S_ID FROM wizard_auto_720 WHERE wz_USERID = " . $v['wz_ADMIN']);
							if ($adminProfileImgNew !== false) {
								$raumBild = intval($adminProfileImg[0]['wz_S_ID']);
							}
						}
					}

					$roomId		= $v['wz_id'];
					//$roomMatch 	= fe_matching::matchUser2Room($userId, $roomId);

					$assign		= array(
						'ID'						=> $v['room_id'],
						'wz_id'					=> $v['room_id'],
						//'NAME' 					=> $v['wz_VORNAME'],
						'IMG' 					=> $raumBild,
						'MATCHPERCENT'			=> $v['wz_RESULT'],
						'PREIS'					=> $v['wz_MIETE'],
						'ALTERSDURCHSCHNITT'	=> $v['wz_ALTERSDURCHSCHNITT'],
						'MITBEWOHNER'			=> fe_user::getUsersByRoomId($roomId, true),
						'GESCHLECHT'			=> $v['wz_GESCHLECHT'],
						'LAT'						=> $v['wz_ADRESSE_LAT'],
						'LNG'						=> $v['wz_ADRESSE_LNG'],
						'FAV'						=> (fe_user::getUser2RoomState($userId, $v['user_id'], 'fav') == true ? 1 : 0),
						'BLOCK'					=> (fe_user::getUser2RoomState($userId, $v['user_id'], 'block') == true ? 1 : 0)
					);
					break;

				case 'biete':
					// USER

					$assign		= array(
						'ID'					=> $v['user_id'],
						'wz_id'					=> $v['user_id'],
						'NAME' 					=> $v['wz_VORNAME'],
						'IMG' 					=> $v['wz_PROFILBILD'],
						'MATCHPERCENT'			=> $v['wz_RESULT'],
						'PREIS'					=> $v['wz_MIETE_VON'],
						'ALTER'					=> fe_user::getAgeByBirthday($v['wz_GEBURTSDATUM']),
						'GESCHLECHT'			=> $v['wz_GESCHLECHT'],
						'LAT'					=> $v['wz_ADRESSE_LAT'],
						'LNG'					=> $v['wz_ADRESSE_LNG'],
						'FAV'					=> (fe_user::getUser2UserState($userId, $v['user_id'], 'fav') == true ? 1 : 0),
						'BLOCK'					=> (fe_user::getUser2UserState($userId, $v['user_id'], 'block') == true ? 1 : 0)
					);
					break;

				default:
					break;
			}


			//$url 			= fe_vanityurls::genUrl_profil($v['user_id'], $type);

			// fix für WEB-301 - leider gibts hier ein bäumchen wechsel dich spielchen:
			switch ($type)
			{
				case 'suche':
					$url 			= fe_vanityurls::genUrl_profil($v['room_id'], 'biete');
					break;
				case 'biete':
					$url 			= fe_vanityurls::genUrl_profil($v['user_id'], 'suche');
					break;
			}


			$v['URL']		= $url;
			$assign['URL']	= $url;

			if ($v['wz_ADRESSE_LAT'] != '' && $v['wz_ADRESSE_LAT'] != 0)
			{
				$v['LAT'] 		= $v['wz_ADRESSE_LAT'];
				$assign['LAT'] 	= $v['wz_ADRESSE_LAT'];
			}

			if ($v['wz_ADRESSE_LNG'] != '' && $v['wz_ADRESSE_LNG'] != 0)
			{
				$v['LNG'] 		= $v['wz_ADRESSE_LNG'];
				$assign['LNG'] 	= $v['wz_ADRESSE_LNG'];
			}

			if ($assign['IMG'] == 0)
			{
				$assign['IMG'] = fe_user::getDefaultImage($v);
			}

			$resultsData[]				= $assign;
			//$resultsHtml[] 				= xredaktor_render::renderSoloAtom($a_id_result_single, array('data' => $assign));
		}

		$sortedResults = $resultsData;

		/*
		usort($sortedResults, function($a, $b) {
		    return intval($b['MATCHPERCENT']) - intval($a['MATCHPERCENT']);
		});
		*/

		foreach ($sortedResults as $k => $v) {
			$resultsHtml[] = xredaktor_render::renderSoloAtom($a_id_result_single, array('data' => $v));
		}

		$resultsCount	= count($resultsHtml);

		$isEndOfResults = 0;

		if ($resultsCount > 0)
		{
			$html 	= implode("", $resultsHtml);
		}
		else
		{
			$isEndOfResults = 1;
			$noResultsType = "search";

			if ($searchDataBackup['filter'])
			{
				$noResultsType = $searchDataBackup['filter'];
			}

			//print_r($type); die();

			$html	=  xredaktor_render::renderSoloAtom(749, array('resultsType' => $noResultsType, 'searchType' => $type));
		}

		if ($filterIsSet == false)
		{
			$_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_DATA'] 		= $searchData;
			$_SESSION['xredaktor_feUser_wsf']['SEARCH']['RESULTS'] 			= $results;
			$_SESSION['xredaktor_feUser_wsf']['SEARCH']['RESULTS_COUNT'] 	= $resultsCount;
			$_SESSION['xredaktor_feUser_wsf']['SEARCH']['RESULTS_HTML'] 	= $html;

		}

		if ($returnJson == true)
		{
			frontcontrollerx::json_success(array('html' => $html, 'results' => $results, 'endOfResults' => $isEndOfResults));
		}

		$res = array(
			'HTML' 				=> $html,
			'COUNT'				=> $resultsCount,
			'RESULTS'			=> $results,
			'endOfResults' 		=> $isEndOfResults,

		);

		if ($resultsCount == 0)
		{
			$res['endOfResults'] = 1;
		}

		return $res;
	}



	public static function getRoomResultsByParams($searchData, $showAll=false, $offset=0)
	{

		session_start();

		$userId					= intval(xredaktor_feUser::getUserId());
		$type						= 'suche';
		$profileTableId 		= 717;
		$resultLimit			= 99; //18;

		$results 				= array();

		$toSearch	= json_decode($searchData['SEARCH'], true);

		$filterIsSet = false;


		// WEB-385
		if ($searchData['filter'] != '' && $toSearch['filter'] == '')
		{
			$searchData['FILTER'] = $searchData['filter'];
			$filterIsSet = true;
		}

		//file_put_contents(Ixcore::htdocsRoot . '/search.txt', "\n" . date('Y-m-d H:i:s') . "\n --  " . "line " . __LINE__ . " getRoomResultsByParams FUNC \nsearcheata:\n" . print_r($searchData, true) . "\n" . print_r($toSearch, true) . "\n ", FILE_APPEND);




		if (isset($toSearch['filter']) && trim($toSearch['filter']) != '')
		{
			$searchData['FILTER']		= $toSearch['filter'];
			unset($toSearch['filter']);
			$filterIsSet = true;
		}

		// count(*) für anzahl mitbewohner.. einfach die n2n counten
		$sql = "select * , wizard_auto_809.wz_id AS room_id, (SELECT COUNT(*) FROM wizard_auto_SIMPLE_W2W_707_809 WHERE wz_id_high = wizard_auto_809.wz_id) AS mitbewohner_count
		from wizard_auto_809
		left join wizard_auto_844 on (wz_USERID = $userId AND wz_ROOMID = wizard_auto_809.wz_id)
		where wizard_auto_809.wz_del ='N' and wizard_auto_809.wz_ACTIVE = 'Y' ";

		$sql2 = "select * , wizard_auto_809.wz_id AS room_id, (SELECT COUNT(*) FROM wizard_auto_SIMPLE_W2W_707_809 WHERE wz_id_high = wizard_auto_809.wz_id) AS mitbewohner_count
		from wizard_auto_809, xxxxx as block
		left join wizard_auto_844 on (wz_USERID = $userId AND wz_ROOMID = wizard_auto_809.wz_id)
		where

		wizard_auto_809.wz_del ='N' and
		wizard_auto_809.wz_ACTIVE = 'Y' and
		block.wz_USERID != wizard_auto_809.wz_id



		";



		if (!isset($searchData['FILTER']) || $searchData['FILTER'] != 'BLOCKED')
		{
			// dont show blocked
			// TODO better way
			$sql 	.= "and wizard_auto_809.wz_id not in (select wz_F_USERID from  ".fe_user::table_room_block." where wz_USERID = $userId)";
		}

		// dont show own room
		if ($userId > 0)
		{
			$sql .= " and wizard_auto_809.wz_ADMIN != $userId";
		}


		if (isset($searchData['FILTER']))
		{
			switch ($searchData['FILTER']) {
				case 'FAVS':
					$sql .= " and wizard_auto_809.wz_id in (select wz_F_USERID from ".fe_user::table_room_fav." where wz_USERID = $userId) ";
					break;

				case 'BLOCKED':
					$sql .= " and wizard_auto_809.wz_id in (select wz_F_USERID from ".fe_user::table_room_block." where wz_USERID = $userId) ";
					break;

				default:
					break;
			}
		}


		$where		= array();

		$location	= false;



		// wenn nicht als array kommt, decode
		if (!is_array($toSearch['location']) && trim($toSearch['location'] != ''))
		{
			parse_str($toSearch['location'], $location);
			if(!array_filter($location)) {
				$location = false;
				unset($toSearch['location']);

			}
			else
			{

			}

		}

		if (is_array($toSearch['location']))
		{
			$location = array();
			$location['ADRESSE_LAT'] = $toSearch['location']['ADRESSE_LAT'];
			$location['ADRESSE_LNG'] = $toSearch['location']['ADRESSE_LNG'];
		}



		if ($filterIsSet == false)
		{
			$_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_ARRAY'] 		= $toSearch;
			if ($location !== false)
			{
				$_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_ARRAY']['location'] = $location;
			}
		}



		if (!isset($toSearch['price_from'])) {
			$toSearch['price_from'] = fe_user::$regDefaults['wz_MIETE_VON'];
		}
		if (!isset($toSearch['price_to'])) {
			$toSearch['price_to'] = fe_user::$regDefaults['wz_MIETE_BIS'];
		}


		if (libx::isDeveloper())
		{
			//var_dump($filterIsSet); die();

		}

		// bei $filterIsSet (== fav/blocked gewählt) dürfen wir keine Suchparameter benutzen!
		if (!$filterIsSet) foreach ($toSearch as $k => $v) {

			if (trim($v) == '') continue;

			switch($k)
			{
				case 'mitbewohner_von':
					if (intval($v) > 0) $where[] = " ( wz_COUNT_MITBEWOHNER >= $v ) ";
					break;

				case 'mitbewohner_bis':
					if (intval($v) > 0) $where[] = " ( wz_COUNT_MITBEWOHNER <= $v ) ";
					break;

				case 'geschlecht':
					if ($v == 'M') 		$where[] = " ( wz_COUNT_MITBEWOHNER_F = 0 ) ";
					elseif ($v == 'F') 	$where[] = " ( wz_COUNT_MITBEWOHNER_M = 0 ) ";
					break;

				case 'zimmer_von':
					if ($v > 0) $where[] = " ( wz_GROESSE >= $v )";
					break;

				case 'zimmer_bis':
					if ($v > 0) $where[] = " ( wz_GROESSE <= $v )";
					break;

				case 'raucher':
					if ($v == 'Y') $where[] = " ( wz_RAUCHER IN ('Y', 'X') )";
					if ($v == 'N') $where[] = " ( wz_RAUCHER = 'N' )";
					break;

				case 'haustiere':
					if ($v == 'Y') $where[] = " ( wz_HAUSTIERE IN ('Y', 'X') )";
					if ($v == 'N') $where[] = " ( wz_HAUSTIERE = 'N' )";
					break;

				case 'veggie':
					if ($v == 'Y') $where[] = " ( wz_VEGGIE IN ('Y', 'X') )";
					if ($v == 'N') $where[] = " ( wz_VEGGIE = 'N' )";
					break;

				case 'kaution':
					if ($v == 'Y') $where[] = " ( wz_ABLOESE IN ('Y', 'X') )";
					if ($v == 'N') $where[] = " ( wz_ABLOESE = 'N' )";
					break;

				case 'date':
					// wz_ZEITRAUM_VON, wz_ZEITRAUM_BIS
					$date		= date("Y-m-d", strtotime($v));
					$where[] 	= " ( (wz_ZEITRAUM_VON = '0000-00-00' OR wz_ZEITRAUM_VON <= '$date') AND (wz_ZEITRAUM_BIS = '0000-00-00' OR wz_ZEITRAUM_BIS >= '$date') ) ";
					break;

				case 'price_from':
					// wz_MIETE_VON
					$val		= intval($v);
					$where[] 	= " ( (wz_MIETE >= $val ) OR (wz_MIETE = 0) )";
					break;

				case 'price_to':
					// wz_MIETE_BIS
					$val		= intval($v);
					$where[] 	= " ( (wz_MIETE = 0) OR (wz_MIETE <= $val)) ";
					break;

				case 'barrierefrei':
					if ($v == 'Y') $where[] = " ( wz_BARRIEREFREI = 'Y' ) ";
					if ($v == 'N') $where[] = " ( wz_BARRIEREFREI = 'N' ) ";
					break;

				case 'location':

					// ONLY use values if no LAT / LONG PRESENT
					if ($location['ADRESSE_LAT'] == 0 || $location['ADRESSE_LNG'] == 0)
					{
						// location fields to be used to match search results
						$fieldsToSearch 	= array('ADRESSE_STADT', 'ADRESSE_LAND', 'ADRESSE_PLZ');

						foreach ($fieldsToSearch as $field)
						{
							if (trim($location[$field]) != '')
							{
								// special case, get wz_id from country
								if ($field == 'ADRESSE_LAND')
								{
									$countryId	= intval(self::getCountryIdByIso2($location[$field]));

									if ($countryId > 0)
									{
										$where[]	= " wz_".$field." = '".$countryId."'";
									}
								}
								else
								{
									$where[]	= " wz_".$field." = '".$location[$field]."'";
								}
							}
						}
					}

					break;

				case 'range':

					if ($location != false)
					{


						if ($location['ADRESSE_LAT'] != '' && $location['ADRESSE_LNG'] != '')
						{

							$dist			= intval($v);
							$origLat 		= $location['ADRESSE_LAT'];
							$origLon 		= $location['ADRESSE_LNG'];

							$sqlLocation 	= "select  * , wizard_auto_809.wz_id AS room_id, 12733.13 *
								          ASIN(SQRT( POWER(SIN(($origLat - abs(wz_ADRESSE_LAT))*pi()/180/2),2)
								          +COS($origLat*pi()/180 )*COS(abs(wz_ADRESSE_LAT)*pi()/180)
								          *POWER(SIN(($origLon-wz_ADRESSE_LNG)*pi()/180/2),2)))
								          as distance FROM wizard_auto_809 left join wizard_auto_844 on (wz_USERID = $userId AND wz_ROOMID = wizard_auto_809.wz_id) WHERE
								          wizard_auto_809.wz_del ='N'
								          and wizard_auto_809.wz_ACTIVE = 'Y'
								          and wz_ADRESSE_LNG between ($origLon-$dist/abs(cos(radians($origLat))*69))
								          and ($origLon+$dist/abs(cos(radians($origLat))*69))
								          and wz_ADRESSE_LAT between ($origLat-($dist/69))
								          and ($origLat+($dist/69))

								          /* = RANGE QUERY = */
								          ";

							// dont show own room
							if ($userId > 0)
							{
								$sqlLocation .= " and wizard_auto_809.wz_ADMIN != $userId ";

								if (!isset($searchData['FILTER']) || $searchData['FILTER'] != 'BLOCKED')
								{
									// dont show blocked
									// TODO better way
									$sqlLocation 	.= "and wizard_auto_809.wz_id not in (select wz_F_USERID from  ".fe_user::table_room_block." where wz_USERID = $userId)";
								}
							}


							$sqlLocationPostfix = " having distance < $dist ORDER BY wz_RESULT DESC, distance ASC ";
						}
					}

					break;

				default:
					break;
			}
		}


		// allgemein: keine deaktivierten / gelöschten Räume in den suchergebnissen
		$where[] = " wizard_auto_809.wz_ACTIVE != 'N' ";
		$where[] = " wizard_auto_809.wz_del != 'Y' ";
		$where[] = " wizard_auto_809.wz_online != 'N' ";



		$whereStr 	= '';
		if (!empty($where))
		{
			$whereStr	= " and ".implode(" and ", $where);
		}
		if ($location !== false && !$filterIsSet)
		{
			$sql 	=  $sqlLocation.$whereStr.$sqlLocationPostfix;
		}
		else
		{
			$sql 	.=  $whereStr." ORDER BY wz_RESULT DESC ";
		}

		$limitOffset = $offset * $resultLimit;

		$sql 	.= " limit $limitOffset, $resultLimit  ";


		if ($_REQUEST['x'] == 1)
		{
			die($sql);
		}

		$results 	= dbx::queryAll($sql, true);

		return $results;
	}


	public static function setSearchDataForUser($searchData, $userId, $isJson=false)
	{

		$userId = intval($userId);
		if ($userId == 0) return false;

		// weitere daten in userfelder speichern für WEB-307
		$addData = array();

		if ($isJson === false)
		{

			if ($searchData['price_from']) 	$addData['wz_MIETE_VON'] = $searchData['price_from'];
			if ($searchData['price_to']) 	$addData['wz_MIETE_BIS'] = $searchData['price_to'];
			if ($searchData['range']) 		$addData['wz_UMKREIS'] = $searchData['range'];
			if ($searchData['adresse']) 	$addData['wz_ADRESSE'] = $searchData['adresse'];
			if ($searchData['date'] != '')	$addData['wz_ZEITRAUM_VON'] = date('Y-m-d', strtotime($searchData['date']));


			$searchData = json_encode($searchData);
		}
		else {
			$searchData = json_decode($searchData);

			if ($searchData['price_from']) 	$addData['wz_MIETE_VON'] = $searchData['price_from'];
			if ($searchData['price_to']) 	$addData['wz_MIETE_BIS'] = $searchData['price_to'];
			if ($searchData['range']) 		$addData['wz_UMKREIS'] = $searchData['range'];
			if ($searchData['adresse']) 	$addData['wz_ADRESSE'] = $searchData['adresse'];
			if ($searchData['date'] != '')	$addData['wz_ZEITRAUM_VON'] = date('Y-m-d', strtotime($searchData['date']));

			$searchData = json_encode($searchData);
		}

		$update =  array_merge(array('wz_SEARCHDATA' => $searchData), $addData);

		if (libx::isDeveloper())
		{
			//file_put_contents(Ixcore::htdocsRoot . '/search.txt', "\n" . date('Y-m-d H:i:s') . "\n -- UPDATE setSearchData -- line " . __LINE__ . ' ' . print_r($update, true) . "\n", FILE_APPEND);
		}

		dbx::update("wizard_auto_707", $update, array('wz_id' => $userId));

		return true;
	}


	public static function getSearchDataForUser($userId, $returnJson=false)
	{

		$userId = intval($userId);
		if ($userId == 0) return false;

		$searchData = dbx::query("select wz_SEARCHDATA from wizard_auto_707 where wz_id = $userId");

		if ($searchData === false) return false;
		if ($searchData['wz_SEARCHDATA'] == '') return false;

		if ($returnJson === true) return $searchData['wz_SEARCHDATA'];


		return json_decode($searchData['wz_SEARCHDATA'], true);

	}

	public static function sc_getStoredSearchData($params)
	{

		session_start();
		$userId	  = intval(xredaktor_feUser::getUserId());
		$toSearch = self::getSearchDataForUser($userId, false);

		parse_str($toSearch['location'], $locationAsArray);

		// kaputte searchdata... umgehen
		if (count($locationAsArray) == 0 && count($toSearch) == 3 && $toSearch['filter'] == '') {
			 return false;
		}

		$toSearch['location'] = $locationAsArray;

		$_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_ARRAY'] = $toSearch;

		return $_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_ARRAY'];
	}


	public static function getResultsByParams($searchData, $showAll=false, $offset=0)
	{

		session_start();

		$userId				= intval(xredaktor_feUser::getUserId());
		$type					= fe_user::getUserType($userId);
		$resultLimit		= 99; //18;

		$results = array();

		switch ($type) {

			case 'suche':
				$profileTableId = 717;
				break;

			case 'biete':
				$profileTableId	= 718;
				break;

			default:
				return false;
				break;
		}

		$toSearch	= json_decode($searchData['SEARCH'], true);

		$filterIsSet = false;

		if (isset($toSearch['filter']) && trim($toSearch['filter']) != '')
		{
			$searchData['FILTER']		= $toSearch['filter'];
			unset($toSearch['filter']);
			$filterIsSet = true;
		}

		// WEB-385
		if (isset($searchData['filter']) && $searchData['filter'] != "")
		$searchData['FILTER'] = $searchData['filter'];
		$filterIsSet = true;


		//$sql 	= "select  * , user.wz_id AS user_id from wizard_auto_707 AS user, wizard_auto_$profileTableId as profile where user.wz_id = profile.wz_USERID and user.wz_del ='N' and profile.wz_del = 'N'";

        // seit der umstellung profile -> user/räume waren anbieterprofile in der mitbewohner suche vorhanden
        // was nicht unbedingt falsch ist, weil ein anbieter ja auch ein user ist.
        // trotzdem war das vor der umstellung nicht so, da wurde auf den profiltyp gefiltert
        // deshalb  AND wizard_auto_707.wz_TYPE = 'suche' hinzugefügt
		$sql 	= "select  * , wizard_auto_707.wz_id AS user_id from wizard_auto_707 left join wizard_auto_773 on (wz_USERID1 = $userId AND wz_USERID2 = wizard_auto_707.wz_id) where wizard_auto_707.wz_del ='N' AND wizard_auto_707.wz_TYPE = 'suche' ";


		// normale mitbewohner suche (nicht fav/block): keine blocks anzeigen
		if (!isset($searchData['FILTER']) || $searchData['FILTER'] != 'BLOCKED')
		{
			$sql 	.= " and wizard_auto_707.wz_id not in (select wz_F_USERID from ".fe_user::table_user_block." where wz_USERID = $userId) ";
			$sql 	.= " and wizard_auto_707.wz_id not in (select wz_USERID from ".fe_user::table_user_block." where wz_F_USERID = $userId) ";
		}



		if ($userId > 0)
		{
			$sql .= " and wizard_auto_707.wz_id != $userId";
		}

		if (isset($searchData['FILTER']))
		{
			switch ($searchData['FILTER']) {
				case 'FAVS':
					$sql .= " and wizard_auto_707.wz_id in (select wz_F_USERID from ".fe_user::table_user_fav." where wz_USERID = $userId) ";
					break;

				case 'BLOCKED':

					$sql .= " and wizard_auto_707.wz_id in (select wz_F_USERID from ".fe_user::table_user_block." where wz_USERID = $userId) ";
					break;

				default:
					break;
			}
		}

		$where		= array();

		$location	= false;

		if (trim($toSearch['location'] != '') && !$filterIsSet)
		{
			parse_str($toSearch['location'], $location);
			if(!array_filter($location)) {
				$location = false;
				unset($toSearch['location']);
			}
			else
			{

			}
		}


		if ($filterIsSet == false)
		{
			$_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_ARRAY'] 		= $toSearch;
			if ($location !== false)
			{
				$_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_ARRAY']['location'] = $location;
			}
		}

		// miete von / bis: safety first, "from" muss immer der niedrigere wert sein
		// brauchen wir das bei der usersuche überhaupt? weiter unten ist es auskommentiert...
		$miete_von = intval($toSearch['price_from']);
		$miete_bis = intval($toSearch['price_to']);
		if ($miete_von > $miete_bis) {
			$toSearch['price_from'] = $miete_bis;
			$toSearch['price_to']   = $miete_von;
		}

		if (!$filterIsSet)
		{

			foreach ($toSearch as $k => $v) {

				if (trim($v) == '') continue;

				switch($k)
				{
					case 'date':
						// wz_ZEITRAUM_VON, wz_ZEITRAUM_BIS
						$date			= date("Y-m-d", strtotime($v));
						$where[] 	= " (wz_ZEITRAUM_VON = '0000-00-00' OR wz_ZEITRAUM_VON >= '$date') AND (wz_ZEITRAUM_BIS = '0000-00-00' OR wz_ZEITRAUM_BIS <= '$date') ";
						break;

					case 'price_from':
						if ($type == 'biete') {

							// miete von 100 => findet user die 50-101 eingestellt haben
							// wz_MIETE_VON
							$val		= intval($v);
							$where[] 	= " (  /* miete von */
								(wz_MIETE_VON >= $val AND (wz_MIETE_BIS >= $val OR wz_MIETE_BIS = 0))
								OR
								(wz_MIETE_BIS >= $val)
							) ";
						}
						break;

					case 'price_to':
						if ($type == 'biete') {
							// miete bis 200 => findet user die 199-1000 eingestellt haben, und user die 199-0 eingestellt haben
							// wz_MIETE_BIS
							$val		= intval($v);
							$where[] 	= " (  /*miete bis*/
								(wz_MIETE_BIS <= $val)
								OR
								(wz_MIETE_VON <= $val)
							) ";
						}
						break;


					case 'location':

						// ONLY use values if no LAT / LONG PRESENT
						if ($location['ADRESSE_LAT'] == 0 || $location['ADRESSE_LNG'] == 0)
						{
							// location fields to be used to match search results
							$fieldsToSearch 	= array('ADRESSE_STADT', 'ADRESSE_LAND', 'ADRESSE_PLZ');

							foreach ($fieldsToSearch as $field)
							{
								if (trim($location[$field]) != '')
								{
									// special case, get wz_id from country
									if ($field == 'ADRESSE_LAND')
									{
										$countryId	= intval(self::getCountryIdByIso2($location[$field]));

										if ($countryId > 0)
										{
											$where[]	= " wz_".$field." = '".$countryId."'";
										}
									}
									else
									{
										$where[]	= " wz_".$field." = '".$location[$field]."'";
									}
								}
							}
						}

						break;

					case 'range':

						if ($location != false)
						{


							if ($location['ADRESSE_LAT'] != '' && $location['ADRESSE_LNG'] != '')
							{

								$dist			= intval($v);
								$origLat 		= $location['ADRESSE_LAT'];
								$origLon 		= $location['ADRESSE_LNG'];
								$tableName		= "wizard_auto_$profileTableId";

								$sqlLocation 	= "select  DISTINCT * , wizard_auto_707.wz_id AS user_id, 12733.13 *
									          ASIN(SQRT( POWER(SIN(($origLat - abs(wz_ADRESSE_LAT))*pi()/180/2),2)
									          +COS($origLat*pi()/180 )*COS(abs(wz_ADRESSE_LAT)*pi()/180)
									          *POWER(SIN(($origLon-wz_ADRESSE_LNG)*pi()/180/2),2)))
									          as distance FROM wizard_auto_707 left join wizard_auto_773 on (wz_USERID1 = $userId AND wz_USERID2 = wizard_auto_707.wz_id) WHERE
									          wizard_auto_707.wz_del ='N'
									          and wz_ADRESSE_LNG between ($origLon-$dist/abs(cos(radians($origLat))*69))
									          and ($origLon+$dist/abs(cos(radians($origLat))*69))
									          and wz_ADRESSE_LAT between ($origLat-($dist/69))
									          and ($origLat+($dist/69))


									          ";

								$sqlLocationPostfix = " having distance < $dist ORDER BY wz_RESULT desc, distance asc";


								switch ($searchData['FILTER']) {
									case 'FAVS':
										$sqlLocation .= " and wizard_auto_707.wz_id in (select wz_F_USERID from ".fe_user::table_user_fav." where wz_USERID = $userId) ";
										break;

									case 'BLOCKED':
										$sqlLocation .= " and wizard_auto_707.wz_id in (select wz_F_USERID from ".fe_user::table_user_block." where wz_USERID = $userId) ";

										break;

									default:
										if ($searchData['FILTER'] != 'BLOCKED')
										{
											$sqlLocation 	.= " and wizard_auto_707.wz_id not in (select wz_F_USERID from ".fe_user::table_user_block." where wz_USERID = $userId) ";
										}
										break;
								}


								$sqlLocation .= " AND wizard_auto_707.wz_TYPE = 'suche' ";

								if ($userId > 0)
								{
									$sqlLocation .= " and wizard_auto_707.wz_id != $userId";
								}
							}
						}

						break;

					default:
						break;
				}
			}
		}

		// allgemein: keine deaktivierten / gelöschten Profile in den suchergebnissen
		$where[] = " wizard_auto_707.wz_ACTIVE != 'N' ";
		$where[] = " wizard_auto_707.wz_USERDEL != 'Y' ";

		//if wz_miete_von && wz_miete_bis < wz_MIETE Room / dont show Profile
		// $where[] = " wizard_auto_707.wz_MIETE_VON > $miete_von ";
		// $where[] = " wizard_auto_707.wz_MIETE_BIS < $miete_bis ";

		$roomMiete = dbx::query("SELECT wz_MIETE FROM wizard_auto_809 WHERE wz_ADMIN = $userId AND wz_del = 'N' AND wz_ONLINE = 'Y' AND wz_ACTIVE = 'Y' ");
		$roomMiete = implode("", $roomMiete);
		// print_r($roomMiete);
		// die("\n------");

		$where[] = " wizard_auto_707.wz_MIETE_VON >= $roomMiete ";
		$where[] = " wizard_auto_707.wz_MIETE_BIS <= $roomMiete ";


		$whereStr 	= '';
		if (!empty($where))
		{
			$whereStr	= " and ".implode(" and ", $where);
		}

		if ($location !== false && !$filterIsSet)
		{
			$sql 	=  $sqlLocation.$whereStr.$sqlLocationPostfix;
		}
		// else
		// {
		// 	$sql 	.=  $whereStr." order by wz_RESULT DESC";
		// }

		$limitOffset = $offset * $resultLimit;

		$sql 	.= " limit $limitOffset, $resultLimit  ";
		//
		// print_r($sql);
		// die("\n-----");

		$results 	= dbx::queryAll($sql, true);

		return $results;
	}


	public static function getCountryIdByIso2($country)
	{
		$country = dbx::escape($country);

		$id 	 = dbx::queryAttribute("select * from wizard_auto_716 where wz_ISO2 = '$country'", 'wz_id');

		if ($id === false) return 0;

		return $id;
	}


	public static function sc_getResults()
	{
		return self::ajax_getResults();
	}



////// FUNCTIONS FOR GOOGLE TAG MANAGER
	public static function getUserId()
	{
		$userId = intval(xredaktor_feUser::getUserId());

		return $userId;
	}


	public static function getLoginCounter()
	{
		$userId = self::getUserId();

		$counter = intval(dbx::queryAttribute("select wz_LOGINCOUNTER from wizard_auto_707 where wz_id = $userId","wz_LOGINCOUNTER"));

		return $counter;
	}

}
