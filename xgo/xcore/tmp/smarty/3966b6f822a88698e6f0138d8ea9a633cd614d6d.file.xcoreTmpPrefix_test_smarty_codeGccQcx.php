<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 13:12:17
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGccQcx" */ ?>
<?php /*%%SmartyHeaderCode:211682253555b7639147df33-80914306%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3966b6f822a88698e6f0138d8ea9a633cd614d6d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGccQcx',
      1 => 1438081937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211682253555b7639147df33-80914306',
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
        <select class="form-control input-fullwidth" multiple="multiple">
			<option value='Deutsch'>Deutsch</option>
            <option value='English'>English</option>
		</select>
    </div>
</div>