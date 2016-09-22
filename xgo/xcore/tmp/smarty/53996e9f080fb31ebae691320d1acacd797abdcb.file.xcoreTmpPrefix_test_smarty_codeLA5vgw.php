<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 14:10:04
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLA5vgw" */ ?>
<?php /*%%SmartyHeaderCode:14563232315694fb2c85fa26-68142901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53996e9f080fb31ebae691320d1acacd797abdcb' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLA5vgw',
      1 => 1452604204,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14563232315694fb2c85fa26-68142901',
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