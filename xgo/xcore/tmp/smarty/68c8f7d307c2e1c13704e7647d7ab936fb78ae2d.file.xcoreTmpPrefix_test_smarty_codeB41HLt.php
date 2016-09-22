<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 14:27:02
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeB41HLt" */ ?>
<?php /*%%SmartyHeaderCode:116539058056794fa6da7eb1-11668566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68c8f7d307c2e1c13704e7647d7ab936fb78ae2d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeB41HLt',
      1 => 1450790822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116539058056794fa6da7eb1-11668566',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars['datatype'] = new Smarty_variable('other', null, null);?>
<?php if ($_smarty_tpl->getVariable('fromRoom')->value==1){?>
    <?php $_smarty_tpl->tpl_vars['datatype'] = new Smarty_variable('other-room', null, null);?>
<?php }?>

<div class="upload-image add-image add-image-other" data-type="other-room" data-refid="<?php echo $_smarty_tpl->getVariable('refid')->value;?>
">
    <span class="bild-hinzufuegen"><span class="icon-rel icon-plus-rel"></span></span>
    <label class="img-upload-label">
        <input type="file" class="fileupload add-image-file" name="add-image-file" data-filename-placement="inside" title="Datei wählen">
        <span class="upload-progress-bar"></span>
    </label>
</div>
