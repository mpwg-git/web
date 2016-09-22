<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 23:11:32
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/743.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:15553740245679ca941eb1a9-05870362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e59c5c68d60059b0f399a7a8883b8b9f0287479' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/743.cache.html',
      1 => 1450822267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15553740245679ca941eb1a9-05870362',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars['datatype'] = new Smarty_variable('other', null, null);?>
<?php if ($_smarty_tpl->getVariable('fromRoom')->value==1){?>
    <?php $_smarty_tpl->tpl_vars['datatype'] = new Smarty_variable('other-room', null, null);?>
<?php }?>

<div class="upload-image add-image add-image-other" data-type="<?php echo $_smarty_tpl->getVariable('datatype')->value;?>
" data-refid="<?php echo $_smarty_tpl->getVariable('refid')->value;?>
">
    <span class="bild-hinzufuegen"><span class="icon-rel icon-plus-rel"></span></span>
    <label class="img-upload-label">
        <input type="file" class="fileupload add-image-file" name="add-image-file" data-filename-placement="inside" title="Datei wählen">
        <span class="upload-progress-bar"></span>
    </label>
</div>
