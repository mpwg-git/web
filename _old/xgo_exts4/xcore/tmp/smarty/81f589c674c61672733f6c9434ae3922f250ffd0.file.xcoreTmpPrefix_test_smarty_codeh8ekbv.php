<?php /* Smarty version Smarty-3.0.7, created on 2015-01-13 13:23:19
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeh8ekbv" */ ?>
<?php /*%%SmartyHeaderCode:20320829854b50e3754b715-52181232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81f589c674c61672733f6c9434ae3922f250ffd0' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeh8ekbv',
      1 => 1421151799,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20320829854b50e3754b715-52181232',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_events::sc_get_latest_one','var'=>'event'),$_smarty_tpl);?>


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
		    <h1>Services</h1>
		</div>
		<div class="col-sm-3"></div>
	</div>
	
    <?php echo smarty_function_xr_atom(array('a_id'=>672,'return'=>1),$_smarty_tpl);?>

	
	<div class="row">
		<div class="col-sm-12">
	    <h2>Events
	    <a href="<?php echo $_smarty_tpl->getVariable('event')->value['LINK_OVERVIEW'];?>
" class="more">More</a></h2>
	    </div>
	</div>
	
    <div class="row">
		<div class="col-sm-4">
			<p><a href="<?php echo $_smarty_tpl->getVariable('event')->value['LINK_OVERVIEW'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('event')->value['IMG'],'w'=>349,'class'=>"img-responsive leichterrahmen"),$_smarty_tpl);?>
</a></p>
		</div>
		<div class="col-sm-8">
			<p><strong>
			<?php echo $_smarty_tpl->getVariable('event')->value['DATEFROM'];?>

				<?php if (($_smarty_tpl->getVariable('event')->value['DATETO']!="0000-00-00")){?>
                    to <?php echo $_smarty_tpl->getVariable('event')->value['DATETO'];?>
        
                <?php }?>
            </strong></p>
			<span class="looklikeH1noBorder"><?php echo $_smarty_tpl->getVariable('event')->value['TITLE'];?>
</span>
			<p><?php echo $_smarty_tpl->getVariable('event')->value['TEXT'];?>
</p>
			
	    	<?php echo smarty_function_xr_atom(array('a_id'=>673,'return'=>1),$_smarty_tpl);?>

	    	
	    	
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<h2 class="linieBottom">Others</h2>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-4">
			<div class="lw-item"> 
				<h3>Partners</h3>
				<p class="labelpic"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>14),$_smarty_tpl);?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('IMGPARTNERS')->value,'w'=>349,'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
				<p><?php echo $_smarty_tpl->getVariable('TEXTPARTNERS')->value;?>
</p>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="lw-item">
				<h3>Distributors</h3>
				<p class="labelpic"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>16),$_smarty_tpl);?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('IMGDISTRIBUTORS')->value,'w'=>349,'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
				<p><?php echo $_smarty_tpl->getVariable('TEXTDISTRIBUTORS')->value;?>
</p>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="lw-item">
				<h3>Ratecard</h3>
				<p class="labelpic"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>17),$_smarty_tpl);?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('IMGRATECARD')->value,'w'=>349,'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
				<p><?php echo $_smarty_tpl->getVariable('TEXTRATECARD')->value;?>
</p>
			</div>
		</div>
	</div>
	
    <?php echo smarty_function_xr_atom(array('a_id'=>676,'return'=>1),$_smarty_tpl);?>

	
	