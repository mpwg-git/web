<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 15:37:03
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeo3k9tp" */ ?>
<?php /*%%SmartyHeaderCode:177350847156950f8fd398e1-28630280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73e38b5fd83e4192cf21575cec9895124245a842' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeo3k9tp',
      1 => 1452609423,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177350847156950f8fd398e1-28630280',
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
        <textarea class="form-control beschreibungstext-textarea" name="AUSSTATTUNG"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_AUSSTATTUNG'];?>
</textarea>
    </div>
</div>