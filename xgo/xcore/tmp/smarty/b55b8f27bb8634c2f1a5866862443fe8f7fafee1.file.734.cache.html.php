<?php /* Smarty version Smarty-3.0.7, created on 2016-08-03 12:50:44
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/734.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:177264785657a1cc843a8550-11117549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b55b8f27bb8634c2f1a5866862443fe8f7fafee1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/734.cache.html',
      1 => 1451984362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177264785657a1cc843a8550-11117549',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Zeitraum?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center hasDatePicker">
        <input class="form-control datepicker" name="ZEITRAUM_VON" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ZEITRAUM_VON'];?>
" id="ZEITRAUM_VON" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'ab'),$_smarty_tpl);?>
?" rel="required" />
        <span class="add-on"><i class="icon-calendar"></i></span>
    </div><!--
    --><div class="devider v-center">-</div><!--
    --><div class="column-input v-center hasDatePicker">
        <input class="form-control datepicker" name="ZEITRAUM_BIS" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ZEITRAUM_BIS'];?>
" id="ZEITRAUM_VON" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
?" />
         <span class="add-on"><i class="icon-calendar"></i></span>
    </div>
    <div class="error-div" id="ZEITRAUM_VON_error">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Zeitraum angeben"),$_smarty_tpl);?>

    </div>
</div>