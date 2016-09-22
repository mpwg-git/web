<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 14:31:54
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesTcKqo" */ ?>
<?php /*%%SmartyHeaderCode:25142960355cb3cbaf30810-76289913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb516d4cac4d4f365bf9a074b725f2a729bce959' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesTcKqo',
      1 => 1439382714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25142960355cb3cbaf30810-76289913',
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
        <input class="form-control" name="ADRESSE" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ADRESSE'];?>
" placeholder="Stadt, Ort, PLZ?">
        <span class="icon-Map">
		    <span class="path1"></span><span class="path2"></span>
		</span>
	</div>
</div>