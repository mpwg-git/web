<?php /* Smarty version Smarty-3.0.7, created on 2015-08-10 13:27:22
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8TlD7x" */ ?>
<?php /*%%SmartyHeaderCode:205296184055c88a9a50bb07-49645490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd7aeb80815beb17d878bd06454c879296382ab9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8TlD7x',
      1 => 1439206042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205296184055c88a9a50bb07-49645490',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Zeitraum?"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center hasDatePicker">
        <input class="form-control datepicker" name="ZEITRAUM_VON" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ZEITRAUM_VON'];?>
" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'ab'),$_smarty_tpl);?>
?" />
        <span class="add-on"><i class="icon-calendar"></i></span>
    </div><!--
    --><div class="devider v-center">-</div><!--
    --><div class="column-input v-center hasDatePicker">
        <input class="form-control datepicker" name="ZEITRAUM_BIS" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ZEITRAUM_BIS'];?>
" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
?"/>
         <span class="add-on"><i class="icon-calendar"></i></span>
    </div>
</div>