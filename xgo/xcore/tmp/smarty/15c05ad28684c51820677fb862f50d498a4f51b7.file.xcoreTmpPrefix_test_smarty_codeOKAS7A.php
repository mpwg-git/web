<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 23:37:18
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOKAS7A" */ ?>
<?php /*%%SmartyHeaderCode:152298501858c0879e4aa896-10323251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15c05ad28684c51820677fb862f50d498a4f51b7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOKAS7A',
      1 => 1489012638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152298501858c0879e4aa896-10323251',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_fragebogen::sc_getInitFragen",'var'=>"fragen"),$_smarty_tpl);?>


<form method="post" id="register-fragebogen">
    
    <?php echo smarty_function_xr_atom(array('a_id'=>976,'return'=>1),$_smarty_tpl);?>

    
    <div class="text-center hidden">
        <button type="button" id="fragebogen-save" class="btn start-button text-uppercase save-fragebogen"><?php echo smarty_function_xr_translate(array('tag'=>'Speichern'),$_smarty_tpl);?>
</button>
    </div>
</form>
