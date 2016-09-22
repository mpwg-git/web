<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 11:06:40
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekvW8As" */ ?>
<?php /*%%SmartyHeaderCode:154466365554facdb0d14997-17383189%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49625bc41977005cf03eff383fa5602430b0f471' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekvW8As',
      1 => 1425722800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154466365554facdb0d14997-17383189',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tabs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <li role="presentation"><a href="#tab_<?php echo $_smarty_tpl->tpl_vars['v']->value['fas']['form_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" role="tab" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['v']->value['fas']['fas_name'];?>
</a></li>
    <?php }} ?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tabs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <div role="tabpanel" class="tab-pane<?php if ($_smarty_tpl->tpl_vars['k']->value==0){?> active<?php }?>" id="tab_<?php echo $_smarty_tpl->tpl_vars['v']->value['fas']['form_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['html'];?>
</div>
    <?php }} ?>
  </div>

</div>
