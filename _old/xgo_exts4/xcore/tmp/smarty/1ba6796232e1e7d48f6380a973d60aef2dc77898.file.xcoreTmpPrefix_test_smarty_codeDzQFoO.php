<?php /* Smarty version Smarty-3.0.7, created on 2014-10-29 00:00:22
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDzQFoO" */ ?>
<?php /*%%SmartyHeaderCode:133493258254502e16a6eb32-00187939%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ba6796232e1e7d48f6380a973d60aef2dc77898' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDzQFoO',
      1 => 1414540822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133493258254502e16a6eb32-00187939',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_file')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_file.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_magazine::sc_get_media_details','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'oa_validation::check_oa','em_id'=>$_smarty_tpl->getVariable('data')->value['MAGAZINEID'],'eam_type'=>$_smarty_tpl->getVariable('data')->value['TYP'],'var'=>'check'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_likes::sc_do_i_like_it','record_type'=>"MEDIA",'record_id'=>$_smarty_tpl->getVariable('data')->value['ID'],'var'=>'likeit'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_favs::sc_do_i_fav_it','record_type'=>"MEDIA",'record_id'=>$_smarty_tpl->getVariable('data')->value['ID'],'var'=>'favit'),$_smarty_tpl);?>


    <!-- CC: <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['POSTER'],'w'=>400,'h'=>300,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
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

    <div class="row">
		<div class="col-sm-8 videoplayer">
		    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['POSTER'],'w'=>539,'h'=>303,'rmode'=>"cco",'q'=>85,'var'=>"poster"),$_smarty_tpl);?>

		  
		    <video id="video" class="video-js vjs-default-skin vjs-big-play-centered"
              controls preload="auto" width="100%"
              poster="<?php echo $_smarty_tpl->getVariable('poster')->value['src'];?>
"
              data-setup='{}'>
               <source src="<?php echo $_smarty_tpl->getVariable('data')->value['LOWRES'];?>
" type='video/mp4' />
            </video>
            <!--
            <div class="videolength">
                2.21
            </div>
            -->
            <div class="thumbs">
            
              <script>
              
                    var video_started = false;
                    
    				var video = videojs('video', {"nativeControlsForTouch": true, "customControlsOnMobile": true});
                            			
        			video.on("ended", function(){ 
        			    console.log("video end");
        			    video.poster('/archive_template/img/placeholder_video.jpg');
                        video.posterImage.show(); 
                        //video.controlBar.hide();
                        
                    });
                    
                    video.on("play", function(){ 
        			    video_started = true;
        			    $('.videolength').hide();
                      
                    });
                    
                    setTimeout(function(){
                       if(video_started == false)
                       {
                           $("#video")[0].player.play();
                           setTimeout(function(){
                               $("#video")[0].player.pause();
                           },10);
                       }
                    },840000);

    			video.thumbnails({
    			 
    			 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['JSON']['es_video_thumbs_json']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    			    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['img_s_id'],'w'=>120,'var'=>'thumbs'),$_smarty_tpl);?>

                    
                    <?php if ($_smarty_tpl->tpl_vars['v']->value['pts_time_r']!='-1'){?>
                    <?php echo $_smarty_tpl->tpl_vars['v']->value['pts_time_r'];?>
: {
    			    src: '<?php echo $_smarty_tpl->getVariable('thumbs')->value['src'];?>
'
    			    }
    			   
    			  
    			        <?php if ($_smarty_tpl->tpl_vars['k']->value<(count($_smarty_tpl->getVariable('data')->value['JSON']['es_video_thumbs_json'])-1)){?>,<?php }?>
                     <?php }?>
                 <?php }} ?>
              
    			  
    			});
		    </script>
              <?php echo smarty_function_xr_file(array('s_id'=>$_smarty_tpl->getVariable('data')->value['JSON']['es_video_1080_mp4_s_id'],'var'=>'mp4high'),$_smarty_tpl);?>

            </div>
            <br />
            <div class="picbottommetalinks"><p class="lw-item workdetailpicbottom">
            <a href="#" class="like<?php if ($_smarty_tpl->getVariable('likeit')->value==1){?> active<?php }?> ilikeit" title="Gefällt mir" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
 data-type="MEDIA"></a></span> 
            <span class="likeCount"><?php echo $_smarty_tpl->getVariable('data')->value['LIKES'];?>
</span> 
            <a class="but favorites ifavit<?php if ($_smarty_tpl->getVariable('favit')->value==1){?> active<?php }?>" href="#" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
 data-type="MEDIA">Add to favorites</a>
            <?php if ($_smarty_tpl->getVariable('data')->value['HIGHRES']!=''){?>
            <a class="but" href="<?php echo $_smarty_tpl->getVariable('data')->value['HIGHRES'];?>
" target="_blank">Download Video</a>
            <?php }?>
            </p></div>
		    <p class="workdetailtext"><?php echo $_smarty_tpl->getVariable('data')->value['TEXT'];?>
</p>
		</div>
		<div class="col-sm-4">
			<?php echo $_smarty_tpl->getVariable('data')->value['CREDITSHTML'];?>

		    <div class="workdetailmetainfo">
    		    <p><span class="workdetailmetatitle">Category:</span> <?php echo $_smarty_tpl->getVariable('data')->value['CATEGORY'];?>
</p>
    		    <p><span class="workdetailmetatitle">Archive Nr:</span> <?php echo $_smarty_tpl->getVariable('data')->value['ARCHIVENR'];?>
</p>
    			<p><span class="workdetailmetatitle">Views:</span> <?php echo $_smarty_tpl->getVariable('data')->value['VIEWS'];?>
</p>
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	