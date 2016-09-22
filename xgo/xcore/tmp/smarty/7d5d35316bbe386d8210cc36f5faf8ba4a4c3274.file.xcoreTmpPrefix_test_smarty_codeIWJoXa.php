<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 21:07:40
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeIWJoXa" */ ?>
<?php /*%%SmartyHeaderCode:208702835354fa090cb77035-07205976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d5d35316bbe386d8210cc36f5faf8ba4a4c3274' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeIWJoXa',
      1 => 1425672460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208702835354fa090cb77035-07205976',
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
$(document).on('click', '.js-add-to-cart', function(e){
    e.preventDefault();
    $.ajax({
        url     : '/xs_fe_products/addToCart',
        success : function(response){
        
        }
    });
});
</script>
     
	</body>
</html>