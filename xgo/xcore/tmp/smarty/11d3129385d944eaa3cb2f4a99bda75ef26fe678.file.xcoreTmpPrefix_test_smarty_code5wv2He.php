<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 18:54:31
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5wv2He" */ ?>
<?php /*%%SmartyHeaderCode:184841016254f5f557da42e6-05715761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11d3129385d944eaa3cb2f4a99bda75ef26fe678' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5wv2He',
      1 => 1425405271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184841016254f5f557da42e6-05715761',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_menuGrid')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_menuGrid.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_menuGrid(array('p_id'=>$_smarty_tpl->getVariable('P_ID')->value,'P_ID'=>$_smarty_tpl->getVariable('P_ID')->value,'var'=>'menu'),$_smarty_tpl);?>

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
" <?php if ($_smarty_tpl->tpl_vars['v']->value['p_id']==$_smarty_tpl->getVariable('P_ID')->value){?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['p_name'];?>
</a>
	</li>
<?php }} ?>
</ul>