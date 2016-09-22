<?php /* Smarty version Smarty-3.0.7, created on 2015-08-26 17:29:24
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePSm8dh" */ ?>
<?php /*%%SmartyHeaderCode:81869790355dddb54add4a3-59547467%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bf135909a6fe7d181b24f4209958891b95336cf' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePSm8dh',
      1 => 1440602964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81869790355dddb54add4a3-59547467',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('user')->value),$_smarty_tpl);?>


<input type="hidden" name="allData" value="1" />
    
<div class="form-group">
    <label for="vorname"><?php echo smarty_function_xr_translate(array('tag'=>"Vorname"),$_smarty_tpl);?>
</label>
    <input id="vorname" name="VORNAME" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_VORNAME'];?>
" class="form-control" />
</div>
<div class="form-group">
    <label for="nachname"><?php echo smarty_function_xr_translate(array('tag'=>"Nachname"),$_smarty_tpl);?>
</label>
    <input id="nachname" name="NACHNAME" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_NACHNAME'];?>
"class="form-control" />
</div>
<div class="form-group hasDatePicker">
    <label for="geburtsdatum"><?php echo smarty_function_xr_translate(array('tag'=>"Geburtsdatum"),$_smarty_tpl);?>
</label>
    <input id="geburtsdatum" name="GEBURTSDATUM" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_GEBURTSDATUM'];?>
" class="form-control datepicker-birthday" />
</div>
<div class="form-group">
    <label for="email"><?php echo smarty_function_xr_translate(array('tag'=>"Email"),$_smarty_tpl);?>
</label>
    <input id="email" name="EMAIL" disabled="true" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_EMAIL'];?>
" class="form-control" />
</div>
 <div class="form-group">
    <label for="telefon"><?php echo smarty_function_xr_translate(array('tag'=>"Telefon"),$_smarty_tpl);?>
</label>
    <input id="telefon" name="TELEFON" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_TELEFON'];?>
" class="form-control" />
</div>
<div class="form-group">
    <label for="beschreibung"><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</label>
    <textarea id="beschreibung" name="BESCHREIBUNG" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_BESCHREIBUNG'];?>
" class="form-control" placeholder="..."></textarea>
</div>