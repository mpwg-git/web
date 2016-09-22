<?

class curlx
{

	private static $version		= "2.0";

	public static function simple_UTF8_Curl($url,$fields)
	{
		$fields_string = "";
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.utf8_encode($value).'&'; }
		rtrim($fields_string,'&');
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_POST,count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

	public static function getAuthContent($location,$user,$password)
	{
		$ch = curl_init($location);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
		curl_setopt($ch, CURLOPT_USERPWD, $user.':'.$password);
		$response = curl_exec($ch);

		if($response === false)
		{
			echo 'Curl-Fehler: ' . curl_error($ch);
		}

		return $response;
	}

	public static function get_file($url, $local)
	{
		$err_msg = '';

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL, $url);

		$response = curl_exec($ch);
		if ($response === false) return false;
		curl_close($ch);

		return hdx::_fwrite($local,$response);
	}

}
