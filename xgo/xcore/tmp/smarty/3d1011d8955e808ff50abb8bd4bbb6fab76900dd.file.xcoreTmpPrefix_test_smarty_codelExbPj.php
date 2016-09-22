<?php /* Smarty version Smarty-3.0.7, created on 2015-08-10 11:33:16
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelExbPj" */ ?>
<?php /*%%SmartyHeaderCode:89420550655c86fdcf07534-71278205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d1011d8955e808ff50abb8bd4bbb6fab76900dd' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelExbPj',
      1 => 1439199196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89420550655c86fdcf07534-71278205',
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
        <input class="form-control" placeholder="Stadt, Ort, PLZ?" value="wz_ADRESSE" />
        <span class="icon-Map">
		    <span class="path1"></span><span class="path2"></span>
		</span>
	</div>
</div>