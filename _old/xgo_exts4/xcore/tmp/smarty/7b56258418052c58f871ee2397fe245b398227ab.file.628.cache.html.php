<?php /* Smarty version Smarty-3.0.7, created on 2014-07-29 15:29:01
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/628.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:199001069153d7a19df24352-53852800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b56258418052c58f871ee2397fe245b398227ab' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/628.cache.html',
      1 => 1406640541,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199001069153d7a19df24352-53852800',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="row">
    <div class="col-sm-4">
		<h3>Sign in for voting</h3>
		<form id="BE_VOTING_LOGIN_FORM">
			<div class="form-group">
				<label for="exampleInputEMAIL">Email</label>
				<input type="email" placeholder="Enter Email" id="LOGIN_EMAIL" name="LOGIN_EMAIL" class="form-control">
			</div>
			<div class="form-group">
				<label for="exampleInputPWD">Password</label>
				<input type="password" placeholder="Enter Password" id="LOGIN_PASSWORD" name="LOGIN_PASSWORD" class="form-control">
			</div>
			<button class="but" id="BE_VOTING_LOGIN_BUTTON">Sign In</button>
			<div class="form-group">
				<p id="LOGIN_ERROR" class="FORM_ERROR"><br/>User or Password wrong!</p>
			</div>
		</form>
	</div>
	<div class="col-sm-8"> </div>
</div>

<script>
    $(document).ready(function(){
        be_voting_users.init_login_register();
    });
</script>