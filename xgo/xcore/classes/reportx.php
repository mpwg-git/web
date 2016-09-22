<?

class reportx
{

	const version = "3.0";

	const cannot_create_db_table 	= "CANNOT_CREATE_DB-LOG-TABLE : ";
	const cannot_create_log_file 	= "CANNOT_CREATE_LOG-FILE : ";
	const cannot_send_mail 			= "CANNOT_SEND_INFO-MAIL : ";

	private static function _fixNamesSpace($namespace)
	{
		$namespace = strtolower(trim($namespace));
		if ($namespace == "") $namespace = "unkown";
		return $namespace;
	}

	private static function _findBackTraceScope($namespace,$backInTime=0)
	{
		$lines = debug_backtrace();


		switch ($namespace)
		{
			case 'dbx':
				$back2go = 3;
				break;
			default:
				$back2go = 2;
				break;
		}

		$lines = array_slice($lines,$backInTime+$back2go);

		$file 			= $lines[0]['file'];
		$line 			= $lines[0]['line'];
		$fn 			= $lines[0]['function'];
		$args 			= $lines[0]['args'];

		$scope 			= 10;

		$scope_start 	= $line-$scope;
		$scope_stop 	= $line+$scope;
		if ($scope_start < 0) $scope_start = 0;

		$src = file($file);
		$src_fragment = array();
		for ($l=$scope_start;$l<$scope_stop;$l++)
		{

			$linex = $src[$l];
			if ($l == ($line-1)) {
				$linex = str_replace($fn,"<font color=red><b><u>$fn</u></b></font>",$linex);

				foreach ($args as $arg)
				{
					$linex = str_replace($arg,"<font color=blue><b>$arg</b></font>",$linex);
				}

				$linex = "<div style='background-color:orange;color:white;font-size:16;'><br>$linex<br></div>";
			}
			$src_fragment[] = $linex;
		}

		return implode("",$src_fragment);
	}

	public static function error($namespace,$human_readable,$no=0,$detail='',$die=true,$backInTime=0)
	{
		$traceOfSource 	= self::_findBackTraceScope($namespace,$backInTime);
		$namespace 		= self::_fixNamesSpace($namespace);

		$dbtr = debug_backtrace();
		$backInTime = 0;
		if ($backInTime > 0)
		{
			$dbtr = array_slice($dbtr,$backInTime);
		}

		//$db = '';
		$db = htmlspecialchars(print_r($dbtr,true));
		
		$detailN = $detail;
		$detail .= "<br>".nl2br($traceOfSource)."<br><pre>".$db."</pre>";

		self::_log2file('ERROR',	$namespace,$human_readable,$no,$detail,true);
		//self::_log2db('ERROR',		$namespace,$human_readable,$no,$detail,true);
		self::_log2mail('ERROR',	$namespace,$human_readable,$no,$detail,true);

		if ($die)
		{

			if (libx::jsonFeedback_ISON())
			{
				if (libx::isDeveloper())
				{
					libx::json_debug(array(
					'NS:'=>$namespace,
					'HR:'=>$human_readable,
					'DETAIL:'=>$detail
					));
				}
				libx::json_failure("DB-ERROR");
			}

			$html = self::_genInfoHtml(libx::isDeveloper(),'ERROR',$namespace,$human_readable,$no,$detailN,$traceOfSource);
			die($html);
		}
	}

	public static function warning($namespace,$human_readable,$no=0,$detail='')
	{
		$namespace = self::_fixNamesSpace($namespace);
		self::_log2file('WARNING',$namespace,$human_readable,$no,$detail,true);
		self::_log2db('WARNING',$namespace,$human_readable,$no,$detail,true);
		self::_log2mail('WARNING',$namespace,$human_readable,$no,$detail,true);
	}

