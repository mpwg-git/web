<?php /* Smarty version Smarty-3.0.7, created on 2014-10-02 15:00:19
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/660.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1242402705542d688314de86-25159932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e446fbc3d7eb4fad70db0b57f61874a1f75d986' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/660.cache.html',
      1 => 1412256354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1242402705542d688314de86-25159932',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
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
		    <h1>WELCOME TO LÜRZER'S ARCHIVE</h1>
		<!--
		    <h1>Submit Your Work</h1>
		    
		    <ul class="nav nav-pills p-woche">
				<li class="active"><span class="step-menu">Step 1 - Sign In</span></li>
				<li><span class="step-menu">Step 2- Input Your Work</span></li>
				<li><span class="step-menu">Step 3- Confirm</span></li>
			</ul>
		 -->
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div class="row">
		<div class="col-sm-6">
			<h3>Lürzer's Archive - Magazin / Digital Subscription</h3>
			<a href="http://shop.luerzersarchive.com/shop/catalog/subscriptions" target="_self" title="Shop - Subscription Image">
			<?php echo smarty_function_xr_imgWrapper(array('s_id'=>1190973,'ext'=>'png','class'=>"img-responsive"),$_smarty_tpl);?>

			</a>
			<br />
			<a href="http://shop.luerzersarchive.com/shop/catalog/subscriptions" target="_self" title="Shop - Subscription" class="but">Subscribe</a>&nbsp;&nbsp;<a href="http://shop.luerzersarchive.com/shop/catalog/back-issues" target="_self" title="Shop - Back Issues" class="but">Back Issues</a>
		</div>

<script>
    $(document).ready(function(){
        fe_users.init_login_register();
    });
</script>
		
	</div>
	