<?php /* Smarty version Smarty-3.0.7, created on 2015-11-04 11:59:22
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGkDbui" */ ?>
<?php /*%%SmartyHeaderCode:3096034165639e50a0ed8f5-11105558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '952a018f9be5bc57f6f107dc3f3adb91ddaa4298' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGkDbui',
      1 => 1446634762,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3096034165639e50a0ed8f5-11105558',
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
    <label for="haustiere-egal" class="radio special-label" style="vertical-align:top;margin-top:5px;">
        <input id="haustiere-egal" type="radio" name="HAUSTIERE" value="X" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_HAUSTIERE']=='X'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
    </label>
    
    
</div>