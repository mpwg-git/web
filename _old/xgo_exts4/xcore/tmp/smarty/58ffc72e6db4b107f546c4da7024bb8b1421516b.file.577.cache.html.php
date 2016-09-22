<?php /* Smarty version Smarty-3.0.7, created on 2014-08-12 23:23:43
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/577.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:25064232553ea85dfc47106-85697388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58ffc72e6db4b107f546c4da7024bb8b1421516b' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/577.cache.html',
      1 => 1407878623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25064232553ea85dfc47106-85697388',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="row" style="margin-top: 20px; position:relative;">
	<div class="col-sm-4 static-uploaded-images">
	    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['fba_media_s_id'],'w'=>349,'ext'=>'jpg','class'=>"img-responsive",'id'=>"beyond-archive-image"),$_smarty_tpl);?>

		
        <div class="image-info-plus upload-area">
			<form enctype="multipart/form-data" method="POST" action="/xsite/call/fe_my_archive/upload_beyond" id="beyond-archive-upload">
			<span class="btn btn-default fileinput-button">
				<i class="glyphicon glyphicon-plus"> </i>
				<span>Update image...</span>
				<input type="file" name="files">
			</span>
            </form>
            <div class="progress_container" id="upload_progress_container" style="margin-top: 10px;">
				<div class="progress_bar" id="upload_progress_bar">
			  		 <div class="progress_completed" id="upload_progress_completed"></div>
				</div>
		    </div>
		</div>
		
	</div>
	
	<div class="col-sm-6 static-credits uploadedImg-1">
	<form id="beyond-archive-update-form">	
        
        <div class="form-group">
					<label for="exampleInputKEY">Title</label>
					<input type="hidden" name="imageName" id="beyond-image-name" />
					<input type="hidden" name="fba_id" value="<?php echo $_smarty_tpl->getVariable('data')->value['fba_id'];?>
" />
					<input type="text" name="Title" class="form-control required" id="beyond-archive-title" value="<?php echo $_smarty_tpl->getVariable('data')->value['fba_title'];?>
" />
		</div>
		
		<div class="form-group">
					<label for="exampleInputADDescription">Description</label>
					<textarea class="form-control height200" name="Description"><?php echo $_smarty_tpl->getVariable('data')->value['fba_description'];?>
</textarea>
		</div>
		<div class="form-group">
	
		    <div style="text-align: right;">
			<a href="" class="but" id="beyond-archive-update-button">update work</a>
            </div>
		</div>
			
	</form>	
	</div>

</div>
<!-- image END -->