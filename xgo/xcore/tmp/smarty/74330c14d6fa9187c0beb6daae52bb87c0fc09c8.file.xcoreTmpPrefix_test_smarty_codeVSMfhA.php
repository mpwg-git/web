<?php /* Smarty version Smarty-3.0.7, created on 2017-02-08 21:47:41
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVSMfhA" */ ?>
<?php /*%%SmartyHeaderCode:1804127051589b83ed8d1b94-54401086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74330c14d6fa9187c0beb6daae52bb87c0fc09c8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVSMfhA',
      1 => 1486586861,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1804127051589b83ed8d1b94-54401086',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_cookie::sc_showCookieUsageWarning','var'=>'showCookieWarning'),$_smarty_tpl);?>

<div class="cookie-warning-top js-cookie-warning-top <?php if ($_smarty_tpl->getVariable('showCookieWarning')->value){?>active<?php }?>">
    <div class="text">
        <?php echo smarty_function_xr_translate(array('tag'=>'Hinweis'),$_smarty_tpl);?>
:
        <?php echo smarty_function_xr_translate(array('tag'=>'Diese Webseite und Ihre Partner verwenden Cookies, die notwendig sind, damit die angebotenen Services zur Verfügung gestellt werden können.'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_translate(array('tag'=>'Details dazu sind in den'),$_smarty_tpl);?>
 
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>38),$_smarty_tpl);?>
" style="text-decoration:underline">
            <!--<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>38),$_smarty_tpl);?>
">-->
            <?php echo smarty_function_xr_translate(array('tag'=>'AGB'),$_smarty_tpl);?>
</a> <?php echo smarty_function_xr_translate(array('tag'=>'aufgeführt.'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_translate(array('tag'=>'Durch Schließen dieses Hinweises, und/oder Weiterverwenden dieser Seiten, erklären Sie sich damit einverstanden, Cookies zu verwenden.'),$_smarty_tpl);?>

    </div>
    
    <div class="icon-Close closing-icon"></div>
    <div class="clearfix"></div>
</div>