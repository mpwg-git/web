<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 17:30:41
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codectLkNW" */ ?>
<?php /*%%SmartyHeaderCode:1247337139550310b15a3f77-27482119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a287a707c13c83d0a7d2b50fbc122054ac1fb6f3' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codectLkNW',
      1 => 1426264241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1247337139550310b15a3f77-27482119',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars['alsoviewed'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['ALSO_VIEWED'], null, null);?>

<?php if (!empty($_smarty_tpl->getVariable('alsoviewed',null,true,false)->value)){?>

    <div class="productdetail-alsoviewed">
    
        <ul>
        
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('alsoviewed')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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