<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 15:42:59
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0nzaxf" */ ?>
<?php /*%%SmartyHeaderCode:2076843625569510f351b234-98437807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebec08f24697ae7dd962333e90b6921f2f5bbe7a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0nzaxf',
      1 => 1452609779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2076843625569510f351b234-98437807',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center" style="width:100%">
        <textarea class="form-control textarea-beschreibung" name="BESCHREIBUNG"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_BESCHREIBUNG'];?>
</textarea>
    </div>
</div>