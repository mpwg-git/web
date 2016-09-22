<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 21:10:44
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUKAOqp" */ ?>
<?php /*%%SmartyHeaderCode:125654131354fa09c4d24cf4-03134746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ecd3786d7872c92f079a6b58aec8bd95fa52703' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUKAOqp',
      1 => 1425672644,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125654131354fa09c4d24cf4-03134746',
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
        url     : '/xsite/call/xs_fe_products/addToCart',
        success : function(response){
        
        }
    });
});
</script>
     
	</body>
</html>