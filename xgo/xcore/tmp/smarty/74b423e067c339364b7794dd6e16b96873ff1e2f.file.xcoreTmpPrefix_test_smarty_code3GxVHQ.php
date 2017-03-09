<?php /* Smarty version Smarty-3.0.7, created on 2017-02-20 09:53:29
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3GxVHQ" */ ?>
<?php /*%%SmartyHeaderCode:37844713658aaae89d87fa4-93721976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74b423e067c339364b7794dd6e16b96873ff1e2f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3GxVHQ',
      1 => 1487580809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37844713658aaae89d87fa4-93721976',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<style>
    div#anmelden-inner {
    width: 35%;
    position: absolute;
    right: 115px;
    border: 2px solid #ccc;
    top: 65px;
}
</style>

<div id="anmelden-inner" class="panel-collapse collapse">
	<h3>Anmelden</h3>

	<form role="form" action="/de/anmelden" id="form-login" method="post">
		<div class="form-group">
			<input type="hidden" name="doLogin" value="1"> <label
				for="wz_EMAIL"><span class="small">e</span>Mail</label> <input
				id="wz_EMAIL" type="email" name="wz_EMAIL" class="form-control"
				rel="required_email">
			<div class="error-div" id="wz_EMAIL_error">Bitte gültige E-Mail
				eingeben</div>
		</div>
		<div class="form-group">
			<label for="passwort">Passwort</label> <input id="wz_PASSWORT"
				name="wz_PASSWORT" type="password" class="form-control"
				rel="required">
			<div class="error-div" id="wz_PASSWORT_error">Bitte Passwort
				eingeben</div>

			<a href="/de/passwort-vergessen" class="forgotpw">Passwort
				vergessen?</a>
		</div>
		<div class="form-group">
			<input type="checkbox" name="use_cookie" id="use-cookie"> <label
				for="use-cookie" class="label-use-cookie">Angemeldet bleiben</label>
		</div>
		<button class="button" id="form-login-submit">Anmelden</button>
		<br>
	</form>
	<br>
	<button class="button" id="fb-login-submit">Mit Facebook anmelden</button>
	<br>
</div>
