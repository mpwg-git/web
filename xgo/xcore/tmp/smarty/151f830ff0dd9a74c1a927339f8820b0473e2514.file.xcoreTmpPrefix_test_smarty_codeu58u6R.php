<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 14:30:40
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeu58u6R" */ ?>
<?php /*%%SmartyHeaderCode:84926568455cb3c70c328e0-05379237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '151f830ff0dd9a74c1a927339f8820b0473e2514' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeu58u6R',
      1 => 1439382640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84926568455cb3c70c328e0-05379237',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Adresse?"),$_smarty_tpl);?>
*</label>
     <div class="input-icon search-input small v-center">
        <input class="form-control" name="wz_ADRESSE" placeholder="Stadt, Ort, PLZ?">
        <span class="icon-Map">
		    <span class="path1"></span><span class="path2"></span>
		</span>
	</div>
</div>