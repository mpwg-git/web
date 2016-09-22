<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 12:05:55
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeuIh6Hc" */ ?>
<?php /*%%SmartyHeaderCode:5414857654fadb937f3bf3-18526294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b6437ea784c42f829b8e52bb021b33226ab8b4c' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeuIh6Hc',
      1 => 1425726355,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5414857654fadb937f3bf3-18526294',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="form-group <?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    
    <div class="checkbox">    
        <?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('records')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value){
?>
        	<label>
		         <input type="checkbox" name="<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
" value='<?php echo $_smarty_tpl->tpl_vars['record']->value['value'];?>
'><?php echo $_smarty_tpl->tpl_vars['record']->value['value'];?>
</option>
	        </label>
        <?php }} ?>
    <?php echo smarty_function_xr_atom(array('a_id'=>538,'return'=>1),$_smarty_tpl);?>

    <div class="clearer"></div>
</div>