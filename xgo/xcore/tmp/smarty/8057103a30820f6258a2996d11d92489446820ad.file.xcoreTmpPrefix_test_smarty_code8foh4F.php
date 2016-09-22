<?php /* Smarty version Smarty-3.0.7, created on 2015-11-02 17:00:14
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8foh4F" */ ?>
<?php /*%%SmartyHeaderCode:16016493085637888ea3fcf9-49684464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8057103a30820f6258a2996d11d92489446820ad' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8foh4F',
      1 => 1446480014,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16016493085637888ea3fcf9-49684464',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group geschlecht-container">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Mitbewohner?"),$_smarty_tpl);?>
</label>
    <label for="mitbew-female" class="radio special-label">
        <input id="mitbew-female" type="radio" name="MITBEWOHNER" value="F" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_MITBEWOHNER']=='F'){?>checked="checked"<?php }?>/>
        <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
    </label>
    <label for="mitbew-male" class="radio special-label">
        <input id="mitbew-male" type="radio" name="MITBEWOHNER" value="M" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_MITBEWOHNER']=='M'){?>checked="checked"<?php }?> "/>
        <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
        <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
    </label>
    
    <label for="mitbew-egal" class="radio special-label">
        <input id="mitbew-egal" type="radio" name="MITBEWOHNER" value="X" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_MITBEWOHNER']=='X'){?>checked="checked"<?php }?>/>
        <span class="checked circle "><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
        <span class="unchecked circle "><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
    </label>
    
</div>