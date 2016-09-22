<?php /* Smarty version Smarty-3.0.7, created on 2016-01-08 16:47:05
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/675.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1765790020568fd9f9065751-87765081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1313315b1ac6f1ea1e47b532f9365e64acbb9b57' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/675.cache.html',
      1 => 1451984365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1765790020568fd9f9065751-87765081',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>


<?php echo smarty_function_xr_atom(array('a_id'=>660,'addClass'=>"fromsearch",'data'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>
