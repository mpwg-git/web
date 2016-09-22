<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 16:44:46
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGExsj6" */ ?>
<?php /*%%SmartyHeaderCode:96829647455b7955ee3aa20-72844067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89c6ceff3755bf2d50024eaad029efd8dd8e6337' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGExsj6',
      1 => 1438094686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96829647455b7955ee3aa20-72844067',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
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
		 <?php echo smarty_function_xr_atom(array('a_id'=>704,'return'=>1),$_smarty_tpl);?>

	</body>
</html>
