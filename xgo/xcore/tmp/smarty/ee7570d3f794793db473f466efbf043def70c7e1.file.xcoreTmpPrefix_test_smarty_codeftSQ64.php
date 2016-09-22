<?php /* Smarty version Smarty-3.0.7, created on 2015-11-24 13:26:57
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeftSQ64" */ ?>
<?php /*%%SmartyHeaderCode:196589621756545791911b59-04258189%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee7570d3f794793db473f466efbf043def70c7e1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeftSQ64',
      1 => 1448368017,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196589621756545791911b59-04258189',
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
">
    <label class="img-upload-label" >
        <input type="file" class="fileupload" name="add-image-file" data-filename-placement="inside" title="Datei wählen">
        <span class="upload-progress-bar" ></span>
    </label>
</div>
