<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 15:42:23
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/524.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:141734086854ff02cf4e90e6-17795669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '437cd82b84e44af1417dfcdcfc8ca3578aa89252' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/524.cache.html',
      1 => 1425998410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141734086854ff02cf4e90e6-17795669',
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
        <li role="presentation" class="tablabel<?php if ($_smarty_tpl->tpl_vars['v']->value['tab_active']==true){?> active<?php }?>"><a href="#tab_<?php echo $_smarty_tpl->tpl_vars['v']->value['fas']['fas_f_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['v']->value['fas']['fas_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['v']->value['form_wz_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['v']->value['form_wz_r_id'];?>
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
        <div role="tabpanel" class="tab-pane<?php if ($_smarty_tpl->tpl_vars['v']->value['tab_active']==true){?> active<?php }?>" id="tab_<?php echo $_smarty_tpl->tpl_vars['v']->value['fas']['fas_f_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['v']->value['fas']['fas_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['v']->value['form_wz_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['v']->value['form_wz_r_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['html'];?>
</div>
    <?php }} ?>
  </div>

</div>
