<?php /* Smarty version Smarty-3.0.7, created on 2016-01-08 14:40:34
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8OVqR0" */ ?>
<?php /*%%SmartyHeaderCode:374350234568fbc5291ea16-12592940%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93f15d50bc674dd06a4551eeadac676d7d45d987' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8OVqR0',
      1 => 1452260434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '374350234568fbc5291ea16-12592940',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
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
<?php }?>

<form  action="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->getVariable('P_ID')->value),$_smarty_tpl);?>
" id="form-login" method="post">
    <div  >
        <input type='hidden' name='doLogin' value='1' />
        <label for="wz_EMAIL"><span class="small">e</span>Mail</label>
        <input id="wz_EMAIL" type="email" name="wz_EMAIL" class="form-control" rel="required_email" />
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
    <button class="button" style="width:100%" id="form-login-submit"><?php echo smarty_function_xr_translate(array('tag'=>"Anmelden"),$_smarty_tpl);?>
</button>
</form>
<form role="form" action="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
" id="form-registernew" method="post">
  <button class="button"  style="width:100%" id="registernew"><a style="text-transform: uppercase;" href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Jetzt Registrieren"),$_smarty_tpl);?>
</a></button>
</form>