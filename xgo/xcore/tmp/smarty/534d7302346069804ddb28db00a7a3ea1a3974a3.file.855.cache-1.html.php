<?php /* Smarty version Smarty-3.0.7, created on 2016-01-07 17:09:51
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/855.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:697613029568e8dcfc5fcb2-05017454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '534d7302346069804ddb28db00a7a3ea1a3974a3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/855.cache-1.html',
      1 => 1451984363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '697613029568e8dcfc5fcb2-05017454',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Unregistrierte Männer in WG?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <input class="form-control" name="UNREG_M" value="<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_UNREG_M'];?>
" id="UNREG_M" placeholder="0" rel="required"  />
    </div>
</div>