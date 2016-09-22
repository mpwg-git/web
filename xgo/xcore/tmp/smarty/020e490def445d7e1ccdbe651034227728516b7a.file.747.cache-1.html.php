<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 19:14:56
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/747.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:548329347567993202f21c1-06729998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '020e490def445d7e1ccdbe651034227728516b7a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/747.cache-1.html',
      1 => 1450794303,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '548329347567993202f21c1-06729998',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><form class="add-image-final-form" data-type="<?php echo $_smarty_tpl->getVariable('type')->value;?>
 method="post">
    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('image')->value['new_s_id'],'var'=>'croppedImg'),$_smarty_tpl);?>

    
    <img class="img-height-responsive" src="<?php echo $_smarty_tpl->getVariable('croppedImg')->value['src'];?>
" alt="" border="0">
    
    <input type="hidden" name="s_id" value="<?php echo $_smarty_tpl->getVariable('image')->value['new_s_id'];?>
" />
     <input type="hidden" name="type" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
" />
     <input type="hidden" name="refid" value="<?php echo $_smarty_tpl->getVariable('refid')->value;?>
" />
    
</form>
<button type="button" class="btn btn-primary modal-image-button close-image-cropper pull-left">Abbrechen</button>
<button type="button" class="add-image-final-submit modal-image-button btn btn-primary">Speichern</button>
<div class="clearfix"></div>