<?php /* Smarty version Smarty-3.0.7, created on 2014-10-30 18:11:03
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelg09sS" */ ?>
<?php /*%%SmartyHeaderCode:181090128454527f374faf20-67420732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67ad8658dfe7e2550c71c7dc69550f1722c4e5f5' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelg09sS',
      1 => 1414692663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181090128454527f374faf20-67420732',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_public_profile','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_backend_countries','var'=>'countries'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_work_detailed','var'=>'work'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_beyond_archive_detailed','var'=>'beyond'),$_smarty_tpl);?>


<?php if ($_REQUEST['debug']==1){?>
    <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>

<?php }?>

<!-- logo row -->
	<?php echo smarty_function_xr_atom(array('a_id'=>459,'return'=>1),$_smarty_tpl);?>

	
	
	<div class="row">
		<div class="col-sm-12">
		<!-- quicksearch -->
			<?php echo smarty_function_xr_atom(array('a_id'=>456,'return'=>1),$_smarty_tpl);?>

		
		    <h1>Profile</h1>
		
		    <ul class="nav nav-pills p-woche">
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>25),$_smarty_tpl);?>
">Edit my Profile</a></li>
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>26),$_smarty_tpl);?>
">Change Password</a></li>
				<!--<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>27),$_smarty_tpl);?>
">My Account</a></li>-->
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>105),$_smarty_tpl);?>
">My public Profile</a></li>
			</ul>
		
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<p>
			<?php if ($_smarty_tpl->getVariable('data')->value['IMAGE']>0){?>
			<?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMAGE'],'w'=>450,'class'=>"img-responsive",'id'=>"profile-image"),$_smarty_tpl);?>

			<?php }else{ ?>
			<?php echo smarty_function_xr_imgWrapper(array('s_id'=>270338,'w'=>300,'h'=>400,'rmode'=>'cco','class'=>"img-responsive",'id'=>"profile-image"),$_smarty_tpl);?>

			<?php }?>
			</p>
			<div class="upload-area">
			<form id="fileupload" action="/xsite/call/fe_my_profile/upload_image" method="POST" enctype="multipart/form-data">
			    <span class="btn btn-default fileinput-button" id="upload-profile-image">
    				<i class="glyphicon glyphicon-plus"> </i>
    				<span>Add profile image...</span>
    				<input type="file" name="files">
			    </span>
			</form>
			<div class="progress_container" id="upload_progress_container" style="margin-top: 10px;">
				<div class="progress_bar" id="upload_progress_bar">
			  		 <div class="progress_completed" id="upload_progress_completed"></div>
				</div>
		    </div>
		    <span id="unsupported_file" style="display:none; color: #a94442; font-weight: bold;">File type not allowed</span>
			<span id="toobig_file" style="display:none; color: #a94442; font-weight: bold;">File is too large</span>
			</div>
			<h2 class="linieBottom">Portfolio</h2>
			<p><?php echo count($_smarty_tpl->getVariable('work')->value['ITEMS']);?>
 works in Archive</p>
			<p><?php echo count($_smarty_tpl->getVariable('beyond')->value['ITEMS']);?>
 works in beyond Archive</p>
			<p><a class="but" href="<?php echo smarty_function_xr_genlink(array('p_id'=>38),$_smarty_tpl);?>
">Go to my Portfolio</a></p>					
		</div>
		<div class="col-sm-8">
			<h2 class="linieBottom myproH2">Personal</h2>
			<form role="form" id="fep-form">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="inputFNAME">First Name</label>
							<input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_FIRSTNAME']==1){?> checked="checked"<?php }?> id="fep_publishFirstname" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishFirstname_input" name="fep_publishFirstname" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_FIRSTNAME'];?>
" />
							<input type="text" placeholder="Enter First Name" value="<?php echo $_smarty_tpl->getVariable('data')->value['FIRSTNAME'];?>
" id="inputFNAME" class="form-control required" name="fep_firstname">
						</div>
					</div>
					<div class="col-sm-6">  
						<div class="form-group">
							<label for="inputLANME">Last Name</label>
							<input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_LASTNAME']==1){?> checked="checked"<?php }?> id="fep_publishLastname" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishLastname_input" name="fep_publishLastname" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_LASTNAME'];?>
" />
							<input type="text" placeholder="Enter Last Name" value="<?php echo $_smarty_tpl->getVariable('data')->value['LASTNAME'];?>
" id="inputLANME" class="form-control required" name="fep_lastname">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="inputSTREET">Street Adress</label>
					<input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_STREET']==1){?> checked="checked"<?php }?> id="fep_publishStreet" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishStreet_input" name="fep_publishStreet" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_STREET'];?>
" />
					<input type="text" placeholder="Enter Street" value="<?php echo $_smarty_tpl->getVariable('data')->value['STREET'];?>
" id="inputSTREET" class="form-control" name="fep_street">
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
						    <label for="inputCOUNTRY">Country</label>
							<select class="form-control" name="fep_country_id" id="inputCOUNTRY">
							    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('countries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['ac_id'];?>
"<?php if ($_smarty_tpl->tpl_vars['v']->value['ac_id']==$_smarty_tpl->getVariable('data')->value['COUNTRY_ID']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['ac_name'];?>
</option>
								<?php }} ?>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputCITY">City</label>
							<input type="text" placeholder="Enter City" value="<?php echo $_smarty_tpl->getVariable('data')->value['CITY'];?>
" id="inputCITY" class="form-control" name="fep_city">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label for="inputZIP">ZIP</label>
							<input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_ZIP']==1){?> checked="checked"<?php }?> id="fep_publishzip" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishzip_input" name="fep_publishzip" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_ZIP'];?>
" />
							<input type="text" placeholder="Enter ZIP" value="<?php echo $_smarty_tpl->getVariable('data')->value['ZIP'];?>
" id="inputZIP" class="form-control" name="fep_zipcode">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label for="inputSTATE">State</label>
							<input type="text" placeholder="Enter State" value="<?php echo $_smarty_tpl->getVariable('data')->value['STATE'];?>
" id="inputSTATE" class="form-control" name="fep_state">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputEMAIL">Email</label>
							<input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_EMAIL']==1){?> checked="checked"<?php }?> id="fep_publishMail" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishMail_input" name="fep_publishMail" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_EMAIL'];?>
" />
							<input type="email" value="<?php echo $_smarty_tpl->getVariable('data')->value['EMAIL'];?>
" id="inputEMAIL" class="form-control required_email" name="fep_email">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputPHONECODE">Phone Code</label>
							<input type="text" placeholder="Enter Code" value="<?php echo $_smarty_tpl->getVariable('data')->value['PHONECODE'];?>
" id="inputPHONECODE" class="form-control" name="fep_phone_code">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputPHONE">Phone</label>
							<input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_TEL']==1){?> checked="checked"<?php }?> id="fep_publishPhone" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishPhone_input" name="fep_publishPhone" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_TEL'];?>
" />
							<input type="text" placeholder="Enter Phone" value="<?php echo $_smarty_tpl->getVariable('data')->value['TEL'];?>
" id="inputPHONE" class="form-control" name="fep_phone">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<label for="inputWEB">Web</label>
							<input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_URL']==1){?> checked="checked"<?php }?> id="fep_publishUrl" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishUrl_input" name="fep_publishUrl" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_URL'];?>
" />
							<input type="email" placeholder="Enter Web" value="<?php echo $_smarty_tpl->getVariable('data')->value['URL'];?>
" id="inputWEB" class="form-control" name="fep_url">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputSKYPE">Skype</label>
							<input type="text" placeholder="Skype" id="inputSKYPE" value="<?php echo $_smarty_tpl->getVariable('data')->value['Skype'];?>
" class="form-control" name="fep_social_skype">
						</div>
					</div>
				</div>
				<h2 class="linieBottom">Professional</h2>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="exampleInputCWORK">Company</label>
							<input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_COMPANY']==1){?> checked="checked"<?php }?> id="fep_publishCompany" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishCompany_input" name="fep_publishCompany" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_COMPANY'];?>
" />
							<input type="text" placeholder="Enter Company" value="<?php echo $_smarty_tpl->getVariable('data')->value['COMPANY'];?>
" id="exampleInputCWORK" class="form-control" name="fep_company">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						    <label for="feu_occupation">Occupation</label>
						    <input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_OCCUPATION']==1){?> checked="checked"<?php }?> id="fep_publishOccupation" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishOccupation_input" name="fep_publishOccupation" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_OCCUPATION'];?>
" />
							<select class="form-control" name="fep_occupation" id="feu_occupation">
							    <option value="-1"<?php if ($_smarty_tpl->getVariable('data')->value['OCCUPATION']==-1){?> selected="selected"<?php }?>>Select Occupation</option>
								<option value="-2"<?php if ($_smarty_tpl->getVariable('data')->value['OCCUPATION']==-2){?> selected="selected"<?php }?>>Other</option>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
					    <label for="inputOCCUPATION">&nbsp;</label>
						<div class="form-group"<?php if ($_smarty_tpl->getVariable('data')->value['OCCUPATION']!=-2){?> style="display: none;"<?php }?> id="show-feu_occupation">
							<input type="text" placeholder="Enter Occupation" value="<?php echo $_smarty_tpl->getVariable('data')->value['OCCUPATIONOTHER'];?>
" id="inputOCCUPATION" class="form-control" name="fep_occupation_other">
						</div>
					</div>
				</div>
				<!--
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<textarea rows="3" class="form-control">Past Works</textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<textarea rows="3" class="form-control">Last Awards</textarea>
						</div>
					</div>
				</div>
				-->
				<h2 class="linieBottom">Social Media</h2>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputTWITTER">Twitter</label>
							<input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_Twitter']==1){?> checked="checked"<?php }?> id="fep_publishTwitter" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishTwitter_input" name="fep_publishTwitter" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_Twitter'];?>
" />
							<input type="text" placeholder="Twitter" id="inputTWITTER" value="<?php echo $_smarty_tpl->getVariable('data')->value['Twitter'];?>
" class="form-control" name="fep_social_twitter">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputFACE">Facebook</label>
							<input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_Facebook']==1){?> checked="checked"<?php }?> id="fep_publishFacebook" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishFacebook_input" name="fep_publishFacebook" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_Facebook'];?>
" />
							<input type="text" placeholder="Facebook" id="inputFACE" value="<?php echo $_smarty_tpl->getVariable('data')->value['Facebook'];?>
" class="form-control" name="fep_social_facebook">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputVimeo">Vimeo</label>
							<input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_Vimeo']==1){?> checked="checked"<?php }?> id="fep_publishVimeo" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishVimeo_input" name="fep_publishVimeo" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_Vimeo'];?>
" />
							<input type="text" placeholder="Vimeo" id="inputVimeo" value="<?php echo $_smarty_tpl->getVariable('data')->value['Vimeo'];?>
" class="form-control" name="fep_social_vimeo">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputYOUT">Youtube</label>
							<input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_Youtube']==1){?> checked="checked"<?php }?> id="fep_publishYoutube" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishYoutube_input" name="fep_publishYoutube" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_Youtube'];?>
" />
							<input type="text" placeholder="Youtube" id="inputYOUT" value="<?php echo $_smarty_tpl->getVariable('data')->value['Youtube'];?>
" class="form-control" name="fep_social_youtube">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputFLICKR">Flickr</label>
							<input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_Flickr']==1){?> checked="checked"<?php }?> id="fep_publishFlickr" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishFlickr_input" name="fep_publishFlickr" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_Flickr'];?>
" />
							<input type="text" placeholder="Flickr" id="inputFLICKR" value="<?php echo $_smarty_tpl->getVariable('data')->value['Flickr'];?>
" class="form-control" name="fep_social_flickr">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="inputLINKED">Linkedin</label>
							<input type="checkbox" value=""<?php if ($_smarty_tpl->getVariable('data')->value['publish_Linkedin']==1){?> checked="checked"<?php }?> id="fep_publishLinkedin" class="publish-in-profile" data-toggle="tooltip" title="Publish in Profile">
							<input type="hidden" id="fep_publishLinkedin_input" name="fep_publishLinkedin" value="<?php echo $_smarty_tpl->getVariable('data')->value['publish_Linkedin'];?>
" />
							<input type="text" placeholder="Linkedin" id="inputLINKED" value="<?php echo $_smarty_tpl->getVariable('data')->value['Linkedin'];?>
" class="form-control" name="fep_social_linkedin">
						</div>
					</div>
				</div>
				<div class="row">
				    <div class="col-sm-12">
						<p><a class="but floatRight" href="" id="save-my-public-profile">Save</a></p>
						<p>
						<br/>
						&nbsp;<span id="UPDATE_USER_OK" class="FORM_OK floatRight">Successfully updated your public profile!</span>
						</p>
					</div>
				</div>
			</form>
		
		</div>
	</div>
	
	<?php echo smarty_function_xr_atom(array('a_id'=>573,'return'=>1),$_smarty_tpl);?>
