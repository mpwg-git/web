<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 18:19:24
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4C3dn3" */ ?>
<?php /*%%SmartyHeaderCode:204014704554f5ed1ce6da95-43545703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12447ed5d8a01b4b374da4b29986d16bfbd82e30' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4C3dn3',
      1 => 1425403164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204014704554f5ed1ce6da95-43545703',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group <?php echo $_smarty_tpl->getVariable('field')->value['class'];?>
">
    <label><?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->getVariable('field')->value['as_label']),$_smarty_tpl);?>
</label>
    
    <select name="<?php echo $_smarty_tpl->getVariable('field')->value['as_name'];?>
" data-custom-class="ddSel">
        <?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('field')->value['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value){
?>
        <option value='<?php echo $_smarty_tpl->tpl_vars['record']->value['value'];?>
' data-custom-class="ddSel"><?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->tpl_vars['record']->value['titleIt']),$_smarty_tpl);?>
</option>
        <?php }} ?>
    </select>
    <div class="clearer"></div>
</div>