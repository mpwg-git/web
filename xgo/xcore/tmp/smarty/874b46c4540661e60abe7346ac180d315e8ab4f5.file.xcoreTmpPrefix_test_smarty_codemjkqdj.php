<?php /* Smarty version Smarty-3.0.7, created on 2015-11-09 12:24:30
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemjkqdj" */ ?>
<?php /*%%SmartyHeaderCode:12091489355640826e0fa016-93160435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '874b46c4540661e60abe7346ac180d315e8ab4f5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemjkqdj',
      1 => 1447068270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12091489355640826e0fa016-93160435',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="worumgehts default-container-padding">
    
    <h1>FAQ</h1>
    

    
         
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    
       <?php echo smarty_function_xr_atom(array('a_id'=>831,'faq'=>$_smarty_tpl->tpl_vars['v']->value,'return'=>1),$_smarty_tpl);?>

    
    <?php }} ?>
    
    
</div>