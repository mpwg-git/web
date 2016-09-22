<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 10:55:04
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePJCoSP" */ ?>
<?php /*%%SmartyHeaderCode:1492985345694cd78893eb3-17965825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c578191e92e3ad2ac8e37edd103aaabc83786e80' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePJCoSP',
      1 => 1452592504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1492985345694cd78893eb3-17965825',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>


<from action="fe_testupload.php" method="POST">
    <input type="file" name="thefile" id="thebox">
    Image: <input type="file" name="image" id="image">
    <button type="submit"> Submit</button>
</from>