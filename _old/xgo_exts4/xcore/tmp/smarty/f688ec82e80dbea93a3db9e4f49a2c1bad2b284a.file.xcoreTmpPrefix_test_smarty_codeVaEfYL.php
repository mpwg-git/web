<?php /* Smarty version Smarty-3.0.7, created on 2015-01-13 13:22:58
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVaEfYL" */ ?>
<?php /*%%SmartyHeaderCode:194414277454b50e228eea45-17696156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f688ec82e80dbea93a3db9e4f49a2c1bad2b284a' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVaEfYL',
      1 => 1421151778,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194414277454b50e228eea45-17696156',
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