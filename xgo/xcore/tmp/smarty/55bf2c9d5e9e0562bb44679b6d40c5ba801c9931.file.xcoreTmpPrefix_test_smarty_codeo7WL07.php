<?php /* Smarty version Smarty-3.0.7, created on 2015-08-04 12:02:23
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeo7WL07" */ ?>
<?php /*%%SmartyHeaderCode:163742965855c08daf8c18b3-26219922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55bf2c9d5e9e0562bb44679b6d40c5ba801c9931' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeo7WL07',
      1 => 1438682543,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163742965855c08daf8c18b3-26219922',
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
            <option value='Portuges'>Portuges</option>
		</select>
    </div>
</div>