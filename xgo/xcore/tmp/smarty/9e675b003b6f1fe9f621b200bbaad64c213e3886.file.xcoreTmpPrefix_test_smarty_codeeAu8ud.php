<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 09:51:35
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeAu8ud" */ ?>
<?php /*%%SmartyHeaderCode:14103765795502a517487523-31174137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e675b003b6f1fe9f621b200bbaad64c213e3886' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeAu8ud',
      1 => 1426236695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14103765795502a517487523-31174137',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_menuGrid')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_menuGrid.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_menuGrid(array('p_id'=>2,'P_ID'=>$_smarty_tpl->getVariable('P_ID')->value,'var'=>'menu'),$_smarty_tpl);?>


<nav role="navigation">

    <button class="navbar-toggle" data-toggle="collapse" data-target="#menucontainer">
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	</button>


    <div class="nav-holder navbar-collapse collapse in" id='menucontainer'>
    
        <ul class="nav navbar-nav">
        
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
</nav>    
