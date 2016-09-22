<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 11:39:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/668.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:55354501255d5a05750a9a9-79048035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ed8c3a786874e0fe848d72d0e29f4074759d4dd' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/668.cache.html',
      1 => 1440063575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55354501255d5a05750a9a9-79048035',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if ($_SESSION['xredaktor_feUser_wsf']['wz_TYPE']=='suche'){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>688,'return'=>1),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_atom(array('a_id'=>689,'return'=>1),$_smarty_tpl);?>

<?php }?>