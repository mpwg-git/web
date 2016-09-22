<?php /* Smarty version Smarty-3.0.7, created on 2014-11-17 17:06:21
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeasp6dD" */ ?>
<?php /*%%SmartyHeaderCode:138028898546a2b0d21bdb0-48690123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bd25ddf965ce85daa3a6724f1b99a019c2530dd' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeasp6dD',
      1 => 1416243981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138028898546a2b0d21bdb0-48690123',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?>
    <!-- logo row -->
	<?php echo smarty_function_xr_atom(array('a_id'=>459,'return'=>1),$_smarty_tpl);?>

	
	<!-- quicksearch -->
	<div class="row">
		<div class="col-sm-12">
	        <?php echo smarty_function_xr_atom(array('a_id'=>456,'return'=>1),$_smarty_tpl);?>

		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-9">
		    <div class="line-top"></div>
		    <h1>Reset Password</h1>
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
		<p>Please fill in your emailadress to request a new password:</p>
		<input type="text" name="password_reset_email" id="password_reset_email" placeholder="emailadress" />
		
		<button class="but" id="password_reset_button">Request password</button>
		
		<div class="form-group">
			<p id="password_reset"><br/>A new password has been sent to your emailaddress.</p>
			<p id="password_reset_error"><br/>Please provide a valid emailadress.</p>
		</div>
		
		</div>
	</div>
	