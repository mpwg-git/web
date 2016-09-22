<?

require_once(dirname(__FILE__).'/../_includes.php');


// IMPORT ATOM a_content
$a_content = dbx::queryALL("SELECT * FROM wsfdev.atoms WHERE `a_type` = 'atom' and `a_s_id` = '1' and `a_del` = 'N' and `a_content` not like '' ORDER BY a_sort");
$a_content_1 = dbx::queryALL("SELECT * FROM wsfdev.atoms WHERE `a_type` = 'atom' and `a_s_id` = '1' and `a_del` = 'N' and `a_content_1` not like '' ORDER BY a_sort");
$a_content_3 = dbx::queryALL("SELECT * FROM wsfdev.atoms WHERE `a_type` = 'atom' and `a_s_id` = '1' and `a_del` = 'N' and `a_content_3` not like '' ORDER BY a_sort");

	// a_content
	foreach ($a_content as $key => $value) {
		$a_id = $value['a_id'];
		$a_name = $value['a_name'];
		$file = dirname(__FILE__).'/files/wsfdev/atoms/'.$a_id.".".$a_name.".A_CONTENT".".html";
	
		hdx::fwrite($file, $value['a_content']);
	}
	
	//a_content_1
	foreach ($a_content_1 as $key => $value) {	
		$a_id = $value['a_id'];	
		$a_name = $value['a_name'];
		$file = dirname(__FILE__).'/files/wsfdev/atoms/'.$a_id.".".$a_name.".A_CONTENT_1".".html";
	
		hdx::fwrite($file, $value['a_content_1']);
	}
	
	//a_content_3
	foreach ($a_content_3 as $key => $value) {
		
		$a_id = $value['a_id'];
		$a_name = $value['a_name'];
		$file = dirname(__FILE__).'/files/wsfdev/atoms/'.$a_id.".".$a_name.".A_CONTENT_3".".html";
	
		hdx::fwrite($file, $value['a_content_3']);
	}

	
	
	
	
// IMPORT CSS_LESS von WSFDEV
$css_less = dbx::queryAll("SELECT * FROM wsfdev.css_less ORDER BY cl_id");

foreach ($css_less as $key => $value) {
		
	$id = $value['cl_id'];
	$name = $value['cl_name'];
	$content = $value['cl_content'];
		
	$file = dirname(__FILE__).'/files/wsfdev/css_less/'.$id.".".$name.".less";
		
	hdx::fwrite($file, $content);
}

/*
// IMPORT CSS_LESS von MPWG-PRE
$pre_css_less = dbx::queryAll("SELECT * FROM wsfdev.css_less ORDER BY cl_id");

foreach ($pre_css_less as $key => $value) {
		
	$id = $value['cl_id'];
	$name = $value['cl_name'];
	$content = $value['cl_content'];
		
	$file = dirname(__FILE__).'/files/pre/css_less/'."pre.".$id.".".$name.".less";
		
	hdx::fwrite($file, $content);
}
*/



//IMPORT CSS_LESS_HISTORY
$css_less_history = dbx::queryAll("SELECT * FROM wsfdev.css_less_history ORDER BY cl_id");

foreach ($css_less_history as $key => $value) {
		
	$id = $value['cl_id'];
	$name = $value['cl_name'];
	$content = $value['cl_content'];
		
	$file = dirname(__FILE__).'/files/wsfdev/css_less_history/'.$id.".".$name.".less";
		
	hdx::fwrite($file, $content);
}




