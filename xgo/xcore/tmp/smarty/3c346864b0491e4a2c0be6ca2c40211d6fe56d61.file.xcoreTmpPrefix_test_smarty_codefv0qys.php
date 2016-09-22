<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 12:16:04
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefv0qys" */ ?>
<?php /*%%SmartyHeaderCode:200619538956978374255da2-78887608%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c346864b0491e4a2c0be6ca2c40211d6fe56d61' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefv0qys',
      1 => 1452770164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200619538956978374255da2-78887608',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_cookie::sc_showCookieUsageWarning','var'=>'showCookieWarning'),$_smarty_tpl);?>

<div class="cookie-warning-top js-cookie-warning-top <?php if ($_smarty_tpl->getVariable('showCookieWarning')->value){?>active<?php }?>">
    <div class="text">
        Was machen Cookies und wie schmecken sie?
    </div>
    
    <div class="icon-Close closing-icon js-cookie-warning-seen"></div>
    <div class="clearfix"></div>
</div>