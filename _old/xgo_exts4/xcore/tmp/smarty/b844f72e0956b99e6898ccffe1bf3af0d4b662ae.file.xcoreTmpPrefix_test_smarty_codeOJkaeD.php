<?php /* Smarty version Smarty-3.0.7, created on 2014-10-17 14:36:39
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOJkaeD" */ ?>
<?php /*%%SmartyHeaderCode:706629546544129773a1ca2-12214266%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b844f72e0956b99e6898ccffe1bf3af0d4b662ae' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOJkaeD',
      1 => 1413556599,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '706629546544129773a1ca2-12214266',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_wzActionInvisibleCaptcha')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wzActionInvisibleCaptcha.php';
?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_countries','var'=>'countries'),$_smarty_tpl);?>


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
				</div>
				<div class="form-group">
					<label for="exampleInputPWD">Password</label>
					<input type="password" placeholder="Enter Password" id="LOGIN_PASSWORD" name="LOGIN_PASSWORD" class="form-control">
					<p>I forgot my <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>72),$_smarty_tpl);?>
" class="pwd_forgot">password</a></p>
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
			<h3>Sign up your new account</h3>
			
			<form role="form" id="register-form">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="exampleInputFNAME">First Name</label>
							<input type="text" placeholder="Enter First Name" id="exampleInputFNAME" class="form-control required validate[required]" name="feu_firstname">
							<?php echo smarty_function_xr_wzActionInvisibleCaptcha(array(),$_smarty_tpl);?>

	                        <input name="feu_ip_address" id="feu_ip_address" type="hidden" value="<?php echo $_SERVER['REMOTE_ADDR'];?>
" />
						</div>
					</div>
					<div class="col-sm-6">  
						<div class="form-group">
							<label for="exampleInputLNAME">Last Name</label>
							<input type="text" placeholder="Enter Last Name" id="exampleInputLANME" class="form-control required validate[required]" name="feu_lastname">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="feu_company">Company</label>
							<input type="text" placeholder="Enter Company" class="form-control" name="feu_company" id="feu_company_input">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="exampleInputSTREET">Street</label>
							<input type="text" placeholder="Enter Street Adress" id="exampleInputSTREET" class="form-control" name="feu_street">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="exampleInputCITY">City</label>
							<input type="text" placeholder="Enter City" id="exampleInputCITY" class="form-control" name="feu_city">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="exampleInputLZIP">ZIP</label>
							<input type="text" placeholder="Enter ZIP" id="exampleInputZIP" class="form-control" name="feu_zip">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="exampleInputLSTATE">STATE</label>
							<input type="text" placeholder="Enter STATE" id="exampleInputSTATE" class="form-control" name="feu_state">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="exampleInputLZIP">Country</label>
							<select class="form-control" name="feu_country_id" id="feu_country_id">
							    <option value="-1">Choose Country</option>
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('countries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['asc_id'];?>
"<?php if ($_smarty_tpl->tpl_vars['v']->value['asc_id']==$_smarty_tpl->getVariable('data')->value['COUNTRY']){?> selected="selected"<?php }?> data-tel="<?php echo $_smarty_tpl->tpl_vars['v']->value['asc_phone_code'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['asc_name'];?>
</option>
								<?php }} ?>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="feu_occupation">Occupation</label>
							<select class="form-control" name="feu_occupation" id="feu_occupation">
							    <option value="-1"<?php if ($_smarty_tpl->getVariable('data')->value['OCCUPATION']==-1){?> selected="selected"<?php }?>>Select Occupation</option>
								<option value="-2"<?php if ($_smarty_tpl->getVariable('data')->value['OCCUPATION']==-2){?> selected="selected"<?php }?>>Other</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">  
						<div class="form-group"<?php if ($_smarty_tpl->getVariable('data')->value['OCCUPATION']!=-2){?> style="display: none;"<?php }?> id="show-feu_occupation">
							<label for="inputOCCUPATION">Occupation</label>
							<input type="text" placeholder="Enter Occupation" value="<?php echo $_smarty_tpl->getVariable('data')->value['OCCUPATIONOTHER'];?>
" id="inputOCCUPATION" class="form-control" name="feu_occupation_other">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="exampleInputEMAIL">Email</label>
							<input type="email" placeholder="Enter Email" id="feu_email" class="form-control required_email required validate[required]" name="feu_email">
							<div class="FORM_ERROR" id="feu_email_error">Email already in use!</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="exampleInputPWD">Password</label>
							<input type="password" placeholder="Enter Password" id="feu_password" class="form-control required_password validate[required]" name="feu_password">
						</div>
						
						<p class="pwind">
							<span class="pwindbl" id="pwindbl" style="float:left;padding-left: 5px;">
							
							</span>
							<span class="txt">Password Strength (<a href="#" data-html="true" data-toggle="tooltip" title="
									<p>Passwords must be between 5 and 24 characters long.</p>
									<p>Passwords can not contain spaces or special characters.</p>
									<p>Passwords are case sensitive.</p>
									<p>Do not use personal information as your password (your birthday, phone number, etc.)</p>
									<p>For maximum security, use both letters and numbers in your passwords</p>">more info</a>)</span>										
							<span class="clearer"></span>
						</p>
					</div>
					<div class="col-sm-6">  
						<div class="form-group">
							<label for="exampleInputPWD2">Repeat Password</label>
							<input type="password" placeholder="Re Enter Password" id="feu_password2" class="form-control required_password validate[required]" name="feu_password2">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="checkbox">
						  <label>
						    <input type="checkbox" value="" checked="checked" id="feu_mailinglist">
						    <input type="hidden" id="feu_mailinglist_input" name="feu_mailinglist" value="1" />
						    <p>I agree to receive newsletters</p>
						  </label>
						</div>
					</div>
				</div>
				
				<div class="clearer"></div>
				<a class="but" href="<?php echo smarty_function_xr_genlink(array('p_id'=>25),$_smarty_tpl);?>
" id="sign-up-btn">Sign up</a>
			</form>
		</div>

<script>
    $(document).ready(function(){
        fe_users.init_login_register();
    });
</script>
		
	</div>
	