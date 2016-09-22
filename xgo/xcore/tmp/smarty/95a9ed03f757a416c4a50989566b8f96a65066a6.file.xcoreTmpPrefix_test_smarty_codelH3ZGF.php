<?php /* Smarty version Smarty-3.0.7, created on 2015-11-12 12:21:27
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelH3ZGF" */ ?>
<?php /*%%SmartyHeaderCode:653981985564476376a3cb8-37558525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95a9ed03f757a416c4a50989566b8f96a65066a6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelH3ZGF',
      1 => 1447327287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '653981985564476376a3cb8-37558525',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getLoginStatus",'var'=>"loggedin"),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('loggedin')->value===true){?>
    <?php $_smarty_tpl->tpl_vars['atomtoRender'] = new Smarty_variable(659, null, null);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['atomtoRender'] = new Smarty_variable(661, null, null);?>
<?php }?>

<?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('atomtoRender')->value,'return'=>1),$_smarty_tpl);?>
