<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 11:07:13
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeH4WZjW" */ ?>
<?php /*%%SmartyHeaderCode:145187621354facdd16ac407-96146646%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4873e8294620ae7ee2f96fb90ad8c7bf37815448' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeH4WZjW',
      1 => 1425722833,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145187621354facdd16ac407-96146646',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><div role="tabpanel">

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('tabs')->value),$_smarty_tpl);?>


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
