<?php /* Smarty version Smarty-3.0.7, created on 2015-12-17 13:44:47
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/856.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:10499244045672ae3feebba9-80591551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7090532750c0ccf781563da52307c1948834606' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/856.cache-3.html',
      1 => 1450356266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10499244045672ae3feebba9-80591551',
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