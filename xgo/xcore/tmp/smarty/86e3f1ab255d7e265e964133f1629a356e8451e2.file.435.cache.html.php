<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 09:53:08
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/435.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:13668370725502a574a92725-27088552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86e3f1ab255d7e265e964133f1629a356e8451e2' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/435.cache.html',
      1 => 1426236409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13668370725502a574a92725-27088552',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xs_getCategories')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/../xshop/smarty/function.xs_getCategories.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php echo smarty_function_xs_getCategories(array('var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>



<?php echo smarty_function_xr_form(array('form_id'=>8,'submit_txt'=>'send','var'=>'form'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->getVariable('form')->value;?>

