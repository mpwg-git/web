<?php /* Smarty version Smarty-3.0.7, created on 2015-11-25 11:56:30
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelGDiue" */ ?>
<?php /*%%SmartyHeaderCode:1229554115565593de442306-83652139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4401c5d7ca4f331dfd07334ef409b86e65b2a5f8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelGDiue',
      1 => 1448448990,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1229554115565593de442306-83652139',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php if ($_SESSION['error_message']!=''){?>
    <div class="error-messages">
        <?php echo $_SESSION['error_message'];?>

        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_clearSessionErrorMessage','var'=>'xx'),$_smarty_tpl);?>

    </div>
<?php }?>