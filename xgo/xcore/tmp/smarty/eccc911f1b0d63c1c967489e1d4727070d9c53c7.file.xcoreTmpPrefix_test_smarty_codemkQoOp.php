<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 21:28:11
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemkQoOp" */ ?>
<?php /*%%SmartyHeaderCode:83744387454fa0ddbc139f8-15241346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eccc911f1b0d63c1c967489e1d4727070d9c53c7' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemkQoOp',
      1 => 1425673691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83744387454fa0ddbc139f8-15241346',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="<?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    <div class="row">
        <?php  $_smarty_tpl->tpl_vars['tabHtml'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tabs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tabHtml']->key => $_smarty_tpl->tpl_vars['tabHtml']->value){
?>
            <?php echo $_smarty_tpl->tpl_vars['tabHtml']->value;?>

        <?php }} ?>
    </div>
</div>