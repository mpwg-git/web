<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 13:12:14
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codev1rlw9" */ ?>
<?php /*%%SmartyHeaderCode:177832593355b7638e4666e3-13202386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94b39e5d50a6c98a7aefa44842b87cadc09130d1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codev1rlw9',
      1 => 1438081934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177832593355b7638e4666e3-13202386',
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
        <select class="form-control  input-fullwidth" multiple="multiple">
			<option value='Deutsch'>Deutsch</option>
            <option value='English'>English</option>
		</select>
    </div>
</div>