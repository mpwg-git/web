<?php /* Smarty version Smarty-3.0.7, created on 2017-03-07 14:09:59
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegmoax0" */ ?>
<?php /*%%SmartyHeaderCode:207719001058beb1273c3538-54929605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a62b48591aa9f47319def0bd8fd259a15f0ba7ae' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegmoax0',
      1 => 1488892199,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207719001058beb1273c3538-54929605',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'isLoggedIn','var'=>'isLoggedIn'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('isLoggedIn')->value){?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getMyUserType",'var'=>"type"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_search::sc_getStoredSearchData','var'=>'storedSearchQuery'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('storedSearchQuery')->value['type']!=''){?><?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable($_smarty_tpl->getVariable('storedSearchQuery')->value['type'], null, null);?><?php }?>

<?php echo smarty_function_xr_atom(array('a_id'=>759,'showFace'=>3,'userType'=>$_smarty_tpl->getVariable('type')->value,'return'=>1),$_smarty_tpl);?>


<?php }else{ ?>

<?php echo smarty_function_xr_atom(array('a_id'=>892,'showFace'=>3,'return'=>1),$_smarty_tpl);?>


<?php }?>