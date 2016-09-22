<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 16:40:11
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeA5Duev" */ ?>
<?php /*%%SmartyHeaderCode:91918314655b7944b4d7531-92128662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '480ca566b9e8b4679aa0427380337a3500c7afe8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeA5Duev',
      1 => 1438094411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91918314655b7944b4d7531-92128662',
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

        
        <!-- FOOTER ATOM -->
        <?php echo smarty_function_xr_atom(array('a_id'=>694,'return'=>1),$_smarty_tpl);?>

        
         <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<!-- Bootstrap core JavaScript -->
        <?php echo smarty_function_xr_jsWrapperV2(array('s_ids'=>'97,93,77,177,51,181,328,75,400,28','var'=>"packedjs"),$_smarty_tpl);?>

	</body>
</html>
