<?php /* Smarty version Smarty-3.0.7, created on 2015-11-04 12:08:55
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeF92xTj" */ ?>
<?php /*%%SmartyHeaderCode:3993375965639e7472049f8-13407501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '457a439449687e0ce208246ac55a48dcd4b9da80' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeF92xTj',
      1 => 1446635335,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3993375965639e7472049f8-13407501',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?> <div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Vegetarier / Veganer?"),$_smarty_tpl);?>
</label>
    <label for="veggieja" class="radio special-label">
        <input id="veggieja" type="radio" name="VEGGIE" value="Y" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_VEGGIE']=='Y'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
    </label>
    <label for="veggienein" class="radio special-label">
        <input id="veggienein" type="radio" name="VEGGIE" value="N" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_VEGGIE']=='N'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
    </label>
    
    <label for="veggie-egal" class="radio special-label" style="vertical-align:top">
        <input id="veggie-egal" type="radio" name="VEGGIE" value="X" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_VEGGIE']=='X'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
    </label>
    
</div>