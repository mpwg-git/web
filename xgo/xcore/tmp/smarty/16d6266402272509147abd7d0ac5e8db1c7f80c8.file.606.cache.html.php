<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 09:50:44
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/606.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:19764171305502a4e4b3a086-01296357%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16d6266402272509147abd7d0ac5e8db1c7f80c8' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/606.cache.html',
      1 => 1426236629,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19764171305502a4e4b3a086-01296357',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xs_getCampaignInfos')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/../xshop/smarty/function.xs_getCampaignInfos.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><?php echo smarty_function_xs_getCampaignInfos(array('var'=>'data'),$_smarty_tpl);?>





<div class="row">
    <div class="col-sm-6">
        <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>

    </div>
    <div class="col-sm-6">
        <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('dataTagcloud')->value),$_smarty_tpl);?>

    </div>
</div>

