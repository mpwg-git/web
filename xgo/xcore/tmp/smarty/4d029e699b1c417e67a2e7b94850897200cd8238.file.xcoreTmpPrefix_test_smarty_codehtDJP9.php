<?php /* Smarty version Smarty-3.0.7, created on 2015-11-09 10:55:40
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehtDJP9" */ ?>
<?php /*%%SmartyHeaderCode:123061825056406d9c936183-27067718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d029e699b1c417e67a2e7b94850897200cd8238' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehtDJP9',
      1 => 1447062940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123061825056406d9c936183-27067718',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>839,'wz_online'=>'Y','var'=>'data'),$_smarty_tpl);?>




<div class="worumgehts default-container-padding">
  
    <span class="looklikeh1">
            Impressum
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
                <div><b class="faq-question"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</b></div> 
                <div class="faq-text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
</div>
                <div class="faq-text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_REPORTER'];?>
</div>
                <div class="faq-text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_BILD'];?>
</div>
                <div class="faq-text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_DATUM'];?>
</div> 
                <div class="faq-text"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'w'=>120,'h'=>160),$_smarty_tpl);?>
</div> 
                
        
            <?php }} ?>
        
        </div>
     </div>    
    
    
    
  
            
    
 
    
     
     
     
</div>