<?

class site extends frontcontrollerx
{
	public static function handleAjaxRequests()
	{
		list($scope,$function,$param_0,$param_1) = explode("/",$_REQUEST['url']);

		$scope 		= basename($scope);
		$function 	= basename($function);

		$whiteListKey 	= $scope."/".$function;
		$whiteListed 	= array(
		'xr/page' => 'xredaktor_forms_pager::page_via_ajax',
		'xr/more' => 'xredaktor_forms_pager::more_via_ajax',
		'xr/form' => 'xredaktor_forms::data_via_ajax',
		);

		/*

		WHITE LISTED SYSTEM CALLS

		*/

		if (isset($whiteListed[$whiteListKey]))
		{
			$fn = $whiteListed[$whiteListKey];
			if (is_callable($fn)) {
				call_user_func($fn);
			} else {
				die('YYYYYYY');
			}
			die();
		}

		/*

		JUMP INTO SITE SPECIFIC

		*/


		$checkClassFile = dirname(__FILE__).'/../../../../xsite/classes/'.$scope.'.php';
		if (!is_file($checkClassFile)) die('XX');

		$fn = $scope."::ajax_".$function;

		if (is_callable($fn)) {
			call_user_func($fn);
		} else {
			die('XXXXX');
		}
		die();
	}


}
