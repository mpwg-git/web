<?php /* Smarty version Smarty-3.0.7, created on 2016-08-16 10:43:19
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1MtEA2" */ ?>
<?php /*%%SmartyHeaderCode:177699186757b2d227f208c5-04282139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d90591e4ac71465b054c6d70b00e03b39b52031' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1MtEA2',
      1 => 1471336999,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177699186757b2d227f208c5-04282139',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php if (!$_smarty_tpl->getVariable('user')->value){?>

    <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyData",'var'=>"data"),$_smarty_tpl);?>

    <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['USER'], null, null);?>

<?php }?>

<div class="meinprofil-uebermich">

     <div class="meinprofil-profilbild add-image add-image-profil" data-type="profile">
        
        <?php if (($_smarty_tpl->getVariable('user')->value['wz_PROFILBILD']>0)){?>
             <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('user')->value['wz_PROFILBILD'],'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

        <?php }else{ ?>
            <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <?php }?>
        
        <span class="icon-plus"></span>
        <span class="profilbild-hochladen"><?php echo smarty_function_xr_translate(array('tag'=>"Profilbild hochladen"),$_smarty_tpl);?>
</span>
        
        <div class="img-upload-label-container">
            <label class="img-upload-label">
            <input type="file" class="fileupload add-image-file" name="add-image-file" data-filename-placement="inside" title="Datei wählen">
            <span class="upload-progress-bar"></span>
        </label>        
        </div>
    </div>

    <div class="meinprofil-uebermich-inner">
    
    <span class="subheadline">
        <?php echo smarty_function_xr_translate(array('tag'=>"Über mich"),$_smarty_tpl);?>

    </span>
    
        <form class="form-mein-user" id="form-mein-user">
            <div class="form-group geschlecht">
                <div class="radio">
                    <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='F')){?>
                    <label for="female">
                        <input id="female" type="radio" name="GESCHLECHT" value="F" <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='F')){?>checked="checked"<?php }?> disabled="disabled">
                        <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                        <span class="icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                    </label>
                    <?php }else{ ?>
                    <label for="male">
                        <input id="male" type="radio" name="GESCHLECHT" value="M" <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='M')){?>checked="checked"<?php }?>  disabled="disabled">
                        <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
                        <span class="icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
                    </label>
                    <?php }?>
                </div>
            </div>
          
            
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
                <label class="email-notification"><?php echo smarty_function_xr_translate(array('tag'=>"Benachrichtigungen erlauben"),$_smarty_tpl);?>
</label>
                <label for="emailja" class="radio special-label">
                    <input id="emailja" type="radio" name="EMAILNOTIFICATION" value="Y" <?php if ($_smarty_tpl->getVariable('user')->value['wz_EMAILNOTIFICATION']=='Y'||$_smarty_tpl->getVariable('user')->value['wz_EMAILNOTIFICATION']==''){?>checked="checked"<?php }?>/>
                    <span class="checked circle circle-filled" style="background: #333; color: white;">ja</span>
                    <span class="unchecked circle circle-plain" style="color: #333; border: 1px solid #333;">ja</span>
                </label>
                <label for="emailnein" class="radio special-label">
                    <input id="emailnein" type="radio" name="EMAILNOTIFICATION" value="N" <?php if ($_smarty_tpl->getVariable('user')->value['wz_EMAILNOTIFICATION']=='N'){?>checked="checked"<?php }?>/>
                    <span class="checked circle circle-filled" style="background: #333; color: white;">nein</span>
                    <span class="unchecked circle circle-plain" style="color: #333; border: 1px solid #333;">nein</span>
                </label>
            </div>                
            <div class="form-group">
                <label for="telefon"><?php echo smarty_function_xr_translate(array('tag'=>"Telefon"),$_smarty_tpl);?>
</label>
                <input id="telefon" name="TELEFON" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_TELEFON'];?>
" class="form-control" />
            </div>
            
            <div class="form-group">
                <label for="land"><?php echo smarty_function_xr_translate(array('tag'=>"Land"),$_smarty_tpl);?>
</label>
                
                <select id="land" name="LAND" class="form-control select-helvetica">
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('user')->value['LAND_COMBO']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php if ($_smarty_tpl->getVariable('user')->value['wz_LAND']==$_smarty_tpl->tpl_vars['v']->value['id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['label'];?>
</option>
                    <?php }} ?>
                </select>
                
            </div>
            <div class="form-group">
                <label for="beschreibung"><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</label>
                <textarea id="beschreibung" style="background-color: rgba(105,121,135,0.1)!important;" name="BESCHREIBUNG" class="form-control" placeholder="..."><?php echo $_smarty_tpl->getVariable('user')->value['wz_BESCHREIBUNG'];?>
</textarea>
            </div>
          
            
                <div class="submitbutton-container">
                    <button id="form-mein-profil-save-user"><?php echo smarty_function_xr_translate(array('tag'=>"speichern"),$_smarty_tpl);?>
</button>
                </div>
            
            
        </form>
    </div>    
</div>