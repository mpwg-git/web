<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 16:43:27
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codec2019x" */ ?>
<?php /*%%SmartyHeaderCode:136070370655b7950fd01d60-60993231%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '711a853b52d612e28d1fa9bdda254b321d2b3472' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codec2019x',
      1 => 1438094607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136070370655b7950fd01d60-60993231',
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
        <?php if (isset($_REQUEST['loggedin'])){?>
            <?php echo smarty_function_xr_atom(array('a_id'=>693,'return'=>1),$_smarty_tpl);?>

        <?php }elseif($_smarty_tpl->getVariable('P_ID')->value==4){?>
            <?php echo smarty_function_xr_atom(array('a_id'=>690,'return'=>1),$_smarty_tpl);?>

        <?php }else{ ?>
            <?php echo smarty_function_xr_atom(array('a_id'=>642,'return'=>1),$_smarty_tpl);?>

        <?php }?>
        
        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        
         <!-- FOOTER ATOM --->
        <?php if (isset($_REQUEST['loggedin'])){?>
            <?php echo smarty_function_xr_atom(array('a_id'=>694,'return'=>1),$_smarty_tpl);?>

        <?php }else{ ?>
        <?php }?>
        
         <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
		
        <?php echo smarty_function_xr_atom(array('a_id'=>704,'return'=>1),$_smarty_tpl);?>

	</body>
</html>
