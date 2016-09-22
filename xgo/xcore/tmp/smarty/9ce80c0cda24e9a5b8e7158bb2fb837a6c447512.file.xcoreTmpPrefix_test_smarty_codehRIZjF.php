<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 16:21:41
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehRIZjF" */ ?>
<?php /*%%SmartyHeaderCode:152211605854f5d1853de834-77025291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ce80c0cda24e9a5b8e7158bb2fb837a6c447512' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehRIZjF',
      1 => 1425396101,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152211605854f5d1853de834-77025291',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_menu')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_menu.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_menu(array('p_id'=>4,'P_ID'=>4,'var'=>'menu'),$_smarty_tpl);?>


<nav role="navigation">
    
    <ul class="nav navbar-nav navbar-default">

    
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
    
    
</nav>