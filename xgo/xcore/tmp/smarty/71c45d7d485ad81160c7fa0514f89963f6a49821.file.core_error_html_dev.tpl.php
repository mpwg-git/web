<?php /* Smarty version Smarty-3.0.7, created on 2015-06-24 13:09:22
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/classes/../templates/core_error_html_dev.tpl" */ ?>
<?php /*%%SmartyHeaderCode:774018422558a8fe20562f1-08897815%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71c45d7d485ad81160c7fa0514f89963f6a49821' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/classes/../templates/core_error_html_dev.tpl',
      1 => 1435074122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '774018422558a8fe20562f1-08897815',
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
