<?php /* Smarty version Smarty-3.0.7, created on 2015-11-09 14:31:26
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiGBqb9" */ ?>
<?php /*%%SmartyHeaderCode:15496044215640a02eeafa42-22634002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b335b31f5c4c0c7746d3077d9fbc0c8876da5e40' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiGBqb9',
      1 => 1447075886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15496044215640a02eeafa42-22634002',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
?> <div class="adb default-container-padding">
  
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
            
            <div class="adb-question">1. <?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</div> 
            <div class="adg-text" style="text-transform: capitalize;">
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
</p>
            </div>
            
            <?php }} ?>
           
        
        </div>
     </div>    
     
</div>