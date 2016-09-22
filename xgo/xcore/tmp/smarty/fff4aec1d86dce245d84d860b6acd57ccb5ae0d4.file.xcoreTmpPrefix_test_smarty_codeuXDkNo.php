<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 18:15:43
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeuXDkNo" */ ?>
<?php /*%%SmartyHeaderCode:186621674154f9e0bfd631f6-24039267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fff4aec1d86dce245d84d860b6acd57ccb5ae0d4' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeuXDkNo',
      1 => 1425662143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186621674154f9e0bfd631f6-24039267',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php if (isset($_REQUEST['wzid'])&&$_REQUEST['wzid']!=0){?>

    <?php echo smarty_function_xr_form(array('wz_id'=>$_REQUEST['wzid'],'submit_txt'=>'send'),$_smarty_tpl);?>

    
<?php }else{ ?>

    request wzid not set
    
<?php }?>