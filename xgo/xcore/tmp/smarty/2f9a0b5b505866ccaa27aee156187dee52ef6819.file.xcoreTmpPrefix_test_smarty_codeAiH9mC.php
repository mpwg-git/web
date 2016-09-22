<?php /* Smarty version Smarty-3.0.7, created on 2015-10-09 12:55:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAiH9mC" */ ?>
<?php /*%%SmartyHeaderCode:24784175156179d3f619396-78344980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f9a0b5b505866ccaa27aee156187dee52ef6819' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAiH9mC',
      1 => 1444388159,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24784175156179d3f619396-78344980',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mitbewohner')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <?php echo smarty_function_xr_atom(array('a_id'=>813,'single'=>$_smarty_tpl->tpl_vars['v']->value,'return'=>1,'desc'=>'roomie single'),$_smarty_tpl);?>

<?php }} ?>