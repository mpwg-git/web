<?php /* Smarty version Smarty-3.0.7, created on 2016-01-11 10:43:48
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecSehmk" */ ?>
<?php /*%%SmartyHeaderCode:16983906756937954a83ef8-51094679%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1eae764055a3b4595813b6c462f07dc56f2dc726' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecSehmk',
      1 => 1452505428,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16983906756937954a83ef8-51094679',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<head>
    <script type="text/javascript" src="testupload.js"></script>
</head>    

<form action="fe_testupload.php" method="post">
    Name: <input type="text" name="name">
    Image: <input type="file" name="image" id="image">
    <button type="submit">Submit</button>
</form>


<html>