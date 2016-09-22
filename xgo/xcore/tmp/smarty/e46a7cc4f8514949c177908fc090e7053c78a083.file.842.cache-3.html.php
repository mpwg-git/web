<?php /* Smarty version Smarty-3.0.7, created on 2016-08-02 12:21:06
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/842.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:6002799057a07412852677-18287016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e46a7cc4f8514949c177908fc090e7053c78a083' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/842.cache-3.html',
      1 => 1451984362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6002799057a07412852677-18287016',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getLoginStatus",'var'=>"loggedin"),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('loggedin')->value===true){?>
    <?php $_smarty_tpl->tpl_vars['atomtoRender'] = new Smarty_variable(655, null, null);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['atomtoRender'] = new Smarty_variable(652, null, null);?>
<?php }?>

<?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('atomtoRender')->value,'return'=>1),$_smarty_tpl);?>
