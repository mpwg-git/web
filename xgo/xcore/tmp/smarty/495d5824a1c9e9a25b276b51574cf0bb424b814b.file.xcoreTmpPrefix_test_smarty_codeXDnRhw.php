<?php /* Smarty version Smarty-3.0.7, created on 2015-11-24 14:08:08
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXDnRhw" */ ?>
<?php /*%%SmartyHeaderCode:2518723245654613867cbb7-01338771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '495d5824a1c9e9a25b276b51574cf0bb424b814b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXDnRhw',
      1 => 1448370488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2518723245654613867cbb7-01338771',
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
    <label class="img-upload-label" >
        <input type="file" class="fileupload" name="add-image-file" data-filename-placement="inside" title="Datei wählen">
        <span class="upload-progress-bar" ></span>
    </label>
</div>
