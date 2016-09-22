<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 17:21:48
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenpDado" */ ?>
<?php /*%%SmartyHeaderCode:85699317855ca130ca8fde5-36579241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f19cbc9bc62712c136800cd7339a7a721a587eb' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenpDado',
      1 => 1439306508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85699317855ca130ca8fde5-36579241',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><form class="add-image-final-form" method="post">
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('image')->value['new_s_id'],'class'=>"img-responsive"),$_smarty_tpl);?>

    <input type="hidden" name="s_id" value="<?php echo $_smarty_tpl->getVariable('image')->value['new_s_id'];?>
" />
    <input type="submit" value="speichern" class="add-image-final-submit" />
    
</form>