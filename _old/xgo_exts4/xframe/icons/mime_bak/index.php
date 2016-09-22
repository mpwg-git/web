<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Unbenanntes Dokument</title>
<style type="text/css">
.dd {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
</style>
</head>

<body class="dd">
<?
require_once(dirname(__FILE__).'/../../xframe.php');
$files = hdx::readDir(dirname(__FILE__));

$_files = array();


foreach ($files as $f)
{
	if ($f['TYPE']!="FILE") continue;
	$filename 	= $f['F_NAME'];
	$_files[] = $filename;
}

natsort($_files);

foreach ($_files as $filename)
{
	echo "<div style='float:left;'>$filename :: <img src='$filename' title='$filename' style='padding:10px;'></div>";
}
?>
</body>
</html>
