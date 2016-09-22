<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 18:23:06
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGGngC2" */ ?>
<?php /*%%SmartyHeaderCode:94196427254f9e27ac88976-51592615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2180eb872eb2d3f74466fadba05ba63f7b733e94' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGGngC2',
      1 => 1425662586,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94196427254f9e27ac88976-51592615',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php if (isset($_REQUEST['wzid'])&&$_REQUEST['wzid']!=0){?>

    <?php echo smarty_function_xr_form(array('wz_id'=>$_REQUEST['wzid'],'submit_txt'=>'send'),$_smarty_tpl);?>

    
<?php }else{ ?>

    request.wzid not set
    
<?php }?>