<?php /* Smarty version Smarty-3.0.7, created on 2015-11-09 14:31:52
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRgGxEl" */ ?>
<?php /*%%SmartyHeaderCode:5797010375640a048e86032-86505415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d0f820bd55dccfc2f12949f3225ba3308f1a7bf' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRgGxEl',
      1 => 1447075912,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5797010375640a048e86032-86505415',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
?> <div class="worumgehts default-container-padding">
  
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