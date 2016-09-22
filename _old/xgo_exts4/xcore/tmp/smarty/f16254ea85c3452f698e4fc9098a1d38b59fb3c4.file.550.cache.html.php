<?php /* Smarty version Smarty-3.0.7, created on 2014-08-05 16:54:07
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/550.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:150674869353e0f00f1c0111-60808698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f16254ea85c3452f698e4fc9098a1d38b59fb3c4' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/550.cache.html',
      1 => 1407250447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150674869353e0f00f1c0111-60808698',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<p>
<img class="img-responsive coverImageSelection" src="<?php echo $_smarty_tpl->tpl_vars['v']->value['thumb_url'];?>
" border="0" data-id="<?php echo $_smarty_tpl->getVariable('id')->value;?>
" data-src="<?php echo $_smarty_tpl->tpl_vars['v']->value['thumb_file'];?>
">
</p>
<?php }} ?>