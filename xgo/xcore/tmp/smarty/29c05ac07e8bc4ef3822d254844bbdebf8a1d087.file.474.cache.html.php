<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 16:40:26
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/474.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:26323612954fdbeead59743-90328297%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29c05ac07e8bc4ef3822d254844bbdebf8a1d087' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/474.cache.html',
      1 => 1425913552,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26323612954fdbeead59743-90328297',
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
" value='Y'>Y</option>
	        </label>
        </div>
        
        <div class="checkbox">    
        	<label>
		         <input type="checkbox" name="<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
" value='N'>N</option>
	        </label>
        </div>
   
    <?php echo smarty_function_xr_atom(array('a_id'=>538,'return'=>1),$_smarty_tpl);?>

    <div class="clearer"></div>
</div>