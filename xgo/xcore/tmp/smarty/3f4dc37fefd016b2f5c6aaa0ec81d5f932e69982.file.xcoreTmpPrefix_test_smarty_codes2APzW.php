<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 10:41:48
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codes2APzW" */ ?>
<?php /*%%SmartyHeaderCode:121681770854febc5ccfcc32-04570583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f4dc37fefd016b2f5c6aaa0ec81d5f932e69982' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codes2APzW',
      1 => 1425980508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121681770854febc5ccfcc32-04570583',
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
        <li role="presentation" class="tablabel<?php if ($_smarty_tpl->tpl_vars['k']->value==0){?> active<?php }?>"><a href="#tab_<?php echo $_smarty_tpl->tpl_vars['v']->value['fas']['fas_f_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['v']->value['fas']['fas_id'];?>
_<?php echo $_smarty_tpl->getVariable('form_wz_id')->value;?>
_<?php echo $_smarty_tpl->getVariable('form_wz_r_id')->value;?>
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
        <div role="tabpanel" class="tab-pane<?php if ($_smarty_tpl->tpl_vars['k']->value==0){?> active<?php }?>" id="tab_<?php echo $_smarty_tpl->tpl_vars['v']->value['fas']['fas_f_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['v']->value['fas']['fas_id'];?>
_<?php echo $_smarty_tpl->getVariable('form_wz_id')->value;?>
_<?php echo $_smarty_tpl->getVariable('form_wz_r_id')->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['html'];?>
</div>
    <?php }} ?>
  </div>

</div>
