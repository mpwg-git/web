<?php /* Smarty version Smarty-3.0.7, created on 2015-11-17 09:51:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUc63om" */ ?>
<?php /*%%SmartyHeaderCode:2145679288564aeaaebc5697-84853083%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1f838f968909c1cdd5ee413489f3bd318d1aa97' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUc63om',
      1 => 1447750318,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2145679288564aeaaebc5697-84853083',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'doLogin','triggerByVar'=>'doLogin','triggerByVal'=>'1','var'=>'info'),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('info')->value['state']==0){?>
<div class="errorNotification">
    <b><?php echo smarty_function_xr_translate(array('tag'=>'Der eingegebene Benutzername oder das Passwort sind falsch.'),$_smarty_tpl);?>
</b>
    <br />
    <?php echo smarty_function_xr_translate(array('tag'=>'Bitte versuchen Sie es erneut, oder klicken Sie unten auf "Login-Daten vergessen?"'),$_smarty_tpl);?>

     <br /><br />
</div>
<?php }?>

<form role="form" action="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->getVariable('P_ID')->value),$_smarty_tpl);?>
" id="form-login" method="post">
    <div class="form-group">
        <input type='hidden' name='doLogin' value='1' />
        <label for="wz_EMAIL"><span class="small">e</span>Mail</label>
        <input id="wz_EMAIL" name="wz_EMAIL" class="form-control" rel="required_email" />
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
    <button class="button" id="form-login-submit"><?php echo smarty_function_xr_translate(array('tag'=>"Anmelden"),$_smarty_tpl);?>
</button>
    <br>
    <br>
    <button class="button" id="registernew"><a style="text-transform: uppercase;" href="<?php echo smarty_function_xr_genlink(array('p_id'=>25),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Jetzt Registrieren"),$_smarty_tpl);?>
</a></button>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</form>