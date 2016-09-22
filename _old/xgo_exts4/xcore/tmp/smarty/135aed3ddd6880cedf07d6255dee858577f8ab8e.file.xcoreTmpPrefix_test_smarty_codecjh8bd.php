<?php /* Smarty version Smarty-3.0.7, created on 2014-12-10 09:59:13
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecjh8bd" */ ?>
<?php /*%%SmartyHeaderCode:145947346654881971b1e691-77184186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '135aed3ddd6880cedf07d6255dee858577f8ab8e' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecjh8bd',
      1 => 1418205553,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145947346654881971b1e691-77184186',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if ($_smarty_tpl->getVariable('GA')->value['oeedit']==1){?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'oe_preview::sc_get_web','var'=>'data'),$_smarty_tpl);?>

<?php }else{ ?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_magazine::sc_get_media_details','in_json_gallery'=>'edw_img_gallery','w'=>690,'var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'oa_validation::check_oa','em_id'=>$_smarty_tpl->getVariable('data')->value['MAGAZINEID'],'eam_type'=>$_smarty_tpl->getVariable('data')->value['TYP'],'var'=>'check'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_likes::sc_do_i_like_it','record_type'=>"MEDIA",'record_id'=>$_smarty_tpl->getVariable('data')->value['ID'],'var'=>'likeit'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_favs::sc_do_i_fav_it','record_type'=>"MEDIA",'record_id'=>$_smarty_tpl->getVariable('data')->value['ID'],'var'=>'favit'),$_smarty_tpl);?>

<?php }?>

    <!-- CC: <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['POSTER'],'w'=>400,'h'=>300,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
 <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['POSTER'],'w'=>698,'h'=>416,'rmode'=>"cco",'q'=>85,'var'=>"thumb"),$_smarty_tpl);?>
 -->

    <!-- logo row -->
	<?php echo smarty_function_xr_atom(array('a_id'=>459,'return'=>1),$_smarty_tpl);?>

	
	<!-- quicksearch -->
	<div class="row">
		<div class="col-sm-12">
	        <?php echo smarty_function_xr_atom(array('a_id'=>456,'return'=>1),$_smarty_tpl);?>

		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-8">
		   <div class="line-top"></div>
		    <div class="row">
		        <div class="col-sm-12 buttonscontainer">
        		    <?php if ($_smarty_tpl->getVariable('buttons')->value['BUTTON_BACK']!=''&&$_smarty_tpl->getVariable('buttons')->value['BUTTON_BACK']!='NONE'){?>
        		    <span class="detailbackcontainer">  
        		     <a href="<?php echo $_smarty_tpl->getVariable('buttons')->value['BUTTON_BACK'];?>
" class="but detailbutton_back">Back</a>
        		     </span>
        		    <?php }else{ ?>
        		    <span class="detailbackcontainer">  
        		     <a href="javascript:history.back(-1)" class="but detailbutton_back">Back</a>
        		     </span>
        		    <?php }?> 
        		    
        		    <?php echo smarty_function_xr_atom(array('a_id'=>663,'return'=>1),$_smarty_tpl);?>

        		    
            	</div>	   
		    </div>
		    <div class="line-top"></div>
		    <h1><?php echo $_smarty_tpl->getVariable('data')->value['TITLE'];?>
&nbsp; <span class="workdetailmagazineinfos">(<?php echo $_smarty_tpl->getVariable('data')->value['MAGAZINEEDITION'];?>
/<?php echo $_smarty_tpl->getVariable('data')->value['MAGAZINEYEAR'];?>
)</span></h1>
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div class="row visible-mobile">
		<div class="col-sm-12" style="text-align: center; padding-left: 0; padding-right: 0; margin-left: 0; margin-right: 0;">
			<!--<img src="/archive/template/img/addview_320x50.jpg" class="banner-mobile" />-->
			<?php echo smarty_function_xr_atom(array('a_id'=>669,'return'=>1),$_smarty_tpl);?>

		</div>
	</div>
	
	<div class="row visible-tablet">
		<div class="col-sm-12" style="text-align: center; padding-left: 0; padding-right: 0; margin-left: 0; margin-right: 0;">
			<!--<img src="/archive/template/img/addview_728x90.jpg" class="banner-tablet"/>-->
			<?php echo smarty_function_xr_atom(array('a_id'=>671,'return'=>1),$_smarty_tpl);?>

		</div>
	</div>
	
    <div class="row">
		<div class="col-sm-6">
		
            <div id="content-slider-1" class="royalSlider contentSlider rsDefault">
    		
    		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['GALLERY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['count']['index']=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['count']['index']++;
?>
    		    <div>
        		    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'showgififgif'=>1,'w'=>800,'class'=>"img-responsive rsImg rsMainSlideImage"),$_smarty_tpl);?>
</a></p>
        		    <span class="rsTmb"><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['count']['index']+1;?>
</span>
    		    </div>
    		<?php }} ?>
    		
    		</div>
			
			<br/>
			<br/>
			<div class="hidden-1400 hidden-1400-on-mobile visible-768-992">
			
				<?php echo smarty_function_xr_atom(array('a_id'=>668,'return'=>1),$_smarty_tpl);?>

			</div>
    		
    		
	    </div>
    		
		<div class="col-sm-6 mediadetailpage">
			<p><?php echo $_smarty_tpl->getVariable('data')->value['TEXT'];?>
</p>
			<br />

			<?php echo $_smarty_tpl->getVariable('data')->value['CREDITSHTML'];?>

		    <div class="workdetailmetainfo">
		        <?php if ($_smarty_tpl->getVariable('data')->value['JSON']['edw_link1']!=''){?><p><span class="workdetailmetatitle">Link:</span> <a href="http://<?php echo $_smarty_tpl->getVariable('data')->value['JSON']['edw_link1'];?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('data')->value['JSON']['edw_linkText1'];?>
</a></p><?php }?>
		        <?php if ($_smarty_tpl->getVariable('data')->value['JSON']['edw_link2']!=''){?><p><span class="workdetailmetatitle">Link:</span> <a href="http://<?php echo $_smarty_tpl->getVariable('data')->value['JSON']['edw_link2'];?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('data')->value['JSON']['edw_linkText2'];?>
</a></p><?php }?>
    			<p><span class="workdetailmetatitle">Views:</span> <?php echo $_smarty_tpl->getVariable('data')->value['VIEWS'];?>
</p>
    			<hr />
    			<p class="lw-item digitalfav"><a href="#" class="like<?php if ($_smarty_tpl->getVariable('likeit')->value==1){?> active<?php }?> ilikeit" title="Gefällt mir" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
 data-type="MEDIA"></a> <span class="likeCount"><?php echo $_smarty_tpl->getVariable('data')->value['LIKES'];?>
</span> <a class="but favorites ifavit<?php if ($_smarty_tpl->getVariable('favit')->value==1){?> active<?php }?>" href="#" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
 data-type="MEDIA">Add to favorites</a></p>
    		</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<hr>
			<div class="share">
				<?php echo smarty_function_xr_atom(array('a_id'=>461,'return'=>1),$_smarty_tpl);?>

			</div>
			<div class="clearer"></div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
	
			<div class="comments-disqus">
	               <!-- disqus -->
    	            <?php echo smarty_function_xr_atom(array('a_id'=>462,'return'=>1),$_smarty_tpl);?>

			</div>
    	</div>
	</div>
	
<script>
    $(document).ready(function() {
        fe_count.view('MEDIA',<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
);
    });
</script>