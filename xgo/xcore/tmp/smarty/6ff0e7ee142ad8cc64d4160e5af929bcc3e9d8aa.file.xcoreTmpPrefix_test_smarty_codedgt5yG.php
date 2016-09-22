<?php /* Smarty version Smarty-3.0.7, created on 2016-09-05 21:45:32
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedgt5yG" */ ?>
<?php /*%%SmartyHeaderCode:176737284257cdcb5c23df76-52576586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ff0e7ee142ad8cc64d4160e5af929bcc3e9d8aa' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedgt5yG',
      1 => 1473104732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176737284257cdcb5c23df76-52576586',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><input type="hidden" name="allData" value="1" />

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
" class="form-control textarea-beschreibung" placeholder="..."><?php echo $_smarty_tpl->getVariable('user')->value['wz_BESCHREIBUNG'];?>
</textarea>
</div>

<div class="form-group">
    <label for="land"><?php echo smarty_function_xr_translate(array('tag'=>"Land"),$_smarty_tpl);?>
</label>
    <select id="land" name="LAND" class="form-control">
        
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('user')->value['LAND_COMBO']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value['selected']=='1'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['label'];?>
</option>
        <?php }} ?>
    </select>
</div>