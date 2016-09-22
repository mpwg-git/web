<?php /* Smarty version Smarty-3.0.7, created on 2015-11-12 12:20:27
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/842.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:991423641564475fb6491d3-26488591%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e53c715a9f8595ec4666e04a5d5d12b483020a58' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/842.cache-3.html',
      1 => 1447327147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '991423641564475fb6491d3-26488591',
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
