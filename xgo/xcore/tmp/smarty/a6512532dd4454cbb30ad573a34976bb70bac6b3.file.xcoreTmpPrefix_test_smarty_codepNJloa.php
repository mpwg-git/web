<?php /* Smarty version Smarty-3.0.7, created on 2016-01-11 10:41:15
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codepNJloa" */ ?>
<?php /*%%SmartyHeaderCode:710194951569378bb081702-55705460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6512532dd4454cbb30ad573a34976bb70bac6b3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codepNJloa',
      1 => 1452505275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '710194951569378bb081702-55705460',
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
<script>
    $(function() {
        $('#image').picEdit();
    });
</script>

<html>