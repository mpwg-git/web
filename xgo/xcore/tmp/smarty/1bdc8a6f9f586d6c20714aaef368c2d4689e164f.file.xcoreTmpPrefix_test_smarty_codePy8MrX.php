<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 10:28:09
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePy8MrX" */ ?>
<?php /*%%SmartyHeaderCode:174206123754feb929aef5e9-10115377%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bdc8a6f9f586d6c20714aaef368c2d4689e164f' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePy8MrX',
      1 => 1425979689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174206123754feb929aef5e9-10115377',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><div role="tabpanel">



  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tabs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>

        <li role="presentation" class="tablabel<?php if ($_smarty_tpl->tpl_vars['k']->value==0){?> active<?php }?>"><a href="#tab_<?php echo $_smarty_tpl->tpl_vars['v']->value['fas']['fas_f_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['v']->value['fas']['fas_id'];?>
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
"><?php echo $_smarty_tpl->tpl_vars['v']->value['html'];?>
</div>
    <?php }} ?>
  </div>

</div>
