<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 10:29:53
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeql5UMz" */ ?>
<?php /*%%SmartyHeaderCode:38300151054fac5112d1a44-41390758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69f19731764f830a23b98b0ee5a6ef5e9c1fab12' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeql5UMz',
      1 => 1425720593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38300151054fac5112d1a44-41390758',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
tabpanel
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