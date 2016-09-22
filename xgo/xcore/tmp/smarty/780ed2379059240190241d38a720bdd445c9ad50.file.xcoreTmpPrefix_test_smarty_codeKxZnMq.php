<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 12:25:50
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKxZnMq" */ ?>
<?php /*%%SmartyHeaderCode:52890401655c9cdae639f68-49817290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '780ed2379059240190241d38a720bdd445c9ad50' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKxZnMq',
      1 => 1439288750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52890401655c9cdae639f68-49817290',
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

