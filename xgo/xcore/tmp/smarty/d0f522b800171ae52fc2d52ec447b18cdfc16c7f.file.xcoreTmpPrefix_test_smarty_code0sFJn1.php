<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 17:16:17
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0sFJn1" */ ?>
<?php /*%%SmartyHeaderCode:153843059654f5de519a9b90-21719855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0f522b800171ae52fc2d52ec447b18cdfc16c7f' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0sFJn1',
      1 => 1425399377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153843059654f5de519a9b90-21719855',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><hr>

<?php echo $_smarty_tpl->getVariable('wz_id')->value;?>


<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('RECORD_RAW')->value),$_smarty_tpl);?>

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('GA')->value),$_smarty_tpl);?>
