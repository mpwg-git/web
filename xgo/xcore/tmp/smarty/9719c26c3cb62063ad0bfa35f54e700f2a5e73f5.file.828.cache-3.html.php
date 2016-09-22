<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 18:34:42
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/828.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:104461607256953932555532-96660824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9719c26c3cb62063ad0bfa35f54e700f2a5e73f5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/828.cache-3.html',
      1 => 1452620030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104461607256953932555532-96660824',
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