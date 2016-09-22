<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 18:18:13
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHYk3ku" */ ?>
<?php /*%%SmartyHeaderCode:214589138454f9e155b2dfb2-19937871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69008cc9d499aac71e963d28dd0bbf9b5b86c531' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHYk3ku',
      1 => 1425662293,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214589138454f9e155b2dfb2-19937871',
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