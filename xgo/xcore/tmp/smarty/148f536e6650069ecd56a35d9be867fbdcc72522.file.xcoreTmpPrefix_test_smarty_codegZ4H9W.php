<?php /* Smarty version Smarty-3.0.7, created on 2017-02-20 09:56:33
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegZ4H9W" */ ?>
<?php /*%%SmartyHeaderCode:203544576758aaaf41d5b114-34754212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '148f536e6650069ecd56a35d9be867fbdcc72522' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegZ4H9W',
      1 => 1487580993,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203544576758aaaf41d5b114-34754212',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<style>
    #anmelden-inner {
        width: 35%;
        position: absolute;
        right: 115px;
        border: 2px solid #ccc;
        top: 65px;
        
        background-color: #fff;
    }
</style>

<div id="anmelden-inner" class="panel-collapse collapse">
	<h3 class="mpwg-color">Anmelden</h3>

	<form role="form" action="/de/anmelden" id="form-login" method="post">
		<div class="form-group">
			<input type="hidden" name="doLogin" value="1">
			<label for="wz_EMAIL">Mail</label>
			<input id="wz_EMAIL" type="email" name="wz_EMAIL" class="form-control" rel="required_email">
			<div class="error-div" id="wz_EMAIL_error">Bitte gültige E-Mail eingeben</div>
		</div>
		<div class="form-group">
			<label for="passwort">Passwort</label> <input id="wz_PASSWORT" name="wz_PASSWORT" type="password" class="form-control" rel="required">
			<div class="error-div" id="wz_PASSWORT_error">Bitte Passwort eingeben</div>
			<a href="/de/passwort-vergessen" class="forgotpw">Passwort vergessen?</a>
		</div>
		<div class="form-group">
			<input type="checkbox" name="use_cookie" id="use-cookie"> 
			<label for="use-cookie" class="label-use-cookie">Angemeldet bleiben</label>
		</div>
		<button class="button" id="form-login-submit">Anmelden</button>
		<br>
	</form>
	<br>
	<button class="button" id="fb-login-submit">Mit Facebook anmelden</button>
	<br>
</div>
