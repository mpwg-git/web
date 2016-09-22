<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 21:05:39
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegyXhZO" */ ?>
<?php /*%%SmartyHeaderCode:182968692554fa08934637b4-93825619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34457aa43ddb181204016ba0f09b774e5ffbde99' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegyXhZO',
      1 => 1425672339,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182968692554fa08934637b4-93825619',
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
        url     : '/xsite/shop_fe/xxx.php',
        success : function(response){
        
        }
    });
});
</script>
     
	</body>
</html>