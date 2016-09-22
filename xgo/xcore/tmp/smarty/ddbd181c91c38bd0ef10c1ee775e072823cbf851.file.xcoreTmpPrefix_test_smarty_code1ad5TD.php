<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 18:56:59
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1ad5TD" */ ?>
<?php /*%%SmartyHeaderCode:187442651654fddeeb7cd9d3-28575989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddbd181c91c38bd0ef10c1ee775e072823cbf851' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1ad5TD',
      1 => 1425923819,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187442651654fddeeb7cd9d3-28575989',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_pager')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_pager.php';
?>
<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('settings')->value),$_smarty_tpl);?>


<?php echo smarty_function_xr_pager(array('settings'=>$_smarty_tpl->getVariable('settings')->value),$_smarty_tpl);?>
