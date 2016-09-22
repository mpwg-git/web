<?php /* Smarty version Smarty-3.0.7, created on 2014-08-22 16:37:42
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/587.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:109001251053f755b63922a1-55688166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a0ed269b4b54d47b77f9211288134590f9370ea' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/587.cache.html',
      1 => 1408718262,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109001251053f755b63922a1-55688166',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('types')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
<?php }} ?>