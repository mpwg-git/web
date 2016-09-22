<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 15:33:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/854.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:6605280756795f46767301-46357908%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14e7e10f684d4c9980b12c6b6c404b0d530c6994' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/854.cache.html',
      1 => 1450792955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6605280756795f46767301-46357908',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center" style="width:100%">
        <textarea class="form-control" style="width:100%" name="BESCHREIBUNG"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_BESCHREIBUNG'];?>
</textarea>
    </div>
    
</div>