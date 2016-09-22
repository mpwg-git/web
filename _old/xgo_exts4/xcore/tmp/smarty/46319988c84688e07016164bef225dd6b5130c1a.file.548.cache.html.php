<?php /* Smarty version Smarty-3.0.7, created on 2014-07-25 11:07:43
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/548.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:175692641953d21e5fc3d618-37074611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46319988c84688e07016164bef225dd6b5130c1a' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/548.cache.html',
      1 => 1406279263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175692641953d21e5fc3d618-37074611',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_details','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions::sc_get_backend_countries','var'=>'countries'),$_smarty_tpl);?>

<div class="modal fade" id="createContactModalForm">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Create contact</h4>
			</div>
			<div class="modal-body">
				
							<div class="row">
								<div class="col-sm-12">
								    <div class="form-group">
								        <label for="exampleInputLAND">Contact Type</label>
										<select class="form-control" id="create-submission-type">
            								<option value="0" selected="selected">Company</option>
            								<option value="1">Person</option>
										</select>
										<input type="hidden" name="la_input_id" id="la_input_id" value="0" />
									</div>
									<div id="create-submission-company">
									    <form id="create-submission-company-form">
									    <input type="hidden" name="TYPE" value="0" />
									    <input type="hidden" name="CONTACTTYPE" id="submission-company-contacttype" value="0" />
    									<div class="form-group">
												<label for="submission-company-company">Company Name</label>
												<input name="COMPANY" type="text" class="form-control required" id="submission-company-company" placeholder="Enter Company Name" />
    									</div>
    									<div class="form-group">
												<label for="submission-company-city">City</label>
												<input name="CITY" type="text" class="form-control" id="submission-company-city" placeholder="Enter City" />
    									</div>
    									<div class="form-group">
    									    <label for="submission-company-country">Country</label>
    										<select class="form-control required-country" name="COUNTRY">
    										    <option value="-1">Choose Country</option>
    											<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('countries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                								<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['ac_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['ac_name'];?>
</option>
                								<?php }} ?>
    										</select>
    									</div>
    									<div class="row">
                        					<div class="col-sm-6">
            									<div class="form-group">
        												<label for="submission-company-firstname">Firstname</label>
        												<input name="FIRST" type="text" class="form-control" id="submission-company-firstname" placeholder="Firstname" />
            									</div>
            								</div>
            								<div class="col-sm-6">
            									<div class="form-group">
        												<label for="submission-company-lastname">Lastname</label>
        												<input name="LAST" type="text" class="form-control" id="submission-company-lastname" placeholder="Lastname" />
            									</div>
        									</div>
        								</div>
    									<div class="form-group">
                							<label for="submission-company-email">Email</label>
                							<input type="text" name="EMAIL" value="" placeholder="Enter Email" id="submission-company-email" class="form-control">
                						</div>
    									<div class="row">
                        					<div class="col-sm-3">
                        						<div class="form-group">
                        							<label for="submission-company-telcode">Code</label>
                        							<input type="text" name="TELCODE" value="" placeholder="Enter Code" id="submission-company-telcode" class="form-control">
                        						</div>
                        					</div>
                        					<div class="col-sm-9">
                        						<div class="form-group">
                        							<label for="submission-company-tel">Tel</label>
                        							<input type="text" name="TEL" value="" placeholder="Enter Tel" id="submission-company-tel" class="form-control">
                        						</div>
                        					</div>
                        				</div> 
                        				</form>
                    				</div>
                    				
                    				<div id="create-submission-person">
                    				    <form id="create-submission-person-form">
                    				    <input type="hidden" name="TYPE" value="1" />
                    				    <input type="hidden" name="CONTACTTYPE" id="submission-person-contacttype" value="0" />
                    				    <div class="row">
                        					<div class="col-sm-6">
            									<div class="form-group">
        												<label for="submission-person-firstname">Firstname</label>
        												<input name="FIRST" type="text" class="form-control required" id="submission-person-firstname" placeholder="Firstname" />
            									</div>
            								</div>
            								<div class="col-sm-6">
            									<div class="form-group">
        												<label for="submission-contact-lastname">Lastname</label>
        												<input name="LAST" type="text" class="form-control required" id="submission-person-lastname" placeholder="Lastname" />
            									</div>
        									</div>
        								</div>
                    				    <div class="form-group">
												<label for="submission-person-company">Company Name</label>
												<input name="COMPANY" type="text" class="form-control" id="submission-person-company" placeholder="Enter Company Name" />
    									</div>
    									<div class="form-group">
												<label for="submission-contact-city">City</label>
												<input name="CITY" type="text" class="form-control" id="submission-person-city" placeholder="Enter City" />
    									</div>
    									<div class="form-group">
    									    <label for="submission-person-country">Country</label>
    										<select class="form-control required-country" name="COUNTRY">
    										    <option value="-1">Choose Country</option>
    											<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('countries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                								<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['ac_id'];?>
"<?php if ($_smarty_tpl->tpl_vars['v']->value['ac_id']==$_smarty_tpl->getVariable('data')->value['COUNTRY']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['ac_name'];?>
</option>
                								<?php }} ?>
    										</select>
    									</div>
    									
    									<div class="form-group">
                							<label for="submission-person-email">Email</label>
                							<input type="text" name="EMAIL" value="" placeholder="Enter Email" id="submission-person-email" class="form-control">
                						</div>
    									<div class="row">
                        					<div class="col-sm-3">
                        						<div class="form-group">
                        							<label for="submission-person-telcode">Code</label>
                        							<input type="text" name="TELCODE" value="" placeholder="Enter Code" id="submission-person-telcode" class="form-control">
                        						</div>
                        					</div>
                        					<div class="col-sm-9">
                        						<div class="form-group">
                        							<label for="submission-contact-tel">Tel</label>
                        							<input type="text" name="TEL" value="" placeholder="Enter Tel" id="submission-person-tel" class="form-control">
                        						</div>
                        					</div>
                        				</div> 
                        				</form>
                    				</div>
								</div>
							</div>	
				
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" id="create-submission-close">Close</button>
				<button type="button" class="btn btn-primary" id="create-submission-save">Save</button>
			</div>
		</div>
	</div>
</div>
</div>