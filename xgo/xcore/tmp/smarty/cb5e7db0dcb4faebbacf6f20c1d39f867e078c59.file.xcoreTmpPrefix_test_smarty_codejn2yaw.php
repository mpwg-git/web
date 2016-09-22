<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 18:15:52
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejn2yaw" */ ?>
<?php /*%%SmartyHeaderCode:12718398954f9e0c817c5e1-10109852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb5e7db0dcb4faebbacf6f20c1d39f867e078c59' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejn2yaw',
      1 => 1425662152,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12718398954f9e0c817c5e1-10109852',
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