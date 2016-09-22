<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 16:56:48
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQBjCEF" */ ?>
<?php /*%%SmartyHeaderCode:114422074954f5d9c01e2975-47808227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90d557deb2ed95eaea8184aee2d9414a0c93d7d2' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQBjCEF',
      1 => 1425398208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114422074954f5d9c01e2975-47808227',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><hr>

<?php echo $_smarty_tpl->getVariable('wz_N_TEXT')->value;?>


<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('RECORD_RAW')->value),$_smarty_tpl);?>

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('GA')->value),$_smarty_tpl);?>
