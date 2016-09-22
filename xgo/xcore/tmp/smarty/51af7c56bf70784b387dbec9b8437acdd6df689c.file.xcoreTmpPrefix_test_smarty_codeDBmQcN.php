<?php /* Smarty version Smarty-3.0.7, created on 2015-07-27 16:04:29
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDBmQcN" */ ?>
<?php /*%%SmartyHeaderCode:65482365755b63a6d995c53-89954623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51af7c56bf70784b387dbec9b8437acdd6df689c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDBmQcN',
      1 => 1438005869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65482365755b63a6d995c53-89954623',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_jsWrapperV2')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_jsWrapperV2.php';
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
">
   
   <!--- HTML HEADER -->
   <?php echo smarty_function_xr_atom(array('a_id'=>647,'return'=>1),$_smarty_tpl);?>

   
	<body>
        
        <!--- HEADER ATOM -->
        <?php echo smarty_function_xr_atom(array('a_id'=>693,'return'=>1),$_smarty_tpl);?>


        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        
         <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<!-- Bootstrap core JavaScript -->
        <?php echo smarty_function_xr_jsWrapperV2(array('s_ids'=>'97,93,77,177,51,48,181,328,75','var'=>"packedjs"),$_smarty_tpl);?>

	</body>
</html>
