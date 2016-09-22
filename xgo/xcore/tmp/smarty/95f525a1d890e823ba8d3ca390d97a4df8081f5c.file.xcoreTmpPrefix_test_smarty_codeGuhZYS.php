<?php /* Smarty version Smarty-3.0.7, created on 2015-10-09 16:50:43
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGuhZYS" */ ?>
<?php /*%%SmartyHeaderCode:16372861885617d443203bd1-76733738%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95f525a1d890e823ba8d3ca390d97a4df8081f5c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGuhZYS',
      1 => 1444402243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16372861885617d443203bd1-76733738',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><div class="col-sm-3">
    <a href="<?php echo $_smarty_tpl->getVariable('single')->value['USER']['PROFILE_URL'];?>
">
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('single')->value['USER']['wz_PROFILBILD']),$_smarty_tpl);?>

        <div class="roomie-matching-info">
            
            <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('single')->value),$_smarty_tpl);?>

            
        </div>
    </a>    
</div>