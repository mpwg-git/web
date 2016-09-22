<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 14:35:13
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNAgrDT" */ ?>
<?php /*%%SmartyHeaderCode:29849599955cb3d81bd7b42-03450568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a050255c05aa7e82d29d257a5d86a873b83030d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNAgrDT',
      1 => 1439382913,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29849599955cb3d81bd7b42-03450568',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Sprachen?"),$_smarty_tpl);?>
</label>
     <div class="v-center multiple-select-container">
        <select class="form-control multiple-select" multiple="multiple">
			
			
			<option value='Deutsch' name="SPRACHEN_DE">Deutsch</option>
            <option value='English' name="SPRACHEN_DE">English</option>
            <option value='Francais' name="SPRACHEN_DE">Francais</option>
            <option value='Espanol'  name="SPRACHEN_DE">Espanol</option>
            
            
		</select>
    </div>
</div>