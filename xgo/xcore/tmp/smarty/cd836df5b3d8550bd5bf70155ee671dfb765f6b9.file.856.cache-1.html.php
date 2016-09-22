<?php /* Smarty version Smarty-3.0.7, created on 2015-12-18 17:29:31
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/856.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:5655635085674346beb8794-02448648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd836df5b3d8550bd5bf70155ee671dfb765f6b9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/856.cache-1.html',
      1 => 1450356266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5655635085674346beb8794-02448648',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Unregistrierte Frauen in WG?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <input class="form-control" name="UNREG_F" value="<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_UNREG_F'];?>
" id="UNREG_F" placeholder="0" rel="required"  />
    </div>
</div>