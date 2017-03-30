<?

class fe_fragebogen
{
	public static function sc_getAllFragen($type)
	{

		if($type === false || $type == '') {
			
			return false;
		}
		
		return self::getAllFragen($type);
	}
	public static function getAllFragen($type)
	{
		$fragen = array();
		
		$fragen = dbx::queryAll("SELECT * FROM wizard_auto_961 WHERE wz_del = 'N' AND wz_online = 'Y' ORDER BY wz_sort ASC");
		
		if($fragen === false || $type === false)
		{
			return array();
		}
		
		$return = array();
		
		foreach ($fragen as $k => $v) {
			$fid = intval($v['wz_id']);
			
			$options = dbx::queryAll("SELECT * FROM wizard_auto_962 WHERE wz_FRAGE_ID = $fid AND wz_del = 'N' AND wz_online = 'Y' ORDER BY wz_sort ASC");
			
			$options = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(962, $options);
			
			$return[] = array(
					'FRAGE' 	=> $v,
					'OPTIONS'	=> $options
			);
		}
		return $return;
	}
	
	
	
	public static function sc_getInitFragen()
	{
		$type = false;

		if(intval($_REQUEST['p_id'] == 47))
		{
			$type = 'suche';
		}

		if(intval($_REQUEST['p_id'] == 48))
		{
			$type = 'biete';
		}

		return self::getInitFragen($type);
	}
	public static function getInitFragen($type)
	{
		$fragen = array();

		$fragen = dbx::queryAll("SELECT * FROM wizard_auto_961 WHERE wz_del = 'N' AND wz_online = 'Y' AND wz_INIT_FRAGE = 'Y' ORDER BY wz_sort ASC Limit 3");

		if($fragen === false || $type === false)
		{
			return array();
		}

		$return = array();

		foreach ($fragen as $k => $v) {
		    $fid = intval($v['wz_id']);

		    $options = dbx::queryAll("SELECT * FROM wizard_auto_962 WHERE wz_FRAGE_ID = $fid AND wz_del = 'N' AND wz_online = 'Y' ORDER BY wz_sort ASC");

		    $options = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(962, $options);

		    $return[] = array(
		        'FRAGE' 	=> $v,
		        'OPTIONS'	=> $options
		    );
		}
		return $return;
	}


	public static function ajax_collectAnswer()
	{

		$antworten = $_REQUEST['frage'];

		print_r($antworten);

		die( ' xxx ' );


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


		// 		include ('../../datamigration/cronjob_matching.php');

	}

}
