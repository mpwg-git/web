<?php /* Smarty version Smarty-3.0.7, created on 2017-02-20 11:22:50
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code62YQuQ" */ ?>
<?php /*%%SmartyHeaderCode:115300080758aac37a3bb051-56838060%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb2f6e65f1c4fa78f24aaffd365cad6cc92d04d8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code62YQuQ',
      1 => 1487586170,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115300080758aac37a3bb051-56838060',
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
        border: 1px solid transparent;
        top: 38px;
        background-color: #fff;
        box-shadow: #646464 0px 0px 10px;
        border-radius: 4px;
        padding: 0px 15px 21px;
        
        label {
            font-size: 14px;
            font-family: @nunitoextrabold;
        }
    }
    
    input.form-control {
        background-color: #efefef;
        margin-bottom: 1em;
        padding: 0 5px;
        border: none;
        font-family: 'NunitoSans-light';
    }
    
    .label-use-cookie {
        font-family: 'NunitoSans-light';
        font-size: 14px;
        font-weight: normal;
        vertical-align: middle;
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
		<button class="button text-uppercase" id="form-login-submit">Anmelden</button>
		<br>
	</form>
	<br>
	<button class="button text-uppercase" id="fb-login-submit">Mit Facebook anmelden</button>
	<br>
</div>
