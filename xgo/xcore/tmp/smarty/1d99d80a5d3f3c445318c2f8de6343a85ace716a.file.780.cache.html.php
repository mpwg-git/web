<?php /* Smarty version Smarty-3.0.7, created on 2016-01-05 12:38:09
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/780.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1412636827568bab21c0dd29-92770002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d99d80a5d3f3c445318c2f8de6343a85ace716a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/780.cache.html',
      1 => 1451984364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1412636827568bab21c0dd29-92770002',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
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