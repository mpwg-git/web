<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 12:30:10
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code98c3pv" */ ?>
<?php /*%%SmartyHeaderCode:191596375054fae142de7604-39246135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6bbbf473d91cd1b2294fc0305c226b8ab1e5aca2' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code98c3pv',
      1 => 1425727810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191596375054fae142de7604-39246135',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('as_config')->value),$_smarty_tpl);?>


<div class="form-group <?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    <?php echo $_smarty_tpl->getVariable('fas')->value['fas_name'];?>

    <?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('as_config')->value['l']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value){
?>
        <div class="checkbox">    
        	<label>
		         <input type="checkbox" name="<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
" value='<?php echo $_smarty_tpl->tpl_vars['record']->value['k'];?>
'><?php echo $_smarty_tpl->tpl_vars['record']->value['v'];?>
</option>
	        </label>
        </diV>
    <?php }} ?>
    <?php echo smarty_function_xr_atom(array('a_id'=>538,'return'=>1),$_smarty_tpl);?>

    <div class="clearer"></div>
</div>