<?php /* Smarty version Smarty-3.0.7, created on 2015-12-17 13:43:51
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOR6SVX" */ ?>
<?php /*%%SmartyHeaderCode:5637856375672ae07833d86-11965894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66970c55dd2b044bff5552e9b2dce3c971a10b89' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOR6SVX',
      1 => 1450356231,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5637856375672ae07833d86-11965894',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Unregistrierte Frauen in WG?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <input class="form-control" name="UNREG_F" value="<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_UNREG_F'];?>
" id="UNREG_F" placeholder="0" rel="required"  />
    </div>
</div>