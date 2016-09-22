<?
require_once(dirname(__FILE__).'/../../../_includes.php');

$files 		= array();
$files[] 	= "jquery.fileupload-ui.css";

hdx::packFilesAndSend($files,'css');