<?php /* Smarty version Smarty-3.0.7, created on 2017-02-20 10:34:26
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeI7P2lK" */ ?>
<?php /*%%SmartyHeaderCode:165201531058aab822a44a91-35174852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cadeca53d6c45adc416f559c7c5eab7b6ae4cc5e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeI7P2lK',
      1 => 1487583266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165201531058aab822a44a91-35174852',
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
    
    input.form-control {
        background-color: #efefef;
        width: 90%;
        padding: 0 5px;
        border: none;
        font-family: 'NunitoSans-light';
    }
    
    .label-use-cookie {
        font-family: 'NunitoSans-light';
        font-size: 14px;
    }
    
</style>

<div id="anmelden-inner" class="panel-collapse collapse text-left">
	<h3 class="mpwg-color">Anmelden</h3>

	<form role="form" action="/de/anmelden" id="form-login" method="post">
		<div class="form-group">
			<input type="hidden" name="doLogin" value="1">
			<label for="wz_EMAIL" class="text-uppercase">Mail</label>
            <input id="wz_EMAIL" type="email" name="wz_EMAIL" class="form-control" rel="required_email">
			<div class="error-div" id="wz_EMAIL_error">Bitte gültige E-Mail eingeben</div>
		</div>
		<div class="form-group">
			<label for="passwort" class="text-uppercase">Passwort</label>
			<input id="wz_PASSWORT" name="wz_PASSWORT" type="password" class="form-control" rel="required">
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
