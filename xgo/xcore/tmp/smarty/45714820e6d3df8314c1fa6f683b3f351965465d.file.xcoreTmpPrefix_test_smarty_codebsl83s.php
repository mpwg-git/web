<?php /* Smarty version Smarty-3.0.7, created on 2015-11-13 10:21:32
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebsl83s" */ ?>
<?php /*%%SmartyHeaderCode:15976049075645ab9ce47738-22439529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45714820e6d3df8314c1fa6f683b3f351965465d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebsl83s',
      1 => 1447406492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15976049075645ab9ce47738-22439529',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getMyUserType",'var'=>"type"),$_smarty_tpl);?>



<?php echo smarty_function_xr_atom(array('a_id'=>759,'userType'=>$_smarty_tpl->getVariable('type')->value,'return'=>1),$_smarty_tpl);?>


