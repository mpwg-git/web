<?php /* Smarty version Smarty-3.0.7, created on 2015-08-10 11:42:14
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecx3XUJ" */ ?>
<?php /*%%SmartyHeaderCode:79929761455c871f66a3315-44963527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '896703d33bed43abd7c732c1bb4f9e9c523eacef' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecx3XUJ',
      1 => 1439199734,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79929761455c871f66a3315-44963527',
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
        <input id="raucherja" type="radio" name="raucher" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_RAUCHER']=='Y'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
    </label>
    <label for="rauchernein" class="radio special-label">
        <input id="rauchernein" type="radio" name="raucher" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_RAUCHER']=='N'){?>checked="checked"<?php }?>/>
        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
    </label>
</div>