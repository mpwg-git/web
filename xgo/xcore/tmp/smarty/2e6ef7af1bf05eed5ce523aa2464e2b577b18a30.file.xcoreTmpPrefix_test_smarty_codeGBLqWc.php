<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 17:17:19
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGBLqWc" */ ?>
<?php /*%%SmartyHeaderCode:20778939854f5de8fd6dd18-23495604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e6ef7af1bf05eed5ce523aa2464e2b577b18a30' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGBLqWc',
      1 => 1425399439,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20778939854f5de8fd6dd18-23495604',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><hr>

<?php echo $_smarty_tpl->getVariable('wz_id')->value;?>


HALLOOOO

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('RECORD_RAW')->value),$_smarty_tpl);?>

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('GA')->value),$_smarty_tpl);?>
