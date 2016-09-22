<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 21:42:06
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/classes/../templates/core_error_html_norm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8088682605698081e47e124-28562027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e1be2c76a67af1d8557bf78cf3dd873bc1ab487' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/classes/../templates/core_error_html_norm.tpl',
      1 => 1451984365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8088682605698081e47e124-28562027',
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
<p><img src="imgs/test.png"></p>
<p>type: <?php echo $_smarty_tpl->getVariable('type')->value;?>
</p>
<p>scope: <?php echo $_smarty_tpl->getVariable('namespace')->value;?>
</p>
<p>error: <?php echo $_smarty_tpl->getVariable('error')->value;?>
</p>
<p>error-no: <?php echo $_smarty_tpl->getVariable('errorNo')->value;?>
</p>
<p>error-detail: <?php echo $_smarty_tpl->getVariable('errorDetail')->value;?>
</p>
</body>
</html>
