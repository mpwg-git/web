<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 17:23:28
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoi3eGZ" */ ?>
<?php /*%%SmartyHeaderCode:91319192455030f00b17278-95691546%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f156277197ecfbfa648fd02598ce384a8ff1dd11' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoi3eGZ',
      1 => 1426263808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91319192455030f00b17278-95691546',
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