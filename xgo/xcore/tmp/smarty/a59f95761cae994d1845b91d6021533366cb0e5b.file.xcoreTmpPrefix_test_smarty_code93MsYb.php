<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 11:54:16
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code93MsYb" */ ?>
<?php /*%%SmartyHeaderCode:143065452054fad8d869bfb7-94278238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a59f95761cae994d1845b91d6021533366cb0e5b' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code93MsYb',
      1 => 1425725656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143065452054fad8d869bfb7-94278238',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php $_smarty_tpl->tpl_vars['field_name'] = new Smarty_variable("form_".($_smarty_tpl->getVariable('fas')->value['fas_f_id'])."_".($_smarty_tpl->getVariable('fas')->value['fas_id']), null, null);?>

<div class="form-group <?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    <label><?php echo $_smarty_tpl->getVariable('fas')->value['fas_name'];?>
<?php if ($_smarty_tpl->getVariable('fas')->value['fas_required']!='N'){?>*<?php }?></label>
    <?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('records')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value){
?>
        <input type="radio" name="<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
" value='<?php echo $_smarty_tpl->tpl_vars['record']->value['value'];?>
'><?php echo $_smarty_tpl->tpl_vars['record']->value['value'];?>
</option>
    <?php }} ?>
    <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
 required_Y' style='display:none;'><?php echo smarty_function_xr_translate(array('tag'=>'Bitte füllen Sie dieses Feld aus'),$_smarty_tpl);?>
</div>
    <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
 required_EMAIL' style='display:none;'><?php echo smarty_function_xr_translate(array('tag'=>'Bitte tragen Sie eine E-Mail Adresse ein'),$_smarty_tpl);?>
</div>
    <div class="clearer"></div>
</div>