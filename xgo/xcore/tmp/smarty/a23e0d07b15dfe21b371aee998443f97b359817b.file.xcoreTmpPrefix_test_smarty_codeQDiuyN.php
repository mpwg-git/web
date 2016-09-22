<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 09:49:16
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQDiuyN" */ ?>
<?php /*%%SmartyHeaderCode:12625059235502a48ced6c38-76870976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a23e0d07b15dfe21b371aee998443f97b359817b' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQDiuyN',
      1 => 1426236556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12625059235502a48ced6c38-76870976',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xs_getCampaignInfos')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/../xshop/smarty/function.xs_getCampaignInfos.php';
if (!is_callable('smarty_function_xs_getTagcloud')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/../xshop/smarty/function.xs_getTagcloud.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><?php echo smarty_function_xs_getCampaignInfos(array('var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xs_getTagcloud(array('var'=>'dataTagcloud'),$_smarty_tpl);?>



<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>


