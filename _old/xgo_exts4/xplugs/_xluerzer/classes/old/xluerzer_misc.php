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

	public static function getTemplateHtml($at_id)
	{
		$at_id = intval($at_id);
		$at_template = dbx::queryAttribute("SELECT * FROM `a_templates` where at_id = $at_id ","at_template");
		return $at_template;
	}


	public static function template_cache_check($at_id,$renew=true)
	{
		// Immer cache file anlegen ... egal jetzt einmal ....
		if ($_REQUEST['ACACHE']=='NO') $renew = true;
		$template_cache_file_on_disk = dirname(__FILE__).'/../cache/template_cache/'.$at_id.'.cache.html';
		if ((!file_exists($template_cache_file_on_disk)) || ($renew))
		{
			$html = self::getTemplateHtml($at_id);
			hdx::fwrite($template_cache_file_on_disk,$html);
		}
		return $template_cache_file_on_disk;
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

		$at_table 	= dbx::escape($at['at_table']);
		$at_pid 	= dbx::escape($at['at_pid']);

		if (trim($at_table) == "") 	die("EMPTY_TABLE");
		if (trim($at_pid) == "") 	die("EMPTY_PID");

		$record = dbx::query("select * from $at_table where $at_pid = $recordId");
				
		$assign = array('record'=>$record);
		
		switch ($at_pid) {
			case 'oetw_id':
				$assign = self::fixHtml($assign,'oetw_');
				break;
			case 'oebp_id':
				$assign = self::fixHtml($assign,'oebp_');
				break;
			
			default:
				
				break;
		}
		
		
		$html = templatex::render(self::template_cache_check($at_id),$assign,xredaktor_render::getSmartyAddOnsDir(),xredaktor_render::getSmartyTemplatesDir());
		die($html);
	}


}