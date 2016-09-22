<?php /* Smarty version Smarty-3.0.7, created on 2015-11-12 12:19:07
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1wRTmz" */ ?>
<?php /*%%SmartyHeaderCode:977116650564475ab9bb246-39732278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8bfecbd024a6ed21bfb2dcba5f33204c7d45e88' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1wRTmz',
      1 => 1447327147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '977116650564475ab9bb246-39732278',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getLoginStatus",'var'=>"loggedin"),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('loggedin')->value===true){?>
    <?php $_smarty_tpl->tpl_vars['atomtoRender'] = new Smarty_variable(655, null, null);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['atomtoRender'] = new Smarty_variable(652, null, null);?>
<?php }?>

<?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('atomtoRender')->value,'return'=>1),$_smarty_tpl);?>
