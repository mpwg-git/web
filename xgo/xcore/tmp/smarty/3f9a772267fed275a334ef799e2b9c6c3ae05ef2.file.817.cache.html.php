<?php /* Smarty version Smarty-3.0.7, created on 2016-01-08 14:34:55
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/817.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:961955543568fbafff1b8f6-38695725%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f9a772267fed275a334ef799e2b9c6c3ae05ef2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/817.cache.html',
      1 => 1451984362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '961955543568fbafff1b8f6-38695725',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"zimmergrösse?"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center">
        <input class="form-control" name="GROESSE" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'m²'),$_smarty_tpl);?>
?" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_GROESSE'];?>
" />
    </div>
</div>