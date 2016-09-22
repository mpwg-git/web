<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 11:39:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHLujkk" */ ?>
<?php /*%%SmartyHeaderCode:157439208155d5a057268b26-97301976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '666eee13e35a3ec565cfdeb98aa7e4f8feb04d13' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHLujkk',
      1 => 1440063575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157439208155d5a057268b26-97301976',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if ($_SESSION['xredaktor_feUser_wsf']['wz_TYPE']=='suche'){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>688,'return'=>1),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_atom(array('a_id'=>689,'return'=>1),$_smarty_tpl);?>

<?php }?>