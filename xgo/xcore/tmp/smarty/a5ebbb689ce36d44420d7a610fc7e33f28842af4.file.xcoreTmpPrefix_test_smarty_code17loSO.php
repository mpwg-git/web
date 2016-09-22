<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 18:46:03
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code17loSO" */ ?>
<?php /*%%SmartyHeaderCode:93296528954f9e7dbe1f355-88839610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5ebbb689ce36d44420d7a610fc7e33f28842af4' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code17loSO',
      1 => 1425663963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93296528954f9e7dbe1f355-88839610',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php if (isset($_REQUEST['form_id'])&&$_REQUEST['form_id']!=0){?>

    <?php echo smarty_function_xr_form(array('form_id'=>$_REQUEST['form_id'],'submit_txt'=>'send'),$_smarty_tpl);?>

    
<?php }else{ ?>

    request.form_id not set
    
<?php }?>