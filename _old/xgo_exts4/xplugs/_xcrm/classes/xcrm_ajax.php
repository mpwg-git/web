<?

class xcrm_ajax
{

	public static function handleAjax()
	{
		libx::turnOnErrorReporting();
		libx::jsonFeedback_ON();
		list($scope,$function,$param_0,$param_1,$param_2) = explode("/",$_REQUEST['url']);

		switch ($scope)
		{
			case 'gui':
				xcrm_gui::handleAjaxFunction($function);
				break;
			case 'dbimport':
				xcrm_dbimport::handleAjaxFunction($function);
				break;
			case 'closure':
				xcrm_closure::handleAjaxFunction($function);
				break;
		}

		die('X');
	}

}
