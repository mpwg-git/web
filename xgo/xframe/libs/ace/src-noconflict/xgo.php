<?
header('Content-Type: application/javascript');
readfile('ace.js');
?>
ace.config.set("basePath", "/xgo/xframe/libs/ace/src-noconflict");
<?
readfile('ext-language_tools.js');
?>
