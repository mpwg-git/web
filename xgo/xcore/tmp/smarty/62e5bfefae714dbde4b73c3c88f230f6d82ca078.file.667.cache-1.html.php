<?php /* Smarty version Smarty-3.0.7, created on 2017-02-20 14:41:33
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/667.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:88290859258aaf20d5b9774-50041695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62e5bfefae714dbde4b73c3c88f230f6d82ca078' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/667.cache-1.html',
      1 => 1486558322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88290859258aaf20d5b9774-50041695',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_changeLang')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_changeLang.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyData",'var'=>"data"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomData",'var'=>"roomdata"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRooms",'var'=>"roomdataNew"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getAllQuestionsAndState",'var'=>"wgtestdata"),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_search::getUserId','var'=>'id'),$_smarty_tpl);?>

<input type="hidden" id="hiddenUserId" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
">

<div class="meinprofil-container">
    
    
    <div class="col-xs-12 default-container-paddingtop">
        
        <span class="looklikeh1">
            <?php echo smarty_function_xr_translate(array('tag'=>"Profil"),$_smarty_tpl);?>

            <div style="clear:both"></div>
            <span class="subheadline whoiam"><?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?><?php echo smarty_function_xr_translate(array('tag'=>"Suchender"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_translate(array('tag'=>"Anbieter"),$_smarty_tpl);?>
<?php }?> - ID <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_id'];?>
</span>
            
            
            <div class="language-switch pull-right">
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'de'),$_smarty_tpl);?>
" class="<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?>active<?php }?>">DE</a> | <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'en'),$_smarty_tpl);?>
" class="<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='en'){?>active<?php }?>">EN</a>
            </div>
            
        </span>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>851,'return'=>1,'showFace'=>0),$_smarty_tpl);?>

        
        <ul class="meinprofil-options">
            
            <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getWgTestState",'userId'=>$_SESSION['xredaktor_feUser_wsf']['wz_id'],'var'=>'wgteststate'),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->getVariable('wgteststate')->value!=1&&$_smarty_tpl->getVariable('wgteststate')->value!=2){?>
            <br>
            <div style="color:black;" class="col-xs-8">
              <span><span class="icon-duck"></span>
              <span class="hallo-headline"><?php echo smarty_function_xr_translate(array('tag'=>"Hallo!"),$_smarty_tpl);?>
</span><br><?php echo smarty_function_xr_translate(array('tag'=>"Du hast deinen WG-Test noch nicht ausgeflüllt!"),$_smarty_tpl);?>
</span><br>
              <span ><?php echo smarty_function_xr_translate(array('tag'=>"Bitte investiere 5 Minuten in die Beantwortung deiner Erwartungen an deine Mitbewohner(innen)."),$_smarty_tpl);?>
<br></span>
              <span><?php echo smarty_function_xr_translate(array('tag'=>"Erst dann kann Dr.Duck Dir Deinen optimalen Mitbewohner finden."),$_smarty_tpl);?>
</span><br>
              <span><?php echo smarty_function_xr_translate(array('tag'=>"Du erkennst Sie an der hohen % Zahl im Profil."),$_smarty_tpl);?>
</span>
              
              <br><br>
             
            </div> 
            
            <div  class="col-xs-4">
                 <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'frageid'=>1),$_smarty_tpl);?>
"> 
                 <div class="stoerer">
                    <span><?php echo smarty_function_xr_translate(array('tag'=>"Zu den Fragen"),$_smarty_tpl);?>
</span> 
                 </div> 
                 </a>
            </div>
            
            
            
            <div class="clearfix">
               
               </a><br><br><br>
               
            </div>
             
            <?php }?>
            
            
            
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>42),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Über mich"),$_smarty_tpl);?>
</a>  
            </li>
            
            
            <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?> 
                <li>
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Meine Daten"),$_smarty_tpl);?>
</a>
                    
                </li>
            <?php }?>
            
            <!--
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'frageid'=>1),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Mein WG Test"),$_smarty_tpl);?>
</a> 
                <div class="meinprofil-meinkonto-collapse collapse" id="collapseProfileWgtest">
                    <?php if (empty($_smarty_tpl->getVariable('wgtestdata',null,true,false)->value)){?>
                        <?php echo smarty_function_xr_translate(array('tag'=>"Du hast noch keine Fragen beantwortet"),$_smarty_tpl);?>
. <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"WG Test jetzt starten"),$_smarty_tpl);?>
!</a>
                    <?php }else{ ?>
                        <p><strong>Bereits beantwortete Fragen:</strong></p>
                        <p>Meinung geändert? Einfach die Frage anklicken!</p>
                        <ul class="wgtest-ul">
                            
                        <?php if (count($_smarty_tpl->getVariable('wgtestdata')->value)<15){?>
                            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Fortsetzen"),$_smarty_tpl);?>
</a>
                        <?php }?>
                            
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('wgtestdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <li><span><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
.</span><a class="matching-fragen-ue" href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'frageid'=>$_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'],'m_suffix'=>$_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_FRAGE'];?>
</a></li>
                        <?php }} ?>
                        </ul>
                    <?php }?>
                    
                </div>
            </li>
            
            -->
            <li>
                <a data-toggle="collapse" href="#collapseProfileWgtest"><?php echo smarty_function_xr_translate(array('tag'=>"Mein WG Test"),$_smarty_tpl);?>
</a>        
                <div class="meinprofil-meinkonto-collapse collapse wg-test-collapse" id="collapseProfileWgtest">
                    <br/>
                    <?php if (empty($_smarty_tpl->getVariable('wgtestdata',null,true,false)->value)){?>
                        <p><?php echo smarty_function_xr_translate(array('tag'=>"Du hast noch keine Fragen beantwortet"),$_smarty_tpl);?>
. 
                            <br><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"WG Test jetzt starten"),$_smarty_tpl);?>
!</a>
                        </p>
                    <?php }else{ ?>
                        
                        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_wgtest::sc_get_fragen_count','var'=>'fragenGesamt'),$_smarty_tpl);?>

                        <div class="headline">
                            <?php echo smarty_function_xr_translate(array('tag'=>"Du hast bereits"),$_smarty_tpl);?>
 <?php echo count($_smarty_tpl->getVariable('wgtestdata')->value);?>
 / <?php echo $_smarty_tpl->getVariable('fragenGesamt')->value;?>
 <?php echo smarty_function_xr_translate(array('tag'=>"Fragen beantwortet"),$_smarty_tpl);?>
.
                        </div>
                    
                        <?php if (count($_smarty_tpl->getVariable('wgtestdata')->value)<$_smarty_tpl->getVariable('fragenGesamt')->value){?>
                            <a class="button link-zu-wgtest" href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Fortsetzen bei nächster unbeantworteten Frage"),$_smarty_tpl);?>
</a>
                        <?php }?>
                        
                        <a class="button link-zu-wgtest" href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'frageId'=>1,'m_suffix'=>'1/restart','restart'=>1),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Alle Fragen noch einmal durchgehen"),$_smarty_tpl);?>
</a>
                        
                    <?php }?>
                    <br/><br/>
                </div>
            </li>
            
            <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']!='suche'){?> 
                <li>
                    <a data-toggle="collapse" href="#collapseProfileRoom"><?php echo smarty_function_xr_translate(array('tag'=>"Meine Räume"),$_smarty_tpl);?>
</a>  
                    
                    <ul class="meinprofil-submenu collapse <?php if (isset($_REQUEST['room-list-view'])){?>in<?php }?>" id="collapseProfileRoom">
                        <?php echo smarty_function_xr_atom(array('a_id'=>850,'roomdataNew'=>$_smarty_tpl->getVariable('roomdataNew')->value,'return'=>1,'showFace'=>0),$_smarty_tpl);?>

                        
                        <?php echo smarty_function_xr_atom(array('a_id'=>852,'return'=>1,'showFace'=>0),$_smarty_tpl);?>

                    </ul>
                </li>
            <?php }?>
            
            
            <!-- 
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>15),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Mein Konto"),$_smarty_tpl);?>
</a>
                 <div class="meinprofil-meinkonto-collapse collapse" id="collapseProfileKonto">
                    <p><b><?php echo smarty_function_xr_translate(array('tag'=>"Kostenlos"),$_smarty_tpl);?>
 </b> <?php echo smarty_function_xr_translate(array('tag'=>"bis 1.2.2016"),$_smarty_tpl);?>
<br />(<?php echo smarty_function_xr_translate(array('tag'=>"Danach entstehende Kosten: nur nach expliziter Zustimmung"),$_smarty_tpl);?>
).</p> 
            		<p><?php echo smarty_function_xr_translate(array('tag'=>"Mitgliedschaft seit:"),$_smarty_tpl);?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['USER']['wz_created'],"%d.%m.%Y");?>
</p>
            		<div class="submitbutton-container">
                        <button id="form-del-account" class="button button-default button-small"><?php echo smarty_function_xr_translate(array('tag'=>"Account löschen"),$_smarty_tpl);?>
</button>
                    </div>
                </div>
            </li>
            -->
            
             <li>
                <a data-toggle="collapse" href="#collapseProfileKonto"><?php echo smarty_function_xr_translate(array('tag'=>"Mein Konto"),$_smarty_tpl);?>
</a>        
                <div class="meinprofil-meinkonto-collapse collapse wg-test-collapse <?php if (isset($_REQUEST['deactivate-account'])){?>in<?php }?>" id="collapseProfileKonto">
                    <br/>
                    
                    <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_MAIL_CHECKED']=='Y'){?>
                    
                        <!--
                        <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_EMAIL']!=''){?>
                            <a data-toggle="collapse" href="#collapseChangeMail" class="submitbutton-container button link-zu-wgtest"><?php echo smarty_function_xr_translate(array('tag'=>'EMailadresse ändern'),$_smarty_tpl);?>
</a>
                            <div class="meinprofil-meinkonto-collapse changeMail-collapse collapse" id="collapseChangeMail">
        
                                <form id="changeMail" name="changeMail" method="post" action="#" >
                                    <div class="form-group">
                                        <label for="email_neu"><?php echo smarty_function_xr_translate(array('tag'=>'Neue Emailadresse'),$_smarty_tpl);?>
</label>
                                        <input id="email_neu" name="email_neu" type="email" class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'Neue E-Mail eingeben'),$_smarty_tpl);?>
" required>
                                    </div>
                                    <div id="email-error-1" class="alert alert-danger" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="error-message"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte gültige E-Mail eingeben'),$_smarty_tpl);?>
</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_neu_confirm"><?php echo smarty_function_xr_translate(array('tag'=>'Neue Emailadresse wiederholen'),$_smarty_tpl);?>
</label>
                                        <input id="email_neu_confirm" name="email_neu_confirm" type="email" class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'Neue E-Mail wiederholen'),$_smarty_tpl);?>
">
                                    </div>
                                    <div id="email-error-2" class="alert alert-danger" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="error-message"><?php echo smarty_function_xr_translate(array('tag'=>'E-Mailadressen stimmen nicht überein'),$_smarty_tpl);?>
</span>
                                    </div>
                                    <div id="email-error-3" class="alert alert-danger" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="error-message"><?php echo smarty_function_xr_translate(array('tag'=>"Diese Emailadresse ist bereits registriert."),$_smarty_tpl);?>
</span>
                                    </div>

                                    <div id="changeMail-success" class="alert alert-success" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="error-message"><?php echo smarty_function_xr_translate(array('tag'=>'Änderungen gespeichert'),$_smarty_tpl);?>
</span>
                                    </div>
                                    <button type="submit" id="changeMail-btn" name="submit" class="btn btn-primary btn-block"><?php echo smarty_function_xr_translate(array('tag'=>"Änderung speichern"),$_smarty_tpl);?>
</button>
                                </form> 
                            </div>
                        <?php }?>
                        -->
                        
                        <!--CHANGE PASSWORD-->    
                        <a id="changePwd-link" data-toggle="collapse" href="#collapseChangePwd" class="submitbutton-container button link-zu-wgtest"><?php echo smarty_function_xr_translate(array('tag'=>'Passwort ändern'),$_smarty_tpl);?>
</a>
                        <div class="meinprofil-meinkonto-collapse changePwd-collapse collapse" id="collapseChangePwd">
                            <form id="changePwd" name="changePwd" method="post" action="#">
                                <div class="form-group">
                                    <label for="oldPasswd"><?php echo smarty_function_xr_translate(array('tag'=>'Aktuelles Passwort'),$_smarty_tpl);?>
</label>
                                    <input type="password" id="oldPasswd" name="oldPasswd" required class="form-control" value="" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'Aktuelles Passwort'),$_smarty_tpl);?>
">
                                </div>
                                <!--error-div-->
                                <div id="oldPasswd-error" class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="error-message error-message-1"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Passwort eingeben'),$_smarty_tpl);?>
</span>
                                    <span class="error-message error-message-2"><?php echo smarty_function_xr_translate(array('tag'=>'Aktuelles Passwort ist falsch'),$_smarty_tpl);?>
</span>
                                </div>
                                <!--END error-div-->
                                
                                <div class="form-group">
                                    <label for="newPasswd"><?php echo smarty_function_xr_translate(array('tag'=>'Neues Passwort'),$_smarty_tpl);?>
</label>
                                    <input type="password" id="newPasswd" name="newPasswd" required data-minlength="6" class="form-control" value="" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'Neues Passwort'),$_smarty_tpl);?>
">
                                </div>
                                <!--error-div-->
                                <div id="newPasswd-error" class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="error-message"><?php echo smarty_function_xr_translate(array('tag'=>'Mindestens 6 Zeichen'),$_smarty_tpl);?>
</span>
                                </div>
                                <!--END error-div-->
                                
                                <div class="form-group">
                                    <label for="newPasswdConfirm"><?php echo smarty_function_xr_translate(array('tag'=>'Neues Passwort wiederholen'),$_smarty_tpl);?>
</label>
                                    <input type="password" id="newPasswdConfirm" name="newPasswdConfirm" class="form-control" value="" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'Neues Passwort wiederholen'),$_smarty_tpl);?>
">
                                </div>
                                <!--error-div-->
                                <div id="newPasswdConfirm-error" class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="error-message"><?php echo smarty_function_xr_translate(array('tag'=>'Die Passwörter stimmen nicht überein'),$_smarty_tpl);?>
</span>
                                </div>
                                <!--END error-div-->
                                <div id="changePasswd-success" class="alert alert-success" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="error-message"><?php echo smarty_function_xr_translate(array('tag'=>'Änderungen gespeichert'),$_smarty_tpl);?>
</span>
                                </div>
                                <button type="submit" id="changePwd-btn" name="submit" class="btn btn-primary btn-block"><?php echo smarty_function_xr_translate(array('tag'=>"Änderung speichern"),$_smarty_tpl);?>
</button>
                            </form>
                            
                        </div>
                        <!--END CHANGE PASSWORD-->
                    
                    
                        <div class="submitbutton-container">
                             <button id="<?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_ACTIVE']=='Y'){?>form-deactivate-account<?php }else{ ?>form-reactivate-account<?php }?>" class="link-zu-wgtest">
                                <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_ACTIVE']=='Y'){?>
                                    <?php echo smarty_function_xr_translate(array('tag'=>"Account deaktivieren"),$_smarty_tpl);?>

                                <?php }else{ ?>
                                    <?php echo smarty_function_xr_translate(array('tag'=>"Account wieder aktivieren"),$_smarty_tpl);?>

                                <?php }?>
                            </button>
                        </div>
                    <?php }?>
                    
                    <div class="submitbutton-container">
                        <button id="form-del-account" class="button link-zu-wgtest"><?php echo smarty_function_xr_translate(array('tag'=>"Account löschen"),$_smarty_tpl);?>
</button>
                    </div>
                    
                    
                    <br/>
                </div>
            </li>
            

            
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>28),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Abmelden"),$_smarty_tpl);?>
</a>
                
            </li>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            
        </ul>
        
    </div>
</div>