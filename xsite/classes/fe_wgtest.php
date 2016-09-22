<?

class fe_wgtest
{
	
	public static function getNextFrage($frageId)
	{
		$frageId = intval($frageId);
		if ($frageId == 0) return false;
		
		$aktuelleFrageNr = dbx::queryAttribute("SELECT wz_NR FROM wizard_auto_755 WHERE wz_id = $frageId ", 'wz_NR');
		$nextFrage       = dbx::query("SELECT wz_id FROM wizard_auto_755 WHERE wz_NR > $aktuelleFrageNr AND wz_online = 'Y' and wz_del = 'N' ORDER BY wz_NR ASC ");
		
		return self::sc_getFrage($nextFrage['wz_id']);
	}
	
	public static function sc_getPrevFrageId($params)
	{
		$frageId = intval($params['frageId']);
		if ($frageId == 0) return false;
		
		$aktuelleFrageNr = dbx::queryAttribute("SELECT wz_NR FROM wizard_auto_755 WHERE wz_id = $frageId ", 'wz_NR');
		$prevFrage       = dbx::query("SELECT wz_id FROM wizard_auto_755 WHERE wz_NR < $aktuelleFrageNr AND wz_online = 'Y' and wz_del = 'N' ORDER BY wz_NR DESC ");
		if ($prevFrage === false) return false; 
		return intval($prevFrage['wz_id']);
	}
	
	public static function get_frageId_by_frageNr($frageNr)
	{
		$frageNr = intval($frageNr);
		if ($frageNr == 0) return false;
		return dbx::queryAttribute("SELECT wz_id FROM wizard_auto_755 WHERE wz_NR = $frageNr AND wz_online = 'Y' AND wz_del = 'N' ", 'wz_id');
	}
	
	public static function get_frageNr_by_frageId($frageId)
	{
		$frageId = intval($frageId);
		if ($frageId == 0) return false;
		return dbx::queryAttribute("SELECT wz_NR FROM wizard_auto_755 WHERE wz_id = $frageId AND wz_online = 'Y' AND wz_del = 'N' ", 'wz_NR');
	}
	
	public static function sc_getInitFragen($params = array())
	{
		$fragen = dbx::queryAll("SELECT * FROM wizard_auto_755 WHERE wz_del = 'N' AND wz_online = 'Y' AND wz_INIT_FRAGE = 'Y' ORDER BY wz_sort ASC LIMIT 3");
		
		if($fragen === false)
		{
			return array();
		}
		
		$fragen = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(755, $fragen);
		
		$return = array();
		
		foreach ($fragen as $key => $value) {
			
			$frage_id = intval($value['wz_id']);
			
			$options	= dbx::queryAll("select * from wizard_auto_756 where wz_FRAGE_ID = $frage_id and wz_del='N' and wz_online = 'Y' order by wz_sort asc");
			
			//$fragen = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(756, $options);
			$options = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(756, $options);
						
			$return[] = array(
				'FRAGE' 	=> $value,
				'OPTIONS'	=> $options
			);
		}
		
		return $return;
	}
	
