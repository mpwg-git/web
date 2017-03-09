<?php /* Smarty version Smarty-3.0.7, created on 2017-02-20 10:02:32
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderZMM7x" */ ?>
<?php /*%%SmartyHeaderCode:66082938458aab0a8140010-22999090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afa9cf49fd43cb2d37f8add8fc3ae9219cb6e3ca' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderZMM7x',
      1 => 1487581352,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66082938458aab0a8140010-22999090',
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
        top: 38px;
        background-color: #fff;
        
        label {
            font-size: 14px;
            font-family: @nunitoextrabold;
        }
    }
</style>

<div id="anmelden-inner" class="panel-collapse collapse">
	<h3 class="mpwg-color">Anmelden</h3>

	<form role="form" action="/de/anmelden" id="form-login" method="post">
		<div class="form-group">
			<input type="hidden" name="doLogin" value="1">
			<label for="wz_EMAIL" class="text-uppercase pull-left">Mail</label>
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
