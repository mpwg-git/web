<?php /* Smarty version Smarty-3.0.7, created on 2017-02-22 15:59:48
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeo6y0oY" */ ?>
<?php /*%%SmartyHeaderCode:140537239958ada764ee5603-53145519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '057dfbf77bd1a0067e7009dc0829ce2368e66ee8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeo6y0oY',
      1 => 1487775588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140537239958ada764ee5603-53145519',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div id="anmelden-inner" class="panel-collapse collapse text-left">
	<h3 class="mpwg-color"><?php echo smarty_function_xr_translate(array('tag'=>'fp_h3-login'),$_smarty_tpl);?>
</h3>
	<form role="form" action="/de/anmelden" id="form-login" method="post">
		<div class="form-group">
			<input type="hidden" name="doLogin" value="1">
			<label for="wz_EMAIL" class="text-uppercase">Mail</label>
            <input id="wz_EMAIL" type="email" name="wz_EMAIL" class="form-control" rel="required_email">
			<div class="error-div" id="wz_EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'error_email-notvalid'),$_smarty_tpl);?>
</div>
		</div>
		<div class="form-group">
			<label for="passwort" class="text-uppercase"><?php echo smarty_function_xr_translate(array('tag'=>'Passwort'),$_smarty_tpl);?>
</label>
			<input id="wz_PASSWORT" name="wz_PASSWORT" type="password" class="form-control" rel="required">
			<div class="error-div" id="wz_PASSWORT_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Passwort eingeben'),$_smarty_tpl);?>
</div>
			<a href="/de/passwort-vergessen" class="forgotpw">Passwort vergessen?</a>
		</div>
		<div class="form-group">
		    <input type="checkbox" name="use_cookie" id="use-cookie"> 
		    <label for="use-cookie" class="label-use-cookie">Angemeldet bleiben</label>
		</div>
		<button class="button text-uppercase" id="form-login-submit">Anmelden</button>
		<br>
		<br>
	    <button class="button text-uppercase" id="fb-login-submit">Mit Facebook anmelden</button>
	</form>
</div>
