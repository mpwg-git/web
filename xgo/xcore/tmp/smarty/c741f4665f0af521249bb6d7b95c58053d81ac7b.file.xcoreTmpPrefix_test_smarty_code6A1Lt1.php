<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 12:42:00
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6A1Lt1" */ ?>
<?php /*%%SmartyHeaderCode:42371824655b75c78ee7e28-52656901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c741f4665f0af521249bb6d7b95c58053d81ac7b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6A1Lt1',
      1 => 1438080120,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42371824655b75c78ee7e28-52656901',
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