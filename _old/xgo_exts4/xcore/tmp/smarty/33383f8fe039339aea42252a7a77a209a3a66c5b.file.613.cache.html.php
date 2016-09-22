<?php /* Smarty version Smarty-3.0.7, created on 2014-08-08 12:17:03
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/613.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:143783629853e4a39f4cb461-00368911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33383f8fe039339aea42252a7a77a209a3a66c5b' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/613.cache.html',
      1 => 1407493023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143783629853e4a39f4cb461-00368911',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?>
					<div id='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['div_id'];?>
'>
					
					<div class='row'>
					    <div class="col-sm-12">
					
				            <?php if (($_smarty_tpl->getVariable('v')->value['TYPE']=='PRINT'||$_smarty_tpl->getVariable('v')->value['TYPE']=='VIDEOS'||$_smarty_tpl->getVariable('v')->value['TYPE']=='DIGITAL')&&($_smarty_tpl->getVariable('v')->value['COUNT']>0)){?>
					
				            <ul class="sort-order">
				                <li<?php if ($_smarty_tpl->getVariable('v')->value['ORDERBY']=='published'){?> class="active<?php if ($_smarty_tpl->getVariable('v')->value['ORDERBYDIR']=='desc'){?> asc<?php }else{ ?> desc<?php }?>"<?php }?>><a href="#" data-sort="published" data-sortdir="<?php if ($_smarty_tpl->getVariable('v')->value['ORDERBYDIR']=='desc'){?>asc<?php }else{ ?>desc<?php }?>">published</a></li>
    					        <li<?php if ($_smarty_tpl->getVariable('v')->value['ORDERBY']=='alphabetical'){?> class="active<?php if ($_smarty_tpl->getVariable('v')->value['ORDERBYDIR']=='desc'){?> asc<?php }else{ ?> desc<?php }?>"<?php }?>><a href="#" data-sort="alphabetical" data-sortdir="<?php if ($_smarty_tpl->getVariable('v')->value['ORDERBYDIR']=='desc'){?>asc<?php }else{ ?>desc<?php }?>">alphabetical</a></li>
    					        <li<?php if ($_smarty_tpl->getVariable('v')->value['ORDERBY']=='viewed'){?> class="active<?php if ($_smarty_tpl->getVariable('v')->value['ORDERBYDIR']=='desc'){?> asc<?php }else{ ?> desc<?php }?>"<?php }?>><a href="#" data-sort="viewed" data-sortdir="<?php if ($_smarty_tpl->getVariable('v')->value['ORDERBYDIR']=='desc'){?>asc<?php }else{ ?>desc<?php }?>">viewed</a></li>
    					        <li<?php if ($_smarty_tpl->getVariable('v')->value['ORDERBY']=='liked'){?> class="active<?php if ($_smarty_tpl->getVariable('v')->value['ORDERBYDIR']=='desc'){?> asc<?php }else{ ?> desc<?php }?>"<?php }?>><a href="#" data-sort="liked" data-sortdir="<?php if ($_smarty_tpl->getVariable('v')->value['ORDERBYDIR']=='desc'){?>asc<?php }else{ ?>desc<?php }?>">liked</a></li>
    					    </ul>
					        <hr />
					        <?php }?>
					
        					<div id="tab-<?php echo $_smarty_tpl->getVariable('k')->value;?>
_data_block">
        					
        						<div class="row">
        						<?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['ik'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('v')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value){
 $_smarty_tpl->tpl_vars['ik']->value = $_smarty_tpl->tpl_vars['record']->key;
?>
        					        <?php echo smarty_function_xr_atom(array('a_id'=>530,'type'=>$_smarty_tpl->getVariable('v')->value['TYPE'],'label'=>$_smarty_tpl->getVariable('v')->value['LABEL'],'record'=>$_smarty_tpl->tpl_vars['record']->value,'return'=>1),$_smarty_tpl);?>

                                <?php }} ?>
                                 </div>
                            </div>
                    
                    

                            <!--                        
                        	<div class="row">
            		            <div class="col-sm-12">
            			            <br>
            			            <p><a class="but searchButtonLoadMore" href="#" data-pos='0' data-type='<?php echo $_smarty_tpl->getVariable('v')->value['TYPE'];?>
' data-query='<?php echo $_smarty_tpl->getVariable('query')->value;?>
' data-div='tab-<?php echo $_smarty_tpl->getVariable('k')->value;?>
_data_block'>More</a></p>
            		            </div>
            	            </div>
                            -->
                        </div>
                    </div>
                    <div class="row">
                    
                        <div class="col-sm-12">
                    
                    
                            <?php if (($_smarty_tpl->getVariable('v')->value['pager']['show'])){?>
                            
                            <!--- pagination  search start --->
		
			                    <div class="row">
			                      <div class="col-sm-12">  
                                    <div class="pagination-wrapper">
                                        <ul class="pagination pagination-box fe_pager">
                        
                                            <li><a href="#" data-pager='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['pager'];?>
' data-pager-pos='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['prev'];?>
' data-pager-div='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['div_id'];?>
' data-pager-cnt='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['cnt'];?>
' data-pager-params='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['params'];?>
'>&laquo;</a></li>
                                            
                        
                                            
                                            
                                            <?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('v')->value['pager']['buttons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value){
?>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['b']->value==$_smarty_tpl->getVariable('v')->value['pager']['pos']){?>active<?php }?>"><a href="#" data-pager='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['pager'];?>
' data-pager-pos='<?php echo $_smarty_tpl->tpl_vars['b']->value;?>
' data-pager-div='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['div_id'];?>
' data-pager-cnt='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['cnt'];?>
' data-pager-params='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['params'];?>
'><?php echo $_smarty_tpl->tpl_vars['b']->value+1;?>
</a></li>
                                            <?php }} ?>
                                            
                                            
                                            
                                            
                                            <li><a href="#" data-pager='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['pager'];?>
' data-pager-pos='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['next'];?>
' data-pager-div='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['div_id'];?>
' data-pager-cnt='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['cnt'];?>
' data-pager-params='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['params'];?>
'>&raquo;</a></li>
                                            
                                            
                                            
                                            
                                        </ul>
                                        
                                        <div class="pagernumberswrapper">
                                        <div class="btn-group number-items-dropdown fe_pager_cnt">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->getVariable('v')->value['pager']['cnt'];?>
 <span class="caret"></span></button>
                                            <ul class="dropdown-menu" role="menu">
                                                
                                                <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('v')->value['pager']['limits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value){
?>
                                                <li><a href="#" data-cnt='<?php echo $_smarty_tpl->tpl_vars['l']->value;?>
' data-pager='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['pager'];?>
' data-div='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['div_id'];?>
' data-pager-params='<?php echo $_smarty_tpl->getVariable('v')->value['pager']['params'];?>
'><?php echo $_smarty_tpl->tpl_vars['l']->value;?>
</a></li>
                                                <?php }} ?>
                                                
                                            </ul>
                                        </div>
                                        <div class="number-per-page">Items per page:</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>                      
                            <!--- pagination end --->
                            
                         <?php }?>
                         
                         </div>
                         
                         
                    </div>
                    </div> <!-- PAGER DIV END --> 
                    
                    <script type="text/javascript">
                        $(document).ready(function(){
                            fe_search.handleSortButtons();
                        });
                    </script>
                    
                    