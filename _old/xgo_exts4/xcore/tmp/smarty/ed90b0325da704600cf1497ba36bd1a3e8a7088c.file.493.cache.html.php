<?php /* Smarty version Smarty-3.0.7, created on 2014-10-02 17:19:06
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/493.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:703217222542d890a3b1ee7-14940736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed90b0325da704600cf1497ba36bd1a3e8a7088c' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/493.cache.html',
      1 => 1412270345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '703217222542d890a3b1ee7-14940736',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_wzActionInvisibleCaptcha')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wzActionInvisibleCaptcha.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_details','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions::sc_get_countries','var'=>'countries'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions::get_contact_data','var'=>'contact'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('contact')->value!=false){?>
<?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable($_smarty_tpl->getVariable('contact')->value, null, null);?>
<?php }?>

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
		    <h1>Submit Your Work
		       <span style="float: right;">  
        		     <a href="/archive/submissions_help.pdf" target="_blank" class="but detailbutton_back">Help ?</a>
        	   </span> 
		        
		    </h1>
		    
		    <ul class="nav nav-pills p-woche">
				<li class="active"><span class="step-menu">Step 1 - Contact Data</span></li>
				<li><span class="step-menu">Step 2- Input Your Work</span></li>
				<li><span class="step-menu">Step 3- Confirm</span></li>
			</ul>
			
			<p class="looklikeH1">Personal</p>
		
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div class="row">
		<div class="col-sm-6">
			<form id="submission-contact-data">
			<?php echo smarty_function_xr_wzActionInvisibleCaptcha(array(),$_smarty_tpl);?>

	        <input name="IPADRESSE" id="IPADRESSE" type="hidden" value="<?php echo $_SERVER['REMOTE_ADDR'];?>
" />
	        <input type="hidden" name="SUBMISSIONTYPE" value="PRINT" />
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="exampleInputVNAME">Firstname</label>
							<input type="text" name="FIRSTNAME" value="<?php echo $_smarty_tpl->getVariable('data')->value['FIRSTNAME'];?>
" placeholder="Enter Firstname" id="exampleInputVNAME" class="form-control required validate[required]">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="exampleInputNNAME">Lastname</label>
							<input type="text" name="LASTNAME" value="<?php echo $_smarty_tpl->getVariable('data')->value['LASTNAME'];?>
" placeholder="Enter Lastname" id="exampleInputNNAME" class="form-control required validate[required]">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="exampleInputCOMP">Company</label>
							<input type="text" name="COMPANY" value="<?php echo $_smarty_tpl->getVariable('data')->value['COMPANY'];?>
" placeholder="Enter Company" id="exampleInputCOMP" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="exampleInputLAND">Country</label>
							<select class="form-control validate[required]" name="COUNTRY_ID" id="contact_country">
							    <option  value="-1" <?php if ($_smarty_tpl->getVariable('data')->value['COUNTRY_ID']==''){?>selected="selected"<?php }?>>Choose Country</option>
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('countries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['asc_id'];?>
"<?php if ($_smarty_tpl->getVariable('data')->value['COUNTRY_ID']==$_smarty_tpl->tpl_vars['v']->value['asc_id']){?> selected="selected"<?php }?> data-tel="<?php echo $_smarty_tpl->tpl_vars['v']->value['asc_phone_code'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['asc_name'];?>
</option>
								<?php }} ?>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="exampleInputCITY">City</label>
							<input type="text" name="CITY" value="<?php echo $_smarty_tpl->getVariable('data')->value['CITY'];?>
" placeholder="Enter City" id="exampleInputCITY" class="form-control required validate[required]">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="exampleInputZIP">ZIP</label>
							<input type="text" name="ZIP" value="<?php echo $_smarty_tpl->getVariable('data')->value['ZIP'];?>
" placeholder="Enter ZIP" id="exampleInputZIP" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="exampleInputADRESS">Address</label>
							<input type="text" name="STREET" value="<?php echo $_smarty_tpl->getVariable('data')->value['STREET'];?>
" placeholder="Enter Adress" id="exampleInputADRESS" class="form-control required validate[required]">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<div class="form-group">
							<label for="exampleInputCODE">Tel Code</label>
							<input type="text" name="TELCODE" value="<?php echo $_smarty_tpl->getVariable('data')->value['TELCODE'];?>
" placeholder="Enter Code" id="exampleInputCODE" class="form-control">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="exampleInputTEL">Tel</label>
							<input type="text" name="TEL" name="InputVNAME" value="<?php echo $_smarty_tpl->getVariable('data')->value['TEL'];?>
" placeholder="Enter Tel" id="exampleInputTEL" class="form-control">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="exampleInputEMAIL">Email</label>
							<input type="text" name="EMAIL" value="<?php echo $_smarty_tpl->getVariable('data')->value['EMAIL'];?>
" placeholder="Enter Email" id="exampleInputEMAIL" class="form-control required validate[required,custom[email]]">
						</div>
					</div>
				</div>
				<h2 class="linieBottom">Second Contact Person</h2>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="exampleInputCONTACTP">Name for Second Contact</label>
							<input type="text" name="SECONDNAME" value="<?php echo $_smarty_tpl->getVariable('data')->value['SECONDNAME'];?>
" placeholder="Enter Second Contactperson" id="exampleInputCONTACT2" class="form-control extra_required">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<div class="form-group">
							<label for="exampleInputCODE">Code</label>
							<input type="text" name="SECONDTELCODE" value="<?php echo $_smarty_tpl->getVariable('data')->value['SECONDTELCODE'];?>
" placeholder="Enter Code" id="exampleInputCODE2" class="form-control">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="exampleInputTEL">Tel</label>
							<input type="text" name="SECONDTEL" value="<?php echo $_smarty_tpl->getVariable('data')->value['SECONDTEL'];?>
" placeholder="Enter Tel" id="exampleInputTEL2" class="form-control">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="exampleInputEMAIL">Email</label>
							<input type="text" name="SECONDEMAIL" value="<?php echo $_smarty_tpl->getVariable('data')->value['SECONDEMAIL'];?>
" placeholder="Enter Email" id="exampleInputEMAIL2" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
				    <div class="col-sm-12 marginTop20 marginBottom20">
				    <a class="but button-large" href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
">Back</a> <a class="but button-large" href="<?php echo smarty_function_xr_genlink(array('p_id'=>51),$_smarty_tpl);?>
" id="submit-contact-data">Next</a>
			        </div>
				</div>
			</form>
		</div>
	</div>
	
	