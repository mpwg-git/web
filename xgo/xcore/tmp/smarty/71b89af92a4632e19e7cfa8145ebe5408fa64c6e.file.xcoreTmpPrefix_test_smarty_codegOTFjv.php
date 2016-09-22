<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 09:50:00
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegOTFjv" */ ?>
<?php /*%%SmartyHeaderCode:15489937395502a4b8670ea1-77090822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71b89af92a4632e19e7cfa8145ebe5408fa64c6e' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegOTFjv',
      1 => 1426236600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15489937395502a4b8670ea1-77090822',
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





<div class="row">
    <div class="col-sm-6">
        <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>

    </div>
    <div class="col-sm-6">
        <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('dataTagcloud')->value),$_smarty_tpl);?>

    </div>
</div>

