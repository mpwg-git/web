<?php /* Smarty version Smarty-3.0.7, created on 2015-08-04 18:58:33
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code44W26S" */ ?>
<?php /*%%SmartyHeaderCode:54853549055c0ef3902aa86-09774461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b072848becaf366e278b57b97a273039d765eb01' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code44W26S',
      1 => 1438707512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54853549055c0ef3902aa86-09774461',
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
		</select>
    </div>
</div>