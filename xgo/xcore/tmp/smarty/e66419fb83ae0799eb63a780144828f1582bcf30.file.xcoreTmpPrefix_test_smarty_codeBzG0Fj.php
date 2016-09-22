<?php /* Smarty version Smarty-3.0.7, created on 2015-11-25 11:54:04
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBzG0Fj" */ ?>
<?php /*%%SmartyHeaderCode:2900509145655934caa5393-27301364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e66419fb83ae0799eb63a780144828f1582bcf30' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBzG0Fj',
      1 => 1448448844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2900509145655934caa5393-27301364',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php if ($_SESSION['error_message']!=''){?>
    <div class="error-messages">
        <?php echo $_SESSION['error_message'];?>

        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_clearSessionErrorMessages','var'=>'xx'),$_smarty_tpl);?>

    </div>
<?php }?>