<?php /* Smarty version Smarty-3.0.7, created on 2015-08-03 19:04:25
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code26rmlo" */ ?>
<?php /*%%SmartyHeaderCode:86881172455bf9f19c6ab36-27978438%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a67826e4ddf19084aac3821ffb761d8104726dae' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code26rmlo',
      1 => 1438621465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86881172455bf9f19c6ab36-27978438',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Sprachen?"),$_smarty_tpl);?>
</label>
     <div class="v-center">
        <select class="form-control multiple-select" multiple="multiple">
			<option value='Deutsch'>Deutsch</option>
            <option value='English'>English</option>
		</select>
    </div>
</div>