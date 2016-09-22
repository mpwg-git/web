<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 23:01:02
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/747.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:10328847335679c81e1a0af5-15480992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc56238511501085f8a4e1360fbb8cbae2b373c6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/747.cache.html',
      1 => 1450794303,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10328847335679c81e1a0af5-15480992',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
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
<button type="button" class="btn btn-primary modal-image-button close-image-cropper pull-left">Abbrechen</button>
<button type="button" class="add-image-final-submit modal-image-button btn btn-primary">Speichern</button>
<div class="clearfix"></div>