	public static function info($namespace,$human_readable,$no=0,$detail='')
	{
		$namespace = self::_fixNamesSpace($namespace);
		self::_log2file('INFO',$namespace,$human_readable,$no,$detail,false);
		self::_log2db('INFO',$namespace,$human_readable,$no,$detail,false);
		self::_log2mail('INFO',$namespace,$human_readable,$no,$detail,false);
	}

	/* ****************************************************************************
	* INTERNALS
	*/

	private static function _getPathOfTemplates()
	{
		return dirname(__FILE__).'/../templates';
	}

	private static function _genInfoTxt($developerInfo,$type,$namespace, $human_readable, $no, $detail)
	{

		// update, if user sees, ERROR NO ! SHOULD BE SHOWN, STACKTRACE with data

		$dev = ($developerInfo) ? 'dev' : 'norm';
		return templatex::render(self::_getPathOfTemplates()."/core_error_txt_$dev.tpl",array(
		'type' 			=> $type,
		'namespace' 	=> $namespace,
		'error' 		=> $human_readable,
		'errorNo' 		=> $no,
		'errorDetail' 	=> $detail,
		'ip'			=> libx::getIp(),
		'host'			=> libx::getHost(),
		'ts'			=> date('d.m.Y H:i:s')
		));
	}

	private static function _genInfoHtml($developerInfo,$type,$namespace, $human_readable, $no, $detail,$traceOfSource="")
	{

		// update, if user sees, ERROR NO ! SHOULD BE SHOWN, STACKTRACE with data

		$dev = ($developerInfo) ? 'dev' : 'norm';
		try{
			return templatex::renderBase64ImageIncluded(self::_getPathOfTemplates()."/core_error_html_$dev.tpl",array(
			'type' 			=> $type,
			'namespace' 	=> $namespace,
			'error' 		=> $human_readable,
			'errorNo' 		=> $no,
			'errorDetail' 	=> $detail,
			'traceInCode'	=> $traceOfSource,
			'ip'			=> libx::getIp(),
			'host'			=> libx::getHost(),
			'ts'			=> date('d.m.Y H:i:s')
			));
		} catch (Exception $e)
		{
			echo "<pre>";
			echo "FATAL XCORE-ERROR-TEMPLATE-CANNOT-BE-BUILD :: ".$e->getMessage();
			echo "</pre>";
		}
	}

	private static function _genInfoMail($developerInfo,$type,$namespace, $human_readable, $no, $detail)
	{

		// update, if user sees, ERROR NO ! SHOULD BE SHOWN, STACKTRACE with data

		$dev = ($developerInfo) ? 'dev' : 'norm';
		return templatex::render(self::_getPathOfTemplates()."/core_error_html_$dev.tpl",array(
		'type' 			=> $type,
		'namespace' 	=> $namespace,
		'error' 		=> $human_readable,
		'errorNo' 		=> $no,
		'errorDetail' 	=> $detail,
		'ip'			=> libx::getIp(),
		'host'			=> libx::getHost(),
		'ts'			=> date('d.m.Y H:i:s')
		));
	}

	private static function _genInfoJson($developerInfo,$namespace,$human_readable,$no=0,$detail='')
	{

	}

	/* ****************************************************************************
	* REAL LOGGING
	*/

	private static function _log2file($type,$namespace, $human_readable, $no, $detail, $dieIfNotWriteable=true)
	{

		@mkdir(Ixcore::htdocsRoot . '/xgo/xcore/logs');
		$filename 	= dirname(__FILE__).'/../logs/'.$namespace.".log";
		$ip			= libx::getIp();
		$host		= libx::getHost();

		$write2log = date("[d/m/y|H:i:s]")."[$ip|$host] - $type - $human_readable\t$no\t$detail.\n";

		if (!$handle = @fopen($filename, "a")) {
			if ($dieIfNotWriteable){
				die(self::cannot_create_log_file . basename($filename));
			} else
			{
				return false;
			}
		}

		if (!@fwrite($handle, $write2log)) {
			if ($dieIfNotWriteable){
				die(self::cannot_create_log_file . basename($filename));
			} else
			{
				return false;
			}
		}

		fclose($handle);

		return true;
	}


