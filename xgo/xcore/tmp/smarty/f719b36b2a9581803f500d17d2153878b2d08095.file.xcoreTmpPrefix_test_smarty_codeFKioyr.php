<?php /* Smarty version Smarty-3.0.7, created on 2015-03-05 16:31:50
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFKioyr" */ ?>
<?php /*%%SmartyHeaderCode:113026982454f876e6b91434-76212191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f719b36b2a9581803f500d17d2153878b2d08095' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFKioyr',
      1 => 1425569510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113026982454f876e6b91434-76212191',
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