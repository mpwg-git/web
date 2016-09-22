<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 18:40:19
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeuvQnfB" */ ?>
<?php /*%%SmartyHeaderCode:208613508254fddb033c0ea5-25623841%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37cb426387996d523f7944d13b5efe1360757337' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeuvQnfB',
      1 => 1425922819,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208613508254fddb033c0ea5-25623841',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?>kategorie


<?php echo smarty_function_xr_form(array('form_id'=>7,'submit_txt'=>'send','val'=>'form'),$_smarty_tpl);?>



<?php echo $_smarty_tpl->getVariable('form')->value;?>
