<?php /* Smarty version Smarty-3.0.7, created on 2016-04-07 12:12:03
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZKIVVP" */ ?>
<?php /*%%SmartyHeaderCode:97317742557063273c6f396-04857864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1594d24095d3636d56bdc0f11e61a83d096506ec' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZKIVVP',
      1 => 1460023923,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97317742557063273c6f396-04857864',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
?>

 <div class="worumgehts default-container-padding">
  
    <span class="looklikeh1">
            <?php echo smarty_function_xr_translate(array('tag'=>"AGB"),$_smarty_tpl);?>

    </span>
    <br>
    <br>
    <div class="impressum-container">
        <div class="worumgehts">
            
                 
            <?php echo smarty_function_xr_wz_fetch(array('id'=>840,'wz_online'=>'Y','var'=>'data'),$_smarty_tpl);?>

            
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            
            <div class="faq-question"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
. <?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</div> 
            <div class="faq-text" style="padding-left:10px;">
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
</p>
            </div>
            
            <?php }} ?>
           
        
        </div>
     </div>    
     
</div>