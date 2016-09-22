<?php /* Smarty version Smarty-3.0.7, created on 2015-10-08 11:54:34
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXsc2OZ" */ ?>
<?php /*%%SmartyHeaderCode:157137960356163d5a04e0f8-26314741%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd66169347a7277b731039b112bf5d68004ced58' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXsc2OZ',
      1 => 1444298073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157137960356163d5a04e0f8-26314741',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?> <div class="form-group geschlecht-container">
    <label><?php if (isset($_smarty_tpl->getVariable('label',null,true,false)->value)){?><?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->getVariable('label')->value),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_translate(array('tag'=>"Mitbewohner?"),$_smarty_tpl);?>
<?php }?></label>
    <label for="mitbew-female" class="radio special-label">
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