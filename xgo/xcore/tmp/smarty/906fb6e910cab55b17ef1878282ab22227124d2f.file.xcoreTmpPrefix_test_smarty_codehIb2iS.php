<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 15:15:00
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehIb2iS" */ ?>
<?php /*%%SmartyHeaderCode:95609952954fefc64b0dd14-37926019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '906fb6e910cab55b17ef1878282ab22227124d2f' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehIb2iS',
      1 => 1425996900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95609952954fefc64b0dd14-37926019',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if ($_smarty_tpl->getVariable('settings')->value['RAW']['wz_hidden']=='Y'){?>

    <input type='hidden' data-as-id='<?php echo $_smarty_tpl->getVariable('fas')->value['fas_as_id'];?>
' data-form-id='<?php echo $_smarty_tpl->getVariable('form_uid')->value;?>
' name='<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
' value='<?php echo $_smarty_tpl->getVariable('value')->value;?>
' class="form-control">

<?php }else{ ?>

    
    <div class="form-group <?php echo $_smarty_tpl->getVariable('class')->value;?>
">
        <label><?php echo $_smarty_tpl->getVariable('fas')->value['fas_name'];?>
<?php if ($_smarty_tpl->getVariable('fas')->value['fas_required']!='N'){?>*<?php }?></label>
        <?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('as_config')->value['l']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value){
?>
            <input data-form-id='<?php echo $_smarty_tpl->getVariable('form_uid')->value;?>
' type="radio" name="<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
" value='<?php echo $_smarty_tpl->tpl_vars['record']->value['k'];?>
'><?php echo $_smarty_tpl->tpl_vars['record']->value['v'];?>
</option>
        <?php }} ?>
        <?php echo smarty_function_xr_atom(array('a_id'=>538,'return'=>1),$_smarty_tpl);?>

        <div class="clearer"></div>
    </div>

<?php }?>