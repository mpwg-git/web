<?

class site2 extends frontcontrollerx
{
	public static function handleAjaxRequests()
	{
		
		list($scope,$function,$param_0,$param_1) = explode("/",$_REQUEST['url']);

		$scope 		= basename($scope);
		$function 	= basename($function);

		$checkClassFile = dirname(__FILE__).'/'.$scope.'.php';
		
		if (!is_file($checkClassFile)) die('XXX');
		
		$fn = $scope."::ajax_".$function;

		if (is_callable($fn)) {
			call_user_func($fn);
		} else {
			die('XXXXX');
		}
	}
}
