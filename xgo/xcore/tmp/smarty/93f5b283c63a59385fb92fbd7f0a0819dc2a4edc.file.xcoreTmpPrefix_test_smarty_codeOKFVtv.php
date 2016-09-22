<?php /* Smarty version Smarty-3.0.7, created on 2016-07-09 11:00:05
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOKFVtv" */ ?>
<?php /*%%SmartyHeaderCode:5421563675780bd15d30e13-24663979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93f5b283c63a59385fb92fbd7f0a0819dc2a4edc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOKFVtv',
      1 => 1468054805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5421563675780bd15d30e13-24663979',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::redirectIfLoggedIn"),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getInitFragen",'var'=>"fragen"),$_smarty_tpl);?>


<br /><br />

<div class="col-xs-12">

    <form method="post" id="wg-zimmer-finden">
    
    <div class="register-fragen">
        
        <div class="row">
            <div class="col-xs-12">
                <br />
                <h2 style="padding-bottom: 8px;"><?php echo smarty_function_xr_translate(array('tag'=>'Mein freies Zimmer'),$_smarty_tpl);?>
:</h2>
            </div>
            
        </div>
        
        <div class="row">
            <div class="col-xs-4" style="max-width: 100px; padding-top: 8px;">
                <?php echo smarty_function_xr_translate(array('tag'=>'Ort'),$_smarty_tpl);?>
:
            </div>
            <div class="col-xs-8">
                <form>
                    <?php echo smarty_function_xr_atom(array('a_id'=>898,'addClass'=>"location-start",'return'=>1),$_smarty_tpl);?>

                </form>
            </div>
        </div>
        
        <div class="row" style="padding-top: 8px;">
            <div class="col-xs-4" style="max-width: 100px; padding-top: 8px;">
                <?php echo smarty_function_xr_translate(array('tag'=>'Miete max'),$_smarty_tpl);?>
:
            </div>
            <div class="col-xs-8">
                <input type="text" name="MIETEMAX" id="MIETEMAX" value="" class="form-control" rel="required" />
                <div class="error-div" id="MIETEMAX_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Miete angeben'),$_smarty_tpl);?>
</div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <br />
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
" style="text-transform: none;"><?php echo $_smarty_tpl->tpl_vars['o']->value['wz_TEXT'];?>
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
                <label for="agb-accept"><?php echo smarty_function_xr_translate(array('tag'=>"ich akzeptiere die"),$_smarty_tpl);?>
 <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>38),$_smarty_tpl);?>
" target="_blank"  style="text-decoration:underline;"><?php echo smarty_function_xr_translate(array('tag'=>"AGB"),$_smarty_tpl);?>
</a></label>
                <div class="error-div" id="agb-accept_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte akzeptieren Sie die AGB'),$_smarty_tpl);?>
</div>
            </div>
        </div>
        
        <div class="row" style="padding-top: 18px;">
            <div class="col-xs-12 col-sm-5">
                <button class="button start-button js-fb-login"><?php echo smarty_function_xr_translate(array('tag'=>'Weiter mit Facebook Login'),$_smarty_tpl);?>
</button>
                <br class="hidden-sm" /><br class="hidden-sm" />
            </div>
        </div>
        
        <div class="row" style="padding-top: 18px; display:none;" id="show-simple-login-form">
            <div class="col-xs-12"></div>
            <div class="col-xs-12 pull-right register-inner register" style="max-width: 360px;">
                
                <div class="form-group">
                    <label for="vorname"><?php echo smarty_function_xr_translate(array('tag'=>"Vorname?"),$_smarty_tpl);?>
*</label>
                    <input id="VORNAME" name="VORNAME" class="form-control" rel="required2" />
                    <div class="error-div" id="VORNAME_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Vorname angeben'),$_smarty_tpl);?>
</div>
                </div>
                <div class="form-group">
                    <label for="nachname"><?php echo smarty_function_xr_translate(array('tag'=>"Nachname?"),$_smarty_tpl);?>
*</label>
                    <input id="NACHNAME" name="NACHNAME" class="form-control" rel="required2" />
                    <div class="error-div" id="NACHNAME_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Nachname angeben'),$_smarty_tpl);?>
</div>
                </div>
                
                <div class="form-group">
                    <input type='hidden' name='doLogin' value='1' />
                    <label for="v2_EMAIL"><span class="small">e</span>Mail</label>
                    <input id="v2_EMAIL" type="email" name="v2_EMAIL" class="form-control" />
                    <div class="error-div" id="v2_EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte gültige E-Mail eingeben'),$_smarty_tpl);?>
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
                    <div class="error-div" id="v2_PASSWORT_wrong_error"><?php echo smarty_function_xr_translate(array('tag'=>'Email oder Passwort falsch'),$_smarty_tpl);?>
</div>
                    <!--<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>25),$_smarty_tpl);?>
" class="forgotpw"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort vergessen?"),$_smarty_tpl);?>
</a>-->
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
        
        <div class="row" style="padding-top: 18px;">
            <div class="col-xs-5">
                <button class="button start-button js-fb-login"><?php echo smarty_function_xr_translate(array('tag'=>'Weiter mit Facebook Login'),$_smarty_tpl);?>
</button>
            </div>
            <div class="col-xs-5 pull-right" style="text-align: right; padding-right: 0px;">
                <button style="display:none;" class="button start-button js-simple-login"><?php echo smarty_function_xr_translate(array('tag'=>'Ich habe bereits ein Profil'),$_smarty_tpl);?>
</button>
                <button class="button start-button js-show-simple-login"><?php echo smarty_function_xr_translate(array('tag'=>'Ich habe bereits ein Profil'),$_smarty_tpl);?>
</button>
                
            </div>
        </div>
        
        <br /><br /><br />
        
    </div>
    
    </form>
</div>