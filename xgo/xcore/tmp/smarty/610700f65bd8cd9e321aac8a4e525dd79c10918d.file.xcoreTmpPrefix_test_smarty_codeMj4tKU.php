<?php /* Smarty version Smarty-3.0.7, created on 2015-11-13 09:18:09
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMj4tKU" */ ?>
<?php /*%%SmartyHeaderCode:8409573756459cc13c57d2-13304375%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '610700f65bd8cd9e321aac8a4e525dd79c10918d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMj4tKU',
      1 => 1447402689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8409573756459cc13c57d2-13304375',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>839,'wz_online'=>'Y','var'=>'data'),$_smarty_tpl);?>


<div class="impressum default-container-padding">
    <!--<h1>Impressum</h1>-->
    <span class="looklikeh1">
            Impressum
    </span>
    <br>
    <br>
    <div class="impressum-container">
        <div class="impressum">
            
            <div class=""><?php echo smarty_function_xr_translate(array('tag'=>"WhoShowersFirst e.U."),$_smarty_tpl);?>
</div> 
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <div class="faq-text" style="color:#04e0d7; text-transform: capitalize;">
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
</p>
                
            </div>
            <?php }} ?>
             
            <div class=""><?php echo smarty_function_xr_translate(array('tag'=>"Sitz:"),$_smarty_tpl);?>
</div> 
                
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <div class="faq-text" style="text-transform: capitalize;">
                    <p><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_SITZ'];?>
</p>
                
                </div>
                <?php }} ?>
                
            </div>
           
        
        </div>
     </div>    

</div>