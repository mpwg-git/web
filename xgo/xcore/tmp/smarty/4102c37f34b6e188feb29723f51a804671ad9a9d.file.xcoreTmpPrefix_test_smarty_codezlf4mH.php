<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 18:35:22
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezlf4mH" */ ?>
<?php /*%%SmartyHeaderCode:5523642755695395a54d146-12472722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4102c37f34b6e188feb29723f51a804671ad9a9d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezlf4mH',
      1 => 1452620122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5523642755695395a54d146-12472722',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Raucher?"),$_smarty_tpl);?>
</label>
    <label for="raucherja" class="radio special-label">
        <input id="raucherja" type="radio" name="RAUCHER" value="Y" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_RAUCHER']=='Y'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
    </label>
    <label for="rauchernein" class="radio special-label">
        <input id="rauchernein" type="radio" name="RAUCHER" value="N" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_RAUCHER']=='N'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
    </label>
    <?php if (!isset($_smarty_tpl->getVariable('noEgal',null,true,false)->value)){?>
    <label for="raucheregal" class="radio special-label">
        <input id="raucheregal" type="radio" name="RAUCHER" value="X" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_RAUCHER']=='X'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
    </label>
    <?php }?>
</div>