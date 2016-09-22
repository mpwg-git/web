<?php /* Smarty version Smarty-3.0.7, created on 2015-08-01 15:05:00
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeb0VOcS" */ ?>
<?php /*%%SmartyHeaderCode:144425589855bcc3fc1f5658-63813014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4b4234bd73001c90c7b9797017396cbb8873d3b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeb0VOcS',
      1 => 1438434300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144425589855bcc3fc1f5658-63813014',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
">
     
    <?php echo smarty_function_xr_atom(array('a_id'=>647,'return'=>1),$_smarty_tpl);?>

     
	<body>
        
        <!-- HEADER ATOM -->
        <?php echo smarty_function_xr_atom(array('a_id'=>642,'return'=>1),$_smarty_tpl);?>


        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<?php echo smarty_function_xr_atom(array('a_id'=>704,'return'=>1),$_smarty_tpl);?>

		
	</body>
</html>
