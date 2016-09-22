<?php /* Smarty version Smarty-3.0.7, created on 2015-07-26 22:26:31
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeE84oDl" */ ?>
<?php /*%%SmartyHeaderCode:73694300755b542772cb093-81452186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e4a25e3855ac1a047c163ab655baf779e8b3e7e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeE84oDl',
      1 => 1437942391,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73694300755b542772cb093-81452186',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if ($_REQUEST['profiltype']==1){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>688,'return'=>1),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_atom(array('a_id'=>689,'return'=>1),$_smarty_tpl);?>

<?php }?>