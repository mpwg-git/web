<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 10:55:57
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelgKfPN" */ ?>
<?php /*%%SmartyHeaderCode:122758350454facb2d01c462-13096913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8977f5baa990b36f6ddf3935cbba72bc52f9d3d' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelgKfPN',
      1 => 1425722156,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122758350454facb2d01c462-13096913',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('fas')->value),$_smarty_tpl);?>


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
        <li role="presentation"><a href="#tab_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" role="tab" data-toggle="tab">tablabel <?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['v']->value['LABEL'];?>
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
        <div role="tabpanel" class="tab-pane<?php if ($_smarty_tpl->tpl_vars['k']->value==0){?> active<?php }?>" id="tab_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">tab <?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['v']->value['HTML'];?>
</div>
    <?php }} ?>
  </div>

</div>
