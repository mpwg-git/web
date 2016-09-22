<?

class mailx
{

	const PRIO_HIGH		= 1;
	const PRIO_NORMAL 	= 3;
	const PRIO_LOW 		= 5;

	private static $version			= "11";
	private static $lastSendError	= "10";

	/**
	 * MAIL SENDING FACILITES  
	 * 
	 * **/

	public static function _load_lib_swiftmailer()
	{
		require_once(dirname(__FILE__)."/../libs/swiftmailer/lib/swift_required.php");
	}

	private static function _load_lib_htmlparser()
	{
		require_once(dirname(__FILE__)."/../libs/htmlparser/htmlparser.php");
		require_once(dirname(__FILE__)."/../libs/htmlparser/html2text.php");
	}

	public static function html2text($htmlText)
	{
		self::_load_lib_htmlparser();
		$htmlToText = new Html2Text ($htmlText, 1024);
		$text = $htmlToText->convert();
		return $text;
	}

	public static function sendMail($cfg)
	{
		self::_load_lib_htmlparser();
		self::_load_lib_swiftmailer();

		try {

			/*****************************************************************************************
			***
			*** SMTP - TRANSPORTER
			***
			***/

			if (is_array($cfg['smtp_settings']) && (trim($cfg['smtp_settings']['smtp_server']) != ""))
			{
				$s_mail_smtp_server = trim($cfg['smtp_settings']['smtp_server']);
				$s_mail_smtp_user 	= $cfg['smtp_settings']['smtp_user'];
				$s_mail_smtp_pwd 	= $cfg['smtp_settings']['smtp_pwd'];

				if ($s_mail_smtp_server != "")
				{
					$transport = Swift_SmtpTransport::newInstance($s_mail_smtp_server, 25);
					if (($s_mail_smtp_user != "") && ($s_mail_smtp_pwd != ""))
					{
						$transport->setUsername($s_mail_smtp_user);
						$transport->setPassword($s_mail_smtp_pwd);
					}
				} else
				{
					$transport = Swift_MailTransport::newInstance();
				}
			} else
			{
				if (Ixcore::MAIL_SMTP_USE)
				{
					$transport = Swift_SmtpTransport::newInstance(Ixcore::MAIL_SMTP_HOST, 25);
					if (Ixcore::MAIL_SMTP_AUTH )
					{
						$transport->setUsername(Ixcore::MAIL_SMTP_USER);
						$transport->setPassword(Ixcore::MAIL_SMTP_PASS);
					}
				} else
				{
					$transport = Swift_MailTransport::newInstance();
				}
			}

			$mailer  = Swift_Mailer::newInstance($transport);
			$message = Swift_Message::newInstance($cfg['subject'])->setCharset('utf-8');


			/*********************************************************************************************************
			*
			* 	BASIC-SETTINGS
			*
			********************************************************************************************************/

			$from 		= $cfg['from'];
			$reply 		= $cfg['reply'];
			$returnPath = $cfg['returnPath'];

			$to 		= $cfg['to'];
			$cc 		= $cfg['cc'];
			$bcc 		= $cfg['bcc'];

			$html 		= $cfg['html'];
			$txt 		= trim($cfg['txt']);

			if (trim($from['email'] == "")) {
				reportx::error('mailx','FROM_EMAIL_NOT_SET');
			}

			$log_TO 	= "";
			$log_CC 	= "";
			$log_BCC 	= "";
			$log_FROM 	= "";

			// --------------------------------------------------------------- TO
			if (!is_array($to)) {
				reportx::error('mailx','TO_NOT_SET');
			}

			if (libx::is_assoc($to)) $to = array($to);
			foreach ($to as $t)
			{
				if (trim($t['email']) == "")
				{
					reportx::error('mailx','TO_NOT_SET_EMAIL');
				} else
				{
					$_email = $t['email'];
					$_name 	= $t['name'];
					$log_TO .= "$_name <$_email>;";
					$message->setTo(array($_email => $_name));
				}
			}

			// --------------------------------------------------------------- CC
			if (is_array($cc)) {
				if (libx::is_assoc($cc)) $cc = array($cc);
				foreach ($cc as $c)
				{
					if (trim($c['email']) == "")
					{
						reportx::error('mailx','CC_NOT_SET_EMAIL');
					} else
					{
						$_email = $c['email'];
						$_name 	= $c['name'];
						$log_CC .= "$_name <$_email>;";
						$message->setCc(array($_email => $_name));
					}
				}
			}

			// --------------------------------------------------------------- BCC
			if (is_array($bcc)) {
				if (libx::is_assoc($bcc)) $bcc = array($bcc);
				foreach ($bcc as $b)
				{
					if (trim($b['email']) == "")
					{
						reportx::error('mailx','BCC_NOT_SET_EMAIL');
					} else
					{
						$_email = $b['email'];
						$_name 	= $b['name'];
						$log_BCC .= "$_name <$_email>;";
						$message->setBcc(array($_email => $_name));
					}
				}
			}

			// --------------------------------------------------------------- FROM
			$log_FROM .= $from['name']." <".$from['email'].">;";
			$message->SetFrom($from['email'], $from['name']);

			if (trim($reply['email']) != "")
			{
				$message->setReplyTo($reply['email'], $reply['name']);
			}

			if (trim($returnPath['email']) != "")
			{
				$message->setReturnPath($returnPath['email'], $returnPath['name']);
			}

			// --------------------------------------------------------------- HEADERS

			$headers = $message->getHeaders();
			if (!is_array($cfg['headers'])) $cfg['headers'] = array();
			foreach ($cfg['headers'] as $k => $v)
			{
				$headers->addTextHeader($k,$v);
			}

			// --------------------------------------------------------------- PRIO

			$prio = self::PRIO_NORMAL;
			if (is_numeric($cfg['priority']))
			{
				$prio = $cfg['priority'];
				if ($prio < 0 ) $prio = 0;
				if ($prio > 5 ) $prio = 5;
			}
			$message->setPriority($prio);

			// --------------------------------------------------------------- ATTACHMENTS

			if (is_array($cfg['attachment'])) {

				$atts = $cfg['attachment'];
				if (libx::is_assoc($atts)) $atts = array($atts);

				foreach ($atts as $pack)
				{
					foreach ($pack as $file_name => $file_path) {
						if (file_exists($file_path) && is_file($file_path)) {
							$attachment_x = Swift_Attachment::fromPath($file_path, hdx::getMimeByExtension($file_name));
							$attachment_x->setFilename($file_name);
							$message->attach($attachment_x);
						}
						else {
							reportx::error('mailx','ATTACHMENT_NOT_FOUND_ON_DISK');
						}
					}
				}
			}

			// --------------------------------------------------------------- CONTENT - CHECK

			if (($txt == "") && (trim($html) == ""))
			{
				reportx::error('mailx','EMPTY_EMAIL_CONTENT');
			}

			// --------------------------------------------------------------- CONTENT - HTML

			if (($cfg['imageProcessing']) && ((trim($cfg['imageProcessing_type']) != "")))
			{

				$imageProcessing_type 		= $cfg['imageProcessing_type'];
				$imageProcessing_location 	= $cfg['imageProcessing_location'];

				$bilder = array();
				$bx 	= array();
				$parser = new HtmlParser($html);

				$bilder_types = array(
				'html_tag_img'			=> array(),
				'css_background_images' => array(),
				'html_tag_background' 	=> array()
				);

				/*******************************************************************************************
				*
				* 	IMAGES
				*
				********************************************************************************************/

				# - HTML IMG TAGS


				while ($parser->parse()) {

					$name = $parser->iNodeName;
					$type = $parser->iNodeType;

					if ((trim(strtolower($name)) == "img") && ($type == NODE_TYPE_ELEMENT)) // PIX
					{
						$attrValues = $parser->iNodeAttributes;
						$attrNames 	= array_keys($attrValues);
						$srcValue 	= $attrValues['src'];

						if (trim(strtolower($srcValue)) != "")
						{
							if (!in_array($srcValue,$bilder))
							$bilder_types['html_tag_img'][] = $srcValue;
						}
					}
				}

				# - CSS
				preg_match_all("/background-image: url\(.+\)/",$html,$array);
				foreach ($array[0] as $css)
				{
					$imgs = explode("(",$css);
					$bilder_types['css_background_images'][] = substr($imgs[1],0,(strlen($imgs[1])-1));
				}

				# - HTML
				preg_match_all("/background=\".+\"[\s]/",$html,$array);
				foreach ($array[0] as $bg)
				{
					$imgs = explode("\"",$bg);
					$bilder_types['html_background'][] = substr($imgs[1],0,(strlen($imgs[1])));
				}

				# PROCESS
				switch ($imageProcessing_type)
				{

					case 'addUrlPrefix':
						foreach ($bilder_types as $img_type => $bilder_2_replace)
						{
							foreach ($bilder_2_replace as $b)
							{
								$bx 	= $imageProcessing_location . $b;
								$html 	= str_replace($b,$bx,$html);
							}
						}
						break;

					case 'downloadAndBase64':
						foreach ($bilder_types as $img_type => $bilder_2_replace)
						{
							foreach ($bilder_2_replace as $b)
							{
								$tmpFile = hdx::getTempFileName('mailIt_download_via_curl',basename($b));

								$url = $imageProcessing_location . $b;
								curlx::get_file($url,$tmpFile);

								if (file_exists($tmpFile) && is_file($tmpFile))
								{
									$bx 	= md5($b);
									$html 	= str_replace($b, 'cid:'.$bx, $html);

									$mime 	= hdx::getMimeByExtension($b);
									$bx 	= "data:$mime;base64,".base64_encode(hdx::fread($tmpFile));
									$html 	= str_replace($b,$bx,$html);
								}
								else
								{
									reportx::error('mailx',"DOWNLOAD_IMAGE_FAILED_DOWNLOADANDBASE64",-1,$url);
								}
							}
						}
						break;


					case 'base64':

						if (!(file_exists($imageProcessing_location) && is_dir($imageProcessing_location))){
							reportx::error('mailx','BASE64_IMAGEPROCESSING_LOCATION_NOT_PRESENT',-1,$imageProcessing_location);
						}

						foreach ($bilder_types as $img_type => $bilder_2_replace)
						{
							foreach ($bilder_2_replace as $b)
							{
								$b_on_disk = $imageProcessing_location . $b;
								$mime = hdx::getMimeByExtension($b);

								if (file_exists($b_on_disk) && is_file($b_on_disk))
								{
									$bx 	= "data:$mime;base64,".base64_encode(hdx::fread($b_on_disk));
									$html 	= str_replace($b,$bx,$html);
								} else
								{
									reportx::error('mailx','BASE64_IMAGEPROCESSING_FILE_NOT_PRESENT',-1,$imageProcessing_location);
								}
							}
						}
						break;

					case 'downloadAndEmbedd':
					case 'embedd':

						if (!(file_exists($imageProcessing_location) && is_dir($imageProcessing_location))){
							reportx::error('mailx','EMBEDD_IMAGEPROCESSING_LOCATION_NOT_PRESENT',-1,$imageProcessing_location);
						}

						$niceNameCnt = 0;
						foreach ($bilder_types as $img_type => $bilder_2_replace)
						{
							foreach ($bilder_2_replace as $b)
							{
								if (strpos($b,'http://')!==false) continue;

								$niceNameCnt++;

								$b_path = $imageProcessing_location."/".$b;
								if (file_exists($b_path) && is_file($b_path))
								{
									if (strpos($html,$b) !== false) // EVENTUELL SCHON ERSETZT !
									{
										$imageOnTheRun = Swift_Image::fromPath($b_path);
										$imageOnTheRun->setFilename('xgo_mailer_embedded_image_'.$niceNameCnt.'.'.hdx::getFileExtension($b_path));
										$imageOnTheRun->setContentType(hdx::getMimeByExtension($b_path));

										$cid 	= $message->embed($imageOnTheRun);
										$html 	= str_replace($b, $cid, $html);
									}
								}
								else
								{
									//	reportx::error('mailx','EMBEDD_IMAGEPROCESSING_FILE_NOT_PRESENT',-1,$b_path);
								}
							}
						}

						break;

					default:
						reportx::error('mailx','IMAGEPROCESSING_TYPE_INVALID',-1,$imageProcessing_type);
						break;
				}

			}

			////// BURN THA MAIL ////// 	////// BURN THA MAIL ////// 	////// BURN THA MAIL ////// 	////// BURN THA MAIL ////// 	////// BURN THA MAIL //////

			if ($html != "")
			{
				$message->setBody($html, 'text/html', 		'utf-8');
				if ($txt != "")
				{
					$message->addPart($txt,'text/plain',	'utf-8');
				}
			} else
			{
				$message->setBody($txt, 'text/plain', 		'utf-8');
			}

			$info = "FROM: $log_FROM -> TO: ($log_TO) | CC: ($log_CC) | BCC: ($log_BCC) - HTML/TEXT : ".strlen($html)."/".strlen($txt)." bytes.";
			reportx::info('mailx','MAIL_SENT',100,$info);

			$message->getHeaders()->addTextHeader('X-Mailer', 'XMARKETING V10-7-468');

			try {
				$result = $mailer->send($message);
				return true;
			} catch (Exception $e)
			{
				self::$lastSendError = $e->getMessage();
				//reportx::error('mailx','MAILING_FAILED',-100, self::$lastSendError, false);
				return false;
			}
		} catch (Exception $e)
		{
			self::$lastSendError = $e->getMessage();
			//reportx::error('mailx','MAILING_FAILED',-100, self::$lastSendError, false);
			return false;
		}
	}

	public static function sendMailGetLastError()
	{
		return self::$lastSendError;
	}

}

