<?

class xredaktor_roles
{


	public static function table2tag($extFunctionsConfig)
	{
		$table = $extFunctionsConfig['table'];

		switch ($table)
		{
			case 'atoms':
				return 'atoms
				';
			default:
				return false;
		}
	}


	public static function updatePermissionSetup($extFunctionsConfig,$function)
	{
return $extFunctionsConfig;
		$rs_s_id 	= self::getSiteId();
		$u_id 		= self::getUserId();

		if ($u_id != 6) {
			return $extFunctionsConfig;
		}

		switch ($function)
		{
			case 'load':

				$tag = $extFunctionsConfig['roles_tag'];
				if ($tag == "") {
					return $extFunctionsConfig;
				}

				if (!isset($extFunctionsConfig['extraLoad'])) {
					$extFunctionsConfig['extraLoad'] = "";
				} else
				{
					$extFunctionsConfig['extraLoad'] .= " and ";
				}

				$pid = $extFunctionsConfig['pid'];


				$rolesSql 	= " select ru_r_id from roles_user where ru_u_id = $u_id ";
				$sql 		= " $pid IN ( select rs_f_rid from roles_settings where rs_s_id = $rs_s_id and rs_del='N' and rs_tag = '$tag' and rs_x_read = 'Y' and rs_x_recursive = 'N' and rs_r_id IN ( $rolesSql  )  )";

				$recursives = dbx::queryAll("select rs_f_rid from roles_settings where rs_s_id = $rs_s_id and rs_del='N' and rs_tag = '$tag' and rs_x_read = 'Y' and rs_x_recursive = 'Y' and rs_r_id IN ( $rolesSql  )   ");

				
				if ($recursives !== false) {

					// collect all root lines !

					foreach ($recursives as $rx)
					{
						$rs_f_rid = intval($rx['rs_f_rid']);
						$ids = self::getRootLineOfForeign($rs_s_id,$tag,$rs_f_rid);
						print_r($ids);
						die('x');
					}



					//die();
				}

				$extFunctionsConfig['extraLoad'] .= $sql;


				//die($extFunctionsConfig['extraLoad']);

				return $extFunctionsConfig;
			case 'update':
				return $extFunctionsConfig;
			case 'insert':
				return $extFunctionsConfig;
			case 'move':
				return $extFunctionsConfig;
			case 'remove':
				return $extFunctionsConfig;
			default: break;
		}

		return $extFunctionsConfig;
	}

	public static function getSiteId()
	{
		return 0;
	}

	public static function getUserId()
	{
		return xredaktor_core::getUserId();
	}

	public static function isUserAdmin($u_id)
	{
		if ($u_id == 6) return false;
		return xredaktor_core::isAdmin();
	}



	public static function getRolesOfUser($u_id)
	{
		$u_id 	= intval($u_id);
		$roles 	= dbx::queryAll("select * from roles_user where ru_u_id = $u_id ");
		if ($roles === false) $roles = array();

		return $roles;
	}


	public static function checkAccess($u_id, $tag, $f_id, $action)
	{

		if (self::isUserAdmin($u_id)) return true;

		$access = false;
		$roles 	= self::getRolesOfUser($u_id);

		foreach ($roles as $r)
		{
			$r_id = intval($r['ru_r_id']);
			$access = self::checkAccessByRole(self::getSiteId(),$r_id, $tag,$u_id, $f_id, $action);
			if ($access) return true;
		}

		return false;
	}

	private static function generateDefaultSettingsForDbCatching($table,$prefix, $selectors=false)
	{
		$ret = array(

		'table' 	=> $table,
		'pid'		=> $prefix."_id",
		'del'		=> $prefix."_del",
		'father'	=> $prefix."_fid",
		'select'	=> ''

		);


		if ($selectors !== false)
		{
			$sql_select = array();

			foreach ($selectors as $k => $v)
			{
				$sql_select = " '$k' => '$v' ";
			}

			$ret['select'] = ' AND '.implode(" AND ",$sql_select);
		}

		return $ret;
	}

