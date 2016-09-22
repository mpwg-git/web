<?php /* Smarty version Smarty-3.0.7, created on 2014-10-10 12:10:18
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesw4je2" */ ?>
<?php /*%%SmartyHeaderCode:15354723905437ccaa31ea48-26504525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95365b92ad42301ea9f81a305884c7bbca518903' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesw4je2',
      1 => 1412943018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15354723905437ccaa31ea48-26504525',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_details','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions_edit::get_submission_by_id_step_2','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions_edit::get_submission_credits_new','var'=>'credits'),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions_edit::get_valid_credits','var'=>'validcredits'),$_smarty_tpl);?>


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
		    <h1>Edit Your Work - TV Commercials</h1>
		   
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
					   <p><?php echo smarty_function_xr_imgWrapper(array('s_id'=>1180979,'ext'=>'png','w'=>1138,'class'=>"img-responsive"),$_smarty_tpl);?>
</p>
					</div>
				</div>
					
					<div class="row">
						<div class="col-sm-12" id="uploaded-images">
							
							
							
							
							
							<hr id="submission-hr-<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" />
                            <div class="row uploadedImg-1 submission-wrapper-cnt submission-wrapper-final" style="margin-top: 40px; position:relative;" id="submission-wrapper-<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
">
                            	<div class="col-sm-4 static-uploaded-images">
                            	    <?php if ($_smarty_tpl->getVariable('data')->value['es_video_poster_s_id']>0){?>
                            	    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['es_video_poster_s_id'],'w'=>400,'var'=>'image'),$_smarty_tpl);?>

                            	    <img src="<?php echo $_smarty_tpl->getVariable('image')->value['src'];?>
" id="coverImage_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" class="img-responsive" alt="" />
                            	    <?php }else{ ?>
                            	    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>270410,'w'=>349,'h'=>208,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive",'id'=>"coverImage_".($_smarty_tpl->getVariable('data')->value['es_id'])),$_smarty_tpl);?>

                            	    <?php }?>
                            	    <div style="text-align: right;">
                            		<!--<a href="" class="but delete-submission" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
">Delete</a>-->
                            		</div>
                            		<div class="image-info-plus upload-area">
                        			    highres status:  <?php if ($_smarty_tpl->getVariable('data')->value['es_image_highRes_status']=='MISSING'){?><span id="highres_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" style="color: red;">MISSING</span><?php }else{ ?><span id="highres_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" style="color: green;">PRESENT</span><?php }?>
                            			<form enctype="multipart/form-data" method="POST" action="/xsite/call/fe_submissions_edit/upload_video_highres" id="fileupload_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
">
                            			<input type="hidden" name="SUBMISSIONTYPE" value="VIDEO" />
                            			<span class="btn btn-default fileinput-button" id="uploadHighresVideo_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
">
                            				<i class="glyphicon glyphicon-plus"> </i>
                            				<span>Add highres file...</span>
                            				<input type="file" name="files">
                            			</span>
                                        <input type="hidden" name="es_id" value="<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" />
                                        </form>
                                        <div class="progress_container" id="upload_progress_container-<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" style="margin-top: 10px;">
                            				<div class="progress_bar" id="upload_progress_bar-<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
">
                            			  		 <div class="progress_completed" id="upload_progress_completed-<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
"></div>
                            				</div>
                            		    </div>
                            		    <span id="unsupported_file_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" style="display:none; color: #a94442; font-weight: bold;">File type not allowed</span>
			                            <span id="toobig_file_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" style="display:none; color: #a94442; font-weight: bold;">File is too large</span>
                            		</div>
                            		<br />
                                    <div class="image-info-plus upload-area">
                            			<form enctype="multipart/form-data" method="POST" action="/xsite/call/fe_submissions_edit/upload_video_cover" id="Coverimage_fileupload_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
">
                            			<input type="hidden" name="SUBMISSIONTYPE" value="VIDEO" />
                            			<span class="btn btn-default fileinput-button" id="uploadCoverimage_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
">
                            				<i class="glyphicon glyphicon-plus"> </i>
                            				<span>Add Still...</span>
                            				<input type="file" name="files">
                            			</span>
                                        <input type="hidden" name="es_id" value="<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" />
                                        </form>
                                        <div class="progress_container" id="Coverimage_upload_progress_container-<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" style="margin-top: 10px;">
                            				<div class="progress_bar" id="Coverimage_upload_progress_bar-<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
">
                            			  		 <div class="progress_completed" id="Coverimage_upload_progress_completed-<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
"></div>
                            				</div>
                            		    </div>
                            		    <span id="unsupported_file_still_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" style="display:none; color: #a94442; font-weight: bold;">File type not allowed</span>
			                            <span id="toobig_file_still_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" style="display:none; color: #a94442; font-weight: bold;">File is too large</span>
                            		</div>
                            		<br />
                            		<div class="image-info-plus upload-area">
                                        <a href="" class="but selectCoverImage-edit" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
">Select Still from Video</a>
                                        <div class="thumb_loader" id="thumb_loader_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
"> </div>
                                        <div class="clearer"> </div>
                                        <div id="selectCoverImageWrapper_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" class="selectCoverImageWrapper">
                                            
                                            
                                        </div>
                            		</div>
                            		
                            	</div>
                            	
                            	<div class="col-sm-8 static-credits uploadedImg-1">
                            	<form class="submit-submission" id="submit-submission-<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
">	
                            
                            		<div class="form-group">
                                                <input type="hidden" name="es_id" value="<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" /> 
                            					<label for="exampleInputKEY">Campaign</label>
                            					<input type="text" name="Campaign" id="Campaign_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" class="form-control exampleCampaign highlight-on-error validate[required]" value="<?php echo $_smarty_tpl->getVariable('data')->value['es_campaign'];?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" />
                            		</div>
                                  
                                    <div class="form-group">
                            					<label for="exampleInputKEY">AD Title</label>
                            					<input type="text" name="ADTitle" id="ADTitle_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" class="form-control exampleCampaign highlight-on-error validate[required]" value="<?php echo $_smarty_tpl->getVariable('data')->value['es_ad_title'];?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" />
                            		</div>
                            		
                            		<div class="form-group">
                            					<label for="exampleInputADDescription">Explanation</label>
                            					<textarea class="form-control exampleExplanation height200" name="Explanation" id="Explanation_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
"><?php echo $_smarty_tpl->getVariable('data')->value['es_notes'];?>
</textarea>
                            		</div>
                            		
                            		<div class="form-group">
                            					<label for="datepicker">Release Date</label>
                            					<input type="text" class="form-control datepicker exampleRelease highlight-on-error validate[required]" name="Release" id="Release_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" value="<?php echo $_smarty_tpl->getVariable('data')->value['es_releaseDate'];?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" />
                            		</div>
                            
                            		<div class="form-group">
                            				<label for="exampleInputKEY">Keywords</label>
                            				<input type="text" class="form-control exampleKeywords" name="Keywords" id="Keywords_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" value="<?php echo $_smarty_tpl->getVariable('data')->value['es_keywords'];?>
" />
                            		</div>
                            
                            
                            		<div class="form-group" id="form-credits-fields-<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
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
" id="credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" value="" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
" />
                            				<button type="button" class="credit-dont-know btn button-larger" title="don't know" id="dont-know-credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
-<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
">?</button> 
                            				<button type="button" class="credit-none btn button-larger" title="none" id="none-credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
-<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
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
">Back</a> <a id="submit-edit" class="but button-large" href="<?php echo smarty_function_xr_genlink(array('p_id'=>111),$_smarty_tpl);?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
">Next</a>
    </div>
</div>	

<?php echo smarty_function_xr_atom(array('a_id'=>548,'return'=>1),$_smarty_tpl);?>


<script type="text/javascript">
    $(document).ready(function(){
	    submitFunction();
    });
</script>

<script type="text/javascript">
    
    function activteAfterInit<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
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
_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
 = new Object();
		credit_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
.id = parseInt(<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
,10);
		credit_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
.name = "<?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
";
		$("#<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
").tokenInput("add", credit_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
_<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
);
		<?php }?>
        <?php }} ?>
        <?php }?>
        <?php }} ?>
    }

    var doInit = true;

    $(document).ready(function(){
        activateCredits(<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
);
        activteAfterInit<?php echo $_smarty_tpl->getVariable('data')->value['es_id'];?>
();
    });
</script>