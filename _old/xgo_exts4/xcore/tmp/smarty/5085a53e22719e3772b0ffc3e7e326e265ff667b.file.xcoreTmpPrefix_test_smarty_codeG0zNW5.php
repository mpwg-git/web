<?php /* Smarty version Smarty-3.0.7, created on 2014-10-28 23:51:01
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeG0zNW5" */ ?>
<?php /*%%SmartyHeaderCode:185009284554502be550a1d0-96030362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5085a53e22719e3772b0ffc3e7e326e265ff667b' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeG0zNW5',
      1 => 1414540261,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185009284554502be550a1d0-96030362',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'oa_validation::check_oa','var'=>'check'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_magazine::sc_get_media_details','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_likes::sc_do_i_like_it','record_type'=>"MEDIA",'record_id'=>$_smarty_tpl->getVariable('data')->value['ID'],'var'=>'likeit'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_favs::sc_do_i_fav_it','record_type'=>"MEDIA",'record_id'=>$_smarty_tpl->getVariable('data')->value['ID'],'var'=>'favit'),$_smarty_tpl);?>



    <!-- <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'w'=>400,'h'=>300,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
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
		    <h1 class="mediadetails"> 
		    
		    <?php echo $_smarty_tpl->getVariable('data')->value['TITLE'];?>
&nbsp;
		      
    		   <span class="workdetailmagazineinfos">
    		   (<?php echo $_smarty_tpl->getVariable('data')->value['YEAREDITIONTITLE'];?>
)
		       </span>
		    </h1>
		</div>
		<div class="col-sm-3"></div>
	</div>
	
    <div class="row">
		<div class="col-sm-8 workdetailpic">
			<p class="labelpic"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'w'=>1140,'class'=>"img-responsive rsImg"),$_smarty_tpl);?>
</p>
			<div class="picbottommetalinks"><p class="lw-item workdetailpicbottom"><a href="#" class="like<?php if ($_smarty_tpl->getVariable('likeit')->value==1){?> active<?php }?> ilikeit" title="Gefällt mir" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
 data-type="MEDIA"></a></span> <span class="likeCount"><?php echo $_smarty_tpl->getVariable('data')->value['LIKES'];?>
</span> <a class="but favorites ifavit<?php if ($_smarty_tpl->getVariable('favit')->value==1){?> active<?php }?>" href="#" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
 data-type="MEDIA">Add to favorites</a> <a class="workdetailsizebutton but" href="">Enlarge</a> <a class="workdetailsizebutton but" href="" style="display: none">Shrink</a></p></div>
		</div>
		<div class="col-sm-4 workdetailright">
		    <?php echo $_smarty_tpl->getVariable('data')->value['CREDITSHTML'];?>

		    <div class="workdetailmetainfo">
    		    <p><span class="workdetailmetatitle">Category:</span> <a href="/en/search/category/<?php echo $_smarty_tpl->getVariable('data')->value['CATEGORY'];?>
"><?php echo $_smarty_tpl->getVariable('data')->value['CATEGORY'];?>
</a></p>
    		    <p><span class="workdetailmetatitle">Archive Nr:</span> <?php echo $_smarty_tpl->getVariable('data')->value['ARCHIVENR'];?>
</p>
    			<p><span class="workdetailmetatitle">Views:</span> <?php echo $_smarty_tpl->getVariable('data')->value['VIEWS'];?>
</p>
    		
    			
    		</div>
		</div>
	</div>
	<div class="row">
	    <div class="col-sm-12">
	        <p class="workdetailtext"><?php echo $_smarty_tpl->getVariable('data')->value['TEXT'];?>
</p>
	    </div>
	</div>	
	
	<div class="row workdetailscreditbottom" style="display: none">
	    <div class="col-sm-12">
	        <?php echo $_smarty_tpl->getVariable('data')->value['CREDITSHTML'];?>
<br />
	    </div>
	</div>	
	<!--
	<div class="row">
	    <div class="col-sm-8">
	        <hr>
        	<p class="keywords"><strong>Keywords:</strong> 
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['KEYWORDS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <a href="/en/search/keyword/<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</a>
                <?php }} ?>
            </p>
        </div>
	</div>	
	-->
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