	public  static function resolveForeignRecords($tag)
	{
		switch ($tag)
		{
			case 'fa':
				return self::generateDefaultSettingsForDbCatching('storage','s');

			case 'infopool':
			case 'wizard':
				return self::generateDefaultSettingsForDbCatching('atoms','a',array('a_type'=>'WIZARD'));

				break;
			case 'pages':
				return self::generateDefaultSettingsForDbCatching('pages','p');

				break;
			case 'atoms':
				return self::generateDefaultSettingsForDbCatching('atoms','a',array('a_type'=>'ATOM'));

			case 'frames':
				return self::generateDefaultSettingsForDbCatching('atoms','a',array('a_type'=>'FRAME'));

			default: return false;
		}
	}



	private static function getForeigNodes($dbSettings, $f_id)
	{
		// TO DO

		$f_id	= intval($f_id); // 0 === sehr gefährlich, würde alles freischalten ... ? Oder shit :D House of Cards welcome #7

		$table 	= $dbSettings['table'];
		$pid 	= $dbSettings['pid'];
		$del 	= $dbSettings['del'];
		$father = $dbSettings['father'];
		$select = $dbSettings['select'];


		$father 	= dbx::query("select * from $table where $del = 'N' and $pid = $f_id ");

		$id 		= intval($father[$pid]);
		$grandpa 	= intval($father[$father]);

		if ($f_id == 0)	return array();
		return array_merge($id,self::getForeigNodes($dbSettings,$grandpa));
	}

	private static function getRootLineOfForeign($s_id, $tag, $f_id)
	{
		$settings = self::resolveForeignRecords($tag);
		if ($settings === false) return array(); // unkown tag

		$dbSettings = self::resolveForeignRecords($tag);
		$ids 		= self::getForeigNodes($dbSettings, $f_id);

		return $ids;
	}

	public static function checkAccessByRole($s_id, $r_id, $tag, $u_id, $f_id, $action)
	{
		// saftey first

		$action = strtolower($action);
		if (!in_array($action,array('read','insert','update','delete')))
		{
			return false;
		}

		$r_id 	= intval($r_id);
		$u_id 	= intval($u_id);
		$f_id 	= intval($f_id);
		$s_id 	= intval($s_id);

		$tag 	= dbx::escape($tag);


		// ***********************************************************************
		// check if specific node has rights, faster up access control !

		$sql = "select * from roles_settings where rs_del='N' and rs_s_id = $s_id and rs_r_id = $r_id and rs_tag = '$tag' and rs_f_rid = $f_id ";
		$specificTagSettings = dbx::query($sql);



		if ($specificTagSettings !== false)
		{
			if ($specificTagSettings['rs_x_'.$action] == 'Y') 	return true;
			if ($specificTagSettings['rs_x_recursive'] == 'N') 	return false;
		}


		// *******************************************************
		// Check Recursive Flags

		$flagWichMustBeTrue = 'rs_x_'.$action;

		$ids = self::getRootLineOfForeign($s_id,$tag,$f_id);
		if (count($ids) == 0) return false;
		$ids = implode(",",$ids);

		$inspectThoseNodes = dbx::query("select * from roles_settings where rs_del='N' and  rs_s_id = $s_id and rs_r_id = $r_id and rs_tag = '$tag' and rs_f_rid IN ($ids) and $flagWichMustBeTrue = 'Y' and rs_x_recursive = 'Y'");

		if ($inspectThoseNodes === false) return false; // NO Node has a recursive and $flagWichMustbeTrue Flag ;(


		return false;
	}

	private static function getCfgAtomsByType($a_s_id, $a_type)
	{
		if (is_numeric($a_s_id))
		{
			xredaktor_niceurl::setSiteConfig($a_s_id);
		}

		$fields = array('a_id','a_name','a_lastmod','a_lastmodBy','a_vid','a_sort');
		$update = array();
		$string = array('a_name');

		$feLanges = xredaktor_pages::getValidLangs();

		foreach ($feLanges as $l)
		{
			$l = strtolower($l);
			$fields[] = 'a_name_'.$l;
			$update[] = 'a_name_'.$l;
			$string[] = 'a_name_'.$l;
		}

		$extFunctionsConfig = array(
		'table'		=> 'atoms',
		'sort'		=> 'a_sort',
		'pid'		=> 'a_id',
		'fid'		=> 'a_fid',
		'name'		=> 'a_name',
		'del'		=> 'a_del',
		'extraInsert' 	=> array('a_created' => 'NOW()'),
		'fields'	=> $fields,
		'update'	=> $update,
		'normalize'	=> array(
		'string'	=> $string,
		'int'		=> array('a_vid')
		),
		'postHooks' 		=> array(
		));

		switch ($a_type)
		{
			case 'ATOM':
			case 'FRAME':
			case 'WIZARD':
				$extFunctionsConfig['extraMove'] 	= " a_type = '$a_type' and a_s_id = '$a_s_id' ";
				$extFunctionsConfig['extraLoad'] 	= " a_type = '$a_type' and a_s_id = '$a_s_id' ";
				$extFunctionsConfig['extraInsert'] 	= array('a_type' => $a_type,'a_s_id'=>$a_s_id);
				break;
			default: break;
		}

		return $extFunctionsConfig;
	}


