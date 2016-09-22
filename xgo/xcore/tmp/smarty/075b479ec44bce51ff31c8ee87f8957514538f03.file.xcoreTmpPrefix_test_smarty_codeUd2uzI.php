<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 12:14:48
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUd2uzI" */ ?>
<?php /*%%SmartyHeaderCode:90072882756978328c01a14-79781103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '075b479ec44bce51ff31c8ee87f8957514538f03' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUd2uzI',
      1 => 1452770088,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90072882756978328c01a14-79781103',
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
    
    <div class="icon-Close closing-icon"></div>
    <div class="clearfix"></div>
</div>