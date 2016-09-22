<?php /* Smarty version Smarty-3.0.7, created on 2014-07-24 19:42:29
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/593.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:194440289153d14585cd90e7-89555857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8fdfa50a0ec80ee05df3debf8ccc1ab1b940803' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/593.cache.html',
      1 => 1406223749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194440289153d14585cd90e7-89555857',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?>	<div class="row">
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('am')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                   
                    <div class="col-sm-4<?php if ($_smarty_tpl->tpl_vars['k']->value>29){?> loadMore<?php }?>"<?php if ($_smarty_tpl->tpl_vars['k']->value>29){?> style="display:none;"<?php }?>>
                        
                        <h3 class="nowra<?php if ($_smarty_tpl->tpl_vars['v']->value['ARCHIV_NR']!=''){?> marginBottom0<?php }?>"><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
&nbsp;</h3>
                        <span class="quick-archiv-nr"><?php echo $_smarty_tpl->tpl_vars['v']->value['ARCHIV_NR'];?>
 / <?php echo $_smarty_tpl->tpl_vars['v']->value['CATEGORY'];?>
</span>
    					<div class="lw-item"> 
    						<p><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['IMG']==0){?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270410,'w'=>349,'h'=>208,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>698,'h'=>416,'rmode'=>"cco",'q'=>85,'var'=>"thumb"),$_smarty_tpl);?>
<img class="lazy img-responsive" with="698" height="416" src="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
"><?php }?></a></p>
    						<!--<p><a title="Gefällt mir" class="like ilikeit" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['ID'];?>
" data-type="MEDIA" href="#">Gefällt mir</a><span class="likeCount"><?php echo $_smarty_tpl->tpl_vars['v']->value['LIKES'];?>
</span></p>-->
    					<div class="share">
    						
    					</div>
    					<div class="clearer"></div>
    					</div>
    			    </div>
                    
            <?php }} ?>
            </div>