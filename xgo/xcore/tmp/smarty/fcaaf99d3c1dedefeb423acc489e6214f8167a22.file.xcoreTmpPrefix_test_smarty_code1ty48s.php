<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 12:26:26
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1ty48s" */ ?>
<?php /*%%SmartyHeaderCode:94388017255c9cdd2826801-93493030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcaaf99d3c1dedefeb423acc489e6214f8167a22' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1ty48s',
      1 => 1439288786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94388017255c9cdd2826801-93493030',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'isLoggedIn','var'=>'isLoggedIn'),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('isLoggedIn')->value===true){?>
    loggedin
<?php }else{ ?>
    notloggedin
<?php }?>

