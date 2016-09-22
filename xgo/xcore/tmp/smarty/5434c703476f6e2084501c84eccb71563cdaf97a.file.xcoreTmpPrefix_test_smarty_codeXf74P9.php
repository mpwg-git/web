<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 12:35:56
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXf74P9" */ ?>
<?php /*%%SmartyHeaderCode:179390714355d5ad8c69eb04-88463997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5434c703476f6e2084501c84eccb71563cdaf97a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXf74P9',
      1 => 1440066956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179390714355d5ad8c69eb04-88463997',
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