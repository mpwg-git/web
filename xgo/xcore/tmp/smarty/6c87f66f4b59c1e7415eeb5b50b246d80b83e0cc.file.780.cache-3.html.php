<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 20:30:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/780.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:2554779225679a4f32ea700-28925149%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c87f66f4b59c1e7415eeb5b50b246d80b83e0cc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/780.cache-3.html',
      1 => 1450812460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2554779225679a4f32ea700-28925149',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label for="cost"><?php echo smarty_function_xr_translate(array('tag'=>"Wieviel?"),$_smarty_tpl);?>
</label>
    <div class="fakeline"></div>
    <div id="slider-range" data-valueab="<?php echo $_smarty_tpl->getVariable('searchSession')->value['price_from'];?>
" data-valuebis="<?php echo $_smarty_tpl->getVariable('searchSession')->value['price_to'];?>
"></div>
    <p class="legend clearfix"><span class="pull-left"><?php echo smarty_function_xr_translate(array('tag'=>"VON"),$_smarty_tpl);?>
</span><span class="pull-right"><?php echo smarty_function_xr_translate(array('tag'=>"BIS"),$_smarty_tpl);?>
</span></p>
</div>