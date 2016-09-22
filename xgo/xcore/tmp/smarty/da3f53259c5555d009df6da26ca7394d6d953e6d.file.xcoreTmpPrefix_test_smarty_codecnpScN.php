<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 18:40:10
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecnpScN" */ ?>
<?php /*%%SmartyHeaderCode:1401806754fddafad3d958-94280747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da3f53259c5555d009df6da26ca7394d6d953e6d' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecnpScN',
      1 => 1425922810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1401806754fddafad3d958-94280747',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?>kategorie


<?php echo smarty_function_xr_form(array('form_id'=>7,'submit_txt'=>'send','val'=>'form'),$_smarty_tpl);?>




<?php echo $_smarty_tpl->getVariable('form')->value;?>
