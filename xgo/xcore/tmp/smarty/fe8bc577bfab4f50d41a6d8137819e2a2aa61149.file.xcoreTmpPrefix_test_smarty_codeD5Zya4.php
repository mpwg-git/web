<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 19:17:22
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeD5Zya4" */ ?>
<?php /*%%SmartyHeaderCode:152281939855cb7fa2a14395-24274126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe8bc577bfab4f50d41a6d8137819e2a2aa61149' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeD5Zya4',
      1 => 1439399842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152281939855cb7fa2a14395-24274126',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getMyUserType",'var'=>"type"),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('type')->value=='biete'){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>758,'return'=>1),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_atom(array('a_id'=>759,'return'=>1),$_smarty_tpl);?>

<?php }?>

