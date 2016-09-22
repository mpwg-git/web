<?php /* Smarty version Smarty-3.0.7, created on 2015-12-17 13:44:41
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFFr96f" */ ?>
<?php /*%%SmartyHeaderCode:1968850075672ae397a9716-92492522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '624b92d837bc289a216d1dfca133c7f191c1c1fc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFFr96f',
      1 => 1450356281,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1968850075672ae397a9716-92492522',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Unregistrierte Männer in WG?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <input class="form-control" name="UNREG_M" value="<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_UNREG_M'];?>
" id="UNREG_M" placeholder="0" rel="required"  />
    </div>
</div>