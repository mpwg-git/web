<?php /* Smarty version Smarty-3.0.7, created on 2016-01-15 15:47:28
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/874.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:7908190345699068059f3e3-83810067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '799f9a3f8c5689c85b9998ad93bf1d31e9ad182d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/874.cache.html',
      1 => 1452869169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7908190345699068059f3e3-83810067',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Lage"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center" style="width:100%">
        <textarea class="form-control textarea-beschreibung" name="LAGE" placeholder="Öffentliche Verkehrsmittel, nächster Supermarkt, wichtige Punkte in der Nähe, ..."><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_LAGE'];?>
</textarea>
    </div>
</div>