<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 15:41:02
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeg2viSe" */ ?>
<?php /*%%SmartyHeaderCode:37955833355b7866ec3d537-09947481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5284972e5abecc8c4ad532e75136b56a365a6807' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeg2viSe',
      1 => 1438090862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37955833355b7866ec3d537-09947481',
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
		<!-- Bootstrap core JavaScript -->
        <?php echo smarty_function_xr_jsWrapperV2(array('s_ids'=>'97,93,77,177,51,48,181,328,75','var'=>"packedjs"),$_smarty_tpl);?>

	</body>
</html>
