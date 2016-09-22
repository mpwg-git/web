<?php /* Smarty version Smarty-3.0.7, created on 2015-01-13 13:36:21
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/475.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:165997976054b51145983965-20494030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aeef83301d97fdf59abb5820cdd078287dc994da' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/475.cache.html',
      1 => 1421152580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165997976054b51145983965-20494030',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_download')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_download.php';
?><?php if ($_smarty_tpl->getVariable('GA')->value['oeedit']==1){?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'oe_preview::sc_get_magazine','var'=>'data'),$_smarty_tpl);?>

<?php }else{ ?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_magazine::sc_get_detail_page','var'=>'data'),$_smarty_tpl);?>

<?php }?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_magazine::sc_get_media_all','var'=>'archive_media'),$_smarty_tpl);?>


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
            <!-- Magazine - Filter -->
		    
		    <form class="issue-suche">
            	<div class="form-group">
                    <div class="back-issues"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
" id="current_issue" style="font-weight: bold;">Current Issue</a></div>
            	    <div class="back-issues"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>55),$_smarty_tpl);?>
" id="back_issue">Back Issues</a></div>
                    <div class="back-issues"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>117),$_smarty_tpl);?>
" id="back_issue">Specials</a></div>
            		<div class="clearer"></div>
            	</div>
            </form>
		    
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div id="magazine_content_container">
    	<div class="row">
    	    <div class="col-sm-9">
    	        <h1><?php echo $_smarty_tpl->getVariable('data')->value['NAME'];?>
</h1>
    			
    			<ul class="nav nav-pills p-woche">
    				<li class="active"><a href="<?php echo $_smarty_tpl->getVariable('magazin')->value['LINK_MAGAZINE'];?>
">Featured Work</a></li>
    				<?php if ($_smarty_tpl->getVariable('data')->value['LINK_INTERVIEW']!=false){?>
    				<li><a href="<?php echo $_smarty_tpl->getVariable('data')->value['LINK_INTERVIEW'];?>
">Interview</a></li>
    				<?php }?>
    				<?php if ($_smarty_tpl->getVariable('data')->value['LINK_INTERVIEW_DIGITAL']!=false){?>
    				<li><a href="<?php echo $_smarty_tpl->getVariable('data')->value['LINK_INTERVIEW_DIGITAL'];?>
">Digital Interview</a></li>
    				<?php }?>
    			</ul>
    		
    	    </div>
    		<div class="col-sm-3"></div>
    	</div>
    	
        <?php echo smarty_function_xr_atom(array('a_id'=>672,'return'=>1),$_smarty_tpl);?>

        
         <div class="hidden-1400 visible-992 hidden-1400-on-mobile">
    	<?php echo smarty_function_xr_atom(array('a_id'=>671,'return'=>1),$_smarty_tpl);?>

        </div>
    	
        <div class="row">
    		<div class="col-sm-12 col-md-4">
    			<p><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'w'=>698,'class'=>"img-responsive"),$_smarty_tpl);?>
</p>								
    		</div>
    		<div class="col-sm-12 col-md-8">
    			<h2><?php echo $_smarty_tpl->getVariable('data')->value['NAME'];?>
</h2>
    			<div class="magazine-description">
    			<?php echo $_smarty_tpl->getVariable('data')->value['DESCRIPTION'];?>

    			</div>
    			<br>
    			<?php if ((count($_smarty_tpl->getVariable('data')->value['TRANSLATIONS'])>0)){?>
    			<p><strong>Translations</strong></p>
    			<form class="translation">
    				<div class="form-group">
    					<select class="form-control sel" id="select-translations">
        				     <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['TRANSLATIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        				       <?php if (($_smarty_tpl->tpl_vars['v']->value!=''&$_smarty_tpl->tpl_vars['v']->value!=0)){?>
                                <option value="<?php echo smarty_function_xr_download(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php if ($_smarty_tpl->tpl_vars['k']->value=='sp'){?>spanish<?php }elseif($_smarty_tpl->tpl_vars['k']->value=='jp'){?>japanese<?php }elseif($_smarty_tpl->tpl_vars['k']->value=='en'){?>english<?php }elseif($_smarty_tpl->tpl_vars['k']->value=='it'){?>italian<?php }elseif($_smarty_tpl->tpl_vars['k']->value=='fr'){?>french<?php }elseif($_smarty_tpl->tpl_vars['k']->value=='ru'){?>russian<?php }?></option>
                              <?php }?>
                             <?php }} ?>
    					</select>
    				</div>
    				<button class="btn btn-default" type="button" id="select-translations-button">Download</button>
    			</form>
    			<br />
    			<?php }?>
    			
    		
    			
    		</div>
    	</div>
    	
        	
    	
    	<?php echo smarty_function_xr_atom(array('a_id'=>525,'am'=>$_smarty_tpl->getVariable('archive_media')->value,'cacheId'=>$_smarty_tpl->getVariable('data')->value['ID'],'cacheName'=>'magazineDetail','cache'=>1,'return'=>1),$_smarty_tpl);?>

		
        <?php echo smarty_function_xr_atom(array('a_id'=>669,'return'=>1),$_smarty_tpl);?>


	</div>
	

<script>
    $(document).ready(function(){
        fe_magazines.init();
    });
</script>