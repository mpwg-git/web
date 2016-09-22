<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 10:10:16
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/607.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:386247695502a9782fe266-82747488%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '879fff9a4e8e6c39be853632ce2d40b2c9bc0894' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/607.cache.html',
      1 => 1426237812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '386247695502a9782fe266-82747488',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php echo smarty_function_xr_form(array('form_id'=>7,'submit_txt'=>'send','var'=>'form'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->getVariable('form')->value;?>
