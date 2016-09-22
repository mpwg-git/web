<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 14:40:14
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code60YcRN" */ ?>
<?php /*%%SmartyHeaderCode:31385957255cb3eae0a97e3-79790132%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8fb2e5efa766fe5005d05f8ece4d1a96045eeea' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code60YcRN',
      1 => 1439383214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31385957255cb3eae0a97e3-79790132',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getLanguages",'var'=>"langs"),$_smarty_tpl);?>


<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('langs')->value),$_smarty_tpl);?>


<div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Sprachen?"),$_smarty_tpl);?>
</label>
     <div class="v-center multiple-select-container">
        <select class="form-control multiple-select" name="SPRACHEN[]" multiple="multiple">
			
			<option value='Deutsch' name="SPRACHEN_DE">Deutsch</option>
            <option value='English' name="SPRACHEN_DE">English</option>
            <option value='Francais' name="SPRACHEN_DE">Francais</option>
            <option value='Espanol'  name="SPRACHEN_DE">Espanol</option>
            
		</select>
    </div>
</div>