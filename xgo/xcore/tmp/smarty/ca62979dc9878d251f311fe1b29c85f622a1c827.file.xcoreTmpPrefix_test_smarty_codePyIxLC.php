<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 14:45:53
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePyIxLC" */ ?>
<?php /*%%SmartyHeaderCode:91743428954fef59103a5b3-19408269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca62979dc9878d251f311fe1b29c85f622a1c827' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePyIxLC',
      1 => 1425995153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91743428954fef59103a5b3-19408269',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if ($_smarty_tpl->getVariable('settings')->value['RAW']['wz_hidden']=='Y'){?>

    

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
            <input type="radio" name="<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
" value='<?php echo $_smarty_tpl->tpl_vars['record']->value['k'];?>
'><?php echo $_smarty_tpl->tpl_vars['record']->value['v'];?>
</option>
        <?php }} ?>
        <?php echo smarty_function_xr_atom(array('a_id'=>538,'return'=>1),$_smarty_tpl);?>

        <div class="clearer"></div>
    </div>

<?php }?>