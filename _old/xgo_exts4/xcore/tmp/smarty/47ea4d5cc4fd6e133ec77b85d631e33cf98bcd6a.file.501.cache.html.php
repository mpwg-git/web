<?php /* Smarty version Smarty-3.0.7, created on 2015-02-02 17:09:34
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/501.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:2434801854cfa13ed8c808-76235971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47ea4d5cc4fd6e133ec77b85d631e33cf98bcd6a' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/501.cache.html',
      1 => 1422893373,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2434801854cfa13ed8c808-76235971',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?>    <!-- logo row -->
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
		    <h1>About Us</h1>
		</div>
		<div class="col-sm-3"></div>
	</div>
	
    <?php echo smarty_function_xr_atom(array('a_id'=>677,'return'=>1),$_smarty_tpl);?>

	
	<div class="row">
		<div class="col-sm-6">
		    <?php echo $_smarty_tpl->getVariable('TEXT')->value;?>

		</div>
		<div class="col-sm-6">
			<p><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('IMAGE')->value,'ext'=>'jpg','class'=>"img-responsive rsImg",'alt'=>"Banner"),$_smarty_tpl);?>
</p>
		</div>
	</div>
	

	
	