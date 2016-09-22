<?php /* Smarty version Smarty-3.0.7, created on 2015-11-23 18:03:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCChOBx" */ ?>
<?php /*%%SmartyHeaderCode:1810216388565346ffaa8764-69757461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d34f319ab556ed9647123f92942a50514177cac' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCChOBx',
      1 => 1448298239,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1810216388565346ffaa8764-69757461',
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
            
            <div class="abg-question"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
. <?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</div> 
            <div class="abg-text" style="">
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
</p>
            </div>
            
            <?php }} ?>
           
        
        </div>
     </div>    
     
</div>