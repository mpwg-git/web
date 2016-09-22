<?php /* Smarty version Smarty-3.0.7, created on 2016-04-07 12:13:05
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBkaIh6" */ ?>
<?php /*%%SmartyHeaderCode:376878610570632b1146a30-19487560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38ff2ea068165f9c2707a96b066166410c8baafc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBkaIh6',
      1 => 1460023985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '376878610570632b1146a30-19487560',
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
            
            <div class="faq-question">
                <p><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
. <?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</p>
            </div> 
            <div class="faq-text" style="padding-left:10px;">
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
</p>
            </div>
            
            <?php }} ?>
           
        
        </div>
     </div>    
     
</div>