<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 15:20:13
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBm8jqO" */ ?>
<?php /*%%SmartyHeaderCode:12898736254fefd9d9c38e0-35469123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab2f23591dfa6bdaeeec0906c16433ae3f5005dc' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBm8jqO',
      1 => 1425997213,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12898736254fefd9d9c38e0-35469123',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('settings')->value),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('settings')->value['RAW']['wz_hidden']=='Y'){?>

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
            <input data-as-id='<?php echo $_smarty_tpl->getVariable('fas')->value['fas_as_id'];?>
' data-form-id='<?php echo $_smarty_tpl->getVariable('form_uid')->value;?>
' type="radio" name="<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
" value='<?php echo $_smarty_tpl->tpl_vars['record']->value['k'];?>
'><?php echo $_smarty_tpl->tpl_vars['record']->value['v'];?>
</option>
        <?php }} ?>
        <?php echo smarty_function_xr_atom(array('a_id'=>538,'return'=>1),$_smarty_tpl);?>

        <div class="clearer"></div>
    </div>

<?php }?>