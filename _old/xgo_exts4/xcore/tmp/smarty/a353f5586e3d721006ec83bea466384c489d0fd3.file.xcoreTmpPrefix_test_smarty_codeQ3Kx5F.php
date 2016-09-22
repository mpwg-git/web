<?php /* Smarty version Smarty-3.0.7, created on 2015-01-12 13:19:53
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQ3Kx5F" */ ?>
<?php /*%%SmartyHeaderCode:33188015554b3bbe9de1085-70815444%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a353f5586e3d721006ec83bea466384c489d0fd3' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQ3Kx5F',
      1 => 1421065193,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33188015554b3bbe9de1085-70815444',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><?php if ($_smarty_tpl->getVariable('GA')->value['oeedit']==1){?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'oe_preview::sc_get_features','var'=>'data'),$_smarty_tpl);?>

<?php }else{ ?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_thisweek::sc_detailpage_get_id','var'=>'data'),$_smarty_tpl);?>

<?php }?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_thisweek::sc_get_this_week','var'=>'thisweek'),$_smarty_tpl);?>


<?php if ($_REQUEST['debug']==1){?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value['data']['GALLERY']),$_smarty_tpl);?>
<?php }?>

<div class="row">
	<div class="col-sm-12">
		<a class="navbar-brandCont" href="<?php echo smarty_function_xr_genlink(array('p_id'=>2),$_smarty_tpl);?>
">Lürzer's Archiv</a>
	</div>
</div>
    <!-- quicksearch -->
	<div class="row">
		<div class="col-sm-12">
	        <?php echo smarty_function_xr_atom(array('a_id'=>456,'return'=>1),$_smarty_tpl);?>

		</div>
	</div>
	
	
<div class="row">
	<div class="col-sm-9">
        <div class="line-top"></div>
		
		<?php if ($_smarty_tpl->getVariable('GA')->value['oeedit']==1){?>
		<?php }else{ ?>
		<ul class="nav nav-pills p-woche">
			<li class="tit"><h1>Features</h1></li>
			<li class="fix-tabs1<?php if ($_smarty_tpl->getVariable('P_ID')->value==60){?> active<?php }?>"><a href="<?php echo $_smarty_tpl->getVariable('thisweek')->value[0]['LINK'];?>
">Audiovisual</a></li>
			<li class="fix-tabs2<?php if ($_smarty_tpl->getVariable('P_ID')->value==61){?> active<?php }?>"><a href="<?php echo $_smarty_tpl->getVariable('thisweek')->value[1]['LINK'];?>
">Campaigns</a></li>
			<li class="fix-tabs3<?php if ($_smarty_tpl->getVariable('P_ID')->value==62){?> active<?php }?>"><a href="<?php echo $_smarty_tpl->getVariable('thisweek')->value[2]['LINK'];?>
">Who's Who</a></li>
			<li class="fix-tabs4<?php if ($_smarty_tpl->getVariable('P_ID')->value==63){?> active<?php }?>"><a href="<?php echo $_smarty_tpl->getVariable('thisweek')->value[3]['LINK'];?>
">Digital</a></li>
			<li class="fix-tabs5<?php if ($_smarty_tpl->getVariable('P_ID')->value==64){?> active<?php }?>"><a href="<?php echo $_smarty_tpl->getVariable('thisweek')->value[4]['LINK'];?>
">Editor's Blog</a></li>
		</ul>
		<?php }?>
	</div>
	<div class="col-sm-3"></div>
</div>
<div class="row">
	<div class="col-sm-12">
		<p><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['data']['IMG'],'ext'=>'jpg','alt'=>"Banner",'class'=>"img-responsive"),$_smarty_tpl);?>
</p>
	</div>
</div>
<?php echo smarty_function_xr_atom(array('a_id'=>672,'return'=>1),$_smarty_tpl);?>




<div class="row">
	<div class="col-sm-12">
		<h2><?php echo $_smarty_tpl->getVariable('data')->value['data']['TITLE'];?>
</h2>
	</div>
</div>



<div class="row imagefixresponsive">
	<div class="col-sm-6 prevent-overflow">
		<?php echo $_smarty_tpl->getVariable('data')->value['data']['COLLEFT'];?>

		
		<div class="col-xs-12">
	         <div class="hidden-1400 visible-992 hidden-1400-on-mobile">
		    	<?php echo smarty_function_xr_atom(array('a_id'=>668,'return'=>1),$_smarty_tpl);?>

			</div>
	    
	    </div>
		
	</div>
	<div class="col-sm-6 prevent-overflow">
		 
		 <div class="hidden-1400 visible-992 hidden-1400-on-mobile">
	    	<?php echo smarty_function_xr_atom(array('a_id'=>668,'return'=>1),$_smarty_tpl);?>

		</div>
	
		<?php echo $_smarty_tpl->getVariable('data')->value['data']['COLRIGHT'];?>

		<br />
	   
		<?php if (count($_smarty_tpl->getVariable('data')->value['data']['GALLERY'])>0){?>
		<div id="gallery-images" class="royalSlider rsDefault">
		    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['data']['GALLERY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    		    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'var'=>'gimage'),$_smarty_tpl);?>

    		    <?php if ($_smarty_tpl->getVariable('gimage')->value['rw']>$_smarty_tpl->getVariable('gimage')->value['rh']){?><!--LANDSCAPE-->
    		        <?php if ($_smarty_tpl->getVariable('gimage')->value['rw']>1024){?>
    		             <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>1024,'var'=>'gimage'),$_smarty_tpl);?>

    		           <?php }?>
    		    <?php }else{ ?>
    		        <?php if ($_smarty_tpl->getVariable('gimage')->value['rh']>1024){?>
    		            <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'h'=>1024,'var'=>'gimage'),$_smarty_tpl);?>

    		        <?php }?>
    		    <?php }?>
    		    <div class="gallery-slider-slide<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
    		    <a data-lightbox="gallery" data-title="<h4><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h4><?php echo $_smarty_tpl->tpl_vars['v']->value['DESC'];?>
" href="<?php echo $_smarty_tpl->getVariable('gimage')->value['url'];?>
">
    		     <img src="<?php echo $_smarty_tpl->getVariable('gimage')->value['src'];?>
" alt="<?php echo $_smarty_tpl->getVariable('bild1')->value['alt'];?>
" class="img-responsive rsImg rsMainSlideImage">
    		    </a>
    		    <img width="96" height="72" class="rsTmb" src="<?php echo $_smarty_tpl->getVariable('gimage')->value['src'];?>
" />
    		    </div>
		    <?php }} ?>
		</div>
		<br />
		<?php }?>
	</div>
</div>

<div class="row">
    <div class="col-sm-12">
        <a href="javascript:history.back()" class="but detailbackbutton">Back</a>
    </div>
</div>

<div class="row">
	<div class="col-sm-12">
		<hr />
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
        fe_count.view('THISWEEK',<?php echo $_smarty_tpl->getVariable('data')->value['data']['ID'];?>
);
    });
</script>
