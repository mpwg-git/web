<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 21:11:00
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeA30mPX" */ ?>
<?php /*%%SmartyHeaderCode:1600147922569800d49e0af5-29022080%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8a79577eed172d03ce9fc59e88331f10606bdfa' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeA30mPX',
      1 => 1452802260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1600147922569800d49e0af5-29022080',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_cookie::sc_showCookieUsageWarning','var'=>'showCookieWarning'),$_smarty_tpl);?>

<div class="cookie-warning-top js-cookie-warning-top <?php if ($_smarty_tpl->getVariable('showCookieWarning')->value){?>active<?php }?>">
    <div class="text">
        <?php echo smarty_function_xr_translate(array('tag'=>'Hinweis'),$_smarty_tpl);?>
:
        <?php echo smarty_function_xr_translate(array('tag'=>'Diese Webseite und Ihre Partner verwenden Cookies, die notwendig sind, damit die angebotenen Services zur Verfügung gestellt werden können.'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_translate(array('tag'=>'Details dazu sind in den'),$_smarty_tpl);?>
 <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>38),$_smarty_tpl);?>
" style="text-decoration:underline"><?php echo smarty_function_xr_translate(array('tag'=>'AGB'),$_smarty_tpl);?>
</a> <?php echo smarty_function_xr_translate(array('tag'=>'aufgeführt.'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_translate(array('tag'=>'Durch Schließen dieses Hinweises, und/oder Weiterverwenden dieser Seiten, erklären Sie sich damit einverstanden, Cookies zu verwenden.'),$_smarty_tpl);?>

    </div>
    
    <div class="icon-Close closing-icon"></div>
    <div class="clearfix"></div>
</div>