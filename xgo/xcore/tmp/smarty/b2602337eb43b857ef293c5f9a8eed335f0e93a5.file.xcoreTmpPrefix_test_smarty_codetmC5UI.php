<?php /* Smarty version Smarty-3.0.7, created on 2015-11-03 18:22:37
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetmC5UI" */ ?>
<?php /*%%SmartyHeaderCode:16085856925638ed5d55f638-33712509%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2602337eb43b857ef293c5f9a8eed335f0e93a5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetmC5UI',
      1 => 1446571357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16085856925638ed5d55f638-33712509',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>834,'wz_online'=>'Y','var'=>'data'),$_smarty_tpl);?>




<div class="worumgehts default-container-padding">
    <!-- <h1>FAQ</h1> -->
    <span class="looklikeh1">
            Blog worum geht es?
    </span>
    <br>
    <br>
    <div class="faq-container">
        <div class="worumgehts">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
        
                <div><b class="faq-question"><?php echo $_smarty_tpl->getVariable('data')->value['wz_FRAGE'];?>
</b></div> 
                <div class="faq-text"><?php echo $_smarty_tpl->getVariable('faq')->value['wz_ANTWORT'];?>
</div>
        
            <?php }} ?>
        
        </div>
     </div>    
    
    
    
  
            
    
 
    
     
     
     
</div>