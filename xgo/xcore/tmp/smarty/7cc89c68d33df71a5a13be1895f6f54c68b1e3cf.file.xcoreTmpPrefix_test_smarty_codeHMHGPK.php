<?php /* Smarty version Smarty-3.0.7, created on 2015-02-24 18:01:49
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHMHGPK" */ ?>
<?php /*%%SmartyHeaderCode:63455027254ecae7d3cf8a6-62838324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cc89c68d33df71a5a13be1895f6f54c68b1e3cf' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHMHGPK',
      1 => 1424797309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63455027254ecae7d3cf8a6-62838324',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo $_smarty_tpl->getVariable('CMS')->value;?>

<!DOCTYPE html>
<html lang="de">
   
    <!--- HTML Head --->
    <?php echo smarty_function_xr_atom(array('a_id'=>360,'return'=>1),$_smarty_tpl);?>

	
	<body>
	    
	    <div id="page-cover"></div>
	    
	    <!-- Header -->
	    <?php echo smarty_function_xr_atom(array('a_id'=>360,'return'=>1),$_smarty_tpl);?>


        <section class="content">
    		<div class="container">
				      
                <!--- CONTENT --->
                <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>


			</div>
		</section>

        <!--- Footer --->
        <?php echo smarty_function_xr_atom(array('a_id'=>356,'return'=>1),$_smarty_tpl);?>

     
	</body>
</html>