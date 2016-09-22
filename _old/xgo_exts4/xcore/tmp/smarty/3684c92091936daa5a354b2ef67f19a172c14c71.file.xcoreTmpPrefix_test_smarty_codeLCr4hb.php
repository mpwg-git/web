<?php /* Smarty version Smarty-3.0.7, created on 2015-02-02 15:43:11
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLCr4hb" */ ?>
<?php /*%%SmartyHeaderCode:99753121354cf8cffeb1df9-49488268%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3684c92091936daa5a354b2ef67f19a172c14c71' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLCr4hb',
      1 => 1422888191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99753121354cf8cffeb1df9-49488268',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_blog::sc_get_latest','category'=>'all','var'=>'data2'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_blog::sc_get_latestOld','category'=>'all','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_blog::sc_get_dropdown','var'=>'dropdown'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_blog::sc_get_current_category','var'=>'category'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_ads::sc_get_ad','var'=>'ad'),$_smarty_tpl);?>



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
			<h1>Archive Blog</h1>
			<div class="form-group floatLeft">
				<select class="form-control sel" id="blog-category">
				    <option value="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
">Latest</option>
				    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dropdown')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
"<?php if ($_smarty_tpl->getVariable('REQUEST')->value['r_id']==$_smarty_tpl->tpl_vars['v']->value['id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
				    <?php }} ?>
				</select>
				<div id="fe_core_loader" style="display: none;"> </div>
				<div class="clearer"></div>
			</div>
			<div class="clearer"></div>
		</form>
		
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div class="row" id="blog-banner">
		<div class="col-sm-12">
			<div id="content-slider-1" class="royalSlider contentSlider rsDefault">
				<div>
					<p class="labelpic"><a href="<?php echo $_smarty_tpl->getVariable('data')->value['ITEMS'][0]['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('w'=>1800,'h'=>600,'rmode'=>'cco','s_id'=>$_smarty_tpl->getVariable('data')->value['ITEMS'][0]['IMG'],'class'=>"img-responsive rsImg rsMainSlideImage"),$_smarty_tpl);?>
</a></p>
					<span class="blog-title"><?php echo $_smarty_tpl->getVariable('data')->value['ITEMS'][0]['TITLE'];?>
</span>
					<span class="rsTmb">1</span>
				</div>
				<div>
					<p class="labelpic"><a href="<?php echo $_smarty_tpl->getVariable('data')->value['ITEMS'][1]['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('w'=>1800,'h'=>600,'rmode'=>'cco','s_id'=>$_smarty_tpl->getVariable('data')->value['ITEMS'][1]['IMG'],'class'=>"img-responsive rsImg rsMainSlideImage"),$_smarty_tpl);?>
</a></p>
					<span class="blog-title"><?php echo $_smarty_tpl->getVariable('data')->value['ITEMS'][1]['TITLE'];?>
</span>
					<span class="rsTmb">2</span>
				</div>
				<div>
					<p class="labelpic"><a href="<?php echo $_smarty_tpl->getVariable('data')->value['ITEMS'][2]['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('w'=>1800,'h'=>600,'rmode'=>'cco','s_id'=>$_smarty_tpl->getVariable('data')->value['ITEMS'][2]['IMG'],'class'=>"img-responsive rsImg rsMainSlideImage"),$_smarty_tpl);?>
</a></p>
					<span class="blog-title"><?php echo $_smarty_tpl->getVariable('data')->value['ITEMS'][2]['TITLE'];?>
</span>
					#<span class="rsTmb">3</span>
				</div>
					<div>
					<p class="labelpic"><a href="<?php echo $_smarty_tpl->getVariable('data')->value['ITEMS'][3]['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('w'=>1800,'h'=>600,'rmode'=>'cco','s_id'=>$_smarty_tpl->getVariable('data')->value['ITEMS'][3]['IMG'],'class'=>"img-responsive rsImg rsMainSlideImage"),$_smarty_tpl);?>
</a></p>
					<span class="blog-title"><?php echo $_smarty_tpl->getVariable('data')->value['ITEMS'][3]['TITLE'];?>
</span>
					<span class="rsTmb">4</span>
				</div>
				<?php if ($_smarty_tpl->getVariable('data')->value['ITEMS'][4]['LINK']!=''){?>
					<div>
					<p class="labelpic"><a href="<?php echo $_smarty_tpl->getVariable('data')->value['ITEMS'][4]['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('w'=>1800,'h'=>600,'rmode'=>'cco','s_id'=>$_smarty_tpl->getVariable('data')->value['ITEMS'][4]['IMG'],'class'=>"img-responsive rsImg rsMainSlideImage"),$_smarty_tpl);?>
</a></p>
					<span class="blog-title"><?php echo $_smarty_tpl->getVariable('data')->value['ITEMS'][4]['TITLE'];?>
</span>
					<span class="rsTmb">5</span>
				</div>
				<?php }?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<!---<h2 id="blog-category">Latest Posts</h2>--->
			<p id="blog-category" class="looklikeH1 linieBottom"><?php echo $_smarty_tpl->getVariable('category')->value;?>
</p>
		</div>
	</div>
	
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
	

	

	