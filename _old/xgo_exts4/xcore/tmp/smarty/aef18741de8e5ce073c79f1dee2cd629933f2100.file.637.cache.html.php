<?php /* Smarty version Smarty-3.0.7, created on 2014-11-13 10:05:59
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/637.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:8523479705464828740f164-56715436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aef18741de8e5ce073c79f1dee2cd629933f2100' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/637.cache.html',
      1 => 1415873158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8523479705464828740f164-56715436',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_details','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions_edit::get_submission_students_by_id_step_2','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions_edit::get_submission_students_credits','var'=>'credits'),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions_edit::get_valid_credits','var'=>'validcredits'),$_smarty_tpl);?>



<?php if ($_REQUEST['debug']==1){?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>
<?php }?>

<input type="hidden" id="valid_credits" value="<?php echo $_smarty_tpl->getVariable('validcredits')->value;?>
" />

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
		    <h1>Edit Your Work - Print</h1>
		   
		    <ul class="nav nav-pills p-woche">
				<li><span class="step-menu">Step 1 - Contact Data</span></li>
				<li class="active"><span class="step-menu">Step 2- Input Your Work</span></li>
				<li><span class="step-menu">Step 3- Confirm</span></li>
			</ul>
		
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			
			<div class="row">
					<div class="col-sm-12">
					   <p><?php echo smarty_function_xr_imgWrapper(array('s_id'=>1180980,'ext'=>'png','w'=>1138,'class'=>"img-responsive"),$_smarty_tpl);?>
</p>
					</div>
					
				</div>

				<div class="row">
					<div id="uploaded-images" class="col-sm-12">
						
						
						
						
						
						
						
						
						<hr id="submission-hr-<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" />
                        <div class="row uploadedImg-1 submission-wrapper-cnt submission-wrapper-final" style="margin-top: 40px; position:relative;" id="submission-wrapper-<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
">
                        	<div class="col-sm-4 static-uploaded-images">
                        		
                        		<?php if ($_smarty_tpl->getVariable('data')->value['ess_image_highRes_s_id']==0){?>
                        		<?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['ess_image_s_id'],'w'=>400,'var'=>'image'),$_smarty_tpl);?>

                        		<?php }else{ ?>
                        		<?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['ess_image_highRes_s_id'],'w'=>400,'var'=>'image'),$_smarty_tpl);?>

                        		<?php }?>
                        		<img src="<?php echo $_smarty_tpl->getVariable('image')->value['src'];?>
" class="img-responsive" alt="" id="preview-image-<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" />
                        	    <div style="text-align: right;">
                        		<!--<a href="" class="but delete-submission" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
">Delete</a>-->
                        		</div>
                        		<div class="image-info-plus upload-area">
                        			highres status:  <?php if ($_smarty_tpl->getVariable('data')->value['ess_image_highRes_status']=='MISSING'){?><span id="highres_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" style="color: red;">MISSING</span><?php }else{ ?><span id="highres_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" style="color: green;">PRESENT</span><?php }?>
                        			<form enctype="multipart/form-data" method="POST" action="/xsite/call/fe_submissions_edit/upload_print_students_highres" id="fileupload_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
">
                        			<input type="hidden" name="SUBMISSIONTYPE" value="STUDENTS" />
                        			
                        			<span class="btn btn-default fileinput-button" id="uploadHighres_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
">
                        				<i class="glyphicon glyphicon-plus"> </i>
                        				<span>Add highres files...</span>
                        				<input type="file" name="files">
                        			</span>
                                    <input type="hidden" name="ess_id" value="<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" />
                                    </form>
                                    <div class="progress_container" id="upload_progress_container-<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" style="margin-top: 10px;">
                        			<div class="progress_bar" id="upload_progress_bar-<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
">
                        		  		 <div class="progress_completed" id="upload_progress_completed-<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
"></div>
                        			</div>
                        			<span id="unsupported_file_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" style="display:none; color: #a94442; font-weight: bold;">File type not allowed</span>
			                        <span id="toobig_file_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" style="display:none; color: #a94442; font-weight: bold;">File is too large</span>
                        		</div>
                        		</div>
                        		
                        		
                        	</div>
                        	
                        	<div class="col-sm-8 static-credits uploadedImg-1">
                        	<form class="submit-submission" id="submit-submission-<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
">	
                        
                        		<div class="form-group" style="position: relative;">
                                            <input type="hidden" name="ess_id" value="<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" /> 
                        					<label for="exampleInputKEY">Campaign</label>
                        					<input type="text" name="Campaign" id="Campaign_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" class="form-control inputCampaign highlight-on-error validate[required]" value="<?php echo $_smarty_tpl->getVariable('data')->value['ess_campaign'];?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" />
                        		</div>
                              
                                <div class="form-group">
                        					<label for="exampleInputKEY">AD Title</label>
                        					<input type="text" name="ADTitle" id="ADTitle_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" class="form-control inputAdTitle" value="<?php echo $_smarty_tpl->getVariable('data')->value['ess_ad_title'];?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" />
                        		</div>
                        		
                        		<div class="form-group">
                        					<label for="exampleInputADDescription">Explanation</label>
                        					<textarea class="form-control inputExplanation height200" name="Explanation" id="Explanation_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
"><?php echo $_smarty_tpl->getVariable('data')->value['ess_notes'];?>
</textarea>
                        		</div>
                        		
                        		<div class="form-group">
                        					<label for="datepicker">Release Date</label>
                        					<input type="text" class="form-control inputRelease highlight-on-error validate[required]" name="Release" id="Release_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" value="<?php echo $_smarty_tpl->getVariable('data')->value['ess_releaseDate'];?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" />
                        		</div>
                        
                        		<div class="form-group">
                        				<label for="exampleInputKEY">Keywords</label>
                        				<input type="text" class="form-control inputKeywords" name="Keywords" id="Keywords_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" value="<?php echo $_smarty_tpl->getVariable('data')->value['ess_keywords'];?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" />
                        		</div>
                        
                        
                        		<div class="form-group" id="form-credits-fields-<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
">
                        		
                                    <?php  $_smarty_tpl->tpl_vars['credit'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('credits')->value['validCredits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['credit']->key => $_smarty_tpl->tpl_vars['credit']->value){
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['credit']->key;
?>
                        		    <div class="form-group credits-div">
                        				<span class="credits-icon" style="text-transform: capitalize; margin-top: 3px;">
                        				    <img src="/archive/template/img/icons/nodot/credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_description'];?>
" class="icon-tooltip" title="<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_description'];?>
" />
                        				    <strong><?php echo $_smarty_tpl->tpl_vars['credit']->value['act_description'];?>
:</strong>    
                        				</span>
                        				<input type="text" class="input-complete highlight-on-error" name="credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
" id="students_credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" value="" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
" />
                        				<button type="button" class="credit-dont-know btn button-larger" title="don't know" id="dont-know-students_credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
-<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
">?</button> 
                        				<button type="button" class="credit-none btn button-larger" title="none" id="none-students_credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
-<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
">x</button> 
                        				<!--<span class="clearfix"> </span>-->
                        			</div>
                        		    <?php }} ?>
                        		</div>
                        			
                        	</form>	
                        	</div>
                        
                        </div>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
					</div>										
				</div>
	</div>
</div>

<br />

<div class="row">
    <div class="col-sm-12 marginTop20 marginBottom20">
    <a class="but button-large" href="<?php echo $_smarty_tpl->getVariable('data')->value['URL'];?>
">Back</a> <a id="submit-studenst-edit" class="but button-large" href="<?php echo smarty_function_xr_genlink(array('p_id'=>145),$_smarty_tpl);?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
">Next</a>
    </div>
</div>


<?php echo smarty_function_xr_atom(array('a_id'=>633,'return'=>1),$_smarty_tpl);?>


<script type="text/javascript">
    $(document).ready(function(){
	    submitFunction();
    });
</script>

<script type="text/javascript">
    
    function activteAfterInit<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
()
    {
        <?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('credits')->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['o']->key;
?>
        
        <?php if (count($_smarty_tpl->tpl_vars['o']->value)>0){?>
        <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['o']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['p']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['p']->value['id']!=''&&$_smarty_tpl->tpl_vars['p']->value['name']!=''){?>
        var credit_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
 = new Object();
		credit_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
.id = parseInt(<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
,10);
		credit_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
.name = "<?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
";
		$("#students_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
").tokenInput("add", credit_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
_<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
);
		<?php }?>
        <?php }} ?>
        <?php }?>
        <?php }} ?>
    }

    var doInit = true;

    $(document).ready(function(){
        activateCredits(<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
);
        activteAfterInit<?php echo $_smarty_tpl->getVariable('data')->value['ess_id'];?>
();
    });
</script>

