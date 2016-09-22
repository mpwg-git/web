<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 12:20:01
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTqEbuf" */ ?>
<?php /*%%SmartyHeaderCode:152038724654fed361a95180-75136746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9157382d6954fd7136b6858adf81f45b534cd35b' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTqEbuf',
      1 => 1425986401,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152038724654fed361a95180-75136746',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php echo smarty_function_xr_form(array('form_id'=>8,'submit_txt'=>'send','var'=>'form'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->getVariable('form')->value;?>

