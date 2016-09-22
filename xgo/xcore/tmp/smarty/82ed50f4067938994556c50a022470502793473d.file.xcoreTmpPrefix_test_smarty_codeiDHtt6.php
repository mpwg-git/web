<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 17:27:14
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiDHtt6" */ ?>
<?php /*%%SmartyHeaderCode:44853129454f5e0e2b8d5e3-23771191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82ed50f4067938994556c50a022470502793473d' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiDHtt6',
      1 => 1425400034,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44853129454f5e0e2b8d5e3-23771191',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_produkte::getProdukte",'var'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>
