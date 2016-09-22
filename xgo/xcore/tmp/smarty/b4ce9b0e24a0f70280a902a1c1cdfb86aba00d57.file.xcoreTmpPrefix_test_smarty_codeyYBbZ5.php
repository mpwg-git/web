<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 14:56:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyYBbZ5" */ ?>
<?php /*%%SmartyHeaderCode:935652775567956abb9f401-69538176%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4ce9b0e24a0f70280a902a1c1cdfb86aba00d57' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyYBbZ5',
      1 => 1450792619,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '935652775567956abb9f401-69538176',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center" style="width:100%">
        <textarea class="form-control" style="width:100%" name="BESCHREIBUNG"><?php echo $_smarty_tpl->getVariable('profile')->value['wz_BESCHREIBUNG'];?>
<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_BESCHREIBUNG'];?>
</textarea>
    </div>
</div>