	public static function sc_getFrage($frageId = false)
	{
			
		$lng 				= xredaktor_pages::getFrontEndLang();
		$lngPref			= '_'.strtoupper($lng).'_';		
			
		$userId				= xredaktor_feUser::getUserId();	
		$nr 				= 1;
		$fromBack 			= false;
		$restart			= false;
		$state				= 0;
		
		$userId				= intval($userId);
		if ($userId == 0) 	fe_user::redirectToLogin();
		
		
		if ($frageId != false && is_numeric($frageId))
		{
			$nr = intval($frageId);
		}
		else if (isset($_REQUEST['restart']) && $_REQUEST['restart'] == 1 && $_REQUEST['frageId'] > 0) {
			$nr = self::get_frageNr_by_frageId($_REQUEST['frageId']); 
		}
		else if (isset($_REQUEST['restart']) && $_REQUEST['restart'] == 1)
		{
			$nr = 1;
		}
		else if (isset($_REQUEST['frageid']))
		{
			$nr = intval($_REQUEST['frageid']);
		}
		
		else
		{
			$next = dbx::queryAttribute("select * from wizard_auto_755 where wz_del = 'N' and wz_online = 'Y' AND wz_id NOT IN (select wz_FRAGE_ID from wizard_auto_765 where wz_USERID = $userId and wz_del ='N') order by wz_NR asc", "wz_id");
			
			if ($next !== false) $nr = $next;
		}
		
		$frage_nr = self::get_frageNr_by_frageId($nr);
		$frage_id = $nr;
		
		
		$sql = "select * from wizard_auto_755 where wz_NR = $frage_nr and wz_del = 'N' and wz_online = 'Y' ";
		
		if (($fromBack == false && $restart == false) || $state == 2)
		{
			//$sql .= " and wz_id NOT IN (select wz_FRAGE_ID from wizard_auto_765 where wz_USERID = $userId)";	
		}
		
		$frage 		= dbx::query($sql);
		
		if ($frage === false) return false;
		
		$options	= dbx::queryAll("select * from wizard_auto_756 where wz_FRAGE_ID = $frage_id and wz_del='N' and wz_online = 'Y' order by wz_sort asc");
		
		foreach ($options as $k => &$v) {
			$v['wz_TEXT'] = $v[$lngPref."wz_TEXT"];
		}
		
		$frage['wz_FRAGE'] = $frage[$lngPref."wz_FRAGE"];
		
		$ret 		= array(
			'FRAGE' 	=> $frage,
			'OPTIONS'	=> $options,
			'ANSWERED'	=> self::getAnsweredDetails($frage['wz_id'])
		);
		
		return $ret; 
	}	
	
	
	public static function sc_getAllQuestionsAndState()
	{
		$userId				= intval(xredaktor_feUser::getUserId());
		$questions 			= dbx::queryAll("select * from wizard_auto_765 as ergebnis, wizard_auto_755 as frage where ergebnis.wz_FRAGE_ID = frage.wz_id and ergebnis.wz_USERID = $userId and frage.wz_online = 'Y' order by wz_NR asc");
		
		$aux 				= array();
		
		foreach ($questions as $k => $v) {
			$aux[] = self::sc_getFrage($v['wz_FRAGE_ID']);
		}
		
		return $aux;
	}
	
	
	
	public static function getAnsweredDetails($frageId)
	{
		
		$userId				= intval(xredaktor_feUser::getUserId());
		$frageId			= intval($frageId);
		
		$data = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = $frageId");
		return $data;	
	}
	
	
	
	
	public static function getWgTestState($userId)
	{
		$userId = intval($userId);
		
		$state  = 0;
		
		if (fe_matching::checkNotAnsweredAnyQuestions($userId) == true)
		{
			$state = 0;
		}
		else {
			$state = self::answeredQuestionsState($userId);
		}
		
		return $state;
	}
	
	
	public static function answeredQuestionsState($userId)
	{
		
		$userId = intval($userId);
		
		if ($userId == 0) return 0;
		
		$state = 0;
		
		$countFragen = dbx::queryAttribute("select count(wz_id) as cnt from wizard_auto_755 where wz_del = 'N' and wz_online = 'Y'", "cnt");
		$countAnsweredQuestions = dbx::queryAttribute("select count(wz_id) as cnt from wizard_auto_765 where wz_USERID = $userId AND wz_del = 'N' ", "cnt");
		
		if ($countAnsweredQuestions == 0) return 0;
		else if ($countAnsweredQuestions == $countFragen) {
			return 1;
		}
		else return 2;

	} 
	
