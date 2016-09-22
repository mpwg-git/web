<?php /* Smarty version Smarty-3.0.7, created on 2015-01-12 13:10:18
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNvNuot" */ ?>
<?php /*%%SmartyHeaderCode:90255754654b3b9aa9e74f3-95375079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9f463bdafb638df0bdf3513e7b2d97691b3fe23' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNvNuot',
      1 => 1421064618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90255754654b3b9aa9e74f3-95375079',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'oa_validation::showAds','var'=>'showAds'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('showAds')->value||$_REQUEST['showads']==1){?>

<div class="row visible-mobile">
	<div class="col-sm-12 ad_placement_mobile">
		<?php echo smarty_function_xr_atom(array('a_id'=>669,'return'=>1),$_smarty_tpl);?>

	</div>
</div>

<div class="row visible-tablet">
	<div class="col-sm-12 ad_placement_tablet">
		<?php echo smarty_function_xr_atom(array('a_id'=>671,'return'=>1),$_smarty_tpl);?>

	</div>
</div>

<?php }?>