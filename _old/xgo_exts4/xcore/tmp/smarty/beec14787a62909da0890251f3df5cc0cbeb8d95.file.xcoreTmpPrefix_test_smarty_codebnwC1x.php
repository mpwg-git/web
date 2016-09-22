<?php /* Smarty version Smarty-3.0.7, created on 2014-09-25 04:40:44
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebnwC1x" */ ?>
<?php /*%%SmartyHeaderCode:209951099254239ccc7fe1a7-39819670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'beec14787a62909da0890251f3df5cc0cbeb8d95' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebnwC1x',
      1 => 1411620044,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209951099254239ccc7fe1a7-39819670',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_inspiration::sc_get_latest','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_inspiration::sc_get_most_viewed','var'=>'data2'),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_profiles::sc_get_latest_start','type'=>'DIGITAL','var'=>'profile'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_adsoftheweek::sc_get_this_week','onlytwocredits'=>1,'var'=>'adsoftheweek'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_archive_media::sc_your_pick','var'=>'yourpick'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_ads::sc_get_ad','var'=>'ad'),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('GA')->value['oeedit']==1){?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'oe_preview::sc_get_inspiration','var'=>'data'),$_smarty_tpl);?>

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
	
	    <div class="col-sm-9">
		    <div class="line-top"></div>
		    <h1>Ads of the week</h1>
		</div>
	
	
	
		<div class="col-sm-10">
		  
			
			<div class="row" >
		    
			    <div class="col-sm-4">
					<div class="lw-item adsoftheweekcredits">
						<h3><?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['PRINT']['TITLE'];?>
</h3>
						<p class="labelpic"><a href="<?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['ALL']['LINKPRINT'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('adsoftheweek')->value['PRINT']['IMG'],'w'=>500,'h'=>350,'rmode'=>'cco','class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
						<p class="smallTxt"><?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['PRINT']['CREDITSHTML'];?>
</p>
					</div>
				</div>
				
				<div class="col-sm-4">
					<div class="lw-item adsoftheweekcredits">
						<h3><?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['TV']['TITLE'];?>
</h3>
						<p class="labelpic"><a href="<?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['ALL']['LINKTV'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('adsoftheweek')->value['TV']['IMG'],'w'=>500,'h'=>350,'rmode'=>'cco','class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
						<p class="smallTxt"><?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['TV']['CREDITSHTML'];?>
</p>
					</div>
				</div>
				
				<div class="col-sm-4">
					<div class="lw-item adsoftheweekcredits">
						<h3><?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['CLASSIC']['TITLE'];?>
</h3>
						<p class="labelpic"><a href="<?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['ALL']['LINKCLASSIC'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('adsoftheweek')->value['CLASSIC']['IMG'],'w'=>500,'h'=>350,'rmode'=>'cco','class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
						<p class="smallTxt"><?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['CLASSIC']['CREDITSHTML'];?>
</p>
					</div>
				</div>
            	
			    
			</div>
			<div class="row">
				<div class="col-sm-6">
				    <h2><a href="<?php echo $_smarty_tpl->getVariable('profile')->value['LINK_MORE'];?>
">Profile</a> <a class="more" href="<?php echo $_smarty_tpl->getVariable('profile')->value['LINK_MORE'];?>
">More</a></h2>
				    <div class="row same-height">
        				<div class="col-md-5">
        					<p class="labelpic"><a href="<?php echo $_smarty_tpl->getVariable('profile')->value['LINK_DETAIL'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('profile')->value['IMG'],'rmode'=>'cco','w'=>286,'h'=>350,'class'=>"img-responsive"),$_smarty_tpl);?>
</a><span class="titel"><span class="tx"><?php echo $_smarty_tpl->getVariable('profile')->value['TITLE'];?>
</span></span></a></p>
        					<div class="clearer"></div>
        				</div>
        				<div class="col-md-7 profile">
        					<h3><?php echo $_smarty_tpl->getVariable('profile')->value['TITLE'];?>
</h3>
        			        <p><?php echo $_smarty_tpl->getVariable('profile')->value['TEXT'];?>
</p>
        				</div>
        				<div class="clearer"></div>
        			</div>
				</div>
				<div class="col-sm-6">
				    <h2><a href="<?php echo $_smarty_tpl->getVariable('yourpick')->value['LINK_OVERVIEW'];?>
">Your Picks</a> <a class="more" href="<?php echo $_smarty_tpl->getVariable('yourpick')->value['LINK_OVERVIEW'];?>
">More</a></h2>
    				<div class="row">
    					<div class="col-md-12">
    						<a href="<?php echo $_smarty_tpl->getVariable('yourpick')->value['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('yourpick')->value['IMG'],'w'=>444,'class'=>"img-responsive"),$_smarty_tpl);?>
</a>
    					</div>
    				</div>
    				<div class="row workdetailscreditbottom">
    					<div class="col-md-12">
    					<?php echo $_smarty_tpl->getVariable('yourpick')->value['CREDITSHTML'];?>

    					</div>
    				</div>
			    </div>
			</div>
		</div>
		<div class="col-sm-2" style="padding-top: 104px;">
			<p class="banner"><a href="<?php echo $_smarty_tpl->getVariable('ad')->value['URL'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('ad')->value['IMGSKY'],'class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
		</div>
	</div>
	
	
	
	<div class="row">
		<div class="col-sm-10">
		<h1>More Inspiration</h1>
		
		<ul class="nav nav-pills p-woche">
			<li class="active"><a id="inspiration-latest" data-toggle="tab" href="#tab-latest">Latest</a></li>
			<li class=""><a id="inspiration-most" data-toggle="tab" href="#tab-viewed">Most Viewed</a></li>
			<li class="tabloaderli"><div id="fe_core_loader" style="display: none;"> </div></li>
		</ul>
	
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	
	<div class="row">
		
		<div class="col-sm-10">
		
			<div class="tab-content">
    			
    			<div id="tab-latest" class="tab-pane active">
    		        <?php echo $_smarty_tpl->getVariable('data')->value;?>

                </div>
        
                <div id="tab-viewed" class="tab-pane">
        			<?php echo $_smarty_tpl->getVariable('data2')->value;?>

                </div>
                
                
            </div>   
    	</div>
    

	<div class="col-sm-2">
		
	</div>
	
