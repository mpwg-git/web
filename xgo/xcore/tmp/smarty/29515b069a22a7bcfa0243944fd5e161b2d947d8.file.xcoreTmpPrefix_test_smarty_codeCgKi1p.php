<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 13:09:34
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCgKi1p" */ ?>
<?php /*%%SmartyHeaderCode:56028400155b762ee3311a7-67040053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29515b069a22a7bcfa0243944fd5e161b2d947d8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCgKi1p',
      1 => 1438081774,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56028400155b762ee3311a7-67040053',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group geschlecht-container">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Aktuelle Mitbew.?"),$_smarty_tpl);?>
</label>
    <label for="mitbew-female" class="radio special-label">
        <input id="mitbew-female" type="radio" name="mitbewohner"/>
        <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
    </label>
    <label for="mitbew-male" class="radio special-label">
        <input id="mitbew-male" type="radio" name="mitbewohner" />
        <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
        <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
    </label>
      <label for="mitbew-male2" class="radio special-label">
        <input id="mitbew-male2" type="radio" name="mitbewohner" />
        <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
        <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
    </label>
</div>