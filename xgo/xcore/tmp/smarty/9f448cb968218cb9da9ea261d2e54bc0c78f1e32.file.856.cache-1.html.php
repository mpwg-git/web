<?php /* Smarty version Smarty-3.0.7, created on 2016-08-03 12:50:44
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/856.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:130719973657a1cc84324da5-50574954%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f448cb968218cb9da9ea261d2e54bc0c78f1e32' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/856.cache-1.html',
      1 => 1451984363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130719973657a1cc84324da5-50574954',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Unregistrierte Frauen in WG?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <input class="form-control" name="UNREG_F" value="<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_UNREG_F'];?>
" id="UNREG_F" placeholder="0" rel="required"  />
    </div>
</div>