<?

class xluerzer_ajax
{

	public static function handleAjax()
	{
		libx::turnOnErrorReporting();
		libx::jsonFeedback_ON();

		list($scope,$function,$param_0,$param_1,$param_2) 	= explode("/",$_REQUEST['url']);
		list($scope_short,$crap) 							= explode("_",$scope,2);
		
		switch ($scope_short)
		{
			case 'crm':
				xluerzer_crm::defaultAjaxHandler($scope,$function);
				break;
			case 's':
				xluerzer_s::defaultAjaxHandler($scope,$function);
				break;
			case 'a':
				xluerzer_admin::defaultAjaxHandler($scope,$function);
				break;
			case 'misc':
				xluerzer_misc::defaultAjaxHandler($scope,$function);
				break;
			case 'e':
				xluerzer_e::defaultAjaxHandler($scope,$function);
				break;
			case 'oe':
				xluerzer_oe::defaultAjaxHandler($scope,$function);
				break;
			default:
				die('SCOPE_WRONG');
		}

		die('FUNC_WRONG');
	}

}
