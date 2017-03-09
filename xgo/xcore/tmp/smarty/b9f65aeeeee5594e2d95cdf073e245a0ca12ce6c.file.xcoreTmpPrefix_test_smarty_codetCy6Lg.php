<?php /* Smarty version Smarty-3.0.7, created on 2017-02-23 15:48:58
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetCy6Lg" */ ?>
<?php /*%%SmartyHeaderCode:201685186158aef65a468df8-65031320%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9f65aeeeee5594e2d95cdf073e245a0ca12ce6c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetCy6Lg',
      1 => 1487861338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201685186158aef65a468df8-65031320',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div id="main-content">
    <div class="register-fragen">
        <div class="col-md-3">
            <div class="register-wunsch-wg">
                <h3><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h3-wunschWG'),$_smarty_tpl);?>
</h3>

                <h5><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h5-ort'),$_smarty_tpl);?>
</h5>
                <div class="input-icon search-input search-input-map">
                    <input type="text" class="form-control autocomplete-location-v2" id="ADRESSE" rel="required" name="ADRESSE" value="" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'Stadt, Ort, PLZ?'),$_smarty_tpl);?>
" autocomplete="off">
                    <span class="icon-Map js-autocomplete-duck"><span class="path1"></span><span class="path2"></span></span>
                </div>
                <div class="location-hidden-container">
                    <input type="hidden" name="ADRESSE_STRASSE" class="location-strasse route" value="">
                    <input type="hidden" name="ADRESSE_STRASSE_NR" class="location-strasse-nr street_number" value="">
                    <input type="hidden" name="ADRESSE_PLZ" class="location-plz postal_code" value="">
                    <input type="hidden" name="ADRESSE_STADT" class="location-stadt locality" value="Wien">
                    <input type="hidden" name="ADRESSE_LAND" class="location-land country" value="AT">
                    <input type="hidden" name="ADRESSE_LAT" class="location-lat" value="">
                    <input type="hidden" name="ADRESSE_LNG" class="location-lng" value="">
                    <input type="hidden" class="administrative_area_level_1">
                </div>
                <div class="error-div" id="ADRESSE_error">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="display: none;"></span>
                    <span class="error-message"><?php echo smarty_function_xr_translate(array('tag'=>'error_adresse'),$_smarty_tpl);?>
</span>
                </div>

                <h5><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h5-miete'),$_smarty_tpl);?>
</h5>
                <input type="text" name="MIETEMAX" id="MIETEMAX" value="" placeholder="€?" class="form-control" rel="required">
                <div class="error-div" id="MIETEMAX_error"><?php echo smarty_function_xr_translate(array('tag'=>'error_miete'),$_smarty_tpl);?>
</div>
            </div>
        </div>




        <div class="col-md-6">
            
            <div class="register-fragebogen">
                <h3><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h3-fragebogen'),$_smarty_tpl);?>
</h3>
                <div class="row">
                    <div class="col-md-7"><h4 class="text-uppercase">1. Sauberkeitslevel</h4></div>
                    <div class="col-md-2 text-right"><h7 class="h7">Wenig<br>wichtig</h7></div>
                    <div class="col-md-1 text-center no-gutter"><input type="checkbox" data-toggle="toggle"></div>
                    <div class="col-md-2 text-left"><h7 class="h7">Super<br>wichtig</h7></div>
                </div>
                <hr>
            </div>
            
        </div>




        <div class="col-md-3">
            <div class="register-konto">
                <h3><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h3-konto'),$_smarty_tpl);?>
</h3>
                <h6 class="mpwg-color text-uppercase"><?php echo smarty_function_xr_translate(array('tag'=>'reg_konto-info'),$_smarty_tpl);?>
</h6>
                <button class="button text-uppercase" id="fb-login-submit"><span class="fb-f">f </span><?php echo smarty_function_xr_translate(array('tag'=>'Mit Facebook anmelden'),$_smarty_tpl);?>
</button>


                <div id="anmelden-inner-inner" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <form role="form" action="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->getVariable('P_ID')->value),$_smarty_tpl);?>
" id="form-login" method="post">
                            <div class="form-group">
                                <input type='hidden' name='doLogin' value='1' />
                                <?php if (isset($_REQUEST['h'])){?>
                                    <input type='hidden' name='h' value='<?php echo $_REQUEST['h'];?>
' />
                                    <input type='hidden' name='activate' value='1' />
                                    <?php }?>
                                        <label for="wz_EMAIL" class="text-uppercase"><h5>Email</h5></label>
                                        <input id="wz_EMAIL" type="email" name="wz_EMAIL" class="form-control" rel="required_email">
                                        <div class="error-div" id="wz_EMAIL_error">
                                            <?php echo smarty_function_xr_translate(array('tag'=>'error_email-notvalid'),$_smarty_tpl);?>

                                        </div>
                            </div>
                            <div class="form-group">
                                <label for="passwort" class="text-uppercase"><h5><?php echo smarty_function_xr_translate(array('tag'=>'Passwort'),$_smarty_tpl);?>
</h5></label>
                                <input id="wz_PASSWORT" name="wz_PASSWORT" type="password" class="form-control" rel="required">
                                <div class="error-div" id="wz_PASSWORT_error">
                                    <?php echo smarty_function_xr_translate(array('tag'=>'error_pwd-enter'),$_smarty_tpl);?>

                                </div>
                                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>25),$_smarty_tpl);?>
" class="forgotpw">
                                    <?php echo smarty_function_xr_translate(array('tag'=>"Passwort vergessen?"),$_smarty_tpl);?>

                                </a>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="use_cookie" id="use-cookie">
                                <label for="use-cookie" class="label-use-cookie"><?php echo smarty_function_xr_translate(array('tag'=>'Angemeldet bleiben'),$_smarty_tpl);?>
</label>
                            </div>
                        </form>
                    </div>
                </div>

                <a data-toggle="collapse" href="#anmelden-inner-inner"><button class="button text-uppercase" id="form-login-submit"><?php echo smarty_function_xr_translate(array('tag'=>'Anmelden'),$_smarty_tpl);?>
</button></a>
                <hr>

                <h3><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h3-keinKonto'),$_smarty_tpl);?>
</h3>
                <h6 class="mpwg-color text-uppercase"><?php echo smarty_function_xr_translate(array('tag'=>'reg_keinKonto-info'),$_smarty_tpl);?>
</h6>
                <div id="register-inner-inner" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <form method="post" id="wg-zimmer-finden">
                            <div class="form-group">
                                <label class="radio-inline"><input type="radio" name="optradio"><h5><?php echo smarty_function_xr_translate(array('tag'=>'reg_sex-female'),$_smarty_tpl);?>
</h5></label>
                                <label class="radio-inline"><input type="radio" name="optradio"><h5><?php echo smarty_function_xr_translate(array('tag'=>'reg_sex-male'),$_smarty_tpl);?>
</h5></label>
                            </div>
                            <div class="form-group">
                                <label for="vorname"><h5><?php echo smarty_function_xr_translate(array('tag'=>"Vorname?"),$_smarty_tpl);?>
*</h5></label>
                                <input id="VORNAME" name="VORNAME" class="form-control" rel="required2" />
                                <div class="error-div" id="VORNAME_error">
                                    <?php echo smarty_function_xr_translate(array('tag'=>'Bitte Vorname angeben'),$_smarty_tpl);?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nachname"><h5><?php echo smarty_function_xr_translate(array('tag'=>"Nachname?"),$_smarty_tpl);?>
*</h5></label>
                                <input id="NACHNAME" name="NACHNAME" class="form-control" rel="required2" />
                                <div class="error-div" id="NACHNAME_error">
                                    <?php echo smarty_function_xr_translate(array('tag'=>'Bitte Nachname angeben'),$_smarty_tpl);?>

                                </div>
                            </div>

                            <div class="form-group">
                                <!--<input type='hidden' name='doLogin' value='1' />-->
                                <label for="v2_EMAIL"><h5>Email*</h5></label>
                                <input id="v2_EMAIL" type="email" name="v2_EMAIL" class="form-control" />
                                <div class="error-div" id="v2_EMAIL_error">
                                    <?php echo smarty_function_xr_translate(array('tag'=>'Bitte gültige E-Mail eingeben'),$_smarty_tpl);?>

                                </div>
                                <div class="error-div" id="v2_PASSWORT_wrong_error">
                                    <?php echo smarty_function_xr_translate(array('tag'=>"Diese Emailadresse ist bereits registriert."),$_smarty_tpl);?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="v2_PASSWORT"><h5><?php echo smarty_function_xr_translate(array('tag'=>"Passwort?"),$_smarty_tpl);?>
*</h5></label>
                                <input id="v2_PASSWORT" name="v2_PASSWORT" type="password" class="form-control" rel="required2_minlength" data-minlength="6" required/>
                                <div class="error-div" id="v2_PASSWORT_error">
                                    <?php echo smarty_function_xr_translate(array('tag'=>'Bitte Passwort eingeben'),$_smarty_tpl);?>

                                </div>
                                <div class="error-div" id="v2_PASSWORT_minlength_error">
                                    <?php echo smarty_function_xr_translate(array('tag'=>'Mindestlänge: 6 Zeichen'),$_smarty_tpl);?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="v2_PASSWORT"><h5><?php echo smarty_function_xr_translate(array('tag'=>'Passwort wiederholen'),$_smarty_tpl);?>
*</h5></label>
                                <input id="v2_PASSWORT_confirm" name="v2_PASSWORT_confirm" type="password" class="form-control" title="<?php echo smarty_function_xr_translate(array('tag'=>'Geben Sie hier das Passwort ein, das Sie für die Anmeldung benutzen wollen.'),$_smarty_tpl);?>
" required/>
                                <div class="error-div" id="v2_PASSWORT_confirm_error">
                                    <?php echo smarty_function_xr_translate(array('tag'=>'Die Passwörter stimmen nicht überein'),$_smarty_tpl);?>

                                </div>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="AGB" id="agb-accept" rel="required_check">
                                <label for="use-cookie" class="label-use-cookie"><?php echo smarty_function_xr_translate(array('tag'=>'ich akzeptiere die'),$_smarty_tpl);?>

                                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>38),$_smarty_tpl);?>
" target="_blank" style="text-decoration:underline;color:#333;">
                                        <?php echo smarty_function_xr_translate(array('tag'=>"AGB"),$_smarty_tpl);?>

                                    </a>
                                </label>
                                <div class="error-div" id="agb-accept_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte akzeptieren Sie die AGB'),$_smarty_tpl);?>
</div>
                            </div>
                        </form>
                    </div>
                </div>


                <a data-toggle="collapse" href="#register-inner-inner">
                    <button class="button start-button text-uppercase js-fb-login" id="fb-reg-submit"><span class="fb-f">f </span><?php echo smarty_function_xr_translate(array('tag'=>'Mit Facebook registrieren'),$_smarty_tpl);?>
</button>
                </a>
                <!--<a data-toggle="collapse" href="#anmelden-inner-inner">-->
                <!--    <button style="display:none;" class="button start-button text-uppercase js-simple-login" id="mail-reg-submit"><?php echo smarty_function_xr_translate(array('tag'=>'Mit eMail adresse registrieren'),$_smarty_tpl);?>
</button>-->
                <!--</a>-->
                <a data-toggle="collapse" href="#register-inner-inner">
                    <button class="button start-button text-uppercase js-show-simple-login" id="mail-reg-submit"><?php echo smarty_function_xr_translate(array('tag'=>'Mit eMail adresse registrieren'),$_smarty_tpl);?>
</button>
                </a>
            </div>
        </div>
    </div>

</div>