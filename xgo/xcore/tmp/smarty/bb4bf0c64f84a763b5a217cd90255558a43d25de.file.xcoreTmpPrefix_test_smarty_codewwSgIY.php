<?php /* Smarty version Smarty-3.0.7, created on 2016-01-11 10:29:55
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewwSgIY" */ ?>
<?php /*%%SmartyHeaderCode:135906279556937613a081e6-33224826%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb4bf0c64f84a763b5a217cd90255558a43d25de' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewwSgIY',
      1 => 1452504595,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135906279556937613a081e6-33224826',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form action="fe_testupload.php" method="post">
    Name: <input type="text" name="name">
    Image: <input type="file" name="image" id="image">
    <button type="submit">Submit</button>
</form>