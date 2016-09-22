<?php /* Smarty version Smarty-3.0.7, created on 2015-11-09 11:33:45
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyfObTi" */ ?>
<?php /*%%SmartyHeaderCode:5298457755640768949e5e2-31895497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fc8afe87ca77cc99589d728ebd54e361d399450' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyfObTi',
      1 => 1447065225,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5298457755640768949e5e2-31895497',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
?>

<?php echo smarty_function_xr_wz_fetch(array('id'=>839,'wz_online'=>'Y','var'=>'data'),$_smarty_tpl);?>


<div class="worumgehts default-container-padding">
    <h1>Impressum</h1>
    <!-- <span class="looklikeh1">
            Impressum
    </span> -->
    <br>
    <br>
    <div class="impressum-container">
        <div class="worumgehts">
            
            <div class="faq-question">WhoShowersFirst e.U.</div> 
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <div class="faq-text" style="padding-left:10px;text-transform: capitalize;">
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
</p>
                
            </div>
            <?php }} ?>
             
            <div class="faq-question">Sitz:</div> 
                
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <div class="faq-text" style="padding-left:10px;text-transform: capitalize;">
                    <p><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_SITZ'];?>
</p>
                
                </div>
                <?php }} ?>
                
            </div>
           
        
        </div>
     </div>    
 
</div>
