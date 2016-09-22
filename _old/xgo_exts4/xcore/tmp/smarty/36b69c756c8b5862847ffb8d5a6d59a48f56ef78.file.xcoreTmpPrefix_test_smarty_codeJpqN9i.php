<?php /* Smarty version Smarty-3.0.7, created on 2015-01-07 14:11:54
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJpqN9i" */ ?>
<?php /*%%SmartyHeaderCode:113532728054ad309adaf007-70647622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36b69c756c8b5862847ffb8d5a6d59a48f56ef78' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJpqN9i',
      1 => 1420636314,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113532728054ad309adaf007-70647622',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_adsoftheweek::sc_get_dropdowns','type'=>'print','var'=>'dropdowns'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_adsoftheweek::sc_get_this_week','type'=>'print','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'oa_validation::check_oa','aotw_id'=>$_smarty_tpl->getVariable('data')->value['ALL']['ID'],'aotw_login'=>$_smarty_tpl->getVariable('data')->value['ALL']['LOGGEDIN'],'var'=>'check'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_likes::sc_do_i_like_it','record_type'=>$_smarty_tpl->getVariable('data')->value['PRINT']['TYPE'],'record_id'=>$_smarty_tpl->getVariable('data')->value['PRINT']['SID'],'var'=>'likeit'),$_smarty_tpl);?>


<?php if ($_REQUEST['debug']==1){?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('dropdowns')->value),$_smarty_tpl);?>
<?php }?>

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
    			<h1>Print Ad of the Week</h1>
    			<div class="form-group">
    				<select class="form-control sel" id="ads-of-week-year-filter-print">
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
	<div class="looklikeH1"><div class="adsoftheweek-titlecontainer">Week <?php echo $_smarty_tpl->getVariable('data')->value['ALL']['KW'];?>
/<?php echo $_smarty_tpl->getVariable('data')->value['ALL']['YEAR'];?>
</div> <div class="adsoftheweek-buttoncontainer"><a href="<?php echo $_smarty_tpl->getVariable('data')->value['ALL']['LINKPRINT'];?>
" class="adsoftheweekbutton active">Print</a> <a href="<?php echo $_smarty_tpl->getVariable('data')->value['ALL']['LINKTV'];?>
" class="adsoftheweekbutton">Spot</a> <a href="<?php echo $_smarty_tpl->getVariable('data')->value['ALL']['LINKCLASSIC'];?>
" class="adsoftheweekbutton">Classic Spot</a></div></div> 
			<div class="adsoftheweekcontainer">
				
				<!-- slide BEGIN -->
				<div>
    			    <div class="row">
                        	<div class="col-sm-8 workdetailpic">
            					<p class="labelpic"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['PRINT']['IMG'],'w'=>1200,'class'=>"img-responsive rsImg rsMainSlideImage"),$_smarty_tpl);?>
</p>
            					<!--
            					<div class="picbottommetalinks"><p class="lw-item workdetailpicbottom"><a href="#" class="like<?php if ($_smarty_tpl->getVariable('likeit')->value==1){?> active<?php }?> ilikeit" title="Gefällt mir" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['PRINT']['SID'];?>
 data-type="MEDIA"></a></span> <span class="likeCount"><?php echo $_smarty_tpl->getVariable('data')->value['PRINT']['LIKES'];?>
</span> <a class="but favorites ifavit<?php if ($_smarty_tpl->getVariable('favit')->value==1){?> active<?php }?>" href="#" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['PRINT']['SID'];?>
 data-type="MEDIA">Add to favorites</a> <a class="workdetailsizebutton but" href="">Enlarge</a> <a class="workdetailsizebutton but" href="" style="display: none">Shrink</a></p></div>
            				    -->
            				    <div class="picbottommetalinks"><p class="lw-item workdetailpicbottom"><a href="#" class="like<?php if ($_smarty_tpl->getVariable('likeit')->value==1){?> active<?php }?> ilikeit" title="Gefällt mir" data-id=<?php echo $_smarty_tpl->getVariable('data')->value['PRINT']['SID'];?>
 data-type="<?php echo $_smarty_tpl->getVariable('data')->value['PRINT']['TYPE'];?>
"></a></span> <span class="likeCount"><?php echo $_smarty_tpl->getVariable('data')->value['PRINT']['LIKES'];?>
</span>  <a class="workdetailsizebutton but" href="">Enlarge</a> <a class="workdetailsizebutton but" href="" style="display: none">Shrink</a></p></div>
            				    
            				    
            				</div>
                    		
                    		<div class="col-sm-4 workdetailright">
                    			<h2><?php echo $_smarty_tpl->getVariable('data')->value['PRINT']['TITLE'];?>
</h2>
                    			<p><?php echo $_smarty_tpl->getVariable('data')->value['PRINT']['TEXT'];?>
</p>
                    			<?php echo $_smarty_tpl->getVariable('data')->value['PRINT']['CREDITSHTML'];?>

                    			<br />
                    		
                    		</div>
                    </div>
                    
                    <div class="row workdetailscreditbottom" style="display: none">
            	    <div class="col-sm-12">
            	        <?php echo $_smarty_tpl->getVariable('data')->value['PRINT']['CREDITSHTML'];?>
<br />
            	    </div>
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
	</div>
   
    