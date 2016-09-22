<?php /* Smarty version Smarty-3.0.7, created on 2014-08-05 14:40:31
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/589.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:179638949153e0d0bfcc6668-35256644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c57e90c27cb5e3d81f12b45ca6d4599c554b46ee' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/589.cache.html',
      1 => 1407242431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179638949153e0d0bfcc6668-35256644',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?>

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
		    <?php echo smarty_function_xr_atom(array('a_id'=>524,'return'=>1),$_smarty_tpl);?>

		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div id="magazine_content_container">
    	<div class="row">
    		<div class="col-sm-9">
    		
    	        <h1>Interview</h1>
    		    
    		    <p><h3>This interview is available as PDF Download only.</h3></p>
    		    <p><a href="" class="but">Download PDF</a></p>
    		
    	    </div>
    		<div class="col-sm-3"></div>
    	</div>
    	    
        <div class="row">
    		<div class="col-sm-8">
    			<h2><?php echo $_smarty_tpl->getVariable('data')->value['TITLE'];?>
</h2>
    			<?php echo $_smarty_tpl->getVariable('data')->value['TEXT'];?>

    		</div>
    		<div class="col-sm-4">
    		</div>
    	</div>
    	
    	<div class="row">
    		<div class="col-sm-12">
    	
    			<div class="comments-disqus">
    				 <!-- disqus -->
    	            <?php echo smarty_function_xr_atom(array('a_id'=>462,'return'=>1),$_smarty_tpl);?>

    			</div>
    
    		</div>
    	</div>
    </div>
	
<script>
    $(document).ready(function(){
        fe_magazines.init();
    });
</script>