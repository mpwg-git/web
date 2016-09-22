<?php /* Smarty version Smarty-3.0.7, created on 2015-11-24 14:05:38
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code40Vh1F" */ ?>
<?php /*%%SmartyHeaderCode:1568135478565460a28d39e4-24888746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a102d0fb2a3a556988e07daa0c4487b2e9d41d63' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code40Vh1F',
      1 => 1448370338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1568135478565460a28d39e4-24888746',
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
