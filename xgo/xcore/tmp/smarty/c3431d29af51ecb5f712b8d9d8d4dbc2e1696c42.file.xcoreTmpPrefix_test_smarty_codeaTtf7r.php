<?php /* Smarty version Smarty-3.0.7, created on 2015-11-25 19:36:14
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaTtf7r" */ ?>
<?php /*%%SmartyHeaderCode:10530555945655ff9e352ef9-78679591%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3431d29af51ecb5f712b8d9d8d4dbc2e1696c42' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaTtf7r',
      1 => 1448476574,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10530555945655ff9e352ef9-78679591',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getMyUserType",'var'=>"type"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_search::sc_getStoredSearchData','var'=>'xx'),$_smarty_tpl);?>

<?php if ($_REQUEST['dev']==1){?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('xx')->value),$_smarty_tpl);?>
<?php }?>

 
 <?php echo smarty_function_xr_atom(array('a_id'=>759,'userType'=>$_smarty_tpl->getVariable('type')->value,'return'=>1),$_smarty_tpl);?>



