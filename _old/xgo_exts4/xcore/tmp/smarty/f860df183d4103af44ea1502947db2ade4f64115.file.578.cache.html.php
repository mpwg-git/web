<?php /* Smarty version Smarty-3.0.7, created on 2014-08-12 21:23:11
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/578.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:35322082653ea699f906174-71721447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f860df183d4103af44ea1502947db2ade4f64115' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/578.cache.html',
      1 => 1407871391,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35322082653ea699f906174-71721447',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('weeks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">Week <?php echo count($_smarty_tpl->getVariable('weeks')->value)-$_smarty_tpl->tpl_vars['k']->value;?>
</option>
<?php }} ?>