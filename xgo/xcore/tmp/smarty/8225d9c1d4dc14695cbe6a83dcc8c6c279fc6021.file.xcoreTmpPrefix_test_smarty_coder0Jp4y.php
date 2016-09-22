<?php /* Smarty version Smarty-3.0.7, created on 2016-01-15 22:23:00
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coder0Jp4y" */ ?>
<?php /*%%SmartyHeaderCode:167859262156996334ea3163-89087947%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8225d9c1d4dc14695cbe6a83dcc8c6c279fc6021' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coder0Jp4y',
      1 => 1452892980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167859262156996334ea3163-89087947',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php $_smarty_tpl->tpl_vars['datatype'] = new Smarty_variable('other', null, null);?>
<?php if ($_smarty_tpl->getVariable('fromRoom')->value==1){?>
    <?php $_smarty_tpl->tpl_vars['datatype'] = new Smarty_variable('other-room', null, null);?>
<?php }?>

<div class="upload-image add-image add-image-other" data-type="<?php echo $_smarty_tpl->getVariable('datatype')->value;?>
" data-refid="<?php echo $_smarty_tpl->getVariable('refid')->value;?>
">
    <span class="bild-hinzufuegen"><span class="icon-rel icon-plus-rel"></span></span>
    <label class="img-upload-label">
        <input type="file" class="fileupload add-image-file" name="add-image-file" data-filename-placement="inside" title="<?php echo smarty_function_xr_translate(array('tag'=>'Datei wählen'),$_smarty_tpl);?>
">
        <span class="upload-progress-bar"></span>
    </label>
</div>
