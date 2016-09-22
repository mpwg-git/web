<?php /* Smarty version Smarty-3.0.7, created on 2016-01-08 15:11:27
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/668.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:306213850568fc38f75c2d3-84366360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e57d17139e3c8ab9d6dbb9d4a94967dde34948b9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/668.cache.html',
      1 => 1451984362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '306213850568fc38f75c2d3-84366360',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if ($_SESSION['xredaktor_feUser_wsf']['wz_TYPE']=='suche'){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>688,'return'=>1),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_atom(array('a_id'=>689,'return'=>1),$_smarty_tpl);?>

<?php }?>