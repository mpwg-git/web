<?php /* Smarty version Smarty-3.0.7, created on 2015-11-25 20:39:41
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePJikBg" */ ?>
<?php /*%%SmartyHeaderCode:102613761656560e7d7edd27-04718493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3527ae45f92014e75f4e5768ea46e6ff860b3f5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePJikBg',
      1 => 1448480381,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102613761656560e7d7edd27-04718493',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"checkLogin"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getMyUserType",'var'=>"type"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_search::sc_getStoredSearchData','var'=>'storedSearchQuery'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('storedSearchQuery')->value['type']!=''){?><?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable($_smarty_tpl->getVariable('storedSearchQuery')->value['type'], null, null);?><?php }?>

<?php echo smarty_function_xr_atom(array('a_id'=>759,'userType'=>$_smarty_tpl->getVariable('type')->value,'return'=>1),$_smarty_tpl);?>

