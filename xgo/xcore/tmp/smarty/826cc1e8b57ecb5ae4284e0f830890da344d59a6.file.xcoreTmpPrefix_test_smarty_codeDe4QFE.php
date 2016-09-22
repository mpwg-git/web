<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 21:23:30
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDe4QFE" */ ?>
<?php /*%%SmartyHeaderCode:190840298255db6f32c4e301-57176120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '826cc1e8b57ecb5ae4284e0f830890da344d59a6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDe4QFE',
      1 => 1440444210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190840298255db6f32c4e301-57176120',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label for="cost"><?php echo smarty_function_xr_translate(array('tag'=>"Wieviel?"),$_smarty_tpl);?>
</label>
    <div id="slider-range" data-valueab="<?php echo $_smarty_tpl->getVariable('searchSession')->value['price_from'];?>
" data-valuebis="<?php echo $_smarty_tpl->getVariable('searchSession')->value['price_to'];?>
"></div>
    <p class="legend clearfix"><span class="pull-left"><?php echo smarty_function_xr_translate(array('tag'=>"VON"),$_smarty_tpl);?>
</span><span class="pull-right"><?php echo smarty_function_xr_translate(array('tag'=>"BIS"),$_smarty_tpl);?>
</span></p>
    
</div>