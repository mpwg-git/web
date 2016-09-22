<?

require_once(dirname(__FILE__).'/phpflickr-master/phpFlickr.php');
require_once(dirname(__FILE__).'/TwitterAPIExchange.php');

class sampledata
{
	
	// max count is 1000, by api
	public static function getUsers($type="suche", $count=1000)
	{
		$get 	= file_get_contents("http://api.randomuser.me/?results=".$count);
		$get 	= json_decode($get, true);
		
		foreach ($get['results'] as $k => $v) {
			self::fillUser($v['user'], $type);
		}
		return true;
	}
	
	
	public static function fillChats()
	{
		$url = 'https://api.twitter.com/1.1/search/tweets.json';
		$getfield = '?q=apartment&count=500';
		$requestMethod = 'GET';
		
		$settings = array(
		    'oauth_access_token' => "2780726826-lTlhFMFoVwp0Ph3PLWnfMGbGBR8u4AwTGicShba",
		    'oauth_access_token_secret' => "n6ed3Qq6RS8wT3VDQnwbT7mc8LZ1pqohBPIQFH9coZZzp",
		    'consumer_key' => "e79vvUuhrl2pV7h5HYpsc9Pmo",
		    'consumer_secret' => "AlJqBdEVhetCWWxAqkAyIn3ovendeD4iHuB3LZVse9RKb0Kkhd"
		);
	
		$i = 1;
		$appendUrl = '';
		
		while ($i <= 50)
		{
			if ($i > 1)
			{
				$getfield = $res['search_metadata']['next_results'];
			}
						
			$twitter = new TwitterAPIExchange($settings);
			$response = $twitter->setGetfield($getfield)
			    ->buildOauth($url, $requestMethod)
			    ->performRequest();
			
			$res 	= json_decode($response, true);
			$i++;
			
			foreach ($res['statuses'] as $k => $v) {
				self::fillChat($v);
				echo "\n\r fill $i * $k - ";
			}
			
		}
	}

	public static function fillChat($response)
	{
		$text = $response['text'];
		
		$userId		= mt_rand(1,5000);
		$userId2	= mt_rand(1,5000);
		
		$insert 	= array(
		
			'wz_USERID' 	=> $userId,
			'wz_F_USERID' 	=> $userId2,
			'wz_TIME'		=> "NOW()", 
			'wz_MESSAGE'	=> $text
		);
		
		echo " $userId > $userId2: $text";
		
		dbx::insert("chatitems", $insert);
		
		return true;
		
	}
	

	public static function fillUser($user,$type="suche")
	{
		
		$mfx 	= array("M", "F", "X");
		$mf 	= array("M", "F");
		$ynx 	= array("Y", "N", "X");
		
		$insert = array(
		
			'wz_TYPE' 				=> $type,
			'wz_EMAIL'				=> dbx::escape($user['email']),
			'wz_PASSWORT'			=> dbx::escape($user['password']),
			'wz_MAIL_CHECKED'		=> 'Y',
			'wz_VORNAME'			=> dbx::escape($user['name']['first']),
			'wz_NACHNAME'			=> dbx::escape($user['name']['last']),
			'wz_TELEFON'			=> dbx::escape($user['phone']),
			'wz_STRASSE'			=> dbx::escape($user['location']['street']),
			'wz_ORT'				=> dbx::escape($user['location']['city']),
			'wz_PLZ'				=> dbx::escape($user['location']['zip']),
			'wz_FROMSAMPLE'			=> 'Y',
			'wz_online'				=> 'Y',
			'wz_MIETE_VON' 			=> rand(0,200),
			'wz_MIETE_BIS' 			=> rand(3,2000),
			'wz_MITBEWOHNER'		=> $mfx[array_rand($mfx)],
			'wz_GESCHLECHT'			=> $mf[array_rand($mf)],
			'wz_ABLOESE' 			=> $ynx[array_rand($ynx)],
			'wz_RAUCHER' 			=> $ynx[array_rand($ynx)]
		);
		
		// gender
		$geschlecht = 'F';
		if ($user['gender'] == "male") $geschlecht = 'M';
		
		// img
		$imgSId	= 0;
		
		$imgUrl = trim($user['picture']['medium']);
		if ($imgUrl != '')
		{
			$imgSId	= self::downloadAndRegisterImage($imgUrl, $user['md5']);	
		}
		
		$insert['wz_PROFILBILD']	= $imgSId;
	
		dbx::insert("wizard_auto_707", $insert);
		$user_id = intval(dbx::getLastInsertId());
		
		if ($user_id == 0) die("?? lastInsert 0");
		
		
		
		//self::createAndfillProfile($type, $user_id);
		
		ob_flush();
		flush();
		ob_flush();
		flush();
		
		/*
		[user] => Array
        (
            [gender] => female
            [name] => Array
                (
                    [title] => miss
                    [first] => kayla
                    [last] => stuij
                )

            [location] => Array
                (
                    [street] => 3351 drift
                    [city] => lochem
                    [state] => utrecht
                    [zip] => 41819
                )

            [email] => kayla.stuij@example.com
            [username] => ticklishpeacock261
            [password] => santafe
            [salt] => FrM0slm0
            [md5] => 79bb836953f9e60bef9782be849c3b69
            [sha1] => 4fcc064a01700529999534f899e7629d2e3703a4
            [sha256] => 9961e5212431f9529ed6d802f883f8818cd3f4143d43b279ae833812582bad8d
            [registered] => 939091109
            [dob] => 207383862
            [phone] => (759)-979-2521
            [cell] => (078)-428-3581
            [BSN] => 12256329
            [picture] => Array
                (
                    [large] => https://randomuser.me/api/portraits/women/14.jpg
                    [medium] => https://randomuser.me/api/portraits/med/women/14.jpg
                    [thumbnail] => https://randomuser.me/api/portraits/thumb/women/14.jpg
                )

        )
	
		*/
		
		return true;
		
	}	
	
	
	public static function fillRooms($count)
	{
		
		$i = 1;
		
		$mfx = array("M", "F", "X");
		$ynx = array("Y", "N", "X");
		
		while($i <= $count)
		{
			
			$latLng = self::generateRandomLatLng();
			
			$insert = array(
			
				'wz_GROESSE'				=> rand(10,40),
				'wz_GROESSE_TOTAL'			=> rand(70,400),
				'wz_MIETE'					=> rand(200,800),
				'wz_MIETE_TOTAL'			=> rand(900,4000),
				'wz_ADRESSE_LAT'			=> $latLng['lat'],
				'wz_ADRESSE_LNG'			=> $latLng['lng'],
				'wz_online'					=> 'Y'
				);
			
			dbx::insert("wizard_auto_809", $insert);
			
			echo "\n\rinserted room $i";		
			
			$i++;
		}
		
	}
	
