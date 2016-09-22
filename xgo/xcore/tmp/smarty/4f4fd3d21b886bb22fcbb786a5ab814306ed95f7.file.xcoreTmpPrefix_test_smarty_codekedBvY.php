<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 13:40:16
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekedBvY" */ ?>
<?php /*%%SmartyHeaderCode:13937499635694f430d0d5b0-54224837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f4fd3d21b886bb22fcbb786a5ab814306ed95f7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekedBvY',
      1 => 1452602416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13937499635694f430d0d5b0-54224837',
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