<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 15:24:21
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codera1866" */ ?>
<?php /*%%SmartyHeaderCode:105990163756795d1502fb95-85904756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '772d0541ae73d4d892a5c9514004fd1f1caa13b3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codera1866',
      1 => 1450794261,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105990163756795d1502fb95-85904756',
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