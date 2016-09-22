<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 14:17:46
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMWa78a" */ ?>
<?php /*%%SmartyHeaderCode:19049970725694fcfa883f76-96674267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14aa9539d83d2adcce4c0369989cce7af5ec8211' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMWa78a',
      1 => 1452604666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19049970725694fcfa883f76-96674267',
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
        <textarea class="form-control" style="width:100%; height:30vw" name="AUSSTATTUNG"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_AUSSTATTUNG'];?>
</textarea>
    </div>
</div>