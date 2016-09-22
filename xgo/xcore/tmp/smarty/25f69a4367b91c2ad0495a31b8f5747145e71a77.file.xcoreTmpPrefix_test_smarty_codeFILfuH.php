<?php /* Smarty version Smarty-3.0.7, created on 2015-08-19 14:20:23
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFILfuH" */ ?>
<?php /*%%SmartyHeaderCode:48762829855d4748762ee57-97661740%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25f69a4367b91c2ad0495a31b8f5747145e71a77' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFILfuH',
      1 => 1439986823,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48762829855d4748762ee57-97661740',
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
" id="ZEITRAUM_VON" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'ab'),$_smarty_tpl);?>
?" rel="required" />
        <span class="add-on"><i class="icon-calendar"></i></span>
    </div><!--
    --><div class="devider v-center">-</div><!--
    --><div class="column-input v-center hasDatePicker">
        <input class="form-control datepicker" name="ZEITRAUM_BIS" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ZEITRAUM_BIS'];?>
" id="ZEITRAUM_VON" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
?" />
         <span class="add-on"><i class="icon-calendar"></i></span>
    </div>
    <div class="error-div" id="ZEITRAUM_VON_error">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Zeitraum angeben"),$_smarty_tpl);?>

    </div>
</div>