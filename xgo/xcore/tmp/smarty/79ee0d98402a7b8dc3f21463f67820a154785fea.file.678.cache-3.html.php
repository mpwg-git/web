<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 13:39:33
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/678.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:111564323358bffb85c5d005-13589662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79ee0d98402a7b8dc3f21463f67820a154785fea' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/678.cache-3.html',
      1 => 1488885596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111564323358bffb85c5d005-13589662',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?>

<?php if (!$_smarty_tpl->getVariable('user')->value){?>
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
            <input type="file" id="file" class="fileupload add-image-file" name="add-image-file" data-filename-placement="inside" title="Datei wählen">
            <span class="upload-progress-bar"></span>
        </label>        
        </div>
    </div>

    <div class="meinprofil-uebermich-inner">
    
    <span class="subheadline">
        <?php echo smarty_function_xr_translate(array('tag'=>"Über mich"),$_smarty_tpl);?>

    </span>
    
        <form class="form-mein-user" id="form-mein-user">
            <div class="geschlecht-chooser geschlecht">
                <div class="form-group">
                    <div class="radio">
                        <label for="female">
                            <input id="female" type="radio" name="GESCHLECHT" value="F" <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='F')){?>checked="checked"<?php }?>>
                            <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                            <span class="icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                        </label>
                        <label for="male">
                            <input id="male" type="radio" name="GESCHLECHT" value="M" <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='M')){?>checked="checked"<?php }?>>
                            <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
                            <span class="icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
                        </label>
                    </div>
                </div>
            </div>
            
            <!--<div class="form-group">-->
            <!--    <label for="vorname"><?php echo smarty_function_xr_translate(array('tag'=>"Vorname"),$_smarty_tpl);?>
</label>-->
            <!--    <input id="vorname" name="VORNAME" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_VORNAME'];?>
" class="form-control" />-->
            <!--</div>-->
            <!--<div class="form-group">-->
            <!--    <label for="nachname"><?php echo smarty_function_xr_translate(array('tag'=>"Nachname"),$_smarty_tpl);?>
</label>-->
            <!--    <input id="nachname" name="NACHNAME" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_NACHNAME'];?>
" class="form-control" />-->
            <!--</div>-->
            
            <div class="form-group">
                <label for="vorname"><?php echo smarty_function_xr_translate(array('tag'=>"Vorname"),$_smarty_tpl);?>
</label>
                <input id="vorname" name="VORNAME" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_VORNAME'];?>
" class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'Vorname'),$_smarty_tpl);?>
"/>
                <div class="error-div" id="VORNAME_error">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="error-message"><?php echo smarty_function_xr_translate(array('tag'=>"Bitte Vorname eingeben"),$_smarty_tpl);?>
</span>
                </div>
            </div>
            <div class="form-group">
                <label for="nachname"><?php echo smarty_function_xr_translate(array('tag'=>"Nachname"),$_smarty_tpl);?>
</label>
                <input id="nachname" name="NACHNAME" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_NACHNAME'];?>
" class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'Nachname'),$_smarty_tpl);?>
" />
                <div class="error-div" id="NACHNAME_error">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="error-message"><?php echo smarty_function_xr_translate(array('tag'=>"Bitte Nachname eingeben"),$_smarty_tpl);?>
</span>
                </div>
            </div>
            
            <div id="geburtsdatum" class="form-group hasDatePicker">
                <label for="geburtsdatum"><?php echo smarty_function_xr_translate(array('tag'=>"Geburtsdatum"),$_smarty_tpl);?>
</label>
                <?php if ($_smarty_tpl->getVariable('user')->value['wz_GEBURTSDATUM']==0000-00-00){?>
                    <input id="geburtsdatum" name="GEBURTSDATUM" class="form-control datepicker-birthday" onclick="this.style.color='inherit';" style="color: rgba(105,121,135,0.1);" />
                <?php }else{ ?>
                    <input id="geburtsdatum" name="GEBURTSDATUM" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_GEBURTSDATUM'];?>
" class="form-control datepicker-birthday" />
                <?php }?>
            </div>

            
            <div class="form-group">
                <label for="email"><?php echo smarty_function_xr_translate(array('tag'=>"Email"),$_smarty_tpl);?>
</label>
                <input id="email" name="EMAIL" disabled="true" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_EMAIL'];?>
" class="form-control" />
            </div>
            
            <div class="form-group">
                <label for="emailbenachrichtigung" style="font-size: 1.4rem;"><?php echo smarty_function_xr_translate(array('tag'=>"Benachrichtigungen erlauben"),$_smarty_tpl);?>
</label>
                <select id="emailbenachrichtigung" name="EMAILBENACHRICHTIGUNG" class="form-control select-helvetica">
                    <option value='<?php echo smarty_function_xr_translate(array('tag'=>"DE"),$_smarty_tpl);?>
' <?php if (($_smarty_tpl->getVariable('user')->value['wz_EMAILBENACHRICHTIGUNG']=='DE')){?>selected="selected"<?php }?>><?php echo smarty_function_xr_translate(array('tag'=>"DEUTSCH"),$_smarty_tpl);?>
</option>
                    <option value='<?php echo smarty_function_xr_translate(array('tag'=>"EN"),$_smarty_tpl);?>
' <?php if (($_smarty_tpl->getVariable('user')->value['wz_EMAILBENACHRICHTIGUNG']=='EN')){?>selected="selected"<?php }?>><?php echo smarty_function_xr_translate(array('tag'=>"ENGLISCH"),$_smarty_tpl);?>
</option>
                    <option value='<?php echo smarty_function_xr_translate(array('tag'=>"KEINE"),$_smarty_tpl);?>
' <?php if (($_smarty_tpl->getVariable('user')->value['wz_EMAILBENACHRICHTIGUNG']=='KEINE')){?>selected="selected"<?php }?>><?php echo smarty_function_xr_translate(array('tag'=>"Keine Benachrichtigungen erlauben"),$_smarty_tpl);?>
</option>
                </select>
            </div>

            <div class="form-group">
                <label for="telefon"><?php echo smarty_function_xr_translate(array('tag'=>"Telefon"),$_smarty_tpl);?>
</label>
                <input type="tel" id="telefon" name="TELEFON" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_TELEFON'];?>
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