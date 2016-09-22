<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 19:17:45
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNKS7XG" */ ?>
<?php /*%%SmartyHeaderCode:89182922155cb7fb9175475-92077332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fd973b10100148aa975b90af2a7ca453a646b9d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNKS7XG',
      1 => 1439399865,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89182922155cb7fb9175475-92077332',
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

