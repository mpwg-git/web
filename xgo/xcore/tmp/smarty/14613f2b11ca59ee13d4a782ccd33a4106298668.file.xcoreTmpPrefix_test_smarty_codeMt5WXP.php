<?php /* Smarty version Smarty-3.0.7, created on 2017-02-23 12:51:53
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMt5WXP" */ ?>
<?php /*%%SmartyHeaderCode:97180106258aeccd9a59953-65498877%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14613f2b11ca59ee13d4a782ccd33a4106298668' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMt5WXP',
      1 => 1487850713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97180106258aeccd9a59953-65498877',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div id="anmelden-inner" class="panel-collapse collapse text-left">
	<h3 class="mpwg-color"><?php echo smarty_function_xr_translate(array('tag'=>'fp_h3-login'),$_smarty_tpl);?>
</h3>
	<br>
	<button class="button text-uppercase" id="fb-login-submit"><span class="fb-f">f </span><?php echo smarty_function_xr_translate(array('tag'=>'Mit Facebook anmelden'),$_smarty_tpl);?>
</button>
	<hr>
	<form role="form" action="/de/anmelden" id="form-login" method="post">
		<div class="form-group">
			<input type="hidden" name="doLogin" value="1">
			<label for="wz_EMAIL" class="text-uppercase"><h5>Email</h5></label>
            <input id="wz_EMAIL" type="email" name="wz_EMAIL" class="form-control" rel="required_email">
			<div class="error-div" id="wz_EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'error_email-notvalid'),$_smarty_tpl);?>
</div>
		</div>
		<div class="form-group">
			<label for="passwort" class="text-uppercase"><h5><?php echo smarty_function_xr_translate(array('tag'=>'Passwort'),$_smarty_tpl);?>
</h5></label>
			<input id="wz_PASSWORT" name="wz_PASSWORT" type="password" class="form-control" rel="required">
			<div class="error-div" id="wz_PASSWORT_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Passwort eingeben'),$_smarty_tpl);?>
</div>
			<a href="/de/passwort-vergessen" class="forgotpw"><?php echo smarty_function_xr_translate(array('tag'=>'Passwort vergessen?'),$_smarty_tpl);?>
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
