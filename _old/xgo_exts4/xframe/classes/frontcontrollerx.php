<?

class frontcontrollerx
{
	private static $connState_JSON = false;

	public static function getDefaultLang()
	{
		return 'EN';
	}

	public static function getCurrentLang()
	{
		return 'DE';
	}

	public static function json_store($data)
	{
		if ($data === false) $data = array();
		return self::json(array('root'=>$data,'totalCount'=>count($data)));
	}

	public static function json_pstore($params,$sql,$pid,$sql_query,$order="")
	{
		if (!isset($params['limit'])) 	$params['limit'] 	= 150;
		if (!isset($params['offset'])) 	$params['offset'] 	= 0;
		if (!isset($params['start'])) 	$params['start'] 	= 0;

		$vars = self::_sanity($params,array(
		self::_sanity_int('limit','limit'),
		self::_sanity_int('offset','offset'),
		self::_sanity_int('start','offset'),
		'query'
		));

		$limit 	= $vars['limit'];
		$offset = $vars['offset'];
		$start 	= $vars['start'];
		$query 	= dbx::_escape($vars['query']);

		//if ($query == "<clear>") $query = "";


		list($select,$where) 		= explode("from",$sql,2);

		if (!is_array($sql_query))  $sql_query = array($sql_query);

		if (trim($query) != "")
		{
			$sql_finally_search = "";

			foreach ($sql_query as $i => $field) {
				$sql_query[$i] = " $field LIKE '%$query%' ";
			}

			$sql_finally_search = " ".implode(' OR ',$sql_query)."  ";


			list($tables,$wherex) = explode("where",$where);

			$sql_data 				= $select." from $tables where (".$wherex.") AND ($sql_finally_search) $order LIMIT $start, $limit";
			$sql_totalCount 		= "select count($pid) as countx from $tables where (".$wherex.") AND (".$sql_finally_search." ) ";


			#	echo $sql_data."\n";
			#		echo $sql_totalCount."\n\n\n";

		}
		else
		{
			$sql_data 				= $sql." $order LIMIT $start, $limit";
			//			$sql_totalCount 		= "select count($pid) as countx from ".$where;
			$sql_totalCount 		= "select count(a.$pid) as countx from ($sql) a";
		}

		$totalCount = dbx::_queryAttribute($sql_totalCount,"countx");
		$data = dbx::_queryAll($sql_data);

		if ($data === false) $data = array();

		return self::json(array('root'=>$data,'totalCount'=>$totalCount));
	}

	public static function setConnStateJSON()
	{
		self::$connState_JSON = true;
	}

	public static function isConnStateJSON()
	{
		return self::$connState_JSON;
	}

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

	public static function html_failure($msg,$errorId='?',$data=false)
	{
		//	header('HTTP/1.1 500 Internal Server Error');
		if (!is_array($data)) $data = array('data'=>$data);
		echo "\n$errorId - $msg\n";
		if ($data !== false) {
			echo print_r($data);
		}
		die();
	}

	public static function error_func_notfound()
	{
		self::json_failure(translatex::doTranslateError('FUNC_NOT_FOUND',-100),-100);
	}

