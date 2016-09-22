<?php /* Smarty version Smarty-3.0.7, created on 2015-11-18 11:44:40
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLIKc1V" */ ?>
<?php /*%%SmartyHeaderCode:1519675591564c56982bd667-37180132%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22e77812269ff05f1287aa9e48c13c667e832479' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLIKc1V',
      1 => 1447843480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1519675591564c56982bd667-37180132',
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

<form  action="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->getVariable('P_ID')->value),$_smarty_tpl);?>
" id="form-login" method="post">
    <div  >
        <input type='hidden' name='doLogin' value='1' />
        <label for="wz_EMAIL"><span class="small">e</span>Mail</label>
        <input id="wz_EMAIL" name="wz_EMAIL" class="form-control" rel="required_email" />
        <div class="error-div" id="wz_EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte gültige E-Mail eingeben'),$_smarty_tpl);?>
</div>
    </div>
    <br>
    <div  >
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
    
    
</form>
<form role="form" action="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
" id="form-registernew" method="post">
  <button class="button" id="registernew"><a style="text-transform: uppercase;" href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Jetzt Registrieren"),$_smarty_tpl);?>
</a></button>
</form>