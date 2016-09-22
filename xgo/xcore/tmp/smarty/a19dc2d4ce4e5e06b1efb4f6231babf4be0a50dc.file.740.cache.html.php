<?php /* Smarty version Smarty-3.0.7, created on 2015-10-07 18:09:33
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/740.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1533918998561543bd3f6564-31625490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a19dc2d4ce4e5e06b1efb4f6231babf4be0a50dc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/740.cache.html',
      1 => 1444129452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1533918998561543bd3f6564-31625490',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
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
    <label for="raucheregal" class="radio special-label">
        <input id="raucheregal" type="radio" name="RAUCHER" value="X" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_RAUCHER']=='X'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
    </label>
</div>