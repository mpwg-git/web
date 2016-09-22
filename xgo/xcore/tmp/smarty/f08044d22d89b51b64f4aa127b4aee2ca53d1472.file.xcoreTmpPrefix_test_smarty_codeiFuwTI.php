<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 09:46:40
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiFuwTI" */ ?>
<?php /*%%SmartyHeaderCode:21002592435502a3f039d455-71670258%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f08044d22d89b51b64f4aa127b4aee2ca53d1472' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiFuwTI',
      1 => 1426236400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21002592435502a3f039d455-71670258',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xs_getCategories')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/../xshop/smarty/function.xs_getCategories.php';
if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php echo smarty_function_xs_getCategories(array('var'=>'data'),$_smarty_tpl);?>



<?php echo smarty_function_xr_form(array('form_id'=>8,'submit_txt'=>'send','var'=>'form'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->getVariable('form')->value;?>

