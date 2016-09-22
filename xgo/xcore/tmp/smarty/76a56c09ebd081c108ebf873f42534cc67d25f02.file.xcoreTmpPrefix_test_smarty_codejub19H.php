<?php /* Smarty version Smarty-3.0.7, created on 2015-11-09 12:14:03
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejub19H" */ ?>
<?php /*%%SmartyHeaderCode:64578362956407ffb8d41d9-02459213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76a56c09ebd081c108ebf873f42534cc67d25f02' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejub19H',
      1 => 1447067643,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64578362956407ffb8d41d9-02459213',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
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

            
            <div class="faq-question">1. <?php echo $_smarty_tpl->getVariable('v')->value['HEADLINE'];?>
</div> 
            <div class="faq-text" style="padding-left:10px;text-transform: capitalize;">
                <p><?php echo $_smarty_tpl->getVariable('v')->value['wz_TEXT'];?>
</p>
            </div>
            
          
           
        
        </div>
     </div>    
     
</div>