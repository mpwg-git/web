<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 09:46:46
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeuy8MGf" */ ?>
<?php /*%%SmartyHeaderCode:34391469955c9a8669556b6-08665502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4c4bbf5689dbf5dbe980bb7565fd67cb7eb8729' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeuy8MGf',
      1 => 1439279206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34391469955c9a8669556b6-08665502',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if ($_SESSION['xredaktor_feUser_wsf']['wz_TYPE']=='suche'){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>688,'showFace'=>1,'return'=>1),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_atom(array('a_id'=>689,'return'=>1),$_smarty_tpl);?>

<?php }?>