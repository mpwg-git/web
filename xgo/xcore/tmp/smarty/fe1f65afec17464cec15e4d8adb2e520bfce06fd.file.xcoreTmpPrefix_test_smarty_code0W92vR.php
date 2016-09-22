<?php /* Smarty version Smarty-3.0.7, created on 2015-08-26 17:12:29
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0W92vR" */ ?>
<?php /*%%SmartyHeaderCode:107809865355ddd75d060ca7-02820295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe1f65afec17464cec15e4d8adb2e520bfce06fd' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0W92vR',
      1 => 1440601949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107809865355ddd75d060ca7-02820295',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?> <div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Ablöse?"),$_smarty_tpl);?>
</label>
    <label for="abloeseja" class="radio special-label">
        <input id="abloeseja" type="radio" name="ABLOESE" value="Y" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_ABLOESE']=='Y'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
    </label>
    <label for="abloesenein" class="radio special-label">
        <input id="abloesenein" type="radio" name="ABLOESE" value="N" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_ABLOESE']=='N'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
    </label>
    <label for="abloeseegal" class="radio special-label">
        <input id="abloeseegal" type="radio" name="ABLOESE" value="X" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_ABLOESE']=='X'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
    </label>
</div>