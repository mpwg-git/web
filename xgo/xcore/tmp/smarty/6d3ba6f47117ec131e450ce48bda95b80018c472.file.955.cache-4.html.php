<?php /* Smarty version Smarty-3.0.7, created on 2017-03-09 23:27:36
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/955.cache-4.html" */ ?>
<?php /*%%SmartyHeaderCode:61688091558c1d6d80b9f39-40583899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d3ba6f47117ec131e450ce48bda95b80018c472' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/955.cache-4.html',
      1 => 1489098454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61688091558c1d6d80b9f39-40583899',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'doLogin','triggerByVar'=>'doLogin','triggerByVal'=>'1','var'=>'info'),$_smarty_tpl);?>



<div id="anmelden-inner" class="panel-collapse collapse text-left <?php if ($_smarty_tpl->getVariable('info')->value['state']==0){?>in<?php }?>">
	<h3 class="mpwg-color"><?php echo smarty_function_xr_translate(array('tag'=>'fp_h3-login'),$_smarty_tpl);?>
</h3>
	<br>
	<button class="button text-uppercase" id="fb-login-submit"><span class="fb-f">f </span><?php echo smarty_function_xr_translate(array('tag'=>'Mit Facebook anmelden'),$_smarty_tpl);?>
</button>
	<hr>
	<?php if ($_smarty_tpl->getVariable('info')->value['state']==0){?>
        <div class="errorNotification">
            <b><?php echo smarty_function_xr_translate(array('tag'=>'Der eingegebene Benutzername oder das Passwort sind falsch.'),$_smarty_tpl);?>
</b>
            <br />
            <?php echo smarty_function_xr_translate(array('tag'=>'Bitte versuchen Sie es erneut, oder klicken Sie unten auf "Login-Daten vergessen?"'),$_smarty_tpl);?>

             <br /><br />
        </div>
    <?php }?>
	
    <form role="form" action="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
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
    		<div class="error-div" id="wz_EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'error_email-notvalid'),$_smarty_tpl);?>
</div>
    	</div>
    	<div class="form-group">
    		<label for="passwort" class="text-uppercase">
    		    <h5><?php echo smarty_function_xr_translate(array('tag'=>'Passwort'),$_smarty_tpl);?>
</h5>
            </label>
    		<input id="wz_PASSWORT" name="wz_PASSWORT" type="password" class="form-control" rel="required">
    		<div class="error-div" id="wz_PASSWORT_error">
    		    <?php echo smarty_function_xr_translate(array('tag'=>'Bitte Passwort eingeben'),$_smarty_tpl);?>

    		</div>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>25),$_smarty_tpl);?>
" class="forgotpw"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort vergessen?"),$_smarty_tpl);?>
</a>		
        </div>
    	<div class="form-group">
    	    <input type="checkbox" name="use_cookie" id="use-cookie"> 
    	    <label for="use-cookie" class="label-use-cookie"><?php echo smarty_function_xr_translate(array('tag'=>'Angemeldet bleiben'),$_smarty_tpl);?>
</label>
    	</div>
    	<button class="button text-uppercase" id="form-login-submit"><?php echo smarty_function_xr_translate(array('tag'=>'fp_h3-login'),$_smarty_tpl);?>
</button>
    </form>
</div>