	public static function error_scope_notfound()
	{
		self::json_failure(translatex::doTranslateError('SCOPE_NOT_FOUND',-101),-101);
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

	/**************************
	* EXT SPECIFIC
	*/

	public static function safeCallUserFunction($fn)
	{
		$args = func_get_args();
		array_shift($args);
		if (is_callable($fn)) return call_user_func_array($fn,$args);
		self::json_debug(array('isc'=>is_callable($fn)?'Y':'N',$fn,$args));
		self::json_failure(translatex::doTranslateError('FN_HANDLER_INVALID'.'-'.$fn,-102),-102);
	}

	public static function array2jsonTree($config,$data)
	{
		$nodes = array();
		if (!is_array($data)) $data = array();

		foreach ($data as $d)
		{
			$nodes[] = self::object2jsonTree($config,$d);
		}
		return json_encode($nodes);
	}



	public static function object2jsonTree($config,$d)
	{
		if (!is_array($data)) $data = array();

		/*$tmp = array(
		'leaf'  => (!$d['_is_dir']),
		'id'  	=> $d[$config['pid']]
		);*/

		$tmp = array(
		'leaf'  => false,
		'id'  	=> $d[$config['pid']]
		);

		if (!$d['_is_dir'])
		{
			$tmp['expanded'] = true;
			$tmp['loaded'] = true;
		}

		if (isset($config['_injectChecked'])&&$config['_injectChecked'])
		{
			$config['fields'][] = "checked";
		}
		
		foreach ($config['fields'] as $f)
		{
			$tmp[$f] = $d[$f];
		}
		return $tmp;
	}

	public static function processExtGrid_load($config,$fn)
	{
		$data = self::safeCallUserFunction($fn,$config);
		self::json_store($data);
		die();
	}

	public static function processExtTree_load($config,$fn)
	{
		$node = intval($_REQUEST['node']);
		$data = self::safeCallUserFunction($fn,$config,$node);
		echo self::array2jsonTree($config,$data);
		die();
	}

	public static function processExtGrid_insert($config,$fn)
	{
		$newRecordData = self::safeCallUserFunction($fn,$config);
		self::json_success(array('record'=>$newRecordData));
	}

	public static function processExtTree_insert($config,$fn)
	{
		$fatherId 	= self::isInt($_REQUEST['fid']);
		$name 		= dbx::escape($_REQUEST['name']);

		$newRecordData = self::safeCallUserFunction($fn,$config,$fatherId,$name);
		self::json_success(array('record'=>self::object2jsonTree($config,$newRecordData)));
	}

	public static function processExtTree_move($config,$fn)
	{
		$id 	= self::isInt($_REQUEST['id']);
		$nfid 	= self::isInt($_REQUEST['nfid']);
		$ofid 	= self::isInt($_REQUEST['ofid']);
		$sort 	= self::isInt($_REQUEST['sort']);

		self::safeCallUserFunction($fn,$config,$id,$ofid,$nfid,$sort);
		self::json_success();
	}

	public static function processExtGrid_move($config,$fn)
	{
		$dropPosition 	= ($_REQUEST['dropPosition']=='after') ? 'after' : 'before';
		$dropRec 		= self::isInt($_REQUEST['dropRec']);
		$recs 			= $_REQUEST['recs'];
		$recs2 			= $_REQUEST['recs2'];

		$recs2 = self::safeCallUserFunction($fn,$config,$recs,$dropPosition,$dropRec,$recs2);
		self::json_success($recs2);
	}

	public static function processExtTree_remove($config,$fn)
	{
		$ids		= explode(',',$_REQUEST['ids']);
		$cleanIds 	= array();

		foreach ($ids as $id)
		{
			if (is_numeric($id)) $cleanIds[] = $id;
		}

		if (count($cleanIds)==0)
		{
			frontcontrollerx::json_failure('NO_VALID_IDS',-300);
		}
		$ids2 = self::safeCallUserFunction($fn,$config,$ids);
		self::json_success($ids2);
	}

	
	public static function processExtGrid_remove($config,$fn)
	{
		$ids		= explode(',',$_REQUEST['ids']);
		$cleanIds 	= array();

		foreach ($ids as $id)
		{
			if (is_numeric($id)) $cleanIds[] = $id;
		}

		if (count($cleanIds)==0)
		{
			frontcontrollerx::json_failure('NO_VALID_IDS',-300);
		}
		$ids2 = self::safeCallUserFunction($fn,$config,$ids);
		self::json_success($ids2);
	}

	public static function processExtGrid_update($config,$fn)
	{
		$pid 	= $config['pid'];
		$update = $config['update'];

		if ($_REQUEST['idProperty'] != $pid) 		self::json_failure(translatex::doTranslateError('PRIMARY_ID_WRONG',-104),-104);
		if (!is_numeric($_REQUEST['id'])) 			self::json_failure(translatex::doTranslateError('PRIMARY_ID_NOT_NUMERIC',-103),-103);

		$idOfRecord = $_REQUEST['id'];

		$data = array(
		dbx::escape($_REQUEST['field']) => dbx::escape($_REQUEST['value'])
		);

		$newRecordData = self::safeCallUserFunction($fn,$config,$idOfRecord,$data);

		
		$reloadGrid = false;
		if (self::arrayGet('updateAllTrigger',$config)=='Y') $reloadGrid = true;
		
		self::json_success(array('record'=>$newRecordData,'reload'=>$reloadGrid));
	}

	public static function processExtTree_update($config,$fn)
	{
		$pid 	= $config['pid'];
		$update = $config['update'];

		if ($_REQUEST['idProperty'] != $pid) 		self::json_failure(translatex::doTranslateError('PRIMARY_ID_WRONG',-104),-104);
		if (!is_numeric($_REQUEST['id'])) 			self::json_failure(translatex::doTranslateError('PRIMARY_ID_NOT_NUMERIC',-103),-103);

		$idOfRecord = $_REQUEST['id'];

		$data = array(
		dbx::escape($_REQUEST['field']) => dbx::escape($_REQUEST['value'])
		);

		$newRecordData = self::safeCallUserFunction($fn,$config,$idOfRecord,$data);

		self::json_success(array('record'=>self::object2jsonTree($config,$newRecordData)));
	}

	private static function _parseInputError($field,$config,$value)
	{
		if (isset($config['error'][$field]))
		{
			$errorMsg = sprintf($config['error'][$field],$value);
			self::json_failure($errorMsg,-200);
		}
		self::json_failure(translatex::doTranslateError('INPUT_TYPE_WRONG',-200).'-'.$field.'-'.$value,-200);
	}

	public static function parseInput($config, $useThisArrayOrRequestVar=true){
		global $_REQUEST;
		if ($useThisArrayOrRequestVar === true) $useThisArrayOrRequestVar = $_REQUEST;

		if (!is_array($config['int'])) 		$config['int'] = array();
		if (!is_array($config['string'])) 	$config['string'] = array();

		$int 	= $config['int'];
		$string = $config['string'];

		$finally = array();

		foreach ($int as $i)
		{
			if (isset($useThisArrayOrRequestVar[$i]))
			{
				if (!is_numeric($useThisArrayOrRequestVar[$i])) {
					self::_parseInputError($i,$config,$useThisArrayOrRequestVar[$i]);
				} else
				{
					$finally[$i] = $useThisArrayOrRequestVar[$i];
				}
			}
		}

		foreach ($string as $s)
		{
			if (isset($useThisArrayOrRequestVar[$s]))
			{
				$finally[$s] = $useThisArrayOrRequestVar[$s];
			}
		}

		return $finally;
	}

	public static function getInt($index,$var=false)
	{
		if ($var === false) $var = $_REQUEST;
		if (!isset($_REQUEST[$index])) 	{return false;}
		if (!is_numeric($_REQUEST[$index])) {return false;}
		return trim($_REQUEST[$index]);
	}
	
	public static function isInt($value,$error="")
	{
		if (!is_numeric($value)) {
			
			if (libx::isDeveloper())
			{
				$data = array('backtrace'=>debug_backtrace());
			}
			
			if ($error == "")
			{
				self::json_failure(translatex::doTranslateError('VALUE_NOT_INT',-105),-105,$data);
			}
			else {
				self::json_failure(translatex::doTranslateError('VALUE_NOT_INT_'.$error.'_'.$value,-105),-105,$data);
			}
		}
		return $value;
	}

	public static function isNotEmptyString($value,$error="")
	{
		$value = trim($value);
		if ($value == "") {
			if ($error == "")
			{
				self::json_failure(translatex::doTranslateError('VALUE_NOT_INT',-105),-105);
			}
			else {
				self::json_failure(translatex::doTranslateError('VALUE_NOT_INT_'.$error.'_'.$value,-105),-105);
			}
		}
		return dbx::escape($value);
	}

	public static function flashUpload_enable()
	{
		@session_start();
		$_SESSION['FILE_UPLOAD_VIA_FLASH'] = true;
	}

	public static function flashUpload_handle($fn)
	{
		@session_start();
		if (isset($_SESSION['FILE_UPLOAD_VIA_FLASH']))
		{
			self::safeCallUserFunction($fn);
		} else
		{
			die('XXX');
		}
	}
	
	public static function arrayGet($key,$array=false)
	{
		if ($array === false) $array = $_REQUEST;
		if (!isset($array[$key])) return false;
		return $array[$key];
	}

	public static function header404()
	{
		header("HTTP/1.0 404 Not Found");
		die("HTTP/1.0 404 Not Found");
	}

	public static function sendFile2ClientAsDownlod($f)
	{
		header('Content-type: application/force-download');
		header('Content-Disposition: attachment; filename="'.basename($f).'"');
		readfile($f);
		die();
	}
	
	
	public static function senseVarInt($name)
	{
		if (!isset($_REQUEST[$name])) 		return false;
		if (!is_numeric($_REQUEST[$name])) 	return false;
		return intval($_REQUEST[$name]);
	}

}