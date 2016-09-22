<?php /* Smarty version Smarty-3.0.7, created on 2015-08-07 09:47:57
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZRdFvf" */ ?>
<?php /*%%SmartyHeaderCode:141368854855c462ad82d843-23479166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3ccef3cdfbd91d1cffae476f230f205ca81f9e3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZRdFvf',
      1 => 1438933677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141368854855c462ad82d843-23479166',
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
			<option value='Deutsch' label="Deutsch">Deutsch</option>
            <option value='English' label="English">English</option>
            <option value='Francais' label="Francais">Francais</option>
		</select>
    </div>
</div>