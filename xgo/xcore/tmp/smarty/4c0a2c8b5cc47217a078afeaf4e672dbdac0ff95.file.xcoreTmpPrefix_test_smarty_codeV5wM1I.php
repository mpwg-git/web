<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 13:10:18
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeV5wM1I" */ ?>
<?php /*%%SmartyHeaderCode:17863966955b7631a7179a1-80990462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c0a2c8b5cc47217a078afeaf4e672dbdac0ff95' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeV5wM1I',
      1 => 1438081818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17863966955b7631a7179a1-80990462',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Adresse?"),$_smarty_tpl);?>
*</label>
     <div class="input-icon search-input input-fullwidth small v-center">
        <input class="form-control" placeholder="Stadt, Ort, PLZ?">
        <span class="icon-Map">
		    <span class="path1"></span><span class="path2"></span>
		</span>
	</div>
</div>