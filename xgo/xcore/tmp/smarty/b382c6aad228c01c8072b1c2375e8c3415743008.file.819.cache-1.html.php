<?php /* Smarty version Smarty-3.0.7, created on 2016-01-07 17:09:51
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/819.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:2018467436568e8dcfedb1f4-47751049%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b382c6aad228c01c8072b1c2375e8c3415743008' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/819.cache-1.html',
      1 => 1451984363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2018467436568e8dcfedb1f4-47751049',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Adresse?"),$_smarty_tpl);?>
*</label>
    <?php echo smarty_function_xr_atom(array('a_id'=>764,'inForm'=>1,'profileData'=>$_smarty_tpl->getVariable('data')->value['ROOM'],'return'=>1),$_smarty_tpl);?>

</div>