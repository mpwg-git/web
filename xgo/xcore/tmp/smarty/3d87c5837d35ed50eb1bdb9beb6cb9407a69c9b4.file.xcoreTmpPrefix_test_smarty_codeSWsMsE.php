<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 14:33:23
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeSWsMsE" */ ?>
<?php /*%%SmartyHeaderCode:11792001555cb3d138a27d2-81492519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d87c5837d35ed50eb1bdb9beb6cb9407a69c9b4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeSWsMsE',
      1 => 1439382803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11792001555cb3d138a27d2-81492519',
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
			<option value='Deutsch'>Deutsch</option>
            <option value='English'>English</option>
            <option value='Francais'>Francais</option>
            <option value='Espanol'>Espanol</option>
		</select>
    </div>
</div>