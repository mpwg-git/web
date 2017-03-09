<?php /* Smarty version Smarty-3.0.7, created on 2017-02-10 12:47:58
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/869.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1881579560589da86e094e00-76980713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a192cbe26031e9fcee4c1454d81021e691ff0f4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/869.cache.html',
      1 => 1486558322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1881579560589da86e094e00-76980713',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Barrierefrei?"),$_smarty_tpl);?>
</label>
    <label for="barrierefrei-ja" class="radio special-label">
        <input id="barrierefrei-ja" type="radio" name="BARRIEREFREI" value="Y" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_BARRIEREFREI']=='Y'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
    </label>
    <label for="barrierefrei-nein" class="radio special-label">
        <input id="barrierefrei-nein" type="radio" name="BARRIEREFREI" value="N" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_BARRIEREFREI']=='N'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
    </label>
    <?php if (!isset($_smarty_tpl->getVariable('noEgal',null,true,false)->value)){?>
    <label for="barrierefrei-egal" class="radio special-label">
        <input id="barrierefrei-egal" type="radio" name="BARRIEREFREI" value="X" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_BARRIEREFREI']=='X'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
    </label>
    <?php }?>
</div>