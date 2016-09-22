<?php /* Smarty version Smarty-3.0.7, created on 2014-07-28 14:25:00
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/607.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:85143929753d6411cbe8ca2-70105273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20191440663d5340866d5d94e089ad7d46b82cd3' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/607.cache.html',
      1 => 1406550300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85143929753d6411cbe8ca2-70105273',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?>

<?php if ($_smarty_tpl->getVariable('result_cnt')->value==0){?>

    <div class="col-sm-12">
         <h2 style="border-bottom: 0px !important;"><span class="resultsnumber">NO RESULTS...</span></h2>
    </div>

<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['anzahl'] = new Smarty_variable(count($_smarty_tpl->getVariable('result')->value), null, null);?>
    
    
    <div class="col-sm-12 designerprofilesearch-content">
    
        
                <h2><span class="resultsnumber">Results: <?php echo $_smarty_tpl->getVariable('result_cnt')->value;?>
</span></h2>
                
                <?php if (array_key_exists('PROFILES',$_smarty_tpl->getVariable('result')->value)){?>
                
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value['PROFILES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
            	        <h3 class="nowra"><?php if ($_smarty_tpl->tpl_vars['v']->value['TITLE']!=" "){?><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
<?php }else{ ?>a<?php echo $_smarty_tpl->tpl_vars['v']->value['COMPANY'];?>
<?php }?>&nbsp;</h3>
            	        <span class="quick-archiv-nr"><?php if ($_smarty_tpl->tpl_vars['v']->value['CONTACTTYPE']!=''){?><?php echo $_smarty_tpl->tpl_vars['v']->value['CONTACTTYPE'];?>
 - <?php }?><?php if ($_smarty_tpl->tpl_vars['v']->value['CITY']!=''){?><?php echo $_smarty_tpl->tpl_vars['v']->value['CITY'];?>
 <?php }?><?php if ($_smarty_tpl->tpl_vars['v']->value['COUNTRY']!=''){?><?php echo $_smarty_tpl->tpl_vars['v']->value['COUNTRY'];?>
<?php }?></span>
            		    <p><a target="_self" href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
">
            		    <?php if ($_smarty_tpl->tpl_vars['v']->value['IMG']!=0){?>
            		        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>300,'h'=>450,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>

            		        <?php }else{ ?>
            		        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>614973,'w'=>300,'h'=>450,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>

            		        <?php }?>
            		    </a></p>
            	    </div>
            
            	<?php }} ?>
    	        </div>
                        
                    
                <?php }else{ ?>
                <div class="row">
                    <div class="col-sm-12">
                         NO RECORDS
                    </div>
                </div>
                <?php }?>
       
        
    </div>
    
<?php }?>

<script>
$(document).ready(function(){
	
	$('#profilesearchSubmit').html('OK');
	$('#profilesearch_loader').hide();

});
</script>