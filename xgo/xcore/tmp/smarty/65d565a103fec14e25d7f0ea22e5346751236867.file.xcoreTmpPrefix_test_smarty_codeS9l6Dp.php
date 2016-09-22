<?php /* Smarty version Smarty-3.0.7, created on 2016-01-11 17:45:55
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeS9l6Dp" */ ?>
<?php /*%%SmartyHeaderCode:9154171295693dc4306e804-29248574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65d565a103fec14e25d7f0ea22e5346751236867' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeS9l6Dp',
      1 => 1452530755,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9154171295693dc4306e804-29248574',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_wzActionInvisibleCaptcha')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wzActionInvisibleCaptcha.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_REQUEST),$_smarty_tpl);?>

<?php echo smarty_function_xr_feUser(array('action'=>'resendRegistration','triggerByVar'=>'doResend','triggerByVal'=>'1','var'=>'result'),$_smarty_tpl);?>


<div class="register">
    
     <?php echo smarty_function_xr_atom(array('a_id'=>723,'return'=>1,'desc'=>"closer"),$_smarty_tpl);?>

    
    <div class="clearfix"></div>
     
     <div class="register-inner">
    
        <div>
            <?php if ($_smarty_tpl->getVariable('result')->value['status']=='NOT_ACTIVATED'){?>
            	<?php echo smarty_function_xr_translate(array('tag'=>'Ihr Konto wurde noch nicht bestätigt! Erst nach der Bestätigung können Sie sich einloggen.'),$_smarty_tpl);?>

                <form id="resend-form" name="wz_form"  class="js-resend-form" action="" method="post" style="margin-top:25px;">
                	<?php echo smarty_function_xr_wzActionInvisibleCaptcha(array(),$_smarty_tpl);?>

                	<input type='hidden' name='doResend' value='1'>
                	<div class="form-group">
                	    <label><?php echo smarty_function_xr_translate(array('tag'=>'E-Mail'),$_smarty_tpl);?>
:*</label>
                	    <input name="feuser_email" id="resend-form_EMAIL" class="form-control" type="text" value="<?php if ($_REQUEST['m']){?><?php echo $_REQUEST['m'];?>
<?php }?>" rel="required_email" />
                	    <div class="error-div" id="resend-form_EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte gültige E-Mail eingeben'),$_smarty_tpl);?>
</div>
                	    <button class="pull-right" style="margin-top:25px;" type="submit" title="<?php echo smarty_function_xr_translate(array('tag'=>'Absenden'),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>'Absenden'),$_smarty_tpl);?>
</button>
                	    <a href="<?php echo smarty_function_xr_genlink(array('m_suffix'=>'from_logout','from_logout'=>1,'p_id'=>6),$_smarty_tpl);?>
" class="button pull-left" style="margin-top:25px;" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
</a>
                	    <div class="clear"></div>
                	    <span class="error-div" id="EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte gültige E-Mail eingeben'),$_smarty_tpl);?>
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
            	<a href="<?php echo smarty_function_xr_genlink(array('m_suffix'=>'from_logout','from_logout'=>1,'p_id'=>6),$_smarty_tpl);?>
" class="backLink" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
</a>	
            <?php }?>
            
            <?php if ($_smarty_tpl->getVariable('result')->value['status']=='RESEND'){?>
                <h1><?php echo smarty_function_xr_translate(array('tag'=>'Konto bestätigen'),$_smarty_tpl);?>
</h1>
            	<p><?php echo smarty_function_xr_translate(array('tag'=>'An Ihre E-Mail-Adresse wurde der Bestätigungslink gesendet.'),$_smarty_tpl);?>
 <?php echo smarty_function_xr_translate(array('tag'=>'Erst nach der Bestätigung können Sie sich einloggen.'),$_smarty_tpl);?>
</p>
                <a href="<?php echo smarty_function_xr_genlink(array('m_suffix'=>'from_logout','from_logout'=>1,'p_id'=>6),$_smarty_tpl);?>
" class="backLink" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
</a>
            <?php }?>
            
            <?php if ($_smarty_tpl->getVariable('result')->value['status']=='USER_NOT_FOUND'){?>
                <h1><?php echo smarty_function_xr_translate(array('tag'=>'E-Mail-Adresse nicht registriert'),$_smarty_tpl);?>
</h1>
            	<p><?php echo smarty_function_xr_translate(array('tag'=>'Die angebene E-Mail-Adresse ist im System nicht registriert.'),$_smarty_tpl);?>
</p>
            	<a href="<?php echo smarty_function_xr_genlink(array('m_suffix'=>'from_logout','from_logout'=>1,'p_id'=>6),$_smarty_tpl);?>
" class="button" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zurück'),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>'zurück'),$_smarty_tpl);?>
</a>
            <?php }?>
        </div>
    </div>
    
</div>
