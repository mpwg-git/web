<?php /* Smarty version Smarty-3.0.7, created on 2014-08-05 14:11:33
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/482.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:34425940353e0c9f53fc3c4-09369505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '221f41cb97485b471c3d05c68b226707cf22f812' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/482.cache.html',
      1 => 1407240693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34425940353e0c9f53fc3c4-09369505',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_details','var'=>'data'),$_smarty_tpl);?>
 
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
		    <h1>Profile</h1>
		
		    <ul class="nav nav-pills p-woche">
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>25),$_smarty_tpl);?>
">Edit my Profile</a></li>
				<li class="active"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>26),$_smarty_tpl);?>
">Change Password</a></li>
				<!--<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>27),$_smarty_tpl);?>
">My Account</a></li>-->
				<?php if ($_smarty_tpl->getVariable('data')->value['BEYONDARCHIVE']>0){?><li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>105),$_smarty_tpl);?>
">My public Profile</a></li><?php }?>
			</ul>
		
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<p class="looklikeH1">Change Password</p>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-4">
			<p>Enter your new password information</p>
			<form id="change-password-form">
				<div class="form-group">
					<label for="exampleInputOLDPW">Old Password</label>
					<input type="password" placeholder="Old Password" id="OLDPW" class="form-control required" name="old_password">
					<div class="FORM_ERROR" id="password_error">Password wrong!</div>
				</div>
				<div class="form-group">
					<label for="exampleInputPWD">Password</label>
					<input type="password" placeholder="Enter Password" id="feu_password" class="form-control required_password" name="feu_password">
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
				<div class="form-group">
					<label for="exampleInputREPEATPW">Repeat Password</label>
					<input type="password" placeholder="Re Enter Password" id="feu_password2" class="form-control required_password" name="feu_password2">
				</div>
				<div class="row">
				    <div class="col-sm-12">
						<p><a class="but floatRight" href="" id="change-password-btn">Change Password</a></p>
						<p>
						<br/>
						&nbsp;<span id="UPDATE_USER_OK" class="FORM_OK floatRight">Successfully updated your password!</span>
						</p>
					</div>
				</div>
				
			</form>
			<br>
		</div>
	</div>