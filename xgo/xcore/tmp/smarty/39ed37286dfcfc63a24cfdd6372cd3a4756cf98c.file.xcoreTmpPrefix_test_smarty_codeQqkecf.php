<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 11:55:30
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQqkecf" */ ?>
<?php /*%%SmartyHeaderCode:191040587954fad922686510-18704836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39ed37286dfcfc63a24cfdd6372cd3a4756cf98c' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQqkecf',
      1 => 1425725730,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191040587954fad922686510-18704836',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?> <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
 required_Y' style='display:none;'><?php echo smarty_function_xr_translate(array('tag'=>'Bitte füllen Sie dieses Feld aus'),$_smarty_tpl);?>
</div>
 <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
 required_EMAIL' style='display:none;'><?php echo smarty_function_xr_translate(array('tag'=>'Bitte tragen Sie eine E-Mail Adresse ein'),$_smarty_tpl);?>
</div>