<?
class libx
{
	const version 	= "7.0";
	static $isJSON 	= false;

	public static function isMobileBrowser()
	{
		@session_start();
		$sessName = 'XCORE_LIB_IS_MOBILE';

		if (!isset($_SESSION[$sessName]))
		{
			$useragent = $_SERVER['HTTP_USER_AGENT'];

			// Detect Mobile Browsers | Open source mobile phone detection
			// (http://detectmobilebrowsers.com/)

			$_SESSION[$sessName] = (preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)));
		}

		return ($_SESSION[$sessName]);
	}

	public static function fixJsonSimple($jsonString)
	{
		$jsonString = str_replace(array("\t","\n","'"),array("","",'"'),trim($jsonString));
		return $jsonString;
	}

	public static function load_phpQuery()
	{
		require_once(dirname(__FILE__).'/../libs/phpQuery/phpQuery.php');
	}

	public static function load_htmlPurifier()
	{
		require_once(dirname(__FILE__).'/../libs/htmlpurifier/HTMLPurifier.auto.php');
	}

	public static function load_excelReader()
	{
		require_once(dirname(__FILE__).'/../libs/spreadsheet-reader/SpreadsheetReader.php');
	}

	/*****************************************************************************************************************
	*
	* SMALL HELPERS
	*
	*************************/

	public static function json($encode=array()){
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header("Content-type: application/json; charset=utf-8");
		die(json_encode($encode));
	}

	public static function json_success($data=array())
	{
		if (!is_array($data)) $data = array('data'=>$data);
		$data['success'] = true;
		self::json($data);
	}

	public static function json_failure($msg,$errorId='?',$data=array())
	{
		header('HTTP/1.1 500 Internal Server Error');
		if (!is_array($data)) $data = array('data'=>$data);
		$data['success'] 	= false;
		$data['msg'] 		= $msg;
		$data['errorId'] 	= $errorId;
		self::json($data);
	}

	public static function json_debug($array,$silentDevMode=false)
	{
		if ($silentDevMode)
		{
			if (libx::isDeveloper())
			self::json_failure('DEBUG','0',array('DEBUG'=>'<pre>'.print_r($array,true).'</pre>'));
			return;
		}
		self::json_failure('DEBUG','0',array('DEBUG'=>'<pre>'.print_r($array,true).'</pre>'));
	}


	public static function jsonFeedback_ON()
	{
		self::$isJSON = true;
	}

	public static function jsonFeedback_OFF()
	{
		self::$isJSON = false;
	}

	public static function jsonFeedback_ISON()
	{
		return self::$isJSON;
	}

	public  static function is_assoc($array) {
		return (is_array($array) && (0 !== count(array_diff_key($array, array_keys(array_keys($array)))) || count($array)==0));
	}

	/*****************************************************************************************************************
	*
	* ENVIRONMENT
	*
	*************************/

	public static $isDeveloperChecked 	= false;
	public static $isDeveloperState 	= false;

	public static function isDeveloper()
	{
		if (!self::$isDeveloperChecked)
		{
			self::$isDeveloperChecked = true;
			$ips = explode(",",Ixcore::DEVELOPER_IPS_COMMA_SEPERATED);
			self::$isDeveloperState = in_array(self::getIp(),$ips);
		}
		return self::$isDeveloperState;
	}

	public static function getIp()
	{
		if (self::isCli()) return "127.0.0.1";
		global $_SERVER;
		return $_SERVER['REMOTE_ADDR'];
	}

	public static function getHost()
	{
		if (self::isCli()) return "localhost";
		return @gethostbyaddr(self::getIp());
	}

	public static function turnOnErrorReporting()
	{
		error_reporting(E_ERROR);
		ini_set("display_errors", 1);
	}

	public static function isCli()
	{
		if(php_sapi_name() == 'cli' && empty($_SERVER['REMOTE_ADDR'])) {
			return true;
		} else {
			return false;
		}
	}

	/*****************************************************************************************************************
	*
	* Email Checking
	*
	*************************/

	public static function checkEmail( $email, $chFail = false ) {
		$msgs = Array(); $msgs[] = 'Received email address: '.$email;
		//check for email pattern (adapted and improved from http://karmak.org/archive/2003/02/validemail.html)
		//incorrectly allows IP addresses with block numbers > 256, but those will fail to create sockets anyway
		//unicode norwegian chars cannot be used: C caron, D stroke, ENG, N acute, S caron, T stroke, Z caron (PHP unicode limitation)
		if( !preg_match( "/^(([^<>()[\]\\\\.,;:\s@\"]+(\.[^<>()[\]\\\\.,;:\s@\"]+)*)|(\"([^\"\\\\\r]|(\\\\[\w\W]))*\"))@((\[([0-9]{1,3}\.){3}[0-9]{1,3}\])|(([a-z\-0-9áàäçéèêñóòôöüæøå]+\.)+[a-z]{2,}))$/i", $email ) ) {
			$msgs[] = 'Email address was not recognised as a valid email pattern';
			return $chFail ? Array( false, $msgs ) : false; }
			$msgs[] = 'Email address was recognised as a valid email pattern';
			//get the mx host name
			if( preg_match( "/@\[[\d.]*\]$/", $email ) ) {
				$mxHost[0] = preg_replace( "/[\w\W]*@\[([\d.]+)\]$/", "$1", $email );
				$msgs[] = 'Email address contained IP address '.$mxHost[0].' - no need for MX lookup';
			} else {
				//get all mx servers - if no MX records, assume domain is MX (SMTP RFC)
				$domain = preg_replace( "/^[\w\W]*@([^@]*)$/i", "$1", $email );
				if( !getmxrr( $domain, $mxHost, $weightings ) ) { $mxHost[0] = $domain;
				$msgs[] = 'Failed to obtain MX records, defaulting to '.$domain.' as specified by SMTP protocol';
				} else { array_multisort( $weightings, $mxHost );
				$cnt = ''; $co = 0; foreach( $mxHost as $ch ) { $cnt .= ( $cnt ? ', ' : '' ) . $ch . ' (' . $weightings[$co] . ')'; $co++; }
				$msgs[] = 'Obtained the following MX records for '.$domain.': '.$cnt; }
			}
			//check each server until you are given permission to connect, then check only that one server
			foreach( $mxHost as $currentHost ) {
				$msgs[] = 'Checking MX server: '.$currentHost;
				if( $connection = @fsockopen( $currentHost, 25 ) ) {
					$msgs[] = 'Created socket ('.$connection.') to '.$currentHost;
					if( preg_match( "/^2\d\d/", $cn = fgets( $connection, 1024 ) ) ) {
						$msgs[] = $currentHost.' sent SMTP connection header - no futher MX servers will be checked: '.$cn;
						while( preg_match( "/^2\d\d-/", $cn ) ) { $cn = fgets( $connection, 1024 );
						$msgs[] = $currentHost.' sent extra connection header: '.$cn; } //throw away any extra rubbish
						if( !$_SERVER ) { global $HTTP_SERVER_VARS; $_SERVER = $HTTP_SERVER_VARS; }
						//attempt to send an email from the user to themselves (not <> as some misconfigured servers reject it)
						$localHostIP = gethostbyname(preg_replace("/^.*@|:.*$/",'',$_SERVER['HTTP_HOST']));
						$localHostName = gethostbyaddr($localHostIP);
						fputs( $connection, 'HELO '.($localHostName?$localHostName:('['.$localHostIP.']'))."\r\n" );
						if( $success = preg_match( "/^2\d\d/", $hl = fgets( $connection, 1024 ) ) ) {
							$msgs[] = $currentHost.' sent HELO response: '.$hl;
							fputs( $connection, "MAIL FROM: <$email>\r\n" );
							if( $success = preg_match( "/^2\d\d/", $from = fgets( $connection, 1024 ) ) ) {
								$msgs[] = $currentHost.' sent MAIL FROM response: '.$from;
								fputs( $connection, "RCPT TO: <$email>\r\n" );
								if( $success = preg_match( "/^2\d\d/", $to = fgets( $connection, 1024 ) ) ) {
									$msgs[] = $currentHost.' sent RCPT TO response: '.$to;
								} else { $msgs[] = $currentHost.' rejected recipient: '.$to; }
							} else { $msgs[] = $currentHost.' rejected MAIL FROM: '.$from; }
						} else { $msgs[] = $currentHost.' rejected HELO: '.$hl; }
						fputs( $connection, "QUIT\r\n");
						fgets( $connection, 1024 ); fclose( $connection );
						//see if the transaction was permitted (i.e. does that email address exist)
						$msgs[] = $success ? ('Email address was accepted by '.$currentHost) : ('Email address was rejected by '.$currentHost);
						return $chFail ? Array( $success, $msgs ) : $success;
					} elseif( preg_match( "/^550/", $cn ) ) {
						$msgs[] = 'Mail domain denies connections from this host - no futher MX servers will be checked: '.$cn;
						return $chFail ? Array( false, $msgs ) : false;
					} else { $msgs[] = $currentHost.' did not send SMTP connection header: '.$cn; }
				} else { $msgs[] = 'Failed to create socket to '.$currentHost; }
			} $msgs[] = 'Could not establish SMTP session with any MX servers';
			return $chFail ? Array( false, $msgs ) : false;
	}


	/*****************************************************************************************************************
	*
	* MISC. USER & PASSWORD
	*
	*************************/

	public static function generateCode($length=6) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789+-";
		$code = "";
		$clen = strlen($chars) - 1;  //a variable with the fixed length of chars correct for the fence post issue
		while (strlen($code) < $length) {
			$code .= $chars[mt_rand(0,$clen)];  //mt_rand's range is inclusive - this is why we need 0 to n-1
		}
		return $code;
	}

	public static function password_valid($password,$username=false)
	{
		if ($username !== false)
		{
			$password = str_replace($username, '', $password);
		}

		$len = strlen($password);

		preg_match_all('/[0-9]/', $password, $numbers);
		preg_match_all('/[|!@#$%&*\/=?,;.:\-_ +~^\"\'\\\]/', $password, $symbols);
		preg_match_all('/[a-z]/', $password, $lowercase_characters);
		preg_match_all('/[A-Z]/', $password, $uppercase_characters);


		// calc____it

		if (!empty($numbers))
		{
			$numbers = count($numbers[0]);
		}
		else
		{
			$numbers = 0;
		}

		if (!empty($symbols))
		{
			$symbols = count($symbols[0]);
		}
		else
		{
			$symbols = 0;
		}

		if (!empty($lowercase_characters))
		{
			$lowercase_characters = count($lowercase_characters[0]);
		}
		else
		{
			$lowercase_characters = 0;
		}

		if (!empty($uppercase_characters))
		{
			$uppercase_characters = count($uppercase_characters[0]);
		}
		else
		{
			$uppercase_characters = 0;
		}

		$groupConditions 		= 4; // numbers,symbols,lower,upper
		$minCountPerCondidion	= 2; // min count

		$minLength 				= $groupConditions * $minCountPerCondidion;
		$minCond = "Dear User: \nNumbers,symbols,lower,upper characters are needed!\n\nMinimum count for each Group : $minCountPerCondidion, minimum length: $minLength";

		if ($len < $minLength) return array("ERROR"=>"Too short. ($len)","MIN"=>$minCond);
		if ($numbers < $minCountPerCondidion) return array("ERROR"=>"Too few numbers. ($numbers)","MIN"=>$minCond);
		if ($symbols < $minCountPerCondidion) return array("ERROR"=>"Too few symbols. ($symbols)","MIN"=>$minCond);
		if ($lowercase_characters < $minCountPerCondidion) return array("ERROR"=>"Too few lowercase characters. ($lowercase_characters)","MIN"=>$minCond);
		if ($uppercase_characters < $minCountPerCondidion) return array("ERROR"=>"Too few upperCase characters. ($uppercase_characters)","MIN"=>$minCond);

		return true;
	}

	public static function password_strength($password, $username = null)
	{
		if (!empty($username))
		{
			$password = str_replace($username, '', $password);
		}

		$strength = 0;
		$password_length = strlen($password);

		if ($password_length < 4)
		{
			return $strength;
		}

		else
		{
			$strength = $password_length * 4;
		}

		for ($i = 2; $i <= 4; $i++)
		{
			$temp = str_split($password, $i);

			$strength -= (ceil($password_length / $i) - count(array_unique($temp)));
		}

		preg_match_all('/[0-9]/', $password, $numbers);

		if (!empty($numbers))
		{
			$numbers = count($numbers[0]);

			if ($numbers >= 3)
			{
				$strength += 5;
			}
		}

		else
		{
			$numbers = 0;
		}

		preg_match_all('/[|!@#$%&*\/=?,;.:\-_+~^�\\\]/', $password, $symbols);

		if (!empty($symbols))
		{
			$symbols = count($symbols[0]);

			if ($symbols >= 2)
			{
				$strength += 5;
			}
		}

		else
		{
			$symbols = 0;
		}

		preg_match_all('/[a-z]/', $password, $lowercase_characters);
		preg_match_all('/[A-Z]/', $password, $uppercase_characters);

		if (!empty($lowercase_characters))
		{
			$lowercase_characters = count($lowercase_characters[0]);
		}

		else
		{
			$lowercase_characters = 0;
		}

		if (!empty($uppercase_characters))
		{
			$uppercase_characters = count($uppercase_characters[0]);
		}

		else
		{
			$uppercase_characters = 0;
		}

		if (($lowercase_characters > 0) && ($uppercase_characters > 0))
		{
			$strength += 10;
		}

		$characters = $lowercase_characters + $uppercase_characters;

		if (($numbers > 0) && ($symbols > 0))
		{
			$strength += 15;
		}

		if (($numbers > 0) && ($characters > 0))
		{
			$strength += 15;
		}

		if (($symbols > 0) && ($characters > 0))
		{
			$strength += 15;
		}

		if (($numbers == 0) && ($symbols == 0))
		{
			$strength -= 10;
		}

		if (($symbols == 0) && ($characters == 0))
		{
			$strength -= 10;
		}

		if ($strength < 0)
		{
			$strength = 0;
		}

		if ($strength > 100)
		{
			$strength = 100;
		}

		return $strength;
	}


	/*****************************************************************************************************************
	*
	* MISC. BASIC CONVERSION
	*
	*************************/


	public static function sec2Time($time){
		if(is_numeric($time)){
			$value = array(
			"years" => 0, "days" => 0, "hours" => 0,
			"minutes" => 0, "seconds" => 0,
			);
			if($time >= 31556926){
				$value["years"] = floor($time/31556926);
				$time = ($time%31556926);
			}
			if($time >= 86400){
				$value["days"] = floor($time/86400);
				$time = ($time%86400);
			}
			if($time >= 3600){
				$value["hours"] = floor($time/3600);
				$time = ($time%3600);
			}
			if($time >= 60){
				$value["minutes"] = floor($time/60);
				$time = ($time%60);
			}
			$value["seconds"] = floor($time);
			return (array) $value;
		}else{
			$value = array(
			"years" => 0, "days" => 0, "hours" => 0,
			"minutes" => 0, "seconds" => 0,
			);
			return $value;
		}
	}


	public static function utf8decode($var){
		if(is_array($var)){
			foreach($var as $key => $val){
				$var[$key] = self::utf8decode($val);
			}
			return ($var);
		}
		return utf8_decode($var);
	}

	public static function utf8encode($var){
		if(is_array($var)){
			foreach($var as $key => $val){
				$var[$key] = self::utf8encode($val);
			}
			return ($var);
		}
		return utf8_encode($var);
	}


	/**
 * Truncates text.
 *
 * Cuts a string to the length of $length and replaces the last characters
 * with the ending if the text is longer than length.
 *
 * @param string  $text String to truncate.
 * @param integer $length Length of returned string, including ellipsis.
 * @param string  $ending Ending to be appended to the trimmed string.
 * @param boolean $exact If false, $text will not be cut mid-word
 * @param boolean $considerHtml If true, HTML tags would be handled correctly
 * @return string Trimmed string.
 */


	public static function truncate($text, $length = 100, $ending = '...', $exact = true, $considerHtml = false) {
		if ($considerHtml) {
			// if the plain text is shorter than the maximum length, return the whole text
			if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
				return $text;
			}
			// splits all html-tags to scanable lines
			preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
			$total_length = strlen($ending);
			$open_tags = array();
			$truncate = '';
			foreach ($lines as $line_matchings) {
				// if there is any html-tag in this line, handle it and add it (uncounted) to the output
				if (!empty($line_matchings[1])) {
					// if it's an "empty element" with or without xhtml-conform closing slash (f.e. <br/>)
					if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
						// do nothing
						// if tag is a closing tag (f.e. </b>)
					} else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
						// delete tag from $open_tags list
						$pos = array_search($tag_matchings[1], $open_tags);
						if ($pos !== false) {
							unset($open_tags[$pos]);
						}
						// if tag is an opening tag (f.e. <b>)
					} else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
						// add tag to the beginning of $open_tags list
						array_unshift($open_tags, strtolower($tag_matchings[1]));
					}
					// add html-tag to $truncate'd text
					$truncate .= $line_matchings[1];
				}
				// calculate the length of the plain text part of the line; handle entities as one character
				$content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
				if ($total_length+$content_length> $length) {
					// the number of characters which are left
					$left = $length - $total_length;
					$entities_length = 0;
					// search for html entities
					if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
						// calculate the real length of all entities in the legal range
						foreach ($entities[0] as $entity) {
							if ($entity[1]+1-$entities_length <= $left) {
								$left--;
								$entities_length += strlen($entity[0]);
							} else {
								// no more characters left
								break;
							}
						}
					}
					$truncate .= substr($line_matchings[2], 0, $left+$entities_length);
					// maximum lenght is reached, so get off the loop
					break;
				} else {
					$truncate .= $line_matchings[2];
					$total_length += $content_length;
				}
				// if the maximum length is reached, get off the loop
				if($total_length>= $length) {
					break;
				}
			}
		} else {
			if (strlen($text) <= $length) {
				return $text;
			} else {
				$truncate = substr($text, 0, $length - strlen($ending));
			}
		}
		// if the words shouldn't be cut in the middle...
		if (!$exact) {
			// ...search the last occurance of a space...
			$spacepos = strrpos($truncate, ' ');
			if (isset($spacepos)) {
				// ...and cut the text in this position
				$truncate = substr($truncate, 0, $spacepos);
			}
		}
		// add the defined ending to the text
		$truncate .= $ending;
		if($considerHtml) {
			// close all unclosed html-tags
			foreach ($open_tags as $tag) {
				$truncate .= '</' . $tag . '>';
			}
		}
		return $truncate;
	}


}

