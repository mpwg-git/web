<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 21:03:56
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemEbmap" */ ?>
<?php /*%%SmartyHeaderCode:48148997254fa082c375ff4-92402454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24ccd3f1a012bf88ac02a73bc183f181090ec213' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemEbmap',
      1 => 1425672236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48148997254fa082c375ff4-92402454',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo $_smarty_tpl->getVariable('CMS')->value;?>

<!DOCTYPE html>
<html>
   
    <!--- HTML Head --->
    <?php echo smarty_function_xr_atom(array('a_id'=>360,'return'=>1),$_smarty_tpl);?>

	
	<body>
	
	    <!--- Google Tag Manager --->
        <?php echo smarty_function_xr_atom(array('a_id'=>398,'return'=>1),$_smarty_tpl);?>


	    <div id="page-cover"></div>
	    
	    <!-- Header -->
	    <?php echo smarty_function_xr_atom(array('a_id'=>355,'return'=>1),$_smarty_tpl);?>


        <section class="content">
    		<div class="container">
				
				<div class="breadcrump">
				    <?php echo smarty_function_xr_atom(array('a_id'=>453,'return'=>1),$_smarty_tpl);?>

				</div>      
				      
                <!--- CONTENT --->
                <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>


			</div>
		</section>

        <!--- Footer --->
        <?php echo smarty_function_xr_atom(array('a_id'=>356,'return'=>1),$_smarty_tpl);?>

     
<script>
$(document).on('click', '.add-to-cart', function(e){
    e.preventDefault();
    console.info('x');
});
</script>
     
	</body>
</html>