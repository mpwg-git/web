<?php /* Smarty version Smarty-3.0.7, created on 2015-08-15 16:53:16
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCRiXNo" */ ?>
<?php /*%%SmartyHeaderCode:194636258755cf525c71b8b4-90271513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f2077e8cc1436d2f3b30689cedbaa5d8061ca2c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCRiXNo',
      1 => 1439650396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194636258755cf525c71b8b4-90271513',
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
        <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>
        
		<?php echo smarty_function_xr_atom(array('a_id'=>704,'return'=>1),$_smarty_tpl);?>

		
	</body>
</html>
