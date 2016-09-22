<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 16:02:18
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeff5Nr3" */ ?>
<?php /*%%SmartyHeaderCode:200473985954fdb5faa3c790-17818078%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '063b53310a5ee5322b32b3db5a27cfa6433272bd' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeff5Nr3',
      1 => 1425913338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200473985954fdb5faa3c790-17818078',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="form-group <?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    <?php echo $_smarty_tpl->getVariable('fas')->value['fas_name'];?>

   
        <div class="checkbox">    
        	<label>
		         <input type="checkbox" name="<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
" value='<?php echo $_smarty_tpl->getVariable('record')->value['k'];?>
'><?php echo $_smarty_tpl->getVariable('record')->value['v'];?>
</option>
	        </label>
        </div>
   
    <?php echo smarty_function_xr_atom(array('a_id'=>538,'return'=>1),$_smarty_tpl);?>

    <div class="clearer"></div>
</div>