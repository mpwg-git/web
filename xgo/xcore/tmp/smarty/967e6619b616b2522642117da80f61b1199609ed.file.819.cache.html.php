<?php /* Smarty version Smarty-3.0.7, created on 2015-11-26 12:39:19
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/819.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:14820022175656ef67977798-46522394%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '967e6619b616b2522642117da80f61b1199609ed' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/819.cache.html',
      1 => 1448537959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14820022175656ef67977798-46522394',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Adresse?"),$_smarty_tpl);?>
*</label>
    <?php echo smarty_function_xr_atom(array('a_id'=>764,'inForm'=>1,'profileData'=>$_smarty_tpl->getVariable('data')->value['ROOM'],'return'=>1),$_smarty_tpl);?>

</div>