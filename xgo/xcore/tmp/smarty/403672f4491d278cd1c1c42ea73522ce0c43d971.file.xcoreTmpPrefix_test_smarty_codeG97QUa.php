<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 17:23:17
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeG97QUa" */ ?>
<?php /*%%SmartyHeaderCode:74756109555030ef55b2556-80540475%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '403672f4491d278cd1c1c42ea73522ce0c43d971' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeG97QUa',
      1 => 1426263797,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74756109555030ef55b2556-80540475',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars['alsopurchased'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['ALSO_PURCHASED'], null, null);?>

<?php if (!empty($_smarty_tpl->getVariable('alsopurchased',null,true,false)->value)){?>

<div class="produktdetail-alsopurchased">
 
    <ul>
    
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('alsopurchased')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <li><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</li>
    <?php }} ?>
    
    </ul>

</div>

<?php }?>