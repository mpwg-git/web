<?php /* Smarty version Smarty-3.0.7, created on 2014-07-24 19:45:21
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/488.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:135627675153d1463132f286-06431290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89133526cee7316a6b9867797768d28388c68757' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/488.cache.html',
      1 => 1406223921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135627675153d1463132f286-06431290',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_details','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_archive_media::sc_your_picks','var'=>'work'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_archive::sc_get_my_favorites','var'=>'favorites'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_archive::sc_get_my_favorites_lists','var'=>'favoriteslists'),$_smarty_tpl);?>


    <!-- logo row -->
	<?php echo smarty_function_xr_atom(array('a_id'=>459,'return'=>1),$_smarty_tpl);?>

	
	<!-- quicksearch -->
	<div class="row">
		<div class="col-sm-12">
	        <?php echo smarty_function_xr_atom(array('a_id'=>456,'return'=>1),$_smarty_tpl);?>

		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-9">
		    <div class="line-top"></div>
		    <h1>My Archive</h1>
		    
		    <ul class="nav nav-pills p-woche">
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>38),$_smarty_tpl);?>
">My Campaigns</a></li>
				<?php if ($_smarty_tpl->getVariable('data')->value['BEYONDARCHIVE']>0){?><li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>40),$_smarty_tpl);?>
">Beyond Archive</a></li><?php }?>
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>41),$_smarty_tpl);?>
">My Submissions</a></li>
				<li class="active"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>42),$_smarty_tpl);?>
">My Favorites</a></li>
			</ul>
		
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	
	 <div class="row">
		<div class="col-sm-12">
			<div class="favnavcontainer">
    			<select class="form-control sel combo_fav_lists" id="fav_lists">
        			<option value="/en/my-favorites.html">Choose List</option>
        			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('favoriteslists')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        		    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['URL'];?>
" 
        		    <?php if (($_REQUEST['list_id']==$_smarty_tpl->tpl_vars['v']->value['ID'])){?>
        		    selected
        		    <?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['NAME'];?>
</option>
        		    <?php }} ?>
    		    </select>
			    <a class="but" href="" data-target="#modal-fav-createlist" data-toggle="modal">Create new List</a> 
			    
                <?php if (count($_smarty_tpl->getVariable('favoriteslists')->value)>0){?>			    
			    <a class="but" href="" data-target="#modal-fav-deletelist" data-toggle="modal">Delete List</a>
			    <?php }?>
			</div>
			<hr>
		</div>
	</div>
	

	<div class="row">
	    <div class="col-sm-12">
	    
	    <?php if ((strpos($_smarty_tpl->getVariable('favorites')->value,'col-sm-4'))){?>

	         <?php echo $_smarty_tpl->getVariable('favorites')->value;?>

	         
	    <?php }else{ ?>
            
            No Favorites exist in this list.	    
	    
	    <?php }?>
		</div>
	</div>
		
</div>




<div id="modal-fav-createlist" class="modal">
	<div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-body">
        	    <form id="FAV_FORM_CREATE">
    				<div class="form-group">
    				    <h3>Create Favorites List</h3>
    					<label for="inputListname">List Name</label>
    					<input type="email" placeholder="Enter List Name" id="inputListname" name="inputListname" class="form-control">
    				</div>
    				<button class="but" id="FAV_FORM_CREATE_BUTTON">Create</button>  <button type="button" class="but" data-dismiss="modal" id="FAV_FORM_CLOSE_BUTTON">Close</button>
    				<div class="form-group">
    					<p id="FAV_FORM_CREATE_RESULT" class="favlistformresult"></p>
    				</div>
		    	</form>
        	   
    	    </div>
    	</div>
	</div>    
</div>


<div id="modal-fav-deletelist" class="modal">
	<div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-body">
        	    <form id="FAV_FORM_CREATE">
    				<div class="form-group">
    				    <h3>Delete Favorites List</h3>
                			<p>
                			<select class="form-control sel combo_fav_lists nofloat" id="fav_lists_del">
                    			<option value="-1">Choose List</option>
                    			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('favoriteslists')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    		    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['NAME'];?>
</option>
                    		    <?php }} ?>
                		    </select>
                		    </p>
    				<button class="but" id="FAV_FORM_DELETE_BUTTON">Delete</button>  <button type="button" class="but" data-dismiss="modal" id="FAV_FORM_CLOSE_BUTTON">Close</button>
    				</div>
		    	</form>
        	   
    	    </div>
    	</div>
	</div>    
</div>
	