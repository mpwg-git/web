<?php /* Smarty version Smarty-3.0.7, created on 2016-01-11 10:32:03
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeexX6jj" */ ?>
<?php /*%%SmartyHeaderCode:1031290745569376931f08c8-35286018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c56a54755c003ac73780cd84586b3707b572fee' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeexX6jj',
      1 => 1452504723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1031290745569376931f08c8-35286018',
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
<script>
    $(function() {
        $('#image').picEdit();
    });
</script>