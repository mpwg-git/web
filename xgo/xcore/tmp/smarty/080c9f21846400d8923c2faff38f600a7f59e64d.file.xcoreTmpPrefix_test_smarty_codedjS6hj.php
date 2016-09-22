<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 14:26:54
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedjS6hj" */ ?>
<?php /*%%SmartyHeaderCode:137607685556794f9ee34078-26181918%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '080c9f21846400d8923c2faff38f600a7f59e64d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedjS6hj',
      1 => 1450790814,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137607685556794f9ee34078-26181918',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars['datatype'] = new Smarty_variable('other', null, null);?>
<?php if ($_smarty_tpl->getVariable('fromRoom')->value==1){?>
    <?php $_smarty_tpl->tpl_vars['datatype'] = new Smarty_variable('other-room', null, null);?>
<?php }?>

<div class="upload-image add-image add-image-other" data-type="other-room">
    <span class="bild-hinzufuegen"><span class="icon-rel icon-plus-rel"></span></span>
    <label class="img-upload-label">
        <input type="file" class="fileupload add-image-file" name="add-image-file" data-filename-placement="inside" title="Datei wählen">
        <span class="upload-progress-bar"></span>
    </label>
</div>
