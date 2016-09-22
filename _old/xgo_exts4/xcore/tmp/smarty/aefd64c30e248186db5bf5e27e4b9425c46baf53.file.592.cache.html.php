<?php /* Smarty version Smarty-3.0.7, created on 2014-12-19 15:09:33
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/592.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:191294091454943fad84bf08-38911086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aefd64c30e248186db5bf5e27e4b9425c46baf53' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/592.cache.html',
      1 => 1419001771,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191294091454943fad84bf08-38911086',
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
<?php }else{ ?><?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>702,'h'=>416,'rmode'=>"cco",'q'=>85,'var'=>"thumb"),$_smarty_tpl);?>
<img class="img-responsive" with="698" height="416" src="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
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