	public static function sc_is_frage_last_frage($params)
	{
		$frageId = intval($params['frageId']);
		if ($frageId == 0) return false;
		
		$system = 'behindertes_fragen_nr_system';
		
		if ($system == 'wz_sort')
		{
			$aktuelleFrageSort	= dbx::queryAttribute("select wz_sort                     from wizard_auto_755 where wz_id = $frageId ", "wz_sort");
			$lastFrageSort		= dbx::queryAttribute("select MAX(wz_sort) as max_sort from wizard_auto_755 where wz_del = 'N' and wz_online = 'Y'", "max_sort");
			
			$aktuelleFrageSort  = intval($aktuelleFrageSort);
			$lastFrageSort		= intval($lastFrageSort);
			
			if ($aktuelleFrageSort == $lastFrageSort)
			{
				return true;
			} 
		}
		else {
			
			$aktuelleFrageNr = dbx::queryAttribute("SELECT wz_NR FROM wizard_auto_755 WHERE wz_id = $frageId ", 'wz_NR');
			$lastFrageNr     = dbx::queryAttribute("SELECT max(wz_NR) as max_wz_nr FROM wizard_auto_755 WHERE wz_online = 'Y' and wz_del = 'N' ", 'max_wz_nr');
			
			$aktuelleFrageNr = intval($aktuelleFrageNr);
			$lastFrageNr = intval($lastFrageNr);
			
			if ($aktuelleFrageNr == $lastFrageNr)
			{
				return true;
			}
		}

		return false;
	}
	public static function sc_get_fragen_count($params)
	{
		$countFragen = dbx::queryAttribute("select count(wz_id) as cnt from wizard_auto_755 where wz_del = 'N' and wz_online = 'Y'", "cnt");
		return intval($countFragen);
	}
	
	
	public static function sc_getWgTestState($params)
	{
		
		$userId = intval($params['userId']);
		return self::getWgTestState($userId);
	}
	
	
	public static function ajax_collectAnswer() 
	{
		$userId				= intval(xredaktor_feUser::getUserId());
		$frage				= intval($_REQUEST['frage']);
		$antwort_bin		= intval($_REQUEST['antwort_bin']);
		$antwort_suche		= intval($_REQUEST['antwort_suche']);
		$antwort_wichtig	= intval($_REQUEST['antwort_wichtig']);
		
		$lng 				= dbx::escape($_REQUEST['lang']);
		
		$from_restart		= intval($_REQUEST['from_restart']);
		
		$update				= array(
			'wz_USERID'				=> $userId,
			'wz_FRAGE_ID'			=> $frage,
			'wz_ANTWORT_BIN'		=> $antwort_bin,
			'wz_ANTWORT_SUCHE'		=> $antwort_suche,
			'wz_ANTWORT_WICHTIG'	=> $antwort_wichtig
		);
		
		$present = dbx::query("select * from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = $frage");
		if ($present !== false)
		{
			dbx::query("delete from wizard_auto_765 where wz_USERID = $userId and wz_FRAGE_ID = $frage AND wz_del = 'N' limit 1");	
		}
		
		dbx::insert("wizard_auto_765", $update);
		
		// clear previous matching results
		fe_matching::clearMatchingResults($userId);
		
		//$nextQuestion	= self::sc_getFrage($frage+1);
		$nextQuestion = self::getNextFrage($frage, $from_restart);
		
		$assign 		= array('data' => $nextQuestion, 'lang' => $lng, 'from_restart' => $from_restart);
		$questionAtom	= 766;
		
		$lastQuestion	= 0;
		$profileUrl		= '';
		
		$nextQuestionId = intval($nextQuestion['FRAGE']['wz_id']);
		
		$currentIsLastQuestion = self::sc_is_frage_last_frage(array('frageId' => $frage));  
		if ($currentIsLastQuestion) {
			$lastQuestion	= 1;
		}
		
		
		// all questions already answered
		if ($nextQuestion === false)
		{
			$lastQuestion	= 1;	
			$profileUrl 		= fe_vanityurls::genUrl_myprofile();
		}
		
		$html 			= xredaktor_render::renderSoloAtom($questionAtom, $assign);
		
		frontcontrollerx::json_success(array('html' => $html, 'lastQuestion' => $lastQuestion, 'nextQuestionId' => $nextQuestionId, 'profileUrl' => $profileUrl));
	}
	
	
}