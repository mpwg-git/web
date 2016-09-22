<?php /* Smarty version Smarty-3.0.7, created on 2015-11-11 14:40:22
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemhMNWO" */ ?>
<?php /*%%SmartyHeaderCode:164048577556434546c32b76-67864584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd6505082bdeac788b687d670f16c1d0f1db5a57' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemhMNWO',
      1 => 1447249222,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164048577556434546c32b76-67864584',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getMyUserType",'var'=>"type"),$_smarty_tpl);?>

 
 
 <?php echo smarty_function_xr_atom(array('a_id'=>759,'userType'=>'type','return'=>1),$_smarty_tpl);?>



