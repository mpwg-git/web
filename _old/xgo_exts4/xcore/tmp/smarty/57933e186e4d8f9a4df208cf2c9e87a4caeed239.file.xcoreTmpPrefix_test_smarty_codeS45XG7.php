<?php /* Smarty version Smarty-3.0.7, created on 2014-08-23 12:29:52
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeS45XG7" */ ?>
<?php /*%%SmartyHeaderCode:4978720753f86d204dd6a1-30653780%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57933e186e4d8f9a4df208cf2c9e87a4caeed239' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeS45XG7',
      1 => 1408789792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4978720753f86d204dd6a1-30653780',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_profiles::sc_get_latest_start','type'=>'DIGITAL','var'=>'profile'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_adsoftheweek::sc_get_this_week','onlytwocredits'=>1,'var'=>'adsoftheweek'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_archive_media::sc_your_pick','var'=>'yourpick'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_ads::sc_get_ad','var'=>'ad'),$_smarty_tpl);?>


<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('adsoftheweek')->value),$_smarty_tpl);?>



<!-- logo row -->
	<?php echo smarty_function_xr_atom(array('a_id'=>459,'return'=>1),$_smarty_tpl);?>

<!-- this week front -->	
    <?php echo smarty_function_xr_atom(array('a_id'=>567,'return'=>1),$_smarty_tpl);?>


	<div class="row">
		<div class="col-sm-10">
		    <div class="row">
				<div class="col-sm-12">
					<h2 class="linieBottom">Ads of the week<a class="more" href="<?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['ALL']['LINKPRINT'];?>
">MORE</a></h2>
				</div>
			</div>
			<div class="row">
		    
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
	
	
	