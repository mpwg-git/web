<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 14:18:09
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCUMPoX" */ ?>
<?php /*%%SmartyHeaderCode:18376477155694fd118ab109-17469327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6c042182f7a8d83aeec6de2554452c65ce86b78' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCUMPoX',
      1 => 1452604689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18376477155694fd118ab109-17469327',
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
        <textarea class="form-control" style="width:100%; height:30vw" name="LAGE"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_LAGE'];?>
</textarea>
    </div>
</div>