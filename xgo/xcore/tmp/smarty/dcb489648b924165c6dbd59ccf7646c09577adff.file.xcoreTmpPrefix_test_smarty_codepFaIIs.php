<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 23:32:53
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codepFaIIs" */ ?>
<?php /*%%SmartyHeaderCode:193518555758c08695cec381-61372621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcb489648b924165c6dbd59ccf7646c09577adff' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codepFaIIs',
      1 => 1489012373,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193518555758c08695cec381-61372621',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_fragebogen::sc_getInitFragen",'var'=>"fragen"),$_smarty_tpl);?>


<form method="post" id="register-fragebogen">

    
    <div class="text-center">
        <button type="button" id="fragebogen-save" class="btn start-button text-uppercase save-fragebogen"><?php echo smarty_function_xr_translate(array('tag'=>'Speichern'),$_smarty_tpl);?>
</button>
    </div>
</form>
