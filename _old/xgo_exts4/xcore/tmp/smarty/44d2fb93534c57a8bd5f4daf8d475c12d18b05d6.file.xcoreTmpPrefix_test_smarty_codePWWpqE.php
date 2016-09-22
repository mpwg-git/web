<?php /* Smarty version Smarty-3.0.7, created on 2014-08-05 18:34:00
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePWWpqE" */ ?>
<?php /*%%SmartyHeaderCode:157492396453e107787ab728-94876740%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44d2fb93534c57a8bd5f4daf8d475c12d18b05d6' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePWWpqE',
      1 => 1407256440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157492396453e107787ab728-94876740',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<hr id="submission-hr-<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" />
<div class="row uploadedImg-1 submission-wrapper-cnt submission-wrapper submission-wrapper-final" style="margin-top: 40px; position:relative;" id="submission-wrapper-<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
">
	<div class="col-sm-4 static-uploaded-images">

		<img src="<?php echo $_smarty_tpl->getVariable('data')->value['estd_lowres_thumbnail'];?>
" class="img-responsive" alt="" id="preview-image-<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" /> 
		<div style="text-align: right;">
		<a href="" class="but delete-submission" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" data-type="PRINT">Delete</a>
		</div>
		<div class="image-info-plus upload-area">
			highres status:  <?php if ($_smarty_tpl->getVariable('data')->value['estd_highres_ondisk']==''){?><span id="highres_<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" style="color: red;">MISSING</span><?php }else{ ?><span id="highres_<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" style="color: green;">PRESENT</span><?php }?>
			<form enctype="multipart/form-data" method="POST" action="/xsite/call/fe_submissions/upload_print_highres" id="fileupload_<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
">
			<input type="hidden" name="SUBMISSIONTYPE" value="PRINT" />
			<span class="btn btn-default fileinput-button" id="uploadHighres_<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
">
				<i class="glyphicon glyphicon-plus"> </i>
				<span>Add highres files...</span>
				<input type="file" name="files">
			</span>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" />
            </form>
            <div class="progress_container" id="upload_progress_container-<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" style="margin-top: 10px;">
			<div class="progress_bar" id="upload_progress_bar-<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
">
		  		 <div class="progress_completed" id="upload_progress_completed-<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
"></div>
			</div>
			<span id="unsupported_file_<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" style="display:none; color: #a94442; font-weight: bold;">File type not allowed</span>
			<span id="toobig_file_<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" style="display:none; color: #a94442; font-weight: bold;">File is too large</span>
		</div>
		</div>
		
		
	</div>
	
	<div class="col-sm-8 static-credits uploadedImg-1">
	<form class="submit-submission" id="submit-submission-<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
">	

		<div class="form-group" style="position: relative;">
                    <input type="hidden" name="submissionid" value="<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" /> 
					<label for="exampleInputKEY">Campaign</label>
					<input type="text" name="Campaign" id="Campaign_<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" class="form-control inputCampaign highlight-on-error validate[required]" value="<?php echo $_smarty_tpl->getVariable('data')->value['RAWDATA']['Campaign'];?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" />
		</div>
      
        <div class="form-group">
					<label for="exampleInputKEY">AD Title</label>
					<input type="text" name="ADTitle" id="ADTitle_<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" class="form-control inputAdTitle" value="<?php echo $_smarty_tpl->getVariable('data')->value['RAWDATA']['ADTitle'];?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" />
		</div>
		
		<div class="form-group">
					<label for="exampleInputADDescription">Explanation</label>
					<textarea class="form-control inputExplanation height200" name="Explanation" id="Explanation_<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
"><?php echo $_smarty_tpl->getVariable('data')->value['RAWDATA']['Explanation'];?>
</textarea>
		</div>
		
		<div class="form-group">
					<label for="datepicker">Release Date</label>
					<input type="text" class="form-control datepicker inputRelease highlight-on-error validate[required]" name="Release" id="Release_<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" value="<?php echo $_smarty_tpl->getVariable('data')->value['RAWDATA']['Release'];?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" />
		</div>

		<div class="form-group">
				<label for="exampleInputKEY">Keywords</label>
				<input type="text" class="form-control inputKeywords" name="Keywords" id="Keywords_<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" value="<?php echo $_smarty_tpl->getVariable('data')->value['RAWDATA']['Keywords'];?>
" />
		</div>


		<div class="form-group" id="form-credits-fields-<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
">
		    
		    <?php  $_smarty_tpl->tpl_vars['credit'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('validCredits')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['credit']->key => $_smarty_tpl->tpl_vars['credit']->value){
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['credit']->key;
?>
		    <div class="form-group credits-div">
				<span class="credits-icon" style="text-transform: capitalize;">
				    <img src="/archive/template/img/icons/nodot/credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_description'];?>
" class="icon-tooltip" title="<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_description'];?>
" />
				    <strong><?php echo $_smarty_tpl->tpl_vars['credit']->value['act_description'];?>
:</strong>    
				</span>
				<input type="text" class="input-complete highlight-on-error" name="credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
" id="credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
_<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" value="" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" />
				<button type="button" class="credit-dont-know btn button-larger" title="don't know" id="dont-know-credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
-<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
"> ? </button> 
				<button type="button" class="credit-none btn button-larger" title="none" id="none-credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
-<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
"> x </button> 
				<!--<span class="clearfix"> </span>-->
			</div>
		    <?php }} ?>
		    
		    <div class="row">
				<div class="col-sm-12 marginTop20 marginBottom20">
        		    <div style="text-align: right;">
        		    
        			<a href="" class="but button-large next-in-submission" id="next-in-submission_<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
">confirm</a>
                    </div>
                </div>
            </div>
		</div>
			
	</form>	
	</div>

<div class="disable-submission" id="disable-submission-<?php echo $_smarty_tpl->getVariable('data')->value['estd_id'];?>
"> </div>

</div>
<!-- image END -->