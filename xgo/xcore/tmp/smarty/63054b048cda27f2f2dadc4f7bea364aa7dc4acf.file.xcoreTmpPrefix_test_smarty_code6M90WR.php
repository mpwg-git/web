<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 12:41:10
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6M90WR" */ ?>
<?php /*%%SmartyHeaderCode:19970802554fed856ad9e03-83533917%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63054b048cda27f2f2dadc4f7bea364aa7dc4acf' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6M90WR',
      1 => 1425987670,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19970802554fed856ad9e03-83533917',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?>[WIZARD]

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('metaInfos')->value),$_smarty_tpl);?>


<div class="form-group <?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    <label><?php echo $_smarty_tpl->getVariable('fas')->value['fas_name'];?>
<?php if ($_smarty_tpl->getVariable('fas')->value['fas_required']!='N'){?>*<?php }?></label>
    <select name="<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
">
        <?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('metaInfos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['record']->key;
?>
        <option value='<?php echo $_smarty_tpl->tpl_vars['record']->value['k'];?>
'><?php echo $_smarty_tpl->tpl_vars['record']->value['titleIt'];?>
</option>
        <?php }} ?>
    </select>
    <?php echo smarty_function_xr_atom(array('a_id'=>538,'return'=>1),$_smarty_tpl);?>

    <div class="clearer"></div>
</div>