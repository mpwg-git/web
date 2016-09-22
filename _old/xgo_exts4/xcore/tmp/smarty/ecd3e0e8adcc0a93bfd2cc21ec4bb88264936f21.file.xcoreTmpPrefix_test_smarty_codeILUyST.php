<?php /* Smarty version Smarty-3.0.7, created on 2014-07-25 10:57:10
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeILUyST" */ ?>
<?php /*%%SmartyHeaderCode:184385472153d21be6e38af9-17874450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecd3e0e8adcc0a93bfd2cc21ec4bb88264936f21' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeILUyST',
      1 => 1406278630,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184385472153d21be6e38af9-17874450',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
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
		    <h1>WELCOME TO LÜRZER'S ARCHIVE</h1>
		<!--
		    <h1>Submit Your Work</h1>
		    
		    <ul class="nav nav-pills p-woche">
				<li class="active"><span class="step-menu">Step 1 - Sign In</span></li>
				<li><span class="step-menu">Step 2- Input Your Work</span></li>
				<li><span class="step-menu">Step 3- Confirm</span></li>
			</ul>
		 -->
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div class="row">
		<div class="col-sm-4">
			<h3>Sign in to your account</h3>
			<form id="LOGIN_FORM">
				<div class="form-group">
					<label for="exampleInputEMAIL">Email</label>
					<input type="email" placeholder="Enter Email" id="LOGIN_EMAIL" name="LOGIN_EMAIL" class="form-control">
					<p>Instructional text associated with this field</p>
				</div>
				<div class="form-group">
					<label for="exampleInputPWD">Password</label>
					<input type="password" placeholder="Enter Password" id="LOGIN_PASSWORD" name="LOGIN_PASSWORD" class="form-control">
					<p>I forgot my <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>72),$_smarty_tpl);?>
"><u>password</u></a></p>
				</div>
				<div class="checkbox">
				  <label>
				    <input type="checkbox" name="PLEASE_REMEMBER_ME" id="PLEASE_REMEMBER_ME" value="">
				    <p>Keep me signed in. (Clear the check box if you're on a shared computer.)</p>
				  </label>
				</div>
				<button class="but" id="LOGIN_BUTTON">Sign In</button>
				<div class="form-group">
					<p id="LOGIN_ERROR" class="FORM_ERROR"><br/>User or Password wrong!</p>
				</div>
			</form>
		</div>
		<div class="col-sm-2"></div>
		<div class="col-sm-6">
			<h3>Lürzer's Archive - Magazin / Digital Subscription</h3>
			<a href="/shop/catalog/subscriptions" target="_self" title="Shop - Subscription Image">
			<?php echo smarty_function_xr_imgWrapper(array('s_id'=>1190972,'ext'=>'png','class'=>"img-responsive"),$_smarty_tpl);?>

			</a>
			<br />
			<a href="/shop/catalog/subscriptions" target="_self" title="Shop - Subscription" class="but">Subscribe</a>&nbsp;&nbsp;<a href="/shop/catalog/back-issues" target="_self" title="Shop - Back Issues" class="but">Back Issues</a>
		</div>

<script>
    $(document).ready(function(){
        fe_users.init_login_register();
    });
</script>
		
	</div>
	