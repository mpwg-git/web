<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 17:27:03
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codef9PfSH" */ ?>
<?php /*%%SmartyHeaderCode:119125730854f5e0d771e913-45143110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd25ae2a238290cb85283800599da99d2da236e8a' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codef9PfSH',
      1 => 1425400023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119125730854f5e0d771e913-45143110',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_produkte::getProdukte",'var'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>
