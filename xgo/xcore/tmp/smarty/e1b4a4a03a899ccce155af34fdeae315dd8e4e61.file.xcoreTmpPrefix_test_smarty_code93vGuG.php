<?php /* Smarty version Smarty-3.0.7, created on 2016-01-11 10:53:17
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code93vGuG" */ ?>
<?php /*%%SmartyHeaderCode:114368729256937b8dee14c9-80619070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1b4a4a03a899ccce155af34fdeae315dd8e4e61' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code93vGuG',
      1 => 1452505997,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114368729256937b8dee14c9-80619070',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<head>
    <style type="text/css">

    </style>
    
    <script type="text/javascript" src="testupload.js"></script>
    
</head>    
<body>
    
<div id="yourId"></div>
<form action="fe_testupload.php" method="post">
    Name: <input type="text" name="name">
    Image: <input type="file" name="image" id="image">
    <button type="submit">Submit</button>
</form>


</html>