<?php /* Smarty version Smarty-3.0.7, created on 2017-02-22 15:56:36
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelOyK7I" */ ?>
<?php /*%%SmartyHeaderCode:133607528658ada6a48c7ab9-20753876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0dee144e81569e52df265eaa038f39b6e1fdf994' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelOyK7I',
      1 => 1487775396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133607528658ada6a48c7ab9-20753876',
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
		<br>
	    <button class="button text-uppercase" id="fb-login-submit">Mit Facebook anmelden</button>
	</form>
</div>
