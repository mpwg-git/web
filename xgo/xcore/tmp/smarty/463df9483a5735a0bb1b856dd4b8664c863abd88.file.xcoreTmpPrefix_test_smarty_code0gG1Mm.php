<?php /* Smarty version Smarty-3.0.7, created on 2015-11-13 10:03:09
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0gG1Mm" */ ?>
<?php /*%%SmartyHeaderCode:1309422495645a74d7fab27-91944290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '463df9483a5735a0bb1b856dd4b8664c863abd88' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0gG1Mm',
      1 => 1447405389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1309422495645a74d7fab27-91944290',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getMyUserType",'var'=>"type"),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('type')->value=='biete'){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>758,'return'=>1),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_atom(array('a_id'=>759,'return'=>1),$_smarty_tpl);?>

<?php }?>