<?php /* Smarty version Smarty-3.0.7, created on 2015-03-05 16:33:36
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecKqKxV" */ ?>
<?php /*%%SmartyHeaderCode:107563776454f87750a613e8-05674331%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f72d7e4eff5d1e3bb8b4c8bba287c24cdaa62b1e' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecKqKxV',
      1 => 1425569616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107563776454f87750a613e8-05674331',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_menuGrid')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_menuGrid.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_menuGrid(array('p_id'=>4,'P_ID'=>$_smarty_tpl->getVariable('P_ID')->value,'var'=>'menu'),$_smarty_tpl);?>


<div>
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
                
                <?php if (!empty($_smarty_tpl->tpl_vars['v']->value['children'])){?>
                    <ul>
                        <?php  $_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v2']->key => $_smarty_tpl->tpl_vars['v2']->value){
 $_smarty_tpl->tpl_vars['k2']->value = $_smarty_tpl->tpl_vars['v2']->key;
?>
                            <li>
                                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->tpl_vars['v2']->value['p_id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['v2']->value['p_name'];?>
</a>
                            </li>
                        <?php }} ?>
                    </ul>
                <?php }?>
                
        	</li>
    	<?php }} ?>
    </ul>
    
</div>