<?php /* Smarty version Smarty-3.0.7, created on 2014-08-24 15:58:53
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefyP5ef" */ ?>
<?php /*%%SmartyHeaderCode:194449412053fa0bbda59194-83946692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8430dd8e2ef5a00c8413f7fc94a52d9f1411609f' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefyP5ef',
      1 => 1408895933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194449412053fa0bbda59194-83946692',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><?php if ($_smarty_tpl->getVariable('GA')->value['oeedit']==1){?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'oe_preview::sc_get_blog','var'=>'data'),$_smarty_tpl);?>

<?php }else{ ?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_blog::sc_detailpage_get_id','var'=>'data'),$_smarty_tpl);?>

<?php }?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_sseo::getSseo','var'=>'data'),$_smarty_tpl);?>



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
    		<h1>Article</h1>
    		<div class="clearer"></div>
		</div>
		<div class="col-sm-9"></div>
	</div>
	<div class="row">
		<div class="col-sm-12">   
          <p class="looklikeH1 linieBottom"><?php echo $_smarty_tpl->getVariable('data')->value['TITLE'];?>
</p>
          <p><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'class'=>"img-responsive"),$_smarty_tpl);?>
</p>
		</div>
	</div>
	<div class="row imagefixresponsive">
	
	 <?php if ($_smarty_tpl->getVariable('data')->value['COLRIGHT']!=''){?>
		<div class="col-sm-6 prevent-overflow">
			<?php echo $_smarty_tpl->getVariable('data')->value['COLLEFT'];?>

		</div>
		<div class="col-sm-6 prevent-overflow">
			<?php echo $_smarty_tpl->getVariable('data')->value['COLRIGHT'];?>

			<br />
    		<?php if (count($_smarty_tpl->getVariable('data')->value['GALLERY'])>0){?>
    		<div id="gallery-images" class="royalSlider rsDefault">
    		    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['GALLERY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                <span>
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
    		    </span>
    		    <?php }} ?>
    		</div>
    		<br />
    		<?php }?>
		</div>
	<?php }else{ ?>
	    <div class="col-sm-12 prevent-overflow">
			<?php echo $_smarty_tpl->getVariable('data')->value['COLLEFT'];?>

			<br />
    		<?php if (count($_smarty_tpl->getVariable('data')->value['GALLERY'])>0){?>
    		<div id="gallery-images" class="royalSlider rsDefault">
    		    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['GALLERY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                <span>
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
    		    </span>
    		    <?php }} ?>
    		</div>
    		<br />
    		<?php }?>
		</div>
	<?php }?>
	
	</div>

    <div class="row">
	    <div class="col-sm-12">
	        <a href="javascript:history.back()" class="but detailbackbutton">Back</a>
	    </div>
	</div>

    <div class="row">
		<div class="col-sm-12">
			<hr>
			<div class="share">
                <!-- share buttons -->
                <?php echo smarty_function_xr_atom(array('a_id'=>461,'return'=>1),$_smarty_tpl);?>

			</div>
			<div class="clearer"></div>
			
			<div class="comments-disqus">
                <!-- disquus -->
                <?php echo smarty_function_xr_atom(array('a_id'=>462,'return'=>1),$_smarty_tpl);?>

			</div>

		</div>
	</div>