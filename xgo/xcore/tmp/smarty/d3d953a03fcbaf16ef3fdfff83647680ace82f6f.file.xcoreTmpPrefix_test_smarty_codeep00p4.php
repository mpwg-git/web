<?php /* Smarty version Smarty-3.0.7, created on 2015-08-13 01:59:40
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeep00p4" */ ?>
<?php /*%%SmartyHeaderCode:82415438655cbddece50bd1-29229693%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3d953a03fcbaf16ef3fdfff83647680ace82f6f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeep00p4',
      1 => 1439423980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82415438655cbddece50bd1-29229693',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><form class="add-image-final-form" data-type="<?php echo $_smarty_tpl->getVariable('type')->value;?>
 method="post">
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('image')->value['new_s_id'],'class'=>"img-responsive"),$_smarty_tpl);?>

    <input type="hidden" name="s_id" value="<?php echo $_smarty_tpl->getVariable('image')->value['new_s_id'];?>
" />
     <input type="hidden" name="type" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
" />
    <input type="submit" value="speichern" class="add-image-final-submit" />
    
</form>