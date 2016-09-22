<?
require_once(dirname(__FILE__).'/_includes.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<!-- EXT_JS -->
<link rel="stylesheet" type="text/css" 	href="/xgo/xframe/libs/extjs/resources/css/ext-all-gray.css" />
<script type="text/javascript" 			src ="/xgo/xframe/libs/extjs/bootstrap.js"></script>
<!-- XFRAME -->
<link rel="stylesheet" type="text/css" 	href="/xgo/xframe/media/css/loadAll.php?xframe_css" />
<script type="text/javascript" 			src ="/xgo/xframe/media/js/loadAll.php?xframe_js"></script>
<!-- XREDAKTOR -->
<script type="text/javascript" 			src ="/xgo/xplugs/xredaktor/media/js/loadAll.php?xredaktor_js"></script>
<link rel="stylesheet" type="text/css" 	href="/xgo/xplugs/xredaktor/media/css/loadAll.php?xredaktor_css" />
<!-- XMARKETING -->
<script type="text/javascript" 			src ="/xgo/xplugs/xmarketing/media/js/loadAll.php?xmarketing_js"></script>
<link rel="stylesheet" type="text/css" 	href="/xgo/xplugs/xmarketing/media/css/loadAll.php?xmarketing_css" />
<!-- EXTRAS -->
<script type="text/javascript" 			src="/xgo/xframe/libs/flowplayer/flowplayer-3.2.6.min.js"></script>
<!-- END -->

</head>
<body>  
<script>
Ext.onReady(function() {
	xredaktor.getInstance().showDesktop(<?echo json_encode(xredaktor_defaults::getWorkBenchSettings())?>);
});
</script>
</body>
</html>
