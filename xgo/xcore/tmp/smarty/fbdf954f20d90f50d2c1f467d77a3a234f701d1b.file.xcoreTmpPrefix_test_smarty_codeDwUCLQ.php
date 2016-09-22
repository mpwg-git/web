<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 18:01:18
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDwUCLQ" */ ?>
<?php /*%%SmartyHeaderCode:148518505255d5f9ce9ebad8-05148376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbdf954f20d90f50d2c1f467d77a3a234f701d1b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDwUCLQ',
      1 => 1440086478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148518505255d5f9ce9ebad8-05148376',
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
        <!-- /HEADER ATOM -->
        
        <!-- CONTENT -->
        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        <!-- CONTENT -->
        
        <?php echo smarty_function_xr_atom(array('a_id'=>761,'return'=>1,'desc'=>"img upload modal"),$_smarty_tpl);?>

        
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places" type="text/javascript"></script>
        
         <!-- FOOTER ATOM --->
        <?php if (isset($_REQUEST['loggedin'])){?>
            <?php echo smarty_function_xr_atom(array('a_id'=>694,'return'=>1),$_smarty_tpl);?>

        <?php }else{ ?>
            <?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>

        <?php }?>
		
       	<?php echo smarty_function_xr_atom(array('a_id'=>704,'return'=>1,'desc'=>'js files'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>757,'return'=>1,'desc'=>'ajax loader'),$_smarty_tpl);?>

        
	</body>
</html>
