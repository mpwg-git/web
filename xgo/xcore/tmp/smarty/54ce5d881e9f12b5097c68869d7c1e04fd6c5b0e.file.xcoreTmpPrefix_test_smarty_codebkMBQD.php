<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 20:05:08
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebkMBQD" */ ?>
<?php /*%%SmartyHeaderCode:43181992955db5cd482f717-14792164%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54ce5d881e9f12b5097c68869d7c1e04fd6c5b0e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebkMBQD',
      1 => 1440439508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43181992955db5cd482f717-14792164',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group geschlecht-container mitbewohner-container">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Aktuelle Mitbewohner?"),$_smarty_tpl);?>
</label>
    <label for="mitbew-female" class="radio special-label">
        <input id="mitbew-female" type="radio" name="mitbewohner"/>
        <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
    </label>
    <div class="radio">
        <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
    </div>
    <label for="mitbew-male" class="radio special-label">
        
    </label>
    <label for="mitbew-male2" class="radio special-label">
        <input id="mitbew-male2" type="radio" name="mitbewohner" />
        <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
        <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
    </label>
    
    <p class="icon-plus-container">
        <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <span class="icon-rel icon-plus-rel"></span>
        <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
    </p>
    
    
</div>