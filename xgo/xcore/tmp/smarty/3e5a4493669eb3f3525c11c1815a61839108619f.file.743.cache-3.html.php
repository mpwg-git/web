<?php /* Smarty version Smarty-3.0.7, created on 2016-01-15 22:30:56
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/743.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:172659612456996510e43a95-31011416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e5a4493669eb3f3525c11c1815a61839108619f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/743.cache-3.html',
      1 => 1452892988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172659612456996510e43a95-31011416',
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
    <label class="img-upload-label" >
        <input type="file" class="fileupload" name="add-image-file" data-filename-placement="inside" title="<?php echo smarty_function_xr_translate(array('tag'=>'Datei wählen'),$_smarty_tpl);?>
">
        <span class="upload-progress-bar" ></span>
    </label>
</div>
