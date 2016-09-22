<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 15:01:21
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCbFSp0" */ ?>
<?php /*%%SmartyHeaderCode:214678637567957b11312c1-83426780%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fca0e82a4cc31b8247a32fc6f73dc0f1488805f2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCbFSp0',
      1 => 1450792881,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214678637567957b11312c1-83426780',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center" style="width:66%">
        <textarea class="form-control" style="width:100%" name="BESCHREIBUNG"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_BESCHREIBUNG'];?>
</textarea>
    </div>
</div>