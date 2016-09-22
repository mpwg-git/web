<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 18:45:48
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4lCD2q" */ ?>
<?php /*%%SmartyHeaderCode:156903173954f9e7cce129e3-54835824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd95f8bd76ab85366f3b936ff64fb0132898af72d' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4lCD2q',
      1 => 1425663948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156903173954f9e7cce129e3-54835824',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php if (isset($_REQUEST['wzid'])&&$_REQUEST['wzid']!=0){?>

    <?php echo smarty_function_xr_form(array('form_id'=>$_REQUEST['form_id'],'submit_txt'=>'send'),$_smarty_tpl);?>

    
<?php }else{ ?>

    request.form_id not set
    
<?php }?>