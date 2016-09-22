<?php /* Smarty version Smarty-3.0.7, created on 2014-08-22 13:53:57
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVfhQPI" */ ?>
<?php /*%%SmartyHeaderCode:94819914953f72f55ac7ab3-70491960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7102fb392e7f2c682d8f5fa6b4531a59ce59134e' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVfhQPI',
      1 => 1408708437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94819914953f72f55ac7ab3-70491960',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if ($_smarty_tpl->getVariable('GA')->value['oeedit']==1){?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'oe_preview::sc_get_digital_interview','var'=>'data'),$_smarty_tpl);?>

<?php }else{ ?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_magazine::sc_get_detail_page','var'=>'magazin'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_digital_interviews::sc_get_detail_page','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_likes::sc_do_i_like_it','record_type'=>"MEDIA",'record_id'=>$_smarty_tpl->getVariable('data')->value['ID'],'var'=>'likeit'),$_smarty_tpl);?>

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
			<!-- Magazine - Filter -->
		    <?php echo smarty_function_xr_atom(array('a_id'=>524,'return'=>1),$_smarty_tpl);?>

		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div id="magazine_content_container">
    	<div class="row">
    		<div class="col-sm-9">
    	    
    	    <h1>Interview - <?php echo $_smarty_tpl->getVariable('magazin')->value['NAME'];?>
</h1>
    		    
    		    <ul class="nav nav-pills p-woche">
    				<li><a href="<?php echo $_smarty_tpl->getVariable('magazin')->value['LINK_MAGAZINE'];?>
">Featured Work</a></li>
    				<?php if ($_smarty_tpl->getVariable('magazin')->value['LINK_INTERVIEW']!=false){?>
    				<li><a href="<?php echo $_smarty_tpl->getVariable('magazin')->value['LINK_INTERVIEW'];?>
">Interview</a></li>
    				<?php }?>
    				<?php if ($_smarty_tpl->getVariable('magazin')->value['LINK_INTERVIEW_DIGITAL']!=false){?>
    				<li class="active"><a href="<?php echo $_smarty_tpl->getVariable('magazin')->value['LINK_INTERVIEW_DIGITAL'];?>
">Digital Interview</a></li>
    				<?php }?>
    			</ul>
    		
    		</div>
    		<div class="col-sm-3"></div>
    	</div>
    	
        <div class="row">
    		<div class="col-sm-8">
    			<h2><?php echo $_smarty_tpl->getVariable('data')->value['TITLE'];?>
</h2>
    			<?php echo $_smarty_tpl->getVariable('data')->value['TEXT'];?>

    			<br />
    			<?php if ($_smarty_tpl->getVariable('data')->value['LINKPROFILE']!=''){?>
    			<p><a href="<?php echo $_smarty_tpl->getVariable('data')->value['LINKPROFILE'];?>
" class="but">Designer Profile</a></p>
    			<?php }?>
    			<?php if ($_smarty_tpl->getVariable('data')->value['LINKEXTERN']!=''){?>
    			<p><a href="<?php echo $_smarty_tpl->getVariable('data')->value['LINKEXTERN'];?>
" class="but" target="_blank">Designer Website</a></p>
    			<?php }?>
    			<br />
    		</div>
    		<div class="col-sm-4">
    				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['GALLERY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    			  <p><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['SRC'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['v']->value['ALT'];?>
" longdesc="<?php echo $_smarty_tpl->tpl_vars['v']->value['DESC'];?>
" class="img-responsive">
    			      <span class="gallerycaption"><?php echo $_smarty_tpl->tpl_vars['v']->value['DESC'];?>
</span>
    			  </p>
    			<?php }} ?>
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
	
<script>
    $(document).ready(function(){
        fe_magazines.init();
    });
</script>