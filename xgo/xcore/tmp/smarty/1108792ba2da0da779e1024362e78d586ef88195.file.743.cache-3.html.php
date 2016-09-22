<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 23:11:07
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/743.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:4919829955679ca7bb154f0-12499420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1108792ba2da0da779e1024362e78d586ef88195' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/743.cache-3.html',
      1 => 1450822267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4919829955679ca7bb154f0-12499420',
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
