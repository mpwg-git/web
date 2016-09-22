<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 12:25:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyZ3mR6" */ ?>
<?php /*%%SmartyHeaderCode:161409980755c9cdb7ca9983-53447850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34266dce75decfb39216772e369eab7df38abd68' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyZ3mR6',
      1 => 1439288759,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161409980755c9cdb7ca9983-53447850',
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

