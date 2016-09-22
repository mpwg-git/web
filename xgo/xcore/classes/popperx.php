<?

class popperx
{

	/*****************************************************************************************************************************
	*
	* POPPING THE MAILS FACILITES
	*
	* **/


	// set up object to full-array converter
	private static function object_to_array($p_object) {
		$array=array();
		if(!is_scalar($p_object)) {
			foreach($p_object as $id => $object) {
				if(is_scalar($object)) {
					$array[$id]=$object;
				} else {
					$array[$id]=self::object_to_array($object);
				}
			}
			return $array;
		} else {
			return $object;
		}
	}

	private static function _trace($msg)
	{
		$messagePipe[] = $msg;
		if (!self::$my_config['debug']) return;
		echo "<pre>";
		echo $msg;
		echo "</pre>";
	}

	private static function _error($msg)
	{
		$messagePipe[] = 'ERROR '.$msg;
		if (!self::$my_config['debug']) return;
		echo "<pre style='color:red;'>";
		echo 'ERROR '.$msg;
		echo "</pre>";
	}

	public static function getTrace()
	{
		return self::$messagePipe;
	}

	private static function save2disk($message_id,$filename,$somecontent,$add2finalAll=true)
	{
		if ($add2finalAll)
		self::$finalAll['files'][$filename] = $somecontent;

		$REAL_ROOT = self::$my_config['SAVE2DISK']; // dirname(__FILE__)

		$path_root = $REAL_ROOT;
		@mkdir($path_root);@chmod($path_root,0777);

		$path_root = $REAL_ROOT."/$message_id";
		@mkdir($path_root);@chmod($path_root,0777);

		$filename = $path_root."/".$filename;

		if (!$handle = fopen($filename, "w")) {
			self::_trace("Kann die Datei '$filename' nicht öffnen");
			return false;
		}
		if (!fwrite($handle, $somecontent)) {
			if (strlen($somecontent) != 0)
			{
				self::_trace("Kann in die Datei '$filename' nicht schreiben.".strlen($somecontent));
				return false;
			}
		}
		fclose($handle);
		return true;
	}

	public static $messagePipe = array();
	public static $my_config = array();
	public static $my_master = array();
	public static $finalAll	 = array();
	public static $my_mail	 = array();

