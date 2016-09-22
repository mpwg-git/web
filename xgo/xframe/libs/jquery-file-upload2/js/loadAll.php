<?

require_once(dirname(__FILE__).'/../../../_includes.php');


$files 		= array();
$files[] 	= "vendor/jquery.ui.widget.js";
$files[] 	= "vendor/tmpl.min.js";
$files[] 	= "vendor/load-image.min.js";
$files[] 	= "vendor/canvas-to-blob.min.js";
$files[] 	= "jquery.iframe-transport.js";
$files[] 	= "jquery.fileupload.js";
$files[] 	= "jquery.fileupload-process.js";
$files[] 	= "jquery.fileupload-image.js";
$files[] 	= "jquery.fileupload-audio.js";
$files[] 	= "jquery.fileupload-video.js";
$files[] 	= "jquery.fileupload-validate.js";

hdx::packFilesAndSend($files,'js');