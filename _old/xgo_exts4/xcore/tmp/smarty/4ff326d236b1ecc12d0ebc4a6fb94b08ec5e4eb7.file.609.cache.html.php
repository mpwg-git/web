<?php /* Smarty version Smarty-3.0.7, created on 2014-07-25 11:22:01
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/609.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:101809505553d221b93cf9d6-90205381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ff326d236b1ecc12d0ebc4a6fb94b08ec5e4eb7' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/609.cache.html',
      1 => 1406280121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101809505553d221b93cf9d6-90205381',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?>
    
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['count']['index']=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['count']['index']++;
?>
                
            
                <?php if ((!($_smarty_tpl->getVariable('smarty')->value['foreach']['count']['index'] % 4))){?>
                    <?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['count']['index']!=0)){?>
                      
                        </div>
                        
                    	<div class="row">
                    		<div class="col-sm-12">
                    		<hr>
                    		</div>
                    	</div>
                    <?php }?>
                    <div class="row">
                      
                <?php }?>
            
        	    <div class="col-sm-3 profiles-container">
        	        <h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h3>
        	        <span class="quick-archiv-nr"><?php echo $_smarty_tpl->tpl_vars['v']->value['TYPE'];?>
</span>
        		    <p><a target="_self" href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
">
        		    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>300,'h'=>400,'rmode'=>"cco",'q'=>85,'var'=>"thumb"),$_smarty_tpl);?>

        		    <img class="lazy img-responsive" with="300" height="400" src="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
">
        		    </a></p>
        	    </div>
        
        	<?php }} ?>
       	