	private static function getCfgByTag($tag)
	{
		$ge_s_id = intval(frontcontrollerx::senseVarInt('ge_s_id'));

		switch ($tag)
		{
			case 'tags':
				
				
				$rt_s_id = $ge_s_id;

				$fields = array('rt_id','rt_vid','rt_name','rt_lastmod','rt_lastmodBy','rt_isOnline','rt_sort','rt_name_human');
				$update = array('rt_name','rt_name_human','rt_vid','rt_isOnline');
				$string = array('rt_name','rt_name_human','rt_isOnline');

				$extFunctionsConfig = array(
				'table'		=> 'roles_tags',
				'sort'		=> 'rt_sort',
				'pid'		=> 'rt_id',
				'fid'		=> 'rt_fid',
				'name'		=> 'rt_name',
				'del'		=> 'rt_del',
				'extraInsertFlyInt' => array('rt_s_id'),
				'extraLoad'			=> " rt_s_id = $rt_s_id ",
				'extraInsert' => array('rt_created' => 'NOW()','rt_s_id'=>$rt_s_id),
				'fields'	=> $fields,
				'update'	=> $update,
				'normalize'	=> array(
				'string'	=> $string,
				'int'		=> array()
				),
				'postHooks' 		=> array(
				));

				return $extFunctionsConfig;
				
				break;
			case 'infopool':
				return self::getCfgAtomsByType($ge_s_id,'WIZARD');
			case 'atoms':
				return self::getCfgAtomsByType($ge_s_id,'ATOM');
			case 'frames':
				return self::getCfgAtomsByType($ge_s_id,'FRAME');
			case 'fa':

				$fields = array('s_id','s_name','s_lastmod','s_lastmodBy','webSrc','scaleSrc','s_alts','s_dir','s_mimeType','s_media_w','s_media_h','s_fileSizeBytes','s_fileSizeBytesHuman','s_storage_scope');
				$update = array('s_name','s_alts');
				$string = array('s_name');

				$s_storage_scope = dbx::queryAttribute("select * from sites where s_del='N' and s_id = $ge_s_id","s_s_storage_scope");

				$extFunctionsConfig = array(
				'table'				=> 'storage',
				'sort'				=> 's_sort',
				'pid'				=> 's_id',
				'fid'				=> 's_fid',
				'del'				=> 's_del',
				'name'				=> 's_name',
				'extraLoad'			=> "s_dir = 'Y' and s_storage_scope = '$s_storage_scope'",
				'isDirCheck'		=> 'xredaktor_storage::isDir',
				'fields'			=> $fields,
				'update'			=> $update,
				'normalize'			=> array(
				'string'			=> $string),
				's_storage_scope'	=> $s_storage_scope,
				'extraInsert'		=> array(
				's_storage_scope'	=> $s_storage_scope),
				'preHooks' 			=> array(
				'insert'			=> 'xredaktor_storage::preInsert',
				'move'				=> 'xredaktor_storage::preMove',
				'update'			=> 'xredaktor_storage::preRename'),
				'postHooks' 		=> array(
				'insert'			=> 'xredaktor_storage::dirInsert',
				'move'				=> 'xredaktor_storage::dirMove',
				'update'			=> 'xredaktor_storage::dirRename',
				));

				return $extFunctionsConfig;

			case 'pages':

				$p_s_id = $ge_s_id;

				$fields = array('p_id','p_vid','p_name','p_lastmod','p_lastmodBy','p_isOnline','p_inMenue','p_frameid','p_sort');
				$update = array('p_name','p_vid','p_isOnline','p_frameid','p_inMenue');
				$string = array('p_name','p_isOnline','p_inMenue');

				$extFunctionsConfig = array(
				'table'		=> 'pages',
				'sort'		=> 'p_sort',
				'pid'		=> 'p_id',
				'fid'		=> 'p_fid',
				'name'		=> 'p_name',
				'del'		=> 'p_del',
				'extraInsertFlyInt' => array('ge_s_id'),
				'extraLoad'			=> " p_s_id = $p_s_id ",
				'extraInsert' => array('p_created' => 'NOW()','p_s_id'=>$p_s_id),
				'fields'	=> $fields,
				'update'	=> $update,
				'normalize'	=> array(
				'string'	=> $string,
				'int'		=> array('p_frameid','p_vid')
				),
				'postHooks' 		=> array(
				));

				return $extFunctionsConfig;

			default: break;
		}

		frontcontrollerx::error_func_notfound();
	}

