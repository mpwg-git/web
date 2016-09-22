<?php /* Smarty version Smarty-3.0.7, created on 2015-08-03 19:04:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQ0fQJw" */ ?>
<?php /*%%SmartyHeaderCode:20514100355bf9f23b28cc3-57875911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a56ddfa00bb8007a6fc61ce4b3430331a08263fa' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQ0fQJw',
      1 => 1438621475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20514100355bf9f23b28cc3-57875911',
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