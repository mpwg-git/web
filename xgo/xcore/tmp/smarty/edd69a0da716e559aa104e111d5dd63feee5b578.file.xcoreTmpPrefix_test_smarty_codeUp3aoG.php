<?php /* Smarty version Smarty-3.0.7, created on 2016-08-25 10:15:42
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUp3aoG" */ ?>
<?php /*%%SmartyHeaderCode:169091254057bea92edd2f13-69149623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edd69a0da716e559aa104e111d5dd63feee5b578' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUp3aoG',
      1 => 1472112942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169091254057bea92edd2f13-69149623',
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
<!--<div class="form-group">-->
<!--    <label class="email-notification"><?php echo smarty_function_xr_translate(array('tag'=>"Benachrichtigungen erlauben"),$_smarty_tpl);?>
</label>-->
<!--    <label for="emailja" class="radio special-label">-->
<!--        <input id="emailja" type="radio" name="EMAILNOTIFICATION" value="Y" <?php if ($_smarty_tpl->getVariable('user')->value['wz_EMAILNOTIFICATION']=='Y'||$_smarty_tpl->getVariable('user')->value['wz_EMAILNOTIFICATION']==''){?>checked="checked"<?php }?>/>-->
<!--        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>-->
<!--        <span class="unchecked circle circle-plain" ><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>-->
<!--    </label>-->
<!--    <label for="emailnein" class="radio special-label">-->
<!--        <input id="emailnein" type="radio" name="EMAILNOTIFICATION" value="N" <?php if ($_smarty_tpl->getVariable('user')->value['wz_EMAILNOTIFICATION']=='N'){?>checked="checked"<?php }?>/>-->
<!--        <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>-->
<!--        <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>-->
<!--    </label>-->
<!--</div>-->
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