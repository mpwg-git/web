<?php /* Smarty version Smarty-3.0.7, created on 2014-09-30 17:01:26
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUX3h8q" */ ?>
<?php /*%%SmartyHeaderCode:194914961542ae1e63cc645-24257740%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b88235f8f469425ef9b34851136c9ab49761b0d' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUX3h8q',
      1 => 1412096486,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194914961542ae1e63cc645-24257740',
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
		<div class="col-sm-12">
			<h3>Lürzer's Archive - Magazin / Digital Subscription</h3>
			<a href="/shop/catalog/subscriptions" target="_self" title="Shop - Subscription Image">
			<?php echo smarty_function_xr_imgWrapper(array('s_id'=>1190973,'ext'=>'png','class'=>"img-responsive"),$_smarty_tpl);?>

			</a>
			<br />
			<a href="/shop/catalog/subscriptions" target="_self" title="Shop - Subscription" class="but">Subscribe</a>
		</div>

<script>
    $(document).ready(function(){
        fe_users.init_login_register();
    });
</script>
		
	</div>
	