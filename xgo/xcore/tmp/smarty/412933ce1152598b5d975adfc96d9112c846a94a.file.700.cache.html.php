<?php /* Smarty version Smarty-3.0.7, created on 2015-11-03 20:00:02
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/700.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:66581551256390432cb59b5-54153777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '412933ce1152598b5d975adfc96d9112c846a94a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/700.cache.html',
      1 => 1444667287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66581551256390432cb59b5-54153777',
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
    
    <?php echo smarty_function_xr_atom(array('a_id'=>764,'inForm'=>1,'profileData'=>$_smarty_tpl->getVariable('data')->value['PROFILE'],'return'=>1),$_smarty_tpl);?>

    
</div>