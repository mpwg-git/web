<?

class xredaktor_users
{

	public static function getRolesExtFunctionsConfig()
	{

		$fields = array('r_id','r_vid','r_name','r_lastmod','r_lastmodBy','r_isOnline','r_sort');
		$update = array('r_name','r_vid','r_isOnline');
		$string = array('r_name','r_isOnline');

		$extFunctionsConfig = array(
		'table'		=> 'roles',
		'sort'		=> 'r_sort',
		'pid'		=> 'r_id',
		'fid'		=> 'r_fid',
		'name'		=> 'r_name',
		'del'		=> 'r_del',
		'extraLoad'	=> "1=1",
		'extraInsert' => array('r_created' => 'NOW()'),
		'fields'	=> $fields,
		'update'	=> $update,
		'normalize'	=> array(
		'string'	=> $string,
		'int'		=> array()
		),
		'postHooks' 		=> array(
		));

		return $extFunctionsConfig;
	}


	public static function getUserSettings($u_id)
	{

		$data 	= array();
		$_tags 	= dbx::queryAll("select roles_tags.* from roles_tags,roles_tags_user where rt_del='N' and rtu_u_id = $u_id and rtu_rt_id = rt_id");
		$tags 	= array();

		foreach ($_tags as $t)
		{
			$tags[$t['rt_tag']] = $t;
		}

		$data['tags'] = $tags;

		$u = dbx::query("select * from be_users where wz_id = $u_id");
		$data['flag_admin'] = ($u['wz_u_is_admin'] == 'Y') ? 'Y' : 'N';

		return $data;
	}

	public static function handleAjax($function)
	{

		switch ($function)
		{
			default: break;
		}

		$fields = array('wz_id','wz_u_username','wz_lastmod','wz_lastmodBy','wz_sort','wz_u_username');
		$update = array('wz_u_username');
		$string = array('wz_u_username');

		$extFunctionsConfig = array(
		'table'		=> 'be_users',
		'sort'		=> 'wz_sort',
		'pid'		=> 'wz_id',
		'fid'		=> 'wz_fid',
		'name'		=> 'wz_u_username',
		'del'		=> 'wz_del',
		'extraInsert' 	=> array('wz_created' => 'NOW()'),
		'fields'	=> $fields,
		'update'	=> $update,
		'normalize'	=> array(
		'string'	=> $string,
		'int'		=> array()
		),
		'postHooks' 		=> array(
		));

		switch ($function)
		{
			case 'update':


				$id = intval($_REQUEST['id']);

				if ($_REQUEST['field'] == "wz_u_username")
				{
					$v 	= dbx::escape($_REQUEST['value']);
					$present = dbx::query("select * from be_users where wz_del = 'N' and wz_u_username = '$v'");
					if ($present !== false) frontcontrollerx::json_failure("Benutzername bereits vergeben !");
				}

				xredaktor_log::userUpdate($id);

				xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$function);

				break;
			case 'insert':

				$name = dbx::escape($_REQUEST['name']);
				dbx::insert('be_users',array('wz_u_username'=>$name,'wz_del'=>'N','wz_u_password'=>md5(time())));

				$id = dbx::getLastInsertId();
				xredaktor_log::userInsert($id);

				frontcontrollerx::json_success();
				break;
			case 'loadSettings':

				$u_id	= intval($_REQUEST['u_id']);

				$data = array();
				$tags = dbx::queryAll("select * from roles_tags where rt_del='N'");


				dbx::insert('roles_tags_user',array('rtu_rt_id'=>$id,'rtu_u_id'=>$u_id));

				foreach ($tags as $t)
				{
					$id = $t['rt_id'];
					$present = dbx::query("select * from roles_tags_user where rtu_u_id = $u_id and rtu_rt_id = $id");
					$data['tag_'.$id] = ($present !== false);
				}

				$u = dbx::query("select * from be_users where wz_id = $u_id");
				$data['flag_admin'] = ($u['wz_u_is_admin'] == 'Y') ? 'Y' : 'N';

				$normFields = array('wz_u_firstName','wz_u_lastName','wz_u_email','wz_u_company','wz_u_phone','wz_u_mobile');
				foreach ($normFields as $f)
				{
					$data[$f] = $u[$f];
				}

				frontcontrollerx::json_success(array('d'=>$data));
				break;

			case 'saveSettings':

				$u_id	= intval($_REQUEST['u_id']);
				$clean 	= array();

				$tags = dbx::queryAll("select * from  roles_tags where rt_del='N'");

				dbx::delete('roles_tags_user',array('rtu_u_id'=>$u_id));

				foreach ($tags as $t)
				{
					$id 	= $t['rt_id'];
					$key 	= 'tag_'.$id;
					if (!isset($_REQUEST[$key])) continue;
					$active  = ($_REQUEST[$key] == 'Y');

					if ($active)
					{
						dbx::insert('roles_tags_user',array('rtu_rt_id'=>$id,'rtu_u_id'=>$u_id));
					}
				}

				xredaktor_log::userUpdate($u_id);

				$flag_admin = ($_REQUEST['flag_admin'] == "Y");

				dbx::update("be_users",array('wz_u_is_admin'=>'N','wz_online'=>'Y'),array('wz_id'=>$u_id));
				if ($flag_admin)
				{
					dbx::update("be_users",array('wz_u_is_admin'=>'Y'),array('wz_id'=>$u_id));
				}

				if (isset($_REQUEST['pass']) && (trim($_REQUEST['pass']) != ""))
				{
					$pass = dbx::escape($_REQUEST['pass']);
					dbx::update("be_users",array('wz_u_password'=>$pass),array('wz_id'=>$u_id));
				}

				$normFields = array('wz_u_firstName','wz_u_lastName','wz_u_email','wz_u_company','wz_u_phone','wz_u_mobile');


				$data = array();
				foreach ($normFields as $f) {

					if (isset($_REQUEST[$f]))
					{
						$data[$f] = dbx::escape($_REQUEST[$f]);
					}

				}
				dbx::update('be_users',$data,array('wz_id'=>$u_id));

				frontcontrollerx::json_success();

				break;

			case 'activatePermissions':

				$active = ($_REQUEST['active'] == 1);
				$u_id	= intval($_REQUEST['u_id']);
				$r_id 	= intval($_REQUEST['r_id']);


				dbx::delete('roles_user',array('ru_u_id'=>$u_id,'ru_r_id'=>$r_id));
				if ($active) {
					dbx::insert('roles_user',array('ru_u_id'=>$u_id,'ru_r_id'=>$r_id));
				}
				frontcontrollerx::json_success();

				break;

			case 'loadRoles':

				$extFunctionsConfig = self::getRolesExtFunctionsConfig();


				$node = $_REQUEST['node'];
				$data = xredaktor_defaults::getAllByFather($extFunctionsConfig,$node);

				$extFunctionsConfig['_injectChecked'] = true;

				$u_id	= intval($_REQUEST['u_id']);

				foreach ($data as $i => $d)
				{
					$r_id = intval($d['r_id']);
					$state = dbx::query("select ru_id from roles_user where ru_u_id = $u_id and  ru_r_id = $r_id");
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