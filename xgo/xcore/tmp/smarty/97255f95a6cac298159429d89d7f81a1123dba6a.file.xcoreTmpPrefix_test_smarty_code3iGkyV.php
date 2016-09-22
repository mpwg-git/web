<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 14:33:28
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3iGkyV" */ ?>
<?php /*%%SmartyHeaderCode:166310339955cb3d18b09fb7-73526129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97255f95a6cac298159429d89d7f81a1123dba6a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3iGkyV',
      1 => 1439382808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166310339955cb3d18b09fb7-73526129',
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
        <select class="form-control multiple-select" name="SPRACHEN" multiple="multiple">
			<option value='Deutsch'>Deutsch</option>
            <option value='English'>English</option>
            <option value='Francais'>Francais</option>
            <option value='Espanol'>Espanol</option>
		</select>
    </div>
</div>