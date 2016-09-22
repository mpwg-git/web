<?php /* Smarty version Smarty-3.0.7, created on 2015-02-02 16:59:37
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7qFUTf" */ ?>
<?php /*%%SmartyHeaderCode:172909616154cf9eea0031c4-86298375%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f27b93325b010a343a1b590a2adcc2bbb7673554' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7qFUTf',
      1 => 1422892777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172909616154cf9eea0031c4-86298375',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_magazine::sc_get_all_specials_by_year','var'=>'data'),$_smarty_tpl);?>


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
	
    <?php echo smarty_function_xr_atom(array('a_id'=>677,'return'=>1),$_smarty_tpl);?>

	
	<div id="magazine_content_container">
	    <?php echo smarty_function_xr_atom(array('a_id'=>586,'am'=>$_smarty_tpl->getVariable('data')->value,'cacheName'=>'specialsOverview','cache'=>1,'return'=>1),$_smarty_tpl);?>

	    
	   
	    
	    <?php if ((!$_REQUEST['special_year'])){?>
	    <div class="row">
    		<div class="col-sm-12">
    			<br>
    			<p><a class="but buttonLoadMore" href="#">More</a></p>
    		</div>
    	</div>
    	<?php }?>
	</div>
    
<script>
    $(document).ready(function(){
        fe_magazines.init();
    });
</script>