<?php /* Smarty version Smarty-3.0.7, created on 2017-02-23 14:49:46
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAjE7st" */ ?>
<?php /*%%SmartyHeaderCode:177832153058aee87adbfc71-71048041%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3512f7c6891a4b8036b4194b2dd4dbdf13d5c34' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAjE7st',
      1 => 1487857786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177832153058aee87adbfc71-71048041',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_wzActionInvisibleCaptcha')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wzActionInvisibleCaptcha.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::redirectIfLoggedIn"),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getInitFragen",'var'=>"fragen"),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_room::sc_getMieteByRoomHash",'var'=>"miete"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserMailByRoomHash",'var'=>"mailaddr"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_room::sc_getRoomAdresseByRoomHash",'var'=>"addr"),$_smarty_tpl);?>


<form method="post" id="wg-zimmer-finden">
    <?php echo smarty_function_xr_wzActionInvisibleCaptcha(array(),$_smarty_tpl);?>
    
    <div class="register-fragen">
    
        <div class="row">
            <div class="col-xs-12">
                <br />
                <h2><?php echo smarty_function_xr_translate(array('tag'=>'Mein freies Zimmer'),$_smarty_tpl);?>
:</h2>
            </div>
            
        </div>
        
        <div class="row">
            <div class="col-xs-3" style="max-width: 150px; padding-top: 8px;color: #fff;">
                <?php echo smarty_function_xr_translate(array('tag'=>'Genaue Adresse'),$_smarty_tpl);?>
:
            </div>
            <div class="col-xs-7 col-lg-6 col-xl-5">
                <form>
                    <?php echo smarty_function_xr_atom(array('a_id'=>898,'addClass'=>"location-start",'return'=>1),$_smarty_tpl);?>

                </form>
                <!--<small class="small"><?php echo smarty_function_xr_translate(array('tag'=>'Dieser Ort wird auch verwendet, um von Anbietern gefunden zu werden.'),$_smarty_tpl);?>
</small>-->

            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-xs-3" style="max-width: 150px; padding-top: 8px; color: #fff;">
                <?php echo smarty_function_xr_translate(array('tag'=>'Miete'),$_smarty_tpl);?>
:
            </div>
            <div class="col-xs-7 col-lg-6 col-xl-5">
                <?php if ((isset($_REQUEST['h'])&&($_smarty_tpl->getVariable('miete')->value!=''||$_smarty_tpl->getVariable('miete')->value!=0))){?>
                    <input type="text" name="MIETEMAX" id="MIETEMAX" value='<?php echo $_smarty_tpl->getVariable('miete')->value;?>
' class="form-control" rel="required" />
                <?php }else{ ?>
                    <input type="text" name="MIETEMAX" id="MIETEMAX" value="" class="form-control" rel="required" />
                <?php }?>
                <div class="error-div" id="MIETEMAX_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Miete angeben'),$_smarty_tpl);?>
</div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-xs-12">
                <br /><br />
                <h2><?php echo smarty_function_xr_translate(array('tag'=>'Mein perfekter Mitbewohner'),$_smarty_tpl);?>
:</h2>
            </div>
        </div>
    
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fragen')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    
            <div class="row">
                <div class="col-xs-12">
                    <h4><?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_FRAGE'];?>
</h4>
                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'];?>
" class="hidden-fragen" />
                </div>
            </div>
    
            <?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['OPTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['o']->key;
?>
    
            <div class="row">
                <div class="col-xs-1" style="max-width: 20px;">
                    <input type="checkbox" class="checkboxV2" name="frage[<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['o']->value['wz_id'];?>
" data-frage="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'];?>
">
                </div>
                <div class="col-xs-9">
                    <label for="antwort_<?php echo $_smarty_tpl->tpl_vars['o']->value['wz_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['o']->value['wz_TEXT'];?>
</label>
                </div>
            </div>
    
            <?php }} ?>
    
            <div class="row">
                <div class="col-xs-1" style="max-width: 20px;"></div>
                <div class="col-xs-9">
                    <div class="error-div checkbox-error" id="FRAGE_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'];?>
_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Auswahl treffen'),$_smarty_tpl);?>
</div>
                </div>
            </div>
    
        <?php }} ?>
    
        <br /><br />
    
        <div class="row">
            <div class="col-xs-1" style="max-width: 20px;">
                <input type="checkbox" name="AGB" id="agb-accept" rel="required_check">
            </div>
            <div class="col-xs-9">
                <label for="agb-accept"><?php echo smarty_function_xr_translate(array('tag'=>"Ich akzeptiere die"),$_smarty_tpl);?>
 <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>38),$_smarty_tpl);?>
" target="_blank"  style="text-decoration:underline;"><?php echo smarty_function_xr_translate(array('tag'=>"AGB"),$_smarty_tpl);?>
</a></label>
                <div class="error-div" id="agb-accept_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte akzeptieren Sie die AGB'),$_smarty_tpl);?>
</div>
            </div>
        </div>
    
        <div class="row" style="padding-top: 18px; display:none;" id="show-simple-login-form">
            <div class="col-xs-5"></div>
            <div class="col-xs-5 pull-right register-inner" style="max-width: 360px;margin-right: 7em;">
    
                <div class="form-group">
                    <label for="vorname"><?php echo smarty_function_xr_translate(array('tag'=>"Vorname?"),$_smarty_tpl);?>
*</label>
                    <input id="VORNAME" name="VORNAME" class="form-control" rel="required2" />
                    <div class="error-div" id="VORNAME_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Vorname angeben'),$_smarty_tpl);?>
</div>
                </div>
                <?php if (isset($_REQUEST['h'])){?>
                    <input type='hidden' name='h' value='<?php echo $_REQUEST['h'];?>
' />
                    <input type='hidden' name='activate' value='1' />
                <?php }?>
                <div class="form-group">
                    <label for="nachname"><?php echo smarty_function_xr_translate(array('tag'=>"Nachname?"),$_smarty_tpl);?>
*</label>
                    <input id="NACHNAME" name="NACHNAME" class="form-control" rel="required2" />
                    <div class="error-div" id="NACHNAME_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Nachname angeben'),$_smarty_tpl);?>
</div>
                </div>
    
                <div class="form-group">
                    <!--<input type='hidden' name='doLogin' value='1' />-->
                    <label for="v2_EMAIL"><span class="small">e</span>Mail</label>
                    <?php if ((isset($_REQUEST['h'])&&$_smarty_tpl->getVariable('mailaddr')->value!='')){?>
                        <input id="v2_EMAIL" type="email" name="v2_EMAIL" class="form-control" value='<?php echo $_smarty_tpl->getVariable('mailaddr')->value;?>
'/>
                    <?php }else{ ?>
                        <input id="v2_EMAIL" type="email" name="v2_EMAIL" class="form-control" />
                    <?php }?>
                    <div class="error-div" id="v2_EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte gültige E-Mail eingeben'),$_smarty_tpl);?>
</div>
                    <div class="error-div" id="v2_PASSWORT_wrong_error">
                        <?php echo smarty_function_xr_translate(array('tag'=>"Diese Emailadresse ist bereits registriert."),$_smarty_tpl);?>

                    </div>
                </div>
                
                <div class="form-group">
                    <label for="v2_PASSWORT"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort?"),$_smarty_tpl);?>
</label>
                    <input id="v2_PASSWORT" name="v2_PASSWORT" type="password" class="form-control" rel="required2_minlength" data-minlength="6" />
                    <div class="error-div" id="v2_PASSWORT_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Passwort eingeben'),$_smarty_tpl);?>
</div>
                    <div class="error-div" id="v2_PASSWORT_minlength_error"><?php echo smarty_function_xr_translate(array('tag'=>'Mindestlänge: 6 Zeichen'),$_smarty_tpl);?>
</div>
                </div>
                <div class="form-group">
                    <label for="v2_PASSWORT"><?php echo smarty_function_xr_translate(array('tag'=>'Passwort wiederholen'),$_smarty_tpl);?>
*</label>
                    <input id="v2_PASSWORT_confirm" name="v2_PASSWORT_confirm" type="password" class="form-control" title="<?php echo smarty_function_xr_translate(array('tag'=>'Geben Sie hier das Passwort ein, das Sie für die Anmeldung benutzen wollen.'),$_smarty_tpl);?>
" required/>
                    <div class="error-div" id="v2_PASSWORT_confirm_error"><?php echo smarty_function_xr_translate(array('tag'=>'Die Passwörter stimmen nicht überein'),$_smarty_tpl);?>
</div>
                </div>
    
                <div class="geschlecht-chooser geschlecht">
                <div class="form-group">
                    <div class="radio">
                        <label for="female">
                            <input id="female" type="radio" name="GESCHLECHT" value="female" rel="required2_radio_oneofmany">
                            <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                            <span class="icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                        </label>
                        <label for="male">
                            <input id="male" type="radio" name="GESCHLECHT" value="male"  rel="required2_radio_oneofmany">
                            <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
                            <span class="icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
                        </label>
                    </div>
                     <div class="error-div" id="GESCHLECHT_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Geschlecht auswählen'),$_smarty_tpl);?>
</div>
                </div>
    
                </div>
            </div>
        </div>
    
        <div class="row" style="padding-top: 25px;">
            <div class="col-xs-5">
                <button class="button start-button <?php if ($_REQUEST['h']){?>fb-login-submit<?php }else{ ?>js-fb-login<?php }?>"><?php echo smarty_function_xr_translate(array('tag'=>'Mit Facebook Registrieren'),$_smarty_tpl);?>
</button>
            </div>
            <div class="col-xs-5 pull-right" style="margin-right: 6rem;">
                <button id="js-simple-login" style="display:none;" class="button start-button js-simple-login"><?php echo smarty_function_xr_translate(array('tag'=>'Mit eMail adresse registrieren'),$_smarty_tpl);?>
</button>
                <button class="button start-button js-show-simple-login"><?php echo smarty_function_xr_translate(array('tag'=>'Mit eMail adresse registrieren'),$_smarty_tpl);?>
</button>
    
            </div>
        </div>
    
        <br /><br /><br /><br />
    
    </div>

</form>
