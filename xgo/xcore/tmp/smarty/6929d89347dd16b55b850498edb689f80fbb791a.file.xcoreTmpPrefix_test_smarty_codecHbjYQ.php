<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 20:53:57
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecHbjYQ" */ ?>
<?php /*%%SmartyHeaderCode:160121341954fdfa553e2fb6-35729611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6929d89347dd16b55b850498edb689f80fbb791a' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecHbjYQ',
      1 => 1425930837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160121341954fdfa553e2fb6-35729611',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?>kategorie
<?php echo smarty_function_xr_form(array('form_id'=>7,'submit_txt'=>'send','var'=>'form'),$_smarty_tpl);?>

<?php echo smarty_function_xr_print_r(array('val'=>'form'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->getVariable('form')->value;?>
