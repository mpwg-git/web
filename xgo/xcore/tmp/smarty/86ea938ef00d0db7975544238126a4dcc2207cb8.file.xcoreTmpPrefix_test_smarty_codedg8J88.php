<?php /* Smarty version Smarty-3.0.7, created on 2015-10-09 10:09:03
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedg8J88" */ ?>
<?php /*%%SmartyHeaderCode:11941562795617761fc9fe07-96867273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86ea938ef00d0db7975544238126a4dcc2207cb8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedg8J88',
      1 => 1444378143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11941562795617761fc9fe07-96867273',
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
        <span class="checked circle circle-filled">egal</span>
        <span class="unchecked circle circle-plain">egal</span>
    </label>
</div>