<?php /* Smarty version Smarty-3.0.7, created on 2014-08-12 22:28:31
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaVsG7f" */ ?>
<?php /*%%SmartyHeaderCode:179020753853ea78ef4046f5-70509040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '160b02515dad343d052d14c40d843e3f5a3ee1bb' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaVsG7f',
      1 => 1407875311,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179020753853ea78ef4046f5-70509040',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_work','var'=>'work'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_beyond_archive','var'=>'beyond'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_public_profile','show'=>'live','var'=>'data'),$_smarty_tpl);?>


<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('beyond')->value),$_smarty_tpl);?>


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
		    <h1>Profile</h1>
		
		    <ul class="nav nav-pills p-woche">
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>25),$_smarty_tpl);?>
">Edit my Profile</a></li>
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>26),$_smarty_tpl);?>
">Change Password</a></li>
				<!--<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>27),$_smarty_tpl);?>
">My Account</a></li>-->
				<?php if ($_smarty_tpl->getVariable('data')->value['BEYONDARCHIVE']>0){?><li class="active"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>105),$_smarty_tpl);?>
">My public Profile</a></li><?php }?>
			</ul>
		
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	
	<div class="row my-profile">
		<div class="col-sm-4">
			<p>
			<?php if ($_smarty_tpl->getVariable('data')->value['IMAGE']>0){?>
			<?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMAGE'],'w'=>450,'ext'=>'png','class'=>"img-responsive",'id'=>"profile-image"),$_smarty_tpl);?>

			<?php }else{ ?>
			<?php echo smarty_function_xr_imgWrapper(array('s_id'=>270338,'w'=>300,'h'=>400,'rmode'=>'cco','class'=>"img-responsive",'id'=>"profile-image"),$_smarty_tpl);?>

			<?php }?>
			</p>
		</div>
		<div class="col-sm-4">
		    <?php if ($_smarty_tpl->getVariable('data')->value['FIRSTNAME']!=''||$_smarty_tpl->getVariable('data')->value['LASTNAME']!=''){?>
			<h2 class="linieBottom myproH2"><?php if ($_smarty_tpl->getVariable('data')->value['FIRSTNAME']!=''){?><?php echo $_smarty_tpl->getVariable('data')->value['FIRSTNAME'];?>
 <?php }?><?php echo $_smarty_tpl->getVariable('data')->value['LASTNAME'];?>
</h2>
			<?php if ($_smarty_tpl->getVariable('data')->value['COMPANY']!=''){?><p class="linieBottom"><strong><?php echo $_smarty_tpl->getVariable('data')->value['COMPANY'];?>
</strong><?php if ($_smarty_tpl->getVariable('data')->value['POSITION']!=''){?> as <strong><?php echo $_smarty_tpl->getVariable('data')->value['POSITION'];?>
</strong><?php }?></p><?php }?>
			<?php }else{ ?>
			<?php if ($_smarty_tpl->getVariable('data')->value['COMPANY']!=''){?><h2 class="linieBottom myproH2"><?php echo $_smarty_tpl->getVariable('data')->value['COMPANY'];?>
</h2>
			<?php if ($_smarty_tpl->getVariable('data')->value['POSITION']!=''){?><p class="linieBottom"> as <strong><?php echo $_smarty_tpl->getVariable('data')->value['POSITION'];?>
</strong></p><?php }?>
			<?php }?>
			<?php }?>
			<p class="linieBottom"><strong>
			<?php if ($_smarty_tpl->getVariable('data')->value['STREET']!=''){?><?php echo $_smarty_tpl->getVariable('data')->value['STREET'];?>
, <?php }?><?php if ($_smarty_tpl->getVariable('data')->value['ZIP']!=''){?><?php echo $_smarty_tpl->getVariable('data')->value['ZIP'];?>
, <?php }?><?php if ($_smarty_tpl->getVariable('data')->value['CITY']!=''){?><?php echo $_smarty_tpl->getVariable('data')->value['CITY'];?>
 - <?php }?><?php echo $_smarty_tpl->getVariable('data')->value['COUNTRY'];?>

			</strong></p>
			
			<?php if (count($_smarty_tpl->getVariable('data')->value['CREDITS'])>0){?>
			<div class="linieBottom" style="margin-bottom: 10px;">
			    <ul class="credits">
			    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['CREDITS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			        <li class="<?php echo $_smarty_tpl->tpl_vars['v']->value['act_class'];?>
<?php if ($_smarty_tpl->tpl_vars['k']->value==0){?> first<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['act_description'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['COUNT'];?>
</li>
			    <?php }} ?>
			    </ul>
    			<span class="clearer"></span>
			</div>
			<?php }?>
			<?php if ($_smarty_tpl->getVariable('data')->value['Twitter']!=''||$_smarty_tpl->getVariable('data')->value['Vimeo']||''&&$_smarty_tpl->getVariable('data')->value['Facebook']||''&&$_smarty_tpl->getVariable('data')->value['Flickr']||''&&$_smarty_tpl->getVariable('data')->value['Linkedin']||''&&$_smarty_tpl->getVariable('data')->value['Youtube']!=''){?>
			<div class="linieBottom otw">								
				<p>On the Web</p>
				<ul>
					<?php if ($_smarty_tpl->getVariable('data')->value['Twitter']!=''){?><li><a title="Twitter" class="twit" href="<?php echo $_smarty_tpl->getVariable('data')->value['Twitter'];?>
" target="_blank">Twitter</a></li><?php }?>
					<?php if ($_smarty_tpl->getVariable('data')->value['Vimeo']!=''){?><li><a title="Vimeo" class="vimeo" href="<?php echo $_smarty_tpl->getVariable('data')->value['Vimeo'];?>
" target="_blank">Vimeo</a></li><?php }?>
					<?php if ($_smarty_tpl->getVariable('data')->value['Facebook']!=''){?><li><a title="Facebook" class="face" href="<?php echo $_smarty_tpl->getVariable('data')->value['Facebook'];?>
" target="_blank">Facebook</a></li><?php }?>
					<?php if ($_smarty_tpl->getVariable('data')->value['Flickr']!=''){?><li><a title="Flickr" class="flickr" href="<?php echo $_smarty_tpl->getVariable('data')->value['Flickr'];?>
" target="_blank">Flickr</a></li><?php }?>
					<?php if ($_smarty_tpl->getVariable('data')->value['Linkedin']!=''){?><li><a title="LinkedIn" class="linked" href="<?php echo $_smarty_tpl->getVariable('data')->value['Linkedin'];?>
" target="_blank">LinkedIn</a></li><?php }?>
					<?php if ($_smarty_tpl->getVariable('data')->value['Youtube']!=''){?><li><a title="Youtube" class="youtube" href="<?php echo $_smarty_tpl->getVariable('data')->value['Youtube'];?>
" target="_blank">Youtube</a></li><?php }?>
				</ul>
				<div class="clearer"></div>
			</div>
			<?php }?>
			<div class="clearer"></div>
			<?php if ($_smarty_tpl->getVariable('data')->value['EMAIL']!=''){?><p class="linieBottom"><a href="mailto:<?php echo $_smarty_tpl->getVariable('data')->value['EMAIL'];?>
"><strong><?php echo $_smarty_tpl->getVariable('data')->value['EMAIL'];?>
</strong></a></p><?php }?>
			<?php if ($_smarty_tpl->getVariable('data')->value['TEL']!=''){?><p class="linieBottom"><strong>t <?php echo $_smarty_tpl->getVariable('data')->value['TEL'];?>
</strong></p><?php }?>
			<?php if ($_smarty_tpl->getVariable('data')->value['FAX']!=''){?><p class="linieBottom"><strong>f <?php echo $_smarty_tpl->getVariable('data')->value['FAX'];?>
</strong></p><?php }?>
			<?php if ($_smarty_tpl->getVariable('data')->value['URL']!=''){?><p class="linieBottom"><a href="http://<?php echo $_smarty_tpl->getVariable('data')->value['URL'];?>
" target="_blank"><strong><?php echo $_smarty_tpl->getVariable('data')->value['URL'];?>
</strong></a></p><?php }?>
			<!--<p class="linieBottom"><strong>y&amp;r Brazil, lew lara tbwa...</strong></p>-->
		</div>
		<div class="col-sm-4">
			<p class="p-edit-but" style="border-bottom: 0px;"><a class="but" href="<?php echo smarty_function_xr_genlink(array('p_id'=>106),$_smarty_tpl);?>
">Edit my public profile</a></p>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<br>
			<ul class="nav nav-pills p-woche">
				<?php if (count($_smarty_tpl->getVariable('work')->value['ITEMS'])>0){?>
				<li class="active"><a data-toggle="tab" href="#tab-work">Work in Archive</a></li>
				<?php }?>
				<?php if ((strpos($_smarty_tpl->getVariable('beyond')->value,'col-sm-4'))){?>
				<li><a data-toggle="tab" href="#tab-beyond">Beyond in Archive</a></li>
				<?php }?>
			</ul>
		</div>
	</div>
	<div class="tab-content">
	    <?php if (count($_smarty_tpl->getVariable('work')->value['ITEMS'])>0){?>
		<div id="tab-work" class="tab-pane active">
			
			<div class="row">
			    
			    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('work')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			    
			        <div class="col-sm-4">
            		
    					<div class="lw-item"> 
    						<h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h3>
    						<p><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['IMG']==0){?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270410,'w'=>698,'h'=>416,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>698,'h'=>416,'rmode'=>"cco",'var'=>"thumb"),$_smarty_tpl);?>
<img class="lazy img-responsive" with="698" height="416" data-original="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
"><?php }?></a></p>
    						
    						<p><strong>Published in:</strong> Lürzer's Archive 3/2012</p>
    					</div>
            			
            			
            		</div>
			    
			    <?php }} ?>
			    
			    
			</div>
			
		
			
		</div>
		<?php }?>
		<?php if (count($_smarty_tpl->getVariable('beyond')->value['ITEMS'])>0){?>
		<div id="tab-beyond" class="tab-pane">
			
			<?php echo $_smarty_tpl->getVariable('beyond')->value;?>

			
		</div>
		<?php }?>
	</div>
    
	
	