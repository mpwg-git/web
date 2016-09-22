<?php /* Smarty version Smarty-3.0.7, created on 2015-10-29 13:40:24
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codek28ltB" */ ?>
<?php /*%%SmartyHeaderCode:169808768563213b886ca76-27630468%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50aa4fc82b22d847c3f8faeb6d86be94e6c89d81' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codek28ltB',
      1 => 1446122424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169808768563213b886ca76-27630468',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>830,'wz_online'=>'Y','var'=>'data'),$_smarty_tpl);?>



<div class="worumgehts default-container-padding">
    <!-- <h1>FAQ</h1> -->
    <span class="looklikeh1">
            FAQ
    </span>
    <br>
    <br>
     
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