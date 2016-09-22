<?

class xluerzer_admin_credits
{
	public static function defaultAjaxHandler($scope,$function,$param_0)
	{

		switch ($scope)
		{
			case 'magtypes':
				self::magtypes($function);
				break;
			case 'assignedCredits':
				self::assignedCredits($function);
				break;
			default:
				die('xluerzer_admin_credits');
		}

	}

	public static function assignedCredits($function)
	{

		$emt_id = intval($_REQUEST['emt_id']);

		$insertContactTypes = dbx::queryAll("select * from a_contact_type where act_id not in (select c2m_c_id from a_credits2mag where c2m_m_id = $emt_id)");
		foreach ($insertContactTypes as $insert)
		{
			dbx::insert('a_credits2mag',array('c2m_m_id'=>$emt_id,'c2m_c_id'=>$insert['act_id'],'c2m_sort'=>999));
		}

		switch ($function)
		{
			case 'save_check':

				$c2m_id = intval($_REQUEST['c2m_id']);
				$check 	= intval($_REQUEST['check']);
				dbx::update('a_credits2mag',array('c2m_checked'=>$check),array('c2m_id'=>$c2m_id));
				frontcontrollerx::json_success(array());

				break;
			case 'load':

				$sql_data 	= "SELECT * FROM a_contact_type,a_credits2mag WHERE act_del = 'N' and c2m_m_id = $emt_id and c2m_c_id = act_id order by c2m_sort asc";
				$sql_cnt 	= "select count(act_id) as sql_cnt from `a_contact_type` where act_del =  'N'";

				xluerzer_db::uniqueDataGridWrapper(array(
				'sql_data' 	=> $sql_data,
				'sql_cnt' 	=> $sql_cnt,
				));

			case 'move':

				$recs2 = explode(",",$_REQUEST['recs2']);
				foreach ($recs2 as $sorter => $c2m_id)
				{
					$c2m_id = intval($c2m_id);
					if ($c2m_id == 0) continue;
					dbx::update("a_credits2mag",array('c2m_sort'=>$sorter),array('c2m_id'=>$c2m_id));
				}
				frontcontrollerx::json_success(array());
				break;
			default: break;
		}


		$extFunctionsConfig = array(
		'table'				=> 'a_contact_type',
		'db_prefix'			=> 'act_',
		'pid'				=> 'act_id',
		'fid'				=> 'act_fid',
		'sort'				=> 'act_sort',
		'del'				=> 'act_del',
		'fields'			=> array('act_id', 'act_description', 'act_archiveNumberPrefix', 'act_sort'),
		'extraInsert'		=> array('act_created_ts' => 'NOW()'),
		'update'			=> array(),
		'normalize'			=> array()
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}


	public static function magtypes($function)
	{

		$extFunctionsConfig = array(
		'table'				=> 'e_magazine_type',
		'db_prefix'			=> 'emt_',
		'pid'				=> 'emt_id',
		'fid'				=> 'emt_fid',
		'sort'				=> 'emt_sort',
		'del'				=> 'emt_del',
		'fields'			=> array('emt_id', 'emt_name', 'emt_archiveNumberPrefix', 'emt_sort'),
		'extraInsert'		=> array('emt_created_ts' => 'NOW()'),
		'update'			=> array(),
		'normalize'			=> array()
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}



}