	public function collect($cfg,$settings)
	{

		self::$my_config = $cfg;
		self::$my_master = array();
		self::$finalAll = array();

		// connect to IMAP mailbox
		if (!$mbh = imap_open (self::$my_config['IMAP']['host'].self::$my_config['IMAP']['folder'], self::$my_config['IMAP']['user'], self::$my_config['IMAP']['pass'])) {
			self::_trace("IMAP connection failed -> ".imap_last_error()."");
			$message = "Script terminating!";
			self::_error($message, true);
			return false;
		} else {
			self::_trace("IMAP connection established on ".self::$my_config['IMAP']['host']."");
		}

		// get some mailbox information
		$imapcheck = imap_check($mbh);

		// number of messages in inbox
		self::$my_master['Nmsgs'] = $imapcheck->Nmsgs;
		self::_trace(self::$my_master['Nmsgs']." messages in mailbox");

		// start looping over each email
		self::$my_master['loopindex'] = 1;
		self::$my_master['mailsdeleted'] = 0;

		while (self::$my_master['loopindex'] <= self::$my_master['Nmsgs']) {
			self::$my_mail = array();
			self::_trace("<b>Analyzing message nr. ".self::$my_master['loopindex']." <br>-------------------------------------------------</b>");

			// start analyzing individual message

			// get mail headers
			$header = self::object_to_array(imap_headerinfo($mbh, self::$my_master['loopindex'],255,255));



			if (self::$my_config['debug']) {
				//debug('<b>Header information:</b><br>');
				self::_trace("<pre>".print_r($header,true)."<pre>");
			}



			$message_id = md5($header['message_id']);
			$replace = array();

			// fetch mail strucutre
			$structure = self::object_to_array(imap_fetchstructure($mbh, self::$my_master['loopindex']));
			if (self::$my_config['debug']) {
				self::_trace('<b>Structure information:</b><br>');
				self::_trace("<pre>".print_r($structure,true)."</pre>");
			}

			self::$finalAll = array();
			self::$finalAll['head'] = $header;
			self::$finalAll['content'] = $structure;
			self::$finalAll['attach'] = array();
			self::$finalAll['embedd'] = array();


			// assign whole stuff to @my_mail
			self::$my_mail['timestamp'] 				= $header['udate'];
			self::$my_mail['date'] 						= date("Y/m/d H:i",self::$my_mail['timestamp']);
			self::$my_mail['subject'] 					= $header['subject'];

			self::$my_mail['origin']['host'] 			= $header['from'][0]['host'];
			self::$my_mail['origin']['box'] 			= $header['from'][0]['mailbox'];
			self::$my_mail['origin']['from'] 			= self::$my_mail['origin']['box'].'@'.self::$my_mail['origin']['host'];
			self::$my_mail['origin']['from_name'] 		= $header['from'][0]['personal'];

			self::$my_mail['destination']['host'] 		= $header['to'][0]['host'];
			self::$my_mail['destination']['box'] 		= $header['to'][0]['mailbox'];
			self::$my_mail['destination']['to'] 		= self::$my_mail['destination']['box'].'@'.self::$my_mail['destination']['host'];
			self::$my_mail['destination']['to_name'] 	= $header['to'][0]['personal'];

			$message_id .= md5(self::$my_config['IMAP']['email'] );

			//self::$my_mail['reply_to']['host'] = $header['reply_to'][0]['host'];
			//self::$my_mail['reply_to']['box'] = $header['reply_to'][0]['mailbox'];
			//self::$my_mail['reply_to']['reply_to'] = self::$my_mail['reply_to']['box'].'@'.self::$my_mail['reply_to']['host'];
			//self::$my_mail['reply_to']['reply_to_name'] = $header['reply_to'][0]['personal'];
			//self::$my_mail['cc'] = $header['ccaddress']; // multiple CC's resp. BCC's possible
			//self::$my_mail['bcc'] = $header['bccaddress'];

			// decode the mess

			self::$my_mail['origin']['from'] 			= utf8_decode(imap_utf8(self::$my_mail['origin']['from']));
			self::$my_mail['origin']['from_name'] 		= utf8_decode(imap_utf8(self::$my_mail['origin']['from_name']));

			self::$my_mail['destination']['to'] 		= utf8_decode(imap_utf8(self::$my_mail['destination']['to']));
			self::$my_mail['destination']['to_name'] 	= utf8_decode(imap_utf8(self::$my_mail['destination']['to_name']));
			//self::$my_mail['replyto']['name'] = utf8_decode(imap_utf8(self::$my_mail['replyto']['name']));
			self::$my_mail['subject'] =                                 utf8_decode(imap_utf8(self::$my_mail['subject']));
			self::$my_mail['subject'] =                                 quoted_printable_decode(self::$my_mail['subject']);

			if (ereg("iso-8859-1",self::$my_mail['subject'])) {
				self::$my_mail['subject'] =                             html_entity_decode(utf8_decode(self::$my_mail['subject']));
			}

			if (self::$my_mail['subject'] == '') {
				self::$my_mail['subject'] = 'Kein Betreff';
			}

			// clean up the mess
			if (self::$my_mail['origin']['from_name'] == "") {
				self::$my_mail['origin']['from_name'] = self::$my_mail['origin']['from'];
			}

			if (self::$my_mail['destination']['to_name'] == "") {
				self::$my_mail['destination']['to_name'] = self::$my_mail['destination']['to'];
			}

			//if (self::$my_mail['reply_to']['from_name'] == "") {
			//    self::$my_mail['reply_to']['reply_to_name'] = self::$my_mail['reply_to']['reply_to_name'];
			//}



			// fetch mail body //
			self::$my_mail['type'] = $structure['type'];    // Mail type [0=PLAIN / 1=MULTIPART]
			self::$my_mail['encode'] = $structure['encoding']; // Mail encoding

			self::_trace('<b>Fetch Mail Body</b><br>');

			// type is 0 (plain)
			if (self::$my_mail['type'] == 0) {
				self::_trace('Body Type is PLAIN');

				self::$my_mail['body'] = imap_body($mbh, self::$my_master['loopindex']);

				if (self::$my_mail['encode'] == 3) {
					self::$my_mail['body'] = base64_decode(self::$my_mail['body']);
				}
				if (self::$my_mail['encode'] == 4) {
					self::$my_mail['body'] = quoted_printable_decode(self::$my_mail['body']);
				}
				//	 else {
				//     self::$my_mail['text'] = quoted_printable_decode(self::$my_mail['text']);
				//}


				self::_trace(self::$my_mail['text']);
			}

			// type is 1 (multipart)

			if (self::$my_mail['type'] == 1) {
				self::_trace('Body Type is MULTIPART');
				$struct = $structure;
				$mid = self::$my_master['loopindex'];

				$parts = $struct['parts'];
				$i = 0;
				$endwhile = false;

				$stack = array(); // Stack while parsing message
				$content = "";    // Message content
				$html = "";

				self::$my_mail['attachment'] = array(); // Attachments

				while (!$endwhile) {
					if (!$parts[$i]) {
						if (count($stack) > 0) {
							$parts = $stack[count($stack)-1]["p"];
							$i         = $stack[count($stack)-1]["i"] + 1;
							array_pop($stack);
						} else {
							$endwhile = true;
						}
					}
					if (!$endwhile) {
						// Get message part (1.1.1 eg.)
						$partstring = "";

						foreach ($stack as $s) {
							$partstring .= ($s["i"]+1) . ".";
						}
						$partstring .= ($i+1);

						if (strtoupper($parts[$i]['disposition']) == "ATTACHMENT") { // Part is attachment
							self::$my_mail['attachment'][] = array("filename" => $parts[$i]['parameters'][0]['value'],"filedata" => imap_fetchbody($mbh, $mid, $partstring));
						} elseif (strtoupper($parts[$i]['subtype']) == "PLAIN") { // Part is Message
							// Part is text, check encoding
							if ($parts[$i]['parameters']['0']['value'] == 'utf-8') {
								// utf-8 encoded, decode
								$content .= utf8_decode(imap_fetchbody($mbh, $mid, $partstring));
							} elseif ($parts[$i]['parameters']['0']['value'] == 'iso-8859-1') {
								// iso-8859-1 encoded, decode
								$content .= quoted_printable_decode(html_entity_decode(htmlentities(imap_fetchbody($mbh, $mid, $partstring))));
							} else {
								$content .= imap_fetchbody($mbh, $mid, $partstring);
							}
						} elseif (strtoupper($parts[$i]['subtype']) == "HTML") { // Part is HTML Message

							$tmp = imap_fetchbody($mbh, $mid, $partstring);
							switch ($parts[$i]['encoding'])
							{
								case '3':
									$html .= base64_decode($tmp);
									break;
								case '4':
									$html .= quoted_printable_decode(html_entity_decode(htmlentities(($tmp))));
									break;
								default:
									self::_trace("<h1>invalid encoding</h1>");
									break;
							}

						} elseif (strtoupper($parts[$i]['type']) == "5") { // image
							if (self::$my_config['save_embedded'])
							{
								if ($parts[$i]['encoding'] == "3") // BASE64
								{
									$filenamex = false;
									$filenamex_org = "";
									foreach ($parts[$i]['parameters'] as $value) {
										if ($value['attribute'] == "NAME")
										{
											$filenamex_org = $filenamex = $value['value'];
										}
									}

									if ($filenamex !== false)
									{
										$filenamex = strtolower($filenamex);
										$tmp = explode(".",$filenamex);
										$ext = $tmp[count($tmp)-1];
										$intid = count($replace);
										$filenamex = "emb_".$intid.".".$ext;
										self::_trace("<h1>EMBEDDED :: $filenamex ($filenamex_org)</h1>");
										$replace[$parts[$i]['id']] = $filenamex;

										if (!self::save2disk($message_id,$filenamex,base64_decode(imap_fetchbody($mbh, $mid, $partstring))))
										{
											// terminate IMAP connection
											if (imap_close($mbh)) {
												self::_trace("Connection to mailserver successfully terminated.");
											} else {
												self::_trace("Connection to mailserver could not be terminated! ->".imap_last_error()."");
											}
											return false;
										}

									}
								}
							}
						}
					}

					if ($parts[$i]['parts']) {
						$stack[] = array("p" => $parts, "i" => $i);
						$parts = $parts[$i]['parts'];
						$i = 0;
					} else {
						$i++;
					}
				}

				foreach ($replace as $key => $value) {
					$content 	= str_replace('cid:'.substr($key,1,-1),'Embedded-Image : '.$value,$content);
					$html 		= str_replace('cid:'.substr($key,1,-1),$value,$html);
					self::$my_mail['embedded'][] = $value;
				}

				self::$my_mail['body'] = $content;
				self::$my_mail['html'] = $html;


				self::save2disk($message_id,"index.txt",$content);
				self::save2disk($message_id,"index.html",$html);

				// ---------------------------------------------------------------------------- //

				// extract and save attachments, if any

				self::$my_mail['nbattachs'] = count(self::$my_mail['attachment']);
				if (self::$my_mail['nbattachs'] > 0) {

					// attachments found
					self::_trace("Mail has ".self::$my_mail['nbattachs']." Attachments");

					// Define Attachment Loop functions
					$attach_invalid = 0;
					$attachs_error_echo = '';
					$a = 0;
					$str = "";
					$dirname = "";

					// loop attachments, decode and save them
					while ($a <= self::$my_mail['nbattachs']-1) {
						$filename = "";
						$filename = utf8_decode(imap_utf8(self::$my_mail['attachment'][$a]['filename']));

						if ($filename == '') {
							$filename = 'no filename found';
						}
						//$filename = quoted_printable_decode(self::$my_mail['attachment'][$a]['filename']);
						self::_trace("(".$a ." => ".$filename." | ");

						//"=.jpg$|.avi$|.mpg$|.mpeg$|.gif$|.swf$|.bmp$|.png$|.rar$|.zip$|.pdf$|.msg$|.mp3$|.xls$|.doc$|.txt$|.htm$|.pps$|.dat$|.html$|.jpeg$=i"
						// Check if Attachment is valid
						if (!preg_match(self::$my_config['CHECK_ATTACH_PREG_MATCH'],$filename)&&(self::$my_config['CHECK_ATTACH_ENABLED'])) {
							// File Type is invalid
							self::_trace("INVALID)");
							$attach_invalid++;
							$attachs_error_echo .= "* ".$filename."\n";
						} else {
							// File Type is valid, proceed
							self::_trace("VALID)");
							$attachs_error_echo .= $filename."\n";

							// decode content
							if (preg_match("=.txt$=i",$filename)) {
								$input = self::$my_mail['attachment'][$a]['filedata'];
							} else {
								$input = base64_decode(self::$my_mail['attachment'][$a]['filedata']);
							}

							// save attachments
							if (self::$my_config['save_attachments'] ) {

								$filename_org = $filename;
								$filename = "attach_".$filename;

								self::_trace("<h1>ATTACHMENT :: $filename ($filenamex_org)</h1>");
								self::save2disk($message_id,$filename,$input);
								self::$finalAll['attach'][] = $filename;
								self::$my_mail['attach'][] = $filename;
							} else {
								self::_trace("save_attachments OFF");
							}
						}
						$a++;
					}
				} else {
					self::_trace("No attachments were found");
				}
			}

			if (self::$my_config['debug']) {
				self::_trace('<b>Extracted Mail information:</b><br>');
				unset(self::$my_mail['attachment']);
				self::_trace("<pre>".print_r(self::$my_mail,true)."</pre>");
			}

			if (!self::$my_config['delete_mail'])
			{
				self::_trace("Move Mail turned OFF");
			}
			else
			{
				if (imap_delete($mbh,self::$my_master['loopindex'])) {
					self::_trace("Mail successfully marked for deletion");
				} else {
					self::_trace("Mail could not be marked for deletion");
				}
			}

			$save_it_error = false;

			if (!$handle = fopen(self::$my_config['SAVE2DISK']."/".$message_id.".ceml", "w")) {
				self::_trace("Kann die Datei nicht öffnen");
				$save_it_error = true;
			}
			else
			if (!fwrite($handle, base64_encode(serialize(self::$finalAll)))) {
				$save_it_error = true;
				exit;
			}
			@fclose($handle);

			if ($save_it_error)
			{
				// terminate IMAP connection
				if (imap_close($mbh)) {
					self::_trace("Connection to mailserver successfully terminated.");
				} else {
					self::_trace("Connection to mailserver could not be terminated! ->".imap_last_error()."");
				}
				self::_error("save_it_error");
				return false;
			}

			// SPAM :
			$spam 					= false;
			$deleteMailHamFunction 	= false;

			if (self::$my_config['antispam'])
			{
				$spam = (substr(self::$my_mail['subject'],0,strlen(self::$my_config['antispamkey'])) == self::$my_config['antispamkey']) ? false : true;
				if ($spam)
				{
					self::_trace("SPAM<br>");
					/*
					$this->proccess_spam($message_id,self::$my_mail);
					*/

					if (self::$my_config['antispamkeyautodel'])
					{
						imap_delete($mbh,self::$my_master['loopindex']);

						$dirxxxxxxx = self::$my_config['SAVE2DISK'].'/'.$message_id;
						self::_trace("SPAM AUTO DELETE.[$dirxxxxxxx]<br>");

						@unlink($dirxxxxxxx.".ceml");
						@system("rm '$dirxxxxxxx' -R");
					}
				}
			}

			if (!$spam)
			{
				self::_trace("NO SPAM<br>");
				$deleteMailHamFunction = frontcontrollerx::safeCallUserFunction($cfg['process_ham'],$message_id,self::$my_mail,$cfg,$settings);

				if (!$cfg['process_ham_says_delete_mail']) $cfg['process_ham_says_delete_mail'] = false;
				if ($cfg['process_ham_says_delete_mail'])
				{
					if ($deleteMailHamFunction)
					{
						imap_delete($mbh,self::$my_master['loopindex']);
						self::_trace("HAM-FUNCTION INITIATED: DELETE MAIL !");
					}
				}
			}

			// free temporary header and structure information
			unset($header,$structure);
			self::$my_master['loopindex']++;
		}

		// delete mails marked for deletion
		if (imap_expunge($mbh)) {
			self::_trace("Mails marked for deletion successfully deleted from server");
		} else {
			self::_trace("Mails marked for deletion could not be deleted from server");
		}


		// terminate IMAP connection
		if (imap_close($mbh)) {
			self::_trace("Connection to mailserver successfully terminated.");
		} else {
			self::_trace("Connection to mailserver could not be terminated! ->".imap_last_error()."");
		}

		self::_trace("Dear calleee, thanks we found a graceful end....");
		return true;
	}

}