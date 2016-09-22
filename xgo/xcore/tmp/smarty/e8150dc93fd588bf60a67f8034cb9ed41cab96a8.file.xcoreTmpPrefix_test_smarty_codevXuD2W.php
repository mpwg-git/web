<?php /* Smarty version Smarty-3.0.7, created on 2015-10-09 11:25:17
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevXuD2W" */ ?>
<?php /*%%SmartyHeaderCode:327165030561787fd2d0da1-63507826%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8150dc93fd588bf60a67f8034cb9ed41cab96a8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevXuD2W',
      1 => 1444382717,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '327165030561787fd2d0da1-63507826',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group ">
    <label><?php if (isset($_smarty_tpl->getVariable('label',null,true,false)->value)){?><?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->getVariable('label')->value),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_translate(array('tag'=>"Mitbewohner?NEU"),$_smarty_tpl);?>
<?php }?></label>
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
    
     <label for="mitbew-male" class="radio special-label">
        <input id="mitbew-male" type="radio" name="MITBEWOHNER" value="M" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_MITBEWOHNER']=='M'){?>checked="checked"<?php }?> "/>
        <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
        <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
    </label>
    
    <label for="mitbew-egal" class="radio special-label" >
        <input id="mitbew-egal" type="radio" name="MITBEWOHNER" value="X" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_MITBEWOHNER']=='X'){?>checked="checked"<?php }?>/>
        <span class="checked icon-mann circle circle-filled "><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
        <span class="unchecked icon-mann_outline circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
    </label>

</div>