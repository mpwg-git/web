<?php /* Smarty version Smarty-3.0.7, created on 2015-01-13 13:23:00
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7IhYhT" */ ?>
<?php /*%%SmartyHeaderCode:163255392154b50e24b11793-95320295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44ea96049c6f3a7c9ce819a0bfdf1b44ea547eae' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7IhYhT',
      1 => 1421151780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163255392154b50e24b11793-95320295',
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
		<?php echo smarty_function_xr_atom(array('a_id'=>674,'return'=>1),$_smarty_tpl);?>

	</div>
</div>

<div class="row visible-tablet">
	<div class="col-sm-12 ad_placement_tablet">
		<?php echo smarty_function_xr_atom(array('a_id'=>675,'return'=>1),$_smarty_tpl);?>

	</div>
</div>

<?php }?>