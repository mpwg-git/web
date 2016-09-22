<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 13:01:55
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYflYUx" */ ?>
<?php /*%%SmartyHeaderCode:85118925555b76123639d73-73223195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c72ee2368a1f8aee4db11bc1c99346b83634612' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYflYUx',
      1 => 1438081315,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85118925555b76123639d73-73223195',
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
        <input class="form-control" placeholder="Stadt, Ort, PLZ?">
        <span class="icon-Map">
		    <span class="path1"></span><span class="path2"></span>
		</span>
	</div>
</div>