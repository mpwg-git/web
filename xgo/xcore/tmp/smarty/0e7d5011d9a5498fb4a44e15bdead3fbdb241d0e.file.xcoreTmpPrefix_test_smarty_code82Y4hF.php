<?php /* Smarty version Smarty-3.0.7, created on 2016-01-11 11:23:05
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code82Y4hF" */ ?>
<?php /*%%SmartyHeaderCode:766026160569382893679f9-03317096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e7d5011d9a5498fb4a44e15bdead3fbdb241d0e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code82Y4hF',
      1 => 1452507785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '766026160569382893679f9-03317096',
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
        <textarea class="form-control" style="width:100%; height:50vw" name="BESCHREIBUNG"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_BESCHREIBUNG'];?>
</textarea>
    </div>
</div>