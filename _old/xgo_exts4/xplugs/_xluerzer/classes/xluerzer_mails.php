<?

class xluerzer_mails
{
	public static function defaultAjaxHandler($scope, $function)
	{
		switch ($scope)
		{
			case 'overview':
				self::handleOverview($function);
				break;	
			case 'details':
				self::handleDetails($function);
				break;
			case 'save':
				self::handleSave($function);
				break;
			default:
				return false;
		}

	}

	public static function handleOverview($function)
	{
		
		$extFunctionsConfig = xluerzer::checkDefaultExtFunction(array(
		'table'				=> 'a_mail_templates',
		'db_prefix'			=> 'amt_',
		'pid'				=> 'amt_id',
		'del'				=> 'amt_del',
		'fields'			=> array('amt_id' , 'amt_subject' , 'amt_bcc' , 'amt_body' , 'amt_created_ts' , 'amt_modified_ts' , 'amt_modified_by' , 'amt_del' , 'amt_fid' , 'amt_sort'),
		'update'			=> array(),
		'normalize'			=> array()
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
	}
	
	public static function handleDetails($function)
	{
		
		$id 	= intval($_REQUEST['amt_id']);
		
		$ret = dbx::query("select * from a_mail_templates where amt_id = $id");
		$data = array(
		'record' => $ret
		);

		frontcontrollerx::json_success($data);
		
	}
	
	
	public static function handleSave($function)
	{
		
		$db 	= json_decode($_REQUEST['data'],true);
		$id 	= intval($_REQUEST['amt_id']);
		
		$update = array();
		
		$update['amt_subject'] 	= $db['amt_subject'];
		$update['amt_body'] 	= $db['amt_body'];
		
		$ret = dbx::update('a_mail_templates',$update,array('amt_id' => $id));
		
		$data = array(
		'record' => $ret
		);

		frontcontrollerx::json_success($ret);
	}
	
	

}