	public static function fillRoomsPictures($cnt, $tags, $pageCnt = 500)
	{
		
		$f 		= new phpFlickr("346ef3ce2e60946cce1b334385e999b1");
		$res	= $f->photos_search(array("tags"=>$tags, "tag_mode"=>"all", 'per_page'=>$pageCnt));
		
		foreach ($res['photo'] as $k => $v) 
		{
			$url 	= 	self::formatFlickrUrl($v);
			$s_id 	=	self::downloadAndRegisterImage($url, ($k+1)*$cnt, "room");
			
			$insert	= array(
				'wz_ROOMID' 	=> ($k+1)*$cnt,
				'wz_S_ID'		=> $s_id,
				'wz_online'		=> 'Y'
			);
			
			dbx::insert("wizard_auto_810", $insert);
		}
		return true;
	}
	
	public static function fillRoomsProfilesPictures($cnt, $tags, $perPage = 500)
	{
		
		$f 		= new phpFlickr("346ef3ce2e60946cce1b334385e999b1");
		$res	= $f->photos_search(array("tags"=>$tags, "tag_mode"=>"all", 'per_page'=>$perPage));
		
		$i = 1;
		foreach ($res['photo'] as $k => $v) 
		{
			$url 	= 	self::formatFlickrUrl($v);
			$s_id 	=	self::downloadAndRegisterImage($url, $i*$cnt, "room");
			
			$roomId = ($i)*$cnt;
			
			$update	= array(
				'wz_PROFILBILD' => $s_id,
			);
			
			echo "\n\r room $roomId set profile image $s_id";
			
			dbx::update("wizard_auto_809", $update, array('wz_id' => $roomId));
			$i++;
		}
		
		return true;
	}
	
	
	public static function formatFlickrUrl($response)
	{
			
		// https://farm{farm-id}.staticflickr.com/{server-id}/{id}_{secret}.jpg
		
		$url = "https://farm".$response['farm'].".staticflickr.com/".$response['server']."/".$response['id']."_".$response['secret'].".jpg";
		return $url;
	}

	
	public static function generateRandomLatLng()
	{
		
		$longitude 	= 16.358161;
		$latitude 	= 48.206025;
		$radius 	= rand(1,50); // in miles
		
		$lng 	= $longitude - $radius / abs(cos(deg2rad($latitude)) * 69);
		$lat 	= $latitude - ($radius / 69);
		
		return array(
			'lat'		=> $lat,
			'lng'		=> $lng
		);
		
	}
	
	
	public static function assignAdmin2Rooms()
	{
	
		$rooms = dbx::queryAll("select * from wizard_auto_809");
		
		
		// assign admin
		foreach ($rooms as $k => $v) {
			$randomAnbieterId = dbx::queryAttribute("select wz_id from wizard_auto_707 where wz_TYPE = 'biete' ORDER BY rand() LIMIT 1", 'wz_id');
			$id = $v['wz_id'];
			dbx::update("wizard_auto_809", array('wz_ADMIN' => $randomAnbieterId), array('wz_id' => $id));
		}
		
		return true;
		
	}
	
	
	public static function assignUser2Rooms($maxRoomId)
	{
	
		$user = dbx::queryAll("select wz_id from wizard_auto_707 where wz_TYPE = 'suche' ");
		
		// assign users to room
		foreach ($user as $k => $v) {
			
			$roomId 	= mt_rand(1,$maxRoomId);
			
			$insert 	= array(
				'wz_id_low' 	=> $v['wz_id'],
				'wz_id_high'	=> $roomId
			);
			
			echo "user ".$v['wz_id']."     =>     room $roomId \r ";
			
			dbx::insert("wizard_auto_SIMPLE_W2W_707_809", $insert);
		}
		
		return true;
		
	}
	
	
	public static function fillWgTestAnswers($user_id)
	{
		$user_id = intval($user_id);
		if ($user_id == 0) die("userid 0 @ fillWg");
		
		$countFragen = 15;
		$i 			 = 1;
		
		$frageMoeglichkeiten = array(
		
			'1' 	=> array(13,14,15),
			'2' 	=> array(16,17),
			'3'		=> array(18,19,20),
			'4' 	=> array(21,22,23),
			'5' 	=> array(24,25,26),
			'6' 	=> array(27,28,29),
			'7' 	=> array(30,31,32),
			'8' 	=> array(33,34,35),
			'9' 	=> array(36,37,38),
			'10' 	=> array(39,40,41),
			'11' 	=> array(42,43,44),
			'12' 	=> array(45,46,47),
			'13' 	=> array(48,48,50),
			'14' 	=> array(51,52,53),
			'15' 	=> array(54,55)
		);
		
		while ($i <= 15)
		{
			$update				= array(
				'wz_USERID'				=> $user_id,
				'wz_FRAGE_ID'			=> $i,
				'wz_ANTWORT_BIN'		=> $frageMoeglichkeiten[$i][array_rand($frageMoeglichkeiten[$i])],
				'wz_ANTWORT_SUCHE'		=> $frageMoeglichkeiten[$i][array_rand($frageMoeglichkeiten[$i])],
				'wz_ANTWORT_WICHTIG'	=> rand(0,3)
			);
			
			dbx::insert("wizard_auto_765", $update);	
			
			$i++;
		}
		
		
		return true;
	}
	
	
	public static function createAndfillProfile($type="suche", $user_id)
	{
		$user_id = intval($user_id);
		if ($user_id == 0) die("userid 0 @ creatProf");
		
		$user 	= dbx::query("select * from wizard_auto_707 where wz_id = $user_id");
		
		fe_user::createProfile($type, $user_id);
		
		$mfx = array("M", "F", "X");
		$ynx = array("Y", "N", "X");
		
		$updateSuche 	= array(
			'wz_MIETE_VON' 			=> rand(0,200),
			'wz_MIETE_BIS' 			=> rand(3,2000),
			'wz_MITBEWOHNER'		=> $mfx[array_rand($mfx)],
			'wz_ABLOESE' 			=> $ynx[array_rand($ynx)],
			'wz_RAUCHER' 			=> $ynx[array_rand($ynx)],
			'wz_ADRESSE_STRASSE'	=> $user['wz_STRASSE'],
			'wz_ADRESSE_STADT'		=> $user['wz_ORT'],
			'wz_ADRESSE_PLZ'		=> $user['wz_PLZ'],
		);
		
		$updateBiete 	= array(
			'wz_MIETE_VON' 					=> rand(0,200),
			'wz_MIETE_BIS' 					=> rand(3,2000),
			'wz_GESCHLECHT_MITBEWOHNER'		=> $mfx[array_rand($mfx)],
			'wz_ABLOESE' 					=> $ynx[array_rand($ynx)],
			'wz_RAUCHER' 					=> $ynx[array_rand($ynx)],
			'wz_AKTUELLE_MITBEWOHNER_M' 	=> rand(0,3),
			'wz_AKTUELLE_MITBEWOHNER_F' 	=> rand(0,3),
			'wz_ADRESSE_STRASSE'			=> $user['wz_STRASSE'],
			'wz_ADRESSE_STADT'				=> $user['wz_ORT'],
			'wz_ADRESSE_PLZ'				=> $user['wz_PLZ'],
		);
		
		switch ($type) 
		{
			case 'suche':
				$a_id	= 718;
				$update	= $updateSuche;
				break;
			case 'biete':
				$a_id	= 717;
				$update	= $updateBiete;
				break;
			default:
				return false;
				break;
		}
		
		$table 	= "wizard_auto_".$a_id;
		
		dbx::update($table, $update, array('wz_USERID' => $user_id));
	}
	

	public static function downloadAndRegisterImage($url, $id, $version=2, $type='user')
	{
		set_time_limit(0);
		
		$id = trim(basename($id));
		if ($id == "") return 0;
		
		$url = trim($url);
		if ($url == "") return 0;

		if ($type == "user")
		{
			$to = Ixcore::htdocsRoot . '/xstorage/userbilderSample/'.$id.'_'.$version.'.jpg';
		}
		else if($type == "room")
		{
			$to = Ixcore::htdocsRoot . '/xstorage/roombilderSample/'.$id.'_'.$version.'.jpg';
		}


		if (!file_exists($to))
		{
			echo "<br>\n Downloading: $url ...\n<br>";
			copy($url, $to);
			ob_flush();
			flush();
			ob_flush();
			flush();
		}

		return xredaktor_storage::registerExistingFile(1,$to);
	}
	
	
	
}
		