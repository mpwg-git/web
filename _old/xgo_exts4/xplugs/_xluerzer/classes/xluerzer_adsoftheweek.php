<?

class xluerzer_adsoftheweek
{
	public static function defaultAjaxHandler($function,$param_0)
	{

		switch ($function)
		{
			case 'overview':
				self::handleOverview($param_0);
				break;

			case 'details':
				self::handleDetails($param_0);
				break;

			default:
				die('JJJ');
		}
	}

	public static function afterInsert($id)
	{
		$id = intval($id);
		
		$week	= dbx::queryAttribute("SELECT MAX( esotw_kw ) +1 AS esotw_kw FROM e_spots_of_the_week WHERE esotw_year = YEAR( CURDATE( ) )","esotw_kw");
		$year 	= date("Y");
		
		dbx::update('e_spots_of_the_week',array("esotw_date"=>$year.'-'.$week,'esotw_kw'=>$week,'esotw_year'=>$year),array('esotw_id'=>$id));
	}
	
	public static function handleOverview($function)
	{

		$currUser = xluerzer_user::getCurrentUserId();

		$extFunctionsConfig = array(
		'table'				=> 'e_spots_of_the_week',
		'db_prefix'			=> 'esotw_',
		'pid'				=> 'esotw_id',
		'fid'				=> 'esotw_id',
		'sort'				=> 'esotw_date',
		'del'				=> 'esotw_del',
		'fields'			=> array('esotw_id', 'esotw_date', 'esotw_spotClient', 'esotw_spotTitle', 'esotw_spotLength', 'esotw_classicClient', 'esotw_classicTitle', 'esotw_classicLength','esotw_printClient','esotw_active','esotw_login','esotw_modified_by','esotw_modified_ts','esotw_spotSubmission_id','esotw_spotMedia_id','esotw_classicSubmission_id','esotw_classicMedia_id','esotw_printSubmission_id','esotw_printMedia_id','esotw_spotDescription','esotw_classicDescription','esotw_printDescription','esotw_spotWidth','esotw_spotHeight','esotw_kw','esotw_year','esotw_del','esotw_fid','esotw_sort','esotw_created_ts','esotw_created_by'),
		'extraInsert'		=> array('esotw_created_ts' => 'NOW()', 'esotw_created_by' => $currUser),
		'update'			=> array(),
		'normalize'			=> array(),
		'postHooks' 		=> array(
		'insert'			=> 'xluerzer_adsoftheweek::afterInsert',
		)
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}


	public static function handleDetails($function)
	{

		$esotw_id = intval($_REQUEST['esotw_id']);

		switch ($function)
		{
			case 'load':
				$record = dbx::query("select * from e_spots_of_the_week where esotw_id = $esotw_id");
				frontcontrollerx::json_success(array('record'=>$record));
			case 'save':

				$fields = array('esotw_id', 'esotw_date', 'esotw_spotClient', 'esotw_spotTitle', 'esotw_spotLength', 'esotw_classicClient', 'esotw_classicTitle', 'esotw_classicLength','esotw_printClient','esotw_active','esotw_login','esotw_modified_by','esotw_modified_ts','esotw_spotSubmission_id','esotw_spotMedia_id','esotw_classicSubmission_id','esotw_classicMedia_id','esotw_printSubmission_id','esotw_printMedia_id','esotw_spotDescription','esotw_classicDescription','esotw_printDescription','esotw_spotWidth','esotw_spotHeight','esotw_kw','esotw_year','esotw_del','esotw_fid','esotw_sort','esotw_created_ts','esotw_created_by');
				$db = array();
				$data = json_decode($_REQUEST['data'],true);

				foreach ($fields as $f)
				{
					if (!isset($data[$f])) continue;
					$db[$f] = $data[$f];
				}

				$esotw_kw	= intval($db['esotw_kw']);
				$esotw_year = intval($db['esotw_year']);

				$db['esotw_date'] = $esotw_year.'-'.$esotw_kw;

				$db['esotw_modified_by'] = xluerzer_user::getCurrentUserId();

				dbx::update('e_spots_of_the_week',$db,array('esotw_id'=>$esotw_id));
				frontcontrollerx::json_success();
				break;
			default: break;
		}

	}


}