	private static function _checkIfDBExists($dieIfNotInserted)
	{
		$tableName = Ixcore::REPORTING_USE_DB_NAME;

		$sqlCreate = "
CREATE TABLE IF NOT EXISTS `$tableName` (
  `xir_id` int(11) NOT NULL AUTO_INCREMENT,
  `xir_ns` varchar(255) NOT NULL,
  `xir_type` enum('ERROR','INFO','WARNING') NOT NULL,
  `xir_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xir_ip` int(11) NOT NULL,
  `xir_host` int(11) NOT NULL,
  `xir_hr` varchar(255) NOT NULL,
  `xir_no` varchar(255) NOT NULL,
  `xir_error` text NOT NULL,
  PRIMARY KEY (`xir_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
";


		$exists = dbx::query("show tables like '$tableName';");
		if ($exists === false)
		{
			dbx::query($sqlCreate);
			$exists = dbx::query("show tables like '$tableName';");
			if ($exists === false)
			{
				$error = self::cannot_create_db_table . $tableName;
				self::_log2file('ERROR','system',$error,-1,-1,$dieIfNotInserted);
				self::_log2mail('ERROR','system',$error,-1,-1,$dieIfNotInserted);
				return false;
			}
		}

		return true;
	}


	public static function log2db($type, $namespace, $human_readable, $no, $detail)
	{
		self::_log2db($type, $namespace, $human_readable, $no, $detail);
	}
	
	private static function _log2db($type, $namespace, $human_readable, $no, $detail, $dieIfNotInserted=true)
	{
		return true;
		if (!Ixcore::REPORTING_USE_DB) return true;

		$tableName = Ixcore::REPORTING_USE_DB_NAME;

		if (!self::_checkIfDBExists($dieIfNotInserted))
		{
			if ($dieIfNotInserted) die(self::cannot_create_db_table . $tableName);
			return false;
		}

		dbx::insert($tableName,array(
		'xir_ts' 	=> 'NOW()',
		'xir_ns' 	=> $namespace,
		'xir_type' 	=> $type,
		'xir_ip' 	=> libx::getIp(),
		'xir_host' 	=> libx::getHost(),
		'xir_hr'	=> $human_readable,
		'xir_no' 	=> $no,
		'xir_error' => $detail,
		));

	}

	private static function _log2mail($type,$namespace, $human_readable, $no, $detail, $dieIfNotSent=true)
	{
		if (trim(strtolower($namespace)) == "mailx") return true; // Loop detection
		if (!Ixcore::REPORTING_USE_MAIL) return true;

		$admins = explode(",",Ixcore::REPORTING_USE_MAIL_EMAILS_COMMA_SEPERTATED);
		$html 	= self::_genInfoMail(true,$type,$namespace, $human_readable, $no, $detail);

		$to = array();

		foreach ($admins as $admin)
		{
			$to[] = array('email'=>$admin,'name'=>$admin);
		}

		$cfg = array(
		'to'						=> $to,
		'from'						=> array('email' => Ixcore::REPORTING_USE_MAIL_FROM,	'name' => Ixcore::REPORTING_USE_MAIL_FROM),
		'reply'						=> array('email' => Ixcore::REPORTING_USE_MAIL_FROM,	'name' => Ixcore::REPORTING_USE_MAIL_FROM),
		'html'						=> $html,
		'txt'						=> '',
		'subject'					=> Ixcore::REPORTING_USE_MAIL_SUBJECT ." | $type | ".$namespace,
		'priority'					=> mailx::PRIO_HIGH,
		'imageProcessing' 			=> true,
		'imageProcessing_type' 		=> 'embedd',
		'imageProcessing_location' 	=> dirname(__FILE__).'/../templates',
		);

		if (!mailx::sendMail($cfg))
		{
			if ($dieIfNotSent) {
				die(self::cannot_send_mail);
			}
		}
	}

}