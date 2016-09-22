<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 13:01:26
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0uk4qE" */ ?>
<?php /*%%SmartyHeaderCode:145746153655b76106777501-12468094%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be80b5c080a8034b0cd6a913a906953d3e1ad64e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0uk4qE',
      1 => 1438081286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145746153655b76106777501-12468094',
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
        <select class="form-control" multiple="multiple">
			<option value='Deutsch'>Deutsch</option>
            <option value='English'>English</option>
		</select>
    </div>
</div>