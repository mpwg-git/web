<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 13:44:25
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewPnYz3" */ ?>
<?php /*%%SmartyHeaderCode:18032554165694f529590195-96937636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bfcfa7267c16123b6b530b00f1fedaa31e1d8112' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewPnYz3',
      1 => 1452602665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18032554165694f529590195-96937636',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?> <div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Barrierefrei?"),$_smarty_tpl);?>
</label>
    <label for="barrierefrei-ja" class="radio special-label">
        <input id="barrierefrei-ja" type="radio" name="BARRIEREFREI" value="Y" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_BARRIEREFREI']=='Y'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
    </label>
    <label for="barrierefrei-nein" class="radio special-label">
        <input id="barrierefrei-nein" type="radio" name="BARRIEREFREI" value="N" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_BARRIEREFREI']=='N'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
    </label>
</div>