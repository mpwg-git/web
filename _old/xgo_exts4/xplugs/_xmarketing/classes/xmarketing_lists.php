<?
class xmarketing_lists {

	private function loadExcelSupport()
	{
		require_once(dirname(__FILE__).'/../libs/PHPExcel/PHPExcel.php');
	}

	private function loadExcelExportSupport()
	{
		require_once(dirname(__FILE__).'/../libs/php-export-data/php-export-data.php');
	}


	public static function getImportFilterFields()
	{
		return array(

		'xmr_type',
		'xmr_lang',

		'xmr_canceled',
		'xmr_canceled_date',

		'xmr_email',

		'xmr_name_first',
		'xmr_name_last',

		'xmr_title_pre',
		'xmr_title_post',
		'xmr_full_salutation',

		);
	}

	public static function getDefaultExportFormat()
	{
		return array(
		'xmr_id',
		'xmr_type',
		'xmr_lang',
		'xmr_canceled',
		'xmr_canceled_date',
		'xmr_email',
		'xmr_name_first',
		'xmr_name_last',
		'xmr_title_pre',
		'xmr_title_post',
		'xmr_full_salutation',
		);
	}

	public static function getRecOfListById_Iterable($xml_id)
	{
		$xml_id = intval($xml_id);
		$sql 	= "select xm_recipients.* from xm_recipients,xm_recipients2lists where xmr_del = 'N' and xmr2l_del = 'N' and xmr2l_r_id = xmr_id and xmr2l_l_id = $xml_id";
		$roller = dbx::queryAll($sql,false);
		return $roller;
	}

	public static function getById($xml_id)
	{
		$xml_id = intval($xml_id);
		return dbx::query("select * from xm_lists where xml_id = $xml_id");
	}

	function toWebsafeURL($str, $replace=array(), $delimiter='-') {
		if( !empty($replace) ) {
			$str = str_replace((array)$replace, ' ', $str);
		}

		$clean = preg_replace(array('/Ä/', '/Ö/', '/Ü/', '/ä/', '/ö/', '/ü/'), array('Ae', 'Oe', 'Ue', 'ae', 'oe', 'ue'), $str);
		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $clean);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

