<?php /* Smarty version Smarty-3.0.7, created on 2016-02-22 20:13:41
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/727.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:76154127856cb5de5629429-44294199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '814012a2ecc39d9917f55b30137ee1387fb0a772' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/727.cache-3.html',
      1 => 1456163520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76154127856cb5de5629429-44294199',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_wzActionInvisibleCaptcha')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wzActionInvisibleCaptcha.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'resetPassword','triggerByVar'=>'doResend','triggerByVal'=>'1','var'=>'result'),$_smarty_tpl);?>


<div class="register">
     
    <?php echo smarty_function_xr_atom(array('a_id'=>723,'return'=>1,'desc'=>"closer"),$_smarty_tpl);?>

    
    <div class="clearfix"></div>
     
     <div class="register-inner">
         
        <div class="row">
            <div class="small-forms-spacer"></div>

            <?php if ($_smarty_tpl->getVariable('result')->value['status']=='NOT_ACTIVATED'){?>
                
                <p class="text"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort vergessen?"),$_smarty_tpl);?>
</span>
                
                <div class="passwort-vergessen-text">
                    <?php echo $_smarty_tpl->getVariable('PW_VERGESSEN_TEXT')->value;?>

                </div>
                <span class="text"><?php echo $_smarty_tpl->getVariable('TEXT')->value;?>
</span>
                <form id="wz_form-login" name="wz_form" class="wzFormLogin wzForm" action="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->getVariable('P_ID')->value),$_smarty_tpl);?>
" method="post">
                    <?php echo smarty_function_xr_wzActionInvisibleCaptcha(array(),$_smarty_tpl);?>

                    <input type='hidden' name='doResend' value='1'>
                    <div class="form-group">
            	        <label><?php echo smarty_function_xr_translate(array('tag'=>'E-Mail'),$_smarty_tpl);?>
:*</label>
            	        <input name="feuser_email" id="feuser_email" class="form-control" type="text" value="" rel="required_email" />
            	        <div class="error-div" id="feuser_email_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte gültige E-Mail eingeben'),$_smarty_tpl);?>
</div>
            	        <button id="form-pw-submit" class="pull-right" style="margin-top:25px;" type="submit" title="<?php echo smarty_function_xr_translate(array('tag'=>'Absenden'),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>'Absenden'),$_smarty_tpl);?>
</button>
            	    </div>
                    <div class="clear"></div>
                </form>
            		
            <?php }?>
            
            <?php if ($_smarty_tpl->getVariable('result')->value['status']=='USER_NOT_FOUND'){?>
                <h1 class="white-heading">
                    <span class="text"><?php echo smarty_function_xr_translate(array('tag'=>'Passwort vergessen'),$_smarty_tpl);?>
</span>
                </h1>
                <?php echo smarty_function_xr_translate(array('tag'=>'Die angebene E-Mail-Adresse ist im System nicht registriert!'),$_smarty_tpl);?>

                <div class="clearfix"></div>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
" class="backLink button" style="display:inline-block; margin-top:25px" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zurück'),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>'zurück'),$_smarty_tpl);?>
</a>
            <?php }?>
            
            <?php if ($_smarty_tpl->getVariable('result')->value['status']=='RESEND'){?>
                <h1 class="white-heading">
                    <span class="text"><?php echo smarty_function_xr_translate(array('tag'=>'Passwort vergessen'),$_smarty_tpl);?>
</span>
                </h1>
                <?php echo smarty_function_xr_translate(array('tag'=>'An Ihre E-Mail-Adresse wurde ein Link zum Zurücksetzen Ihres Passwortes geschickt.'),$_smarty_tpl);?>

                <div class="clearfix"></div>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
" class="backLink button" style="display:inline-block; margin-top:25px" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zurück'),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>'zurück'),$_smarty_tpl);?>
</a>	
            <?php }?>
            
            <?php if ($_smarty_tpl->getVariable('result')->value['status']=='TOKEN_NOT_FOUND'){?>
                <h1 class="white-heading">
                    <span class="text"><?php echo smarty_function_xr_translate(array('tag'=>'Passwort vergessen'),$_smarty_tpl);?>
</span>
                </h1>
                <?php echo smarty_function_xr_translate(array('tag'=>'Dieser Link ist nicht mehr gültig!'),$_smarty_tpl);?>

                <div class="clearfix"></div>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
" class="backLink button" style="display:inline-block; margin-top:25px" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zurück'),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>'zurück'),$_smarty_tpl);?>
</a>    
            <?php }?>
            
            <?php if ($_smarty_tpl->getVariable('result')->value['status']=='PWD_RESET_DONE'){?>
                <h1 class="white-heading">
                    <span class="text"><?php echo smarty_function_xr_translate(array('tag'=>'Passwort zurücksetzen'),$_smarty_tpl);?>
</span>
                </h1>
                
                <?php $_smarty_tpl->tpl_vars['form'] = new Smarty_variable('reset-password', null, null);?>
                <form name="reset-password" id="<?php echo $_smarty_tpl->getVariable('form')->value;?>
">
                <?php echo smarty_function_xr_wzActionInvisibleCaptcha(array(),$_smarty_tpl);?>

                <input name="UPDATEME" id="<?php echo $_smarty_tpl->getVariable('form')->value;?>
_UPDATEME" type="hidden" value="1" />
                <div class="row" style="display:none;">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="currentPWD"><?php echo smarty_function_xr_translate(array('tag'=>'Aktuelles Passwort'),$_smarty_tpl);?>
*</label>
                            <input class="form-control" name="currentPWD" id="currentPWD" type="password" value="<?php echo $_smarty_tpl->getVariable('result')->value['newPassword'];?>
" title="<?php echo smarty_function_xr_translate(array('tag'=>'Aktuelles Passwort'),$_smarty_tpl);?>
">
                            <input type="hidden" name="EMAIL" value="<?php echo $_smarty_tpl->getVariable('result')->value['user']['wz_EMAIL'];?>
" />
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="<?php echo $_smarty_tpl->getVariable('form')->value;?>
_PASSWORT">
                                <?php echo smarty_function_xr_translate(array('tag'=>'Neues Passwort'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->getVariable('P_ID')->value!=14){?>*<?php }?>
                            </label>
                    	    <input class="form-control" type="password" name="PASSWORT" id="<?php echo $_smarty_tpl->getVariable('form')->value;?>
_PASSWORT" title="<?php echo smarty_function_xr_translate(array('tag'=>'Geben Sie hier das Passwort ein, das Sie für die Anmeldung benutzen wollen.'),$_smarty_tpl);?>
" value="" />
                    	    <div class="error-div" id="<?php echo $_smarty_tpl->getVariable('form')->value;?>
_PASSWORT_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Passwort eingeben'),$_smarty_tpl);?>
</div>
                    	    <div class="error-div" id="<?php echo $_smarty_tpl->getVariable('form')->value;?>
_PASSWORTSHORT_error"><?php echo smarty_function_xr_translate(array('tag'=>'Mindestens 6 Zeichen'),$_smarty_tpl);?>
</div>
                        </div>
                    </div> 
                </div>
                
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="<?php echo $_smarty_tpl->getVariable('form')->value;?>
_PASSWORT2"><?php echo smarty_function_xr_translate(array('tag'=>'Neues Passwort wiederholen'),$_smarty_tpl);?>
*</label>
                    	    <input class="form-control" type="password" name="PASSWORT2" id="<?php echo $_smarty_tpl->getVariable('form')->value;?>
_PASSWORT2" title="<?php echo smarty_function_xr_translate(array('tag'=>'Geben Sie hier das gleiche Passwort ein zweites Mal ein.'),$_smarty_tpl);?>
" value="" />
                    	    <div class="error-div" id="<?php echo $_smarty_tpl->getVariable('form')->value;?>
_PASSWORT2_error"><?php echo smarty_function_xr_translate(array('tag'=>'Die Passwörter stimmen nicht überein'),$_smarty_tpl);?>
</div>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <a href="#" class="button pull-right" id="reset-password-btn"><?php echo smarty_function_xr_translate(array('tag'=>'Speichern'),$_smarty_tpl);?>
</a>
                    </div> 
                </div>    
                </form>
                <div class="thx-container" style="display:none">
                    <p class="subheadline"><?php echo smarty_function_xr_translate(array('tag'=>"Dein Passwort wurde"),$_smarty_tpl);?>
</p>
                    <p class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"erfolgreich geändert!"),$_smarty_tpl);?>
</p>
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
" style="display:inline-block; margin-top:10px;" class="button" title="<?php echo smarty_function_xr_translate(array('tag'=>"zum Login"),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"zum Login"),$_smarty_tpl);?>
</a>
                </div>
            <?php }?>
        </div>
    </div>
</div>