<?php /* Smarty version Smarty-3.0.7, created on 2015-11-24 17:08:53
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/726.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:30415582656548b95cf34b5-45529605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9cd461ae6621df8873f227474a8e528c640313f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/726.cache-1.html',
      1 => 1440753881,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30415582656548b95cf34b5-45529605',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_wzActionInvisibleCaptcha')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wzActionInvisibleCaptcha.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'resendRegistration','triggerByVar'=>'doResend','triggerByVal'=>'1','var'=>'result'),$_smarty_tpl);?>



<div class="register default-container-padding">
    
    <div class="register-inner">
        <div class="row">
            <div class="small-forms-spacer"></div>
            <div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-4 col-lg-offset-4">
                <?php if ($_smarty_tpl->getVariable('result')->value['status']=='NOT_ACTIVATED'){?>
                	<?php echo smarty_function_xr_translate(array('tag'=>'Ihr Konto wurde noch nicht bestätigt! Erst nach der Bestätigung können Sie sich einloggen.'),$_smarty_tpl);?>

                    <form id="resend-form" name="wz_form"  class="js-resend-form" action="" method="post" style="margin-top:25px;">
                    	<?php echo smarty_function_xr_wzActionInvisibleCaptcha(array(),$_smarty_tpl);?>

                    	<input type='hidden' name='doResend' value='1'>
                    	<div class="form-group">
                    	    <label><?php echo smarty_function_xr_translate(array('tag'=>'E-Mail'),$_smarty_tpl);?>
:*</label>
                    	    <input name="feuser_email" id="resend-form_EMAIL" class="form-control" type="text" value="" rel="required_email" />
                    	    <div class="error" id="resend-form_EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte gültige E-Mail eingeben'),$_smarty_tpl);?>
</div>
                    	    <button class="pull-right" style="margin-top:25px;" type="submit" title="<?php echo smarty_function_xr_translate(array('tag'=>'Absenden'),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>'Absenden'),$_smarty_tpl);?>
</button>
                    	    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>35),$_smarty_tpl);?>
" class="button pull-left" style="margin-top:25px;" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
</a>
                    	    <div class="clear"></div>
                    	    <span class="error" id="EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte gültige E-Mail eingeben'),$_smarty_tpl);?>
</span>
                    	</div>
                    	<div class="clear"></div>
                    </form>	
                <?php }?>
                
                <?php if ($_smarty_tpl->getVariable('result')->value['status']=='IS_ALREADY_CONFIRMED'){?>
                    <h1><?php echo smarty_function_xr_translate(array('tag'=>'Konto bestätigt'),$_smarty_tpl);?>
</h1>
                	<p><?php echo smarty_function_xr_translate(array('tag'=>'Ihr Konto wurde bereits bestätigt.'),$_smarty_tpl);?>
</p>
                	<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>35),$_smarty_tpl);?>
" class="backLink" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
">&laquo; <?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
</a>	
                <?php }?>
                
                <?php if ($_smarty_tpl->getVariable('result')->value['status']=='RESEND'){?>
                    <h1><?php echo smarty_function_xr_translate(array('tag'=>'Konto bestätigen'),$_smarty_tpl);?>
</h1>
                	<p><?php echo smarty_function_xr_translate(array('tag'=>'An Ihre E-Mail-Adresse wurde der Bestätigungslink gesendet.'),$_smarty_tpl);?>
 <?php echo smarty_function_xr_translate(array('tag'=>'Erst nach der Bestätigung können Sie sich einloggen.'),$_smarty_tpl);?>
</p>
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>35),$_smarty_tpl);?>
" class="backLink" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
">&laquo; <?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
</a>
                <?php }?>
                
                <?php if ($_smarty_tpl->getVariable('result')->value['status']=='USER_NOT_FOUND'){?>
                    <h1><?php echo smarty_function_xr_translate(array('tag'=>'E-Mail-Adresse nicht registriert'),$_smarty_tpl);?>
</h1>
                	<p><?php echo smarty_function_xr_translate(array('tag'=>'Die angebene E-Mail-Adresse ist im System nicht registriert.'),$_smarty_tpl);?>
</p>
                	<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>35),$_smarty_tpl);?>
" class="button" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zurück'),$_smarty_tpl);?>
">&laquo; <?php echo smarty_function_xr_translate(array('tag'=>'zurück'),$_smarty_tpl);?>
</a>
                <?php }?>
            </div>
        </div>
    </div>
</div>
