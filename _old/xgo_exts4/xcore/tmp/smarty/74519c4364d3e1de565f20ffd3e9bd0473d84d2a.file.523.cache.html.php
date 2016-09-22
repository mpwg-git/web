<?php /* Smarty version Smarty-3.0.7, created on 2014-08-05 15:00:04
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/523.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:95092815153e0d55402f3e0-37528950%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74519c4364d3e1de565f20ffd3e9bd0473d84d2a' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/523.cache.html',
      1 => 1407243603,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95092815153e0d55402f3e0-37528950',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_beyond_archive::sc_detailpage_get_id','var'=>'data'),$_smarty_tpl);?>


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
		    <h1><?php echo $_smarty_tpl->getVariable('data')->value['TITLE'];?>
</h1>
		
		</div>
		<div class="col-sm-3"></div>
	</div>
	
    <div class="row">
		<div class="col-sm-6">
			<p class="labelpic"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'class'=>"img-responsive rsImg"),$_smarty_tpl);?>
</p>								
		</div>
		<div class="col-sm-6">
			<h2><?php echo $_smarty_tpl->getVariable('data')->value['TITLE'];?>
</h2>
			<p><?php echo $_smarty_tpl->getVariable('data')->value['TEXT'];?>
</p>
		
			<p><strong>Views: <?php echo $_smarty_tpl->getVariable('data')->value['VIEWS'];?>
</strong></p>
			<br>
			<!--<p><a class="but" href="#">Add to favorites</a></p>-->
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<hr>
			<!--<p class="keywords"><strong>Keywords:</strong> </p>-->
			<div class="share">
				<?php echo smarty_function_xr_atom(array('a_id'=>461,'return'=>1),$_smarty_tpl);?>

			</div>
			<div class="clearer"></div>
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
	