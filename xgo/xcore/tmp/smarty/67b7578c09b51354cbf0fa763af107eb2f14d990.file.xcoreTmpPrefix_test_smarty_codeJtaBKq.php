<?php /* Smarty version Smarty-3.0.7, created on 2015-12-16 11:53:21
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJtaBKq" */ ?>
<?php /*%%SmartyHeaderCode:728705586567142a1eabec5-48611791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67b7578c09b51354cbf0fa763af107eb2f14d990' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJtaBKq',
      1 => 1450263201,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '728705586567142a1eabec5-48611791',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><form class="add-image-final-form" data-type="<?php echo $_smarty_tpl->getVariable('type')->value;?>
 method="post">
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('image')->value['new_s_id'],'class'=>"img-height-responsive"),$_smarty_tpl);?>

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