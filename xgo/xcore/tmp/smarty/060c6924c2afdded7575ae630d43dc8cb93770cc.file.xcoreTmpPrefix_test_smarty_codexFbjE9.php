<?php /* Smarty version Smarty-3.0.7, created on 2015-11-09 14:34:31
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexFbjE9" */ ?>
<?php /*%%SmartyHeaderCode:10975334265640a0e7aa9628-19885460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '060c6924c2afdded7575ae630d43dc8cb93770cc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexFbjE9',
      1 => 1447076071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10975334265640a0e7aa9628-19885460',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
?> <div class="worumgehts agb default-container-padding">
  
    <span class="looklikeh1">
            <h1><?php echo smarty_function_xr_translate(array('tag'=>"AGB"),$_smarty_tpl);?>
</h1>
    </span>
    <br>
    <br>
    <div class="impressum-container">
        <div class="impressum">
            
                 
            <?php echo smarty_function_xr_wz_fetch(array('id'=>840,'wz_online'=>'Y','var'=>'data'),$_smarty_tpl);?>

            
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            
            <div class="abg-question">1. <?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</div> 
            <div class="abg-text" style="text-transform: capitalize;">
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
</p>
            </div>
            
            <?php }} ?>
           
        
        </div>
     </div>    
     
</div>