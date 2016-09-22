<?php /* Smarty version Smarty-3.0.7, created on 2014-07-24 19:45:21
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/610.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:30421543053d146316769d9-28322381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9bb8c16d9f38bb06a9204c44b7cac6c549a7f859' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/610.cache.html',
      1 => 1406223921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30421543053d146316769d9-28322381',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?>
 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('favorites')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    		<div class="col-sm-4" id="delete-my-favorite-<?php echo $_smarty_tpl->tpl_vars['v']->value['ID'];?>
">
    			<div class="lw-item"> 
    				<h3 class="nowra"><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
&nbsp;<span class="quick-archiv-nr pull-right"><?php if ($_smarty_tpl->tpl_vars['v']->value['TYPE']==1){?>Print<?php }elseif($_smarty_tpl->tpl_vars['v']->value['TYPE']==2){?>Film<?php }elseif($_smarty_tpl->tpl_vars['v']->value['TYPE']==3){?>Students<?php }elseif($_smarty_tpl->tpl_vars['v']->value['TYPE']==4){?>Web<?php }elseif($_smarty_tpl->tpl_vars['v']->value['TYPE']==5){?>App<?php }?></span></h3>
    				<p class="labelpic"><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>349,'h'=>208,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
    				<p><a href="#" class="but delete-my-favorite" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['ID'];?>
">delete</a></p>
    			</div>
    		</div>
    		
    	
    	<?php }} ?>