<?php /* Smarty version Smarty-3.0.7, created on 2014-08-12 23:23:28
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coden5o1ZN" */ ?>
<?php /*%%SmartyHeaderCode:116732828053ea85d044dd28-61678990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9751fe148b2e66655a201102e6f00f10d1336af' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coden5o1ZN',
      1 => 1407878608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116732828053ea85d044dd28-61678990',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_beyond_archive_detailed','var'=>'beyond'),$_smarty_tpl);?>


<?php echo smarty_function_xr_img(array('s_id'=>270410,'w'=>698,'h'=>416,'rmode'=>"cco",'q'=>85,'var'=>"prethumb"),$_smarty_tpl);?>

<div class="col-sm-12">
	<div class="row">
    <br />
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('beyond')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
	
    	
        	<div class="col-sm-6 marginBottom40">
        		<div class="row">
        			<div class="col-sm-7">
        				<div class="lw-item"> 
        					<p><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['IMG']==0){?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270410,'w'=>302,'h'=>302,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>604,'h'=>604,'rmode'=>"cco",'var'=>"thumb"),$_smarty_tpl);?>
<img class="lazy img-responsive" with="604" height="604" src="<?php echo $_smarty_tpl->getVariable('prethumb')->value['src'];?>
" data-original="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
"><?php }?></a></p>
        					<br>
                			<p><a class="but beyond-archive-edit-button" href="#" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['ID'];?>
">Edit</a> <a class="but beyond-archive-delete-button" href="#" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['ID'];?>
">Delete</a></p>
        				</div>
        			</div>
        			<div class="col-sm-5">
        			    <h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h3>
        				<p><?php echo $_smarty_tpl->tpl_vars['v']->value['TEXT'];?>
</p>
        			</div>
        		</div>
        	</div>
        	<?php if ($_smarty_tpl->tpl_vars['k']->value>0&&($_smarty_tpl->tpl_vars['k']->value+1)%2==0){?>
    		<div class="clearer"></div>
    		<?php }?>
    
    <?php }} ?>
	</div>

	<?php if (count($_smarty_tpl->getVariable('beyond')->value['ITEMS'])>0){?>
    <hr />
	<div class="row">
		<div class="col-sm-12">
			<!--<p><a class="but" href="#">More</a></p>-->
		</div>
	</div>
	<?php }else{ ?>

	<div class="row">
		<div class="col-sm-12">
			<p class="bigger">You have nothing uploaded yet...</p>
		</div>
	</div>
	<?php }?>
</div>