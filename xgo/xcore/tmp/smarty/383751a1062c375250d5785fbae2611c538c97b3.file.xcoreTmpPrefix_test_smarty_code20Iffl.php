<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 16:41:19
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code20Iffl" */ ?>
<?php /*%%SmartyHeaderCode:122306135955ca098fe32b56-74287891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '383751a1062c375250d5785fbae2611c538c97b3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code20Iffl',
      1 => 1439304079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122306135955ca098fe32b56-74287891',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><form class="add-image-final-form">
    <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('image')->value),$_smarty_tpl);?>

    <input type="hidden" name="s_id" value="<?php echo $_smarty_tpl->getVariable('image')->value['new_s_id'];?>
" />
    <input type="submit" value="speichern" class="add-image-final-submit" />
    
</form>