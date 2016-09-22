<?php /* Smarty version Smarty-3.0.7, created on 2014-07-28 14:25:04
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/600.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:122261050653d641207cc122-53550659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f93ee9f50c80533df477522cd076886a6f0498c' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/600.cache.html',
      1 => 1406550304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122261050653d641207cc122-53550659',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('beyond')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    				<div class="col-sm-4">
    					<div class="lw-item"> 
    						<h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
&nbsp;</h3>
    						<p><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['IMG']==0){?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>632588,'w'=>349,'h'=>208,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>698,'h'=>416,'rmode'=>"cco",'q'=>85,'var'=>"thumb"),$_smarty_tpl);?>
<img class="img-responsive" with="698" height="416" src="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
"><?php }?></a></p>
    						<!--<p><a title="Gefällt mir" class="like" href="#">Gefällt mir</a><span class="likeCount">5</span></p>-->
    						
    						<div class="clearer"></div>
    					</div>
    				</div>
				<?php }} ?>