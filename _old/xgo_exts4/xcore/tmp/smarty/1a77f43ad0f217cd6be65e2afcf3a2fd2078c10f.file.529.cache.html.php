<?php /* Smarty version Smarty-3.0.7, created on 2014-07-24 19:33:53
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/529.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:96143104953d143818a12e7-12107165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a77f43ad0f217cd6be65e2afcf3a2fd2078c10f' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/529.cache.html',
      1 => 1406223233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96143104953d143818a12e7-12107165',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?>	
	
	<div class="row">
			<div class="col-sm-12" id="filter-section-result">
				<ul class="nav nav-pills p-woche">
				
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				
					<li class='searchTab'><a data-toggle="tab" class="searchtabslinks" href="#tab-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['LABEL'];?>
 <b>(<?php echo $_smarty_tpl->tpl_vars['v']->value['COUNT'];?>
)</b></a></li>
					
				<?php }} ?>
					
				</ul>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="tab-content tab-content-search">

				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
					
					<div id="tab-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tab-pane active">
					
					
					<div id='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['div_id'];?>
'>
					
					<div class="col-sm-12">
					<div class='row'>
					
					        <?php if (($_smarty_tpl->tpl_vars['k']->value=='PRINT'||$_smarty_tpl->tpl_vars['k']->value=='VIDEOS'||$_smarty_tpl->tpl_vars['k']->value=='DIGITAL')&&($_smarty_tpl->tpl_vars['v']->value['COUNT']>0)){?>
					
				            <ul class="sort-order">
				                <li<?php if ($_smarty_tpl->tpl_vars['v']->value['ORDERBY']=='published'){?> class="active<?php if ($_smarty_tpl->tpl_vars['v']->value['ORDERBYDIR']=='desc'){?> asc<?php }else{ ?> desc<?php }?>"<?php }?>><a href="#" data-sort="published" data-sortdir="<?php if ($_smarty_tpl->tpl_vars['v']->value['ORDERBYDIR']=='desc'){?>asc<?php }else{ ?>desc<?php }?>">published</a></li>
    					        <li<?php if ($_smarty_tpl->tpl_vars['v']->value['ORDERBY']=='alphabetical'){?> class="active<?php if ($_smarty_tpl->tpl_vars['v']->value['ORDERBYDIR']=='desc'){?> asc<?php }else{ ?> desc<?php }?>"<?php }?>><a href="#" data-sort="alphabetical" data-sortdir="<?php if ($_smarty_tpl->tpl_vars['v']->value['ORDERBYDIR']=='desc'){?>asc<?php }else{ ?>desc<?php }?>">alphabetical</a></li>
    					        <li<?php if ($_smarty_tpl->tpl_vars['v']->value['ORDERBY']=='viewed'){?> class="active<?php if ($_smarty_tpl->tpl_vars['v']->value['ORDERBYDIR']=='desc'){?> asc<?php }else{ ?> desc<?php }?>"<?php }?>><a href="#" data-sort="viewed" data-sortdir="<?php if ($_smarty_tpl->tpl_vars['v']->value['ORDERBYDIR']=='desc'){?>asc<?php }else{ ?>desc<?php }?>">viewed</a></li>
    					        <li<?php if ($_smarty_tpl->tpl_vars['v']->value['ORDERBY']=='liked'){?> class="active<?php if ($_smarty_tpl->tpl_vars['v']->value['ORDERBYDIR']=='desc'){?> asc<?php }else{ ?> desc<?php }?>"<?php }?>><a href="#" data-sort="liked" data-sortdir="<?php if ($_smarty_tpl->tpl_vars['v']->value['ORDERBYDIR']=='desc'){?>asc<?php }else{ ?>desc<?php }?>">liked</a></li>
    					    </ul>
					        <hr />
					        <?php }?>
					    
        					<div id="tab-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_data_block">
        					
        						<div class="row">
        						<?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['ik'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value){
 $_smarty_tpl->tpl_vars['ik']->value = $_smarty_tpl->tpl_vars['record']->key;
?>
        					        <?php echo smarty_function_xr_atom(array('a_id'=>530,'type'=>$_smarty_tpl->tpl_vars['v']->value['TYPE'],'label'=>$_smarty_tpl->tpl_vars['v']->value['LABEL'],'record'=>$_smarty_tpl->tpl_vars['record']->value,'return'=>1),$_smarty_tpl);?>

                                <?php }} ?>
                                 </div>
                            </div>
                    
                    

                            <!--                        
                        	<div class="row">
            		            <div class="col-sm-12">
            			            <br>
            			            <p><a class="but searchButtonLoadMore" href="#" data-pos='0' data-type='<?php echo $_smarty_tpl->tpl_vars['v']->value['TYPE'];?>
' data-query='<?php echo $_smarty_tpl->getVariable('query')->value;?>
' data-div='tab-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_data_block'>More</a></p>
            		            </div>
            	            </div>
                            -->
                    </div>
                    </div>
                    
                    <div class='row'>
                    
                           
                    
                            <?php if (($_smarty_tpl->tpl_vars['v']->value['pager']['show'])){?>
                            
                            <!--- pagination start --->
		
			                    <div class="norow">
    			                    <div class="col-sm-12">
                                        <div class="pagination-wrapper">
                                            <ul class="pagination pagination-box fe_pager">
                            
                                                <li><a href="#" data-pager='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['pager'];?>
' data-pager-pos='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['prev'];?>
' data-pager-div='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['div_id'];?>
' data-pager-cnt='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['cnt'];?>
' data-pager-params='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['params'];?>
'>&laquo;</a></li>
                                                
                            
                                                
                                                
                                                <?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['pager']['buttons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value){
?>
                                                <li class="<?php if ($_smarty_tpl->tpl_vars['b']->value==$_smarty_tpl->tpl_vars['v']->value['pager']['pos']){?>active<?php }?>"><a href="#" data-pager='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['pager'];?>
' data-pager-pos='<?php echo $_smarty_tpl->tpl_vars['b']->value;?>
' data-pager-div='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['div_id'];?>
' data-pager-cnt='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['cnt'];?>
' data-pager-params='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['params'];?>
'><?php echo $_smarty_tpl->tpl_vars['b']->value+1;?>
</a></li>
                                                <?php }} ?>
                                                
                                                
                                                
                                                
                                                <li><a href="#" data-pager='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['pager'];?>
' data-pager-pos='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['next'];?>
' data-pager-div='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['div_id'];?>
' data-pager-cnt='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['cnt'];?>
' data-pager-params='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['params'];?>
'>&raquo;</a></li>
                                                
                                                
                                                
                                                
                                            </ul>
                                            
                                            <div class="pagernumberswrapper">
                                            <div class="btn-group number-items-dropdown fe_pager_cnt">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['cnt'];?>
 <span class="caret"></span></button>
                                                <ul class="dropdown-menu" role="menu">
                                                    
                                                    <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['pager']['limits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value){
?>
                                                    <li><a href="#" data-cnt='<?php echo $_smarty_tpl->tpl_vars['l']->value;?>
' data-pager='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['pager'];?>
' data-div='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['div_id'];?>
' data-pager-params='<?php echo $_smarty_tpl->tpl_vars['v']->value['pager']['params'];?>
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
                    </div> <!-- PAGER DIV END -->        
                        
					</div>
					
				<?php }} ?>
					
				</div>
			</div>
		</div>