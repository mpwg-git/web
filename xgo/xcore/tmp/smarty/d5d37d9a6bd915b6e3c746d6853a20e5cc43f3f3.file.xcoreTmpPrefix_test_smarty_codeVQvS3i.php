<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 16:32:13
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVQvS3i" */ ?>
<?php /*%%SmartyHeaderCode:489192058550302fd3ea841-08917952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5d37d9a6bd915b6e3c746d6853a20e5cc43f3f3' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVQvS3i',
      1 => 1426260733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '489192058550302fd3ea841-08917952',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php $_smarty_tpl->tpl_vars['kategorie'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['wz_CATEGORY'], null, null);?>
<?php $_smarty_tpl->tpl_vars['kategorien'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['ALSO_LISTED_IN_CATEGORIES'], null, null);?>

<?php echo smarty_function_xr_translate(array('tag'=>'Kategorie'),$_smarty_tpl);?>
:

