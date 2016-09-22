<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 18:34:47
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetVeUms" */ ?>
<?php /*%%SmartyHeaderCode:170112807754f5f0b76a5283-03423839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0af59502f2a954329e9cca8e1255030badada7ea' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetVeUms',
      1 => 1425404087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170112807754f5f0b76a5283-03423839',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_menuGrid')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_menuGrid.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_menuGrid(array('p_id'=>$_smarty_tpl->getVariable('P_ID')->value,'P_ID'=>$_smarty_tpl->getVariable('P_ID')->value,'var'=>'menu'),$_smarty_tpl);?>


<div class="row">
    
    <div class="col-sm-4">
        
        <ul>
         <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('menu')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->tpl_vars['v']->value['p_id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['p_name'];?>
</a>
        	</li>
    	<?php }} ?>
        </ul>
        
    </div>
    
    <div class="col-sm-8">
        
        
        
    </div>
    
</div>