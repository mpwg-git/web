<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 14:09:48
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefDVzFk" */ ?>
<?php /*%%SmartyHeaderCode:1258518105694fb1c8f1dc7-53667581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66b2f9fdcda51cf3820e4ddd69a7abac0c7bc3ed' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefDVzFk',
      1 => 1452604188,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1258518105694fb1c8f1dc7-53667581',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label for="zusatzkosten-val"><?php echo smarty_function_xr_translate(array('tag'=>"Zusatzkosten?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <input class="form-control" name="ZUSATZKOSTEN" value="<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_ZUSATZKOSTEN'];?>
" id="zusatzkosten-val" placeholder="0" rel="required"  />
    </div>
</div>