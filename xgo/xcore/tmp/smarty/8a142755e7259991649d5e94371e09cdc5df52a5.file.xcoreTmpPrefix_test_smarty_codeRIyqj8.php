<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 11:17:16
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRIyqj8" */ ?>
<?php /*%%SmartyHeaderCode:23236036354fad02c3beb73-57967538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a142755e7259991649d5e94371e09cdc5df52a5' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRIyqj8',
      1 => 1425723436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23236036354fad02c3beb73-57967538',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<div class="<?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    <div class="row">
        <?php  $_smarty_tpl->tpl_vars['colHtml'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columns')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['colHtml']->key => $_smarty_tpl->tpl_vars['colHtml']->value){
?>
           <?php echo $_smarty_tpl->tpl_vars['colHtml']->value;?>

        <?php }} ?>
    </div>
</div>