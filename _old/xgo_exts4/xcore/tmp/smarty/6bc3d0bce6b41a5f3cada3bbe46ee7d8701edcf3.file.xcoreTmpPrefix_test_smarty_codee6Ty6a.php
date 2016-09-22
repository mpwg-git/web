<?php /* Smarty version Smarty-3.0.7, created on 2015-02-02 17:09:33
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codee6Ty6a" */ ?>
<?php /*%%SmartyHeaderCode:204610114454cfa13dab3ac7-91407240%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6bc3d0bce6b41a5f3cada3bbe46ee7d8701edcf3' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codee6Ty6a',
      1 => 1422893373,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204610114454cfa13dab3ac7-91407240',
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
	

	
	