		return $clean;
	}


	private static function exportListAsExcel($xml_id)
	{
		//self::loadExcelExportSupport();
		set_time_limit(0);
		ini_set('memory_limit', '128M');

		$list = self::getById($xml_id);
		if ($list === false) die('INVALID_LIST');

		$filename 			= self::toWebsafeURL($list['xml_name']).".export.excel.xml.xls";
		$filename2store 	= dirname(__FILE__).'/../tmp/'.$filename;

		//$exporter = new ExportDataExcel('browser', $filename);
		//$exporter = new ExportDataExcel('file', $filename2store);
		//$exporter->initialize(); // starts streaming data to web browser

		$fields2export 	= self::getDefaultExportFormat();
		$contatcs 		= self::getRecOfListById_Iterable($xml_id);

		$csv = array();

		// HEADER
		foreach ($fields2export as $pos_col => $f)
		{
			$line[$pos_col] = $f;
		}
		$csv[] = implode(";",$line);
		//$exporter->addRow($line);



		$maps_lang 			= dbx::queryAll("select * from fe_language where fel_del = 'N'");
		$maps_lang_assoz 	= array();

		foreach ($maps_lang as $r)
		{
			$id 				= $r['fel_id'];
			$key 				= $r['fel_ISO'];
			$maps_lang_assoz[$id] = $key;
		}


		// DATA
		foreach ($contatcs as $pos_row => $c)
		{
			$line = array();
			foreach ($fields2export as $pos_col => $f)
			{
				$value = $c[$f];
				switch ($f)
				{
					case 'xmr_lang':
						$value = $maps_lang_assoz[$value];
						break;
					default: break;
				}
				$line[$pos_col] = utf8_decode($value);
			}
			$csv[] = implode(";",$line);
			//$exporter->addRow($line);
		}

		$csv = implode("\n",$csv);

		//OUPUT HEADERS
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
		header("Content-Disposition: attachment; filename=\"export_gitgo_mailer.csv\";" );
		header("Content-Transfer-Encoding: binary");
		header("Conent-Length: ".(strlen($csv)+1));
		//echo "\xEF\xBB\xBF"; // UTF-8 BOM
		//$exporter->finalize();
		die($csv);
	}

	private static $maximumErrors 	= 20;
	private static $cacheErrors 	= false;
	private static $cacheErrorsMD5 	= false;

	public static function generateARealGoodErrorMessage($errors)
	{
		ignore_user_abort(false);

		if (self::$cacheErrorsMD5 == md5(serialize($errors)))
		{
			return self::$cacheErrors;
		}

		$mapper = array(
		'i'		=> 'Zeile',
		'e'		=> 'E-Mail',
		'f'		=> 'Feld',
		'msg'	=> 'Nachricht',
		);

		$html_error = "";
		$html_error .= "<table class='errorTableImport'>";
		foreach ($errors as $i => $e)
		{
			if ($i == 0)
			{
				$html_error .= "<tr>";
				$html_error .= "<td>Fehler #</td>";
				foreach ($mapper as $k => $v)
				{
					$html_error .= "<td>$v</td>";
				}
				$html_error .= "</tr>";
			}

			$html_error .= "<tr>";
			$html_error .= "<td>$i</td>";
			foreach ($mapper as $k => $v)
			{
				if (!isset($e[$k])) $e[$k] = '-';
				$e[$k] = ($e[$k]);
				$html_error .= "<td>".($e[$k])."</td>";
			}
			$html_error .= "</tr>";
		}
		$html_error .= "</table>";
		$html_error .= "<br>Es werden maximal ".self::$maximumErrors." Fehler angezeigt.";

		self::$cacheErrors 		= $html_error;
		self::$cacheErrorsMD5 	= md5(serialize($errors));

		return $html_error;
	}

	public static function updateImportStates($xmli_id,$row_index,$states)
	{
		$xmli_id = xmarketing_security::safe_list_import_id($xmli_id);

		// UPDATE - DB - FOR ASYNC STATUS CALLS
		$states['E'] = intval($states['E']);
		$states['I'] = intval($states['I']);
		$states['U'] = intval($states['U']);
		$states['N'] = intval($states['N']);


		$html_error = self::generateARealGoodErrorMessage($states['ERROR']);

		self::handleUpload_update($xmli_id,array(
		'xmli_state_new'		=> $states['I'],
		'xmli_state_updated'	=> $states['U'],
		'xmli_state_failures'	=> $states['E'],
		'xmli_state_nochanges'	=> $states['N'],
		'xmli_processed_line'	=> $row_index,
		'xmli_errors'			=> $html_error
		));
	}

	private static function parsingError($xmli_id,$message)
	{
		self::handleUpload_update($xmli_id,array(
		'xmli_errors'	=> $message,
		'xmli_state'	=> 'CANCELED'
		));
	}

	public static function importIntoListReadExcel($xmli_id)
	{
		$xmli_id = xmarketing_security::safe_list_import_id($xmli_id);

		$state = self::getImportInfoById($xmli_id);

		if ($state['xmli_state'] != "UPLOADED") {
			//		return false;
		}



		self::handleUpload_update($xmli_id,array('xmli_state'=>'PROCESSING'));

		set_time_limit(0);
		libx::load_excelReader();

		$settings				= self::getImportInfoById($xmli_id);

		$xmli_type				= strtoupper(trim($settings['xmli_type']));
		$xlsxfile2parse			= self::getFileNameBy_xmli_id($xmli_id);
		$xml_id					= intval($settings['xmli_l_id']);
		$xmr_s_id				= intval($settings['xmli_s_id']);

		$Reader 				= new SpreadsheetReader($xlsxfile2parse);
		$fields2Import 			= self::getImportFilterFields();

		$resultOfImportOverall 	= array('ERRORS'=>array());
		$mapper 				= array();

		$overallState			= "OK";

		// Parsing Check
		$minFields						= self::importValidFields();
		$duplicates						= array();
		$duplicates_found				= array();



		foreach ($Reader as $row_index => $Row)
		{

			//
			//	FIRST LINE
			//
			if ($row_index == 0)
			{

				foreach ($Row as $col => $colName)
				{
					if (in_array($colName,$fields2Import))
					{
						if (isset($mapper[$colName])) {
							self::parsingError($xmli_id,"Mehrmaliges vorkommen von $colName in der ersten Zeile. Import der Liste nicht möglich.");
							return false;
						}
						$mapper[$colName] = $col;
					}
				}

				foreach ($minFields as $k => $dummy)
				{
					if (!isset($mapper[$k])) {
						self::parsingError($xmli_id,"Das Feld '$k' kommt nicht in der ersten Zeile vor. Import der Liste nicht möglich.");
						return false;
					}
				}

				continue;
			}

			//
			// DATA - CRAWLERRRRR
			//
			$db = array();
			foreach ($mapper as $k => $col)
			{
				$db[$k] = dbx::escape(utf8_encode((trim($Row[$col]))));
			}


			//list($vor,$nach) = explode("@",$db['xmr_email']);
			$email_key = $db['xmr_email'];

			if (isset($duplicates[$email_key]))
			{
				if (!isset($duplicates_found[$email_key])) $duplicates_found[$email_key] = 0;
				$duplicates_found[$email_key]++;
			}

			$duplicates[$email_key] = 1;


			$feedback 	= self::importRawDataIntoList($xmli_type,$xmli_id,$db,$xml_id,$xmr_s_id);

			if (is_array($feedback))
			{
				$overallState	= "ERROR";
				$state 			= 'E';

				if (count($resultOfImportOverall['ERROR']) < self::$maximumErrors)
				{
					$xmr_email		= $db['xmr_email'];
					$error_field	= $feedback['FIELD'];
					$error_message	= $feedback['ERROR'];
					$resultOfImportOverall['ERROR'][] = array('e'=>$xmr_email,'f'=>$error_field,'msg'=>$error_message,'i'=>$row_index);
				}
			} else
			{
				$state = $feedback;
			}

			if (!isset($resultOfImportOverall[$state])) $resultOfImportOverall[$state] = 0;
			$resultOfImportOverall[$state]++;

			if ($row_index%20 == 0){
				self::updateImportStates($xmli_id,$row_index,$resultOfImportOverall);
			}
		}

		self::updateImportStates($xmli_id,$row_index,$resultOfImportOverall);
		//echo hdx::bytes2HumanReadAble(memory_get_peak_usage());

		$xmli_state_duplicates_mails = self::buildUpDuplikateHtml($duplicates_found);

		self::handleUpload_update($xmli_id,array(
		'xmli_state'					=> $overallState,
		'xmli_state_duplicates'			=> count($duplicates_found),
		'xmli_state_duplicates_mails'	=> $xmli_state_duplicates_mails
		));


		dbx::update('xm_lists',array('xml_remote_latest_sync'=>'NOW()'),array('xml_id'=>$xml_id));


		return true;
	}

	private static function buildUpDuplikateHtml($dups)
	{
		$ret = "";
		$ret .= "<table class='errorTableImport'>";
		$ret .= "<tr><td>E-Mail</td><td>Enthalten in der Liste</td></tr>";

		foreach ($dups as $email => $cnt)
		{
			$cnt++;
			$ret .= "<tr><td>$email</td><td>$cnt</td></tr>";
		}

		$ret .= "</table>";

		return $ret;
	}

	public static function userExistsByEMail($xmr_email,$xmr_s_id)
	{
		$xmr_s_id 	= intval($xmr_s_id);
		$xmr_email 	= dbx::escape($xmr_email);
		return dbx::query("select * from xm_recipients where xmr_email = '$xmr_email' and xmr_del='N' and xmr_s_id=$xmr_s_id");
	}

	public static function joinRec2List($xmr_id,$xml_id)
	{
		$xmr_id 	= intval($xmr_id);
		$xml_id 	= intval($xml_id);
		$xmr2l_s_id	= xmarketing_config::getCurrentSiteId();

		$present = dbx::query("select * from xm_recipients2lists where xmr2l_r_id = $xmr_id and xmr2l_l_id = $xml_id and xmr2l_del = 'N' and xmr2l_s_id = $xmr2l_s_id");

		$db = array(
		'xmr2l_r_id' => $xmr_id,
		'xmr2l_l_id' => $xml_id,
		'xmr2l_s_id' => $xmr2l_s_id,
		);

		if ($present === false)
		{
			dbx::insert('xm_recipients2lists',$db);
			return 1;
		}

		return 0;
	}

	public static function importValidFields()
	{

		$fields = array(

		'xmr_type' 		=> array(
		'xtype'			=> 'ENUM',
		'valid_values'	=> array('W','M','F','C','X'),
		'sanity' 		=> array('UPPERCASE','TRIM'),
		'human_error'	=> 'ungültiger Typ:<br>X => Unbekannt<br>C od. Firma => Firma<br>M od. Herr => Mann<br>W od. Frau =>Frau<br>F od. Familie od. Family =Familie',

		'mappers'		=> array(
		''			=> 'X',
		'HERR'		=> 'M',
		'FRAU'		=> 'W',
		'MÄNNLICH'	=> 'M',
		'WEIBLICH'	=> 'W',
		'FAMILIE'	=> 'F',
		'FIRMA'		=> 'C',
		)

		),

		'xmr_lang' => array(

		'xtype'				=> 'DB_CHECK',
		'db_table'			=> 'fe_language',
		'db_key'			=> 'fel_id',
		'db_value_equals' 	=> 'fel_ISO',
		'sanity' 			=> array('UPPERCASE','TRIM'),
		'human_error'		=> 'Ungültige Sprache',
		'mappers'			=> array(
		''					=> 'DE',
		)

		),

		'xmr_email' => array(
		'xtype'				=> 'MAP',
		'sanity' 			=> array('LOWERCASE','TRIM'),
		),

		);

		return $fields;
	}

	public static function parseDataAndCheckIfGood($db)
	{
		$status 		= 'OK';
		$clean_db 		= array();

		$checkFields	= self::importValidFields();
		$importFields 	= self::getImportFilterFields();

		foreach ($importFields as $f) {
			if (isset($checkFields[$f])) continue;
			$clean_db[$f] = $db[$f];
		}

		$email = trim($db['xmr_email']);
		if (!xmarketing_security::isValidEmail($email))
		{
			return array('status'=>'E','FIELD'=>'xmr_email','ERROR'=>'INVALID');
		}

		$xmr_canceled = (strtoupper($db['xmr_canceled']) == 'Y');

		if (($xmr_canceled) && ( $email != "" )) {

			$clean_db = array(
			'xmr_email' 		=> $email,
			'xmr_canceled' 		=> 'Y',
			'xmr_canceled_date' => $db['xmr_canceled_date'],
			);

			return array('status'=>'OK','db'=>$clean_db);
		}

		// UNSET xmr_canceled if == N
		if (isset($clean_db['xmr_canceled']))
		{
			unset($clean_db['xmr_canceled']);
		}
		
		foreach ($checkFields as $k => $settings)
		{

			$human_error	= $settings['human_error'];
			$value 			= $db[$k];

			// SANITY
			if (is_array($settings['sanity']))
			{
				$sanity = $settings['sanity'];
				foreach ($sanity as $san)
				{
					switch ($san)
					{
						case 'TRIM':
							$value = trim($value);
							break;
						case 'UPPERCASE':
							$value = strtoupper($value);
							break;
						case 'LOWERCASE':
							$value = strtolower($value);
							break;
						default: break;
					}
				}
			}

			// CHECK
			switch ($settings['xtype'])
			{
				case 'ENUM':

					if (!in_array($value,$settings['valid_values'])) {
						if (isset($settings['mappers'])){
							$mappers = $settings['mappers'];
							if (isset($mappers[$value])) {
								$value = $mappers[$value];
							}
						}
					}

					if (!in_array($value,$settings['valid_values'])) {
						return array('status'=>'E','FIELD'=>$k,'ERROR'=>"Wert : '".$value."' ist ein ".$human_error);
					}

					$clean_db[$k] = $value;

					break;
				case 'DB_CHECK':

					$db_table 			= $settings['db_table'];
					$db_key 			= $settings['db_key'];
					$db_value_equals	= $settings['db_value_equals'];


					if (isset($settings['mappers'])){
						$mappers = $settings['mappers'];
						if (isset($mappers[$value])) {
							$value = $mappers[$value];
						}
					}

					$value 	= dbx::escape($value);
					$sql 	= "select $db_key as db_key from $db_table where $db_value_equals = '$value'";
					$res	= dbx::query($sql);

					if ($res === false)
					{
						return array('status'=>'E','FIELD'=>$k,'ERROR'=>$human_error.' - '.$value);
					}

					$clean_db[$k] = $res['db_key'];

					break;
				case 'MAP':
					$clean_db[$k] = $value;
					break;
				default: break;
			}
		}

		return array('status'=>$status,'db'=>$clean_db);
	}

	public static function importRawDataIntoList($xmli_type,$xmli_id,$db,$xml_id,$xmr_s_id)
	{
		$feedback = self::parseDataAndCheckIfGood($db);

		$xml_id 	= intval($xml_id);
		$xmr_s_id 	= intval($xmr_s_id);

		if ($feedback['status'] == 'E') {
			return $feedback;
		} else
		{
			$db = $feedback['db'];
		}

		$xmr_email 		= $db['xmr_email'];
		$db['xmr_s_id'] = $xmr_s_id;
		$present 		= self::userExistsByEMail($xmr_email,$xmr_s_id);

		if ($present === false)
		{
			if ($db['xmr_canceled'] != 'Y') {
				$db['xmr_canceled'] = "N";
			}
			$db['xmr_created'] 	= "NOW()";
			dbx::insert('xm_recipients',$db);
			$xmr_id = dbx::getLastInsertId();
			xmarketing_recipients::updateHistoryInsert($xmr_id,$xmli_id);
			self::joinRec2List($xmr_id,$xml_id);
			return 'I';

		} else // UPDATE OR NO UPDATE
		{

			$xmr_id 		= $present['xmr_id'];
			
			if ($xmli_type == "REMOTE") { // NUR EMAIL CHECK - und AUS....

				if ($db['xmr_canceled'] == 'Y') {
					$cancler = array('xmr_canceled'=>'Y','xmr_canceled_date'=>$db['xmr_canceled_date']);
					xmarketing_recipients::updateHistory($xmr_id,$cancler,"Storniert durch Import #$xmli_id",$xmli_id);
					dbx::update('xm_recipients',$cancler,array('xmr_id'=>$xmr_id));
				}
				return "N";
			}
			$changesDone 	= xmarketing_recipients::changesDoneOrNot($xmr_id,$db,true);

			self::joinRec2List($xmr_id,$xml_id);

			if ($changesDone === false) {
				return "N";
			}

			xmarketing_recipients::updateHistory($xmr_id,$db,"Aktualisierung durch Import #$xmli_id",$xmli_id);
			dbx::update('xm_recipients',$db,array('xmr_id'=>$present['xmr_id']));
			return 'U';
		}
	}

	private static function handleUpload_error($xmli_id,$error_message,$die=true)
	{
		$xmli_id = intval($xmli_id);
		dbx::update('xm_lists_import',array('xmli_state'=>'ERROR','xmli_state_detail'=>$error_message),array('xmli_id'=>$xmli_id));
		if ($die)
		{
			die(json_encode(array('success'=>false,'error'=>$error_message)));
		}
	}
	private static function handleUpload_update($xmli_id,$data)
	{
		$xmli_id = intval($xmli_id);
		return dbx::update('xm_lists_import',$data,array('xmli_id'=>$xmli_id));
	}

	private static function getFileNameBy_xmli_id($xmli_id)
	{
		$file_final = dirname(__FILE__).'/../uploadStorage/'.$xmli_id.".csv";
		return $file_final;
	}

	public static function handleUpload($useThisFile=false,$xml_id=false,$xmli_s_id=false)
	{
		if ($useThisFile === false)
		{
			$fileRecord = $_FILES['upload_xlsx'];
			$file_tmp 	= $fileRecord['tmp_name'];
			$file_name 	= $fileRecord['name'];
		} else
		{
			$file_tmp 	= $useThisFile;
			$file_name 	= basename($useThisFile);
		}

		if ($xml_id === false)
		{
			$xml_id = xmarketing_security::safe_list_id($_REQUEST['xml_id']);
		}

		if ($xmli_s_id === false)
		{
			$xmli_s_id = xmarketing_config::getCurrentSiteId();
		}

		$db = array(
		'xmli_type'		 => ($useThisFile === false) ? 'LOCAL' : 'REMOTE',
		'xmli_s_id'	 	 => intval($xmli_s_id), // NO SEC CHECK
		'xmli_file_name' => $file_name,
		'xmli_file_size' => filesize($file_tmp),
		'xmli_state'	 => 'UPLOADED',
		'xmli_ip'		 => libx::getIp(),
		'xmli_host'		 => libx::getHost(),
		'xmli_createdBy' => xmarketing_security::getUserId(),
		'xmli_created' 	 => 'NOW()',
		'xmli_l_id' 	 => $xml_id
		);

		dbx::insert('xm_lists_import',$db);
		$xmli_id = dbx::getLastInsertId();

		if ($useThisFile === false)
		{
			if (!hdx::isExtension($file_name,'csv')) {
				self::handleUpload_error($xmli_id,'Es werden nur Excel (.csv) - Datein unterstützt.');
			}
		}

		$file_final = self::getFileNameBy_xmli_id($xmli_id);

		if (file_exists($file_final))
		{
			@unlink($file_final);
		}


		if ($useThisFile === false)
		{
			if (!move_uploaded_file($file_tmp, $file_final))
			{
				self::handleUpload_error($xmli_id,'Datei konnte nicht verschoben werden.');
			}
		} else
		{
			if (!rename($file_tmp, $file_final))
			{
				self::handleUpload_error($xmli_id,'Remote-Datei konnte nicht verschoben werden.',false);
				return false;
			}
		}

		$ret = array('success' => true, 'xmli_id' => $xmli_id);
		return $ret;
	}

	private static function getImportInfoById($xmli_id)
	{
		$xmli_id = xmarketing_security::safe_list_import_id($xmli_id);
		return dbx::query("select * from xm_lists_import where xmli_id = $xmli_id");
	}

	private static function startImport($xmli_id)
	{
		$xmli_id = xmarketing_security::safe_list_import_id($xmli_id);
		set_time_limit(0);
		ignore_user_abort(true);
		$stats = self::importIntoListReadExcel($xmli_id);
		return $stats;
	}

	private static function handleImportOverViewGrid($xml_id)
	{
		$s_id 	= intval(xmarketing_config::getCurrentSiteId());
		$xml_id =  xmarketing_security::safe_list_id($xml_id);
		$nodes = dbx::queryAll("select * from xm_lists_import where xmli_s_id = $s_id and xmli_l_id=$xml_id and xmli_del='N' order by xmli_id DESC");
		if ($totalCount === false) $totalCount = count($nodes);
		frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
	}

	private static function updateRecordViaBackend()
	{
		$xml_id =  xmarketing_security::safe_list_id($_REQUEST['xml_id']);
		$ret 	= array();

		$fields = array(
		'xml_type',
		'xml_remote_endpoint_sync',
		'xml_remote_endpoint_sync_min',
		'xml_remote_endpoint_url',
		'xml_remote_endpoint_security',
		);

		$db = array();
		foreach ($fields as $f)
		{
			$db[$f] = $_REQUEST[$f];
		}

		if ($db['xml_remote_endpoint_url'] != "")
		{
			$db['xml_remote_endpoint_url'] = xmarketing_security::safe_url($db['xml_remote_endpoint_url']);
		}

		dbx::update('xm_lists',$db,array('xml_id'=>$xml_id));

		$ret = array('r'=>$db);
		frontcontrollerx::json_success($ret);
	}

	public static function getMinimumRemoteCollectionTimeDelay()
	{
		return 1440;
	}

	public static function getAllRemoteListsForSyncNow($minutesNotPopped=false)
	{
		$minDelay = self::getMinimumRemoteCollectionTimeDelay();

		if ($minutesNotPopped === false) $minutesNotPopped = $minDelay;
		$minutesNotPopped = intval($minutesNotPopped);
		if ($minutesNotPopped < $minDelay) $minutesNotPopped = $minDelay;

		$sql = "select * from xm_lists where xml_type='REMOTE' and xml_remote_endpoint_sync = 'ACTIVE' and  xml_del='N' and xml_remote_endpoint_sync='ACTIVE' and (DATE_ADD(xml_remote_latest_sync,INTERVAL $minutesNotPopped MINUTE) < NOW() OR (xml_remote_latest_sync = '0000-00-00 00:00:00')) ORDER BY xml_remote_latest_sync ASC LIMIT 10";
		$all = dbx::queryAll($sql);
		return $all;
	}

	private static function getSyncMasterKey()
	{
		return "öldskäöl4k53453m5.,34m5.,34m5ölk34öl5k3öl4k5öl34k5öl3k4öl5kl121212212äölds";
	}

	public static function getRemoteCalls($function)
	{
		switch ($function)
		{
			case 'doTheJob':
				$xml_id 	= xmarketing_security::safe_list_id($_REQUEST['xml_id']);
				self::collectRemoteList($xml_id,true);
				frontcontrollerx::json_success();
				break;
			case 'load':

				$s_id 		= intval(xmarketing_config::getCurrentSiteId());
				$xml_id 	= xmarketing_security::safe_list_id($_REQUEST['xml_id']);

				$nodes = dbx::queryAll("select * from xm_lists_remote where xmlr_s_id = $s_id and xmlr_cfg_xml_id=$xml_id and xmlr_del='N' order by xmlr_id DESC");
				if ($totalCount === false) $totalCount = count($nodes);
				frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));

				break;
			default: die("TTT");
		}
	}

	public static function collectRemoteList($xml_id,$manualCall=false)
	{
		$xml_id 							= xmarketing_security::safe_list_id($xml_id);
		$settings 							= self::getById($xml_id);

		$xml_remote_endpoint_sync			= $settings['xml_remote_endpoint_sync'];
		$xml_remote_endpoint_url			= $settings['xml_remote_endpoint_url'];
		$xml_remote_endpoint_security		= $settings['xml_remote_endpoint_security'];
		$xmlr_s_id							= $settings['xml_s_id'];

		$xmlr_pre_check = "OK";

		if (!xmarketing_security::isValidUrl($xml_remote_endpoint_url))
		{
			$xmlr_pre_check 							= "INVALID_URL";
		}elseif ($xml_remote_endpoint_url == "")
		{
			$xmlr_pre_check 							= "EMPTY_URL";
		}elseif ($xml_remote_endpoint_sync != "ACTIVE")
		{
			$xmlr_pre_check 							= "NOT_ACTIVE";
		}

		if ($xmlr_pre_check != "OK") 	{
			$db = array(
			'xmlr_caller'				=> ($manualCall) ? 'MANUAL' : 'AUTO',
			'xmlr_s_id' 				=> $xmlr_s_id,
			'xmlr_ts_fetch' 			=> 'NOW()',
			'xmlr_created' 				=> 'NOW()',
			'xmlr_ts_download_start' 	=> 'NOW()',
			'xmlr_ts_download_time' 	=> '-1',
			'xmlr_pre_check' 			=> $xmlr_pre_check,
			'xmlr_cfg_url' 				=> $xml_remote_endpoint_url,
			'xmlr_cfg_secret' 			=> $xml_remote_endpoint_security,
			'xmlr_cfg_xml_id' 			=> $xml_id,
			'xmlr_xmli_id' 				=> -1,
			'xmlr_cfg_xml_id'			=> $xml_id
			);
			dbx::insert('xm_lists_remote',$db);
			return false;
		}

		if (strpos($xml_remote_endpoint_url,"?")===false) $xml_remote_endpoint_url .= "?_d_=dummy";
		$xml_remote_endpoint_url .= '&secret=' . md5(self::getSyncMasterKey().$xml_remote_endpoint_security);

		$db = array(
		'xmlr_caller'				=> ($manualCall) ? 'MANUAL' : 'AUTO',
		'xmlr_s_id' 				=> $xmlr_s_id,
		'xmlr_ts_fetch' 			=> 'NOW()',
		'xmlr_ts_download_start' 	=> 'NOW()',
		'xmlr_created' 				=> 'NOW()',
		'xmlr_ts_download_time' 	=> '-1',
		'xmlr_pre_check' 			=> 'DOWNLOADING',
		'xmlr_cfg_url' 				=> $xml_remote_endpoint_url,
		'xmlr_cfg_secret' 			=> $xml_remote_endpoint_security,
		'xmlr_cfg_xml_id' 			=> $xml_id,
		'xmlr_xmli_id' 				=> -1,
		);

		dbx::insert('xm_lists_remote',$db);
		$xmlr_id = dbx::getLastInsertId();

		// UPDATE in case of errors etc syncing all the time
		dbx::update('xm_lists',array('xml_remote_latest_sync'=>'NOW()'),array('xml_id'=>$xml_id));


		$feedback					= file_get_contents($xml_remote_endpoint_url);

		list($header,$crap)			= explode("\n",$feedback,2);
		$crap = "";
		if (strpos($header,"xmr_email") === false)
		{
			$xmlr_error = dbx::escape(str_replace("'","\\'",$feedback));
			dbx::query("update xm_lists_remote set xmlr_error='$xmlr_error', xmlr_pre_check = 'NOK', xmlr_ts_download_time = TIME_TO_SEC(TIMEDIFF(NOW(),xmlr_ts_download_start)) where xmlr_id = $xmlr_id");
			return false;
		}
		else
		{
			dbx::query("update xm_lists_remote set xmlr_pre_check = 'OK', xmlr_ts_download_time = TIME_TO_SEC(TIMEDIFF(NOW(),xmlr_ts_download_start)) where xmlr_id = $xmlr_id");
		}

		$file2store = self::getDownloadFileName4RemoteFilesById($xmlr_id);
		$state = hdx::fwrite($file2store,$feedback);

		if ($state === false)
		{
			dbx::update("xm_lists_remote",array('xmlr_pre_check'=>'ERROR_STORING_DOWNLOAD'),array('xmlr_id'=>$xmlr_id));
			return false;
		}



		$ret 		= self::handleUpload($file2store,$xml_id,$settings['xml_s_id']);
		$xmli_id 	= intval($ret['xmli_id']);

		if (($ret === false) || ($xmli_id == 0)){
			dbx::update("xm_lists_remote",array('xmlr_pre_check'=>'UPLOAD_HANDLER_ERROR'),array('xmlr_id'=>$xmlr_id));
			return false;
		}

		dbx::update("xm_lists_remote",array('xmlr_xmli_id'=>$xmli_id),array('xmlr_id'=>$xmlr_id));

		$feedback 	= self::startImport($xmli_id);
		return true;
	}

	private static function getDownloadFileName4RemoteFilesById($xmlr_id)
	{
		return dirname(__FILE__).'/../downloadedRemoteLists/remote_file_'.$xmlr_id.'.csv';
	}


	private static function checkRemoteList($xml_id)
	{
		$xml_id 					= xmarketing_security::safe_list_id($xml_id);
		$settings 					= self::getById($xml_id);
		$xml_remote_endpoint_url 	= xmarketing_security::safe_url($settings['xml_remote_endpoint_url']);

		$feedback					= file_get_contents($xml_remote_endpoint_url);
		list($header,$crap)			= explode("\n",$feedback,2);
		$crap = "";

		if (strpos($header,"xmr_email") === false)
		{
			frontcontrollerx::json_failure("Keine gültige CSV-Daten konnten empfangen werden !");
		}

		if ($settings['xml_remote_endpoint_sync'] != 'ACTIVE')
		{
			frontcontrollerx::json_failure("Einstellungen korrekt, jedoch ist der Synchronisierung inaktiv !");
		}

		frontcontrollerx::json_success();
		die($feedback);
	}

	private static function handleSpecialsCommands($function)
	{
		switch ($function)
		{
			case 'checkRemoteList2':
				self::collectRemoteList(690);
				break;
			case 'checkRemoteList':
				$xml_id =  xmarketing_security::safe_list_id($_REQUEST['xml_id']);
				self::checkRemoteList($xml_id);
				break;
			case 'updateRecord':
				self::updateRecordViaBackend();
				die();
				break;
			case 'getById':
				$xml_id =  xmarketing_security::safe_list_id($_REQUEST['xml_id']);
				$d = self::getById($xml_id);
				frontcontrollerx::json_success(array('record'=>$d));
				break;
			case 'load_import':
				$xml_id =  xmarketing_security::safe_list_id($_REQUEST['xml_id']);
				self::handleImportOverViewGrid($xml_id);
				break;
			case 'startImport':
				$xmli_id = xmarketing_security::safe_list_import_id($_REQUEST['xmli_id']);
				self::startImport($xmli_id);
				die();
				break;
			case 'getImportState':
				$xmli_id = xmarketing_security::safe_list_import_id($_REQUEST['xmli_id']);
				$data = self::getImportInfoById($xmli_id);
				frontcontrollerx::json_success($data);
				break;
			case 'uploadExcel':
				$ret = self::handleUpload();
				die(json_encode($ret));
				break;
			case 'import':
				//self::startImport(22);
				//self::importIntoListReadExcel(688,self::getFileNameBy_xmli_id(22));
				break;
			case 'export':
				set_time_limit(0);
				$xml_id = xmarketing_security::safe_list_id($_REQUEST['xml_id']);
				self::exportListAsExcel($xml_id);
				die();
				break;
			default: break;
		}
	}

	public static function handleAjax($function)
	{

		self::handleSpecialsCommands($function);

		$fields = array('xml_id','xml_vid','xml_name','xml_lastmod','xml_lastmodBy','xml_sort');
		$update = array('xml_name');
		$string = array('xml_name');
		$int 	= array();

		// insert Check SiteId
		$xml_s_id = xmarketing_config::getCurrentSiteId();

		$extFunctionsConfig = array(
		'table'		=> 'xm_lists',
		'sort'		=> 'xml_sort',
		'pid'		=> 'xml_id',
		'fid'		=> 'xml_fid',
		'name'		=> 'xml_name',
		'del'		=> 'xml_del',



		'extraInsertFlyInt' => array(),
		'extraLoad'			=> " xml_s_id = '$xml_s_id' ",
		'extraInsert' 		=> array('xml_created' => 'NOW()','xml_s_id' => $xml_s_id),

		'fields'	=> $fields,
		'update'	=> $update,

		'normalize'	=> array(
		'string'	=> $string,
		'int'		=> $int
		),

		'postHooks' 		=> array(
		));

		xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$function);

	}
}