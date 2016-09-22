<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 15:42:26
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeq0oJuz" */ ?>
<?php /*%%SmartyHeaderCode:1141142693569510d20b7e05-70098919%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7688278e81a4d9d0f533f9715434fd2b765fad5b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeq0oJuz',
      1 => 1452609746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1141142693569510d20b7e05-70098919',
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
        <textarea class="form-control textarea-beschreibung" style="width:100%; height:30vw" name="LAGE"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_LAGE'];?>
</textarea>
    </div>
</div>