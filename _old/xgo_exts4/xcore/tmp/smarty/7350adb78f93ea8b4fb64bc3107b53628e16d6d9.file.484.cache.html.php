<?php /* Smarty version Smarty-3.0.7, created on 2014-12-19 08:52:11
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/484.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:240831105493e73bc2f691-68701982%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7350adb78f93ea8b4fb64bc3107b53628e16d6d9' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/484.cache.html',
      1 => 1418979130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '240831105493e73bc2f691-68701982',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_details','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_work_detailed','var'=>'work'),$_smarty_tpl);?>



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
		    <h1>My Archive</h1>
		    
		    <ul class="nav nav-pills p-woche">
				<li class="active"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>38),$_smarty_tpl);?>
">My Campaigns</a></li>
				<?php if ($_smarty_tpl->getVariable('data')->value['BEYONDARCHIVE']>0){?><li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>40),$_smarty_tpl);?>
">Beyond Archive</a></li><?php }?>
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>41),$_smarty_tpl);?>
">My Submissions</a></li>
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>42),$_smarty_tpl);?>
">My Favorites</a></li>
			</ul>
		
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
		    <div class="submnavcontainer">
			    <p><a class="but" href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
">Submit New</a></p>
			</div>
			<hr>
		</div>
	</div>
	<div class="row">
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('work')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
	
	
    		<div class="col-sm-6">
    			<div class="row">
    				<div class="col-sm-7">
    					<div class="lw-item"> 
    						<h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h3>
    						<p><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['IMG']==0){?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270410,'w'=>302,'h'=>302,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>605,'h'=>605,'rmode'=>"cco",'var'=>"thumb"),$_smarty_tpl);?>
<img class="lazy img-responsive" with="604" height="604" data-original="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
"><?php }?></a></p>
    						<br>
    						<p><strong>Published in:</strong> <?php echo $_smarty_tpl->tpl_vars['v']->value['MAGAZINNAME'];?>
</p>
    					</div>
    				</div>
    				<div class="col-sm-5">
    					<ul class="credits">
    					
    					    <?php  $_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['CREDITS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v2']->key => $_smarty_tpl->tpl_vars['v2']->value){
 $_smarty_tpl->tpl_vars['k2']->value = $_smarty_tpl->tpl_vars['v2']->key;
?>
    					    <?php if (!empty($_smarty_tpl->tpl_vars['v2']->value['CREDITS'])){?>
    					    <li class="<?php echo $_smarty_tpl->tpl_vars['v2']->value['act_class'];?>
"><?php  $_smarty_tpl->tpl_vars['v3'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k3'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v2']->value['CREDITS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v3']->key => $_smarty_tpl->tpl_vars['v3']->value){
 $_smarty_tpl->tpl_vars['k3']->value = $_smarty_tpl->tpl_vars['v3']->key;
?><?php if ($_smarty_tpl->tpl_vars['k3']->value>0){?>,
    						        <?php }?>
    						        <a href="<?php echo $_smarty_tpl->tpl_vars['v3']->value['PROFILELINK'];?>
"><?php if (($_smarty_tpl->tpl_vars['v3']->value['NAME']!='')){?><?php echo $_smarty_tpl->tpl_vars['v3']->value['NAME'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['v3']->value['BACKUPNAME'];?>
<?php }?></a>
    						    <?php }} ?>
    						    </li>
    						  <?php }?>
    						<?php }} ?>
    					</ul>
    				</div>
    			</div>
    		</div>
    		<?php if ($_smarty_tpl->tpl_vars['k']->value>0&&($_smarty_tpl->tpl_vars['k']->value+1)%2==0){?>
    		<div class="clearer"></div>
    		<hr />
    		<?php }?>
    <?php }} ?>
	</div>


	<?php if (count($_smarty_tpl->getVariable('work')->value['ITEMS'])==0){?>
	<div class="row">
		<div class="col-sm-12">
			<p class="bigger">Sorry, nothing published of your work...</p>
		</div>
	</div>
	<?php }?>

	

	
	