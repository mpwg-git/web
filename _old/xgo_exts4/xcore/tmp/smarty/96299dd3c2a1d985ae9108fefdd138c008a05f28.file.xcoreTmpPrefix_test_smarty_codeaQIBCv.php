<?php /* Smarty version Smarty-3.0.7, created on 2014-09-30 17:10:29
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaQIBCv" */ ?>
<?php /*%%SmartyHeaderCode:986990743542ae40541ce56-51691699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96299dd3c2a1d985ae9108fefdd138c008a05f28' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaQIBCv',
      1 => 1412097029,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '986990743542ae40541ce56-51691699',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_details','var'=>'data'),$_smarty_tpl);?>

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
		    <h1>Profile</h1>
		
		    <ul class="nav nav-pills p-woche">
				<li class="active"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>25),$_smarty_tpl);?>
">Edit my Profile</a></li>
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>26),$_smarty_tpl);?>
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
		<div class="col-sm-8">
			<h2 class="linieBottom myproH2">Personal</h2>
			<form role="form" id="feu-form">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="inputFNAME">First Name</label>
							<input type="text" value="<?php echo $_smarty_tpl->getVariable('data')->value['FIRSTNAME'];?>
" id="inputFNAME" class="form-control required validate[required]" name="feu_firstname">
						</div>
					</div>
					<div class="col-sm-6">  
						<div class="form-group">
							<label for="inputLANME">Last Name</label>
							<input type="text" value="<?php echo $_smarty_tpl->getVariable('data')->value['LASTNAME'];?>
" id="inputLANME" class="form-control required validate[required]" name="feu_lastname">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="inputSTREET">Street Adress</label>
					<input type="text" value="<?php echo $_smarty_tpl->getVariable('data')->value['STREET'];?>
" id="inputSTREET" class="form-control" name="feu_street">
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
						    <label for="feu_country_id">Country</label>
							<select class="form-control" name="feu_country_id" id="feu_country_id">
							    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('countries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['asc_id'];?>
"<?php if ($_smarty_tpl->tpl_vars['v']->value['asc_id']==$_smarty_tpl->getVariable('data')->value['COUNTRY_ID']){?> selected="selected"<?php }?> data-tel="<?php echo $_smarty_tpl->tpl_vars['v']->value['asc_phone_code'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['asc_name'];?>
</option>
								<?php }} ?>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputCITY">City</label>
							<input type="text" value="<?php echo $_smarty_tpl->getVariable('data')->value['CITY'];?>
" id="inputCITY" class="form-control" name="feu_city">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label for="inputZIP">ZIP</label>
							<input type="text" value="<?php echo $_smarty_tpl->getVariable('data')->value['ZIP'];?>
" id="inputZIP" class="form-control" name="feu_zip">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label for="inputSTATE">State</label>
							<input type="text" value="<?php echo $_smarty_tpl->getVariable('data')->value['STATE'];?>
" id="inputSTATE" class="form-control" name="feu_state">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="feu_email">Email</label>
							<input type="email" value="<?php echo $_smarty_tpl->getVariable('data')->value['EMAIL'];?>
" id="feu_email" class="form-control required_email required validate[required]" name="feu_email">
							<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('data')->value['EMAIL'];?>
" id="feu_old_email" name="feu_old_email">
							<div class="FORM_ERROR" id="feu_email_error">Email already in use!</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputPHONECODE">Phone Code</label>
							<input type="text" placeholder="Enter Code" value="<?php echo $_smarty_tpl->getVariable('data')->value['TELCODE'];?>
" id="inputPHONECODE" class="form-control" name="feu_phone_code">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputPHONE">Phone</label>
							<input type="text" placeholder="Enter Phone" value="<?php echo $_smarty_tpl->getVariable('data')->value['TEL'];?>
" id="inputPHONE" class="form-control" name="feu_phone">
						</div>
					</div>
				</div>
				<h2 class="linieBottom">Professional</h2>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="feu_company">Current Work</label>
							<input type="text" value="<?php echo $_smarty_tpl->getVariable('data')->value['COMPANY'];?>
" id="feu_company" class="form-control" name="feu_company">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						    <label for="inputPOSITION">&nbsp;</label>
							<select class="form-control" name="feu_occupation" id="feu_occupation">
							    <option value="-1"<?php if ($_smarty_tpl->getVariable('data')->value['OCCUPATION']==-1){?> selected="selected"<?php }?>>Select Occupation</option>
								<option value="-2"<?php if ($_smarty_tpl->getVariable('data')->value['OCCUPATION']==-2){?> selected="selected"<?php }?>>Other</option>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group"<?php if ($_smarty_tpl->getVariable('data')->value['OCCUPATION']!=-2){?> style="display: none;"<?php }?> id="show-feu_occupation">
							<label for="inputOCCUPATION">Occupation</label>
							<input type="text" placeholder="Enter Occupation" value="<?php echo $_smarty_tpl->getVariable('data')->value['OCCUPATIONOTHER'];?>
" id="inputOCCUPATION" class="form-control" name="feu_occupation_other">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<p><a class="but floatRight" href="" id="save-my-profile">Save</a></p>
						<p>
						<br/>
						&nbsp;<span id="UPDATE_USER_OK" class="FORM_OK floatRight">Successfully updated your profile!</span>
						</p>
					</div>
				</div>
			</form>
		
		</div>
		<div class="col-sm-4"> </div>
	</div>
	