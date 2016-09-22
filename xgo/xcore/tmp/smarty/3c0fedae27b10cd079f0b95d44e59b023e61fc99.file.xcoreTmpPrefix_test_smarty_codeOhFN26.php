<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 21:45:46
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOhFN26" */ ?>
<?php /*%%SmartyHeaderCode:67647043955db746a069b43-71539892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c0fedae27b10cd079f0b95d44e59b023e61fc99' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOhFN26',
      1 => 1440445546,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67647043955db746a069b43-71539892',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value["PROFILE"]),$_smarty_tpl);?>


<div class="form-group geschlecht-container mitbewohner-container">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Aktuelle Mitbewohner?"),$_smarty_tpl);?>
</label>
    <span class="person">
    </span>
    <p class="icon-plus-container">
        <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <span class="icon-rel icon-plus-rel"></span>
        <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
    </p>
    
    
</div>