<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 12:27:12
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNfDpxa" */ ?>
<?php /*%%SmartyHeaderCode:18432748855c9ce00a344a9-64003822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89797498eefce85f7df0fb6e342a7f67f77128f2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNfDpxa',
      1 => 1439288832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18432748855c9ce00a344a9-64003822',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'isLoggedIn','var'=>'isLoggedIn'),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('isLoggedIn')->value===true){?>
   <?php echo smarty_function_xr_atom(array('a_id'=>693,'return'=>1),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_atom(array('a_id'=>693,'return'=>1),$_smarty_tpl);?>

<?php }?>

