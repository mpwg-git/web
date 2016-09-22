<?php /* Smarty version Smarty-3.0.7, created on 2016-08-17 15:03:39
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebE85NB" */ ?>
<?php /*%%SmartyHeaderCode:54151976957b460ab7206f9-65600995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c14c7bb40b3ab5a23b9c9f628efc3bb19454799a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebE85NB',
      1 => 1471439019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54151976957b460ab7206f9-65600995',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
?><?php if ($_smarty_tpl->getVariable('dataViaAjax')->value){?>
    <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable($_smarty_tpl->getVariable('dataViaAjax')->value, null, null);?>
<?php }else{ ?>
    <?php echo smarty_function_xr_wz_fetch(array('id'=>907,'wz_online'=>'Y','order'=>'wz_created DESC','var'=>'data'),$_smarty_tpl);?>

<?php }?>