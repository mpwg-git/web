<?php /* Smarty version Smarty-3.0.7, created on 2015-01-12 12:54:51
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePZEddV" */ ?>
<?php /*%%SmartyHeaderCode:128758835654b3b60bd29243-95941579%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08443afbbf353056a442165c4a342ab05a089796' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePZEddV',
      1 => 1421063691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128758835654b3b60bd29243-95941579',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_file')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_file.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_adsoftheweek::sc_get_dropdowns','type'=>'spot','var'=>'dropdowns'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_adsoftheweek::sc_get_this_week','type'=>'spot','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_likes::sc_do_i_like_it','record_type'=>$_smarty_tpl->getVariable('data')->value['TV']['TYPE'],'record_id'=>$_smarty_tpl->getVariable('data')->value['TV']['MEDIAID'],'var'=>'likeit'),$_smarty_tpl);?>


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
    		<form class="issue-suche">
    			<h1>Spot of the Week</h1>
    			<div class="form-group">
    				<select class="form-control sel" id="ads-of-week-year-filter-spot">
    					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dropdowns')->value['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    				    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['esotw_year'];?>
"<?php if ($_smarty_tpl->tpl_vars['v']->value['esotw_year']==$_smarty_tpl->getVariable('dropdowns')->value['feature_year']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['esotw_year'];?>
</option>
    				    <?php }} ?>
    				</select>
    				<select class="form-control sel" id="ads-of-week-week-filter">
    					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dropdowns')->value['weeks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    				    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"<?php if ((count($_smarty_tpl->getVariable('dropdowns')->value['weeks'])-$_smarty_tpl->tpl_vars['k']->value)==$_smarty_tpl->getVariable('dropdowns')->value['feature_week']){?> selected="selected"<?php }?>>Week <?php echo count($_smarty_tpl->getVariable('dropdowns')->value['weeks'])-$_smarty_tpl->tpl_vars['k']->value;?>
</option>
    				    <?php }} ?>
    				</select>
    				<div id="fe_core_loader" style="display: none;"> </div>
    				<div class="clearer"></div>
    			</div>
    		</form>
    	   
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	
	<?php if ($_REQUEST['showads']==1){?>
	
	
	 <div class="looklikeH1"><div class="adsoftheweek-titlecontainer">Week <?php echo $_smarty_tpl->getVariable('data')->value['ALL']['KW'];?>
/<?php echo $_smarty_tpl->getVariable('data')->value['ALL']['YEAR'];?>
</div> <div class="adsoftheweek-buttoncontainer"><a href="<?php echo $_smarty_tpl->getVariable('data')->value['ALL']['LINKPRINT'];?>
" class="adsoftheweekbutton">Print</a> <a href="<?php echo $_smarty_tpl->getVariable('data')->value['ALL']['LINKTV'];?>
" class="adsoftheweekbutton active">Spot</a> <a href="<?php echo $_smarty_tpl->getVariable('data')->value['ALL']['LINKCLASSIC'];?>
" class="adsoftheweekbutton">Classic Spot</a></div></div> 
	
			<div class="adsoftheweekcontainer">
				
				<!-- slide BEGIN -->
			   <div>
				 <div class="row">
                        	<div class="col-sm-8 videoplayer">
                        	
                        	    <?php if ($_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_480_mp4_s_id']){?>
                        	    <!-- video BEGIN -->
                        	    
                        	    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_poster_s_id'],'w'=>539,'h'=>303,'rmode'=>"cco",'q'=>85,'var'=>"poster"),$_smarty_tpl);?>

                    		    <?php echo smarty_function_xr_file(array('s_id'=>$_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_480_mp4_s_id'],'var'=>'mp4'),$_smarty_tpl);?>

                    		    <?php echo smarty_function_xr_file(array('s_id'=>$_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_1080_webm_s_id'],'var'=>'webm'),$_smarty_tpl);?>

                    		  
                                <video id="video" class="video-js vjs-default-skin vjs-big-play-centered"
                                  controls preload="auto" width="100%"
                                  poster="<?php echo $_smarty_tpl->getVariable('poster')->value['src'];?>
"
                                  data-setup='{}'>
                                   <source src="//lz-cdn-r.xgodev.com<?php echo $_smarty_tpl->getVariable('mp4')->value['url'];?>
" type='video/mp4' />
                                   <?php if ($_smarty_tpl->getVariable('webm')->value['url']!=''){?>
                                   <source src="//lz-cdn-r.xgodev.com<?php echo $_smarty_tpl->getVariable('webm')->value['url'];?>
" type='video/webm' />
                                   <?php }?>
                                </video>
                                
                                <div class="videolength">
                                    <?php echo $_smarty_tpl->getVariable('data')->value['TV']['VIDLENGTH'];?>

                                </div>
                                
                                <div class="thumbs">
                                
                                  <script>
                                        var video_started = false;
                                        
                        				var video = videojs('video', {"nativeControlsForTouch": true, "customControlsOnMobile": true});
                            			
                            			video.on("ended", function(){ 
                            			    console.log("video end");
                            			    video.poster('/archive_template/img/placeholder_video.jpg');
                                            video.posterImage.show(); 
                                            //video.controlBar.show();
                                            
                                        });
                                        
                                        video.on("play", function(){ 
                            			    var video_started = true;
                            			    
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
                                        
                    
                                    <?php if (!empty($_smarty_tpl->getVariable('data',null,true,false)->value['TV']['VID']['es_video_thumbs_json'])){?>
                        			video.thumbnails({
                        			 
                        			 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_thumbs_json']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        			    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['img_s_id'],'w'=>120,'var'=>'thumbs'),$_smarty_tpl);?>

                                        
                                        <?php if ($_smarty_tpl->tpl_vars['v']->value['pts_time_r']!='-1'&&$_smarty_tpl->tpl_vars['v']->value['pts_time_r']!='0'){?>
                                        <?php echo $_smarty_tpl->tpl_vars['v']->value['pts_time_r'];?>
: {
                        			    src: '<?php echo $_smarty_tpl->getVariable('thumbs')->value['src'];?>
'
                        			    }
                    
                        			        <?php if ($_smarty_tpl->tpl_vars['k']->value<(count($_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_thumbs_json'])-1)){?>,<?php }?>
                                         <?php }?>
                                     <?php }} ?>
                                  
                        			  
                        			}); 
                        			<?php }?>
                    		    </script>
                    		   </div>
                    		   
                    		   <?php }else{ ?>
                    		   
                    		   <p class="labelpic"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['TV']['IMG'],'class'=>"img-responsive rsImg rsMainSlideImage"),$_smarty_tpl);?>
</p>
                    		   
                    		   
                    		   <?php }?>
                    		   
            <!--        		   
            <div class="picbottommetalinks"><p class="lw-item workdetailpicbottom"><a href="#" class="like<?php if ($_smarty_tpl->getVariable('likeit')->value==1){?> active<?php }?> ilikeit" title="Gefällt mir" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['TV']['MEDIAID'];?>
 data-type="MEDIA"></a></span> <span class="likeCount"><?php echo $_smarty_tpl->getVariable('data')->value['TV']['LIKES'];?>
</span> <a class="but favorites ifavit<?php if ($_smarty_tpl->getVariable('favit')->value==1){?> active<?php }?>" href="#" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['TV']['MEDIAID'];?>
 data-type="MEDIA">Add to favorites</a></p></div>
            <br />
            -->
            <div class="picbottommetalinks"><p class="lw-item workdetailpicbottom"><a href="#" class="like<?php if ($_smarty_tpl->getVariable('likeit')->value==1){?> active<?php }?> ilikeit" title="Gefällt mir" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['TV']['MEDIAID'];?>
 data-type="<?php echo $_smarty_tpl->getVariable('data')->value['TV']['TYPE'];?>
"></a></span> <span class="likeCount"><?php echo $_smarty_tpl->getVariable('data')->value['TV']['LIKES'];?>
</span> </p></div>
            <br />
                        	
                        	    <!-- video END -->
                        	
            				</div>
                    		
                    		<div class="col-sm-4">
                    			<h2><?php echo $_smarty_tpl->getVariable('data')->value['TV']['TITLE'];?>
</h2>
                    			<p><?php echo $_smarty_tpl->getVariable('data')->value['TV']['TEXT'];?>
</p>
                    			<?php echo $_smarty_tpl->getVariable('data')->value['TV']['CREDITSHTML'];?>

                    			<br />
                    		
                    		</div>
                    			
                    </div>
                <!-- slide END -->
              </div>     
               			
			</div>
			
		<div class="row">
			    <div class="col-sm-12 adsoftheweeklinks">
	                <a class="but but-prev" href="<?php echo $_smarty_tpl->getVariable('data')->value['URLS']['PREV'];?>
">Previous Week</a>
	                <?php if ($_smarty_tpl->getVariable('data')->value['URLS']['NEXT']!=''){?><a class="but but-next" href="<?php echo $_smarty_tpl->getVariable('data')->value['URLS']['NEXT'];?>
">Next Week</a><?php }?>
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
	
	
	<?php }else{ ?>
	
	   <div class="looklikeH1"><div class="adsoftheweek-titlecontainer">Week <?php echo $_smarty_tpl->getVariable('data')->value['ALL']['KW'];?>
/<?php echo $_smarty_tpl->getVariable('data')->value['ALL']['YEAR'];?>
</div> <div class="adsoftheweek-buttoncontainer"><a href="<?php echo $_smarty_tpl->getVariable('data')->value['ALL']['LINKPRINT'];?>
" class="adsoftheweekbutton">Print</a> <a href="<?php echo $_smarty_tpl->getVariable('data')->value['ALL']['LINKTV'];?>
" class="adsoftheweekbutton active">Spot</a> <a href="<?php echo $_smarty_tpl->getVariable('data')->value['ALL']['LINKCLASSIC'];?>
" class="adsoftheweekbutton">Classic Spot</a></div></div> 
	
			<div class="adsoftheweekcontainer">
				
				<!-- slide BEGIN -->
			   <div>
				 <div class="row">
                        	<div class="col-sm-8 videoplayer">
                        	
                        	    <?php if ($_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_480_mp4_s_id']){?>
                        	    <!-- video BEGIN -->
                        	    
                        	    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_poster_s_id'],'w'=>539,'h'=>303,'rmode'=>"cco",'q'=>85,'var'=>"poster"),$_smarty_tpl);?>

                    		    <?php echo smarty_function_xr_file(array('s_id'=>$_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_480_mp4_s_id'],'var'=>'mp4'),$_smarty_tpl);?>

                    		    <?php echo smarty_function_xr_file(array('s_id'=>$_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_1080_webm_s_id'],'var'=>'webm'),$_smarty_tpl);?>

                    		  
                                <video id="video" class="video-js vjs-default-skin vjs-big-play-centered"
                                  controls preload="auto" width="100%"
                                  poster="<?php echo $_smarty_tpl->getVariable('poster')->value['src'];?>
"
                                  data-setup='{}'>
                                   <source src="//lz-cdn-r.xgodev.com<?php echo $_smarty_tpl->getVariable('mp4')->value['url'];?>
" type='video/mp4' />
                                   <?php if ($_smarty_tpl->getVariable('webm')->value['url']!=''){?>
                                   <source src="//lz-cdn-r.xgodev.com<?php echo $_smarty_tpl->getVariable('webm')->value['url'];?>
" type='video/webm' />
                                   <?php }?>
                                </video>
                                
                                <div class="videolength">
                                    <?php echo $_smarty_tpl->getVariable('data')->value['TV']['VIDLENGTH'];?>

                                </div>
                                
                                <div class="thumbs">
                                
                                  <script>
                                        var video_started = false;
                                        
                        				var video = videojs('video', {"nativeControlsForTouch": true, "customControlsOnMobile": true});
                            			
                            			video.on("ended", function(){ 
                            			    console.log("video end");
                            			    video.poster('/archive_template/img/placeholder_video.jpg');
                                            video.posterImage.show(); 
                                            //video.controlBar.show();
                                            
                                        });
                                        
                                        video.on("play", function(){ 
                            			    var video_started = true;
                            			    
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
                                        
                    
                                    <?php if (!empty($_smarty_tpl->getVariable('data',null,true,false)->value['TV']['VID']['es_video_thumbs_json'])){?>
                        			video.thumbnails({
                        			 
                        			 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_thumbs_json']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        			    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['img_s_id'],'w'=>120,'var'=>'thumbs'),$_smarty_tpl);?>

                                        
                                        <?php if ($_smarty_tpl->tpl_vars['v']->value['pts_time_r']!='-1'&&$_smarty_tpl->tpl_vars['v']->value['pts_time_r']!='0'){?>
                                        <?php echo $_smarty_tpl->tpl_vars['v']->value['pts_time_r'];?>
: {
                        			    src: '<?php echo $_smarty_tpl->getVariable('thumbs')->value['src'];?>
'
                        			    }
                    
                        			        <?php if ($_smarty_tpl->tpl_vars['k']->value<(count($_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_thumbs_json'])-1)){?>,<?php }?>
                                         <?php }?>
                                     <?php }} ?>
                                  
                        			  
                        			}); 
                        			<?php }?>
                    		    </script>
                    		   </div>
                    		   
                    		   <?php }else{ ?>
                    		   
                    		   <p class="labelpic"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['TV']['IMG'],'class'=>"img-responsive rsImg rsMainSlideImage"),$_smarty_tpl);?>
</p>
                    		   
                    		   
                    		   <?php }?>
                    		   
            <!--        		   
            <div class="picbottommetalinks"><p class="lw-item workdetailpicbottom"><a href="#" class="like<?php if ($_smarty_tpl->getVariable('likeit')->value==1){?> active<?php }?> ilikeit" title="Gefällt mir" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['TV']['MEDIAID'];?>
 data-type="MEDIA"></a></span> <span class="likeCount"><?php echo $_smarty_tpl->getVariable('data')->value['TV']['LIKES'];?>
</span> <a class="but favorites ifavit<?php if ($_smarty_tpl->getVariable('favit')->value==1){?> active<?php }?>" href="#" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['TV']['MEDIAID'];?>
 data-type="MEDIA">Add to favorites</a></p></div>
            <br />
            -->
            <div class="picbottommetalinks"><p class="lw-item workdetailpicbottom"><a href="#" class="like<?php if ($_smarty_tpl->getVariable('likeit')->value==1){?> active<?php }?> ilikeit" title="Gefällt mir" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['TV']['MEDIAID'];?>
 data-type="<?php echo $_smarty_tpl->getVariable('data')->value['TV']['TYPE'];?>
"></a></span> <span class="likeCount"><?php echo $_smarty_tpl->getVariable('data')->value['TV']['LIKES'];?>
</span> </p></div>
            <br />
                        	
                        	    <!-- video END -->
                        	
            				</div>
                    		
                    		<div class="col-sm-4">
                    			<h2><?php echo $_smarty_tpl->getVariable('data')->value['TV']['TITLE'];?>
</h2>
                    			<p><?php echo $_smarty_tpl->getVariable('data')->value['TV']['TEXT'];?>
</p>
                    			<?php echo $_smarty_tpl->getVariable('data')->value['TV']['CREDITSHTML'];?>

                    			<br />
                    		
                    		</div>
                    			
                    </div>
                <!-- slide END -->
              </div>     
               			
			</div>
			
		<div class="row">
			    <div class="col-sm-12 adsoftheweeklinks">
	                <a class="but but-prev" href="<?php echo $_smarty_tpl->getVariable('data')->value['URLS']['PREV'];?>
">Previous Week</a>
	                <?php if ($_smarty_tpl->getVariable('data')->value['URLS']['NEXT']!=''){?><a class="but but-next" href="<?php echo $_smarty_tpl->getVariable('data')->value['URLS']['NEXT'];?>
">Next Week</a><?php }?>
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
	
	
	<?php }?>
	
	
	
	
	
	<div class="row">
		<div class="col-sm-12">
	
			<div class="comments-disqus">
	               <!-- disqus -->
    	            <?php echo smarty_function_xr_atom(array('a_id'=>462,'return'=>1),$_smarty_tpl);?>

			</div>
    	</div>
	</div>
	</div>
   
    