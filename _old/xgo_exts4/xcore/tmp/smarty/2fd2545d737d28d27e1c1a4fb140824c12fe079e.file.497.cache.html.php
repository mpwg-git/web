<?php /* Smarty version Smarty-3.0.7, created on 2014-08-05 14:11:31
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/497.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:164815512553e0c9f3915451-13115834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fd2545d737d28d27e1c1a4fb140824c12fe079e' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/497.cache.html',
      1 => 1407240691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164815512553e0c9f3915451-13115834',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
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
	    	<h1>About the ranking</h1>
		</div>
		<div class="col-sm-3"></div>
	</div>
	
    <div class="row">
		<div class="col-sm-12">
			<?php echo $_smarty_tpl->getVariable('TEXT')->value;?>

		</div>
	</div>
	
	<p><a class="but" href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">back</a></p>
	
	