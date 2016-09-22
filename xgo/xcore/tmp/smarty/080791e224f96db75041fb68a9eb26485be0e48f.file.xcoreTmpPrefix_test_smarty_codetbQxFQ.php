<?php /* Smarty version Smarty-3.0.7, created on 2015-08-08 13:36:12
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetbQxFQ" */ ?>
<?php /*%%SmartyHeaderCode:115146993155c5e9ac0f9020-06472807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '080791e224f96db75041fb68a9eb26485be0e48f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetbQxFQ',
      1 => 1439033771,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115146993155c5e9ac0f9020-06472807',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'doLogin','triggerByVar'=>'doLogin','triggerByVal'=>'1','var'=>'info'),$_smarty_tpl);?>


<div class="anmelden">
    <span class="close">
         <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
">
            <span class="icon-Close"></span>
        </a>
    </span>
    <h2><?php echo smarty_function_xr_translate(array('tag'=>"Anmelden"),$_smarty_tpl);?>
<br/>Lorem Ipsum Dolor?</h2>
    
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
">
        <div class="form-group">
            <input type='hidden' name='doLogin' value='1' />
            <label for="wz_EMAIL"><span class="small">e</span>Mail</label>
            <input id="wz_EMAIL" name="wz_EMAIL" class="form-control" />
            <div class="error" id="konto-login-form_wz_EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte gültige E-Mail eingeben'),$_smarty_tpl);?>
</div>
        </div>
        <div class="form-group">
            <label for="passwort"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort?"),$_smarty_tpl);?>
</label>
            <input id="wz_PASSWORT" name="wz_PASSWORT" type="password" class="form-control" />
            <div class="error" id="konto-login-form_wz_PASSWORT_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Passwort eingeben'),$_smarty_tpl);?>
</div>
            
            <a class="forgotpw"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort vergessen?"),$_smarty_tpl);?>
</a>
        </div>
        <button type="submit" class="button"><?php echo smarty_function_xr_translate(array('tag'=>"Registrieren"),$_smarty_tpl);?>
</button>
    </form>
</div>