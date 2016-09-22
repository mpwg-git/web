<?php /* Smarty version Smarty-3.0.7, created on 2014-08-12 20:31:49
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/522.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:26372690353ea5d9552d180-78448056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f80c5ee89da34cf83de8a34ca6854f6c6698c3f' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/522.cache.html',
      1 => 1407868309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26372690353ea5d9552d180-78448056',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_beyond_archive::sc_get_all','var'=>'data'),$_smarty_tpl);?>


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
		    <h1>Beyond Archive</h1>
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
	
    	<div class="row">
    		<div class="col-sm-6">
    			<div class="row">
    				<div class="col-sm-7">
    					<div class="lw-item"> 
    						<h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h3>
    						<p><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['IMG']==0){?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270410,'w'=>302,'h'=>302,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>604,'h'=>604,'rmode'=>"cco",'var'=>"thumb"),$_smarty_tpl);?>
<img class="lazy img-responsive" with="604" height="604" data-original="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
"><?php }?></a></p>
    						<br>
    						<p><strong>Published in:</strong> </p>
    					</div>
    				</div>
    				<div class="col-sm-5">
    					<p></p><p><?php echo $_smarty_tpl->tpl_vars['v']->value['TEXT'];?>
</p>
    				</div>
    			</div>
    		</div>
    		<div class="col-sm-6">
    			
    		</div>
    	</div>
    	
    	<hr />
    	
    <?php }} ?>
	
	<div class="row">
		<div class="col-sm-12">
			<p><a class="but" href="#">More</a></p>
		</div>
	</div>
