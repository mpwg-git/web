<?php /* Smarty version Smarty-3.0.7, created on 2015-08-19 13:52:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecRfBM2" */ ?>
<?php /*%%SmartyHeaderCode:185405220955d46e0a0c1ac4-32370715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a6f1dc55ae4919f454e9faf32d3a6d921debe93' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecRfBM2',
      1 => 1439985162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185405220955d46e0a0c1ac4-32370715',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Zeitraum?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center hasDatePicker">
        <input class="form-control datepicker" name="ZEITRAUM_VON" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ZEITRAUM_VON'];?>
" id="zeitraum_von" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'ab'),$_smarty_tpl);?>
?" rel="required" />
        <span class="add-on"><i class="icon-calendar"></i></span>
    </div><!--
    --><div class="devider v-center">-</div><!--
    --><div class="column-input v-center hasDatePicker">
        <input class="form-control datepicker" name="ZEITRAUM_BIS" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ZEITRAUM_BIS'];?>
" id="zeitraum_bis" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
?" rel="required" />
         <span class="add-on"><i class="icon-calendar"></i></span>
    </div>
</div>