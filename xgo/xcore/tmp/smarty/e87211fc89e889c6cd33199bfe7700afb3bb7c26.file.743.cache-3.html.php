<?php /* Smarty version Smarty-3.0.7, created on 2017-02-10 17:58:14
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/743.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:1540350992589df126047d29-09124716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e87211fc89e889c6cd33199bfe7700afb3bb7c26' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/743.cache-3.html',
      1 => 1486558322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1540350992589df126047d29-09124716',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php $_smarty_tpl->tpl_vars['datatype'] = new Smarty_variable('other', null, null);?>
<?php if ($_smarty_tpl->getVariable('fromRoom')->value==1){?>
    <?php $_smarty_tpl->tpl_vars['datatype'] = new Smarty_variable('other-room', null, null);?>
<?php }?>

<div class="upload-image add-image add-image-other" data-type="<?php echo $_smarty_tpl->getVariable('datatype')->value;?>
" data-refid="<?php echo $_smarty_tpl->getVariable('refid')->value;?>
">
    <label class="img-upload-label" >
        <input type="file" id="file" class="fileupload add-image-file" name="add-image-file" data-filename-placement="inside" title="<?php echo smarty_function_xr_translate(array('tag'=>'Datei wählen'),$_smarty_tpl);?>
">
        <span class="upload-progress-bar" ></span>
    </label>
</div>
