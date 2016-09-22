<?php /* Smarty version Smarty-3.0.7, created on 2014-07-25 09:58:45
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemZpZ8B" */ ?>
<?php /*%%SmartyHeaderCode:200891144953d20e3516a067-41753125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '955d370044995082e390a6ba4a30da7ef150583c' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemZpZ8B',
      1 => 1406275125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200891144953d20e3516a067-41753125',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?>
        <div class="row">
    		<div class="col-sm-12">
    			<br>
    			<ul class="nav nav-pills p-woche">
    				<?php if ((strpos($_smarty_tpl->getVariable('am')->value['print'],'col-sm-4'))){?><li class="active mytabs"><a data-toggle="tab" class="magazinetabslinks" href="#tab-print">Print</a></li><?php }?>
    				<?php if ((strpos($_smarty_tpl->getVariable('am')->value['commercials'],'col-sm-4'))){?><li class="mytabs"><a data-toggle="tab" class="magazinetabslinks" href="#tab-film">Film</a></li><?php }?>
    				<?php if ((strpos($_smarty_tpl->getVariable('am')->value['digital'],'col-sm-4'))){?><li class="mytabs"><a data-toggle="tab" class="magazinetabslinks" href="#tab-digital">Digital</a></li><?php }?>
    				<?php if ((strpos($_smarty_tpl->getVariable('am')->value['students'],'col-sm-4'))){?><li class="mytabs"><a data-toggle="tab" class="magazinetabslinks" href="#tab-students">Students</a></li><?php }?>
    			</ul>
    		</div>
    	</div>
    	
    	<div class="tab-content">
    	<?php echo smarty_function_xr_img(array('s_id'=>1182587,'w'=>698,'h'=>970,'rmode'=>"cco",'q'=>85,'var'=>"prethumb"),$_smarty_tpl);?>

    	
    <?php if ((strpos($_smarty_tpl->getVariable('am')->value['print'],'col-sm-4'))){?>
    <!-- print begin -->		
    
    
    		<div id="tab-print" class="tab-pane active">
            <div class="row lw-item">
                <div class="col-sm-12">
          
                      <?php echo $_smarty_tpl->getVariable('am')->value['print'];?>

    	
    	        </div>
    		</div>



    	
    	    </div>
    <!-- print begin -->	
    <?php }?>		
    	
     <?php if (($_REQUEST['debug']=='1')){?>
    
    <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('am')->value['commercials']),$_smarty_tpl);?>

   
    <?php }?>	
   
    	
    <?php if ((strpos($_smarty_tpl->getVariable('am')->value['commercials'],'col-sm-4'))){?>	
    <!-- commercials begin -->	
    		<div id="tab-film" class="tab-pane">
                <div class="row lw-item">
                    <div class="col-sm-12">

                        <?php echo $_smarty_tpl->getVariable('am')->value['commercials'];?>

                        
                    </div>
        		</div>
        
    	    </div>
    <!-- commercials end -->	
    <?php }?>	
    
    
   <?php if ((strpos($_smarty_tpl->getVariable('am')->value['digital'],'col-sm-4'))){?>
    <!-- digital begin -->	
    		<div id="tab-digital" class="tab-pane">
                <div class="row lw-item">
                    <div class="col-sm-12">
    	
    	                <?php echo $_smarty_tpl->getVariable('am')->value['digital'];?>

    	                
                    </div>
        		</div>
        	
    	
    	    </div>
    <!-- digital end -->	
    <?php }?>
    	
   <?php if ((strpos($_smarty_tpl->getVariable('am')->value['students'],'col-sm-4'))){?>
    <!-- students begin -->
    		<div id="tab-students" class="tab-pane">
                <div class="row">
    		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('am')->value['students']['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                   
                    <div class="col-sm-4<?php if ($_smarty_tpl->tpl_vars['k']->value>29){?> loadMore<?php }?>"<?php if ($_smarty_tpl->tpl_vars['k']->value>29){?> style="display:none;"<?php }?>>
                        
                        <h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h3>
    					<div class="lw-item"> 
    						<p><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['IMG']==0){?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270410,'w'=>349,'h'=>208,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>698,'h'=>416,'rmode'=>"cco",'q'=>85,'var'=>"thumb"),$_smarty_tpl);?>
<img class="lazy img-responsive" with="698" height="416" src="<?php echo $_smarty_tpl->getVariable('prethumb')->value['src'];?>
" data-original="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
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
    	        <div class="row">
            		<div class="col-sm-12">
            			<br>
            			<p><a class="but buttonLoadMore" href="#">More</a></p>
            		</div>
            	</div>
            	<!--- pagination --->
            	<div class="row">
            		<div class="col-sm-12">
                        <div class="pagination-wrapper">
                            <ul class="pagination pagination-box">
                                <li class="disabled"><a href="#">&laquo;</a></li>
                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul>
                            <div class="btn-group number-items-dropdown">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">50 <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">25</a></li>
                                    <li><a href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                </ul>
                            </div>
                            <div class="number-per-page">Items per page:</div>
                        </div>
                    </div>
                </div>
    		</div>
    
    <!-- students end -->
    <?php }?>	
    </div>
    <?php if (isset($_smarty_tpl->getVariable('REQUEST',null,true,false)->value['btab'])){?>
    <script>
        var breakertab = "<?php echo $_smarty_tpl->getVariable('REQUEST')->value['btab'];?>
";
    </script>
    <?php }?>