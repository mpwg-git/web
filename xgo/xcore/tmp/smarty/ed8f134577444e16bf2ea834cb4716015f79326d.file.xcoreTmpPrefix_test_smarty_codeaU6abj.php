<?php /* Smarty version Smarty-3.0.7, created on 2015-12-17 15:39:31
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaU6abj" */ ?>
<?php /*%%SmartyHeaderCode:16589162265672c9233a6258-53430042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed8f134577444e16bf2ea834cb4716015f79326d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaU6abj',
      1 => 1450363171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16589162265672c9233a6258-53430042',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_translate(array('tag'=>'Weiblich'),$_smarty_tpl);?>
: <?php echo $_smarty_tpl->getVariable('roomData')->value['wz_COUNT_MITBEWOHNER_F'];?>

<br>
<?php echo smarty_function_xr_translate(array('tag'=>'Männlich'),$_smarty_tpl);?>
: <?php echo $_smarty_tpl->getVariable('roomData')->value['wz_COUNT_MITBEWOHNER_M'];?>

<br>


<div class="row">
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mitbewohner')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <?php echo smarty_function_xr_atom(array('a_id'=>813,'single'=>$_smarty_tpl->tpl_vars['v']->value,'return'=>1,'desc'=>'roomie single'),$_smarty_tpl);?>

    <?php }} ?>
</div>