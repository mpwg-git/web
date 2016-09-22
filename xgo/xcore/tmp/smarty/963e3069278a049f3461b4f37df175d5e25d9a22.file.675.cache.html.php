<?php /* Smarty version Smarty-3.0.7, created on 2015-12-15 16:47:17
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/675.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:157923575656703605053975-41627315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '963e3069278a049f3461b4f37df175d5e25d9a22' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/675.cache.html',
      1 => 1450193410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157923575656703605053975-41627315',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>


<?php echo smarty_function_xr_atom(array('a_id'=>660,'addClass'=>"fromsearch",'data'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>