	public static function handleAjax($function)
	{

		switch ($function)
		{
			case 'testX':

				$check = 224;

				echo "<pre>";
				echo "UID:".xredaktor_core::getUserId()."_($check)<br><br>";
				$state = self::checkAccess(xredaktor_core::getUserId(),'infopool',$check,'read');

				if ($state)
				{
					echo "OK<br><br>";
				} else
				{
					echo "NOK<br><br>";
				}

				echo "</pre>";

				die('TTT');
				break;
			default: break;
		}

		$extFunctionsConfig = self::getCfgByTag($_REQUEST['tag']);

		switch ($function)
		{
			case 'loadPermissions':

				$tag	= $_REQUEST['tag'];
				$r_id	= intval($_REQUEST['r_id']);
				$target = intval($_REQUEST['target']);
				$data = dbx::query("select * from roles_settings where rs_tag = '$tag' and rs_r_id = $r_id and rs_f_rid = $target");
				frontcontrollerx::json_success(array('d'=>$data));

				break;

			case 'savePermissions':

				$tag	= $_REQUEST['tag'];
				$r_id	= intval($_REQUEST['r_id']);
				$target = intval($_REQUEST['target']);


				$fields = array('rs_x_read','rs_x_insert','rs_x_update','rs_x_delete','rs_x_recursive');
				$in 	= array('rs_tag'=>$tag,'rs_r_id'=>$r_id,'rs_f_rid'=>$target);

				foreach ($fields as $f)
				{
					$in[$f] = "N";
					if (isset($_REQUEST[$f]) && ($_REQUEST[$f] == 'Y')) $in[$f] = "Y";
				}

				dbx::delete('roles_settings',array('rs_tag'=>$tag,'rs_r_id'=>$r_id,'rs_f_rid'=>$target));
				dbx::insert('roles_settings',$in);
				frontcontrollerx::json_success();

				break;

			case 'activatePermissions':

				$active = ($_REQUEST['active'] == 1);
				$tag	= $_REQUEST['tag'];

				$r_id	= intval($_REQUEST['r_id']);
				$target = intval($_REQUEST['target']);

				if ($active) {
					dbx::delete('roles_settings',array('rs_tag'=>$tag,'rs_r_id'=>$r_id,'rs_f_rid'=>$target));
					dbx::insert('roles_settings',array('rs_tag'=>$tag,'rs_r_id'=>$r_id,'rs_f_rid'=>$target));
				} else {
					dbx::delete('roles_settings',array('rs_tag'=>$tag,'rs_r_id'=>$r_id,'rs_f_rid'=>$target));
				}

				frontcontrollerx::json_success();
				break;
			case 'load':

				$node = $_REQUEST['node'];
				$data = xredaktor_defaults::getAllByFather($extFunctionsConfig,$node);

				$extFunctionsConfig['_injectChecked'] = true;


				$tag	= $_REQUEST['tag'];
				$r_id	= intval($_REQUEST['r_id']);

				foreach ($data as $i => $d)
				{
					$target = intval($d[$extFunctionsConfig['pid']]);
					$sql = "select rs_id from roles_settings where rs_tag = '$tag' and rs_r_id = $r_id and rs_f_rid = $target";

					//echo "$sql<br>\n";
					$state = dbx::query($sql);
					$data[$i]['checked'] = ($state !== false);
				}


				echo frontcontrollerx::array2jsonTree($extFunctionsConfig,$data);
				die();

				break;
			default:
				xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$function);
		}

		frontcontrollerx::error_func_notfound();
	}

}