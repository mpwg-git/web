<?php /* Smarty version Smarty-3.0.7, created on 2014-08-05 12:34:24
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/490.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:144988228953e0b330881280-72848155%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a4bbba4787f38fe14f1db342b9f515b30b7affa' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/490.cache.html',
      1 => 1407234864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144988228953e0b330881280-72848155',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_archive_media::sc_get_dropdowns','var'=>'dropdowns'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_archive_media::sc_your_picks_new','var'=>'work'),$_smarty_tpl);?>



    <!-- logo row -->
	<?php echo smarty_function_xr_atom(array('a_id'=>459,'return'=>1),$_smarty_tpl);?>

	
	<!-- quicksearch -->
	<div class="row">
		<div class="col-sm-9">
	        <?php echo smarty_function_xr_atom(array('a_id'=>456,'return'=>1),$_smarty_tpl);?>

		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-9">
		    <div class="line-top"></div>
		    <h1>Your Picks</h1>
		    
		    <form class="issue-suche">
				<div class="form-group">
					<select class="form-control sel" id="your-picks-countries-filter">
					    <option value="0">International</option>
					    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dropdowns')->value['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    				    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['ac_id'];?>
"<?php if ($_smarty_tpl->getVariable('dropdowns')->value['yourpicks_country']==$_smarty_tpl->tpl_vars['v']->value['ac_id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['ac_name'];?>
</option>
    				    <?php }} ?>
					</select>
					<select class="form-control sel" id="your-picks-types-filter">
						<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dropdowns')->value['types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    				    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
"<?php if ($_smarty_tpl->getVariable('dropdowns')->value['yourpicks_type']==$_smarty_tpl->tpl_vars['v']->value['id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
    				    <?php }} ?>
					</select>
				
					<div id="fe_core_loader" style="display: none;"> </div>
				
					<div class="clearer"></div>
				</div>
			</form>
		    
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div class="row" id="pick-container">
	    <div class="col-sm-12">
    	    <div>
    	
    	
    	    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('work')->value['data']['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['count']['index']=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['count']['index']++;
?>
                    
                        <?php if ((!($_smarty_tpl->getVariable('smarty')->value['foreach']['count']['index'] % 3))){?>
                            <?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['count']['index']!=0)){?>
                                </div>
                            <?php }?>
                            <div class="row">
                        <?php }?>
                        
                        <div class="col-sm-4">
                			<div class="lw-item"> 
                				<h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h3>
                				<span class="quick-archiv-nr"><?php echo $_smarty_tpl->tpl_vars['v']->value['ARCHIV_NR'];?>
 / <?php echo $_smarty_tpl->tpl_vars['v']->value['CATEGORY'];?>
&nbsp;</span>
                				<p class="labelpic"><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>500,'h'=>350,'rmode'=>'cco','class'=>"img-responsive rsImg"),$_smarty_tpl);?>
<span class="ranking"><span class="nr"><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['count']['index']+1;?>
</span></span></a></p>
                				<!--<p><a title="Gefällt mir" class="like ilikeit" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['ID'];?>
" data-type="MEDIA" href="#">Gefällt mir</a><span class="likeCount"><?php echo $_smarty_tpl->tpl_vars['v']->value['LIKES'];?>
</span></p>-->
                			
                				<div class="clearer"></div>
                			</div>
                		</div>  
                <?php }} ?>
    	
    	    </div>
    	   </div>
	</div>
	

	
	