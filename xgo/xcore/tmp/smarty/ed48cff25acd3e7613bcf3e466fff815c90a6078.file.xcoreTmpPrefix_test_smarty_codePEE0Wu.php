<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 09:46:53
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePEE0Wu" */ ?>
<?php /*%%SmartyHeaderCode:42220861755c9a86d9186e0-60630722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed48cff25acd3e7613bcf3e466fff815c90a6078' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePEE0Wu',
      1 => 1439279213,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42220861755c9a86d9186e0-60630722',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if ($_SESSION['xredaktor_feUser_wsf']['wz_TYPE']=='suche'){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>688,'showFace'=>1,'return'=>1),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_atom(array('a_id'=>689,'showFace'=>1,'return'=>1),$_smarty_tpl);?>

<?php }?>