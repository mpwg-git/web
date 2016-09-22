<?php /* Smarty version Smarty-3.0.7, created on 2015-01-05 15:27:43
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeu6FiIQ" */ ?>
<?php /*%%SmartyHeaderCode:149795593754aa9f5f80b9f9-41473275%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '064c5e7f7d36a5d7fd6a1639f0bbefba3d7a108d' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeu6FiIQ',
      1 => 1420468063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149795593754aa9f5f80b9f9-41473275',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (count($_smarty_tpl->getVariable('uploads')->value)>0){?>

<script type="text/javascript">
    $(document).ready(function(){
	    submitFunction();
    });
</script>

<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('uploads')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
<!-- image BEGIN -->
<hr id="submission-hr-<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" />
<div class="row uploadedImg-1 submission-wrapper-cnt submission-wrapper-final" style="margin-top: 40px; position:relative;" id="submission-wrapper-<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
">
	<div class="col-sm-4 static-uploaded-images">
		
		<?php if ($_smarty_tpl->tpl_vars['data']->value['estd_highres_thumbnail']!=''){?>
		<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_highres_thumbnail'];?>
" class="img-responsive" alt="" id="preview-image-<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" />
		<?php }else{ ?>
		<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_lowres_thumbnail'];?>
" class="img-responsive" alt="" id="preview-image-<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" />
		<?php }?>
		<div style="text-align: right;">
		<a href="" class="but delete-submission" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" data-type="PRINT">Delete</a>
		</div>
		<div class="image-info-plus upload-area">
			highres status:  <?php if ($_smarty_tpl->tpl_vars['data']->value['estd_highres_ondisk']==''){?><span id="highres_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" style="color: red;">MISSING</span><?php }else{ ?><span id="highres_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" style="color: green;">PRESENT</span><?php }?>
			<form enctype="multipart/form-data" method="POST" action="/xsite/call/fe_submissions/upload_print_highres" id="fileupload_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
">
			<input type="hidden" name="SUBMISSIONTYPE" value="PRINT" />
			<span class="btn btn-default fileinput-button" id="uploadHighres_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
">
				<i class="glyphicon glyphicon-plus"> </i>
				<span>Add highres files...</span>
				<input type="file" name="files">
			</span>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" />
            </form>
            <div class="progress_container" id="upload_progress_container-<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" style="margin-top: 10px;">
			<div class="progress_bar" id="upload_progress_bar-<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
">
		  		 <div class="progress_completed" id="upload_progress_completed-<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
"></div>
			</div>
			<span id="unsupported_file_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" style="display:none; color: #a94442; font-weight: bold;">File type not allowed</span>
			<span id="toobig_file_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" style="display:none; color: #a94442; font-weight: bold;">File is too large</span>
		</div>
		</div>
		
		
	</div>
	
	<div class="col-sm-8 static-credits uploadedImg-1">
	<form class="submit-submission" id="submit-submission-<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
">	

		<div class="form-group" style="position: relative;">
                    <input type="hidden" name="submissionid" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" /> 
					<label for="exampleInputKEY">Campaign</label>
					<input type="text" name="Campaign" id="Campaign_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" class="form-control inputCampaign highlight-on-error validate[required]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['RAWDATA']['Campaign'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" />
		</div>
      
        <div class="form-group">
					<label for="exampleInputKEY">AD Title</label>
					<input type="text" name="ADTitle" id="ADTitle_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" class="form-control inputAdTitle" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['RAWDATA']['ADTitle'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" />
		</div>
		
		<div class="form-group">
					<label for="exampleInputADDescription">Explanation</label>
					<textarea class="form-control inputExplanation height200" name="Explanation" id="Explanation_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['RAWDATA']['Explanation'];?>
</textarea>
		</div>
		
		<div class="form-group">
					<label for="datepicker">Release Date</label>
					<input type="text" class="form-control inputRelease highlight-on-error validate[required]" name="Release" id="Release_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['RAWDATA']['Release'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" />
		</div>

		<div class="form-group">
				<label for="exampleInputKEY">Keywords</label>
				<input type="text" class="form-control inputKeywords" name="Keywords" id="Keywords_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['RAWDATA']['Keywords'];?>
" />
		</div>


		<div class="form-group" id="form-credits-fields-<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
">
		    <?php  $_smarty_tpl->tpl_vars['credit'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('validCredits')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" value="" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" />
				<button type="button" class="credit-dont-know btn button-larger" title="don't know" id="dont-know-credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
-<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
">?</button> 
				<button type="button" class="credit-none btn button-larger" title="none" id="none-credit_<?php echo $_smarty_tpl->tpl_vars['credit']->value['act_id'];?>
-<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
">x</button> 
				<!--<span class="clearfix"> </span>-->
			</div>
		    <?php }} ?>
            
            <div class="row">
				<div class="col-sm-12 marginTop20 marginBottom20">
        		    <div style="text-align: right;">
        		    
        			<a href="" class="but button-large next-in-submission" id="next-in-submission_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
">confirm</a>
                    </div>
                </div>
            </div>
            
            <div style="display: none;" class="allcreditsnone-error" id="submit-submission-allnone-<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
">
                Not all credits can be 'none'.
            </div>
            
            
		</div>
			
	</form>	
	</div>

<!--<div class="disable-submission-multi" id="disable-submission-<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
"<?php if ($_smarty_tpl->tpl_vars['k']->value>0){?> style="display:block;"<?php }?>> </div>-->

</div>



<script type="text/javascript">
    
    function activteAfterInit<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
()
    {
        <?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['CREDITS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
 = new Object();
		credit_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
.id = parseInt(<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
,10);
		credit_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
.name = "<?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
";
		$("#<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
").tokenInput("add", credit_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
);
		<?php }?>
        <?php }} ?>
        <?php }?>
        <?php }} ?>
    }

    var doInit = true;

    $(document).ready(function(){
        activateCredits(<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
);
        activteAfterInit<?php echo $_smarty_tpl->tpl_vars['data']->value['estd_id'];?>
();
    });
</script>

<!-- image END -->
<?php }} ?>

<script type="text/javascript">
    $(document).ready(function(){
       countSubmissions = <?php echo count($_smarty_tpl->getVariable('uploads')->value);?>
;
    });
</script>

<?php }?>