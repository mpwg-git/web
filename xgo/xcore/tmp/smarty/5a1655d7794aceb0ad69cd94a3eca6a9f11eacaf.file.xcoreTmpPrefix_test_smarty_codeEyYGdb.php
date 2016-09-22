<?php /* Smarty version Smarty-3.0.7, created on 2016-01-15 15:46:28
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeEyYGdb" */ ?>
<?php /*%%SmartyHeaderCode:762083090569906445a80a1-62588124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a1655d7794aceb0ad69cd94a3eca6a9f11eacaf' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeEyYGdb',
      1 => 1452869188,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '762083090569906445a80a1-62588124',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Ausstattung"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center" style="width:100%">
        <textarea class="form-control textarea-beschreibung" name="AUSSTATTUNG" placeholder="Waschmaschine, WLAN, Lift, Spülmaschine, Keller, Fahrradabstellplatz, etc."><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_AUSSTATTUNG'];?>
</textarea>
    </div>
</div>