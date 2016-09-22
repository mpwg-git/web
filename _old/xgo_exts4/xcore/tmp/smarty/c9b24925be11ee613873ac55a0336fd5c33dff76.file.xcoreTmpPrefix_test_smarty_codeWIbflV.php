<?php /* Smarty version Smarty-3.0.7, created on 2014-08-13 00:29:34
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeWIbflV" */ ?>
<?php /*%%SmartyHeaderCode:97844163653ea954eae57a9-05298174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9b24925be11ee613873ac55a0336fd5c33dff76' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeWIbflV',
      1 => 1407882574,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97844163653ea954eae57a9-05298174',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?>
<div class="row" style="margin-top: 20px; position:relative;">
	<div class="col-sm-4 static-uploaded-images">
	    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>270410,'w'=>349,'h'=>208,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive",'id'=>"beyond-archive-image"),$_smarty_tpl);?>

		
        <div class="image-info-plus upload-area">
			<form enctype="multipart/form-data" method="POST" action="/xsite/call/fe_my_archive/upload_beyond" id="beyond-archive-upload">
			<span class="btn btn-default fileinput-button">
				<i class="glyphicon glyphicon-plus"> </i>
				<span>Add image...</span>
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
		
	</div>
	
	<div class="col-sm-6 static-credits uploadedImg-1">
	<form id="beyond-archive-form">	
        
        <div class="form-group">
					<label for="exampleInputKEY">Title</label>
					<input type="hidden" name="imageName" id="beyond-image-name" />
					<input type="text" name="Title" class="form-control required" id="beyond-archive-title" value="" />
		</div>
		
		<div class="form-group">
					<label for="exampleInputADDescription">Description</label>
					<textarea class="form-control height200" name="Description"><?php echo $_smarty_tpl->getVariable('data')->value['RAWDATA']['Explanation'];?>
</textarea>
		</div>
		<div class="form-group">
	
		    <div style="text-align: right;">
			<a href="" class="but" id="beyond-archive-add-button">add new work</a>
            </div>
		</div>
			
	</form>	
	</div>

</div>
<!-- image END -->