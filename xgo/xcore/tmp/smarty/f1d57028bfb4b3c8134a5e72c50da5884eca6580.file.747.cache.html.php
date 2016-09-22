<?php /* Smarty version Smarty-3.0.7, created on 2016-05-29 15:29:08
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/747.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1213451929574aeea452a468-90055215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1d57028bfb4b3c8134a5e72c50da5884eca6580' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/747.cache.html',
      1 => 1453116374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1213451929574aeea452a468-90055215',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><form class="add-image-final-form" data-type="<?php echo $_smarty_tpl->getVariable('type')->value;?>
 method="post">
    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('image')->value['new_s_id'],'var'=>'croppedImg'),$_smarty_tpl);?>

    
    <img class="img-height-responsive2" src="<?php echo $_smarty_tpl->getVariable('croppedImg')->value['src'];?>
" alt="" border="0">
    
    <input type="hidden" name="s_id" value="<?php echo $_smarty_tpl->getVariable('image')->value['new_s_id'];?>
" />
     <input type="hidden" name="type" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
" />
     <input type="hidden" name="refid" value="<?php echo $_smarty_tpl->getVariable('refid')->value;?>
" />
    
</form>
<button type="button" class="btn btn-primary modal-image-button close-image-cropper pull-left"><?php echo smarty_function_xr_translate(array('tag'=>'Abbrechen'),$_smarty_tpl);?>
</button>
<button type="button" class="add-image-final-submit modal-image-button btn btn-primary">Speichern</button>
<div class="clearfix"></div>