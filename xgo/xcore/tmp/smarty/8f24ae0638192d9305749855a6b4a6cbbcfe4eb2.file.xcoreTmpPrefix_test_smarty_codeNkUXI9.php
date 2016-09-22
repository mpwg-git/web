<?php /* Smarty version Smarty-3.0.7, created on 2016-01-11 17:53:15
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNkUXI9" */ ?>
<?php /*%%SmartyHeaderCode:17475545395693ddfb184d06-16520949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f24ae0638192d9305749855a6b4a6cbbcfe4eb2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNkUXI9',
      1 => 1452531195,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17475545395693ddfb184d06-16520949',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'doLogin','triggerByVar'=>'doLogin','triggerByVal'=>'1','var'=>'info'),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('info')->value['state']==0){?>
<div class="errorNotification">
    <b><?php echo smarty_function_xr_translate(array('tag'=>'Der eingegebene Benutzername oder das Passwort sind falsch.'),$_smarty_tpl);?>
</b>
    <br />
    <?php echo smarty_function_xr_translate(array('tag'=>'Bitte versuchen Sie es erneut, oder klicken Sie unten auf "Login-Daten vergessen?"'),$_smarty_tpl);?>

     <br /><br />
</div>
<?php }else{ ?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_cookie::sc_loginOKcanCreateCookiex','var'=>'xx'),$_smarty_tpl);?>
<?php }?>

<form role="form" action="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->getVariable('P_ID')->value),$_smarty_tpl);?>
" id="form-login" method="post">
    <div class="form-group">
        <input type='hidden' name='doLogin' value='1' />
        <label for="wz_EMAIL"><span class="small">e</span>Mail</label>
        <input id="wz_EMAIL" type="email" name="wz_EMAIL" class="form-control" rel="required_email" />
        <div class="error-div" id="wz_EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte gültige E-Mail eingeben'),$_smarty_tpl);?>
</div>
    </div>
    <div class="form-group">
        <label for="passwort"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort?"),$_smarty_tpl);?>
</label>
        <input id="wz_PASSWORT" name="wz_PASSWORT" type="password" class="form-control" rel="required"/>
        <div class="error-div" id="wz_PASSWORT_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Passwort eingeben'),$_smarty_tpl);?>
</div>
        
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>25),$_smarty_tpl);?>
" class="forgotpw"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort vergessen?"),$_smarty_tpl);?>
</a>
    </div>

    <div class="form-group">
        <input type="checkbox" name="use_cookie" id="use-cookie">
        <label for="use-cookie"><?php echo smarty_function_xr_translate(array('tag'=>"Angemeldet bleiben"),$_smarty_tpl);?>
</label>
    </div>
    
    
    <button class="button" id="form-login-submit"><?php echo smarty_function_xr_translate(array('tag'=>"Anmelden"),$_smarty_tpl);?>
</button>
    <br>
    <br>
   
</form>
<form role="form" action="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
" id="form-registernew" method="post">
  <button class="button" id="registernew"><a style="text-transform: uppercase;" href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Jetzt Registrieren"),$_smarty_tpl);?>
</a></button>
</form>