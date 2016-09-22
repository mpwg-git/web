<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 18:36:29
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/829.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:10839061545695399d89a138-17958824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '352816d6e3068857befc4c29388e255a0b76c1c2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/829.cache.html',
      1 => 1452620080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10839061545695399d89a138-17958824',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
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
    
    <?php if (!isset($_smarty_tpl->getVariable('noEgal',null,true,false)->value)){?>
    <label for="veggie-egal" class="radio special-label" style="vertical-align:bottom;">
        <input id="veggie-egal" type="radio" name="VEGGIE" value="X" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_VEGGIE']=='X'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
    </label>
    <?php }?>
    
</div>