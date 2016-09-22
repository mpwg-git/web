<?php /* Smarty version Smarty-3.0.7, created on 2016-08-02 10:01:01
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/classes/../templates/core_error_html_dev.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17062558157a0533d4b82d2-60788997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8679f4daf7982a047f926e21de259e94623dab2c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/classes/../templates/core_error_html_dev.tpl',
      1 => 1451984365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17062558157a0533d4b82d2-60788997',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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
<tr valign="top"><td><b>host:</b></td><td><?php echo $_smarty_tpl->getVariable('host')->value;?>
</td></tr>
<tr valign="top"><td><b>ip:</b></td><td><?php echo $_smarty_tpl->getVariable('ip')->value;?>
</td></tr>
<tr valign="top"><td><b>ts:</b></td><td><?php echo $_smarty_tpl->getVariable('ts')->value;?>
</td></tr>
<tr valign="top"><td><b>type:</b></td><td><?php echo $_smarty_tpl->getVariable('type')->value;?>
</td></tr>
<tr valign="top"><td><b>scope:</b></td><td><?php echo $_smarty_tpl->getVariable('namespace')->value;?>
</td></tr>
<tr valign="top"><td><b>error:</b></td><td><?php echo $_smarty_tpl->getVariable('error')->value;?>
</td></tr>
<tr valign="top"><td><b>error-no:</b></td><td><?php echo $_smarty_tpl->getVariable('errorNo')->value;?>
</td></tr>
<tr valign="top"><td><b>error-detail:</b></td><td><span style="font-size: 14px;"><?php echo $_smarty_tpl->getVariable('errorDetail')->value;?>
</span></td></tr>
<tr valign="top"><td colspan="2">CODE-TRACE::<br><pre><?php echo $_smarty_tpl->getVariable('traceInCode')->value;?>
</pre></td></tr>
</table>
</td>
</tr>
</table>
</div>
</body>
</html>
