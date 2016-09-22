<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 18:33:04
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeget2Xw" */ ?>
<?php /*%%SmartyHeaderCode:1909713825569538d0ab7f21-96136329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7adc798070e50a0f744e9079ed8b6d6c6a64891c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeget2Xw',
      1 => 1452619984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1909713825569538d0ab7f21-96136329',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
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
    <?php if (!isset($_smarty_tpl->getVariable('noEgal',null,true,false)->value)){?>
    <label for="haustiere-egal" class="radio special-label" style="vertical-align:bottom;">
        <input id="haustiere-egal" type="radio" name="HAUSTIERE" value="X" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_HAUSTIERE']=='X'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
    </label>
    <?php }?>
    
    
</div>