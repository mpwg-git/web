<?

class xluerzer_misc
{

	public static function defaultAjaxHandler($scope,$function)
	{
		switch ($scope)
		{
			case 'misc_render':
				self::preview();
				break;
			default: break;
		}
	}

	public static function fixHtml($assign,$prefix)
	{
		require_once(dirname(__FILE__).'/../../../../liveImporter/libs/phpQuery.php');
				
		$left 	= phpQuery::newDocument($assign['record'][$prefix.'col_left']);
		$right	= phpQuery::newDocument($assign['record'][$prefix.'col_right']);
		
		$left['img']->removeAttr('width')->removeAttr('height')->addClass('img-responsive');
		$assign['record'][$prefix.'col_left'] = $left->html();
		$right['img']->removeAttr('width')->removeAttr('height')->addClass('img-responsive');
		$assign['record'][$prefix.'col_right'] = $right->html();
				
		return $assign;
	}

	public static function preview()
	{
		list($scope,$function0,$param_0,$param_1,$param_2) = explode("/",$_REQUEST['url']);

		$at_id 		= intval($function0);
		$recordId 	= intval($param_0);

		$at = dbx::query("SELECT * FROM `a_templates` where at_id = $at_id ");
		if ($at === false) die('template wrong ... ');
		
		$p_id = intval($at['at_page_id']);
		
		switch ($at_id) {
			case 9:
			case 10:
				$_REQUEST['p_id'] = $p_id;
				break;
			
			default:
				
				break;
		}
		
		$_REQUEST['r_id'] = $recordId;
		
		$html = xredaktor_render::renderPage($p_id,true,array('r_id'=>$recordId,'oeedit'=>1),false);
		die($html);
		
		
	}


}