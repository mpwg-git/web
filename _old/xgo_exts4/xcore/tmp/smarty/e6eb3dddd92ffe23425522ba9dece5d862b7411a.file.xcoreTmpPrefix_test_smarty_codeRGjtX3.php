<?php /* Smarty version Smarty-3.0.7, created on 2014-10-02 17:47:54
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRGjtX3" */ ?>
<?php /*%%SmartyHeaderCode:1782789521542d8fca5849b7-65009493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6eb3dddd92ffe23425522ba9dece5d862b7411a' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRGjtX3',
      1 => 1412272074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1782789521542d8fca5849b7-65009493',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_details','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions::get_already_uploaded_work','SUBMISSIONTYPE'=>'SPECIALS','var'=>'html'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions::get_valid_credits','var'=>'validcredits'),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions::set_special_name','var'=>'specialname'),$_smarty_tpl);?>


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
		    <h1>Submit Your Work - <?php if ($_smarty_tpl->getVariable('specialname')->value['em_name']!=''){?><?php echo $_smarty_tpl->getVariable('specialname')->value['em_name'];?>
<?php }else{ ?>Special<?php }?></h1>
		   
		    <ul class="nav nav-pills p-woche">
				<li><span class="step-menu">Step 1 - Contact Data</span></li>
				<li class="active"><span class="step-menu">Step 2- Input Your Work</span></li>
				<li><span class="step-menu">Step 3- Confirm</span></li>
			</ul>
		
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div id="modalfileexists" class="modal">
    	<div class="modal-dialog">
            <div class="modal-content">
            	<div class="modal-body">
            	    File has already been uploaded.<br /><br />
            	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	    </div>
        	</div>
    	</div>    
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			
				<div class="row">
					<div class="col-sm-12">
					   <p><?php echo smarty_function_xr_imgWrapper(array('s_id'=>1180980,'ext'=>'png','w'=>1138,'class'=>"img-responsive"),$_smarty_tpl);?>
</p>
					</div>
					<div class="col-sm-12">
					    <div class="row">
					        <div class="col-sm-6">
					            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>1180981,'ext'=>'png','w'=>600,'class'=>"img-responsive"),$_smarty_tpl);?>

					        </div>
					        <div class="col-sm-6">
					            <div style="border: 2px solid #737371; margin-top: 2px;">
					                <div style="float: left;">
					                    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>1180978,'ext'=>'png','w'=>100,'class'=>"img-responsive",'id'=>"updload_text_img"),$_smarty_tpl);?>

					                </div>
					                <div style="float: left; padding-bottom: 10px;">
        				            	<form id="fileupload" action="/xsite/call/fe_submissions/upload_specials" method="POST" enctype="multipart/form-data">
                        				<div class="upload-area" style="padding-top: 30px;">
                        				    <span id="uploadFiles" class=" btn btn-default fileinput-button fileinput-button-main">
                    							<i class="glyphicon glyphicon-plus"> </i>
                    							<span>Add images...</span>
                    							<input type="file" name="files[]" multiple="">
                    						</span>
                    						<input type="hidden" name="SUBMISSIONTYPE" value="SPECIALS" />
                        				</div></form>
                    				</div>
                				    <div class="clearer"> </div>
                				</div>
					        </div>
					    </div>
					   <p></p>
					</div>
				</div>
				
				
				<div class="row" style="padding-top: 30px;">
					<div class="col-sm-12">
						<table role="presentation" class="table table-striped"><tbody class="files" id="previewFileUpload"></tbody></table>
					</div>										
				</div>
				
				<div class="row">
					<div id="uploaded-images" class="col-sm-12">
						<?php echo $_smarty_tpl->getVariable('html')->value;?>

					</div>										
				</div>
				
	</div>

</div>

<br />

<div class="row">
    <div class="col-sm-12 marginTop20 marginBottom20 submissionbuttoncontainer">
    <a class="but button-large" href="<?php echo smarty_function_xr_genlink(array('p_id'=>97),$_smarty_tpl);?>
">Back</a> <a id="submit-specials" class="but button-large <?php if ($_smarty_tpl->getVariable('html')->value==''){?>disable-submission-send<?php }?>" href="<?php echo smarty_function_xr_genlink(array('p_id'=>101),$_smarty_tpl);?>
">Next</a>
    </div>
</div>

<?php echo smarty_function_xr_atom(array('a_id'=>548,'return'=>1),$_smarty_tpl);?>


<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270410,'w'=>80),$_smarty_tpl);?>
</span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger" style="display:block;"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
    </tr>
{% } %}
</script>