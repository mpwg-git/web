<?php /* Smarty version Smarty-3.0.7, created on 2015-11-23 11:46:22
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefqU0ZX" */ ?>
<?php /*%%SmartyHeaderCode:3395122895652ee7e5f15c6-09766959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbb27c42fda23f94de4b114e2796192d718642e2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefqU0ZX',
      1 => 1448275582,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3395122895652ee7e5f15c6-09766959',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>

<?php echo smarty_function_xr_atom(array('a_id'=>660,'addClass'=>"fromsearch",'data'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>
