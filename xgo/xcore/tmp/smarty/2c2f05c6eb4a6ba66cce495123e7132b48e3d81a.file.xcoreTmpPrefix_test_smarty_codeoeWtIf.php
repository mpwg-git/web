<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 13:24:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoeWtIf" */ ?>
<?php /*%%SmartyHeaderCode:28874656255b7667377cdf4-84942603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c2f05c6eb4a6ba66cce495123e7132b48e3d81a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoeWtIf',
      1 => 1438082675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28874656255b7667377cdf4-84942603',
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
        <?php $_smarty_tpl->tpl_vars['headerAtom'] = new Smarty_variable(642, null, null);?>
        
        <?php if ($_smarty_tpl->getVariable('P_ID')->value==4){?>
            <?php $_smarty_tpl->tpl_vars['headerAtom'] = new Smarty_variable(690, null, null);?>
        <?php }?>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('headerAtom')->value,'return'=>1),$_smarty_tpl);?>


        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        
         <!-- FOOTER ATOM --->
        <?php if (isset($_REQUEST['loggedin'])){?>
            <?php echo smarty_function_xr_atom(array('a_id'=>694,'return'=>1),$_smarty_tpl);?>

        <?php }else{ ?>
            <?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>

        <?php }?>
        
         <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<!-- Bootstrap core JavaScript -->
        <?php echo smarty_function_xr_jsWrapperV2(array('s_ids'=>'97,93,77,177,51,48,181,328,75','var'=>"packedjs"),$_smarty_tpl);?>

	</body>
</html>
