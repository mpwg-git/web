<?php /* Smarty version Smarty-3.0.7, created on 2015-11-03 18:20:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenP8UDX" */ ?>
<?php /*%%SmartyHeaderCode:5107042085638ece32fbb76-94209216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07abdc487229a2817602cc8d06d0c90e0857ae71' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenP8UDX',
      1 => 1446571235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5107042085638ece32fbb76-94209216',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
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
            <div><b class="faq-question"><?php echo $_smarty_tpl->getVariable('data')->value['wz_FRAGE'];?>
</b></div> 
            <div class="faq-text"><?php echo $_smarty_tpl->getVariable('faq')->value['wz_ANTWORT'];?>
</div>
        </div>
     </div>
 
    
     
     
     
</div>