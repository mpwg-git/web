<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 18:02:55
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyUVikY" */ ?>
<?php /*%%SmartyHeaderCode:85322084555d5fa2f752461-96219661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d7c680ccf6e25e3b73c07d8a1a108fd2ce08b5a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyUVikY',
      1 => 1440086575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85322084555d5fa2f752461-96219661',
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
    <?php echo smarty_function_xr_atom(array('a_id'=>745,'return'=>1),$_smarty_tpl);?>

<?php }?>