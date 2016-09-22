<?php /* Smarty version Smarty-3.0.7, created on 2014-08-12 13:28:50
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecmaqJC" */ ?>
<?php /*%%SmartyHeaderCode:67364039553e9fa72a83249-97812854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd31df27551c91f60f425220f8038b7b1a827829a' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecmaqJC',
      1 => 1407842930,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67364039553e9fa72a83249-97812854',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgCompose')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgCompose.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_partners::sc_get_latest_start','var'=>'partner'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_profiles::sc_get_latest_start_or','var'=>'profile'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_inspiration::sc_get_latest_start','var'=>'inspiration'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_adsoftheweek::sc_get_this_week','onlytwocredits'=>1,'var'=>'adsoftheweek'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_archive_media::sc_your_pick_or','var'=>'yourpick'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_thisweek::sc_get_most_read','var'=>'mostread'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_magazine::sc_get_frontpage','var'=>'frontpagemagazines'),$_smarty_tpl);?>


<!-- logo row -->
	<?php echo smarty_function_xr_atom(array('a_id'=>459,'return'=>1),$_smarty_tpl);?>

	
<!-- this week front -->	
    <?php echo smarty_function_xr_atom(array('a_id'=>507,'return'=>1),$_smarty_tpl);?>


	<div class="row">
		<div class="col-sm-6">
			<h2><a href="<?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['ALL']['LINKPRINT'];?>
">Ads of the Week</a><a class="more" href="<?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['ALL']['LINKPRINT'];?>
">MORE</a></h2>
		
			<?php if ($_smarty_tpl->getVariable('adsoftheweek')->value['PRINT']['IMG']>0){?>
			<?php $_smarty_tpl->tpl_vars['img_id1'] = new Smarty_variable($_smarty_tpl->getVariable('adsoftheweek')->value['PRINT']['IMG'], null, null);?>
			<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars['img_id1'] = new Smarty_variable(270410, null, null);?>
			<?php }?>
			<?php if ($_smarty_tpl->getVariable('adsoftheweek')->value['TV']['IMG']>0){?>
			<?php $_smarty_tpl->tpl_vars['img_id2'] = new Smarty_variable($_smarty_tpl->getVariable('adsoftheweek')->value['TV']['IMG'], null, null);?>
			<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars['img_id2'] = new Smarty_variable(270410, null, null);?>
			<?php }?>
			<?php if ($_smarty_tpl->getVariable('adsoftheweek')->value['CLASSIC']['IMG']>0){?>
			<?php $_smarty_tpl->tpl_vars['img_id3'] = new Smarty_variable($_smarty_tpl->getVariable('adsoftheweek')->value['CLASSIC']['IMG'], null, null);?>
			<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars['img_id3'] = new Smarty_variable(270410, null, null);?>
			<?php }?>
			
			<?php echo smarty_function_xr_imgCompose(array('var'=>'bild1','jcfg'=>"	    
            {
                'imgs' : [{
            	's_id':".($_smarty_tpl->getVariable('img_id1')->value).", 'x': 6, 'y': 0, 'w': 533, 'h': 321, 'rmode':'cco', 'ext':'jpg'
                },{
            	's_id':270328, 'x': 0, 'y': 275, 'w': 142, 'h': 31, 'ext':'png'
                }],
                'ext': 'png', 'fname':'bild1'
            }"),$_smarty_tpl);?>

            
            <?php echo smarty_function_xr_imgCompose(array('var'=>'bild2','jcfg'=>"	    
            {
                'imgs' : [{
            	's_id':".($_smarty_tpl->getVariable('img_id2')->value).", 'x': 6, 'y': 0, 'w': 533, 'h': 321, 'rmode':'cco', 'ext':'jpg'
                },{
            	's_id':270347, 'x': 0, 'y': 275, 'w': 165, 'h': 31, 'ext':'png'
                }],
                'ext': 'png', 'fname':'bild2'
            }"),$_smarty_tpl);?>

            
            <?php echo smarty_function_xr_imgCompose(array('var'=>'bild3','jcfg'=>"	    
            {
                'imgs' : [{
            	's_id':".($_smarty_tpl->getVariable('img_id3')->value).", 'x': 6, 'y': 0, 'w': 533, 'h': 321, 'rmode':'cco', 'ext':'jpg'
                },{
            	's_id':270343, 'x': 0, 'y': 275, 'w': 165, 'h': 31, 'ext':'png'
                }],
                'ext': 'png', 'fname':'bild3'
            }"),$_smarty_tpl);?>

			
			<div id="content-slider-1" class="royalSlider contentSlider rsDefault ads-slider">
				<?php if ($_smarty_tpl->getVariable('bild1')->value['src']!=''){?><div class="adsoftheweekcredits">
					<p class="labelpic"><a href="<?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['ALL']['LINKPRINT'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('bild1')->value['src'];?>
" alt="<?php echo $_smarty_tpl->getVariable('bild1')->value['alt'];?>
" class="img-responsive rsImg rsMainSlideImage"></a></p>
			        <div class="minHeight28 ads-credits"><?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['PRINT']['CREDITSHTML'];?>
</div>
			        <span class="rsTmb">1</span>
				</div><?php }?>
				<?php if ($_smarty_tpl->getVariable('bild2')->value['src']!=''){?><div class="adsoftheweekcredits">
					<p class="labelpic"><a href="<?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['ALL']['LINKTV'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('bild2')->value['src'];?>
" alt="<?php echo $_smarty_tpl->getVariable('bild2')->value['alt'];?>
" class="img-responsive rsImg rsMainSlideImage"></a></p>
			       <div class="minHeight28 ads-credits"><?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['TV']['CREDITSHTML'];?>
</div>
			        <span class="rsTmb">2</span>
				</div><?php }?>
				<?php if ($_smarty_tpl->getVariable('bild3')->value['src']!=''){?><div class="adsoftheweekcredits">
					<p class="labelpic"><a href="<?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['ALL']['LINKCLASSIC'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('bild3')->value['src'];?>
" alt="<?php echo $_smarty_tpl->getVariable('bild3')->value['alt'];?>
" class="img-responsive rsImg rsMainSlideImage"></a></p>
			        <div class="minHeight28 ads-credits"><?php echo $_smarty_tpl->getVariable('adsoftheweek')->value['CLASSIC']['CREDITSHTML'];?>
</div>
			        <span class="rsTmb">3</span>
				</div><?php }?>
			</div>
		</div>

		<div class="col-sm-6">
			<div id="content-slider-2" class="royalSlider contentSlider rsDefault rsTleft frontpagemagazineslider">
			
			 <?php  $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('frontpagemagazines')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['j']->key => $_smarty_tpl->tpl_vars['j']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['j']->key;
?>
			 
			    <div class="rsContent>">
    				<div class="row">
    					<div class="col-sm-12">
    						<h2 class="nowra"><a href="<?php echo $_smarty_tpl->tpl_vars['j']->value['LINK'];?>
"><?php echo $_smarty_tpl->tpl_vars['j']->value['TITLE'];?>
</a>&nbsp;</h2>
    					</div>
    				</div>
    				<div class="row">
    					<div class="col-sm-6">
    						<p><a href="<?php echo $_smarty_tpl->tpl_vars['j']->value['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['j']->value['IMG'],'alt'=>"Banner",'w'=>510,'class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
    					</div>
    					<div class="col-sm-6">
    						<?php echo $_smarty_tpl->tpl_vars['j']->value['TEXT'];?>

    						<span class="rsTmb"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</span>
    					</div>
    					
    				</div>
    			</div>
    		
			    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['i']->value+2;?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['countsave'] = new Smarty_variable($_tmp1, null, null);?>
			<?php }} ?>
			
			
			<?php echo smarty_function_xr_wz_fetch(array('id'=>515,'var'=>'products'),$_smarty_tpl);?>

		    <?php  $_smarty_tpl->tpl_vars['obj'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('products')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['obj']->key => $_smarty_tpl->tpl_vars['obj']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['obj']->key;
?>
    		    <div class="rsContent slide<?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
">
    				<div class="row">
    					<div class="col-sm-12">
    						<h2 class="nowra"><a href="https://itunes.apple.com/at/app/lurzers-archive-for-ipad/id476622969" target="_blank"><?php echo $_smarty_tpl->tpl_vars['obj']->value['wz_TITLE'];?>
</a></h2>
    					</div>
    				</div>
    				<div class="row">
    					<div class="col-sm-6">
    						<p><a href="https://itunes.apple.com/at/app/lurzers-archive-for-ipad/id476622969" target="_blank"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['obj']->value['wz_IMAGE'],'w'=>510,'alt'=>"Banner",'class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
    					</div>
    					<div class="col-sm-6">
    						<?php echo $_smarty_tpl->tpl_vars['obj']->value['wz_TEXT'];?>

    						<span class="rsTmb"><?php echo $_smarty_tpl->getVariable('countsave')->value;?>
</span>
    					</div>
    				</div>
    			</div>
            <?php }} ?>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<h2><a href="<?php echo $_smarty_tpl->getVariable('inspiration')->value['LINK_OVERVIEW'];?>
">Inspiration</a> <a class="more" href="<?php echo $_smarty_tpl->getVariable('inspiration')->value['LINK_OVERVIEW'];?>
">More</a></h2>
		</div>
	</div>
	<div class="row">
	
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inspiration')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            
                <div class="col-sm-3">
					<div class="lw-item"> 
						<p class="labelpic"><a <?php if ($_smarty_tpl->tpl_vars['v']->value['URLEXT']==1){?>target="_blank"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['v']->value['URL'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>500,'h'=>350,'rmode'=>'cco','class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
						<p><?php echo $_smarty_tpl->tpl_vars['v']->value['TEXT'];?>
</p>
					</div>
			    </div>    
            
        <?php }} ?>
	
	</div>



	
	<div class="row">
		
		<?php if ($_smarty_tpl->getVariable('profile')->value['OVERRULE']==1){?>
		 <!-- profile or BEGIN -->
		 
		 <div class="col-sm-6">
			<h2><a href="<?php echo $_smarty_tpl->getVariable('profile')->value['LINK_OVERVIEW'];?>
"><?php echo $_smarty_tpl->getVariable('profile')->value['TITLE'];?>
</a></h2>
			<div class="row">
				<div class="col-md-7">
					<p><a href="<?php echo $_smarty_tpl->getVariable('profile')->value['LINK_OVERVIEW'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('profile')->value['IMG'],'rmode'=>'cco','w'=>250,'h'=>210,'class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
				</div>
				<div class="col-md-5">
				        <p><?php echo $_smarty_tpl->getVariable('profile')->value['TEXT'];?>
</p>
				</div>
			</div>
		</div>
		 
		 <!-- profile or END -->
		 <?php }else{ ?>
		 
		<!-- profile box BEGIN -->
		<div class="col-sm-6">
			<h2><a href="<?php echo $_smarty_tpl->getVariable('profile')->value['LINK_MORE'];?>
" id="link-profiles">Profile</a> <a class="more" href="<?php echo $_smarty_tpl->getVariable('profile')->value['LINK_MORE'];?>
">More Profiles</a></h2>
			<div class="row same-height">
				<div class="col-md-5">
					<p><a href="<?php echo $_smarty_tpl->getVariable('profile')->value['LINK_DETAIL'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('profile')->value['IMG'],'rmode'=>'cco','w'=>300,'h'=>350,'class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
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
		<!-- profile box END -->

        <?php }?>

        <?php if ($_smarty_tpl->getVariable('yourpick')->value['OVERRULE']==1){?>
		 <!-- yourpicks or BEGIN -->
		 
		 <div class="col-sm-6">
			<h2><a href="<?php echo $_smarty_tpl->getVariable('yourpick')->value['LINK_OVERVIEW'];?>
"><?php echo $_smarty_tpl->getVariable('yourpick')->value['TITLE'];?>
</a></h2>
			<div class="row">
				<div class="col-md-7">
					<p><a href="<?php echo $_smarty_tpl->getVariable('yourpick')->value['LINK_OVERVIEW'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('yourpick')->value['IMG'],'rmode'=>'cco','w'=>500,'h'=>350,'class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
				</div>
				<div class="col-md-5">
				        <p><?php echo $_smarty_tpl->getVariable('yourpick')->value['TEXT'];?>
</p>
				</div>
			</div>
		</div>
		 
		 <!-- yourpicks or END -->
		 <?php }else{ ?>
		 
        <!-- yourpicks box BEGIN -->		
		<div class="col-sm-6">
			<h2><a href="<?php echo $_smarty_tpl->getVariable('yourpick')->value['LINK_OVERVIEW'];?>
" id="link-your-picks">Your Picks</a> <a class="more" href="<?php echo $_smarty_tpl->getVariable('yourpick')->value['LINK_OVERVIEW'];?>
">More Picks</a></h2>
			<div class="row">
				<div class="col-md-8">
					<p><a href="<?php echo $_smarty_tpl->getVariable('yourpick')->value['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('yourpick')->value['IMG'],'rmode'=>'cco','w'=>500,'h'=>350,'class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
				</div>
				<div class="col-md-4">
				    <h3 class="yourpick-h3"><?php echo $_smarty_tpl->getVariable('yourpick')->value['TITLE'];?>
</h3>
				    <span class="quick-archiv-nr"><?php echo $_smarty_tpl->getVariable('yourpick')->value['ARCHIV_NR'];?>
</span>
				    <?php echo $_smarty_tpl->getVariable('yourpick')->value['CREDITSHTML'];?>

				</div>
			</div>
		</div>
		<!-- yourpicks box END -->
		<?php }?>
		
	</div>
	<div class="row">
	    
	   
	    <div class="col-sm-6">
	        <?php if ($_smarty_tpl->getVariable('profile')->value['OVERRULE']!=1){?>
	        <div class="row">
	            <div class="col-md-5"></div>
				<div class="col-md-7 profile"><a class="more see-more" href="<?php echo $_smarty_tpl->getVariable('profile')->value['LINK_DETAIL'];?>
">see more</a></div>
	        </div>
	        <?php }?>
	    </div>
	    
	    
	    <div class="col-sm-6">
	    <?php if ($_smarty_tpl->getVariable('yourpick')->value['OVERRULE']!=1){?>
	        <div class="row">
	            <div class="col-md-8"></div>
				<div class="col-md-4"><a class="more see-more" href="<?php echo $_smarty_tpl->getVariable('yourpick')->value['LINK'];?>
">see more</a></div>
	        </div>
	    <?php }?>
	    </div>

	</div>
	
	
	<div class="row">
		
		<?php if ($_smarty_tpl->getVariable('partner')->value['OVERRULE']==1){?>
		 <!-- partners or BEGIN -->
		<div class="col-sm-6">
			<h2><a href="<?php echo $_smarty_tpl->getVariable('partner')->value['LINK_OVERVIEW'];?>
"><?php echo $_smarty_tpl->getVariable('partner')->value['TITLE'];?>
</a> </h2>
			<div class="row">
				<div class="col-md-7">
					<p><a href="<?php echo $_smarty_tpl->getVariable('partner')->value['LINK_OVERVIEW'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('partner')->value['IMG'],'w'=>250,'h'=>210,'rmode'=>'cco','class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
				</div>
				<div class="col-md-5">
				        <p><?php echo $_smarty_tpl->getVariable('partner')->value['TEXT'];?>
</p>
				</div>
			</div>
		</div>
		<!-- partners or END -->
		
		<?php }else{ ?>
		<!-- partners box BEGIN -->
		<div class="col-sm-6">
			<h2><a href="<?php echo $_smarty_tpl->getVariable('partner')->value['LINK_OVERVIEW'];?>
">Partners</a> <a class="more" href="<?php echo $_smarty_tpl->getVariable('partner')->value['LINK_OVERVIEW'];?>
">More Partners</a></h2>
			<div class="row">
				<div class="col-md-7">
					<p><a href="<?php echo $_smarty_tpl->getVariable('partner')->value['LINK_OVERVIEW'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('partner')->value['IMG'],'class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
				</div>
				<div class="col-md-5">
						<h3 class="nomargintop"><?php echo $_smarty_tpl->getVariable('partner')->value['TITLE'];?>
</h3>
				        <p><?php echo $_smarty_tpl->getVariable('partner')->value['TEXT'];?>
</p>
				</div>
			</div>
		</div>
		<!-- partners box END -->
		
		<?php }?>
		
		
		<?php if ($_smarty_tpl->getVariable('mostread')->value['OVERRULE']==1){?>
		 <!-- mostread or BEGIN -->
		<div class="col-sm-6">
			<h2><a href="<?php echo $_smarty_tpl->getVariable('mostread')->value['LINK_OVERVIEW'];?>
"><?php echo $_smarty_tpl->getVariable('mostread')->value['TITLE'];?>
</a></h2>
			<div class="row">
				<div class="col-md-7">
					<p><a href="<?php echo $_smarty_tpl->getVariable('mostread')->value['LINK_OVERVIEW'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('mostread')->value['IMG'],'w'=>250,'h'=>210,'rmode'=>'cco','class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
				</div>
				<div class="col-md-5">
				        <p><?php echo $_smarty_tpl->getVariable('mostread')->value['TEXT'];?>
</p>
				</div>
			</div>
		</div>
		<!-- mostread or END -->
		
		<?php }else{ ?>
		<!-- most read box BEGIN -->
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="linieMoreS" id="link-most-read">Most Read
					 <span class="more"><?php echo $_smarty_tpl->getVariable('mostread')->value['CONF'];?>
</a>
					</h2>
				</div>
			</div>
			<hr>
			<!--
			<div class="row">
				<div class="col-sm-10">
					 <ul class="nav nav-tabs inTabs">
						
						<li class="fix-tabs6"><a data-toggle="tab" href="#today">Today</a></li>
						<li class="fix-tabs7"><a data-toggle="tab" href="#thisweek">This Week</a></li>
						<li class="active fix-tabs8"><a data-toggle="tab" href="#thismonth">This Month</a></li>
						<li class="fix-tabs7"><a data-toggle="tab" href="#thisyear">This Year</a></li>
						<li class="fix-tabs7"><a data-toggle="tab" href="#overall">Overall</a></li>
					    
					</ul>
				
				</div>									
			</div>
			-->
			
			<!-- Tab panes -->
			<div class="tab-content">
				<div id="today" class="tab-pane active">
					<div class="row">
						<div class="col-md-12">
							<ul class="b1-liste nopicB1 marginTop0">
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mostread')->value['TODAY']['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<div class="row most-read-row">
							        <div class="col-sm-3">
							            <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>400,'h'=>281,'rmode'=>'cco','class'=>"img-responsive"),$_smarty_tpl);?>
</a>
							        </div>
							        <div class="col-sm-9 most-read-col">
							            <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><h3 class="nowra marginTop0 marginBottom0"><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h3></a>
							            <span class="quick-archiv-nr"><?php echo $_smarty_tpl->tpl_vars['v']->value['CATEGORY'];?>
</span>
							        </div>
							    </div>
							<?php }} ?>
							</ul>
						</div>
					</div>
				</div>
				<div id="thisweek" class="tab-pane">
					<div class="row">
						<div class="col-md-12">
							<ul class="b1-liste nopicB1 marginTop0">
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mostread')->value['THISWEEK']['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<div class="row most-read-row">
							        <div class="col-sm-2">
							            <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>400,'h'=>250,'rmode'=>'cco','class'=>"img-responsive"),$_smarty_tpl);?>
</a>
							        </div>
							        <div class="col-sm-10 most-read-col">
							            <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><h3 class="nowra marginTop0 marginBottom0"><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h3></a>
							            <span class="quick-archiv-nr"><?php echo $_smarty_tpl->tpl_vars['v']->value['CATEGORY'];?>
</span>
							        </div>
							    </div>
							<?php }} ?>
							</ul>
						</div>
					</div>
				</div>
				<div id="thismonth" class="tab-pane">
					<div class="row">
						<div class="col-md-12">
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mostread')->value['THISMONTH']['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
							    <div class="row most-read-row">
							        <div class="col-sm-2">
							            <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>400,'h'=>250,'rmode'=>'cco','class'=>"img-responsive"),$_smarty_tpl);?>
</a>
							        </div>
							        <div class="col-sm-10 most-read-col">
							            <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><h3 class="nowra marginTop0 marginBottom0"><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h3></a>
							            <span class="quick-archiv-nr"><?php echo $_smarty_tpl->tpl_vars['v']->value['CATEGORY'];?>
</span>
							        </div>
							    </div>
							<?php }} ?>
						</div>
					</div>
				</div>
				<div id="thisyear" class="tab-pane">
					<div class="row">
						<div class="col-md-12">
							<ul class="b1-liste nopicB1 marginTop0">
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mostread')->value['THISYEAR']['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<div class="row most-read-row">
							        <div class="col-sm-2">
							            <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>400,'h'=>250,'rmode'=>'cco','class'=>"img-responsive"),$_smarty_tpl);?>
</a>
							        </div>
							        <div class="col-sm-10 most-read-col">
							            <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><h3 class="nowra marginTop0 marginBottom0"><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h3></a>
							            <span class="quick-archiv-nr"><?php echo $_smarty_tpl->tpl_vars['v']->value['CATEGORY'];?>
</span>
							        </div>
							    </div>
							<?php }} ?>
							</ul>
						</div>
					</div>
				</div>
				<div id="overall" class="tab-pane">
					<div class="row">
						<div class="col-md-12">
							<ul class="b1-liste nopicB1 marginTop0">
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mostread')->value['OVERALL']['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<div class="row most-read-row">
							        <div class="col-sm-2">
							            <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>400,'h'=>250,'rmode'=>'cco','class'=>"img-responsive"),$_smarty_tpl);?>
</a>
							        </div>
							        <div class="col-sm-10 most-read-col">
							            <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><h3 class="nowra marginTop0 marginBottom0"><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h3></a>
							            <span class="quick-archiv-nr"><?php echo $_smarty_tpl->tpl_vars['v']->value['CATEGORY'];?>
</span>
							        </div>
							    </div>
							<?php }} ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- mostread box END -->
			<?php }?>
			
		</div>
	</div>
