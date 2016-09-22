<?php /* Smarty version Smarty-3.0.7, created on 2015-02-24 18:41:19
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8SnrA1" */ ?>
<?php /*%%SmartyHeaderCode:78697814654ecb7bfd7a7c1-35823926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '222756f28863e75f0d85ae91f5bd0a44742c12c9' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8SnrA1',
      1 => 1424799679,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78697814654ecb7bfd7a7c1-35823926',
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