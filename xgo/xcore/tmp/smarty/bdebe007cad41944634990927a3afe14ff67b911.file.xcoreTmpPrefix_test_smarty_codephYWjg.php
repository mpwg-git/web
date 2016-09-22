<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 16:32:52
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codephYWjg" */ ?>
<?php /*%%SmartyHeaderCode:24520187255030324374cb5-60847811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdebe007cad41944634990927a3afe14ff67b911' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codephYWjg',
      1 => 1426260772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24520187255030324374cb5-60847811',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php $_smarty_tpl->tpl_vars['kategorie'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['wz_CATEGORY'], null, null);?>
<?php $_smarty_tpl->tpl_vars['kategorien'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['ALSO_LISTED_IN_CATEGORIES'], null, null);?>

<?php echo smarty_function_xr_translate(array('tag'=>'Kategorie'),$_smarty_tpl);?>
: <?php echo $_smarty_tpl->getVariable('kategorie')->value;?>


<?php echo smarty_function_xr_translate(array('tag'=>'Weitere Kategorien'),$_smarty_tpl);?>
: 

<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('kategorien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>


<?php }} ?>


<?php echo $_smarty_tpl->getVariable('kategorie')->value;?>


