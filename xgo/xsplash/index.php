<?
xredaktor_core::updateSecurity();
$userState = xredaktor_core::isBackendEndUserLoggedIn() ? '1' : '0';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=Ixredaktor::xGoNameWithVersion ?></title>
<link rel="stylesheet" type="text/css" 	        href="/xgo/xframe/libs/extjs/resources/css/ext-all-gray.css" />
<link rel="stylesheet" type="text/css" 			href="/xgo/xsplash/media/css/xsplash.css" />

<script type="text/javascript" 					src ="/xgo/xframe/libs/extjs/bootstrap.js"></script>
<script type="text/javascript" 					src ="/xgo/xsplash/media/js/xsplash.js"></script>
<script type="text/javascript" 					src ="/xgo/xsplash/media/js/jq.js"></script>
<script>
jQuery.noConflict();
$$ = jQuery;
</script>
<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfFmxXYeK7DBcopvIIF-g5lni4AwoeuAE&sensor=false">
</script>

</head>
<body>
<script>top.token='<?$GA.salty?>';top.userstate='<?=$userState?>';</script>
<div id="wrapper">
<div id="container">
	<div id='loginSplashImage'></div><div style="text-align:left;font-weight:bold;"><br>For best user experience, please use <br><a href="https://www.google.com/chrome" target="_blank">https://www.google.com/chrome</a></div>
	<div id='loginx'></div>
</div>
</div>
<div id="loading-mask"></div>
<div id="loading">
  <div class="loading-indicator"></div>
</div>

</body>
</html>