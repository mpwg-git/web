<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 17:46:05
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coder0EJZO" */ ?>
<?php /*%%SmartyHeaderCode:161018432354f5e54d7aa860-24310911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be3a853ca82c1243da23ab936847d8150b9ebc0b' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coder0EJZO',
      1 => 1425401165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161018432354f5e54d7aa860-24310911',
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

     
	</body>
</html>