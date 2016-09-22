<?php /* Smarty version Smarty-3.0.7, created on 2015-01-07 10:15:24
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePBMx8T" */ ?>
<?php /*%%SmartyHeaderCode:192433622354acf92c8e5ad2-50262635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a80a6ed77d6875b870fd2e7048ef87cab612a31b' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePBMx8T',
      1 => 1420622124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192433622354acf92c8e5ad2-50262635',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_file')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_file.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_adsoftheweek::sc_get_dropdowns','var'=>'dropdowns'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_adsoftheweek::sc_get_this_week','var'=>'data'),$_smarty_tpl);?>


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
    		<form class="issue-suche">
    			<h1>Ads of the Week</h1>
    			<div class="form-group">
    				<select class="form-control sel" id="ads-of-week-year-filter">
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
    		<p class="looklikeH1">Week <?php echo $_smarty_tpl->getVariable('data')->value['ALL']['KW'];?>
/<?php echo $_smarty_tpl->getVariable('data')->value['ALL']['YEAR'];?>
</p>
		</div>
		<div class="col-sm-3"></div>
	</div>
	
			<div id="content-slider-1a" class="royalSlider contentSlider rsDefault rsNavText alwaysCaption adsoftheweekslider">
				
				<!-- slide BEGIN -->
				<div>
    			    <div class="row">
                        	<div class="col-sm-8 workdetailpic">
            					<p class="labelpic"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['PRINT']['IMG'],'class'=>"img-responsive rsImg rsMainSlideImage"),$_smarty_tpl);?>
</p>
            					<div class="picbottommetalinks"><p class="lw-item workdetailpicbottom"><a class="workdetailsizebutton but" href="">Enlarge</a> <a class="workdetailsizebutton but" href="" style="display: none">Shrink</a></p></div></7div>
            				</div>
                    		
                    		<div class="col-sm-4 workdetailright">
                    			<h2><?php echo $_smarty_tpl->getVariable('data')->value['PRINT']['TITLE'];?>
</h2>
                    			<p><?php echo $_smarty_tpl->getVariable('data')->value['PRINT']['TEXT'];?>
</p>
                    			<?php echo $_smarty_tpl->getVariable('data')->value['PRINT']['CREDITSHTML'];?>

                    			<br />
                    		
                    		</div>
                    		<span class="rsTmb">Print</span>			
                    </div>
                    
                    <div class="row workdetailscreditbottom" style="display: none">
            	    <div class="col-sm-12">
            	        <?php echo $_smarty_tpl->getVariable('data')->value['PRINT']['CREDITSHTML'];?>
<br />
            	    </div>
            	</div>	
            
                </div> 
                <!-- slide END -->
                    
                    
                <!-- slide BEGIN -->
				<div>
    			    <div class="row">
                        	<div class="col-sm-8 videoplayer">
                        	
                        	    <?php if ($_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_1080_mp4_s_id']){?>
                        	    <!-- video BEGIN -->
                        	    
                        	    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_poster_s_id'],'w'=>539,'h'=>303,'rmode'=>"cco",'q'=>85,'var'=>"poster"),$_smarty_tpl);?>

                    		    <?php echo smarty_function_xr_file(array('s_id'=>$_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_1080_mp4_s_id'],'var'=>'mp4'),$_smarty_tpl);?>

                    		    <?php echo smarty_function_xr_file(array('s_id'=>$_smarty_tpl->getVariable('data')->value['TV']['VID']['es_video_1080_webm_s_id'],'var'=>'webm'),$_smarty_tpl);?>

                    		  
                    		    <video id="video" class="video-js vjs-default-skin vjs-big-play-centered"
                                  controls preload="auto" width="100%"
                                  poster="<?php echo $_smarty_tpl->getVariable('poster')->value['src'];?>
"
                                  data-setup='{}'>
                                   <source src="<?php echo $_smarty_tpl->getVariable('mp4')->value['url'];?>
" type='video/mp4' />
                                  <?php if ($_smarty_tpl->getVariable('webm')->value['url']!=''){?>
                                   <source src="<?php echo $_smarty_tpl->getVariable('webm')->value['url'];?>
" type='video/webm' />
                                   <?php }?>
                                </video>
                                
                                <div class="videolength">
                                    2.21
                                </div>
                                
                                <div class="thumbs">
                                
                                  <script>
                        			var video = videojs('video');
                        			
                        			video.posterImage.show(); 
                        			
                        			video.on("ended", function(){ 
                        			    console.log("video end");
                        			    video.poster('/archive/template/img/placeholder_video.jpg');
                                        video.posterImage.show(); 
                                        video.controlBar.hide();
                                        video.bigPlayButton.show();
                                    });
                                    
                                    video.on("play", function(){ 
                        			    console.log("video start");
                        			    $('.videolength').hide();
                                        video.controlBar.show();
                                        // video.bigPlayButton.hide();
                                    });
                                    
                                    video.on("pause", function(){ 
                        			    console.log("video pause");
                                        video.controlBar.show();
                                        video.bigPlayButton.show();
                                    });
                    
                    
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
                    		<span class="rsTmb">Spot</span>			
                    </div>
    
                </div> 
                <!-- slide END -->
                    
                    
                
                <!-- slide BEGIN -->
				<div>
    			    <div class="row">
                        	
                        	<div class="col-sm-8 videoplayer">
                        	    <?php if ($_smarty_tpl->getVariable('data')->value['CLASSIC']['VID']['es_video_s_id']){?>
                        	    <!-- video BEGIN -->
                        	    
                        	    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['CLASSIC']['VID']['es_video_poster_s_id'],'w'=>539,'h'=>303,'rmode'=>"cco",'q'=>85,'var'=>"poster"),$_smarty_tpl);?>

                    		    <?php echo smarty_function_xr_file(array('s_id'=>$_smarty_tpl->getVariable('data')->value['CLASSIC']['VID']['es_video_1080_mp4_s_id'],'var'=>'mp4'),$_smarty_tpl);?>

                    		    <?php echo smarty_function_xr_file(array('s_id'=>$_smarty_tpl->getVariable('data')->value['CLASSIC']['VID']['es_video_1080_webm_s_id'],'var'=>'webm'),$_smarty_tpl);?>

                    		  
                    		    <video id="video2" class="video-js vjs-default-skin vjs-big-play-centered"
                                  controls preload="auto" width="100%"
                                  poster="<?php echo $_smarty_tpl->getVariable('poster')->value['src'];?>
"
                                  data-setup='{}'>
                                   <source src="<?php echo $_smarty_tpl->getVariable('mp4')->value['url'];?>
" type='video/mp4' />
                                  <?php if ($_smarty_tpl->getVariable('webm')->value['url']!=''){?>
                                   <source src="<?php echo $_smarty_tpl->getVariable('webm')->value['url'];?>
" type='video/webm' />
                                   <?php }?>
                                </video>
                                
                                <div class="videolength">
                                    2.21
                                </div>
                               
                                <div class="thumbs">
                                
                                  <script>
                        			
                        			
                        			var video2 = videojs('video2');
                        			
                        			video2.posterImage.show(); 
                        			
                        			video2.on("ended", function(){ 
                        			    console.log("video end");
                        			    video2.poster('/archive/template/img/placeholder_video.jpg');
                                        video2.posterImage.show(); 
                                        video2.controlBar.hide();
                                        video2.bigPlayButton.show();
                                    });
                                    
                                    video2.on("play", function(){ 
                        			    console.log("video start");
                        			    $('.videolength').hide();
                                        video2.controlBar.show();
                                        // video2.bigPlayButton.hide();
                                    });
                                    
                                    video2.on("pause", function(){ 
                        			    console.log("video pause");
                                        video2.controlBar.show();
                                        video2.bigPlayButton.show();
                                    });
                                    
                                    
                                    <?php if (!empty($_smarty_tpl->getVariable('data',null,true,false)->value['CLASSIC']['VID']['es_video_thumbs_json'])){?>
                        			video2.thumbnails({
                        			 
                        			 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['CLASSIC']['VID']['es_video_thumbs_json']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                    
                        			        <?php if ($_smarty_tpl->tpl_vars['k']->value<(count($_smarty_tpl->getVariable('data')->value['CLASSIC']['VID']['es_video_thumbs_json'])-1)){?>,<?php }?>
                                         <?php }?>
                                     <?php }} ?>
                        			  
                        			});
                        			<?php }?>
                        			
                    		    </script>
                    		   </div>
                    		   <?php }else{ ?>
                    		   
                    		   <p class="labelpic"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['CLASSIC']['IMG'],'class'=>"img-responsive rsImg rsMainSlideImage"),$_smarty_tpl);?>
</p>
                    		   
                    		   <?php }?>
                        	
                        	    <!-- video END -->
                        	
            				</div>
                        	
                    
                    		
                    		<div class="col-sm-4">
                    			<h2><?php echo $_smarty_tpl->getVariable('data')->value['CLASSIC']['TITLE'];?>
</h2>
                    			<p><?php echo $_smarty_tpl->getVariable('data')->value['CLASSIC']['TEXT'];?>
</p>
                    	           <?php echo $_smarty_tpl->getVariable('data')->value['CLASSIC']['CREDITSHTML'];?>

                    			<br />
                    		
                    		</div>
                    		<span class="rsTmb">Classic Spot</span>			
                    </div>
                    
                </div> 	
                <!-- slide END -->
				
			
        				
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
            			
            			</div>
            			<div class="clearer"></div>
            		    </div>
        	    </div>
	</div>
    <script>
        /* go to slide if active set */
         $(document).ready(function(){
             $('#content-slider-1a').royalSlider({
                autoPlay: {
            		enabled: true,
            		pauseOnHover: true,
            		delay: 10000
            	},
            	startSlideId: <?php echo $_smarty_tpl->getVariable('data')->value['ALL']['ACTIVE'];?>
,
                autoHeight: true,
                navigateByClick: false,
                arrowsNav: false,
                fadeinLoadedSlide: false,
                controlNavigationSpacing: 0,
                controlNavigation: 'tabs',
                imageScaleMode: 'none',
                imageAlignCenter:false,
                loop: true,
                loopRewind: true,
                autoHeight: true,
                numImagesToPreload: 3,
                keyboardNavEnabled: true,
                usePreloader: false,
                sliderDrag: false,
                transitionType: 'move'
              });
              
              var slider = $('#content-slider-1a').data('royalSlider');
              
              slider.ev.on('rsBeforeAnimStart', function(event) {
                if (typeof video != 'undefined' && !video.paused()) {
                    video.controlBar.show();
                    video.bigPlayButton.show();
                    video.pause();
                }
                if (typeof video2 != 'undefined' && !video2.paused()) {
                    video2.controlBar.show();
                    video2.controlBar.show();
                    video2.pause();
                }
              });
              
              
              slider.ev.on('rsDragStart', function(event) {
                if (typeof video != 'undefined' && !video.paused()) {
                    video.controlBar.show();
                    video.bigPlayButton.show();
                    video.pause();
                }
                if (typeof video2 != 'undefined' && !video2.paused()) {
                    video2.controlBar.show();
                    video2.controlBar.show();
                    video2.pause();
                }
              });
              
              
              slider.slides[0].holder.on('rsAfterContentSet', function() {
                // fires when first slide content is loaded and added to DOM
                
                    $('.workdetailsizebutton').click(function(e) {
                		e.preventDefault();
                		$('.workdetailsizebutton').toggle();
                		$('.workdetailpic').toggleClass('workdetailfull');
                		$('.workdetailright').toggle();
                		$('.workdetailscreditbottom').toggle();
                		slider.updateSliderSize();
            		
            	   });
            	    
                    $('.workdetailpic img').click(function(e) {
                		e.preventDefault();
                		$('.workdetailsizebutton').toggle();
                		$('.workdetailpic').toggleClass('workdetailfull');
                		$('.workdetailright').toggle();
                		$('.workdetailscreditbottom').toggle();
                		slider.updateSliderSize();
                 });
                
              });
              
        });
        
    </script>
    