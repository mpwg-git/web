<?php /* Smarty version Smarty-3.0.7, created on 2015-02-02 16:50:46
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/469.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:20147098454cf9cd6376050-74258228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d70125b4fef98af91bc40daaeafada81797ada7' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/469.cache.html',
      1 => 1422892245,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20147098454cf9cd6376050-74258228',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_features::sc_get_latest','category'=>'all','var'=>'data2'),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_ads::sc_get_ad','var'=>'ad'),$_smarty_tpl);?>



<!-- logo row -->
	<?php echo smarty_function_xr_atom(array('a_id'=>459,'return'=>1),$_smarty_tpl);?>


	
<!-- this week front NEW -->	
    <?php echo smarty_function_xr_atom(array('a_id'=>659,'return'=>1),$_smarty_tpl);?>




	<div class="row" style='display:none;'>
		<div class="col-sm-10">
		    <div class="row">
				<div class="col-sm-12">
					<h2 class="linieBottom">Ads of the week<a class="more" href="<?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['ALL']['LINKPRINT'];?>
">MORE</a></h2>
				</div>
			</div>
			
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
		<div class="col-sm-2">
			<p class="banner"><a href="<?php echo $_smarty_tpl->getVariable('ad')->value['URL'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('ad')->value['IMGSKY'],'class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
		</div>
	</div>
	
	
	  <div class="row" style='display:none;'>
	    <div class="col-sm-12">
            <h3 class='loadingmenow'>LATEST</h3>
        </div>
    </div>
	
	
	<div id='FULL_REPLACE_FEATURES_TYPE'>
    	<div class="row">
    		<div class="col-sm-10">
    			
    			<?php echo $_smarty_tpl->getVariable('data2')->value;?>

                
    			</div>
    		</div>
    		<div class="col-sm-2">
    			<p class="banner"><a href="<?php echo $_smarty_tpl->getVariable('ad')->value['URL'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('ad')->value['IMGSKY'],'class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
    		</div>
    	</div>
	</div>