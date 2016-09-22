<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 17:46:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeG6UGHM" */ ?>
<?php /*%%SmartyHeaderCode:23758473655d5f662c10e38-57282360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4450182bb63a796d1c2480b69094490662bef074' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeG6UGHM',
      1 => 1440085602,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23758473655d5f662c10e38-57282360',
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
        aaa
        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        <?php echo smarty_function_xr_atom(array('a_id'=>761,'return'=>1,'desc'=>"img upload modal"),$_smarty_tpl);?>

        
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places" type="text/javascript"></script>
        
         <!-- FOOTER ATOM --->
        <?php if (isset($_REQUEST['loggedin'])){?>
            <?php echo smarty_function_xr_atom(array('a_id'=>694,'return'=>1),$_smarty_tpl);?>

        <?php }else{ ?>
        <?php }?>
		
       	<?php echo smarty_function_xr_atom(array('a_id'=>704,'return'=>1,'desc'=>'js files'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>757,'return'=>1,'desc'=>'ajax loader'),$_smarty_tpl);?>

        
	</body>
</html>
