<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 20:24:57
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexdvTVw" */ ?>
<?php /*%%SmartyHeaderCode:11128747815679a38940a8e7-72306337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20fdb536822927835422b5ad7f3d010fd951d81e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexdvTVw',
      1 => 1450812297,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11128747815679a38940a8e7-72306337',
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