<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 12:17:13
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedY1pJy" */ ?>
<?php /*%%SmartyHeaderCode:2089736038569783b9f056f3-93977054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b77417103eb8a152cc4a30be02fdbf9aa4b6f27' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedY1pJy',
      1 => 1452770233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2089736038569783b9f056f3-93977054',
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