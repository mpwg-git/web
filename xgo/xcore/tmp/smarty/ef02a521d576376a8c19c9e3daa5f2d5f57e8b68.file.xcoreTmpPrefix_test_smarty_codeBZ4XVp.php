<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 15:42:32
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBZ4XVp" */ ?>
<?php /*%%SmartyHeaderCode:568755121569510d8d0e7e2-18984669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef02a521d576376a8c19c9e3daa5f2d5f57e8b68' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBZ4XVp',
      1 => 1452609752,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '568755121569510d8d0e7e2-18984669',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Lage"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center" style="width:100%">
        <textarea class="form-control textarea-beschreibung" name="LAGE"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_LAGE'];?>
</textarea>
    </div>
</div>