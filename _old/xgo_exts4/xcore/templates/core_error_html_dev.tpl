<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>info</title>
<style type="text/css">
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
</style>
</head>

<body>
<table>
<tr valign="top"><tr valign="top"><td><img src="imgs/error.png"></td><td>
<table>
<tr valign="top"><td><b>host:</b></td><td><%$host%></td></tr>
<tr valign="top"><td><b>ip:</b></td><td><%$ip%></td></tr>
<tr valign="top"><td><b>ts:</b></td><td><%$ts%></td></tr>
<tr valign="top"><td><b>type:</b></td><td><%$type%></td></tr>
<tr valign="top"><td><b>scope:</b></td><td><%$namespace%></td></tr>
<tr valign="top"><td><b>error:</b></td><td><%$error%></td></tr>
<tr valign="top"><td><b>error-no:</b></td><td><%$errorNo%></td></tr>
<tr valign="top"><td><b>error-detail:</b></td><td><span style="font-size: 14px;"><%$errorDetail%></span></td></tr>
<tr valign="top"><td colspan="2">CODE-TRACE::<br><pre><%$traceInCode%></pre></td></tr>
</table>
</td>
</tr>
</table>
</div>
</body>
</html>
