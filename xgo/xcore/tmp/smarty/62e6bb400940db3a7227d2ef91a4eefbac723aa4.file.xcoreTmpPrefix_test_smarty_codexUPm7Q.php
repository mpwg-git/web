<?php /* Smarty version Smarty-3.0.7, created on 2017-03-07 11:52:19
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexUPm7Q" */ ?>
<?php /*%%SmartyHeaderCode:156702614158be90e320c251-08688003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62e6bb400940db3a7227d2ef91a4eefbac723aa4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexUPm7Q',
      1 => 1488883939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156702614158be90e320c251-08688003',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?>

<?php if ($_smarty_tpl->getVariable('isLoggedIn')->value){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>973,'return'=>1),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_atom(array('a_id'=>974,'return'=>1),$_smarty_tpl);?>

<?php }?>

*%<?php ?>>
