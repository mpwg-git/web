<?

require_once(dirname(__FILE__).'/../_includes.php');


//import css_less 
$css_less = dbx::queryAll("SELECT * FROM wsfdev.css_less ORDER BY cl_id");

foreach ($css_less as $key => $value) {
		
	$id = $value['cl_id'];
	$name = $value['cl_name'];
	$content = $value['cl_content'];
		
	$file = dirname(__FILE__).'/files/css_less/'.$id.".".$name.".less";
		
	hdx::fwrite($file, $content);
}



//import css_less_history
$css_less_history = dbx::queryAll("SELECT * FROM wsfdev.css_less_history ORDER BY cl_id");

foreach ($css_less_history as $key => $value) {
		
	$id = $value['cl_id'];
	$name = $value['cl_name'];
	$content = $value['cl_content'];
		
	$file = dirname(__FILE__).'/files/css_less_history/'.$id.".".$name.".less";
		
	hdx::fwrite($file, $content);
}