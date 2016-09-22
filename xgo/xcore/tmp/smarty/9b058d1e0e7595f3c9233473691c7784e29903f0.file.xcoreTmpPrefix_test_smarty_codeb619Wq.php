<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 03:55:03
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeb619Wq" */ ?>
<?php /*%%SmartyHeaderCode:1933871951561c6477f1d1f0-29008706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b058d1e0e7595f3c9233473691c7784e29903f0' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeb619Wq',
      1 => 1444701303,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1933871951561c6477f1d1f0-29008706',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?> <div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Haustiere?"),$_smarty_tpl);?>
</label>
    <label for="haustiereja" class="radio special-label">
        <input id="haustiereja" type="radio" name="HAUSTIERE" value="Y" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_HAUSTIERE']=='Y'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
    </label>
    <label for="haustierenein" class="radio special-label">
        <input id="haustierenein" type="radio" name="HAUSTIERE" value="N" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_HAUSTIERE']=='N'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
    </label>
</div>