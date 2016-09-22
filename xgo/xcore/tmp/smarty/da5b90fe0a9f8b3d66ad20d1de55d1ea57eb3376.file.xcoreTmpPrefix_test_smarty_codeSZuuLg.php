<?php /* Smarty version Smarty-3.0.7, created on 2015-11-24 14:13:34
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeSZuuLg" */ ?>
<?php /*%%SmartyHeaderCode:1640136195654627e242885-46796354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da5b90fe0a9f8b3d66ad20d1de55d1ea57eb3376' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeSZuuLg',
      1 => 1448370814,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1640136195654627e242885-46796354',
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

<button type="button" class="add-image-final-submit modal-image-button btn btn-primary">Speichern</button>
<div class="clearfix"></div>