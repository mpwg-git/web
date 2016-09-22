<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 10:10:12
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVUQgzw" */ ?>
<?php /*%%SmartyHeaderCode:6655492915502a9741fcce9-70608042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a38b520e02af61b60d4875d40c7cb800a97012d9' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVUQgzw',
      1 => 1426237812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6655492915502a9741fcce9-70608042',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php echo smarty_function_xr_form(array('form_id'=>7,'submit_txt'=>'send','var'=>'form'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->getVariable('form')->value;?>
